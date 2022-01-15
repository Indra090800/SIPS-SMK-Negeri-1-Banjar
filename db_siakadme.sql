-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2022 at 10:56 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siakadme`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id_agenda` int(11) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `agenda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id_agenda`, `waktu`, `agenda`) VALUES
(1, 'Rabu, 08 Desember 2021', 'Pembuatan Kalender Akademik SIPS SMK NEGERI 1 BANJAR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `edisi` varchar(50) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `kolasi` varchar(255) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `tempat_terbit` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `sumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `judul_buku`, `pengarang`, `edisi`, `isbn`, `kolasi`, `penerbit`, `tahun_terbit`, `tempat_terbit`, `stok`, `sumber`) VALUES
(4, '10 Jenis Koneksi Delphi Ke Database', 'Euis Marlina', 'Ed. 1', '978-979-1078-73-3', 'viii + 125 hlm; 14 x 21 cm', 'Grava Media', '2009', 'Yogyakarta', 20, 'Hibah Pemerintah'),
(5, '17 Jurus Mempelajari MYOB Accounting 17', 'Ali Imron, Editor: Theresia Ari Prabawati', 'Ed. 1', '978-979-29-0682-0', 'xii + 316 hlm,; 20 x 28 cm', 'Andi Offset', '2009', 'Yogyakarta', 20, 'Gramedia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `kode_dosen` varchar(10) DEFAULT NULL,
  `nidn` varchar(10) DEFAULT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `foto_dosen` varchar(255) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `kode_dosen`, `nidn`, `nama_dosen`, `foto_dosen`, `password`, `alamat`, `no_hp`) VALUES
(1, 'DSN00001', '09082000', 'Iptu Indra Maulana, S.Kom, M.Kom', '1629797453_7569bdd8b8d739f9bc7c.jpg', '12345678', 'Banjar, Jabar 46321', '082216206676'),
(2, 'DSN00002', '09082001', 'Letda Indra Maulana, S.Kom, M,Kom', '1640068668_90f01069d7e3d88a68f7.jpg', 'admin', 'Tasikmalaya', '089663366710'),
(8, 'DSN00005', '09082005', 'Indra Maulana, S.Kom', '1640068611_0dc0a7062115538d36e7.jpg', '090800ia', 'Garut', '082118471055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gedung`
--

CREATE TABLE `tbl_gedung` (
  `id_gedung` int(3) NOT NULL,
  `gedung` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gedung`
--

INSERT INTO `tbl_gedung` (`id_gedung`, `gedung`) VALUES
(1, 'Gedung A'),
(2, 'Gedung C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_prodi` int(3) DEFAULT NULL,
  `id_ta` int(4) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_matkul` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `id_ruangan` int(3) DEFAULT NULL,
  `quota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_prodi`, `id_ta`, `id_kelas`, `id_matkul`, `id_dosen`, `hari`, `waktu`, `id_ruangan`, `quota`) VALUES
(7, 5, 5, 1, 9, 8, 'Senin', '10.00-11.30', 8, 40),
(8, 2, 5, 6, 3, 8, 'Senin', '10.00-11.30', 4, 40),
(9, 5, 5, 1, 11, 8, 'Kamis', '08:00 - 10:00', 1, 32),
(11, 5, 5, 1, 11, 1, 'Rabu', '08:00 - 10:00', 3, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(2) NOT NULL,
  `jurusan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Informatika'),
(10, 'Ilmu Pemerintahan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `id_prodi` int(3) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `tahun_angkatan` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `id_prodi`, `id_dosen`, `tahun_angkatan`) VALUES
(1, 'SI-A', 5, 1, 2020),
(6, 'TS-A', 2, 2, 2021),
(7, 'RPL-1', 1, 8, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `id_krs` int(11) NOT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `p1` int(1) DEFAULT 0,
  `p2` int(1) DEFAULT 0,
  `p3` int(1) DEFAULT 0,
  `p4` int(1) DEFAULT 0,
  `p5` int(1) DEFAULT 0,
  `p6` int(1) DEFAULT 0,
  `p7` int(1) DEFAULT 0,
  `puts` int(1) DEFAULT 0,
  `p8` int(1) DEFAULT 0,
  `p9` int(1) DEFAULT 0,
  `p10` int(1) DEFAULT 0,
  `p11` int(1) DEFAULT 0,
  `p12` int(1) DEFAULT 0,
  `p13` int(1) DEFAULT 0,
  `p14` int(1) DEFAULT 0,
  `puas` int(1) DEFAULT 0,
  `nilai_tugas` int(3) NOT NULL DEFAULT 0,
  `nilai_uts` int(3) NOT NULL DEFAULT 0,
  `nilai_uas` int(3) NOT NULL DEFAULT 0,
  `nilai_akhir` int(3) NOT NULL DEFAULT 0,
  `huruf` varchar(1) NOT NULL DEFAULT '-',
  `bobot` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_krs`
--

INSERT INTO `tbl_krs` (`id_krs`, `id_mhs`, `id_jadwal`, `id_ta`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `puts`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `puas`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `huruf`, `bobot`) VALUES
(12, 13, 8, 5, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 85, 75, 86, 86, 'A', 4),
(13, 20, 7, 5, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 90, 90, 70, 84, 'B', 3),
(14, 5, 9, 5, 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 90, 90, 90, 91, 'A', 4),
(15, 2, 6, 5, 2, 2, 2, 2, 2, 2, 2, 2, 2, 1, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(16, 20, 9, 5, 0, 2, 2, 2, 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 65, 87, 85, 82, 'B', 3),
(17, 15, 6, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', 0),
(19, 5, 7, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 100, 100, 80, 'B', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matkul`
--

CREATE TABLE `tbl_matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(10) DEFAULT NULL,
  `matkul` varchar(255) DEFAULT NULL,
  `sks` int(1) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `smt` int(1) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `id_prodi` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_matkul`
--

INSERT INTO `tbl_matkul` (`id_matkul`, `kode_matkul`, `matkul`, `sks`, `kategori`, `smt`, `semester`, `id_prodi`) VALUES
(3, 'PDS131', 'Pemograman Dasar', 3, 'Wajib', 1, 'Ganjil', 2),
(5, 'ALR767', 'Aljabar Linier', 2, 'Wajib', 3, 'Ganjil', 2),
(7, 'BIN787', 'Bahasa Inggris', 3, 'Pilihan', 2, 'Genap', 2),
(8, 'MMA134', 'Multimedia & Animasi', 2, 'Wajib', 4, 'Genap', 1),
(9, 'DMG1243', 'Data Mining', 2, 'Wajib', 5, 'Ganjil', 5),
(10, 'DMG1241', 'Data Mining', 2, 'Wajib', 5, 'Ganjil', 1),
(11, 'MIF123', 'Manajemen Informatika', 2, 'Wajib', 3, 'Ganjil', 5),
(12, 'BING77', 'Bahasa Inggris', 2, 'Wajib', 5, 'Ganjil', 1),
(13, 'BI090', 'B.Inggris', 1, 'Pilihan', 3, 'Ganjil', 1),
(14, 'BIN0098', 'B. Indonesia', NULL, 'Wajib', 5, 'Ganjil', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `nama_mhs` varchar(50) DEFAULT NULL,
  `id_prodi` int(3) DEFAULT NULL,
  `foto_mhs` varchar(255) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `no_hp_siswa` varchar(15) DEFAULT NULL,
  `alamat_siswa` varchar(50) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_anggota` varchar(50) DEFAULT 'null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mhs`
--

INSERT INTO `tbl_mhs` (`id_mhs`, `nim`, `nama_mhs`, `id_prodi`, `foto_mhs`, `password`, `no_hp_siswa`, `alamat_siswa`, `id_kelas`, `id_anggota`) VALUES
(1, '432007006190108', 'Indra Maulana', 1, 'sa.jpg', '090800ia', '082118471055', 'Banjar', 7, '432007006190108'),
(2, '432007006190057', 'Andri Mulyana', 1, '1629783930_0e3ccf8f5d28f383738d.jpg', '90800', NULL, NULL, 7, NULL),
(3, '432007006190060', 'Irdan Nugraha', 1, NULL, '090800ia', '', '', 7, '432007006190060'),
(4, '432007006190109', 'Ariana Aryunita', 1, NULL, 'admin', NULL, NULL, 8, NULL),
(5, '432007006190058', 'Annisa Ayu Safitri', 5, '1639537501_5cc0dd9c4dd53f11cf45.jpg', 'admin', '082216206675', 'Banjar, Jabar 4321', 1, '12'),
(6, '432007006190059', 'Akmal Pratama Yusuf', 1, NULL, 'admin', '082216206676', 'Banjar, Jabar 43', 8, '432007006190059'),
(7, '432007006190110', 'Akmal Zamzam N', 1, NULL, 'admin', NULL, NULL, 8, NULL),
(8, '432007006190061', 'Hegar Raka Anugrah', 1, NULL, '', '', '', 8, '432007006190061'),
(9, '432007006190062', 'Ragil Ramdani', 2, '1639537706_5551bf3738c636aa0f4a.jpg', 'admin', '90801210', 'Banjar', 6, NULL),
(10, '432007006190063', 'Risli Mahara Nurjamil', 2, '1639538213_c231582570844d55cf20.jpg', 'admin', '90801210', 'Cimenyan II RT 003/008 Mekarsari Banjarsari', 6, '432007006190063'),
(11, '432007006190064', 'Ikbal Ros Prayoga', 2, NULL, 'admin', NULL, NULL, 6, NULL),
(12, '432007006190065', 'Bella Nabila', 2, NULL, 'admin', NULL, NULL, 6, NULL),
(13, '432007006190103', 'Trio Azmi', 2, '1631673250_1c7adb4c7e6f7746ac73.jpg', 'admin', NULL, NULL, 6, NULL),
(14, '432007006190066', 'Hesti Pujiyanti Regina', 1, NULL, 'admin', NULL, NULL, 7, NULL),
(15, '432007006190067', 'Imaniatul Wafa Badruzaman', 1, NULL, 'admin', NULL, NULL, 7, NULL),
(16, '432007006190068', 'Fiqri Syahid Harmal', 1, NULL, 'admin', NULL, NULL, 8, NULL),
(17, '432007006190069', 'Nopi Mel Setiawati', 1, NULL, 'admin', NULL, NULL, 8, NULL),
(18, '432007006190070', 'Dea Andriani', 1, NULL, 'admin', NULL, NULL, 7, NULL),
(19, '432007006190071', 'Anisa Nurfadila', 1, NULL, 'admin', '', '', 8, '432007006190071'),
(20, '432007006190101', 'Asep Nursamsi', 2, '1631673442_7f72b05cd29c536b7e14.jpg', 'admin', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelayanan`
--

CREATE TABLE `tbl_pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `isi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelayanan`
--

INSERT INTO `tbl_pelayanan` (`id_pelayanan`, `nama`, `email`, `subject`, `isi`) VALUES
(1, 'Indra Maulana', 'indramaulana.9c@gmail.com', 'Pembuatan Web SIPS', 'Pembuatan ini dikhusukan buat program Kerja Praktek (KP)\r\n\r\n'),
(4, 'Indra Maulana', 'erzawalian475@gmail.com', 'Tugas1', 'Hai..'),
(5, 'Indra Maulana', 'erzawalian475@gmail.com', 'Tugas1', 'Cok');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perpus`
--

CREATE TABLE `tbl_perpus` (
  `id_perpus` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `kembali` varchar(20) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Belum dikembalikan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_perpus`
--

INSERT INTO `tbl_perpus` (`id_perpus`, `id_buku`, `id_anggota`, `waktu`, `kembali`, `id_petugas`, `status`) VALUES
(16, 5, '432007006190108', '2022-01-11', '2022-02-09', 2, 'Belum dikembalikan'),
(17, 4, '432007006190060', '2022-01-11', '2022-02-09', 2, 'Belum dikembalikan'),
(18, 5, '432007006190061', '2022-01-11', '2022-02-10', 2, 'Belum dikembalikan'),
(19, 4, '432007006190061', '2022-01-11', '2022-02-10', 2, 'Belum dikembalikan'),
(20, 4, '432007006190108', '2022-01-11', '2022-02-10', 1, 'Belum dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `tugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `tugas`) VALUES
(1, 'Indra Maulana', 'Senin - Rabu'),
(2, 'Andri Mulyana', 'Kamis - Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` int(3) NOT NULL,
  `id_jurusan` int(3) DEFAULT NULL,
  `kode_prodi` varchar(10) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `jenjang` varchar(10) NOT NULL,
  `ka_prodi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `id_jurusan`, `kode_prodi`, `prodi`, `jenjang`, `ka_prodi`) VALUES
(1, 1, 'RPL', 'Rekayasa Perangkat Lunak', '', 'Indra Maulana, S.Kom'),
(2, 10, 'TS', 'Teknik Sipil', 'S1', 'Letda Indra Maulana, S.Kom, M,Kom'),
(5, 1, 'SI', 'Sistem Informasi', 'S1', 'Iptu Indra Maulana, S.Kom, M.Kom');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` int(3) NOT NULL,
  `id_gedung` int(3) DEFAULT NULL,
  `ruangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruangan`, `id_gedung`, `ruangan`) VALUES
(1, 1, 'A1'),
(2, 1, 'A2'),
(3, 1, 'A3'),
(4, 1, 'A4'),
(5, 1, 'A5'),
(7, 1, 'Lab A1'),
(8, 1, 'Lab A2'),
(10, 1, 'A6'),
(11, 2, 'C1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ta`
--

CREATE TABLE `tbl_ta` (
  `id_ta` int(4) NOT NULL,
  `ta` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ta`
--

INSERT INTO `tbl_ta` (`id_ta`, `ta`, `semester`, `status`) VALUES
(1, '2020/2021', 'Ganjil', 0),
(2, '2020/2021', 'Genap', 0),
(4, '2021/2022', 'Genap', 0),
(5, '2021/2022', 'Ganjil', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(20) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `photo`) VALUES
(1, 'Indra Maulana', 'admin', 'admin', 'sa.jpg'),
(3, 'Andri Mulyana', 'andrim09', 'admin', '1628753762_825776dc5ea955aa052f.jpg'),
(6, 'Indra', 'indra', 'indra', '1628429186_68328ab25c5c11f5342b.jpg'),
(7, 'Andri Mulyana', 'andri', 'andri', '1628753905_896355323338c5b113b0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tbl_pelayanan`
--
ALTER TABLE `tbl_pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `tbl_perpus`
--
ALTER TABLE `tbl_perpus`
  ADD PRIMARY KEY (`id_perpus`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tbl_ta`
--
ALTER TABLE `tbl_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  MODIFY `id_gedung` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_pelayanan`
--
ALTER TABLE `tbl_pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_perpus`
--
ALTER TABLE `tbl_perpus`
  MODIFY `id_perpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_ta`
--
ALTER TABLE `tbl_ta`
  MODIFY `id_ta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
