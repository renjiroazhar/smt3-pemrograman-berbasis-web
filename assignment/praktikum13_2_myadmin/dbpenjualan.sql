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

/*Table structure for table `berita` */

DROP TABLE IF EXISTS `berita`;

CREATE TABLE `berita` (
  `id_berita` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_kategori` int(3) unsigned NOT NULL DEFAULT '0',
  `judul` varchar(100) NOT NULL DEFAULT '',
  `headline` text NOT NULL,
  `isi` text NOT NULL,
  `pengirim` varchar(15) NOT NULL DEFAULT '',
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `berita` */

insert  into `berita`(`id_berita`,`id_kategori`,`judul`,`headline`,`isi`,`pengirim`,`tanggal`) values 
(2,3,'tahun politik','tahun politik 2018','tahun politik coy','paijo','2017-12-08 11:35:34'),
(3,3,'Jokowi 2 Tahun','jokowi digadang2 2 periode','jkw vs ww','admin','2017-12-13 09:34:15'),
(4,1,'Emas Ghiyatsi','Emas Taekwondo Ghiyatsi','Emas Taekwondo Ghiyatsi Ngudi Waluyo Cup 2017','admin','2017-12-13 09:37:47'),
(5,1,'Liga Italia','Inter Capolista','Inter capolista','admin','2017-12-13 09:38:48'),
(6,0,'Liga Inggris','City Vs MU 2-1','City Vs MU 2-1','paijo','2017-12-13 09:39:40');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `bukutamu` */

insert  into `bukutamu`(`id`,`nama`,`email`,`situs`,`pesan`,`waktu`) values 
(2,'najwa aulia','najwa@gmail.com','najwa.com','haiiii','2017-12-08 10:49:45'),
(3,'paijo','paijo@gmail.com','http://paijo.com','holllaaaaa','2017-12-08 11:08:41');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(30) NOT NULL DEFAULT '',
  `deskripsi` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nm_kategori`,`deskripsi`) values 
(1,'Olah Raga','olah raga'),
(3,'Politik','politik');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
