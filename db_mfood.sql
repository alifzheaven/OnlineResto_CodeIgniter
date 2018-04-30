-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Mei 2017 pada 19.44
-- Versi Server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_mfood`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_menu_id` int(11) DEFAULT NULL,
  `detail_menu_nama` varchar(100) DEFAULT NULL,
  `detail_harjul` double DEFAULT NULL,
  `detail_porsi` int(11) DEFAULT NULL,
  `detail_subtotal` double DEFAULT NULL,
  `detail_inv_no` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `detail_inv_no` (`detail_inv_no`),
  KEY `detail_menu_id` (`detail_menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `tbl_detail`
--

INSERT INTO `tbl_detail` (`detail_id`, `detail_menu_id`, `detail_menu_nama`, `detail_harjul`, `detail_porsi`, `detail_subtotal`, `detail_inv_no`) VALUES
(3, 5, 'Menu 4', 17000, 1, 17000, 'INV2112161'),
(4, 3, 'Menu 2', 18000, 1, 18000, 'INV211216112162'),
(5, 5, 'Menu 4', 17000, 1, 17000, 'INV211216112162'),
(6, 6, 'Menu 5', 20000, 1, 20000, 'INV211216112163'),
(7, 2, 'Menu 1', 18000, 1, 18000, 'INV211216112164'),
(8, 2, 'Menu 1', 18000, 1, 18000, 'INV211216112165'),
(9, 3, 'Menu 2', 18000, 1, 18000, 'INV211216112166'),
(10, 5, 'Menu 4', 17000, 2, 34000, 'INV211216112167'),
(11, 10, 'menu 9', 20000, 1, 20000, 'INV221216000001'),
(12, 5, 'Menu 4', 17000, 1, 17000, 'INV231216000001'),
(13, 4, 'Menu 3', 20000, 1, 20000, 'INV231216000002'),
(14, 5, 'Menu 4', 17000, 1, 17000, 'INV251216000001'),
(15, 5, 'Menu 4', 17000, 2, 34000, 'INV070517000001'),
(16, 3, 'Menu 2', 18000, 1, 18000, 'INV070517000001'),
(17, 2, 'Menu 1', 18000, 1, 18000, 'INV070517000002'),
(18, 5, 'Menu 4', 17000, 1, 17000, 'INV070517000002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri`
--

CREATE TABLE IF NOT EXISTS `tbl_galeri` (
  `galeri_id` int(11) NOT NULL AUTO_INCREMENT,
  `galeri_judul` varchar(100) DEFAULT NULL,
  `galeri_deskripsi` varchar(200) DEFAULT NULL,
  `galeri_gambar` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`galeri_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`galeri_id`, `galeri_judul`, `galeri_deskripsi`, `galeri_gambar`) VALUES
(1, 'Judul Gallery', 'Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi.', 'file_1482157998.jpg'),
(2, 'Judul Gallery', 'Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi.', 'file_1482158023.jpg'),
(3, 'Judul Gallery', 'Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi.', 'file_1482158031.jpg'),
(4, 'Judul Gallery', 'Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi.', 'file_1482158044.jpg'),
(5, 'Judul Gallery', 'Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi.', 'file_1482158055.jpg'),
(6, 'Es Coklat Mint', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi.', 'file_1494172386.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_invoice`
--

CREATE TABLE IF NOT EXISTS `tbl_invoice` (
  `inv_no` varchar(15) NOT NULL,
  `inv_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `inv_plg_id` int(11) DEFAULT NULL,
  `inv_plg_nama` varchar(80) DEFAULT NULL,
  `inv_status` varchar(40) DEFAULT NULL,
  `inv_total` double DEFAULT NULL,
  `inv_rek_id` varchar(10) DEFAULT NULL,
  `inv_rek_no` varchar(60) DEFAULT NULL,
  `inv_rek_bank` varchar(30) DEFAULT NULL,
  `inv_rek_nama` varchar(50) DEFAULT NULL,
  `inv_rek_cabang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`inv_no`),
  KEY `inv_plg_id` (`inv_plg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`inv_no`, `inv_tanggal`, `inv_plg_id`, `inv_plg_nama`, `inv_status`, `inv_total`, `inv_rek_id`, `inv_rek_no`, `inv_rek_bank`, `inv_rek_nama`, `inv_rek_cabang`) VALUES
('INV070517000001', '2017-05-07 09:14:22', 1, 'M Fikri Setiadi', 'Transaksi Selesai', 52000, 'COD', NULL, NULL, NULL, NULL),
('INV070517000002', '2017-05-07 09:16:25', 1, 'M Fikri Setiadi', 'Transaksi Selesai', 35000, '002', '548501007458536', 'BRI', 'M Fikri Setiadi', 'Padang'),
('INV2112160', '2016-11-21 01:59:10', 1, 'M Fikri Setiadi', 'Menunggu Konfirmasi', 17000, '003', NULL, 'Mandiri', NULL, NULL),
('INV2112161', '2016-11-21 02:00:35', 1, 'M Fikri Setiadi', 'Menunggu Konfirmasi', 17000, '003', NULL, 'Mandiri', NULL, NULL),
('INV211216112162', '2016-11-21 02:32:21', 1, 'M Fikri Setiadi', 'Menunggu Konfirmasi', 35000, 'COD', NULL, NULL, NULL, NULL),
('INV211216112163', '2016-12-21 03:24:22', 1, 'M Fikri Setiadi', 'Konfirmasi Tidak Valid', 20000, '003', NULL, 'Mandiri', NULL, NULL),
('INV211216112164', '2016-12-21 03:42:27', 1, 'M Fikri Setiadi', 'Menunggu Konfirmasi', 18000, '003', '', 'Mandiri', '', ''),
('INV211216112165', '2016-12-21 03:44:55', 1, 'M Fikri Setiadi', 'Dalam Pengiriman', 18000, '002', '1497385798375', 'BRI', 'M Fikri Setiadi', 'Padang'),
('INV211216112166', '2016-12-21 04:45:59', 1, 'M Fikri Setiadi', 'Menunggu Konfirmasi', 18000, 'COD', NULL, NULL, NULL, NULL),
('INV211216112167', '2016-12-22 07:38:28', 1, 'M Fikri Setiadi', 'Menunggu Konfirmasi', 34000, '003', '1497385798375', 'Mandiri', 'M Fikri Setiadi', 'Padang'),
('INV221216000001', '2016-12-22 13:10:38', 10, 'dedi', 'Pembayaran Selesai', 20000, '002', '1497385798375', 'BCA', 'M Fikri Setiadi', 'Padang'),
('INV231216000001', '2016-12-23 05:22:50', 1, 'M Fikri Setiadi', 'Pembayaran Selesai', 17000, '002', '1497385798375', 'BCA', 'M Fikri Setiadi', 'Padang'),
('INV231216000002', '2016-12-23 05:23:27', 1, 'M Fikri Setiadi', 'Transaksi Selesai', 20000, 'COD', NULL, NULL, NULL, NULL),
('INV251216000001', '2016-12-25 06:24:41', 10, 'dedi', 'Transaksi Selesai', 17000, 'COD', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konfirmasi`
--

CREATE TABLE IF NOT EXISTS `tbl_konfirmasi` (
  `konfirmasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `konfirmasi_invoice` varchar(15) DEFAULT NULL,
  `konfirmasi_nama` varchar(60) DEFAULT NULL,
  `konfirmasi_bank` varchar(50) DEFAULT NULL,
  `konfirmasi_jumlah` double DEFAULT NULL,
  `konfirmasi_bukti` varchar(20) DEFAULT NULL,
  `konfirmasi_status` int(11) DEFAULT '0',
  `konfirmasi_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`konfirmasi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_konfirmasi`
--

INSERT INTO `tbl_konfirmasi` (`konfirmasi_id`, `konfirmasi_invoice`, `konfirmasi_nama`, `konfirmasi_bank`, `konfirmasi_jumlah`, `konfirmasi_bukti`, `konfirmasi_status`, `konfirmasi_tanggal`) VALUES
(1, 'INV231216000001', 'M Fikri Setiadi', 'Bank BRI', 100000, 'file_1494171423.jpg', 1, '2017-05-07 15:37:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nama` varchar(100) DEFAULT NULL,
  `menu_deskripsi` varchar(200) DEFAULT NULL,
  `menu_harga_lama` double DEFAULT NULL,
  `menu_harga_baru` double DEFAULT NULL,
  `menu_likes` int(11) DEFAULT '0',
  `menu_kategori_id` int(11) DEFAULT NULL,
  `menu_kategori_nama` varchar(30) DEFAULT NULL,
  `menu_status` int(11) DEFAULT '1',
  `menu_gambar` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `menu_kategori_id` (`menu_kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_nama`, `menu_deskripsi`, `menu_harga_lama`, `menu_harga_baru`, `menu_likes`, `menu_kategori_id`, `menu_kategori_nama`, `menu_status`, `menu_gambar`) VALUES
(2, 'Menu 1', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', 20000, 18000, 11, 1, 'Makanan', 1, 'file_1481423289.jpg'),
(3, 'Sate Madura', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', 20000, 18000, 3, 1, 'Makanan', 1, 'file_1481423323.jpg'),
(4, 'Burger', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 20000, 0, 1, 'Makanan', 1, 'file_1481423391.jpg'),
(5, 'Pizza', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', 20000, 17000, 4, 1, 'Makanan', 1, 'file_1481423407.jpg'),
(6, 'Menu 5', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 20000, 0, 1, 'Makanan', 1, 'file_1481423428.jpg'),
(7, 'Menu 6', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 20000, 0, 1, 'Makanan', 1, 'file_1481505660.jpg'),
(9, 'Manu 8', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 20000, 0, 1, 'Makanan', 1, 'file_1481505718.jpg'),
(10, 'menu 9', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 20000, 1, 1, 'Makanan', 1, 'file_1481505737.jpg'),
(11, 'Coklat Hangat', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 12000, 0, 2, 'Minuman', 1, 'file_1494160941.jpg'),
(12, 'Es Coklat Mint', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', 16000, 15000, 0, 2, 'Minuman', 1, 'file_1494160974.jpg'),
(13, 'Ice Lemon', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 12000, 0, 2, 'Minuman', 1, 'file_1494161014.jpg'),
(14, 'Es Semangka', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 12000, 0, 2, 'Minuman', 1, 'file_1494161073.jpg'),
(15, 'Coca Cola Dingin', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 10000, 0, 2, 'Minuman', 1, 'file_1494161100.jpg'),
(16, 'Kopi Latte', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 14000, 0, 2, 'Minuman', 1, 'file_1494161133.jpg'),
(17, 'Kopi Latte Moca', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 15000, 0, 2, 'Minuman', 1, 'file_1494161156.jpg'),
(18, 'Kwetiau', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 16000, 0, 1, 'Makanan', 1, 'file_1494161185.jpg'),
(19, 'Rendang', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 20000, 0, 1, 'Makanan', 1, 'file_1494161206.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tbl_pelanggan` (
  `plg_id` int(11) NOT NULL AUTO_INCREMENT,
  `plg_nama` varchar(80) DEFAULT NULL,
  `plg_alamat` varchar(60) DEFAULT NULL,
  `plg_jenkel` varchar(2) DEFAULT NULL,
  `plg_notelp` varchar(30) DEFAULT NULL,
  `plg_email` varchar(40) DEFAULT NULL,
  `plg_facebook` varchar(30) DEFAULT NULL,
  `plg_instagram` varchar(30) DEFAULT NULL,
  `plg_line` varchar(30) DEFAULT NULL,
  `plg_whatapp` varchar(30) DEFAULT NULL,
  `plg_path` varchar(30) DEFAULT NULL,
  `plg_photo` varchar(20) DEFAULT NULL,
  `plg_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `plg_password` varchar(35) DEFAULT NULL,
  `plg_status` int(11) DEFAULT '0',
  PRIMARY KEY (`plg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`plg_id`, `plg_nama`, `plg_alamat`, `plg_jenkel`, `plg_notelp`, `plg_email`, `plg_facebook`, `plg_instagram`, `plg_line`, `plg_whatapp`, `plg_path`, `plg_photo`, `plg_register`, `plg_password`, `plg_status`) VALUES
(1, 'M Fikri Setiadi', 'Padang', 'L', '081277159401', 'setiadi@mfikri.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-01 03:39:00', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'Daria Setvsova', 'Rusia', 'P', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-01 03:39:14', 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 'Valeria Dubravina', 'Rusia', 'P', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-09 03:39:15', 'e10adc3949ba59abbe56e057f20f883e', 0),
(4, 'Elanor Rigby', 'Rusia', 'P', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-11 03:39:17', 'e10adc3949ba59abbe56e057f20f883e', 0),
(5, 'Svetlana Sorokina', 'Rusia', 'P', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-11 03:39:18', 'e10adc3949ba59abbe56e057f20f883e', 0),
(6, 'Nika Jurov', 'Slovenia', 'P', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-11 03:39:20', 'e10adc3949ba59abbe56e057f20f883e', 0),
(7, 'Angle Gustov', 'Paland', 'P', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-11 03:39:21', 'e10adc3949ba59abbe56e057f20f883e', 0),
(8, 'Thomas Muller', 'Germany', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-11 03:39:22', 'e10adc3949ba59abbe56e057f20f883e', 0),
(9, 'Kevin De Bruyne', 'Belgia', 'L', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-11 03:39:25', 'e10adc3949ba59abbe56e057f20f883e', 0),
(10, 'dedi', 'Jl. Bunda VI ulak karang padang', 'L', '082169071552', 'hp3.andespen@gmail.com', 'D.irawan', 'D.irawan', 'D.irawan', 'D.irawan', 'D.irawan', 'file_1482412219.jpg', '2016-10-22 13:10:19', 'c02a1084e241dc98962150a81dfc0e0d', 1),
(11, 'Jack Welch', 'USA', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-23 05:58:00', 'e10adc3949ba59abbe56e057f20f883e', 0),
(12, 'Jim Rohn', 'USA', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:00:57', 'e10adc3949ba59abbe56e057f20f883e', 0),
(13, 'Jhon Medina', 'USA', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:00:58', 'e10adc3949ba59abbe56e057f20f883e', 0),
(14, 'Iarmalenko', 'Swedia', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:01:01', 'e10adc3949ba59abbe56e057f20f883e', 0),
(15, 'Irma Cantika', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:01:03', 'e10adc3949ba59abbe56e057f20f883e', 0),
(16, 'Nadia Cantika', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:04:12', 'e10adc3949ba59abbe56e057f20f883e', 0),
(17, 'Suci Ningsih', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:04:16', 'e10adc3949ba59abbe56e057f20f883e', 0),
(18, 'Putri Lubis', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:04:19', 'e10adc3949ba59abbe56e057f20f883e', 0),
(19, 'Julian', 'Padang', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:04:21', 'e10adc3949ba59abbe56e057f20f883e', 0),
(20, 'Toni', 'Padang', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:04:24', 'e10adc3949ba59abbe56e057f20f883e', 0),
(21, 'Mega', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:04:26', 'e10adc3949ba59abbe56e057f20f883e', 0),
(22, 'Weny', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-12-23 06:04:28', 'e10adc3949ba59abbe56e057f20f883e', 0),
(23, 'Dhea', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-12-23 06:04:31', 'e10adc3949ba59abbe56e057f20f883e', 0),
(24, 'Santi', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-12-23 06:04:33', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE IF NOT EXISTS `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengguna_nama` varchar(60) DEFAULT NULL,
  `pengguna_jenkel` varchar(2) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) DEFAULT NULL,
  `pengguna_email` varchar(50) DEFAULT NULL,
  `pengguna_nohp` varchar(30) DEFAULT NULL,
  `pengguna_status` int(2) DEFAULT '1',
  `pengguna_level` varchar(2) DEFAULT NULL,
  `pengguna_photo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pengguna_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_jenkel`, `pengguna_username`, `pengguna_password`, `pengguna_email`, `pengguna_nohp`, `pengguna_status`, `pengguna_level`, `pengguna_photo`) VALUES
(2, 'M Fikri Setiadi', 'L', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'fikri@mahakaryapromosindo.co.id', '081277159401', 1, '1', 'file_1481349520.jpg'),
(4, 'Lewandowski', 'L', 'lewi', '4df6440357caf5c160adf1c4fbf930c3', 'lewi09@gmail.com', '01834596956', 1, '1', 'file_1481372007.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekening`
--

CREATE TABLE IF NOT EXISTS `tbl_rekening` (
  `rek_id` varchar(10) NOT NULL,
  `rek_no` varchar(60) DEFAULT NULL,
  `rek_nama` varchar(50) DEFAULT NULL,
  `rek_bank` varchar(30) DEFAULT NULL,
  `rek_cabang` varchar(50) DEFAULT NULL,
  `rek_logo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`rek_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`rek_id`, `rek_no`, `rek_nama`, `rek_bank`, `rek_cabang`, `rek_logo`) VALUES
('001', '1497385798375', 'M Fikri Setiadi', 'BCA', 'Padang', 'file_1482154688.png'),
('002', '548501007458536', 'M Fikri Setiadi', 'BRI', 'Padang', 'file_1482156414.png'),
('003', '1497385798375', 'M Fikri Setiadi', 'Mandiri', 'Padang', 'file_1482154772.png'),
('004', '1497385798375', 'M Fikri Setiadi', 'Syariah Mandiri', 'Padang', 'file_1482154795.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status`
--

CREATE TABLE IF NOT EXISTS `tbl_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_nama` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status_nama`) VALUES
(1, 'Menunggu Konfirmasi'),
(2, 'Menunggu Pembayaran'),
(3, 'Pembayaran Selesai'),
(4, 'Dalam Pembuatan'),
(5, 'Dalam Pengemasan'),
(6, 'Dalam Pengiriman'),
(7, 'Transaksi Selesai');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_detail`
--
ALTER TABLE `tbl_detail`
  ADD CONSTRAINT `tbl_detail_ibfk_1` FOREIGN KEY (`detail_inv_no`) REFERENCES `tbl_invoice` (`inv_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_ibfk_2` FOREIGN KEY (`detail_menu_id`) REFERENCES `tbl_menu` (`menu_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `tbl_invoice_ibfk_1` FOREIGN KEY (`inv_plg_id`) REFERENCES `tbl_pelanggan` (`plg_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD CONSTRAINT `tbl_menu_ibfk_1` FOREIGN KEY (`menu_kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
