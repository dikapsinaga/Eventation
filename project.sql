-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Mei 2018 pada 04.59
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `category`) VALUES
(1, 'Seminar'),
(2, 'Entertaiment'),
(3, 'Sosial'),
(4, 'Festival'),
(5, 'Live Show'),
(6, 'Lomba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chart`
--

CREATE TABLE `tb_chart` (
  `id_chart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_content`
--

CREATE TABLE `tb_content` (
  `id_content` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `kuota` int(11) NOT NULL DEFAULT '0',
  `location` varchar(255) NOT NULL,
  `time` varchar(5) NOT NULL DEFAULT '00:00',
  `content` text NOT NULL,
  `path_img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_content`
--

INSERT INTO `tb_content` (`id_content`, `id_category`, `title`, `date`, `kuota`, `location`, `time`, `content`, `path_img`) VALUES
(9, 1, 'HyveGeneration X Rintisan Indonesia | CreatorsTalk101 - Volume 02.', '2019-08-18', 246, 'Sucor Sekuritas Spazio Surabaya, Dukuh Pakis, Jawa Timur.', '05:30', '#HyveGeneration X Rintisan Indonesia presents\r\n#CreatorsTalk101 - Volume 02.\r\nAbove Average - Stay Sharp in Fashion Industry\r\nHyve (www.hyve-app.com) , sebuah e-commerce platform untuk industri kreatif mengundang para entrepreneur muda dan para pelaku industri kreatif untuk hadir ke sharing session yang dibawakan oleh Aileen Gabrielle (Fashion Photographer) dan Iline and Margaret (VONDii).\r\n\r\nGoals to achieve :\r\n- Mengetahui hal-hal apa saja yang harus dipersiapkan dalam membangun brand fashion.\r\n- Tips and trick menentukan karakteristik brand fashion yang ditampilkan melalui foto yang tepat.\r\n- Saling bertemu dan berkenalan antar sesama entrepreneur muda dan juga para pelaku industri kreatif lainnya.\r\n\r\nLocation :\r\nSucor Sekuritas, Spazio Building 2nd Floor,\r\nJl. Mayjend Yono Suwoyo, Surabaya\r\n\r\n\r\nsupported by Rintisan.id (https://www.instagram.com/rintisan.id/?hl=en),.\r\nand Sucor Sekuritas (https://sucorsekuritas.com/)\r\nRegister your FREE Hyve account on (http://hyve-app.com/) and follow the official instagram for daily updates (https://www.instagram.com/hyve.id/)\r\nContact Person : Hello Hyve - 081703332558\r\n', '1.jpg'),
(10, 1, 'SEMINAR NASIONAL 20 TAHUN REFORMASI : WAJAH HUKUM INDONESIA', '2018-07-15', 150, 'Aula Pancasila 3rd Floor, Faculty Of Law, Airlangga University', '07:30', 'SEMINAR NASIONAL 20 TAHUN REFORMASI : WAJAH HUKUM INDONESIA\r\nPANEL 2\r\nHUKUM DAN BISNIS UNTUK KESEJAHTERAAN UMUM\r\nTopik:\r\n1. Hukum Investasi Untuk Kesejahteraan Umum\r\n(Kementerian Perdagangan Republik Indonesia)\r\n2. Hukum Mewadahi Bisnis di Era Digital\r\n(Otoritas Jasa Keuangan)\r\n3. Reformasi Hukum Pengadaan Barang dan Jasa\r\n(Lembaga Kebijakan Pengadaan Barang dan JAsa Pemerintah)\r\nContact Person :\r\n\r\nFiska Silvia R.R. (082233181868)\r\nErni Agustin (08113403765)\r\n\r\n\r\nHarap mengisi dengan Nama dan Alamat Email yang aktif (Pastikan alamat email yang diberikan sudah benar karena semua informasi dan materi akan dikirim melalui email)\r\nMohon Mencetak Sendiri Tiket Yang Dikirim Melalui Email dan Harap Dibawa Pada Saat Registrasi.\r\nMohon datang tepat waktu (Registrasi dimulai pukul 07.30 WIB)\r\n', '2.jpg'),
(11, 1, 'Konsultasi Google Adword-Surabaya.', '2018-08-19', 40, 'Your Office, Surabaya', '09:00', 'Banyak perusahaan ingin menjalankan digital marketing, tetapi yang sering menjadi masalah adalah kurangnya pemahaman mengenai konsep dan implementasi yang efektif mengenai digital marketing. Bahkan setelah menggunakan jasa digital agency, hasil yang didapatkan kurang maksimal. Karena perusahaan tidak mengerti dalam menentukan KPI / batas kesuksesan, tidak jarang digital agency yang menentukan KPI untuk mereka sendiri, yang sebetulnya tidak sesuai dengan tujuan digital marketing perusahaan tersebut, atau di-\"paksa\" masuk ke digital marketing channel yang tidak sesuai.\r\n\r\nErudite Training adalah lembaga pelatihan yang telah membantu banyak perusahaan dalam menjalankan digital marketing yang efektif. Klien kami berasal dari berbagai bidang industri; seperti perbankan, asuransi, properti, elektronik, fmcg hingga media. Metode kami sangat relevan sesuai dengan perkembangan terbaru dan didukung oleh fasilitator yang bersertifikasi.\r\n\r\nDalam kesempatan ini, Erudite Training menawarkan konsultasi bisnis satu hari. Pokok bahasan yang akan didiskusikan :\r\n- mendefiniskan business model\r\n- mengerti konsep digital marketing\r\n- mengetahui digital asset yang dimiliki\r\n- menentukan digital marketing channel yang paling sesuai\r\n- membagi tugas dan wewenang antara karyawan dengan digital agency\r\n- menentukan batas minimal kesuksesan / KPI\r\n\r\nJika anda sudah menjalankan Google Adwords, baik inhouse maupun digital agency, kami akan membantu untuk melakukan review dan memberikan masukan untuk perbaikan.\r\n\r\nUntuk informasi lebih lanjut, Anda dapat menghubungi kami di training@erudite-indonesia.com atau 089602709987\r\n\r\nMore Info : Google Adwords Training\r\n', '3.jpg'),
(12, 6, 'Mandarin Teacher Training Workshop', '2018-07-02', 55, 'Petra Christian University, Jawa Timur', '09:00', 'Pelatihan bagi guru-guru mandarin', '4.jpg'),
(13, 4, 'Crawfish Fest', '2018-07-19', 400, 'DowntownFest Houston, USA', '12:00', 'Houstonians LOVE Crawfish. We eat more than anywhere else in the world.\r\nTo celebrate bug season, please join us in the heart of Houston on ***May 19th*** at the inaugural Houston Crawfish Fest at the Esplanade on Navigation.\r\nWith the number of folks interested, we did the math and decided to double the crews boiling which forced us to restart the permit process, but we will be bringing the bayou to you on MAY 19TH.\r\nHOW MUCH WILL CRAWFISH COST?\r\nEach vendor will set their prices day of the event based on market price and their cost of preparation.\r\nPlease LIKE us on Facebook. Mark GOING to our event. SHARE, INVITE or tell your friends who would love this,\r\nand most importantly… JOIN OUR MAILING LIST:\r\nhttp://downtownfest.org/sign-up-for-mailing-list/\r\n', '5.jpg'),
(14, 4, 'Taps and Tapas, Beer Fest', '2018-10-13', 150, 'DowntownFest Houston, TX 77010', '12:00', 'Houston is one of the great food cities. And it\'s becoming a phenominal beer town. We think it\'s about time to raise a pint and a snack to celebrate that fact. We invite you to an unique processive experience which could only happen in Downtown Houston. A select a limited number of great establishments will each feature a different local brewry on special and also provide a complimentary tapa (aka a snack). Since the tapas will be made in advance, tickets to this inagural event will be limited. If you think this is a great idea, please sign up for the \"mailing list\" ticket. We will notify you as soon as tickets are available. You\'ll have the first opportunity to grab them before anyone else. Please consider informing one friend who you think would love this event. Great events are not only about great food and drink but great people as well.', '6.jpg'),
(15, 5, 'Jazz Bromo 2018', '2018-07-27', 300, 'Jiwa Jawa Resort Bromo, Wonotoro, Probolinggo, East Java, Indonesia', '06:00', 'Jazz Gunung Bromo 2018 adalah suatu festival atau event pertunjukan musik bergenre jazz dengan nuansa etnik yang dilaksanakan dengan memberikan nuansa lain dan berbeda layaknya pertunjukan musik jazz lainnya yaitu jazz gunung ini di gelar dengan panggung terbuka dan lokasinya di dinginnya suasana alam Gunung Bromo.Jazz Gunung Bromo 2018 adalah sebuah festival tahunan yang di tunggu-tunggu oleh banyak orang terutama adalah para pecinta musik yang bergenre jazz. Dimana sebuah pagelaran musik khas ennitk , dengan ruangan terbuka sehingga event ini sering di sebut sebagai event terbesar musik jazz di tanah air yang tentu saja akan menrik perhatian para pengunjung yang akan berdatangan menyaksikannya. karena event ini berkesan bagi pengunjung\r\n\r\nKelebihan Festival Jazz Gunung Bromo 2018 \r\nJazz Bromo 2018 adalah pagelaran musik bertaraf internasional yang menampilkan komposisi jazz bernuansa etnik, digelar setiap tahun di daerah pegunungan. Para musisi tampil di panggung terbuka beratap langit dan berlatar alam yang indah. Perpaduan harmonis antara musik, alam, dan manusia sehingga dapat tercipta indahnya jazz dan merdunya gunung dalam paket wisata bromoPagelaran Musik Festival \" Jazz Gunung Bromo 2018 \" ini digagas oleh tiga orang yang sangat peduli terhadap dunia seni, yaitu Sigit Pramono, seorang bankir dan fotografer yang mencintai Bromo dan musik jazz; Butet Kartaredjasa, seorang seniman yang serbabisa; dan Djaduk Ferianto, seniman musik yang kerap diundang pentas di mancanegara membawakan world music dengan ciri Indonesia yang kental. Festifal Paket Jazz Gunung 2018 diselenggarakan sebagai gerbang hati bagi kebebasan jiwa, dengan kearifan alam pegunungan yang telah menjadi simbol budaya asli di Nusantara. Diharapkan agar musik jazz hadir sebagai suatu kekuatan yang mampu mendorong dialog kemanusiaan yang memperkaya peradaban Indonesia sehingga perdamaian dapat berfungsi sebagai roh dalam jazz.\r\nJadwal Jazz Gunung Bromo 2018\r\nJazz Gunung 2018 Bromo menghadirkan artis artis diantaranya :\r\nHari 1 27 Juli 2018\r\nKRAMAT ENSAMBLE PERCUSSION • TOHPATI BERTIGA • TROPICAL TRANSIT • BARRY LIKUMAHUWA • ANDRE HEHANUSSA\r\nHari 2 28 Juli 2018\r\nRING OF FIRE • SURABAYA ALLSTARS : TRIBUTE TO BUBI CHEN • BINTANG INDRIANTO – SOUL OF BROMO • BARASUARA\r\nHari 3 29 Juli 2018\r\nENDAH N RHESA • BIANGLALA VOICES • NONARIA • BONITA & THE HUS BAND\r\n', '7.jpg'),
(16, 3, 'Wanderlust 108, Brooklyn 2018', '2018-09-09', 200, 'The Nethermead / Prospect Park, 101 Prospect Park Southwest, Brooklyn, NY 11225', '07:30', 'Wanderlust 108—The World’s Only Mindful Triathlon—brings the community together for a 5K run/walk, a dj-powered yoga session, and guided meditation in your local park. Following the triathlon, you can choose your own mindful adventure by enjoying bonus activities, perusing our Kula Market of local artisans, and stopping by Wanderlust’s True North Cafe for a healthy snack or lunch. From dancing with DJs on the main stage to trying something new like hooping and acroyoga, there’s plenty to do when you’re not on your mat. Nationally recognized teachers, speakers and musical talent are featured at each event to make for a fun-filled day.', '8.jpg'),
(17, 3, 'Taste of Tribeca', '2018-05-19', 80, 'Taste of Tribeca, 334 Greenwich Street, New York, New York 10013', '11:30', 'Saturday, May 19, 2018 from 11:30AM until 3:00PM. Rain or shine!\r\nNow in its 24th year, Taste of Tribeca brings together over 60 of Tribeca’s best restaurants for one unforgettable outdoor food festival and public school fundraiser. Come join us on Duane & Greenwich Streets and enjoy dishes from restaurants including Bubby’s Tribeca, Duane Park Patisserie, Gigino Trattoria, The Odeon, Tribeca Grill, and Walker’s, along with live music, family-friendly activities, and tours of local pubs and wine stores.\r\nAll proceeds from Taste of Tribeca support the continuation of arts and enrichment programs at public elementary schools PS 150 and PS 234.\r\nGeneral Taste Ticket\r\nTicket price includes a Tasting Card granting six tastes of any dish throughout the festival, as well as a choice of one beverage.\r\n', '9.jpg'),
(18, 2, 'IDCon 2018', '2018-05-19', 50, 'The Altman Building, 135 West 18th Street, New York, NY 10011', '10:00', 'ID Addicts and True Crime Lovers: Please join us for the third annual IDCon, the ultimate Investigation Discovery fan experience. Taking place on Saturday, May 19 at 10am in New York City, you’ll get the chance to meet your favorite ID stars, see exclusive clips from new and beloved ID series, and experience one-of-a-kind immersive activities. This year, we’ll focus on the mystery and intrigue of cold cases and the victims we’ve never forgotten. Don’t wait – get on the waitlist now for your chance to attend this event! *You must be 18 years or older to attend this event.', '10.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_harga`
--

CREATE TABLE `tb_harga` (
  `id_harga` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_harga`
--

INSERT INTO `tb_harga` (`id_harga`, `id_content`, `kategori`, `harga`) VALUES
(1, 9, 'Presale', '45000'),
(2, 9, 'VIP', '60000'),
(3, 10, 'Regular', '35000'),
(4, 10, 'VIP', '70000'),
(5, 11, 'Presale 1', '30000'),
(6, 11, 'Presale 2', '40000'),
(7, 11, 'Reguler', '50000'),
(8, 12, 'Umum', '25000'),
(9, 13, 'Presale', '30000'),
(10, 13, 'Bronze', '35000'),
(11, 13, 'Silver', '45000'),
(12, 13, 'Gold', '50000'),
(16, 14, 'Reguler', '45000'),
(17, 14, 'VIP', '60000'),
(18, 14, 'Reguler', '45000'),
(19, 14, 'VIP', '60000'),
(20, 15, 'Presale 1', '60000'),
(21, 15, 'Presale 2', '75000'),
(22, 15, 'Reguler', '85000'),
(23, 15, 'VIP', '100000'),
(24, 15, 'Presale 1', '60000'),
(25, 15, 'Presale 2', '75000'),
(26, 15, 'Reguler', '85000'),
(27, 15, 'VIP', '100000'),
(28, 16, 'Bronze', '55000'),
(29, 16, 'Silver', '65000'),
(30, 16, 'Gold', '80000'),
(31, 16, 'Bronze', '55000'),
(32, 16, 'Silver', '65000'),
(33, 16, 'Gold', '80000'),
(34, 17, 'Reguler', '30000'),
(35, 17, 'Reguler', '30000'),
(36, 18, 'Reguler', '35000'),
(37, 18, 'Reguler', '35000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_image`
--

CREATE TABLE `tb_image` (
  `id_image` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `photo` varchar(80) NOT NULL DEFAULT 'profile/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `fullname`, `email`, `phone`, `password`, `id_prodi`, `birthdate`, `photo`) VALUES
(15, 'dikaperdanasinaga', 'Dika Perdana Sinaga', 'dikaperdanasinaga@gmail.com', '81377186230', '$2y$10$r1lS./c3RkLEAetp3hsIgOc.jg2FDBL46yDwxuoqslox0GUzWlGHK', 0, '0000-00-00', 'profile/user.png'),
(18, 'timtompimpom', 'Timothy', 'timtompimpom@gmail.com', '81377186230', '$2y$10$mG6DZ7lzxSKTsRhy6/q3m.Y..z7vZTlqgffThFJeEp2TqMPyYvdKa', 0, '0000-00-00', 'profile/user.png'),
(19, 'foxreap', 'Timothy', 'marbeelz32@gmail.com', '81350528725', '$2y$10$Dhe6FEEDMv7DT3Cu2LRE1e/cN4ADgVJK8gkb0vtYyEeoigEVzJdbu', 0, '0000-00-00', 'profile/user.png'),
(20, 'marbeelz', 'Timothy', 'marbeelz@gmail.com', '81377186230', '$2y$10$rj2YnMw9b.j5w9cHKGHMs.IH4bEG79/K9yACUsL0Kl8fqvj8lUggC', 0, '0000-00-00', 'profile/user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tb_chart`
--
ALTER TABLE `tb_chart`
  ADD PRIMARY KEY (`id_chart`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_content`,`id_harga`);

--
-- Indexes for table `tb_content`
--
ALTER TABLE `tb_content`
  ADD PRIMARY KEY (`id_content`);

--
-- Indexes for table `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_chart`
--
ALTER TABLE `tb_chart`
  MODIFY `id_chart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_content`
--
ALTER TABLE `tb_content`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_harga`
--
ALTER TABLE `tb_harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
