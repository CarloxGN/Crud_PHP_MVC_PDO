-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2018 a las 07:38:58
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `core`
--
CREATE DATABASE IF NOT EXISTS `core` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `core`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id_country` int(11) NOT NULL,
  `iso_country` char(2) DEFAULT NULL,
  `name_country` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_countries`
--

INSERT INTO `tbl_countries` (`id_country`, `iso_country`, `name_country`) VALUES
(1, 'AF', 'Afganist&aacute;n'),
(2, 'AX', 'Islas Gland'),
(3, 'AL', 'Albania'),
(4, 'DE', 'Alemania'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Ant&aacute;rtida'),
(9, 'AG', 'Antigua y Barbuda'),
(10, 'AN', 'Antillas Holandesas'),
(11, 'SA', 'Arabia Saud&iacute;'),
(12, 'DZ', 'Argelia'),
(13, 'AR', 'Argentina'),
(14, 'AM', 'Armenia'),
(15, 'AW', 'Aruba'),
(16, 'AU', 'Australia'),
(17, 'AT', 'Austria'),
(18, 'AZ', 'Azerbaiy&aacute;n'),
(19, 'BS', 'Bahamas'),
(20, 'BH', 'Bahr&eacute;in'),
(21, 'BD', 'Bangladesh'),
(22, 'BB', 'Barbados'),
(23, 'BY', 'Bielorrusia'),
(24, 'BE', 'B&eacute;lgica'),
(25, 'BZ', 'Belice'),
(26, 'BJ', 'Benin'),
(27, 'BM', 'Bermudas'),
(28, 'BT', 'Bhut&aacute;n'),
(29, 'BO', 'Bolivia'),
(30, 'BA', 'Bosnia y Herzegovina'),
(31, 'BW', 'Botsuana'),
(32, 'BV', 'Isla Bouvet'),
(33, 'BR', 'Brasil'),
(34, 'BN', 'Brun&eacute;i'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'CV', 'Cabo Verde'),
(39, 'KY', 'Islas Caim&aacute;n'),
(40, 'KH', 'Camboya'),
(41, 'CM', 'Camer&uacute;n'),
(42, 'CA', 'Canad&aacute;'),
(43, 'CF', 'Rep&uacute;blica Centroafricana'),
(44, 'TD', 'Chad'),
(45, 'CZ', 'Rep&uacute;blica Checa'),
(46, 'CL', 'Chile'),
(47, 'CN', 'China'),
(48, 'CY', 'Chipre'),
(49, 'CX', 'Isla de Navidad'),
(50, 'VA', 'Ciudad del Vaticano'),
(51, 'CC', 'Islas Cocos'),
(52, 'CO', 'Colombia'),
(53, 'KM', 'Comoras'),
(54, 'CD', 'Rep&uacute;blica Democr&aacute;tica del Congo'),
(55, 'CG', 'Congo'),
(56, 'CK', 'Islas Cook'),
(57, 'KP', 'Corea del Norte'),
(58, 'KR', 'Corea del Sur'),
(59, 'CI', 'Costa de Marfil'),
(60, 'CR', 'Costa Rica'),
(61, 'HR', 'Croacia'),
(62, 'CU', 'Cuba'),
(63, 'DK', 'Dinamarca'),
(64, 'DM', 'Dominica'),
(65, 'DO', 'Rep&uacute;blica Dominicana'),
(66, 'EC', 'Ecuador'),
(67, 'EG', 'Egipto'),
(68, 'SV', 'El Salvador'),
(69, 'AE', 'Emiratos &aacute;rabes Unidos'),
(70, 'ER', 'Eritrea'),
(71, 'SK', 'Eslovaquia'),
(72, 'SI', 'Eslovenia'),
(73, 'ES', 'Espa&ntilde;a'),
(74, 'UM', 'Islas ultramarinas de Estados Unidos'),
(75, 'US', 'Estados Unidos'),
(76, 'EE', 'Estonia'),
(77, 'ET', 'Etiop&iacute;a'),
(78, 'FO', 'Islas Feroe'),
(79, 'PH', 'Filipinas'),
(80, 'FI', 'Finlandia'),
(81, 'FJ', 'Fiyi'),
(82, 'FR', 'Francia'),
(83, 'GA', 'Gab&oacute;n'),
(84, 'GM', 'Gambia'),
(85, 'GE', 'Georgia'),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur'),
(87, 'GH', 'Ghana'),
(88, 'GI', 'Gibraltar'),
(89, 'GD', 'Granada'),
(90, 'GR', 'Grecia'),
(91, 'GL', 'Groenlandia'),
(92, 'GP', 'Guadalupe'),
(93, 'GU', 'Guam'),
(94, 'GT', 'Guatemala'),
(95, 'GF', 'Guayana Francesa'),
(96, 'GN', 'Guinea'),
(97, 'GQ', 'Guinea Ecuatorial'),
(98, 'GW', 'Guinea-Bissau'),
(99, 'GY', 'Guyana'),
(100, 'HT', 'Hait&iacute;'),
(101, 'HM', 'Islas Heard y McDonald'),
(102, 'HN', 'Honduras'),
(103, 'HK', 'Hong Kong'),
(104, 'HU', 'Hungr&iacute;a'),
(105, 'IN', 'India'),
(106, 'ID', 'Indonesia'),
(107, 'IR', 'Ir&aacute;n'),
(108, 'IQ', 'Iraq'),
(109, 'IE', 'Irlanda'),
(110, 'IS', 'Islandia'),
(111, 'IL', 'Israel'),
(112, 'IT', 'Italia'),
(113, 'JM', 'Jamaica'),
(114, 'JP', 'Jap&oacute;n'),
(115, 'JO', 'Jordania'),
(116, 'KZ', 'Kazajst&aacute;n'),
(117, 'KE', 'Kenia'),
(118, 'KG', 'Kirguist&aacute;n'),
(119, 'KI', 'Kiribati'),
(120, 'KW', 'Kuwait'),
(121, 'LA', 'Laos'),
(122, 'LS', 'Lesotho'),
(123, 'LV', 'Letonia'),
(124, 'LB', 'L&iacute;bano'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libia'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lituania'),
(129, 'LU', 'Luxemburgo'),
(130, 'MO', 'Macao'),
(131, 'MK', 'ARY Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MY', 'Malasia'),
(134, 'MW', 'Malawi'),
(135, 'MV', 'Maldivas'),
(136, 'ML', 'Mal&iacute;'),
(137, 'MT', 'Malta'),
(138, 'FK', 'Islas Malvinas'),
(139, 'MP', 'Islas Marianas del Norte'),
(140, 'MA', 'Marruecos'),
(141, 'MH', 'Islas Marshall'),
(142, 'MQ', 'Martinica'),
(143, 'MU', 'Mauricio'),
(144, 'MR', 'Mauritania'),
(145, 'YT', 'Mayotte'),
(146, 'MX', 'M&eacute;xico'),
(147, 'FM', 'Micronesia'),
(148, 'MD', 'Moldavia'),
(149, 'MC', 'M&oacute;naco'),
(150, 'MN', 'Mongolia'),
(151, 'MS', 'Montserrat'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NI', 'Nicaragua'),
(158, 'NE', 'N&iacute;ger'),
(159, 'NG', 'Nigeria'),
(160, 'NU', 'Niue'),
(161, 'NF', 'Isla Norfolk'),
(162, 'NO', 'Noruega'),
(163, 'NC', 'Nueva Caledonia'),
(164, 'NZ', 'Nueva Zelanda'),
(165, 'OM', 'Om&aacute;n'),
(166, 'NL', 'Pa&iacute;ses Bajos'),
(167, 'PK', 'Pakist&aacute;n'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestina'),
(170, 'PA', 'Panam&aacute;'),
(171, 'PG', 'Pap&uacute;a Nueva Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Per&uacute;'),
(174, 'PN', 'Islas Pitcairn'),
(175, 'PF', 'Polinesia Francesa'),
(176, 'PL', 'Polonia'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'GB', 'Reino Unido'),
(181, 'RE', 'Reuni&oacute;n'),
(182, 'RW', 'Ruanda'),
(183, 'RO', 'Rumania'),
(184, 'RU', 'Rusia'),
(185, 'EH', 'Sahara Occidental'),
(186, 'SB', 'Islas Salom&oacute;n'),
(187, 'WS', 'Samoa'),
(188, 'AS', 'Samoa Americana'),
(189, 'KN', 'San Crist&oacute;bal y Nevis'),
(190, 'SM', 'San Marino'),
(191, 'PM', 'San Pedro y Miquel&oacute;n'),
(192, 'VC', 'San Vicente y las Granadinas'),
(193, 'SH', 'Santa Helena'),
(194, 'LC', 'Santa Luc&iacute;a'),
(195, 'ST', 'Santo Tom&eacute; y Pr&iacute;ncipe'),
(196, 'SN', 'Senegal'),
(197, 'CS', 'Serbia y Montenegro'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leona'),
(200, 'SG', 'Singapur'),
(201, 'SY', 'Siria'),
(202, 'SO', 'Somalia'),
(203, 'LK', 'Sri Lanka'),
(204, 'SZ', 'Suazilandia'),
(205, 'ZA', 'Sud&aacute;frica'),
(206, 'SD', 'Sud&aacute;n'),
(207, 'SE', 'Suecia'),
(208, 'CH', 'Suiza'),
(209, 'SR', 'Surinam'),
(210, 'SJ', 'Svalbard y Jan Mayen'),
(211, 'TH', 'Tailandia'),
(212, 'TW', 'Taiw&aacute;n'),
(213, 'TZ', 'Tanzania'),
(214, 'TJ', 'Tayikist&aacute;n'),
(215, 'IO', 'Territorio Brit&aacute;nico del Oc&eacute;ano &iacute;ndico'),
(216, 'TF', 'Territorios Australes Franceses'),
(217, 'TL', 'Timor Oriental'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad y Tobago'),
(222, 'TN', 'T&uacute;nez'),
(223, 'TC', 'Islas Turcas y Caicos'),
(224, 'TM', 'Turkmenist&aacute;n'),
(225, 'TR', 'Turqu&iacute;a'),
(226, 'TV', 'Tuvalu'),
(227, 'UA', 'Ucrania'),
(228, 'UG', 'Uganda'),
(229, 'UY', 'Uruguay'),
(230, 'UZ', 'Uzbekist&aacute;n'),
(231, 'VU', 'Vanuatu'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Vietnam'),
(234, 'VG', 'Islas V&iacute;rgenes Brit&aacute;nicas'),
(235, 'VI', 'Islas V&iacute;rgenes de los Estados Unidos'),
(236, 'WF', 'Wallis y Futuna'),
(237, 'YE', 'Yemen'),
(238, 'DJ', 'Yibuti'),
(239, 'ZM', 'Zambia'),
(240, 'ZW', 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(30) NOT NULL,
  `lastname_user` varchar(30) NOT NULL,
  `document_user` int(11) NOT NULL,
  `email_user` varchar(40) NOT NULL,
  `phone_user` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `message_user` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `name_user`, `lastname_user`, `document_user`, `email_user`, `phone_user`, `id_country`, `message_user`) VALUES
(1, 'Carlos', 'Gonzalez', 9232357, 'carlox.go@gmail.com', 1234567890, 13, 'I made it, because I love this song and I like simlpe lyrics video like this ( black and white and no extras) . Hope you enjoy. :)!'),
(3, 'Joana', 'Herrera', 353445, 'corerm@weerer.com', 535345333, 67, 'EXPERIENCIA GENERAL: MÃNIMA DE TRES (03) AÃ‘OS EN ACTIVIDADES EN EL SECTOR PUBLICO Y/O PRIVADO. EXPERIENCIA ESPECIFICA: MÃNIMA DE UN AÃ‘O EN REVISIÃ“N Y/O IMPLEMENTACION DE PROYECTOS DE INSTALACIONES ELECTROMECÃNICAS.'),
(5, 'Maria', 'Rodriguez', 32323997, 'mrod@gjd.com', 132232334, 124, 'Audacity puede grabar audio en directo a travÃ©s de un micrÃ³fono o un mezclador, sino tambiÃ©n a digitalizar sus cassettes, discos de vinilo y minidisco. Con algunas tarjetas de sonido, sino que tambiÃ©n puede capturar streaming de audio.'),
(7, 'Camila', 'Ramirez', 23320340, 'cramirez@ttn.com', 88323992, 98, 'Jugones del mundo: Hardcore Henry es una pelÃ­cula pensada para vosotros. Esta coproducciÃ³n creada a medias entre Rusia y Estados Unidos y producida por Timur Beckmambetov es un clarÃ­simo homenaje al lenguaje de los videojuegos de tipo shooter en primera persona como Call of Duty Black Ops 3.'),
(8, 'Cristina', 'Gonzalez', 2237338, 'cristinagonzalez@gmail.com', 23432423, 16, 'Nuestros cursos de PHP junto al motor de base de datos m&aacute;s\r\npopular, MySQL, son la base del desarrollo de los contenidos.'),
(9, 'Luis', 'Pimentel', 412323213, 'lpimentel@dnmn.com', 43422323, 232, 'En su Ãºltima versiÃ³n PHP 5 incorpora ProgramaciÃ³n Orientada a Objetos, lo que le convierte en un lenguaje aÃºn mÃ¡s versÃ¡til.'),
(10, 'Juan', 'Quintero', 93373232, 'jquinterod@hotmail.com', 745454534, 13, 'Una estrella es una esfera luminosa de plasma que mantiene su forma gracias a su propia gravedad. La estrella mÃ¡s cercana a la Tierra es el Sol');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id_country`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `document_user` (`document_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
