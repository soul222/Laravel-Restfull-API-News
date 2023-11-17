-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2023 pada 08.12
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita_managament`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `authors`
--

INSERT INTO `authors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Soultan Amirul Mukminin', '2023-11-16 22:02:15', '2023-11-16 22:02:15'),
(2, 'Reski Junaidi Shalad', '2023-11-16 22:02:55', '2023-11-16 22:02:55'),
(3, 'Syayid Muhammad Akbar', '2023-11-16 22:03:15', '2023-11-16 22:03:15'),
(4, 'Muhammad Radithya Alif', '2023-11-16 22:03:39', '2023-11-16 22:03:39'),
(5, 'Rika Rahma', '2023-11-16 22:03:49', '2023-11-16 22:03:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Teknologi', '2023-11-16 22:04:38', '2023-11-16 22:04:38'),
(2, 'Otomotif', '2023-11-16 22:04:54', '2023-11-16 22:04:54'),
(4, 'Kesehatan', '2023-11-16 22:05:19', '2023-11-16 22:05:19'),
(5, 'National', '2023-11-16 22:05:33', '2023-11-16 22:05:33'),
(6, 'Finance', '2023-11-16 22:31:11', '2023-11-16 22:31:11'),
(7, 'Sport', '2023-11-16 22:31:25', '2023-11-16 22:31:25'),
(8, 'Automotive', '2023-11-16 22:31:43', '2023-11-16 22:31:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_16_114156_create_cache_table', 1),
(6, '2023_11_17_014453_create_authors_table', 1),
(7, '2023_11_17_014623_create_categories_table', 1),
(8, '2023_11_17_014646_create_news_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `content`, `url`, `image_url`, `published`, `author_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Suku Bunga Acuan BI 3,5%', 'Bank Indonesia (BI) mempertahankan suku bunga acuan BI 7-Day Reverse Repo Rate (BI7DRR) di level 3,5% pada Rapat Dewan Gubernur (RDG) bulan November 2023.', 'Bank Indonesia (BI) mempertahankan suku bunga acuan BI 7-Day Reverse Repo Rate (BI7DRR) di level 3,5% pada Rapat Dewan Gubernur (RDG) bulan November 2023. BI menilai, kondisi perekonomian Indonesia saat ini masih sesuai dengan perkiraan. Inflasi terkendali, pertumbuhan ekonomi di kuartal III-2023 diperkirakan masih tumbuh positif, dan daya beli masyarakat juga masih terjaga.', 'https://www.bi.go.id/id/ruang-media/siaran-pers/Pages/2023/11/16/23985.aspx', 'https://www.bi.go.id/id/images/2023/11/16/23985/BI-Siaran-Pers-16-11-2023.png', 1, 1, 6, '2023-11-16 22:56:04', '2023-11-16 23:13:21'),
(2, 'Frenkie de Jong bermain di MU', 'Manchester United resmi mengontrak Frenkie de Jong dari Barcelona dengan nilai transfer 70 juta euro. De Jong akan menandatangani kontrak selama lima tahun di Old Trafford.', 'Manchester United resmi mengontrak Frenkie de Jong dari Barcelona dengan nilai transfer 70 juta euro. De Jong akan menandatangani kontrak selama lima tahun di Old Trafford.', 'https://www.espn.com/soccer/soccer-transfers/story/4659739/manchester-united-sign-frenkie-de-jong-from-barcelona-for-70m-euros', 'https://cdn.vox-cdn.com/thumbor/1--2v64p5h8_04s_6776-noscale.jpg', 1, 3, 7, '2023-11-16 22:59:06', '2023-11-16 22:59:06'),
(3, 'Pemerintah membangun stadion', 'Pemerintah Indonesia berencana membangun stadion sepakbola bertaraf internasional di Papua. Stadion tersebut akan dibangun di Kabupaten Mimika dan akan menjadi venue untuk Piala Dunia U-20 tahun 2023.', 'Pemerintah Indonesia berencana membangun stadion sepakbola bertaraf internasional di Papua. Stadion tersebut akan dibangun di Kabupaten Mimika dan akan menjadi venue untuk Piala Dunia U-20 tahun 2023.', 'https://www.cnnindonesia.com/nasional/20230720164100-20-824509/pemerintah-rencanakan-bangun-stadion-sepakbola-bertaraf-internasional-di-papua', 'https://cdn.cnnindonesia.com/images/2023/07/20/164100-20-824509-stadion-sepakbola-papua.jpg', 1, 2, 7, '2023-11-16 23:00:25', '2023-11-16 23:00:25'),
(4, 'All-New Avanza dan Veloz', 'PT Toyota Astra Motor (TAM) meluncurkan All-New Avanza dan Veloz di Jakarta, Jumat (17/11/2023). All-New Avanza dan Veloz hadir dengan desain baru yang lebih modern dan mewah.', 'PT Toyota Astra Motor (TAM) meluncurkan All-New Avanza dan Veloz di Jakarta, Jumat (17/11/2023). All-New Avanza dan Veloz hadir dengan desain baru yang lebih modern dan mewah.', 'https://www.oto.com/news/all-new-avanza-veloz-diluncurkan-tam-dengan-desain-baru-17112023/', 'https://cdn.oto.com/image/2023/11/17/all-new-avanza-veloz-tam-2023.jpg', 1, 2, 8, '2023-11-16 23:03:04', '2023-11-16 23:03:04'),
(5, 'Suku Bunga Acuan BI 3,5%', 'Bank Indonesia (BI) mempertahankan suku bunga acuan BI 7-Day Reverse Repo Rate (BI7DRR) di level 3,5% pada Rapat Dewan Gubernur (RDG) bulan November 2023.', 'Bank Indonesia (BI) mempertahankan suku bunga acuan BI 7-Day Reverse Repo Rate (BI7DRR) di level 3,5% pada Rapat Dewan Gubernur (RDG) bulan November 2023. BI menilai, kondisi perekonomian Indonesia saat ini masih sesuai dengan perkiraan. Inflasi terkendali, pertumbuhan ekonomi di kuartal III-2023 diperkirakan masih tumbuh positif, dan daya beli masyarakat juga masih terjaga.', 'https://www.bi.go.id/id/ruang-media/siaran-pers/Pages/2023/11/16/23985.aspx', 'https://www.bi.go.id/id/images/2023/11/16/23985/BI-Siaran-Pers-16-11-2023.png', 1, 1, 6, '2023-11-16 23:07:59', '2023-11-16 23:07:59'),
(6, 'Otomotif Indonesia Tumbuh 72%', 'Industri otomotif Indonesia tumbuh 72% pada kuartal III-2023, dibandingkan dengan kuartal III-2022. Pertumbuhan ini didorong oleh meningkatnya permintaan domestik dan ekspor.', 'Industri otomotif Indonesia tumbuh 72% pada kuartal III-2023, dibandingkan dengan kuartal III-2022. Pertumbuhan ini didorong oleh meningkatnya permintaan domestik dan ekspor. Pada kuartal III-2023, penjualan kendaraan roda empat (passenger car) mencapai 198.413 unit, tumbuh 78,2% dibandingkan dengan kuartal III-2022. Penjualan kendaraan roda dua mencapai 5,4 juta unit, tumbuh 68,8% dibandingkan dengan kuartal III-2022. Ekspor kendaraan roda empat mencapai 10.272 unit, tumbuh 65,2% dibandingkan dengan kuartal III-2022. Ekspor kendaraan roda dua mencapai 1,4 juta unit, tumbuh 68,9% dibandingkan dengan kuartal III-2022.', 'https://www.beritasatu.com/ekonomi/1550351/industri-otomotif-indonesia-tumbuh-72-persen-pada-kuartal-iii-2023', 'https://cdn.beritasatu.com/uploads/images/2023/11/20/20231120-062842-1550351.jpg', 1, 1, 6, '2023-11-16 23:09:10', '2023-11-16 23:09:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_author_id_foreign` (`author_id`),
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT untuk tabel `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
