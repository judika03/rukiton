-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2015 pada 07.12
-- Versi Server: 5.6.11
-- Versi PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `rukiton`
--
CREATE DATABASE IF NOT EXISTS `rukiton` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rukiton`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_medical`
--

CREATE TABLE IF NOT EXISTS `history_medical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `kode_klinik` varchar(30) NOT NULL,
  `keluhan` text NOT NULL,
  `penyakit` text NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `history_medical`
--

INSERT INTO `history_medical` (`id`, `id_user`, `kode_klinik`, `keluhan`, `penyakit`, `tgl_transaksi`) VALUES
(1, 8, 'KKJ01', 'Sakit jantung', '', '2015-10-25 05:00:48'),
(2, 10, 'KKAN01', 'Anak pusing pusing.', '', '2015-10-25 05:36:10'),
(3, 10, 'KKGM01', 'tai', '', '2015-10-25 05:37:09'),
(4, 11, 'KKG02', 'Saya kurang gizi.', '', '2015-10-25 05:38:28'),
(5, 8, 'KKPR01', 'Tai', '', '2015-10-25 06:11:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klinik`
--

CREATE TABLE IF NOT EXISTS `klinik` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `kode_klinik` varchar(11) NOT NULL,
  `kode_rumahsakit` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klinik`
--

INSERT INTO `klinik` (`id`, `nama`, `jam_buka`, `jam_tutup`, `kode_klinik`, `kode_rumahsakit`) VALUES
(0, 'Klinik Bedah', '08:00:00', '10:00:00', 'KKB01', 'KRS_BTH01'),
(1, 'Klinik Penyakit', '08:00:00', '10:00:00', 'KKPD01', 'KRS_BTH01'),
(3, 'Klinik Anak', '08:00:00', '10:00:00', 'KKAN01', 'KRS_BTH01'),
(4, 'Klinik Jantung ', '08:00:00', '10:00:00', 'KKJ01', 'KRS_SCH01'),
(5, 'Klinik Kebidanan', '08:00:00', '10:00:00', 'KKBK01', 'KRS_SCH01'),
(6, 'Klinik Kulit', '08:00:00', '10:00:00', 'KKKK01', 'KRS_SCH01'),
(7, 'Klinik Anak', '08:00:00', '10:00:00', 'KKAN01', 'KRS_EKH01'),
(8, 'Klinik Paru ', '08:00:00', '10:00:00', 'KKPR01', 'KRS_EKH01'),
(9, 'Klinik THT ', '08:00:00', '10:00:00', 'KKTHT01', 'KRS_EKH01'),
(10, 'Klinik Kulit', '08:00:00', '10:00:00', 'KKKK01', 'KRS_OMH01'),
(11, 'Klinik Mata', '08:00:00', '10:00:00', 'KKMT01', 'KRS_OMH01'),
(12, 'Klinik Gigi', '08:00:00', '10:00:00', 'KKGM01', 'KRS_OMH01'),
(13, 'Imunusasi', '08:00:00', '10:00:00', 'KIMN01', 'PKMS01'),
(14, 'Pelayanan Gizi', '08:00:00', '10:00:00', 'KPG01', 'PKMS01'),
(15, 'Klinik Kulit dan kecantikan', '08:00:00', '10:00:00', 'KKC01', 'PKMS01'),
(16, 'Pelayanan Pemeriksaan Kehamila', '08:00:00', '10:00:00', 'KPK01', 'PKMRW01'),
(17, 'Pelayanan Ibu dan Anak', '08:00:00', '10:00:00', 'KKBN01', 'PKMRW01'),
(18, 'Klinik Gigi dan Mulut', '08:00:00', '10:00:00', 'KKGM01', 'PKMRW01'),
(19, 'Klinik Anak & MTBS', '08:00:00', '10:00:00', 'KKAM01', 'PKMPRJ01'),
(20, 'Klinik Umum', '08:00:00', '10:00:00', 'KKU01', 'PKMPRJ01'),
(21, 'Klinik Lansia', '08:00:00', '10:00:00', 'KKLS01', 'PKMPRJ01'),
(22, 'Klinik Anak', '08:00:00', '10:00:00', 'KKAN01', 'PKMPML01'),
(23, 'Klinik Paru', '08:00:00', '10:00:00', 'KKPR01', 'PKMPML01'),
(24, 'Klinik Reproduksi', '08:00:00', '10:00:00', 'KKRD01', 'PKMPML01'),
(25, 'Pemeriksaan USG', '08:00:00', '10:00:00', 'KUSG01', 'PKMCPT01'),
(26, 'Klinik Umum', '08:00:00', '10:00:00', 'KKU01', 'PKMCPT01'),
(27, 'Klinik Anak', '08:00:00', '10:00:00', 'KKAN01', 'PKMCPT01'),
(28, 'Kinik Fisioterapi', '08:00:00', '10:00:00', 'KKFS01', 'PKMKS01'),
(29, 'Klinik KB', '08:00:00', '10:00:00', 'KKKB01', 'PKMKS01'),
(30, 'Klinik Gizi', '08:00:00', '10:00:00', 'KKG02', 'PKMKS01'),
(31, 'Klinik Paru', '08:00:00', '10:00:00', 'KKPR01', 'PKMJM01'),
(32, 'Imunusasi', '08:00:00', '10:00:00', 'KIMN01', 'PKMJM01'),
(33, 'Klinik Lansia', '08:00:00', '10:00:00', 'KKLS01', 'PKMJM01'),
(34, 'Klinik Reproduksi', '08:00:00', '10:00:00', 'KKRD01', 'PKMPAR01'),
(35, 'Klinik Anak', '08:00:00', '10:00:00', 'KKAN01', 'PKMPAR01'),
(36, 'Imunusasi', '08:00:00', '10:00:00', 'KIMN01', 'PKMPAR01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `id_kota` varchar(11) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama`, `provinsi`, `id_kota`, `latitude`, `longitude`) VALUES
(1, 'Kab.Tangerang', 'Banten', 'T101', '-6.196884', '106.636257'),
(2, 'Cilegon Kota', 'Banten', 'C101', '-6.002475', ' 106.009660'),
(3, 'Lebak', 'Banten', 'L101', '-6.563694', ' 106.240819'),
(4, 'Pandeglang Kab', 'Banten', 'P101', '-6.326377', '106.117444'),
(5, 'Serang', 'Banten', 'S101', '-6.110140', '106.162452'),
(6, 'Tangerang Kota', 'Banten', 'TK101', '-6.200346', '106.651637'),
(7, 'Tangerang Selatan Kota', 'Banten', 'TSK101', '-6.282872', ' 106.713802'),
(8, 'Jakarta Barat', 'Jakarta D.K.I', 'JB101', '-6.167332', '106.769616'),
(9, 'Jakarta Pusat', 'Jakarta D.K.I', 'JP101', '-6.187261', '106.834576'),
(10, 'Jakarta Selatan', 'Jakarta D.K.I', 'JS101', '-6.259148', '106.810308'),
(11, 'Jakarta Timur', 'Jakarta D.K.I', 'JT101', '-6.224271', '106.888527'),
(12, 'Jakarta Utara', 'Jakarta D.K.I', 'JU101', '-6.136905', '106.869706'),
(13, 'Kepulauan Seribu', 'Jakarta D.K.I', 'KS101', '-5.798983', '106.505713');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nohp` varchar(11) NOT NULL,
  `id_slot` int(11) NOT NULL,
  `tanggal_pesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kode_pesanan` varchar(30) NOT NULL,
  `ttl` date NOT NULL,
  `keluhan` text NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_user`, `nohp`, `id_slot`, `tanggal_pesanan`, `kode_pesanan`, `ttl`, `keluhan`, `status`) VALUES
(7, 0, '08577540858', 0, '2015-10-24 17:17:47', '5408583562bbd3b80b92', '1995-12-22', '', ''),
(8, 0, '08577540858', 0, '2015-10-24 18:02:21', '5408583562bc7ad266a1', '1995-12-22', '', ''),
(9, 0, '08577540858', 0, '2015-10-24 18:07:27', '5408583562bc8df5a4c3', '1995-12-22', '', ''),
(10, 0, '08577540858', 0, '2015-10-24 18:12:27', '5408583562bca0bea634', '1995-12-22', '', ''),
(11, 0, '08577540858', 0, '2015-10-24 18:13:33', '5408583562bca4d43934', '1995-12-22', '', ''),
(12, 0, '08577540858', 0, '2015-10-24 18:16:36', '5408583562bcb040108f', '1995-12-22', '', ''),
(13, 0, '08577540858', 0, '2015-10-24 18:17:25', '5408583562bcb35259c3', '1995-12-22', '', ''),
(14, 0, '08577540858', 0, '2015-10-24 18:18:54', '5408583562bcb8e0d377', '1995-12-22', '', ''),
(15, 0, '08577540858', 0, '2015-10-24 18:20:29', '5408583562bcbecf197d', '1995-12-22', '', ''),
(16, 0, '08577540858', 0, '2015-10-24 18:20:36', '5408583562bcbf3dfde2', '1995-12-22', '', ''),
(17, 0, '08577540858', 0, '2015-10-24 18:20:42', '5408583562bcbf9cca9c', '1995-12-22', '', ''),
(18, 0, '08577540858', 0, '2015-10-24 18:20:52', '5408583562bcc045b877', '1995-12-22', '', ''),
(19, 0, '08577540858', 0, '2015-10-24 18:23:01', '5408583562bcc8553cf0', '1995-12-22', '', ''),
(20, 0, '08577540858', 0, '2015-10-24 18:34:56', '5408583562bcf5060b92', '1995-12-22', 'Tai', ''),
(21, 0, '08577540858', 0, '2015-10-24 18:37:14', '5408583562bcfdac355f', '1995-12-22', 'Bapak menyusui', ''),
(22, 0, '08577540858', 0, '2015-10-24 18:38:28', '5408583562bd0248c752', '1995-12-22', 'Paru paru kering', ''),
(23, 0, '08577540858', 0, '2015-10-24 18:40:07', '5408583562bd087d88d3', '1995-12-22', 'Sakit peler', ''),
(24, 0, '08577540858', 0, '2015-10-24 18:40:52', '5408583562bd0b409290', '1995-12-22', 'awdawdawdawda', ''),
(25, 0, '08577540858', 0, '2015-10-24 18:41:18', '5408583562bd0ce2ea28', '1995-12-22', 'adwawdaw', ''),
(26, 0, '08577540858', 0, '2015-10-24 18:47:35', '5408583562bd246e3ebc', '1995-12-22', 'Jantung atiku', ''),
(27, 0, '08577540858', 0, '2015-10-25 02:24:47', '5408583562c3d6f1b1f9', '1995-12-22', '', ''),
(28, 0, '08577540858', 0, '2015-10-25 03:34:08', '5408583562c4dafb2649', '1995-12-22', 'Pilek 10 tahun lamanya', ''),
(29, 0, '08577540858', 0, '2015-10-25 03:35:08', '5408583562c4dec45218', '1995-12-22', 'Autis', ''),
(30, 0, '08577540858', 0, '2015-10-25 03:35:37', '5408583562c4e091c079', '1995-12-22', 'Bedah mata', ''),
(31, 0, '08577540858', 0, '2015-10-25 03:36:04', '5408583562c4e249dcf0', '1995-12-22', 'kjahwkdhadsadwawsdawdadw', ''),
(32, 0, '08577540858', 0, '2015-10-25 03:36:50', '5408583562c4e526e1bc', '1995-12-22', 'dawd', ''),
(33, 0, '08577540858', 140, '2015-10-25 03:52:06', '5408583562c51e69bc56', '1995-12-22', 'Galer', ''),
(34, 0, '08577540858', 13, '2015-10-25 03:56:44', '5408583562c52fc29b77', '1995-12-22', '.lHJWOIDHAOWHDUAWD', ''),
(35, 0, '08577540858', 15, '2015-10-25 03:57:45', '5408583562c53399dd23', '1995-12-22', 'l,l,,', ''),
(36, 8, '08577540858', 52, '2015-10-25 04:06:49', '5408583562c5558ca53c', '1995-12-22', 'Budeg', ''),
(37, 8, '08577540858', 142, '2015-10-25 04:08:14', '5408583562c55ae639fb', '1995-12-22', 'Cureg Menahun', ''),
(38, 8, '08577540858', 22, '2015-10-25 05:00:48', '5408583562c6200911f8', '1995-12-22', 'Sakit jantung', ''),
(39, 10, '08571982919', 18, '2015-10-25 05:36:10', '98291928562c6a4a185b7', '1995-12-22', 'Anak pusing pusing.', ''),
(40, 10, '08571982919', 71, '2015-10-25 05:37:09', '98291928562c6a8588091', '1995-12-22', 'tai', ''),
(41, 11, '08762819271', 175, '2015-10-25 05:38:28', '8192718291562c6ad490e02', '1995-12-22', 'Saya kurang gizi.', ''),
(42, 8, '08577540858', 44, '2015-10-25 06:11:52', '5408583562c72a82ecc0', '1995-12-22', 'Tai', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `id_provinsi` varchar(15) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`, `id_provinsi`, `latitude`, `longitude`) VALUES
(1, 'Banten', 'PB01', '-6.407561', '106.060641'),
(2, 'Jakarta D.K.I', 'PJ01', '-6.2293867', '106.6894288');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumahsakit`
--

CREATE TABLE IF NOT EXISTS `rumahsakit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `latitude` float(10,8) NOT NULL,
  `longitude` float NOT NULL,
  `alamat` text NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `profil` text NOT NULL,
  `kode_rumahsakit` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `rumahsakit`
--

INSERT INTO `rumahsakit` (`id`, `nama`, `latitude`, `longitude`, `alamat`, `lokasi`, `foto`, `profil`, `kode_rumahsakit`) VALUES
(0, 'Bethsaida Hospital', -6.25464678, 106.622, ' District Tivolli No.1,Jl. Boulevard Gading Serpong, Kaw Il-Lago, Paramount Serpong,Tangerang,Banten 15810', 'Kab.Tangerang', 'source/images/bethsaidahospital.jpg', 'Bethsaida Hospital adalah salah satu divisi diversifikasi dari Perusahaan Properti besar PT. Paramount Group. Bethsaida Hospital adalah Rumah Sakit Umum Pertama di wilayah Gading Serpong.\r\n\r\nDengan pertumbuhan jumlah penduduk yang cukup tinggi dan GDP yang terus meningkat di Indonesia dan khususnya diwilayah Gading Serpong Tangerang, maka kebutuhan akan pelayanan kesehatan dirasakan sangat penting.\r\n', 'KRS_BTH01'),
(1, 'St. Carolus Hospital', -6.24710274, 106.642, 'Jl. Gading Golf Boulevard Kav. 08, Gading Serpong, Tangerang, Banten', 'Kab.Tangerang', 'source/images/corulus.jpg', 'RS Sint Carolus Summarecon Serpong yang lebih dikenal dengan CSS, dibangun di atas lahan seluas 3000 m2 dengan luas bangunan 7060 m2 yang terdiri dari 5 lantai, terletak di kawasan Gading Serpong, Desa Cihuni, Kecamatan Pagedangan, Kabupaten Tangerang.\r\n\r\nRS Sint Carolus Summarecon Serpong memberikan komitmen untuk menjadi organisasi yang solid, profesional dan akuntabel yang mengedepankan Keselamatan Pasien. Dengan memberikan Karya Pelayanan Kesehatan berdasarkan kepada Iman, Harapan dan Kasih, serta menghormati Kehidupan dan Martabat Luhur Pribadi Manusia. Dengan proses pembelajaran berkelanjutan untuk semakin baik serta membentuk kemitraan yang saling mengembangkan', 'KRS_SCH01'),
(2, 'Eka Hospital BSD', -6.29870558, 106.67, 'Central Business District Lot. IX,BSD City,Lengkong Gudang,Kec. Tangerang, Tangerang Selatan, Banten 15322', 'Kab.Tangerang', 'source/images/eka.jpg', 'Eka Hospital di Bumi Serpong Damai adalah rumah sakit swasta umum yang berkomitmen memberikan pelayanan kesehatan berkualitas dari staf berdedikasi dan profesional, didukung teknologi terkini dan standar fasilitas kesehatan tinggi.\r\n\r\nEka Hospital BSD berlokasi di kawasan bisnis Central Business District Lot IX, BSD City-Tangerang, di atas lahan seluas 4 ha. Luas bangunan saat ini sekitar 20.000 m2, dengan 40 klinik  rawat jalan dan lebih 180 tempat tidur. Fasilitas diagnostik dan pengobatan terpadu dengan peralatan mutakhir seperti MRI, MSCT, Angiografi, USG 4 Dimensi, Laparoskopi, Endoskopi dan peralatan operasi modern lainnya, memberikan layanan paripurna bagi masyarakat.', 'KRS_EKH01'),
(3, 'Omni Hospital', -6.24474239, 106.651, 'Jl. Alam Sutera Boulevard Kav. 25 Serpong%2C Tangerang Pakulonan Serpong Utara Tangerang Selatan Banten', 'Kab.Tangerang', 'source/images/omni.jpg', 'OMNI Hospitals Group saat ini telah melayani lebih dari 3 (tiga) juta pasien, dengan 30.000 operasi bedah, dan didukung oleh 210 para ahli medis dibidangnya.\r\n\r\nOMNI Hospitals Group terus meningkatkan layanan rumah sakit yang sudah ditetapkan di lapangan untuk akreditasi internasional (JCI). Kami akan konsisten menambah kapasitas rumah sakit, dan saat ini dalam tahap pemembangunan OMNI Hospital Cikarang untuk menjangkau masyarakat lebih luas lagi dalam  memberikan layanan kesehatan berkualitas.', 'KRS_OMH01'),
(4, 'Puskesmas Serpong ', -6.32213402, 106.663, 'Jl. Raya Serpong,Serpong,Tangerang Selatan, Banten 15311', 'Tangerang Selatan Kota', 'source/images/puskesmasserpong.jpg', 'Terwujudnya masyarakat sehat dan mandiri di wilayah kerja Puskesmas Serpong 2 melalui pelayanan prima bermutu dan terjangkau oleh masyarakat', 'PKMS01'),
(5, 'Puskesmas Rawa Buntu', -6.31788778, 106.682, 'Jl. Nn, Serpong, Tangerang Selatan, Banten 15310', 'Tangerang Selatan Kota', 'source/images/puskesmasrawabuntu.jpg', 'Menjadi Puskesmas Prima di tahun 2015', 'PKMRW01'),
(6, 'Puskesmas Pondok Ranji', -6.27976608, 106.733, 'Jl. Beruang 2 RT. 02/02, Kel. Pondok Ranji, Kec. Ciputat Timur, Kota Tangerang Selatan', 'Tangerang Selatan Kota', 'source/images/puskesmaspondokranji.jpg', 'Pelayanan kesehatan dasar yang menjangkau semua lapisan masyarakat pada tahun 2016', 'PKMPRJ01'),
(7, 'Puskesmas Pamulang', -6.34509993, 106.735, 'Jl. Surya Kencana No. 1, Kec. Pamulang, Kota Tangerang Selatan', 'Tangerang Selatan Kota', 'source/images/puskesmaspamulang.jpg', 'Terwujudnya Puskesmas Pamulang dengan pelayanan kesehatan yang bermutu, menyeluruh & terpadu tahun 2018', 'PKMPML01'),
(8, 'Puskesmas Ciputat Timur', -6.29850483, 106.762, 'Jl. Pahlawan,Ciputat Tim.,Tangerang Selatan, Banten 15412', 'Tangerang Selatan Kota', 'source/images/puskesmasciputat.jpg', 'Unggul dalam pelayanan kesehatan pada tahun 2015', 'PKMCPT01'),
(9, 'Puskesmas Kampung Sawah', -6.29171991, 106.73, 'Jl. Gelatik Rt. 01/01,Sawah Lama Ciputat', 'Tangerang Selatan Kota', 'source/images/puskesmaskampungsawah.jpg', 'Dengan Pelayanan Prima dan Mandiri, menuju masyarakat berprilaku sehat', 'PKMKS01'),
(10, 'Puskesmas Jurang Mangu', -6.26418400, 106.73, 'Jln.Raya Jurang Mangu Timur, Kel. Jurang Mangu Kec. Pondok Aren, Kota Tangerang Selatan', 'Tangerang Selatan Kota', 'source/images/puskesmasjurangmangu.jpg', 'Sebagai penggerak terdepan dalam peningkatan kesehatan masyarakat di wilayah kerja Puskesmas Jurang Mangu.', 'PKMJM01'),
(11, 'Puskesmas Pondok Aren', -6.26279688, 106.718, 'Jl. Puskesmas, Pondok Aren', 'Tangerang Selatan Kota', 'source/images/puskesmaspondokaren.jpg', 'Menjadi pusat informasi kesehatan, pusat rawat jalan dan rawat inap untuk wilayah Kecamatan Pondok Aren pada tahun 2015', 'PKMPAR01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `nobpjs` varchar(15) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `tgl_lahir`, `email`, `password`, `nohp`, `nobpjs`, `tgl_daftar`) VALUES
(8, 'Fikri Akhdi', '1995-12-22', 'fikriakhdi22@gmail.com', 'efafce856fcdf65b5632250ef980cb4a', '085775408583', '', '2015-10-24 08:04:11'),
(9, 'Judika Herianto', '1995-12-22', 'judikagultom03@gmail.com', 'efafce856fcdf65b5632250ef980cb4a', '085775408683', '', '2015-10-24 14:32:44'),
(10, 'Freddy Mercury', '1995-12-22', 'freddy.mercury@gmail.com', 'efafce856fcdf65b5632250ef980cb4a', '0857198291928', '', '2015-10-25 05:35:33'),
(11, 'Johnny', '1995-12-22', 'johnny@gmail.com', 'efafce856fcdf65b5632250ef980cb4a', '087628192718291', '', '2015-10-25 05:37:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE IF NOT EXISTS `waktu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` time NOT NULL,
  `kode_klinik` varchar(151) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=193 ;

--
-- Dumping data untuk tabel `waktu`
--

INSERT INTO `waktu` (`id`, `waktu`, `kode_klinik`, `status`) VALUES
(1, '08:00:00', 'KKB01', 'terpesan'),
(2, '08:20:00', 'KKB01', 'terpesan'),
(3, '08:40:00', 'KKB01', 'kosong'),
(4, '09:00:00', 'KKB01', 'terpesan'),
(5, '09:20:00', 'KKB01', 'kosong'),
(6, '09:40:00', 'KKB01', 'kosong'),
(7, '08:00:00', 'KKPD01', 'terpesan'),
(8, '08:20:00', 'KKPD01', 'terpesan'),
(9, '08:40:00', 'KKPD01', 'terpesan'),
(10, '09:00:00', 'KKPD01', 'terpesan'),
(11, '09:20:00', 'KKPD01', 'terpesan'),
(12, '09:40:00', 'KKPD01', 'terpesan'),
(13, '08:00:00', 'KKAN01', 'terpesan'),
(14, '08:20:00', 'KKAN01', 'kosong'),
(15, '08:40:00', 'KKAN01', 'terpesan'),
(16, '09:00:00', 'KKAN01', 'terpesan'),
(17, '09:20:00', 'KKAN01', 'kosong'),
(18, '09:40:00', 'KKAN01', 'terpesan'),
(19, '08:00:00', 'KKJ01', 'kosong'),
(20, '08:20:00', 'KKJ01', 'terpesan'),
(21, '08:40:00', 'KKJ01', 'kosong'),
(22, '09:00:00', 'KKJ01', 'terpesan'),
(23, '09:20:00', 'KKJ01', 'kosong'),
(24, '09:40:00', 'KKJ01', 'terpesan'),
(25, '08:00:00', 'KKBK01', 'kosong'),
(26, '08:20:00', 'KKBK01', 'kosong'),
(27, '08:40:00', 'KKBK01', 'kosong'),
(28, '09:00:00', 'KKBK01', 'kosong'),
(29, '09:20:00', 'KKBK01', 'kosong'),
(30, '09:40:00', 'KKBK01', 'kosong'),
(31, '08:00:00', 'KKKK01', 'terpesan'),
(32, '08:20:00', 'KKKK01', 'kosong'),
(33, '08:40:00', 'KKKK01', 'kosong'),
(34, '09:00:00', 'KKKK01', 'terpesan'),
(35, '09:20:00', 'KKKK01', 'terpesan'),
(36, '09:40:00', 'KKKK01', 'kosong'),
(43, '08:00:00', 'KKPR01', 'kosong'),
(44, '08:20:00', 'KKPR01', 'terpesan'),
(45, '08:40:00', 'KKPR01', 'kosong'),
(46, '09:00:00', 'KKPR01', 'terpesan'),
(47, '09:20:00', 'KKPR01', 'kosong'),
(48, '09:40:00', 'KKPR01', 'terpesan'),
(49, '08:00:00', 'KKTHT01', 'kosong'),
(50, '08:20:00', 'KKTHT01', 'kosong'),
(51, '08:40:00', 'KKTHT01', 'kosong'),
(52, '09:00:00', 'KKTHT01', 'terpesan'),
(53, '09:20:00', 'KKTHT01', 'kosong'),
(54, '09:40:00', 'KKTHT01', 'terpesan'),
(61, '08:00:00', 'KKMT01', 'kosong'),
(62, '08:20:00', 'KKMT01', 'kosong'),
(63, '08:40:00', 'KKMT01', 'kosong'),
(64, '09:00:00', 'KKMT01', 'kosong'),
(65, '09:20:00', 'KKMT01', 'kosong'),
(66, '09:40:00', 'KKMT01', 'kosong'),
(67, '08:00:00', 'KKGM01', 'kosong'),
(68, '08:20:00', 'KKGM01', 'kosong'),
(69, '08:40:00', 'KKGM01', 'kosong'),
(70, '09:00:00', 'KKGM01', 'kosong'),
(71, '09:20:00', 'KKGM01', 'terpesan'),
(72, '09:40:00', 'KKGM01', 'terpesan'),
(79, '08:00:00', 'KPG01', 'kosong'),
(80, '08:20:00', 'KPG01', 'kosong'),
(81, '08:40:00', 'KPG01', 'kosong'),
(82, '09:00:00', 'KPG01', 'kosong'),
(83, '09:20:00', 'KPG01', 'kosong'),
(84, '09:40:00', 'KPG01', 'kosong'),
(85, '08:00:00', 'KKC01', 'kosong'),
(86, '08:20:00', 'KKC01', 'kosong'),
(87, '08:40:00', 'KKC01', 'kosong'),
(88, '09:00:00', 'KKC01', 'kosong'),
(89, '09:20:00', 'KKC01', 'kosong'),
(90, '09:40:00', 'KKC01', 'kosong'),
(91, '08:00:00', 'KPK01', 'kosong'),
(92, '08:20:00', 'KPK01', 'kosong'),
(93, '08:40:00', 'KPK01', 'kosong'),
(94, '09:00:00', 'KPK01', 'kosong'),
(95, '09:20:00', 'KPK01', 'kosong'),
(96, '09:40:00', 'KPK01', 'kosong'),
(97, '08:00:00', 'KKBN01', 'kosong'),
(98, '08:20:00', 'KKBN01', 'terpesan'),
(99, '08:40:00', 'KKBN01', 'kosong'),
(100, '09:00:00', 'KKBN01', 'terpesan'),
(101, '09:20:00', 'KKBN01', 'kosong'),
(102, '09:40:00', 'KKBN01', 'kosong'),
(109, '08:00:00', 'KKAM01', 'kosong'),
(110, '08:20:00', 'KKAM01', 'kosong'),
(111, '08:40:00', 'KKAM01', 'kosong'),
(112, '09:00:00', 'KKAM01', 'kosong'),
(113, '09:20:00', 'KKAM01', 'terpesan'),
(114, '09:40:00', 'KKAM01', 'kosong'),
(115, '08:00:00', 'KKU01', 'kosong'),
(116, '08:20:00', 'KKU01', 'terpesan'),
(117, '08:40:00', 'KKU01', 'kosong'),
(118, '09:00:00', 'KKU01', 'kosong'),
(119, '09:20:00', 'KKU01', 'kosong'),
(120, '09:40:00', 'KKU01', 'kosong'),
(121, '08:00:00', 'KKLS01', 'kosong'),
(122, '08:20:00', 'KKLS01', 'kosong'),
(123, '08:40:00', 'KKLS01', 'terpesan'),
(124, '09:00:00', 'KKLS01', 'kosong'),
(125, '09:20:00', 'KKLS01', 'terpesan'),
(126, '09:40:00', 'KKLS01', 'terpesan'),
(139, '08:00:00', 'KKRD01', 'kosong'),
(140, '08:20:00', 'KKRD01', 'terpesan'),
(141, '08:40:00', 'KKRD01', 'kosong'),
(142, '09:00:00', 'KKRD01', 'terpesan'),
(143, '09:20:00', 'KKRD01', 'kosong'),
(144, '09:40:00', 'KKRD01', 'kosong'),
(145, '08:00:00', 'KUSG01', 'kosong'),
(146, '08:20:00', 'KUSG01', 'kosong'),
(147, '08:40:00', 'KUSG01', 'kosong'),
(148, '09:00:00', 'KUSG01', 'kosong'),
(149, '09:20:00', 'KUSG01', 'kosong'),
(150, '09:40:00', 'KUSG01', 'kosong'),
(163, '08:00:00', 'KKFS01', 'kosong'),
(164, '08:20:00', 'KKFS01', 'kosong'),
(165, '08:40:00', 'KKFS01', 'kosong'),
(166, '09:00:00', 'KKFS01', 'kosong'),
(167, '09:20:00', 'KKFS01', 'kosong'),
(168, '09:40:00', 'KKFS01', 'kosong'),
(169, '08:00:00', 'KKKB01', 'kosong'),
(170, '08:20:00', 'KKKB01', 'kosong'),
(171, '08:40:00', 'KKKB01', 'kosong'),
(172, '09:00:00', 'KKKB01', 'kosong'),
(173, '09:20:00', 'KKKB01', 'kosong'),
(174, '09:40:00', 'KKKB01', 'kosong'),
(175, '08:00:00', 'KKG02', 'terpesan'),
(176, '08:20:00', 'KKG02', 'kosong'),
(177, '08:40:00', 'KKG02', 'kosong'),
(178, '09:00:00', 'KKG02', 'kosong'),
(179, '09:20:00', 'KKG02', 'kosong'),
(180, '09:40:00', 'KKG02', 'kosong'),
(187, '08:00:00', 'KIMN01', 'kosong'),
(188, '08:20:00', 'KIMN01', 'kosong'),
(189, '08:40:00', 'KIMN01', 'kosong'),
(190, '09:00:00', 'KIMN01', 'kosong'),
(191, '09:20:00', 'KIMN01', 'kosong'),
(192, '09:40:00', 'KIMN01', 'kosong');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
