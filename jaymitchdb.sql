/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.12-log : Database - jaymitchdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jaymitchdb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jaymitchdb`;

/*Table structure for table `about_tbl` */

DROP TABLE IF EXISTS `about_tbl`;

CREATE TABLE `about_tbl` (
  `aboutid` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext NOT NULL,
  `vision` longtext NOT NULL,
  PRIMARY KEY (`aboutid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `about_tbl` */

insert  into `about_tbl`(`aboutid`,`description`,`vision`) values (1,'Great tasting food and good quality service at very affordable prices.','ddd');

/*Table structure for table `category_tbl` */

DROP TABLE IF EXISTS `category_tbl`;

CREATE TABLE `category_tbl` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `category_tbl` */

insert  into `category_tbl`(`catid`,`category`) values (1,'Drinks'),(2,'Dessert'),(3,'Appetizer');

/*Table structure for table `contact_tbl` */

DROP TABLE IF EXISTS `contact_tbl`;

CREATE TABLE `contact_tbl` (
  `contactid` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `map` longtext NOT NULL,
  PRIMARY KEY (`contactid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `contact_tbl` */

insert  into `contact_tbl`(`contactid`,`address`,`contact`,`email`,`map`) values (1,'183 Rosal St. Pingkian 3, Quezon City, 1107 Metro Manila\r\nphil','09985743369','jm_cservices@hotmail.com','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.366877081828!2d121.0569332142756!3d14.691832989744382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b0b78302f1b5%3A0x321d31c03bd76c3b!2sJay+%26+Mitch!5e0!3m2!1sen!2sph!4v1501675684341\" width=\"800\" height=\"600\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>');

/*Table structure for table `customize_tbl` */

DROP TABLE IF EXISTS `customize_tbl`;

CREATE TABLE `customize_tbl` (
  `customizeid` int(11) NOT NULL AUTO_INCREMENT,
  `menuid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `transactioncode` varchar(30) NOT NULL,
  PRIMARY KEY (`customizeid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `customize_tbl` */

insert  into `customize_tbl`(`customizeid`,`menuid`,`userid`,`transactioncode`) values (1,3,18,'53704892-DLB'),(2,5,18,'53704892-DLB'),(3,1,18,'62078153-QHG'),(4,4,18,'62078153-QHG'),(5,5,18,'62078153-QHG'),(6,1,18,'79658031-VXQ'),(7,5,18,'79658031-VXQ'),(8,1,4,'57492613-PRQ'),(9,5,4,'57492613-PRQ');

/*Table structure for table `gallery_tbl` */

DROP TABLE IF EXISTS `gallery_tbl`;

CREATE TABLE `gallery_tbl` (
  `galleryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`galleryid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `gallery_tbl` */

insert  into `gallery_tbl`(`galleryid`,`name`,`description`,`image`) values (1,'flower','orrange','1502379399Chrysanthemum.jpg');

/*Table structure for table `hold_tbl` */

DROP TABLE IF EXISTS `hold_tbl`;

CREATE TABLE `hold_tbl` (
  `holdid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `dateofevent` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `motif` varchar(30) NOT NULL,
  `pax` int(11) NOT NULL,
  `packagetype` varchar(20) NOT NULL,
  PRIMARY KEY (`holdid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `hold_tbl` */

insert  into `hold_tbl`(`holdid`,`userid`,`place`,`dateofevent`,`time`,`motif`,`pax`,`packagetype`) values (2,4,'asd','October 24, 2017','08:00 AM-12:00 PM','Birthday',150,'3'),(3,4,'asdqw','October 24, 2017','08:00 AM-12:00 PM','Wedding',150,'3'),(4,4,'asdsa','October 25, 2017','08:00 AM-12:00 PM','Wedding',150,'1');

/*Table structure for table `inquiry_tbl` */

DROP TABLE IF EXISTS `inquiry_tbl`;

CREATE TABLE `inquiry_tbl` (
  `inquiryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`inquiryid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `inquiry_tbl` */

insert  into `inquiry_tbl`(`inquiryid`,`name`,`Email`,`subject`,`message`) values (1,'asds','asdwqdsa','asdsad','asdwqdasd'),(2,'asds','asdwqdsa','asdsad','asdwqdasd'),(3,'asds','asdwqdsa','asdsad','asdwqdasd'),(4,'afw','asdqw','sadqw','asdsadsa'),(5,'adf','qwe','sadsad','asdsad'),(6,'asdqwd','sadqwd','sadsad','sadqwdwqdw'),(7,'asdwq','dsadad','asdsa','12321321asd');

/*Table structure for table `log_tbl` */

DROP TABLE IF EXISTS `log_tbl`;

CREATE TABLE `log_tbl` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `logdate` varchar(50) NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

/*Data for the table `log_tbl` */

insert  into `log_tbl`(`logid`,`userid`,`action`,`logdate`) values (1,1,'Admin login','August 02, 2017 07:24 AM'),(2,1,'Admin login','August 02, 2017 07:43 AM'),(3,1,'Admin login','August 02, 2017 08:15 AM'),(4,1,'Admin login','August 02, 2017 09:48 AM'),(5,1,'Admin login','August 02, 2017 10:11 AM'),(6,1,'Admin login','August 02, 2017 10:12 AM'),(7,1,'Admin login','August 02, 2017 10:12 AM'),(8,1,'Admin login','August 02, 2017 10:13 AM'),(9,1,'Admin login','August 02, 2017 10:13 AM'),(10,1,'Admin login','August 02, 2017 10:16 AM'),(11,1,'Admin login','August 02, 2017 10:17 AM'),(12,1,'Admin login','August 02, 2017 10:17 AM'),(13,1,'Admin login','August 02, 2017 10:18 AM'),(14,1,'Admin login','August 02, 2017 10:19 AM'),(15,1,'Admin login','August 02, 2017 10:19 AM'),(16,1,'Admin logout','August 02, 2017 10:19 AM'),(17,1,'Admin login','August 02, 2017 10:20 AM'),(18,1,'Admin login','August 02, 2017 10:20 AM'),(19,1,'Admin login','August 02, 2017 10:20 AM'),(20,1,'Admin login','August 02, 2017 10:20 AM'),(21,1,'Admin login','August 02, 2017 10:21 AM'),(22,1,'Admin login','August 02, 2017 10:21 AM'),(23,1,'Admin login','August 02, 2017 10:21 AM'),(24,1,'Admin login','August 02, 2017 10:21 AM'),(25,1,'Admin login','August 02, 2017 10:21 AM'),(26,1,'Admin login','August 02, 2017 06:22 PM'),(27,1,'Admin logout','August 02, 2017 08:09 PM'),(28,1,'Admin login','August 02, 2017 08:43 PM'),(29,1,'Admin logout','August 02, 2017 08:45 PM'),(30,1,'Admin login','August 02, 2017 09:52 PM'),(31,1,'Admin logout','August 02, 2017 09:52 PM'),(32,1,'Admin login','August 03, 2017 07:50 PM'),(33,1,'Admin logout','August 03, 2017 07:51 PM'),(34,1,'Admin logout','August 03, 2017 07:52 PM'),(35,1,'Admin logout','August 03, 2017 07:53 PM'),(36,1,'Admin login','August 03, 2017 07:53 PM'),(37,1,'Admin logout','August 03, 2017 07:58 PM'),(38,1,'Admin login','August 03, 2017 07:58 PM'),(39,1,'Admin login','August 03, 2017 11:09 PM'),(40,1,'Admin login','August 03, 2017 11:10 PM'),(41,1,'Admin login','August 03, 2017 11:11 PM'),(42,1,'Admin login','August 03, 2017 11:11 PM'),(43,1,'Admin logout','August 03, 2017 11:13 PM'),(44,1,'Admin login','August 03, 2017 11:14 PM'),(45,1,'Admin login','August 04, 2017 02:27 AM'),(46,1,'Admin logout','August 04, 2017 02:29 AM'),(47,1,'Admin login','August 04, 2017 02:30 AM'),(48,1,'Admin logout','August 04, 2017 02:30 AM'),(49,1,'Admin login','August 04, 2017 02:32 AM'),(50,1,'Admin logout','August 04, 2017 02:40 AM'),(51,1,'Admin login','August 04, 2017 03:43 PM'),(52,1,'Admin login','August 04, 2017 03:43 PM'),(53,1,'Admin login','August 04, 2017 05:30 PM'),(54,1,'Admin login','August 05, 2017 10:21 PM'),(55,1,'Admin login','August 06, 2017 10:28 PM'),(56,1,'Admin login','August 07, 2017 07:21 AM'),(57,1,'Admin login','August 07, 2017 11:43 PM'),(58,1,'Admin logout','August 07, 2017 11:46 PM'),(59,1,'Admin login','August 10, 2017 04:45 PM'),(60,1,'Admin logout','August 10, 2017 04:46 PM'),(61,1,'Admin login','August 10, 2017 11:29 PM'),(62,1,'Admin login','August 18, 2017 04:01 PM'),(63,1,'Admin logout','August 18, 2017 04:04 PM'),(64,1,'Admin login','August 19, 2017 07:28 PM'),(65,1,'Admin login','August 19, 2017 07:44 PM'),(66,1,'Admin login','August 19, 2017 08:09 PM'),(67,1,'Admin login','August 19, 2017 08:12 PM'),(68,1,'Admin login','August 19, 2017 09:20 PM'),(69,1,'Admin login','August 19, 2017 09:31 PM'),(70,1,'Admin login','August 19, 2017 09:31 PM'),(71,1,'Admin login','August 19, 2017 09:32 PM'),(72,1,'Admin login','August 19, 2017 09:33 PM'),(73,1,'Admin login','August 22, 2017 09:22 PM'),(74,1,'Admin login','August 23, 2017 01:57 PM'),(75,1,'Admin logout','August 23, 2017 02:44 PM'),(76,18,'Customer login','August 23, 2017 02:44 PM'),(77,1,'Admin login','August 23, 2017 02:52 PM'),(78,1,'Admin login','September 04, 2017 11:07 PM'),(79,1,'Admin logout','September 04, 2017 11:07 PM'),(80,1,'Admin login','September 20, 2017 03:23 PM'),(81,1,'Update contact us.','September 20, 2017 03:55 PM'),(82,1,'Update about us','September 20, 2017 03:56 PM'),(83,1,'Update about us','September 20, 2017 03:57 PM'),(84,1,'Update about us','September 20, 2017 03:59 PM'),(85,1,'Update about us','September 20, 2017 04:00 PM'),(86,1,'Update about us','September 20, 2017 04:01 PM'),(87,1,'Update about us','September 20, 2017 04:02 PM'),(88,1,'Update about us','September 20, 2017 04:03 PM'),(89,1,'Add category','September 20, 2017 04:04 PM'),(90,1,'Update category.','September 20, 2017 04:04 PM'),(91,1,'Update category.','September 20, 2017 04:05 PM'),(92,1,'Update category.','September 20, 2017 04:05 PM'),(93,1,'delete category.','September 20, 2017 04:05 PM'),(94,1,'Admin logout','September 20, 2017 04:06 PM'),(95,18,'Customer login','September 20, 2017 04:07 PM'),(96,18,'Customer login','September 20, 2017 04:07 PM'),(97,18,'Customer logout','September 20, 2017 04:07 PM'),(98,1,'Admin login','September 20, 2017 04:08 PM'),(99,1,'Admin logout','September 20, 2017 04:13 PM'),(100,18,'Customer login','September 20, 2017 04:13 PM'),(101,18,'Customer logout','September 20, 2017 04:59 PM'),(102,1,'Admin login','September 20, 2017 04:59 PM'),(103,1,'Confirmed reservation request','September 20, 2017 05:08 PM'),(104,1,'Admin logout','September 20, 2017 06:51 PM'),(105,18,'Customer login','September 20, 2017 06:51 PM'),(106,18,'Customer logout','September 20, 2017 07:21 PM'),(107,1,'Admin login','September 20, 2017 07:21 PM'),(108,1,'Cancel reservation request','September 20, 2017 07:24 PM'),(109,1,'Admin logout','September 20, 2017 07:24 PM'),(110,18,'Customer login','September 20, 2017 08:13 PM'),(111,18,'Customer logout','September 20, 2017 08:50 PM'),(112,1,'Admin login','September 20, 2017 11:11 PM'),(113,1,'date disabled','September 20, 2017 11:29 PM'),(114,1,'Admin logout','September 21, 2017 12:26 AM'),(115,1,'Admin login','September 21, 2017 12:27 PM'),(116,18,'Customer login','September 21, 2017 06:11 PM'),(117,18,'Customer login','September 25, 2017 04:28 PM'),(118,18,'Customer login','September 25, 2017 04:28 PM'),(119,18,'Customer logout','September 25, 2017 04:53 PM'),(120,1,'Admin login','September 25, 2017 04:54 PM'),(121,1,'Admin logout','September 25, 2017 05:45 PM'),(122,18,'Customer login','September 25, 2017 07:18 PM'),(123,1,'Admin login','October 07, 2017 08:38 PM'),(124,1,'Admin login','October 07, 2017 08:59 PM'),(125,1,'Admin logout','October 07, 2017 09:39 PM'),(126,1,'Admin login','October 11, 2017 06:38 PM'),(127,1,'Admin logout','October 11, 2017 06:39 PM'),(128,18,'Customer login','October 11, 2017 06:46 PM'),(129,4,'Customer login','October 11, 2017 10:12 PM'),(130,4,'Customer login','October 11, 2017 11:10 PM'),(131,4,'Customer logout','October 12, 2017 12:16 AM'),(132,4,'Customer login','October 12, 2017 12:17 AM'),(133,4,'Customer logout','October 12, 2017 12:43 AM'),(134,1,'Admin login','October 12, 2017 12:43 AM'),(135,1,'Confirmed reservation request','October 12, 2017 12:44 AM'),(136,1,'Admin logout','October 12, 2017 12:44 AM'),(137,4,'Customer login','October 12, 2017 12:44 AM'),(138,1,'Admin login','October 12, 2017 12:48 AM'),(139,1,'Confirmed reservation request','October 12, 2017 12:48 AM'),(140,4,'Customer logout','October 12, 2017 12:53 AM'),(141,4,'Customer login','October 12, 2017 01:11 AM'),(142,1,'Admin login','October 12, 2017 09:58 AM'),(143,1,'Admin login','October 12, 2017 10:55 AM');

/*Table structure for table `menu_tbl` */

DROP TABLE IF EXISTS `menu_tbl`;

CREATE TABLE `menu_tbl` (
  `menuid` int(11) NOT NULL AUTO_INCREMENT,
  `dishname` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `catid` int(11) NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `menu_tbl` */

insert  into `menu_tbl`(`menuid`,`dishname`,`description`,`price`,`catid`,`image`) values (1,'Cokes','150m','51.00',1,'1507718316Chrysanthemum.jpg'),(3,'Sprite','20ml','30.00',1,'1507718365Tulips.jpg'),(4,'Ice Cream','vanilla','120.00',2,'1503043369Tulips.jpg'),(5,'Lugaw','may laman','120.00',3,'1503043393888.jpg');

/*Table structure for table `news_tbl` */

DROP TABLE IF EXISTS `news_tbl`;

CREATE TABLE `news_tbl` (
  `newsid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`newsid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `news_tbl` */

insert  into `news_tbl`(`newsid`,`title`,`description`,`image`) values (1,'smple title','desc title','1502379562Tulips.jpg');

/*Table structure for table `order_tbl` */

DROP TABLE IF EXISTS `order_tbl`;

CREATE TABLE `order_tbl` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `menuid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `holdid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `order_tbl` */

insert  into `order_tbl`(`orderid`,`menuid`,`catid`,`holdid`,`userid`,`price`) values (42,1,1,0,4,'51.00');

/*Table structure for table `package_tbl` */

DROP TABLE IF EXISTS `package_tbl`;

CREATE TABLE `package_tbl` (
  `packageid` int(11) NOT NULL AUTO_INCREMENT,
  `packageinfoid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  PRIMARY KEY (`packageid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `package_tbl` */

insert  into `package_tbl`(`packageid`,`packageinfoid`,`menuid`) values (1,1,3),(2,1,4),(3,1,5),(4,2,1),(5,2,5),(6,3,4),(7,3,5);

/*Table structure for table `packageinfo_tbl` */

DROP TABLE IF EXISTS `packageinfo_tbl`;

CREATE TABLE `packageinfo_tbl` (
  `packageinfoid` int(11) NOT NULL AUTO_INCREMENT,
  `packagename` varchar(30) NOT NULL,
  `Descript` longtext NOT NULL,
  `packageprice` decimal(11,2) NOT NULL,
  PRIMARY KEY (`packageinfoid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `packageinfo_tbl` */

insert  into `packageinfo_tbl`(`packageinfoid`,`packagename`,`Descript`,`packageprice`) values (1,'Package A','asdqwdasd','200.00'),(2,'Package B','asdqwdas','150.00'),(3,'Pacakge C','asdqwd','200.00');

/*Table structure for table `pax_tbl` */

DROP TABLE IF EXISTS `pax_tbl`;

CREATE TABLE `pax_tbl` (
  `paxid` int(11) NOT NULL AUTO_INCREMENT,
  `pax` varchar(11) NOT NULL,
  PRIMARY KEY (`paxid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pax_tbl` */

insert  into `pax_tbl`(`paxid`,`pax`) values (1,'100'),(2,'150'),(3,'200');

/*Table structure for table `payment_tbl` */

DROP TABLE IF EXISTS `payment_tbl`;

CREATE TABLE `payment_tbl` (
  `paymentid` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(50) NOT NULL,
  PRIMARY KEY (`paymentid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `payment_tbl` */

insert  into `payment_tbl`(`paymentid`,`bank`) values (1,'Metrobank'),(2,'Bdos');

/*Table structure for table `reserve_tbl` */

DROP TABLE IF EXISTS `reserve_tbl`;

CREATE TABLE `reserve_tbl` (
  `reserveid` int(11) NOT NULL AUTO_INCREMENT,
  `transactioncode` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL,
  `place` varchar(255) DEFAULT NULL,
  `dateofevent` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `motif` varchar(30) NOT NULL,
  `pax` int(11) NOT NULL,
  `packagetype` varchar(20) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `ctrlno` varchar(30) NOT NULL,
  `payment` decimal(11,2) NOT NULL,
  `dateofpayment` varchar(30) NOT NULL,
  `image` blob NOT NULL,
  `reservationdate` varchar(30) NOT NULL,
  `reschedstat` varchar(5) NOT NULL,
  `status` varchar(30) NOT NULL,
  `notifstat` varchar(11) NOT NULL,
  PRIMARY KEY (`reserveid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `reserve_tbl` */

insert  into `reserve_tbl`(`reserveid`,`transactioncode`,`userid`,`place`,`dateofevent`,`time`,`motif`,`pax`,`packagetype`,`total`,`bank`,`ctrlno`,`payment`,`dateofpayment`,`image`,`reservationdate`,`reschedstat`,`status`,`notifstat`) values (1,'',0,NULL,'May 1, 1900','','',0,'','0.00','','','0.00','','','','','',''),(2,'17645893-PZG',18,NULL,'October 04, 2017','8:00 AM - 12:00 PM','bday',20,'1','4000.00','Metrobank','3123','0.00','September 19, 2017','1505895816Koala.jpg','August 18, 2017','1','Rescheduled',''),(3,'40832657-QNG',18,NULL,'August 26, 2017','8:00 AM - 12:00 PM','wedding',100,'2','15000.00','','','0.00','','','August 18, 2017','','Cancelled',''),(10,'53704892-DLB',18,NULL,'September 30, 2017','8:00 AM - 12:00 PM','sad',22,'Customize','3300.00','Palawan','213213','30000.00','September 19, 2017','1505896813Desert.jpg','August 22, 2017','','Confirmed',''),(11,'19305826-VCD',18,NULL,'September 27, 2017','8:00 AM - 12:00 PM','asdq',150,'1','33000.00','Metrobank','12321','123.00','September 20, 2017','1505895663Lighthouse.jpg','September 20, 2017','','Cancelled',''),(12,'93147608-CIO',18,'asdwqdas','September 28, 2017','08:00 AM-12:00 PM','Birthday',100,'1','22000.00','','','0.00','','','September 20, 2017','','Pending',''),(13,'62078153-QHG',18,'sadq','October 01, 2017','08:00 AM-12:00 PM','Birthday',100,'Customize','32010.00','','','0.00','','','September 20, 2017','','Pending',''),(14,'',0,NULL,'September 22, 2017','','',0,'','0.00','','','0.00','','','','','',''),(15,'46972518-SXZ',18,'sad','October 09, 2017','08:00 AM-12:00 PM','Birthday',100,'1','23500.00','','','0.00','','','September 25, 2017','','Pending',''),(16,'79658031-VXQ',18,'sadqwd','October 06, 2017','08:00 AM-12:00 PM','Reunion',100,'Customize','20310.00','','','0.00','','','September 25, 2017','','Pending',''),(17,'73650921-OZP',18,'asd','October 18, 2017','08:00 AM-12:00 PM','Birthday',100,'2','18000.00','','','0.00','','','October 11, 2017','','Pending',''),(18,'64195802-IHX',4,'asd','October 20, 2017','08:00 AM-12:00 PM','Birthday',150,'3','34500.00','Bdos','asd','18000.00','October 12, 2017','1507743052Tulips.jpg','October 11, 2017','','Pending','0'),(19,'57492613-PRQ',4,'sadsa','October 25, 2017','08:00 AM-12:00 PM','Birthday',100,'Customize','20310.00','Metrobank','qwe','11000.00','October 12, 2017','1507740207Lighthouse.jpg','October 12, 2017','','Confirmed','0');

/*Table structure for table `slider_tbl` */

DROP TABLE IF EXISTS `slider_tbl`;

CREATE TABLE `slider_tbl` (
  `sliderid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`sliderid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `slider_tbl` */

insert  into `slider_tbl`(`sliderid`,`name`,`description`,`image`) values (1,'','','1502379264Lighthouse.jpg'),(2,'','','1502379277Lighthouse.jpg'),(3,'dqs','dqwe','1502379382Desert.jpg'),(4,'dqwdw','qawqe','1502379461Jellyfish.jpg');

/*Table structure for table `temp_tbl` */

DROP TABLE IF EXISTS `temp_tbl`;

CREATE TABLE `temp_tbl` (
  `tempid` int(11) NOT NULL AUTO_INCREMENT,
  `menuid` int(11) NOT NULL,
  PRIMARY KEY (`tempid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `temp_tbl` */

/*Table structure for table `time_tbl` */

DROP TABLE IF EXISTS `time_tbl`;

CREATE TABLE `time_tbl` (
  `timeid` int(11) NOT NULL AUTO_INCREMENT,
  `starttime` varchar(30) NOT NULL,
  `endtime` varchar(30) NOT NULL,
  PRIMARY KEY (`timeid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `time_tbl` */

insert  into `time_tbl`(`timeid`,`starttime`,`endtime`) values (1,'08:00 AM','12:00 PM');

/*Table structure for table `user_tbl` */

DROP TABLE IF EXISTS `user_tbl`;

CREATE TABLE `user_tbl` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usertypeid` int(11) NOT NULL,
  `stat` varchar(15) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `user_tbl` */

insert  into `user_tbl`(`userid`,`fname`,`lname`,`contact`,`address`,`email`,`username`,`password`,`usertypeid`,`stat`) values (1,'Paul','Fradejas','0999999999','Caloocan','paul@yahoo.com','admin','123',1,'Active'),(3,'Kims','De leons','09123456733','Almars','kim@yahoo.com','kim','111',2,''),(4,'fname','lname','23123123123','sdsad','fname@yahoo.com','fname','321',2,''),(18,'sample2','last2','09165346548','marawi','sample@sample2.com','sample2','321',4,''),(19,'asd','dsa','123','asdas','as123','qsad','123',2,''),(21,'samplef','samplel','12312312312','Street','sample@yahoo.com','sample','123',3,'Inactive');

/*Table structure for table `usertype_tbl` */

DROP TABLE IF EXISTS `usertype_tbl`;

CREATE TABLE `usertype_tbl` (
  `usertypeid` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(30) NOT NULL,
  PRIMARY KEY (`usertypeid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `usertype_tbl` */

insert  into `usertype_tbl`(`usertypeid`,`position`) values (1,'Admin'),(2,'Secretary'),(3,'Customer'),(4,'Cashier');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
