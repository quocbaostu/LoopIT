-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 10:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_loopit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `id_chitietdh` int(11) NOT NULL,
  `id_dichvu` char(10) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `soluong` int(11) DEFAULT 0,
  `dongia` varchar(255) DEFAULT NULL,
  `thanhtien` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`id_chitietdh`, `id_dichvu`, `id_donhang`, `soluong`, `dongia`, `thanhtien`) VALUES
(1, 'dv1', 2, 2, '1900000', '3800000'),
(2, 'dv3', 3, 1, '3000000', '3000000'),
(3, 'dv3', 4, 1, '3000000', '3000000'),
(4, 'dv1', 5, 1, '1900000', '1900000'),
(5, 'dv3', 5, 1, '3000000', '3000000'),
(6, 'dv2', 6, 1, '5500000', '5500000'),
(7, 'dv3', 6, 2, '3000000', '6000000'),
(9, 'dv8', 8, 2, '2400000', '4800000'),
(10, 'dv1', 9, 1, '1900000', '1900000'),
(11, 'dv3', 9, 1, '3000000', '3000000'),
(12, 'dv8', 9, 1, '2400000', '2400000'),
(15, 'dv1', 11, 1, '1900000', '1900000'),
(16, 'dv3', 11, 2, '3000000', '6000000'),
(17, 'dv2', 12, 1, '5500000', '5500000'),
(18, 'dv4', 12, 1, '8500000', '8500000'),
(19, 'dv8', 12, 1, '2400000', '2400000'),
(20, 'dv3', 13, 2, '3000000', '6000000'),
(21, 'dv1', 14, 2, '1900000', '3800000'),
(22, 'dv3', 15, 2, '3000000', '6000000'),
(23, 'dv2', 16, 1, '5500000', '5500000'),
(24, 'dv4', 17, 1, '8500000', '8500000'),
(25, 'dv7', 18, 1, '15000000', '15000000'),
(33, 'dv1', 22, 1, '1900000', '1900000'),
(34, 'dv3', 22, 1, '3000000', '3000000'),
(35, 'dv8', 22, 1, '2400000', '2400000'),
(36, 'dv2', 23, 1, '5500000', '5500000'),
(37, 'dv4', 23, 1, '8500000', '8500000'),
(38, 'dv8', 23, 1, '2400000', '2400000'),
(39, 'dv8', 24, 1, '2400000', '2400000'),
(40, 'dv1', 25, 1, '1900000', '1900000'),
(41, 'dv7', 26, 2, '15000000', '30000000'),
(42, 'dv7', 27, 1, '15000000', '15000000'),
(43, 'dv7', 28, 1, '15000000', '15000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chucvu`
--

CREATE TABLE `tbl_chucvu` (
  `id_chucvu` char(10) NOT NULL,
  `tenchucvu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_chucvu`
--

INSERT INTO `tbl_chucvu` (`id_chucvu`, `tenchucvu`) VALUES
('admin', 'Admin Page'),
('nvqt', 'Nhân viên quản trị');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_congviecbaocao`
--

CREATE TABLE `tbl_congviecbaocao` (
  `id_baocao` int(11) NOT NULL,
  `noidung_baocao` varchar(255) DEFAULT NULL,
  `ngaybaocao` varchar(255) DEFAULT NULL,
  `id_uv` char(10) NOT NULL,
  `id_tintd` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_congviecdaluu`
--

CREATE TABLE `tbl_congviecdaluu` (
  `id_cvdaluu` int(11) NOT NULL,
  `id_tintd` char(10) NOT NULL,
  `id_uv` char(10) NOT NULL,
  `thoigianluu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_congviecgoiy`
--

CREATE TABLE `tbl_congviecgoiy` (
  `id_goiy` int(11) NOT NULL,
  `capbac` varchar(255) DEFAULT NULL,
  `loaicongviec` varchar(255) DEFAULT NULL,
  `nganhnghe` varchar(255) DEFAULT NULL,
  `thanhpho` varchar(255) DEFAULT NULL,
  `trinhdo` varchar(45) DEFAULT NULL,
  `kinhnghiem` varchar(45) DEFAULT NULL,
  `mucluong` varchar(45) DEFAULT NULL,
  `id_uv` char(10) NOT NULL,
  `trangthaixem` int(11) DEFAULT NULL,
  `thoigiantao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_congviecgoiy`
--

INSERT INTO `tbl_congviecgoiy` (`id_goiy`, `capbac`, `loaicongviec`, `nganhnghe`, `thanhpho`, `trinhdo`, `kinhnghiem`, `mucluong`, `id_uv`, `trangthaixem`, `thoigiantao`) VALUES
(25, NULL, NULL, 'Bảo trì/Sửa chữa', 'An Giang', NULL, NULL, NULL, 'uv117', 0, '2022-01-20 15:40:14'),
(30, NULL, NULL, NULL, 'Hồ Chí Minh', NULL, NULL, NULL, 'uv169', 0, '2022-01-21 13:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cv`
--

CREATE TABLE `tbl_cv` (
  `id_cv` char(10) NOT NULL,
  `tieudecv` varchar(255) DEFAULT NULL,
  `loaicv` varchar(255) DEFAULT NULL,
  `tenfile` varchar(255) DEFAULT NULL,
  `trangthaicv` int(11) DEFAULT 1,
  `maucv` varchar(255) DEFAULT NULL,
  `mauchu_lh` varchar(255) DEFAULT NULL,
  `mauchu_nd` varchar(255) DEFAULT NULL,
  `thoigiancapnhat` varchar(255) DEFAULT NULL,
  `hinhdaidien` varchar(255) DEFAULT NULL,
  `thetukhoa` varchar(255) DEFAULT NULL,
  `capbacht` varchar(255) DEFAULT NULL,
  `chucdanhht` varchar(255) DEFAULT NULL,
  `sonamkn` varchar(255) DEFAULT NULL,
  `mucluongmm` varchar(255) DEFAULT NULL,
  `id_uv` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cv`
--

INSERT INTO `tbl_cv` (`id_cv`, `tieudecv`, `loaicv`, `tenfile`, `trangthaicv`, `maucv`, `mauchu_lh`, `mauchu_nd`, `thoigiancapnhat`, `hinhdaidien`, `thetukhoa`, `capbacht`, `chucdanhht`, `sonamkn`, `mucluongmm`, `id_uv`) VALUES
('cv1', 'Marketing Manager / Brand Manager', 'file', '7AJyDMiquFTran-E-TopCV.vn-210122.114548.pdf', 2, NULL, NULL, NULL, '2022-01-21 11:46:54', NULL, 'Marketing, Brand Manager', 'Trưởng phòng', 'Quản Lý', '3', '3200', 'uv169'),
('cv101', 'Nhân viên kế toán', 'online', 'LoopIT-KXtekJnadE9UfEw.pdf', 2, '#3498DB', '#34495E', '#34495E', '2022-01-21 11:20:11', NULL, 'Kế toán', 'Trưởng phòng', 'Nhân viên kế toán', '6', '1300', 'uv117'),
('cv149', 'Nhân viên văn phòng bộ phận Nhân sự', 'file', '3yCWROAzAbHoa-B-TopCV.vn-210122.115637.pdf', 2, NULL, NULL, NULL, '2022-01-21 11:57:09', NULL, 'Nhân sự', 'Nhân viên', 'Nhân viên', '2', '900', 'uv7'),
('cv158', 'Giáo viên Tiếng Anh', 'file', 'kBapd9KYUSAnh-T-TopCV.vn-200122.132429.pdf', 2, NULL, NULL, NULL, '2022-01-20 13:26:08', NULL, 'English, Giáo viên', 'Nhân viên', 'Giáo viên', '2', '1000', 'uv108'),
('cv162', 'Sales Admin', 'online', 'LoopIT-cTePJrmWLa5bAJs.pdf', 2, '#4BDBB5', '#147259', '#4BDBB5', '2022-01-21 11:41:56', NULL, 'Sales', 'Trưởng phòng', 'Giám sát bán hàng', '2', '2000', 'uv169'),
('cv163', 'Nhân viên bán hàng', 'file', 'fqCwFX4midMai-D-TopCV.vn-210122.110219.pdf', 2, NULL, NULL, NULL, '2022-01-21 11:03:26', NULL, 'Bán hàng', 'Nhân viên', 'Nhân viên bán hàng', '2', '900', 'uv108'),
('cv169', 'Kỹ sư cơ điện tử', 'online', 'LoopIT-nXpGfaBfyi9XXzI.pdf', 2, '#C0392B', '#3498DB', '#3498DB', '2022-01-20 15:10:30', NULL, 'Cơ điện tử, Kỹ thuật cao', 'Nhân viên', 'Nhân viên kỹ thuật', '1', '1000', 'uv168'),
('cv170', 'Chuyên viên khách hàng', 'online', 'LoopIT-NmScyHR8YKQrc3s.pdf', 2, '#2C3E50', '#2ECC71', '#4BDBB5', '2022-01-21 10:56:26', NULL, 'Khách hàng', 'Nhân viên', 'Nhân viên', '2', '1300', 'uv108'),
('cv173', 'Java developer', 'file', 'uxKtMHlnF1LONG-H-TopCV.vn-210122.114848.pdf', 2, NULL, NULL, NULL, '2022-01-21 11:49:54', NULL, 'Java', 'Nhân viên', 'Java Developer', '4', '3500', 'uv180'),
('cv183', 'Chuyên viên nhân sự', 'online', 'LoopIT-edYQwEucPxWzPht.pdf', 2, '#4BDBB5', '#147259', '#4BDBB5', '2022-01-21 11:55:59', NULL, 'Nhân sự', 'Trưởng phòng', 'Quản Lý', '5', '1200', 'uv7'),
('cv191', 'Nhân viên chăm sóc khách hàng', 'online', 'LoopIT-vEr0eMS0nVr1Ua8.pdf', 2, '#4BDBB5', '#147259', '#4BDBB5', '2022-01-21 11:11:28', 'I80nU1a520sTAU40bKRQgWytB8bzch_5e44dba323b98_cvtpl.jpg', 'Chăm sóc khác hàng, Dịch vụ', 'Nhân viên', 'Nhân viên chăm sóc khách hàng', '2', '1200', 'uv117'),
('cv196', 'Nhân viên vận hành', 'file', 'Yoftu0CGP2Hao-N-TopCV.vn-200122.151053.pdf', 2, NULL, NULL, NULL, '2022-01-20 15:12:05', NULL, '', 'Trưởng phòng', 'Trường phòng điều hành', '7', '3000', 'uv168'),
('cv2', 'Nhân viên tư vấn khách hàng', 'online', 'LoopIT-WaHWhI9j2SUPAPm.pdf', 2, '#3498DB', '#F1C40F', '#F1C40F', '2022-01-21 11:07:34', 'CF0od8qjWbMZwDrzSgRc0fu59EtLKh_61e90028b5f75_cvtpl.jpg', 'Tư vấn', 'Trưởng phòng', 'Trường phòng tư vấn', '4', '2000', 'uv114'),
('cv27', 'Electrical Engineer', 'online', 'LoopIT-84JkHcAwOFGkJxd.pdf', 2, '#3498DB', '#F1C40F', '#F1C40F', '2022-01-21 11:33:13', NULL, 'Electrical Engineer', 'Trưởng phòng', 'Enginneer', '3', '2000', 'uv168'),
('cv28', 'Giáo viên Tiếng Hàn', 'online', 'LoopIT-08U1SrTnL94eEaU.pdf', 2, '#2ECC71', '#2980B9', '#2980B9', '2022-01-20 13:31:06', 'lXfrmAsyP1Tom_Holland.jpg', 'Ngoại ngữ, Tiếng Hàn, Hàn Quốc', 'Nhân viên', 'Giáo viên tiếng Hàn', '2', '1200', 'uv108'),
('cv34', 'Thông dịch viên Tiếng Trung', 'file', 'UN8mABg9X8Phuong-T-TopCV.vn-200122.150104.pdf', 2, NULL, NULL, NULL, '2022-01-20 15:02:09', NULL, 'Tiếng Trung, Thông dịch', 'Nhân viên', 'Thông dịch viên', '3', '1200', 'uv114'),
('cv74', 'Nhân viên kinh doanh', 'file', 'Ro9Y40RIjEGiao-T-TopCV.vn-200122.151859.pdf', 2, NULL, NULL, NULL, '2022-01-20 15:19:35', NULL, 'Kinh doanh, Quản trị', 'Nhân viên', 'Nhân viên kinh doanh', '2', '1500', 'uv117'),
('cv81', 'Software Engineer', 'online', 'LoopIT-SG1kzEO2cNahP2h.pdf', 2, '#3498DB', '#F1C40F', '#F1C40F', '2022-01-21 11:52:18', NULL, 'Software Engineer', 'Nhân viên', 'Software Engineer', '2', '4000', 'uv180'),
('cv86', 'Nhâ viên phục vụ nhà hàng', 'file', 'JLQbxNVTPtNhi-T-TopCV.vn-210122.111442.pdf', 2, NULL, NULL, NULL, '2022-01-21 11:15:57', NULL, 'Nhà hàng, Phục vụ', 'Mới tốt nghiệp', 'Thực tập', '1', '500', 'uv117');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cvuvdaluu`
--

CREATE TABLE `tbl_cvuvdaluu` (
  `id_CVdaluu` int(11) NOT NULL,
  `id_ntd` char(10) NOT NULL,
  `id_cv` char(10) NOT NULL,
  `trangthai_cvdaluu` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cvuvdaluu`
--

INSERT INTO `tbl_cvuvdaluu` (`id_CVdaluu`, `id_ntd`, `id_cv`, `trangthai_cvdaluu`) VALUES
(6, '8Xzp665890', 'cv2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cvuvdaungtuyen`
--

CREATE TABLE `tbl_cvuvdaungtuyen` (
  `id_CVdaut` int(11) NOT NULL,
  `id_tintd` char(10) NOT NULL,
  `id_cv` char(10) NOT NULL,
  `trangthai_danhgia` int(11) DEFAULT 1,
  `nhanxet` varchar(255) DEFAULT NULL,
  `ngayhenphongvan` varchar(255) DEFAULT NULL,
  `thoigiannop` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dichvu`
--

CREATE TABLE `tbl_dichvu` (
  `id_dichvu` char(10) NOT NULL,
  `tendv` varchar(255) NOT NULL,
  `giadv` int(11) NOT NULL,
  `motadv` text NOT NULL,
  `loaidv` int(11) DEFAULT NULL,
  `songayhieuluc` int(11) DEFAULT NULL,
  `diemtk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dichvu`
--

INSERT INTO `tbl_dichvu` (`id_dichvu`, `tendv`, `giadv`, `motadv`, `loaidv`, `songayhieuluc`, `diemtk`) VALUES
('dv1', 'Gói đăng tin tuyển dụng 1 tháng', 1900000, '<ul>\n	<li>\n	<p>Nhà tuyển dụng được đăng tuyển thêm tin tuyển dụng.</p>\n	</li>\n	<li>\n	<p>Số lượng tin tuyển dụng tối đa tăng thành 10.</p>\n	</li>\n	<li>\n	<p>Thời gian hiệu lực 30 ngày ~ 1 tháng.</p>\n	</li>\n</ul>\n\n', 1, 30, 0),
('dv2', 'Gói đăng tin tuyển dụng 3 tháng', 5500000, '<ul>\n	<li>\n	<p>Nhà tuyển dụng được đăng tuyển thêm tin tuyển dụng.</p>\n	</li>\n	<li>\n	<p>Số lượng tin tuyển dụng tối đa tăng thành 30.</p>\n	</li>\n	<li>\n	<p>Thời gian hiệu lực 90 ngày ~ 3 tháng.</p>\n	</li>\n</ul>', 1, 90, 0),
('dv3', 'Gói tìm kiếm hồ sơ ứng viên 100 điểm', 3000000, '<ul>\r\n	<li>\r\n	<p>Nhà tuyển dụng được dùng điểm trong gói này để xem CV và thông tin liên hệ trong hồ sơ của ứng viên tìm kiếm được.</p>\r\n	</li>\r\n	<li>\r\n	<p>Số điểm 100.</p>\r\n	</li>\r\n</ul>', 2, 0, 100),
('dv4', 'Gói tìm kiếm hồ sơ ứng viên 300 điểm', 8500000, '<ul>\r\n	<li>\r\n	<p>Nhà tuyển dụng được dùng điểm trong gói này để xem CV và thông tin liên hệ trong hồ sơ của ứng viên tìm kiếm được.</p>\r\n	</li>\r\n	<li>\r\n	<p>Số điểm 300.</p>\r\n	</li>\r\n</ul>', 2, 0, 300),
('dv5', 'Gói đăng tin tuyển dụng 6 tháng', 10500000, '<ul>\r\n	<li>Nhà tuyển dụng được đăng tuyển thêm tin tuyển dụng.</li>\r\n	<li>Số lượng tin tuyển dụng tối đa tăng thành 60.</li>\r\n	<li>Thời gian hiệu lực 180&nbsp;ngày ~ 6&nbsp;tháng.</li>\r\n</ul>', 1, 180, 0),
('dv6', 'Gói tìm kiếm hồ sơ ứng viên 600 điểm', 15000000, '<ul>\n	<li>Nhà tuyển dụng được dùng điểm trong gói này để xem CV và thông tin liên hệ trong hồ sơ của ứng viên tìm kiếm được.</li>\n	<li>Số điểm 600.</li>\n</ul>', 2, 0, 600),
('dv7', 'Gói đăng tin tuyển dụng 9 tháng', 15000000, '<ul>\r\n	<li>Nhà tuyển dụng được đăng tuyển thêm tin tuyển dụng.</li>\r\n	<li>Số lượng tin tuyển dụng tối đa tăng thành 90.</li>\r\n	<li>Thời gian hiệu lực 270 ngày ~ 6 tháng.</li>\r\n</ul>', 1, 270, 0),
('dv8', 'Gói hỗ trợ hiển thị tin tuyển dụng tại trang chủ 1 tháng', 2400000, '<ul>\r\n	<li>Các tin tuyển dụng của Nhà tuyển dụng sẽ được hỗ trợ hiển thị tại các mục:\r\n	<ul>\r\n		<li>Việc làm tuyển gấp.</li>\r\n		<li>Việc làm hấp dẫn.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Thời gian hiệu lực 30 ngày ~ 1 tháng.<br />\r\n	&nbsp;</li>\r\n</ul>', 3, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dichvudadangky`
--

CREATE TABLE `tbl_dichvudadangky` (
  `id_dvdadk` int(11) NOT NULL,
  `id_ntd` char(10) NOT NULL,
  `id_dichvu` char(10) NOT NULL,
  `ngaydangky` varchar(255) DEFAULT NULL,
  `ngayhethan` varchar(255) DEFAULT NULL,
  `trangthai_dvdadk` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dichvudadangky`
--

INSERT INTO `tbl_dichvudadangky` (`id_dvdadk`, `id_ntd`, `id_dichvu`, `ngaydangky`, `ngayhethan`, `trangthai_dvdadk`) VALUES
(1, 'w4olx67036', 'dv1', '2022-01-17 22:48:32', '2022-05-21 22:48:32', 1),
(2, 'w4olx67036', 'dv3', '2021-12-21 11:24:03', '0', 1),
(3, 'g7qak86689', 'dv1', '2022-01-20 14:22:30', '2022-02-20 14:22:30', 1),
(4, 'g7qak86689', 'dv3', '2021-12-21 20:51:02', '0', 1),
(5, 'w4olx67036', 'dv2', '2022-01-17 22:54:33', '2022-06-20 22:54:33', 1),
(6, 'w4olx67036', 'dv8', '2022-01-12 00:26:13', '2022-04-03 00:26:13', 1),
(9, 'w4olx67036', 'dv7', '2022-01-20 22:33:00', '2023-07-12 22:33:00', 1),
(10, 'w4olx67036', 'dv4', '2022-01-17 23:12:15', '0', 1),
(18, '8Xzp665890', 'dv1', '2022-01-20 12:16:51', '2022-02-19 12:16:51', 1),
(19, '8Xzp665890', 'dv3', '2022-01-20 12:16:51', '0', 1),
(20, '8Xzp665890', 'dv8', '2022-01-20 12:16:51', '2022-02-19 12:16:51', 1),
(21, 'AKIZa27233', 'dv2', '2022-01-20 12:19:28', '2022-04-20 12:19:28', 1),
(22, 'AKIZa27233', 'dv4', '2022-01-20 12:19:28', '0', 1),
(23, 'AKIZa27233', 'dv8', '2022-01-20 12:19:28', '2022-02-19 12:19:28', 1),
(24, 'g7qak86689', 'dv8', '2022-01-20 14:21:47', '2022-02-19 14:21:47', 1),
(25, 'K4INf88934', 'dv7', '2022-01-20 22:29:05', '2023-07-14 22:29:05', 1),
(26, 'AKIZa27233', 'dv7', '2022-01-20 23:33:02', '2022-10-17 23:33:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id_donhang` int(11) NOT NULL,
  `ngaymua` varchar(255) DEFAULT NULL,
  `hinhthucthanhtoan` int(11) DEFAULT NULL,
  `trangthaidh` int(11) DEFAULT 0,
  `qtv` varchar(255) DEFAULT NULL,
  `id_ntd` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id_donhang`, `ngaymua`, `hinhthucthanhtoan`, `trangthaidh`, `qtv`, `id_ntd`) VALUES
(2, '2021-12-21 11:23:01', 1, 1, NULL, 'w4olx67036'),
(3, '2021-12-21 11:23:27', 1, 1, NULL, 'w4olx67036'),
(4, '2021-12-21 11:24:03', 1, 1, NULL, 'w4olx67036'),
(5, '2021-12-21 20:51:02', 1, 1, NULL, 'g7qak86689'),
(6, '2021-12-22 21:30:41', 1, 1, NULL, 'w4olx67036'),
(8, '2022-01-02 01:59:29', 1, 1, NULL, 'w4olx67036'),
(9, '2022-01-12 00:26:13', 1, 1, NULL, 'w4olx67036'),
(11, '2022-01-17 17:00:26', 2, 1, NULL, 'w4olx67036'),
(12, '2022-01-17 17:04:04', 2, 0, NULL, 'w4olx67036'),
(13, '2022-01-17 22:14:45', 2, 1, NULL, 'w4olx67036'),
(14, '2022-01-17 22:45:00', 2, 1, NULL, 'w4olx67036'),
(15, '2022-01-17 22:45:38', 2, 1, NULL, 'w4olx67036'),
(16, '2022-01-17 22:51:43', 2, 1, NULL, 'w4olx67036'),
(17, '2022-01-17 22:59:11', 2, 1, NULL, 'w4olx67036'),
(18, '2022-01-17 23:11:08', 1, 1, NULL, 'w4olx67036'),
(22, '2022-01-20 12:16:51', 1, 1, NULL, '8Xzp665890'),
(23, '2022-01-20 12:18:46', 2, 1, NULL, 'AKIZa27233'),
(24, '2022-01-20 14:21:41', 2, 1, NULL, 'g7qak86689'),
(25, '2022-01-20 14:22:25', 2, 1, NULL, 'g7qak86689'),
(26, '2022-01-20 22:29:05', 1, 1, NULL, 'K4INf88934'),
(27, '2022-01-20 22:33:00', 1, 1, NULL, 'w4olx67036'),
(28, '2022-01-20 23:33:02', 1, 1, NULL, 'AKIZa27233');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hocvan`
--

CREATE TABLE `tbl_hocvan` (
  `id_hocvan` char(10) NOT NULL,
  `chuyennganh` varchar(255) NOT NULL,
  `truong` varchar(255) NOT NULL,
  `bangcap` varchar(45) NOT NULL,
  `ngaybd` varchar(45) DEFAULT NULL,
  `ngaykt` varchar(45) DEFAULT NULL,
  `mota` varchar(500) DEFAULT NULL,
  `id_uv` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hocvan`
--

INSERT INTO `tbl_hocvan` (`id_hocvan`, `chuyennganh`, `truong`, `bangcap`, `ngaybd`, `ngaykt`, `mota`, `id_uv`) VALUES
('hvan71', 'Cơ điện tử', 'Đại học công nghiệp hà nội', 'Cao đẳng', '2016-09', '2021-04', NULL, 'uv168');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hosontd`
--

CREATE TABLE `tbl_hosontd` (
  `id_hosontd` char(10) NOT NULL,
  `tencty` varchar(255) DEFAULT NULL,
  `diachicty` varchar(255) DEFAULT NULL,
  `thanhpho` varchar(255) DEFAULT NULL,
  `quymo` varchar(45) DEFAULT NULL,
  `linhvuchd` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `id_ntd` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hosontd`
--

INSERT INTO `tbl_hosontd` (`id_hosontd`, `tencty`, `diachicty`, `thanhpho`, `quymo`, `linhvuchd`, `mota`, `logo`, `website`, `id_ntd`) VALUES
('BbAaD96133', 'FPT SOFTWARE', 'Lô T2, đường D1, khu Công nghệ cao, Quận 9', 'Hồ Chí Minh', 'Trên 300 người', 'IT - Phần mềm', '<p>FPT Software - the Software Powerhouse • Vietnam\'s largest and one of the fastest growing software outsourcing companies. • Over 6,000 software outsourcing projects and a total volume of 2.5 million man-days in the last 10 years. • A broad presence in diverse global markets. • Specialist in shaping world-class networks of global delivery center</p>', 'TNpBu9K6COfpt-logo.png', 'career.fpt-software.com/us/', 'hyYOl18072'),
('iuoye41357', 'KFC VIETNAM JOINT VENTURE CO., LTD.', 'Level 12, Blue Sky Office Tower - 1 Bach Dang St., Ward 2, Tan Binh Dist', 'Hồ Chí Minh', '20 - 150 người', 'Bán lẻ - Hàng tiêu dùng - FMCG', '<p>With over 20 years of building and developing Kentucky Fried Chicken restaurants in Vietnam under the global standard of Yum! International, KFC Vietnam is on the way of consecutive growth and conquering at potential cities and provinces. Our plan from now on, KFC Vietnam will open up to 200 restaurants across the country and we will provide more than 7000 thousand jobs and training opportunities for people in Vietnam. The successful accomplishments that KFC Vietnam has acquired today coming from our people who are living and working with the spirit of “How We Win Together” for the mission of making KFC Vietnam become a great place to work. \"People Promise\" at KFC Vietnam: BE YOUR BEST SELF: - Career Path - Every employee as a Development Plan - Accredited Training/Continuing Education MAKE A DIFFERENT:</p>', 'ajai2LnLy9kfc-viet-nam-57bd14e0ec396_rs.jpg', 'https://www.kfcvietnam.com.vn/', 'AKIZa27233'),
('PfmwD13969', 'TẬP ĐOÀN VINGROUP - CÔNG TY CP', 'Số 7, đường Bằng Lăng 1, Khu đô thị Vinhomes Riverside, Long Biên', 'Hà Nội', 'Trên 300 người', 'Chứng khoán', '<p>Tiền thân của Vingroup là Tập đoàn Technocom, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, Technocom trở về Việt Nam, tập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là Vinpearl và Vincom. Đến tháng 1/2012, Công ty CP Vincom và Công ty CP Vinpearl sáp nhập, chính thức hoạt động dưới mô hình Tập đoàn với tên gọi Tập đoàn Vingroup – Công ty CP.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Vingroup là một trong những Tập đoàn kinh tế tư nhân đa ngành lớn nhất châu Á với giá trị vốn hóa thị trường đạt gần 16 tỷ đô la Mỹ. Tập đoàn hoạt động trong 3 lĩnh vực kinh doanh cốt lõi, bao gồm:</p>\r\n\r\n<p>- Công nghệ</p>\r\n\r\n<p>- Công nghiệp</p>\r\n\r\n<p>- Thương mại Dịch vụ</p>\r\n\r\n<p>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo tiêu chuẩn quốc tế và những trải nghiệm hoàn toàn mới về phong cách sống hiện đại, ở bất cứ lĩnh vực nào Vingroup cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng tiêu dùng.</p>', 'WSiG8BOZdMvin.png', 'https://tuyendung.vingroup.net/', 'K4INf88934'),
('twNlU76951', 'ITNC AG', 'Hữu Nghĩa, Xuân Phú, Tịnh Biên', 'An Giang', '20 - 150 người', 'Agency (Design/Development)', '<p>Công ty cổ phần&nbsp;ITNC AG là một công ty công nghệ chuyên xây dựng, bảo trì, phát triển, design các ứng dụng&nbsp;web-di động dựa trên các công nghệ hiện đại.</p>', 'kY89B4NWfNit-logo-FE092B1010-seeklogo.png', 'huu-group-ITNC-AG.company.com', 'w4olx67036'),
('UVRDZ79150', 'CÔNG TY CỔ PHẦN SMARTOSC', '4 Võ Văn Dũng, Chợ Dừa, Đống Đa', 'Hà Nội', '150 - 300 người', 'IT - Phần mềm', '<p>Được thành lập năm 2006, SmartOSC là công ty hàng đầu cung cấp các giải pháp toàn diện về Thương Mại Điện Tử trên nền tảng Magento, Sitecore, Adobe, Hybris, Kentico mang tính hiệu quả cao, từ việc thiết kế cho đến xây dựng các chiến lược kinh doanh hay quản lý hoạt động ở các cửa hàng. Hiện này, SmartOSC đã cung cấp giải pháp cho hơn 500 khách hàng trên toàn thế giới gồm nhiều hãng nổi tiếng như Lotte, Courts, PayPal, Boozt, SpaceX, Smartbox, eWAY, Priceline Pharmacy, Club 21, Delta Apparel.</p>\r\n\r\n<p>SmartOSC đang phát triển nhanh chóng hơn 800 nhân viên tại trụ sở chính Hà Nội và chi nhánh Hồ Chí Minh cùng với các văn phòng đại diện tại Nhật Bản, Úc, Singapore, Mỹ và Anh. Với số lượng khách hàng đa dạng tại Nhật Bản, Đông Nam Á, Bắc Mỹ và Châu Âu, SmartOSC đã chứng minh được khả năng của mình trong việc giúp các công ty nắm bắt lấy cơ hội phát triển trên thị trường kinh doanh trực tuyến và hướng đến mục tiêu trở thành nhà cung cấp các giải pháp thương mại điện tử chất lượng hàng đầu.</p>', '0T8ClNuQOlcong-ty-co-phan-smartosc-61d50e76c4aec.png', 'smartosc-copany.soc.com', 'g7qak86689'),
('VHwBF18771', 'CÔNG TY TNHH I-GLOCAL', 'Phòng 1206, Tầng 12, Tòa nhà VP Indochina Plaza Hanoi, 241 Xuân Thủy, Dịch Vọng Hậu, Cầu Giấy', 'Hà Nội', 'Trên 300 người', 'Kế toán / Kiểm toán', '<p>I-GLOCAL là tập đoàn tư vấn chuyên nghiệp trong lĩnh vực Thuế- Kế toán- Đầu tư cho các doanh nghiệp tại khu vực Việt Nam và Cambodia.</p>\r\n\r\n<p>Thành lập từ 2003 tại Việt Nam, chúng tôi hiện là tập đoàn tư vấn dẫn đầu cả về số lượng khách hàng và số lượng dự án tư vấn đầu tư cho các doanh nghiệp Nhật Bản hoạt động tại Việt Nam.</p>\r\n\r\n<p>Để làm được điều này, đầu tiên, chúng tôi muốn tri ân đội ngũ nhân sự đã gắn bó cùng công ty trong nhiều năm vừa qua.</p>\r\n\r\n<p>Đồng thời, chúng tôi cam kết sẽ tiếp tục phấn đấu để luôn là “Một tập đoàn tư vấn vượt mức mong đợi” của khách hàng và xã hội.</p>\r\n\r\n<p>Chúng tôi rất mong tiếp tục nhận được sự ủng hộ của quý khách hàng.inh doanh trọn gói</p>', 'vdXG2ktsIYcong-ty-tnhh-i-glocal.png', 'https://www.i-glocal.com', '8Xzp665890'),
('x0D8d62005', 'Công ty Cổ phần Tập đoàn Hoa Sen', '183 Nguyễn Văn Trỗi, P.10, Quận Phú Nhuận', 'Hồ Chí Minh', 'Trên 300 người', 'Xây dựng', '<p>Công ty Cổ Phần Tập Đoàn Hoa Sen là một Doanh nghiệp chuyên sản xuất và kinh doanh Tôn – Thép – Ống Nhựa - Sản phẩm Thương mại với hơn 600 chi nhánh trải dài trên cả nước.</p>\r\n\r\n<p>Quy mô: Từ 5.000-10.000 người.</p>\r\n\r\n<p>Chúng tôi tự hào về một nền văn hóa Doanh nghiệp đặc biệt gắn liền với sự phát triển bản thân và chia sẻ lợi ích – gánh vác trách nhiệm xã hội trên nền tảng: “Trung thực – Cộng đồng – Phát triển\"</p>', 'oBnJrAoFhpcong-ty-co-phan-tap-doan-hoa-sen-5abef8f2b83d1_rs.jpg', 'https://hoasengroup.vn', 'VkQNF92335');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kinhnghiem`
--

CREATE TABLE `tbl_kinhnghiem` (
  `id_kinhnghiem` char(10) NOT NULL,
  `chucdanh` varchar(255) DEFAULT NULL,
  `congty` varchar(255) DEFAULT NULL,
  `ngaybd` varchar(45) DEFAULT NULL,
  `ngaykt` varchar(45) DEFAULT NULL,
  `mota` varchar(500) DEFAULT NULL,
  `id_uv` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kinhnghiem`
--

INSERT INTO `tbl_kinhnghiem` (`id_kinhnghiem`, `chucdanh`, `congty`, `ngaybd`, `ngaykt`, `mota`, `id_uv`) VALUES
('kn179', 'Thực tập Sinh', 'Công ty THHH Lê Hà', '2021-01', '2022-10', NULL, 'uv168');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loainganhnghe`
--

CREATE TABLE `tbl_loainganhnghe` (
  `id_lnn` int(11) NOT NULL,
  `tenloainn` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_loainganhnghe`
--

INSERT INTO `tbl_loainganhnghe` (`id_lnn`, `tenloainn`) VALUES
(1, 'Agency (Design/Development)'),
(2, 'Agency (Marketing/Advertising)'),
(3, 'Bán lẻ - Hàng tiêu dùng - FMCG'),
(4, 'Bảo hiểm'),
(5, 'Bảo trì / Sửa chữa'),
(6, 'Bất động sản'),
(7, 'Chứng khoán'),
(8, 'Cơ khí'),
(9, 'Cơ quan nhà nước'),
(10, 'Du lịch'),
(11, 'Dược phẩm / Y tế / Công nghệ sinh học'),
(12, 'Điện tử / Điện lạnh'),
(13, 'Giải trí'),
(14, 'Giáo dục / Đào tạo'),
(15, 'In ấn / Xuất bản'),
(16, 'Internet / Online'),
(17, 'IT - Phần cứng'),
(18, 'IT - Phần mềm'),
(19, 'Kế toán / Kiểm toán'),
(20, 'Kinh doanh'),
(21, 'Logistics - Vận tải'),
(22, 'Luật'),
(23, 'Marketing / Truyền thông / Quảng cáo'),
(24, 'Môi trường'),
(25, 'Năng lượng'),
(26, 'Ngân hàng'),
(27, 'Nhà hàng / Khách sạn'),
(28, 'Nhân sự'),
(29, 'Nông Lâm Ngư nghiệp'),
(30, 'Sản xuất'),
(31, 'Tài chính'),
(32, 'Thiết kế / kiến trúc'),
(33, 'Thời trang'),
(34, 'Thương mại điện tử'),
(35, 'Tổ chức phi lợi nhuận'),
(36, 'Tự động hóa'),
(37, 'Tư vấn'),
(38, 'Viễn thông'),
(39, 'Xây dựng'),
(40, 'Xuất nhập khẩu'),
(41, 'Khác');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nganhnghe`
--

CREATE TABLE `tbl_nganhnghe` (
  `id_nganhnghe` int(11) NOT NULL,
  `tennganhnghe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_nganhnghe`
--

INSERT INTO `tbl_nganhnghe` (`id_nganhnghe`, `tennganhnghe`) VALUES
(1, 'An toàn lao động'),
(2, 'Bán hàng kỹ thuật'),
(3, 'Bán lẻ/Bán sỉ'),
(4, 'Báo chí/Truyền hình'),
(5, 'Bảo Hiểm'),
(6, 'Bảo trì/Sửa chữa'),
(7, 'Bất động sản'),
(8, 'Biên/phiên dịch'),
(9, 'Bưu chính/Viễn thông'),
(10, 'Chứng khoáng/Vàng/Ngoại tệ'),
(11, 'Cơ khí/Chế tạo/Tự động hóa'),
(12, 'Công nghệ cao'),
(13, 'Công nghệ Ô tô'),
(14, 'Công nghệ thông tin'),
(15, 'Dầu khí/Hóa chất'),
(16, 'Dệt may/Da giày'),
(17, 'Dịch vụ khách hàng'),
(18, 'Địa chất/Khoáng sản'),
(19, 'Điện/Điện tử/Điện lạnh'),
(20, 'Điện tử viễn thông'),
(21, 'Du lịch'),
(22, 'Dược/Công nghệ sinh học'),
(23, 'Giáo dục/Đào tạo'),
(24, 'Hàng cao cấp'),
(25, 'Hàng gia dụng'),
(26, 'Hàng hải'),
(27, 'Hàng không'),
(28, 'Hàng tiêu dùng'),
(29, 'Hình chính/Văn phòng'),
(30, 'Hóa học/Sinh học'),
(31, 'Hoạch định/Dự án'),
(32, 'In ấn/Xuất bản'),
(33, 'IT phần cứng/Mạng'),
(34, 'IT phần mềm'),
(35, 'Kế toán/Kiểm toán'),
(36, 'Khách sạn/Nhà hàng'),
(37, 'Kiến trúc'),
(38, 'Kinh doanh/Bán hàng'),
(39, 'Logistics'),
(40, 'Luật pháp/Pháp lý'),
(41, 'Marketing/Truyền thông/Quảng cáo'),
(42, 'Môi trường/Xử lý chất thải'),
(43, 'Mỹ phẩm/Trang sức'),
(44, 'Mỹ thuật/Nghệ thuật/Điện ảnh'),
(45, 'Ngân hàng/Tài chính'),
(46, 'NGO/Phi chính phủ/Phi lợi nhuận'),
(47, 'Nhân sự'),
(48, 'Nông/Lâm/Ngư nghiệp'),
(49, 'Quản lý chất lượng(QA/AC)'),
(50, 'Quản lý điều hành'),
(51, 'Sản phẩm công nghiệp'),
(52, 'Sản xuất'),
(53, 'Spa/Làm đẹp'),
(54, 'Tài chính/Đầu tư'),
(55, 'Thiết kế đồ họa'),
(56, 'Thiết kế nội thất'),
(57, 'Thời trang'),
(58, 'Thư ký/Trợ lý'),
(59, 'Thực phẩm/Đồ uống'),
(60, 'Tổ chức sự kiện/Quà tặng'),
(61, 'Tư vấn'),
(62, 'Vận tải/Kho vận'),
(63, 'Xây dựng'),
(64, 'Xuất nhập khẩu'),
(65, 'Y tế/Dược'),
(66, 'Ngành nghề khác');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ngoaingu`
--

CREATE TABLE `tbl_ngoaingu` (
  `id_ngoaingu` char(10) NOT NULL,
  `tenngoaingu` varchar(255) NOT NULL,
  `mucdo` varchar(255) NOT NULL,
  `id_uv` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ngoaingu`
--

INSERT INTO `tbl_ngoaingu` (`id_ngoaingu`, `tenngoaingu`, `mucdo`, `id_uv`) VALUES
('nn139', 'Tiếng Anh', 'Trung cấp', 'uv168'),
('nn24', 'Tiếng Hoa (Phổ thông)', 'Cao cấp', 'uv168');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_noidungcv`
--

CREATE TABLE `tbl_noidungcv` (
  `id_nd` int(11) NOT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `chitiet` varchar(500) DEFAULT NULL,
  `id_cv` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_noidungcv`
--

INSERT INTO `tbl_noidungcv` (`id_nd`, `tieude`, `chitiet`, `id_cv`) VALUES
(408, 'HỌC VẤN', '<p>ĐẠI HỌC CẦN THƠ</p>\r\n\r\n<p>Bộ môn tự động hóa - Chuyên ngành cơ điện tử</p>\r\n\r\n<ul>\r\n	<li><strong>Tốt nghiệp loại:</strong>&nbsp;Khá - Điểm trung bình: 3.02/4.0</li>\r\n	<li><strong>Đề tài luận văn:</strong>&nbsp;Thiết kế hệ thống xác định diện tích&nbsp;</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', 'cv169'),
(409, 'KINH NGHIỆM', '<p>5/2021&nbsp;-&nbsp;7/2021</p>\r\n\r\n<p>Công ty thế giới khóa 68</p>\r\n\r\n<p>Chuyên viên kĩ thuật</p>\r\n\r\n<ul>\r\n	<li>Bảo trì các thiết bị khóa thông minh</li>\r\n	<li>Lắp đặt thiết bị khóa thông minh cho cửa cuốn, xe máy, xe oto</li>\r\n	<li>Tư vấn kỹ thuật cho khách hàng</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', 'cv169'),
(410, 'NGOẠI NGỮ', '<p>Ngôn ngữ:&nbsp;<strong>Tiếng Anh&nbsp;</strong></p>\r\n\r\n<p>Mưc độ thành thạo:&nbsp;<strong>Trung cấp&nbsp;</strong></p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<p>Ngôn ngữ:&nbsp;<strong>Tiếng Hoa (Phổ thông)&nbsp;</strong></p>\r\n\r\n<p>Mưc độ thành thạo:&nbsp;<strong>Cao cấp&nbsp;</strong></p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>', 'cv169'),
(411, 'HỌC VẤN', '<p>Cao Đẳng Kinh Tế Kỹ Thuật Hải Dương</p>\r\n\r\n<p>08/2008 -&nbsp;05/2011 - ngành Kế toán</p>', 'cv28'),
(412, 'KINH NGHIỆM LÀM VIỆC', '<p>Trung tâm đăng ký visa Hàn Quốc</p>\r\n\r\n<p>04/2019 -&nbsp;01/2021</p>\r\n\r\n<p>Nhân viên</p>\r\n\r\n<p>- Tư vấn, giải đáp các vấn đề liên quan đến visa</p>\r\n\r\n<p>- Tiếp nhận hồ sơ visa</p>\r\n\r\n<p>- Trả kết quả visa<br />\r\n- Giải đáp các vấn đề thắc mắc của khách hàng qua điện thoại và email.</p>\r\n\r\n<hr />\r\n<p>Trung tâm giao lưu ngôn ngữ Việt Hàn</p>\r\n\r\n<p>2016&nbsp;-&nbsp;2/2019</p>\r\n\r\n<p>Giáo viên</p>\r\n\r\n<p>- Dạy tiếng Hàn cho du học sinh và các đối tượng yêu thích tiếng Hàn&nbsp;<br />\r\n- Quản lý hồ', 'cv28'),
(413, 'HOẠT ĐỘNG', '<p>Nhóm tình nguyện trung tâm du học</p>\r\n\r\n<p>Tham gia team building và các hoạt động khác của công ty</p>', 'cv28'),
(414, 'CHỨNG CHỈ', '<p>Chứng chỉ tiếng Hàn Topik4</p>', 'cv28'),
(415, 'MỤC TIÊU NGHỀ NGHIỆP', '<p>Nếu được làm việc tại công ty tôi mong muốn có thể áp dụng những kinh nghiệm của bản thân để hoàn thành công việc được giao đồng thời cũng mong nhận được sự chia sẻ , giúp đỡ từ mọi người để công việc có hiệu quả tốt nhất</p>', 'cv28'),
(419, NULL, NULL, 'cv158'),
(421, 'Mục tiêu nghề nghiệp', '<p>Được làm việc tại môi trường làm việc chuyên nghiệp, năng động.<br />\r\nMong muốn trau dồi và phát huy tối da kĩ năng tiễng Trung, học hỏi thêm nhiều kinh nghiệm.<br />\r\nCông việc ổn định để gắn bó lâu dài.</p>', 'cv2'),
(422, 'Học vấn', '<p>ĐẠI HỌC ĐỊA CHẤT TRUNG QUỐC,&nbsp;Kinh tế Quốc tế</p>\r\n\r\n<p>09-2019&nbsp;<strong>&nbsp;-&nbsp;</strong>&nbsp;Hiện tạii</p>\r\n\r\n<p>GPA: 4.3</p>', 'cv2'),
(423, 'Kinh nghiệm làm việc', '<p>HARU BEAUTY,&nbsp;Nhân viên tư vấn</p>\r\n\r\n<p>01-2021&nbsp;<strong>&nbsp;-&nbsp;</strong>&nbsp;Hiện tại</p>\r\n\r\n<p>-Viết bài quảng cáo sản phẩm trên kênh facebook,<br />\r\n- Giới thiệu, tư vấn sản phẩm; giải đáp các vấn đề thắc mắc của khách hàng.<br />\r\n**Kĩ năng đạt được: Kích thích tính sáng tạo; cẩn thận, khéo léo giải quyết&nbsp;và nắm bắt vấn đề.</p>\r\n\r\n<p>DREAM KIDS VIỆT NAM,&nbsp;Nhân viên thu ngân</p>\r\n\r\n<p>05-2018&nbsp;<strong>&nbsp;-&nbsp;</strong>&nbsp;09-2018</p>\r\n\r\n<p>- Bán vé và t', 'cv2'),
(424, 'Chứng chỉ', '<p>2021:&nbsp;Ứng dụng Công nghệ Tin học cơ bản</p>\r\n\r\n<p>2020:&nbsp;Hán ngữ HSK5</p>', 'cv2'),
(425, NULL, NULL, 'cv34'),
(426, 'MỤC TIÊU NGHỀ NGHIỆP', '<p><strong>Học hỏi những kiến thức thực tế, hợp tác làm việc lâu dài với công ty, thăng tiến trong công việc, tạo dựng niềm tin giữa đối tác và mọi người trong công ty.</strong></p>', 'cv169'),
(427, 'KỸ NĂNG', '<p><strong>CHUYÊN MÔN:</strong></p>\r\n\r\n<ul>\r\n	<li>Lập trình PLC - HMI (S7-1200), Vi điều khiển</li>\r\n	<li>Lắp đặt các thiết bị Điện Công Nghiệp</li>\r\n	<li>Gia công cơ khí</li>\r\n	<li>Vẽ CAD - Solidworks, AutoCad</li>\r\n</ul>\r\n\r\n<p><strong>NGOẠI NGỮ:</strong></p>\r\n\r\n<ul>\r\n	<li>Có khả nắng giao tiếp tiếng anh (Toeic 650+)</li>\r\n	<li>Đọc tài liệu, hướng dẫn tiếng anh</li>\r\n</ul>\r\n\r\n<p><strong>TIN HỌC:</strong></p>\r\n\r\n<ul>\r\n	<li>Sử dụng tốt các phần mềm Microsoft Office: Word, Excel, Power point,...</', 'cv169'),
(428, NULL, NULL, 'cv196'),
(429, NULL, NULL, 'cv74'),
(430, 'EDUCATION', '<p>THANG LONG UNIVERSITY&nbsp;</p>\r\n\r\n<p>(10/2016&nbsp;&gt;&nbsp;1/2020)</p>\r\n\r\n<p>Major: Business Administration</p>\r\n\r\n<p>HALE EXIM TRAINING CENTER&nbsp;</p>\r\n\r\n<p>(&nbsp;09/2019&nbsp;&gt;&nbsp;12/2019)</p>\r\n\r\n<p>Export - Import and Logistics Training Course</p>\r\n\r\n<p>The course trained about:</p>\r\n\r\n<p>- Full of Export and Import process with customs procedures for specializedgoods</p>\r\n\r\n<p>- How to apply and use Incoterm 2010 and Logistics, freight forwardingknowledge applied for sea, air, ', 'cv191'),
(431, 'WORK EXPERIENCE', '<p>VIET THUAN TRANSPORT CO.LTD&nbsp;</p>\r\n\r\n<p>(6/2019&nbsp;&gt;&nbsp;9/2019)</p>\r\n\r\n<p>Partime Internship</p>\r\n\r\n<p>- Performing administrative duties like answering phones, updating records, andproviding excellent customer service at counter</p>\r\n\r\n<p>- Receiving all documentation as presented by Documentations team</p>\r\n\r\n<p>- Learn to use Incoterm 2010</p>\r\n\r\n<p>Thaco Land investment joint stock company&nbsp;</p>\r\n\r\n<p>(3/2018&nbsp;&gt;&nbsp;3/2019)</p>\r\n\r\n<p>Sales Staff</p>\r\n\r\n<p>- Searchin', 'cv191'),
(432, 'INTERESTS', '<ul>\r\n	<li>Travelling, reading, studying, computer,...</li>\r\n</ul>', 'cv191'),
(433, 'EDUCATION', '<p>THANG LONG UNIVERSITY&nbsp;</p>\r\n\r\n<p>(10/2016&nbsp;&gt;&nbsp;1/2020)</p>\r\n\r\n<p>Major: Business Administration</p>\r\n\r\n<p>HALE EXIM TRAINING CENTER&nbsp;</p>\r\n\r\n<p>(&nbsp;09/2019&nbsp;&gt;&nbsp;12/2019)</p>\r\n\r\n<p>Export - Import and Logistics Training Course</p>\r\n\r\n<p>The course trained about:</p>\r\n\r\n<p>- Full of Export and Import process with customs procedures for specializedgoods</p>\r\n\r\n<p>- How to apply and use Incoterm 2010 and Logistics, freight forwardingknowledge applied for sea, air, ', 'cv191'),
(434, 'WORK EXPERIENCE', '<p>VIET THUAN TRANSPORT CO.LTD&nbsp;</p>\r\n\r\n<p>(6/2019&nbsp;&gt;&nbsp;9/2019)</p>\r\n\r\n<p>Partime Internship</p>\r\n\r\n<p>- Performing administrative duties like answering phones, updating records, andproviding excellent customer service at counter</p>\r\n\r\n<p>- Receiving all documentation as presented by Documentations team</p>\r\n\r\n<p>- Learn to use Incoterm 2010</p>\r\n\r\n<p>Thaco Land investment joint stock company&nbsp;</p>\r\n\r\n<p>(3/2018&nbsp;&gt;&nbsp;3/2019)</p>\r\n\r\n<p>Sales Staff</p>\r\n\r\n<p>- Searchin', 'cv191'),
(435, 'INTERESTS', '<ul>\r\n	<li>Travelling, reading, studying, computer,...</li>\r\n</ul>', 'cv191'),
(437, 'Học vấn', '<p>Đại học kinh tế quốc dân,&nbsp;Chuyên ngành: Ngân hàng</p>\r\n\r\n<p>8/2018&nbsp;<strong>&nbsp;-&nbsp;</strong>&nbsp;8/2022</p>', 'cv170'),
(438, 'Kinh nghiệm làm việc', '<p>Công ty Bất động sản Thaco,&nbsp;Chuyên viên kinh doanh</p>\r\n\r\n<p>4/2020&nbsp;<strong>&nbsp;-&nbsp;</strong>&nbsp;HIỆN TẠI</p>\r\n\r\n<p>- Tìm kiếm và phân loại khách hàng.<br />\r\n- Tư vấn và hỗ trợ khách hàng về các thủ tục pháp lý.<br />\r\n- Hoàn thành công việc và báo cáo kết quả hoạt động.<br />\r\n&nbsp;</p>\r\n\r\n<p>Cửa hàng Thời trang cao cấp ninety five,&nbsp;Nhân viên bán hàng</p>\r\n\r\n<p>06/2014&nbsp;<strong>&nbsp;-&nbsp;</strong>&nbsp;02/2015</p>\r\n\r\n<p>- Tiếp thị sản phẩm<br />\r\n- Quảng bá sản', 'cv170'),
(439, 'Hoạt động', '<p>Đội tình ngUyện hội đồng hương phú thọ,&nbsp;Tình nguyện viên</p>\r\n\r\n<p>10/2013&nbsp;<strong>&nbsp;-&nbsp;</strong>&nbsp;08/2014</p>\r\n\r\n<p>Tập hợp các món quà và phân phát tới các em nhỏ vùng cao có hoàn cảnh khó khăn<br />\r\n- Chia sẻ, động viên họ vượt qua giai đoạn khó khăn, giúp họ có những suy nghĩ lạc quan.</p>', 'cv170'),
(440, 'Mục tiêu nghề nghiệp', '<p>-Ngắn hạn: có được công việc làm với mức thu nhập ổn định, rèn luyện kĩ năng xử lý công việc, tạo ra nhiều giá trị lợi ích cho công ty.<br />\r\n-Dài hạn: trở nên chuyên nghiệp hơn và có cơ hội thăng tiến hơn trong công việc.</p>', 'cv170'),
(441, NULL, NULL, 'cv163'),
(442, NULL, NULL, 'cv86'),
(443, 'KINH NGHIỆM LÀM VIỆC', '<p>CÔNG TY CỔ PHẦN TIN HỌC LẠC VIỆT</p>\r\n\r\n<p>10/2010&nbsp;-&nbsp;ĐẾN NAY</p>\r\n\r\n<hr />\r\n<p>CÔNG TY CỔ PHẦN TIN HỌC LẠC VIỆT</p>\r\n\r\n<p>04/2008&nbsp;-&nbsp;09/2010</p>\r\n\r\n<hr />\r\n<p>CÔNG TY TNHH SX GIẤY THỊNH PHÚ</p>\r\n\r\n<p>04/2006&nbsp;-&nbsp;12/2007</p>\r\n\r\n<hr />\r\n<p>CÔNG TY DU LỊCH NAM Á</p>\r\n\r\n<p>04/2004&nbsp;-&nbsp;12/2007</p>', 'cv101'),
(444, 'HỌC VẤN', '<p>ĐẠI HỌC KINH TẾ ĐÀ NẴNG</p>\r\n\r\n<p>09/2001&nbsp;-&nbsp;05/2003</p>\r\n\r\n<p>CHUYÊN NGÀNH: KẾ TOÁN DOANH NGHIỆP</p>\r\n\r\n<p>Cao đẳng</p>', 'cv101'),
(445, 'CHỨNG CHỈ', '<p>2002</p>\r\n\r\n<p>Tiếng Anh Trình Độ B</p>\r\n\r\n<p>2002</p>\r\n\r\n<p>Tin học Trung cấp</p>\r\n\r\n<p>2006</p>\r\n\r\n<p>Bồi dưỡng kế toán trưởng</p>', 'cv101'),
(448, 'CAREER OBJECTIVE', '<p><strong>Short -Term Target</strong>: Have a stable job then become an excellent employee.&nbsp;Along with that will cultivate more experience, life capital. Take advantage of skills, working experience with electrical-electronic expertise and knowledge of electrical and automation systems to become a dedicated, professional person, thereby bringing many sources of value to the company and customers. Thereby I will contribute to the development of the company. Always listen and learn every ass', 'cv27'),
(449, 'EDUCATION', '<p>09/2014&nbsp;-&nbsp;07/2017</p>\r\n\r\n<p>HOA LU A HIGH SCHOOL&nbsp;<strong>&nbsp;|&nbsp;</strong></p>\r\n\r\n<p>10/2017&nbsp;-&nbsp;01/2022</p>\r\n\r\n<p>THUY LOI UNIVERSITY&nbsp;<strong>&nbsp;|&nbsp;&nbsp;</strong>Faculty of Electrical and Electronics Engineering</p>\r\n\r\n<p>Specialization :&nbsp;Electric power system</p>\r\n\r\n<p>04/2020&nbsp;-&nbsp;06/2020</p>\r\n\r\n<p>INDUSTRIAL AUTOMATION CENTER PLCTECH&nbsp;<strong>&nbsp;|&nbsp;&nbsp;</strong>Mitsubishi PLC Programming</p>', 'cv27'),
(450, 'WORK EXPERIENCE', '<p>10/2017&nbsp;-&nbsp;01/2022</p>\r\n\r\n<p>THUY LOI UNIVERSITY&nbsp;<strong>&nbsp;|&nbsp;&nbsp;</strong>Student</p>\r\n\r\n<p>- Design of power supply and lighting.<br />\r\n- Using computers in electrical system analysis.<br />\r\n- Siemens&nbsp;PLC&nbsp;Programming.<br />\r\n- Using Siemens Inverter in&nbsp;three phase motor control.</p>\r\n\r\n<p>04/2020&nbsp;-&nbsp;06/2020</p>\r\n\r\n<p>INDUSTRIAL AUTOMATION CENTER PLCTECH&nbsp;<strong>&nbsp;|&nbsp;&nbsp;</strong>Student</p>\r\n\r\n<p>- Programming real problems re', 'cv27'),
(451, 'KINH NGHIỆM LÀM VIỆC', '<p>Thực tập sinh Sales B2B</p>\r\n\r\n<p><strong>Hỗ trợ phát triển Khách hàng Doanh nghiệp</strong><br />\r\n&nbsp;- Tìm kiếm tập khách hàng mục tiêu theo định hướng của Giám đốc khối/ Trưởng nhóm Kinh doanh<br />\r\n&nbsp;- Liên hệ với các Khách hàng Doanh nghiệp, giới thiệu sơ bộ về dịch vụ của Công ty và tư vấn các giải pháp thanh toán giúp doanh nghiệp tối ưu vận hành<br />\r\n&nbsp;- Phụ trách kết nối giữa Khách hàng và Chuyên viên Kinh doanh, chuyển thông tin cho bộ phân chuyên viên tiếp nhận, đàm p', 'cv162'),
(452, 'HOẠT ĐỘNG', '<p>DỰ ÁN SỰ KIỆN XÃ HỘI HỌC ONLINE</p>\r\n\r\n<p>6/2020&nbsp;-&nbsp;08/2020</p>\r\n\r\n<p>Ban truyền thông nội bộ</p>\r\n\r\n<p>- Chỉ đạo, sản xuất nội dung truyền thông, biên soạn nội dung, quản lý và tổ chức các buổi sinh hoạt hàng tuần của dự án<br />\r\n- Thu thập, xử lý và lưu trữ đầy đủ thông tin liên quan đến hoạt động của sự kiện<br />\r\n-Tạo lập và liên tục cập nhật sự kiện trên các kênh thông tin chính thức</p>', 'cv162'),
(453, 'CHỨNG CHỈ', '<p>Chứng chỉ Tiếng Anh B1</p>\r\n\r\n<p>2020</p>\r\n\r\n<p>Chứng chỉ Làm việc hiệu quả với Google Drive và Google Form&nbsp;</p>\r\n\r\n<p>7/2021</p>\r\n\r\n<p>Chứng chỉ Những kỹ năng cần thiết để Quản lý</p>\r\n\r\n<p>7/2021</p>', 'cv162'),
(454, NULL, NULL, 'cv1'),
(455, NULL, NULL, 'cv173'),
(456, 'WORK EXPERIENCE', '<p>NISSAN AUTOMOTIVE TECHNOLOGY VIETNAM</p>\r\n\r\n<p>10/2018&nbsp;-&nbsp;11/2019</p>\r\n\r\n<p>Electric System Evaluation engineer</p>\r\n\r\n<p>Main responsibilities:</p>\r\n\r\n<p>-Create a plan for operating project and follow progress.</p>\r\n\r\n<p>-Manage and edit databases (MS ACCESS, MS SQL SEVER) :</p>\r\n\r\n<p>&nbsp; +Program development and database management for projects at the request of the company to help manage in the best way.</p>\r\n\r\n<p>Recognition and Gains:<br />\r\n- Received certificate for my exc', 'cv81'),
(457, 'CERTIFICATIONS', '<p>Japanese N4 ( No Certificate)</p>\r\n\r\n<p>2019</p>\r\n\r\n<p>Japanese N3 ( No Certificate)</p>', 'cv81'),
(458, 'HOBBIES', '<p>-Travel-Photography-Music</p>', 'cv81'),
(459, 'ADDITIONAL INFORMATION', '<p>- Had 10 months onsite in Japan.<br />\r\n- Working under high pressuare, highly responsible and hard-working.<br />\r\n&nbsp;</p>', 'cv81'),
(460, 'MỤC TIÊU NGHỀ NGHIỆP', '<p>- Bước đầu tham gia vào thị trường lao động và học hỏi được những kỹ năng, kinh nghiệm trong lĩnh vực C&amp;B.</p>\r\n\r\n<p>- Có định hướng dài hạn trong ngành Nhân sự (lĩnh vực C&amp;B). Tương lai mong muốn trở thành một Chuyên viên C&amp;B.</p>', 'cv183'),
(461, 'HỌC VẤN', '<p>Trường Đại học Kinh tế - Luật, ĐHQG TP.HCM</p>\r\n\r\n<p>Kinh tế học/Economics</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>08/2018&nbsp;-&nbsp;nay</p>\r\n\r\n<p>- Sinh viên năm thứ tư.</p>\r\n\r\n<p>- Học lực: Khá (GPA: 7.4/10.0); Điểm rèn luyện: Xuất sắc (90/100).</p>', 'cv183'),
(462, 'KINH NGHIỆM', '<p>CLB FESE - Sàn Giao dịch Chứng khoản ảo</p>\r\n\r\n<p>Thành viên Ban Nội dung</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>04/2019&nbsp;<strong>&nbsp;-&nbsp;</strong>&nbsp;04/2020</p>\r\n\r\n<p>- Hỗ trợ training nội bộ, cuộc thi học thuật của câu lạc bộ.</p>\r\n\r\n<p>- Tiếp thị và bán vé cho các bạn sinh viên các trường đại học.</p>\r\n\r\n<p>Tổng điều tra Dân số và Nhà ở năm 2019</p>\r\n\r\n<p>Điều tra viên</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>01/04/2019&nbsp;<strong>&nbsp;-&nbsp;</strong>&nbsp;15/04/2019</p>\r\n\r\n<p>Thu thập thông tin của', 'cv183'),
(463, 'CÁC KỸ NĂNG', '<p>Tin học văn phòng:<br />\r\nSử dụng cơ bản Word, Excel, PowerPoint.</p>\r\n\r\n<p>Kỹ năng giao tiếp:</p>\r\n\r\n<p>Giọng nói dễ nghe, biết lắng nghe người khác.</p>\r\n\r\n<p>Kỹ năng thuyết trình:<br />\r\nThường xuyên đảm nhận vị trí thuyết trình.</p>\r\n\r\n<p>Kỹ năng làm việc nhóm:<br />\r\nMôi trường học tập yêu cầu thực hiện nhiều nên em tự tin khi làm việc nhóm</p>', 'cv183'),
(464, NULL, NULL, 'cv149');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ntddaluu`
--

CREATE TABLE `tbl_ntddaluu` (
  `id_ntddaluu` int(11) NOT NULL,
  `id_hosontd` char(10) NOT NULL,
  `id_uv` char(10) NOT NULL,
  `thoigianluu` varchar(255) DEFAULT NULL,
  `trangthaixem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ntddaluu`
--

INSERT INTO `tbl_ntddaluu` (`id_ntddaluu`, `id_hosontd`, `id_uv`, `thoigianluu`, `trangthaixem`) VALUES
(12, 'BbAaD96133', 'uv117', '2022-01-20 15:40:38', NULL),
(13, 'PfmwD13969', 'uv117', '2022-01-20 15:40:48', 1),
(18, 'BbAaD96133', 'uv169', '2022-01-21 13:23:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thanhpho`
--

CREATE TABLE `tbl_thanhpho` (
  `id_tp` int(11) NOT NULL,
  `tentp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_thanhpho`
--

INSERT INTO `tbl_thanhpho` (`id_tp`, `tentp`) VALUES
(1, 'Hồ Chí Minh'),
(2, 'Hà Nội'),
(3, 'An Giang'),
(4, 'Bạc Liêu'),
(5, 'Bà Rịa Vũng Tàu'),
(6, 'Bình Dương'),
(7, 'Bình Phước'),
(8, 'Bình Thuận'),
(9, 'Bình Định'),
(10, 'Bắc Giang'),
(11, 'Bắc Kạn'),
(12, 'Bắc Ninh'),
(13, 'Bến Tre'),
(14, 'Cao Bằng'),
(15, 'Cà Mau'),
(16, 'Cần Thơ'),
(17, 'Đà Nẵng'),
(18, 'Đắk Lắk'),
(19, 'Đắk Nông'),
(20, 'Điện Biên'),
(21, 'Đồng Nai'),
(22, 'Đồng Tháp'),
(23, 'Gia Lai'),
(24, 'Hà Giang'),
(25, 'Hà Nam'),
(26, 'Hà Tĩnh'),
(27, 'Hải Dương'),
(28, 'Hải Phòng'),
(29, 'Hậu Giang'),
(30, 'Hòa Bình'),
(31, 'Hưng Yên'),
(32, 'Khánh Hòa'),
(33, 'Kiên Giang'),
(34, 'Kon Tum'),
(35, 'Lai Châu'),
(36, 'Lạng Sơn'),
(37, 'Lào Cai'),
(38, 'Lâm Đồng'),
(39, 'Long An'),
(40, 'Nam Định'),
(41, 'Nghệ An'),
(42, 'Ninh Bình'),
(43, 'Ninh Thuận'),
(44, 'Phú Thọ'),
(45, 'Phú Yên'),
(46, 'Quảng Bình'),
(47, 'Quảng Nam'),
(48, 'Quảng Ngãi'),
(49, 'Quảng Ninh'),
(50, 'Quảng Trị'),
(51, 'Sóc Trăng'),
(52, 'Sơn La'),
(53, 'Tây Ninh'),
(54, 'Thái Bình'),
(55, 'Thái Nguyên'),
(56, 'Thanh Hóa'),
(57, 'Thừa Thiên-Huế'),
(58, 'Tiền Giang'),
(59, 'Trà Vinh'),
(60, 'Tuyên Quang'),
(61, 'Vĩnh Long'),
(62, 'Vĩnh Phúc'),
(63, 'Yên Bái'),
(64, 'Toàn quốc'),
(65, 'Nước ngoài');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tintuyendung`
--

CREATE TABLE `tbl_tintuyendung` (
  `id_tintd` char(10) NOT NULL,
  `tencongviec` varchar(255) DEFAULT NULL,
  `capbac` varchar(255) DEFAULT NULL,
  `loaicongviec` varchar(255) DEFAULT NULL,
  `nganhnghe` varchar(255) DEFAULT NULL,
  `thanhpho` varchar(255) NOT NULL,
  `motacongviec` text DEFAULT NULL,
  `yeucaucongviec` text DEFAULT NULL,
  `trinhdo` varchar(45) DEFAULT NULL,
  `kinhnghiem` varchar(45) DEFAULT NULL,
  `mucluong_toithieu` varchar(45) DEFAULT NULL,
  `mucluong_toida` varchar(45) DEFAULT NULL,
  `quyenloi` text DEFAULT NULL,
  `diadiemlamviec` varchar(255) DEFAULT NULL,
  `ngaydangtin` varchar(255) DEFAULT NULL,
  `ngayhethan` varchar(255) DEFAULT NULL,
  `trangthai_tintd` int(11) DEFAULT NULL,
  `dichvuhotro` varchar(50) DEFAULT NULL,
  `id_ntd` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tintuyendung`
--

INSERT INTO `tbl_tintuyendung` (`id_tintd`, `tencongviec`, `capbac`, `loaicongviec`, `nganhnghe`, `thanhpho`, `motacongviec`, `yeucaucongviec`, `trinhdo`, `kinhnghiem`, `mucluong_toithieu`, `mucluong_toida`, `quyenloi`, `diadiemlamviec`, `ngaydangtin`, `ngayhethan`, `trangthai_tintd`, `dichvuhotro`, `id_ntd`) VALUES
('2ZrAl12427', 'Chuyên Viên Lĩnh Vực Bảo Hiểm Xã Hội', 'Nhân viên', 'Toàn thời gian', 'Bảo Hiểm,Hình chính/Văn phòng,Kế toán/Kiểm toán,Nhân sự', 'Hồ Chí Minh', '<p>- Làm các thủ tục báo cáo: BHXH, BHYT, BHTN hàng tháng với cơ quan bảo hiểm<br />\r\n- Lập tờ khai sổ bảo hiểm cho NLĐ<br />\r\n- Theo dõi giải quyết chính sách, chế độ cho người lao động: thôi việc, thai sản, ốm đau, tai nạn lao động, nghỉ hưu,…..theo chính sách của Công ty phù hợp với nhà nước Việt Nam.<br />\r\n- Chốt sổ và trả sổ cho người lao động nghỉ việc<br />\r\n- Báo cáo, tư vấn thông tin liên quan cho Giám đốc Nhân sự và BGĐ Công ty<br />\r\n- Cập nhật các văn bản pháp luật có liên quan tới chính sách bảo hiểm cho người lao động<br />\r\n- Thực hiện công việc khác theo sự phân công của Cấp trên.</p>', '<p>- Tốt nghiệp CĐ/ĐH chuyên ngành nhân sự, luật<br />\r\n- Có kinh nghiệm làm việc 2 năm ở vị trí tương đương<br />\r\n- Có kiến thức am hiểu về Luật lao động và Luật Bảo hiểm<br />\r\n- Nhanh nhẹn, chăm chỉ, cẩn thận<br />\r\n- Chủ động, quyết đoán trong công việc</p>', 'Đại học', '1 năm', '1500', '2000', '<p>- Lương: 9.000.000 &nbsp;VNĐ<br />\r\n- Thử việc 2 tháng (85% thử việc)<br />\r\n- Thưởng tháng 13, thưởng Lễ/ Tết, sinh nhật, hiếu/ hỷ, …<br />\r\n- Phép năm, phụ cấp thâm niên, khám sức khỏe định kỳ<br />\r\n- Chế độ đi trễ về sớm 4 lần/ tháng: 90 phút/ lần<br />\r\n- BHXH sau thời gian thử việc; Khám sức khỏe định kỳ<br />\r\n- Hỗ trợ cơm trưa – chiều (30k/ phần), hỗ trợ nhà ở miễn phí.<br />\r\n- Cơ hội trải nghiệm dịch vụ làm đẹp miễn phí hoặc theo giá nhân viên.<br />\r\n- Cơ hội thăng tiến, phát triển bản thân<br />\r\n- Teambuilding, party, du lịch hàng năm<br />\r\n- Đánh giá xét tăng lương hằng năm<br />\r\n- Được tham gia vào các khóa đào tạo để nâng cao chuyên môn, kiến thức, kỹ năng</p>', '40 đường 3/2, Phường 12, Quận 10', '2022-01-20 13:19:28', '2022-01-30 00:00:00', 2, 'tuyengap', '8Xzp665890'),
('4GIPs4475', 'Nhân Viên Thủ Kho', 'Nhân viên', 'Toàn thời gian', 'Bán lẻ/Bán sỉ,Vận tải/Kho vận,Ngành nghề khác', 'Hồ Chí Minh', '<p>- Quản lý hàng hóa, xuất nhập hàng hóa vào phần mềm (nhanh.vn)<br />\r\n- Quản lý nhân sự, theo dõi lịch làm việc, phân chia công việc cho nhân sự<br />\r\n- Soạn hàng hóa và điều chuyển kho hàng<br />\r\n- Các công việc khác theo sự phân công của quản lý</p>', '<p>- Có kinh nghiệm làm thủ kho từ 6 tháng đến 1 năm<br />\r\n- Nhanh nhẹn, tỉ mỉ, cẩn thận, chủ động, trung thực (quan trọng)<br />\r\n- Có kỹ năng quản lý nhân sự<br />\r\n- Kỹ năng tin học văn phòng cơ bản<br />\r\n- Có định hướng gắn bó lâu dài và thăng tiến trong công việc</p>', 'Cao đẳng', '1 năm', '1000', '1500', '<p>- Lương cứng: 8.000.000 - 10.000.000 (theo năng lực) + phụ cấp (ăn trưa và gửi xe tháng) + thưởng khác (nếu có)<br />\r\n- Thử việc 1 tháng nhận 85% lương cứng + phụ cấp<br />\r\n- Đóng BHXH sau 2 tháng<br />\r\n- Tham gia teambuilding, các hoạt động văn nghệ, ngoại khóa của doanh nghiệp<br />\r\n- Môi trường trẻ, năng động và cởi mở</p>\r\n\r\n<p>Thời gian: 8h30 – 17h30, nghỉ chủ nhật<br />\r\nĐịa chỉ: 33 Tôn Đức Thắng, Hàng Bột, Đống Đa, Hà Nội</p>', '595/122 Chung cư 96 căn, Đường CMT8, Phường 15, Quận 10', '2022-01-20 14:53:40', '2022-02-28 00:00:00', 2, 'coban', 'AKIZa27233'),
('5IAnZ26292', 'test666', 'Thực tập sinh/Sinh viên', 'Thực tập', 'Báo chí/Truyền hình', 'Bà Rịa Vũng Tàu', '<p>hh</p>', '<p>gcfc</p>', 'Cao học', '2 năm', '1500', '5000', '<p>fdx</p>', 'QUAN 5', '2022-01-20 23:56:29', '2022-02-05 00:00:00', -1, 'coban', 'w4olx67036'),
('61cn527693', 'Chuyên Viên Cao Cấp Đối Tác Nhân Sự - Khối Quản Trị Nguồn Nhân Lực', 'Thực tập sinh/Sinh viên', 'Thực tập', 'Hình chính/Văn phòng,Nhân sự', 'Hà Nội', '<p><strong>\"Công tác nhân sự&nbsp;</strong></p>\r\n\r\n<p>- Quản trị nhân sự, quản lý hồ sơ, danh sách CBCNV;&nbsp;</p>\r\n\r\n<p>- Tìm kiếm các nguồn tuyển dụng, lọc hồ sơ ứng viên;&nbsp;</p>\r\n\r\n<p>- Soạn thảo Hợp đồng lao động, Mô tả công việc, Tiêu chuẩn cán bộ;&nbsp;</p>\r\n\r\n<p>- Xây dựng các công cụ, biểu mẫu phục vụ quản trị nhân sự;&nbsp;</p>\r\n\r\n<p>- Tổng hợp chấm công, Tính lương và giải quyết chế độ hàng tháng của nhân sự thuộc Công ty;&nbsp;</p>\r\n\r\n<p>- Cập nhật thông tin BHXH hàng tháng, giải quyết chế độ bảo hiểm theo quy định; \"</p>\r\n\r\n<p><strong>\"Công tác hành chính</strong></p>\r\n\r\n<p>- Hỗ trợ công tác Văn thư - Lưu trữ - Lễ tân: đón tiếp khách, nhận tài liệu, công văn, trả lời điện thoại, chuẩn bị phòng họp, kết nối trực tuyến;&nbsp;</p>\r\n\r\n<p>- Phối hợp phô tô tài liệu, đánh máy, in ấn phát hành, kiểm tra rà soát thể thức văn bản, văn phong các công văn trình BĐH, HĐQT;&nbsp;</p>\r\n\r\n<p>- Thực hiện công tác quản lý, bảo trì, bảo dưỡng, sửa chữa tài sản, trang thiết bị, phương tiện của Công ty.&nbsp;</p>\r\n\r\n<p>- Thực hiên công tác quản lý, mua bán, cấp phát văn phòng phẩm.</p>\r\n\r\n<p>- Thanh toán các chi phí văn phòng. \"</p>', '<p><strong>Kinh nghiệp từ 2 năm ở vị trí tương đương</strong></p>\r\n\r\n<p>Tốt nghiệp từ trung cấp trở lên</p>\r\n\r\n<p>Chăn chỉ, cần cù, chịu khó.</p>', 'Đại học', '2 năm', '1000', '3000', '<p><strong>Thu nhập từ 10triệu đến 15triệu/ 1 tháng (theo thực tế hoàn thành công việc)</strong></p>\r\n\r\n<p>Chính sách bảo hiểm, phúc lợi theo quy định của pháp luật (BHXH, BHYT, BHTN) và theo quy định của Công ty;</p>\r\n\r\n<p>Chế độ đãi ngộ cạnh tranh, cơ hội thăng tiến cao, nhiều tiềm năng phát triển trở thành Cán bộ nguồn của Tập đoàn;</p>\r\n\r\n<p>Làm việc trong môi trường trẻ trung, năng động, thân thiện, khuyến khích phát triển bản thân,…;</p>\r\n\r\n<p>Được đào tạo kỹ năng phục vụ cho công việc;</p>\r\n\r\n<p>Có cơ hội phát triển trong sự nghiệp, được làm việc với Đội ngũ CEO Master.</p>', 'Phố Thành Thái, Dịch Vọng, Cầu Giấy', '2022-01-20 14:38:46', '2022-02-06 00:00:00', 2, 'hapdan', 'g7qak86689'),
('6SWrm82956', 'Chuyên Viên Kinh Doanh Trái Phiếu', 'Nhân viên', 'Toàn thời gian', 'Chứng khoáng/Vàng/Ngoại tệ,Dịch vụ khách hàng,Kinh doanh/Bán hàng', 'Hồ Chí Minh', '<p>- Tiếp cận và tư vấn cho các khách hàng tiềm năng về các cơ hội đầu tư Trái phiếu doanh nghiệp và các sản phẩm đầu tư tài chính khác.</p>\r\n\r\n<p>- Phối hợp với Giám Đốc Kinh Doanh tìm kiếm và phát triển khách hàng mới. Hoàn thành chỉ tiêu được giao.</p>\r\n\r\n<p>- Tạo dựng và phát triển mối quan hệ với các nhà đầu tư, kênh phân phối.</p>\r\n\r\n<p>- Chịu trách nhiệm công việc:</p>\r\n\r\n<p>+ Lập kế hoạch mở rộng mạng lưới phân phối trái phiếu, chủ động tìm kiếm phát triển khách hàng mới.</p>\r\n\r\n<p>+ Tư vấn, chăm sóc hỗ trợ khách hàng đẩy mạnh giao dịch.</p>\r\n\r\n<p>+ Nắm bắt xu hướng, yêu cầu của khách hàng để đưa ra giải pháp phù hợp.</p>\r\n\r\n<p>+ Đóng góp ý kiến xây dựng các gói sản phẩm cạnh tranh trên thị trường.</p>\r\n\r\n<p>+ Phối hợp với Phòng Vận Hành Trái Phiếu để hoàn thành qui trình giao dịch trái phiếu, đảm bảo tuân thủ quy định của công ty.</p>', '<p>- Tốt nghiệp đại học trở lên thuộc các ngành Kinh tế, Ngoại thương, Tài Chính Doanh Nghiệp, Tài Chính Nhà Nước, Bảo Hiểm, Chứng khoán, Ngân hàng hoặc các lĩnh vực có liên quan (Ưu tiên các ứng viên có kinh nghiệm tại vị trí trương đương).</p>\r\n\r\n<p>- Kinh nghiệm: Tối thiểu 1 năm kinh nghiệm bán hàng/tư vấn/chăm sóc khách hàng tại các ngân hàng, Quỹ đầu tư, công ty chứng khoán, các tổ chức tài chính, đầu tư, bảo hiểm...</p>\r\n\r\n<p>- Kỹ năng đàm phán, trình bày và giao tiếp tốt.</p>\r\n\r\n<p>- Kiến thức tổng quan về thị trường tài chính và hiểu biết về các sản phẩm dịch vụ chứng khoán và fintech.</p>\r\n\r\n<p>- Kỹ năng quản lý, chăm sóc KH VIP.</p>', 'Đại học', '1 năm', '1500', '3000', '<p>- Thu nhập hấp dẫn: 60 – 80tr/tháng (gồm Lương cơ bản &amp; Hưởng hoa hồng phí từ 1.75% - 2.0%/doanh số bán từng gói trái phiếu và chính sách chung của Công ty).</p>\r\n\r\n<p>- Chế độ thu nhập tương xứng với năng lực, kinh nghiệm và hiệu suất công việc, thưởng trong các dịp Lễ Tết.</p>\r\n\r\n<p>- Được hưởng các chế độ BHXH, BHYT, khám bênh định kỳ cho nhân viên;</p>\r\n\r\n<p>- Chế độ du lịch hàng năm, Teambuilding.</p>\r\n\r\n<p>- Có cơ hội làm việc trong môi trường chuyên nghiệp, cơ hội thăng tiến trong công việc.</p>', 'Số 316 Lê Văn Sỹ, Phường 1, Quận Tân Bình', '2022-01-20 15:04:36', '2022-01-22 00:00:00', 2, NULL, 'K4INf88934'),
('99hEM29995', 'test23', 'Thực tập sinh/Sinh viên', 'Thực tập', 'Công nghệ thông tin,IT phần mềm', 'Hồ Chí Minh', '<p>ád</p>', '<p>ád</p>', 'Đại học', 'Dưới 1 năm', '500', '1000', '<p>ád</p>', 'QUAN 7', '2022-01-21 01:36:28', '2022-02-04 00:00:00', -1, 'coban', 'w4olx67036'),
('A7M6p8192', 'Kỹ Sư Cơ Điện', 'Nhân viên', 'Nghề tự do', 'Cơ khí/Chế tạo/Tự động hóa,Địa chất/Khoáng sản,Xây dựng', 'Bạc Liêu', '<p>- Thiết kế thi công hệ thống Cơ khí cho nhà máy, tòa nhà : Thiết kế &nbsp;và Thi công Hệ thống nước cấp, nước thải; Hệ thống PCCC; Hệ thống điều hòa thông gió; Hệ thống khí nén; Hệ thống phòng sạch; Hệ thống thông gió; Hệ thống bơm, các hệ thống đường ống phụ trợ cho nhà máy …..</p>\r\n\r\n<p>- Bóc tách khối lượng vật tư</p>\r\n\r\n<p>- Hoàn thành nhiệm vụ liên quan đến công việc mình đảm trách (lưu trữ, giao nhận hồ sơ bản vẽ, tham gia các cuộc họp với các đối tác hoặc đồng nghiệp liên quan, giám sát thiết kế theo yêu cầu</p>', '<p>- Kinh nghiệm từ 3-5 năm trở lên (ưu tiên các ứng viên có kinh nghiệm làm việc với công ty Nhật Bản) về tính toán thiết kế; bóc tách khối lượng phục vụ làm hồ sơ thầu và khối lượng thi công &nbsp;<br />\r\n- Sử dụng thành thạo các phần mềm như: Autocad, Word, Excel và phần mềm chuyên ngành.<br />\r\n- Thiết kế hệ thống Cơ khí<br />\r\n- Bóc tách khối lượng từ bản vẽ để lên khối lượng<br />\r\n- Kết hợp làm hồ sơ thầu<br />\r\n- Tổ chức triển khai bản vẽ shop hệ thống cơ điện<br />\r\n- Giám sát,tổ chức thi công trên công trường<br />\r\n- Có khả năng đi công trường hoặc mong muốn công việc thiết kế tại văn phòng làm việc<br />\r\n- Ưu tiên ứng viên đã làm các công trình nhà máy</p>', 'Đại học', '2 năm', '1000', '2000', '<p>- Thời gian làm việc: 8 giờ/ ngày từ thứ 2 đến thứ 7 (Làm thêm ngoài giờ - hệ số làm thêm giờ theo QĐ của Luật lao động).<br />\r\n- Mức thu nhập khoảng: 10 triệu - 25 triệu .Tùy theo năng lực khi phỏng<br />\r\n- Được đóng BHXH, BHYT, BHTN.<br />\r\n- Được hưởng các chính sách phúc lợi theo quy định của công ty.<br />\r\n- Được đào tạo, nâng cao nghiệp vụ thường xuyên.</p>', 'Số 55,ngõ 189 đường Hoàng Hoa Thám,P Liễu Giai,quận Ba Đình', '2022-01-20 15:12:29', '2022-01-30 00:00:00', 2, NULL, 'VkQNF92335'),
('As1OX22810', 'Chuyên Viên Tư Vấn Tài Chính', 'Nhân viên', 'Toàn thời gian', 'Kinh doanh/Bán hàng,Ngân hàng/Tài chính,Tài chính/Đầu tư', 'Hồ Chí Minh', '<p>- Tiếp cận và tư vấn cho các khách hàng tiềm năng về các cơ hội đầu tư: Trái phiếu, chứng khoán, bất động sản.</p>\r\n\r\n<p>- Phân tích, đánh giá các lợi ích, xu hướng của thị trường tài chính liên quan để phục vụ công việc.</p>\r\n\r\n<p>- Chăm sóc tích cực khách hàng đã giao dịch và liên tục tư vấn thêm các sản phẩm khác trên tệp khách hàng này.</p>\r\n\r\n<p>- Tiếp nhận nguồn dữ liệu được phân công, triển khai bán chính hoặc bán chéo các sản phẩm đầu tư của Tập đoàn trên địa bàn.</p>\r\n\r\n<p>- Chủ động khai thác thêm các cơ sở dữ liệu khách hàng thu thập được từ các nguồn bên ngoài hệ thống để tăng lượng khách hàng mới cho Công ty.</p>\r\n\r\n<p>- Phối hợp ,thực hiện các bước tư vấn và chốt sản phẩm với khách hàng theo đúng quy định của công ty.</p>\r\n\r\n<p>- Kiểm tra, quản lý hồ sơ và thông tin của khách hàng để phục vụ công tác chăm sóc khách hàng được tốt nhất.</p>\r\n\r\n<p>- Lập báo cáo về kế hoạch, kết quả hoạt động theo từng tuần, tháng, quý gửi các cấp lãnh đạo.</p>\r\n\r\n<p>- Báo cáo kịp thời, chính xác, đầy đủ thông tin liên quan đến công việc cho Ban lãnh đạo theo định kỳ hoặc đột xuất.</p>\r\n\r\n<p>- Thực hiện nhiệm vụ khác theo yêu cầu lãnh đạo.</p>', '<p>1. Trình độ học vấn:</p>\r\n\r\n<p>- Tốt nghiệp Cao đẳng trở lên chuyên ngành Tài chính, ngân hàng, quản trị kinh doanh, Thương mại.</p>\r\n\r\n<p>2. Kinh nghiệm:</p>\r\n\r\n<p>- Yêu cầu 6 tháng kinh nghiệm mảng KH ưu tiên hoặc 1 năm mảng DVKH các bank</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Không kinh nghiệm sẽ làm bên Cộng tác viên</p>\r\n\r\n<p>3. Kỹ năng:</p>\r\n\r\n<p>- Có nhiệt huyết, chịu khó, nhiệt tình trong công việc.</p>\r\n\r\n<p>- Chịu được áp lực công việc cao.</p>\r\n\r\n<p>- Có khả năng làm việc độc lập và theo nhóm tốt.</p>\r\n\r\n<p>- Ưu tiên các ứng viên có kinh nghiệm tại các ngân hàng, các công ty chứng khoán, các công ty bảo hiểm nhân thọ và các công ty bất động sản lớn, hiểu biết về các sản phẩm bất động sản, trái phiếu, chứng khoán, ngân hàng.</p>\r\n\r\n<p>- Ứng viên đã có kinh nghiệm mảng Priority banking tại ngân hàng là một lợi thế.</p>\r\n\r\n<p>- Kỹ năng giao tiếp, kỹ năng đàm phán, kỹ năng thuyết phục.</p>', 'Đại học', '2 năm', '1000', '3000', '<p>- Thu nhập hấp hẫn + thưởng KPIs + thường thành tích đột xuất/các kỳ lễ tết (nếu có) + hoa hồng.</p>\r\n\r\n<p>- Cơ hội đào tạo chuyên sâu, và lộ trình thăng tiến nghề nghiệp rõ ràng.</p>\r\n\r\n<p>- Tham gia các chương trình nghỉ mát hàng năm, Teambuiding định kỳ.</p>\r\n\r\n<p>- Tham gia các chế độ khác theo quy định của Tập Đoàn: BHXH, BHYT.</p>', '135 Nguyễn Thông, Phường 9, Quận 3', NULL, NULL, NULL, NULL, 'K4INf88934'),
('BSHY952782', 'Nhân Viên Sale Thị Trường', 'Nhân viên', 'Toàn thời gian', 'Bán lẻ/Bán sỉ,Dịch vụ khách hàng,Tư vấn', 'Hà Nội', '<p>Mô tả công việc:</p>\r\n\r\n<ul>\r\n	<li>Bán hàng và chăm sóc khách hàng: giao dịch, làm báo giá, hợp đồng,…</li>\r\n	<li>Tìm kiếm, mở rộng thị trường khách hàng theo khu vực được phân công.</li>\r\n	<li>Thiết lập và duy trì mối quan hệ tốt với khách hàng.</li>\r\n	<li>Hoàn thành mục tiêu doanh số, mục tiêu khách hàng,…được phân công.</li>\r\n	<li>Cập nhật kiến thức về sản phẩm, học hỏi nâng cao kỹ năng bán hàng.</li>\r\n	<li>Thực hiện các công việc liên quan theo yêu cầu của Phòng kinh doanh.</li>\r\n</ul>', '<p>- Tốt nghiệp các trường Đại học hoặc cao đẳng,<br />\r\n- Có kỹ năng lập kế hoạch và quản lý công việc<br />\r\n- Có kỹ năng giao tiếp và đàm phán tốt.<br />\r\n- Nhanh nhẹn tự tin, đam mê kinh doanh, cầu tiến, tinh thần trách nhiệm.<br />\r\n- Có khả năng đi công tác xa, sức khoẻ tốt, có bằng lái xê ô tô là một lợi thế<br />\r\n- Đam mê về Xe Đạp, thể thao là một lợi thế.</p>', 'Cao đẳng', 'Dưới 1 năm', '1000', '2000', '<p>Quyền lợi:</p>\r\n\r\n<ul>\r\n	<li>Lương cứng 7-9 triệu + Thưởng theo doanh số và kết quả làm việc.&nbsp;</li>\r\n	<li>Được hưởng đủ các quyền lợi như: Bảo hiểm (BHXH, BHYT, BHTN), lương tháng 13, phép năm,...</li>\r\n	<li>Được khám sức khỏe định kỳ.</li>\r\n	<li>Được tham gia các hoạt động thể thao nâng cao sức khỏe.</li>\r\n	<li>Được tham gia party thường xuyên, du lịch hàng năm cùng Công ty.</li>\r\n	<li>Được làm việc trong một môi trường 9x năng động, trẻ trung.</li>\r\n	<li>Chế độ đào tạo: Được đào tạo chuyên môn trực tiếp từ những chuyên gia giỏi nhất của công ty về cách thức tìm kiếm khách hàng, kỹ năng bán hàng, chăm sóc, tư vấn, chốt giao dịch; tham gia các khóa đào tạo kỹ năng mềm miễn phí và thường xuyên.</li>\r\n</ul>', '59-61 Nguyễn Đình Thi, phường Thụy Khuê, quận Tây Hồ', '2022-01-20 14:53:45', '2022-01-31 00:00:00', 2, 'tuyengap', 'AKIZa27233'),
('dqKmx86750', 'Nhân Viên Kế Toán Dịch Vụ (Mức Lương 9 - 12 Triệu)', 'Nhân viên', 'Toàn thời gian', 'Dịch vụ khách hàng,Hình chính/Văn phòng,Kế toán/Kiểm toán', 'Hồ Chí Minh', '<p>• Kiểm tra đối chiếu số liệu, các định khoản, các nghiệp vụ phát sinh, cân đối giữa số liệu kế toán chi tiết và tổng hợp, kiểm tra số dư cuối kỳ;</p>\r\n\r\n<p>• Lập tờ khai thuế định kỳ theo yêu cầu quản lý của cơ quan chức năng;</p>\r\n\r\n<p>• Lập báo cáo tài chính năm</p>\r\n\r\n<p>• Thống kê và tổng hợp số liệu kế toán, cung cấp số liệu theo yêu cầu;</p>\r\n\r\n<p>• Tư vấn, định hướng số liệu cho các doanh nghiệp</p>\r\n\r\n<p>• Chuẩn bị số liệu, sổ sách báo cáo, quyết toán thuế;</p>\r\n\r\n<p>• Các công việc khác theo yêu cầu.&nbsp;</p>', '<p>• Tốt nghiệp Trung cấp trở lên chuyên ngành kế toán, kiểm toán.</p>\r\n\r\n<p>• Ưu tiên ứng viên có 01 năm kinh nghiệm làm kế toán tổng hợp.</p>\r\n\r\n<p>• Sử dụng thành thạo Word, Excel.</p>\r\n\r\n<p>• Trung thực, chăm chỉ, cầu thị trong công việc</p>\r\n\r\n<p>• Ưu tiên ứng viên có kinh nghiệm kế toán tại các công ty dịch vụ kế toán&nbsp;</p>', 'Đại học', '1 năm', '1000', '1500', '<p>- Tổng thu nhập từ 9-12 triệu/tháng: Gồm lương cứng 7 triệu/tháng + % doanh thu. (Thử việc: 5 triệu/ tháng)</p>\r\n\r\n<p>- Tham gia BHXH, BHYT, BHTN đầy đủ</p>\r\n\r\n<p>- Được các chính sách và phúc lợi của công ty.</p>\r\n\r\n<p>- Có cơ hội được đào tạo nghiệp vụ và phát triển kiến thức chuyên môn.</p>\r\n\r\n<p>- Làm việc trong môi trường công ty trẻ trung và thân thiện, tham gia các buổi tiệc sinh nhật hàng tháng, cùng chuyến du lịch với công ty.</p>', '17-19 Hoàng Diệu, Phường 12, Q.4', '2022-01-20 13:08:07', '2022-01-25 00:00:00', 2, 'coban', '8Xzp665890'),
('H7lM835245', 'Procurement Manager', 'Trưởng phòng', 'Toàn thời gian', 'Bất động sản,Xây dựng', 'Hồ Chí Minh', '<p>Manager - Procurement will play a key role in assisting the Procurement Director in designing and implementing the procurement strategy in collaboration with other stakeholders. The job holder will be responsible for effectively driving the sourcing process, vendor and supplier risk management, commercial contract management to optimize the cost and ensure a consistently high standard of performance and identify new potential supplier.<br />\r\n<br />\r\nKEY ACCOUNTABILITIES<br />\r\n<br />\r\n1. Collaborate with Project Management team to create collaborative business plans with strategic vendors, develop negotiating strategies, and direct the execution of strategic programs.<br />\r\n2. Work with Procurement Director to approve vendor contract negotiations, guaranteeing the attainment of the most advantageous pricing, terms, discounts, allowances, quality, delivery, service and dating (where applicable). Ensure all goods and services meet established standards, timeline and legal requirements efficiently and effectively.<br />\r\n3. Directly manage complex negotiations with key suppliers that require a detailed strategic plan and that have a direct correlation with Corporate operational needs and/or goals. Decision maker and subject matter expert for risk management allowances, terms/conditions, pricing, transportation, pricing and quality control/acceptance.<br />\r\n4. Supply Chain Management including proactively sourcing manufacturers, suppliers, consultants and contractors to meet the quality, cost and delivery requirements of each Project schedule.<br />\r\n5. Actively streamlining of a business\'s supply-side activities to maximize customer value and gain a competitive advantage in the marketplace<br />\r\n6. Address department concerns / issues, requests, and questions and resolves within legal/tax; accounting and corporate operations guidelines<br />\r\n7. Direct and execute vendor management programs and initiatives that facilitate business owners achieving their business unit goals and financial targets. Assure the appropriate use of capital and financial resources. Generate analytics to support these positions.<br />\r\n8. Provide continuous leadership to departments to assist in the achievement of their goals and the overall corporate strategies/targets. Consult and advise business unit senior leadership teams/executives on the impact of procurement activities on projects and budgets.<br />\r\n9. Assist in building, training and developing a capable procurement team to deliver the department’s KPI.<br />\r\n10. Responsible for local and offshore procurement of contractor, supplier and material, tool, equipment, machinery and various requirement of company.<br />\r\n11. Responsible for material management and database within the company.<br />\r\n12. Prepare procurement status report, daily, weekly/ monthly, progress report with summary of delivery /commencement date.<br />\r\n13. Maintain database of local and international vendor in readily accessible format.<br />\r\n14. Co-ordinate with other related to accomplish its task efficiently.<br />\r\n15. Other duties assigned by the Procurement Director.</p>', '<p>EDUCATION: Bachelor degree and above.<br />\r\n<br />\r\nTECHNICAL KNOWLEDGE:<br />\r\n• Solid knowledge about procurement process; supply chain management with working experience in real estate is advantage.<br />\r\n• Solid knowledge about local market price.<br />\r\n<br />\r\nEXPERIENCE:<br />\r\n• 5 -10 years of progressive procurement experience, preferably in real estate and construction industry.<br />\r\n• In-depth knowledge of sourcing and procurement principles and supply chain management best practices including process development.<br />\r\n• The candidate should be familiar with the management of the entire supplier or consultant deliverable flow from initial requirement to delivering of final product. This involve integrated planning with Project teams, sourcing, production, logistics and possible returning all to meet project schedules.<br />\r\n<br />\r\nSKILL:<br />\r\n• Proven contract negotiation skills.<br />\r\n• Extensive relationship with real estate suppliers and vendors.<br />\r\n• Strong negotiation skill.<br />\r\n• Strong analytical and innovative mindset to handle multiple projects and meet deadline.<br />\r\n• Ability to build and set up procurement function, developing a detailed strategic plan and managing multiple procurement professionals across a number of commodities.<br />\r\n• Interpersonal skills.<br />\r\n• Result-driven and Solution oriented.<br />\r\n• Problem Solving.<br />\r\n• Personal Resilience.<br />\r\n• Change Management.<br />\r\n• Negotiation skills.<br />\r\n• Organizing skills.<br />\r\n• Strong sense of urgency, and responsibility associated with being results oriented.<br />\r\n• Adaptable to multicultural working environment.<br />\r\n• Ease working independently as well as collaboratively.<br />\r\n• Strong leadership skills and ability to get buy-in from cross functional teams.<br />\r\n• People Development skills.</p>', 'Trung học', '2 năm', '2000', '3000', '<p>KPI Bonus</p>\r\n\r\n<p>Heath care insurance</p>', '90/40 Âu Dương Lân, Phường 3, Quận 8', '2021-12-21 11:32:49', '2022-01-07 00:00:00', -1, NULL, 'w4olx67036'),
('hBGD348876', 'Thực tập Kinh Doanh Thị Trường', 'Thực tập sinh/Sinh viên', 'Thực tập', 'Bán lẻ/Bán sỉ,Điện/Điện tử/Điện lạnh,Kinh doanh/Bán hàng', 'Hồ Chí Minh', '<ul>\r\n	<li>Hoàn thành doanh số và mục tiêu chính sách bán hàng của công ty.</li>\r\n	<li>Chăm sóc và xây dựng mối quan hệ tốt với nhà phân phối và đại lý hiện tại</li>\r\n	<li>Tiếp cận POS mới (điểm bán hàng) để mở thêm thị trường mới.</li>\r\n	<li>Nghiên cứu và phát triển nhà phân phối mục tiêu mới</li>\r\n	<li>Hợp tác với các đối tác để đáp ứng tối đa cho nhu cầu của khách hàng và nhằm mục đích tạo ra nhiều khách hàng hơn.</li>\r\n	<li>Chịu trách nhiệm thu nợ thanh toán, tức là không quá hạn và không có nợ xấu</li>\r\n	<li>Thu thập thông tin thị trường, báo cáo kịp thời và đề xuất giải pháp cho Giám đốc / Giám đốc S &amp; M. Cập nhật kịp thời sự chuyển động của thị trường trong các lãnh thổ được giao bao gồm các hoạt động của đối thủ cạnh tranh, chuyển động giá cả, khách hàng tiềm năng, v.v.</li>\r\n	<li>Đảm bảo tất cả các báo cáo cần thiết được thực hiện đúng thời gian theo yêu cầu.</li>\r\n	<li>Phối hợp với Logistic, Dịch vụ khách hàng cho hoạt động kinh doanh hàng ngày.</li>\r\n	<li>Dựa trên sự phân công của Giám đốc / Giám đốc S &amp; M, vị trí tiếp quản Công việc của các đồng nghiệp khác trong trường hợp họ nghỉ phép hoặc rời khỏi văn phòng</li>\r\n</ul>', '<ul>\r\n	<li>Có kinh nghiệm bán hàng và thị trường là một lợi thế.&nbsp;</li>\r\n	<li>Tinh thần trách nhiệm cao, năng động, nhiệt tình, kiên nhẫn trong công việc</li>\r\n	<li>Có khả năng làm việc độc lập và đối mặt với thử thách</li>\r\n	<li>Có năng lực hoàn thành deadlines và chịu được áp lực cao trong công việc</li>\r\n	<li>Kỹ năng đàm phán, thương lượng với khách hang</li>\r\n	<li>Có kỹ năng giao tiếp và làm việc nhóm tốt</li>\r\n	<li>Sử dụng thành thạo MS Office</li>\r\n	<li>Biết tiếng Anh là lợi thế</li>\r\n	<li>Tốt nghiệp Đại học/ Cao đẳng các ngành có liên quan.</li>\r\n</ul>', 'Đại học', 'Chưa có kinh nghiệm', '100', '500', '<ul>\r\n	<li>Lương cơ bản từ 8.000.000 đến 10.000.000 + Phụ Cấp + Hoa hồng theo doanh thu</li>\r\n	<li>Được đào tạo kiến thức chuyên môn.</li>\r\n	<li>Thưởng tháng 13.</li>\r\n	<li>Tham gia đầy đủ BHXH, BHTN.&nbsp;</li>\r\n	<li>Lương cạnh tranh, thưởng nóng &amp; hoa hồng dựa trên kết quả làm việc.&nbsp;</li>\r\n	<li>Được tích lũy, trau dồi thêm kinh nghiệm, kỹ năng giao tiếp với khách hàng</li>\r\n	<li>Môi trường làm việc thân thiện, năng động, văn phòng hiện đại.&nbsp;</li>\r\n	<li>Du lịch với công ty hàng năm</li>\r\n	<li>Tham gia các hoạt động tất niên, được tổ chức sinh nhật,…&nbsp;</li>\r\n</ul>', '595/122 Chung cư 96 căn, Đường CMT8, Phường 15, Quận 10', '2022-01-20 14:54:07', '2022-01-28 00:00:00', 2, 'tuyengap', 'AKIZa27233'),
('hEaYR87306', 'Trường phòng Marketing', 'Trưởng phòng', 'Toàn thời gian', 'Kế toán/Kiểm toán,Marketing/Truyền thông/Quảng cáo', 'Hồ Chí Minh', '<p>- Plan, execute marketing campaigns in Australia Accounting industry across multiple Advertising platforms (Facebook, Google, etc)</p>\r\n\r\n<p>- Provide excellent services and ensure efficient follow-ups to customers</p>\r\n\r\n<p>- Prepare standard reports and analyze performance and optimize ad budgets</p>\r\n\r\n<p>- Handling inbound calls and making outbound calls to customers (list provided).</p>\r\n\r\n<p>- Coordination with sales team to boost digital marketing activities</p>\r\n\r\n<p>- Arranging appointment for sale manager and clients.</p>', '<p>- Must have excellent communication skills in writing, speaking, listening and cold calling.</p>\r\n\r\n<p>- Fluent in English speaking</p>\r\n\r\n<p>- Experience required in Outbound / Inbound calling or Customer Service profile.</p>\r\n\r\n<p>- Able to converse and write well in Vietnamese and English</p>\r\n\r\n<p>- Knowledge related to Australia Accounting industry will be an advantage</p>\r\n\r\n<p>- Able to work independently in achieving personal sale target with minimal supervision</p>', 'Cao học', '4 năm', '2000', '5000', '<p>- 13th-month salary</p>\r\n\r\n<p>- Health care insurance</p>\r\n\r\n<p>- Award for honor staff and team</p>\r\n\r\n<p>- Monthly Salary 45- 70tr</p>', '135 Nguyễn Thông, Phường 9, Quận 3', '2022-01-20 13:08:19', '2022-01-24 00:00:00', 2, 'tuyengap', '8Xzp665890'),
('hoc0u27010', 'Devops Engineer', 'Nhân viên', 'Toàn thời gian', 'Công nghệ thông tin,IT phần mềm', 'Hồ Chí Minh', '<p>- Study customer’s requirement and framework, analyze and estimate task with predefined estimation process.</p>\r\n\r\n<p>- Can create detail design and propose according solutions when needed.</p>\r\n\r\n<p>- Join in coding, unit test, bug fixings and environment setup.</p>\r\n\r\n<p>- Support others on demand.</p>\r\n\r\n<p>- Report to Project Manager</p>', '<p>- Experience in building CI/CD system using Jenkins pipeline, TeamCity or other toolchains.</p>\r\n\r\n<p>- Experience in automation scripting using any of following: shell script, Python, NodeJS, Go, etc.</p>\r\n\r\n<p>- Expertise with any of the following: Docker, Cloud Foundry, AWS, Artifactory, Nexus, Git, SVN, Rally</p>\r\n\r\n<p>- Self-starter who is motivated to learn and is at ease working as part of a team.</p>\r\n\r\n<p>- Knowledge of configuration management tools such as Chef/Puppet/Ansible</p>\r\n\r\n<p>- Knowledge of centralized log system such as ELK and monitoring tools (Zabbix/Nagios/NewRelic)</p>\r\n\r\n<p>- Experience with Unix/Linux and performance optimization.</p>\r\n\r\n<p>- Understanding of big data technologies such as Cassandra, Hadoop, Spark, etc</p>', 'Cao đẳng', '1 năm', '1000', '1500', '<p>Successful candidates will be part of a friendly, motivated and committed talent teams with various benefits and attractive offers:</p>\r\n\r\n<p>- Attractive offer from 800$ to 1500$ plus annual compensation and performance bonus.</p>\r\n\r\n<p>- “FPT care” health insurance provided by AON and is exclusive for FPT employees.</p>\r\n\r\n<p>- Company shuttle buses provide convenient way of transportation for all employees.</p>\r\n\r\n<p>- Annual Summer Vacation: following company’s policy and starts from May every year</p>\r\n\r\n<p>- Other allowances: transportation allowance, lunch allowance, working on-site allowance, etc.</p>\r\n\r\n<p>- FTown Campus provide many facilities for FPT employees such as football ground, basketball &amp; volleyball, gym &amp; yoga centre, restaurant, cafeteria, etc.</p>', 'Phường 11, Q.4', '2022-01-20 14:38:23', '2022-02-28 00:00:00', 2, 'coban', 'g7qak86689'),
('IMB0u38816', 'Front-End Developer', 'Nhân viên', 'Toàn thời gian', 'Công nghệ cao,IT phần cứng/Mạng,IT phần mềm', 'Hồ Chí Minh', '<p>- Tham gia vào các dự án ứng dụng web: Blockchain, Phát trực tiếp, Âm nhạc, Bitcoin,… .cho khách hàng Nhật Bản và Châu Âu.<br />\r\n- Viết mã rõ ràng, mô-đun, mạnh mẽ để thực hiện các yêu cầu mong muốn<br />\r\n- Làm việc với Người kiểm tra và nhóm Hỗ trợ khách hàng để cắt và sửa lỗi với khả năng quay vòng nhanh chóng<br />\r\n- Tối ưu hóa các ứng dụng web của chúng tôi để có tốc độ tối đa<br />\r\n- Bám sát các công nghệ mới nhất và đang phát triển<br />\r\n- Đưa ra đề xuất cho các giải pháp tốt hơn cho các vấn đề</p>', '<p>- Có ít nhất 1-2 năm kinh nghiệm phát triển ứng dụng web<br />\r\n- Có kiến ​​thức tốt về CSS3, HTML5, Responsive, CSS Framework, JavaScript, React JS / Vue js / Angular js, Angular, Typescript, scss, less…<br />\r\n- Kỹ năng: Giao tiếp tốt, Làm việc nhóm, Làm việc độc lập, Phân tích &amp; amp; giải quyết vấn đề.<br />\r\n- Kiến thức nền tảng: Cử nhân CNTT, Có khả năng làm việc với frontend.<br />\r\n- Kinh nghiệm: 6 tháng - 1 năm về HTML / CSS / JS; có kinh nghiệm xây dựng trang đích.<br />\r\n- Thái độ: Chủ động, Siêng năng, Có trách nhiệm, Ham học hỏi, Chính trực</p>', 'Đại học', '2 năm', '1500', '3000', '<p>- Đánh giá hiệu suất hai lần một năm<br />\r\n- 2 tháng thử việc hưởng 100% lương, sau khi thử việc đóng bảo hiểm theo bậc lương.<br />\r\n- Thời gian làm việc: 8h / ngày từ thứ 2 đến thứ 6.<br />\r\n- Lương tối thiểu 14 tháng, lương tháng 13 tùy theo số tháng làm việc thực tế tại công ty.<br />\r\n- Thưởng các ngày lễ tết theo quy định: 30 / 4,1 / 5, tết ​​dương lịch, tết ​​âm lịch, sinh nhật,… khen thưởng các công trình, cá nhân xuất sắc.<br />\r\n- Tham gia team building: 1 lần / quý, du lịch: 1 lần / năm, sinh nhật công ty, tiệc tất niên,…<br />\r\n- Tham gia khám sức khỏe định kỳ cho toàn thể nhân viên với dịch vụ tốt.<br />\r\n- Hỗ trợ toàn bộ chi phí thi chứng chỉ máy chủ phục vụ nhu cầu phát triển kinh doanh.<br />\r\n- Được cung cấp thiết bị khi làm việc tại công ty.<br />\r\n- Có cơ hội tham gia các lớp học tiếng Nhật và tiếng Anh miễn phí, câu lạc bộ bóng đá, chạy nước rút, trò chơi.<br />\r\n- Cơ hội trải nghiệm chuyên môn của bạn trong môi trường trẻ trung, năng động.</p>', 'Văn phòng FPT Đồng Khởi, Quận 1', NULL, NULL, NULL, NULL, 'hyYOl18072'),
('JeYlX20311', 'Mobile Game Developer', 'Thực tập sinh/Sinh viên', 'Thực tập', 'Công nghệ thông tin,IT phần mềm', 'Hà Nội', '<p>- Phát triển những ứng dụng Game trên di động mang tính: ổn định để cung cấp sự trải nghiệm thân thiện cho người dùng.<br />\r\n- Phát triển mới, đồng thời đảm bảo vận hành tính năng hiện có cho những dự án của công ty.<br />\r\n- Cập nhật kiến thức về những công nghệ mới để áp ứng cho công việc<br />\r\n<br />\r\nBenefits:<br />\r\n_ Thưởng lễ tết<br />\r\n_ Làm việc 5 ngày / tuần, nghỉ thứ 7 + chủ nhật + 12 ngày phép năm.<br />\r\n_ Có lộ trình phát triển nghề nghiệp rõ ràng.<br />\r\n_ Được tham gia BHXH, BHYT đầy đủ.<br />\r\n_ Ngoài ra còn có chế độ nghỉ “kỷ niệm ngày cưới, nghỉ sinh nhật gia đình”.<br />\r\n_ Du lịch, nghỉ mát, team building.<br />\r\n_ Được làm việc trong một công ty game năng động, phát triển. Có nhiều thử thách, có cợ hội được đào tạo và nâng cao nghiệp vụ bản thân.<br />\r\n- Salary: hấp dẫn tùy vào năng lực</p>', '<p>Experience:<br />\r\n- Có từ 2 năm kinh nghiệm phát triển game<br />\r\n- Có ít nhất 2 năm kinh nghiệm Unity 3D<br />\r\n- Có kinh nghiệm trong lĩnh vực phát triển game.<br />\r\n- Có tư duy lập trình và tư duy hệ thống tốt.<br />\r\n- Có kiến thức tốt về thuật toán, cấu trúc dữ liệu và lập trình hướng đối tượng.<br />\r\n- Thích chơi game, đam mê phát triển game đặc biệt là Game di động.<br />\r\n- Chủ động trong công việc, có tinh thần trách nhiệm, khả năng làm việc theo nhóm tốt.<br />\r\n- Có khả năng chịu áp lực công việc cao.<br />\r\n<br />\r\nPreference:<br />\r\n- Có sản phẩm Demo.<br />\r\n- Có hiểu biết tốt về kiến trúc ECS, lập trình Shader, 3D.<br />\r\n- Có kiến thức toán học ứng dụng cho game 2D và 3D<br />\r\n- Có kinh nghiệm tham gia các dự án Client/Server, các dự án game Multiplayer.<br />\r\n- Có kinh nghiệm làm việc với Native App: Android hoặc iOS.<br />\r\n- Sử dụng tốt các Design Pattern.<br />\r\n- Sử dụng tốt GIT hoặc SVN.</p>', 'Đại học', 'Dưới 1 năm', '1000', '1500', '<p>Thưởng lễ tết</p>\r\n\r\n<p>Làm việc 5 ngày / tuần, nghỉ thứ 7 + chủ nhật + 12 ngày phép năm</p>\r\n\r\n<p>Du lịch, nghỉ mát, team building</p>', 'Phố Thành Thái, Dịch Vọng, Cầu Giấy', '2022-01-08 17:56:01', '2022-01-28 17:56:01', 2, 'coban', 'w4olx67036'),
('jp3Iu50361', 'Kế Toán Nội Bộ', 'Nhân viên', 'Toàn thời gian', 'Kế toán/Kiểm toán', 'Hồ Chí Minh', '<p>- Thực hiện các công việc liên quan đến kế toán nội bộ<br />\r\n- Sắp xếp chứng từ và lưu trữ<br />\r\n- Liên hệ, quản lý chứng từ các chi nhánh của công ty<br />\r\n- Thực hiện những nhiệm vụ khác do phòng kế toán giao.</p>', '<p>- Tiếng Anh giao tiếp tốt</p>\r\n\r\n<p>- Ứng viên Nam</p>\r\n\r\n<p>- Không yêu cầu kinh nghiệm, có thể mới ra trường sẽ được hướng dẫn</p>\r\n\r\n<p>- Tốt nghiệp chuyên ngành kế toán</p>', 'Cao đẳng', '2 năm', '1000', '2000', '<p>- Hưởng mức lương cao cùng các khoản phụ cấp khác, phù hợp với năng lực chuyên môn, phù hợp với kết quả công việc;</p>\r\n\r\n<p>- Có nhiều cơ hội thăng tiến trong nghề nghiệp, được tạo điệu kiện để ôn thi chứng chỉ quốc tế trong nghề nghiệp;</p>\r\n\r\n<p>- Hưởng đầy đủ các chế độ bảo hiểm xã hội, bảo hiểm y tế… theo quy định của Nhà nước</p>', 'Văn phòng Vincom Đồng Khởi, Quận 1', '2022-01-20 13:28:45', '2022-01-31 00:00:00', 2, 'hapdan', '8Xzp665890'),
('kGarQ24918', 'Kế Toán Viên', 'Nhân viên', 'Toàn thời gian', 'Hình chính/Văn phòng,Kế toán/Kiểm toán,Tài chính/Đầu tư', 'Hồ Chí Minh', '<p>Làm việc dưới sự hướng dẫn trực tiếp của Kế toán tổng hợp, trợ giúp Kế toán tổng hợp trong các công việc:</p>\r\n\r\n<p>Ghi chép sổ sách kế toán và lập báo cáo tài chính (bằng phần mềm kế toán).</p>\r\n\r\n<p>Lập hồ sơ khai thuế, quyết toán thuế và một số việc có liên quan trực tiếp đến kế toán.</p>', '<p>- Tốt nghiệp đại học chuyên ngành kế toán.</p>\r\n\r\n<p>- Đam mê về kế toán và giao tiếp tốt.</p>\r\n\r\n<p>- Khả năng đọc và viết tiếng Anh.</p>\r\n\r\n<p>- Khả năng làm việc độc lập, theo nhóm và hoàn thành công việc đúng thời hạn.</p>\r\n\r\n<p>- Ứng viên có kinh nghiệm là một lợi thế nhưng không phải là yêu cầu bắt buộc.</p>\r\n\r\n<p>- Không quá 28 tuổi.</p>', 'Trung cấp', '2 năm', '1000', '2000', '<p>- Lương thưởng phù hợp với công việc.</p>\r\n\r\n<p>- Môi trường kế toán chuyên nghiệp.</p>\r\n\r\n<p>- Cơ hội được bổ nhiệm làm Kế toán tổng hợp với quyền lợi và thu nhập vượt trội đối với nhân viên có năng lực phù hợp</p>', '595/122 Chung cư 96 căn, Đường CMT8, Phường 15, Quận 10', '2022-01-20 13:08:31', '2022-01-30 00:00:00', 2, 'hapdan', '8Xzp665890'),
('kGvHh7483', 'Thực Tập Sinh Kế Toán Thuế Tại Đà Lạt', 'Mới tốt nghiệp', 'Thực tập', 'Hình chính/Văn phòng,Kế toán/Kiểm toán', 'Lâm Đồng', '<p>- Kế toán thuế: thực hiện sổ kế toán, thực hiện các tờ khai GTGT theo quý, theo tháng, tờ khai sử dụng hóa đơn, TNCN, TNDN, BCTC; tờ khai BHXH... In sổ và chứng từ để lưu hàng năm.</p>\r\n\r\n<p>- Thực hiện hồ sơ doanh nghiệp, bao gồm: đăng ký kinh doanh, thay đổi thông tin đăng ký, giải thể doanh nghiệp</p>\r\n\r\n<p>- Khi ứng tuyển sẽ được công ty trao đổi và đào tạo thêm.</p>\r\n\r\n<p>- Sau khi quen công việc sẽ liên hệ trực tiếp với khách hàng để trao đổi về hồ sơ mà mình thực hiện.</p>', '<p>- Chuyên ngành kế toán</p>\r\n\r\n<p>- Chăm chỉ, cẩn thận, trung thực, giao tiếp tốt, có khả năng sử dụng tin học văn phòng</p>\r\n\r\n<p>- Có khả năng tổng hợp và xử lý công việc nhanh nhẹn</p>\r\n\r\n<p>- Thi hành nhiệm vụ chính xác, đúng qui định và thời gian</p>', 'Cao đẳng', 'Chưa có kinh nghiệm', '100', '500', '<p>- Mức lương thỏa thuận.</p>\r\n\r\n<p>- Làm việc giờ hành chính, từ thứ 2 đến thứ 7, Chủ Nhật nghỉ</p>\r\n\r\n<p>- Hỗ trợ ăn trưa tại công ty.</p>\r\n\r\n<p>- Đảm bảo các chính sách BHXH + BHYT + BHTN.</p>\r\n\r\n<p>- Được làm việc trong môi trường chuyên nghiệp, thân thiện và có cơ hội thăng tiến tốt đối với nhân sự tâm huyết, mong muốn gắn bó lâu dài với Công ty.</p>\r\n\r\n<p>- Được hưởng các chế độ phúc lợi khác của công ty.</p>\r\n\r\n<p>- Các chế độ, chính sách khác được thực hiện đầy đủ theo quy định của Luật Lao động và quy định của Công ty</p>', 'ố 1 đường Pasteur - Phường 4 - Thành phố Đà Lạt', '2022-01-20 13:08:37', '2022-01-28 00:00:00', 2, 'coban', '8Xzp665890'),
('L3CYh2956', 'Chuyên Viên Digital Marketing (Google Ads)', 'Nhân viên', 'Toàn thời gian', 'Bán lẻ/Bán sỉ,Kinh doanh/Bán hàng,Marketing/Truyền thông/Quảng cáo', 'Hồ Chí Minh', '<ul>\r\n	<li>Xây dựng kế hoạch nội dung, ngân sách, vận hành các chiến dịch quảng cáo Online cho các sản phầm điện thoại, máy tính bảng, máy tính , phụ kiện … và dịch vụ sửa chữa điện thoại, máy tính...</li>\r\n	<li>Theo dõi và tối ưu chuyển đổi các kênh quảng cáo&nbsp;</li>\r\n	<li>Nghiên cứu, cập nhật thường xuyên các kiến thức, kĩ năng tối ưu quảng cáo, đề xuất phát triển các kênh/đối tác quảng cáo mới cho quản lý bộ phận.</li>\r\n</ul>', '<ul>\r\n	<li>Có kinh nghiệm vị trí Digital MKT từ 1 năm trở lên&nbsp;</li>\r\n	<li>Kinh nghiệm chạy quảng cáo Facebook, Google Có kiến thức tối ưu hóa quảng cáo cho mục tiêu chuyển đổi (Conversion)&nbsp;</li>\r\n	<li>Có kiến thức hoặc kinh nghiệm chạy Google Shopping</li>\r\n	<li>Hiểu và sử dụng được các công cụ tracking quảng cáo: Google Analytic, Pixel Facebook, Google Tag Manager&nbsp;</li>\r\n	<li>Đọc hiểu các tài liệu marketing bằng tiếng Anh để cập nhật và chủ động nâng cao kiến thức</li>\r\n	<li>Chịu được áp lực trong công việc, cẩn thận, tỉ mỉ. Có tư duy làm việc độc lập, sáng tạo.</li>\r\n</ul>', 'Đại học', '1 năm', '1500', '2000', '<ul>\r\n	<li>Thu nhập từ 13 triệu - 15 triệu</li>\r\n	<li>Được hưởng đầy đủ chính sách theo quy định: BHXH, BHYT, BHTN…các phúc lợi khác theo&nbsp;</li>\r\n	<li>Luật Lao động Thưởng vào các ngày Lễ, Tết, thưởng doanh số hàng năm hấp dẫn.&nbsp;</li>\r\n	<li>Cơ hội phát triển bản thân, thúc đẩy sáng tạo.&nbsp;</li>\r\n	<li>Cọ xát &amp; chia sẻ từ đội ngũ đồng nghiệp, quản lý dày dặn kinh nghiệm&nbsp;</li>\r\n	<li>Tham gia các khóa đào tạo kỹ năng mềm, định hướng chuyên môn phát triển bản thân.&nbsp;</li>\r\n	<li>Môi trường bán lẻ với nhiều thử thách thú vị, đồng nghiệp trẻ, khoẻ mạnh với phong trào thể thao: chạy bộ, iron man (3 môn bơi đạp chạy) với nhiều runners thành tích cao</li>\r\n</ul>', '595/122 Chung cư 96 căn, Đường CMT8, Phường 15, Quận 10', '2022-01-20 14:53:53', '2022-02-02 00:00:00', 2, 'tuyengap', 'AKIZa27233'),
('N4DmZ53672', 'Account Executive', 'Nhân viên', 'Toàn thời gian', 'IT phần mềm,Kinh doanh/Bán hàng,Marketing/Truyền thông/Quảng cáo', 'Hồ Chí Minh', '<ul>\r\n	<li>Chăm sóc lead từ marketing đổ về</li>\r\n	<li>Chăm sóc khách hàng hiện tại và khách hàng tiềm năng</li>\r\n	<li>Cam kết KPI doanh số (KPI cụ thể theo từng tháng)</li>\r\n	<li>Kiểm soát dòng doanh thu đúng tiến độ đề ra</li>\r\n	<li>Xây dựng và duy trì mối quan hệ với khách hàng</li>\r\n	<li>Làm báo giá, proposal và chịu trách nhiệm chính trong các buổi present&nbsp;</li>\r\n	<li>Làm việc với các phòng ban liên quan</li>\r\n	<li>Kiểm tra và báo cáo kết quả thực hiện dự án với team leader và khách hàng</li>\r\n	<li>Viết case study các dự án chịu trách nhiệm chính</li>\r\n</ul>', '<ul>\r\n	<li>Đam mê kiếm tiền</li>\r\n	<li>Có tư duy và kinh nghiệm bán dịch vụ B2B là lợi thế&nbsp;</li>\r\n	<li>Tư duy khách hàng ở trung tâm&nbsp;</li>\r\n	<li>Có hiểu biết về marketing và kinh doanh&nbsp;</li>\r\n	<li>Tôn trọng deadline, tôn trọng đồng nghiệp</li>\r\n	<li>Có tinh thần trách nhiệm và kỹ năng làm việc nhóm</li>\r\n	<li>Kỹ năng giao tiếp và trình bày vấn đề tốt</li>\r\n	<li>Có khả năng giao tiếp tiếng Anh&nbsp;</li>\r\n	<li>Ưu tiên ứng viên có kinh nghiệm 01 năm làm việc ở vị trí tương đương</li>\r\n</ul>', 'Đại học', '1 năm', '1000', '1500', '<ul>\r\n	<li>Thu nhập không giới hạn theo năng lực = lương cứng 5,000,000 VND + hoa hồng + thưởng KPI</li>\r\n	<li>Được cấp điện thoại và sim</li>\r\n	<li>Có hoa hồng theo doanh thu (2-5% tùy vào mức doanh thu)</li>\r\n	<li>Review tăng lương 06 tháng/ lần</li>\r\n	<li>Hưởng đầy đủ quyền lợi: bảo hiểm xã hội, bảo hiểm y tế, 12 ngày phép (không thủ tục nghỉ phép rườm rà), thưởng tết, thưởng khi làm việc hiệu quả</li>\r\n	<li>Được training thường xuyên, cung cấp sách liên quan đến ngành nghề, tăng cường kiến thức và kĩ năng</li>\r\n	<li>Có lộ trình phát triển sự nghiệp rõ ràng, được tham gia các khoá học liên quan đến phát triển bản thân và công việc</li>\r\n	<li>Được đào tạo để trở thành nhân sự chuyên nghiệp, hiệu quả và khó thay thế</li>\r\n	<li>Khám phá khả năng qua những yêu cầu thực tế</li>\r\n	<li>Du lịch mỗi năm 1-2 lần</li>\r\n	<li>Thử việc tối đa 02 tháng. Thời gian thử việc có thể kết thúc sớm hơn dự kiến nếu ứng viên có thành tích vượt bậc (lương thử việc bằng 85% lương cứng).</li>\r\n</ul>', '130 Nguyễn Thông, Phường 9, Quận 3', '2022-01-20 15:00:26', '2022-02-03 00:00:00', 2, 'coban', 'w4olx67036'),
('NGif232212', 'test566', 'Mới tốt nghiệp', 'Thực tập', 'Bán lẻ/Bán sỉ', 'Hà Nội', '<p>ádasd</p>', '<p>sadsa</p>', 'Cao đẳng', '3 năm', '2000', '10000', '<p>ádas</p>', 'Ba Đình', '2022-01-20 22:29:24', '2022-02-05 00:00:00', 2, NULL, 'K4INf88934'),
('nnV6V11507', 'Test', 'Mới tốt nghiệp', 'Thực tập', 'Bán hàng kỹ thuật', 'Hà Nội', '<p>ádasd</p>', '<p>ádsa</p>', 'Cao đẳng', '1 năm', '1500', '2000', '<p>ádasd</p>', 'Ba Đình', NULL, NULL, -1, NULL, 'VkQNF92335'),
('p4xL487233', 'Java Developer', 'Nhân viên', 'Toàn thời gian', 'Bưu chính/Viễn thông,Công nghệ thông tin', 'Hồ Chí Minh', '<p>· Họp dự án với các thành viên trong công ty.</p>\r\n\r\n<p>· Đọc hiểu đặc tả yêu cầu.</p>\r\n\r\n<p>· Develop Web Application, Smartphone App.</p>\r\n\r\n<p>· Phát triển và chỉnh sửa theo yêu cầu.</p>\r\n\r\n<p>· Unit test những phần phụ trách.</p>\r\n\r\n<p>· Sửa bug hệ thống và cải thiện chức năng sẵn có.</p>\r\n\r\n<p>· Đưa ra các đề xuất giúp hệ thống chạy nhanh, mượt.</p>\r\n\r\n<p>· Hỗ trợ các thành viên khác để dự án hoàn thành</p>', '<p>· Có kinh nghiệm thực tế trong việc develop ngôn ngữ Java (Framework: Spring Boot) từ 1 năm trở lên.</p>\r\n\r\n<p>· Ưu tiên ứng viên có kinh nghiệm thực tế trong việc develop TypeScript.</p>\r\n\r\n<p>· Không phân biệt tuổi tác, giới tính.</p>\r\n\r\n<p>**Lưu ý:</p>\r\n\r\n<p>· Ứng viên vui lòng gửi CV, mail ứng tuyển bằng tiếng Anh</p>\r\n\r\n<p>· Do sự lây lan rộng của dịch bệnh COVID-19 hiện nay, xem xét đến các biện pháp giãn cách xã hội của chính phủ, cho nên buổi phỏng vấn sẽ được tổ chức trực tuyến.</p>\r\n\r\n<p>· Về công việc sau khi tuyển dụng: Tùy vào tình trạng tiêm vắc xin và trạng thái lây nhiễm trong cộng đồng mà có thể chuyển đổi giữa đến văn phòng làm việc và làm việc tại nhà.</p>', 'Đại học', '3 năm', '2000', '3000', '<p>・ Theo luật Việt Nam (Bảo hiểm xã hội, bảo hiểm y tế, bảo hiểm thất nghiệp…)</p>\r\n\r\n<p>・ Tổ chức sự kiện không định kỳ (tiệc công ty, hoạt động giải trí khác…)</p>\r\n\r\n<p>・ Du lịch mỗi năm 01 lần</p>\r\n\r\n<p>・ Xét tăng lương mỗi năm 01 lần</p>\r\n\r\n<p>・ Thưởng mỗi năm 01 lần (về cơ bản là 1 tháng lương, có thể thay đổi tùy lợi nhuận công ty)</p>', '90/40 Âu Dương Lân, Phường 3, Quận 8', '2022-01-08 17:56:01', '2022-01-22 00:00:00', 2, 'hapdan', 'w4olx67036'),
('pNeWW57345', 'Trưởng Nhóm Ngành Hàng Siêu Thị (Thực Phẩm Tươi Sống/Thực Phẩm Khô)', 'Trưởng phòng', 'Toàn thời gian', 'Bán lẻ/Bán sỉ,Thực phẩm/Đồ uống,Vận tải/Kho vận', 'Hồ Chí Minh', '<p>- Sắp xếp và điều phối công việc cho nhân viên trực thuộc.</p>\r\n\r\n<p>- Kiểm tra quầy kệ, hàng hóa nhằm đảm bảo hàng hóa trên kệ luôn đầy đủ và được luân chuyển kịp thời.</p>\r\n\r\n<p>- Cập nhật các thông tin về sản phẩm mới, chương trình khuyến mãi nhằm đảm bảo thông tin đến với khách hàng đầy đủ và chính xác nhất</p>\r\n\r\n<p>- Hướng dẫn và đào tạo nhân viên ngành hàng đủ kiến thức và kĩ năng nhằm đảm bảo doanh thu, giá trị trung bình đơn hàng qua chương trình Upsell – Cross-sell, tăng chỉ tiêu doanh số theo ngày, tuần, tháng.</p>\r\n\r\n<p>- Đảm bảo hàng hóa được sắp xếp lên kệ bán hàng luôn trong tình trạng sạch sẽ, đạt quy chuẩn bán hàng, không hư hỏng, không hết date …</p>\r\n\r\n<p>- Đảm bảo luôn trong tình trạng sạch sẽ, gọn gàng, sẵn sàng đón tiếp khách.</p>\r\n\r\n<p>- Tuân thủ tiêu chuẩn vận hành, tuân thủ nội quy, quy định Công ty.</p>\r\n\r\n<p>- Tuân thủ các quy định về VSATTP và phòng chống cháy nổ tại cửa hàng.</p>\r\n\r\n<p>- Kiểm tra đề xuất bao bì, dụng cụ văn phòng cho khu vực phụ trách.</p>\r\n\r\n<p>- Thực thi công việc kiểm kê hàng hóa theo sự sắp xếp của quản lý trực tiếp, đảm bảo số liệu kiểm kê được đầy đủ, đúng thực tế, đúng quy định Công ty.</p>\r\n\r\n<p>- Kiểm tra hàng hóa trưng bày tồn kho, đề xuất đặt hàng theo danh sách mã hàng phụ trách, đảm bảo hàng về liên tục luôn đầy đủ và không để hết hàng trên kệ.</p>\r\n\r\n<p>- Tham gia vào các hoạt động bán hàng, đóng gói, tính tiền… lúc cần thiết</p>', '<p>- Tốt nghiệp Cao Đẳng trở lên</p>\r\n\r\n<p>- Có kinh nghiệm trên 01 năm ở vị trí trưởng nhóm, giám sát tại các chuỗi siêu thị, cửa hàng tiện lợi</p>\r\n\r\n<p>- Có kiến thức tiêu chuẩn ngành, tiêu chuẩn VSATTP,…</p>\r\n\r\n<p>- Có kiến thức về thực phẩm, kinh doanh mặt hàng tươi sống, rau củ quả trái cây ,…là một lợi thế.</p>\r\n\r\n<p>- Thành thạo vi tính văn phòng</p>\r\n\r\n<p>* Kỹ năng:</p>\r\n\r\n<p>- Giải quyết vấn đề sự cố phát sinh</p>\r\n\r\n<p>- Tư duy dịch vụ chăm sóc khách hàng</p>\r\n\r\n<p>- &nbsp;Kỹ năng lãnh đạo đội nhóm</p>\r\n\r\n<p>- &nbsp;Kỹ năng sắp xếp công việc, giao tiếp tốt với khách hàng và đồng nghiệp</p>\r\n\r\n<p>* Thái độ:</p>\r\n\r\n<p>- Nhanh nhẹn, khéo léo, trách nhiệm trong công việc.</p>\r\n\r\n<p>- Quyết đoán, trung thực và chịu được áp lực công việc cao.</p>', 'Cao học', '2 năm', '1500', '3000', '<p>- Thời gian làm việc: 6h30 - 22h30, 8h/ngày, linh động xoay ca theo sự sắp xếp của quản lý. Mỗi tuần nghỉ 1 ngày</p>\r\n\r\n<p>- Tham gia BHYT, BHXH, BHTN theo quy định</p>\r\n\r\n<p>- Lương tháng thứ 13</p>\r\n\r\n<p>- Xét tăng lương hàng năm</p>\r\n\r\n<p>- Cơ hội thăng tiến lên cửa hàng phó, cửa hàng trưởng- Làm việc tại các chi nhánh:</p>\r\n\r\n<p>+ 99 Hoàng Hoa Thám, phường 6, quận Bình Thạnh.</p>\r\n\r\n<p>+ 218 Phan Xích Long, phường 2, quận Phú Nhuận</p>\r\n\r\n<p>+ 496 Nguyễn Thị Minh Khai, phường 2, quận 3</p>', 'Số 99 Hoàng Hoa Thám, Phường 6, Quận Bình Thạnh', '2022-01-20 14:54:01', '2022-03-22 00:00:00', 2, 'coban', 'AKIZa27233');
INSERT INTO `tbl_tintuyendung` (`id_tintd`, `tencongviec`, `capbac`, `loaicongviec`, `nganhnghe`, `thanhpho`, `motacongviec`, `yeucaucongviec`, `trinhdo`, `kinhnghiem`, `mucluong_toithieu`, `mucluong_toida`, `quyenloi`, `diadiemlamviec`, `ngaydangtin`, `ngayhethan`, `trangthai_tintd`, `dichvuhotro`, `id_ntd`) VALUES
('pyNaL86101', 'Kế Toán Thuế (Tax Accountant)', 'Nhân viên', 'Toàn thời gian', 'Kế toán/Kiểm toán,Ngân hàng/Tài chính,Tài chính/Đầu tư', 'Hà Nội', '<ul>\r\n	<li>Lập các báo cáo thuế định kỳ hàng tháng/quý: của Thuế GTGT, thuế TNCN, thuế Nhà thầu, báo cáo tình hình sử dụng hóa đơn, thuế Môn bài;</li>\r\n	<li>Thực hiện quyết toán thuế năm: thuế TNDN, thuế TNCN.</li>\r\n	<li>Thực hiện thông báo phát hành hóa đơn;</li>\r\n	<li>Đối chiếu số liệu thuế với các số liệu kế toán liên quan: đối chiếu bảng kê thuế GTGT- với sổ chi tiết tài khoản 133/3331…;</li>\r\n	<li>Lên các báo cáo tổng hợp thuế theo yêu cầu quản trị;</li>\r\n	<li>Tổ chức lưu trữ chứng từ thuế gọn gàng, khoa học, kịp thời;</li>\r\n	<li>Theo dõi báo cáo tình hình nộp ngân sách, tồn đọng ngân sách;</li>\r\n	<li>Nghiên cứu các thông tư, nghị định liên quan đến các nghiệp vụ thuế của Công ty. Đánh giá tính tuân thủ pháp luật thuế cũng như các rủi ro tiềm tàng;</li>\r\n	<li>Tổng hợp, phổ biến pháp luật thuế cho các thành viên khác trong team kế toán và các bộ phận liên quan khác;</li>\r\n	<li>Tham gia xây dựng kế hoạch thuế hằng năm cho công ty, các phương án tối ưu thuế;</li>\r\n	<li>Tham gia xây dựng các nguyên tắc kiểm soát rủi ro thuế;</li>\r\n	<li>Trực tiếp làm việc với các đội review thuế, audit thuế do Công ty thuê;</li>\r\n	<li>Thực hiện các công việc chuẩn bị cho kiểm tra thuế;</li>\r\n	<li>Lập hồ sơ ưu đãi thuế, hồ sơ hoàn thuế khi có phát sinh.</li>\r\n	<li>Soạn thảo các công văn thuế;</li>\r\n	<li>Làm việc với cán bộ thuế khi có yêu cầu, vấn đề phát sinh trong công việc;</li>\r\n	<li>Kết hợp với các thành viên trong đội ngũ Operation và các bộ phận khác để cùng đạt được mục tiêu chung (OKR) của Công ty;</li>\r\n	<li>Thực hiện các công việc khác theo sự phân công của Quản lý trực tiếp hoặc Ban Giám Đốc.Kế</li>\r\n</ul>', '<ul>\r\n	<li>Tốt nghiệp Đại học chuyên ngành Kế toán, Kiểm toán, Tài chính Doanh nghiệp hoặc các ngành khác có liên quan;</li>\r\n	<li>Ít nhất 03 năm kinh nghiệm ở vị trí Kế toán thuế;</li>\r\n	<li>Đã từng trực tiếp tham gia quyết toán thuế hoặc hoàn thuế với cơ quan thuế;</li>\r\n	<li>Nắm vững chuyên môn, kiến thức pháp lý tốt về luật Doanh nghiệp, lĩnh vực kế toán, tài chính, thuế, luật liên quan;</li>\r\n	<li>Thành thạo Excel;</li>\r\n	<li>Chịu được áp lực công việc, không ngại việc;</li>\r\n	<li>Trung thực, chính trực, có trách nhiệm cao với công việc, tinh thần làm việc đội nhóm;</li>\r\n	<li>Ưu tiên ứng viên đang là người dùng của Finhay.</li>\r\n</ul>', 'Đại học', '2 năm', '1500', '3000', '<ul>\r\n	<li>Mức thu nhập tương xứng với năng lực từ 10,000,000 – 15,000,000 VNĐ;</li>\r\n	<li>Hưởng 15 ngày phép hàng năm;</li>\r\n	<li>Được cấp máy tính cấu hình cao để bắt đầu công việc;</li>\r\n	<li>Môi trường Start-Up năng động, thoải mái đưa ra các ý tưởng;</li>\r\n	<li>Không gian mở, giờ làm việc linh động;</li>\r\n	<li>Chế độ đào tạo hấp dẫn, tiếp cận với các chuyên gia trong mảng công nghệ, đầu tư tài chính, thiết kế, vận hành;</li>\r\n	<li>Teambuilding, du lịch cùng công ty;</li>\r\n	<li>Miễn phí gửi xe hàng ngày, party hàng tháng, khám sức khỏe định kỳ;</li>\r\n	<li>Các chế độ khác theo đúng Luật Lao động</li>\r\n</ul>', 'Tầng 8, Capital Building, 58 Kim Mã, Ba Đình', '2022-01-20 13:08:48', '2022-02-01 00:00:00', 2, 'coban', '8Xzp665890'),
('Q35mV22609', 'test784', 'Mới tốt nghiệp', 'Toàn thời gian', 'Báo chí/Truyền hình', 'Bà Rịa Vũng Tàu', '<p>ádsad</p>', '<p>ádsad</p>', 'Trung học', '4 năm', '2000', '3000', '<p>ádsa</p>', 'QUAN 1', '2022-01-20 23:33:21', '2022-02-05 00:00:00', -1, 'coban', 'AKIZa27233'),
('qKQBH84286', 'Nodejs Developer', 'Nhân viên', 'Toàn thời gian', 'Công nghệ cao,Công nghệ thông tin,IT phần cứng/Mạng,IT phần mềm', 'Hà Nội', '<p>● Phân tích, thiết kế và xây dựng các Module Backend, REST API cho sản phẩm&nbsp;<br />\r\n● Áp dụng CI/CD để deploy code lên Server test, production hàng ngày<br />\r\n● Nghiên cứu, áp dụng Blockchain để tối ưu sản phẩm<br />\r\n● Làm việc theo mô hình dự án Agile Scrum<br />\r\n● Làm việc trong môi trường quốc tế, cùng các kỹ sư CNTT trong và ngoài nước.</p>\r\n\r\n<p>Giới thiệu về dự án: Khi là một Nodejs Developer, bạn sẽ tham gia vào dự án phát triển sàn giao dịch Cryptocurrency cho thị trường Châu Á.&nbsp;<br />\r\n- Quy mô dự án: 30 Developers trong đó 50% là các Dev của Việt Nam và 50% là Dev tại Sing, UK...<br />\r\n- Công nghệ sử dụng: Nodejs, Blockchain và một số công nghệ mới dành riêng cho các sản phẩm Tài chính.<br />\r\n- Thách thức khi tham gia: Sử dụng Blockchain để tối ưu hóa sản phẩm</p>', '<p>● Tốt nghiệp Đại học, các chuyên ngành liên quan tới Công nghệ thông tin...<br />\r\n● Đã có từ 01 năm kinh nghiệm làm việc với Nodejs, ưu tiên ứng viên đã từng dùng solidity để tạo contract trong Ethereum<br />\r\n● Nắm vững các kiến thức về Cấu trúc dữ liệu và giải thuật<br />\r\n● Tư duy logic tốt<br />\r\n● Sẵn sàng học hỏi công nghệ mới<br />\r\n● Đam mê và muốn khám phá mảng Fintech</p>', 'Cao đẳng', '1 năm', '100', '3000', '<p>#INCOME<br />\r\n● Thu nhập cạnh tranh với thị trường, upto 2,000$<br />\r\n● Thưởng dự án hàng quý, mức thưởng dựa trên kết quả làm việc trong tháng, không giới hạn.<br />\r\n● Review thu nhập sau mỗi slot trải nghiệm, nhiều cơ hội tăng 50-80%/năm<br />\r\n● Thưởng tháng lương thứ 13, thưởng sinh nhật. Tổng lương lên tới 14 tháng lương/năm<br />\r\n● Thẻ bảo hiểm sức khỏe dành riêng cho nhân sự TDT.</p>\r\n\r\n<p>#CAREER PATH IMPROVEMENT<br />\r\nKhi tham gia vào chương trình này, bạn sẽ có cơ hội trau dồi, phát triển với tốc độ gấp 2,3 lần công ty khác:&nbsp;<br />\r\n● Được trao quyền như Senior Developer/ Project Leader/Project Manager trong việc lựa chọn giải pháp công nghệ cho dự án<br />\r\n● Được tham gia nghiên cứu và áp dụng các công nghệ mới vào dự án<br />\r\n● &nbsp;Được tham gia các khóa đào tạo liên quan tới công nghệ và Tài chính bởi các chuyên gia CNTT trong và ngoài nước như các khóa về Agile, Pentesting, AI, Blockchain...<br />\r\n● &nbsp;Được trải nghiệm môi trường làm việc quốc tế, sử dụng tiếng Anh hàng ngày<br />\r\n● &nbsp;Được onsite tại 1 số nước như Singapore, Hongkong, Nhật Bản... sau khi hết dịch Covid19</p>\r\n\r\n<p>#COMPANY ACTIVITIES<br />\r\n● Company trips vào mùa hè và mùa xuân tại các khu nghỉ dưỡng trong và ngoài nước<br />\r\n● Teambuilding hàng quý tại các khu nghỉ dưỡng xung quanh Hà Nội<br />\r\n● Company Party vào ngày sinh nhật, các ngày lễ như 8/3, 20/10, Trung Thu, Giáng Sinh....<br />\r\n● Các câu lạc bộ theo sở thích: CLB bóng đá ( thứ 4 hàng tuần), CLB marathon (CN hàng tuần)......<br />\r\n● Không gian làm việc sáng tạo, tiện ích với khu relax, khu ăn uống với đồ ăn miễn phí, khu tập gym, phòng tắm nóng lạnh....<br />\r\n● &nbsp;Thời gian làm việc: 08h30 - 17h30, Thứ 2 - Thứ 6. Nghỉ Thứ 7, CN và các ngày lễ theo quy định.</p>\r\n\r\n<p><a href=\"javascript:showLoginPopup(\'https://www.topcv.vn/brand/tdtassia/tuyen-dung/nodejs-developer-j587591.html\', \'%C4%90%C4%83ng nh%E1%BA%ADp ho%E1%BA%B7c %C4%90%C4%83ng k%C3%BD %C4%91%E1%BB%83 %E1%BB%A9ng tuy%E1%BB%83n c%C3%B4ng vi%E1%BB%87c n%C3%A0y!\')\">Ứng tuyển</a></p>', 'P.305-306, tầng 3, tòa nhà 48B Keangnam, đường Phạm Hùng, Q. Nam Từ Liêm', '2022-01-20 15:08:47', '2022-02-06 00:00:00', 2, NULL, 'hyYOl18072'),
('SXITT88036', 'test966', 'Thực tập sinh/Sinh viên', 'Toàn thời gian', 'Bảo Hiểm', 'Hồ Chí Minh', '<p>dsad</p>', '<p>sđ</p>', 'Trung học', '2 năm', '2000', '5000', '<p>d</p>', 'Quan 7', '2022-01-20 22:33:19', '2022-02-04 00:00:00', -1, 'coban', 'w4olx67036'),
('T8jQK19141', 'Tester QA', 'Nhân viên', 'Toàn thời gian', 'Công nghệ thông tin,IT phần mềm', 'Hà Nội', '<p>We are looking for 2 roles (Tester or Dev position)</p>\r\n\r\n<p>Responsibility: Responsible for SW implementation</p>\r\n\r\n<p>• Involve in requirement clarification and analysis</p>\r\n\r\n<p>• Involve in low and high-level design for software modules</p>\r\n\r\n<p>• Specify the SW unit design according to the SW requirements and the SW architecture specification</p>\r\n\r\n<p>• Develop test cases using defined test methods and select relevant test cases for regression tests.</p>\r\n\r\n<p>• Execute software development tasks, and paperwork related to SW development and SW unit testing.</p>\r\n\r\n<p>• Developing SW for automotive controller products (Airbag ECU, ...).</p>', '<p>• Bsc degree in software engineering/Computer science.</p>\r\n\r\n<p>• Have knowledge C/C++ programming and scripting language.</p>\r\n\r\n<p>• Automotive communication protocols e.g. CAN/LIN/Flexray/Ethernet and AUTOSAR architecture is preferred.</p>\r\n\r\n<p>• Good English skills</p>', 'Đại học', '2 năm', '1500', '3000', '<p>• Salary: up to 1000$</p>\r\n\r\n<p>• 13rd month salary</p>\r\n\r\n<p>• Training allowance</p>\r\n\r\n<p>• Full Social, Medical &amp; Unemployment Insurance</p>\r\n\r\n<p>• Work in a well-equipped, professional IT environment and community. Become member of a giant corporation.</p>\r\n\r\n<p>• Work with global team to develop SW for well-known Japanese and Chinese car makers</p>\r\n\r\n<p>• Having a chance to work with international, open minded engineers and experts from Japan, China and India.</p>', 'Phố Thành Thái, Dịch Vọng, Cầu Giấy', '2022-01-20 14:34:06', '2022-01-29 00:00:00', 2, 'hapdan', 'g7qak86689'),
('UpJ1z67991', '[R&D] Technical Project Lead', 'Trưởng phòng', 'Toàn thời gian', 'Cơ khí/Chế tạo/Tự động hóa,IT phần cứng/Mạng', 'Hồ Chí Minh', '<p>- Type of project: product development project.<br />\r\n- Develop requirements with internal and external customers and stakeholders<br />\r\n- Derive technical solutions out of requirements using existing product portfolio and initiate development of new product variants if needed<br />\r\n- Lead technical part in engineering projects and simultaneous engineering teams following Bosch internal development standards<br />\r\n- Represent work towards steering committee as well as internal and external customers<br />\r\n- Interface to Design, Simulation, Testing, Customer, Sales, Purchasing, Manufacturing, Quality, Product Management and Controlling<br />\r\n- Handling of advanced/complex applications as well as coaching of junior application engineers<br />\r\n*** About the product:<br />\r\nhttps://www.bosch-connectors.com/<br />\r\n- Applicants via this link will be prioritized to process https://smrtr.io/5MxTR</p>', '<p>- Design know-how regarding plastic and elastomeric parts.<br />\r\n- Own a well-structured communication style. Be agile, determined and result-oriented.<br />\r\n- Cross-functional teamwork and communication.<br />\r\n- Independent and self-disciplined.<br />\r\n- Fluency in English.<br />\r\n- University degree or above in engineering (mechanical, automotive, mechatronics....).<br />\r\n- Having experiences in product development is a plus.<br />\r\n* A good next career step for experienced design engineer*</p>', 'Đại học', '2 năm', '1500', '3000', '<p>Competitive salary, bonuses and allowances</p>\r\n\r\n<p>Professional engineering working environment</p>\r\n\r\n<p>Company with award in learning and development policy</p>', '90/40 Âu Dương Lân, Phường 3, Quận 8', '2021-12-21 18:36:16', '2022-01-26 00:00:00', 2, 'coban', 'w4olx67036'),
('Us5bK36827', 'Marketing Manager', 'Nhân viên', 'Toàn thời gian', 'Bán lẻ/Bán sỉ,Marketing/Truyền thông/Quảng cáo,Thực phẩm/Đồ uống', 'Hồ Chí Minh', '<p>1. Lập kế hoạch (20%)</p>\r\n\r\n<p>- Lập kế hoạch theo phương pháp làm việc theo mục tiêu OKRs ( sẽ được đào tạo)</p>\r\n\r\n<p>- Lên kế hoạch thực thi và phân bổ mục tiêu, cách triển khai cho team.</p>\r\n\r\n<p>2. Quản lý team (30%)</p>\r\n\r\n<p>- Giao nhiệm vụ, OKRs , KPis cho từng thành viên trong team</p>\r\n\r\n<p>- Gíam sát tiến độ thực thi công việc</p>\r\n\r\n<p>- Góp ý chỉnh sửa, định hướng thực hiện công việc cho các thành viên</p>\r\n\r\n<p>- Đánh giá nhân sự để đào tạo thêm, giao nhiệm vụ hoặc đưa ra các đề xuất để duy trì team vừng mạnh</p>\r\n\r\n<p>- Chia sẻ các phương pháp, kiến thức phù hợp cho team và áp dụng vào công việc</p>\r\n\r\n<p>3. Tập trung các chỉ số quan trọng (30%): Theo ưu tiên từng giai đoạn</p>\r\n\r\n<p>- Doanh Thu / GP ( lãi gộp)</p>\r\n\r\n<p>- Sản phẩm Keys / Ngành hàng Keys</p>\r\n\r\n<p>- Traffic webiste: Organic, Direct, Social, Ads, Refferal</p>\r\n\r\n<p>- Tối ưu tỷ lệ chuyển đổi, tối ưu UX / UI</p>\r\n\r\n<p>- Tối ưu các chỉ số về khách hàng: Khách Hàng Mới, CLV (Tần suất lặp lại, Số lượng mua, Giá trị TB Đơn, lợi nhuận trên Khách hàng)</p>\r\n\r\n<p>- Quản lý và tối ưu hiệu quả sử dụng ngân sách Marketing: ROAS, ROI</p>\r\n\r\n<p>4. Quản lý &amp; làm việc với Đối Tác / Agency (10%)</p>\r\n\r\n<p>- Đối tác Performance,</p>\r\n\r\n<p>- Đối tác KOLs, Influencer</p>\r\n\r\n<p>- Sản xuất Video</p>\r\n\r\n<p>- Đối tác truyền thông, đối tác liên kết</p>\r\n\r\n<p>- Đối tác cung cấp các giải pháp MKT phù hợp.</p>\r\n\r\n<p>5. Tối ưu và phát triển hệ thống (10%)</p>\r\n\r\n<p>- Xây dựng hệ thống báo cáo thống kê tổng hợp</p>\r\n\r\n<p>- Tham gia tối vào phát triển hệ thống của công ty</p>\r\n\r\n<p>- Học hỏi, nghiên cứu, thử nghiệm và áp dụng các phương pháp MKT mới phù hợp</p>\r\n\r\n<p>- Update các thay đổi mới liên quan đến các công việc thực hiện để thay đổi.</p>', '<p><strong>- Ít nhất kinh nghiệm 2 năm kinh nghiệm ở vị trí Marketing Manager</strong></p>\r\n\r\n<p><strong>- Ưu tiên các ứng viên có kinh nghiệm làm việc ở lĩnh vực bán lẻ trực tuyến ( Ecommerce)</strong></p>\r\n\r\n<p>- Tuổi từ 28 trở lên.</p>\r\n\r\n<p>- Tốt nghiệp Đại Học trở lên.</p>\r\n\r\n<p>- Yêu thích công nghệ và công việc markteting, sáng tạo, ham học hỏi cái mới và không ngừng hoàn thiện phát triển bản thân.</p>\r\n\r\n<p><strong>- Hiểu biết trong trong lĩnh vực Digital Marketing, có kiến thức về Brand Maketing và kĩ năng về content.</strong></p>\r\n\r\n<p>- Am hiểu về hoạt động bán lẻ trực tuyến là một lợi thế.</p>\r\n\r\n<p>- Làm việc có kế hoạch, đúng deadline, tính cam kết cao.</p>\r\n\r\n<p>- Chủ động, trách nhiệm cao, nhiệt huyết với công việc.</p>\r\n\r\n<p>- Khả năng chịu được áp lực với tinh thần tích cực.</p>\r\n\r\n<p>- Kỹ năng quản lý công việc cá nhân, quản lý con người và khả năng làm việc nhóm tốt.</p>', 'Đại học', '2 năm', '1500', '3000', '<p><strong>- Lương: Từ 20-30 triệu + Thưởng KPIs Tháng/ Quý/ Năm.</strong></p>\r\n\r\n<p>- Thời gian làm việc : 8h-17h từ Thứ 2- Thứ 6; 8h-12h (Thứ 7)</p>\r\n\r\n<p>- Môi trường làm việc năng động, thân thiện, cởi mở, công bằng, khuyến khích tư duy sáng tạo và, coi trọng năng lực của nhân viê</p>\r\n\r\n<p>- Cơ hội có được nhiều ưu đãi đặc quyền từ công ty theo khả năng đóng góp và cống hiến.</p>\r\n\r\n<p>- Cơ hội phát triển nghề nghiệp cao và không giới hạn, đề cao năng lực của nhân viên trẻ có khát vọng và mục tiêu phấn đấu.</p>\r\n\r\n<p>- Có các chương trình đào tạo chuyên sâu, hoặc cấp ngân sách học tập nâng cao năng lực làm việc của nhân viên theo một trong những gía trị cốt lõi của công ty “ Không ngừng học hỏi và hoàn thiện bản thân”</p>\r\n\r\n<p>- Các chế độ BHYT, BHXH, Lễ tết theo quy định của Luật lao động và chính sách đãi ngộ của Công ty.</p>', '12A Núi Thành, Phường 13, Quận Tân Bình', '2022-01-20 14:54:11', '2022-01-29 00:00:00', 2, 'coban', 'AKIZa27233'),
('vO2fw87174', 'Unity Game Developer Lương 1000 - 3000 Usd', 'Nhân viên', 'Toàn thời gian', 'Công nghệ thông tin,IT phần mềm,Thiết kế đồ họa', 'Hà Nội', '<p>- Thiết kế, phát triển game trên Unity , Dự án game multiplay thế giới mở đề tài nông trại .</p>\r\n\r\n<p>- Nền tảng game sẽ release là : PC, Android, iOS, WebGL</p>\r\n\r\n<p>- Tham gia và phát triển các dòng Game NFT Global: Farming, RPG, Open world, Metaverse…</p>\r\n\r\n<p>- Được tham gia vào các dự án GameFi đang hot ở Việt Nam và Quốc Tế</p>\r\n\r\n<p>- Hiểu được quy trình làm game lớn trên PC, Mobile và NFT game.</p>\r\n\r\n<p>- Làm việc trực tiếp với team có kinh nghiệm chinh chiến nhiều thể loại game, và đặc biệt NFT game đang hot (blockchain, defi, market making, infrastructure for blockchain).</p>\r\n\r\n<p>- Được làm việc và học hỏi kinh nghiệm trực tiếp với quản lý dự án game Openworld có nhiều kinh nghiệm.</p>\r\n\r\n<p>- Có kinh nghiệm làm việc với mô hình Client-Server là 1 lợi thế. Ưu tiên những ứng viên đã từng làm cho những dự án game Multiplay .</p>\r\n\r\n<p>- Có kinh nghiệm làm việc với data type: JSON object, SQL, No SQL.</p>\r\n\r\n<p>- Có kinh nghiệm làm việc với blockchain, NFT là 1 lợi thế.</p>\r\n\r\n<p>Văn phòng hà nội : Tầng 3 Tòa nhà New Center Building , Số 2 Hoàng Đạo Thúy, Cau Giay, Ha Noi</p>', '<p>- Tối thiểu 2 - 3 năm kinh nghiệm làm game bằng Unity3D</p>\r\n\r\n<p>- Lập trình bằng ngôn ngữ C#</p>\r\n\r\n<p><strong>- Đã từng có kinh nghiệm phát triển game multiplay trên Unity sẽ là một lợi thế</strong></p>\r\n\r\n<p>- Có trên 1 năm kinh nghiệm làm việc đối với Amazon AWS, NestJS, MongoDB,..</p>\r\n\r\n<p>- Có kỹ năng vẽ tài liệu Architecture.</p>\r\n\r\n<p>- Tối ưu hóa game 2D và 3D</p>\r\n\r\n<p>- Nắm rõ OOP, cấu trúc dữ liệu và giải thuật</p>\r\n\r\n<p>- Đọc hiểu tài liệu Tiếng Anh tốt, giao tiếp tiếng Anh là một lợi thế.</p>\r\n\r\n<p>- Trách nhiệm cao, tâm huyết với nghề game</p>\r\n\r\n<p>- Khả năng làm việc độc lập và theo nhóm tốt</p>\r\n\r\n<p>- Kỹ năng research xử lý các vấn đề, khả năng thích ứng nhanh với công việc, các kỹ thuật mới</p>\r\n\r\n<p>- Có sản phẩm demo.</p>', 'Đại học', '2 năm', '1000', '3000', '<p>- Lương 1000 - 3000 USD tương ứng với 23 - 70 triệu / Tháng, xét tăng lương theo năng lực.</p>\r\n\r\n<p>- Chỉ làm việc 5 ngày / tuần, thừ tứ 2 tới thứ 6.</p>\r\n\r\n<p>- Môi trường làm việc năng động, vui vẻ, thoải mái.</p>\r\n\r\n<p>- Các hoạt động thể thao: Team building, Company Trip,...</p>\r\n\r\n<p>- BHXH đầy đủ và các quyền lợi theo đúng qui định pháp luật</p>\r\n\r\n<p>- Trang phục tự do</p>\r\n\r\n<p>- Cung cấp PC cấu hình cao</p>\r\n\r\n<p>- Hỗ trợ ăn trưa, gửi xe</p>\r\n\r\n<p>- Phỏng vấn online trước tết, ra tết nhận việc luôn</p>\r\n\r\n<p>Và nhiều hơn thế nữa để bạn khám phá và phát triển …</p>', 'Tầng 3 Tòa nhà New Center Building , Số 2 Hoàng Đạo Thúy, Cau Giay', '2022-01-20 14:34:18', '2022-01-23 00:00:00', 2, 'hapdan', 'g7qak86689'),
('xzGPr63861', 'Nhân Viên IT', 'Nhân viên', 'Toàn thời gian', 'IT phần cứng/Mạng,IT phần mềm,Kế toán/Kiểm toán', 'Hồ Chí Minh', '<p>-&nbsp; Giám sát, vận hành và xử lý sự cố hệ thống mạng, internet, điện thoại cố định, máy chấm công, máy in và hệ thống Camera của Công ty</p>\r\n\r\n<p>-&nbsp; Quản trị Website, Facebook, Fanpage</p>\r\n\r\n<p>-&nbsp; Giám sát, bảo trì, bảo dưỡng , cài đặt hệ điều hành phần cứng, phần mềm máy tính và các thiết bị điện tử tại văn phòng;</p>\r\n\r\n<p>- Các công việc khác theo sự phân công của quản lý trực tiếp.</p>\r\n\r\n<p>- Triển khai giải pháp phần mềm ứng dụng quản lý sản xuất kinh doanh ở Công ty<br />\r\n- Hướng dẫn việc sử dụng phần mềm.<br />\r\n- Khắc phục sự cố.<br />\r\n- Kỹ năng lập trình HTML, CSS ,quản lý SQL Server.<br />\r\n- Chăm sóc website, hổ trợ khách hàng</p>', '<p>- Tốt nghiệp Cao đẳng trở lên chuyên ngành Quản trị mạng, Công nghệ thông tin hoặc tương đương;</p>\r\n\r\n<p>-&nbsp; Hiểu biết về hệ điều hành Windows, mạng, phần cứng và thiết bị văn phòng;</p>\r\n\r\n<p>-&nbsp; Khả năng làm việc độc lập;Kĩ năng giao tiếp, kĩ năng báo cáo tốt;</p>\r\n\r\n<p>-&nbsp; Ưu tiên ứng viên sinh viên mới ra trường.</p>', 'Đại học', '2 năm', '1000', '1500', '<p>-&nbsp; Lương : Chính thức + Hoa hồng</p>\r\n\r\n<p>-&nbsp; Môi trường làm việc chuyên nghiệp, trẻ trung, năng động.</p>\r\n\r\n<p>-&nbsp; Được đào tạo, có cơ hội nâng cao kiến thức về sản phẩm và kỹ năng nghề nghiệp.</p>\r\n\r\n<p>-&nbsp; Được đóng BHXH ngay sau khi kí HĐLĐ chính thức.</p>\r\n\r\n<p>-&nbsp; Thưởng 01 ngày phép/năm thâm niên (ngoài 12 phép theo quy định).</p>\r\n\r\n<p>-&nbsp; Thưởng các dịp lễ tết, Nghỉ mát.</p>', '134/2C hẻm, 134 Hoàng Hoa Thám, Phường 12, Tân Bình', '2022-01-20 13:30:24', '2022-02-04 00:00:00', 2, 'coban', '8Xzp665890'),
('yVGto66551', 'Product Analysis Associate Manager (Giám Sát Phân Tích Dữ Liệu )', 'Nhân viên', 'Toàn thời gian', 'Công nghệ thông tin,IT phần mềm', 'Hồ Chí Minh', '<p>1. Làm việc với bộ phận kỹ thuật để triển khai, lập tài liệu, xác thực và giám sát việc ghi nhật ký và số liệu</p>\r\n\r\n<p>2. Tạo các lối dẫn dữ liệu đơn giản, đáng tin cậy để xây dựng các báo cáo tự động cho các chỉ số thể hiện performance của các tính năng, ứng dụng</p>\r\n\r\n<p>3. Xác định, dịch, sắp xếp thứ tự ưu tiên và đặt ra các câu hỏi quan trọng về sản phẩm dựa trên dữ liệu, từ đó gợi ý cho bộ phận phát triển sản phẩm/ứng dụng</p>\r\n\r\n<p>4. Thông qua các phân tích dữ liệu để tìm kiếm các thông tin hữu ích, từ đó đưa ra đề xuất các tinh năng cho sản phẩm.</p>\r\n\r\n<p>5. Thiết lập, phân tích và thúc đẩy các thực hành tốt cho các thử nghiệm đa biến</p>\r\n\r\n<p>6. Tổng hợp và truyền đạt những hiểu biết sâu sắc trong quá trình phát triển sản phẩm</p>\r\n\r\n<p>7. Trao quyền và hướng dẫn người khác làm việc hiệu quả và hiệu quả với dữ liệu</p>\r\n\r\n<p>8. Đề xuất / triển khai các ý tưởng để tự động đánh giá hiệu quả hoạt động của các sản phẩm Công ty và cảnh báo các hành vi bất thường của chỉ số đo lường sản phẩm.</p>', '<p>- Nam/ Nữ &lt; 40 Tuổi</p>\r\n\r\n<p>- Tốt nghiệp Đại học chuyên ngành: Công nghệ, kinh tế, tài chính ngân hàng, ngoại thường</p>\r\n\r\n<p>-Sử dụng thành thạo các phần mềm quản lý và khai thác dữ liệu (Power BI, tableau, Google studio)</p>\r\n\r\n<p>- Thành thạo Sử dụng các ngôn ngữ SQL</p>\r\n\r\n<p>-Giao tiếp, trình bày mạch lạc, logics</p>\r\n\r\n<p>-Làm slide và thuyết trình</p>\r\n\r\n<p>-Làm việc nhóm, phối hợp với các nhóm phát triển sản phẩm</p>\r\n\r\n<p>-Kinh nghiệm ít nhất 3 năm làm BI và phân tích dữ liệu</p>\r\n\r\n<p>-Hiểu biết và kinh nghiệm về database, big query là một lợi thế</p>\r\n\r\n<p>-Hiểu biết về phân tích thống kê, thiết kế thử nghiệm</p>\r\n\r\n<p>-Kinh nghiệm tracking/monitor các chỉ số OKR là một lợi thế</p>\r\n\r\n<p>-Đã có kinh nghiệm làm trưởng nhóm với ít nhất 1 thành viên là một lợi thế</p>', 'Đại học', '2 năm', '1500', '3000', '<p><strong>- Lương 30-50 Tr Cạnh tranh, Thương lượng tùy năng lực Ứng viên</strong></p>\r\n\r\n<p>- Hỗ trợ vật dụng cần thiết cho công việc.</p>\r\n\r\n<p>- Các phúc lợi theo quy định chung và BHSK Bảo Việt.</p>\r\n\r\n<p>- Được đi du lịch hàng năm theo chính sách Công ty.</p>\r\n\r\n<p>- Thưởng vào các dịp lễ, sinh nhật nhân viên.</p>\r\n\r\n<p>- Môi trường làm việc chuyên nghiệp, thân thiện.</p>', '90/40 Âu Dương Lân, Phường 3, Quận 8', '2022-01-20 14:34:12', '2022-02-03 00:00:00', 2, 'hapdan', 'g7qak86689'),
('zljm178378', 'Chuyên Viên Cao Cấp Đối Tác Nhân Sự - Khối Quản Trị Nguồn Nhân Lực', 'Thực tập sinh/Sinh viên', 'Thực tập', 'Nhân sự,Quản lý điều hành', 'Hà Nội', '<p>- Lập kế hoạch tuyển dụng, sắp xếp nhân lực, tổ chức bộ máy đảm bảo vận hành Công ty.</p>\r\n\r\n<p>- Xây dựng quy trình hoạt động của phòng nhân sự</p>\r\n\r\n<p>- Phối hợp các phòng ban xây dựng kế hoạch đào tạo, tuyển dụng đội ngũ nhân sự.</p>\r\n\r\n<p>- Xây dựng quy chế, quy định, chế độ chính sách phù hợp cho Công ty và cán bộ nhân viên.</p>\r\n\r\n<p>-Tổ chức lưu trữ, quản lý hồ sơ lý lịch theo phương pháp khoa học, làm thống kê báo cáo hàng tháng/quý/năm</p>\r\n\r\n<p>- Quản lý chấm công &amp; tính lương &amp; chi trả chế độ khen thưởng, kỷ luật cho Người lao động;</p>\r\n\r\n<p>- Thiết lập và duy trì quan hệ tốt với các cơ quan chức năng, các sở ban ngành liên quan.</p>\r\n\r\n<p>- Các công việc liên quan khác theo chỉ đạo của Ban giám đốc Công ty</p>', '<p>- Nữ,Độ tuổi: Từ 30 – 45 tuổi.</p>\r\n\r\n<p>- Số năm kinh ngiệm: Ít nhất 5 năm kinh nghiệm về nhân sự</p>\r\n\r\n<p>- Đã từng làm việc tại vị trí trưởng phòng nhân sự tại công ty có quy mô vừa và nhỏ. Ưu tiên từng làm trong ngành xây dựng</p>\r\n\r\n<p>- Trình độ học vấn/ chuyên môn: Tốt nghiệp Đại học/ Trên Đại học Chuyên ngành Quản trị nguồn nhân lực, Quản trị kinh doanh,</p>\r\n\r\n<p>- Kinh nghiệm xây dựng quy trình hoạt động phòng nhân sự, xây dựng khung năng lực và xây dựng chế độ chính sách.</p>\r\n\r\n<p>- Kỹ năng tổ chức - Kỹ năng đàm phán và thuyết phục</p>\r\n\r\n<p>- Kỹ năng giao tiếp - Quản lý xung đột và giải quyết vấn đề</p>\r\n\r\n<p>- Sử dụng thành thạo các ứng dụng tin học văn phòng, am hiểu các quy định pháp luật liên quan đến công tác nhân sự, lương và BHXH.</p>', 'Trung học', '1 năm', '1500', '2000', '<p>- Lương thưởng thỏa thuận tùy theo năng lực, kinh nghiệm và hiệu quả làm việc thực tế, từ 17tr – 20tr</p>\r\n\r\n<p>- BHXH, BHYT theo quy định của nhà nước và các chế độ đãi ngộ khác</p>\r\n\r\n<p>- Lương Tháng 13, thưởng cuối năm - Du lịch hằng nă</p>', 'Phố Thành Thái, Dịch Vọng, Cầu Giấy', '2022-01-20 15:00:34', '2022-01-30 00:00:00', 2, 'coban', 'w4olx67036'),
('ZYC8j49780', 'Ruby Developer (Sign On Bonus)', 'Mới tốt nghiệp', 'Bán thời gian', 'Công nghệ thông tin,IT phần mềm', 'Hà Nội', '<p>● Lập trình chính trong các dự án gia công phần mềm sử dụng ngôn ngữ Ruby cho khách hàng Nhật Bản;</p>\r\n\r\n<p>● Thực hiện details design, unit test, coding cho các dự án sử dụng ngôn ngữ Ruby;</p>\r\n\r\n<p>● Tham gia vào tất cả các khâu trong quá trình phát triển phần mềm, bao gồm: tìm hiểu yêu cầu, phân tích, thiết kế, nghiên cứu công nghệ mới...</p>\r\n\r\n<p>● Phối hợp với các thành viên nhóm dự án khác dưới sự điều phối của Project Manager và tiếp xúc trực tiếp với khách hàng Nhật Bản.</p>', '<p>● Có kinh nghiệm làm việc với Ruby, Ruby on Rails frameworks.</p>\r\n\r\n<p>● Nắm vững kỹ năng phân tích và lập trình hướng đối tượng tốt; Có kinh nghiệm làm việc và xử lý các hệ thống lớn</p>\r\n\r\n<p>● Thao tác tốt với một trong các Database: MySQL, PostgreSQL, Oracle</p>\r\n\r\n<p>● Có kinh nghiệm làm việc với Cloud, Microservices, Big Data là một lợi thế</p>\r\n\r\n<p>● Thành thạo AWS, Docker, các công cụ quản lý mã nguồn: GIT, SVN, và dự án Redmine, Jira.</p>\r\n\r\n<p>● Có kiến thức về Infrastructure, Deployment, CI/CD</p>\r\n\r\n<p>● Thao tác tốt với HTML, CSS, JavaScript (Jquery, AngularJS, Ajax, ...), Bootstrap, JSON, XML, ReacJS</p>\r\n\r\n<p>● Có kinh nghiệm với OOP, MVC Framework, ORM, RESTful API, Design Patterns</p>\r\n\r\n<p>● Hiểu biết về TDD, Testing và có thể implements các requirement theo TDD, có tư duy DRY</p>\r\n\r\n<p># Yêu cầu chung:</p>\r\n\r\n<p>● Có kinh nghiệm làm việc trong các dự án theo mô hình Agile</p>\r\n\r\n<p>● Có khả năng làm việc teamwork cũng như làm việc độc lập</p>\r\n\r\n<p>● Có thể làm việc dưới áp lực cao về deadline cũng như chất lượng sản phẩm</p>\r\n\r\n<p>● Khả năng tư duy tốt, chủ động trong công việc, có tinh thần trách nhiệm cao để hoàn thành công việc được giao.</p>\r\n\r\n<p>● Ưu tiên ứng viên biết tiếng Nhật hoặc tiếng Anh</p>', 'Đại học', 'Dưới 1 năm', '500', '1000', '<p><strong>* 3 reasons muốn gia nhập công ty:</strong></p>\r\n\r\n<p><strong>- Lương: Up to USD2500</strong></p>\r\n\r\n<p><strong>- 100% lương thử việc</strong></p>\r\n\r\n<p><strong>- Sign on bonus: Up to 8M</strong></p>\r\n\r\n<p>- Tăng lương hàng năm</p>\r\n\r\n<p>- Tháng lương 13 và KPI bonus 2 lần/năm</p>\r\n\r\n<p>- Trợ cấp thi chứng chỉ công nghệ, trợ cấp tiếng Nhật</p>\r\n\r\n<p>- Làm việc từ thứ 2 đến thứ 6. Nghỉ T7 &amp; CN.</p>\r\n\r\n<p>- Đóng BHXH trên lương full.</p>\r\n\r\n<p>- Bảo hiểm chăm sóc sức khỏe cao cấp, khám sức khỏe định kì hàng năm</p>\r\n\r\n<p>- Quà và tiền mặt vào các ngày lễ tết.</p>', 'Tầng 14 Richy Tower, 35 Mạc Thái Tổ, Yên Hòa, Cầu Giấy', '2022-01-20 14:38:03', '2022-02-28 00:00:00', 2, 'hapdan', 'g7qak86689');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tknhatuyendung`
--

CREATE TABLE `tbl_tknhatuyendung` (
  `id_ntd` char(10) NOT NULL,
  `tennlh` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `sdt` varchar(45) DEFAULT NULL,
  `trangthaitk` varchar(50) DEFAULT '0',
  `diem_tkuv` int(11) DEFAULT 0,
  `verify_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tknhatuyendung`
--

INSERT INTO `tbl_tknhatuyendung` (`id_ntd`, `tennlh`, `email`, `matkhau`, `sdt`, `trangthaitk`, `diem_tkuv`, `verify_email`) VALUES
('8Xzp665890', 'Snow B.Watson', 'duyspecter@gmail.com', '$2y$10$w4Gifo1aHCo4iBAcHv6cleJc.7hgJ.gaGj2yCzS340hQCfEGhqTze', '0376647881', '2', 97, NULL),
('AKIZa27233', 'Lê Thị Riêng', 'cantstophorny@gmail.com', '$2y$10$BDdcXsaXMv3qR00HgMQq8OaTn/.c5koHwTs/LtuqQ7nhUxgY5nbXK', '0835784338', '90', 298, NULL),
('g7qak86689', 'Phan Thanh Duy', 'duytaku.it@gmail.com', '$2y$10$kCd0XNeaQWmlnRs3urUZ8eq6xMO/wleOO3jSxSe62Sng4TgcVP8lm', '0376345528', '2', 97, NULL),
('hyYOl18072', 'Trương Minh Tinh', 'cabongkhotieu232@gmail.com', '$2y$10$ixsVuBOlbQoGx0zSMb0op.BPRmBZfLtwIrhrCala3XXv2c7/IkEcq', '0835784334', '2', 0, NULL),
('K4INf88934', 'Đoàn Văn Tâm', 'tranhuynhquocbao232@hotmail.com', '$2y$10$2XOc7eUTMAGePBlDnKIEpOTVHWwOGANhYFv2v8165mZ0VsRqrc83m', '0835784331', '90', 0, 'NULL'),
('VkQNF92335', 'Quốc Bảo Trần', 'tranhuynhquocbao232@gmail.com', '$2y$10$IB1yolBpjHvFdRcDNt0b5u28OIJffzQlRThlngV0fGArzqEDPX6Nm', '0835784337', '2', 0, 'NULL'),
('w4olx67036', 'Lê Duy', 'recruiter.testloop@gmail.com', '$2y$10$DyR1mrFjQAf.5FhmkR8ig.L/b1Y.Ox.XOUVHBd/C/PIzBHO1SWI46', '0376435528', '90', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tkquantrivien`
--

CREATE TABLE `tbl_tkquantrivien` (
  `id_qtv` char(10) NOT NULL,
  `tenqtv` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `sdt` varchar(45) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `id_chucvu` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tkquantrivien`
--

INSERT INTO `tbl_tkquantrivien` (`id_qtv`, `tenqtv`, `email`, `matkhau`, `sdt`, `hinhanh`, `id_chucvu`) VALUES
('qtv1', 'Administrator', 'admin@gmail.com', '$2y$10$vX4ERNZOrvnq3AOGKyizded35pSy0DSnZgoA98qxXCfk4c9.csB36', '0376435528', '3mJJWvsKZimatthew.png', 'admin'),
('qtv2', 'Trần Huỳnh Quốc Bảo', 'quocbao.tranhuynh@gmail.com', '$2y$10$oOqhtXIXxwTjjybzrhOgeOqv9TxctEoLP1SMZU/Ai8KVMNAAcydwS', '0388888877', 'dpdIUh89j0images.png', 'admin'),
('qtv3', 'Lê Duy', 'duy.le@gmail.com', '$2y$10$ymBc1tcX1RektxpAPqF34OPpK.8KKmw3eM6a5rTvmHbqVvNHR5rie', '0376435527', 'm5ZCe4cRUApatrick.png', 'admin'),
('qtv4', 'Trần Ngọc Vân Phượng', 'vanphuong.tranngoc@gmail.com', '$2y$10$n8Ai4c.PIilMNeoXwukS0u2jTrwPLt.j7JiGHuHAhyB1gzAAwkyRS', '0376435897', 'FSuKoXwzqkava-girl.png', 'nvqt'),
('qtv5', 'Phan Văn Sắc', 'sac.phanvan@gmail.com', '$2y$10$C9/Q.X7oj6Rst0GVWOQ2Rudn4efx3XJ5gjxtrwHFyE0M.mHVR3ayK', '0344758891', 'XCdgOTYqYuavatar2.png', 'nvqt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tkungvien`
--

CREATE TABLE `tbl_tkungvien` (
  `id_uv` char(10) NOT NULL,
  `email` char(45) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `ten` varchar(45) NOT NULL,
  `ho` varchar(45) NOT NULL,
  `ngaysinh` varchar(45) DEFAULT NULL,
  `gioitinh` varchar(10) DEFAULT NULL,
  `sdt` varchar(45) DEFAULT NULL,
  `thanhpho` varchar(50) DEFAULT NULL,
  `diachi` varchar(45) DEFAULT NULL,
  `trangthaitk` varchar(45) NOT NULL DEFAULT '0',
  `maxacnhan` varchar(45) DEFAULT NULL,
  `solanxacnhan` varchar(45) DEFAULT '5',
  `hinhanh` varchar(255) DEFAULT NULL,
  `trinhdoht` varchar(255) DEFAULT NULL,
  `nganhnghemm` varchar(255) DEFAULT NULL,
  `noilamviecmm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tkungvien`
--

INSERT INTO `tbl_tkungvien` (`id_uv`, `email`, `matkhau`, `ten`, `ho`, `ngaysinh`, `gioitinh`, `sdt`, `thanhpho`, `diachi`, `trangthaitk`, `maxacnhan`, `solanxacnhan`, `hinhanh`, `trinhdoht`, `nganhnghemm`, `noilamviecmm`) VALUES
('uv108', 'cabongkhotieu232@gmail.com', '$2y$10$FmcnMU2VlF53c5oRd0.E/ubUfxzEglVt6J7XPcq.1VC5gecvVQA9.', 'Bông', 'Lê Văn', '1998-07-17', 'Nam', '0879556332', 'Đà Nẵng', '318 Lê Đại Hành', '1', NULL, '5', 'TMBcPgy8QzTom_Holland.jpg', 'Cao học', 'Dịch vụ khách hàng, Giáo dục/Đào tạo, Kinh doanh/Bán hàng', 'Đà Nẵng, Thừa Thiên-Huế'),
('uv114', 'duytaku.it@gmail.com', '$2y$10$mMfrx63GNlNpuqInbo1e3.tcDk2VO2wxBmVebu.TUcPkq9oe7XmAS', 'Mi', 'Trương Ngọc', '1999-02-18', 'Nam', '0366788888', 'Hồ Chí Minh', '90/40 Âu Dương Lân, Phường 3, Quận 8', '1', 'bHSTtGrrQp', '5', 'Cd5WTbUvlUbusinesswoman-character-avatar-icon-vector-12800169.jpg', 'Cao đẳng', 'Biên/phiên dịch, Tư vấn', 'Hồ Chí Minh, Bà Rịa Vũng Tàu, Bình Dương'),
('uv117', 'tranhuynhquocbao232@hotmail.com', '$2y$10$DWZz5c7gVMYKiUSyGEnUOOzvqiGmDMX33.HzKeHzbz9ug5oHRwSuO', 'Vân', 'Tường Vân', '1998-09-30', 'Nữ', '0835784337', 'Cần Thơ', '259/8 Trẫn Hưng Đạo', '1', NULL, '5', 'UkGLBtTKrhD6hjvrlKzcAAUfTtlc2t_61e91659479ad_cvtpl.jpg', 'Đại học', 'Khách sạn/Nhà hàng, Kinh doanh/Bán hàng', 'Cần Thơ, Trà Vinh, Vĩnh Long'),
('uv168', 'recruiter.testloop@gmail.com', '$2y$10$MMhQ.6MCxQrvjVvyUFdJq.0iYC2A/P7OCLwN7cktHb34Iw5a00Mj2', 'Hoàng', 'Bùi Minh', '1996-07-19', 'Nam', '0376435774', 'Hà Nội', '90/40 Âu Dương Lân, Phường 3, Quận 8', '1', 'CUoEroe5xt', '5', '5bc0o2crdXmale_boy_person_people_avatar_icon_159358.png', 'Đại học', 'Cơ khí/Chế tạo/Tự động hóa, Công nghệ cao', 'Hà Nội, Hải Phòng'),
('uv169', 'cantstophorny@gmail.com', '$2y$10$taooGv8GNwXlTT4r8kAOoudxa8S0LEXducTpMSlijUzufagIgRtjG', 'Hải', 'Mai Nam', '1998-06-03', 'Nam', '0835784337', 'Bến Tre', '941/26 Trẫn Xuân Soạn', '1', NULL, '5', 'lmBwOtoHEGbomman-van-bi-am-anh-ve-viec-hoc-dai-hoc-du-da-30-tuoi3-0938.jpg', 'Trung học', 'Kinh doanh/Bán hàng, Ngành nghề khác', 'Bến Tre, Cần Thơ, Vĩnh Long'),
('uv180', 'duyspecter@gmail.com', '$2y$10$TQLApjjx4GYreuiaoEIklOpoBdCexL6T.HkyKIztGPltI8SNAFZzO', 'Johnny', 'Joestar', '1999-12-21', 'Nam', '0376455417', 'Hồ Chí Minh', '90/40 Âu Dương Lân, Phường 3, Quận 8', '1', 'mPTM56UZGC', '5', 'kAf8ZPwVssmale-avatar-icon-flat-style.jpg', 'Cao đẳng', 'Cơ khí/Chế tạo/Tự động hóa, Công nghệ thông tin', 'Hồ Chí Minh, Bà Rịa Vũng Tàu'),
('uv7', 'loopit.test@gmail.com', '$2y$10$.wk34phj4zXxtCiryRvHH.ZU7Pte7D0hkXSX3X/g6v.LBhjmZeTjK', 'Văn Cường', 'Nguyễn', '2002-03-22', 'Nam', '037643001', 'Hồ Chí Minh', '90/40 Âu Dương Lân, Phường 3, Quận 8', '1', 'TpAeoOSziW', '5', 'uzJl6EiVGymatthew.png', 'Đại học', 'Nhân sự', 'Hồ Chí Minh, Bà Rịa Vũng Tàu'),
('uv84', 'eternallove23299@gmail.com', '$2y$10$7gDmv6tHFhXQOIMJsDsrk./dxs0/bmWLHJI9lWZyjLz1cGfn899NS', 'My', 'Võ Thị Diêm', NULL, NULL, NULL, NULL, NULL, '1', NULL, '5', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`id_chitietdh`,`id_dichvu`,`id_donhang`),
  ADD KEY `fk_tbl_dichvu_has_tbl_hoadon_tbl_hoadon1_idx` (`id_donhang`),
  ADD KEY `fk_tbl_dichvu_has_tbl_hoadon_tbl_dichvu1_idx` (`id_dichvu`);

--
-- Indexes for table `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD PRIMARY KEY (`id_chucvu`);

--
-- Indexes for table `tbl_congviecbaocao`
--
ALTER TABLE `tbl_congviecbaocao`
  ADD PRIMARY KEY (`id_baocao`,`id_uv`,`id_tintd`),
  ADD KEY `fk_tbl_congviecbaocao_tbl_tkungvien1_idx` (`id_uv`),
  ADD KEY `fk_tbl_congviecbaocao_tbl_tintuyendung1_idx` (`id_tintd`);

--
-- Indexes for table `tbl_congviecdaluu`
--
ALTER TABLE `tbl_congviecdaluu`
  ADD PRIMARY KEY (`id_cvdaluu`,`id_tintd`,`id_uv`),
  ADD KEY `fk_tbl_tkungvien_has_tbl_tintuyendung_tbl_tintuyendung1_idx` (`id_tintd`),
  ADD KEY `fk_tbl_congviecdaluu_tbl_tkungvien1_idx` (`id_uv`);

--
-- Indexes for table `tbl_congviecgoiy`
--
ALTER TABLE `tbl_congviecgoiy`
  ADD PRIMARY KEY (`id_goiy`,`id_uv`),
  ADD KEY `fk_tbl_congviecgoiy_tbl_tkungvien1_idx` (`id_uv`);

--
-- Indexes for table `tbl_cv`
--
ALTER TABLE `tbl_cv`
  ADD PRIMARY KEY (`id_cv`,`id_uv`),
  ADD KEY `fk_tbl_cv_tbl_tkungvien1_idx` (`id_uv`);

--
-- Indexes for table `tbl_cvuvdaluu`
--
ALTER TABLE `tbl_cvuvdaluu`
  ADD PRIMARY KEY (`id_CVdaluu`,`id_ntd`,`id_cv`),
  ADD KEY `fk_tbl_cv_has_tbl_tknhatuyendung_tbl_tknhatuyendung1_idx` (`id_ntd`),
  ADD KEY `fk_tbl_cvuvdaluu_tbl_cv1_idx` (`id_cv`);

--
-- Indexes for table `tbl_cvuvdaungtuyen`
--
ALTER TABLE `tbl_cvuvdaungtuyen`
  ADD PRIMARY KEY (`id_CVdaut`,`id_tintd`,`id_cv`),
  ADD KEY `fk_tbl_tintuyendung_has_tbl_cv_tbl_cv1_idx` (`id_cv`),
  ADD KEY `fk_tbl_tintuyendung_has_tbl_cv_tbl_tintuyendung1_idx` (`id_tintd`);

--
-- Indexes for table `tbl_dichvu`
--
ALTER TABLE `tbl_dichvu`
  ADD PRIMARY KEY (`id_dichvu`);

--
-- Indexes for table `tbl_dichvudadangky`
--
ALTER TABLE `tbl_dichvudadangky`
  ADD PRIMARY KEY (`id_dvdadk`,`id_ntd`,`id_dichvu`),
  ADD KEY `fk_tbl_tknhatuyendung_has_tbl_dichvu_tbl_dichvu1_idx` (`id_dichvu`),
  ADD KEY `fk_tbl_tknhatuyendung_has_tbl_dichvu_tbl_tknhatuyendung1_idx` (`id_ntd`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id_donhang`,`id_ntd`),
  ADD KEY `fk_tbl_hoadon_tbl_tknhatuyendung1_idx` (`id_ntd`);

--
-- Indexes for table `tbl_hocvan`
--
ALTER TABLE `tbl_hocvan`
  ADD PRIMARY KEY (`id_hocvan`,`id_uv`),
  ADD KEY `fk_tbl_hocvan_tbl_hosouv1_idx` (`id_uv`);

--
-- Indexes for table `tbl_hosontd`
--
ALTER TABLE `tbl_hosontd`
  ADD PRIMARY KEY (`id_hosontd`,`id_ntd`),
  ADD KEY `fk_tbl_hosontd_tbl_taikhoanntd_idx` (`id_ntd`);

--
-- Indexes for table `tbl_kinhnghiem`
--
ALTER TABLE `tbl_kinhnghiem`
  ADD PRIMARY KEY (`id_kinhnghiem`,`id_uv`),
  ADD KEY `fk_tbl_kinhnghiem_tbl_hosouv1_idx` (`id_uv`);

--
-- Indexes for table `tbl_loainganhnghe`
--
ALTER TABLE `tbl_loainganhnghe`
  ADD PRIMARY KEY (`id_lnn`);

--
-- Indexes for table `tbl_nganhnghe`
--
ALTER TABLE `tbl_nganhnghe`
  ADD PRIMARY KEY (`id_nganhnghe`);

--
-- Indexes for table `tbl_ngoaingu`
--
ALTER TABLE `tbl_ngoaingu`
  ADD PRIMARY KEY (`id_ngoaingu`,`id_uv`),
  ADD KEY `fk_tbl_ngoaingu_tbl_tkungvien1_idx` (`id_uv`);

--
-- Indexes for table `tbl_noidungcv`
--
ALTER TABLE `tbl_noidungcv`
  ADD PRIMARY KEY (`id_nd`,`id_cv`),
  ADD KEY `fk_tbl_noidungcv_tbl_cv1_idx` (`id_cv`);

--
-- Indexes for table `tbl_ntddaluu`
--
ALTER TABLE `tbl_ntddaluu`
  ADD PRIMARY KEY (`id_ntddaluu`,`id_hosontd`,`id_uv`),
  ADD KEY `fk_tbl_tkungvien_has_tbl_hosontd_tbl_hosontd1_idx` (`id_hosontd`),
  ADD KEY `fk_tbl_ntddaluu_tbl_tkungvien1_idx` (`id_uv`);

--
-- Indexes for table `tbl_thanhpho`
--
ALTER TABLE `tbl_thanhpho`
  ADD PRIMARY KEY (`id_tp`);

--
-- Indexes for table `tbl_tintuyendung`
--
ALTER TABLE `tbl_tintuyendung`
  ADD PRIMARY KEY (`id_tintd`,`id_ntd`),
  ADD KEY `fk_tbl_tintuyendung_tbl_tknhatuyendung1_idx1` (`id_ntd`);

--
-- Indexes for table `tbl_tknhatuyendung`
--
ALTER TABLE `tbl_tknhatuyendung`
  ADD PRIMARY KEY (`id_ntd`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `sdt_UNIQUE` (`sdt`);

--
-- Indexes for table `tbl_tkquantrivien`
--
ALTER TABLE `tbl_tkquantrivien`
  ADD PRIMARY KEY (`id_qtv`,`id_chucvu`),
  ADD KEY `fk_tbl_taikhoanqtv_tbl_chucvu1_idx` (`id_chucvu`);

--
-- Indexes for table `tbl_tkungvien`
--
ALTER TABLE `tbl_tkungvien`
  ADD PRIMARY KEY (`id_uv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `id_chitietdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_congviecbaocao`
--
ALTER TABLE `tbl_congviecbaocao`
  MODIFY `id_baocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_congviecdaluu`
--
ALTER TABLE `tbl_congviecdaluu`
  MODIFY `id_cvdaluu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_congviecgoiy`
--
ALTER TABLE `tbl_congviecgoiy`
  MODIFY `id_goiy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_cvuvdaluu`
--
ALTER TABLE `tbl_cvuvdaluu`
  MODIFY `id_CVdaluu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_cvuvdaungtuyen`
--
ALTER TABLE `tbl_cvuvdaungtuyen`
  MODIFY `id_CVdaut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_dichvudadangky`
--
ALTER TABLE `tbl_dichvudadangky`
  MODIFY `id_dvdadk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_loainganhnghe`
--
ALTER TABLE `tbl_loainganhnghe`
  MODIFY `id_lnn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `tbl_nganhnghe`
--
ALTER TABLE `tbl_nganhnghe`
  MODIFY `id_nganhnghe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `tbl_noidungcv`
--
ALTER TABLE `tbl_noidungcv`
  MODIFY `id_nd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;

--
-- AUTO_INCREMENT for table `tbl_ntddaluu`
--
ALTER TABLE `tbl_ntddaluu`
  MODIFY `id_ntddaluu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_thanhpho`
--
ALTER TABLE `tbl_thanhpho`
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD CONSTRAINT `fk_tbl_dichvu_has_tbl_hoadon_tbl_dichvu1` FOREIGN KEY (`id_dichvu`) REFERENCES `tbl_dichvu` (`id_dichvu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_dichvu_has_tbl_hoadon_tbl_hoadon1` FOREIGN KEY (`id_donhang`) REFERENCES `tbl_donhang` (`id_donhang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_congviecbaocao`
--
ALTER TABLE `tbl_congviecbaocao`
  ADD CONSTRAINT `fk_tbl_congviecbaocao_tbl_tintuyendung1` FOREIGN KEY (`id_tintd`) REFERENCES `tbl_tintuyendung` (`id_tintd`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_congviecbaocao_tbl_tkungvien1` FOREIGN KEY (`id_uv`) REFERENCES `tbl_tkungvien` (`id_uv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_congviecdaluu`
--
ALTER TABLE `tbl_congviecdaluu`
  ADD CONSTRAINT `fk_tbl_congviecdaluu_tbl_tkungvien1` FOREIGN KEY (`id_uv`) REFERENCES `tbl_tkungvien` (`id_uv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_tkungvien_has_tbl_tintuyendung_tbl_tintuyendung1` FOREIGN KEY (`id_tintd`) REFERENCES `tbl_tintuyendung` (`id_tintd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_congviecgoiy`
--
ALTER TABLE `tbl_congviecgoiy`
  ADD CONSTRAINT `fk_tbl_congviecgoiy_tbl_tkungvien1` FOREIGN KEY (`id_uv`) REFERENCES `tbl_tkungvien` (`id_uv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_cv`
--
ALTER TABLE `tbl_cv`
  ADD CONSTRAINT `fk_tbl_cv_tbl_tkungvien1` FOREIGN KEY (`id_uv`) REFERENCES `tbl_tkungvien` (`id_uv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_cvuvdaluu`
--
ALTER TABLE `tbl_cvuvdaluu`
  ADD CONSTRAINT `fk_tbl_cv_has_tbl_tknhatuyendung_tbl_tknhatuyendung1` FOREIGN KEY (`id_ntd`) REFERENCES `tbl_tknhatuyendung` (`id_ntd`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_cvuvdaluu_tbl_cv1` FOREIGN KEY (`id_cv`) REFERENCES `tbl_cv` (`id_cv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_cvuvdaungtuyen`
--
ALTER TABLE `tbl_cvuvdaungtuyen`
  ADD CONSTRAINT `fk_tbl_tintuyendung_has_tbl_cv_tbl_cv1` FOREIGN KEY (`id_cv`) REFERENCES `tbl_cv` (`id_cv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_tintuyendung_has_tbl_cv_tbl_tintuyendung1` FOREIGN KEY (`id_tintd`) REFERENCES `tbl_tintuyendung` (`id_tintd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_dichvudadangky`
--
ALTER TABLE `tbl_dichvudadangky`
  ADD CONSTRAINT `fk_tbl_tknhatuyendung_has_tbl_dichvu_tbl_dichvu1` FOREIGN KEY (`id_dichvu`) REFERENCES `tbl_dichvu` (`id_dichvu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_tknhatuyendung_has_tbl_dichvu_tbl_tknhatuyendung1` FOREIGN KEY (`id_ntd`) REFERENCES `tbl_tknhatuyendung` (`id_ntd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD CONSTRAINT `fk_tbl_hoadon_tbl_tknhatuyendung1` FOREIGN KEY (`id_ntd`) REFERENCES `tbl_tknhatuyendung` (`id_ntd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_hocvan`
--
ALTER TABLE `tbl_hocvan`
  ADD CONSTRAINT `fk_tbl_hocvan_tbl_hosouv1` FOREIGN KEY (`id_uv`) REFERENCES `tbl_tkungvien` (`id_uv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_hosontd`
--
ALTER TABLE `tbl_hosontd`
  ADD CONSTRAINT `fk_tbl_hosontd_tbl_taikhoanntd` FOREIGN KEY (`id_ntd`) REFERENCES `tbl_tknhatuyendung` (`id_ntd`);

--
-- Constraints for table `tbl_kinhnghiem`
--
ALTER TABLE `tbl_kinhnghiem`
  ADD CONSTRAINT `fk_tbl_kinhnghiem_tbl_hosouv1` FOREIGN KEY (`id_uv`) REFERENCES `tbl_tkungvien` (`id_uv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_ngoaingu`
--
ALTER TABLE `tbl_ngoaingu`
  ADD CONSTRAINT `fk_tbl_ngoaingu_tbl_tkungvien1` FOREIGN KEY (`id_uv`) REFERENCES `tbl_tkungvien` (`id_uv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_noidungcv`
--
ALTER TABLE `tbl_noidungcv`
  ADD CONSTRAINT `fk_tbl_noidungcv_tbl_cv1` FOREIGN KEY (`id_cv`) REFERENCES `tbl_cv` (`id_cv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_ntddaluu`
--
ALTER TABLE `tbl_ntddaluu`
  ADD CONSTRAINT `fk_tbl_ntddaluu_tbl_tkungvien1` FOREIGN KEY (`id_uv`) REFERENCES `tbl_tkungvien` (`id_uv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_tkungvien_has_tbl_hosontd_tbl_hosontd1` FOREIGN KEY (`id_hosontd`) REFERENCES `tbl_hosontd` (`id_hosontd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_tintuyendung`
--
ALTER TABLE `tbl_tintuyendung`
  ADD CONSTRAINT `fk_tbl_tintuyendung_tbl_tknhatuyendung1` FOREIGN KEY (`id_ntd`) REFERENCES `tbl_tknhatuyendung` (`id_ntd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_tkquantrivien`
--
ALTER TABLE `tbl_tkquantrivien`
  ADD CONSTRAINT `fk_tbl_taikhoanqtv_tbl_chucvu1` FOREIGN KEY (`id_chucvu`) REFERENCES `tbl_chucvu` (`id_chucvu`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
