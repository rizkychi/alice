-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2019 at 01:49 AM
-- Server version: 10.1.41-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alice`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_class`
--

CREATE TABLE `tb_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_course` int(11) NOT NULL,
  `class_desc` text,
  `class_lecturer` char(10) NOT NULL,
  `class_header` varchar(255) DEFAULT 'header_img_class.jpg',
  `class_code` char(6) DEFAULT NULL,
  `class_suspended` tinyint(1) NOT NULL DEFAULT '0',
  `class_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `tb_class`
--
DELIMITER $$
CREATE TRIGGER `tg_class_code` BEFORE INSERT ON `tb_class` FOR EACH ROW BEGIN 
    DECLARE code CHAR(6);
    DECLARE exist INT DEFAULT 1;
    DECLARE id INT;
    WHILE exist = 1 DO
        SET code = LEFT(UUID(), 6);
        SET exist = (SELECT COUNT(class_code) FROM tb_class WHERE class_code = code);
    END WHILE;
    SET NEW.class_code = code;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_class_assignment`
--

CREATE TABLE `tb_class_assignment` (
  `assignment_class` int(11) NOT NULL,
  `assignment_id` bigint(20) NOT NULL,
  `assignment_user` char(10) NOT NULL,
  `assignment_comment` text,
  `assignment_attachment` varchar(255) DEFAULT NULL,
  `assignment_score` int(11) DEFAULT NULL,
  `assignment_is_turned` tinyint(1) DEFAULT '0',
  `assignment_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_class_comment`
--

CREATE TABLE `tb_class_comment` (
  `comment_id` bigint(20) NOT NULL,
  `comment_post` bigint(20) NOT NULL,
  `comment_user` char(10) NOT NULL,
  `comment_content` text,
  `comment_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_class_member`
--

CREATE TABLE `tb_class_member` (
  `class_id` int(11) NOT NULL,
  `user_id` char(10) NOT NULL,
  `joined` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_class_post`
--

CREATE TABLE `tb_class_post` (
  `post_id` bigint(20) NOT NULL,
  `post_class_id` int(11) NOT NULL,
  `post_user` char(10) NOT NULL,
  `post_subject` varchar(255) NOT NULL,
  `post_content` text,
  `post_attachment` varchar(255) DEFAULT NULL,
  `post_attachment_link` text,
  `post_is_material` tinyint(1) DEFAULT '0',
  `post_is_assignment` tinyint(1) DEFAULT '0',
  `post_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `post_update` datetime DEFAULT CURRENT_TIMESTAMP,
  `post_due_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_course`
--

CREATE TABLE `tb_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_sks` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_course`
--

INSERT INTO `tb_course` (`course_id`, `course_name`, `course_sks`) VALUES
(1, 'Pemrograman Web Lanjut', 4),
(2, 'Metode Numerik', 4),
(3, 'Pemrograman Aplikasi Mobile', 2),
(4, 'Pemrograman Lanjut', 4),
(5, 'Kecerdasan Buatan', 2),
(6, 'Data Mining', 2),
(7, 'Matematika Diskret', 2),
(8, 'Metodologi Penelitian', 2),
(9, 'Aljabar Linier dan Matriks', 2),
(10, 'Bahasa Inggris 1', 2),
(11, 'Rekayasa Perangkat Lunak', 4),
(12, 'Pemrograman Basis Data', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_forum_comment`
--

CREATE TABLE `tb_forum_comment` (
  `comment_id` bigint(20) NOT NULL,
  `comment_post` bigint(20) NOT NULL,
  `comment_user` char(10) NOT NULL,
  `comment_content` text,
  `comment_like` int(11) DEFAULT '0',
  `comment_dislike` int(11) DEFAULT '0',
  `comment_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_forum_post`
--

CREATE TABLE `tb_forum_post` (
  `post_id` bigint(20) NOT NULL,
  `post_course` int(11) NOT NULL,
  `post_user` char(10) NOT NULL,
  `post_subject` varchar(255) NOT NULL,
  `post_content` text,
  `post_view` int(11) DEFAULT '0',
  `post_like` int(11) DEFAULT '0',
  `post_dislike` int(11) DEFAULT '0',
  `post_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_forum_post`
--

INSERT INTO `tb_forum_post` (`post_id`, `post_course`, `post_user`, `post_subject`, `post_content`, `post_view`, `post_like`, `post_dislike`, `post_date`) VALUES
(1, 8, '17.11.1229', 'Cara Menentukan Topik Penelitian', 'A. Brainstorming\r\nBrainstorming dapat menjadi alat yang berguna dalam mencari topik untuk karya ilmiah. Temukan tempat di mana dapat bersantai dengan tenang dan damai sambil menuliskan topik penelitian. Ketika memilih topik, peneliti harus memilih satu diantara berikut:\r\n1. Menemukan hal yang menarik\r\nMenemukan hal yang menarik bisa dijalankan oleh setiap orang ketika berada dalam perjalanan, belajar, ataupun ketika ikut beraktivitas bersama keluarga. Langkah ini semakin menarik ketika melihat problema di masyarakat.\r\n2. Memiliki pengetahuan sebelumnya\r\nMengetahui atau bahkan menguasai materi sebelum melakukan penelitian bisa menjadi landasan awal untuk menemukan topik dalam proses penelitian. Hal ini sangatlah penting dijalankan, mengingat untuk mendalami serta mengusai materi yang belum diketahui bisa memakan waktu yang sangat lama.\r\n\r\nB. Mindmapping \r\nPenting untuk memilih topik yang mengakomodasi panjang tulisan. Topik yang rumit terlalu luas untuk karya ilmiah yang panjang harus dipersempit. Ini adalah langkah menuju mendefinisikan topik penelitian. Peta pikiran dapat menjadi alat yang bermanfaat untuk menyaring topik. Saat menggunakan peta pikiran, peneliti membagi topik menjadi beberapa sub-topik. Kemudian peneliti membagi masing-masing sub-topik menjadi beberapa sub-topik. Selain itu, peta pikiran dapat mengungkapkan hubungan yang menarik antara berbagai sub-topik.', 0, 0, 0, '2019-12-11 04:59:22'),
(2, 6, '17.11.1229', 'Algoritma K-Means', 'K-Means Clustering adalah suatu metode penganalisaan data atau metode Data Mining yang melakukan proses pemodelan tanpa supervisi (unsupervised).', 0, 0, 0, '2019-12-11 07:20:12'),
(3, 6, '17.11.1229', 'Algoritma Apriori', 'K-Means Clustering adalah suatu metode penganalisaan data atau metode Data Mining yang melakukan proses pemodelan tanpa supervisi (unsupervised).', 0, 0, 0, '2019-12-11 07:28:08'),
(4, 1, '17.11.1247', 'Ini post pertamaku', 'cuma mau coba fitur aja hehe', 0, 0, 0, '2019-12-11 13:54:49'),
(5, 1, '17.11.1229', 'Membuat Form Login', 'Semakin banyak latihan, semakin bagus.\r\n\r\nBerikutnya kita akan coba membuat form registrasi.\r\n\r\nForm ini berisi field untuk:\r\n\r\nInput nama lengkap;\r\nInput username;\r\nInput email;\r\nInput password;\r\nInput jenis kelamin;\r\nInput Agama;\r\nInput Biografi.\r\ndsb.', 0, 0, 0, '2019-12-16 00:38:56'),
(6, 9, '17.11.1229', 'Membuat Form', 'AAAAAAAAAA', 0, 0, 0, '2019-12-16 04:55:50'),
(7, 9, '17.11.1229', 'Cara Membuat Makanan', 'aaaaa', 0, 0, 0, '2019-12-16 05:06:15'),
(8, 9, '17.11.1229', 'Membuat Form New', 'aaaa', 0, 0, 0, '2019-12-16 05:49:09'),
(9, 10, '17.11.1229', 'membuat beruk', 'ini isi', 0, 0, 0, '2019-12-16 06:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lecturer_profile`
--

CREATE TABLE `tb_lecturer_profile` (
  `profile_id` int(11) NOT NULL,
  `profile_user` char(10) NOT NULL,
  `profile_address` varchar(255) DEFAULT NULL,
  `profile_phone` varchar(13) DEFAULT NULL,
  `profile_office` varchar(255) DEFAULT NULL,
  `profile_blog` varchar(255) DEFAULT NULL,
  `profile_about` text,
  `profile_info` text,
  `profile_status` enum('Selo','Mengajar','Rapat','di Rumah') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lecturer_profile`
--

INSERT INTO `tb_lecturer_profile` (`profile_id`, `profile_user`, `profile_address`, `profile_phone`, `profile_office`, `profile_blog`, `profile_about`, `profile_info`, `profile_status`) VALUES
(8, '0518037000', 'Jl.Kaliurang Km 3.5 Yogyakarta', '085720934333', 'AMIKOM Gedung 4 lantai 1', 'www.google.com', 'Yokk mabarrr', 'yang mabar bareng saya bebas UTS dan UAS', 'Mengajar'),
(9, '0512245456', 'Jl.Solo Yogyakarta', '085674334666', 'AMIKOM Gedung 6 Lantai 1', 'www.google.com', 'Nang Ning Nang Nung', 'Kuliah apa mabar gan?', 'Selo'),
(10, '0512068999', 'Jl. Godean KM 9', '085233566221', 'AMIKOM Gedung 6 Lantai 1', 'www.google.com', 'Adakah yang ingin bertanya?', 'Kuliah terosss', 'di Rumah'),
(11, '0518037777', 'Jl.Demangan JT II Yogyakarta', '08523356990', 'AMIKOM Gedung 4 Lantai 2', 'www.google.com', 'Percaya diri dikelas ', 'Hari ini kuliah libur dulu ya?', 'Selo'),
(12, '0518031215', 'Kalasan Sleman Yogyakarta', '085233566112', 'AMIKOM Gedung 6 Lantai 1', 'www.google.com', 'Anak Teknik', 'Tidak ada libur untuk mahasiswa', 'di Rumah'),
(13, '0518032243', 'Jl.Imogiri Barat Bantul Yogyakarta', '08523350000', 'AMIKOM Gedung 6 Lantai 1', 'www.google.com', 'Santuyy', 'Tetap tenang dan jangan panik', 'Rapat'),
(14, '0518037303', 'Gamping Sleman Yogyakarta', '0852300000', 'AMIKOM Gedung 2 Lantai 1', 'www.google.com', 'Mabar kuy', 'Libur terosss', 'Mengajar'),
(15, '0518037888', 'Babarsari Sleman Yogyakarta', '0817461200', 'AMIKOM Gedung 6 Lantai 1', 'www.google.com', 'Adakah yang ingin bertanya?', 'yasudah penganti presensi tatap muka diganti dengan membuat 5 paper', 'di Rumah'),
(16, '0518037222', 'Condong Catur Sleman Yogyakarta', '0817461111', 'AMIKOM Gedung 6 Lantai 2', 'www.google.com', 'ngopi dulu', 'perkuliahan diganti dengan membuat drama dan diupload sebelum UAS ', 'Mengajar'),
(17, '0518037333', 'Lumajang Jawa Timur', '085233566333', 'AMIKOM Gedung 6 Lantai 1', 'www.google.com', 'Jangan telatan ngampusnya', 'kuliah diganti minggu depan ya', 'Mengajar'),
(20, '0518037121', 'Jl.Kaliurang KM 9 Sleman Yogyakarta', '085720934567', 'AMIKOM Gedung 1 Lantai 3', 'www.google.com', 'Ayo yang rajin kuliahnya', 'bebas tugas', 'Selo'),
(21, '0518037801', 'Jl.Kaliurang KM 3.5 Sleman Yogyakarta', '085674334234', 'AMIKOM Gedung 2 Lantai 1', 'www.google.com', 'Kuliah kuliah woi', 'libur tak libur tetap masuk kuliah', 'Selo'),
(22, '0512068777', 'Semaki Umbulharjo Yogyakarta', '085233566785', 'AMIKOMGedung 6 Lantai 6', 'www.google.com', 'ya ya sudahlah', 'besok minggu masuk pengganti hari senin', 'Selo'),
(23, '17.11.1262', NULL, NULL, NULL, NULL, NULL, NULL, 'Selo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_material`
--

CREATE TABLE `tb_material` (
  `material_id` bigint(20) NOT NULL,
  `material_course` int(11) NOT NULL,
  `material_user` char(10) NOT NULL,
  `material_subject` varchar(255) NOT NULL,
  `material_content` text,
  `material_attachment` varchar(255) DEFAULT NULL,
  `material_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_material`
--

INSERT INTO `tb_material` (`material_id`, `material_course`, `material_user`, `material_subject`, `material_content`, `material_attachment`, `material_date`) VALUES
(1, 9, '0518037801', 'Coba ', 'coba', '5_Pewarisan.pdf', '2019-12-16 22:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_material_downloaded`
--

CREATE TABLE `tb_material_downloaded` (
  `material_id` bigint(20) NOT NULL,
  `material_user` char(10) NOT NULL,
  `material_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_notification`
--

CREATE TABLE `tb_notification` (
  `notif_for_user` char(10) NOT NULL,
  `notif_from_user` char(10) NOT NULL,
  `notif_class_id` int(11) DEFAULT NULL,
  `notif_class_post` bigint(20) DEFAULT NULL,
  `notif_forum_post` bigint(20) DEFAULT NULL,
  `notif_type` enum('class','forum','task') DEFAULT NULL,
  `notif_status` tinyint(1) DEFAULT '0',
  `notif_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `role_id` tinyint(4) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` char(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` char(32) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` enum('Laki-laki','Perempuan') NOT NULL,
  `user_role` tinyint(4) NOT NULL,
  `user_photo` varchar(255) DEFAULT 'avatar.png',
  `user_exp` int(11) DEFAULT '0',
  `user_verified` tinyint(1) DEFAULT '0',
  `user_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_email`, `user_password`, `user_name`, `user_dob`, `user_gender`, `user_role`, `user_photo`, `user_exp`, `user_verified`, `user_created`) VALUES
('0512068777', 'diadia@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Mardhiya Hayati,S.T,M.Kom', '1972-03-18', 'Perempuan', 2, 'avatar.png', 0, 1, '2019-12-15 09:37:17'),
('0512068999', 'anggita@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Anggit Dwi Hartanto,M.Kom', '1988-12-01', 'Laki-laki', 2, 'avatar.png', 0, 1, '2019-12-15 03:59:48'),
('0512245456', 'suyotoo@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Andi Sunyoto,M.Kom,Dr', '1978-07-11', 'Laki-laki', 2, 'avatar.png', 0, 1, '2019-12-15 03:53:18'),
('0518031215', 'negoro@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Arifiyanto Hadinegoro,S.Kom,MT', '1988-12-01', 'Laki-laki', 2, 'avatar.png', 0, 1, '2019-12-15 08:15:34'),
('0518032243', 'bernad@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Bernadhed,M.Kom', '1988-03-23', 'Laki-laki', 2, 'avatar.png', 0, 1, '2019-12-15 08:21:03'),
('0518037000', 'achmadd@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Achmad Fauzi,SE,MM.,Dr', '1968-07-18', 'Laki-laki', 2, 'avatar.png', 0, 1, '2019-12-15 03:36:57'),
('0518037121', 'aruu@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Kamarudin.M.Kom', '1968-03-18', 'Laki-laki', 2, 'avatar.png', 0, 1, '2019-12-15 09:03:43'),
('0518037222', 'hibowo@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'H.Agus Wibowo,S.Sas,M.Hum', '1968-10-13', 'Laki-laki', 2, 'avatar.png', 0, 1, '2019-12-15 08:44:47'),
('0518037303', 'auzi@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Ferian Fauzi Abdulloh,M.Kom', '1985-07-11', 'Laki-laki', 2, 'avatar.png', 0, 1, '2019-12-15 08:26:51'),
('0518037333', 'ikeki@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Ike Verawati,M.Kom', '1985-03-18', 'Perempuan', 2, 'avatar.png', 0, 1, '2019-12-15 08:48:58'),
('0518037777', 'ananan@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Anna Baita,M.Kom', '1989-03-21', 'Perempuan', 2, 'avatar.png', 0, 1, '2019-12-15 08:09:33'),
('0518037801', 'rudita@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'M.Rudyanto Arief,S.T,M.T', '1978-03-24', 'Laki-laki', 2, 'avatar.png', 0, 1, '2019-12-15 09:25:52'),
('0518037888', 'bowo@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Ferry Wahyu Wibowo,S.Si,M.CS', '1972-03-18', 'Laki-laki', 2, 'avatar.png', 0, 1, '2019-12-15 08:37:46'),
('17.11.1215', 'benedicta.13@students.amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Benedicta Kristi', '2019-10-13', 'Perempuan', 3, 'avatar.png', 0, 1, '2019-12-10 12:15:29'),
('17.11.1220', 'muhammadnuralfian23@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Muhammad Nur Alfian', '1999-03-23', 'Laki-laki', 3, 'avatar.png', 0, 1, '2019-12-09 13:36:14'),
('17.11.1229', 'rizki.kh@students.amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Rizki Khairunnisa', '2019-08-14', 'Perempuan', 3, 'avatar.png', 0, 1, '2019-12-09 06:16:26'),
('17.11.1247', 'rizky.25@students.amikom.ac.id', '95c20d909c22d3663bd005aed2db1aa0', 'Rizky Nur Hidayatullah', '1998-01-25', 'Laki-laki', 3, '17.11.1247_1576539803.png', 0, 1, '2019-12-09 06:11:32'),
('17.11.1262', 'awaliyatul.hikmah@students.amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Awaliyatul Hikmah', '1999-06-30', 'Perempuan', 2, 'avatar.png', 0, 1, '2019-12-11 04:34:09'),
('17.11.1999', 'saya@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'saya', '2019-12-18', 'Laki-laki', 3, 'avatar.png', 0, 0, '2019-12-11 07:25:55'),
('adminalice', 'admin@alice.my.id', 'f15568f96a31ca15cc9634c08b446cdc', 'Administrator', '2019-12-09', 'Laki-laki', 1, 'avatar.png', 0, 1, '2019-12-09 06:11:32');

--
-- Triggers `tb_user`
--
DELIMITER $$
CREATE TRIGGER `tg_generate_profile` AFTER UPDATE ON `tb_user` FOR EACH ROW BEGIN 
    DECLARE id CHAR(10);
    DECLARE role INT;
    DECLARE verify INT;
    DECLARE exist INT ;
    SET id = NEW.user_id;
    SET role = NEW.user_role;
    SET verify = NEW.user_verified;
    SET exist = (SELECT COUNT(*) FROM tb_lecturer_profile WHERE profile_user = id);
    IF EXIST = 0 THEN
        IF (role = 2 AND verify = 1) THEN
        INSERT INTO tb_lecturer_profile (profile_user, profile_status) VALUES (id, 'Selo');
        END IF;
    END IF;
    IF (role = 2 AND verify = 0) THEN
        DELETE FROM tb_lecturer_profile WHERE profile_user = id;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_visit`
--

CREATE TABLE `tb_visit` (
  `visit_id` char(10) DEFAULT NULL,
  `visit_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_class`
--
ALTER TABLE `tb_class`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_code` (`class_code`),
  ADD KEY `class_course` (`class_course`),
  ADD KEY `class_lecturer` (`class_lecturer`);

--
-- Indexes for table `tb_class_assignment`
--
ALTER TABLE `tb_class_assignment`
  ADD KEY `assignment_class` (`assignment_class`),
  ADD KEY `assignment_id` (`assignment_id`),
  ADD KEY `assignment_user` (`assignment_user`);

--
-- Indexes for table `tb_class_comment`
--
ALTER TABLE `tb_class_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_post` (`comment_post`),
  ADD KEY `comment_user` (`comment_user`);

--
-- Indexes for table `tb_class_member`
--
ALTER TABLE `tb_class_member`
  ADD KEY `class_id` (`class_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_class_post`
--
ALTER TABLE `tb_class_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_class_id` (`post_class_id`),
  ADD KEY `post_user` (`post_user`);

--
-- Indexes for table `tb_course`
--
ALTER TABLE `tb_course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_name` (`course_name`);

--
-- Indexes for table `tb_forum_comment`
--
ALTER TABLE `tb_forum_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_post` (`comment_post`),
  ADD KEY `comment_user` (`comment_user`);

--
-- Indexes for table `tb_forum_post`
--
ALTER TABLE `tb_forum_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_course` (`post_course`),
  ADD KEY `post_user` (`post_user`);

--
-- Indexes for table `tb_lecturer_profile`
--
ALTER TABLE `tb_lecturer_profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profile_user` (`profile_user`);

--
-- Indexes for table `tb_material`
--
ALTER TABLE `tb_material`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `material_course` (`material_course`),
  ADD KEY `material_user` (`material_user`);

--
-- Indexes for table `tb_material_downloaded`
--
ALTER TABLE `tb_material_downloaded`
  ADD KEY `material_id` (`material_id`),
  ADD KEY `material_user` (`material_user`);

--
-- Indexes for table `tb_notification`
--
ALTER TABLE `tb_notification`
  ADD KEY `notif_for_user` (`notif_for_user`),
  ADD KEY `notif_from_user` (`notif_from_user`),
  ADD KEY `notif_class_id` (`notif_class_id`),
  ADD KEY `notif_class_post` (`notif_class_post`),
  ADD KEY `notif_forum_post` (`notif_forum_post`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `user_role` (`user_role`);

--
-- Indexes for table `tb_visit`
--
ALTER TABLE `tb_visit`
  ADD KEY `visit_id` (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_class`
--
ALTER TABLE `tb_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_class_comment`
--
ALTER TABLE `tb_class_comment`
  MODIFY `comment_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_class_post`
--
ALTER TABLE `tb_class_post`
  MODIFY `post_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_course`
--
ALTER TABLE `tb_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_forum_comment`
--
ALTER TABLE `tb_forum_comment`
  MODIFY `comment_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_forum_post`
--
ALTER TABLE `tb_forum_post`
  MODIFY `post_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_lecturer_profile`
--
ALTER TABLE `tb_lecturer_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_material`
--
ALTER TABLE `tb_material`
  MODIFY `material_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_class`
--
ALTER TABLE `tb_class`
  ADD CONSTRAINT `tb_class_ibfk_1` FOREIGN KEY (`class_course`) REFERENCES `tb_course` (`course_id`),
  ADD CONSTRAINT `tb_class_ibfk_2` FOREIGN KEY (`class_lecturer`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_class_assignment`
--
ALTER TABLE `tb_class_assignment`
  ADD CONSTRAINT `tb_class_assignment_ibfk_1` FOREIGN KEY (`assignment_class`) REFERENCES `tb_class` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_class_assignment_ibfk_2` FOREIGN KEY (`assignment_id`) REFERENCES `tb_class_post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_class_assignment_ibfk_3` FOREIGN KEY (`assignment_user`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_class_comment`
--
ALTER TABLE `tb_class_comment`
  ADD CONSTRAINT `tb_class_comment_ibfk_1` FOREIGN KEY (`comment_post`) REFERENCES `tb_class_post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_class_comment_ibfk_2` FOREIGN KEY (`comment_user`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_class_member`
--
ALTER TABLE `tb_class_member`
  ADD CONSTRAINT `tb_class_member_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `tb_class` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_class_member_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_class_post`
--
ALTER TABLE `tb_class_post`
  ADD CONSTRAINT `tb_class_post_ibfk_1` FOREIGN KEY (`post_class_id`) REFERENCES `tb_class` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_class_post_ibfk_2` FOREIGN KEY (`post_user`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_forum_comment`
--
ALTER TABLE `tb_forum_comment`
  ADD CONSTRAINT `tb_forum_comment_ibfk_1` FOREIGN KEY (`comment_post`) REFERENCES `tb_forum_post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_forum_comment_ibfk_2` FOREIGN KEY (`comment_user`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_forum_post`
--
ALTER TABLE `tb_forum_post`
  ADD CONSTRAINT `tb_forum_post_ibfk_1` FOREIGN KEY (`post_course`) REFERENCES `tb_course` (`course_id`),
  ADD CONSTRAINT `tb_forum_post_ibfk_2` FOREIGN KEY (`post_user`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_lecturer_profile`
--
ALTER TABLE `tb_lecturer_profile`
  ADD CONSTRAINT `tb_lecturer_profile_ibfk_1` FOREIGN KEY (`profile_user`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_material`
--
ALTER TABLE `tb_material`
  ADD CONSTRAINT `tb_material_ibfk_1` FOREIGN KEY (`material_course`) REFERENCES `tb_course` (`course_id`),
  ADD CONSTRAINT `tb_material_ibfk_2` FOREIGN KEY (`material_user`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_material_downloaded`
--
ALTER TABLE `tb_material_downloaded`
  ADD CONSTRAINT `tb_material_downloaded_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `tb_material` (`material_id`),
  ADD CONSTRAINT `tb_material_downloaded_ibfk_2` FOREIGN KEY (`material_user`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_notification`
--
ALTER TABLE `tb_notification`
  ADD CONSTRAINT `tb_notification_ibfk_1` FOREIGN KEY (`notif_for_user`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_notification_ibfk_2` FOREIGN KEY (`notif_from_user`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_notification_ibfk_3` FOREIGN KEY (`notif_class_id`) REFERENCES `tb_class` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_notification_ibfk_4` FOREIGN KEY (`notif_class_post`) REFERENCES `tb_class_post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_notification_ibfk_5` FOREIGN KEY (`notif_forum_post`) REFERENCES `tb_forum_post` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `tb_role` (`role_id`);

--
-- Constraints for table `tb_visit`
--
ALTER TABLE `tb_visit`
  ADD CONSTRAINT `tb_visit_ibfk_1` FOREIGN KEY (`visit_id`) REFERENCES `tb_user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
