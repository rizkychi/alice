/* 
    ========== ALICE ===========

     - AMIKOM LEARNING CENTER -
    
    SQL Database ALICE For MySQL
          Copyrights 2019

    ============================
*/

-- Create Database
CREATE DATABASE IF NOT EXISTS db_alice;

-- Use Database
USE db_alice;

/*-- Create Table --*/
-- User Account
CREATE TABLE tb_user
(
    user_id CHAR(10) NOT NULL PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL UNIQUE,
    user_password VARCHAR(255) NOT NULL,
    user_dob DATE NOT NULL,
    user_gender ENUM('Laki-laki','Perempuan') NOT NULL,
    user_address VARCHAR(255),
    user_phone VARCHAR(13),
    user_office VARCHAR(255),
    user_blog VARCHAR(255),
    user_about TEXT,
    user_role ENUM('Dosen', 'Mahasiswa') NOT NULL,
    user_status ENUM('Selo','Mengajar','Rapat','di Rumah'),
    user_photo VARCHAR(255) DEFAULT 'avatar.jpg',
    user_exp INT DEFAULT 0,
    user_created DATETIME DEFAULT NOW()
);

-- Lecturer Schedule
CREATE TABLE tb_schedule
(
    schedule_user CHAR(10) NOT NULL,
    schedule_course INT NOT NULL,
    schedule_date DATE,
    schedule_class VARCHAR(255),
    FOREIGN KEY (schedule_user) REFERENCES tb_user(user_id),
    FOREIGN KEY (schedule_course) REFERENCES tb_course(course_id)
);

-- Course
CREATE TABLE tb_course
(
    course_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    course_name VARCHAR(255) NOT NULL
);

-- Class
CREATE TABLE tb_class (
    class_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    class_name VARCHAR(255) NOT NULL,
    class_course INT NOT NULL,
    class_desc TEXT,
    class_lecturer CHAR(10) NOT NULL,
    class_header VARCHAR(255) DEFAULT 'header_img_class.jpg',
    class_code CHAR(6) UNIQUE,
    class_created DATETIME DEFAULT NOW(),
    FOREIGN KEY (class_course) REFERENCES tb_course(course_id),
    FOREIGN KEY (class_lecturer) REFERENCES tb_user(user_id)
);

CREATE TABLE tb_class_member (
    class_id INT NOT NULL,
    user_id CHAR(10) NOT NULL,
    joined DATETIME DEFAULT NOW(),
    FOREIGN KEY (class_id) REFERENCES tb_class(class_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES tb_user(user_id) ON DELETE CASCADE 
);

CREATE TABLE tb_class_post
(
    post_id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    post_class_id INT NOT NULL,
    post_user CHAR(10) NOT NULL,
    post_subject VARCHAR(255) NOT NULL,
    post_content TEXT,
    post_attachment VARCHAR(255),
    post_attachment_link TEXT,
    post_is_material BOOLEAN DEFAULT 0,
    post_is_assignment BOOLEAN DEFAULT 0,
    post_date DATETIME DEFAULT NOW(),
    post_update DATETIME DEFAULT NOW(),
    post_due_date DATETIME,
    FOREIGN KEY (post_class_id) REFERENCES tb_class(class_id) ON DELETE CASCADE,
    FOREIGN KEY (post_user) REFERENCES tb_user(user_id)
);

CREATE TABLE tb_class_comment
(
    comment_id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comment_post BIGINT NOT NULL,
    comment_user CHAR(10) NOT NULL,
    comment_content TEXT,
    comment_date DATETIME DEFAULT NOW(),
    FOREIGN KEY (comment_post) REFERENCES tb_class_post(post_id) ON DELETE CASCADE,
    FOREIGN KEY (comment_user) REFERENCES tb_user(user_id)
);

CREATE TABLE tb_class_assignment
(
    assignment_class INT NOT NULL,
    assignment_id BIGINT NOT NULL,
    assignment_user CHAR(10) NOT NULL,
    assignment_comment TEXT,
    assignment_attachment VARCHAR(255),
    assignment_score INT,
    assignment_is_turned BOOLEAN DEFAULT 0,
    assignment_date DATETIME DEFAULT NOW(),
    FOREIGN KEY (assignment_class) REFERENCES tb_class(class_id) ON DELETE CASCADE,
    FOREIGN KEY (assignment_id) REFERENCES tb_class_post(post_id) ON DELETE CASCADE,
    FOREIGN KEY (assignment_user) REFERENCES tb_user(user_id)
);

-- Forum
CREATE TABLE tb_forum_post
(
    post_id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    post_course INT NOT NULL,
    post_user CHAR(10) NOT NULL,
    post_subject VARCHAR(255) NOT NULL,
    post_content TEXT,
    post_date DATETIME DEFAULT NOW(),
    FOREIGN KEY (post_course) REFERENCES tb_course(course_id),
    FOREIGN KEY (post_user) REFERENCES tb_user(user_id)
);

CREATE TABLE tb_forum_comment
(
    comment_id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comment_post BIGINT NOT NULL,
    comment_user CHAR(10) NOT NULL,
    comment_content TEXT,
    comment_like INT DEFAULT 0,
    comment_dislike INT DEFAULT 0,
    comment_is_reply BIGINT,
    comment_date DATETIME DEFAULT NOW(),
    FOREIGN KEY (comment_post) REFERENCES tb_forum_post(post_id) ON DELETE CASCADE,
    FOREIGN KEY (comment_user) REFERENCES tb_user(user_id),
    FOREIGN KEY (comment_is_reply) REFERENCES tb_forum_comment(comment_id) ON DELETE CASCADE
);

-- Notification
CREATE TABLE tb_notification
(
    notification_user CHAR(10) NOT NULL,
    notification_class_id INT,
    notification_class_post BIGINT,
    notification_forum_post BIGINT,
    notification_forum_comment BIGINT,
    notification_detail VARCHAR(255),
    notification_status BOOLEAN DEFAULT 0,
    FOREIGN KEY (notification_user) REFERENCES tb_user(user_id) ON DELETE CASCADE,
    FOREIGN KEY (notification_class_id) REFERENCES tb_class(class_id) ON DELETE CASCADE,
    FOREIGN KEY (notification_class_post) REFERENCES tb_class_post(post_id) ON DELETE CASCADE,
    FOREIGN KEY (notification_forum_post) REFERENCES tb_forum_post(post_id) ON DELETE CASCADE,
    FOREIGN KEY (notification_forum_comment) REFERENCES tb_forum_comment(comment_id) ON DELETE CASCADE
);


/*-- Create Trigger --*/
-- Generate class code
DELIMITER //
CREATE TRIGGER tg_class_code 
BEFORE INSERT 
ON tb_class FOR EACH ROW
BEGIN 
    DECLARE code CHAR(6);
    DECLARE exist INT DEFAULT 1;
    DECLARE id INT;
    WHILE exist = 1 DO
        SET code = LEFT(UUID(), 6);
        SET exist = (SELECT COUNT(class_code) FROM tb_class WHERE class_code = code);
    END WHILE;
    SET NEW.class_code = code;
END//
DELIMITER ;

-- Notification class post
DELIMITER //
CREATE TRIGGER tg_notification_class_post
AFTER INSERT
ON tb_class_post FOR EACH ROW
BEGIN
    DECLARE class VARCHAR(255);
    DECLARE fname VARCHAR(255);
    DECLARE user CHAR(10);
    DECLARE roles VARCHAR(10);
    DECLARE lecturer CHAR(10);
    DECLARE finished INT DEFAULT 0;
    DECLARE curMember CURSOR FOR 
        SELECT user_id FROM tb_class_member WHERE class_id = NEW.post_class_id;
    DECLARE CONTINUE HANDLER FOR
        NOT FOUND SET finished = 1;
    SELECT class_name, class_lecturer INTO class, lecturer FROM tb_class WHERE class_id = NEW.post_class_id;
    SELECT user_name, user_role INTO fname, roles FROM tb_user WHERE user_id = NEW.post_user;
    OPEN curMember;
    wloop:WHILE finished = 0 DO
        FETCH curMember INTO user;
        IF finished = 1 THEN 
            LEAVE wloop;
        END IF;
        IF NEW.post_user != user THEN
            INSERT INTO tb_notification (notification_user, notification_class_id, notification_class_post, notification_detail)
            VALUES (user, NEW.post_class_id, NEW.post_id, CONCAT(fname, ' menambahkan post baru di ', class));
        END IF;
    END WHILE wloop;
    SET finished = 0;
    IF roles != 'Dosen' THEN
        INSERT INTO tb_notification (notification_user, notification_class_id, notification_class_post, notification_detail)
        VALUES (lecturer, NEW.post_class_id, NEW.post_id, CONCAT(fname, ' menambahkan post baru di ', class));
    END IF;
    CLOSE curMember;
END//
DELIMITER ;

-- EXAMPLES
-- Dummy Student
INSERT INTO tb_user (user_id, user_name, user_email, user_password, user_dob, user_gender, user_address, user_phone, user_role)
VALUES ('17.11.1247', 'Rizky Nur Hidayatullah', 'rizky.25@students.amikom.ac.id', md5('12345'), '1998-01-25', 'Laki-laki', 'Sleman','081215875574', 'Mahasiswa');

-- Dummy Lecturer
INSERT INTO tb_user (user_id, user_name, user_email, user_password, user_dob, user_gender, user_address, user_phone, user_office, user_blog, user_about, user_role)
VALUES ('0518037801', 'M. RUDYANTO ARIEF, S.T, M.T', 'rudy@amikom.ac.id', md5('12345'), '1978-03-18', 'Laki-laki', 'Yogya','081234567890', 'Gedung 2 Lt 1', 'http://www.rudyantoarief.com', 'Dosen matkul pemrog web lanjut', 'Dosen');

-- Dummy Course
INSERT INTO tb_course (course_name)
VALUES ('Pemrograman Web Lanjut');

-- Dummy Forum Post
INSERT INTO tb_forum_post (post_course, post_user, post_subject, post_content)
VALUES (1, '17.11.1247', 'Macam Framework', 'Apa saja framework yang bisa digunakan untuk frontend developer');

-- Dummy Forum Comment
INSERT INTO tb_forum_comment (comment_post, comment_user, comment_content)
VALUES (1, '0518037801', 'Contohnya antara lain: Bootstrap, Vue, React, Angular, Semantic UI dan masih banyak lagi');

-- Dummy Forum Comment Reply
INSERT INTO tb_forum_comment (comment_post, comment_user, comment_content, comment_is_reply)
VALUES (1, '17.11.1247', 'Terima kasih banyak', 1);

-- Dummy Class
INSERT INTO tb_class (class_name, class_course, class_desc, class_lecturer)
VALUES ('PWL-03', 1, 'Ini kelas pwl', '0518037801');

-- Dummy Join A Class
INSERT INTO tb_class_member(class_id, user_id)
VALUES (1,'17.11.1247');
