-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2021 at 07:19 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sach`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SoLuong` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `MaSach` int(11) NOT NULL,
  `MaDH` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `MaSach` (`MaSach`,`MaDH`),
  KEY `MaDH` (`MaDH`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ID`, `SoLuong`, `TongTien`, `MaSach`, `MaDH`, `updated_at`, `created_at`) VALUES
(23, 1, 58000, 2, 15, '2021-12-21 07:28:02', '2021-12-21 07:28:02'),
(24, 1, 162000, 7, 16, '2021-12-21 07:43:05', '2021-12-21 07:43:05'),
(25, 1, 58000, 2, 17, '2021-12-23 12:05:50', '2021-12-23 12:05:50'),
(26, 1, 58000, 2, 18, '2021-12-27 17:51:31', '2021-12-27 17:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ThanhToan` varchar(255) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `GhiChu` varchar(255) DEFAULT NULL,
  `MaKH` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `MaKH` (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`ID`, `ThanhToan`, `TongTien`, `GhiChu`, `MaKH`, `updated_at`, `created_at`) VALUES
(14, 'CODE', 300000, 'khum', 18, '2021-12-19 16:18:57', '2021-12-19 16:18:57'),
(15, 'COD', 58000, NULL, 25, '2021-12-21 07:28:02', '2021-12-21 07:28:02'),
(16, 'COD', 162000, 'khum có', 26, '2021-12-21 07:43:05', '2021-12-21 07:43:05'),
(17, 'COD', 58000, 'khum', 27, '2021-12-23 12:05:50', '2021-12-23 12:05:50'),
(18, 'ATM', 58000, 'không', 28, '2021-12-27 17:51:31', '2021-12-27 17:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `giaohang`
--

DROP TABLE IF EXISTS `giaohang`;
CREATE TABLE IF NOT EXISTS `giaohang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `soluong` int(11) NOT NULL,
  `MaDH` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `MaDH` (`MaDH`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giaohang`
--

INSERT INTO `giaohang` (`ID`, `soluong`, `MaDH`, `updated_at`, `created_at`) VALUES
(7, 1, 15, '2021-12-21 07:28:02', '2021-12-21 07:28:02'),
(8, 1, 16, '2021-12-21 07:43:05', '2021-12-21 07:43:05'),
(9, 1, 17, '2021-12-23 12:05:50', '2021-12-23 12:05:50'),
(10, 1, 18, '2021-12-27 17:51:31', '2021-12-27 17:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenHinh` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`ID`, `TenHinh`, `updated_at`, `created_at`) VALUES
(1, 'sli1.jpg', '2021-01-12 22:15:44', '2021-01-12 22:15:44'),
(2, 'sli2.jpg', '2021-01-12 22:16:05', '2021-01-12 22:16:05'),
(3, 'sli3.jpg', '2021-01-12 22:16:14', '2021-01-12 22:16:14'),
(4, 'sli4.jpg', '2021-01-12 22:16:21', '2021-01-12 22:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(255) NOT NULL,
  `GIoiTinh` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(20) NOT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `GhiChu` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`ID`, `TenKH`, `GIoiTinh`, `Email`, `SoDienThoai`, `DiaChi`, `GhiChu`, `updated_at`, `created_at`) VALUES
(1, 'kim hoang', 'Nữ', 'abc@gmail.com', '0704477888', '123/4da ACB', 'không có', '2021-12-18 12:42:59', '2021-12-18 12:42:59'),
(18, 'Trần Kim Hoàng', 'nữ', 'trankimhoang11052000@gmail.com', '5436356657', 'hcm', 'không', '2021-12-19 16:01:10', '2021-12-19 16:01:10'),
(19, 'Trần Kim Hoàng', 'nữ', 'trankimhoang11052000@gmail.com', '5436356657', 'hcm', 'không', '2021-12-19 16:01:41', '2021-12-19 16:01:41'),
(20, 'Trần Kim Hoàng', 'nữ', 'trankimhoang11052000@gmail.com', '5436356657', 'hcm', NULL, '2021-12-19 16:03:00', '2021-12-19 16:03:00'),
(21, 'Trần Kim Hoàng', 'nữ', 'trankimhoang11052000@gmail.com', '5436356657', 'hcm', 'dfngj', '2021-12-19 16:11:19', '2021-12-19 16:11:19'),
(22, 'Trần Kim Hoàng', 'nữ', 'trankimhoang11052000@gmail.com', '5436356657', 'hcm', 'dfngj', '2021-12-19 16:13:10', '2021-12-19 16:13:10'),
(23, 'abc', 'nữ', 'trankimhoang11052000@gmail.com', '546789', 'HCM', 'khum', '2021-12-19 16:13:51', '2021-12-19 16:13:51'),
(24, 'aaaaaaaaaaa', 'nam', 'abc@gmail.com', '123456789', 'aaa', 'bb', '2021-12-21 07:20:10', '2021-12-21 07:20:10'),
(25, 'Trần Kim Hoàng', 'nam', 'trankimhoang11052000@gmail.com', '5436356657', 'HCM', NULL, '2021-12-21 07:28:02', '2021-12-21 07:28:02'),
(26, 'abc', 'nữ', 'trankimhoang11052000@gmail.com', '546789', 'HCM', 'khum có', '2021-12-21 07:43:05', '2021-12-21 07:43:05'),
(27, 'Kim Hoàng', 'nam', 'trankimhoang11052000@gmail.com', '546789', 'hcm', 'khum', '2021-12-23 12:05:50', '2021-12-23 12:05:50'),
(28, 'Trần Kim Hoàng', 'nữ', 'trankimhoang11052000@gmail.com', '5436356657', 'hcm', 'không', '2021-12-27 17:51:31', '2021-12-27 17:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

DROP TABLE IF EXISTS `sach`;
CREATE TABLE IF NOT EXISTS `sach` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenSach` varchar(255) NOT NULL,
  `Hinh` varchar(255) NOT NULL,
  `GiaTien` int(11) NOT NULL,
  `MoTa` text NOT NULL,
  `Size` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `MaTL` int(11) NOT NULL,
  `MaTG` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `MaTL` (`MaTL`,`MaTG`),
  KEY `MaTG` (`MaTG`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`ID`, `TenSach`, `Hinh`, `GiaTien`, `MoTa`, `Size`, `soluong`, `MaTL`, `MaTG`, `updated_at`, `created_at`) VALUES
(2, 'Dạy Con Làm Giàu - tập 1', 'Day-con-lam-giau_tap-1.png', 58000, 'Dạy con làm giàu', 'A1 - 420 x 297mm', 19, 1, 1, '2021-12-27 17:51:31', '2021-12-27 17:51:31'),
(3, '10 Loại Hình Đổi Mới Sáng Tạo', '10-loai-hinh-doi-moi-sang-tao.png', 199000, 'Hầu hết các nhà khoa học đều đồng ý rằng chúng ta đang sống trong kỷ nguyên vĩ đại bậc nhất của sự thay đổi lịch sử loài người. Và tốc độ thay đổi cũng đang gia tăng chóng mặ\r\n\r\nĐối với nhiều công ty, điều này có nghĩa là: Đổi mới sáng tạo không phải là chuyện “thích thì làm, không thích thì thôi”, mà nó mang tính bắt buộc. Khách hàng luôn đòi hỏi những sản phẩm mới. Các đối thủ sẽ tấn công sát sườn nếu bạn không có gì mới. Những nhân viên tài năng sẽ không gia nhập công ty bạn nếu bạn không truyền tải được tinh thần đổi mới. Các nhà phân tích mong chờ sự sáng tạo. Các nhà đầu tư tưởng thưởng cho ý tưởng mới.', 'A1 - 420 x 297mm', 20, 1, 15, '2021-12-18 11:08:16', '2021-12-18 11:08:16'),
(4, 'Dạy Con Làm Giàu - tập 2', 'Day-con-lam-giau_tap-2.png', 85000, 'Dạy Con Làm Giàu (Tập 2) - Sử Dụng Đồng Vốn Bạn đang đi học? Bạn vừa ra trường và chưa có việc làm? Bạn đang làm việc với mức lương ổn định? Bạn đang làm cho một công ty tư nhân tư nhân? Bạn là một chủ doanh nghiệp nhỏ? Bạn muốn được thoải mái về tiền bạc? Dạy con làm giàu tập 2 sẽ là bước khởi đầu cho bạn - những quan điểm mới về đồng vốn và cách sử dụng tiền hiệu quả.', 'A1 - 420 x 297mm', 30, 1, 1, '2021-01-17 09:28:26', '2021-01-17 09:28:26'),
(5, 'Đời Thay Đổi Khi Chúng Ta Thay Đổi', 'doi-thay-doi-khi-chung-ta-thay-doi.jpg', 45000, '\"Cho dù suy nghĩ nào làm bạn đau khổ đi nữa, đó vẫn chỉ là suy nghĩ. Bạn có thể thay đổi được mà. Và khi bạn thay đổi, cuộc sống của bạn sẽ trở nên hạnh phúc\".\r\n\r\nCó bao giờ bạn ước mình lớn hơn? Ước gì mình có nhiều tiền hơn? Ước gì mình xinh hơn?... Có bao giờ bạn nghĩ \"Không ai hiểu mình cả!\". Có bao giờ bạn thắc mắc \"Liệu mình có yêu không?\". Có bao giờ bạn hỏi \"Mình có bình thường không nhỉ?\" Nếu trả lời \"có\" phân nửa số câu hỏi trên, thì bạn là người hoàn toàn bình thường. Bạn sẽ thấy cuốn sách này hữu ích!\r\n\r\nNếu bạn trả lời có cho những câu hỏi trên thì quyển sách này dành cho bạn - TUỔI MỚI LỚN - tuổi thường ưu tư, hay mơ mộng, muốn làm nhiều điều và cũng dễ... sai lầm. Cuốn sách này sẽ giúp bạn - TUỔl MỚI LỚN - biết cách nhìn cuộc sống xung quanh, nhìn nhận chính mình, thay đổi thái độ, đủ tự tin, để rồi bạn sẽ thấy lạc quan, yêu đời, sống thoải mái và giỏi giang hơn.\r\n\r\nĐọc Đời thay đổi khi chúng ta thay đổi - bạn sẽ ngạc nhiên khi thấy một quyển sách \"dạy đời\" lại hay, vui và gần gũi \"đúng ý\" mình đến thế!\r\n\r\nChính những bức tranh tinh thần làm nên con người bạn ngày nay. Khi bạn thay đổi những bức tranh đó, tự khắc bạn sẽ thay đổi ngay.\r\n\r\nBạn không thể đạt được những điều vĩ đại chỉ bằng cách nhìn vào mình trong hiện tại mà phải nhìn vào mình trong tương lai và tái hiện những bức tranh đó trong đầu.\r\n\r\nTrích từ sách', 'A1 - 420 x 297mm', 30, 2, 14, '2021-01-18 03:31:22', '2021-01-18 03:31:22'),
(6, 'Ngọn Đèn Không Tắt', 'ngon-den-khong-tat.png', 60000, 'Ngọn Đèn Không Tắt là tác phẩm đầu tay đã ghi lại dấu ấn thành công của Nguyễn Ngọc Tư. Mở đầu truyện \"Kính gửi ông Hai Tương\", thế hệ ông đã xã thân để bảo vệ Xóm Mũi, Xứ Hòn, chiến tranh kẻ mất người còn. Trong dòng hoài niệm của Tươi, lúc ông nội còn sống, Tươi luôn được đi cùng nội mỗi lần tỉnh mời nói chuyện khởi nghĩa. Tươi đại diện cho thế hệ trẻ và cũng thay nội kể tiếp trang sử hào hùng ở xứ Hòn.\r\n\r\nBên cạnh niềm tự hào chiến thắng trộn lẫn nước mắt và máu của các bác, các chú, thế nhưng trong trái tim chị đó mãi mãi \"Ngọn đèn không tắt\". Ngọn đèn ấy thắp sáng bằng ý chí của triệu triệu trái tim, thế hệ trẻ hôm nay được nuôi dưỡng bằng niềm tin, nhìn vào quá khứ, sống ở hiện tại hướng đến tương lai. Luôn trân trọng kính yêu những người đã ngã xuống vì mảnh đất thân yêu, tổ quốc Việt Nam đời đời ghi nhớ công ơn các chú, các anh.v.v..\r\n\r\nNguyễn Ngọc Tư đã sử dụng phương ngữ tối đa và đúng chỗ vào những câu chuyện thật \"miền Nam\". Đó là miền Nam của tỉnh lẻ, của ruộng vườn, và nhất là của sông, của mưa; đã thái bình nhưng vẫn còn dấu chiến tranh - không ở sự điêu tàn vì bom đạn mà ở những vết thương trong đời ngườ', 'A1 - 420 x 297mm', 28, 4, 12, '2021-01-18 03:37:11', '2021-01-18 03:37:11'),
(7, 'Harry Potter Và Tên Tù Nhân Ngục', 'herry-poster-3.jpeg', 162000, 'Harry Potter may mắn sống sót đến tuổi 13, sau nhiều cuộc tấn công của Chúa tể hắc ám.\r\n\r\nNhưng hy vọng có một học kỳ yên ổn với Quidditch của cậu đã tiêu tan thành mây khói khi một kẻ điên cuồng giết người hàng loạt vừa thoát khỏi nhà tù Azkaban, với sự lùng sục của những cai tù là giám ngục.\r\n\r\nDường như trường Hogwarts là nơi an toàn nhất cho Harry lúc này. Nhưng có phải là sự trùng hợp khi cậu luôn cảm giác có ai đang quan sát mình từ bóng đêm, và những điềm báo của giáo sư Trelawney liệu có chính xác?\r\n\r\n‘Câu chuyện được kể với trí tưởng tượng bay bổng, sự hài hước bất tận có thể quyến rũ cả người lớn lẫn trẻ em.’', 'A1 - 420 x 297mm', 29, 4, 11, '2021-12-21 07:43:05', '2021-12-21 07:43:05'),
(8, 'Dế Mèn Phiêu Lưu Kí', 'de-men-phieu-luu-ky.jpg', 124000, 'Dế Mèn phiêu lưu ký là tác phẩm văn xuôi đặc sắc và nổi tiếng nhất của nhà văn Tô Hoài viết về loài vật, dành cho lứa tuổi thiếu nhi. Ban đầu truyện có tên là \"Con dế mèn\" (chính là ba chương đầu của truyện) do Nhà xuất bản Tân Dân, Hà Nội phát hành năm 1941. Sau đó, được sự ủng hộ nhiệt tình của nhân dân, Tô Hoài viết thêm truyện \"Dế Mèn phiêu lưu ký\" (là bảy chương cuối của truyện). Năm 1955, ông mới gộp hai chuyện vào với nhau để thành truyện \"Dế mèn phiêu lưu ký\" như ngày nay. Truyện đã được đưa vào chương trình học lớp 6 học kỳ 2 môn Ngữ Văn của Việt Nam.', 'A1 - 420 x 297mm', 30, 1, 1, '2021-12-23 08:53:32', '2021-12-23 08:53:32'),
(9, '3 - 1 = Mấy?', '3-1-may-tai-ban-2018.jpg', 71000, 'Đêm đó, thị trấn nhỏ Tuyệt Luân Đế mất điện, nhân vật chính Trương Cổ chạy đến hỏi anh bạn trực trạm điện là Phùng Kình về nguyên nhân mất điện, nhưng anh chẳng nhận được câu trả lời mình cần mà kì lạ là anh bạn kia lại hỏi lại Trương Cổ một câu rất khó hiểu: “Ba trừ một bằng mấy?”. Khi về nhà, Trương Cổ bất chợt gặp một đứa bé trai chỉ độ một tuổi ngồi bơ vơ ven vệ đường. Trương Cổ thấy lạ, vì đêm hôm thế này, ai lại bỏ con nhỏ ở đây, càng lạ hơn là thằng bé không khóc mà chỉ nhìn chằm chằm vào anh. Trương Cổ ái ngại nhưng quyết định không bế đứa bé ấy theo mà cứ để nó ngồi đó rồi về báo cho mọi người trong thị trấn biết. Thấy đứa trẻ tội nghiệp, có người dân trong thị trấn tình nguyện đem nó về nuôi, nhưng cùng với sự có mặt của đứa trẻ, một loạt những sự việc bí ẩn và đáng sợ đã xuất hiện trong thị trấn…\r\n\r\nLẽ nào đứa bé chính là người gây ra những điều bí ẩn đó? Phùng Kình thật sự là người thế nào? Tại sao anh ta lại hỏi Trương Cổ câu hỏi khó hiểu đó? Câu đó mang ẩn ý gì? Để làm sáng tỏ những khúc mắc đó, Trương Cổ đã bất chấp hiểm nguy để tìm kiếm đáp án, mà khi đã dấn thân, chính anh cũng khó lường trước được: liệu mình có sống sót để đến đích hay không?', 'A1 - 420 x 297mm', 30, 4, 18, '2021-01-17 09:28:47', '2021-01-17 09:28:47'),
(10, 'Dạy Con Làm Giàu - tập 12', 'Day-con-lam-giau_tap-12.png', 105000, 'Cuốn sách này sẽ không dạy bạn trở thành nhà tiên tri... nhưng tôi tin nó sẽ mang lại cho bạn lòng tin rằng tương lai tài chính sáng sủa hơn đang chờ bạn và những người thân yêu của bạn, bất kể sự sụp đổ thị trường chứng khoán lớn nhất có xảy ra hay không. Vì vậy cuốn sách này không nhắm vào một quả cầu tiên tri, mà nhắm vào việc huấn luyện bạn thành một người cảnh giác hơn và được chuẩn bị kỹ hơn cho bất cứ điều gì sẽ xảy ra...dù tốt hay xấu. Nói cách khác, để giúp bạn kiểm soát tốt hơn tương lai tài chính của bạn.\r\n\r\n\"Quyển sách này nói về việc lựa chọn những phương án mới, những phương hướng mới và một tương lai tài chính mới.\" - Robert T. Kiyosaki', 'A1 - 420 x 297mm', 30, 1, 1, '2021-01-17 09:29:27', '2021-01-17 09:29:27'),
(11, 'Dạy Con Làm Giau - tập 13', 'Day-con-lam-giau_tap-13.png', 78000, 'Nâng cao chỉ số IQ tài chính giúp bạn thông minh hơn về tài chính để có thể xử lý những thông tin tài chính của riêng mình và tự mình nghiệm ra con đường để đạt đến sự tự do về tài chính. Quan trọng hơn là qua những điều tác giả trình bày trong cuốn sách sẽ giúp bạn tăng cường chí số IQ tài chính để trở nên giàu có.', 'A1 - 420 x 297mm', 30, 1, 1, '2021-01-17 09:28:53', '2021-01-17 09:28:53'),
(12, 'Luyện Thi Năng Lực Tiếng Nhật', '1800-tu-can-ban-n3-luyen-thi-nang-luc-tieng-nhat.jpeg', 103000, 'Vào đến trung cấp, việc bổ sung vốn từ vựng là vô cùng cần thiết. 1800 từ vựng trong cuốn sách này đã được lựa chọn từ các đề thi năng lực tiếng Nhật trong quá khứ vì vậy vô cùng phù h ợp với n hững đ ối t ượng đ ã h ọc h ết s ơ cấp và muốn ôn tập lại kiến thức của mình.\r\n\r\nCác điểm đặc trưng của cuốn sách!\r\n\r\n- Bố cục dễ nhớ\r\n\r\nDễ nhớ nhờ bố cục phân chia các từ loại. Ngoài ra phù hợp với cả những đối tượng muốn tự ôn tập.\r\n\r\n- Xác nhận lại ý nghĩa qua các câu văn Nắm bắt được ấn tượng của các từ vựng thông qua các ví dụ tự nhiên và dễ hiểu.\r\n\r\n- Ôn tập lại từ vựng đã học qua các đoạn văn “ 読んでみよう” Cứ khoảng 200 từ, sẽ có các bài đọc sử dụng các từ vựng đã học (sẽ được biểu thị bằng các từ in đậm) để người học ôn tập lại.\r\n\r\n- Nghe và xác nhận\r\n\r\n- Nâng cao năng lực từ vựng thông qua các từ vựng tham khảo phong phú Cung cấp thêm các từ vựng tham khảo có liên quan, giúp người học có thể hiểu sâu.', 'A1 - 420 x 297mm', 0, 3, 9, '2021-01-12 23:45:34', '2021-01-12 23:45:34'),
(13, 'Câu Chuyện Nhỏ Ý Nghĩa Lớn', 'cau-chuyen-nho-y-nghia-lon.jpg', 37000, 'Cuốn sách tổng hợp hơn những câu chuyện đặc sắc nhất trong và ngoài nước từ trước đến nay. Nội dung xoay quanh những phương diện liên quan đến sự trưởng thành lành mạnh, phát triển thuận lợi của thanh thiếu niên. Cuốn sách rất hữu ích đối với việc mở rộng kiến thức, bồi dưỡng văn hóa, nâng cao cảnh giới tinh thần của người đọc.', 'A1 - 420 x 297mm', 0, 2, 8, '2021-01-12 22:47:08', '2021-01-12 22:47:08'),
(14, 'Dạy Con Làm Giau - tập 11', 'Day-con-lam-giau_tap-11.png', 55000, 'Ở quyển sách này, tác giả tập trung giải thích và mở rộng những giá trị bí ẩn của hình thức kinh doanh tiếp thị qua mạng, và kinh doanh hàng đa cấp. Theo tác giả, đây là hình thức kinh doanh sáng tạo, phù hợp với tất cả những ai mong muốn trở thành người giàu có.', 'A1 - 420 x 297mm', 0, 1, 1, '2021-01-12 22:48:33', '2021-01-12 22:48:33'),
(15, 'Nhật Ký Phi Công Tiêm Kích', 'nhat-ky-phi-cong-tiem-kich.jpg', 135000, 'Cuốn sách là những ghi chép của Trung tướng - Anh hùng lực lượng vũ trang Nguyễn Đức Soát suốt 7 năm 1966-1972\r\n\r\n\"từ một anh lính bắt đầu học lái máy bay MiG-21 cho đến khi trở thành một trong những phi công có tài xạ kích giỏi nhất của Không quân Việt Nam, đã bắn hạ 6 máy bay Mỹ và được phong tặng danh hiệu cao quý Anh hùng Lực lượng Vũ trang Nhân dân khi mới 27 tuổi. \r\n\r\nChuyện của một người nhưng đọc lên sẽ thấy tinh thần, khí phách của một thế hệ thanh niên Việt Nam trong cuộc chiến đấu khốc liệt, không cân sức với Không quân Mỹ hùng mạnh; thấy được những chiến công oanh liệt cũng như tổn thất không gì bù đắp nổi của chiến tranh; thấy được cuộc sống, tình bạn, tình yêu, tình đồng chí thật đẹp …\r\n\r\nTrong cuốn sách này không chỉ thuần những dòng nhật ký của tác giả. Để bạn đọc tiếp cận văn bản thuận tiện hơn, tác giả đã viết thêm những dẫn nhập bối cảnh sự kiện, tương quan lực lượng ta - địch, số phận những nhân vật chính trong nhật ký, những hồi ức và những chiêm nghiệm khi đã có độ lùi lịch sử… - ánh sáng của chủ nghĩa anh hùng cách mạng trong trắng, tận hiến tự - nhiên - ý - thức cho Tổ quốc, nhân dân, Đảng và quân đội, vượt lên mọi thử thách khắc nghiệt, mọi khổ đau và mất mát để đi đến ngày chiến thắng.\" (Hữu Việt)', 'A1 - 420 x 297mm', 0, 6, 13, '2021-01-12 22:51:08', '2021-01-12 22:51:08'),
(16, 'Dạy Con Làm Giàu - tập 4', 'Day-con-lam-giau_tap-4.png', 67000, 'Dạy Con Làm Giàu (Tập 4) - Con Giàu Con Thông Minh Đúng như những gì được chiêm nghiệm: “Cuộc sống bắt đầu từ nhận thức” mà trong đó sự giàu có và trí thông minh là một phần tử, tác giả đã đóng vai trò là người dẫn đường giúp ta nhìn nhận và khám phá năng lực của chính bản thân mình. Trên nấc thang đầu vươn tới sự thành công về mặt tài chính, kinh nghiệm của thế hệ trước, một trí tuệ tinh nhạy và một trái tim nhân ái là vốn rất quý mà ta phải biết cách khai thác, tận dụng. Sự thông minh là gì? Nhân lên bằng cách chia ra? Có phải cần tiền mới làm ra tiền?…16 chương sách thực sự là kim chỉ nan hữu ích cho bước đầu tạo dựng sự nghiệp của mỗi người.', 'A1 - 420 x 297mm', 0, 1, 1, '2021-01-12 22:52:19', '2021-01-12 22:52:19'),
(17, '\"Xin\" Việc Cả Thế Giới', 'xin_viec_ca_the_gioi.jpg', 36000, 'Khi một tân cử nhân cầm hồ sơ đi tìm việc là lúc người ấy đang có thái độ tốt và sẵn sàng trải nghiệm, sẵn sàng học hỏi nhanh, thăng tiến trong con đường nghề nghiệp. Tuy nhiên, có bạn gửi đơn khắp nơi mà chưa một lần được phỏng vấn. Có bạn đã được gọi phỏng vấn nhiều lần nhưng vẫn thất nghiệp. Có bạn được nhận vào làm mà không thể trụ lại sau thời gian thử việc…\r\n\r\nMột nghịch lý là tỉ lệ cử nhân thất nghiệp cao nhưng các chủ doanh nghiệp muốn tuyển dụng cũng không dễ tìm được lao động phù hợp.\r\n\r\nCâu chuyện thất nghiệp của cử nhân, thạc sĩ… không hẳn xuất phát từ thị trường lao động hay kinh tế khó khăn, vậy còn nguyên nhân nào khác? Và thêm nhiều thắc mắc nữa được đặt ra, chung quy là một câu hỏi lớn mà hàng vạn sinh viên đều lo âu, ngơ ngác:\r\n\r\nLàm gì và làm thế nào để có việc sau khi ra trường?\r\n\r\nVấn đề của lao động trẻ được nêu ra cùng các giải pháp gợi ý như một cuốn cẩm nang dành cho các bạn sinh viên và tân cử nhân. Để bạn biết mình đang ở đâu, cần gì, và tự định ra phương thức phù hợp nhằm có được việc làm, tạo dựng sự nghiệp.', 'A1 - 420 x 297mm', 0, 2, 19, '2021-01-12 22:55:30', '2021-01-12 22:55:30'),
(18, 'Dạy Con Làm Giàu - tập 10', 'Day-con-lam-giau_tap-11.png', 81000, 'Đây là một quyển sách nói về chuyện làm chủ do chính một người làm chủ chấp bút, người từng trải bao thăng trầm, thành công cũng như thất bại trong thế giới thực. Sách cho bạn biết đã đến lúc thích hợp để bạn thôi việc và mở công ty riêng hay chưa, hay giúp bạn xác định kinh doanh có phải là con đường dành cho bạn không; thông qua những kinh nghiệm, lời khuyên hữu ích và bài học thực tế của tác giả', 'A1 - 420 x 297mm', 0, 1, 1, '2021-01-12 22:56:30', '2021-01-12 22:56:30'),
(19, 'Từ Tân Thế Giới', 'tan-tan-the.jpg', 117000, 'Từ tân thế giới – quyển trung là cuốn thứ hai trong trilogy 3 tập của tác giả Yusuke Kishi, một kiệt tác văn học giả tưởng và khoa học viễn tưởng Nhật Bản đã xuất sắc giành Grand Prize tại Lễ trao giải khoa học viễn tưởng Nhật Bản lần thứ 29 Nihon SF Taisou 29th do Hiệp hội các nhà văn giả tưởng và khoa học viễn tưởng Nhật Bản bình chọn. Từ tân thế giới cũng được chuyển thể TV series anime do A-1 Pictures studio thực hiện năm 2012, cùng một chuyển thể truyện tranh phát hành bởi Kodansha Comics năm 2012. Bản chuyển thể anime nhận được tiếng vang lớn và được đánh giá là một trong những TV series anime xuất sắc nhất thế kỷ 21.\r\n\r\nTiếp nối Quyển thượng, trải qua cuộc chiến kịch liệt giữa các bầy đàn quái thử, Saki và Satoru đều rơi vào tình trạng sức cùng lực kiệt. Do đã biết được quá nhiều thứ không nên biết, cùng với tình trạng mất chú lực của cả nhóm trừ Satoru, Saki và Satoru đã quyết định chạy trốn ngay trong đêm. Đêm dài đằng đẵng, căng thẳng vì lo ngại bị đuổi theo, họ may mắn tìm đến được nơi neo thuyền và hội ngộ với những người còn lại. Cả bọn đều vô sự, một sự may mắn đến khó tin. Nhóm Saki xoay sở lấy lại được chú lực, qua mắt những người lớn, tránh khỏi việc bị trừng phạt.\r\n\r\nNhưng đấy chỉ là sự sắp đặt của giới chóp bu trong thị trấn, nhằm quan sát sự biến đổi của nhóm những đứa trẻ đặc biệt này. Ngay từ bé, đội của Saki đã được ghép lại một cách có chủ ý. Những người đứng sau chính là Uỷ ban Đạo đức, tổ chức nắm quyền tối cao, quyết định vận mệnh của những đứa trẻ. Đây là thực nghiệm nhằm tìm ra, bồi dưỡng những đứa trẻ mang phẩm chất lãnh đạo, dẫn dắt thị trấn sau này. Còn những đứa trẻ mang mầm mống bất ổn sẽ bị giải quyết, ngay cả ký ức về chúng cũng sẽ bị tác động để mọi người không nhận ra được.\r\n\r\nKhi bản chất của thế giới bên ngoài tối tăm ô uế và ý nghĩa thực sự của những truyền thuyết về ác ma mà con người kinh sợ bị vạch trần, sự thật đen tối ẩn giấu trong “sức mạnh thần thánh” được ban tặng cho con người dần trở nên điên loạn.\r\n\r\nQuyển thứ hai của Từ tân thế giới, khúc ca bi thống tựa tiếng sấm rền vang đêm đông hiu quạnh.', 'A1 - 420 x 297mm', 0, 4, 10, '2021-01-12 22:58:23', '2021-01-12 22:58:23'),
(20, 'Dạy Con Làm Giàu - tập 9', 'Day-con-lam-giau_tap-9.png', 36000, 'Đây là quyển thứ 9 trong bộ sách dạy con làm giàu và là quyển sách mới nhất của Robert T.Kiyosaki trong loạt sách về tài chính và đầu tư bán chạy nhất của ông. Quyển sách không chỉ chia sẻ câu chuyện riêng tư tuyệt vời của tác giả, mà còn chỉ cho bạn cách đưa ra những chọn lựa trong cuộc sống hiện tại của bạn - những chọn lựa để giàu có.', 'A1 - 420 x 297mm', 0, 1, 1, '2021-01-12 22:59:12', '2021-01-12 22:59:12'),
(21, '\"Nghĩ Đúng, Nhắm Trúng\"', 'nghi-dung-nham-trung-phuong-thuc-hoan-my-cua-thanh-cong.jpeg', 71000, 'Đối với thế hệ trẻ nhiệt huyết và tài năng, đang ấp ủ sự nghiệp lớn lao cho riêng mình, “đi tìm thành công” có lẽ là một chủ đề chưa bao giờ cũ. Bạn sẽ nói sao với một bí quyết thành công hoàn mỹ, chưa từng khiến những ai vận dụng nó phải thất vọng? Nếu câu trả lời của bạn là “có”, thì đây chính là quyển sách dành cho bạn: \"Nghĩ đúng, nhắm trúng\" - Phương thức hoàn mỹ của thành công – tác giả William Clement.\r\n\r\nĐây là một quyển sách đã truyền tải triết lý và tâm huyết của tác giả đến các thế hệ độc giả trong suốt nửa thế kỷ qua, và đến hôm nay một lần nữa xuất hiện trên tay bạn, như một câu trả lời trực tiếp nhất cho nỗi băn khoăn vẫn khiến bạn hằng đêm thao thức.\r\n\r\nSau thành công của tác phẩm Thành công với quan điểm tư duy tích cực, một thành quả hợp tác cùng Napoleon Hill – người được xem là cha đẻ của triết lý làm giàu hiện đại, William Clement Stone đã cho ra mắt “Phương thức hoàn mỹ của thành công”, như một tuyên ngôn về thành tựu của chính cuộc đời ông. Quyển sách là tập hợp những thước phim sống động về hành trình xây dựng sự nghiệp của tác giả, từ một cậu bé bán báo bươn chải khắp các nẻo đường của thành phố Chicago, đến ông hoàng của ngành kinh doanh bảo hiểm, nắm trong tay vô số công ty và tổ chức lớn nhỏ. William Stone đã chứng minh rằng thành công không phải là đặc quyền riêng cho bất cứ ai, mà là món quà của Thượng đế dành cho tất cả mọi người, chỉ cần họ chấp nhận dấn thân tìm kiếm món quà vô giá ấy.\r\n\r\nQuyển sách không đánh đố người đọc với những triết lý cao siêu ở mức chỉ những vĩ nhân mới lĩnh hội được, mà trái lại, dẫn dắt chúng ta đi qua những câu chuyện hết sức đời thường, nhưng hàm chứa trong đó những bài học sâu sắc và vô cùng trực tiếp. Xoay quanh ba giá trị cốt lõi của thành công – Động lực, Phương pháp và Hiểu biết, người đọc sẽ tìm thấy lối đi cho chính mình. Tuy nhiên, điều cốt lõi là chúng ta phải rèn luyện phương thức thành công ấy thường xuyên, liên tục lặp đi lặp lại về viễn cảnh chúng ta mong ước trong cuộc đời, cho đến khi viễn cảnh ấy trở thành thực tại hiển hiện ngay trước mắt.', 'A1 - 420 x 297mm', 0, 4, 7, '2021-01-12 23:35:12', '2021-01-12 23:35:12'),
(22, 'Dạy Con Làm Giàu - tập 6', 'Day-con-lam-giau_tap-6.png', 73000, 'Trong những cuốn Dạy con làm giàu trước, các bạn đã được làm quen với Kim tứ đồ miêu tả bốn loại người trong thế giới tài chính. Nhóm L và T ở cột bên trái của Kim tứ đồ tượng trưng cho nhóm người làm công lĩnh lương và nhóm làm tư hay chủ kinh doanh nhỏ. Nhóm C và Đ bên phải của Kim tứ đồ tượng trưng cho chủ doanh nghiệp hay công ty và nhà đầu tư.\r\n\r\nNhững người chia sẻ các câu chuyện thành công của họ trong cuốn sách này đều muốn giành được một mục tiêu tương tự như nhau: sự tự do về tài chính. Tất cả họ đều phấn đấu để di chuyển sang cột bên phải của Kim tứ đồ.\r\n\r\nNhững câu chuyện của họ nói lên sự khác nhau giữa việc hoàn toàn phụ thuộc vào người khác để có thu nhập với việc kiểm soát cuộc sống tài chính của bản thân. Họ chia sẻ những vấn đề tài chính mà họ sợ phải đối mặt cũng như cách họ chinh phục nỗi sợ đó. Như người bố giàu khuyên bảo, họ phát triển con đường riêng thích hợp cho mình.\r\n\r\nHọ có những bước đi đạt được sự an toàn về tài chính bằng cách mua những dự án kinh doanh hay đầu tư vào bất động sản hoặc cả hai. Những người đã sở hữu những dự án kinh doanh sử dụng các bài học của Người bố giàu để giúp họ điều hành doanh nghiệp tốt hơn và theo định hướng người chủ thân thiện hơn.\r\n\r\nQua những câu chuyện thành công của những người đã đón nhận lời khuyên của Người bố giàu và đạt được sự thành công tài chính của riêng họ, bạn sẽ biết được:\r\n\r\nTại sao bạn không bao giờ là quá trẻ hay quá già để bắt đầu hành trình tìm kiếm sự an toàn và tự do về tài chính.\r\n\r\nNhững nhà đầu tư đạt được một triệu đôla đầu tiên như thế nào\r\n\r\nLàm sao để bạn có những kết quả và thành công về tài chính như họ.', 'A1 - 420 x 297mm', 0, 1, 1, '2021-01-12 23:03:05', '2021-01-12 23:03:05'),
(23, 'Dạy Con Làm Giàu - tập 8', 'Day-con-lam-giau_tap-8.png', 36000, 'Trong cuộc sống, thực tế có khá nhiều cách để bạn trở nên giàu có, mỗi cách sẽ có một cái giá khác nhau. Tuy nhiên, cái giá không phải lúc nào cũng được đo bằng tiền, mặc dù tiền bạc là phần thưởng cho việc trả giá. Để giàu có bạn sống một cách tằn tiện rồi chết đói trên đống vàng, bạn học thật giỏi và tránh mắc mọi sai lầm nhưng cuối cùng vẫn thất bại, bạn có người bạn đời giàu sụ thế mà lại sống đau khổ vì thiếu tình yêu, bạn đặt toàn bộ cuộc sống vào kết quả xổ số hiếm hoi, bạn được thừa hưởng một gia tài nhưng không đủ khôn ngoan và có kiến thức tài chính tốt… Trong số này bạn có chọn ra cho mình được một cách? Nếu như không thì vẫn còn nhiều cách tốt hơn để bạn kiếm được những đồng tiền tích cực. Vấn đề là bạn có chịu thay đổi và sẵn lòng trả giá hay không? Cuốn sách này sẽ giúp bạn lựa chọn một phương cách đúng đắn nhất để tạo ra những đồng tiền tích cực.', 'A1 - 420 x 297mm', 0, 1, 1, '2021-01-12 23:05:02', '2021-01-12 23:05:02'),
(24, 'Ai Cũng Có Ngày Tồi Tệ', 'ai-cung-co-nhung-ngay-toi-te.jpg', 81000, 'Còn gì thú vị hơn, khi bạn cầm trên tay một cuốn sách, đan xen giữa văn học, con có chất của tùy bút, của những câu chuyện kể pha màu du ký… Đó chính là cách viết hôm nay, ngẫu hứng, không quá câu nệ về thể loại, nó mang hơi hướng những trang cá nhân trên mạng xã hội của một facebooker thú vị nào đó.\r\n\r\nTuy nhiên, trên hết, Lâm Vân An có ý thức định vị đây là một tập truyện. Vì là truyện nên các nhân vật đều được khắc họa tính cách, tình tiết, số phận. Vâng, dù có đi đâu, sống ở xứ sở nào thì số phận con người vẫn là điều văn học hướng tới. Đặc biệt, trong bối cảnh những khung trời tưởng rất đỗi thênh thang, mạng một màu xanh ngăn ngắt, thì ở đó vẫn có những số phận, những thân phận…', 'A1 - 420 x 297mm', 0, 4, 5, '2021-01-12 23:06:33', '2021-01-12 23:06:33'),
(25, 'Dạy Con Làm Giàu - tập 5', 'Day-con-lam-giau_tap-5.png', 117000, 'Dạy Con Làm Giàu 5 - Để Có Sức Mạnh Về Tài Chính\r\n\r\nQuyển sách giúp các bậc cha mẹ nhận ra những thay đổi hàng ngày và có cách nhìn mới để dạy con những kiến thức về tài chính, về cuộc sống để chúng thành công và giàu có khi chúng bước vào đời.\r\n\r\nBên cạnh những kiến thức tiếp thu được ở nhà trường của con cái thì các bậc cha mẹ cần tích cực trạng bị cho chúng những kiến thức cần thiết nhưng còn khuyết để chúng khởi đầu thuận lợi về mặt tài chính, để giúp chúng không sao lãng việc học, để phát hiện và phát huy tài năng của chúng để xây dựng chúng thành những người học suốt đời…\r\n\r\nCó được như vậy, con chúng ta mới có thể thích nghi tốt với môi trường thay đổi chóng mặt của thời đại Công nghệ – Thông tin. Và quan trọng nhất là con chúng ta có thể trở thành những người giàu có bằng chính tài năng của chúng, ngay cả khi bố mẹ chúng không giàu.', 'A1 - 420 x 297mm', 0, 1, 1, '2021-01-12 23:08:02', '2021-01-12 23:08:02'),
(26, 'Dạy Con Làm Giàu - tập 7', 'Day-con-lam-giau_tap-7.png', 81000, 'Dạy Con Làm Giàu - Tập 7: Ai Đã Lấy Tiền Của Tôi là quyển sách sẽ giúp hiểu rõ được như thế nào là kiếm tiền, như thế nào để làm giàu, và trả lời câu hỏi: Làm thế nào để biến 10.000 đôla thành 10 triệu đôla trong 10 năm?\r\n\r\nDù không chỉ cho bạn chính xác phải làm gì, bởi vì mọi thứ tùy thuộc vào bạn, nhưng quyển sách này sẽ cung cấp cho bạn kiến thức và những kinh nghiệm để kiểm soát tiền bạc, tương lai tài chính của mình và còn làm ra nhiều tiền hơn nữa.\r\n\r\nGiúp bạn hiểu: Tại sao một số nhà đầu tư thu được nhiều lợi nhuận nhanh hơn những nhà đầu tư trung bình với ít nguy cơ, tiền bạc và thời gian và đưa ra nhiều chiến lược đầu tư để bạn có thể xem xét và chọn lựa.', 'A1 - 420 x 297mm', 0, 1, 1, '2021-12-18 11:05:53', '2021-12-18 11:05:53'),
(27, 'Giúp Doanh Nghiệp Tăng Trưởng', 'chu-de-giup-doanh-nghiep-tang-truong.jpg', 40000, '\"Richardson có khả năng giải thích những ý tưởng phức tạp một cách đơn giản.\r\n\r\n12 chủ đề giúp doang nghiệp tăng trưởng không là lời tư vấn sáo rỗng mà là những giải pháp rất thực tiễn với cuộc sống, đã qua thử nghiệm thành công tại chính công ty của ông.\"\r\n\r\n- Peter H. Miller, Thành viên danh dự', 'A1 - 420 x 297mm', 0, 1, 16, '2021-01-12 23:33:36', '2021-01-12 23:33:36'),
(28, '451 Độ F', '451-do-f.jpeg', 57000, 'Hãy mường tượng một thế giới nơi truyền hình thống trị và văn chương ngấp nghé trên bờ tuyệt chủng, nơi thông tin nông cạn được tung hô còn tri thức và ý tưởng thì bị ruồng rẫy, nơi tàng trữ sách là phạm pháp, ta có thể bị bắt chỉ vì tản bộ trên vỉa hè, còn nhiệm vụ của những người lính không phải cứu hỏa mà là châm mồi cho những đám cháy…\r\n\r\nKhi khắc họa cái xã hội giả tưởng ấy qua con mắt nhìn khủng hoảng niềm tin của anh lính phóng hỏa Montag, Ray Bradbury chắc không thể ngờ vào tính tiên tri khủng khiếp của cuốn sách. Xã hội chúng ta đang sống ngày nay giống với những gì Bradbury mô tả đến rùng mình: một nền văn minh lệ thuộc quá nhiều vào truyền thông, giải trí và công nghệ. Bởi lẽ đó, hơn sáu chục năm kể từ lần đầu xuất bản, 451 độ F vẫn đủ sức khiến bất kỳ ai đọc nó phải sửng sốt và choáng váng.', 'A1 - 420 x 297mm', 0, 4, 20, '2021-01-12 23:12:13', '2021-01-12 23:12:13'),
(29, '100 Bài Luyện Nghe Tiếng Anh', '100-bai-luyen-nghe-tieng-anh.png', 72000, 'Trong khi học hay sử dụng tiếng Anh trong giao tiếp, trong công việc, chắc chắn bạn đã từng có lúc do dự hay lúng túng khi đối thoại với người nước ngoài hoặc khi nghe các bộ phim bằng tiếng Anh không có phụ đề hoặc lồng tiếng Việt.\r\n\r\nCác bạn bối rối phần nhiều là do bạn nghe không nhiều tiếng Anh. Điều này thật sự là rất cần thiết, bởi nếu bạn nghe nhiều, bạn sẽ tự tin hơn khi đàm thoại với người nước ngoài, phát âm của bạn sẽ hay hơn và chuẩn xác hơn.', 'A1 - 420 x 297mm', 0, 3, 4, '2021-01-12 23:13:15', '2021-01-12 23:13:15'),
(30, '10 Ngày Tập Trung Ôn Tập Toefl iBT', '10-ngay-tap-trung-on-tap-cho-bai-thi.jpg', 95000, 'Quyển sách được viết dựa trên những phân tích triệt để các câu hỏi và nó có \" 10 ưu điểm\" sau đây mà những tài liệu khác không có.\r\n\r\n1. Truyền đạt phương pháp để hiểu rõ các loại câu hỏi khác nhau của mỗi phần.\r\n\r\n2. Ôn tập các câu hỏi chèn câu văn vào bài văn-những câu hỏi làm đâu đầu những người đã đạt đến trình độ trung cấp.\r\n\r\n3. Để nâng cao hiệu quả ôn tập, cần nâng cao độ khó bài tập bằng các câu hỏi khó\r\n\r\n4. Truyền đạt kỹ năng viết ghi chú nhanh, điều này sẽ giúp trực tiếp làm nâng cao điểm số\r\n\r\n5. Truyền đạt các dạng, cách thể hiện, cách viết ý chính để nâng cao điểm số cho các câu hỏi phần Speaking và Writing dạng Independent một cách nhanh nhất; và cách chỉnh sửa bài văn.\r\n\r\n6. Không chỉ cải thiện năng lực tiếng Anh mà vốn hiểu biết của bản thân cũng cần được nầng cao để cải thiện điểm số.\r\n\r\n7. Nâng cao vốn từ vựng thông dụng để đạt được 100 điểm\r\n\r\n8. Nâng cao vốn từ vựng chuyên môn của nhiều lĩnh vực khác nhau để đạt được 100 điểmNgành: SÁCH, Nhóm: NGOẠI NGỮ, Tên phân nhóm: TIẾNG ANH', 'A1 - 420 x 297mm', 0, 3, 4, '2021-01-12 23:44:29', '2021-01-12 23:44:29'),
(31, 'Để Có Cuộc Sống Trọn Vẹn', '10-buoc-de-co-cuoc-song-tron-ven.jpg', 121000, 'Là hai trong số 10 tựa sách thuộc tủ sách thành công của Dale Carnegie – tác giả của “Đắc nhân tâm” nổi tiếng – được Công ty sách Phương Nam lần lượt giới thiệu trong quý I/2018, Tủ sách giúp người đọc phát triển các kỹ năng cơ yếu và thiết thực, trước hết để giải quyết các vấn đề cá nhân, sau đó tăng cường khả năng cạnh tranh của mỗi người, giúp họ đạt được thành công trong cuộc sống. Từng cuốn sách đưa ra những lời khuyên cụ thể kèm theo nhiều ví dụ thực tế, đúng theo cách viết cầu thị và dễ tiếp cận của Dale Carnegie.', 'A1 - 420 x 297mm', 0, 2, 6, '2021-01-12 23:44:44', '2021-01-12 23:44:44'),
(32, '10 Bật Mí Về Sức Khỏe', '10-bat-mi-ve-suc-khoe.jpeg', 60000, 'Ai trong chúng ta cũng mong muốn được khỏe mạnh, nhưng tại sao rất ít người thật sự khỏe mạnh? Tại sao mặc cho những tiến bộ y học hiện đại, sự phát triển trong kinh doanh dược phẩm và hàng loạt các thực phẩm chức năng, những căn bệnh như ung thư, tim mạch, béo phì, hen suyễn và các chứng rối loạn lo âu vẫn không ngừng hoành hành trong các thập kỷ qua? Phải chăng ta đang tìm kiếm cách sống khỏe không đúng nơi đúng chỗ?\r\n\r\nThuốc men không phải thứ có thể đảm bảo cho bạn sức khỏe dài lâu. Ta cũng chẳng thể trông chờ vào các loại nước ép hay máy móc để được khỏe mạnh. Mỗi người chúng ta đều chịu trách nhiệm cho sức khỏe của bản thân và của con cái mình, và ta không chỉ khỏe mạnh mà còn có được sức khỏe tràn đầy. Sức Khỏe Tràn Đầy không chỉ là trạng thái không ốm đau bệnh tật – nhiều người chẳng hề mang bệnh gì trong người nhưng vẫn luôn cảm thấy mệt mỏi, bơ phờ và cạn kiệt năng lượng – mà là trạng thái hạnh phúc, tràn đầy năng lượng và sức sống cho phép ta sống trọn vẹn cuộc đời mình.\r\n\r\n10 “Bật Mí” Về Sức Khỏe chứa đựng những bí quyết trường tồn qua thời gian về Sức Khỏe Tràn Đầy. Câu chuyện kể về một chàng trai trẻ mắc phải căn bệnh nan y bắt đầu cuộc hành trình đi tìm lại sức khỏe của mình.\r\n\r\nTình cờ gặp ông lão Trung Hoa huyền bí, chàng trai được “đưa đường dẫn lối” đến 10 con người đặc biệt, mỗi người nắm một bí mật. Những bí mật này chính là 10 Quy Luật Vũ Trụ điều khiển mọi sự trong Tự Nhiên và Cuộc Sống. Ẩn chứa trong những Quy Luật này là những bí mật của Sức Khỏe Tràn Đầy.\r\n\r\n10 “Bật Mí” Về Sức Khỏe là quyển sách độc nhất vô nhị và đầy cảm hứng đã làm thay đổi cuộc đời của vô số độc giả trên khắp thế giới.\r\n\r\n10 “Bật Mí” Về Sức Khỏe đã được dịch ra hơn 30 thứ tiếng. Quyển sách này nằm trong bộ sách bán chạy toàn cầu bao gồm: 10 “Bật Mí” Về Sức Khỏe, 10 “Bật Mí” Về Tình Yêu, 10 “Bật Mí” Về Hạnh Phúc và 10 “Bật Mí” Về Giàu Sang.', 'A1 - 420 x 297mm', 0, 2, 3, '2021-01-12 23:17:42', '2021-01-12 23:17:42'),
(33, 'Tài Năng Và Mồ Hôi Nước Mắt', '1-va-99-tai-nang-va-mo-hoi-nuoc-mat.jpeg', 79000, 'Bạn tự tin mình là một người có tài và khao khát phát huy tài năng để thành công, để củng có những đóng góp xã hội được vinh danh?\r\n\r\nBạn có thấy, hầu hết các bậc thiên tài, trước khi thành danh, họ đã trải qua một quá trình nổ lực rèn luyện và tự hoàn thiện bền bỉ, không ngừng? Tài năng bẩm sinh chỉ là lợi thế khởi điểm, khiến cho bạn được chú ý.\r\n\r\nLựa chọn đúng và hành động theo lựa chọn đó sẽ tạo đà cho tài năng trong bạn phát triển toàn vẹn và đơm hoa kết trái.\r\n\r\nBằng cái nhìn xuyên suốt lịch sử và thời đại chúng ta đang sống, John C. Maxwell, chuyên gia về thuật lãnh đạo, đã đúc kết 13 lựa chọn mấu chốt mà mỗi người cần có trên con đường trở thành người \"trên cả tài năng\".\r\n\r\nNiềm tin, niềm đam mê, sự tập trung, kiên định, sự can đảm, tinh thần ham học hỏi, v.v... sẽ là những yếu tố phân biệt bạn với những người thuần túy chỉ có tài năng.\r\n\r\nBạn đã có điều kiện cần là tài năng thiên phú?', 'A1 - 420 x 297mm', 0, 2, 2, '2021-12-18 11:05:57', '2021-12-18 11:05:57'),
(35, 'aaaa', '1-va-99-tai-nang-va-mo-hoi-nuoc-mat.jpeg', 150000, 'aaaaa', 'A1 - 420 x 297mm', 10, 1, 3, '2021-12-23 08:57:02', '2021-12-23 08:57:02'),
(36, 'Truyện ma kinh dị', '3-1-may-tai-ban-2018.jpg', 20000, 'Truyện không đọc lúc nửa đêm', 'A1 - 420 x 297mm', 3, 8, 13, '2021-12-20 03:51:43', '2021-12-20 03:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

DROP TABLE IF EXISTS `tacgia`;
CREATE TABLE IF NOT EXISTS `tacgia` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenTG` varchar(255) NOT NULL,
  `Hinh` varchar(225) DEFAULT NULL,
  `GioiThieu` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`ID`, `TenTG`, `Hinh`, `GioiThieu`, `updated_at`, `created_at`) VALUES
(1, 'Robert T. Kiyosaki', 'Adam_J_Jackson.jpg', NULL, '2021-12-23 08:19:14', '2021-12-23 08:19:14'),
(2, 'John C. Maxwell', 'Andrew Matthews.jpg', NULL, '2021-12-23 08:27:29', '2021-12-23 08:27:29'),
(3, 'Adam J Jackson', 'john_maxwell.png', NULL, '2021-12-23 08:27:42', '2021-12-23 08:27:42'),
(4, 'An Nhiên', 'tacgia.jpg', NULL, '2021-12-23 08:30:43', '2021-12-23 08:30:43'),
(5, 'Lâm Vân An', 'robert_kiyosak.jpg', NULL, '2021-12-23 08:30:55', '2021-12-23 08:30:55'),
(6, 'Dale Carnegie', 'J. K. Rowling.jpg', NULL, '2021-12-23 08:31:05', '2021-12-23 08:31:05'),
(7, 'W. Clement Stone', 'W.-Clement-Stone.jpg', NULL, '2021-12-23 08:32:41', '2021-12-23 08:32:41'),
(8, 'Dương Minh Hào', 'Wang-yang-ming.jpg', NULL, '2021-12-23 08:33:45', '2021-12-23 08:33:45'),
(9, 'Nguyễn Nhật Ánh', 'nna.jpg', NULL, '2021-12-23 08:35:33', '2021-12-23 08:35:33'),
(10, 'Yusuke Kishi', 'Yusuke-Kishi-.jpg', NULL, '2021-12-23 08:36:31', '2021-12-23 08:36:31'),
(11, 'J. K. Rowling', 'jk-rowling.jpeg', NULL, '2021-12-23 08:37:36', '2021-12-23 08:37:36'),
(12, 'Nguyễn Ngọc Tư', 'nguyen-ngoc-tu.jpg', NULL, '2021-12-23 08:38:39', '2021-12-23 08:38:39'),
(13, 'Nguyễn Đức Soát', 'Nguyen Duc Soat.jpg', NULL, '2021-12-23 08:39:43', '2021-12-23 08:39:43'),
(14, 'Andrew Matthews', 'Andrew-Matthews.jpg', NULL, '2021-12-23 08:40:26', '2021-12-23 08:40:26'),
(15, 'Helen Walters', 'profile-pic-Helen-731.jpg', NULL, '2021-12-23 08:41:23', '2021-12-23 08:41:23'),
(16, 'Sheridan Simove', 'Sheridan Simove.jpg', NULL, '2021-12-23 08:42:11', '2021-12-23 08:42:11'),
(17, 'Tô Hoài', 'to hoai.jpeg', NULL, '2021-12-23 08:44:02', '2021-12-23 08:44:02'),
(18, 'Nguyễn Quang Sáng', 'images926211_10_ong_Sang_2.jpg', NULL, '2021-12-23 08:45:15', '2021-12-23 08:45:15'),
(19, 'Nguyễn Du', 'nguyendu.jpeg', NULL, '2021-12-23 08:46:44', '2021-12-23 08:46:44'),
(20, 'Ray Bradbury', 'Ray Bradbury.jpeg', NULL, '2021-12-23 08:47:24', '2021-12-23 08:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

DROP TABLE IF EXISTS `theloai`;
CREATE TABLE IF NOT EXISTS `theloai` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenTL` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`ID`, `TenTL`, `updated_at`, `created_at`) VALUES
(1, 'Kinh Tế - Kinh Doanh', '2021-01-12 21:44:07', '2021-01-12 21:44:07'),
(2, 'Tâm Lý - Kỹ Năng Sống', '2021-01-12 21:44:55', '2021-01-12 21:44:55'),
(3, 'Ngoại Ngữ', '2021-01-12 21:45:18', '2021-01-12 21:45:18'),
(4, 'Văn Học', '2021-01-12 21:45:26', '2021-01-12 21:45:26'),
(5, 'Sách Thiếu Nhi', '2021-01-12 21:46:08', '2021-01-12 21:46:08'),
(6, 'Lịch Sử', '2021-01-12 22:07:09', '2021-01-12 22:07:09'),
(8, 'Kinh Dị', '2021-12-23 07:39:13', '2021-12-23 07:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `remember_password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `quyen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_password`, `phone`, `address`, `quyen`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$Pg/Gldl01BVztqwsqt.HEuR/FXjs8wdvbB2ZMYWYPseCJS8opFlJy', '$2y$10$HyTlbTyY5jGXEngWXu9Ul.auGdBz9pS1pwbN.aGalPsaRZam17lEm', '0704477845', 'abc', 1, '2021-01-13 02:06:04', '2021-12-18 11:43:47'),
(4, 'abc', 'abc@gmail.com', '$2y$10$GEjvY62HogGJhR00.WJ67eawqtY6bAubINhPAJBEMFee/tjU9vCrW', '$2y$10$SPQVkTRNS1c8W7HNRcXNd.nm9blYT7FJwGB9DtF8486MaiatfmA/G', '0704477845', 'dwadwa', 0, '2021-12-18 11:07:37', '2021-12-18 11:07:37'),
(5, 'Trần Kim Hoàng', 'trankimhoang11052000@gmail.com', '$2y$10$C2V/nLVgf2Nfz.ASAhSf8.FH4NDx1wg1I6hetDeWu.Q0Fy.qBnhua', '$2y$10$kGHWQwyAOvNpYJFjE9p/WeYkzThHh.f/4.Iaa4jBW5rFp9HSHlx5i', '5436356657', 'HCM', 0, '2021-12-19 16:04:48', '2021-12-19 16:04:48'),
(6, 'Kim Hoàng Trần', 'kimhoang@gmail.com', '$2y$10$oAvqf7IpgMUt8faSE86aFurZuoFy991H3yJIC59l62pMhQybRFNxm', '$2y$10$n9lxTg4KFLz52hEgo9K.5urwdU3liG/a.lCoZ4.zijYwbU9h9ZLKq', '1699800145', 'hcm', 0, '2021-12-19 16:23:22', '2021-12-27 11:07:01');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`ID`) ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giaohang`
--
ALTER TABLE `giaohang`
  ADD CONSTRAINT `giaohang_ibfk_1` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`ID`) ON UPDATE CASCADE;

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`MaTG`) REFERENCES `tacgia` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`MaTL`) REFERENCES `theloai` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
