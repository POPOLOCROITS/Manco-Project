-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2016 a las 04:49:07
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ajaxtests`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajaxusers`
--

CREATE TABLE `ajaxusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(50) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cart` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ajaxusers`
--

INSERT INTO `ajaxusers` (`id`, `user`, `first_name`, `last_name`, `passwd`, `email`, `cart`) VALUES
(1, 'arkos', 'Juan', 'Pérez', '61f7206bff04ebaa30e0ec9e38d08f02', 'arkos.noem.arenom@gmail.com', 5),
(2, 'popolocroits', 'Julio', 'Leon', '202cb962ac59075b964b07152d234b70', 'correo@test.com', 0),
(14, 'Legion', '', '', '202cb962ac59075b964b07152d234b70', 'dio@ijodefruta.com', 0),
(15, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id_user` int(10) NOT NULL,
  `product` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `serie` varchar(300) CHARACTER SET utf8 NOT NULL,
  `height` int(10) NOT NULL,
  `url` varchar(500) CHARACTER SET utf8 NOT NULL,
  `view` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `product_name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `series_product` varchar(150) CHARACTER SET utf8 NOT NULL,
  `manufacturer` varchar(150) CHARACTER SET utf8 NOT NULL,
  `category` varchar(150) CHARACTER SET utf8 NOT NULL,
  `price` int(10) NOT NULL,
  `date_rel` date NOT NULL,
  `sculptor` varchar(150) CHARACTER SET utf8 NOT NULL,
  `cooperation` varchar(150) CHARACTER SET utf8 NOT NULL,
  `relesed_by` varchar(150) CHARACTER SET utf8 NOT NULL,
  `distributed_by` varchar(150) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `serie`, `height`, `url`, `view`, `description`, `product_name`, `series_product`, `manufacturer`, `category`, `price`, `date_rel`, `sculptor`, `cooperation`, `relesed_by`, `distributed_by`) VALUES
(1, 'Kousaka Honoka', 'Love Live', 157, 'http://schoolido.lu/static/idols/chibi/Kousaka_Honoka.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta metus in interdum scelerisque. Curabitur in elit sed ligula egestas fermentum quis vel ante. Suspendisse vitae ipsum aliquet, feugiat mauris sed, varius ex. Vestibulum condimentum faucibus fermentum. Nam eu bibendum ipsum. Vestibulum quis rutrum libero. Aenean ac libero finibus, vulputate leo sagittis, egestas felis. Maecenas porttitor interdum urna in tristique.', '', '', '', '', 0, '0000-00-00', '', '', '', ''),
(2, 'Hoshizora Rin', 'Love Live', 155, 'http://schoolido.lu/static/idols/chibi/Hoshizora_Rin.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta metus in interdum scelerisque. Curabitur in elit sed ligula egestas fermentum quis vel ante. Suspendisse vitae ipsum aliquet, feugiat mauris sed, varius ex. Vestibulum condimentum faucibus fermentum. Nam eu bibendum ipsum. Vestibulum quis rutrum libero. Aenean ac libero finibus, vulputate leo sagittis, egestas felis. Maecenas porttitor interdum urna in tristique.', '', '', '', '', 0, '0000-00-00', '', '', '', ''),
(3, 'Nico Yazawa', 'Love Live', 154, 'http://schoolido.lu/static/idols/chibi/Yazawa_Nico.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta metus in interdum scelerisque. Curabitur in elit sed ligula egestas fermentum quis vel ante. Suspendisse vitae ipsum aliquet, feugiat mauris sed, varius ex. Vestibulum condimentum faucibus fermentum. Nam eu bibendum ipsum. Vestibulum quis rutrum libero. Aenean ac libero finibus, vulputate leo sagittis, egestas felis. Maecenas porttitor interdum urna in tristique.', '', '', '', '', 0, '0000-00-00', '', '', '', ''),
(4, 'Koizumi Hanayo', 'Love Live', 156, 'http://schoolido.lu/static/idols/chibi/Koizumi_Hanayo.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta metus in interdum scelerisque. Curabitur in elit sed ligula egestas fermentum quis vel ante. Suspendisse vitae ipsum aliquet, feugiat mauris sed, varius ex. Vestibulum condimentum faucibus fermentum. Nam eu bibendum ipsum. Vestibulum quis rutrum libero. Aenean ac libero finibus, vulputate leo sagittis, egestas felis. Maecenas porttitor interdum urna in tristique.', '', '', '', '', 0, '0000-00-00', '', '', '', ''),
(5, 'Hayase Eli', 'Love Live', 162, 'http://schoolido.lu/static/idols/chibi/Ayase_Eli.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta metus in interdum scelerisque. Curabitur in elit sed ligula egestas fermentum quis vel ante. Suspendisse vitae ipsum aliquet, feugiat mauris sed, varius ex. Vestibulum condimentum faucibus fermentum. Nam eu bibendum ipsum. Vestibulum quis rutrum libero. Aenean ac libero finibus, vulputate leo sagittis, egestas felis. Maecenas porttitor interdum urna in tristique.', '', '', '', '', 0, '0000-00-00', '', '', '', ''),
(6, 'Tojo Nozomi', 'Love Live', 159, 'http://schoolido.lu/static/idols/chibi/Toujou_Nozomi.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta metus in interdum scelerisque. Curabitur in elit sed ligula egestas fermentum quis vel ante. Suspendisse vitae ipsum aliquet, feugiat mauris sed, varius ex. Vestibulum condimentum faucibus fermentum. Nam eu bibendum ipsum. Vestibulum quis rutrum libero. Aenean ac libero finibus, vulputate leo sagittis, egestas felis. Maecenas porttitor interdum urna in tristique.', '', '', '', '', 0, '0000-00-00', '', '', '', ''),
(7, 'Nishikino Maki', 'Love Live', 161, 'http://schoolido.lu/static/idols/chibi/Nishikino_Maki.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta metus in interdum scelerisque. Curabitur in elit sed ligula egestas fermentum quis vel ante. Suspendisse vitae ipsum aliquet, feugiat mauris sed, varius ex. Vestibulum condimentum faucibus fermentum. Nam eu bibendum ipsum. Vestibulum quis rutrum libero. Aenean ac libero finibus, vulputate leo sagittis, egestas felis. Maecenas porttitor interdum urna in tristique.', 'figma Maki Nishikino', '', 'Max Factory', 'Figma', 850, '2016-04-01', 'Max Factory (Jun Yamaoka)', 'Masaki Apsy', 'Max Factory', 'Good Smile Company'),
(8, 'Minami Kotori', 'Love Live', 159, 'http://schoolido.lu/static/idols/chibi/Minami_Kotori.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta metus in interdum scelerisque. Curabitur in elit sed ligula egestas fermentum quis vel ante. Suspendisse vitae ipsum aliquet, feugiat mauris sed, varius ex. Vestibulum condimentum faucibus fermentum. Nam eu bibendum ipsum. Vestibulum quis rutrum libero. Aenean ac libero finibus, vulputate leo sagittis, egestas felis. Maecenas porttitor interdum urna in tristique.', '', '', '', '', 0, '0000-00-00', '', '', '', ''),
(9, 'Sonoda Umi', 'Love Live', 159, 'http://schoolido.lu/static/idols/chibi/Sonoda_Umi.png', '', '', '', '', '', '', 0, '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_images`
--

CREATE TABLE `products_images` (
  `product_id` int(10) NOT NULL,
  `url_photo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `url_thumbnail` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products_images`
--

INSERT INTO `products_images` (`product_id`, `url_photo`, `url_thumbnail`) VALUES
(7, 'http://images.goodsmile.info/cgm/images/product/20151208/5393/36840/large/7a51019eca5d98715ae78e718e431728.jpg', 'http://images.goodsmile.info/cgm/images/product/20151208/5393/36840/large/7a51019eca5d98715ae78e718e431728.jpg'),
(7, 'http://images.goodsmile.info/cgm/images/product/20151208/5393/36841/large/86ee32c7a964f2e939bb54fa9367fd3b.jpg', 'http://images.goodsmile.info/cgm/images/product/20151208/5393/36841/large/86ee32c7a964f2e939bb54fa9367fd3b.jpg'),
(7, 'http://images.goodsmile.info/cgm/images/product/20151208/5393/36842/large/ed07c6b18304a7283386b6b98c24392f.jpg', 'http://images.goodsmile.info/cgm/images/product/20151208/5393/36842/large/ed07c6b18304a7283386b6b98c24392f.jpg'),
(7, 'http://images.goodsmile.info/cgm/images/product/20151208/5393/36844/large/34241ea1fc26aca159327f9ce190e15c.jpg', 'http://images.goodsmile.info/cgm/images/product/20151208/5393/36844/large/34241ea1fc26aca159327f9ce190e15c.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ajaxusers`
--
ALTER TABLE `ajaxusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ajaxusers`
--
ALTER TABLE `ajaxusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
