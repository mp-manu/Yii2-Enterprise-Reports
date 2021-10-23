/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 10.0.38-MariaDB : Database - enterprise-reports
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`enterprise-reports` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `enterprise-reports`;

/*Table structure for table `enterprise` */

DROP TABLE IF EXISTS `enterprise`;

CREATE TABLE `enterprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `industry_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `inn` varchar(12) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-enterprise-industry-id` (`industry_id`),
  CONSTRAINT `fk-enterprise-industry-id` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `enterprise` */

insert  into `enterprise`(`id`,`industry_id`,`name`,`inn`,`address`,`tel`,`status`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,3,'Prudence Legros','1984200531','46410 Enos Circle Suite 689','+1-386-485-9339',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(2,5,'Hosea Barrows','2103192472','333 Dietrich Extension Suite 000','1-325-334-6442',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(3,3,'Clifton Cummerata','1997441211','53962 Kiehn Route Suite 598','213-593-0342',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(4,3,'Sigurd Raynor','1923969385','602 Walter Parkways Apt. 592','+1-701-799-0100',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(5,7,'Queen Beatty II','2063878533','244 Unique Road Apt. 075','+1-351-854-5297',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(6,5,'Ryley West Sr.','2013189153','867 Rosenbaum Lane Apt. 489','+1-562-556-4818',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(7,7,'Dr. Bulah Emmerich','2139242688','21714 Olin Loop Apt. 776','+1 (719) 812-7638',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(8,5,'Ms. Carley Miller','2130777561','2762 Ward Union Apt. 816','+1 (262) 580-7159',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(9,4,'Hassie Hamill','1954742608','91504 Kristopher Valleys Suite 103','917-257-7970',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(10,5,'Sheridan Beer IV','2121632796','145 Shanny Stravenue','1-872-621-4568',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(11,7,'Jameson Kautzer II','2127525027','40403 Satterfield Shoal Suite 764','(937) 389-1489',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(12,4,'Ronny Treutel V','2047484551','56737 Howell Roads Suite 034','253-796-9197',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(13,3,'Dr. Cecilia Schneider','1914407864','19989 Treva Lodge','941.274.2980',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(14,5,'Heather Oberbrunner','2014564248','65756 Lisandro Circle','505.952.3560',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(15,6,'Shany Thompson','1975938101','5697 Gutmann Meadows','(551) 526-3729',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(16,6,'Sophie Quitzon','1969971004','140 Sanford Stream','1-360-832-0644',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(17,4,'Ken Bergstrom','2047386361','429 Wehner Plaza Suite 680','+1-773-810-1539',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(18,3,'Scarlett Crist V','1962734677','249 Gaylord Springs Apt. 733','+1.804.764.2408',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(19,4,'Junius McGlynn','1972631881','8728 Koch Crossroad','949.529.7914',1,'2021-10-22 22:57:03',NULL,NULL,NULL),
(20,7,'Lera Kunze','1981364504','26164 Christelle Rest Apt. 667','341-739-0609',1,'2021-10-22 22:57:03',NULL,NULL,NULL);

/*Table structure for table `industry` */

DROP TABLE IF EXISTS `industry`;

CREATE TABLE `industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` tinyint(2) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `industry` */

insert  into `industry`(`id`,`parent_id`,`name`,`description`,`status`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,0,'Химическая',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL),
(2,0,'Пищевая',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL),
(3,1,'Фармацевтика',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL),
(4,1,'Нефтепродукты',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL),
(5,1,'Молочная',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL),
(6,1,'Мясная',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL),
(7,1,'Напитки безалкогольные',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL);

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values 
('m000000_000000_base',1634925414),
('m211021_182452_create_industry_table',1634925417),
('m211021_183002_create_enterprise_table',1634925420),
('m211021_183014_create_report_table',1634925422),
('m211021_185836_seed_industry_table',1634925422),
('m211021_185844_seed_enterprise_table',1634925423),
('m211021_185936_seed_report_table',1634925533);

/*Table structure for table `report` */

DROP TABLE IF EXISTS `report`;

CREATE TABLE `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enterprise_id` int(11) NOT NULL,
  `amoun_workers` int(11) NOT NULL,
  `avarage_salary` float NOT NULL,
  `paid_taxes` float NOT NULL,
  `amount_power_charges` float DEFAULT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-report-enterprise-id` (`enterprise_id`),
  CONSTRAINT `fk-report-enterprise-id` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprise` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `report` */

insert  into `report`(`id`,`enterprise_id`,`amoun_workers`,`avarage_salary`,`paid_taxes`,`amount_power_charges`,`supplier_name`,`report_date`,`status`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,15,5445,524.693,34321.9,388.515,'Charity','2021-08-02',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(2,16,5197,3594280,5.4,1,'Marlen','2021-12-11',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(3,4,760,21123200,1494060,127.1,'Ramiro','2021-12-24',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(4,3,8088,121645000,4.021,328059000,'Arlene','2021-10-27',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(5,20,1218,178044,185,218845,'Aric','2021-11-04',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(6,8,5082,16539700,35,0,'Kaylah','2021-04-26',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(7,15,8066,31.7,685089,74.8172,'Doug','2021-03-29',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(8,17,3533,559769,382566,6.45915,'Humberto','2021-12-25',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(9,11,6136,65662.1,15.9066,33059300,'Myriam','2021-10-31',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(10,7,8119,10.3856,382.879,58657100,'Hillard','2021-03-18',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(11,12,8843,3293740,8502980,8050.81,'Pierre','2021-09-14',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(12,19,716,2822790,0,26.4805,'Era','2021-05-01',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(13,2,7342,76519600,68.559,7997860,'Randi','2021-07-19',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(14,16,8182,4.169,2,26756900,'Leonardo','2021-02-08',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(15,9,8716,472.15,0,3,'Rubye','2021-05-29',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(16,11,4769,1776.12,4962910,65728200,'Jeanette','2021-07-04',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(17,4,2090,9503360,661.248,7.30854,'Bianka','2021-07-11',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(18,11,548,5486.04,132677,9275.21,'Rogelio','2021-05-05',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(19,20,6778,59962400,417191,201278,'Avis','2021-06-21',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(20,4,415,86482100,26.5539,30257000,'Isaias','2021-07-14',1,'2021-10-22 22:58:53',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
