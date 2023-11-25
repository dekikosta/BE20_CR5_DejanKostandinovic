-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 05:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be20_cr5_animal_adoption_dejankostandinovic`
--
CREATE DATABASE IF NOT EXISTS `be20_cr5_animal_adoption_dejankostandinovic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be20_cr5_animal_adoption_dejankostandinovic`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `vaccinated` tinyint(1) DEFAULT NULL,
  `breed` varchar(100) NOT NULL,
  `status` enum('Adopted','Available') NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `photo_url`, `gender`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`, `user_id`) VALUES
(45, 'Fluffy', 'https://i.pinimg.com/1200x/ce/27/da/ce27da3bb74a4dcb957a5395140eace9.jpg', 'Male', 'Praterstrasse 23', 'A cute tabby cat', 'Small', 2, 1, 'Tabby', 'Available', 1),
(46, 'Buddy', 'https://www.purina.at/sites/default/files/2021-02/BREED%20Hero_0059_golden_retriever.jpg', 'Male', 'Praterstrasse 23', 'Friendly Golden Retriever', 'Large', 5, 1, 'Golden Retriever', 'Adopted', 2),
(47, 'Whiskers', 'https://assets.elanco.com/8e0bf1c2-1ae4-001f-9257-f2be3c683fb1/fca42f04-2474-4302-a238-990c8aebfe8c/Siamese_cat_1110x740.jpg?w=3840&q=75&auto=format', 'Female', 'Praterstrasse 23', 'Playful Siamese cat', 'Small', 8, 0, 'Siamese', 'Available', 1),
(48, 'Max', 'https://images.saymedia-content.com/.image/ar_4:3%2Cc_fill%2Ccs_srgb%2Cq_auto:eco%2Cw_1200/MTk2NzIzMTQ2NzMxMTAzMjUw/11-dogs-like-german-shepherd.png', 'Male', 'Praterstrasse 23', 'Loyal German Shepherd', 'Large', 10, 1, 'German Shepherd', 'Available', 2),
(49, 'Mittens', 'https://catastic.pet/wp-content/uploads/2022/11/closeup-adorable-calico-cat-outdoors-during-daylight.jpg', 'Female', 'Praterstrasse 23', 'Adorable Calico cat', 'Small', 3, 1, 'Calico', 'Adopted', 1),
(50, 'Rocky', 'https://i.pinimg.com/originals/65/93/12/659312d2448fec9f43d6774f1f3ec70b.jpg', 'Male', 'Praterstrasse 23', 'Energetic Labrador', 'Large', 7, 0, 'Labrador', 'Available', 2),
(51, 'Coco', 'https://upload.wikimedia.org/wikipedia/commons/8/81/Persialainen.jpg', 'Female', 'Praterstrasse 23', 'Beautiful Persian cat', 'Small', 6, 1, 'Persian', 'Available', 1),
(52, 'Sasha', 'https://www.dasfutterhaus.at/fileadmin/_processed_/2/8/csm_Siberian_Huskey_Portrait_42b3ff7c70.jpg', 'Female', 'Praterstrasse 23', 'Graceful Siberian Husky', 'Large', 12, 1, 'Siberian Husky', 'Adopted', 2),
(53, 'Luna', 'https://www.zooplus.de/magazin/wp-content/uploads/2017/03/ragdoll-katze-auf-fell.jpg', 'Female', 'Praterstrasse 23', 'Fluffy Ragdoll cat', 'Small', 4, 0, 'Ragdoll', 'Available', 1),
(54, 'Charlie', 'https://www.mein-haustier.de/wp-content/uploads/2018/05/shutterstock_232556533-komprimiert-1270x608.jpg', 'Male', 'Praterstrasse 23', 'Playful Boxer', 'Large', 9, 1, 'Boxer', 'Available', 2),
(55, 'Oliver', 'https://www.zooplus.at/magazin/wp-content/uploads/2021/01/maine-coon-3.jpg', 'Male', 'Praterstrasse 23', 'Charming Maine Coon cat', 'Small', 11, 1, 'Maine Coon', 'Available', 1),
(56, 'Lucy', 'https://gladdogsnation.com/cdn/shop/articles/b3467699bc2edb983acd54eb3f88249d_800x.jpg?v=1652426182', 'Female', 'Praterstrasse 23', 'Gentle Great Dane', 'Large', 13, 1, 'Great Dane', 'Available', 2),
(57, 'Simba', 'https://www.tierchenwelt.de/images/stories/haustiere/katzen/bengal_katze_l.jpg', 'Male', 'Praterstrasse 23', 'Curious Bengal cat', 'Small', 14, 0, 'Bengal', 'Available', 1),
(58, 'Molly', 'https://cdn.britannica.com/47/236047-050-F06BFC5E/Dalmatian-dog.jpg', 'Female', 'Praterstrasse 23', 'Elegant Dalmatian', 'Large', 15, 1, 'Dalmatian', 'Available', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `adoption_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pet_id` int(11) DEFAULT NULL,
  `adoption_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_adoption`
--

INSERT INTO `pet_adoption` (`adoption_id`, `user_id`, `pet_id`, `adoption_date`) VALUES
(2, 1, 45, '2023-11-25 16:36:36'),
(3, 1, 46, '2023-11-25 16:39:39'),
(4, 1, 50, '2023-11-25 16:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(10) DEFAULT 'active',
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `status`, `picture`) VALUES
(1, 'user1@example.com', 'password1', 'user', 'user1_picture.jpg'),
(2, 'user2@example.com', 'password2', 'user', 'user2_picture.jpg'),
(9, 'ko@ko.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'active', 'avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`adoption_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `pet_adoption_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pet_adoption_ibfk_2` FOREIGN KEY (`pet_id`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
