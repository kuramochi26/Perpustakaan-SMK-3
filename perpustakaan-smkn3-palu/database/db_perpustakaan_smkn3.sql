-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 02:12 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan_smkn3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses_terakhir` date NOT NULL,
  `level` varchar(25) NOT NULL DEFAULT 'admin',
  `status` varchar(25) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `akses_terakhir`, `level`, `status`, `foto`) VALUES
(1, 'Administrator Perpustakaan SMKN 3 Palu', 'administrator', 'a8111e28e35339cf086a01c5c8a3416a', '2019-10-08', 'super admin', 'aktif', ''),
(2, 'Khaiurl Insan Karim', 'khairul26', 'ce919b64671811b0d97d08994a872194', '2019-12-10', 'admin', 'aktif', '');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penerbit_buku` varchar(50) NOT NULL,
  `penulis_buku` varchar(50) NOT NULL,
  `tahun_terbit` varchar(5) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto_buku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bukutamuguru`
--

CREATE TABLE `bukutamuguru` (
  `id_tamuguru` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_berkunjung` date NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bukutamusiswa`
--

CREATE TABLE `bukutamusiswa` (
  `id_tamusiswa` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `tanggal_berkunjung` date NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'teknik gambar bangunan'),
(2, 'bisnis konstruksi dan properti'),
(3, 'rekayasa perangkat lunak'),
(4, 'teknik komputer dan jaringan'),
(5, 'teknik elektromagnetika industri'),
(6, 'teknik instalasi tenaga listrik'),
(7, 'teknik kendaraan ringan'),
(8, 'teknik sepeda motor'),
(9, 'teknik permesinan'),
(10, 'teknik las'),
(11, 'teknik audio video'),
(12, 'teknik geomatika');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'pelajaran'),
(2, 'novel'),
(3, 'ensiklopedia'),
(4, 'kamus');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(2, 'X B'),
(3, 'XI A'),
(4, 'XI B'),
(5, 'XII A'),
(6, 'XII B'),
(9, 'X A');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_guru`
--

CREATE TABLE `transaksi_guru` (
  `id_transaksiguru` int(11) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_harus_kembali` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` int(11) NOT NULL,
  `terlambat` int(8) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Dipinjam',
  `jumlah_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_kelas`
--

CREATE TABLE `transaksi_kelas` (
  `id_transaksikelas` int(11) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_harus_kembali` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` int(11) NOT NULL,
  `terlambat` int(8) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Dipinjam',
  `jumlah_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_siswa`
--

CREATE TABLE `transaksi_siswa` (
  `id_transaksisiswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_harus_kembali` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` int(11) NOT NULL,
  `terlambat` int(8) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Dipinjam',
  `jumlah_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `bukutamuguru`
--
ALTER TABLE `bukutamuguru`
  ADD PRIMARY KEY (`id_tamuguru`);

--
-- Indexes for table `bukutamusiswa`
--
ALTER TABLE `bukutamusiswa`
  ADD PRIMARY KEY (`id_tamusiswa`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `transaksi_guru`
--
ALTER TABLE `transaksi_guru`
  ADD PRIMARY KEY (`id_transaksiguru`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `transaksi_kelas`
--
ALTER TABLE `transaksi_kelas`
  ADD PRIMARY KEY (`id_transaksikelas`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `transaksi_siswa`
--
ALTER TABLE `transaksi_siswa`
  ADD PRIMARY KEY (`id_transaksisiswa`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_buku_2` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bukutamuguru`
--
ALTER TABLE `bukutamuguru`
  MODIFY `id_tamuguru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bukutamusiswa`
--
ALTER TABLE `bukutamusiswa`
  MODIFY `id_tamusiswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi_guru`
--
ALTER TABLE `transaksi_guru`
  MODIFY `id_transaksiguru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_kelas`
--
ALTER TABLE `transaksi_kelas`
  MODIFY `id_transaksikelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_siswa`
--
ALTER TABLE `transaksi_siswa`
  MODIFY `id_transaksisiswa` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
