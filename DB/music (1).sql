-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 05:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `release_date` date NOT NULL,
  `popularity` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `genre`, `playlist_id`, `release_date`, `popularity`, `image_url`) VALUES
(1, '÷ (Divide)', 'pop', 1, '2017-03-31', 90, 'https://i.scdn.co/image/ab67706c0000da8449895d47f1a4b8aa9b6fd85a'),
(2, 'Despacito (Original)', 'latin', 2, '2017-01-12', 92, 'https://i.scdn.co/image/ab67616d00001e020cffcb3e6efe7b82200366cd'),
(3, 'One Kiss', 'dance-pop', 3, '2018-05-05', 85, 'https://i.scdn.co/image/ab67616d0000b2735518b0fae5d7c52975c86077'),
(4, 'Perfect', 'pop', 4, '2017-09-26', 88, 'https://i.scdn.co/image/ab67656300005f1f252a7479b9d30f5a6e7756c7'),
(5, 'Uptown Funk (Single)', 'funk', 5, '2014-11-11', 89, 'https://i.scdn.co/image/ab6761610000e5eb3a698509a2f3c4c300a6320a'),
(6, 'Red', 'country', 6, '2008-11-18', 70, 'https://i.scdn.co/image/ab6761610000e5eb5a975143a08a1204f175866f'),
(7, 'Speak Now', 'country', 7, '2010-10-25', 60, 'https://i.scdn.co/image/ab6761610000e5eb12d07abf8f23b35f13900d4a'),
(8, '1989', 'pop', 8, '2014-10-27', 80, 'https://i.scdn.co/image/ab67616d0000b27364602f665372a86f547810e3'),
(9, 'reputation', 'pop', 9, '2017-11-10', 50, 'https://i.scdn.co/image/ab67616d0000b273089506f6262447b7c4294b49'),
(10, 'Lover', 'pop', 10, '2019-08-23', 40, 'https://i.scdn.co/image/ab67616d0000485106a4d1fd269dc47911d37eb3'),
(11, 'ANTI', 'pop', 11, '2016-01-15', 75, 'https://i.scdn.co/image/ab67616d0000b27349f60d7ad4964894f2f28c10'),
(12, 'Born This Way', 'pop', 12, '2011-05-23', 65, 'https://i.scdn.co/image/ab67616d0000b27329d998c962327339a7232896'),
(13, 'Joanne', 'pop', 13, '2016-10-21', 55, 'https://i.scdn.co/image/ab67616d0000b27320403f91c1a2f6175d7828b0'),
(14, 'Chromatica', 'pop', 14, '2020-05-29', 45, 'https://i.scdn.co/image/ab67616d0000b273699707d361e3021212879c2b'),
(15, 'thank u, next', 'pop', 15, '2018-08-17', 70, 'https://i.scdn.co/image/ab67616d0000b273764705052431099d5d65cf56');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `album_id` int(11) NOT NULL,
  `popularity` int(11) NOT NULL,
  `followers_total` int(11) DEFAULT NULL,
  `genres` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`, `image_url`, `album_id`, `popularity`, `followers_total`, `genres`) VALUES
(1, 'Ed Sheeran', 'https://i.scdn.co/image/ab6761610000e5eb5c5ca3b9771e46e28f01a8d4', 1, 86, 78616150, 'pop, singer-songwriter'),
(2, 'Luis Fonsi', 'https://i.scdn.co/image/ab67616d00001e0251f311c2fb06ad2789e3ff91', 2, 72, 20557492, 'pop, reggaeton'),
(3, 'Daddy Yankee', 'https://i.scdn.co/image/ab67616d00001e029aa814ab582da33cb8c728d3', 3, 78, 47371889, 'reggaeton, latin trap'),
(4, 'Calvin Harris', 'https://i.scdn.co/image/ab67616d00001e029c05e2bafadefe239cdf7dfa', 4, 69, 25596866, 'electronic, pop, dance'),
(5, 'Bruno Mars', 'https://i.scdn.co/image/ab67616d00001e02e5183ace1c8963cec95a87c0', 5, 88, 42333165, 'pop, r&b'),
(6, 'Taylor Swift', 'https://i.scdn.co/image/ab67616d00001e022c3b23793d2a38adce70a02c', 6, 84, 20631579, 'pop, country'),
(7, 'Rihanna', 'https://i.scdn.co/image/ab67616d00001e02f0357063012019844b900c2b', 11, 70, 127072368, 'pop, r&b, hip hop'),
(8, 'Lady Gaga', 'https://i.scdn.co/image/ab67616d00001e025b18abb5facf12c82192bda7', 12, 77, 125555747, 'pop, dance, electronic'),
(9, 'Ariana Grande', 'https://i.scdn.co/image/ab67616d0000b2738b7447ac3daa1da18811cf7b', 15, 79, 242136997, 'pop, r&b'),
(10, 'Drake', 'https://i.scdn.co/image/ab67616d0000b27304e57d181ff062f8339d6c71', 6, 80, 74457593, 'hip hop, rap, r&b, pop'),
(11, 'The Weeknd', 'https://i.scdn.co/image/ab67616d0000b27355c343cecf1c9a0e3d260144', 5, 75, 84227706, 'pop, r&b, alternative'),
(12, 'Kendrick Lamar', 'https://i.scdn.co/image/ab67616d0000b273aa2ff29970d9a63a49dfaeb2', 4, 72, 58153237, 'hip hop, rap, r&b'),
(13, 'Beyoncé', 'https://i.scdn.co/image/ab67616d0000b273ee0d0dce888c6c8a70db6e8b', 3, 78, 189464407, 'pop, r&b, soul'),
(14, 'Justin Bieber', 'https://i.scdn.co/image/ab67616d0000b2738b7447ac3daa1da18811cf7b', 2, 77, 174664831, 'pop, dance, r&b'),
(15, 'BTS', 'https://i.scdn.co/image/ab67616d0000b27304e57d181ff062f8339d6c71', 1, 76, 42263902, 'k-pop, pop, dance');

-- --------------------------------------------------------

--
-- Table structure for table `content-feed`
--

CREATE TABLE `content-feed` (
  `title` varchar(255) NOT NULL,
  `preview_url` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `artist_id` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `name`, `image_url`, `owner_id`, `description`, `creation_date`) VALUES
(1, 'Pop Hits', 'https://i.scdn.co/image/ab67616d00004851b315e8bb7ef5e57e9a25bb0f', 1, 'The hottest pop hits of the moment', '2023-10-04'),
(2, 'Rock Anthems', 'https://i.scdn.co/image/ab67616d0000485134682dac4b574542ea829716', 2, 'Get pumped up with these electrifying rock anthems', '2023-10-04'),
(3, 'R&B Grooves', 'https://i.scdn.co/image/ab67616d00004851e777a997c125b0a4238993c0', 3, 'Smooth vibes for your chillout sessions', '2023-10-04'),
(4, 'Country Classics', 'https://i.scdn.co/image/ab67616d00004851464b66957057458c702e6568', 4, 'Timeless country tunes that never go out of style', '2023-10-04'),
(5, 'Hip-Hop Jams', 'https://i.scdn.co/image/ab67616d000048510396fe7ff527f3e593d8e2ef', 5, 'Get your groove on with these infectious hip-hop beats', '2023-10-04'),
(6, 'K-Pop Hits', 'https://i.scdn.co/image/ab6761610000e5eb174e2c6b225d9e287d6fe9ac', 1, 'The latest and greatest K-pop hits', '2023-10-05'),
(7, 'Latin Beats', 'https://i.scdn.co/image/ab6761610000e5eb3a698509a2f3c4c300a6320a', 2, 'Salsa, reggaeton, and more', '2023-10-05'),
(8, 'Indie Rock', 'https://i.scdn.co/image/ab67616d0000485144e2d80aa2af0c71c1c6c84a', 3, 'For the discerning listener', '2023-10-05'),
(9, 'Electronica', 'https://i.scdn.co/image/ab67616d00001e0260cd02ee6cb514de9419fb4f', 4, 'From house to techno to ambient', '2023-10-05'),
(10, 'Jazz Standards', 'https://i.scdn.co/image/ab67616d0000485106a4d1fd269dc47911d37eb3', 5, 'The best of the best', '2023-10-05'),
(11, 'Classic Rock', 'https://i.scdn.co/image/ab67616d00004851ddf94789be0b62ca1e806540', 1, 'The greatest hits of the 70s, 80s, and 90s', '2023-10-06'),
(12, 'World Music', 'https://i.scdn.co/image/ab67616d00004851541195d0c4e01593ae6ebedb', 2, 'From around the globe', '2023-10-06'),
(13, 'Movie Soundtracks', 'https://i.scdn.co/image/ab67616d00004851539ffc79122ccceb066f5340', 3, 'The best music from the silver screen', '2023-10-06'),
(14, 'Video Game Music', 'https://i.scdn.co/image/ab67616d0000485171659b8e2bf2bdcc7e0922c1', 4, 'The soundtracks that made your favorite games come to life', '2023-10-06'),
(15, 'Podcasts', 'https://i.scdn.co/image/ab67616d000048518faf0fc3a518f4f1d96d17f1', 5, 'Your favorite shows, all in one place', '2023-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist_songs`
--

INSERT INTO `playlist_songs` (`id`, `playlist_id`, `song_id`) VALUES
(37, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `preview_url` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `datecreate` date NOT NULL,
  `duration` int(11) NOT NULL,
  `popularity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`id`, `title`, `artist_id`, `album_id`, `image_url`, `preview_url`, `genre`, `datecreate`, `duration`, `popularity`) VALUES
(1, 'Shape of You', 1, 1, 'https://i.scdn.co/image/ab67616d0000b273c9f20f36f29f30bf2c3fbd19', 'https://p.scdn.co/mp3-preview/e215ed4e0c0f1b4a2fd072d3b1c08ee7beb889c6?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-10-04', 355, 290000000),
(2, 'Despacito', 2, 2, 'https://i.scdn.co/image/ab67616d0000b273ce6d0eef0c1ce77e5f95bbbc', 'https://p.scdn.co/mp3-preview/5e993e8c59d14aaa74303f05221029eeadc4325d?cid=913c581b4cb242a582af2b12576947ea', 'Latin', '2023-02-04', 358, 770000000),
(3, 'One Kiss', 3, 3, 'https://i.scdn.co/image/ab67616d0000b27304e57d181ff062f8339d6c71', 'https://p.scdn.co/mp3-preview/a1ad82e721aeb155c10f16baa515d88aa6ea13b0?cid=913c581b4cb242a582af2b12576947ea', 'Dance-pop', '2023-08-04', 326, 220000000),
(4, 'Perfect', 1, 1, 'https://i.scdn.co/image/ab67616d0000b27304e57d181ff062f8339d6c71', 'https://p.scdn.co/mp3-preview/83609d328a9ec3ea1a6bd22787ffaa3981ca3460?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-04-04', 2023, 270000000),
(5, 'Uptown Funk', 4, 4, 'https://i.scdn.co/image/ab67616d0000b2731c699f08c39a764f8c6fc595', 'https://p.scdn.co/mp3-preview/0772396f0b3d6c010e98a6839ca51024c1b29734?cid=913c581b4cb242a582af2b12576947ea', 'Funk', '2023-10-02', 429, 430000000),
(6, 'Love Story', 5, 5, 'https://i.scdn.co/image/ab67616d0000b273c6af01138c83149291621de3', 'https://p.scdn.co/mp3-preview/5385e52379e9518dd959ce43805d602e7a580060?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-06-04', 221, 210000000),
(7, 'Roar', 5, 5, 'https://i.scdn.co/image/ab67616d0000b2734d9dae346a4977e0a7c2fc71', 'https://p.scdn.co/mp3-preview/ca130248a547f2f343f90fbdd925967136620b16?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-09-04', 216, 240000000),
(8, 'Blank Space', 5, 5, 'https://i.scdn.co/image/ab67616d0000b273faf95fe6b1d5670fde88cd35', 'https://p.scdn.co/mp3-preview/f43522112ce74851fc1ecf9be16358544bf71d3a?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-07-04', 242, 230000000),
(9, 'Shake It Off', 5, 5, 'https://i.scdn.co/image/ab67616d0000b27392068b240c899dc330a654de', 'https://p.scdn.co/mp3-preview/94e983738ed11a3e37310f0b468e5129b7001bb4?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-08-04', 238, 220000000),
(10, 'Bad Blood (feat. Taylor Swift)', 5, 5, 'https://i.scdn.co/image/ab67616d0000b273f19a7e7a57003534c708d7ed', 'https://p.scdn.co/mp3-preview/576e40a92869649051e908d9c4f820435c620f78?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-10-03', 221, 210000000),
(11, 'Blinding Lights', 6, 6, 'https://i.scdn.co/image/ab67616d0000b273aa2ff29970d9a63a49dfaeb2', 'https://p.scdn.co/mp3-preview/320f52acb967234e41554684d35fd2bd71df392a?cid=913c581b4cb242a582af2b12576947ea', 'Pop, dance-pop', '2023-01-04', 256, 350000000),
(12, 'Levitating', 7, 7, 'https://i.scdn.co/image/ab67616d0000b273ce6d0eef0c1ce77e5f95bbbc', 'https://p.scdn.co/mp3-preview/89ac07aacf07523308f34222940ac1d94dcc5c15?cid=913c581b4cb242a582af2b12576947ea', 'Dance-pop, disco', '2023-02-04', 245, 340000000),
(13, 'As It Was', 8, 8, 'https://i.scdn.co/image/ab67616d00001e02fba77573c28c428b63131f06', 'https://p.scdn.co/mp3-preview/2db2a405e5efcacedd8a7063366ca719163d6ccc?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-03-04', 230, 330000000),
(14, 'About Damn Time', 9, 9, 'https://i.scdn.co/image/ab67616d0000b273ee0d0dce888c6c8a70db6e8b', 'https://p.scdn.co/mp3-preview/3fcd00ca9702f8742fa809b70acbbfbe3c2362b3?cid=913c581b4cb242a582af2b12576947ea', 'Pop, disco', '2023-04-04', 260, 320000000),
(15, 'Heat Waves', 10, 10, 'https://i.scdn.co/image/ab67616d0000b2738b7447ac3daa1da18811cf7b', 'https://p.scdn.co/mp3-preview/15482d8bddcddd76da2b60fafdfed835b17cb1d8?cid=913c581b4cb242a582af2b12576947ea', 'Indie rock, synth-pop', '2023-05-04', 272, 310000000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `subscription_type` varchar(255) DEFAULT NULL,
  `playlist_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT 'https://placehold.co/150x150',
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `subscription_type`, `playlist_id`, `image_url`, `country`) VALUES
(2, 'Trần Thị Bích', 'Ngọc', 'bichngoc@example.com', '123456', 'Free', 2, 'https://i.scdn.co/image/ab6761610000e5eb174e2c6b225d9e287d6fe9ac', 'Việt Nam'),
(3, 'Lê Quang', 'Dũng', 'duong@example.com', '123456', 'Premium', 3, 'https://i.scdn.co/image/ab67656300005f1f252a7479b9d30f5a6e7756c7', 'Hoa Kỳ'),
(4, 'Hoàng Thị', 'Hạnh', 'hanh@example.com', '123456', 'Free', 4, 'https://i.scdn.co/image/ab67616d0000b2735518b0fae5d7c52975c86077', 'Nhật Bản'),
(5, 'Nguyễn Văn', 'Tùng', 'tung@example.com', '123456', 'Premium', 5, 'https://i.scdn.co/image/ab67757000003b82b33df6a04237957ee37dd885', 'Úc'),
(6, 'dqwqw', 'i', 'chube2609@gmail.com', '$2y$10$Q2Cep1w3npe8Uk6eDG.yoeNh1t0uaxFzDcLlh2OdAyeNijPG/ByRO', 'Free', NULL, './Upload/Screenshot 2023-11-19 223837.png', 'VN'),
(7, '', '', '', '$2y$10$6AVjg1xV4QM7xUcPuLaPCe6ZIbCg6dTRKLkddl426aB5w.YL1OAni', 'Free', NULL, 'https://placehold.co/150x150', NULL),
(8, 'csdcdsc', 'i', 'be2609@gmail.com', '$2y$10$aelYq8dfMxvLGHUmYrGA4OufE/8avEYUvhgp/mbm7tVE8CWt/aoAa', 'Free', NULL, 'https://placehold.co/150x150', NULL),
(9, 'admin', 'dqwqd', 'haha@gmail.com', '$2y$10$moe8LO9bsHwXWdN/OiWXauejydwJLvPL4.UWGMjPMq/hEO0Do/4ua', 'Free', NULL, 'https://placehold.co/150x150', NULL),
(10, 'phuc', 'nguyen', 'adphucdz@gmail.com', '$2y$10$/vcxPhVKeCHakZuj9aVqAub0q0gipopaVwS/fCvcQICfw/0uWknr.', 'Free', NULL, 'https://placehold.co/150x150', NULL),
(11, 'csdcdsc', 'dqwqd', 'chu@gmail.com', '$2y$10$RsxrDQ/29jS.qAvnDbLihORfYIFn5igTjEM9g/QjLNKqWwcLfNeFC', 'Free', NULL, './Upload/Screenshot 2023-11-19 084309.png', 'VN');

-- --------------------------------------------------------

--
-- Table structure for table `your_playlist`
--

CREATE TABLE `your_playlist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL DEFAULT 'https://placehold.co/150x150'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `your_playlist`
--

INSERT INTO `your_playlist` (`id`, `name`, `user_id`, `image_url`) VALUES
(1, 'chube', 6, 'https://placehold.co/150x150'),
(4, '', 10, 'https://placehold.co/150x150'),
(5, 'chube', 10, 'https://placehold.co/150x150'),
(6, 'chube', 11, 'https://placehold.co/150x150');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlist_id` (`playlist_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yourpl_id` (`playlist_id`),
  ADD KEY `song_id` (`song_id`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`id`),
  ADD KEY `albumid_artist` (`album_id`),
  ADD KEY `arist_id` (`artist_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`playlist_id`);

--
-- Indexes for table `your_playlist`
--
ALTER TABLE `your_playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_idpl` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `your_playlist`
--
ALTER TABLE `your_playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `playlist_id` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`);

--
-- Constraints for table `artist`
--
ALTER TABLE `artist`
  ADD CONSTRAINT `album_id` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`);

--
-- Constraints for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD CONSTRAINT `song_id` FOREIGN KEY (`song_id`) REFERENCES `track` (`id`),
  ADD CONSTRAINT `yourpl_id` FOREIGN KEY (`playlist_id`) REFERENCES `your_playlist` (`id`);

--
-- Constraints for table `track`
--
ALTER TABLE `track`
  ADD CONSTRAINT `albumid_artist` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`),
  ADD CONSTRAINT `arist_id` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`);

--
-- Constraints for table `your_playlist`
--
ALTER TABLE `your_playlist`
  ADD CONSTRAINT `user_idpl` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
