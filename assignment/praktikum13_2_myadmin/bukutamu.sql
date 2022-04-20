/*
SQLyog Community v12.4.3 (32 bit)
MySQL - 10.1.25-MariaDB : Database - penjualan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`penjualan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `penjualan`;

/*Table structure for table `bukutamu` */

DROP TABLE IF EXISTS `bukutamu`;

CREATE TABLE `bukutamu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `situs` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `bukutamu` */

insert  into `bukutamu`(`id`,`nama`,`email`,`situs`,`pesan`,`waktu`) values 
(2,'ghiyatsi','ghiyatsi@gmail.com','','holaaaa bosss','2017-12-06 09:37:52'),
(3,'ajib','ajib@gmail.com','http://ajib.net','sasasasa','2017-12-06 09:54:46'),
(4,'sdsds','ajib@gmail.com','http://ajib.net','dsdsdsds','2017-12-06 09:55:12'),
(5,'tes','tes@gmail.com','http://tes.co.id','tes','2017-12-06 10:08:37'),
(6,'ghiyatsi','ghiyatsi@gmail.com','http://xxx.com','jnlkh hjkhgjk hjkhkjhkhlkh hlhlkhh ','2017-12-06 10:08:39'),
(7,'jan','jan@gmail.com','http://janyuhu.blogspot.com','yahud','2017-12-06 10:08:59'),
(8,'fawsf','sdfasdf@sdfas.com','http://fsdafsad','fsadfagagfaweeds','2017-12-06 10:09:04'),
(9,'fajar','fajar@daus.com','http://fajarrrrrrrr','fajar sedih','2017-12-06 10:09:54');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
