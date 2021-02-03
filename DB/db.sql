/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.12-log : Database - shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shop` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `shop`;

/*Table structure for table `billmain` */

DROP TABLE IF EXISTS `billmain`;

CREATE TABLE `billmain` (
  `B_ID` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) NOT NULL,
  `total_amount` varchar(30) NOT NULL,
  `gen_code` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'not paid',
  PRIMARY KEY (`B_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `billmain` */

insert  into `billmain`(`B_ID`,`uid`,`total_amount`,`gen_code`,`date`,`status`) values (1,'4','108','73575','2017-03-11','paid'),(2,'4','17608','92164','2017-03-11','paid'),(3,'4','17500','348053','2017-03-11','paid'),(4,'4','600','519526','2017-03-11','paid'),(5,'4','130','892120','2017-03-11','paid'),(6,'4','17618','412014','2017-03-11','paid'),(7,'4','430','984081','2017-03-11','paid'),(8,'4','17738','809139','2017-03-11','paid'),(9,'4','17738','124111','2017-03-11','paid'),(10,'4','17738','992504','2017-03-11','paid'),(11,'4','108','462385','2017-03-11','paid'),(12,'4','108','386634','2017-04-23','paid'),(13,'4','118','297399','2017-04-23','paid'),(14,'4','17618','642739','2017-04-23','paid'),(15,'4','13420','433879','2017-04-23','paid');

/*Table structure for table `billsub` */

DROP TABLE IF EXISTS `billsub`;

CREATE TABLE `billsub` (
  `B_ID` int(10) NOT NULL,
  `P_ID` int(10) NOT NULL,
  `Price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `billsub` */

insert  into `billsub`(`B_ID`,`P_ID`,`Price`) values (1,1,'108'),(2,1,'108'),(2,2,'17500'),(3,2,'17500'),(4,5,'300'),(4,5,'300'),(5,3,'10'),(5,4,'120'),(6,1,'108'),(6,2,'17500'),(6,3,'10'),(7,3,'10'),(7,4,'120'),(7,5,'300'),(8,1,'108'),(8,2,'17500'),(8,3,'10'),(8,4,'120'),(9,1,'108'),(9,2,'17500'),(9,3,'10'),(9,4,'120'),(10,1,'108'),(10,2,'17500'),(10,3,'10'),(10,4,'120'),(11,1,'108'),(12,1,'108'),(13,1,'108'),(13,3,'10'),(14,1,'108'),(14,2,'17500'),(14,3,'10'),(15,5,'300'),(15,6,'13000'),(15,7,'120');

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `Ct_id` int(10) NOT NULL AUTO_INCREMENT,
  `P_ID` int(10) NOT NULL,
  `Cus_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`Ct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cart` */

/*Table structure for table `customertable` */

DROP TABLE IF EXISTS `customertable`;

CREATE TABLE `customertable` (
  `Cus_ID` int(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `SecondName` varchar(50) DEFAULT NULL,
  `Place` varchar(50) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  PRIMARY KEY (`Cus_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customertable` */

insert  into `customertable`(`Cus_ID`,`FirstName`,`SecondName`,`Place`,`Email`,`Phone`,`UserName`) values (4,'krish','na','wyd','jishnuunni818@gmail.com','9747438385','krish');

/*Table structure for table `dummybank` */

DROP TABLE IF EXISTS `dummybank`;

CREATE TABLE `dummybank` (
  `Cus_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Acc_No` varchar(30) NOT NULL,
  `security` varchar(30) NOT NULL,
  `amount` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Cus_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `dummybank` */

insert  into `dummybank`(`Cus_ID`,`Acc_No`,`security`,`amount`) values (1,'121','222','86580'),(2,'122','232','113420');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `lid` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) DEFAULT NULL,
  `pname` varchar(50) DEFAULT NULL,
  `utype` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`lid`,`uname`,`pname`,`utype`) values (1,'admin','admin','admin'),(2,'billing','2222','Billing'),(3,'store','3333','Store'),(4,'krish','4444','user'),(5,'','','user');

/*Table structure for table `offertable` */

DROP TABLE IF EXISTS `offertable`;

CREATE TABLE `offertable` (
  `P_ID` int(10) NOT NULL AUTO_INCREMENT,
  `pro_id` varchar(80) DEFAULT NULL,
  `P_Offer` varchar(50) NOT NULL,
  `Sp_Offer` varchar(50) NOT NULL,
  `Discrip` varchar(50) DEFAULT NULL,
  `From_Date` varchar(20) NOT NULL,
  `End_Date` varchar(20) NOT NULL,
  `Total_Price` varchar(20) NOT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `offertable` */

insert  into `offertable`(`P_ID`,`pro_id`,`P_Offer`,`Sp_Offer`,`Discrip`,`From_Date`,`End_Date`,`Total_Price`) values (1,'2','10','5','onam','2017-01-20','2018-01-20','17500'),(2,'1','12','3','onam','2017-02-22','2018-02-22','108'),(3,'8','12','13','onam offer','2017-01-15','2017-02-15','225');

/*Table structure for table `producttable` */

DROP TABLE IF EXISTS `producttable`;

CREATE TABLE `producttable` (
  `P_ID` int(10) NOT NULL AUTO_INCREMENT,
  `P_Name` varchar(50) NOT NULL,
  `P_Quantity` varchar(20) NOT NULL,
  `UsagePeriodTime` varchar(20) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `Mfd` varchar(20) NOT NULL,
  `Exp_Date` varchar(20) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `ProductBrand` varchar(50) NOT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `producttable` */

insert  into `producttable`(`P_ID`,`P_Name`,`P_Quantity`,`UsagePeriodTime`,`Price`,`Mfd`,`Exp_Date`,`Type`,`ProductBrand`) values (1,'Shampoo','150 ml','10.Months','120','2017-01-01','2017-10-31','others','Dheethi'),(2,'Laptop','not','36.Months','25000','2016-01-20','2019-01-22','others','Apple'),(3,'pen','5','10.Months','10','2017-01-01','2017-10-31','others','cello'),(4,'apple','100 kg','20.Days','120','2017-02-06','2017-02-26','veg','Appleor'),(5,'watch','30 piece','.','300','2017-04-03','','others','Titan'),(6,'mobile','25 piece','.','13000','2017-01-01','','others','xiomi'),(7,'calculator','100piece','36.Months','120','2017-03-03','','others','casio'),(8,'Horlicks','500','10.Months','300','2017-01-10','2017-10-10','others','Nestley'),(10,'Mouse','1 Kg','20 or More.Months','130','2017-04-18','','others','ibell');

/*Table structure for table `purchasetable` */

DROP TABLE IF EXISTS `purchasetable`;

CREATE TABLE `purchasetable` (
  `Cus_ID` int(10) NOT NULL AUTO_INCREMENT,
  `P_ID` int(20) NOT NULL,
  `Pur_Qty` varchar(30) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `Pur_Date` varchar(20) NOT NULL,
  PRIMARY KEY (`Cus_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `purchasetable` */

/*Table structure for table `ratingtable` */

DROP TABLE IF EXISTS `ratingtable`;

CREATE TABLE `ratingtable` (
  `P_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Rating` varchar(30) NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `fdb` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `ratingtable` */

insert  into `ratingtable`(`P_ID`,`Rating`,`uid`,`date`,`fdb`) values (1,'3.0','4','2017-03-01','This is not good'),(2,'5.0','4','2017-03-01','very good'),(3,'2.0','4','2017-03-02','safty'),(4,'2.0','4','2017-03-02','safty'),(5,'2.0','4','2017-03-02','safty'),(6,'2.5','4','2017-03-03','good'),(7,'2.5','4','2017-03-03','it was good'),(8,'2.5','4','2017-03-03','it was good'),(9,'1.0','4','2017-03-05','verybad'),(10,'2.5','4','2017-04-23','NotGood'),(11,'4.5','4','2017-04-23','NotBad');

/*Table structure for table `reportstable` */

DROP TABLE IF EXISTS `reportstable`;

CREATE TABLE `reportstable` (
  `P_ID` int(10) NOT NULL AUTO_INCREMENT,
  `P_Quantity` varchar(30) NOT NULL,
  `Pur_Date` varchar(20) NOT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reportstable` */

/*Table structure for table `stafftable` */

DROP TABLE IF EXISTS `stafftable`;

CREATE TABLE `stafftable` (
  `sid` varchar(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Place` varchar(50) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `Qualification` varchar(50) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Gender` varchar(20) NOT NULL,
  `Designation` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stafftable` */

insert  into `stafftable`(`sid`,`Name`,`Place`,`DOB`,`Qualification`,`Email`,`Gender`,`Designation`) values ('2','Jishnu','Wayanad','1997-01-30','Degree','jishnuunni818@gmail.com','Male','Billing'),('3','RishiRajVishnu','Pulpally','1996-05-05','Degree','Rishiraj@gmail.com','Male','Store'),('6','krishna','Wayanad','1997-05-29','Degree','krish@gmail.com','Female','Billing');

/*Table structure for table `stocktable` */

DROP TABLE IF EXISTS `stocktable`;

CREATE TABLE `stocktable` (
  `stockid` int(10) NOT NULL AUTO_INCREMENT,
  `P_id` varchar(30) DEFAULT NULL,
  `Stk_qty` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`stockid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `stocktable` */

insert  into `stocktable`(`stockid`,`P_id`,`Stk_qty`) values (1,'1','105'),(2,'2','13'),(3,'6','35'),(4,'3','3'),(5,'7','27'),(6,'8','50');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
