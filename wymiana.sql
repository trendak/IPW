-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Cze 2018, 11:03
-- Wersja serwera: 10.1.29-MariaDB
-- Wersja PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wymiana2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Elektronika', NULL, NULL),
(2, 'Motoryzacja', NULL, NULL),
(3, 'Zwierzęta', NULL, NULL),
(4, 'Gry', NULL, NULL),
(5, 'Ubrania', NULL, NULL),
(6, 'Inne', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category_item`
--

CREATE TABLE `category_item` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `category_item`
--

INSERT INTO `category_item` (`category_id`, `item_id`, `created_at`, `updated_at`) VALUES
(3, 1, '2018-06-12 07:53:36', '2018-06-12 07:53:36'),
(4, 2, '2018-06-12 08:37:28', '2018-06-12 08:37:28'),
(1, 3, '2018-06-12 08:41:40', '2018-06-12 08:41:40'),
(4, 3, '2018-06-12 08:41:40', '2018-06-12 08:41:40'),
(1, 4, '2018-06-12 08:45:18', '2018-06-12 08:45:18'),
(2, 5, '2018-06-12 08:50:00', '2018-06-12 08:50:00'),
(5, 6, '2018-06-12 08:53:02', '2018-06-12 08:53:02'),
(1, 7, '2018-06-12 12:00:01', '2018-06-12 12:00:01'),
(1, 8, '2018-06-12 12:04:44', '2018-06-12 12:04:44'),
(4, 8, '2018-06-12 12:04:44', '2018-06-12 12:04:44');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `conversations`
--

CREATE TABLE `conversations` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user_to_send` int(10) UNSIGNED NOT NULL,
  `id_user_from` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `conversations`
--

INSERT INTO `conversations` (`id`, `id_user_to_send`, `id_user_from`, `title`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'Adapter od PS2 za przedmiot Obroża dla psa', '2018-06-12 11:48:01', '2018-06-12 11:48:01'),
(2, 2, 3, 'Mysz komputerow za przedmiot Gra Assasin Cre', '2018-06-12 11:48:38', '2018-06-12 11:48:38'),
(3, 5, 2, 'Zegarek za przedmiot Pad ps2', '2018-06-12 12:05:15', '2018-06-12 12:05:15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `exchange`
--

CREATE TABLE `exchange` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `item_id` int(10) UNSIGNED NOT NULL,
  `prop_item_id` int(10) UNSIGNED NOT NULL,
  `item_status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `prop_item_status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `exchange`
--

INSERT INTO `exchange` (`id`, `status`, `item_id`, `prop_item_id`, `item_status`, `prop_item_status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 3, 1, 1, '2018-06-12 11:48:01', '2018-06-12 11:48:01'),
(2, 1, 2, 4, 1, 1, '2018-06-12 11:48:38', '2018-06-12 11:57:03'),
(3, 1, 8, 7, 3, 3, '2018-06-12 12:05:15', '2018-06-12 12:06:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `exchange_violations`
--

CREATE TABLE `exchange_violations` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_exchange` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `exchange_violations`
--

INSERT INTO `exchange_violations` (`id`, `id_exchange`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'źle zapakowane', '2018-06-20 05:33:38', '2018-06-20 05:33:38');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `items`
--

INSERT INTO `items` (`id`, `user_id`, `title`, `shipping`, `description`, `image_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Obroża dla psa', 1, 'Mam do zaproponowania obroże dla małego psa', 'obroza.jpg', '1', '2018-06-12 07:53:36', '2018-06-12 07:59:09'),
(2, 2, 'Gra Assasin Creed na PS4', 2, 'Gra w stanie używanym, płyty w dobrym stanie.', '697893937_1_644x461_assassins-creed-origins-ps4-same-pudelko-slubice.jpg', '2', '2018-06-12 08:37:27', '2018-06-12 11:57:03'),
(3, 4, 'Adapter od PS2', 2, 'Adapter do konsoli PS2.', 'adapter ps2.jpg', '1', '2018-06-12 08:41:40', '2018-06-12 08:41:40'),
(4, 3, 'Mysz komputerowa kulkowa', 1, 'Oferuje przedmiot na wymianę starą mysz komputerową, w dobrym stanie technicznym', 'mysz komputerowa.jpg', '2', '2018-06-12 08:45:18', '2018-06-12 11:57:03'),
(5, 3, 'Silnik fiat 126p', 3, 'Silnik do remontu.', 'silnik fiat 126p.jpg', '1', '2018-06-12 08:50:00', '2018-06-12 08:50:00'),
(6, 4, 'Spodnie wojskowe roz. 34', 1, 'Proponuje do wymiany dobre spodnie wojskowe.', 'spodnie.jpg', '1', '2018-06-12 08:53:02', '2018-06-12 08:53:02'),
(7, 2, 'Zegarek', 1, 'Mam do zaoferowania do wymiany radziecki zegarek. Rok nieznany.', 'zegarek radziecki.jpg', '2', '2018-06-12 12:00:01', '2018-06-12 12:05:26'),
(8, 5, 'Pad ps2', 1, 'Oferuje do wymiany stary pad do konsoli PS2.', 'padps2.jpg', '2', '2018-06-12 12:04:44', '2018-06-12 12:05:26');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_conversation` int(10) UNSIGNED NOT NULL,
  `who_send` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_04_101445_create_shipping_method', 1),
(4, '2018_01_05_123132_create_statusexchange', 1),
(5, '2018_01_17_145204_create_items_table', 1),
(6, '2018_02_02_101610_create_categories_table', 1),
(7, '2018_02_06_105629_create_category_item_table', 1),
(8, '2018_02_19_114109_create_exchange_table', 1),
(9, '2018_03_15_110035_create_conversation', 1),
(10, '2018_03_16_113952_create_messages_table', 1),
(11, '2018_05_24_103012_create_opinions_table', 1),
(12, '2018_05_24_113846_create_exchange_violetion', 1),
(13, '2018_05_24_113951_create_violation_of_items', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinions`
--

CREATE TABLE `opinions` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_to_user` int(10) UNSIGNED NOT NULL,
  `id_from_user` int(10) UNSIGNED NOT NULL,
  `id_exchange` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisfaction` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shipping_method`
--

CREATE TABLE `shipping_method` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `shipping_method`
--

INSERT INTO `shipping_method` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kurier', NULL, NULL),
(2, 'Poczta', NULL, NULL),
(3, 'Odbiór osobisty', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statusexchange`
--

CREATE TABLE `statusexchange` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `statusexchange`
--

INSERT INTO `statusexchange` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'W trakcie', NULL, NULL),
(2, 'Wysłano', NULL, NULL),
(3, 'Odebrano', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `password`, `city`, `streat`, `postcode`, `number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, 'user@user.pl', '$2y$10$RDLQXzmHt65jTAQb8xpP1.8.zowYsAFlttfIPLs6bxjeEdB5MhUGG', NULL, NULL, NULL, NULL, 'Y8MyQK9p83H7M1FgkB5RxDdGSp8zSmIWCNMWhozPmTyLPsgpGkWEyvMHNfih', '2018-06-12 06:49:02', '2018-06-12 06:49:02'),
(2, 'Janek', NULL, NULL, 'janek@email.pl', '$2y$10$9KVqS3PKQTcwxPTTIp3BtezY1G/BMKupf.FFSNbhPBf7rs/zzfYYC', 'Warszawa', 'Stanów zjednoczonych 32/265', '00-717', 123456789, '7lEkQbqKKhn8nqIKoJcuANNwPieLgDV7UNgHqnZRlbcsgpvQBrBPoCPIHOMA', '2018-06-12 07:27:26', '2018-06-12 07:28:07'),
(3, 'ExampleUser', NULL, NULL, 'example@user.pl', '$2y$10$QCcjMWTui5rjeHpN2MjZz.3WVY91SQOOCVQwrzXKl5G3.yqmrr0Ai', 'Kraków', 'Długa 32/54', '30-006', 321313123, 'j01ZSYYHf1FxUmFXDm58I88RIm8wqalZ25gXFIAhlOutaoCovThpSlCl98OA', '2018-06-12 08:42:54', '2018-06-12 08:44:05'),
(4, 'TadeuszKawior', NULL, NULL, 'user2@user.pl', '$2y$10$/WAZ1SQqjfpt1sB1dnpW.uk2WgecUWFuVm5w8ldPTJjV94UBt85wq', NULL, NULL, NULL, NULL, 'e1KWn4mNFOPXzborH2apP2NqrvM6BVPY4EIeFSbK6JJBJ3Fz3O3SuFpFRjqV', '2018-06-12 08:52:15', '2018-06-12 08:52:15'),
(5, 'Antykwariusz', 'Adam', 'Miałczyński', 'abc@abc.pl', '$2y$10$..pRfWKViXIxb6dGi6iWxuLk.pgO403BXzOayf6dzr8VLkzROgxpi', 'Warszawa', 'Mokotowska 36/6', '00-720', 897876482, 'nFCAk6BSSyqAwG4zEBd5WnmPVTpzILumU0LLDwgC5fzhNdXcg1knGPogq9Yg', '2018-06-12 12:01:53', '2018-06-12 12:02:36');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `violation_of_items`
--

CREATE TABLE `violation_of_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_item`
--
ALTER TABLE `category_item`
  ADD KEY `category_item_item_id_foreign` (`item_id`),
  ADD KEY `category_item_category_id_foreign` (`category_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversations_id_user_to_send_foreign` (`id_user_to_send`),
  ADD KEY `conversations_id_user_from_foreign` (`id_user_from`);

--
-- Indexes for table `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exchange_item_id_foreign` (`item_id`),
  ADD KEY `exchange_prop_item_id_foreign` (`prop_item_id`),
  ADD KEY `exchange_item_status_foreign` (`item_status`),
  ADD KEY `exchange_prop_item_status_foreign` (`prop_item_status`);

--
-- Indexes for table `exchange_violations`
--
ALTER TABLE `exchange_violations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exchange_violations_id_exchange_foreign` (`id_exchange`),
  ADD KEY `exchange_violations_user_id_foreign` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_user_id_foreign` (`user_id`),
  ADD KEY `items_shipping_foreign` (`shipping`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_id_conversation_foreign` (`id_conversation`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opinions_id_to_user_foreign` (`id_to_user`),
  ADD KEY `opinions_id_from_user_foreign` (`id_from_user`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statusexchange`
--
ALTER TABLE `statusexchange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `violation_of_items`
--
ALTER TABLE `violation_of_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `violation_of_items_item_id_foreign` (`item_id`),
  ADD KEY `violation_of_items_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `exchange`
--
ALTER TABLE `exchange`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `exchange_violations`
--
ALTER TABLE `exchange_violations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `statusexchange`
--
ALTER TABLE `statusexchange`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `violation_of_items`
--
ALTER TABLE `violation_of_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `category_item`
--
ALTER TABLE `category_item`
  ADD CONSTRAINT `category_item_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_item_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_id_user_from_foreign` FOREIGN KEY (`id_user_from`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `conversations_id_user_to_send_foreign` FOREIGN KEY (`id_user_to_send`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `exchange`
--
ALTER TABLE `exchange`
  ADD CONSTRAINT `exchange_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exchange_item_status_foreign` FOREIGN KEY (`item_status`) REFERENCES `statusexchange` (`id`),
  ADD CONSTRAINT `exchange_prop_item_id_foreign` FOREIGN KEY (`prop_item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exchange_prop_item_status_foreign` FOREIGN KEY (`prop_item_status`) REFERENCES `statusexchange` (`id`);

--
-- Ograniczenia dla tabeli `exchange_violations`
--
ALTER TABLE `exchange_violations`
  ADD CONSTRAINT `exchange_violations_id_exchange_foreign` FOREIGN KEY (`id_exchange`) REFERENCES `exchange` (`id`),
  ADD CONSTRAINT `exchange_violations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_shipping_foreign` FOREIGN KEY (`shipping`) REFERENCES `shipping_method` (`id`),
  ADD CONSTRAINT `items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_id_conversation_foreign` FOREIGN KEY (`id_conversation`) REFERENCES `conversations` (`id`);

--
-- Ograniczenia dla tabeli `opinions`
--
ALTER TABLE `opinions`
  ADD CONSTRAINT `opinions_id_from_user_foreign` FOREIGN KEY (`id_from_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `opinions_id_to_user_foreign` FOREIGN KEY (`id_to_user`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `violation_of_items`
--
ALTER TABLE `violation_of_items`
  ADD CONSTRAINT `violation_of_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `violation_of_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
