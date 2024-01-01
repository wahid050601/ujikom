-- MySQL dump 10.13  Distrib 8.2.0, for Linux (x86_64)
--
-- Host: localhost    Database: fa_addawah
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_admin` (
  `id_adm` int NOT NULL AUTO_INCREMENT,
  `user_adm` varchar(100) NOT NULL,
  `pass_adm` varchar(100) NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `alamat_adm` varchar(100) DEFAULT NULL,
  `tlp_adm` varchar(15) DEFAULT NULL,
  `email_adm` varchar(50) DEFAULT NULL,
  `sts_akun_adm` int DEFAULT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (1,'vinaelyza01','vina123','Vina Ellyza','-','-','-',1);
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jns_pem`
--

DROP TABLE IF EXISTS `tb_jns_pem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_jns_pem` (
  `id_jns` int NOT NULL AUTO_INCREMENT,
  `jns_pem` varchar(100) NOT NULL,
  `jns_katg` varchar(10) NOT NULL,
  `jns_val` int NOT NULL,
  `jns_ccl` int NOT NULL,
  `jns_tp` varchar(15) NOT NULL,
  `smtr` varchar(10) NOT NULL,
  `jns_ket` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_jns`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jns_pem`
--

LOCK TABLES `tb_jns_pem` WRITE;
/*!40000 ALTER TABLE `tb_jns_pem` DISABLE KEYS */;
INSERT INTO `tb_jns_pem` VALUES (1,'SPP Bulan januari 2023','spp',300000,1,'2023/2024','ganjil','TKJ'),(2,'SPP Bulan januari 2023','spp',250000,1,'2023/2024','ganjil','AKL'),(3,'SPP Bulan januari 2023','spp',250000,1,'2023/2024','ganjil','BDP'),(19,'Ujian PAT Ganjil-Kelas X','ujian',300000,2,'2023/2024','ganjil','UMUM'),(24,'Maulid Nabi Muhammad SAW','kegiatan',50000,1,'2023/2024','ganjil','UMUM'),(27,'Hari Guru','kegiatan',50000,2,'2023/2024','ganjil','UMUM'),(28,'Uji Kompetensi LSP-Kelas XII TKJ','ujian',500000,2,'2023/2024','genap','TKJ'),(29,'Uji Kompetensi LSP-Kelas XII AKL','ujian',450000,2,'2023/2024','genap','AKL'),(30,'Uji Kompetensi LSP-Kelas XII BDP','ujian',450000,2,'2023/2024','genap','BDP'),(31,'Penilaian Akhir Semester (PAS) Ganjil-Kelas XII','ujian',300000,2,'2023/2024','ganjil','UMUM');
/*!40000 ALTER TABLE `tb_jns_pem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_katg_pem`
--

DROP TABLE IF EXISTS `tb_katg_pem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_katg_pem` (
  `id_katg` int NOT NULL AUTO_INCREMENT,
  `katg_pem` varchar(20) NOT NULL,
  `katg_ket` varchar(30) NOT NULL,
  PRIMARY KEY (`id_katg`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_katg_pem`
--

LOCK TABLES `tb_katg_pem` WRITE;
/*!40000 ALTER TABLE `tb_katg_pem` DISABLE KEYS */;
INSERT INTO `tb_katg_pem` VALUES (1,'spp','pembayaran SPP'),(2,'ujian','pembayaran Ujian'),(3,'kegiatan','pembayaran Kegiatan');
/*!40000 ALTER TABLE `tb_katg_pem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pem_kegiatan`
--

DROP TABLE IF EXISTS `tb_pem_kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pem_kegiatan` (
  `id_pem_keg` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NOT NULL,
  `id_keg` int NOT NULL,
  `id_admin` int NOT NULL,
  `ket_pem` varchar(15) NOT NULL,
  `nom_pem` int NOT NULL,
  `status_pem` varchar(20) NOT NULL,
  `tanggal_pem` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pem_keg`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pem_kegiatan`
--

LOCK TABLES `tb_pem_kegiatan` WRITE;
/*!40000 ALTER TABLE `tb_pem_kegiatan` DISABLE KEYS */;
INSERT INTO `tb_pem_kegiatan` VALUES (1,1,24,1,'ccl-1-l',50000,'lunas','2023-12-27 22:08:10');
/*!40000 ALTER TABLE `tb_pem_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pem_spp`
--

DROP TABLE IF EXISTS `tb_pem_spp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pem_spp` (
  `id_pem_spp` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NOT NULL,
  `id_spp` int NOT NULL,
  `id_admin` int NOT NULL,
  `status_spp` varchar(20) NOT NULL,
  `tanggal_pem` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pem_spp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pem_spp`
--

LOCK TABLES `tb_pem_spp` WRITE;
/*!40000 ALTER TABLE `tb_pem_spp` DISABLE KEYS */;
INSERT INTO `tb_pem_spp` VALUES (2,1,2,1,'lunas','2023-12-25 04:12:51'),(3,2,2,1,'lunas','2023-12-28 06:34:58');
/*!40000 ALTER TABLE `tb_pem_spp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pem_ujian`
--

DROP TABLE IF EXISTS `tb_pem_ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pem_ujian` (
  `id_pem_ujian` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NOT NULL,
  `id_ujian` int NOT NULL,
  `id_admin` int NOT NULL,
  `ket_pem` varchar(15) NOT NULL,
  `nom_pem` int NOT NULL,
  `status_pem` varchar(20) NOT NULL,
  `tanggal_pem` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pem_ujian`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pem_ujian`
--

LOCK TABLES `tb_pem_ujian` WRITE;
/*!40000 ALTER TABLE `tb_pem_ujian` DISABLE KEYS */;
INSERT INTO `tb_pem_ujian` VALUES (1,1,19,1,'ccl-1',150000,'cicilan-1','2023-12-25 17:31:21'),(2,1,19,1,'ccl-2',50000,'cicilan-2','2023-12-25 17:31:21');
/*!40000 ALTER TABLE `tb_pem_ujian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_siswa`
--

DROP TABLE IF EXISTS `tb_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_siswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nis_siswa` varchar(10) NOT NULL,
  `nisn_siswa` varchar(15) DEFAULT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jk_siswa` varchar(3) NOT NULL,
  `kls_siswa` varchar(10) DEFAULT NULL,
  `prod_siswa` varchar(50) DEFAULT NULL,
  `tp_siswa` varchar(15) DEFAULT NULL,
  `tplahir_siswa` varchar(50) NOT NULL,
  `tglahir_siswa` date NOT NULL,
  `alamat_siswa` varchar(200) DEFAULT NULL,
  `ibu_siswa` varchar(50) DEFAULT NULL,
  `ayah_siswa` varchar(50) DEFAULT NULL,
  `tlp_siswa` varchar(15) DEFAULT NULL,
  `email_siswa` varchar(50) DEFAULT NULL,
  `status_siswa` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_siswa`
--

LOCK TABLES `tb_siswa` WRITE;
/*!40000 ALTER TABLE `tb_siswa` DISABLE KEYS */;
INSERT INTO `tb_siswa` VALUES (1,'20.2732','0051890141','Siti Fadiyah','P','XII','Akuntansi Keuangan dan Lembaga','2023/2024','Jakarta','2005-01-16','Jl.Pondok Randu','Maspiyah','Sa\'adi','081319854208','fadiyah@gmail.com','aktif'),(2,'20.2705','0044859288','Hani Muhfidah','P','XII','Akuntansi Keuangan dan Lembaga','2023/2024','Jakarta','2004-09-12','Kp. Tanah Tinggi','Rustini','Engkos Kosasish','081319854178','hani@gmail.com','aktif'),(6,'16.0001','0032004010','Wahid Prayogo','L','XII','Teknik Komputer dan Jaringan','2018/2019','Jogjakarta','2001-06-05','Jl. Kembangan Utara','Wartini','Mustiko','082123287245','wahid@gmail.com','aktif'),(7,'16.0020','0030990021','Rivansyah','L','XII','Teknik Komputer dan Jaringan','2018/2019','Tangerang','2001-07-16','Kp.Can Tiga Petir','Murni','Abdul Kodir','085817547801','rivansyah@gmail.com','aktif'),(8,'16.0030','0030300032','Nayla Faizah','P','XII','Bisnis Daring dan Pemasaran','2018/2019','Jakarta','2001-06-20','Jl. Raya Duri Kosambi','Nayla','Firdaus','082123287245','nayla@gmail.com','aktif'),(9,'16.0073','0034487773','Revih Tri','L','XII','Bisnis Daring dan Pemasaran','2018/2019','Tangerang','2000-03-09','Jl. Gondrong Petir','Yeni','Wahyu','082223758428','reviih@gmail.com','aktif');
/*!40000 ALTER TABLE `tb_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testing`
--

DROP TABLE IF EXISTS `testing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testing` (
  `nama` varchar(40) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testing`
--

LOCK TABLES `testing` WRITE;
/*!40000 ALTER TABLE `testing` DISABLE KEYS */;
INSERT INTO `testing` VALUES ('wahid','oke'),('wahid','oke'),('wahid','oke'),('wahidin','success'),('wahidin','success'),('wahidin','success'),('wahid P','success'),('wahid P','success'),('wahid P','success'),('wahid P','success'),('wahidin','oke'),('wahidin','oke'),('wahidin','success'),('wahid P','success'),('wahid P','success'),('wahid P','success'),('wahid P','success');
/*!40000 ALTER TABLE `testing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testing_out`
--

DROP TABLE IF EXISTS `testing_out`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testing_out` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `pembayaran` int DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testing_out`
--

LOCK TABLES `testing_out` WRITE;
/*!40000 ALTER TABLE `testing_out` DISABLE KEYS */;
INSERT INTO `testing_out` VALUES (1,'data-testing',470000,'success','2023-12-21 09:57:27'),(2,'data-testing',470000,'success','2023-12-21 10:08:42'),(3,'data-testing',470000,'success','2023-12-21 10:09:11'),(4,'data-testing',470000,'success','2023-12-21 10:09:11'),(5,'data-testing',470000,'success','2023-12-21 10:09:21'),(6,'data-testing',470000,'success','2023-12-21 10:09:21'),(7,'data-testing',470000,'success','2023-12-21 10:09:21'),(8,'data-testing',470000,'success','2023-12-21 10:09:21'),(9,'data-testing',470000,'success','2023-12-21 10:09:21'),(10,'data-testing',470000,'success','2023-12-21 10:09:21'),(11,'data-testing',470000,'success','2023-12-21 10:09:32'),(12,'data-testing',470000,'success','2023-12-21 10:09:32'),(13,'data-testing',470000,'success','2023-12-21 10:09:32'),(14,'data-testing',470000,'success','2023-12-21 10:09:32'),(15,'data-testing',470000,'success','2023-12-21 10:09:32'),(16,'data-testing',470000,'success','2023-12-21 10:09:32'),(17,'data-testing',470000,'success','2023-12-21 10:09:32'),(18,'data-testing',470000,'success','2023-12-21 10:09:32'),(19,'data-testing',470000,'success','2023-12-21 10:09:32'),(20,'data-testing',470000,'success','2023-12-21 10:09:32'),(21,'data-testing',470000,'success','2023-12-21 10:09:32');
/*!40000 ALTER TABLE `testing_out` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_sts_spp_siswa`
--

DROP TABLE IF EXISTS `vw_sts_spp_siswa`;
/*!50001 DROP VIEW IF EXISTS `vw_sts_spp_siswa`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_sts_spp_siswa` AS SELECT 
 1 AS `id`,
 1 AS `nama_siswa`,
 1 AS `nis_siswa`,
 1 AS `kls_siswa`,
 1 AS `prod_siswa`,
 1 AS `id_jns`,
 1 AS `jns_pem`,
 1 AS `jns_val`,
 1 AS `id_pem_spp`,
 1 AS `status_spp`,
 1 AS `tanggal_pem`,
 1 AS `id_adm`,
 1 AS `nama_adm`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_sts_ujian_siswa`
--

DROP TABLE IF EXISTS `vw_sts_ujian_siswa`;
/*!50001 DROP VIEW IF EXISTS `vw_sts_ujian_siswa`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_sts_ujian_siswa` AS SELECT 
 1 AS `id`,
 1 AS `nis_siswa`,
 1 AS `nama_siswa`,
 1 AS `id_jns`,
 1 AS `jns_pem`,
 1 AS `jns_val`,
 1 AS `id_pem_ujian`,
 1 AS `nom_pem`,
 1 AS `status_pem`,
 1 AS `tanggal_pem`,
 1 AS `id_adm`,
 1 AS `nama_adm`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_sts_spp_siswa`
--

/*!50001 DROP VIEW IF EXISTS `vw_sts_spp_siswa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_sts_spp_siswa` AS select `ts`.`id` AS `id`,`ts`.`nama_siswa` AS `nama_siswa`,`ts`.`nis_siswa` AS `nis_siswa`,`ts`.`kls_siswa` AS `kls_siswa`,`ts`.`prod_siswa` AS `prod_siswa`,`tjp`.`id_jns` AS `id_jns`,`tjp`.`jns_pem` AS `jns_pem`,`tjp`.`jns_val` AS `jns_val`,`tps`.`id_pem_spp` AS `id_pem_spp`,`tps`.`status_spp` AS `status_spp`,`tps`.`tanggal_pem` AS `tanggal_pem`,`ta`.`id_adm` AS `id_adm`,`ta`.`nama_adm` AS `nama_adm` from (((`tb_pem_spp` `tps` left join `tb_siswa` `ts` on((`tps`.`id_siswa` = `ts`.`id`))) left join `tb_jns_pem` `tjp` on((`tps`.`id_spp` = `tjp`.`id_jns`))) left join `tb_admin` `ta` on((`tps`.`id_admin` = `ta`.`id_adm`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_sts_ujian_siswa`
--

/*!50001 DROP VIEW IF EXISTS `vw_sts_ujian_siswa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_sts_ujian_siswa` AS select `tb_siswa`.`id` AS `id`,`tb_siswa`.`nis_siswa` AS `nis_siswa`,`tb_siswa`.`nama_siswa` AS `nama_siswa`,`tb_jns_pem`.`id_jns` AS `id_jns`,`tb_jns_pem`.`jns_pem` AS `jns_pem`,`tb_jns_pem`.`jns_val` AS `jns_val`,`tb_pem_ujian`.`id_pem_ujian` AS `id_pem_ujian`,`tb_pem_ujian`.`nom_pem` AS `nom_pem`,`tb_pem_ujian`.`status_pem` AS `status_pem`,`tb_pem_ujian`.`tanggal_pem` AS `tanggal_pem`,`tb_admin`.`id_adm` AS `id_adm`,`tb_admin`.`nama_adm` AS `nama_adm` from (((`tb_pem_ujian` left join `tb_siswa` on((`tb_pem_ujian`.`id_siswa` = `tb_siswa`.`id`))) left join `tb_jns_pem` on((`tb_pem_ujian`.`id_ujian` = `tb_jns_pem`.`id_jns`))) left join `tb_admin` on((`tb_pem_ujian`.`id_admin` = `tb_admin`.`id_adm`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-01  7:16:32
