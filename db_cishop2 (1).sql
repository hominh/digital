-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2018 at 10:54 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cishop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_group_id` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `admin_group_id`) VALUES
(13, 'hominhhoang', 'e10adc3949ba59abbe56e057f20f883e', 'hominhhoang', 1),
(10, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Ho Minh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_group`
--

CREATE TABLE `admin_group` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `sort_order` tinyint(4) NOT NULL DEFAULT '0',
  `permissions` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_group`
--

INSERT INTO `admin_group` (`id`, `name`, `sort_order`, `permissions`) VALUES
(1, 'Admin', 1, 'a:14:{s:4:"tran";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:13:"product_order";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:3:"cat";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:7:"product";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:11:"admin_group";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:5:"admin";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:4:"user";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:4:"news";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:4:"info";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:7:"support";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:7:"contact";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:7:"comment";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:5:"slide";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:5:"video";a:2:{i:0;s:4:"list";i:1;s:6:"change";}}'),
(2, 'Moderator', 2, 'a:9:{s:3:"cat";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:7:"product";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:4:"news";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:4:"info";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:7:"support";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:7:"contact";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:7:"comment";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:5:"slide";a:2:{i:0;s:4:"list";i:1;s:6:"change";}s:5:"video";a:2:{i:0;s:4:"list";i:1;s:6:"change";}}');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  `display` varchar(100) NOT NULL,
  `attribute_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `value`, `display`, `attribute_id`) VALUES
(1, 'Red', 'Red', 3);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) CHARACTER SET utf8 NOT NULL,
  `count_view` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `title`, `intro`, `content`, `description`, `keyword`, `image`, `count_view`, `created_at`, `updated_at`) VALUES
(1, 'Nhà lầu siêu xe hàng mã ế sưng, đồ chơi biển đảo hút khách', 'Nhà lầu siêu xe hàng mã ế sưng, đồ chơi biển đảo hút khách', '(Dân trí) - Loạt đồ chơi trung thu biển đảo hướng về quê hương mới xuất hiện nhưng đã hút khách, các mặt hàng vàng mã “xa xỉ” không còn được nhiều người mua sắm.', '<p style="TEXT-ALIGN: left">\r\n	Theo b&aacute;c Lan, một chủ cửa h&agrave;ng ở phố H&agrave;ng M&atilde; chia sẻ: &ldquo;Kinh tế kh&oacute; khăn n&ecirc;n người bỏ tiền triệu ra mua đồ c&uacute;ng đắt tiền như nh&agrave; lầu, xe hơi, điện thoại, ti vi c&ograve;n rất &iacute;t. Mọi người chỉ lựa chọn những loại đồ c&oacute; gi&aacute; b&igrave;nh d&acirc;n như quần &aacute;o, gi&agrave;y d&eacute;p v&agrave; mũ để c&uacute;ng. Những mặt h&agrave;ng b&aacute;n chạy nhất l&agrave; tiền &acirc;m phủ, v&agrave;ng, quần &aacute;o hay gi&agrave;y d&eacute;p v&igrave; c&oacute; gi&aacute; kh&aacute; b&igrave;nh d&acirc;n&rdquo;.</p>\r\n<p style="TEXT-ALIGN: center">\r\n	<img alt="Mặt hàng đèn lồng biển đảo mới xuất hiện trong dịp Tết Trung Thu năm nay" src="http://dantri4.vcmedia.vn/Urgz3f5tKFdDA0VUUO/Image/2014/08/n1-242e1.jpg" /><br />\r\n	<span style="FONT-FAMILY: Tahoma; FONT-SIZE: 10pt">Mặt h&agrave;ng đ&egrave;n lồng biển đảo mới xuất hiện trong dịp Tết Trung Thu năm nay</span></p>\r\n<p style="TEXT-ALIGN: center">\r\n	<span style="FONT-FAMILY: Tahoma"><img alt="Các thông điệp ý nghĩa yêu quê hương, biển đảo được in lên đèn lồng" src="http://dantri4.vcmedia.vn/Urgz3f5tKFdDA0VUUO/Image/2014/08/n2-242e1.jpg" /></span><br />\r\n	<span style="FONT-FAMILY: Tahoma; FONT-SIZE: 10pt">C&aacute;c th&ocirc;ng điệp &yacute; nghĩa y&ecirc;u qu&ecirc; hương, biển đảo được in l&ecirc;n đ&egrave;n lồng</span></p>\r\n<p>\r\n	Một mặt h&agrave;ng đặc biệt của m&ugrave;a Vu Lan năm nay đ&oacute; l&agrave; loại đồ chơi &ldquo;biển đảo&rdquo;. Đ&oacute; l&agrave; những chiếc đ&egrave;n lồng được in những th&ocirc;ng điệp hướng về qu&ecirc; hương, biển đảo hết sức &yacute; nghĩa.</p>\r\n<div class="article-side-rail" id="article-side-rail">\r\n	<div class="article-video-relation">\r\n		<div class="relative">\r\n			<img alt="Mùa Vu Lan: " class="thumb" src="http://video-thumbs.vcmedia.vn///dantri/7iS0Ym1SbbOoTsWhJi6Q/2014/08/08/vangma-15e63.jpg" /><img class="ico" src="http://dantri3.vcmedia.vn/App_Themes/Default/Images/ico_video_play.png" /></div>\r\n		<p class="caption">\r\n			M&ugrave;a Vu Lan: &quot;Xe si&ecirc;u sang&quot; đỗ chật phố H&agrave;ng M&atilde;</p>\r\n	</div>\r\n</div>\r\n<p>\r\n	C&aacute;c chủ cửa h&agrave;ng tại đ&acirc;y cho biết, c&aacute;c loại mặt h&agrave;ng l&agrave;m thủ c&ocirc;ng truyền thống đ&egrave;n lồng, đầu l&acirc;n, đ&egrave;n &ocirc;ng sao vẫn được kh&aacute;ch h&agrave;ng ưa chuộng nhất. Ngo&agrave;i ra, mẫu đ&egrave;n lồng in sẵn mang th&ocirc;ng điệp hướng về biển đảo qu&ecirc; hương được nhiều bậc phụ huynh v&agrave; c&aacute;c em học sinh đặc biệt y&ecirc;u th&iacute;ch.</p>\r\n<p style="TEXT-ALIGN: center">\r\n	<img alt="Mới xuất hiện nhưng những chiếc đèn lồng này được nhiều phụ huynh và các em nhỏ lựa chọn" src="http://dantri4.vcmedia.vn/Urgz3f5tKFdDA0VUUO/Image/2014/08/n4-242e1.jpg" /><br />\r\n	<span style="FONT-FAMILY: Tahoma; FONT-SIZE: 10pt">Mới xuất hiện nhưng những chiếc đ&egrave;n lồng n&agrave;y được nhiều phụ huynh v&agrave; c&aacute;c em nhỏ lựa chọn</span><br />\r\n	&nbsp;</p>\r\n<p>\r\n	Chiếc đ&egrave;n lồng mang th&ocirc;ng điệp biển đảo được gh&eacute;p lại bằng 3 mảnh b&igrave;a kh&aacute;c nhau. Chiếc đ&egrave;n c&oacute; thể thắp s&aacute;ng v&agrave; ph&aacute;t nhạc khi được lắp pin ở tay cầm.Tuy nhi&ecirc;n, chi tiết đ&aacute;ng ch&uacute; &yacute; nhất đ&oacute; l&agrave; những th&ocirc;ng điệp hướng về biển đảo in tr&ecirc;n th&acirc;n của chiếc đ&egrave;n lồng như &ldquo;Em y&ecirc;u biển đảo qu&ecirc; hương&rdquo;, &ldquo;B&eacute; hướng về biển đảo&rdquo;, &ldquo;Em y&ecirc;u biển đảo Việt Nam&rdquo;, &ldquo;Em y&ecirc;u ch&uacute; bộ đội hải qu&acirc;n Việt Nam&rdquo;, với những h&igrave;nh ảnh chiến sĩ Hải qu&acirc;n Việt Nam s&uacute;ng kho&aacute;c tr&ecirc;n vai bảo vệ chủ quyền biển đảo Tổ quốc hay những chiếc t&agrave;u mang d&ograve;ng chữ Cảnh s&aacute;t biển Việt Nam&hellip;</p>\r\n', '', '', 'n1-242e1.jpg', 1, '2018-06-05 10:36:40', '2018-06-05 10:36:40'),
(2, 'Arsenal đồng ý bán Vermaelen cho Barcelona', 'Arsenal đồng ý bán Vermaelen cho Barcelona', '(Dân trí) - Theo những thông tin từ báo giới Anh, Arsenal đã quyết định từ chối MU, để bán trung vệ Vermarlen cho Barcelona. Mức giá của trung vệ này vào khoảng 15 triệu bảng.', '<p>\r\n	Như đ&atilde; biết, c&aacute;ch đ&acirc;y v&agrave;i ng&agrave;y, trung vệ Vermaelen đ&atilde; từ chối gia hạn hợp đồng với Arsenal. Điều đ&oacute; khiến cho CLB th&agrave;nh London t&igrave;m c&aacute;ch b&aacute;n cầu thủ n&agrave;y bằng mọi gi&aacute; để &ldquo;gỡ gạc&rdquo; ch&uacute;t &iacute;t ph&iacute; chuyển nhượng thay v&igrave; mất trắng cầu thủ n&agrave;y&nbsp;ở m&ugrave;a H&egrave; sang năm.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<span style="FONT-FAMILY: Tahoma; FONT-SIZE: 10pt"><img _fl="" align="middle" alt="Vermaelen ở rất gần Barcelona" src="http://dantri4.vcmedia.vn/uajiKupQ6reCuKKDlVlG/Image/2014/08/Vermaelen-d4361.jpg" style="MARGIN: 5px" width="450" /><br />\r\n	Vermaelen ở rất gần Barcelona</span><br />\r\n	&nbsp;</div>\r\n<p>\r\n	Trong thời gian gần đ&acirc;y, MU v&agrave; Barcelona l&agrave; hai ứng cử vi&ecirc;n s&aacute;ng gi&aacute; trong cuộc đua gi&agrave;nh chữ k&yacute; của hậu vệ người Bỉ. Cuối c&ugrave;ng, HLV Wenger đ&atilde; quyết định từ chối MU để b&aacute;n Vermarlen cho Barcelona. Trước đ&oacute; c&oacute; th&ocirc;ng tin cho rằng Wenger muốn đổi Vermaelen lấy Smalling, tuy nhi&ecirc;n Van Gaal lại từ chối phương &aacute;n n&agrave;y.</p>\r\n<p>\r\n	Trước b&aacute;o giới, HLV Wenger cho biết: &ldquo;Ch&uacute;ng t&ocirc;i đ&atilde; nhận được những lời đề nghị từ nước ngo&agrave;i v&agrave; quyết định để Vermaelen rời khỏi Premier League. Bản th&acirc;n Arsenal cũng đang ở trong thế kh&oacute; trong vụ n&agrave;y&rdquo;.</p>\r\n<p>\r\n	Theo tờ BBC, Arsenal đ&atilde; đồng &yacute; lời đề nghị trị gi&aacute; 15 triệu bảng của Barcelona. Trong thời gian tới, trung vệ người Bỉ sẽ được quyền tự do đ&agrave;m ph&aacute;n với đội b&oacute;ng xứ Catalan.</p>\r\n<p>\r\n	Nhiều khả năng thương vụ n&agrave;y sẽ ho&agrave;n tất trong thời gian tới. Arsenal cũng bắt đầu t&igrave;m người thay thế Vermaelen. L&uacute;c n&agrave;y, ưu ti&ecirc;n số 1 của HLV Wenger l&agrave; trung vệ Nastasic của Man City, người nhiều khả năng sẽ mất vị tr&iacute; nếu như Mangala gia nhập Etihad.</p>\r\n<p align="right">\r\n	<b>H.Long</b></p>\r\n', '', '', 'Vermaelen-d4361.jpg', 2, '2018-06-05 10:36:40', '2018-06-05 10:36:40'),
(3, 'Hà Nội: CSGT tìm người thân giúp cháu bé 8 tuổi đi lạc', 'Hà Nội: CSGT tìm người thân giúp cháu bé 8 tuổi đi lạc', '(Dân trí) - Theo người thân cháu Chi, trong lúc gia đình nghỉ trưa, cháu Chi mải chơi đã đi lạc từ phía phường Ngọc Lâm (quận Long Biên) sang nội thành. Trong lúc đang hoang mang tìm cháu, gia đình nhận được tin báo của lực lượng cảnh sát giao thông.', '<p>\r\n	Khoảng 15h30 ng&agrave;y 8/8, khi đang l&agrave;m nhiệm vụ tại chốt ph&iacute;a nam cầu Chương Dương (địa b&agrave;n quận Ho&agrave;n Kiếm, H&agrave; Nội), Thượng sĩ Phạm Gia Hợp v&agrave; Thượng t&aacute; L&ecirc; Đức Đo&agrave;n(Đội CSGT số 1) ph&aacute;t hiện một ch&aacute;u b&eacute; khoảng 7-8 tuổi đi bộ tr&ecirc;n khu vực cầu Chương Dương với vẻ mặt sợ sệt. Khi Thượng sĩ Hợp v&agrave; Thượng t&aacute; Đ&ograve;an tiến lại hỏi han, ch&aacute;u b&eacute; c&oacute; biểu hiện sợ sệt v&agrave; bật kh&oacute;c n&oacute;i rằng đi lạc đường.</p>\r\n<p>\r\n	Thấy ch&aacute;u b&eacute; lả đi v&igrave; mệt, Thượng sĩ Hợp đ&atilde; đưa ch&aacute;u về chốt trực, mua b&aacute;nh v&agrave; sữa để ch&aacute;u ăn đỡ đ&oacute;i v&agrave; trấn tĩnh lại. Đồng thời, Thượng sĩ Hợp th&ocirc;ng b&aacute;o tr&ecirc;n c&aacute;c phương tiện th&ocirc;ng tin đại ch&uacute;ng về đặc điểm nhận dạng của ch&aacute;u b&eacute;.</p>\r\n<p>\r\n	<img alt="Cháu Chi đoàn tụ với gia đình." src="http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/Image/2014/08/455-549e4.jpg" /><br />\r\n	Ch&aacute;u Chi đo&agrave;n tụ với gia đ&igrave;nh.</p>\r\n<p>\r\n	Sau khi trấn tĩnh lại, ch&aacute;u b&eacute; cho biết t&ecirc;n l&agrave; Vương Kim Chi (SN 2007), năm nay l&ecirc;n lớp 2 trường tiểu học &Aacute;i Mộ, quận Long Bi&ecirc;n, H&agrave; Nội. Bằng c&aacute;c biện ph&aacute;p nghiệp vụ, Thượng sĩ Hợp v&agrave; Thượng t&aacute; Đo&agrave;n đ&atilde; li&ecirc;n hệ được với c&ocirc; gi&aacute;o chủ nhiệm ch&aacute;u Chi để th&ocirc;ng b&aacute;o với gia đ&igrave;nh ch&aacute;u b&eacute; biết.</p>\r\n<p>\r\n	Gần 2 tiếng đồng hồ sau, mẹ ch&aacute;u Chi l&agrave; chị Đo&agrave;n Thị Khuyến (SN 1983, ở Ngọc L&acirc;m, Long Bi&ecirc;n, H&agrave; Nội) đ&atilde; t&igrave;m đến trụ sở Đội CSGT số 1 nhận lại con. Chị Khuyến cho cho biết, khoảng 14h c&ugrave;ng ng&agrave;y, trong l&uacute;c gia đ&igrave;nh nghỉ trưa, ch&aacute;u Chi mải chơi đ&atilde; đi lạc từ b&ecirc;n n&agrave;y cầu sang b&ecirc;n kia nội th&agrave;nh.</p>\r\n<p>\r\n	Trong l&uacute;c hoang mang kh&ocirc;ng biết t&igrave;m ch&aacute;u ở đ&acirc;u, gia đ&igrave;nh được th&ocirc;ng b&aacute;o ch&aacute;u Chi đ&atilde; được c&aacute;c chiến sĩ CSGT tận t&igrave;nh gi&uacute;p đỡ. Thay mặt gia đ&igrave;nh, chị Khuyến đ&atilde; viết thư cảm ơn c&aacute;c chiến sĩ cảnh s&aacute;t giao th&ocirc;ng.</p>\r\n<p>\r\n	<strong>Tiến Nguy&ecirc;n</strong></p>\r\n', '', '', '455-549e4.jpg', 9, '2018-06-05 10:36:40', '2018-06-05 10:36:40'),
(4, 'Mỹ tăng cường không kích Iraq', 'Mỹ tăng cường không kích Iraq', '(Dân trí) - Sau khi Tổng thống Obama phê chuẩn cho không kích các mục tiêu của nhóm phiến quân Hồi giáo IS ở miền bắc Iraq, Lầu Năm Góc đã tiến hành 3 đợt không kích.', '<p>\r\n	C&aacute;c vụ kh&ocirc;ng k&iacute;ch nhằm v&agrave;o nh&oacute;m Nh&agrave; nước Hồi gi&aacute;o (IS) ở miền bắc Iraq l&agrave; những cuộc tấn c&ocirc;ng đầu ti&ecirc;n kể từ khi Mỹ trực tiếp tham gia v&agrave;o hoạt động qu&acirc;n sự ở Iraq v&agrave; sau đ&oacute; r&uacute;t qu&acirc;n v&agrave;o cuối năm 2011.</p>\r\n<p>\r\n	Trong cuộc kh&ocirc;ng k&iacute;ch đầu ti&ecirc;n v&agrave;o ng&agrave;y thứ s&aacute;u, m&aacute;y bay kh&ocirc;ng người l&aacute;i c&ugrave;ng chiến đấu cơ hải qu&acirc;n Mỹ đ&atilde; nhắm v&agrave;o c&aacute;c mục ti&ecirc;u gần th&agrave;nh phố Irbil của người Kurd. Sau đ&oacute; họ tiến h&agrave;nh th&ecirc;m 2 đợt tấn c&ocirc;ng nữa.</p>\r\n<p>\r\n	Nh&oacute;m Hồi gi&aacute;o người Sunni IS đ&atilde; chiếm quyền kiểm so&aacute;t nhiều khu vực của Iraq v&agrave; cả Syria.</p>\r\n<p>\r\n	H&agrave;ng chục ng&agrave;n người thuộc c&aacute;c nh&oacute;m d&acirc;n tộc thiểu số đ&atilde; phải rời bỏ nh&agrave; cửa khi phiến qu&acirc;n tiến v&agrave;o.</p>\r\n<p>\r\n	Nh&oacute;m IS hay c&ograve;n được gọi l&agrave; ISIS cũng đ&atilde; chiếm đập lớn nhất Iraq.</p>\r\n<p>\r\n	Lầu Năm G&oacute;c cho biết trong đợt kh&ocirc;ng k&iacute;ch thứ hai, m&aacute;y bay kh&ocirc;ng người l&aacute;i của Mỹ đ&atilde; ph&aacute; hủy một vị tr&iacute; đặt ph&aacute;o của phiến qu&acirc;n v&agrave; ti&ecirc;u diệt một nh&oacute;m phiến qu&acirc;n.</p>\r\n<p>\r\n	Chỉ hơn một tiếng sau, chiến đấu cơ F/A-18 đ&atilde; d&ugrave;ng bom c&oacute; laser dẫn đường bắn tr&uacute;ng một đo&agrave;n 7 xe của IS.</p>\r\n<p>\r\n	Trước đ&oacute;, v&agrave;o ng&agrave;y thứ s&aacute;u, 2 quả bom đ&atilde; được thả xuống một khẩu ph&aacute;o của IS d&ugrave;ng để chống lại lực lượng đang bảo vệ Irbil, thủ phủ của v&ugrave;ng tự trị của người Kurd.</p>\r\n<p>\r\n	Ph&aacute;t ng&ocirc;n vi&ecirc;n Bộ Ngoại giao Mỹ Marie Harf cho biết mục ti&ecirc;u trước mắt của c&aacute;c cuộc kh&ocirc;ng k&iacute;ch l&agrave; &ldquo;ngăn chặn bước tiến&rdquo; của IS về Irbil.</p>\r\n<p>\r\n	&ldquo;Sau đ&oacute; về l&acirc;u d&agrave;i chung t&ocirc;i muốn phối hợp hỗ trợ th&ecirc;m thời gian v&agrave; kh&ocirc;ng gian cho c&aacute;c lực lượng của người Kurd để xốc lại lực lượng, chiến đấu với đe dọa của ch&iacute;nh họ&rdquo;.</p>\r\n<p>\r\n	B&agrave; cũng khẳng định &ldquo;kh&ocirc;ng c&oacute; giải ph&aacute;p qu&acirc;n sự l&acirc;u d&agrave;i của Mỹ ở đ&oacute;&rdquo;.</p>\r\n<p>\r\n	Mặc d&ugrave; ch&iacute;nh phủ Iraq v&agrave; V&ugrave;ng người Kurd vẫn c&ograve;n đang c&oacute; bất đồng trong những th&aacute;ng qua, nhưng Thủ tướng Nouri Maliki đ&atilde; ph&aacute;i một m&aacute;y bay chở đạn tới Irbil v&agrave; thứ s&aacute;u. Trước đ&oacute; &ocirc;ng đ&atilde; lệnh cho lực lượng kh&ocirc;ng qu&acirc;n hỗ trợ cho c&aacute;c tay s&uacute;ng người Kurd để chiến đấu chống IS.</p>\r\n<p>\r\n	<b>Trung Anh</b></p>\r\n', '', '', '1-7d48c.jpg', 0, '2018-06-05 10:36:40', '2018-06-05 10:36:40'),
(5, 'Đại biểu Quốc hội: Tướng công an có cần nhiều thế không?', 'Đại biểu Quốc hội: Tướng công an có cần nhiều thế không?', '(Dân trí) - Dự thảo Luật Công an Nhân dân sửa đổi quy định hơn 200 vị trí mang quân hàm Tướng. Đại biểu Phạm Văn Hòa (Đồng Tháp) băn khoăn liệu có cần nhiều tướng trong lực lượng công an như vậy không?', '<p><img alt="" src="/digital/public/admin/assets/plugins/kcfinder/upload/files/Northwind_ERD.png" style="height:748px; width:1213px" /></p>\r\n', 'Đại biểu Quốc hội: Tướng công an có cần nhiều thế không?', 'Đại biểu Quốc hội: Tướng công an có cần nhiều thế không?', 'okie-15414989378021830252948.jpg', 0, '2018-11-06 09:25:38', '2018-11-06 09:25:38'),
(9, 'Blog abc1', 'Blog abc1', 'Blog abc1', '<p>Blog abc1</p>\r\n', 'Blog abc1', 'Blog abc1', 'Northwind_ERD3.png', 0, '2018-11-12 10:55:06', '2018-11-12 10:55:06'),
(10, 'PHP: khác nhau trong kết hợp mảng bằng array merge và +', 'Title of brand 12', 'PHP có nhiều cách kết hợp hai mảng thành một. Có một sự khác biệt tinh tế giữa hai phương pháp, một sự khác biệt đáng biết.', '<p>dasdasd</p>\r\n', 'Hominh.xyz', 'Hominh.xyz', 'Northwind_ERD4.png', 0, '2018-11-21 09:22:16', '2018-11-21 09:22:16'),
(11, 'PHP: khác nhau trong kết hợp mảng bằng array merge và +', 'Title of brand 12', 'PHP có nhiều cách kết hợp hai mảng thành một. Có một sự khác biệt tinh tế giữa hai phương pháp, một sự khác biệt đáng biết.', '<p>dasdas</p>\r\n', 'Hominh.xyz', 'Hominh.xyz', 'Northwind_ERD5.png', 0, '2018-11-21 09:23:14', '2018-11-21 09:23:14'),
(12, 'PHP: khác nhau trong kết hợp mảng bằng array merge và +', 'Title of brand 12', 'PHP có nhiều cách kết hợp hai mảng thành một. Có một sự khác biệt tinh tế giữa hai phương pháp, một sự khác biệt đáng biết.', '<p>dasdasdas</p>\r\n', 'Hominh.xyz', 'Hominh.xyz', 'Northwind_ERD7.png', 0, '2018-11-21 09:24:18', '2018-11-21 09:24:18'),
(14, 'PHP: khác nhau trong kết hợp mảng bằng array merge và +11111', 'Title of brand 12', 'PHP có nhiều cách kết hợp hai mảng thành một. Có một sự khác biệt tinh tế giữa hai phương pháp, một sự khác biệt đáng biết.', '<p>asdasdasd</p>\r\n', 'Hominh.xyz', 'Hominh.xyz', 'Northwind_ERD9.png', 0, '2018-11-21 09:36:26', '2018-11-21 09:36:26'),
(17, 'PHP: khác nhau trong kết hợp mảng bằng array merge và +111111', '1111fsdfdsfsdf', 'PHP có nhiều cách kết hợp hai mảng thành một. Có một sự khác biệt tinh tế giữa hai phương pháp, một sự khác biệt đáng biết.', '<p>sdfsdfdsfds</p>\r\n', 'dfadfsf', 'fsdfsdfds', 'Northwind_ERD12.png', 0, '2018-11-21 09:46:50', '2018-11-21 09:46:50'),
(18, 'PHP: khác nhau trong kết hợp mảng bằng array merge và +111111', 'sdfsdfsdf', 'PHP có nhiều cách kết hợp hai mảng thành một. Có một sự khác biệt tinh tế giữa hai phương pháp, một sự khác biệt đáng biết.', '<p>sdfsdfsdf</p>\r\n', 'fdsfsdf', 'sdfdsf', 'Northwind_ERD13.png', 0, '2018-11-21 09:48:02', '2018-11-21 09:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE `blog_tag` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_tag`
--

INSERT INTO `blog_tag` (`id`, `blog_id`, `tag_id`) VALUES
(2, 16, 4),
(3, 19, 3),
(4, 19, 4),
(5, 13, 5);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `title`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'IBM', 'IBM', 'b-logo6.png', 'ibm.com', '2018-10-25 09:41:36', '2018-10-25 09:41:36'),
(2, 'Apple', 'Apple', 'b-logo21.png', 'apple.com', '2018-10-25 09:42:15', '2018-10-25 09:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_bin NOT NULL,
  `site_title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `slug`, `site_title`, `meta_desc`, `meta_key`, `parent_id`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '', '', '', '', 0, 0, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(2, 'Điện thoại', '', '', '', '', 0, 1, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(3, 'Tivi', '', '', '', '', 0, 2, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(4, ' Acer', '', '', '', '', 1, 0, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(5, ' Apple', '', '', '', '', 1, 1, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(6, 'Asus', '', '', '', '', 1, 2, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(7, 'Dell', '', '', '', '', 1, 3, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(8, 'HP', '', '', '', '', 1, 5, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(9, 'Apple', '', '', '', '', 2, 0, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(10, 'Asus', '', '', '', '', 2, 1, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(11, 'BlackBerry', '', '', '', '', 2, 3, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(12, 'HTC', '', '', '', '', 2, 4, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(13, 'AKAI', '', '', '', '', 3, 0, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(14, 'JVC', '', '', '', '', 3, 1, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(15, 'LG', '', '', '', '', 3, 2, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(16, 'Panasonic', '', '', '', '', 3, 3, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(17, 'Samsung', '', '', '', '', 3, 5, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(18, 'Toshiba', '', '', '', '', 3, 6, '2018-06-05 10:32:33', '2018-06-05 10:32:33'),
(24, 'Smart watch', '', 'Smart watch title', 'Smart watch description', 'Smart watch keyword', 0, 100, '2018-07-11 10:11:27', '2018-07-11 10:11:27'),
(25, 'Smart watch1Edit', '', 'Smart watch title1Edit', 'Smart watch description1Edit', 'Smart watch keyword12', 2, 127, '2018-07-11 11:16:39', '2018-07-11 11:16:39'),
(26, 'Smart watch2', '', 'Smart watch title2', 'Smart watch description2', 'Smart watch keyword2', 24, 127, '2018-07-11 10:13:31', '2018-07-11 10:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_product_decimal`
--

CREATE TABLE `catalog_product_decimal` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `value` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_product_int`
--

CREATE TABLE `catalog_product_int` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_product_link`
--

CREATE TABLE `catalog_product_link` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `linked_product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_product_text`
--

CREATE TABLE `catalog_product_text` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_product_varchar`
--

CREATE TABLE `catalog_product_varchar` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `parent_id` int(255) NOT NULL,
  `user_name` text COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `count_like` int(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `parent_id`, `user_name`, `user_email`, `user_id`, `user_ip`, `content`, `created`, `count_like`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 0, 'Hoang van tuyen', 'hoangvantuyencnt@gmail.com', 0, '', 'San pham noi con khong admin?                    ', 1408798677, 10, 1, '2018-06-05 10:33:24', '2018-06-05 10:33:24'),
(2, 7, 1, 'Vu van Anh', 'anh@gmail.com', 0, '', 'San pham nay van con hang', 1408799662, 3, 1, '2018-06-05 10:33:24', '2018-06-05 10:33:24'),
(3, 7, 0, 'abc', 'hoang@gmail.com', 0, '', 'Test comment             ', 1408800324, 8, 1, '2018-06-05 10:33:24', '2018-06-05 10:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keyword` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `facebook_address` varchar(100) NOT NULL,
  `twitter_address` varchar(100) NOT NULL,
  `youtube_address` varchar(100) NOT NULL,
  `linkedin_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `logo`, `title`, `description`, `keyword`, `address`, `phone`, `email`, `facebook_address`, `twitter_address`, `youtube_address`, `linkedin_address`) VALUES
(1, '', 'Title for site', 'Description for site', 'Keyword for site', 'Address for site', '0906061590', 'minhhh12@gmail.com', 'facebook.com/hominh.1', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `configtype`
--

CREATE TABLE `configtype` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configtype`
--

INSERT INTO `configtype` (`id`, `name`) VALUES
(1, 'General'),
(2, 'Notifications'),
(3, 'Website'),
(4, 'Payment providers'),
(5, 'Shipping'),
(6, 'Localization'),
(7, 'Account'),
(8, 'Legal');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(128) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_static`
--

CREATE TABLE `content_static` (
  `id` int(11) NOT NULL,
  `key` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `content` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `content_static`
--

INSERT INTO `content_static` (`id`, `key`, `content`) VALUES
(3, 'footer', '<p class="bold">\r\n &copy;2013 -2014 Bản quyền thuộc về&nbsp; <strong>C&ocirc;ng ty TNHH Tuấn Thoa media &ndash; Đại l&yacute; VTC Digital</strong></p>\r\n<p>\r\n Lĩnh vực hoạt động của c&ocirc;ng ty: Điện &amp; điện tử , b&aacute;n lẻ &amp; b&aacute;n bu&ocirc;n</p>\r\n<p>\r\n <strong>Cơ sở 1:</strong>: Cẩm La, X&atilde; Thanh Sơn, Huyện Kiến Thụy, Th&agrave;nh Phố Hải Ph&ograve;ng - DT: 0313881505</p>\r\n<p>\r\n <strong>Cơ sở 2:</strong>: Cẩm Xu&acirc;n, N&uacute;i Đối, Huyện Kiến Thụy, Th&agrave;nh Phố Hải Ph&ograve;ng - DT: 0313812682</p>\r\n'),
(18, 'shipping', '<p>\r\n Chi ph&iacute; vận chuyển của Tuấn Thoa Media</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `eav_attribute`
--

CREATE TABLE `eav_attribute` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `is_required` tinyint(5) DEFAULT '0',
  `is_unique` tinyint(5) DEFAULT '0',
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eav_attribute`
--

INSERT INTO `eav_attribute` (`id`, `code`, `label`, `type`, `is_required`, `is_unique`, `note`) VALUES
(1, 'name', 'Name', '1', 1, 0, 'Test attribute'),
(3, 'Color', 'Color', '0', 1, 0, 'Color attribute');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `title`, `content`, `meta_desc`, `meta_key`, `created`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu', '<p>\r\n	Giới thiệu</p>\r\n', '', '', 1409044792, '2018-06-05 10:35:11', '2018-06-05 10:35:11'),
(2, 'Hướng dẫn mua hàng', '<p>\r\n	Hướng dẫn mua h&agrave;ng</p>\r\n', '', '', 1409044950, '2018-06-05 10:35:11', '2018-06-05 10:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `logo_type` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `maker`
--

CREATE TABLE `maker` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `site_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(255) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `transaction_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `data` text COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`transaction_id`, `id`, `product_id`, `qty`, `amount`, `data`, `status`, `created_at`, `updated_at`) VALUES
(7, 6, 2, 1, '4000000.0000', '', 1, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(8, 7, 2, 1, '4000000.0000', '', 0, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(9, 8, 8, 1, '10000000.0000', '', 0, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(10, 9, 8, 1, '10000000.0000', '', 0, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(11, 10, 8, 1, '10000000.0000', '', 2, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(12, 11, 8, 1, '10000000.0000', '', 0, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(13, 12, 8, 2, '20000000.0000', '', 0, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(14, 13, 8, 1, '10000000.0000', '', 1, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(15, 14, 3, 1, '5000000.0000', '', 0, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(16, 15, 3, 1, '5000000.0000', '', 0, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(17, 16, 3, 1, '5000000.0000', '', 0, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(18, 17, 3, 1, '5000000.0000', '', 0, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(19, 18, 3, 1, '5000000.0000', '', 0, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(20, 19, 3, 1, '5000000.0000', '', 0, '2018-06-05 10:40:09', '2018-06-05 10:40:09'),
(21, 20, 8, 1, '10000000.0000', '', 0, '2018-06-05 10:40:09', '2018-06-05 10:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'simple',
  `sku` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `maker_id` int(255) NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `image` varchar(50) CHARACTER SET utf8 NOT NULL,
  `image_list` text COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `keyword` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `warranty` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(255) NOT NULL,
  `buyed` int(255) NOT NULL,
  `rate_total` int(255) NOT NULL,
  `rate_count` int(255) NOT NULL,
  `gifts` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `feature` enum('0','1') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catalog_id`, `name`, `slug`, `product_type`, `sku`, `maker_id`, `price`, `content`, `discount`, `image`, `image_list`, `created`, `view`, `keyword`, `title`, `warranty`, `total`, `buyed`, `rate_total`, `rate_count`, `gifts`, `video`, `description`, `feature`, `created_at`, `updated_at`) VALUES
(2, 15, 'Tivi LG 4000', '', 'simple', '', 0, '4000000.0000', 'Bài viết cho sản phẩm này đang được cập nhật ...', 200000, 'product2.jpg', '', 0, 4, '', '', '12 tháng', 0, 0, 4, 1, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', '2018-06-05 10:40:59', '2018-06-05 10:40:59'),
(3, 13, 'Tivi Akai', '', 'simple', '', 0, '5000000.0000', 'Bài viết cho sản phẩm này đang được cập nhật ...', 0, 'product1.jpg', '', 0, 8, '', '', '12 tháng', 0, 0, 4, 1, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', '2018-06-05 10:40:59', '2018-06-05 10:40:59'),
(4, 16, 'Tivi Panasonic', '', 'simple', '', 0, '6000000.0000', 'Bài viết cho sản phẩm này đang được cập nhật ...', 0, 'product3.jpg', '', 0, 4, '', '', '12 tháng', 0, 0, 12, 3, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', '2018-06-05 10:40:59', '2018-06-05 10:40:59'),
(5, 17, 'Tivi Samsung', '', 'simple', '', 0, '5500000.0000', 'Bài viết cho sản phẩm này đang được cập nhật ...', 0, 'product4.jpg', '', 0, 1, '', '', '12 tháng', 0, 0, 0, 0, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', '2018-06-05 10:40:59', '2018-06-05 10:40:59'),
(6, 15, 'Tivi LG 5000', '', 'simple', '', 0, '5000000.0000', 'Bài viết cho sản phẩm này đang được cập nhật ...', 0, 'product5.jpg', '', 0, 1, '', '', '12 tháng', 0, 0, 0, 0, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', '2018-06-05 10:40:59', '2018-06-05 10:40:59'),
(7, 18, 'Tivi Toshiba', '', 'simple', '', 0, '6200000.0000', 'Bài viết cho sản phẩm này đang được cập nhật ...', 400000, 'product6.jpg', '', 0, 74, '', '', '12 tháng', 0, 0, 7, 2, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', '2018-06-05 10:40:59', '2018-06-05 10:40:59'),
(8, 14, 'Tivi JVC 500', '', 'simple', '', 0, '10000000.0000', 'Bài viết cho sản phẩm này đang được cập nhật ...', 500000, 'product7.jpg', '', 0, 112, '', '', '12 tháng', 0, 0, 17, 5, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', '2018-06-05 10:40:59', '2018-06-05 10:40:59'),
(9, 15, 'Tivi LG 520', '', 'simple', '', 0, '5400000.0000', '<p>\r\n	B&agrave;i viết cho sản phẩm n&agrave;y đang được cập nhật ...</p>\r\n', 0, 'product13.jpg', 'a:0:{}', 0, 19, '', '', '12 tháng', 0, 0, 4, 1, '0', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', '2018-06-05 10:40:59', '2018-06-05 10:40:59'),
(16, 1, 'Test name product', '', 'simple', '', 1, '100000.0000', 'Test Content', 10000, '', '[]', 1, 0, 'Test keyword', 'Test title', '2 years', 1, 0, 0, 0, 'No gift', 'video', 'Test description', '0', '2018-08-16 03:05:01', '2018-08-16 03:05:01'),
(17, 1, 'Test name product', '', 'simple', '', 1, '100000.0000', 'Content', 10000, '', '[]', 1, 0, 'Test keyword', 'Test title', '2 years', 1, 0, 0, 0, 'No gift', 'video', 'Test description', '0', '2018-08-16 03:08:06', '2018-08-16 03:08:06'),
(18, 1, 'Test name product111', '', 'simple', '', 1, '100000.0000', 'Content', 10000, '', '[]', 1, 0, 'Test keyword', 'Test title', '2 years', 1, 0, 0, 0, 'No gift', 'video', 'Test description', '0', '2018-08-16 03:10:38', '2018-08-16 03:10:38'),
(19, 1, 'Test name product111', '', 'simple', '', 1, '100000.0000', '', 10000, '', '[]', 1, 0, '', '', '2 years', 1, 0, 0, 0, 'No gift', 'video', '', '0', '2018-08-16 03:11:50', '2018-08-16 03:11:50'),
(20, 12, 'Test name productedit1111', '', 'simple', '', 1, '200000.0000', 'Contentedit', 20000, '_97166445_mediaitem9716644411.jpg', '["product2.jpg","product3.jpg"]', 1, 0, 'Test keywordedit', 'Test titleedit', '2 years4', 1, 0, 0, 0, 'No giftedit', 'video', 'Test descriptionedit', '0', '2018-08-20 10:52:22', '2018-08-20 10:52:22'),
(21, 5, 'Test name productadasdasdas', '', 'simple', '', 1, '100000.0000', 'Test keyword', 10000, '_97166445_mediaitem971664445.jpg', '[]', 1, 0, 'Test keyword', 'Test keyword', '2 years', 1, 0, 0, 0, 'No gift', 'video', 'Test keyword', '0', '2018-08-20 10:30:26', '2018-08-20 10:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `image`, `link`, `title1`, `title2`, `title3`, `sort_order`, `created_at`, `updated_at`) VALUES
(2, 'Test slide 1', 'slide-img1.jpg', 'dantri.com.vn', 'NOW START AT $199!', 'BIG SALE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu.', 10, '2018-10-15 09:50:58', '2018-10-15 09:50:58'),
(3, 'Test slide 2', 'slide-img22.jpg', 'dantri.com.vn', 'NOW START AT $199!', 'BIG SALE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu.', 10, '2018-10-21 07:06:30', '2018-10-21 07:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `yahoo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `name`, `yahoo`, `gmail`, `skype`, `phone`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Hoang van tuyen', 'tuyenht90', 'hoangvantuyencnt@gmail.com', 'tuyencnt90', '01686039488', 1, '2018-06-05 10:41:54', '2018-06-05 10:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `value` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', '2018-11-21 09:36:26', '2018-11-21 09:36:26'),
(2, 'PHP', '2018-11-21 09:36:26', '2018-11-21 09:36:26'),
(3, 'Laravel1', '2018-11-21 09:37:08', '2018-11-21 09:37:08'),
(4, 'PHP1', '2018-11-21 09:37:08', '2018-11-21 09:37:08'),
(5, 'Java', '2018-11-21 10:39:04', '2018-11-21 10:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `payment` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin NOT NULL,
  `security` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `type`, `status`, `user_id`, `user_name`, `user_email`, `user_phone`, `amount`, `payment`, `payment_info`, `message`, `security`, `created`, `created_at`, `updated_at`) VALUES
(7, 0, 1, 15, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '4000000.0000', 'nganluong', '', '', '', 1405548000, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(8, 0, 0, 15, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '4000000.0000', 'nganluong', '', '', '', 1407917785, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(9, 0, 0, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '10000000.0000', 'nganluong', '', '111', '', 1407918071, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(10, 0, 0, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '10000000.0000', 'nganluong', '', '111111', '', 1407918235, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(11, 0, 2, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '111111', '10000000.0000', 'nganluong', '', '111', '', 1407918299, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(12, 0, 1, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '7667676', '10000000.0000', 'nganluong', '', '', '', 1407923211, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(13, 0, 1, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '11', '20000000.0000', 'nganluong', '', '11', '', 1407926712, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(14, 0, 1, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '10000000.0000', 'nganluong', '', '', '', 1407981011, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(15, 0, 0, 19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '5000000.0000', 'baokim', '', '', '', 1408099561, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(16, 0, 0, 19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '5000000.0000', 'baokim', '', '', '', 1408099692, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(17, 0, 0, 19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '5000000.0000', 'baokim', '', '', '', 1408099749, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(18, 0, 0, 19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '5000000.0000', 'baokim', '', '', '', 1408099776, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(19, 0, 0, 19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '5000000.0000', 'baokim', '', '', '', 1408099813, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(20, 0, 0, 19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '5000000.0000', 'baokim', '', '', '', 1408099856, '2018-06-05 10:42:27', '2018-06-05 10:42:27'),
(21, 0, 0, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '10000000.0000', 'dathang', '', '', '', 1408159002, '2018-06-05 10:42:27', '2018-06-05 10:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `created`) VALUES
(16, 'Hoàng văn Tuyền', 'tuyenht90@yahoo.com', '01686039488', '111111', '96e79218965eb72c92a549dd5a330112', 1405589118),
(19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '111', '96e79218965eb72c92a549dd5a330112', 0);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(255) NOT NULL,
  `count_view` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `feature` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `view` int(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `count_view`, `name`, `images`, `intro`, `link`, `feature`, `created`, `view`, `created_at`, `updated_at`) VALUES
(10, 0, 'Chuyện Tình Trên Facebook - Hồ Việt Trung [Official]', '1386147113843_video.jpg', '', 'http://www.youtube.com/watch?v=3ZlLyU2L4P0', 1386146497, 2013, 4, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(8, 0, 'Chỉ còn trong mơ & Phải không em', '1386147092891_video.jpg', '', 'http://www.youtube.com/watch?v=RfNJ43HBzOM', 1386146505, 2013, 6, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(7, 0, '[HD] Anh Xin Lỗi - Minh Vương M4U', '1386147058495_video.jpg', '', 'http://www.youtube.com/watch?v=OCZ4D9qT8lI', 1386146502, 2013, 17, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(16, 0, 'Nhốt Em Vào Tim - Hồ Việt Trung [Official]', '1386147135763_video.jpg', '', 'http://www.youtube.com/watch?v=fkDSnN_I_Ig', 0, 1386147135, 0, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(17, 0, 'Chỉ Yêu Mình Em - Châu Khải Phong [Official]', '1386147154302_video.jpg', '', 'http://www.youtube.com/watch?v=l2MydtlKra8', 0, 1386147154, 4, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(18, 0, 'Số Nghèo - Châu Khải Phong [Official]', '138614718279_video.jpg', '', 'http://www.youtube.com/watch?v=LJRvv8U6Dos', 1386147576, 1386147182, 1, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(19, 0, 'Trò Chơi Đắng Cay - Châu Khải Phong [Official]', '138614721063_video.jpg', '', 'http://www.youtube.com/watch?v=3J8d8-YgOlU', 1386147575, 1386147210, 0, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(20, 0, 'Sầu Tím Thiệp Hồng - Quang Lê & Lệ Quyên ( Liveshow Quang Lê )', '1386147271236_video.jpg', '', 'http://www.youtube.com/watch?v=Kd5OrV4Y_bs', 0, 1386147271, 0, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(21, 0, 'Gõ cửa trái tim Quang Lê - Mai Thiên Vân', '1386147292776_video.jpg', '', 'http://www.youtube.com/watch?v=9oVxDQsgXIQ', 1386147577, 1386147292, 0, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(22, 0, 'Cô Hàng Xóm - Quang Lê', '1386147310490_video.jpg', '', 'http://www.youtube.com/watch?v=nA9ub4zlel8', 0, 1386147310, 0, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(23, 0, 'Lam Truong - Mai Mai', '1386147353743_video.jpg', '', 'http://www.youtube.com/watch?v=o1igATj9lMw', 0, 1386147353, 0, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(24, 0, 'Lỡ Yêu Em Rồi - Bằng Kiều', '1386147364632_video.jpg', '', 'http://www.youtube.com/watch?v=HYi-5dM_c34', 0, 1386147364, 0, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(25, 0, 'Bản Tình Cuối - Bằng Kiều', '1386147389790_video.jpg', '', 'http://www.youtube.com/watch?v=pNr7jEQ8LT8', 0, 1386147389, 2, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(26, 1, 'Phút cuối - Bằng Kiều', '1386150063515_video.jpg', '', 'http://www.youtube.com/watch?v=sA_gM6_eqXU', 0, 1386150063, 0, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(27, 0, 'Giấc Mơ (Live) - Bùi Anh Tuấn ft Yanbi', '1386150103768_video.jpg', '', 'http://www.youtube.com/watch?v=XLr463dUNgQ', 0, 1386150103, 0, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(28, 4, 'Anh Nhớ Em - Tuấn Hưng', '1386150121482_video.jpg', '', 'http://www.youtube.com/watch?v=ewNQtt1RiSk', 0, 1386150121, 0, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(29, 0, 'LE QUYEN & TUAN HUNG - Nhu Giac Chiem Bao', '1386150141608_video.jpg', '', 'http://www.youtube.com/watch?v=DaMARvh0kms', 0, 1386150141, 0, '2018-06-05 10:42:56', '2018-06-05 10:42:56'),
(30, 10, 'Dĩ Vãng Cuộc Tình - Duy Mạnh ft Tuấn Hưng', '140905101897_video.jpg', '', 'http://www.youtube.com/watch?v=g8I-LoBIFgQ', 0, 1409051018, 0, '2018-06-05 10:42:56', '2018-06-05 10:42:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_group`
--
ALTER TABLE `admin_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configtype`
--
ALTER TABLE `configtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_static`
--
ALTER TABLE `content_static`
  ADD PRIMARY KEY (`id`,`key`);

--
-- Indexes for table `eav_attribute`
--
ALTER TABLE `eav_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `info` ADD FULLTEXT KEY `title` (`title`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `products` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `admin_group`
--
ALTER TABLE `admin_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `configtype`
--
ALTER TABLE `configtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `content_static`
--
ALTER TABLE `content_static`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `eav_attribute`
--
ALTER TABLE `eav_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `maker`
--
ALTER TABLE `maker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
