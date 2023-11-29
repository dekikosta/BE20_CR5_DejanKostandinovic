-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 02:35 PM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `fk_supplier` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `breed` varchar(255) NOT NULL,
  `size` enum('small','large') DEFAULT NULL,
  `vaccine` enum('yes','no') DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('Adopted','Available') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `picture`, `fk_supplier`, `age`, `gender`, `breed`, `size`, `vaccine`, `description`, `status`) VALUES
(75, 'Buddy', 'https://media.istockphoto.com/id/513133900/photo/golden-retriever-sitting-in-front-of-a-white-background.jpg?s=612x612&w=0&k=20&c=rPuBgfn_wcAzaa8o2GhrA2eBTdbvrTvYw4demzV-bOs=', 1, 5, 'male', 'Dog', 'large', 'yes', 'Friendly and energetic', 'Available'),
(76, 'Whiskers', 'https://media.os.fressnapf.com/cms/2020/05/Ratgeber_Voegel_Papagei_grau_Stock_1200x527-5eb53275d53f9.jpg?t=seoimg_703', 1, 2, 'male', 'papagei', 'small', 'yes', 'Laid-back and independent', 'Available'),
(77, 'Carlo ', 'https://cdn.britannica.com/79/232779-050-6B0411D7/German-Shepherd-dog-Alsatian.jpg', 1, 13, 'male', 'dog', 'large', 'no', 'Loves to play fetch', 'Available'),
(79, 'Rocky', 'https://www.dailypaws.com/thmb/zlhbfzAbstwW0EPP34KnzTP1fvc=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/black-german-shepherd-182162852-2000-532e8914ecab4892b3a75d6e54d06858.jpg', 1, 8, 'male', 'Dog', 'large', 'no', 'Older but still active', 'Adopted'),
(80, 'Mittens', 'https://www.hartz.com/wp-content/uploads/2023/05/do-cats-only-meow-to-humans-1.jpg', 1, 9, 'female', 'Cat', 'small', 'no', 'Sweet and affectionate', 'Available'),
(81, 'Coco', 'https://i.pinimg.com/originals/d3/4f/5a/d34f5a51fc32270f86e29c4f87519d80.jpg', 1, 6, 'female', 'Dog', 'small', 'yes', 'Great with kids', 'Adopted'),
(82, 'Shadow', 'https://static.scientificamerican.com/sciam/cache/file/E610026A-973E-4D09-9C82F13325003C81_source.jpg?w=600', 1, 9, 'male', 'Cat', 'large', 'no', 'Shy at first, but warms up', 'Adopted'),
(83, 'Oreo', 'https://assets.petco.com/petco/image/upload/f_auto,q_auto/rabbit-care-sheet', 1, 1, 'male', 'Rabbit', 'small', 'yes', 'Playful and curious', 'Available'),
(84, 'Smokey', 'https://ecommerce.koelle-zoo.de/media/1a/78/ce/1681713654/Hamster-Einzelgaenger.jpg', 1, 7, 'male', 'hamster', 'small', 'yes', 'Likes to explore', 'Available'),
(85, 'Charlie', 'https://www.koenigshofer-futtermittel.at/wp-content/uploads/2020/12/AdobeStock_120189570.jpeg', 1, 3, 'female', 'chinchilla', 'small', 'no', 'Affectionate and loyal', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sup_id`, `sup_name`) VALUES
(1, 'Praterstrasse 23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'user',
  `picture` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `status`, `picture`, `first_name`, `last_name`) VALUES
(2, 'kos@kos.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'adm', 'https://www.wpeka.com/rgh/wp-content/uploads/2014/03/Changing-the-default-admin-user-in-WordPress1-e1462965535256.jpg', 'Jhon', 'Jonson'),
(3, 'ud@ud.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user', 'https://img.freepik.com/free-photo/handsome-cheerful-man-with-happy-smile_176420-18028.jpg', 'James ', 'Denger '),
(4, 'user@test.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user', 'https://cdn.pixabay.com/photo/2023/09/04/07/56/lemur-8232231_1280.png', '', ''),
(5, 'coco@coco.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Labrador_Retriever_portrait.jpg/1200px-Labrador_Retriever_portrait.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

CREATE TABLE `user_product` (
  `id` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `fk_product` int(11) NOT NULL,
  `adoption_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sup` (`fk_supplier`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_product`
--
ALTER TABLE `user_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`fk_user`),
  ADD KEY `fk_product` (`fk_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_product`
--
ALTER TABLE `user_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_sup` FOREIGN KEY (`fk_supplier`) REFERENCES `suppliers` (`sup_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_product`
--
ALTER TABLE `user_product`
  ADD CONSTRAINT `user_product_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_product_ibfk_2` FOREIGN KEY (`fk_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
