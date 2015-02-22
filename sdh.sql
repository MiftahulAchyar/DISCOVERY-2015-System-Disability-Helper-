-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Feb 2015 pada 00.48
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `i_boy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `albana`
--

CREATE TABLE IF NOT EXISTS `albana` (
`id` int(10) NOT NULL,
  `nama_albana` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `pemilik` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data untuk tabel `albana`
--

INSERT INTO `albana` (`id`, `nama_albana`, `foto`, `pemilik`, `posisi`, `kategori`) VALUES
(20, 'Kursi Roda', 'albana8.jpg', 'Labba Awwabi', 'Surabaya', 'alat_gerak'),
(21, 'Buku Braille', 'albana9.jpg', 'Labba Awwabi', 'Mojokerto Kota', 'lainnya'),
(22, 'Tongkat Bantu Berjalan', 'albana10.jpg', 'danu', 'Gresik', 'alat_gerak'),
(23, 'Qur''an Braille', 'albana11.jpg', 'Labba Awwabi', 'Jombang', 'lainnya'),
(24, 'Kursi Roda', 'albana12.jpg', 'danu', 'Mojokerto Kabupaten', 'alat_gerak'),
(25, 'Alat Bantu Mendengar', 'albana13.jpg', 'danu', 'Yogyakarta', 'pendengaran'),
(26, 'Kaki Palsu', 'albana14.jpg', 'Labba Awwabi', 'Medan', 'alat_gerak'),
(27, 'Tangan Palsu', 'albana15.jpg', 'Labba Awwabi', 'Surabaya', 'alat_gerak'),
(28, 'Kaki 4', 'albana16.jpg', 'Labba Awwabi', 'Lampung', 'alat_gerak'),
(29, 'Kaki Palsu', 'albana17.jpg', 'danu', 'Jember', 'alat_gerak'),
(34, 'Buku Untuk berlatih membaca', 'albana3.jpg', 'danu', 'Surabaya', 'penglihatan'),
(35, 'Buku belajar membaca Al-quran', 'albana4.jpg', 'danu', 'Surabaya', 'penglihatan'),
(36, 'Alat bantu mendengar', 'albana5.jpg', 'danu', 'mojokerto', 'pendengaran'),
(37, 'Tongkat berjalan', 'albana6.jpg', 'Ahmad Nabil', 'Surabaya', 'alat_gerak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_albana`
--

CREATE TABLE IF NOT EXISTS `kategori_albana` (
`id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `kategori_albana`
--

INSERT INTO `kategori_albana` (`id`, `nama`) VALUES
(3, 'alat_gerak'),
(4, 'lainnya'),
(5, 'lainnya'),
(2, 'pendengaran'),
(1, 'penglihatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pelatihan`
--

CREATE TABLE IF NOT EXISTS `kategori_pelatihan` (
`id` int(3) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `kategori_pelatihan`
--

INSERT INTO `kategori_pelatihan` (`id`, `nama_kategori`) VALUES
(1, 'Elektronika'),
(2, 'Informatika'),
(3, 'Keterampilan'),
(5, 'Komunikasi'),
(4, 'Seni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan`
--

CREATE TABLE IF NOT EXISTS `pelatihan` (
`id` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` text NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `banner` text NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `biaya` int(10) NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data untuk tabel `pelatihan`
--

INSERT INTO `pelatihan` (`id`, `judul`, `tanggal`, `tempat`, `penyelenggara`, `banner`, `kategori`, `biaya`, `kontak`, `detail`) VALUES
(27, 'Pelaihan Memasak', '2015-02-28', 'Balai Desa Mulyosari Surabaya', 'PT.Karnivora', 'pelatihan.jpg', 'Keterampilan', 0, '083210998765', 'Pelatihan Memasak untuk penyandang disabilitas dengan tema kreativitas untuk bangkit dan maju'),
(28, 'Workshop Komputer', '2015-03-07', 'Gedung Serbaguna Mojokerto', 'Pemerintah Kota Mojokerto', 'pelatihan1.jpg', 'Elektronika', 0, '089445786789', 'Melatih Keterampilan Elektronika untuk penyandang disabiitas agar dapat menambah pengalaman dan mendapat pekerjaan . harap membawa alat yang dibutuhkan . kunjungi www.workshopku.com'),
(32, 'Pelatihan Public Speaking', '2015-05-08', 'Graha Surya Mojokerto', 'Pemerintah Kabupaten Mojokerto', 'pelatihan5.jpg', 'Komunikasi', 0, '081654889039', 'Pelatihan berkomunikasi di depan publik bagi penyandang disabilitas agar dapat beradaptasi dan berkembang di tengah masyarakat'),
(33, 'Pelatihan Fotografi', '2015-02-21', 'PENS', 'BEM PENS', 'pelatihan6.jpg', 'Seni', 0, '086574890998', 'Mengasah Keterampilan seni fotografi bagi penyandang disabilitas agar dapat mengembangkan kemampuannya  dibidang  Fotografi'),
(34, 'Pelatihan Penggunaan Software Microsoft Offioce', '2015-02-22', 'Lab. SI PENS', 'Microsoft Indonesia Bekerjasama dengan PENS', 'pelatihan7.jpg', 'Informatika', 20000, '085746675898', 'Pelatiohan untuk membantu penyandang disabilitas untuk menambah keahlian di bidang administrasi dengan Microsoft Office'),
(35, 'Pelatihan Memasak', '2015-02-20', 'Asrama PENS', 'Agung Kurniawan', 'pelatihan8.jpg', 'Keterampilan', 0, '085749465253', 'Pelatihan Memasak Untuk Penyandang disabilitas'),
(36, 'Pelatihan Menjahit', '2015-02-23', 'Balai Desa Unggahan Kab.Mojokerto', 'Pemerintah Kabupaten Mojokerto', 'pelatihan9.jpg', 'Keterampilan', 0, '089756453892', 'Pelatihan Untuk meningatkat Kemampuan Penyandang disabilitas agar memiliki keterampilan dalam bidang menjahit'),
(37, 'Workshop Keterampilan Komputer', '2015-02-19', 'Institut Teknologi Sepuluh November', 'ITS', 'pelatihan10.jpg', 'Informatika', 20000, '085746389934', 'Mengasah Keterampilan Penyandang disabilitas dalam bidanginformatika yang merupakan tren di era kini');

-- --------------------------------------------------------

--
-- Struktur dari tabel `super_user`
--

CREATE TABLE IF NOT EXISTS `super_user` (
`id` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `institusi` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `super_user`
--

INSERT INTO `super_user` (`id`, `nama`, `password`, `email`, `telp`, `foto`, `tgl_lahir`, `alamat`, `institusi`) VALUES
(1, 'Agung Kurniawan', 'e59cd3ce33a68f536c19fedb82a7936f', 'upload.kurniawan@gmail.com', '085749465253', 'asset/img/foto/i_boy.jpg', '1995-02-24', 'Dsn. Unggahan RT.03 RW.08 Ds.Banjaragung Kec.Puri Kab.Mojokerto', 'PENS'),
(2, 'Miftahul Achyar', '2b36561620fdc70b52ee50f90865071a', 'achyar@gmail.com', '085749876451', 'achyar.jpg', '1997-04-17', 'Surabaya', 'PENS'),
(3, 'Avida Endriani', 'a38e2468ad9968a006691f250e5572f0', 'avida@gmail.com', '085746389098', 'avida.jpg', '1996-02-16', 'Bratang Surabaya', 'PENS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE IF NOT EXISTS `tanggapan` (
`id` int(11) NOT NULL,
  `judul_tautan` varchar(50) NOT NULL,
  `isi_tanggapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `email`, `telp`) VALUES
(6, 'danu', 'danu', 'danu@yahoo.com', '085723499875'),
(7, 'Labba Awwabi', 'abi', 'abi@gmail.com', '08956748590'),
(9, 'budi', 'budi', 'budi@gmail.com', '085767465783'),
(11, 'Ahmad Nabil', 'nabil', 'nabil@yahoo.com', '01234'),
(12, 'Huda', 'huda', 'huda@ymail.com', '085767894857'),
(13, 'Gugun Gunawan', 'gugun', 'gugun@gmail.com', '089576890904'),
(14, 'ee', 'ee', 'sfsd@f.com', 'werwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albana`
--
ALTER TABLE `albana`
 ADD PRIMARY KEY (`id`), ADD KEY `kategori` (`kategori`), ADD KEY `pemilik` (`pemilik`);

--
-- Indexes for table `kategori_albana`
--
ALTER TABLE `kategori_albana`
 ADD PRIMARY KEY (`id`), ADD KEY `nama` (`nama`);

--
-- Indexes for table `kategori_pelatihan`
--
ALTER TABLE `kategori_pelatihan`
 ADD PRIMARY KEY (`id`), ADD KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
 ADD PRIMARY KEY (`id`), ADD KEY `penyelenggara` (`penyelenggara`,`kategori`), ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `super_user`
--
ALTER TABLE `super_user`
 ADD PRIMARY KEY (`id`), ADD KEY `institusi` (`institusi`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
 ADD PRIMARY KEY (`id`), ADD KEY `judul_tautan` (`judul_tautan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD KEY `nama` (`nama`), ADD KEY `nama_2` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albana`
--
ALTER TABLE `albana`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `kategori_albana`
--
ALTER TABLE `kategori_albana`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori_pelatihan`
--
ALTER TABLE `kategori_pelatihan`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `super_user`
--
ALTER TABLE `super_user`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `albana`
--
ALTER TABLE `albana`
ADD CONSTRAINT `albana_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori_albana` (`nama`);

--
-- Ketidakleluasaan untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
ADD CONSTRAINT `pelatihan_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori_pelatihan` (`nama_kategori`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
