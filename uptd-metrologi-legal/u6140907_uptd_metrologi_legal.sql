-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Bulan Mei 2022 pada 09.29
-- Versi server: 10.5.15-MariaDB-cll-lve
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u6140907_uptd_metrologi_legal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_03_10_044149_create_tb_pengujian_table', 1),
(5, '2022_03_10_044349_create_tb_pengujian_alat_table', 1),
(6, '2022_03_10_044357_create_tb_pengujian_penguji_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengujian`
--

CREATE TABLE `tb_pengujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pengujian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alat_ukur_yang_diuji` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemilik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_pemilik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pengujian` date DEFAULT NULL,
  `metoda_pengujian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `standar_pengujian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_pengujian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berlaku_sampai_dengan` date DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_pengujian`
--

INSERT INTO `tb_pengujian` (`id`, `nomor_pengujian`, `alat_ukur_yang_diuji`, `pemilik`, `alamat_pemilik`, `tanggal_pengujian`, `metoda_pengujian`, `standar_pengujian`, `hasil_pengujian`, `berlaku_sampai_dengan`, `telepon`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '510.3/.157/Disperindag', '7 (tujuh) unit Timbangan Elektronik', 'PT. INTIMAS SURYA', 'Jl. Ikan Tuna Raya, Kelurahan Pedungan - Denpasar Selatan', '2022-02-04', 'Perbandingan Langsung', 'Anak Timbangan Standar', 'Disahkan Untuk Tera Ulang Tahun 2022 berdasarkan Undang-Undang RI No. 2 Tahun 1981 tentang Metrologi Legal', '2022-02-01', '6283114403610', 1000000, NULL, '2022-05-10 19:13:16', '2022-05-10 19:13:16'),
(2, '5555555', 'gygygy', 'fgfyfy', 'jjhjhj', '2022-05-12', 'kkkk', 'hhhh', 'gggg', '2022-05-26', '098765544', 20, '2022-05-10 19:21:36', '2022-05-10 19:21:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengujian_alat`
--

CREATE TABLE `tb_pengujian_alat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengujian_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_uttp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_alat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kapasitas_skala_terkecil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merk_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_seri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_pengujian_alat`
--

INSERT INTO `tb_pengujian_alat` (`id`, `pengujian_id`, `jenis_uttp`, `nama_alat`, `kapasitas_skala_terkecil`, `merk_model`, `no_seri`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Alat Ukur Panjang', 'Nama Alat', '10 kg / 0,005 kg', 'AND / SK - 10 KWP', 'No. 1', 'Sah \"22\"', NULL, NULL, NULL),
(2, 1, 'Alat Ukur Panjang', 'Nama Alat', '1000 g / 0,5 g', 'AND / SK - 1000 WP', 'No. 1 C', 'Sah \"22\"', NULL, NULL, NULL),
(3, 1, 'Alat Ukur Panjang', 'Nama Alat', '20 kg / 0,01 kg', 'AND / SK - 20 KWP', 'No. 2', 'Sah \"22\"', NULL, NULL, NULL),
(4, 1, 'Alat Ukur Panjang', 'Nama Alat', '1000 g / 0,5 g', 'AND / SK - 1000 WP', 'No. 11', 'Sah \"22\"', NULL, NULL, NULL),
(5, 1, 'Alat Ukur Panjang', 'Nama Alat', '5000 g / 1 g', 'AND / SK - 5001 WP', 'No. 5', 'Sah \"22\"', NULL, NULL, NULL),
(6, 1, 'Alat Ukur Panjang', 'Nama Alat', '150 kg / 5 g', 'EXCELLENT / A12E', 'No. 21', 'Sah \"22\"', NULL, NULL, NULL),
(7, 1, 'Alat Ukur Panjang', 'Nama Alat', '20 kg / 0,1 kg', 'AND / SK - 20 KWP', 'No. 18', 'Sah \"22\"', NULL, NULL, NULL),
(8, 1, 'Alat Ukur Massa', 'henher', '130 kg', '-', '-', 'sah 22', '2022-03-17 18:54:09', '2022-03-17 18:54:09', NULL),
(9, 2, 'Alat Ukur Massa', 'gggfggf', 'hhhhhh', 'ggggg', 'jjjj6555', 'sah', '2022-05-10 19:24:20', '2022-05-10 19:24:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengujian_penguji`
--

CREATE TABLE `tb_pengujian_penguji` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengujian_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_pengujian_penguji`
--

INSERT INTO `tb_pengujian_penguji` (`id`, `pengujian_id`, `nama`, `nip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'I Wayan Suta, SH', '196212311983021064', NULL, NULL, NULL),
(2, 1, 'I Wayan Suta, SH', '197012311991031031', NULL, NULL, NULL),
(3, 2, 'hhhhhh', '12344555', '2022-05-10 19:23:53', '2022-05-10 19:23:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) DEFAULT 1,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `image`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$F6lIrItWxXcVL4jGEji4o.fhOFKLwOg1BltaeIw4pvPbPmBnUhoTC', 0, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tb_pengujian`
--
ALTER TABLE `tb_pengujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengujian_alat`
--
ALTER TABLE `tb_pengujian_alat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pengujian_alat_pengujian_id_foreign` (`pengujian_id`);

--
-- Indeks untuk tabel `tb_pengujian_penguji`
--
ALTER TABLE `tb_pengujian_penguji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pengujian_penguji_pengujian_id_foreign` (`pengujian_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pengujian`
--
ALTER TABLE `tb_pengujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pengujian_alat`
--
ALTER TABLE `tb_pengujian_alat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pengujian_penguji`
--
ALTER TABLE `tb_pengujian_penguji`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pengujian_alat`
--
ALTER TABLE `tb_pengujian_alat`
  ADD CONSTRAINT `tb_pengujian_alat_pengujian_id_foreign` FOREIGN KEY (`pengujian_id`) REFERENCES `tb_pengujian` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pengujian_penguji`
--
ALTER TABLE `tb_pengujian_penguji`
  ADD CONSTRAINT `tb_pengujian_penguji_pengujian_id_foreign` FOREIGN KEY (`pengujian_id`) REFERENCES `tb_pengujian` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
