-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: fa_addawah
-- ------------------------------------------------------
-- Server version	8.0.36

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (2,'vina','vina123','Vina Ellyza','Kembangan Utara','082223336746','vina@gmail.com',1);
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
  `kelas_pem` varchar(20) DEFAULT NULL,
  `jns_katg` varchar(10) NOT NULL,
  `jns_val` int NOT NULL,
  `jns_ccl` int NOT NULL,
  `jns_tp` varchar(15) NOT NULL,
  `smtr` varchar(10) NOT NULL,
  `jns_ket` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_jns`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jns_pem`
--

LOCK TABLES `tb_jns_pem` WRITE;
/*!40000 ALTER TABLE `tb_jns_pem` DISABLE KEYS */;
INSERT INTO `tb_jns_pem` VALUES (43,'Kegiatan 17 Agustus','UMUM','kegiatan',50000,1,'2023/2024','ganjil','UMUM'),(47,'SPP Bulan januari 2024','UMUM','spp',300000,1,'2023/2024','genap','TKJ'),(48,'SPP Bulan januari 2024','UMUM','spp',250000,1,'2023/2024','genap','AKL'),(49,'SPP Bulan januari 2024','UMUM','spp',250000,1,'2023/2024','genap','BDP'),(50,'SPP Bulan februari 2024','UMUM','spp',300000,1,'2023/2024','genap','TKJ'),(51,'SPP Bulan februari 2024','UMUM','spp',250000,1,'2023/2024','genap','AKL'),(52,'SPP Bulan februari 2024','UMUM','spp',250000,1,'2023/2024','genap','BDP'),(53,'SPP Bulan maret 2024','UMUM','spp',300000,1,'2023/2024','genap','TKJ'),(54,'SPP Bulan maret 2024','UMUM','spp',250000,1,'2023/2024','genap','AKL'),(55,'SPP Bulan maret 2024','UMUM','spp',250000,1,'2023/2024','genap','BDP'),(56,'Penilaian Tengah Semester Genap-Kelas X','X','ujian',350000,2,'2023/2024','genap','UMUM'),(57,'Uji Kompetensi LSP-Kelas XII','XII','ujian',500000,2,'2023/2024','genap','UMUM');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_katg_pem`
--

LOCK TABLES `tb_katg_pem` WRITE;
/*!40000 ALTER TABLE `tb_katg_pem` DISABLE KEYS */;
INSERT INTO `tb_katg_pem` VALUES (4,'spp','spp'),(5,'ujian','ujian'),(6,'kegiatan','kegiatan');
/*!40000 ALTER TABLE `tb_katg_pem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_master_lap_pengeluaran`
--

DROP TABLE IF EXISTS `tb_master_lap_pengeluaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_master_lap_pengeluaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `create_tgl` timestamp NULL DEFAULT NULL,
  `adj_tgl` timestamp NULL DEFAULT NULL,
  `nama_lap` varchar(200) DEFAULT NULL,
  `status_lap` varchar(20) DEFAULT NULL,
  `create_by` varchar(200) DEFAULT NULL,
  `adj_by` varchar(200) DEFAULT NULL,
  `approve` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_master_lap_pengeluaran`
--

LOCK TABLES `tb_master_lap_pengeluaran` WRITE;
/*!40000 ALTER TABLE `tb_master_lap_pengeluaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_master_lap_pengeluaran` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pem_kegiatan`
--

LOCK TABLES `tb_pem_kegiatan` WRITE;
/*!40000 ALTER TABLE `tb_pem_kegiatan` DISABLE KEYS */;
INSERT INTO `tb_pem_kegiatan` VALUES (4,45,43,1,'ccl-1-l',50000,'lunas','2024-04-06 14:20:19');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pem_spp`
--

LOCK TABLES `tb_pem_spp` WRITE;
/*!40000 ALTER TABLE `tb_pem_spp` DISABLE KEYS */;
INSERT INTO `tb_pem_spp` VALUES (8,1,48,2,'lunas','2024-03-23 08:38:16'),(9,35,48,2,'lunas','2024-04-06 05:09:00'),(10,9,49,1,'lunas','2024-04-08 04:28:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pem_ujian`
--

LOCK TABLES `tb_pem_ujian` WRITE;
/*!40000 ALTER TABLE `tb_pem_ujian` DISABLE KEYS */;
INSERT INTO `tb_pem_ujian` VALUES (36,45,57,2,'ccl-1',250000,'cicilan-1','2024-03-23 10:45:03'),(37,45,57,2,'ccl-2-l',250000,'lunas','2024-04-06 05:59:11'),(38,46,57,1,'ccl-1-l',500000,'lunas','2024-04-06 14:24:36'),(39,47,57,1,'ccl-1',300000,'cicilan-1','2024-04-06 14:27:19'),(40,11,56,1,'ccl-1-l',350000,'lunas','2024-04-06 14:28:12'),(41,1,56,1,'ccl-1-l',350000,'lunas','2024-04-06 14:29:20'),(42,12,56,1,'ccl-1',200000,'cicilan-1','2024-04-07 08:29:35'),(43,37,57,1,'ccl-1',200000,'cicilan-1','2024-04-07 09:20:03'),(44,38,57,1,'ccl-1-l',500000,'lunas','2024-04-07 09:20:29');
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_siswa`
--

LOCK TABLES `tb_siswa` WRITE;
/*!40000 ALTER TABLE `tb_siswa` DISABLE KEYS */;
INSERT INTO `tb_siswa` VALUES (1,'18.6673','0012345678','Ahmad Fadil','L','X','Akuntansi Keuangan dan Lembaga','2020/2021','Jogjakarta','2001-03-15','Jl.Sudirman, Rt.07/Rw.03 Kel. Menteng, Kec. Menteng Jakarta Pusat','Sri Wahyuni',' Budi Prasetyo','081234567891','ahmad.fadil@gmail.com','aktif'),(2,'18.6674','0023456789','Dewi Indah','P','X','Akuntansi Keuangan dan Lembaga','2020/2021','Tangerang','2002-08-27','Jl.Thamrin, Rt.02/Rw.01 Kel. Kebayoran Baru, Kec. Kebayoran Baru Jakarta Selatan','Ani Kartini',' Surya Wijaya','081234567892','dewi.indah@gmail.com','aktif'),(3,'18.6675','0034567890','Budi Santoso','L','X','Akuntansi Keuangan dan Lembaga','2020/2021','Tegal','2001-11-10','Jl.Gatot Subroto, Rt.03/Rw.02 Kel. Kuningan, Kec. Setiabudi Jakarta Selatan','Dewi Indah',' Joko Santoso','081234567893','budi.santoso@gmail.com','aktif'),(4,'18.6676','0045678901','Siti Nurul','P','X','Akuntansi Keuangan dan Lembaga','2020/2021','Semarang','2003-05-04','Jl.HR Rasuna Said, Rt.01/Rw.05 Kel. Karet Kuningan, Kec. Setiabudi Jakarta Selatan','Siti Rahayu',' Hadi Saputra','081234567894','siti.nurul@gmail.com','aktif'),(5,'18.6677','0056789012','Putri Aulia','P','X','Akuntansi Keuangan dan Lembaga','2020/2021','Jakarta','2002-01-22','Jl.Sudirman, Rt.06/Rw.04 Kel. Bendungan Hilir, Kec. Tanah Abang Jakarta Pusat','Ratna Sari',' Agus Riyanto','081234567895','putri.aulia@gmail.com','aktif'),(6,'18.6678','0067890123','Agung Pratama','L','X','Bisnis Daring dan Pemasaran','2020/2021','Tegal','2001-09-08','Jl.Kuningan, Rt.05/Rw.07 Kel. Kuningan Timur, Kec. Setiabudi Jakarta Selatan','Yanti Fitriani',' Hendra Cahyono','081234567896','agung.pratama@gmail.com','aktif'),(7,'18.6679','0078901234','Maya Anggraini','P','X','Bisnis Daring dan Pemasaran','2020/2021','Jakarta','2003-12-18','Jl.MH Thamrin, Rt.04/Rw.02 Kel. Gambir, Kec. Gambir Jakarta Pusat','Lina Susanti',' Rudi Hartono','081234567897','maya.anggraini@gmail.com','aktif'),(8,'18.6680','0089012345','Joko Susanto','L','X','Bisnis Daring dan Pemasaran','2020/2021','Jogjakarta','2001-07-31','Jl.Jenderal Sudirman, Rt.09/Rw.03 Kel. Gondangdia, Kec. Menteng Jakarta Pusat','Nia Ramadhani',' Ahmad Subagio','081234567898','joko.susanto@gmail.com','aktif'),(9,'18.6681','0090123456','Rina Amelia','P','X','Bisnis Daring dan Pemasaran','2020/2021','Tangerang','2002-04-12','Jl.Gatot Subroto, Rt.08/Rw.01 Kel. Pancoran, Kec. Pancoran Jakarta Selatan','Rini Handayani',' Samsul Hidayat','081234567899','rina.amelia@gmail.com','aktif'),(10,'18.6682','0011234567','Dian Cahyani','P','X','Bisnis Daring dan Pemasaran','2020/2021','Semarang','2003-10-29','Jl.MH Thamrin, Rt.02/Rw.04 Kel. Kebon Melati, Kec. Tanah Abang Jakarta Pusat','Tuti Wijaya',' Faisal Rahman','081234567810','dian.cahyani@gmail.com','aktif'),(11,'18.6683','0022345678','Rizki Maulana','L','X','Teknik Komputer dan Jaringan','2020/2021','Jakarta','2001-06-17','Jl.HR Rasuna Said, Rt.03/Rw.02 Kel. Karet Semanggi, Kec. Setiabudi Jakarta Selatan','Yuli Astuti',' Arif Setiawan','081234567811','rizki.maulana@gmail.com','aktif'),(12,'18.6684','0033456789','Nita Fitriani','P','X','Teknik Komputer dan Jaringan','2020/2021','Tangerang','2002-09-23','Jl.Thamrin, Rt.06/Rw.08 Kel. Kebon Sirih, Kec. Menteng Jakarta Pusat','Siti Rohmah',' Irfan Nugroho','081234567812','nita.fitriani@gmail.com','aktif'),(13,'18.6685','0044567890','Ari Wibowo','L','X','Teknik Komputer dan Jaringan','2020/2021','Jogjakarta','2003-02-08','Jl.Kuningan, Rt.04/Rw.02 Kel. Kuningan Barat, Kec. Mampang Prapatan Jakarta Selatan','Eka Suryani',' Dani Firmansyah','081234567813','ari.wibowo@gmail.com','aktif'),(14,'18.6686','0055678901','Nindy Septiani','P','X','Teknik Komputer dan Jaringan','2020/2021','Tegal','2001-12-25','Jl.HR Rasuna Said, Rt.05/Rw.01 Kel. Kuningan Timur, Kec. Setiabudi Jakarta Selatan','Triana Dewi',' Herry Kurniawan','081234567814','nindy.septiani@gmail.com','aktif'),(15,'17.3577','0066789012','Eko Nugroho','L','XI','Akuntansi Keuangan dan Lembaga','2019/2020','Semarang','2002-11-07','Jl.Jenderal Sudirman, Rt.02/Rw.03 Kel. Karet Tengsin, Kec. Tanah Abang Jakarta Pusat','Mega Lestari',' Dedi Hermawan','081234567815','eko.nugroho@gmail.com','aktif'),(16,'17.3578','0077890123','Putra Aditya','L','XI','Akuntansi Keuangan dan Lembaga','2019/2020','Tegal','2003-08-14','Jl.Thamrin, Rt.07/Rw.05 Kel. Kebon Kacang, Kec. Tanah Abang Jakarta Pusat','Eni Saputri',' Rizal Efendi','081234567816','putra.aditya@gmail.com','aktif'),(17,'17.3579','0088901234','Rini Wahyuni','P','XI','Akuntansi Keuangan dan Lembaga','2019/2020','Jakarta','2001-05-20','Jl.Gatot Subroto, Rt.04/Rw.02 Kel. Kuningan Timur, Kec. Setiabudi Jakarta Selatan','Yulianti',' Dian Saputro','081234567817','rini.wahyuni@gmail.com','aktif'),(18,'17.3580','0099012345','Fajar Saputra','L','XI','Akuntansi Keuangan dan Lembaga','2019/2020','Jogjakarta','2002-02-03','Jl.MH Thamrin, Rt.09/Rw.03 Kel. Menteng Dalam, Kec. Menteng Jakarta Pusat','Nani Permata',' Fadli Ramadhan','081234567818','fajar.saputra@gmail.com','aktif'),(19,'17.3581','0010123456','Novi Indriani','P','XI','Akuntansi Keuangan dan Lembaga','2019/2020','Tangerang','2003-09-16','Jl.HR Rasuna Said, Rt.06/Rw.04 Kel. Kuningan Barat, Kec. Mampang Prapatan Jakarta Selatan','Ratih Novitasari',' Reza Maulana','081234567819','novi.indriani@gmail.com','aktif'),(20,'17.3582','0021234567','Bayu Kurniawan','L','XI','Bisnis Daring dan Pemasaran','2019/2020','Semarang','2001-04-28','Jl.Kuningan, Rt.05/Rw.01 Kel. Karet Kuningan, Kec. Setiabudi Jakarta Selatan','Yunita Puspitasari',' Wahyu Prabowo','081234567820','bayu.kurniawan@gmail.com','aktif'),(21,'17.3583','0032345678','Yanti Wulandari','P','XI','Bisnis Daring dan Pemasaran','2019/2020','Jakarta','2002-07-09','Jl.Jenderal Sudirman, Rt.03/Rw.02 Kel. Gelora, Kec. Tanah Abang Jakarta Pusat','Susi Hermawati',' Ade Hidayat','081234567821','yanti.wulandari@gmail.com','aktif'),(22,'17.3584','0043456789','Arya Permana','L','XI','Bisnis Daring dan Pemasaran','2019/2020','Tegal','2003-01-13','Jl.Thamrin, Rt.08/Rw.06 Kel. Kebon Melati, Kec. Tanah Abang Jakarta Pusat','Indriati',' Yoga Wibowo','081234567822','arya.permana@gmail.com','aktif'),(23,'17.3585','0054567890','Nia Amalia','P','XI','Bisnis Daring dan Pemasaran','2019/2020','Tangerang','2001-10-06','Jl.Gatot Subroto, Rt.02/Rw.03 Kel. Karet Semanggi, Kec. Setiabudi Jakarta Selatan','Fitriani Wulandari',' Didik Sutanto','081234567823','nia.amalia@gmail.com','aktif'),(24,'17.3586','0065678901','Adi Setiawan','L','XI','Bisnis Daring dan Pemasaran','2019/2020','Jogjakarta','2002-06-01','Jl.MH Thamrin, Rt.01/Rw.04 Kel. Kebon Sirih, Kec. Menteng Jakarta Pusat','Erna Widya',' Bambang Widodo','081234567824','adi.setiawan@gmail.com','aktif'),(25,'17.3587','0076789012','Dina Ramadhani','P','XI','Teknik Komputer dan Jaringan','2019/2020','Jakarta','2003-11-26','Jl.HR Rasuna Said, Rt.04/Rw.01 Kel. Kuningan Timur, Kec. Setiabudi Jakarta Selatan','Diah Ayu',' Suryanto Wibowo','081234567825','dina.ramadhani@gmail.com','aktif'),(26,'17.3588','0087890123','Rendra Saputro','L','XI','Teknik Komputer dan Jaringan','2019/2020','Tegal','2001-08-19','Jl.Kuningan, Rt.07/Rw.02 Kel. Kuningan Timur, Kec. Setiabudi Jakarta Selatan','Sari Mulia',' Rizky Firmansyah','081234567826','rendra.saputro@gmail.com','aktif'),(27,'17.3589','0098901234','Ani Widayanti','P','XI','Teknik Komputer dan Jaringan','2019/2020','Semarang','2002-05-13','Jl.Jenderal Sudirman, Rt.05/Rw.03 Kel. Gondangdia, Kec. Menteng Jakarta Pusat','Rima Kartika',' Heryanto Saputra','081234567827','ani.widayanti@gmail.com','aktif'),(28,'17.3590','0019012345','Galih Prasetyo','L','XI','Teknik Komputer dan Jaringan','2019/2020','Tangerang','2003-02-25','Jl.Thamrin, Rt.03/Rw.05 Kel. Kebon Melati, Kec. Tanah Abang Jakarta Pusat','Maya Purnama',' Andi Susanto','081234567828','galih.prasetyo@gmail.com','aktif'),(29,'17.3591','0020123456','Lina Anggraeni','P','XI','Akuntansi Keuangan dan Lembaga','2019/2020','Jogjakarta','2001-12-10','Jl.Gatot Subroto, Rt.06/Rw.07 Kel. Kuningan Barat, Kec. Mampang Prapatan Jakarta Selatan','Evi Cahyani',' Fajar Pratama','081234567829','lina.anggraeni@gmail.com','aktif'),(30,'17.3592','0031234567','Agus Surya','L','XI','Bisnis Daring dan Pemasaran','2019/2020','Jakarta','2002-09-03','Jl.MH Thamrin, Rt.04/Rw.01 Kel. Karet Tengsin, Kec. Tanah Abang Jakarta Pusat','Tiara Putri',' Taufik Hidayat','081234567830','agus.surya@gmail.com','aktif'),(31,'17.3593','0042345678','Maya Sari','P','XI','Teknik Komputer dan Jaringan','2019/2020','Tegal','2003-04-17','Jl.HR Rasuna Said, Rt.01/Rw.02 Kel. Karet Kuningan, Kec. Setiabudi Jakarta Selatan','Novi Anggraeni',' Agung Setiawan','081234567831','maya.sari@gmail.com','aktif'),(32,'17.3594','0053456789','Ferdi Hartanto','L','XI','Akuntansi Keuangan dan Lembaga','2019/2020','Semarang','2001-07-24','Jl.Kuningan, Rt.08/Rw.03 Kel. Kuningan Timur, Kec. Setiabudi Jakarta Selatan','Yenny Kristianti',' Heri Santoso','081234567832','ferdi.hartanto@gmail.com','aktif'),(33,'17.3595','0064567890','Sari Indriani','P','XI','Teknik Komputer dan Jaringan','2019/2020','Jakarta','2002-04-07','Jl.Jenderal Sudirman, Rt.02/Rw.04 Kel. Karet Semanggi, Kec. Setiabudi Jakarta Selatan','Lia Saraswati',' Haryono Sutrisno','081234567833','sari.indriani@gmail.com','aktif'),(34,'17.3596','0075678901','Yoga Pradana','L','XI','Bisnis Daring dan Pemasaran','2019/2020','Tangerang','2003-10-21','Jl.Thamrin, Rt.09/Rw.05 Kel. Gelora, Kec. Tanah Abang Jakarta Pusat','Retno Handayani',' Deni Purnomo','081234567834','yoga.pradana@gmail.com','aktif'),(35,'16.7822','0086789012','Ria Ayu Lestari','P','XII','Akuntansi Keuangan dan Lembaga','2018/2019','Jogjakarta','2001-06-03','Jl.Gatot Subroto, Rt.05/Rw.01 Kel. Karet Kuningan, Kec. Setiabudi Jakarta Selatan','Devi Susanti',' Hadianto Wijaya','081234567835','ria.ayu.lestari@gmail.com','aktif'),(36,'16.7823','0097890123','Andi Firmansyah','L','XII','Akuntansi Keuangan dan Lembaga','2018/2019','Semarang','2002-11-18','Jl.MH Thamrin, Rt.03/Rw.06 Kel. Kebon Melati, Kec. Tanah Abang Jakarta Pusat','Fitria Mariska',' Yudi Permana','081234567836','andi.firmansyah@gmail.com','aktif'),(37,'16.7824','0018901234','Irma Rianti','P','XII','Akuntansi Keuangan dan Lembaga','2018/2019','Tegal','2003-08-02','Jl.HR Rasuna Said, Rt.07/Rw.02 Kel. Karet Tengsin, Kec. Tanah Abang Jakarta Pusat','Rina Astuti',' Rizki Nugroho','081234567837','irma.rianti@gmail.com','aktif'),(38,'16.7825','0029012345','Dwi Putri','P','XII','Akuntansi Keuangan dan Lembaga','2018/2019','Jakarta','2001-05-15','Jl.Kuningan, Rt.06/Rw.04 Kel. Kuningan Barat, Kec. Mampang Prapatan Jakarta Selatan','Wulan Sari',' Yoga Pratama','081234567838','dwi.putri@gmail.com','aktif'),(39,'16.7826','0030123456','Tono Saputra','L','XII','Akuntansi Keuangan dan Lembaga','2018/2019','Tangerang','2002-01-28','Jl.Jenderal Sudirman, Rt.04/Rw.07 Kel. Karet Semanggi, Kec. Setiabudi Jakarta Selatan','Desi Purnomo',' Dwi Cahyo','081234567839','tono.saputra@gmail.com','aktif'),(40,'16.7827','0041234567','Maya Putri Utami','P','XII','Bisnis Daring dan Pemasaran','2018/2019','Jogjakarta','2003-09-09','Jl.Thamrin, Rt.02/Rw.01 Kel. Kebon Kacang, Kec. Tanah Abang Jakarta Pusat','Anisa Cahaya',' Arief Susanto','081234567840','maya.putri.utami@gmail.com','aktif'),(41,'16.7828','0052345678','Doni Setiawan','L','XII','Bisnis Daring dan Pemasaran','2018/2019','Tegal','2001-03-23','Jl.Gatot Subroto, Rt.09/Rw.02 Kel. Karet Kuningan, Kec. Setiabudi Jakarta Selatan','Yani Mulyani',' Iwan Suhendra','081234567841','doni.setiawan@gmail.com','aktif'),(42,'16.7829','0063456789','Retno Puspitasari','P','XII','Bisnis Daring dan Pemasaran','2018/2019','Semarang','2002-10-14','Jl.MH Thamrin, Rt.05/Rw.03 Kel. Karet Tengsin, Kec. Tanah Abang Jakarta Pusat','Erna Suryani',' Eko Santoso','081234567842','retno.puspitasari@gmail.com','aktif'),(43,'16.7830','0074567890','Rizal Wijaya','L','XII','Bisnis Daring dan Pemasaran','2018/2019','Tangerang','2003-06-28','Jl.HR Rasuna Said, Rt.08/Rw.04 Kel. Karet Semanggi, Kec. Setiabudi Jakarta Selatan','Sinta Fitri',' Rudi Hartanto','081234567843','rizal.wijaya@gmail.com','aktif'),(44,'16.7831','0085678901','Siska Amelia','P','XII','Bisnis Daring dan Pemasaran','2018/2019','Jakarta','2001-09-01','Jl.Kuningan, Rt.03/Rw.06 Kel. Karet Kuningan, Kec. Setiabudi Jakarta Selatan','Siska Ramadhani',' Adi Kusuma','081234567844','siska.amelia@gmail.com','aktif'),(45,'16.7832','0096789012','Bambang Susanto','L','XII','Teknik Komputer dan Jaringan','2018/2019','Tegal','2002-05-24','Jl.Jenderal Sudirman, Rt.07/Rw.02 Kel. Gelora, Kec. Tanah Abang Jakarta Pusat','Tia Utami',' Arianto Wibowo','081234567845','bambang.susanto@gmail.com','aktif'),(46,'16.7833','0017890123','Mega Fitriani','P','XII','Teknik Komputer dan Jaringan','2018/2019','Jogjakarta','2003-12-05','Jl.Thamrin, Rt.06/Rw.01 Kel. Kebon Melati, Kec. Tanah Abang Jakarta Pusat','Winda Putri',' Sugeng Riyadi','081234567846','mega.fitriani@gmail.com','aktif'),(47,'16.7834','0028901234','Ilham Cahyo','L','XII','Teknik Komputer dan Jaringan','2018/2019','Semarang','2001-08-12','Jl.Gatot Subroto, Rt.01/Rw.03 Kel. Karet Tengsin, Kec. Tanah Abang Jakarta Pusat','Vina Hartati',' Bambang Triyono','081234567847','ilham.cahyo@gmail.com','aktif'),(48,'16.7835','0039012345','Anisa Nurul','P','XII','Teknik Komputer dan Jaringan','2018/2019','Tangerang','2002-04-25','Jl.MH Thamrin, Rt.08/Rw.07 Kel. Karet Kuningan, Kec. Setiabudi Jakarta Selatan','Irma Setiawati',' Mulyono Setiawan','081234567848','anisa.nurul@gmail.com','aktif'),(49,'16.7836','0040123456','Fikri Ramadhan','L','XII','Akuntansi Keuangan dan Lembaga','2018/2019','Jakarta','2003-11-07','Jl.Kuningan, Rt.04/Rw.02 Kel. Karet Semanggi, Kec. Setiabudi Jakarta Selatan','Endang Purwati',' Slamet Wijaya','081234567849','fikri.ramadhan@gmail.com','aktif'),(50,'16.7837','0051234567','Rika Dewi Safitri','P','XII','Teknik Komputer dan Jaringan','2018/2019','Jogjakarta','2001-07-20','Jl.Jenderal Sudirman, Rt.03/Rw.01 Kel. Karet Kuningan, Kec. Setiabudi Jakarta Selatan','Mia Pratiwi',' Yanto Prasetyo','081234567850','rika.dewi.safitri@gmail.com','aktif');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testing_out`
--

LOCK TABLES `testing_out` WRITE;
/*!40000 ALTER TABLE `testing_out` DISABLE KEYS */;
/*!40000 ALTER TABLE `testing_out` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_lap_pem_kegiatan`
--

DROP TABLE IF EXISTS `vw_lap_pem_kegiatan`;
/*!50001 DROP VIEW IF EXISTS `vw_lap_pem_kegiatan`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_lap_pem_kegiatan` AS SELECT 
 1 AS `tanggal_pem`,
 1 AS `id_pem`,
 1 AS `kat_pem`,
 1 AS `jns_pem`,
 1 AS `nama_siswa`,
 1 AS `nom_pem`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_lap_pem_spp`
--

DROP TABLE IF EXISTS `vw_lap_pem_spp`;
/*!50001 DROP VIEW IF EXISTS `vw_lap_pem_spp`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_lap_pem_spp` AS SELECT 
 1 AS `tanggal_pem`,
 1 AS `id_pem`,
 1 AS `kat_pem`,
 1 AS `jns_pem`,
 1 AS `nama_siswa`,
 1 AS `nom_pem`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_lap_pem_ujian`
--

DROP TABLE IF EXISTS `vw_lap_pem_ujian`;
/*!50001 DROP VIEW IF EXISTS `vw_lap_pem_ujian`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_lap_pem_ujian` AS SELECT 
 1 AS `tanggal_pem`,
 1 AS `id_pem`,
 1 AS `kat_pem`,
 1 AS `jns_pem`,
 1 AS `nama_siswa`,
 1 AS `nom_pem`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_pemasukan_list`
--

DROP TABLE IF EXISTS `vw_pemasukan_list`;
/*!50001 DROP VIEW IF EXISTS `vw_pemasukan_list`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_pemasukan_list` AS SELECT 
 1 AS `tanggal_pem`,
 1 AS `id_pem`,
 1 AS `kat_pem`,
 1 AS `jns_pem`,
 1 AS `nama_siswa`,
 1 AS `nom_pem`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_sts_kegiatan_siswa`
--

DROP TABLE IF EXISTS `vw_sts_kegiatan_siswa`;
/*!50001 DROP VIEW IF EXISTS `vw_sts_kegiatan_siswa`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_sts_kegiatan_siswa` AS SELECT 
 1 AS `id`,
 1 AS `nis_siswa`,
 1 AS `nama_siswa`,
 1 AS `kls_siswa`,
 1 AS `prod_siswa`,
 1 AS `id_jns`,
 1 AS `jns_pem`,
 1 AS `jns_val`,
 1 AS `id_pem_keg`,
 1 AS `nom_pem`,
 1 AS `status_pem`,
 1 AS `tanggal_pem`,
 1 AS `id_adm`,
 1 AS `nama_adm`*/;
SET character_set_client = @saved_cs_client;

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
 1 AS `kls_siswa`,
 1 AS `prod_siswa`,
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
-- Final view structure for view `vw_lap_pem_kegiatan`
--

/*!50001 DROP VIEW IF EXISTS `vw_lap_pem_kegiatan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_lap_pem_kegiatan` AS select `aa`.`tanggal_pem` AS `tanggal_pem`,`aa`.`id_pem_keg` AS `id_pem`,`bb`.`jns_katg` AS `kat_pem`,`bb`.`jns_pem` AS `jns_pem`,concat(`cc`.`nis_siswa`,'|',`cc`.`nama_siswa`,'-',`cc`.`kls_siswa`,' ',`cc`.`prod_siswa`) AS `nama_siswa`,format(`aa`.`nom_pem`,0) AS `nom_pem`,`aa`.`status_pem` AS `status` from ((`tb_pem_kegiatan` `aa` left join `tb_jns_pem` `bb` on((`aa`.`id_keg` = `bb`.`id_jns`))) left join `tb_siswa` `cc` on((`aa`.`id_siswa` = `cc`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_lap_pem_spp`
--

/*!50001 DROP VIEW IF EXISTS `vw_lap_pem_spp`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_lap_pem_spp` AS select `a`.`tanggal_pem` AS `tanggal_pem`,`a`.`id_pem_spp` AS `id_pem`,`b`.`jns_katg` AS `kat_pem`,`b`.`jns_pem` AS `jns_pem`,concat(`c`.`nis_siswa`,'|',`c`.`nama_siswa`,'-',`c`.`kls_siswa`,' ',`c`.`prod_siswa`) AS `nama_siswa`,format(`b`.`jns_val`,0) AS `nom_pem`,`a`.`status_spp` AS `status` from ((`tb_pem_spp` `a` left join `tb_jns_pem` `b` on((`a`.`id_spp` = `b`.`id_jns`))) left join `tb_siswa` `c` on((`a`.`id_siswa` = `c`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_lap_pem_ujian`
--

/*!50001 DROP VIEW IF EXISTS `vw_lap_pem_ujian`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_lap_pem_ujian` AS select `aa`.`tanggal_pem` AS `tanggal_pem`,`aa`.`id_pem_ujian` AS `id_pem`,`bb`.`jns_katg` AS `kat_pem`,`bb`.`jns_pem` AS `jns_pem`,concat(`cc`.`nis_siswa`,'|',`cc`.`nama_siswa`,'-',`cc`.`kls_siswa`,' ',`cc`.`prod_siswa`) AS `nama_siswa`,format(`aa`.`nom_pem`,0) AS `nom_pem`,`aa`.`status_pem` AS `status` from ((`tb_pem_ujian` `aa` left join `tb_jns_pem` `bb` on((`aa`.`id_ujian` = `bb`.`id_jns`))) left join `tb_siswa` `cc` on((`aa`.`id_siswa` = `cc`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_pemasukan_list`
--

/*!50001 DROP VIEW IF EXISTS `vw_pemasukan_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_pemasukan_list` AS select `a`.`tanggal_pem` AS `tanggal_pem`,`a`.`id_pem` AS `id_pem`,`a`.`kat_pem` AS `kat_pem`,`a`.`jns_pem` AS `jns_pem`,`a`.`nama_siswa` AS `nama_siswa`,`a`.`nom_pem` AS `nom_pem`,`a`.`status` AS `status` from `vw_lap_pem_spp` `a` union all select `b`.`tanggal_pem` AS `tanggal_pem`,`b`.`id_pem` AS `id_pem`,`b`.`kat_pem` AS `kat_pem`,`b`.`jns_pem` AS `jns_pem`,`b`.`nama_siswa` AS `nama_siswa`,`b`.`nom_pem` AS `nom_pem`,`b`.`status` AS `status` from `vw_lap_pem_ujian` `b` union all select `c`.`tanggal_pem` AS `tanggal_pem`,`c`.`id_pem` AS `id_pem`,`c`.`kat_pem` AS `kat_pem`,`c`.`jns_pem` AS `jns_pem`,`c`.`nama_siswa` AS `nama_siswa`,`c`.`nom_pem` AS `nom_pem`,`c`.`status` AS `status` from `vw_lap_pem_kegiatan` `c` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_sts_kegiatan_siswa`
--

/*!50001 DROP VIEW IF EXISTS `vw_sts_kegiatan_siswa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_sts_kegiatan_siswa` AS select `tb_siswa`.`id` AS `id`,`tb_siswa`.`nis_siswa` AS `nis_siswa`,`tb_siswa`.`nama_siswa` AS `nama_siswa`,`tb_siswa`.`kls_siswa` AS `kls_siswa`,`tb_siswa`.`prod_siswa` AS `prod_siswa`,`tb_jns_pem`.`id_jns` AS `id_jns`,`tb_jns_pem`.`jns_pem` AS `jns_pem`,`tb_jns_pem`.`jns_val` AS `jns_val`,`tb_pem_kegiatan`.`id_pem_keg` AS `id_pem_keg`,`tb_pem_kegiatan`.`nom_pem` AS `nom_pem`,`tb_pem_kegiatan`.`status_pem` AS `status_pem`,`tb_pem_kegiatan`.`tanggal_pem` AS `tanggal_pem`,`tb_admin`.`id_adm` AS `id_adm`,`tb_admin`.`nama_adm` AS `nama_adm` from (((`tb_pem_kegiatan` left join `tb_siswa` on((`tb_pem_kegiatan`.`id_siswa` = `tb_siswa`.`id`))) left join `tb_jns_pem` on((`tb_pem_kegiatan`.`id_keg` = `tb_jns_pem`.`id_jns`))) left join `tb_admin` on((`tb_pem_kegiatan`.`id_admin` = `tb_admin`.`id_adm`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

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
/*!50001 VIEW `vw_sts_ujian_siswa` AS select `tb_siswa`.`id` AS `id`,`tb_siswa`.`nis_siswa` AS `nis_siswa`,`tb_siswa`.`nama_siswa` AS `nama_siswa`,`tb_siswa`.`kls_siswa` AS `kls_siswa`,`tb_siswa`.`prod_siswa` AS `prod_siswa`,`tb_jns_pem`.`id_jns` AS `id_jns`,`tb_jns_pem`.`jns_pem` AS `jns_pem`,`tb_jns_pem`.`jns_val` AS `jns_val`,`tb_pem_ujian`.`id_pem_ujian` AS `id_pem_ujian`,`tb_pem_ujian`.`nom_pem` AS `nom_pem`,`tb_pem_ujian`.`status_pem` AS `status_pem`,`tb_pem_ujian`.`tanggal_pem` AS `tanggal_pem`,`tb_admin`.`id_adm` AS `id_adm`,`tb_admin`.`nama_adm` AS `nama_adm` from (((`tb_pem_ujian` left join `tb_siswa` on((`tb_pem_ujian`.`id_siswa` = `tb_siswa`.`id`))) left join `tb_jns_pem` on((`tb_pem_ujian`.`id_ujian` = `tb_jns_pem`.`id_jns`))) left join `tb_admin` on((`tb_pem_ujian`.`id_admin` = `tb_admin`.`id_adm`))) */;
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

-- Dump completed on 2024-04-09 11:37:35
