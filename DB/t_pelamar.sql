/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100425 (10.4.25-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : u1673034_hrm

 Target Server Type    : MySQL
 Target Server Version : 100425 (10.4.25-MariaDB)
 File Encoding         : 65001

 Date: 18/05/2023 21:43:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_pelamar
-- ----------------------------
DROP TABLE IF EXISTS `t_pelamar`;
CREATE TABLE `t_pelamar`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tgl_input` datetime NOT NULL,
  `email_address` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_lengkap` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fname` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jk` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `national` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat_lahir` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `provinsi` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kota` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pendidikan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `universitas` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_universitas` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lokasi_univ` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jurusan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jurusan_sawit` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ipk` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `max_ipk` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `posisi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pernikahan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_ayah` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan_ayah` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_ibu` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan_ibu` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `penempatan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `motivasi` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tujuan` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `kelebihan` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `kekurangan` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `file_cv` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `file_surat` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fileupload` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fileupload2` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `izin_orang_tua` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pendaftaran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `setuju_orang_tua` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_update` datetime NULL DEFAULT NULL,
  `updated_by` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan0` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `keterangan1` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `keterangan2` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `keterangan3` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `keterangan4` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `keterangan5` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `keterangan6` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `keterangan7` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `pengalaman` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pengalaman_kebun` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lokasi_kalimantan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_interview` datetime NULL DEFAULT NULL,
  `activation_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `t_job_vacant_id` int NOT NULL,
  `path_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'required',
  `path_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'required',
  `path_akta_kelahiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'required',
  `path_ijasah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'required',
  `path_transkrip_nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'required',
  `path_setifikat_pelatihan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `path_surat_pengalaman_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `path_slip_gaji` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `path_npwp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'required',
  `path_bpjs_tk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `path_bpjs_kesehatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `path_buku_tabungan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `path_buku_nikah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'required',
  `path_sertifikat_vaksin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `path_skck` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pelamar
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
