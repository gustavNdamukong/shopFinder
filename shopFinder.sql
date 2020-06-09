-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 09 jun 2020 om 13:55
-- Serverversie: 5.7.26
-- PHP-versie: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopFinder`
--
CREATE DATABASE IF NOT EXISTS `shopFinder` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shopFinder`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_20_180048_create_shops_table', 2),
(6, '2020_05_20_185336_create_shop_images_table', 3),
(7, '2020_05_21_104158_create_role_to_users_table', 4),
(8, '2020_05_21_121206_create_roles_table', 4),
(10, '2020_05_21_130615_create_foreign_keys_for_role_to_users_table', 5),
(11, '2020_05_22_062249_add_description_to_shops', 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('gustavfn@yahoo.co.uk', '$2y$10$WAYJaXnwgAHPamHm9hbrF.9onGTDZzn1mQEIQSMDb9wFzCe5QlcDC', '2020-05-20 09:27:56');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', '2020-05-30 17:53:28', '2020-05-30 17:53:28'),
(2, 'admin', '2020-05-30 17:53:28', '2020-05-30 17:53:28'),
(3, 'user', '2020-05-30 17:53:28', '2020-05-30 17:53:28');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `role_to_user`
--

CREATE TABLE `role_to_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `role_to_user`
--

INSERT INTO `role_to_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 2, 2, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 3, 4, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 3, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'The uer ID of the user who created this shop',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `shops`
--

INSERT INTO `shops` (`id`, `name`, `city`, `postcode`, `lat`, `lon`, `address`, `created_at`, `updated_at`, `user_id`, `description`) VALUES
(1, 'Nandos', 'Bedford', 'MK403PL', 52.136600494384766, -0.46020400524139404, '27 Castle Road, Bedford, MK403PL, UK', NULL, NULL, 1, 'This was our first branch in Bedford'),
(2, 'Chiquitto', 'Milton Keynes', 'MK93 DX', 52.039699554443, -0.75840002298355, '500 Saxon Gate, Milton Keynes, MK93 DX, UK', NULL, NULL, 1, 'Excellent shop in Milton Keynes'),
(3, 'Margaritta Losgardos', 'Bedford', 'MK42 0BN', 52.1327018737793, -0.4647519886493683, '5 Cardington Road, Bedford, MK42 0BN', NULL, NULL, 1, 'This was our second branch in Bedford'),
(4, 'Justin\'s dinner hall', 'Northampton', 'NN57HA', 52.2507209777832, -0.9185587763786316, '51 Glebeland road, NN5 7HA, Northampton', NULL, NULL, 1, 'We offer an amazing customer service and we serve great things from starters to the finest deserts'),
(5, 'Subway Ltd', 'Leicester', 'Le2 1BB', 52.6424197, -1.0937848, '130 Uppingham Road, Leicester, LE5 0QF', NULL, NULL, 2, 'Relaxing spot for working men and women, and for families too. We serve deliciously baked sub-loaves daily, and freshly ground coffee. Come and discover us.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shop_images`
--

CREATE TABLE `shop_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `shop_images`
--

INSERT INTO `shop_images` (`id`, `shop_id`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 1, '1.png', '2020-05-30 17:53:27', '2020-05-30 17:53:27'),
(2, 2, '21432.jpeg', '2020-05-30 17:53:27', '2020-05-30 17:53:27'),
(3, 1, '36611.jpg', '2020-05-30 17:53:27', '2020-05-30 17:53:27'),
(6, 1, '97316.JPG', NULL, NULL),
(7, 1, '21127.JPG', NULL, NULL),
(8, 4, '35282.JPG', NULL, NULL),
(9, 4, '71219.JPG', NULL, NULL),
(10, 4, '14686.JPG', NULL, NULL),
(11, 5, '88809.jpeg', NULL, NULL),
(12, 5, '13377.jpeg', NULL, NULL),
(13, 5, '96565.jpeg', NULL, NULL),
(14, 5, '43162.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Author user', 'nolimit187humvee@yahoo.co.uk', NULL, '$2y$10$8sHnT16AkMEJQtUJ5woIMO.VfwnYuW0FfTFWAYBJ5cd2cmkyZiuEG', NULL, '2020-05-30 17:53:28', '2020-05-30 17:53:28'),
(4, 'John Doe', 'john@colon.com', NULL, '$2y$10$hDD7567eNz7BDiJSO9L3VOBuAZnbpAW4coKNAKEWfac4qNwrpKyY.', NULL, '2020-05-31 12:55:42', '2020-05-31 12:55:42'),
(7, 'Super-admin user', 'gustavndamukong@hotmail.com', NULL, '$2y$10$sM4HtT4lVYDlv3ket.VhYea1Bq/mRCbLoBYwMnG3Xlh8ihQ4mUpaS', 'YQaptIIpvpsWimzgYpmdvCbzbGkLhwto4u1bizuEGbcvL4QLTmKhB35kyiSt', '2020-06-06 16:52:17', '2020-06-08 10:45:43'),
(8, 'Normal user', 'che@colon.com', NULL, '$2y$10$b1UPbesT1jO8nSWgW4BcT.q0m.kW2rfjeRPNfeAwsjUofCcKJETsi', NULL, '2020-06-06 16:56:03', '2020-06-06 16:56:03');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `role_to_user`
--
ALTER TABLE `role_to_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_to_users_user_id_foreign` (`user_id`),
  ADD KEY `role_to_users_role_id_foreign` (`role_id`);

--
-- Indexen voor tabel `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `shop_images`
--
ALTER TABLE `shop_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_images_shop_id_foreign` (`shop_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `role_to_user`
--
ALTER TABLE `role_to_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `shop_images`
--
ALTER TABLE `shop_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `role_to_user`
--
ALTER TABLE `role_to_user`
  ADD CONSTRAINT `role_to_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_to_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `shop_images`
--
ALTER TABLE `shop_images`
  ADD CONSTRAINT `shop_images_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
