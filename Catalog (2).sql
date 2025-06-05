CREATE DATABASE catalog1;

USE catalog1;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `parola` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carti`
--

CREATE TABLE `carti` (
  `id` int NOT NULL,
  `titlu` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_romanian_ci NOT NULL,
  `autor` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_romanian_ci NOT NULL,
  `an_aparitie` int NOT NULL,
  `editura` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_romanian_ci NOT NULL,
  `ISBN` varchar(17) CHARACTER SET utf8mb3 COLLATE utf8mb3_romanian_ci NOT NULL,
  `nr_exemplare` int NOT NULL,
  `image` varchar(150) COLLATE utf8mb3_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_romanian_ci;

--
-- Dumping data for table `carti`
--

INSERT INTO `carti` (`id`, `titlu`, `autor`, `an_aparitie`, `editura`, `ISBN`, `nr_exemplare`, `image`) VALUES
(1, 'Ion', 'Liviu Rebreanu', 2011, 'Humanitas', '978-973-50-6361-4', 0, ''),
(2, 'Enigma Otiliei', 'George Călinescu', 2013, 'Rao', '978-606-609-362-8', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nume` varchar(100) NOT NULL,
  `prenume` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefon` int NOT NULL,
  `rezervari` text NOT NULL,
  `parola` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carti`
--
ALTER TABLE `carti`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carti`
--
ALTER TABLE `carti`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
