-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 07:35 AM
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
  `artist_id` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `popularity` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `artist_id`, `genre`, `release_date`, `popularity`, `image_url`) VALUES
(1, '÷ (Divide)', '1', 'pop', '2017-03-31', 90, 'https://i.scdn.co/image/ab67706c0000da8449895d47f1a4b8aa9b6fd85a'),
(2, 'Despacito (Original)', '2', 'latin', '2017-01-12', 92, 'https://i.scdn.co/image/ab67616d00001e020cffcb3e6efe7b82200366cd'),
(3, 'One Kiss', '4', 'dance-pop', '2018-05-05', 85, 'https://i.scdn.co/image/ab67616d0000b2735518b0fae5d7c52975c86077'),
(4, 'Perfect', '1', 'pop', '2017-09-26', 88, 'https://i.scdn.co/image/ab67656300005f1f252a7479b9d30f5a6e7756c7'),
(5, 'Uptown Funk (Single)', '5', 'funk', '2014-11-11', 89, 'https://i.scdn.co/image/ab6761610000e5eb3a698509a2f3c4c300a6320a'),
(6, 'Red', '6', 'country', '2008-11-18', 70, 'https://i.scdn.co/image/ab6761610000e5eb5a975143a08a1204f175866f'),
(7, 'Speak Now', '6', 'country', '2010-10-25', 60, 'https://i.scdn.co/image/ab6761610000e5eb12d07abf8f23b35f13900d4a'),
(8, '1989', '6', 'pop', '2014-10-27', 80, 'https://i.scdn.co/image/ab67616d0000b27364602f665372a86f547810e3'),
(9, 'reputation', '6', 'pop', '2017-11-10', 50, 'https://i.scdn.co/image/ab67616d0000b273089506f6262447b7c4294b49'),
(10, 'Lover', '6', 'pop', '2019-08-23', 40, 'https://i.scdn.co/image/ab67616d0000b273168ef2604722622c07681828'),
(11, 'ANTI', '7', 'pop', '2016-01-15', 75, 'https://i.scdn.co/image/ab67616d0000b27349f60d7ad4964894f2f28c10'),
(12, 'Born This Way', '8', 'pop', '2011-05-23', 65, 'https://i.scdn.co/image/ab67616d0000b27329d998c962327339a7232896'),
(13, 'Joanne', '8', 'pop', '2016-10-21', 55, 'https://i.scdn.co/image/ab67616d0000b27320403f91c1a2f6175d7828b0'),
(14, 'Chromatica', '8', 'pop', '2020-05-29', 45, 'https://i.scdn.co/image/ab67616d0000b273699707d361e3021212879c2b'),
(15, 'thank u, next', '9', 'pop', '2018-08-17', 70, 'https://i.scdn.co/image/ab67616d0000b273764705052431099d5d65cf56');
-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `album_id` int(255) NOT NULL,
  `popularity` int(11) NOT NULL,
  `followers_total` int(11) DEFAULT NULL,
  `genres` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`, `image_url`, `album_id`, `popularity`, `followers_total`, `genres`) VALUES
('1', 'Ed Sheeran', 'https://i.scdn.co/image/ab6761610000e5eb5c5ca3b9771e46e28f01a8d4', 1, 86, 78616150, 'pop, singer-songwriter'),
('2', 'Luis Fonsi', 'https://i.scdn.co/image/ab6761610000e5eb5c5ca3b9771e46e28f01a8d4', 2, 72, 20557492, 'pop, reggaeton'),
('3', 'Daddy Yankee', 'https://i.scdn.co/image/ab67616d0000b273506b1aba92e293db204b94cf', 3, 78, 47371889, 'reggaeton, latin trap'),
('4', 'Calvin Harris', 'https://newjams-images.scdn.co/image/ab676477000033ad/dt/v3/discover-weekly/2AmCdEk_TK_1tQItlnbKq0IqIplmpio6dDKEh6zXPeNwSSlEppW5PnjGfxxBYr-laikdA6KdO5AD3zCBhFTM2TaOkNiwLN3VSyJ-1leIIKM=/MjA6NzA6MjBUOTAtMjEtMw==', 4, 69, 25596866, 'electronic, pop, dance'),
('5', 'Bruno Mars', 'https://seed-mix-image.spotifycdn.com/v6/img/chill/3VcaBezSFVJHqylrhaYun2/en/default', 5, 88, 42333165, 'pop, r&b'),
('6', 'Taylor Swift', 'https://i.scdn.co/image/ab67616100001e025911258152a90f5529d53e57', 6, 84, 20631579, 'pop, country'),
('7', 'Rihanna', 'https://i.scdn.co/image/ab67616d0000b27358d91492b84d7e86535c6b0f', 11, 70, 127072368, 'pop, r&b, hip hop'),
('8', 'Lady Gaga', 'https://i.scdn.co/image/ab67616d0000b27352510b10604285749e790251', 12, 77, 125555747, 'pop, dance, electronic'),
('9', 'Ariana Grande', 'https://i.scdn.co/image/ab67616d0000b273699707d361e3021212879c2b', 15, 79, 242136997, 'pop, r&b'),
('10', 'Drake', 'https://i.scdn.co/image/ab67616d000041d4917ac23e1984508595c72503', null, 80, 74457593, 'hip hop, rap, r&b, pop'),
('11', 'The Weeknd', 'https://i.scdn.co/image/ab67616d0000b2737312b49a0309821f38104113', null, 75, 84227706, 'pop, r&b, alternative'),
('12', 'Kendrick Lamar', 'https://i.scdn.co/image/ab67616d0000b27359199098074644555f12e73', null, 72, 58153237, 'hip hop, rap, r&b'),
('13', 'Beyoncé', 'https://i.scdn.co/image/ab67616d0000b27348621043e42551200720504f', null, 78, 189464407, 'pop, r&b, soul'),
('14', 'Justin Bieber', 'https://i.scdn.co/image/ab67616d0000b27351603d9b080c17862504313c', null, 77, 174664831, 'pop, dance, r&b'),
('15', 'BTS', 'https://i.scdn.co/image/ab67616d0000b27349d2610468d346905633130c', null, 76, 42263902, 'k-pop, pop, dance');
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
  `album_id` int(255) NOT NULL,
  `description` text DEFAULT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `name`, `image_url`, `owner_id`, `album_id`, `description`, `creation_date`) VALUES
(1, 'Pop Hits', 'https://i.scdn.co/image/ab67616d00004851b315e8bb7ef5e57e9a25bb0f', 1, 1, 'The hottest pop hits of the moment', '2023-10-04'),
(2, 'Rock Anthems', 'https://i.scdn.co/image/ab67616d0000485134682dac4b574542ea829716', 2, 2, 'Get pumped up with these electrifying rock anthems', '2023-10-04'),
(3, 'R&B Grooves', 'https://i.scdn.co/image/ab67616d00004851e777a997c125b0a4238993c0', 3, 3, 'Smooth vibes for your chillout sessions', '2023-10-04'),
(4, 'Country Classics', 'https://i.scdn.co/image/ab67616d00004851464b66957057458c702e6568', 4, 4, 'Timeless country tunes that never go out of style', '2023-10-04'),
(5, 'Hip-Hop Jams', 'https://i.scdn.co/image/ab67616d000048510396fe7ff527f3e593d8e2ef', 5, 5, 'Get your groove on with these infectious hip-hop beats', '2023-10-04'),
(6, 'K-Pop Hits', 'https://i.scdn.co/image/ab67616d00004851b315e8bb7ef5e57e9a25bb0f', 1, 15, 'The latest and greatest K-pop hits', '2023-10-05'),
(7, 'Latin Beats', 'https://i.scdn.co/image/ab67616d0000485134682dac4b574542ea829716', 2, 2, 'Salsa, reggaeton, and more', '2023-10-05'),
(8, 'Indie Rock', 'https://i.scdn.co/image/ab67616d00004851e777a997c125b0a4238993c0', 3, 2, 'For the discerning listener', '2023-10-05'),
(9, 'Electronica', 'https://i.scdn.co/image/ab67616d00004851464b66957057458c702e6568', 4, 4, 'From house to techno to ambient', '2023-10-05'),
(10, 'Jazz Standards', 'https://i.scdn.co/image/ab67616d000048510396fe7ff527f3e593d8e2ef', 5, 5, 'The best of the best', '2023-10-05'),

(11, 'Classic Rock', 'https://i.scdn.co/image/ab67616d00004851b315e8bb7ef5e57e9a25bb0f', 6, 2, 'The greatest hits of the 70s', '80s, and 90s', '2023-10-06'),
(12, 'World Music', 'https://i.scdn.co/image/ab67616d0000485134682dac4b574542ea829716', 7, 11, 'From around the globe', '2023-10-06'),
(13, 'Movie Soundtracks', 'https://i.scdn.co/image/ab67616d00004851e777a997c125b0a4238993c0', 8, 12, 'The best music from the silver screen', '2023-10-06'),
(14, 'Video Game Music', 'https://i.scdn.co/image/ab67616d00004851464b66957057458c702e6568', 9, 13, 'The soundtracks that made your favorite games come to life', '2023-10-06'),
(15, 'Podcasts', 'https://i.scdn.co/image/ab67616d000048510396fe7ff527f3e593d8e2ef', 10, 14, 'Your favorite shows, all in one place', '2023-10-06');
-- --------------------------------------------------------

--
-- Table structure for table `playlist_track`
--

CREATE TABLE `playlist_track` (
  `playlist_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist_track`
--

INSERT INTO `playlist_track` (`playlist_id`, `track_id`, `position`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(2, 4, 1),
(2, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist_id` varchar(255) NOT NULL,
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
(1, 'Shape of You', '1', 1, 'https://i.scdn.co/image/ab67616d0000b273c9f20f36f29f30bf2c3fbd19', 'https://p.scdn.co/mp3-preview/2db2a405e5efcacedd8a7063366ca719163d6ccc?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-10-04', 355, 290000000),
(2, 'Despacito', '2', 2, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5eb91d2d39877c13427a2651af5/2/en/default', 'https://p.scdn.co/mp3-preview/a0cd8077c79a4aa3dcaa68bbc5ecdeda46e8d13f?cid=913c581b4cb242a582af2b12576947ea', 'Latin', '2023-02-04', 358, 770000000),
(3, 'One Kiss', '3', 3, 'https://seed-mix-image.spotifycdn.com/v6/img/happy/6JL8zeS1NmiOftqZTRgdTz/en/default', 'https://p.scdn.co/mp3-preview/c4ce57ef6fa27d69781236e7ba715cec57cc622e?cid=913c581b4cb242a582af2b12576947ea', 'Dance-pop', '2023-08-04', 326, 220000000),
(4, 'Perfect', '1', 1, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5eb51b32111f5bc456525313d89/1/en/default', 'https://p.scdn.co/mp3-preview/3d2c1e1714f9c6701ed8d978f4e70b497a0dbc06?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '0000-00-00', 2023, 270000000),
(5, 'Uptown Funk', '4', 4, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5ebeebd6e77e92be554a077fba7/3/en/default', 'https://p.scdn.co/mp3-preview/da3141fbf42b7fe6d809a87d75d8537056381970?cid=913c581b4cb242a582af2b12576947ea', 'Funk', '2023-10-02', 429, 430000000);
(6, 'Love Story', '5', 5, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5eb6942294946a9fc7c5a34f7e8/2/en/default', 'https://p.scdn.co/mp3-preview/5385e52379e9518dd959ce43805d602e7a580060?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-06-04', 221, 210000000),
(7, 'Roar', '5', 5, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5eb4d06da307a9020ea51753a94/1/en/default', 'https://p.scdn.co/mp3-preview/ca130248a547f2f343f90fbdd925967136620b16?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-09-04', 216, 240000000),
(8, 'Blank Space', '5', 5, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5eb45538536513c447880f1f65a/1/en/default', 'https://p.scdn.co/mp3-preview/cd74a7a07b5c4c128e9f4db317594803a2132c30?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-07-04', 242, 230000000),
(9, 'Shake It Off', '5', 5, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5ebfb57e8908948c814368843df/1/en/default', 'https://p.scdn.co/mp3-preview/94e983738ed11a3e37310f0b468e5129b7001bb4?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-08-04', 238, 220000000),
(10, 'Bad Blood (feat. Taylor Swift)', '5', 5, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5ebf09b667d15d5a0175331864d/1/en/default', 'https://p.scdn.co/mp3-preview/576e40a92869649051e908d9c4f820435c620f78?cid=913c581b4cb242a582af2b12576947ea', 'Pop', '2023-10-03 ', 221, 210000000),
(11, 'Blinding Lights', '6', 6, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5eb6203903928a0b26742a53936/3/en/default', 'https://p.scdn.co/mp3-preview/94c5a86a260003e6f8236561b65b6f761f335a40?cid=913c581b4cb242a582af2b12576947ea', 'Pop, dance-pop', '2023-01-04', 256, 350000000),
(12, 'Levitating', '7', 7, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5eb3f1982847f83191348949731/4/en/default', 'https://p.scdn.co/mp3-preview/2d2401889970683007a73b8585003e2506773a72?cid=913c581b4cb242a582af2b12576947ea', 'Dance-pop, disco', '2023-02-04', 245, 340000000),
(13, 'As It Was', '8', 8, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5eb642576857f35690133432403/5/en/default', 'https://p.scdn.co/mp3-preview/2db2a405e5efcacedd8a7063366ca719163d6ccc?cid=913c581b4cb242a582af2b12576947ea',Pop', '2023-03-04', 230, 330000000),
(14, 'About Damn Time', '9', 9, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5eb94454216789724589535977/6/en/default','https://p.scdn.co/mp3-preview/2db2a405e5efcacedd8a7063366ca719163d6ccc?cid=913c581b4cb242a582af2b12576947ea', 'Pop, disco', '2023-04-04', 260, 320000000),
(15, 'Heat Waves', '10', 10, 'https://dailymix-images.scdn.co/v2/img/ab6761610000e5eb4f898126096409934977423/7/en/default','https://p.scdn.co/mp3-preview/2db2a405e5efcacedd8a7063366ca719163d6ccc?cid=913c581b4cb242a582af2b12576947ea', 'Indie rock, synth-pop', '2023-05-04', 272, 310000000);
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
  `album_id` int(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT 'https://placehold.co/150x150',
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `subscription_type`, `album_id`, `image_url`, `country`) VALUES
(1, 'Nguyễn Văn', 'An', 'anan@example.com', '123456', 'Premium', 1, 'https://i.scdn.co/image/ab6761610000e5eb3a698509a2f3c4c300a6320a', 'Việt Nam'),
(2, 'Trần Thị Bích', 'Ngọc', 'bichngoc@example.com', '123456', 'Free', 2, 'https://i.scdn.co/image/ab6761610000e5eb174e2c6b225d9e287d6fe9ac', 'Việt Nam'),
(3, 'Lê Quang', 'Dũng', 'duong@example.com', '123456', 'Premium', 3, 'https://i.scdn.co/image/ab67656300005f1f252a7479b9d30f5a6e7756c7', 'Hoa Kỳ'),
(4, 'Hoàng Thị', 'Hạnh', 'hanh@example.com', '123456', 'Free', 4, 'https://i.scdn.co/image/ab67616d0000b2735518b0fae5d7c52975c86077', 'Nhật Bản'),
(5, 'Nguyễn Văn', 'Tùng', 'tung@example.com', '123456', 'Premium', 5, 'https://i.scdn.co/image/ab67757000003b82b33df6a04237957ee37dd885', 'Úc'),
(7, '', '', 'chube2609@gmail.com', '$2y$10$3R0U9BBHEhPKeZzmOKHIJOY80Jwn1UcrMOuAiFyO3C0En4aYnBel2', 'Free', NULL, '../UploadScreenshot 2023-11-19 160717.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_play_history`
--

CREATE TABLE `user_play_history` (
  `user_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL,
  `play_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `artist`
--

--
-- Indexes for table `content-feed`
--
ALTER TABLE `content-feed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `album_idplaylist` (`album_id`);

--
-- Indexes for table `playlist_track`
--
ALTER TABLE `playlist_track`
  ADD PRIMARY KEY (`playlist_id`,`track_id`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`)

--
-- Indexes for table `user_play_history`
--
ALTER TABLE `user_play_history`
  ADD PRIMARY KEY (`user_id`,`track_id`),
  ADD KEY `track_id` (`track_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `content-feed`
--
ALTER TABLE `content-feed`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`);

--
-- Constraints for table `artist`
--
ALTER TABLE `artist`
  ADD CONSTRAINT `albumid_artist` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`);

--
-- Constraints for table `content-feed`
--
ALTER TABLE `content-feed`
  ADD CONSTRAINT `artist_id` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`);

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `album_idplaylist` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`),
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `track`
--
ALTER TABLE `track`
  ADD CONSTRAINT `track_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`),
  ADD CONSTRAINT `track_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `albumid` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`);

--
-- Constraints for table `user_play_history`
--
ALTER TABLE `user_play_history`
  ADD CONSTRAINT `user_play_history_ibfk_1` FOREIGN KEY (`track_id`) REFERENCES `track` (`id`),
  ADD CONSTRAINT `user_play_history_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
