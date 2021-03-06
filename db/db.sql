

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
(1,0,'????????????????????',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL),
(2,0,'??????????????',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL),
(3,1,'????????????????????????',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL),
(4,1,'??????????????????????????',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL),
(5,1,'????????????????',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL),
(6,1,'????????????',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL),
(7,1,'?????????????? ????????????????????????????',NULL,1,'2021-10-22 22:57:02',NULL,NULL,NULL);

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
('m211021_185936_seed_report_table',1634965569);

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
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

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
(20,4,415,86482100,26.5539,30257000,'Isaias','2021-07-14',1,'2021-10-22 22:58:53',NULL,NULL,NULL),
(21,14,9674,82732300,41.1337,0.9,'Deshaun','2021-05-28',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(22,2,2681,78982300,480.584,130177,'Reymundo','2021-12-15',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(23,9,6088,94821900,28481600,231,'Damon','2021-04-18',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(24,5,856,1102580,66.2658,491973,'Leonora','2021-05-07',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(25,4,3560,110072,33020400,12.6343,'Brett','2021-03-29',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(26,8,7658,41329500,174512000,156069,'Geraldine','2021-10-28',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(27,16,7911,105669,2359.09,4619140,'Coty','2021-09-16',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(28,13,5666,195.248,40.1,1854.32,'Mona','2021-02-14',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(29,20,816,635019,212.992,8234990,'Lamar','2021-08-23',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(30,9,3101,58.595,12.4,5.58162,'Kian','2021-05-14',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(31,3,3051,533.76,74727,4.48532,'Lula','2021-08-12',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(32,9,4562,11193500,1541410,2640.68,'Louisa','2021-09-08',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(33,10,485,27241.2,223967,128524,'Junius','2021-02-10',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(34,6,7588,1264920,54785.8,39.6576,'Ryder','2021-05-04',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(35,16,3293,8189.31,222794000,33164200,'Norene','2021-11-29',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(36,16,7946,54644.1,50130300,1191190,'Kelsie','2021-12-27',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(37,20,3722,120.52,2,878.868,'Jany','2021-08-06',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(38,12,5997,18,27840.9,5.64,'Dakota','2021-01-10',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(39,2,9892,5831.75,222.85,19.8439,'Michele','2021-06-20',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(40,5,4297,148.345,10.1,4194.68,'Geovany','2021-09-11',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(41,14,532,7630540,0.03035,106747000,'Carlee','2021-07-10',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(42,3,1699,31.8,796430000,286.034,'Cristobal','2021-11-30',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(43,13,4804,0.24085,0.785921,52.3948,'Jasper','2021-04-09',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(44,1,6534,695.167,16.0963,50,'Francisca','2021-04-05',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(45,18,917,4.51156,3.9742,221897,'Dameon','2021-01-08',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(46,5,5126,266,6.20225,5047490,'Tiffany','2021-01-04',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(47,2,8255,4486.26,2693480,3986.6,'Lia','2021-11-25',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(48,3,101,4.29927,23305.8,40861300,'Sam','2021-09-18',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(49,18,5889,498390000,29.0904,475.152,'Shea','2021-06-20',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(50,18,4848,16378200,1.96,38.5204,'Manuel','2021-08-09',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(51,13,1667,1133060,28,43.7331,'Nella','2021-12-08',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(52,9,1007,185238000,4846.59,149567,'Jimmy','2021-05-21',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(53,9,8886,293087,4277.59,2887.56,'Arnaldo','2021-04-25',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(54,12,5901,43175800,1.82181,31961,'Susan','2021-10-24',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(55,7,3021,5592640,0.049,400.366,'Stan','2021-12-20',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(56,7,7611,255.01,27.4194,472613,'Brad','2021-10-23',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(57,3,7115,3101500,13329100,622443,'Jeffry','2021-03-12',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(58,4,2961,731978,6314.57,0.436,'Rogers','2021-03-01',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(59,19,1950,2507,4.20824,315.584,'Catherine','2021-04-28',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(60,9,2518,38.653,337649,161119,'Kassandra','2021-09-10',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(61,10,8495,65372.8,5216.33,2.05307,'Pablo','2021-10-23',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(62,15,1684,86089000,2.3,5341.8,'Edwin','2021-07-03',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(63,17,8720,112,145.202,60318600,'Kasandra','2021-06-22',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(64,11,2086,12895.2,6988.53,370490000,'Jayme','2021-10-12',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(65,7,8903,1022,1156.88,83.8265,'Glennie','2021-06-27',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(66,17,4265,21699.8,0.828617,38573900,'Ebba','2021-11-09',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(67,13,4547,0.231498,34398900,3324.43,'Eulah','2021-06-30',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(68,18,9616,170.053,480156000,0.749,'Hazle','2021-06-16',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(69,3,6643,3547.43,26.2,737697000,'Abigayle','2021-04-15',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(70,13,8201,2.76,827360000,1831.84,'Mariano','2021-05-29',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(71,4,84,2880790,4772.95,13287.4,'Trey','2021-02-27',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(72,15,9675,799.635,34.075,34.517,'Aletha','2021-07-03',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(73,17,5688,15562.9,43.5534,182262000,'Gia','2021-10-23',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(74,4,7815,944.461,130223,47912500,'Terence','2021-09-29',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(75,13,3561,4.40285,78909.9,331127000,'Geovanni','2021-10-01',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(76,2,5346,747,919841000,14.5166,'Name','2021-07-21',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(77,19,4080,40.1109,4225940,481.229,'Hillard','2021-06-23',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(78,11,7873,0.7244,13350.1,10508.7,'Golden','2021-06-11',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(79,17,7705,66136500,2619.92,169648,'Noemie','2021-08-20',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(80,17,8631,0.171749,1.52779,6331160,'Roscoe','2021-02-20',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(81,18,7796,6548910,503.02,11513.9,'Jarrell','2021-07-22',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(82,11,2396,93.9,141694,16919700,'Soledad','2021-06-19',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(83,15,3301,2311340,6991.71,1181.21,'Meda','2021-06-11',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(84,4,3010,1.15179,3555260,41924900,'Brielle','2021-09-29',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(85,13,2055,158.447,19.0123,74.15,'Zoey','2021-04-18',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(86,8,8019,1935710,160.535,6980900,'Douglas','2021-10-18',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(87,2,4484,4819.48,10.5198,45802900,'Aron','2021-06-21',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(88,13,3784,13563800,141.636,20561400,'Nya','2021-11-11',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(89,9,7489,43.8839,23103,92.4778,'Aliyah','2021-05-07',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(90,15,7359,384544,7412950,78014200,'Antonetta','2021-12-27',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(91,11,3871,27280400,42946500,425798,'Emmanuelle','2021-06-03',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(92,12,3711,1.33954,640.735,361120,'Kaylin','2021-09-09',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(93,16,7434,43045600,40,6.6767,'Addison','2021-04-17',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(94,16,9381,69351.1,284.384,441391000,'Josh','2021-02-11',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(95,3,932,749428000,34265.5,22007.2,'Augustus','2021-11-04',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(96,20,5315,19.6,1500480,162803000,'Hoyt','2021-06-08',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(97,15,3477,226988000,28028.4,687.717,'Jettie','2021-09-08',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(98,1,758,76008,40999.1,416.446,'Tiara','2021-11-20',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(99,5,3366,37539200,4615.26,145917,'Emelie','2021-01-16',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(100,5,8779,3734.4,5625.5,240.741,'Sister','2021-09-07',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(101,11,1256,4826570,12227.3,63379.6,'Anabel','2021-10-18',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(102,18,1571,53459700,4293100,51044500,'Braden','2021-05-12',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(103,17,3364,76.179,405.67,4.55958,'Jackeline','2021-01-19',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(104,20,4828,155.173,68,265534,'Kristofer','2021-05-18',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(105,14,424,738176000,1236680,1253.4,'Horacio','2021-12-06',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(106,4,7765,19606900,21546.5,84250,'Trisha','2021-02-07',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(107,3,5938,25694.6,275868,3.79402,'Eula','2021-04-08',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(108,14,5181,7434.3,121992,4717.66,'Vivianne','2021-01-27',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(109,18,1699,70678700,3.49,169.309,'Trenton','2021-05-21',1,'2021-10-23 10:06:08',NULL,NULL,NULL),
(110,15,9195,4620.84,45491500,117358,'Camron','2021-02-12',1,'2021-10-23 10:06:09',NULL,NULL,NULL),
(111,3,8784,15316400,90110700,69.3,'Hershel','2021-09-12',1,'2021-10-23 10:06:09',NULL,NULL,NULL),
(112,4,5439,621917000,0,215.761,'Christine','2021-05-23',1,'2021-10-23 10:06:09',NULL,NULL,NULL),
(113,13,2446,0.1,0.1743,5766020,'Buford','2021-08-29',1,'2021-10-23 10:06:09',NULL,NULL,NULL),
(114,9,514,0.608059,5847940,44206.4,'Cara','2021-07-08',1,'2021-10-23 10:06:09',NULL,NULL,NULL),
(115,6,7654,121.276,712.92,7.44045,'Brad','2021-06-01',1,'2021-10-23 10:06:09',NULL,NULL,NULL),
(116,5,5281,30617500,365889,149782,'Doug','2021-12-08',1,'2021-10-23 10:06:09',NULL,NULL,NULL),
(117,19,6638,63.2294,61027.8,4545650,'Margaretta','2021-03-12',1,'2021-10-23 10:06:09',NULL,NULL,NULL),
(118,11,9034,162.684,960,107482000,'Idella','2021-05-07',1,'2021-10-23 10:06:09',NULL,NULL,NULL),
(119,8,478,4696.78,2.1,2600.03,'Ena','2021-09-16',1,'2021-10-23 10:06:09',NULL,NULL,NULL),
(120,14,2154,238243,847022,111301,'Alta','2021-08-24',1,'2021-10-23 10:06:09',NULL,NULL,NULL);


