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

/*Table structure for table `pax_tbl` */

DROP TABLE IF EXISTS `pax_tbl`;

CREATE TABLE `pax_tbl` (
  `paxid` int(11) NOT NULL AUTO_INCREMENT,
  `pax` varchar(11) NOT NULL,
  PRIMARY KEY (`paxid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pax_tbl` */

insert  into `pax_tbl`(`paxid`,`pax`) values (1,'100'),(2,'150'),(3,'200');

/*Table structure for table `payment_tbl` */

DROP TABLE IF EXISTS `payment_tbl`;

CREATE TABLE `payment_tbl` (
  `paymentid` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(50) NOT NULL,
  PRIMARY KEY (`paymentid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `payment_tbl` */

insert  into `payment_tbl`(`paymentid`,`bank`) values (1,'Metrobank'),(2,'Bdos');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
