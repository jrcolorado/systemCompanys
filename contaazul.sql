-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2017 at 01:28 PM
-- Server version: 5.7.19-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contaazul`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `addres` varchar(100) DEFAULT NULL,
  `addres_number1` varchar(50) DEFAULT NULL,
  `addres_number2` varchar(50) DEFAULT NULL,
  `addres_neighb` varchar(100) DEFAULT NULL,
  `addres_city` varchar(50) DEFAULT NULL,
  `addres_state` varchar(50) DEFAULT NULL,
  `addres_country` varchar(50) DEFAULT NULL,
  `addres_zipcode` varchar(50) DEFAULT NULL,
  `stars` int(11) NOT NULL,
  `internal_obs` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `id_company`, `name`, `email`, `phone`, `addres`, `addres_number1`, `addres_number2`, `addres_neighb`, `addres_city`, `addres_state`, `addres_country`, `addres_zipcode`, `stars`, `internal_obs`) VALUES
(1, 1, 'JULIO MACHADO', 'joaoromario@gmail.com', '51991661595', 'RUA SÃ£O JOAQUIM', '111', '2525', 'ESTÃ¢NCIA VELHA', 'CANOAS', 'RS', 'BRASIL', '92030650', 5, 'GHGDXRTDXDI\r\nJHLCGKHDYTXDITY\r\nHFYTFYITDTY\r\nKGHDJTFJTRSRTI\r\nLUHGFYTIDITY\r\n'),
(6, 1, 'JUCA BALA', 'JUCA@JUCA.COM.BR', '51991661595', 'RUA SANTO EXPEDITO', '5', '69', 'ESTÃ¢NCIA VELHA', 'CANOAS', 'RS', 'BRASIL', '92030640', 4, 'UYUYUYUYUYUYUYUYUYUYUYUYU'),
(7, 1, 'EMPRESA JR COLORADO', 'julio@terra.com.br', '51991661595', 'RUA CONDE DE PORTO ALEGRE', '99', '11', 'FLORESTA', 'PORTO ALEGRE', 'RS', 'BRASIL', '90220210', 1, 'TSTSTSTSTSTSSTSTSTSTSTSTSTYSTSTSTS\r\nGSYTFYSAIYTYAS\r\nOUAYSFDIYTASDYIT\r\nOUYASFDYTIASFDO\r\n'),
(8, 1, 'SISTEM MADEIRAS LTDA', 'cesar@terra.com.br', '51991661595', 'RUA SÃ£O JOAQUIM', '111', '2525', 'ESTÃ¢NCIA VELHA', 'CANOAS', 'RS', 'BRASIL', '92030650', 1, 'GHGDXRTDXDI\r\nUIGUFOCYCYTCYTYTCCYTICYTICYITCTYICIYTCI\r\nGDRTD\r\nUHFYIFCOYUTFIYFUYFYUFYUOFOUYFOUYFOUYFOUYFOYU'),
(9, 1, 'ANA DA SILVA', 'teste@teste.com.br', '51991661595', '', '', '', '', 'PORTO ALEGRE', '', '', '', 3, ''),
(10, 1, 'PEDRO ERNESTO DA SILVA', 'teste@teste.com.br', '51991661595', '', '', '', '', 'PORTO ALEGRE', '', '', '', 3, ''),
(11, 1, 'MARCELO DA SILVA SANTOS', 'teste@teste.com.br', '51991661595', '', '', '', '', 'PORTO ALEGRE', '', '', '', 3, ''),
(12, 1, 'EMPRESA DUAL MEDEIROS DA SILVA', 'teste@teste.com.br', '51991661595', '', '', '', '', 'PORTO ALEGRE', '', '', '', 3, ''),
(24, 1, 'JULIO MACHADO SANTOS', 'teste@teste.com.br', '51991661595', '', '', '', '', 'PORTO ALEGRE', '', '', '', 3, ''),
(138, 1, 'SILVANA BEATRIZ SANTOS MACHADO', 'teste@teste.com.br', '51991661595', '', '', '', '', 'PORTO ALEGRE', '', '', '92030650', 3, ''),
(154, 1, 'SILVANA BEATRIS SANTOS MACHADO', 'teste@teste.com.br', '51991661595', 'RUA SÃ£O JOAQUIM', '1339', '', 'ESTÃ¢NCIA VELHA', 'CANOAS', 'RS', 'BRASIL', '92030650', 3, ''),
(155, 1, 'SILVANA BEATRIS SANTOS MACHADO FERREIRA FERRARI LUNARDI', 'teste@teste.com.br', '51991661595', '', '', '', '', 'PORTO ALEGRE', '', '', '', 3, ''),
(205, 1, 'JULIO MACHADO ', 'teste@teste.com.br', '51991661595', '', '', '', '', 'PORTO ALEGRE', '', '', '', 3, ''),
(206, 1, 'JOAO ROMARIO DA SILVA FERREIRA SOBRINHO ', 'joaoromario@gmail.com', '51991661595', 'RUA SÃ£O JOAQUIM', '1339', 'casa A', 'ESTÃ¢NCIA VELHA', 'CANOAS', 'RS', 'BRASIL', '92030650', 3, 'MELHOR DOS MELHORES CLIENTS'),
(207, 1, 'MARIA DA GRACA', '', '', '', '', '', '', '', '', '', '', 3, ''),
(208, 1, 'SIMONE HORTS', '', '', '', '', '', '', '', '', '', '', 3, ''),
(209, 1, 'SIMONE ANTUNES DE ALMEIDA', '', '', '', '', '', '', '', '', '', '', 3, ''),
(210, 1, 'SIMONE FERRARI ZOTTIS', '', '', '', '', '', '', '', '', '', '', 3, ''),
(211, 1, 'macedo de oliveira antunes', '', '', '', '', '', '', '', '', '', '', 3, ''),
(212, 1, 'joana das carrocas ', '', '', '', '', '', '', '', '', '', '', 3, ''),
(213, 1, 'joana das carrocas ', '', '', '', '', '', '', '', '', '', '', 3, ''),
(214, 1, 'jorge antonio lisboa ', '', '', '', '', '', '', '', '', '', '', 3, ''),
(215, 1, 'jorge antonio lisboa jardim ', '', '', '', '', '', '', '', '', '', '', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`) VALUES
(1, 'RGW Brasil SA'),
(2, 'GENERAL LTDA');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quant` int(11) NOT NULL,
  `min_quant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `id_company`, `name`, `price`, `quant`, `min_quant`) VALUES
(31, 1, 'SAPATO SOCIAL MASCULINO PRETO', 100, 12, 10),
(32, 1, 'CAMISA POLO NIKE MASCULINA', 85, 9, 5),
(33, 1, 'MEIA NIKE PCT C/4 UN ', 65, 1, 10),
(34, 1, 'CASACO NIKE', 65, 2, 1),
(35, 1, 'CAMISA POLO ADIDAS ', 100, 1, 1),
(36, 1, 'CALCAO REEBOK', 25, 2, 5),
(37, 1, 'KIT MEIAS', 100, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_history`
--

CREATE TABLE `inventory_history` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `action` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_action` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory_history`
--

INSERT INTO `inventory_history` (`id`, `id_company`, `id_product`, `action`, `id_user`, `date_action`) VALUES
(3, 1, 31, 'add', 2, '2017-08-09 11:32:47'),
(4, 1, 32, 'add', 2, '2017-08-09 12:28:13'),
(5, 1, 33, 'add', 2, '2017-08-09 12:47:15'),
(6, 1, 33, 'edit', 2, '2017-08-09 13:10:35'),
(7, 1, 33, 'edit', 2, '2017-08-09 13:33:22'),
(8, 1, 33, 'edit', 2, '2017-08-09 13:33:29'),
(9, 1, 33, 'edit', 2, '2017-08-09 13:34:02'),
(10, 1, 33, 'edit', 2, '2017-08-09 13:34:14'),
(11, 1, 33, 'edit', 2, '2017-08-09 13:34:56'),
(12, 1, 33, 'edit', 2, '2017-08-09 13:35:03'),
(13, 1, 33, 'edit', 2, '2017-08-09 13:36:06'),
(14, 1, 33, 'edit', 2, '2017-08-09 13:38:06'),
(15, 1, 33, 'edit', 2, '2017-08-09 13:38:10'),
(16, 1, 33, 'edit', 2, '2017-08-09 13:38:16'),
(17, 1, 33, 'edit', 2, '2017-08-09 13:39:34'),
(18, 1, 33, 'edit', 2, '2017-08-09 13:39:38'),
(19, 1, 33, 'edit', 2, '2017-08-09 13:39:43'),
(20, 1, 33, 'edit', 2, '2017-08-09 13:39:50'),
(21, 1, 33, 'edit', 2, '2017-08-09 13:40:18'),
(22, 1, 33, 'edit', 2, '2017-08-09 13:40:27'),
(23, 1, 33, 'edit', 2, '2017-08-09 13:40:40'),
(24, 1, 33, 'edit', 2, '2017-08-09 13:42:36'),
(25, 1, 33, 'edit', 2, '2017-08-09 13:43:57'),
(26, 1, 33, 'edit', 2, '2017-08-09 13:44:01'),
(27, 1, 33, 'edit', 2, '2017-08-09 13:44:07'),
(28, 1, 34, 'add', 2, '2017-08-09 13:45:30'),
(29, 1, 34, 'edit', 2, '2017-08-09 13:46:05'),
(30, 1, 31, 'edit', 2, '2017-08-09 14:07:28'),
(31, 1, 34, 'edit', 2, '2017-08-09 14:08:46'),
(32, 1, 34, 'edit', 2, '2017-08-09 14:09:06'),
(33, 1, 34, 'edit', 2, '2017-08-09 14:09:13'),
(34, 1, 31, 'edit', 2, '2017-08-09 14:10:09'),
(35, 1, 33, 'edit', 2, '2017-08-09 14:10:18'),
(36, 1, 34, 'edit', 2, '2017-08-09 14:10:28'),
(37, 1, 32, 'edit', 2, '2017-08-09 14:10:36'),
(38, 1, 31, 'edit', 2, '2017-08-09 14:10:43'),
(39, 1, 31, 'edit', 2, '2017-08-09 14:10:54'),
(40, 1, 31, 'edit', 2, '2017-08-09 14:11:12'),
(41, 1, 0, 'add', 2, '2017-08-09 18:48:27'),
(42, 1, 0, 'add', 2, '2017-08-09 18:48:46'),
(43, 1, 34, 'edit', 2, '2017-08-09 18:48:57'),
(44, 1, 0, 'add', 2, '2017-08-09 18:52:54'),
(45, 1, 35, 'add', 2, '2017-08-09 18:56:53'),
(46, 1, 31, 'edit', 2, '2017-08-09 19:03:11'),
(47, 1, 33, 'edit', 2, '2017-08-09 19:03:20'),
(48, 1, 32, 'edit', 2, '2017-08-09 19:03:31'),
(49, 1, 35, 'add', 2, '2017-08-11 15:09:04'),
(50, 1, 36, 'add', 2, '2017-08-13 19:50:13'),
(51, 1, 36, 'edit', 2, '2017-08-13 19:50:28'),
(52, 1, 36, 'dwn', 2, '2017-08-13 19:56:13'),
(53, 1, 36, 'dwn', 2, '2017-08-13 19:56:48'),
(54, 1, 36, 'dwn', 2, '2017-08-13 19:57:24'),
(55, 1, 36, 'dwn', 2, '2017-08-13 19:57:57'),
(56, 1, 33, 'dwn', 2, '2017-08-13 19:57:57'),
(57, 1, 36, 'dwn', 2, '2017-08-13 19:58:51'),
(58, 1, 33, 'dwn', 2, '2017-08-13 19:58:51'),
(59, 1, 32, 'dwn', 2, '2017-08-13 20:01:17'),
(60, 1, 32, 'dwn', 2, '2017-08-13 20:07:05'),
(61, 1, 32, 'dwn', 2, '2017-08-13 20:07:21'),
(62, 1, 34, 'dwn', 2, '2017-08-13 20:10:30'),
(63, 1, 31, 'dwn', 2, '2017-08-13 20:11:34'),
(64, 1, 31, 'dwn', 2, '2017-08-13 20:14:22'),
(65, 1, 31, 'dwn', 2, '2017-08-13 20:15:52'),
(66, 1, 32, 'dwn', 2, '2017-08-13 20:16:04'),
(67, 1, 35, 'dwn', 2, '2017-08-13 20:16:22'),
(68, 1, 32, 'dwn', 2, '2017-08-13 21:01:31'),
(69, 1, 37, 'add', 2, '2017-08-14 08:24:32'),
(70, 1, 37, 'dwn', 2, '2017-08-14 08:36:15'),
(71, 1, 37, 'dwn', 2, '2017-08-14 08:37:54'),
(72, 1, 37, 'dwn', 2, '2017-08-14 08:38:12'),
(73, 1, 31, 'dwn', 2, '2017-08-14 13:16:03'),
(74, 1, 34, 'dwn', 2, '2017-08-14 13:16:04'),
(75, 1, 33, 'dwn', 2, '2017-08-14 13:16:04'),
(76, 1, 35, 'dwn', 2, '2017-08-14 13:16:04'),
(77, 1, 36, 'dwn', 2, '2017-08-14 13:16:04'),
(78, 1, 31, 'dwn', 2, '2017-08-14 16:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_group`
--

CREATE TABLE `permissions_group` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `params` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions_group`
--

INSERT INTO `permissions_group` (`id`, `id_company`, `name`, `params`) VALUES
(2, 1, 'Desenvolvedor', '1,2,16,17,18,19,20,23,24,25,26,27,28'),
(3, 1, 'Analista Junior', '1,17'),
(4, 1, 'Testador de Software', '1,17,18'),
(5, 2, 'Admin', '21,22');

-- --------------------------------------------------------

--
-- Table structure for table `permission_params`
--

CREATE TABLE `permission_params` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_params`
--

INSERT INTO `permission_params` (`id`, `id_company`, `name`) VALUES
(1, 1, 'logout'),
(2, 1, 'permissions_view'),
(16, 1, 'nomedapermissao'),
(17, 1, 'users_view'),
(18, 1, 'clients_view'),
(19, 1, 'clients_edit'),
(20, 1, 'Users_edit'),
(21, 2, 'permissions_view'),
(22, 2, 'nomedapermissao'),
(23, 1, 'inventory_view'),
(24, 1, 'inventory_add'),
(25, 1, 'inventory_edit'),
(26, 1, 'sales_view'),
(27, 1, 'sales_edit'),
(28, 1, 'report_view');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_purches` datetime NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purcheses_products`
--

CREATE TABLE `purcheses_products` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quant` int(11) NOT NULL,
  `purchase_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_sale` datetime NOT NULL,
  `total_price` float NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `id_company`, `id_clients`, `id_user`, `date_sale`, `total_price`, `status`) VALUES
(28, 1, 154, 2, '2017-08-14 08:36:15', 200, 1),
(29, 1, 205, 2, '2017-08-14 08:37:53', 300, 2),
(30, 1, 208, 2, '2017-08-14 08:38:12', 100, 1),
(31, 1, 7, 2, '2017-08-14 13:16:03', 720, 3),
(32, 1, 213, 2, '2017-08-14 16:43:38', 400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_products`
--

CREATE TABLE `sales_products` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_sale` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `sale_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_products`
--

INSERT INTO `sales_products` (`id`, `id_company`, `id_sale`, `id_product`, `quant`, `sale_price`) VALUES
(26, 1, 27, 32, 1, 85),
(27, 1, 28, 37, 2, 100),
(28, 1, 29, 37, 3, 100),
(29, 1, 30, 37, 1, 100),
(30, 1, 31, 31, 4, 100),
(31, 1, 31, 34, 1, 65),
(32, 1, 31, 33, 2, 65),
(33, 1, 31, 35, 1, 100),
(34, 1, 31, 36, 1, 25),
(35, 1, 32, 31, 4, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_group` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_company`, `email`, `password`, `id_group`) VALUES
(1, 2, 'user@teste.com.br', '202cb962ac59075b964b07152d234b70', '5'),
(2, 1, 'joaoromario@gmail.com', '202cb962ac59075b964b07152d234b70', '2'),
(3, 2, 'jrcolorado@hotmail.com', '202cb962ac59075b964b07152d234b70', '5'),
(4, 1, 'jucabala@terra.com.br', '202cb962ac59075b964b07152d234b70', '4'),
(5, 1, 'paula@rgw.con.br', '202cb962ac59075b964b07152d234b70', '4'),
(8, 1, 'anajulia@terra.com.br', '202cb962ac59075b964b07152d234b70', '5'),
(9, 1, 'micaelaabt@gmail.com', '202cb962ac59075b964b07152d234b70', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_history`
--
ALTER TABLE `inventory_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions_group`
--
ALTER TABLE `permissions_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_params`
--
ALTER TABLE `permission_params`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purcheses_products`
--
ALTER TABLE `purcheses_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_products`
--
ALTER TABLE `sales_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `inventory_history`
--
ALTER TABLE `inventory_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `permissions_group`
--
ALTER TABLE `permissions_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `permission_params`
--
ALTER TABLE `permission_params`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purcheses_products`
--
ALTER TABLE `purcheses_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `sales_products`
--
ALTER TABLE `sales_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
