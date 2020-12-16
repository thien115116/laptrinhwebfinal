-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 13, 2019 lúc 09:50 AM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `daitunglamhoasen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuongtrinhkhoatu`
--

DROP TABLE IF EXISTS `chuongtrinhkhoatu`;
CREATE TABLE IF NOT EXISTS `chuongtrinhkhoatu` (
  `idctkhoatu` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id chuong trinh khoa tu',
  `tieude` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tomtat` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `noidung` text CHARACTER SET utf8,
  `loaikhoatu` varchar(30) DEFAULT NULL COMMENT '3 ngay, 1 tuan, ...',
  `ngaybatdautu` date DEFAULT NULL COMMENT 'Ngày bắt đầu: danh cho chương trình tu',
  `ngayketthuctu` date DEFAULT NULL,
  `ngaybatdaudk` date DEFAULT NULL COMMENT 'Ngay bat dau-hien thi cho phep dky',
  `ngayketthucdk` date DEFAULT NULL COMMENT 'ngay het han dang ky',
  `khoa` varchar(255) DEFAULT NULL COMMENT '0: chưa khóa-> admin có thể đăng ký thêm, 1: đã khóa-admin không đăng ký được. quản lý đạo tràng có thể đăng ký cho thành viên khi thành còn ngày đăng ký',
  `anhien` int(1) DEFAULT '1' COMMENT '1: Hiển thị, 2: Ẩn (ẩn sau khi quá ngày): Active=1, unactive:0',
  PRIMARY KEY (`idctkhoatu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `chuongtrinhkhoatu`
--

INSERT INTO `chuongtrinhkhoatu` (`idctkhoatu`, `tieude`, `tomtat`, `noidung`, `loaikhoatu`, `ngaybatdautu`, `ngayketthuctu`, `ngaybatdaudk`, `ngayketthucdk`, `khoa`, `anhien`) VALUES
(1, 'Khoa tu 3 ngay', 'Noi dung tom tat', '<p style=\"text-align: justify;\"><span style=\"color: #993300;\"><strong>Khóa tu cho cá nhân&nbsp;</strong></span></p>\r\n<p style=\"text-align: justify;\">Khóa tu cho cá nhân được mở ra hầu như mỗi tuần trong năm, tạo điều kiện cho các cá nhân, gia đình và nhóm nhỏ có cơ hội tu tập cùng tăng thân những khi tu viện không có khóa tu theo chủ đề.&nbsp;(Nếu nhóm của bạn đông hơn 8 người, xin liên hệ với văn phòng ghi danh để tổ chức Group Retreat.).</p>', '3 ngay', '2019-12-21', '2019-12-23', '2019-11-19', '2019-12-19', NULL, 1),
(2, 'Khoa Tu 1 tuan', 'Noi dung tom tat', 'Noi dung chinh', '1 tuan', '2019-12-21', '2019-12-28', '2019-11-19', '2019-12-19', NULL, 1),
(3, 'Khoa tu dai han', 'Tom tat khoa tu', 'Noi dung chinh', 'dai han', '2019-11-19', NULL, '2019-10-19', '2019-11-18', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangky`
--

DROP TABLE IF EXISTS `dangky`;
CREATE TABLE IF NOT EXISTS `dangky` (
  `iddangky` int(11) NOT NULL AUTO_INCREMENT,
  `idctkhoatu` int(10) NOT NULL,
  `idthanhvien` int(10) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `hoten` varchar(255) DEFAULT NULL,
  `ngaythaotac` datetime(6) DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `ghichu` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Ly do dang ky hay huy',
  `trangthai` varchar(20) DEFAULT NULL COMMENT 'Dang ky: DANGKY, hay huy:HUY',
  `solanchinhsua` int(255) DEFAULT '1' COMMENT 'Chỉ cho update nếu số này nhỏ hơn 3. Viết trigger...',
  PRIMARY KEY (`iddangky`) USING BTREE,
  KEY `idkhoatu` (`idctkhoatu`),
  KEY `dangky_ibfk_1` (`idthanhvien`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `dangky`
--

INSERT INTO `dangky` (`iddangky`, `idctkhoatu`, `idthanhvien`, `code`, `hoten`, `ngaythaotac`, `ghichu`, `trangthai`, `solanchinhsua`) VALUES
(1, 1, 136, '1000', NULL, '2019-12-12 15:04:11.000000', NULL, 'HUY', 4),
(10, 1, 137, '1001', NULL, '2019-12-12 17:12:04.000000', NULL, 'HUY', 4),
(12, 1, 1136, '2000', NULL, '2019-12-13 09:52:57.249347', NULL, 'DANGKY', 1),
(13, 1, 138, '1002', NULL, '2019-12-13 09:36:34.000000', NULL, 'HUY', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daotrang`
--

DROP TABLE IF EXISTS `daotrang`;
CREATE TABLE IF NOT EXISTS `daotrang` (
  `iddaotrang` int(10) NOT NULL AUTO_INCREMENT,
  `tendaotrang` varchar(50) CHARACTER SET utf8 NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `thongtin` text CHARACTER SET utf8,
  `uid` int(11) DEFAULT NULL COMMENT 'user quan ly dao trang',
  `email` varchar(255) DEFAULT NULL COMMENT 'email cua user quan ly (thong tin them-co the bo)',
  PRIMARY KEY (`iddaotrang`) USING BTREE,
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `daotrang`
--

INSERT INTO `daotrang` (`iddaotrang`, `tendaotrang`, `diachi`, `thongtin`, `uid`, `email`) VALUES
(1, 'Thiện Minh', 'Nguyễn Thiện Thuật', '1234', NULL, NULL),
(2, 'Tịnh Oai', 'q', ' ', NULL, NULL),
(3, 'Đạo Tràng Khác', 'u', ' ', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `idgallery` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hinhdaidien` varchar(255) DEFAULT NULL,
  `mota` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `active` int(1) DEFAULT '1',
  PRIMARY KEY (`idgallery`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`idgallery`, `ten`, `hinhdaidien`, `mota`, `active`) VALUES
(1, 'Khoa Tu Ngày 12/2/2019', 'h1.png', 'Khoa tham quan kết hợp tu-phóng sanh', 1),
(2, 'Thư viện hình ảnh 2', 'h2.png', 'Mô tả Album 2', 1),
(3, 'Thư viện hình ảnh 3', 'h3.png', 'Mô tả album 3', 1),
(4, 'Thư viện hình ảnh 4', 'h4.png', 'mô tả Album 4', 1),
(5, 'Thu viện hình ảnh 5', 'h2.png', 'Mô tả Album 5', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallerychitiet`
--

DROP TABLE IF EXISTS `gallerychitiet`;
CREATE TABLE IF NOT EXISTS `gallerychitiet` (
  `idgallerychitiet` int(11) NOT NULL AUTO_INCREMENT,
  `hinhchitiet` varchar(255) DEFAULT NULL,
  `idgallery` int(255) DEFAULT NULL,
  PRIMARY KEY (`idgallerychitiet`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `gallerychitiet`
--

INSERT INTO `gallerychitiet` (`idgallerychitiet`, `hinhchitiet`, `idgallery`) VALUES
(1, '1.jpg', 1),
(2, '2.jpg', 1),
(3, '3.jpg', 1),
(4, '4.jpg', 1),
(5, '5.jpg', 1),
(6, '6.jpg', 1),
(7, '21.jpg', 2),
(8, '22.jpg', 2),
(9, '31.jpg', 3),
(10, '32.jpg', 3),
(11, '33.jpg', 3),
(12, '41.jpg', 4),
(13, '42.jpg', 4),
(14, '51.jpg', 5),
(15, '52.jpg', 5),
(16, '53.jpg', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thoigian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(50) NOT NULL,
  `noidung` text CHARACTER SET utf8 COMMENT 'Noi dung json cac mang thao tac',
  `table` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsudangky`
--

DROP TABLE IF EXISTS `lichsudangky`;
CREATE TABLE IF NOT EXISTS `lichsudangky` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codethanhvien` varchar(20) DEFAULT NULL,
  `hoten` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `iddaotrang` varchar(255) DEFAULT NULL,
  `thoigian` datetime(6) DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `thaotac` varchar(3) DEFAULT NULL COMMENT 'DK, HUY',
  `chuthich` text CHARACTER SET utf8,
  `codejson` text CHARACTER SET utf8 COMMENT 'chưa dùng. Lưu data dạng json',
  `solanchinhsua` int(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhansu`
--

DROP TABLE IF EXISTS `nhansu`;
CREATE TABLE IF NOT EXISTS `nhansu` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(60) CHARACTER SET utf8 NOT NULL,
  `namsinh` int(4) NOT NULL,
  `chucvu` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `namvaolam` int(4) NOT NULL,
  `songayphep` int(3) NOT NULL DEFAULT '12',
  `sonamlamviec` int(3) NOT NULL DEFAULT '1',
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `capdo` int(1) NOT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nhansu`
--

INSERT INTO `nhansu` (`id`, `hoten`, `namsinh`, `chucvu`, `namvaolam`, `songayphep`, `sonamlamviec`, `user_name`, `user_password`, `user_email`, `capdo`, `mota`) VALUES
(1, 'Trần Minh Quân ', 1980, 'Giám đốc', 2000, 12, 1, 'tmquan', '123', 'tmquan@mbs.com', 0, 'mo ta  Minh Quan'),
(2, 'Nguyễn Thị Hòa An', 1956, 'Phó giám đốc', 1990, 12, 1, 'nthan', '123', 'nthan', 3, ''),
(3, 'Lê Thị Thanh Thảo', 1975, 'CVP', 2000, 12, 1, 'lttthao', '123', 'lttthao', 2, ''),
(4, 'Hứa Huỳnh Khoa', 1979, 'TP', 2010, 12, 7, 'hhkhoa', '123', 'hhkhoa', 3, ''),
(5, 'Nguyễn Tuấn Cường', 1970, 'TP', 2000, 12, 1, 'ntcuong', '123', 'ntcuong', 3, ''),
(6, 'Quách Khánh Toàn', 1978, 'NV', 2016, 12, 1, 'qktoan', '123', 'qktoan', 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hinh` varchar(255) DEFAULT NULL,
  `noidung` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tacgia` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Bang chua cac slide-slogan cho cac khoa tu';

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `hinh`, `noidung`, `tacgia`, `link`) VALUES
(1, '1.jpg', 'Cuộc sống của chúng ta được định hình bởi chính tâm trí của chúng ta. Chúng ta sẽ trở thành những gì chúng ta nghĩ', 'Lời Phật Dạy', NULL),
(2, '2.jpg', 'Buông xả mọi phiền não trong cuộc sống để tâm bình an là niềm hạnh phúc lớn nhất của mỗi người', 'Lời Phật Dạy', NULL),
(3, '3.jpg', 'Hãy tự mình thắp đuốc lên mà đi\r\n\r\n- Hãy nương vào Tứ Niệm Xứ để tu tập', 'Lời Phật Dạy', NULL),
(7, '1574612745-1 (1).jpg', ' Hết thảy hạnh phúc cõi nhân sinh đều chỉ có thể tìm được từ trong chính tâm mình ', 'Lời Phật Dạy', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

DROP TABLE IF EXISTS `thanhvien`;
CREATE TABLE IF NOT EXISTS `thanhvien` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `iddaotrang` int(10) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL COMMENT 'Mã cấp cho từng thành viên trong đạo tràng',
  `hoten` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `phapdanh` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ngaysinh` varchar(12) DEFAULT NULL,
  `gioitinh` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Nam, Nữ',
  `noidkhk` tinytext CHARACTER SET utf8,
  `cmnd` varchar(20) DEFAULT NULL,
  `ngaycap` varchar(12) DEFAULT NULL,
  `noicap` varchar(100) DEFAULT NULL,
  `nghenghiep` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `tinhtrangthannhan` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sodtcanhan` varchar(50) DEFAULT NULL,
  `sodtnguoithan` varchar(255) DEFAULT NULL,
  `hinhcmnd1` varchar(255) DEFAULT '' COMMENT 'hình mặt trước',
  `hinhcmnd2` varchar(255) DEFAULT '' COMMENT 'Hình mặt sau',
  `ghichu` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ngaydk` datetime(6) DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6) COMMENT 'ngày dk-cap nha',
  `active` int(1) DEFAULT '1' COMMENT '1; đang hoạt động, 0: Tạm dừng sử dụng',
  `hinh46` varchar(200) DEFAULT NULL,
  `tinhtrangbenhly` text CHARACTER SET utf8,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `thanhvien_ibfk_1` (`iddaotrang`)
) ENGINE=InnoDB AUTO_INCREMENT=1263 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `iddaotrang`, `code`, `hoten`, `phapdanh`, `ngaysinh`, `gioitinh`, `noidkhk`, `cmnd`, `ngaycap`, `noicap`, `nghenghiep`, `tinhtrangthannhan`, `sodtcanhan`, `sodtnguoithan`, `hinhcmnd1`, `hinhcmnd2`, `ghichu`, `ngaydk`, `active`, `hinh46`, `tinhtrangbenhly`) VALUES
(136, 1, '1000', 'Trần Văn Hùng', 'Chưa', '26/01/1970', 'Nam', 'TPHCM', '', '', '', 'Giáo Viên', '', '7140', '', '', '', ' ', '2019-12-12 15:01:05.025505', 1, NULL, NULL),
(137, 1, '1001', 'Vũ Văn Minh', 'Hue Man', '', '', '', '', '', '', '', '', '5880', '', '', '', ' ', '2019-12-12 22:30:12.475215', 1, NULL, NULL),
(138, 1, '1002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1728', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(139, 1, '1003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6833', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(140, 1, '1004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2393', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(141, 1, '1005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6499', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(142, 1, '1006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8960', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(143, 1, '1007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3716', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(144, 1, '1008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2972', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(145, 1, '1009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2670', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(146, 1, '1010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8440', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(147, 1, '1011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1637', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(148, 1, '1012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8596', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(149, 1, '1013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8738', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(150, 1, '1014', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6637', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(151, 1, '1015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3688', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(152, 1, '1016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5483', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(153, 1, '1017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7546', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(154, 1, '1018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5520', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(155, 1, '1019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8464', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(156, 1, '1020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2353', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(157, 1, '1021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4438', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(158, 1, '1022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2557', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(159, 1, '1023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1058', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(160, 1, '1024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3424', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(161, 1, '1025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9257', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(162, 1, '1026', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8717', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(163, 1, '1027', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7064', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(164, 1, '1028', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8416', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(165, 1, '1029', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9349', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(166, 1, '1030', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3469', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(167, 1, '1031', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2576', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(168, 1, '1032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3545', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(169, 1, '1033', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5555', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(170, 1, '1034', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6781', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(171, 1, '1035', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4188', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(172, 1, '1036', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6532', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(173, 1, '1037', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3220', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(174, 1, '1038', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7123', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(175, 1, '1039', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5993', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(176, 1, '1040', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3596', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(177, 1, '1041', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3189', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(178, 1, '1042', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6463', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(179, 1, '1043', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6585', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(180, 1, '1044', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3454', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(181, 1, '1045', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1803', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(182, 1, '1046', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2269', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(183, 1, '1047', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9058', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(184, 1, '1048', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1326', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(185, 1, '1049', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8908', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(186, 1, '1050', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5511', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(187, 1, '1051', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3006', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(188, 1, '1052', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5930', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(189, 1, '1053', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2847', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(190, 1, '1054', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4658', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(191, 1, '1055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9522', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(192, 1, '1056', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3486', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(193, 1, '1057', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2463', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(194, 1, '1058', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1677', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(195, 1, '1059', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9200', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(196, 1, '1060', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2711', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(197, 1, '1061', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4101', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(198, 1, '1062', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3038', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(199, 1, '1063', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5134', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(200, 1, '1064', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7826', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(201, 1, '1065', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8605', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(202, 1, '1066', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1710', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(203, 1, '1067', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4917', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(204, 1, '1068', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9547', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(205, 1, '1069', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3317', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(206, 1, '1070', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4161', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(207, 1, '1071', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2644', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(208, 1, '1072', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3095', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(209, 1, '1073', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7082', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(210, 1, '1074', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3360', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(211, 1, '1075', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5908', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(212, 1, '1076', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6188', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(213, 1, '1077', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7244', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(214, 1, '1078', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5776', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(215, 1, '1079', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8803', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(216, 1, '1080', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5044', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(217, 1, '1081', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4645', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(218, 1, '1082', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4378', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(219, 1, '1083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9923', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(220, 1, '1084', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8383', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(221, 1, '1085', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4631', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(222, 1, '1086', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5633', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(223, 1, '1087', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3360', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(224, 1, '1088', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2423', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(225, 1, '1089', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8044', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(226, 1, '1090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2512', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(227, 1, '1091', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5710', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(228, 1, '1092', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4882', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(229, 1, '1093', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2229', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(230, 1, '1094', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1483', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(231, 1, '1095', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2066', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(232, 1, '1096', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1981', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(233, 1, '1097', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6030', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(234, 1, '1098', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4514', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(235, 1, '1099', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9022', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(236, 1, '1100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2437', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(237, 1, '1101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6789', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(238, 1, '1102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9074', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(239, 1, '1103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2671', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(240, 1, '1104', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1469', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(241, 1, '1105', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5351', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(242, 1, '1106', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8133', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(243, 1, '1107', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8606', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(244, 1, '1108', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7796', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(245, 1, '1109', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7059', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(246, 1, '1110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8158', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(247, 1, '1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2923', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(248, 1, '1112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7637', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(249, 1, '1113', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3758', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(250, 1, '1114', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2119', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(251, 1, '1115', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2215', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(252, 1, '1116', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9710', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(253, 1, '1117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9790', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(254, 1, '1118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5484', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(255, 1, '1119', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9574', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(256, 1, '1120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9234', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(257, 1, '1121', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8001', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(258, 1, '1122', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2222', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(259, 1, '1123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5596', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(260, 1, '1124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5928', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(261, 1, '1125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3732', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(262, 1, '1126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7802', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(263, 1, '1127', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2374', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(264, 1, '1128', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4011', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(265, 1, '1129', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6829', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(266, 1, '1130', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6192', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(267, 1, '1131', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7501', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(268, 1, '1132', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3201', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(269, 1, '1133', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4635', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(270, 1, '1134', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3862', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(271, 1, '1135', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6072', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(272, 1, '1136', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7718', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(273, 1, '1137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6994', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(274, 1, '1138', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2780', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(275, 1, '1139', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5680', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(276, 1, '1140', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8279', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(277, 1, '1141', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1249', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(278, 1, '1142', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9415', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(279, 1, '1143', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9418', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(280, 1, '1144', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9104', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(281, 1, '1145', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6245', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(282, 1, '1146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7735', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(283, 1, '1147', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6882', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(284, 1, '1148', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9912', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(285, 1, '1149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9324', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(286, 1, '1150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4209', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(287, 1, '1151', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1163', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(288, 1, '1152', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5921', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(289, 1, '1153', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2332', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(290, 1, '1154', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9807', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(291, 1, '1155', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8857', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(292, 1, '1156', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5849', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(293, 1, '1157', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8610', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(294, 1, '1158', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3996', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(295, 1, '1159', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6057', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(296, 1, '1160', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4916', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(297, 1, '1161', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2004', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(298, 1, '1162', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6746', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(299, 1, '1163', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9356', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(300, 1, '1164', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2841', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(301, 1, '1165', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5857', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(302, 1, '1166', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6525', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(303, 1, '1167', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3848', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(304, 1, '1168', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3842', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(305, 1, '1169', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3013', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(306, 1, '1170', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5303', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(307, 1, '1171', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6128', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(308, 1, '1172', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7638', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(309, 1, '1173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7815', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(310, 1, '1174', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9547', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(311, 1, '1175', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1288', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(312, 1, '1176', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9447', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(313, 1, '1177', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3107', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(314, 1, '1178', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3226', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(315, 1, '1179', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5924', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(316, 1, '1180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8989', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(317, 1, '1181', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3234', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(318, 1, '1182', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1810', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(319, 1, '1183', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5127', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(320, 1, '1184', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1482', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(321, 1, '1185', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9038', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(322, 1, '1186', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7267', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(323, 1, '1187', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6493', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(324, 1, '1188', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4645', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(325, 1, '1189', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7863', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(326, 1, '1190', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8066', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(327, 1, '1191', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4114', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(328, 1, '1192', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4697', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(329, 1, '1193', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9554', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(330, 1, '1194', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6175', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(331, 1, '1195', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5585', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(332, 1, '1196', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1356', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(333, 1, '1197', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1454', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(334, 1, '1198', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8063', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(335, 1, '1199', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5000', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(336, 1, '1200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7841', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(337, 1, '1201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2406', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(338, 1, '1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6700', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(339, 1, '1203', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9951', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(340, 1, '1204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5871', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(341, 1, '1205', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8755', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(342, 1, '1206', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8553', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(343, 1, '1207', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5534', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(344, 1, '1208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8665', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(345, 1, '1209', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3345', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(346, 1, '1210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6592', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(347, 1, '1211', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8341', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(348, 1, '1212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6941', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(349, 1, '1213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9518', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(350, 1, '1214', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7286', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(351, 1, '1215', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3466', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(352, 1, '1216', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4919', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(353, 1, '1217', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1119', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(354, 1, '1218', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3602', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(355, 1, '1219', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7503', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(356, 1, '1220', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2316', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(357, 1, '1221', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1491', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(358, 1, '1222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(359, 1, '1223', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5547', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(360, 1, '1224', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3352', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(361, 1, '1225', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2479', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(362, 1, '1226', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4479', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(363, 1, '1227', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5190', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(364, 1, '1228', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7745', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(365, 1, '1229', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9425', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(366, 1, '1230', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8477', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(367, 1, '1231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9526', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(368, 1, '1232', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1715', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(369, 1, '1233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5175', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(370, 1, '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6972', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(371, 1, '1235', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8149', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(372, 1, '1236', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2980', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(373, 1, '1237', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4071', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(374, 1, '1238', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6435', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(375, 1, '1239', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4154', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(376, 1, '1240', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6758', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(377, 1, '1241', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6957', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(378, 1, '1242', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8834', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(379, 1, '1243', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5133', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(380, 1, '1244', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3768', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(381, 1, '1245', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1177', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(382, 1, '1246', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2636', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(383, 1, '1247', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5180', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(384, 1, '1248', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7230', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(385, 1, '1249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5575', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(386, 1, '1250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7812', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(387, 1, '1251', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2889', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(388, 1, '1252', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7862', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(389, 1, '1253', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7494', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(390, 1, '1254', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3829', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(391, 1, '1255', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1354', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(392, 1, '1256', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9882', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(393, 1, '1257', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7779', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(394, 1, '1258', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1657', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(395, 1, '1259', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8169', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(396, 1, '1260', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4010', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(397, 1, '1261', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2772', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(398, 1, '1262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7765', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(399, 1, '1263', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8427', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(400, 1, '1264', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3464', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(401, 1, '1265', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2318', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(402, 1, '1266', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6120', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(403, 1, '1267', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9723', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(404, 1, '1268', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7963', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(405, 1, '1269', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2761', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(406, 1, '1270', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3192', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(407, 1, '1271', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6149', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(408, 1, '1272', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3725', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(409, 1, '1273', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4944', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(410, 1, '1274', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9950', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(411, 1, '1275', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5300', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(412, 1, '1276', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8470', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(413, 1, '1277', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5211', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(414, 1, '1278', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5862', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(415, 1, '1279', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1269', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(416, 1, '1280', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8417', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(417, 1, '1281', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4406', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(418, 1, '1282', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1897', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(419, 1, '1283', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1650', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(420, 1, '1284', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3283', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(421, 1, '1285', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7872', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(422, 1, '1286', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4524', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(423, 1, '1287', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9537', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(424, 1, '1288', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6287', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(425, 1, '1289', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7453', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(426, 1, '1290', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6711', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(427, 1, '1291', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5524', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(428, 1, '1292', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8150', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(429, 1, '1293', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8494', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(430, 1, '1294', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5928', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(431, 1, '1295', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1704', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(432, 1, '1296', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4088', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(433, 1, '1297', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2837', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(434, 1, '1298', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4142', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(435, 1, '1299', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5671', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(436, 1, '1300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2821', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(437, 1, '1301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4827', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(438, 1, '1302', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7824', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(439, 1, '1303', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2519', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(440, 1, '1304', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8568', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(441, 1, '1305', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6306', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(442, 1, '1306', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9941', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(443, 1, '1307', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8842', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(444, 1, '1308', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3048', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(445, 1, '1309', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3620', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(446, 1, '1310', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7962', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(447, 1, '1311', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9733', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(448, 1, '1312', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8478', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(449, 1, '1313', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6612', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(450, 1, '1314', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3857', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(451, 1, '1315', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3786', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(452, 1, '1316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6579', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(453, 1, '1317', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2625', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(454, 1, '1318', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4093', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(455, 1, '1319', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3095', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(456, 1, '1320', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1568', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(457, 1, '1321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1503', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(458, 1, '1322', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1640', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(459, 1, '1323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6253', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(460, 1, '1324', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2164', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(461, 1, '1325', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8591', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(462, 1, '1326', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2966', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(463, 1, '1327', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7355', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(464, 1, '1328', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3587', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(465, 1, '1329', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6731', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(466, 1, '1330', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1040', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(467, 1, '1331', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4994', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(468, 1, '1332', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5555', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(469, 1, '1333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1267', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(470, 1, '1334', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2331', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(471, 1, '1335', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2264', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(472, 1, '1336', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3286', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(473, 1, '1337', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2044', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(474, 1, '1338', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8807', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(475, 1, '1339', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6759', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(476, 1, '1340', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5500', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(477, 1, '1341', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5404', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(478, 1, '1342', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8938', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(479, 1, '1343', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3571', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(480, 1, '1344', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7415', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(481, 1, '1345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3193', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(482, 1, '1346', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4692', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(483, 1, '1347', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9296', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(484, 1, '1348', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8750', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(485, 1, '1349', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9753', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(486, 1, '1350', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2537', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(487, 1, '1351', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9027', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(488, 1, '1352', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4723', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(489, 1, '1353', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7928', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(490, 1, '1354', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4443', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(491, 1, '1355', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1358', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(492, 1, '1356', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4054', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(493, 1, '1357', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3062', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(494, 1, '1358', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7879', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(495, 1, '1359', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7381', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(496, 1, '1360', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1961', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(497, 1, '1361', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4999', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(498, 1, '1362', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5812', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(499, 1, '1363', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7692', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(500, 1, '1364', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7163', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(501, 1, '1365', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1082', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(502, 1, '1366', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4713', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(503, 1, '1367', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5384', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(504, 1, '1368', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5879', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(505, 1, '1369', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1156', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(506, 1, '1370', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6548', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(507, 1, '1371', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8051', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(508, 1, '1372', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6827', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(509, 1, '1373', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1564', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(510, 1, '1374', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8789', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(511, 1, '1375', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9785', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(512, 1, '1376', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5226', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(513, 1, '1377', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3149', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(514, 1, '1378', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4402', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(515, 1, '1379', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9182', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(516, 1, '1380', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9795', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(517, 1, '1381', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2256', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(518, 1, '1382', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8857', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(519, 1, '1383', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9335', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(520, 1, '1384', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6753', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(521, 1, '1385', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8728', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(522, 1, '1386', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6122', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(523, 1, '1387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8837', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(524, 1, '1388', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4819', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(525, 1, '1389', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9909', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(526, 1, '1390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2667', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(527, 1, '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1783', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(528, 1, '1392', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8210', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(529, 1, '1393', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6643', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(530, 1, '1394', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9460', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(531, 1, '1395', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4766', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(532, 1, '1396', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7647', NULL, '', '', NULL, NULL, 1, NULL, NULL);
INSERT INTO `thanhvien` (`id`, `iddaotrang`, `code`, `hoten`, `phapdanh`, `ngaysinh`, `gioitinh`, `noidkhk`, `cmnd`, `ngaycap`, `noicap`, `nghenghiep`, `tinhtrangthannhan`, `sodtcanhan`, `sodtnguoithan`, `hinhcmnd1`, `hinhcmnd2`, `ghichu`, `ngaydk`, `active`, `hinh46`, `tinhtrangbenhly`) VALUES
(533, 1, '1397', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4273', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(534, 1, '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5969', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(535, 1, '1399', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2879', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(536, 1, '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7347', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(537, 1, '1401', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3643', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(538, 1, '1402', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3165', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(539, 1, '1403', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3718', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(540, 1, '1404', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7029', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(541, 1, '1405', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1098', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(542, 1, '1406', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7514', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(543, 1, '1407', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1374', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(544, 1, '1408', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1913', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(545, 1, '1409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6480', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(546, 1, '1410', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2987', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(547, 1, '1411', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3443', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(548, 1, '1412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9716', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(549, 1, '1413', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7134', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(550, 1, '1414', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5051', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(551, 1, '1415', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4017', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(552, 1, '1416', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7659', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(553, 1, '1417', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3903', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(554, 1, '1418', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6676', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(555, 1, '1419', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1692', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(556, 1, '1420', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4458', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(557, 1, '1421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2131', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(558, 1, '1422', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5330', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(559, 1, '1423', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8559', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(560, 1, '1424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4334', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(561, 1, '1425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2661', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(562, 1, '1426', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2982', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(563, 1, '1427', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5214', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(564, 1, '1428', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7005', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(565, 1, '1429', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1838', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(566, 1, '1430', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6101', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(567, 1, '1431', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3749', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(568, 1, '1432', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7689', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(569, 1, '1433', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9506', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(570, 1, '1434', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7656', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(571, 1, '1435', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2760', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(572, 1, '1436', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6106', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(573, 1, '1437', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4007', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(574, 1, '1438', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5115', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(575, 1, '1439', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5338', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(576, 1, '1440', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6474', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(577, 1, '1441', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4186', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(578, 1, '1442', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9447', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(579, 1, '1443', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1079', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(580, 1, '1444', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8512', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(581, 1, '1445', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6387', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(582, 1, '1446', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9120', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(583, 1, '1447', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2075', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(584, 1, '1448', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7439', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(585, 1, '1449', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2452', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(586, 1, '1450', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6105', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(587, 1, '1451', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6921', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(588, 1, '1452', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2973', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(589, 1, '1453', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6727', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(590, 1, '1454', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6868', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(591, 1, '1455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9711', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(592, 1, '1456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8333', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(593, 1, '1457', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2055', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(594, 1, '1458', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4380', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(595, 1, '1459', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9037', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(596, 1, '1460', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5238', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(597, 1, '1461', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2779', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(598, 1, '1462', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5108', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(599, 1, '1463', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7994', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(600, 1, '1464', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6907', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(601, 1, '1465', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9743', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(602, 1, '1466', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(603, 1, '1467', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5177', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(604, 1, '1468', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4058', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(605, 1, '1469', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1291', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(606, 1, '1470', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1590', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(607, 1, '1471', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3677', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(608, 1, '1472', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9911', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(609, 1, '1473', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5267', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(610, 1, '1474', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5782', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(611, 1, '1475', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2089', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(612, 1, '1476', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6183', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(613, 1, '1477', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9015', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(614, 1, '1478', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3065', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(615, 1, '1479', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3508', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(616, 1, '1480', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6094', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(617, 1, '1481', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4377', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(618, 1, '1482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4408', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(619, 1, '1483', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6526', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(620, 1, '1484', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9363', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(621, 1, '1485', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5699', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(622, 1, '1486', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7281', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(623, 1, '1487', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5237', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(624, 1, '1488', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2207', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(625, 1, '1489', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4823', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(626, 1, '1490', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4652', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(627, 1, '1491', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7235', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(628, 1, '1492', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2347', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(629, 1, '1493', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7094', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(630, 1, '1494', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2990', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(631, 1, '1495', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6615', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(632, 1, '1496', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5000', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(633, 1, '1497', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4355', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(634, 1, '1498', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4263', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(635, 1, '1499', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1968', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(636, 1, '1500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9886', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(637, 1, '1501', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1950', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(638, 1, '1502', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5941', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(639, 1, '1503', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5391', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(640, 1, '1504', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3222', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(641, 1, '1505', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9723', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(642, 1, '1506', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9992', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(643, 1, '1507', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6475', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(644, 1, '1508', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2729', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(645, 1, '1509', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6018', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(646, 1, '1510', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4884', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(647, 1, '1511', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8315', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(648, 1, '1512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3624', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(649, 1, '1513', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9677', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(650, 1, '1514', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1587', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(651, 1, '1515', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9505', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(652, 1, '1516', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5627', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(653, 1, '1517', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8046', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(654, 1, '1518', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6569', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(655, 1, '1519', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4138', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(656, 1, '1520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3956', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(657, 1, '1521', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1967', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(658, 1, '1522', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3800', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(659, 1, '1523', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8809', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(660, 1, '1524', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7330', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(661, 1, '1525', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5785', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(662, 1, '1526', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8747', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(663, 1, '1527', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8610', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(664, 1, '1528', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1968', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(665, 1, '1529', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2343', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(666, 1, '1530', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5379', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(667, 1, '1531', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2135', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(668, 1, '1532', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5588', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(669, 1, '1533', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5985', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(670, 1, '1534', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9166', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(671, 1, '1535', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1480', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(672, 1, '1536', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4409', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(673, 1, '1537', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8554', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(674, 1, '1538', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4076', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(675, 1, '1539', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5236', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(676, 1, '1540', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7150', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(677, 1, '1541', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6395', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(678, 1, '1542', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5578', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(679, 1, '1543', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7498', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(680, 1, '1544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9030', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(681, 1, '1545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9352', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(682, 1, '1546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6641', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(683, 1, '1547', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6860', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(684, 1, '1548', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9767', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(685, 1, '1549', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4767', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(686, 1, '1550', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4732', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(687, 1, '1551', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6415', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(688, 1, '1552', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4580', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(689, 1, '1553', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2485', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(690, 1, '1554', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1822', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(691, 1, '1555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4757', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(692, 1, '1556', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2188', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(693, 1, '1557', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7850', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(694, 1, '1558', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4379', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(695, 1, '1559', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4980', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(696, 1, '1560', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6810', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(697, 1, '1561', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3705', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(698, 1, '1562', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5371', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(699, 1, '1563', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5677', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(700, 1, '1564', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9165', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(701, 1, '1565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4394', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(702, 1, '1566', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2267', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(703, 1, '1567', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9943', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(704, 1, '1568', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4470', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(705, 1, '1569', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1760', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(706, 1, '1570', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6036', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(707, 1, '1571', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7372', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(708, 1, '1572', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1446', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(709, 1, '1573', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1148', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(710, 1, '1574', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5148', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(711, 1, '1575', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1056', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(712, 1, '1576', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4310', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(713, 1, '1577', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3402', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(714, 1, '1578', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1569', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(715, 1, '1579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7589', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(716, 1, '1580', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3782', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(717, 1, '1581', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4864', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(718, 1, '1582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1770', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(719, 1, '1583', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3066', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(720, 1, '1584', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4079', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(721, 1, '1585', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6379', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(722, 1, '1586', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7720', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(723, 1, '1587', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4080', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(724, 1, '1588', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4922', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(725, 1, '1589', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4290', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(726, 1, '1590', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7885', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(727, 1, '1591', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4725', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(728, 1, '1592', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1528', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(729, 1, '1593', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8442', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(730, 1, '1594', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4237', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(731, 1, '1595', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3594', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(732, 1, '1596', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2617', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(733, 1, '1597', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6178', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(734, 1, '1598', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3243', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(735, 1, '1599', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3782', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(736, 1, '1600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3407', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(737, 1, '1601', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7341', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(738, 1, '1602', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6871', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(739, 1, '1603', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3882', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(740, 1, '1604', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3617', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(741, 1, '1605', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8276', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(742, 1, '1606', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3592', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(743, 1, '1607', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6988', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(744, 1, '1608', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7465', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(745, 1, '1609', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9826', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(746, 1, '1610', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4373', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(747, 1, '1611', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2694', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(748, 1, '1612', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5671', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(749, 1, '1613', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8336', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(750, 1, '1614', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6684', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(751, 1, '1615', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3092', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(752, 1, '1616', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2453', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(753, 1, '1617', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4648', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(754, 1, '1618', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3492', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(755, 1, '1619', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6778', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(756, 1, '1620', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6530', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(757, 1, '1621', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4106', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(758, 1, '1622', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1267', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(759, 1, '1623', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7845', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(760, 1, '1624', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4121', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(761, 1, '1625', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7554', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(762, 1, '1626', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1978', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(763, 1, '1627', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4886', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(764, 1, '1628', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3944', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(765, 1, '1629', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2337', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(766, 1, '1630', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3093', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(767, 1, '1631', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9996', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(768, 1, '1632', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1218', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(769, 1, '1633', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7297', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(770, 1, '1634', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6581', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(771, 1, '1635', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3768', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(772, 1, '1636', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4663', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(773, 1, '1637', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9779', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(774, 1, '1638', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9911', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(775, 1, '1639', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7296', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(776, 1, '1640', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9496', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(777, 1, '1641', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1626', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(778, 1, '1642', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6052', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(779, 1, '1643', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1173', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(780, 1, '1644', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6436', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(781, 1, '1645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6182', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(782, 1, '1646', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1472', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(783, 1, '1647', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6494', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(784, 1, '1648', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8702', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(785, 1, '1649', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6291', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(786, 1, '1650', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7139', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(787, 1, '1651', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3852', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(788, 1, '1652', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7014', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(789, 1, '1653', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7296', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(790, 1, '1654', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2524', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(791, 1, '1655', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5340', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(792, 1, '1656', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5589', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(793, 1, '1657', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1042', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(794, 1, '1658', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7594', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(795, 1, '1659', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9553', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(796, 1, '1660', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4146', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(797, 1, '1661', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1871', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(798, 1, '1662', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1819', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(799, 1, '1663', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1585', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(800, 1, '1664', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6905', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(801, 1, '1665', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1628', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(802, 1, '1666', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5166', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(803, 1, '1667', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7029', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(804, 1, '1668', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4584', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(805, 1, '1669', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5657', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(806, 1, '1670', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6106', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(807, 1, '1671', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1978', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(808, 1, '1672', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1401', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(809, 1, '1673', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5801', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(810, 1, '1674', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6606', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(811, 1, '1675', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3028', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(812, 1, '1676', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6075', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(813, 1, '1677', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7404', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(814, 1, '1678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4135', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(815, 1, '1679', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4270', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(816, 1, '1680', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4826', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(817, 1, '1681', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2310', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(818, 1, '1682', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9662', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(819, 1, '1683', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4300', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(820, 1, '1684', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6372', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(821, 1, '1685', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4862', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(822, 1, '1686', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2656', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(823, 1, '1687', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6210', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(824, 1, '1688', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5932', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(825, 1, '1689', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6904', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(826, 1, '1690', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3086', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(827, 1, '1691', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8595', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(828, 1, '1692', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3223', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(829, 1, '1693', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4780', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(830, 1, '1694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8419', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(831, 1, '1695', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5549', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(832, 1, '1696', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2466', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(833, 1, '1697', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8335', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(834, 1, '1698', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2626', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(835, 1, '1699', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4665', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(836, 1, '1700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3379', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(837, 1, '1701', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4910', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(838, 1, '1702', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1175', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(839, 1, '1703', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9036', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(840, 1, '1704', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1181', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(841, 1, '1705', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4351', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(842, 1, '1706', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6034', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(843, 1, '1707', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8257', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(844, 1, '1708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4590', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(845, 1, '1709', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3001', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(846, 1, '1710', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5673', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(847, 1, '1711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5421', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(848, 1, '1712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8825', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(849, 1, '1713', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1703', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(850, 1, '1714', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2059', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(851, 1, '1715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8123', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(852, 1, '1716', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4605', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(853, 1, '1717', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5802', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(854, 1, '1718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1663', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(855, 1, '1719', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1455', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(856, 1, '1720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5149', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(857, 1, '1721', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7141', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(858, 1, '1722', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6452', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(859, 1, '1723', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(860, 1, '1724', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1176', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(861, 1, '1725', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2065', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(862, 1, '1726', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4895', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(863, 1, '1727', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3888', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(864, 1, '1728', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5903', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(865, 1, '1729', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9416', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(866, 1, '1730', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7961', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(867, 1, '1731', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5675', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(868, 1, '1732', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1050', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(869, 1, '1733', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7538', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(870, 1, '1734', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4119', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(871, 1, '1735', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1469', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(872, 1, '1736', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8836', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(873, 1, '1737', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6276', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(874, 1, '1738', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4338', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(875, 1, '1739', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7862', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(876, 1, '1740', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1980', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(877, 1, '1741', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1972', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(878, 1, '1742', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6086', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(879, 1, '1743', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9948', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(880, 1, '1744', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2699', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(881, 1, '1745', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4472', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(882, 1, '1746', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2332', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(883, 1, '1747', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6321', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(884, 1, '1748', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1714', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(885, 1, '1749', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1118', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(886, 1, '1750', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8545', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(887, 1, '1751', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9076', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(888, 1, '1752', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3242', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(889, 1, '1753', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1754', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(890, 1, '1754', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8693', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(891, 1, '1755', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7804', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(892, 1, '1756', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7003', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(893, 1, '1757', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2724', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(894, 1, '1758', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9246', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(895, 1, '1759', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5602', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(896, 1, '1760', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8214', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(897, 1, '1761', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4872', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(898, 1, '1762', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3171', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(899, 1, '1763', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1061', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(900, 1, '1764', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6596', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(901, 1, '1765', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4541', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(902, 1, '1766', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5939', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(903, 1, '1767', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6276', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(904, 1, '1768', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6367', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(905, 1, '1769', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2575', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(906, 1, '1770', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1517', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(907, 1, '1771', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1841', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(908, 1, '1772', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7244', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(909, 1, '1773', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4319', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(910, 1, '1774', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5374', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(911, 1, '1775', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8849', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(912, 1, '1776', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4448', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(913, 1, '1777', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1615', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(914, 1, '1778', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1479', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(915, 1, '1779', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7895', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(916, 1, '1780', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6697', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(917, 1, '1781', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8808', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(918, 1, '1782', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5301', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(919, 1, '1783', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2071', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(920, 1, '1784', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9210', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(921, 1, '1785', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8741', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(922, 1, '1786', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9809', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(923, 1, '1787', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7971', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(924, 1, '1788', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2705', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(925, 1, '1789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6758', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(926, 1, '1790', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3471', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(927, 1, '1791', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1691', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(928, 1, '1792', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9401', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(929, 1, '1793', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3703', NULL, '', '', NULL, NULL, 1, NULL, NULL);
INSERT INTO `thanhvien` (`id`, `iddaotrang`, `code`, `hoten`, `phapdanh`, `ngaysinh`, `gioitinh`, `noidkhk`, `cmnd`, `ngaycap`, `noicap`, `nghenghiep`, `tinhtrangthannhan`, `sodtcanhan`, `sodtnguoithan`, `hinhcmnd1`, `hinhcmnd2`, `ghichu`, `ngaydk`, `active`, `hinh46`, `tinhtrangbenhly`) VALUES
(930, 1, '1794', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6256', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(931, 1, '1795', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8822', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(932, 1, '1796', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(933, 1, '1797', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4919', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(934, 1, '1798', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6633', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(935, 1, '1799', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5459', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(936, 1, '1800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2772', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(937, 1, '1801', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2250', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(938, 1, '1802', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6570', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(939, 1, '1803', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8196', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(940, 1, '1804', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2384', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(941, 1, '1805', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1041', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(942, 1, '1806', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3537', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(943, 1, '1807', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2126', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(944, 1, '1808', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5072', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(945, 1, '1809', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2134', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(946, 1, '1810', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8502', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(947, 1, '1811', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3843', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(948, 1, '1812', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1556', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(949, 1, '1813', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1873', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(950, 1, '1814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9933', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(951, 1, '1815', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7441', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(952, 1, '1816', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5053', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(953, 1, '1817', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1103', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(954, 1, '1818', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9800', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(955, 1, '1819', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2513', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(956, 1, '1820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6282', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(957, 1, '1821', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5167', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(958, 1, '1822', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5572', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(959, 1, '1823', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1154', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(960, 1, '1824', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9463', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(961, 1, '1825', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5909', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(962, 1, '1826', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8216', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(963, 1, '1827', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1958', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(964, 1, '1828', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5313', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(965, 1, '1829', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8672', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(966, 1, '1830', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6202', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(967, 1, '1831', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8016', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(968, 1, '1832', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7052', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(969, 1, '1833', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5300', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(970, 1, '1834', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1499', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(971, 1, '1835', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8925', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(972, 1, '1836', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5399', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(973, 1, '1837', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1137', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(974, 1, '1838', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9575', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(975, 1, '1839', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7777', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(976, 1, '1840', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4571', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(977, 1, '1841', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6027', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(978, 1, '1842', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5399', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(979, 1, '1843', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3166', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(980, 1, '1844', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4289', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(981, 1, '1845', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7314', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(982, 1, '1846', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4440', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(983, 1, '1847', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7186', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(984, 1, '1848', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8770', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(985, 1, '1849', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5841', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(986, 1, '1850', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8667', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(987, 1, '1851', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9430', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(988, 1, '1852', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8734', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(989, 1, '1853', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6951', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(990, 1, '1854', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6547', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(991, 1, '1855', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3993', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(992, 1, '1856', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8399', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(993, 1, '1857', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2490', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(994, 1, '1858', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9051', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(995, 1, '1859', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7468', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(996, 1, '1860', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7484', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(997, 1, '1861', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6800', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(998, 1, '1862', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4647', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(999, 1, '1863', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4949', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1000, 1, '1864', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1207', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1001, 1, '1865', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2725', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1002, 1, '1866', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4303', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1003, 1, '1867', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4030', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1004, 1, '1868', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7288', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1005, 1, '1869', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4609', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1006, 1, '1870', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5488', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1007, 1, '1871', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7803', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1008, 1, '1872', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2945', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1009, 1, '1873', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4296', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1010, 1, '1874', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1172', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1011, 1, '1875', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5864', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1012, 1, '1876', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5897', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1013, 1, '1877', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7129', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1014, 1, '1878', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6822', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1015, 1, '1879', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1306', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1016, 1, '1880', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2363', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1017, 1, '1881', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4953', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1018, 1, '1882', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6408', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1019, 1, '1883', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1722', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1020, 1, '1884', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1061', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1021, 1, '1885', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3111', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1022, 1, '1886', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6398', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1023, 1, '1887', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1207', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1024, 1, '1888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6211', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1025, 1, '1889', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2446', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1026, 1, '1890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8761', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1027, 1, '1891', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7354', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1028, 1, '1892', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8530', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1029, 1, '1893', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8303', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1030, 1, '1894', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1966', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1031, 1, '1895', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5257', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1032, 1, '1896', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3238', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1033, 1, '1897', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3525', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1034, 1, '1898', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5982', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1035, 1, '1899', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2509', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1036, 1, '1900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8053', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1037, 1, '1901', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2456', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1038, 1, '1902', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9276', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1039, 1, '1903', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2205', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1040, 1, '1904', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9194', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1041, 1, '1905', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5940', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1042, 1, '1906', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4819', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1043, 1, '1907', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2937', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1044, 1, '1908', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6381', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1045, 1, '1909', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1320', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1046, 1, '1910', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8079', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1047, 1, '1911', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7801', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1048, 1, '1912', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3831', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1049, 1, '1913', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7440', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1050, 1, '1914', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3024', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1051, 1, '1915', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6389', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1052, 1, '1916', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1263', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1053, 1, '1917', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2645', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1054, 1, '1918', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5123', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1055, 1, '1919', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1796', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1056, 1, '1920', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2897', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1057, 1, '1921', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5777', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1058, 1, '1922', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7346', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1059, 1, '1923', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1615', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1060, 1, '1924', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8451', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1061, 1, '1925', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4181', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1062, 1, '1926', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7160', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1063, 1, '1927', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8939', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1064, 1, '1928', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4143', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1065, 1, '1929', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7700', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1066, 1, '1930', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6535', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1067, 1, '1931', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4364', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1068, 1, '1932', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7693', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1069, 1, '1933', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3677', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1070, 1, '1934', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2939', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1071, 1, '1935', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8981', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1072, 1, '1936', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5319', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1073, 1, '1937', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1958', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1074, 1, '1938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7342', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1075, 1, '1939', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3386', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1076, 1, '1940', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5739', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1077, 1, '1941', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7885', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1078, 1, '1942', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8211', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1079, 1, '1943', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8671', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1080, 1, '1944', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4174', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1081, 1, '1945', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4303', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1082, 1, '1946', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7515', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1083, 1, '1947', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5431', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1084, 1, '1948', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9341', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1085, 1, '1949', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5554', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1086, 1, '1950', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2724', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1087, 1, '1951', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5760', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1088, 1, '1952', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7459', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1089, 1, '1953', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3483', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1090, 1, '1954', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4806', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1091, 1, '1955', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8250', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1092, 1, '1956', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7247', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1093, 1, '1957', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3434', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1094, 1, '1958', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2230', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1095, 1, '1959', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6997', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1096, 1, '1960', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3923', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1097, 1, '1961', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6249', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1098, 1, '1962', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5964', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1099, 1, '1963', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9593', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1100, 1, '1964', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6207', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1101, 1, '1965', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8274', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1102, 1, '1966', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4477', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1103, 1, '1967', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1132', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1104, 1, '1968', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9318', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1105, 1, '1969', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1352', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1106, 1, '1970', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8739', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1107, 1, '1971', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7209', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1108, 1, '1972', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3973', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1109, 1, '1973', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8826', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1110, 1, '1974', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7217', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1111, 1, '1975', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3916', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1112, 1, '1976', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3391', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1113, 1, '1977', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4540', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1114, 1, '1978', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1881', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1115, 1, '1979', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7848', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1116, 1, '1980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7293', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1117, 1, '1981', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2838', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1118, 1, '1982', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8200', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1119, 1, '1983', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4099', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1120, 1, '1984', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1895', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1121, 1, '1985', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4564', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1122, 1, '1986', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1141', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1123, 1, '1987', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9261', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1124, 1, '1988', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4917', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1125, 1, '1989', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6061', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1126, 1, '1990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5174', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1127, 1, '1991', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8430', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1128, 1, '1992', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2579', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1129, 1, '1993', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8174', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1130, 1, '1994', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4268', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1131, 1, '1995', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9197', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1132, 1, '1996', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3597', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1133, 1, '1997', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7246', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1134, 1, '1998', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4891', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1135, 1, '1999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5659', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1136, 2, '2000', 'Vũ Văn Minh', 'Phap Danh 2', '1/2/2019', 'Nam', 'HCM', '', '', '', 'Noi Tro', '', '5626', '', '-1576205492-1.png', '-1576205492-2.png', ' ', '2019-12-13 09:51:32.217364', 1, NULL, NULL),
(1137, 2, '2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9503', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1138, 2, '2002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9998', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1139, 2, '2003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9333', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1140, 2, '2004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4153', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1141, 2, '2005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4729', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1142, 2, '2006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3243', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1143, 2, '2007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9297', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1144, 2, '2008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5264', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1145, 2, '2009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2610', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1146, 2, '2010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6806', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1147, 2, '2011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8962', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1148, 2, '2012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9802', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1149, 2, '2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5114', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1150, 2, '2014', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1281', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1151, 2, '2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8046', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1152, 2, '2016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5112', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1153, 2, '2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9709', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1154, 2, '2018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7762', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1155, 2, '2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1770', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1156, 2, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1037', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1157, 2, '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9365', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1158, 2, '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6842', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1159, 2, '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7851', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1160, 2, '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2922', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1161, 2, '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1551', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1162, 2, '2026', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1616', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1163, 2, '2027', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3508', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1164, 2, '2028', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2608', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1165, 2, '2029', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6234', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1166, 2, '2030', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8677', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1167, 2, '2031', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6460', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1168, 2, '2032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5442', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1169, 2, '2033', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2884', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1170, 2, '2034', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4119', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1171, 2, '2035', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2926', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1172, 2, '2036', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3265', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1173, 2, '2037', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2470', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1174, 2, '2038', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4535', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1175, 2, '2039', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1624', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1176, 2, '2040', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1423', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1177, 2, '2041', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2460', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1178, 2, '2042', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4020', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1179, 2, '2043', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6773', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1180, 2, '2044', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9758', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1181, 2, '2045', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4824', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1182, 2, '2046', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1166', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1183, 2, '2047', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9092', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1184, 2, '2048', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6615', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1185, 2, '2049', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7029', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1186, 2, '2050', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8069', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1187, 2, '2051', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3800', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1188, 2, '2052', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1837', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1189, 2, '2053', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2044', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1190, 2, '2054', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5322', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1191, 2, '2055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8615', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1192, 2, '2056', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9768', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1193, 2, '2057', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5339', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1194, 2, '2058', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5017', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1195, 2, '2059', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9757', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1196, 2, '2060', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4252', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1197, 2, '2061', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9882', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1198, 2, '2062', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5750', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1199, 2, '2063', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6943', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1200, 2, '2064', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8632', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1201, 2, '2065', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4141', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1202, 2, '2066', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1614', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1203, 2, '2067', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4393', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1204, 2, '2068', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5753', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1205, 2, '2069', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8087', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1206, 2, '2070', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9202', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1207, 2, '2071', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1826', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1208, 2, '2072', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9957', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1209, 2, '2073', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1186', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1210, 2, '2074', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4609', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1211, 2, '2075', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3460', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1212, 2, '2076', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4089', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1213, 2, '2077', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3409', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1214, 2, '2078', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4427', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1215, 2, '2079', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9013', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1216, 2, '2080', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2493', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1217, 2, '2081', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3223', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1218, 2, '2082', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2752', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1219, 2, '2083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4705', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1220, 2, '2084', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6012', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1221, 2, '2085', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2598', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1222, 2, '2086', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7176', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1223, 2, '2087', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8255', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1224, 2, '2088', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1990', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1225, 2, '2089', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8002', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1226, 2, '2090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2794', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1227, 2, '2091', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5881', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1228, 2, '2092', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9271', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1229, 2, '2093', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3404', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1230, 2, '2094', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6198', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1231, 2, '2095', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6302', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1232, 2, '2096', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6198', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1233, 2, '2097', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4273', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1234, 2, '2098', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2484', NULL, '', '', NULL, NULL, 1, NULL, NULL),
(1235, 2, '2099', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4736', NULL, '', '', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien_tam`
--

DROP TABLE IF EXISTS `thanhvien_tam`;
CREATE TABLE IF NOT EXISTS `thanhvien_tam` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `iddaotrang` int(10) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL COMMENT 'Mã cấp cho từng thành viên trong đạo tràng',
  `hoten` varchar(80) CHARACTER SET utf8 NOT NULL DEFAULT '"Nhap Ho Ten"',
  `phapdanh` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '"Nhap Phap Danh"',
  `ngaysinh` varchar(12) DEFAULT NULL,
  `gioitinh` varchar(15) CHARACTER SET utf8 NOT NULL DEFAULT '"Nam"' COMMENT 'Nam, Nữ',
  `noidkhk` tinytext CHARACTER SET utf8,
  `cmnd` varchar(20) DEFAULT NULL,
  `ngaycap` varchar(12) DEFAULT NULL,
  `noicap` varchar(100) DEFAULT NULL,
  `nghenghiep` varchar(60) CHARACTER SET utf8 NOT NULL DEFAULT '''Nghề Nghiệp''',
  `tinhtrangthannhan` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '''Thân Nhân''',
  `sodtcanhan` varchar(50) DEFAULT NULL,
  `sodtnguoithan` varchar(255) DEFAULT NULL,
  `hinhcmnd1` varchar(255) DEFAULT '' COMMENT 'hình mặt trước',
  `hinhcmnd2` varchar(255) DEFAULT '' COMMENT 'Hình mặt sau',
  `ghichu` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ngaydk` datetime(6) DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6) COMMENT 'ngày dk-cap nha',
  `active` int(1) DEFAULT '1' COMMENT '1; đang hoạt động, 0: Tạm dừng sử dụng',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1213 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

DROP TABLE IF EXISTS `tintuc`;
CREATE TABLE IF NOT EXISTS `tintuc` (
  `idtintuc` int(10) NOT NULL AUTO_INCREMENT,
  `hinhdaidien` varchar(255) DEFAULT NULL,
  `tieude` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tomtat` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `noidung` text CHARACTER SET utf8,
  `loaitin` varchar(30) DEFAULT NULL COMMENT 'gioithieu, cackykhoatu, chuongtrinhtu, ',
  `ngay` date DEFAULT NULL COMMENT 'Ngày bắt đầu: danh cho chương trình tu',
  `anhien` int(1) DEFAULT '1' COMMENT '1: Hiển thị, 2: Ẩn',
  PRIMARY KEY (`idtintuc`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`idtintuc`, `hinhdaidien`, `tieude`, `tomtat`, `noidung`, `loaitin`, `ngay`, `anhien`) VALUES
(1, 'h1.jpg', 'Giới thiệu Trang Web Đại Tùng Lâm Hoa Sen', 'Trong Phật giáo, đạo tràng có nguyên nghĩa phát sinh từ thời Đức Phật tại thế. Nguyên tự trong Phạn ngữ là Bodhi-manda, Hán ngữ dịch là đạo tràng, với ý nghĩa chỉ nơi Đức Phật thành đạo, tức tòa Kim Cương dưới gốc Bồ đề bên dòng sông Ni Liên Thiền, miền T', '<p>Ngài Tăng Triệu, một vị sư nổi tiếng của Phật giáo Trung Quốc có nói: “nơi yên vui tu đạo là đạo tràng”, hay trong Kinh Tịnh Danh có nói: “trực tâm là đạo tràng, trực tâm là tịnh độ”. Phát triển lên một mức độ cao hơn nữa, đạo tràng không chỉ là nơi tu tập, nơi hành đạo để đạt những kết quả tu hành nhất định, mà đạo tràng còn là khái niệm chỉ không gian, chỉ cảnh giới đắc đạo mà người tu hành đạt được ở quả vị cao nhất. Đó chính là Tịnh độ, là Niết Bàn.</p>\r\n\r\n<p><img alt=\"\" src=\"http://btgcp.gov.vn/uploads/image/admin/image/2012/03/26/ĐẠo trÀng trong phẬt giÁo 5.jpg\"></p>\r\n\r\n<p>Vạn pháp đều do tâm tạo, cảnh vật, con người, vui buồn sướng khổ đều do tâm hóa hiện mà thành. Nếu chế ngự được cái tâm phóng dật ấy để trở về với bản nhiên thanh tịnh tự tại thì đó chính là chân tâm, là tịnh độ. Ở khía cạnh này, đạo tràng chính do mình tạo nên, do tâm thiện lành của người tu theo hạnh Bồ tát chế tạo. Bồ tát phóng tâm đại từ đại bi và hóa hiện vô vàn tướng để giáo hóa chúng sinh. Thì vô vàn cảnh tượng do Bồ tát phóng tâm hóa hiện ấy chính là đạo tràng của Bồ tát, là nơi hành đạo cứu đời, cứu người, giáo hóa chúng sinh của các vị Đại Bồ tát. Theo tinh thần của Kinh Hoa Nghiêm, “Từ là đạo tràng, vì đối xử bình đẳng với tất cả chúng sanh. Bi là đạo tràng, vì nhẫn nại các khổ nhọc”. Từ bi ấy hướng đến đạo Bồ-đề với một thời gian vô hạn và tâm vô chấp trước của chư Bồ-tát đã làm nên diệu dụng</p>\r\n', 'gioithieu', NULL, 1),
(12, '-1574578126-5.jpg', 'Khóa Tu 48 Ngày', '  Nội dung khóa tu 48 ngày', '<p>Nội dung 48 ngày</p>\r\n<div align=\"justify\"><font size=\"2\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nam mô Bổn Sư Thích Ca Mâu Ni Phật<br>&nbsp;&nbsp;&nbsp;Kính thưa quý Phật tử! <br>&nbsp;&nbsp; Với mong ước làm thế nào để đưa vấn đề tu tập của hàng Phật tử ngày càng đi vào nề nếp, quy củ theo đúng chánh pháp của Phật, đồng thời để tạo điều kiện cho Phật tử tại gia cắt bớt trần duyên, hầu thúc liễm thân tâm, trau giồi giới đức, nhất tâm niệm Phật, chứng nghiệm sự an lạc trong giáo pháp của Phật, nên khóa tu Phật thất tại chùa Hoằng Pháp ra đời.<br>&nbsp;&nbsp; Để quý Phật tử tham dự khóa tu Phật thất đạt được kết quả mỹ mãn, Ban tổ chức yêu cầu Phật tử phải nắm vững chương trình tu học, tuân thủ nội quy và các oai nghi. <br>Quý Phật tử phát tâm vào đây là để niệm Phật thành Phật, thì phải học và tu theo hạnh của Phật. Muốn được vậy, phải giữ gìn năm giới cấm, là không sát sinh, không trộm cắp, không tà dâm, không nói dối và không uống rượu thật chu đáo. Nếu không giữ được một giới nào thì làm sao gọi là Phật tử? Người đời không theo đạo Phật mà còn biết giữ đúng tư cách như không uống rượu, không hút thuốc, không trộm cắp thay huống hồ gì là Phật tử.<br>&nbsp;&nbsp; Chúng ta đến với đạo Phật là vì muốn vượt lên trên cuộc đời tầm thường của thế nhân để đạt được chân thiện mỹ. Nếu chúng ta vào đạo rồi mà vẫn tiếp tục cuộc đời trôi nổi cũ hay còn tệ hơn cuộc đời thường của thế nhân thì đó chỉ làm hoen ố đạo chớ không phải là người mộ đạo.<br>&nbsp;&nbsp; Cho nên, là Phật tử thì phải có tinh thần trách nhiệm nuôi dưỡng, hiếu thuận với cha mẹ, kính thờ sư trưởng, tu tập thập thiện, phát tâm Bồ đề, tin sâu nhân quả, tinh tấn tu hành, cố gắng giữ giới để xứng đáng với danh nghĩa của người có đạo đức, nhằm đem lại hạnh phúc cho mình và cho chúng sinh. Một xã hội mà mọi người đều thực hiện năm giới cấm thì đó là một xã hội gương mẫu văn minh nhất thế giới vậy. Muốn có đạo đức thì phải theo học với các bậc đức hạnh thanh cao siêu thoát, mà đức Phật là đấng trọn lành tiêu biểu cho nền đạo đức toàn chân, toàn thiện, toàn mỹ. <br>&nbsp;&nbsp; Có đạo đức, con người mới có lòng từ bi, sáng suốt, công bình, gia đình mới có hạnh phúc chân thật, xã hội mới được thực sự văn minh cả về hai phương diện vật chất và tinh thần. Người muốn học hỏi đạo lý và đức hạnh của Phật thì trước phải quy y Tam bảo và thọ trì ngũ giới. Sau đó người Phật tử phải tinh tấn trau giồi đức hạnh và học hỏi các phương pháp tu giải thoát bằng cách cải thiện mọi sinh hoạt trong đời sống hằng ngày như sau:<br>&nbsp;&nbsp;<em> 1/ Hết lòng tôn kính Phật, Pháp, Tăng là những bậc thầy cao quý, hộ trì ngôi Tam bảo để Phật Pháp trường tồn, thường niệm Phật để tâm được an định. <br>&nbsp;&nbsp; 2/ Nghiêm trì giới luật mà mình đã thọ để khỏi gây tạo nghiệp ác, tránh quả báo về sau.<br>&nbsp;&nbsp; 3/ Tập ăn chay kỳ, chay trường để trưởng dưỡng lòng từ bi. Vừa bớt tính hung hăng, hiếu sát và để bảo vệ sức khỏe, ít bệnh hoạn.<br>&nbsp;&nbsp; 4/ Dứt bỏ những tính hung dữ, gian tham, trộm cắp, dối trá, để trở nên con người hiền lành ngay thẳng, chân chính.<br>&nbsp;&nbsp; 5/ Loại bỏ các thói hư tật xấu như cờ bạc, hút sách, ăn chơi phung phí v.v..., phải biết giữ tiết độ trong việc ăn mặc và ngủ nghỉ. Tập theo lối sống đơn giản, giảm bớt những nhu cầu vật chất không cần thiết. Không cầu kỳ, không lập dị, không xa hoa, không buông lung.<br>&nbsp;&nbsp; 6/ Không lười biếng ỷ lại mà phải siêng năng sốt sắng, đảm đang, tinh tấn tu học với ý chí tự lập tự cường, kiên nhẫn chịu đựng để vượt qua mọi gian lao trở ngại. <br>&nbsp;&nbsp; 7/ Làm việc phải có tinh thần trách nhiệm. Việc làm phải nhẹ nhàng khéo léo, sạch sẽ, gọn gàng.<br></em>&nbsp;&nbsp;<em> 8/ Hành động, cử chỉ, lời nói phải luôn luôn ôn hòa nhẹ nhàng, khiêm tốn. Không cống cao ngã mạn, khinh người.<br>&nbsp;&nbsp; 9/ Đối với mình thì khắc kỷ chế ngự vọng tâm, đối với người thì đại lượng bao dung và nhiệt tâm giúp đỡ. Khuyên mọi người chung quanh đều hướng về đường lành, trau giồi đạo đức, phát huy trí tuệ, dẹp bỏ các hủ tục mê tín dị đoan. <br>&nbsp;&nbsp; 10/ Thường nghiên cứu kinh điển để có thể hiểu biết và thực hành đúng chánh pháp của đức Như Lai. <br></em>&nbsp;&nbsp;<em> 11/ Mỗi tháng nên đến chùa ít nhất hai ngày sám hối để sám trừ tội chướng, ăn năn lỗi trước, tránh chừa lỗi sau.<br>&nbsp;&nbsp; 12/ Học thuộc các nghi thức tụng niệm thông thường để hòa được chúng khi tụng chung. Ngoài ra, nếu có hoàn cảnh thuận tiện, mỗi tuần hay mỗi tháng nên dành ra một ngày để về chùa thọ Bát quan trai, để học hỏi thêm những giáo lý cao siêu hơn và được gần gũi với chư Tăng trọn một ngày trong không khí trong lành thanh tịnh, khiến cho tâm hồn hưởng được những phút giây nhẹ nhàng an lạc, mà ở tại nhà thế tục không tìm thấy được.<br></em>&nbsp;&nbsp; Tu học và thực hành được những điều trên đây là người dám làm cuộc cách mạng bản thân, bỏ tà quy chính, cải ác tùng thiện, mới xứng đáng là người Phật tử thuần thành và chân chính, để từng bước tiến lên hạnh xuất gia giải thoát.<br>&nbsp;&nbsp;<em> (Phần Oai nghi trong tập sách này có tham khảo và trích từ cuốn Oai Nghi Của Hàng Phật Tử Tại Gia của Thích Minh Chánh).</em></font></div>\r\n', 'khoatu', NULL, 1),
(13, '1574578026-3.jpg', 'Nội qui khi nhập trại', 'Nội qui 1', '<div align=\"justify\"><font size=\"2\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nam mô Bổn Sư Thích Ca Mâu Ni Phật<br>&nbsp;&nbsp;&nbsp;Kính thưa quý Phật tử! <br>&nbsp;&nbsp; Với mong ước làm thế nào để đưa vấn đề tu tập của hàng Phật tử ngày càng đi vào nề nếp, quy củ theo đúng chánh pháp của Phật, đồng thời để tạo điều kiện cho Phật tử tại gia cắt bớt trần duyên, hầu thúc liễm thân tâm, trau giồi giới đức, nhất tâm niệm Phật, chứng nghiệm sự an lạc trong giáo pháp của Phật, nên khóa tu Phật thất tại chùa Hoằng Pháp ra đời.<br>&nbsp;&nbsp; Để quý Phật tử tham dự khóa tu Phật thất đạt được kết quả mỹ mãn, Ban tổ chức yêu cầu Phật tử phải nắm vững chương trình tu học, tuân thủ nội quy và các oai nghi. <br>Quý Phật tử phát tâm vào đây là để niệm Phật thành Phật, thì phải học và tu theo hạnh của Phật. Muốn được vậy, phải giữ gìn năm giới cấm, là không sát sinh, không trộm cắp, không tà dâm, không nói dối và không uống rượu thật chu đáo. Nếu không giữ được một giới nào thì làm sao gọi là Phật tử? Người đời không theo đạo Phật mà còn biết giữ đúng tư cách như không uống rượu, không hút thuốc, không trộm cắp thay huống hồ gì là Phật tử.<br>&nbsp;&nbsp; Chúng ta đến với đạo Phật là vì muốn vượt lên trên cuộc đời tầm thường của thế nhân để đạt được chân thiện mỹ. Nếu chúng ta vào đạo rồi mà vẫn tiếp tục cuộc đời trôi nổi cũ hay còn tệ hơn cuộc đời thường của thế nhân thì đó chỉ làm hoen ố đạo chớ không phải là người mộ đạo.<br>&nbsp;&nbsp; Cho nên, là Phật tử thì phải có tinh thần trách nhiệm nuôi dưỡng, hiếu thuận với cha mẹ, kính thờ sư trưởng, tu tập thập thiện, phát tâm Bồ đề, tin sâu nhân quả, tinh tấn tu hành, cố gắng giữ giới để xứng đáng với danh nghĩa của người có đạo đức, nhằm đem lại hạnh phúc cho mình và cho chúng sinh. Một xã hội mà mọi người đều thực hiện năm giới cấm thì đó là một xã hội gương mẫu văn minh nhất thế giới vậy. Muốn có đạo đức thì phải theo học với các bậc đức hạnh thanh cao siêu thoát, mà đức Phật là đấng trọn lành tiêu biểu cho nền đạo đức toàn chân, toàn thiện, toàn mỹ. <br>&nbsp;&nbsp; Có đạo đức, con người mới có lòng từ bi, sáng suốt, công bình, gia đình mới có hạnh phúc chân thật, xã hội mới được thực sự văn minh cả về hai phương diện vật chất và tinh thần. Người muốn học hỏi đạo lý và đức hạnh của Phật thì trước phải quy y Tam bảo và thọ trì ngũ giới. Sau đó người Phật tử phải tinh tấn trau giồi đức hạnh và học hỏi các phương pháp tu giải thoát bằng cách cải thiện mọi sinh hoạt trong đời sống hằng ngày như sau:<br>&nbsp;&nbsp;<em> 1/ Hết lòng tôn kính Phật, Pháp, Tăng là những bậc thầy cao quý, hộ trì ngôi Tam bảo để Phật Pháp trường tồn, thường niệm Phật để tâm được an định. <br>&nbsp;&nbsp; 2/ Nghiêm trì giới luật mà mình đã thọ để khỏi gây tạo nghiệp ác, tránh quả báo về sau.<br>&nbsp;&nbsp; 3/ Tập ăn chay kỳ, chay trường để trưởng dưỡng lòng từ bi. Vừa bớt tính hung hăng, hiếu sát và để bảo vệ sức khỏe, ít bệnh hoạn.<br>&nbsp;&nbsp; 4/ Dứt bỏ những tính hung dữ, gian tham, trộm cắp, dối trá, để trở nên con người hiền lành ngay thẳng, chân chính.<br>&nbsp;&nbsp; 5/ Loại bỏ các thói hư tật xấu như cờ bạc, hút sách, ăn chơi phung phí v.v..., phải biết giữ tiết độ trong việc ăn mặc và ngủ nghỉ. Tập theo lối sống đơn giản, giảm bớt những nhu cầu vật chất không cần thiết. Không cầu kỳ, không lập dị, không xa hoa, không buông lung.<br>&nbsp;&nbsp; 6/ Không lười biếng ỷ lại mà phải siêng năng sốt sắng, đảm đang, tinh tấn tu học với ý chí tự lập tự cường, kiên nhẫn chịu đựng để vượt qua mọi gian lao trở ngại. <br>&nbsp;&nbsp; 7/ Làm việc phải có tinh thần trách nhiệm. Việc làm phải nhẹ nhàng khéo léo, sạch sẽ, gọn gàng.<br></em>&nbsp;&nbsp;<em> 8/ Hành động, cử chỉ, lời nói phải luôn luôn ôn hòa nhẹ nhàng, khiêm tốn. Không cống cao ngã mạn, khinh người.<br>&nbsp;&nbsp; 9/ Đối với mình thì khắc kỷ chế ngự vọng tâm, đối với người thì đại lượng bao dung và nhiệt tâm giúp đỡ. Khuyên mọi người chung quanh đều hướng về đường lành, trau giồi đạo đức, phát huy trí tuệ, dẹp bỏ các hủ tục mê tín dị đoan. <br>&nbsp;&nbsp; 10/ Thường nghiên cứu kinh điển để có thể hiểu biết và thực hành đúng chánh pháp của đức Như Lai. <br></em>&nbsp;&nbsp;<em> 11/ Mỗi tháng nên đến chùa ít nhất hai ngày sám hối để sám trừ tội chướng, ăn năn lỗi trước, tránh chừa lỗi sau.<br>&nbsp;&nbsp; 12/ Học thuộc các nghi thức tụng niệm thông thường để hòa được chúng khi tụng chung. Ngoài ra, nếu có hoàn cảnh thuận tiện, mỗi tuần hay mỗi tháng nên dành ra một ngày để về chùa thọ Bát quan trai, để học hỏi thêm những giáo lý cao siêu hơn và được gần gũi với chư Tăng trọn một ngày trong không khí trong lành thanh tịnh, khiến cho tâm hồn hưởng được những phút giây nhẹ nhàng an lạc, mà ở tại nhà thế tục không tìm thấy được.<br></em>&nbsp;&nbsp; Tu học và thực hành được những điều trên đây là người dám làm cuộc cách mạng bản thân, bỏ tà quy chính, cải ác tùng thiện, mới xứng đáng là người Phật tử thuần thành và chân chính, để từng bước tiến lên hạnh xuất gia giải thoát.<br>&nbsp;&nbsp;<em> (Phần Oai nghi trong tập sách này có tham khảo và trích từ cuốn Oai Nghi Của Hàng Phật Tử Tại Gia của Thích Minh Chánh).</em></font></div>', 'noiqui', NULL, 1),
(14, NULL, 'Noi qui 2', 'Noi qui 2', 'Nội qui 2', 'noiqui', NULL, 1),
(15, NULL, 'Thong bao', 'Thong Bao', 'Tin Thong Bao', 'tintuc', NULL, 1),
(11, '-1574578086-4.jpg', 'Khóa Tu 2 tuần', '   Nội dung tóm tắt khóa tu      2 tuan', '<p>Nội dung khóa tu 2 tuần</p>\r\n', 'khoatu', NULL, 1),
(10, '-1574578026-3.jpg', 'Kỳ Khóa tu 3 ngày', 'Khóa tu 3 ngày    ', '<p>Nôi dung..</p>\r\n', 'khoatu', NULL, 1),
(16, 'e', 'Nội qui khi tham gia khóa tu', 'Nội qui 1', 'Nội dung nôi  qui 1', 'noiqui', NULL, 1),
(17, NULL, 'Noi qui 2', 'Noi qui 2', 'Noi dung noi qui 2', 'noiqui', NULL, 1),
(18, NULL, 'Thong bao ', 'Thong bao 1', 'Thong bao 1', 'thongbao', NULL, 1),
(19, NULL, 'Hoi dap 1', 'cau hoi 1', 'Tra loi cau hoi 1', 'hoidap', NULL, 1),
(20, NULL, 'Hoi dap 2', 'Cau hoi 2', 'Tra loi cau hoi 2', 'hoidap', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(1000) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `contact_no` varchar(1000) DEFAULT NULL,
  `connection_key` varchar(1000) DEFAULT NULL,
  `gid` int(11) NOT NULL DEFAULT '1',
  `su` int(11) NOT NULL DEFAULT '0' COMMENT '0: quan ly toan bo, 1: Quan ly dao trang',
  `subscription_expired` int(11) NOT NULL DEFAULT '0',
  `verify_code` int(11) NOT NULL DEFAULT '0',
  `birthdate` date DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4291 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`uid`, `password`, `email`, `first_name`, `last_name`, `contact_no`, `connection_key`, `gid`, `su`, `subscription_expired`, `verify_code`, `birthdate`, `type`) VALUES
(4289, 'e10adc3949ba59abbe56e057f20f883e', 'hung.seu@gmail.com', 'Admin', 'Tran', '0909090', NULL, 0, 0, 0, 0, NULL, NULL),
(4290, 'e10adc3949ba59abbe56e057f20f883e', 'thienminh@gmail.com', 'Minh', 'Thien', NULL, NULL, 1, 1, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v-thong-tin-thanh-vien`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v-thong-tin-thanh-vien`;
CREATE TABLE IF NOT EXISTS `v-thong-tin-thanh-vien` (
`id` int(10)
,`iddaotrang` int(10)
,`code` varchar(10)
,`hoten` varchar(80)
,`phapdanh` varchar(50)
,`ngaysinh` varchar(12)
,`gioitinh` varchar(15)
,`noidkhk` tinytext
,`cmnd` varchar(20)
,`ngaycap` varchar(12)
,`noicap` varchar(100)
,`nghenghiep` varchar(60)
,`tinhtrangthannhan` varchar(255)
,`sodtcanhan` varchar(50)
,`sodtnguoithan` varchar(255)
,`hinhcmnd1` varchar(255)
,`hinhcmnd2` varchar(255)
,`ghichu` varchar(255)
,`ngaydk` datetime(6)
,`tendaotrang` varchar(50)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v_chuongtrinhkhoatu_cu`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_chuongtrinhkhoatu_cu`;
CREATE TABLE IF NOT EXISTS `v_chuongtrinhkhoatu_cu` (
`idctkhoatu` int(10)
,`tieude` varchar(255)
,`tomtat` varchar(255)
,`noidung` text
,`loaikhoatu` varchar(30)
,`ngaybatdautu` date
,`ngayketthuctu` date
,`ngaybatdaudk` date
,`ngayketthucdk` date
,`anhien` int(1)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v_chuongtrinhkhoatu_dangdangky`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_chuongtrinhkhoatu_dangdangky`;
CREATE TABLE IF NOT EXISTS `v_chuongtrinhkhoatu_dangdangky` (
`idctkhoatu` int(10)
,`tieude` varchar(255)
,`tomtat` varchar(255)
,`noidung` text
,`loaikhoatu` varchar(30)
,`ngaybatdautu` date
,`ngayketthuctu` date
,`ngaybatdaudk` date
,`ngayketthucdk` date
,`anhien` int(1)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v_danh_sach_dang_ky_ctkhoatu`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_danh_sach_dang_ky_ctkhoatu`;
CREATE TABLE IF NOT EXISTS `v_danh_sach_dang_ky_ctkhoatu` (
`iddaotrang` int(10)
,`tendaotrang` varchar(50)
,`uid` int(11)
,`idthanhvien` int(10)
,`code` varchar(10)
,`hoten` varchar(80)
,`phapdanh` varchar(50)
,`ngaysinh` varchar(12)
,`gioitinh` varchar(15)
,`cmnd` varchar(20)
,`sodtcanhan` varchar(50)
,`sodtnguoithan` varchar(255)
,`idctkhoatu` int(10)
,`ngaythaotac` datetime(6)
,`ghichu` varchar(255)
,`trangthai` varchar(20)
,`solanchinhsua` int(255)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v_danh_sach_dang_ky_huy_ctkhoatu`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_danh_sach_dang_ky_huy_ctkhoatu`;
CREATE TABLE IF NOT EXISTS `v_danh_sach_dang_ky_huy_ctkhoatu` (
`iddaotrang` int(10)
,`tendaotrang` varchar(50)
,`uid` int(11)
,`idthanhvien` int(10)
,`code` varchar(10)
,`hoten` varchar(80)
,`phapdanh` varchar(50)
,`ngaysinh` varchar(12)
,`gioitinh` varchar(15)
,`cmnd` varchar(20)
,`sodtcanhan` varchar(50)
,`sodtnguoithan` varchar(255)
,`idctkhoatu` int(10)
,`ngaythaotac` datetime(6)
,`ghichu` varchar(255)
,`trangthai` varchar(20)
,`solanchinhsua` int(255)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v_ket_qua_dang_ky`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_ket_qua_dang_ky`;
CREATE TABLE IF NOT EXISTS `v_ket_qua_dang_ky` (
`idctkhoatu` int(10)
,`tieude` varchar(255)
,`tomtat` varchar(255)
,`noidung` text
,`loaikhoatu` varchar(30)
,`ngaybatdautu` date
,`ngayketthuctu` date
,`ngaybatdaudk` date
,`ngayketthucdk` date
,`khoa` varchar(255)
,`anhien` int(1)
,`soluongdangky` bigint(21)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v_thong-tin-dang-ky-thanh-vien`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_thong-tin-dang-ky-thanh-vien`;
CREATE TABLE IF NOT EXISTS `v_thong-tin-dang-ky-thanh-vien` (
`idctkhoatu` int(10)
,`tieude` varchar(255)
,`tomtat` varchar(255)
,`loaikhoatu` varchar(30)
,`ngayketthuctu` date
,`ngaybatdautu` date
,`ngaybatdaudk` date
,`ngayketthucdk` date
,`id` int(10)
,`iddaotrang` int(10)
,`code` varchar(10)
,`hoten` varchar(80)
,`phapdanh` varchar(50)
,`ngaysinh` varchar(12)
,`iddangky` int(11)
,`ngaythaotac` datetime(6)
,`ghichu` varchar(255)
,`trangthai` varchar(20)
,`solanchinhsua` int(255)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v_thong-tin-dang-ky-thanh-vien-0`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_thong-tin-dang-ky-thanh-vien-0`;
CREATE TABLE IF NOT EXISTS `v_thong-tin-dang-ky-thanh-vien-0` (
`id` int(10)
,`iddaotrang` int(10)
,`code` varchar(10)
,`hoten` varchar(80)
,`phapdanh` varchar(50)
,`ngaysinh` varchar(12)
,`gioitinh` varchar(15)
,`noidkhk` tinytext
,`cmnd` varchar(20)
,`ngaycap` varchar(12)
,`noicap` varchar(100)
,`nghenghiep` varchar(60)
,`tinhtrangthannhan` varchar(255)
,`sodtcanhan` varchar(50)
,`sodtnguoithan` varchar(255)
,`hinhcmnd1` varchar(255)
,`hinhcmnd2` varchar(255)
,`ghichu` varchar(255)
,`ngaydk` datetime(6)
,`active` int(1)
,`hinh46` varchar(200)
,`tinhtrangbenhly` text
,`idctkhoatu` int(10)
,`tieude` varchar(255)
,`tomtat` varchar(255)
,`noidung` text
,`ngaybatdautu` date
,`ngayketthuctu` date
,`ngaybatdaudk` date
,`ngayketthucdk` date
,`iddangky` binary(0)
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v-thong-tin-thanh-vien`
--
DROP TABLE IF EXISTS `v-thong-tin-thanh-vien`;

CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `v-thong-tin-thanh-vien`  AS  select `thanhvien`.`id` AS `id`,`thanhvien`.`iddaotrang` AS `iddaotrang`,`thanhvien`.`code` AS `code`,`thanhvien`.`hoten` AS `hoten`,`thanhvien`.`phapdanh` AS `phapdanh`,`thanhvien`.`ngaysinh` AS `ngaysinh`,`thanhvien`.`gioitinh` AS `gioitinh`,`thanhvien`.`noidkhk` AS `noidkhk`,`thanhvien`.`cmnd` AS `cmnd`,`thanhvien`.`ngaycap` AS `ngaycap`,`thanhvien`.`noicap` AS `noicap`,`thanhvien`.`nghenghiep` AS `nghenghiep`,`thanhvien`.`tinhtrangthannhan` AS `tinhtrangthannhan`,`thanhvien`.`sodtcanhan` AS `sodtcanhan`,`thanhvien`.`sodtnguoithan` AS `sodtnguoithan`,`thanhvien`.`hinhcmnd1` AS `hinhcmnd1`,`thanhvien`.`hinhcmnd2` AS `hinhcmnd2`,`thanhvien`.`ghichu` AS `ghichu`,`thanhvien`.`ngaydk` AS `ngaydk`,`daotrang`.`tendaotrang` AS `tendaotrang` from (`thanhvien` join `daotrang` on((`thanhvien`.`iddaotrang` = `daotrang`.`iddaotrang`))) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v_chuongtrinhkhoatu_cu`
--
DROP TABLE IF EXISTS `v_chuongtrinhkhoatu_cu`;

CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `v_chuongtrinhkhoatu_cu`  AS  select `chuongtrinhkhoatu`.`idctkhoatu` AS `idctkhoatu`,`chuongtrinhkhoatu`.`tieude` AS `tieude`,`chuongtrinhkhoatu`.`tomtat` AS `tomtat`,`chuongtrinhkhoatu`.`noidung` AS `noidung`,`chuongtrinhkhoatu`.`loaikhoatu` AS `loaikhoatu`,`chuongtrinhkhoatu`.`ngaybatdautu` AS `ngaybatdautu`,`chuongtrinhkhoatu`.`ngayketthuctu` AS `ngayketthuctu`,`chuongtrinhkhoatu`.`ngaybatdaudk` AS `ngaybatdaudk`,`chuongtrinhkhoatu`.`ngayketthucdk` AS `ngayketthucdk`,`chuongtrinhkhoatu`.`anhien` AS `anhien` from `chuongtrinhkhoatu` where ((`chuongtrinhkhoatu`.`ngayketthucdk` <= now()) and (`chuongtrinhkhoatu`.`anhien` = 1)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v_chuongtrinhkhoatu_dangdangky`
--
DROP TABLE IF EXISTS `v_chuongtrinhkhoatu_dangdangky`;

CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `v_chuongtrinhkhoatu_dangdangky`  AS  select `chuongtrinhkhoatu`.`idctkhoatu` AS `idctkhoatu`,`chuongtrinhkhoatu`.`tieude` AS `tieude`,`chuongtrinhkhoatu`.`tomtat` AS `tomtat`,`chuongtrinhkhoatu`.`noidung` AS `noidung`,`chuongtrinhkhoatu`.`loaikhoatu` AS `loaikhoatu`,`chuongtrinhkhoatu`.`ngaybatdautu` AS `ngaybatdautu`,`chuongtrinhkhoatu`.`ngayketthuctu` AS `ngayketthuctu`,`chuongtrinhkhoatu`.`ngaybatdaudk` AS `ngaybatdaudk`,`chuongtrinhkhoatu`.`ngayketthucdk` AS `ngayketthucdk`,`chuongtrinhkhoatu`.`anhien` AS `anhien` from `chuongtrinhkhoatu` where ((`chuongtrinhkhoatu`.`ngaybatdaudk` <= now()) and (`chuongtrinhkhoatu`.`ngayketthucdk` >= now()) and (`chuongtrinhkhoatu`.`anhien` = 1)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v_danh_sach_dang_ky_ctkhoatu`
--
DROP TABLE IF EXISTS `v_danh_sach_dang_ky_ctkhoatu`;

CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `v_danh_sach_dang_ky_ctkhoatu`  AS  select `daotrang`.`iddaotrang` AS `iddaotrang`,`daotrang`.`tendaotrang` AS `tendaotrang`,`daotrang`.`uid` AS `uid`,`thanhvien`.`id` AS `idthanhvien`,`thanhvien`.`code` AS `code`,`thanhvien`.`hoten` AS `hoten`,`thanhvien`.`phapdanh` AS `phapdanh`,`thanhvien`.`ngaysinh` AS `ngaysinh`,`thanhvien`.`gioitinh` AS `gioitinh`,`thanhvien`.`cmnd` AS `cmnd`,`thanhvien`.`sodtcanhan` AS `sodtcanhan`,`thanhvien`.`sodtnguoithan` AS `sodtnguoithan`,`dangky`.`idctkhoatu` AS `idctkhoatu`,`dangky`.`ngaythaotac` AS `ngaythaotac`,`dangky`.`ghichu` AS `ghichu`,`dangky`.`trangthai` AS `trangthai`,`dangky`.`solanchinhsua` AS `solanchinhsua` from ((`dangky` join `thanhvien` on((`dangky`.`idthanhvien` = `thanhvien`.`id`))) join `daotrang` on((`thanhvien`.`iddaotrang` = `daotrang`.`iddaotrang`))) where (`dangky`.`trangthai` = 'DANGKY') ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v_danh_sach_dang_ky_huy_ctkhoatu`
--
DROP TABLE IF EXISTS `v_danh_sach_dang_ky_huy_ctkhoatu`;

CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `v_danh_sach_dang_ky_huy_ctkhoatu`  AS  select `daotrang`.`iddaotrang` AS `iddaotrang`,`daotrang`.`tendaotrang` AS `tendaotrang`,`daotrang`.`uid` AS `uid`,`thanhvien`.`id` AS `idthanhvien`,`thanhvien`.`code` AS `code`,`thanhvien`.`hoten` AS `hoten`,`thanhvien`.`phapdanh` AS `phapdanh`,`thanhvien`.`ngaysinh` AS `ngaysinh`,`thanhvien`.`gioitinh` AS `gioitinh`,`thanhvien`.`cmnd` AS `cmnd`,`thanhvien`.`sodtcanhan` AS `sodtcanhan`,`thanhvien`.`sodtnguoithan` AS `sodtnguoithan`,`dangky`.`idctkhoatu` AS `idctkhoatu`,`dangky`.`ngaythaotac` AS `ngaythaotac`,`dangky`.`ghichu` AS `ghichu`,`dangky`.`trangthai` AS `trangthai`,`dangky`.`solanchinhsua` AS `solanchinhsua` from ((`dangky` join `thanhvien` on((`dangky`.`idthanhvien` = `thanhvien`.`id`))) join `daotrang` on((`thanhvien`.`iddaotrang` = `daotrang`.`iddaotrang`))) where (`dangky`.`trangthai` = 'HUY') ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v_ket_qua_dang_ky`
--
DROP TABLE IF EXISTS `v_ket_qua_dang_ky`;

CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `v_ket_qua_dang_ky`  AS  select `b`.`idctkhoatu` AS `idctkhoatu`,`b`.`tieude` AS `tieude`,`b`.`tomtat` AS `tomtat`,`b`.`noidung` AS `noidung`,`b`.`loaikhoatu` AS `loaikhoatu`,`b`.`ngaybatdautu` AS `ngaybatdautu`,`b`.`ngayketthuctu` AS `ngayketthuctu`,`b`.`ngaybatdaudk` AS `ngaybatdaudk`,`b`.`ngayketthucdk` AS `ngayketthucdk`,`b`.`khoa` AS `khoa`,`b`.`anhien` AS `anhien`,(select count(0) from `dangky` where ((`dangky`.`trangthai` = 'DANGKY') and (`dangky`.`idctkhoatu` = `b`.`idctkhoatu`))) AS `soluongdangky` from `chuongtrinhkhoatu` `b` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v_thong-tin-dang-ky-thanh-vien`
--
DROP TABLE IF EXISTS `v_thong-tin-dang-ky-thanh-vien`;

CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `v_thong-tin-dang-ky-thanh-vien`  AS  select `chuongtrinhkhoatu`.`idctkhoatu` AS `idctkhoatu`,`chuongtrinhkhoatu`.`tieude` AS `tieude`,`chuongtrinhkhoatu`.`tomtat` AS `tomtat`,`chuongtrinhkhoatu`.`loaikhoatu` AS `loaikhoatu`,`chuongtrinhkhoatu`.`ngayketthuctu` AS `ngayketthuctu`,`chuongtrinhkhoatu`.`ngaybatdautu` AS `ngaybatdautu`,`chuongtrinhkhoatu`.`ngaybatdaudk` AS `ngaybatdaudk`,`chuongtrinhkhoatu`.`ngayketthucdk` AS `ngayketthucdk`,`thanhvien`.`id` AS `id`,`thanhvien`.`iddaotrang` AS `iddaotrang`,`thanhvien`.`code` AS `code`,`thanhvien`.`hoten` AS `hoten`,`thanhvien`.`phapdanh` AS `phapdanh`,`thanhvien`.`ngaysinh` AS `ngaysinh`,`dangky`.`iddangky` AS `iddangky`,`dangky`.`ngaythaotac` AS `ngaythaotac`,`dangky`.`ghichu` AS `ghichu`,`dangky`.`trangthai` AS `trangthai`,`dangky`.`solanchinhsua` AS `solanchinhsua` from (`thanhvien` left join (`chuongtrinhkhoatu` left join `dangky` on((`dangky`.`idctkhoatu` = `chuongtrinhkhoatu`.`idctkhoatu`))) on((`dangky`.`idthanhvien` = `thanhvien`.`id`))) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v_thong-tin-dang-ky-thanh-vien-0`
--
DROP TABLE IF EXISTS `v_thong-tin-dang-ky-thanh-vien-0`;

CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `v_thong-tin-dang-ky-thanh-vien-0`  AS  select `thanhvien`.`id` AS `id`,`thanhvien`.`iddaotrang` AS `iddaotrang`,`thanhvien`.`code` AS `code`,`thanhvien`.`hoten` AS `hoten`,`thanhvien`.`phapdanh` AS `phapdanh`,`thanhvien`.`ngaysinh` AS `ngaysinh`,`thanhvien`.`gioitinh` AS `gioitinh`,`thanhvien`.`noidkhk` AS `noidkhk`,`thanhvien`.`cmnd` AS `cmnd`,`thanhvien`.`ngaycap` AS `ngaycap`,`thanhvien`.`noicap` AS `noicap`,`thanhvien`.`nghenghiep` AS `nghenghiep`,`thanhvien`.`tinhtrangthannhan` AS `tinhtrangthannhan`,`thanhvien`.`sodtcanhan` AS `sodtcanhan`,`thanhvien`.`sodtnguoithan` AS `sodtnguoithan`,`thanhvien`.`hinhcmnd1` AS `hinhcmnd1`,`thanhvien`.`hinhcmnd2` AS `hinhcmnd2`,`thanhvien`.`ghichu` AS `ghichu`,`thanhvien`.`ngaydk` AS `ngaydk`,`thanhvien`.`active` AS `active`,`thanhvien`.`hinh46` AS `hinh46`,`thanhvien`.`tinhtrangbenhly` AS `tinhtrangbenhly`,`chuongtrinhkhoatu`.`idctkhoatu` AS `idctkhoatu`,`chuongtrinhkhoatu`.`tieude` AS `tieude`,`chuongtrinhkhoatu`.`tomtat` AS `tomtat`,`chuongtrinhkhoatu`.`noidung` AS `noidung`,`chuongtrinhkhoatu`.`ngaybatdautu` AS `ngaybatdautu`,`chuongtrinhkhoatu`.`ngayketthuctu` AS `ngayketthuctu`,`chuongtrinhkhoatu`.`ngaybatdaudk` AS `ngaybatdaudk`,`chuongtrinhkhoatu`.`ngayketthucdk` AS `ngayketthucdk`,NULL AS `iddangky` from (`thanhvien` join `chuongtrinhkhoatu`) ;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD CONSTRAINT `dangky_ibfk_1` FOREIGN KEY (`idthanhvien`) REFERENCES `thanhvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dangky_ibfk_2` FOREIGN KEY (`idctkhoatu`) REFERENCES `chuongtrinhkhoatu` (`idctkhoatu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `daotrang`
--
ALTER TABLE `daotrang`
  ADD CONSTRAINT `daotrang_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD CONSTRAINT `thanhvien_ibfk_1` FOREIGN KEY (`iddaotrang`) REFERENCES `daotrang` (`iddaotrang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
