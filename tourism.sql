-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2018 at 06:27 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(100) NOT NULL,
  `ad_user` varchar(100) NOT NULL,
  `ad_pass` varchar(100) NOT NULL,
  `ad_status` varchar(100) NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_user`, `ad_pass`, `ad_status`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'approved'),
(2, 'jijin', 'jijin', 'c363290ef34bde31a9a89057f76b1f2d', 'registered');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `cmt_id` int(11) NOT NULL AUTO_INCREMENT,
  `chk_like` varchar(100) NOT NULL,
  `chk_dislike` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `plc_id` varchar(100) NOT NULL,
  `vis_id` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`cmt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cmt_id`, `chk_like`, `chk_dislike`, `comment`, `plc_id`, `vis_id`, `date`, `status`) VALUES
(4, '1', '0', 'no', '9', '18', '2018-03-02', 'inserted'),
(5, '1', '0', 'no', '7', '18', '2018-03-02', 'inserted'),
(6, '0', '1', 'no', '9', '19', '2018-03-02', 'inserted'),
(7, '1', '0', 'no', '9', '20', '2018-03-02', 'inserted'),
(8, '1', '0', 'EXCELLENT', '11', '18', '2018-03-03', 'inserted'),
(9, '1', '0', 'no', '11', '19', '2018-03-03', 'inserted'),
(10, '1', '0', 'AVERAGE', '11', '20', '2018-03-03', 'inserted'),
(11, '1', '0', 'no', '6', '20', '2018-03-03', 'inserted'),
(12, '1', '0', '1', '1', '20', '2018-03-03', 'inserted'),
(13, '1', '0', 'no', '10', '20', '2018-03-05', 'inserted'),
(14, '0', '0', 'GOOD', '7', '20', '2018-03-05', 'inserted'),
(15, '1', '0', 'BEAUTIFUL', '11', '21', '2018-03-05', 'inserted'),
(16, '0', '1', 'no', '10', '21', '2018-03-05', 'inserted'),
(17, '1', '0', 'no', '9', '21', '2018-03-05', 'inserted'),
(18, '0', '1', 'no', '8', '21', '2018-03-05', 'inserted'),
(19, '1', '0', 'no', '7', '21', '2018-03-05', 'inserted'),
(20, '0', '1', 'no', '6', '21', '2018-03-05', 'inserted'),
(21, '1', '0', 'no', '5', '21', '2018-03-05', 'inserted'),
(22, '1', '0', 'no', '4', '21', '2018-03-05', 'inserted'),
(23, '1', '0', 'no', '3', '21', '2018-03-05', 'inserted'),
(24, '0', '1', 'no', '2', '21', '2018-03-05', 'inserted'),
(25, '1', '0', 'no', '1', '21', '2018-03-05', 'inserted'),
(26, '1', '0', 'GOOD', '3', '18', '2018-03-06', 'inserted');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `plc_id` int(11) NOT NULL AUTO_INCREMENT,
  `plc_name` varchar(250) NOT NULL,
  `plc_photo` varchar(250) NOT NULL,
  `plc_photo_bg` varchar(250) NOT NULL,
  `plc_gu_name` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `near_place` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`plc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`plc_id`, `plc_name`, `plc_photo`, `plc_photo_bg`, `plc_gu_name`, `contact`, `near_place`, `description`, `status`) VALUES
(1, 'irlnd 3', 'Desert.jpg', 'Cork.jpg', 'jijinm', '889123899111', 'londonnn', '<p>Zambia&rsquo;s offering to holiday visitors is strongly oriented towards nature tourism, driven by two principal assets: the Victoria Falls and wildlife in the country&rsquo;s national parks. Except for a few village visits and traditional ceremonies, Zambia&rsquo;s cultural, archaeological and historical assets are rarely included in tourist itineraries. Due to the &ldquo;pull&rdquo; factor of the Victoria Falls, tourism activities around the nearby town of Livingstone are relatively well-developed compared to those in other regions in Zambia. The Victoria Falls itself only require a short stay and, therefore, can be visited as a weekend getaway or short side trip. As a result, Zambia is often a secondary destination added on to visits to other countries in the region, and, thus, has a shorter length of stay. Zambia&rsquo;s leisure tourism is highly seasonal, as visits to national parks are mostly limited to the May to October dry season</p>', 'updated'),
(2, 'irelnd 2', '640px-Causeway-code_poet-4.jpg', 'Cork.jpg', 'etert', '23423523', 'Kerala', '<p>The number of visitors to Zambia increased eightfold between 1995 and 2007, when it reached 897,413 international visitors, although visitor numbers have since declined. In 2009 Zambia received 709,948 international visitors, equivalent to a 12.5 percent decline from 2008. Figure 1 shows the breakdown of 2009 visitors by region of origin and purpose of visit. Two-thirds of the visitors were from Africa, the majority of which were from other countries in southern and eastern Africa. Business/conference visitors accounted for almost half of arrivals, and holiday visitors for one-quarter</p>', 'updated'),
(3, 'ooty', '32708957871_33a4087eb1_b.jpg', 'belgrade-danube-sava-confluence.jpg', 'rtyrty', '456456456', 'kerala', '<p>South Africa is by far the largest market in the SADC region, accounting for 44 percent of visitor arrivals. Botswana, Tanzania and Namibia are the other major competitors in the Southern African Development Community, with Kenya an important competitor in the wider region. Recent economic and political difficulties have to some extent suppressed competition from Zimbabwe, the country that shares Victoria Falls with Zambia. However, Zimbabwe could easily revert to being a formidable competitor: Zimbabwe&rsquo;s tourism products, which are similar in nature but better-developed, are competitively priced. In addition, Zimbabwe benefits from a strong skill base and effective infrastructure</p>', 'updated'),
(4, 'ireland 4', 'Dublin1-650x260.png', 'dublin-ireland-55.jpg', 'rytyrty', '456453456', 'tyrtyryr', '<p>Africa&rsquo;s tourism industry is expected to continue growing at a rate above the world average. While visitor arrivals in other regions fell following the global financial crisis (e.g. by 4.3 percent in 2009), arrivals to Africa increased (e.g. by 3 percent in 2009). The demand patterns in both African countries and international source markets suggest that demand for the type of tourism products that Zambia has to offer is not a limiting factor in the medium term. Zambia&rsquo;s central &ldquo;crossroads&rdquo; position offers opportunities for stronger regional linkages and potential for self-drive tours. Bordered by eight other countries, Zambia is positioned at the heart of the region. In particular, the town of Livingstone&mdash;which, as well as being located next to the Victoria Falls, is close to the borders of Zimbabwe, Botswana and Namibia&mdash;offers significant potential for regional tourism circuits and joint marketing. Significant numbers of self-drive visitors tour Namibia, and could perhaps be encouraged to extend their journeys to Livingstone and other parts of Zambia. The geographical location of the capital city, Lusaka, mid-way between the established airline hubs of Nairobi and Johannesburg, could also help Zambia benefit from established regional tourist circuits.</p>', 'updated'),
(5, 'ireland 7', 'dublincitylarge.jpg', 'gallery-image-1.jpg', 'bbbbbb', '3453453457777777777', 'eyeryeryoooooooooo', '<p>The number of visitors to Zambia increased eightfold between 1995 and 2007, when it reached 897,413 international visitors, although visitor numbers have since declined. In 2009 Zambia received 709,948 international visitors, equivalent to a 12.5 percent decline from 2008. Figure 1 shows the breakdown of 2009 visitors by region of origin and purpose of visit. Two-thirds of the visitors were from Africa, the majority of which were from other countries in southern and eastern Africa. Business/conference visitors accounted for almost half of arrivals, and holiday visitors for one-quarter</p>', 'updated'),
(6, 'kerala 1', 'original.jpg', 'dublin.jpg', 'erter', '343453453', 'fdgdfgdfg', '<p><span>Africa&rsquo;s tourism industry is expected to continue growing at a rate above the world average. While visitor arrivals in other regions fell following the global financial crisis (e.g. by 4.3 percent in 2009), arrivals to Africa increased (e.g. by 3 percent in 2009). The demand patterns in both African countries and international source markets suggest that demand for the type of tourism products that Zambia has to offer is not a limiting factor in the medium term. Zambia&rsquo;s central &ldquo;crossroads&rdquo; position offers opportunities for stronger regional linkages and potential for self-drive tours. Bordered by eight other countries, Zambia is positioned at the heart of the region. In particular, the town of Livingstone&mdash;which, as well as being located next to the Victoria Falls, is close to the borders of Zimbabwe, Botswana and Namibia&mdash;offers significant potential for regional tourism circuits and joint marketing. Significant numbers of self-drive visitors tour Namibia, and could perhaps be encouraged to extend their journeys to Livingstone and other parts of Zambia. The geographical location of the capital city, Lusaka, mid-way between the established airline hubs of Nairobi and Johannesburg, could also help Zambia benefit from established regional tourist circuits.</span></p>', 'inserted'),
(7, 'kerala2', '1471182135.jpg', '640px-Causeway-code_poet-4.jpg', 'dfgdfg', '45645645', 'dfgdfgedfgdf', '<p><span>Africa&rsquo;s tourism industry is expected to continue growing at a rate above the world average. While visitor arrivals in other regions fell following the global financial crisis (e.g. by 4.3 percent in 2009), arrivals to Africa increased (e.g. by 3 percent in 2009). The demand patterns in both African countries and international source markets suggest that demand for the type of tourism products that Zambia has to offer is not a limiting factor in the medium term. Zambia&rsquo;s central &ldquo;crossroads&rdquo; position offers opportunities for stronger regional linkages and potential for self-drive tours. Bordered by eight other countries, Zambia is positioned at the heart of the region. In particular, the town of Livingstone&mdash;which, as well as being located next to the Victoria Falls, is close to the borders of Zimbabwe, Botswana and Namibia&mdash;offers significant potential for regional tourism circuits and joint marketing. Significant numbers of self-drive visitors tour Namibia, and could perhaps be encouraged to extend their journeys to Livingstone and other parts of Zambia. The geographical location of the capital city, Lusaka, mid-way between the established airline hubs of Nairobi and Johannesburg, could also help Zambia benefit from established regional tourist circuits.</span></p>', 'inserted'),
(8, 'kerala3', 'cliffs-of-moher-ireland.jpg', '32708957871_33a4087eb1_b.jpg', 'gdfgf', '546454', 'hfgfgh', '<p><span>Africa&rsquo;s tourism industry is expected to continue growing at a rate above the world average. While visitor arrivals in other regions fell following the global financial crisis (e.g. by 4.3 percent in 2009), arrivals to Africa increased (e.g. by 3 percent in 2009). The demand patterns in both African countries and international source markets suggest that demand for the type of tourism products that Zambia has to offer is not a limiting factor in the medium term. Zambia&rsquo;s central &ldquo;crossroads&rdquo; position offers opportunities for stronger regional linkages and potential for self-drive tours. Bordered by eight other countries, Zambia is positioned at the heart of the region. In particular, the town of Livingstone&mdash;which, as well as being located next to the Victoria Falls, is close to the borders of Zimbabwe, Botswana and Namibia&mdash;offers significant potential for regional tourism circuits and joint marketing. Significant numbers of self-drive visitors tour Namibia, and could perhaps be encouraged to extend their journeys to Livingstone and other parts of Zambia. The geographical location of the capital city, Lusaka, mid-way between the established airline hubs of Nairobi and Johannesburg, could also help Zambia benefit from established regional tourist circuits.</span></p>', 'inserted'),
(9, 'kerala4', 'default.jpg', 'Crossing-the-Carrick-a-Rede.jpg', 'dfgdfg', '435345', 'gdfgdfgdfg', '<p><span>Africa&rsquo;s tourism industry is expected to continue growing at a rate above the world average. While visitor arrivals in other regions fell following the global financial crisis (e.g. by 4.3 percent in 2009), arrivals to Africa increased (e.g. by 3 percent in 2009). The demand patterns in both African countries and international source markets suggest that demand for the type of tourism products that Zambia has to offer is not a limiting factor in the medium term. Zambia&rsquo;s central &ldquo;crossroads&rdquo; position offers opportunities for stronger regional linkages and potential for self-drive tours. Bordered by eight other countries, Zambia is positioned at the heart of the region. In particular, the town of Livingstone&mdash;which, as well as being located next to the Victoria Falls, is close to the borders of Zimbabwe, Botswana and Namibia&mdash;offers significant potential for regional tourism circuits and joint marketing. Significant numbers of self-drive visitors tour Namibia, and could perhaps be encouraged to extend their journeys to Livingstone and other parts of Zambia. The geographical location of the capital city, Lusaka, mid-way between the established airline hubs of Nairobi and Johannesburg, could also help Zambia benefit from established regional tourist circuits.</span></p>', 'inserted'),
(10, 'kerala5', 'dublincitylarge.jpg', 'stm5141ec58f11d920130314.jpg', 'reret', '34534', 'sdsdf', '<p><span>Africa&rsquo;s tourism industry is expected to continue growing at a rate above the world average. While visitor arrivals in other regions fell following the global financial crisis (e.g. by 4.3 percent in 2009), arrivals to Africa increased (e.g. by 3 percent in 2009). The demand patterns in both African countries and international source markets suggest that demand for the type of tourism products that Zambia has to offer is not a limiting factor in the medium term. Zambia&rsquo;s central &ldquo;crossroads&rdquo; position offers opportunities for stronger regional linkages and potential for self-drive tours. Bordered by eight other countries, Zambia is positioned at the heart of the region. In particular, the town of Livingstone&mdash;which, as well as being located next to the Victoria Falls, is close to the borders of Zimbabwe, Botswana and Namibia&mdash;offers significant potential for regional tourism circuits and joint marketing. Significant numbers of self-drive visitors tour Namibia, and could perhaps be encouraged to extend their journeys to Livingstone and other parts of Zambia. The geographical location of the capital city, Lusaka, mid-way between the established airline hubs of Nairobi and Johannesburg, could also help Zambia benefit from established regional tourist circuits.</span></p>', 'inserted'),
(11, 'kerala6', 'The_Royal_Canal_at_Drumcondra_Road_Lower,_Dublin,_Ireland_-_geograph.org.uk_-_332312.jpg', 'titanic.jpg', 'dfgdfg', '344765787', 'ghfghfghfgh', '<p><span>Africa&rsquo;s tourism industry is expected to continue growing at a rate above the world average. While visitor arrivals in other regions fell following the global financial crisis (e.g. by 4.3 percent in 2009), arrivals to Africa increased (e.g. by 3 percent in 2009). The demand patterns in both African countries and international source markets suggest that demand for the type of tourism products that Zambia has to offer is not a limiting factor in the medium term. Zambia&rsquo;s central &ldquo;crossroads&rdquo; position offers opportunities for stronger regional linkages and potential for self-drive tours. Bordered by eight other countries, Zambia is positioned at the heart of the region. In particular, the town of Livingstone&mdash;which, as well as being located next to the Victoria Falls, is close to the borders of Zimbabwe, Botswana and Namibia&mdash;offers significant potential for regional tourism circuits and joint marketing. Significant numbers of self-drive visitors tour Namibia, and could perhaps be encouraged to extend their journeys to Livingstone and other parts of Zambia. The geographical location of the capital city, Lusaka, mid-way between the established airline hubs of Nairobi and Johannesburg, could also help Zambia benefit from established regional tourist circuits.</span></p>', 'inserted');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_register`
--

CREATE TABLE IF NOT EXISTS `visitor_register` (
  `vis_id` int(11) NOT NULL AUTO_INCREMENT,
  `vis_name` varchar(100) NOT NULL,
  `vis_email` varchar(100) NOT NULL,
  `vis_image` varchar(100) NOT NULL,
  `vis_gender` varchar(100) NOT NULL,
  `vis_user` varchar(100) NOT NULL,
  `vis_pass` varchar(100) NOT NULL,
  `vis_status` varchar(100) NOT NULL,
  PRIMARY KEY (`vis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `visitor_register`
--

INSERT INTO `visitor_register` (`vis_id`, `vis_name`, `vis_email`, `vis_image`, `vis_gender`, `vis_user`, `vis_pass`, `vis_status`) VALUES
(18, 'jijin', 'jijin@gmail.com', 'no image uploaded', 'male', 'jijin', 'c363290ef34bde31a9a89057f76b1f2d', 'registered'),
(19, 'admin', 'admin@gmail.com', 'no image uploaded', 'male', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'registered'),
(20, 'aji', 'aji@gmail.com', 'no image uploaded', 'male', 'aji', '8d045450ae16dc81213a75b725ee2760', 'registered'),
(21, 'res', 'res@gmail.com', 'no image uploaded', 'female', 'res', '9b207167e5381c47682c6b4f58a623fb', 'registered');
