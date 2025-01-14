-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 04:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_examens`
--

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `id_compte` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`id_compte`, `email`, `password`, `id_user`) VALUES
(1, 'fz.blz.etudiant@gmail.com', '$2y$10$DvpoPlptK0g0Jv93LcmEO.sbAmnAj7FqzmiZfZmMXJ8Bof3A8Dodq', 1),
(2, 'fati.prof@gmail.com', '$2y$10$1V1vMdUFf40GVW.DsohFi.cGq4TTCy48nikjii/vfvpy6qCchK45K', 2),
(3, 'simolahbib.etudiant@gmail.com', '$2y$10$2FBl85tFKqo95iUwWsaWHeJvhtx9dPpyMi3ZQuQ54fec72uxTE8dm', 3),
(4, 'mariem.etudiant@gmail.com', '$2y$10$e4j6vM6sg1whhFVHwv5BEuepsZmO1BEn.ZTm9maMNyb0/akAX/uLm', 4),
(5, 'blz.etudiant@gmail.com', '$2y$10$YtI4C19.SeOuelRirFXrh.U/aeD5IRZxM3qyqhhuArKYmf.ry3Jc6', 5),
(6, 'ahmed.prof@gmail.com', '$2y$10$iYp96o6ZtYdozRVR0Hukn.YvdW9R5YnqwT85vuDuwal8isgye1Gke', 6),
(8, 'jaafar.prof@gmail.com', '$2y$10$Pnb6kyT7tcP8InJoUsmGGuRlH5mh2e6f.Ky3.ugTCPHyzKtT2MoyS', 8);

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `name`) VALUES
(1, 'Ingénierie Logicielle'),
(2, 'Intelligence Artificielle');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id_module` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `name`, `id_filiere`, `id_user`) VALUES
(1, 'Design Thinking', 1, 8),
(2, 'Genie Logicielle avance', 1, 8),
(3, 'Traitement d image', 2, 2),
(4, 'Soft Skills', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `grade` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'etudiant'),
(2, 'prof');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_filiere` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `id_filiere`, `first_name`, `last_name`) VALUES
(1, 1, 2, 'Fatima zahra', 'Ejjafri'),
(2, 2, 2, 'fatima', 'zahra'),
(3, 1, 1, 'Asma ', 'Idbaba'),
(4, 1, 1, 'Nassima ', 'Taarabet'),
(5, 1, 1, 'FATIMA-EZZAHRA', 'BOULOUIZ'),
(6, 2, 1, 'ahmed', 'mohammed'),
(8, 2, 1, 'Jaafar', 'IDRAIS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_compte`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`),
  ADD KEY `fk_module_filiere` (`id_filiere`),
  ADD KEY `fk_module_user` (`id_user`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `fk_note_module` (`id_module`),
  ADD KEY `fk_note_user` (`id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `fk_user_filiere` (`id_filiere`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `fk_module_filiere` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_module_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_note_module` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_note_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_filiere` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
