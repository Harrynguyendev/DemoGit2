-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2020 at 06:52 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan1`
--

DROP TABLE IF EXISTS `binhluan1`;
CREATE TABLE IF NOT EXISTS `binhluan1` (
  `mabl` int(11) NOT NULL AUTO_INCREMENT,
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` date NOT NULL,
  `noidung` text NOT NULL,
  PRIMARY KEY (`mabl`),
  KEY `fk_bl_mahh` (`mahh`),
  KEY `fk_bl_kh` (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `binhluan1`
--

INSERT INTO `binhluan1` (`mabl`, `mahh`, `makh`, `ngaybl`, `noidung`) VALUES
(1, 3, 7, '2020-08-14', '  gghnn'),
(2, 4, 7, '2020-08-14', '  nhẹ và đẹp'),
(3, 3, 5, '2020-08-14', 'lịch sự, nhã nhặn'),
(4, 3, 5, '2020-08-14', '  đẹp và lịch sự'),
(5, 3, 5, '2020-08-14', '  đẹp và lịch sự'),
(6, 3, 5, '2020-08-14', '  đẹp và lịch sự'),
(7, 3, 5, '2020-08-14', '  đẹp và lịch sự'),
(8, 3, 5, '2020-08-14', '  dfgdfsg'),
(9, 3, 5, '2020-08-14', '  dfgdfsg'),
(10, 3, 5, '2020-08-14', '  dfgdfsg'),
(11, 3, 5, '2020-08-14', '  dfgdfsg'),
(12, 3, 5, '2020-08-14', '  dfgdfsg'),
(13, 3, 5, '2020-08-14', '  hello'),
(14, 3, 5, '2020-08-14', '  hello'),
(15, 3, 5, '2020-08-14', '  hello');

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon1`
--

DROP TABLE IF EXISTS `cthoadon1`;
CREATE TABLE IF NOT EXISTS `cthoadon1` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` int(3) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  PRIMARY KEY (`masohd`,`mahh`),
  KEY `fk_cthd_mahh` (`mahh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cthoadon1`
--

INSERT INTO `cthoadon1` (`masohd`, `mahh`, `soluongmua`, `mausac`, `size`, `thanhtien`, `tinhtrang`) VALUES
(7, 3, 2, 'Màu Hồng', 35, 1090000, 0),
(9, 3, 2, ' Màu Hồng', 35, 1090000, 0),
(9, 12, 2, 'Màu Be ', 0, 1150000, 0),
(10, 9, 2, 'Màu Kem ', 38, 1490000, 0),
(10, 15, 1, 'Màu Xám Nhạt ', 37, 545000, 0),
(11, 9, 2, 'Màu Kem ', 38, 1490000, 0),
(11, 15, 1, 'Màu Xám Nhạt ', 37, 545000, 0),
(12, 9, 2, 'Màu Kem ', 38, 1490000, 0),
(12, 15, 1, 'Màu Xám Nhạt ', 37, 545000, 0),
(13, 2, 1, 'Màu Trắng', 0, 545000, 0),
(13, 24, 3, 'Màu Đen ', 38, 1800000, 0),
(14, 2, 1, 'Màu Trắng', 0, 545000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

DROP TABLE IF EXISTS `hanghoa`;
CREATE TABLE IF NOT EXISTS `hanghoa` (
  `mahh` int(11) NOT NULL AUTO_INCREMENT,
  `tenhh` varchar(60) NOT NULL,
  `dongia` float NOT NULL,
  `giamgia` float NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `Nhom` int(4) NOT NULL,
  `maloai` int(11) NOT NULL,
  `dacbiet` bit(1) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `soluongton` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` int(3) NOT NULL,
  PRIMARY KEY (`mahh`),
  KEY `FK_hanghoa_maloai` (`maloai`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `dongia`, `giamgia`, `hinh`, `Nhom`, `maloai`, `dacbiet`, `soluotxem`, `ngaylap`, `mota`, `soluongton`, `mausac`, `size`) VALUES
(1, 'Giày Slingback Canvas', 545000, 0, '1.jpg', 0, 1, b'1', 5, '2020-08-08', 'Vải bố và da nhân tạo. Phù hợp đi làm, đi tiệc và đi chơi', 50, 'Màu Trắng', 35),
(2, 'Giày Slingback Canvas', 545000, 0, '2.jpg', 0, 1, b'1', 3, '2020-08-08', 'Vải bố và da nhân tạo. Phù hợp đi làm, đi tiệc và đi chơi', 50, ' Màu Hồng', 35),
(3, 'Giày Slingback Canvas  ', 545000, 300000, '3.jpg', 0, 1, b'0', 4, '2020-08-08', 'Vải bố và da nhân tạo. Phù hợp đi làm, đi tiệc và đi chơi', 50, 'Màu Xanh Navy ', 36),
(4, 'Giày Sandal Bệt Mũi Nhọn', 545000, 0, '4.jpg', 1, 3, b'0', 1, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 50, ' Màu Be Đậm ', 36),
(5, 'Giày Sandal Bệt Mũi Nhọn ', 525000, 0, '5.jpg', 1, 3, b'1', 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 50, 'Màu Xanh Navy ', 37),
(6, 'Giày Sandal Bệt Mũi Nhọn', 525000, 0, '6.jpg', 1, 3, b'0', 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học', 50, 'Màu Đen ', 36),
(9, 'Giày Sneaker Neon Light 2 ', 745000, 0, '7.jpg', 2, 5, b'1', 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 50, 'Màu Trắng ', 38),
(10, 'Giày Sneaker Neon Light 2 ', 745000, 0, '8.jpg', 2, 5, b'1', 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 50, 'Màu Kem ', 37),
(11, 'Giày Cao Gót Bít Mũi Nhọn', 575000, 0, '9.jpg', 3, 1, b'0', 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 50, 'Màu Be ', 38),
(12, 'Giày Cao Gót Neon Light ', 575000, 350000, '10.jpg', 3, 1, b'0', 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 50, 'Màu Đen ', 38),
(15, 'Giày Slingback Mũi Nhọn Quai Co Giãn ', 545000, 0, '11.jpg', 4, 1, b'0', 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 50, 'Màu Xám Nhạt ', 37),
(16, 'Giày Slingback Mũi Nhọn Quai Co Giãn', 545000, 300000, '12.jpg', 4, 1, b'0', 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 50, 'Màu Hồng Đậm ', 37),
(17, 'Giày Slingback Mũi Nhọn Quai Co Giãn ', 545000, 0, '13.jpg', 4, 1, b'1', 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 50, 'Màu Đen ', 38),
(18, 'Dép Quai Chữ V Đan Chéo Vân Cá Sấu ', 495000, 300000, '14.jpg', 5, 8, b'0', 1, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 50, 'Xanh Bạc Hà ', 37),
(19, 'Dép Quai Chữ V Đan Chéo Vân Cá Sấu', 495000, 0, '15.jpg', 5, 8, b'1', 1, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 50, 'Màu Vàng Đậm ', 35),
(20, 'Dép Quai Chữ V Đan Chéo Vân Cá Sấu', 495000, 0, '16.jpg', 5, 8, b'0', 1, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 50, 'Màu Đen', 36),
(21, 'Giày Búp Bê Đính Nơ Phối Họa Tiết Nhiệt Đới', 525000, 0, '21.jpg', 4, 4, b'0', 1, '2020-08-15', 'Giày Búp Bê Đính Nơ Phối Họa Tiết Nhiệt Đới. Thích hợp đi làm, du lịch, đi dạo phố', 50, 'Màu vàng', 35),
(22, 'giày búp bê', 5000000, 50000, '22.jpg', 1, 4, b'0', 1, '2020-08-04', 'Thoải mái, đẹp', 23, 'Màu vàng nâu', 36),
(24, 'Giày cao gót - vàng', 600000, 0, '24.jpg', 3, 7, b'1', 1, '2020-07-04', 'Thời trang đi tiệc, đi chơi, dạ hội', 12, 'Xanh đen', 38);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon1`
--

DROP TABLE IF EXISTS `hoadon1`;
CREATE TABLE IF NOT EXISTS `hoadon1` (
  `masohd` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL,
  PRIMARY KEY (`masohd`),
  KEY `fk_hoadon_kh` (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon1`
--

INSERT INTO `hoadon1` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(1, 7, '2020-08-13', 2240000),
(2, 7, '2020-08-13', 2240000),
(3, 7, '2020-08-13', 2240000),
(4, 7, '2020-08-13', 2240000),
(5, 7, '2020-08-13', 2240000),
(6, 7, '2020-08-13', 2240000),
(7, 7, '2020-08-13', 2240000),
(8, 7, '2020-08-13', 2240000),
(9, 7, '2020-08-13', 2240000),
(10, 7, '2020-08-13', 2035000),
(11, 7, '2020-08-13', 2035000),
(12, 7, '2020-08-13', 2035000),
(13, 5, '2020-09-02', 545000),
(14, 7, '2020-09-09', 545000);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang1`
--

DROP TABLE IF EXISTS `khachhang1`;
CREATE TABLE IF NOT EXISTS `khachhang1` (
  `makh` int(11) NOT NULL AUTO_INCREMENT,
  `tenkh` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `vaitro` int(1) DEFAULT 0,
  PRIMARY KEY (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang1`
--

INSERT INTO `khachhang1` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`, `vaitro`) VALUES
(3, 'a', 'a', '202cb962ac59075b964b07152d234b70', 'a@gmail.com', '', '', 0),
(4, 'a', 'a', '202cb962ac59075b964b07152d234b70', 'a@gmail.com', '', '', 0),
(5, 'an', 'an', '202cb962ac59075b964b07152d234b70', 'an@gmail.com', '', '', 0),
(6, 'an', 'an', '202cb962ac59075b964b07152d234b70', 'an@gmail.com', '', '', 0),
(7, 'Nguyên', 'nguyen', '202cb962ac59075b964b07152d234b70', 'nguyen@gmail.com', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `maloai` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(50) NOT NULL,
  `idmenu` int(11) NOT NULL,
  PRIMARY KEY (`maloai`),
  KEY `FK_loai_menu` (`idmenu`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`) VALUES
(1, 'Giày Cao Gót', 3),
(3, 'Giày Sandals', 3),
(4, 'Giày Búp Bê', 3),
(5, 'Giày Sneaker', 3),
(6, 'Giày Boots', 3),
(7, 'Giày Da Thật', 3),
(8, 'Giày Lười', 3),
(10, 'Túi da', 4),
(13, 'túi da', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `link` varchar(150) NOT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idmenu`, `name`, `link`) VALUES
(1, 'Trang Chủ', 'index.php'),
(3, 'Giày', ''),
(4, 'Túi Xách', 'View/sanphamtui.php'),
(5, 'Liên Hệ', 'View/lienhe.php'),
(6, 'Tài Khoản', 'View/gioithieu.php');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan1`
--
ALTER TABLE `binhluan1`
  ADD CONSTRAINT `fk_bl_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang1` (`makh`),
  ADD CONSTRAINT `fk_bl_mahh` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`);

--
-- Constraints for table `cthoadon1`
--
ALTER TABLE `cthoadon1`
  ADD CONSTRAINT `fk_cthd_mahd` FOREIGN KEY (`masohd`) REFERENCES `hoadon1` (`masohd`),
  ADD CONSTRAINT `fk_cthd_mahh` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `FK_hanghoa_maloai` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`);

--
-- Constraints for table `hoadon1`
--
ALTER TABLE `hoadon1`
  ADD CONSTRAINT `fk_hoadon_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang1` (`makh`);

--
-- Constraints for table `loai`
--
ALTER TABLE `loai`
  ADD CONSTRAINT `FK_loai_menu` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
