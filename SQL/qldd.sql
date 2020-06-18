-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 11:26 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qldd`
--

-- --------------------------------------------------------

--
-- Table structure for table `dienthoai`
--

CREATE TABLE IF NOT EXISTS `dienthoai` (
`MaDT` int(11) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `TenDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `ThongTin` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `dienthoai`
--

INSERT INTO `dienthoai` (`MaDT`, `MaLoai`, `TenDT`, `GiaBan`, `ThongTin`, `Hinh`) VALUES
(1, 2, 'Nokia', 1500000, 'Hồng xanh dương', '1.jpg'),
(2, 3, 'SamSung', 2500000, 'đen', '2.jpg'),
(3, 1, 'iphone', 6000000, 'xanh', '3.jpg'),
(4, 1, 'iphone', 60000, 'đen', '4.jpg'),
(5, 4, 'Xiaomi', 12000000, 'trắng', '5.jpg'),
(6, 6, 'Sony', 600000, 'vàng', '6.jpg'),
(7, 5, 'Huwei', 2543543, 'đỏ', '7.jpg'),
(8, 5, 'Huwei', 76543, 'vàng', '8.jpg'),
(9, 6, 'Sony', 2543543, 'đen', '9.jpg'),
(10, 2, 'Nokia', 5500000, 'đen', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
`MaHD` int(11) NOT NULL,
  `NgayDat` datetime NOT NULL,
  `NoiGiao` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `MaKH` int(5) NOT NULL,
  `TinhTrang` enum('Chờ đặt','Đã đặt','Đã giao hàng','Hủy') COLLATE utf8_unicode_ci NOT NULL,
  `MaDT` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `NgayDat`, `NoiGiao`, `MaKH`, `TinhTrang`, `MaDT`, `SoLuong`, `TongTien`) VALUES
(48, '2019-05-01 09:58:00', '351 Lạc Long Quân', 43, 'Đã đặt', 2, 1, 0),
(49, '2019-05-01 09:58:46', '351 Lạc Long Quân', 43, 'Đã đặt', 3, 1, 0),
(50, '2019-05-01 10:26:30', '351 Lạc Long Quân', 43, 'Đã đặt', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `TenDN` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` int(11) DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
`MaKH` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`TenDN`, `MatKhau`, `HoTen`, `DiaChi`, `DienThoai`, `Email`, `MaKH`) VALUES
('admin', 'quy', 'Hoàng Quý', '351 Lạc Long Quân', 961514580, 'quy@123', 43),
('hoangquy', 'admin', 'Hoàng Văn Quý', 'Quận 11', 912824004, 'admin@gmail.com', 44),
('Quy', 'admin', 'Hoàng Văn', 'Quận 11', 912824004, '@123', 45),
('hoangquy123', '123', 'Hoàng Văn Quý', 'Quận 11', 12345678, '@123', 46);

-- --------------------------------------------------------

--
-- Table structure for table `loaidt`
--

CREATE TABLE IF NOT EXISTS `loaidt` (
`MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `loaidt`
--

INSERT INTO `loaidt` (`MaLoai`, `TenLoai`) VALUES
(1, 'Iphone'),
(2, 'Nokia'),
(3, 'Samsung'),
(4, 'Xiaomi'),
(5, 'Huawei'),
(6, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `minichat`
--

CREATE TABLE IF NOT EXISTS `minichat` (
`id` int(11) NOT NULL,
  `nickname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=76 ;

--
-- Dumping data for table `minichat`
--

INSERT INTO `minichat` (`id`, `nickname`, `message`) VALUES
(58, 'thÃ nh', 'bÃ¡n Ä‘iá»‡n thoáº¡i'),
(59, 'nhÆ°', 'giÃ¡ 1280'),
(60, 'nhÆ°', 'giÃ¡ 1280'),
(61, 'nhÆ°', 'giÃ¡ 1280'),
(62, 'admin', 'mua Ä‘iá»‡n thoai'),
(63, 'admin1', 'mua Ä‘iá»‡n thoáº¡i'),
(64, 'admin1', 'mua Ä‘iá»‡n thoáº¡i'),
(65, 'quy', 'giÃ¡ 1800'),
(66, 'quy', 'mua Ä‘iá»‡n thoai'),
(67, 'thÃ nh', 'mua Ä‘iá»‡n thoai'),
(68, '', ''),
(69, 'admin', 'bÃ¡n Ä‘iá»‡n thoáº¡i'),
(70, 'admin', 'mua Ä‘iá»‡n thoai'),
(71, 'admin', 'mua Ä‘iá»‡n thoai'),
(72, 'admin', 'ban'),
(73, 'admin', 'ban'),
(74, 'admin', 'ban'),
(75, 'admin', 'quy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dienthoai`
--
ALTER TABLE `dienthoai`
 ADD PRIMARY KEY (`MaDT`), ADD KEY `maLoai` (`MaLoai`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
 ADD PRIMARY KEY (`MaHD`), ADD KEY `maKH` (`MaKH`), ADD KEY `fk_hd` (`MaDT`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
 ADD PRIMARY KEY (`MaKH`);

--
-- Indexes for table `loaidt`
--
ALTER TABLE `loaidt`
 ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `minichat`
--
ALTER TABLE `minichat`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dienthoai`
--
ALTER TABLE `dienthoai`
MODIFY `MaDT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `loaidt`
--
ALTER TABLE `loaidt`
MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `minichat`
--
ALTER TABLE `minichat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dienthoai`
--
ALTER TABLE `dienthoai`
ADD CONSTRAINT `hoa_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaidt` (`MaLoai`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `hoa_ibfk_2` FOREIGN KEY (`MaLoai`) REFERENCES `loaidt` (`MaLoai`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
ADD CONSTRAINT `fk_hd` FOREIGN KEY (`MaDT`) REFERENCES `dienthoai` (`MaDT`),
ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
