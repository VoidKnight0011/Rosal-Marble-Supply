-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 05:31 AM
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
-- Database: `rosal-marble-supply`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `users_id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`users_id`, `admin_id`, `username`, `password`, `date`) VALUES
(1, 96017615083817511, 'admin', 'webdevboys', '2025-04-14 17:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category` varchar(25) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category`, `product_description`, `product_image`) VALUES
(1, 'Cornesa', 'Cement', 'Ready-made cement blocks for constructing borders, moldings, or trims.', 'cement_cornesa.png'),
(2, 'Flower Decorative', 'Cement', 'Decorative cement tiles with floral designs for ornamental walls.', 'cement_flowerdecorative.png'),
(3, 'Louver', 'Cement', 'Ventilated cement blocks for air circulation and architectural details.', 'cement_louver.png'),
(4, 'Standard Cement Baluster', 'Cement', 'Typical cement balusters for a stairway, balcony, or railing.\r\n', 'cement_ordinary.png'),
(5, 'Precast', 'Cement', 'Molded cement designs for use in fences, facades, or decorative barriers.', 'cement_precast.png'),
(6, 'Araal', 'Crazy Cut', 'Long-lasting and specially textured Ara-al stone in irregular cuts for creative stonework.', 'crazycut_araal.png'),
(7, 'Greenstone', 'Crazy Cut', 'Unsymmetrical cut greenstone slabs for natural stone flooring or wall cladding.', 'crazycut_greenstone.png'),
(8, 'Sandstone', 'Crazy Cut', 'Terracotta-colored sandstone with a natural finish, most appropriate for patios and walkways.', 'crazycut_standstone.png'),
(9, 'Woodstone', 'Crazy Cut', 'Weathered, wood-grained stone slices applied in decorative paving or facade finishes.', 'crazycut_woodstone.png'),
(10, 'Roundpost', 'Marbles', 'Smooth, rounded marble posts to use for columns or gate pillars.', 'marbles_roundpost.png'),
(11, 'Slabs Bulacan Beige', 'Marbles', 'Level marble slabs in warm beige color ideal for countertops and floors.', 'marbles_slabsbulacanbiege.png'),
(12, 'Solid Marble Baluster', 'Marbles', 'Carved marble railings for vintage and stylish structural design.', 'marbles_solid.png'),
(13, 'Black', 'Pebbles', 'Polished black pebbles well-suited for contemporary decorative elements or walkways.', 'pebbles_black.png'),
(14, 'Golden', 'Pebbles', 'Naturally golden pebbles well-suited for landscaping and decorative ground cover.\r\n', 'pebbles_gold.png'),
(15, 'White', 'Pebbles', 'Smooth, white stones well-suited for clean, sophisticated garden or interior trim.', 'pebbles_white.png'),
(16, 'Black', 'Rubbles', 'Shiny black rubbles most appropriate for accent borders and garden themes.', 'rubbles_black.png'),
(17, 'Golden', 'Rubbles', 'Golden Rubbles – Coarse, natural golden rubble for base fill or rural outdoor decoration.', 'rubbles_gold.png'),
(18, 'White', 'Rubbles', 'Brilliant white rubble well-suited for fill work or decorative rock elements.', 'rubbles_white.png'),
(19, 'Araal', 'Stone', 'Rugged, natural stone ideal for heavy-duty construction.', 'stone_araal.png'),
(20, 'Beige White', 'Stone', 'Gentle beige-white stones for understated, fashionable architectural finishes.\r\n', 'stone_beigewhite.png'),
(21, 'Charcoal Stone', 'Stone', 'Dark-colored stone perfect for striking, contemporary landscaping or cladding.', 'stone_charcoalstone.png'),
(22, 'Clay Bricks', 'Stone', 'Old-fashioned clay bricks for use in building or retro-style designs.', 'stone_claybricks.png'),
(23, 'Garage Flooring Tiles', 'Stone', 'Tough tiles designed for garage floors or heavy traffic.', 'stone_garageflooringtiles.png'),
(24, 'Gray Marble', 'Stone', 'Traditional gray marble for classic flooring or countertop designs.', 'stone_graymarble.png'),
(25, 'Greenstone', 'Stone', 'Dark green-colored stone utilized for decorative walls, flooring, or outdoor design.', 'stone_greenstone.png'),
(26, 'Mactan', 'Stone', 'Light-colored limestone commonly applied in flooring and exterior walls.', 'stone_mactan.png'),
(27, 'Pink Marble', 'Stone', 'Sophisticated pink marble ideal for accent walls and decor surfaces.', 'stone_pinkmarble.png'),
(28, 'Red Pavers Bricks', 'Stone', 'Strong red paving bricks to use on driveways, patios, and walkways.', 'stone_redpaversbricks.png'),
(29, 'Sandstone', 'Stone', 'Warm-colored sandstone is commonly applied in paving and cladding.', 'stone_sandstone.png'),
(35, 'Woodstone', 'Stone', 'Wa', 'stone_woodstone.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `date` (`date`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `users_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
