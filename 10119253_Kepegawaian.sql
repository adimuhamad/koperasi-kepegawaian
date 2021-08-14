-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: koperasi
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.34-MariaDB

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
-- Table structure for table `log_pangkat`
--

DROP TABLE IF EXISTS `log_pangkat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_pangkat` (
  `id_log` int(10) NOT NULL AUTO_INCREMENT,
  `id_pangkat` int(10) DEFAULT NULL,
  `nama_lama` varchar(100) DEFAULT NULL,
  `nama_baru` varchar(100) DEFAULT NULL,
  `gaji_lama` int(100) DEFAULT NULL,
  `gaji_baru` int(100) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_pangkat`
--

LOCK TABLES `log_pangkat` WRITE;
/*!40000 ALTER TABLE `log_pangkat` DISABLE KEYS */;
INSERT INTO `log_pangkat` VALUES (1,1,'Penasehat','Penasehat',2000000,3000000,'2021-08-14'),(2,1,'Penasehat','Pemilik',3000000,2000000,'2021-08-14'),(3,1,'Pemilik','Penasehat',2000000,2000000,'2021-08-14');
/*!40000 ALTER TABLE `log_pangkat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_tipepegawai`
--

DROP TABLE IF EXISTS `log_tipepegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_tipepegawai` (
  `id_log` int(10) NOT NULL AUTO_INCREMENT,
  `id_tipe` int(10) DEFAULT NULL,
  `nama_lama` varchar(100) DEFAULT NULL,
  `nama_baru` varchar(100) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_tipepegawai`
--

LOCK TABLES `log_tipepegawai` WRITE;
/*!40000 ALTER TABLE `log_tipepegawai` DISABLE KEYS */;
INSERT INTO `log_tipepegawai` VALUES (1,1,'Tetap','Permanen','2021-08-14');
/*!40000 ALTER TABLE `log_tipepegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_akun`
--

DROP TABLE IF EXISTS `tb_akun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_akun` (
  `idAkun` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  PRIMARY KEY (`idAkun`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_akun`
--

LOCK TABLES `tb_akun` WRITE;
/*!40000 ALTER TABLE `tb_akun` DISABLE KEYS */;
INSERT INTO `tb_akun` VALUES (1,'Admin','admin','21232f297a57a5a743894a0e4a801fc3',1);
/*!40000 ALTER TABLE `tb_akun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jadwal`
--

DROP TABLE IF EXISTS `tb_jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_jadwal` (
  `Id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `NIP` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_jadwal`),
  KEY `NIP` (`NIP`),
  CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `tb_pegawai` (`NIP`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jadwal`
--

LOCK TABLES `tb_jadwal` WRITE;
/*!40000 ALTER TABLE `tb_jadwal` DISABLE KEYS */;
INSERT INTO `tb_jadwal` VALUES (1,1111,'09:00:00','17:00:00','Tidak Ada','Masuk Kerja'),(2,2222,'08:00:00','17:00:00','Tidak Ada','Masuk Kerja'),(3,3333,'08:00:00','14:00:00','Sakit','Tidak Masuk Kerja');
/*!40000 ALTER TABLE `tb_jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_lembur`
--

DROP TABLE IF EXISTS `tb_lembur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_lembur` (
  `id_lembur` int(11) NOT NULL AUTO_INCREMENT,
  `NIP` int(11) NOT NULL,
  `mulai_lembur` time NOT NULL,
  `selesai_lembur` time NOT NULL,
  `gaji_lembur` int(11) NOT NULL,
  PRIMARY KEY (`id_lembur`),
  KEY `NIP` (`NIP`),
  CONSTRAINT `tb_lembur_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `tb_pegawai` (`NIP`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_lembur`
--

LOCK TABLES `tb_lembur` WRITE;
/*!40000 ALTER TABLE `tb_lembur` DISABLE KEYS */;
INSERT INTO `tb_lembur` VALUES (1,1111,'19:00:00','01:00:00',60000),(2,2222,'20:00:00','01:00:00',50000),(6,3333,'22:00:00','02:00:00',70000);
/*!40000 ALTER TABLE `tb_lembur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pangkat`
--

DROP TABLE IF EXISTS `tb_pangkat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pangkat` (
  `Id_pangkat` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_jabatan` varchar(50) NOT NULL,
  `Besar_gaji` int(11) NOT NULL,
  PRIMARY KEY (`Id_pangkat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pangkat`
--

LOCK TABLES `tb_pangkat` WRITE;
/*!40000 ALTER TABLE `tb_pangkat` DISABLE KEYS */;
INSERT INTO `tb_pangkat` VALUES (1,'Penasehat',2000000),(2,'Pengurus',2000000),(3,'Pengawas',2000000),(4,'Kasi Umum',1000000),(5,'Kasi Pengawas',1000000),(6,'Kasi Kredit',1000000),(7,'Kasi Keuangan',1000000),(8,'Kasi Pengembangan Bisnis',1000000);
/*!40000 ALTER TABLE `tb_pangkat` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER update_data_pangkat 
    BEFORE UPDATE 
    ON tb_pangkat
    FOR EACH ROW 
BEGIN
    INSERT INTO log_pangkat
    set id_pangkat = OLD.id_pangkat,
    nama_lama=old.Nama_jabatan,
    nama_baru=new.Nama_jabatan,
    gaji_lama=old.Besar_gaji,
    gaji_baru=new.Besar_gaji,
    waktu = NOW(); 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tb_pegawai`
--

DROP TABLE IF EXISTS `tb_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pegawai` (
  `NIP` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Telepon` varchar(16) NOT NULL,
  `Gaji_bersih` int(11) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `id_slip` int(11) NOT NULL,
  PRIMARY KEY (`NIP`),
  KEY `id_pangkat` (`id_pangkat`),
  KEY `id_tipe` (`id_tipe`),
  KEY `id_slip` (`id_slip`),
  CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`id_pangkat`) REFERENCES `tb_pangkat` (`Id_pangkat`),
  CONSTRAINT `tb_pegawai_ibfk_2` FOREIGN KEY (`id_tipe`) REFERENCES `tb_tipepegawai` (`id_tipe`),
  CONSTRAINT `tb_pegawai_ibfk_3` FOREIGN KEY (`id_slip`) REFERENCES `tb_slipgaji` (`id_slip`)
) ENGINE=InnoDB AUTO_INCREMENT=3334 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pegawai`
--

LOCK TABLES `tb_pegawai` WRITE;
/*!40000 ALTER TABLE `tb_pegawai` DISABLE KEYS */;
INSERT INTO `tb_pegawai` VALUES (1111,'Asep','Cipatat','081111111111',2000000,1,1,1),(2222,'Dudung','Cipatat','082222222222',2000000,2,1,2),(3333,'Mochamad Adi','Citatah','081572628334',1000000,6,2,16);
/*!40000 ALTER TABLE `tb_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_potongan`
--

DROP TABLE IF EXISTS `tb_potongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_potongan` (
  `id_potongan` int(11) NOT NULL AUTO_INCREMENT,
  `NIP` int(11) NOT NULL,
  `Desk_potongan` varchar(50) NOT NULL,
  `Besar_pot` int(11) NOT NULL,
  PRIMARY KEY (`id_potongan`),
  KEY `NIP` (`NIP`),
  CONSTRAINT `tb_potongan_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `tb_pegawai` (`NIP`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_potongan`
--

LOCK TABLES `tb_potongan` WRITE;
/*!40000 ALTER TABLE `tb_potongan` DISABLE KEYS */;
INSERT INTO `tb_potongan` VALUES (1,1111,'Melawan Bos',300000),(2,2222,'Telat Masuk',100000),(22,3333,'Salah memberi dokumen',100000),(23,3333,'Salah memberi dokumen',100000);
/*!40000 ALTER TABLE `tb_potongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_slipgaji`
--

DROP TABLE IF EXISTS `tb_slipgaji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_slipgaji` (
  `id_slip` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(11) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `id_pangkat` int(11) DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL,
  `tunjangan` int(11) DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `lembur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_slip`),
  KEY `nip` (`nip`),
  KEY `id_pangkat` (`id_pangkat`),
  CONSTRAINT `tb_slipgaji_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`NIP`),
  CONSTRAINT `tb_slipgaji_ibfk_2` FOREIGN KEY (`id_pangkat`) REFERENCES `tb_pangkat` (`Id_pangkat`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_slipgaji`
--

LOCK TABLES `tb_slipgaji` WRITE;
/*!40000 ALTER TABLE `tb_slipgaji` DISABLE KEYS */;
INSERT INTO `tb_slipgaji` VALUES (1,1111,'Asep',1,2000000,300000,300000,60000),(2,2222,'Dudung',2,2000000,200000,300000,50000),(16,3333,'Mochamad Adi',6,1000000,300000,200000,70000);
/*!40000 ALTER TABLE `tb_slipgaji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tipepegawai`
--

DROP TABLE IF EXISTS `tb_tipepegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_tipepegawai` (
  `id_tipe` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tipe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipe`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipepegawai`
--

LOCK TABLES `tb_tipepegawai` WRITE;
/*!40000 ALTER TABLE `tb_tipepegawai` DISABLE KEYS */;
INSERT INTO `tb_tipepegawai` VALUES (1,'Permanen'),(2,'Magang'),(3,'Pengganti');
/*!40000 ALTER TABLE `tb_tipepegawai` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER update_data_tipe
    BEFORE UPDATE
    ON tb_tipepegawai
    FOR EACH ROW 
BEGIN
    INSERT INTO log_tipepegawai
    set id_tipe = OLD.id_tipe,
    nama_lama=old.nama_tipe,
    nama_baru=new.nama_tipe,
    waktu = NOW(); 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tb_tunjangan`
--

DROP TABLE IF EXISTS `tb_tunjangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_tunjangan` (
  `Id_tunjangan` int(11) NOT NULL AUTO_INCREMENT,
  `NIP` int(11) NOT NULL,
  `Deskripsi` varchar(50) NOT NULL,
  `Besar_tunj` int(11) NOT NULL,
  PRIMARY KEY (`Id_tunjangan`),
  KEY `NIP` (`NIP`),
  CONSTRAINT `tb_tunjangan_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `tb_pegawai` (`NIP`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tunjangan`
--

LOCK TABLES `tb_tunjangan` WRITE;
/*!40000 ALTER TABLE `tb_tunjangan` DISABLE KEYS */;
INSERT INTO `tb_tunjangan` VALUES (1,1111,'Tunjangan Keluarga',300000),(2,2222,'Tunjangan Istri',200000),(5,3333,'Tunjangan Anak',300000);
/*!40000 ALTER TABLE `tb_tunjangan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-14 15:30:09
