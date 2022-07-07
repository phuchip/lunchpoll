-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 03:50 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lunch`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text,
  `description` text,
  `status` int(11) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `image`, `description`, `status`, `created`, `updated`) VALUES
(1, 'Cơm', NULL, '<div style=\"text-align: justify\"><strong>(HNM) - Các quán cơm ở Hà Nội thường gọi theo tên chủ quán hay những đặc điểm khác thường của họ, ví dụ như quán cơm Nhiêu Sáu (ở Cửa Nam), quán cơm Bà hiếng (mắt bị hiếng - phố Hàng Buồm) hay Bà lùn ở phố Cầu Gỗ; sang nửa đầu thế kỷ XX, gọi chung là cơm đầu ghế, chỉ quán cơm dành cho người lao động. Còn cơm bình dân là cách gọi theo kiểu miền Nam. Cơm bụi trở thành tên gọi chỉ các quán cơm bình dân từ những năm 1990.<br>\r\n<br>\r\nTừ Mơ Cơm đến phố Hàng Cơm</strong><br>\r\n<br>\r\nTheo sử sách, vùng phía nam kinh thành Thăng Long xưa (bao gồm Bạch Mai, Mai Động, Hoàng Mai, Tương Mai ngày nay) là vùng trồng mơ, vì thế người ta gọi là Kẻ Mơ. Nhưng mỗi một làng trong Kẻ Mơ lại có một nghề riêng. Hoàng Mai chuyên nấu rượu nên có tên Nôm là Mơ Rượu. Rượu ở đây nổi tiếng không chỉ Thăng Long mà còn lan ra khắp thiên hạ, thế nên có câu “Rượu Mơ, thơ làng Lủ” (tên chữ là Kim Lũ, nay thuộc phường Đại Kim, quận Hoàng Mai. Làng Lủ xưa có nhiều người tài danh về thơ phú, trong đó phải kể đến Nguyễn Siêu) hay “Rượu Mơ, cờ Mộ Trạch” (làng có nhiều người đánh cờ giỏi, nay thuộc huyện Bình Giang, Hải Dương). Mai Động có nghề làm đậu phụ nên gọi là Mơ Đậu, Bạch Mai có nghề bán thịt nên gọi là Mơ Thịt, còn Tương Mai bán xôi lúa và bán cơm nhưng thiên hạ không gọi là Mơ Xôi mà lại gọi là Mơ Cơm. Có thể nghề bán cơm có trước hoặc các quán cơm gây chú ý hơn. <br>\r\n<br>\r\n&nbsp;</div>\r\n<div style=\"text-align: justify\"><br>\r\nKhông thấy sử sách nào chép nghề bán cơm ở Tương Mai có từ khi nào, chỉ biết là có từ thời Lê. Từ thời Lê đến thời Nguyễn, làng Tương Mai nằm sát đường thiên lý, con đường huyết mạch từ thành Thăng Long vào Nam. Từ trong thành đi về phía nam hay từ phía nam đi vào thành thì quan, quân, hay dân muốn “lai kinh” đều nghỉ chân và ăn uống ở Tương Mai trước khi đi tiếp. Quan mà đi việc công thì kéo theo bầu đoàn gồm lính, phu khiêng cáng, kẻ hầu hạ. Có thể Tương Mai trở thành điểm dừng để nghỉ ngơi, ăn uống vì làng Hoàng Mai bên cạnh là một trong 54 trạm dịch (đổi ngựa và phu để chuyển công văn của triều đình) từ thời Lê, đến thời Nguyễn gọi là Hà Mai (các trạm dịch thời Minh Mạng được đặt tên bằng cách lấy chữ đầu tên tỉnh và chữ cuối tên làng). Cơm là đồ ăn chính của người Việt Nam nói riêng và dân trong khu vực trồng lúa nước nói chung. Tục ngữ xưa có câu: “Cơm tẻ, mẹ ruột” hay “Cơm ba bát, áo ba manh / Đói không xanh, rét không chết”. Thế nhưng dân quê đi đâu thường mang theo cơm nắm và chút muối vừng, ăn xong uống bát nước vối nóng miễn phí trước cửa các nhà dân khắp Thăng Long là ổn thì tại sao họ lại phải ăn cơm quán ở Tương Mai? Nhà văn hóa Bùi Hạnh Cẩn giải thích: “Vào mùa đông, cơm nắm có thể để vài ba ngày không thiu nhưng mùa hè thì không thể để lâu được. Còn quan đi làm việc công được quyền chi tiêu thì chẳng tội gì họ mang cơm nắm”. <br>\r\n<br>\r\nNhững gì còn sót lại trong dân gian về Mơ Cơm là câu: “Cơm kia em nấu nồi mười / Cá này niêu đất, rau tươi sanh đồng”. Câu ca dao không chỉ giới thiệu mà còn cho thấy các dụng cụ nấu ăn của họ gồm nồi đồng (nồi ba mươi là to nhất rồi đến nồi hai mươi và nồi mười, ngoài ra còn có loại nhỏ hơn; nồi đồng các cỡ vẫn còn dùng ở nông thôn miền Bắc cho đến những năm 1960), niêu đất và sanh (có thể dùng để rán nhưng cũng có thể dùng để nấu canh). Mơ Cơm nấu gạo tám làng Định Công (nay là phường Định Công, quận Hoàng Mai), món đậu nướng lấy ở Mơ Đậu, cá Thịnh Liệt, rau muống làng Kim Liên, nghĩa là toàn sản vật trong vùng. Khi Pháp chiếm thành Hà Nội năm 1882 và sau đó Hà Nội thành nhượng địa, sống theo luật của nước Pháp, xã hội có rất nhiều thay đổi. Chính quyền xây cất trung tâm hành chính. Ở khu phố cổ, họ cho làm cống thoát nước, xây vỉa hè, họ quy hoạch và xây khu phố mới ở phía nam Hồ Gươm nên cần nhiều lao động. Nhận thấy đó là cơ hội kiếm tiền nên các bà, các cô ở Mơ Cơm vào phố mở quán và một trong những quán cơm đã đi vào lịch sử Việt Nam là quán cơm Nhiêu Sáu (tên bà là Nguyễn Thị Ba) ở số 20 phố Cửa Nam. Sở dĩ quán có tên Nhiêu Sáu vì chồng bà Ba là Đỗ Văn Sáu, ở làng Tương Mai ông có chức Nhiêu nên gọi là Nhiêu Sáu. Quán cơm Nhiêu Sáu chủ yếu bán cho phu xe, đám hát xẩm, người khiêng vác thuê trong chợ Cửa Nam. Nhiêu Sáu lúc nào cũng đông khách vì bán rẻ, 1 xu là được bữa no (thời kỳ này, 1 cân gạo giá 6 xu), thêm vài trinh nữa là có rượu uống. Lẫn trong khách ăn có cả các nghĩa hưng, họ gặp nhau để bàn bạc một chuyện vô cùng hệ trọng đó là đầu độc lính Pháp đóng trong thành. Không chỉ các nghĩa hưng, thi thoảng còn có chỉ huy của phong trào Yên Thế như Đội Hổ, Chánh Tỉnh và một số nhà nho, thầy dạy tiếng Pháp được các binh lính Việt tín nhiệm như ông Đỗ Văn Đàm, ông Quang, ông Đông Châu... Nhưng mưu lớn bị bại lộ, cuốn “Hà Nội nửa đầu thế kỷ XX” ghi lại: “Có một nghĩa hội là dân công giáo không giữ được bí mật đến cùng đã đến xưng tội với cố Ân ở Nhà thờ Lớn. Ngay sau khi biết chuyện, cố Ân báo cho quan Pháp nên họ đã kịp thời đối phó”. Bà Nhiêu Sáu bị bắt nhưng chồng bà kịp trốn thoát xuống Hải Phòng. Bị tra tấn dã man nhưng bà không khai ai nên mật thám Pháp không thể bắt bớ thêm. Bất lực trước dũng khí của một người phụ nữ kiên gan, mật thám Pháp đã đóng đinh nhọn vào thùng gỗ, nhét bà vào đó và lăn từ phố Cửa Nam về ngục Hỏa Lò. Cuối cùng, bà Nhiêu Sáu đã chết vì bị tra tấn và bệnh tật trong ngục. Một người làng Tương Mai bán quán gần nhà giam đã mua chuộc cai ngục cho tráo xác, đưa thi hài bà về quê. Ngay trong đêm, con cháu và hàng xóm đã âm thầm nuốt nước mắt tiếc thương, tiễn đưa người phụ nữ dũng cảm yên nghỉ trong một nấm mồ đất không bia chí ở cánh đồng của làng.<br>\r\n<br>\r\nThăng Long đâu chỉ có Mơ Cơm mà còn có cả phường bán cơm bên hông Văn Miếu - Quốc Tử Giám. Cuối thời Lê, Văn Miếu - Quốc Tử Giám vẫn chiếm vị trí quan trọng trong nền giáo dục Nho học Việt Nam, không chỉ đông đúc khi diễn ra các kỳ thi mà ngày thường, học trò các trường ở Thăng Long cũng hay đến đây học và chơi. Rồi Nho sinh các tỉnh về khấn bái mong muốn đỗ đạt, nghe bình văn. Các quán cơm đã ra đời tại khu vực này. Thời vua Tự Đức, đoạn từ ngã ba phố Nguyễn Khuyến hiện nay đến ngã ba Quốc Tử Giám vì có nhiều quán cơm nên có tên là phố Hàng Cơm. Tuy nhiên, năm 1908, chính quyền đã biến Văn Miếu - Quốc Tử Giám thành nơi chứa những người bị bệnh dịch hạch nên không ai dám đến đây và từ đó, phố Hàng Cơm cũng mất luôn.<br>\r\n<br>\r\n<strong>Cơm đầu ghế</strong><br>\r\n<br>\r\nTheo gia phả của dòng họ Nguyễn Đình - dòng họ đã sống ở phường Diên Hưng (khu vực Hàng Ngang ngày nay) từ thế kỷ XVIII đến đầu thế kỷ XX - cuối thế kỷ XIX, khi Hà Nội vẫn là tỉnh tổ chức các kỳ thi Hương, sỹ tử hằng ngày ăn cơm hàng phố Hàng Buồm, tối đói thì ăn thêm cháo tim gan. Còn theo cuốn “Hà Nội nửa đầu thế kỷ XX”, sỹ tử các tỉnh về trọ ở phố Cầu Gỗ, để ra đền Ngọc Sơn (đền thờ Văn Xương) khấn vái cho tiện và hằng ngày họ ăn cơm hàng ở phố này. Sang đầu thế kỷ XX, chữ quốc ngữ dần chiếm ưu thế trong xã hội, học sinh các trường tiểu học do chính quyền mở ra bắt buộc phải học tiếng Pháp nên Hà Nội ít dần người học chữ Nho. Phố Hàng Cơm vắng khách, nhiều chủ vào khu vực phố cổ mở hàng. <br>\r\n<br>\r\nCùng với quán cháo lòng, phở, bún... Hà Nội xuất hiện nhiều quán cơm đầu ghế bán cho lao động nhập cư. Vì sao lại gọi là cơm đầu ghế? Nhà văn đã ở tuổi “thất thập cổ lai hy” Nguyễn Xuân Khánh giải thích: Các quán bình dân xưa đều dùng ghế băng, phu kéo xe tay, dân bán hàng rong, kẻ chờ việc... ngồi ăn ở đầu ghế vì ngồi ở chỗ đó dễ quan sát ai có nhu cầu đi xe, người tìm thợ. Nếu ai có nhu cầu, lập tức họ dễ dàng đứng lên lao ra hỏi han. Gọi cơm đầu ghế là vì thế, ăn cũng không yên. Cơm đầu ghế dành cho người nghèo nên chủ quán chỉ nấu loại gạo rẻ tiền nhưng có quán chuyên nấu bằng tấm (xưa tấm chỉ để nấu cám lợn, không ai ăn vì tấm rẻ hơn gạo).<br>\r\n<br>\r\n<em>(Còn nữa)</em></div>', 1, '2022-06-09 16:14:49', '2022-06-09 16:14:52'),
(2, 'Bún riêu', NULL, NULL, 1, '2022-06-09 16:15:40', '2022-06-09 16:15:42'),
(3, 'Nem nướng', NULL, NULL, 1, '2022-06-09 16:15:40', '2022-06-09 16:15:40'),
(4, 'Phở cuốn', NULL, NULL, 1, '2022-06-09 16:15:40', '2022-06-09 16:15:40'),
(5, 'Bún đậu', NULL, NULL, 1, '2022-06-09 16:15:40', '2022-06-09 16:15:40'),
(6, 'Bún cá', NULL, NULL, 1, '2022-06-09 16:15:40', '2022-06-09 16:15:40'),
(7, 'Bún ngan', NULL, NULL, 1, '2022-06-09 16:15:40', '2022-06-09 16:15:40'),
(8, 'Bánh mì', NULL, NULL, 1, '2022-06-09 16:15:40', '2022-06-09 16:15:40'),
(10, 'Bún chả', 'images/food/bun-cha.png', '<div style=\"text-align: justify;\">\r\n	Không có một mốc chính xác để ghi lại lịch sử ra đời của bún chả, cũng chưa biết món ăn này được sáng tạo bởi ai. Chỉ biết rất lâu rồi, từ thế hệ này sang thế hệ khác của người Hà Nội vẫn quen thuộc với bún chả và coi đây là một món ăn không thể thiếu trong đời sống ẩm thực thường ngày.<br>\r\n	<br>\r\n	Bún chả bao gồm 3 phần chính là nước chấm, chả nướng và bún. Một suất bún chả có ngon hay không được quyết định phần lớn bởi nước chấm. Nước chấm bún chả được pha đầy đủ chua, cay, mặn, ngọt với mắm, giấm, đường, tỏi, ớt cùng lượng phù hợp tùy vào người pha chế, trong bát nước chấm luôn có thêm nộm gồm đu đủ xanh, cà rốt hay nhiều nơi có cả giá đỗ.<br>\r\n	<br>\r\n	<table align=\"center\" cellpadding=\"1\" cellspacing=\"1\" style=\"width: 500px; margin: 0pt auto;\">\r\n		<tbody>\r\n			<tr>\r\n				<td style=\"text-align: center;\">\r\n					<em><img border=\"0\" hspace=\"3\" id=\"234492\" src=\"https://img.dantocmiennui.vn/t620/uploaddtmn//2018/1/24/buncha2_idiy-1.jpeg\" vspace=\"3\" title=\"Bún chả nét ẩm thực tinh tế của đất kinh kỳ hình ảnh 1\" class=\"img-fluid cms-photo\" data-photo-original-src=\"https://img.dantocmiennui.vnhttps://img.dantocmiennui.vn/t620/uploaddtmn//2018/1/24/buncha2_idiy-1.jpeg\"></em></td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"text-align: center;\">\r\n					<em>Chả nướng trong món bún chả có 2 loại chả miếng và chả băm</em></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<br>\r\n	Chả nướng có 2 loại là chả miếng và chả viên, thường thì chả miếng sẽ được làm từ thịt ba chỉ để thịt có độ mềm và ngọt nhất định, chả viên được nặn thành khối tròn bằng khoảng ¼ lòng bàn tay, tẩm ướp và nướng dưới bếp than củi đỏ hồng. Bún trong bún chả hiện nay thường là bún rối, tuy nhiên theo truyền thống thì bún con mới được sử dụng nhiều hơn cả.<br>\r\n	<br>\r\n	Tuy có thể ăn được vào bất kì lúc nào trong ngày, nhưng người Hà Nội thường ăn bún chả vào bữa trưa. Đặc điểm chọn thời gian thưởng thức này được coi là một trong những nét độc đáo trong “nghệ thuật ẩm thực” của đất kinh kỳ đã hình thành từ xa xưa. Việc ngồi trên những bộ bàn ghế nhựa ngoài vỉa hè, xì xụp đĩa bún trắng tinh, mềm mịn bên tô mắm nóng ấm đỏ vàng dường như đã trở nên quá ư thường nhật với người Việt.<br>\r\n	<br>\r\n	Khách ăn bún chả gần như có đủ, từ già, trẻ, trai, gái, dù là dân công sở sơ mi quần Âu lịch lãm đến chị lao công mồ hôi ướt áo cũng đều ngồi thưởng thức món ăn này một cách ngon lành. Hương vị đậm đà của thịt nướng được tẩm ướp cẩn thận còn phảng phất chút hương than hoa quyến rũ lạ kỳ, ăn kèm với bún cùng nhiều loại rau sống tươi mát và nước chấm chua ngọt, thơm ngon. Tất cả gắn kết với nhau tạo nên một tổng thể hài hòa xuất sắc, khiến người ta chỉ cần nếm thử một lần thì có lẽ chẳng thể nào quên.<br>\r\n	<br>\r\n	Bún chả muốn ăn ngon thì cũng cần ăn đúng cách. Người thủ đô thường bảo rằng, ăn bún chả đúng điệu là phải ăn kèm nhiều loại rau xanh như xà lách, rau thơm, tía tô… Gắp một đũa bún rồi nhúng vào bát nước chấm đầy ắp thịt nướng, thêm cả rau sống rồi thưởng thức hương vị hài hòa lan tỏa đầy thú vị.<br>\r\n	<br>\r\n	<table align=\"center\" cellpadding=\"1\" cellspacing=\"1\" style=\"width: 500px; margin: 0pt auto;\">\r\n		<tbody>\r\n			<tr>\r\n				<td style=\"text-align: center;\">\r\n					<em><img border=\"0\" hspace=\"3\" id=\"234491\" src=\"https://img.dantocmiennui.vn/t620/uploaddtmn//2018/1/24/buncha1_pkch-1.jpeg\" vspace=\"3\" title=\"Bún chả nét ẩm thực tinh tế của đất kinh kỳ hình ảnh 2\" class=\"img-fluid cms-photo\" data-photo-original-src=\"https://img.dantocmiennui.vnhttps://img.dantocmiennui.vn/t620/uploaddtmn//2018/1/24/buncha1_pkch-1.jpeg\"></em></td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"text-align: center;\">\r\n					<em>Bún chả ăn kèm các loại rau sống</em></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<div style=\"text-align: center;\">\r\n		&nbsp;</div>\r\n	Không khó khăn để có thể tìm được một hàng bún chả tại các góc phố của thủ đô Hà Nội, trong đó, có một số cửa hàng đã khá nổi tiếng, quen thuộc với thực khách như bún chả Đắc Kim ở Hàng Mành, bún chả Sinh Từ ở Tạ Quang Bửu, bún chả Duy Diễm ở Ngọc Khánh, bún chả Hương Liên ở Lê Văn Hưu, bún chả Ngọc Xuân ở Thụy Khuê, v.v.<br>\r\n	<br>\r\n	Hiện nay, đã có thêm nhiều biến tấu cho bún chả tại Hà Nội và một số cửa hàng đã ít nhiều tạo nên phong cách khi thay đổi phương thức chế biến, thời gian thưởng thức như bún chả bọc lá chuối, bún chả kẹp que, bún chả ăn sáng, bún chả dấm sấu dấm me v.v.<br>\r\n	<br>\r\n	Hơn nữa, không chỉ vang danh quốc nội mà bún chả còn khiến những du khách quốc tế mê say và không ngừng nhắc tới. Vào năm 2016, bữa tối bún chả của Tổng thống Mỹ Barack Obama và đầu bếp Anthony Bourdain ở Hà Nội đã tạo ra một “hiệu ứng phi thường”. Một nhân vật nổi danh trong giới chính trị gia, và một nhân vật nổi tiếng trong giới ẩm thực gia, hai tâm hồn ấy sẽ cùng gặp nhau bên món… bún chả. Hình ảnh người đàn ông quyền lực bậc nhất thế giới ngồi ghế nhựa, ăn bún chả, uống bia lạnh với chiếc sơ mi trắng đơn giản mà lịch lãm tại Việt Nam đã trở thành một trong những điểm nhấn gây được ấn tượng mạnh nhất trong lòng quần chúng suốt thời gian dài sau đó. Cho đến hàng tuần sau, các tờ báo trong nước và quốc tế vẫn bàn luận về bữa ăn cũng như món bún chả bình dân nhưng có hương vị tuyệt vời ấy.<br>\r\n	<br>\r\n	<table align=\"center\" cellpadding=\"1\" cellspacing=\"1\" style=\"width: 500px; margin: 0pt auto;\">\r\n		<tbody>\r\n			<tr>\r\n				<td style=\"text-align: center;\">\r\n					<em><img border=\"0\" hspace=\"3\" id=\"234493\" src=\"https://img.dantocmiennui.vn/t620/uploaddtmn//2018/1/24/buncha3_aign-1.jpeg\" vspace=\"3\" title=\"Bún chả nét ẩm thực tinh tế của đất kinh kỳ hình ảnh 3\" class=\"img-fluid cms-photo\" data-photo-original-src=\"https://img.dantocmiennui.vnhttps://img.dantocmiennui.vn/t620/uploaddtmn//2018/1/24/buncha3_aign-1.jpeg\"></em></td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"text-align: center;\">\r\n					<em>Hiện nay, một số cửa hàng bún chả đã cải biến thành các món bún chả bọc lá chuối, bún chả kẹp que, bún chả ăn sáng, bún chả dấm sấu dấm me v.v.</em></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<div style=\"text-align: center;\">\r\n		&nbsp;</div>\r\n	Cùng với phở, bánh mì và rất nhiều những món ăn truyền thống nổi danh khác, bún chả đang được cả thế giới nhắc đến như một đại diện mới của ẩm thực Việt Nam. Hầu như trong bảng xếp hạng những món ăn ngon trên thế giới của những tờ báo nổi danh như CNN hay Lonely Planet, bún chả đều nằm trong top đầu.<br>\r\n	<br>\r\n	Viết về món ăn này, những cây bút ẩm thực đều cho rằng, cái tinh tế mà bún chả của Việt Nam có thể khiến du khách nước ngoài ‘mê mẩn’, đó là nét văn hóa “vừa đủ” trong phần ăn truyền thống. Vừa đủ thịt – thịt cũng không quá nạc, không quá mỡ, vừa đủ rau, nước mắm và bún để bạn có thể hoàn thành bữa ăn mà không tạo “tội nghiệp” bỏ sót đồ ăn.<br>\r\n	<br>\r\n	Bún chả đặc biệt theo cách của riêng mình, không quá phô trương nhưng đủ sức hấp dẫn từ chính sự đơn giản sẵn có. Trải qua nhiều thăng trầm lịch sử, bún chả vẫn giữ được hương vị đặc trưng, giữ vững được vị trí là một trong những món ăn quốc hồn quốc túy của ẩm thực Việt.</div>', 1, '2022-06-09 16:15:40', '2022-06-09 16:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `ip_address`
--

CREATE TABLE `ip_address` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `json` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poll_date`
--

CREATE TABLE `poll_date` (
  `id` int(11) NOT NULL,
  `food_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT '0',
  `poll_by` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poll_date`
--

INSERT INTO `poll_date` (`id`, `food_id`, `total`, `poll_by`, `date`) VALUES
(1, 1, 1, '5', '2022-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` text,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `login_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Đây là id khi login bằng google hoặc facebook',
  `login_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Link ảnh khi đăng nhập bằng fb hoặc google',
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeLogin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `avatar`, `description`, `status`, `created`, `updated`, `active`, `login_id`, `login_image`, `gender`, `typeLogin`) VALUES
(1, 'Phúc Híp', '202cb962ac59075b964b07152d234b70', NULL, 'buiphuc044@gmail.com', 'images/avatar/no-user.png', 'Phúc Híp đz', 1, '2022-06-14 14:22:08', '2022-06-14 14:22:08', 1, NULL, NULL, NULL, ''),
(5, 'Phúc Híp', '', NULL, 'buiphuc160@gmail.com', 'images/avatar/202207/106926041089704775598-20220703185324.png', NULL, 1, '2022-07-03 18:53:24', '2022-07-03 18:53:24', 1, '106926041089704775598', 'https://lh3.googleusercontent.com/a-/AOh14Ggsky_1wo8bWYDoQSlyH7xnZqXvDIWdEs1OBItX=s96-c', NULL, 'google');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_address`
--
ALTER TABLE `ip_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_date`
--
ALTER TABLE `poll_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ip_address`
--
ALTER TABLE `ip_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_date`
--
ALTER TABLE `poll_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
