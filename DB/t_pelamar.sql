-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2023 at 10:39 PM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1673034_hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_pelamar`
--

CREATE TABLE `t_pelamar` (
  `id` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `national` varchar(100) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `provinsi` varchar(150) DEFAULT NULL,
  `kota` varchar(150) DEFAULT NULL,
  `pendidikan` varchar(25) NOT NULL,
  `universitas` varchar(200) NOT NULL,
  `status_universitas` varchar(20) NOT NULL,
  `lokasi_univ` varchar(100) NOT NULL,
  `jurusan` varchar(200) NOT NULL,
  `jurusan_sawit` varchar(100) NOT NULL,
  `ipk` varchar(10) NOT NULL,
  `max_ipk` varchar(10) NOT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `status_pernikahan` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(200) DEFAULT NULL,
  `pekerjaan_ayah` varchar(200) DEFAULT NULL,
  `nama_ibu` varchar(200) DEFAULT NULL,
  `pekerjaan_ibu` varchar(200) DEFAULT NULL,
  `penempatan` varchar(10) DEFAULT NULL,
  `motivasi` longtext DEFAULT NULL,
  `tujuan` longtext DEFAULT NULL,
  `kelebihan` longtext DEFAULT NULL,
  `kekurangan` longtext DEFAULT NULL,
  `file_cv` varchar(150) NOT NULL,
  `file_surat` varchar(150) DEFAULT NULL,
  `fileupload` varchar(250) DEFAULT NULL,
  `fileupload2` varchar(250) DEFAULT NULL,
  `izin_orang_tua` varchar(100) DEFAULT NULL,
  `pendaftaran` varchar(100) DEFAULT NULL,
  `setuju_orang_tua` varchar(100) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan0` longtext DEFAULT NULL,
  `keterangan1` longtext DEFAULT NULL,
  `keterangan2` longtext DEFAULT NULL,
  `keterangan3` longtext DEFAULT NULL,
  `keterangan4` longtext DEFAULT NULL,
  `keterangan5` longtext DEFAULT NULL,
  `keterangan6` longtext DEFAULT NULL,
  `keterangan7` longtext DEFAULT NULL,
  `pengalaman` varchar(10) NOT NULL,
  `pengalaman_kebun` varchar(10) NOT NULL,
  `lokasi_kalimantan` varchar(10) NOT NULL,
  `tgl_interview` datetime DEFAULT NULL,
  `activation_code` varchar(50) DEFAULT NULL,
  `login_code` varchar(25) DEFAULT NULL,
  `t_job_vacant_id` int(11) NOT NULL,
  `path_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'required',
  `path_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'required',
  `path_akta_kelahiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'required',
  `path_ijasah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'required',
  `path_transkrip_nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'required',
  `path_setifikat_pelatihan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `path_surat_pengalaman_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `path_slip_gaji` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `path_npwp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'required',
  `path_bpjs_tk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `path_bpjs_kesehatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `path_buku_tabungan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `path_buku_nikah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'required',
  `path_sertifikat_vaksin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `path_skck` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `t_pelamar`
--

INSERT INTO `t_pelamar` (`id`, `tgl_input`, `email_address`, `email`, `nama_lengkap`, `fname`, `lname`, `jk`, `national`, `hp`, `tempat_lahir`, `tgl_lahir`, `alamat`, `provinsi`, `kota`, `pendidikan`, `universitas`, `status_universitas`, `lokasi_univ`, `jurusan`, `jurusan_sawit`, `ipk`, `max_ipk`, `posisi`, `status_pernikahan`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `penempatan`, `motivasi`, `tujuan`, `kelebihan`, `kekurangan`, `file_cv`, `file_surat`, `fileupload`, `fileupload2`, `izin_orang_tua`, `pendaftaran`, `setuju_orang_tua`, `tgl_update`, `updated_by`, `status`, `keterangan0`, `keterangan1`, `keterangan2`, `keterangan3`, `keterangan4`, `keterangan5`, `keterangan6`, `keterangan7`, `pengalaman`, `pengalaman_kebun`, `lokasi_kalimantan`, `tgl_interview`, `activation_code`, `login_code`, `t_job_vacant_id`, `path_foto`, `path_ktp`, `path_akta_kelahiran`, `path_ijasah`, `path_transkrip_nilai`, `path_setifikat_pelatihan`, `path_surat_pengalaman_kerja`, `path_slip_gaji`, `path_npwp`, `path_bpjs_tk`, `path_bpjs_kesehatan`, `path_buku_tabungan`, `path_buku_nikah`, `path_sertifikat_vaksin`, `path_skck`) VALUES
(1, '2023-05-18 14:44:13', 'adam.pm77@gmail.com', 'adam.pm77@gmail.com', 'Amaya Haley', 'Amaya', 'Haley', 'Female', 'WNI', '677', 'Rerum eu incididunt ', '2021-06-03', 'Dolor iure voluptati', NULL, NULL, 'DIII', '', '2', '1', 'Dolore Nam est minus', 'Y', 'Alias beat', 'Numquam mo', 'ITS', NULL, NULL, NULL, NULL, NULL, 'Jakarta', NULL, NULL, NULL, NULL, '1684421053-CV-Amaya Haley.pdf', '1684421053-SURAT LAMARAN-Amaya Haley.pdf', NULL, NULL, NULL, NULL, NULL, '2023-05-18 14:47:22', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14', '99', 'Yes', '2023-06-01 10:00:00', '1234', NULL, 7, '1684421242-FOTO-Amaya Haley.png', '1684421242-KTP-Amaya Haley.png', '1684421242-AKTA KELAHIRAN-Amaya Haley.png', '1684421242-IJASAH-Amaya Haley.png', '1684421242-TRANSKRIP NILAI-Amaya Haley.png', '1684421242-SERTIFIKAT PELATIHAN-Amaya Haley.png', '1684421242-SURAT PENGALAMAN KERJA-Amaya Haley.png', '1684421242-SLIP GAJI-Amaya Haley.png', '1684421242-NPWP-Amaya Haley.png', '1684421242-BPJS TK-Amaya Haley.png', '1684421242-BPJS KESEHATAN-Amaya Haley.png', '1684421242-BUKU TABUNGAN-Amaya Haley.png', '1684421242-BUKU NIKAH-Amaya Haley.png', '1684421242-SERTIFIKAT VAKSIN-Amaya Haley.png', '1684421242-SKCK-Amaya Haley.png'),
(2, '2023-05-18 14:53:37', 'argantrian@gmail.com', 'argantrian@gmail.com', 'argantrian  jayawijaya', 'argantrian ', 'jayawijaya', ' Male', 'WNI', '082216218301', 'sukabumi', '1985-03-15', 'Griya Sangiang Mas Jl,Melati ', NULL, NULL, 'S1/DIV', '', '1', '1', 'IT', 'Y', '3.1', '3.5', 'ITS', NULL, NULL, NULL, NULL, NULL, 'Jakarta', NULL, NULL, NULL, NULL, '1684421617-CV-argantrian  jayawijaya.pdf', '1684421617-SURAT LAMARAN-argantrian  jayawijaya.pdf', NULL, NULL, NULL, NULL, NULL, '2023-05-18 14:58:39', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '5', 'Yes', '2023-06-01 10:00:00', '1234', NULL, 7, '1684421919-FOTO-argantrian  jayawijaya.jpg', '1684421919-KTP-argantrian  jayawijaya.png', '1684421919-AKTA KELAHIRAN-argantrian  jayawijaya.jpg', '1684421919-IJASAH-argantrian  jayawijaya.png', '1684421919-TRANSKRIP NILAI-argantrian  jayawijaya.jpg', '1684421919-SERTIFIKAT PELATIHAN-argantrian  jayawijaya.jpg', '1684421919-SURAT PENGALAMAN KERJA-argantrian  jayawijaya.jpg', '1684421919-SLIP GAJI-argantrian  jayawijaya.jpg', '1684421919-NPWP-argantrian  jayawijaya.jpg', '1684421919-BPJS TK-argantrian  jayawijaya.jpg', '1684421919-BPJS KESEHATAN-argantrian  jayawijaya.jpg', '1684421919-BUKU TABUNGAN-argantrian  jayawijaya.jpg', '1684421919-BUKU NIKAH-argantrian  jayawijaya.jpg', '1684421919-SERTIFIKAT VAKSIN-argantrian  jayawijaya.jpg', '1684421919-SKCK-argantrian  jayawijaya.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_pelamar`
--
ALTER TABLE `t_pelamar`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_pelamar`
--
ALTER TABLE `t_pelamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
