-- Database creation

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
DROP DATABASE IF EXISTS pizza_mco;
CREATE DATABASE IF NOT EXISTS `pizza_mco` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pizza_mco`;


DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `ingredients` (`id`, `name`, `price`) VALUES
(1, 'tomato', '0.50'),
(2, 'sliced mushrooms', '0.50'),
(3, 'feta cheese', '1.00'),
(4, 'sausages', '1.00'),
(5, 'sliced onion', '0.50'),
(6, 'mozzarella cheese', '0.50'),
(7, 'oregano', '1.00'),
(8, 'pepperoni', '1.00'),
(9, 'olives', '0.50'),
(10, 'ham', '1.00');

DROP TABLE IF EXISTS `pizzas`;
CREATE TABLE `pizzas` (
  `id` int(11) NOT NULL,
  `pizza_name` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pizzas` (`id`, `pizza_name`, `description`) VALUES
(1, 'Margarita base', 'Base with tomato, mozzarella, and oregano'),
(2, 'Hawai', 'Base with tomato, mozzarella, oregano, jam and pin'),
(3, 'Salami', 'Base with tomato, mozzarella, and oregano and sala'),
(5, 'Mushroms', 'Base with tomato, mozzarella, and oregano and mush'),
(7, 'Olivian', 'Base with mozzarela, tomato, oregano and olives'),
(8, 'Bacon', 'Base with mozzarela, tomato, oregano and bacon');

DROP TABLE IF EXISTS `pizza_extra_ingredients`;
CREATE TABLE `pizza_extra_ingredients` (
  `id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pizza_extra_ingredients` (`id`, `pizza_id`, `ingredient_id`) VALUES
(31, 3, 3),
(32, 3, 1),
(35, 2, 7),
(36, 2, 8),
(37, 1, 2),
(38, 1, 1),
(39, 1, 3),
(40, 3, 1);

DROP TABLE IF EXISTS `pizza_ingredients`;
CREATE TABLE `pizza_ingredients` (
  `id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pizza_ingredients` (`id`, `pizza_id`, `ingredient_id`) VALUES
(18, 1, 1),
(19, 1, 6),
(39, 1, 7),
(40, 2, 2),
(42, 2, 4),
(47, 2, 1),
(48, 5, 7),
(49, 5, 6),
(50, 5, 7),
(51, 5, 6),
(52, 3, 8),
(53, 3, 1),
(54, 3, 8),
(55, 3, 1),
(57, 8, 6),
(58, 8, 10),
(59, 8, 6),
(60, 7, 9);



CREATE VIEW pizza_prices AS
SELECT p.id, p.pizza_name, p.description, CAST(SUM(i.price)+ 0.5*SUM(i.price) AS DECIMAL(10,2)) AS total_price
FROM pizzas p 
JOIN pizza_ingredients pi ON p.id = pi.pizza_id
JOIN ingredients i ON pi.ingredient_id = i.id
GROUP BY p.id, p.pizza_name;


ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pizza_extra_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_id` (`pizza_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

ALTER TABLE `pizza_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_id` (`pizza_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);


ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `pizza_extra_ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

ALTER TABLE `pizza_ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;


ALTER TABLE `pizza_extra_ingredients`
  ADD CONSTRAINT `pizza_extra_ingredients_ibfk_1` FOREIGN KEY (`pizza_id`) REFERENCES `pizzas` (`id`),
  ADD CONSTRAINT `pizza_extra_ingredients_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`);

ALTER TABLE `pizza_ingredients`
  ADD CONSTRAINT `pizza_ingredients_ibfk_1` FOREIGN KEY (`pizza_id`) REFERENCES `pizzas` (`id`),
  ADD CONSTRAINT `pizza_ingredients_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
