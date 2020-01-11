-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2020 at 04:07 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`alicization`@`localhost` PROCEDURE `sp_exp` (`uid` CHAR(10), `exp` INT)  BEGIN
    UPDATE tb_user SET user_exp = user_exp + exp WHERE user_id = uid;
END$$

DELIMITER ;

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
-- Dumping data for table `tb_class`
--

INSERT INTO `tb_class` (`class_id`, `class_name`, `class_course`, `class_desc`, `class_lecturer`, `class_header`, `class_code`, `class_suspended`, `class_created`) VALUES
(1000000000, 'PEMROGRAMAN WEB LANJUT', 1, 'ini kelas pemrograman web lanjut', '0518037801', 'header_img_class.jpg', 'f97de7', 1, '2019-12-22 13:43:02'),
(1000000001, 'PWL-3', 1, 'Pemrograman Web Lanjut 3', '0518037801', 'header_img_class.jpg', '918a0b', 0, '2020-01-08 15:00:11'),
(1000000002, 'METODE NUMERIK', 2, 'Ruan diskusi dan tempat mengumpulkan tugas harian dan mingguan', '0518031215', 'header_img_class.jpg', '7b6aa8', 0, '2020-01-08 23:49:16'),
(1000000003, 'METODOLOGI PENELITIAN', 8, 'Kelas Metodologi Penelitian angkatan 2017', '0512068999', 'header_img_class.jpg', '5fff7a', 0, '2020-01-09 03:08:56'),
(1000000004, 'REKAYASA PERANGKAT LUNAK', 11, 'Kelas RPL angkatan 2017', '0512068999', 'header_img_class.jpg', '7587da', 0, '2020-01-09 03:09:32'),
(1000000005, 'DATA MINING', 6, 'Kelas Data Mining angkatan 2017', '0512068777', 'header_img_class.jpg', '88da52', 0, '2020-01-09 03:17:14'),
(1000000006, 'KECERDASAN BUATAN', 5, 'Kelas kecerdasan buatan angkatan 2017', '0518037777', 'header_img_class.jpg', '81a785', 0, '2020-01-09 03:24:12'),
(1000000007, 'PEMROGRAMAN APLIKASI MOBILE', 3, 'kelas PAM angkatan 2017', '0518032243', 'header_img_class.jpg', '6d4635', 0, '2020-01-09 03:37:56'),
(1000000008, 'Dugem', 9, 'Duduk Gembira Melingkar', '17.11.1262', 'header_img_class.jpg', '7de816', 0, '2020-01-09 03:59:53');

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
  `assignment_id` int(11) NOT NULL,
  `assignment_class` int(11) NOT NULL,
  `assignment_post` bigint(20) NOT NULL,
  `assignment_user` char(10) NOT NULL,
  `assignment_comment` text,
  `assignment_attachment` varchar(255) DEFAULT NULL,
  `assignment_score` int(11) DEFAULT '0',
  `assignment_is_turned` tinyint(1) DEFAULT '1',
  `assignment_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_class_assignment`
--

INSERT INTO `tb_class_assignment` (`assignment_id`, `assignment_class`, `assignment_post`, `assignment_user`, `assignment_comment`, `assignment_attachment`, `assignment_score`, `assignment_is_turned`, `assignment_date`) VALUES
(3, 1000000005, 9, '17.11.1247', NULL, '17.11.1247_yeay.txt', 99, 1, '2020-01-09 03:59:07'),
(4, 1000000005, 6, '17.11.1247', NULL, '17.11.1247_yeay.txt', 0, 1, '2020-01-09 04:04:24');

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

--
-- Dumping data for table `tb_class_comment`
--

INSERT INTO `tb_class_comment` (`comment_id`, `comment_post`, `comment_user`, `comment_content`, `comment_date`) VALUES
(1, 5, '17.11.1247', 'terima kasih banyak pak', '2020-01-09 03:14:12'),
(2, 8, '0512068777', 'terima kasih', '2020-01-11 15:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_class_member`
--

CREATE TABLE `tb_class_member` (
  `class_id` int(11) NOT NULL,
  `user_id` char(10) NOT NULL,
  `joined` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_class_member`
--

INSERT INTO `tb_class_member` (`class_id`, `user_id`, `joined`) VALUES
(1000000000, '17.11.1215', '2019-12-22 13:43:48'),
(1000000000, '17.11.1229', '2020-01-07 04:58:57'),
(1000000002, '17.11.1215', '2020-01-08 23:59:04'),
(1000000001, '17.11.1215', '2020-01-09 00:10:01'),
(1000000003, '17.11.1215', '2020-01-09 03:12:43'),
(1000000001, '17.11.1247', '2020-01-09 03:12:46'),
(1000000003, '17.11.1247', '2020-01-09 03:13:43'),
(1000000002, '17.11.1247', '2020-01-09 03:18:01'),
(1000000005, '17.11.1215', '2020-01-09 03:18:39'),
(1000000005, '17.11.1247', '2020-01-09 03:30:41'),
(1000000007, '17.11.1215', '2020-01-09 03:38:34');

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

--
-- Dumping data for table `tb_class_post`
--

INSERT INTO `tb_class_post` (`post_id`, `post_class_id`, `post_user`, `post_subject`, `post_content`, `post_attachment`, `post_attachment_link`, `post_is_material`, `post_is_assignment`, `post_date`, `post_update`, `post_due_date`) VALUES
(2, 1000000000, '17.11.1215', '', 'Mohon ijin besok minggu libur tidak ya Pak? Terima kasih :))', '', '', 0, 0, '2020-01-08 05:20:28', '2020-01-08 05:20:28', NULL),
(3, 1000000002, '0518031215', 'Tugas Review Paper 1', 'isikan pada form yang telah disediakan', '', '', 0, 1, '2020-01-08 23:57:05', '2020-01-08 23:57:05', '2020-01-16 00:01:00'),
(4, 1000000003, '0512068999', '', 'Silahkan mengisi nama kelompok untuk FP project pada Form yang telah disediakan', '', 'https://www.amikom.ac.id', 0, 0, '2020-01-09 03:12:03', '2020-01-09 03:12:03', NULL),
(5, 1000000003, '0512068999', 'Contoh Penulisan Paper', 'contoh paper berikut bisa dibuat referensi untuk tugas final project anda', '20200109031336_hu2013.pdf', '', 1, 0, '2020-01-09 03:13:36', '2020-01-09 03:13:36', NULL),
(6, 1000000005, '0512068777', 'Tugas 1 Data Mining', 'Buat makalah tentang macam-macam algoritma clustering', '', '', 0, 1, '2020-01-09 03:18:27', '2020-01-09 03:18:27', '2020-01-23 00:55:00'),
(7, 1000000005, '0512068777', '', 'Contoh soal dan pengerjaan Algoritma K Means', '20200109032640_kmeans.xlsx', '', 0, 0, '2020-01-09 03:26:40', '2020-01-09 03:26:40', NULL),
(8, 1000000005, '0512068777', 'Materi Preprocessing', 'Materi lengkap preprocessing', '20200109032757_materi4_preProcessing2.pptx', '', 1, 0, '2020-01-09 03:27:57', '2020-01-09 03:27:57', NULL),
(9, 1000000005, '0512068777', 'Tugas Mining Text', 'Silahkan buat laporan mengenai mining text. sumber bebas dari web mana aja', '', '', 0, 1, '2020-01-09 03:29:31', '2020-01-09 03:29:31', '2020-01-10 00:00:00'),
(10, 1000000007, '0518032243', 'Layouting Dasar Pada Android Studio', 'mendesain tampilan UI UX dengan android studio', '20200109034039_01 Dasar-dasar Query.pdf', '', 1, 0, '2020-01-09 03:40:39', '2020-01-09 03:40:39', NULL),
(11, 1000000003, '17.11.1247', '', 'hai', '', '', 0, 0, '2020-01-09 07:54:55', '2020-01-09 07:54:55', NULL);

--
-- Triggers `tb_class_post`
--
DELIMITER $$
CREATE TRIGGER `tg_notification_class_post` AFTER INSERT ON `tb_class_post` FOR EACH ROW BEGIN
    DECLARE class VARCHAR(255);
    DECLARE user CHAR(10);
    DECLARE roles INT;
    DECLARE lecturer CHAR(10);
    DECLARE finished INT DEFAULT 0;
    DECLARE curMember CURSOR FOR 
        SELECT user_id FROM tb_class_member WHERE class_id = NEW.post_class_id;
    DECLARE CONTINUE HANDLER FOR
        NOT FOUND SET finished = 1;
    SELECT class_lecturer INTO lecturer FROM tb_class WHERE class_id = NEW.post_class_id;
    SELECT user_role INTO roles FROM tb_user WHERE user_id = NEW.post_user;
    OPEN curMember;
    wloop:WHILE finished = 0 DO
        FETCH curMember INTO user;
        IF finished = 1 THEN 
            LEAVE wloop;
        END IF;
        IF NEW.post_user != user THEN
            INSERT INTO tb_notification (notif_for_user, notif_from_user, notif_class_id, notif_class_post, notif_type)
            VALUES (user, NEW.post_user, NEW.post_class_id, NEW.post_id, 'post');
        END IF;
    END WHILE wloop;
    SET finished = 0;
    IF roles = 3 THEN
        INSERT INTO tb_notification (notif_for_user, notif_from_user, notif_class_id, notif_class_post, notif_type)
        VALUES (lecturer, NEW.post_user, NEW.post_class_id, NEW.post_id, 'post');
    END IF;
    CLOSE curMember;
END
$$
DELIMITER ;

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

--
-- Dumping data for table `tb_forum_comment`
--

INSERT INTO `tb_forum_comment` (`comment_id`, `comment_post`, `comment_user`, `comment_content`, `comment_like`, `comment_dislike`, `comment_date`) VALUES
(3, 14, '17.11.1215', 'ashiyapp', 0, 0, '2020-01-08 05:15:31'),
(4, 14, '17.11.1215', 'okee', 0, 0, '2020-01-08 05:18:14'),
(5, 14, '17.11.1229', 'Ada banyak ', 0, 0, '2020-01-09 01:05:12'),
(6, 3, '17.11.1229', 'Seharusnya sudah diselesaikan dengan program hubungi saya', 0, 0, '2020-01-09 01:05:45'),
(7, 4, '17.11.1229', 'Yes you can do that', 0, 0, '2020-01-09 01:06:02'),
(8, 1, '17.11.1229', 'Thread yang bagus!', 0, 0, '2020-01-09 01:06:25'),
(9, 19, '17.11.1220', 'gak tau e', 0, 0, '2020-01-09 03:07:50'),
(10, 22, '17.11.1215', 'up', 0, 0, '2020-01-09 03:15:57'),
(11, 1, '17.11.1215', 'mantappu jiwaa!!! thanks gann', 0, 0, '2020-01-09 03:28:00'),
(12, 4, '17.11.1215', 'arigatou', 0, 0, '2020-01-09 03:28:50'),
(13, 24, '17.11.1220', 'up', 0, 0, '2020-01-09 03:48:22'),
(14, 20, '17.11.1220', 'up lur', 0, 0, '2020-01-09 03:49:24'),
(15, 14, '17.11.1262', 'Kisi-kisi gan??', 0, 0, '2020-01-09 03:56:11'),
(16, 1, '17.11.1262', 'copas nih', 0, 0, '2020-01-09 03:56:37'),
(17, 23, '17.11.1262', 'hih kamu, googling aja belum', 0, 0, '2020-01-09 03:58:37'),
(18, 24, '17.11.1229', 'tidak mz beda topik', 0, 0, '2020-01-09 03:59:24'),
(19, 23, '17.11.1229', 'ngabisin kuota az', 0, 0, '2020-01-09 04:00:38'),
(20, 22, '17.11.1229', 'up', 0, 0, '2020-01-09 04:01:03'),
(21, 24, '0512068777', 'ga mas, di data mining kita nambang data, bukan duit', 0, 0, '2020-01-09 04:08:03'),
(22, 4, '17.11.1229', 'sayonara', 0, 0, '2020-01-09 04:09:19'),
(23, 19, '17.11.1229', 'up deh', 0, 0, '2020-01-09 04:14:27'),
(24, 24, '0518037801', 'tidak mas', 0, 0, '2020-01-09 07:09:30');

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
(1, 8, '17.11.1229', 'Menentukan Topik Penelitian', 'A. Brainstorming\r\nBrainstorming dapat menjadi alat yang berguna dalam mencari topik untuk karya ilmiah. Temukan tempat di mana dapat bersantai dengan tenang dan damai sambil menuliskan topik penelitian. Ketika memilih topik, peneliti harus memilih satu diantara berikut:\r\n1. Menemukan hal yang menarik\r\nMenemukan hal yang menarik bisa dijalankan oleh setiap orang ketika berada dalam perjalanan, belajar, ataupun ketika ikut beraktivitas bersama keluarga. Langkah ini semakin menarik ketika melihat problema di masyarakat.\r\n2. Memiliki pengetahuan sebelumnya\r\nMengetahui atau bahkan menguasai materi sebelum melakukan penelitian bisa menjadi landasan awal untuk menemukan topik dalam proses penelitian. Hal ini sangatlah penting dijalankan, mengingat untuk mendalami serta mengusai materi yang belum diketahui bisa memakan waktu yang sangat lama.\r\n\r\nB. Mindmapping \r\nPenting untuk memilih topik yang mengakomodasi panjang tulisan. Topik yang rumit terlalu luas untuk karya ilmiah yang panjang harus dipersempit. Ini adalah langkah menuju mendefinisikan topik penelitian. Peta pikiran dapat menjadi alat yang bermanfaat untuk menyaring topik. Saat menggunakan peta pikiran, peneliti membagi topik menjadi beberapa sub-topik. Kemudian peneliti membagi masing-masing sub-topik menjadi beberapa sub-topik. Selain itu, peta pikiran dapat mengungkapkan hubungan yang menarik antara berbagai sub-topik.', 16, 0, 0, '2019-12-11 04:59:22'),
(3, 6, '17.11.1229', 'Analisis Market Basket   Algoritma Apriori di Supermarket', 'Suatu supermarket kecil ingin menganalisa hubungan keterikatan antara suatu barang dengan barang lainnya. Berikut adalah data penjualan barang-barang yang ingin di lihat keterikatannya. Data ini diambil dalam durasi penjualan satu hari. Maksud dari I1 adalah mewakili barang 1, I2 mewakili barang 2 dan seterusnya sampai I5 mewakili barang ke 5.', 23, 0, 0, '2019-12-11 07:28:08'),
(4, 5, '17.11.1247', 'Processes of a single threaded program', '0\r\n\r\n\r\nIf code is written in a single threaded language, does that means that only one process exists for its program at a time (no concurrent processes)?', 14, 0, 0, '2019-12-11 13:54:49'),
(5, 1, '17.11.1229', 'Membuat Form Login', 'Semakin banyak latihan, semakin bagus.\r\n\r\nBerikutnya kita akan coba membuat form registrasi.\r\n\r\nForm ini berisi field untuk:\r\n\r\nInput nama lengkap;\r\nInput username;\r\nInput email;\r\nInput password;\r\nInput jenis kelamin;\r\nInput Agama;\r\nInput Biografi.\r\ndsb.', 2, 0, 0, '2019-12-16 00:38:56'),
(6, 9, '17.11.1229', 'Membuat Form', 'AAAAAAAAAA', 1, 0, 0, '2019-12-16 04:55:50'),
(8, 9, '17.11.1229', 'Membuat Form New', 'aaaa', 1, 0, 0, '2019-12-16 05:49:09'),
(10, 2, '17.11.1220', 'Matlab', 'coba', 0, 0, 0, '2019-12-23 07:43:36'),
(11, 10, '17.11.1220', 'AnimatePresence in Framer-motion exit opacity', 'So what is happening here initially I have an array of items called list which builds out a list of items. Then when one of them is selected all the others are removed by filter method. I was hoping that AnimatePresence would animate all the ones been removed.', 2, 0, 0, '2019-12-23 07:47:58'),
(13, 1, '17.11.1229', 'Update post di forum', 'di web belom bisa tapi di localku udah', 0, 0, 0, '2020-01-07 05:06:33'),
(14, 7, '17.11.1215', 'Metode Pias', 'macam-macam metode pias apa aja ya?', 25, 0, 0, '2020-01-08 05:14:20'),
(16, 3, '17.11.1229', 'Compatibility Project Android Studio Versi Terbaru', 'Jika aplikasi android studio versinya lebih besar dari projek yang telah dibuat, berpengaruh pada si projek jika akan dibuka ke aplikasinya ngga? Tolong ya sahabat.', 12, 0, 0, '2020-01-09 00:33:57'),
(18, 3, '17.11.1229', 'Error : module not specified (android studio)', 'Permisi sebentar maaf merepotkan, jadi aku lagi buat program android sederhana dengan android studio pada saat aku run kok muncul module not specified. Aku tidak tahu apakah SDK belum di download atau gimana', 1, 0, 0, '2020-01-09 00:34:47'),
(19, 1, '17.11.1229', 'Tambah  Poin  Menggunakan Javascript ', 'assalamualaikum ka,, mau tanya gmna caranya agar skor nya bertambah otomatis (jika di klik jawaban benar) menggunakan javascript', 29, 0, 0, '2020-01-09 00:35:35'),
(20, 12, '17.11.1229', 'Apakah mysql aman jika diaplikasikan di perusahaan?', 'Saya baru saja kerja di sebuah perusahaan yang belum memiliki departemen IT. Dan sekarang dengan adanya saya departemen IT itu diciptakan. Rencananya saya mau membuat database untuk perusahaan ini. Pertanyaan saya, apakah MySQL itu aman jika diaplikasikan di perusahaan? Karena Oracle kan berbayar dan tidak murah. Terima kasih', 4, 0, 0, '2020-01-09 00:36:56'),
(21, 11, '17.11.1229', 'nodejs dan mongodb', 'Mau nanya, saya bikin projek menggunakan nodejs expressjs dan database mongodb. Dan untuk penyimpanan databasenya saya pake mongodb atlas. Saya mau hosting projek saya ke hosting dan kebetulan si penyedia hosting itu ngga support mongodb, apakah masih bisa aplikasi saya di deploy ke hosting tersebut dengan database masih terkoneksi ke mongodb atlas?', 5, 0, 0, '2020-01-09 00:38:56'),
(22, 3, '17.11.1229', 'Error ssl saat mengikuti tutorial android-kotlin api', 'Saya coba ganti emulatornya, yang sebelumnya menggunakan emulator dari android studionya langsung (Pixel 2 API 16), menjadi emulator luar (NOX 6.5.0.1, Android 7 (API 24)) dan hasilnya berhasil (masuk ke onResponse).\r\n\r\nBtw, project yang saya buat min sdknya versi 14, jadi kemungkinan sumber masalahnya bukan dari versi sdknya\r\n\r\nDan scriptnya tetap sama, jadi yang jelas bukan dari scriptnya.\r\n\r\nSedangkan emulator android studio (Pixel 2 API 16) berjalan normal kalau scriptnya tidak berhubungan dengan retrofit (request API). Sedangkan browser di dalam emulator bisa terhubungan dengan internet.\r\n\r\nWalaupun script bisa jalan, tetep saya penasaran...\r\nKalau ada yang tahu, mohon pencerahannya. Saya takutnya aplikasi yang saya buat dibeberapa user tidak bisa dijalankan.', 11, 0, 0, '2020-01-09 00:41:40'),
(23, 11, '17.11.1215', 'Cara instalasi Visual Paradigm gimana gan? error terus nihh', 'instal visual paradigm, mohon pencerahan', 6, 0, 0, '2020-01-09 03:31:24'),
(24, 6, '17.11.1220', 'Matkul Data Mining', 'Apakah data mining itu juga mempelajari tentang mining bitcoin ?', 15, 0, 0, '2020-01-09 03:48:06');

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
(22, '0512068777', 'Semaki Umbulharjo Yogyakarta', '085233566785', 'AMIKOMGedung 6 Lantai 6', 'www.google.com', 'ya ya sudahlah', 'besok minggu masuk pengganti hari senin', 'Mengajar'),
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
(1, 9, '0518037801', 'Coba ', 'coba', '5_Pewarisan.pdf', '2019-12-16 22:45:39'),
(2, 12, '0518031215', 'Agregate Function', 'fungsi dalam agregate', '04 Aggregate Function (lab).pdf', '2020-01-09 03:05:02'),
(3, 1, '17.11.1262', 'Form Processing', 'Materi tentang form processing', 'FORM PROCESSING.pdf', '2020-01-09 03:49:09'),
(5, 1, '17.11.1262', 'HTTP Header', 'Materi tentang HTTP Header', 'HTTP HEADER.pdf', '2020-01-09 03:51:10'),
(6, 2, '17.11.1262', 'Eliminasi Gauss Jordan', 'Materi Eliminasi Gauss Jordan', 'Small-Pleasures-Extract.pdf', '2020-01-09 03:52:48'),
(7, 6, '17.11.1262', 'Srcaper & Crawler', 'Srcaper & Crawler', 'makalah scraper dan crawler.pdf', '2020-01-09 03:54:33'),
(8, 6, '17.11.1262', 'FP-Growth', 'Materi FP-Growth', 'makalah fp-growth.pdf', '2020-01-09 03:55:11'),
(9, 1, '0518037801', 'Modul syntax PHP', 'modul mengenai cara penulisan program php', 'MODUL SYNTAX.pdf', '2020-01-09 07:08:27'),
(10, 6, '0512068777', 'Algoritma FP Growth', 'berikut materi tentang algoritma fp growth', 'Algoritma FP-Growth.docx', '2020-01-09 07:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_material_downloaded`
--

CREATE TABLE `tb_material_downloaded` (
  `material_id` bigint(20) NOT NULL,
  `material_user` char(10) NOT NULL,
  `material_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_material_downloaded`
--

INSERT INTO `tb_material_downloaded` (`material_id`, `material_user`, `material_date`) VALUES
(1, '0518037801', '2020-01-08 14:57:08'),
(1, '17.11.1215', '2020-01-07 13:38:00'),
(1, '17.11.1229', '2020-01-08 12:11:36'),
(2, '17.11.1215', '2020-01-09 03:34:29'),
(6, '17.11.1229', '2020-01-09 04:11:58'),
(7, '17.11.1229', '2020-01-09 04:46:56');

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
  `notif_type` enum('post','comment_forum','comment_class') DEFAULT NULL,
  `notif_status` tinyint(1) DEFAULT '0',
  `notif_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_notification`
--

INSERT INTO `tb_notification` (`notif_for_user`, `notif_from_user`, `notif_class_id`, `notif_class_post`, `notif_forum_post`, `notif_type`, `notif_status`, `notif_date`) VALUES
('17.11.1229', '17.11.1215', 1000000000, 2, NULL, 'post', 1, '2020-01-08 05:20:28'),
('0518037801', '17.11.1215', 1000000000, 2, NULL, 'post', 1, '2020-01-08 05:20:28'),
('17.11.1215', '0512068999', 1000000003, 5, NULL, 'post', 0, '2020-01-09 03:13:36'),
('17.11.1215', '0512068777', 1000000005, 7, NULL, 'post', 0, '2020-01-09 03:26:40'),
('17.11.1215', '0512068777', 1000000005, 8, NULL, 'post', 0, '2020-01-09 03:27:57'),
('17.11.1215', '0512068777', 1000000005, 9, NULL, 'post', 0, '2020-01-09 03:29:31'),
('17.11.1215', '0518032243', 1000000007, 10, NULL, 'post', 0, '2020-01-09 03:40:39'),
('17.11.1215', '17.11.1247', 1000000003, 11, NULL, 'post', 0, '2020-01-09 07:54:55'),
('0512068999', '17.11.1247', 1000000003, 11, NULL, 'post', 1, '2020-01-09 07:54:55');

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
('0512068777', 'diadia@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Mardhiya Hayati,S.T,M.Kom', '1972-03-18', 'Perempuan', 2, '0512068777_1578754249.png', 0, 1, '2019-12-15 09:37:17'),
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
('17.11.0000', 'rizkynhae@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Nur', '2000-01-01', 'Laki-laki', 3, 'avatar.png', 0, 0, '2020-01-08 13:48:25'),
('17.11.1214', 'evve228@gmail.com', '972345f1a3df50ece4426894309e39f6', 'Kevin', '1998-01-16', 'Laki-laki', 3, 'avatar.png', 0, 0, '2020-01-09 07:37:45'),
('17.11.1215', 'benedicta.13@students.amikom.ac.id', '4c70b1f7b85514f05801d4286c0b221f', 'Benedicta Kristi', '2019-10-13', 'Perempuan', 3, '17.11.1215_1577077833.png', 400, 1, '2019-12-10 12:15:29'),
('17.11.1220', 'muhammadnuralfian23@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Muhammad Nur Alfian', '1999-03-23', 'Laki-laki', 3, '17.11.1220_1578539380.png', 100, 1, '2019-12-09 13:36:14'),
('17.11.1229', 'rizki.kh@students.amikom.ac.id', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Rizki Khairunnisa', '2019-08-14', 'Perempuan', 3, '17.11.1229_1578543688.png', 1500, 1, '2019-12-09 06:16:26'),
('17.11.1236', 'fmuttafiah11@gmail.com', 'cb75983d0c1e0e95219a9ccea86fe00d', 'Tapek', '1999-07-11', 'Perempuan', 3, 'avatar.png', 0, 0, '2020-01-09 07:40:02'),
('17.11.1247', 'rizky.25@students.amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Rizky Nur Hidayatullah', '1998-01-25', 'Laki-laki', 3, '17.11.1247_1576539803.png', 450, 1, '2019-12-09 06:11:32'),
('17.11.1262', 'aris@amikom.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Juarisman, M.Kom', '1999-06-30', 'Laki-laki', 2, 'avatar.png', 0, 1, '2019-12-11 04:34:09'),
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
-- Dumping data for table `tb_visit`
--

INSERT INTO `tb_visit` (`visit_id`, `visit_date`) VALUES
('adminalice', '2019-12-22 14:44:43'),
('17.11.1247', '2019-12-22 14:48:15'),
('17.11.1220', '2019-12-21 04:00:00'),
('17.11.1999', '2019-12-20 07:00:00'),
('17.11.1262', '2019-12-20 05:00:00'),
('adminalice', '2019-12-22 14:51:21'),
('17.11.1229', '2019-12-18 00:00:00'),
('17.11.1247', '2019-12-19 00:00:00'),
('17.11.1247', '2019-12-17 00:00:00'),
('17.11.1220', '2019-12-17 00:00:00'),
('17.11.1215', '2019-12-16 00:00:00'),
('17.11.1229', '2019-12-15 00:00:00'),
('adminalice', '2019-12-22 15:12:17'),
('17.11.1215', '2019-12-23 05:03:55'),
('17.11.1220', '2019-12-23 07:39:11'),
('adminalice', '2019-12-23 07:49:15'),
('17.11.1215', '2019-12-23 12:42:57'),
('17.11.1215', '2019-12-28 16:17:55'),
('17.11.1215', '2019-12-29 13:04:57'),
('17.11.1215', '2019-12-30 00:04:12'),
('17.11.1215', '2019-12-30 04:23:59'),
('17.11.1215', '2019-12-30 04:24:00'),
('17.11.1220', '2020-01-06 02:21:28'),
('17.11.1229', '2020-01-07 04:57:43'),
('17.11.1215', '2020-01-07 13:34:28'),
('17.11.1215', '2020-01-07 16:45:13'),
('17.11.1215', '2020-01-08 05:12:16'),
('17.11.1229', '2020-01-08 12:07:39'),
('adminalice', '2020-01-08 13:41:42'),
('adminalice', '2020-01-08 13:54:17'),
('0518037801', '2020-01-08 14:49:26'),
('17.11.1215', '2020-01-08 23:19:45'),
('17.11.1215', '2020-01-08 23:22:31'),
('0518031215', '2020-01-08 23:47:25'),
('17.11.1215', '2020-01-08 23:51:18'),
('0518031215', '2020-01-08 23:54:52'),
('17.11.1215', '2020-01-08 23:58:49'),
('17.11.1229', '2020-01-09 00:29:56'),
('adminalice', '2020-01-09 02:43:53'),
('17.11.1247', '2020-01-09 02:45:07'),
('0518031215', '2020-01-09 03:02:48'),
('17.11.1220', '2020-01-09 03:06:55'),
('17.11.1215', '2020-01-09 03:07:09'),
('0512068999', '2020-01-09 03:07:59'),
('17.11.1215', '2020-01-09 03:14:26'),
('0512068777', '2020-01-09 03:16:42'),
('17.11.1215', '2020-01-09 03:19:07'),
('0518037777', '2020-01-09 03:22:11'),
('17.11.1215', '2020-01-09 03:25:08'),
('0512068777', '2020-01-09 03:25:45'),
('17.11.1247', '2020-01-09 03:30:00'),
('0518032243', '2020-01-09 03:37:18'),
('17.11.1215', '2020-01-09 03:38:28'),
('17.11.1220', '2020-01-09 03:39:09'),
('17.11.1262', '2020-01-09 03:47:57'),
('17.11.1247', '2020-01-09 03:51:48'),
('17.11.1229', '2020-01-09 03:57:13'),
('0512068777', '2020-01-09 04:04:37'),
('17.11.1229', '2020-01-09 04:22:56'),
('17.11.1220', '2020-01-09 06:01:04'),
('adminalice', '2020-01-09 06:43:28'),
('0518031215', '2020-01-06 14:00:00'),
('0518037222', '2020-01-06 10:25:00'),
('0512068999', '2020-01-05 00:00:00'),
('0518031215', '2020-01-04 14:00:00'),
('17.11.1247', '2020-01-03 19:00:00'),
('adminalice', '2020-01-09 06:57:52'),
('17.11.0000', '2020-01-09 06:59:14'),
('0512068777', '2020-01-09 07:00:28'),
('0518037801', '2020-01-09 07:00:54'),
('adminalice', '2020-01-09 07:01:11'),
('0518037801', '2020-01-09 07:07:00'),
('0512068777', '2020-01-09 07:10:17'),
('adminalice', '2020-01-09 07:37:06'),
('17.11.1214', '2020-01-09 07:38:08'),
('0512068777', '2020-01-09 07:40:55'),
('17.11.1247', '2020-01-09 07:48:14'),
('17.11.1247', '2020-01-09 07:52:16'),
('0512068999', '2020-01-09 07:57:06'),
('adminalice', '2020-01-10 00:28:45'),
('17.11.1247', '2020-01-10 00:30:41'),
('adminalice', '2020-01-11 13:50:37'),
('adminalice', '2020-01-11 14:02:19'),
('0512068777', '2020-01-11 14:46:56'),
('17.11.1247', '2020-01-11 14:57:04'),
('0512068777', '2020-01-11 15:01:51'),
('17.11.1247', '2020-01-11 15:35:19'),
('0512068777', '2020-01-11 15:39:20'),
('17.11.1247', '2020-01-11 15:44:11'),
('adminalice', '2020-01-11 15:49:20'),
('0512068777', '2020-01-11 15:52:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_class`
--
ALTER TABLE `tb_class`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_code` (`class_code`),
  ADD KEY `tb_class_ibfk_2` (`class_lecturer`),
  ADD KEY `tb_class_ibfk_1` (`class_course`);

--
-- Indexes for table `tb_class_assignment`
--
ALTER TABLE `tb_class_assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `assignment_class` (`assignment_class`),
  ADD KEY `assignment_id` (`assignment_post`),
  ADD KEY `tb_class_assignment_ibfk_3` (`assignment_user`);

--
-- Indexes for table `tb_class_comment`
--
ALTER TABLE `tb_class_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_post` (`comment_post`),
  ADD KEY `tb_class_comment_ibfk_2` (`comment_user`);

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
  ADD KEY `tb_class_post_ibfk_2` (`post_user`);

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
  ADD KEY `tb_forum_comment_ibfk_2` (`comment_user`);

--
-- Indexes for table `tb_forum_post`
--
ALTER TABLE `tb_forum_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_course` (`post_course`),
  ADD KEY `tb_forum_post_ibfk_2` (`post_user`);

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
  ADD KEY `tb_material_ibfk_2` (`material_user`);

--
-- Indexes for table `tb_material_downloaded`
--
ALTER TABLE `tb_material_downloaded`
  ADD UNIQUE KEY `material_id` (`material_id`,`material_user`),
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
  ADD KEY `tb_visit_ibfk_1` (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_class`
--
ALTER TABLE `tb_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000009;
--
-- AUTO_INCREMENT for table `tb_class_assignment`
--
ALTER TABLE `tb_class_assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_class_comment`
--
ALTER TABLE `tb_class_comment`
  MODIFY `comment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_class_post`
--
ALTER TABLE `tb_class_post`
  MODIFY `post_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_course`
--
ALTER TABLE `tb_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_forum_comment`
--
ALTER TABLE `tb_forum_comment`
  MODIFY `comment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tb_forum_post`
--
ALTER TABLE `tb_forum_post`
  MODIFY `post_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_lecturer_profile`
--
ALTER TABLE `tb_lecturer_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_material`
--
ALTER TABLE `tb_material`
  MODIFY `material_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_class`
--
ALTER TABLE `tb_class`
  ADD CONSTRAINT `tb_class_ibfk_1` FOREIGN KEY (`class_course`) REFERENCES `tb_course` (`course_id`),
  ADD CONSTRAINT `tb_class_ibfk_2` FOREIGN KEY (`class_lecturer`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_class_assignment`
--
ALTER TABLE `tb_class_assignment`
  ADD CONSTRAINT `tb_class_assignment_ibfk_1` FOREIGN KEY (`assignment_class`) REFERENCES `tb_class` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_class_assignment_ibfk_2` FOREIGN KEY (`assignment_post`) REFERENCES `tb_class_post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_class_assignment_ibfk_3` FOREIGN KEY (`assignment_user`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_class_comment`
--
ALTER TABLE `tb_class_comment`
  ADD CONSTRAINT `tb_class_comment_ibfk_1` FOREIGN KEY (`comment_post`) REFERENCES `tb_class_post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_class_comment_ibfk_2` FOREIGN KEY (`comment_user`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `tb_class_post_ibfk_2` FOREIGN KEY (`post_user`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_forum_comment`
--
ALTER TABLE `tb_forum_comment`
  ADD CONSTRAINT `tb_forum_comment_ibfk_1` FOREIGN KEY (`comment_post`) REFERENCES `tb_forum_post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_forum_comment_ibfk_2` FOREIGN KEY (`comment_user`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_forum_post`
--
ALTER TABLE `tb_forum_post`
  ADD CONSTRAINT `tb_forum_post_ibfk_1` FOREIGN KEY (`post_course`) REFERENCES `tb_course` (`course_id`),
  ADD CONSTRAINT `tb_forum_post_ibfk_2` FOREIGN KEY (`post_user`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `tb_material_ibfk_2` FOREIGN KEY (`material_user`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_material_downloaded`
--
ALTER TABLE `tb_material_downloaded`
  ADD CONSTRAINT `tb_material_downloaded_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `tb_material` (`material_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_material_downloaded_ibfk_2` FOREIGN KEY (`material_user`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `tb_visit_ibfk_1` FOREIGN KEY (`visit_id`) REFERENCES `tb_user` (`user_id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
