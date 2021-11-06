-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Nov-2021 às 20:17
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `senha`) VALUES
(1, 'teste', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`id`, `codigo`, `titulo`, `descricao`, `data`) VALUES
(1, '67545', '&#34;Raimundo SÃ£o Nonatos&#34;', '<p>&Aacute;lbum de fotografias de&nbsp;<em>S&atilde;o raimundo Nonato.</em>&nbsp;Fotografias feitas por&nbsp;<strong>Jos&eacute; ces&aacute;rio Neto</strong>.</p>\r\n', '10/03/2021');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `nome`, `codigo`) VALUES
(1, '10-03-2021-17-39-17-926650213.jpeg', '67545'),
(2, '10-03-2021-17-39-19-529847723.jpeg', '67545'),
(3, '10-03-2021-17-39-22-724809549.jpeg', '67545'),
(4, '10-03-2021-17-39-24-454158247.jpeg', '67545'),
(5, '10-03-2021-17-39-27-398283767.jpeg', '67545'),
(6, '10-03-2021-17-39-29-154156803.jpeg', '67545'),
(7, '10-03-2021-17-39-32-376826440.jpeg', '67545'),
(8, '10-03-2021-17-39-36-809988697.jpeg', '67545'),
(9, '10-03-2021-17-39-39-271916478.jpeg', '67545'),
(10, '10-03-2021-17-39-42-281593001.jpeg', '67545'),
(11, '10-03-2021-17-39-45-296626754.jpeg', '67545'),
(12, '10-03-2021-17-39-48-150381156.jpeg', '67545'),
(13, '10-03-2021-17-39-50-362615101.jpeg', '67545'),
(14, '10-03-2021-17-39-52-205435477.jpeg', '67545'),
(15, '10-03-2021-17-39-55-719241065.jpeg', '67545'),
(16, '10-03-2021-17-39-58-529929062.jpeg', '67545'),
(17, '10-03-2021-17-40-01-489582087.jpeg', '67545'),
(18, '10-03-2021-17-40-04-939616990.jpeg', '67545'),
(19, '10-03-2021-17-40-06-880335190.jpeg', '67545'),
(20, '10-03-2021-17-40-08-180553685.jpeg', '67545'),
(21, '10-03-2021-17-40-11-514143181.jpeg', '67545'),
(22, '10-03-2021-17-40-13-890328222.jpeg', '67545'),
(23, '10-03-2021-17-40-16-270067920.jpeg', '67545'),
(24, '10-03-2021-17-40-18-212351515.jpeg', '67545'),
(25, '10-03-2021-17-40-21-252048810.jpeg', '67545'),
(26, '10-03-2021-17-40-23-250218603.jpeg', '67545'),
(27, '10-03-2021-17-40-25-255211703.jpeg', '67545'),
(28, '10-03-2021-17-40-27-603368553.jpeg', '67545'),
(29, '10-03-2021-17-40-29-364704188.jpeg', '67545'),
(30, '10-03-2021-17-40-32-235137765.jpeg', '67545'),
(31, '10-03-2021-17-40-34-894161817.jpeg', '67545'),
(32, '10-03-2021-17-40-36-168317370.jpeg', '67545'),
(33, '10-03-2021-17-40-39-891784502.jpeg', '67545'),
(34, '10-03-2021-17-40-42-753900781.jpeg', '67545'),
(35, '10-03-2021-17-40-46-327942493.jpeg', '67545'),
(36, '10-03-2021-17-40-49-938335433.jpeg', '67545'),
(37, '10-03-2021-17-40-53-927850036.jpeg', '67545'),
(38, '10-03-2021-17-40-57-864102172.jpeg', '67545'),
(39, '10-03-2021-17-41-00-301548822.jpeg', '67545'),
(40, '10-03-2021-17-41-03-161659241.jpeg', '67545'),
(41, '10-03-2021-17-41-06-144921318.jpeg', '67545'),
(42, '10-03-2021-17-41-08-643794797.jpeg', '67545'),
(43, '10-03-2021-17-41-10-999653135.jpeg', '67545'),
(44, '10-03-2021-17-41-13-963699885.jpeg', '67545'),
(45, '10-03-2021-17-41-15-968131670.jpeg', '67545'),
(46, '10-03-2021-17-41-17-132658955.jpeg', '67545'),
(47, '10-03-2021-17-41-19-485961291.jpeg', '67545'),
(48, '10-03-2021-17-41-22-449003186.jpeg', '67545'),
(49, '10-03-2021-17-41-24-980071734.jpeg', '67545'),
(50, '10-03-2021-17-41-27-890310571.jpeg', '67545'),
(51, '10-03-2021-17-41-31-942346298.jpeg', '67545'),
(52, '10-03-2021-18-04-07-894968629.jpeg', '69555'),
(53, '10-03-2021-18-04-10-714287919.jpeg', '69555'),
(54, '10-03-2021-18-04-14-505743225.jpeg', '69555'),
(55, '10-03-2021-18-04-16-711181147.jpeg', '69555'),
(56, '10-03-2021-18-04-18-919738515.jpeg', '69555'),
(57, '10-03-2021-18-04-20-122855319.jpeg', '69555'),
(58, '10-03-2021-18-04-23-468764200.jpeg', '69555'),
(59, '10-03-2021-18-04-25-119118876.jpeg', '69555'),
(60, '10-03-2021-18-04-27-865391867.jpeg', '69555'),
(61, '10-03-2021-18-04-29-300183941.jpeg', '69555'),
(62, '10-03-2021-18-04-32-544857466.jpeg', '69555'),
(63, '10-03-2021-18-04-35-926173081.jpeg', '69555'),
(64, '10-03-2021-18-04-38-734783502.jpeg', '69555'),
(65, '10-03-2021-18-04-40-152245843.jpeg', '69555'),
(66, '10-03-2021-18-04-42-718213235.jpeg', '69555'),
(67, '10-03-2021-18-04-44-236538342.jpeg', '69555'),
(165, '2d7017871625ba8663c2d2b5bb7cfbe5.jpg', ''),
(166, '88b6cefbdde3ee5e6db06996f16d3681.jpg', ''),
(167, 'cf3276ef4b36bdf3659c70c68639a081.jpg', ''),
(168, 'b91e5d8c3643d06647ecdb69644067cb.jpg', ''),
(169, '3ac065582e5ac5883beb43f9897406f7.jpg', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

CREATE TABLE `postagens` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitulo` text COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conteudo` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hora` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`id`, `url`, `titulo`, `subtitulo`, `autor`, `image`, `conteudo`, `data`, `hora`, `categoria`) VALUES
(1, 'quisque-sit-amet-erat-tristique-condimentum-massa-eu-rutrum-sapien-curabitur-ac-orci-odio', 'Quisque sit amet erat tristique, condimentum massa eu, rutrum sapien. Curabitur ac orci odio.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.', 'Lorem Ipsum', 'cf3276ef4b36bdf3659c70c68639a081.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum odio mi, id vestibulum urna placerat vel. Morbi egestas vestibulum purus, vel blandit nibh vulputate ac. Nullam bibendum urna pellentesque erat dapibus tristique. Praesent ultricies pharetra ex, vel blandit mi imperdiet porta. Nulla ut molestie dolor. Sed sagittis consectetur posuere. Nullam dictum lacus quam, non gravida arcu sollicitudin tincidunt. Nullam tincidunt turpis sit amet finibus lacinia. Ut ornare ex sed sapien viverra, et auctor augue tempus. Sed sed luctus diam. Cras dictum mauris non orci blandit, ut molestie nisl euismod. Curabitur a ex quam. Nam vitae dictum eros. Cras pretium at quam ac tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed euismod interdum massa sit amet dapibus.</p>\r\n\r\n<p>Quisque sit amet erat tristique, condimentum massa eu, rutrum sapien. Curabitur ac orci odio. Nunc urna mi, molestie ut tempor sit amet, aliquet sit amet purus. Quisque maximus egestas finibus. Vestibulum leo justo, tempor malesuada convallis nec, laoreet ac nunc. In gravida, ex id feugiat porta, urna turpis vestibulum arcu, ut facilisis lorem risus vitae nulla. Quisque a ipsum vel nulla ultricies mattis vel aliquam sem.</p>\r\n\r\n<p>Sed quis orci quis turpis posuere vehicula. Suspendisse ac erat in ante pretium tristique. Sed ac risus ut neque ultrices dictum. Suspendisse nec mattis urna. Aliquam ac nisl arcu. Donec dictum magna purus. In scelerisque diam a ipsum sollicitudin sagittis.</p>\r\n\r\n<p>Aliquam eu varius diam. Proin lobortis a est a porta. In tristique commodo risus id euismod. Praesent tincidunt sem non sollicitudin tristique. Suspendisse gravida risus ac dapibus rutrum. Sed nec sagittis ante. Integer lacus est, aliquet ultricies tellus id, ultricies porta felis. Praesent hendrerit elementum ante, in consectetur ante semper nec. In non tincidunt lacus. Maecenas tristique mauris ac auctor accumsan. Cras eu euismod orci. Praesent mattis vulputate ipsum non semper. Suspendisse malesuada, tortor a dictum dictum, nulla elit rhoncus augue, in commodo ante ligula id dolor. Sed et varius purus. Maecenas risus ligula, gravida vitae odio at, vestibulum porttitor libero.</p>\r\n\r\n<p>Quisque rhoncus odio nec placerat sagittis. Nullam quis nisl bibendum augue tempus vulputate non non massa. Aliquam sed massa mi. Ut convallis dolor vitae quam dignissim, nec egestas diam posuere. Etiam varius massa ut nunc porttitor ultricies. In mattis blandit venenatis. Praesent in ligula orci. Suspendisse id sapien in nunc luctus cursus quis quis tellus. In fermentum vestibulum sapien, at venenatis dui auctor vehicula.</p>\r\n\r\n<p>Sed ac erat a orci aliquam interdum ut et arcu. Sed et pharetra lacus. In faucibus aliquam tellus, et rutrum lectus vehicula a. Etiam consectetur fermentum nisi, ac finibus neque elementum nec. Mauris vestibulum, nulla tempus rutrum sagittis, leo libero ornare nunc, blandit tempus erat ligula eu dui. Maecenas turpis odio, malesuada ac porttitor sit amet, porta nec justo. Mauris nisl justo, scelerisque eu enim nec, tincidunt euismod augue. Nulla commodo dapibus lacus, ultricies condimentum lectus tempor non. Cras quis fermentum mi.</p>\r\n', '10/03/2021', '18:19', 'todas'),
(2, 'quisque-sit-amet-erat-tristique-condimentum-massa-eu-rutrum-sapien-curabitur-ac-orci-odio', 'Quisque sit amet erat tristique, condimentum massa eu, rutrum sapien. Curabitur ac orci odio.', 'Quisque sit amet erat tristique, condimentum massa eu, rutrum sapien. Curabitur ac orci odio. Nunc urna mi, molestie ut tempor sit amet, aliquet sit amet purus. Quisque maximus egestas finibus. Vestibulum leo justo, tempor malesuada convallis nec, laoreet ac nunc. In gravida, ex id feugiat porta, urna turpis vestibulum arcu, ut facilisis lorem risus vitae nulla. Quisque a ipsum vel nulla ultricies mattis vel aliquam sem.', 'Lorem Ipsum', '88b6cefbdde3ee5e6db06996f16d3681.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum odio mi, id vestibulum urna placerat vel. Morbi egestas vestibulum purus, vel blandit nibh vulputate ac. Nullam bibendum urna pellentesque erat dapibus tristique. Praesent ultricies pharetra ex, vel blandit mi imperdiet porta. Nulla ut molestie dolor. Sed sagittis consectetur posuere. Nullam dictum lacus quam, non gravida arcu sollicitudin tincidunt. Nullam tincidunt turpis sit amet finibus lacinia. Ut ornare ex sed sapien viverra, et auctor augue tempus. Sed sed luctus diam. Cras dictum mauris non orci blandit, ut molestie nisl euismod. Curabitur a ex quam. Nam vitae dictum eros. Cras pretium at quam ac tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed euismod interdum massa sit amet dapibus.</p>\r\n\r\n<p>Quisque sit amet erat tristique, condimentum massa eu, rutrum sapien. Curabitur ac orci odio. Nunc urna mi, molestie ut tempor sit amet, aliquet sit amet purus. Quisque maximus egestas finibus. Vestibulum leo justo, tempor malesuada convallis nec, laoreet ac nunc. In gravida, ex id feugiat porta, urna turpis vestibulum arcu, ut facilisis lorem risus vitae nulla. Quisque a ipsum vel nulla ultricies mattis vel aliquam sem.</p>\r\n\r\n<p>Sed quis orci quis turpis posuere vehicula. Suspendisse ac erat in ante pretium tristique. Sed ac risus ut neque ultrices dictum. Suspendisse nec mattis urna. Aliquam ac nisl arcu. Donec dictum magna purus. In scelerisque diam a ipsum sollicitudin sagittis.</p>\r\n\r\n<p>Aliquam eu varius diam. Proin lobortis a est a porta. In tristique commodo risus id euismod. Praesent tincidunt sem non sollicitudin tristique. Suspendisse gravida risus ac dapibus rutrum. Sed nec sagittis ante. Integer lacus est, aliquet ultricies tellus id, ultricies porta felis. Praesent hendrerit elementum ante, in consectetur ante semper nec. In non tincidunt lacus. Maecenas tristique mauris ac auctor accumsan. Cras eu euismod orci. Praesent mattis vulputate ipsum non semper. Suspendisse malesuada, tortor a dictum dictum, nulla elit rhoncus augue, in commodo ante ligula id dolor. Sed et varius purus. Maecenas risus ligula, gravida vitae odio at, vestibulum porttitor libero.</p>\r\n\r\n<p>Quisque rhoncus odio nec placerat sagittis. Nullam quis nisl bibendum augue tempus vulputate non non massa. Aliquam sed massa mi. Ut convallis dolor vitae quam dignissim, nec egestas diam posuere. Etiam varius massa ut nunc porttitor ultricies. In mattis blandit venenatis. Praesent in ligula orci. Suspendisse id sapien in nunc luctus cursus quis quis tellus. In fermentum vestibulum sapien, at venenatis dui auctor vehicula.</p>\r\n\r\n<p>Sed ac erat a orci aliquam interdum ut et arcu. Sed et pharetra lacus. In faucibus aliquam tellus, et rutrum lectus vehicula a. Etiam consectetur fermentum nisi, ac finibus neque elementum nec. Mauris vestibulum, nulla tempus rutrum sagittis, leo libero ornare nunc, blandit tempus erat ligula eu dui. Maecenas turpis odio, malesuada ac porttitor sit amet, porta nec justo. Mauris nisl justo, scelerisque eu enim nec, tincidunt euismod augue. Nulla commodo dapibus lacus, ultricies condimentum lectus tempor non. Cras quis fermentum mi.</p>\r\n', '10/03/2021', '18:18', 'todas'),
(3, 'quisque-sit-amet-erat-tristique-condimentum-massa-eu-rutrum-sapien-curabitur-ac-orci-odio', 'Quisque sit amet erat tristique, condimentum massa eu, rutrum sapien. Curabitur ac orci odio.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.', 'Lorem Ipsum', '2d7017871625ba8663c2d2b5bb7cfbe5.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum odio mi, id vestibulum urna placerat vel. Morbi egestas vestibulum purus, vel blandit nibh vulputate ac. Nullam bibendum urna pellentesque erat dapibus tristique. Praesent ultricies pharetra ex, vel blandit mi imperdiet porta. Nulla ut molestie dolor. Sed sagittis consectetur posuere. Nullam dictum lacus quam, non gravida arcu sollicitudin tincidunt. Nullam tincidunt turpis sit amet finibus lacinia. Ut ornare ex sed sapien viverra, et auctor augue tempus. Sed sed luctus diam. Cras dictum mauris non orci blandit, ut molestie nisl euismod. Curabitur a ex quam. Nam vitae dictum eros. Cras pretium at quam ac tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed euismod interdum massa sit amet dapibus.</p>\r\n\r\n<p>Quisque sit amet erat tristique, condimentum massa eu, rutrum sapien. Curabitur ac orci odio. Nunc urna mi, molestie ut tempor sit amet, aliquet sit amet purus. Quisque maximus egestas finibus. Vestibulum leo justo, tempor malesuada convallis nec, laoreet ac nunc. In gravida, ex id feugiat porta, urna turpis vestibulum arcu, ut facilisis lorem risus vitae nulla. Quisque a ipsum vel nulla ultricies mattis vel aliquam sem.</p>\r\n\r\n<p>Sed quis orci quis turpis posuere vehicula. Suspendisse ac erat in ante pretium tristique. Sed ac risus ut neque ultrices dictum. Suspendisse nec mattis urna. Aliquam ac nisl arcu. Donec dictum magna purus. In scelerisque diam a ipsum sollicitudin sagittis.</p>\r\n\r\n<p>Aliquam eu varius diam. Proin lobortis a est a porta. In tristique commodo risus id euismod. Praesent tincidunt sem non sollicitudin tristique. Suspendisse gravida risus ac dapibus rutrum. Sed nec sagittis ante. Integer lacus est, aliquet ultricies tellus id, ultricies porta felis. Praesent hendrerit elementum ante, in consectetur ante semper nec. In non tincidunt lacus. Maecenas tristique mauris ac auctor accumsan. Cras eu euismod orci. Praesent mattis vulputate ipsum non semper. Suspendisse malesuada, tortor a dictum dictum, nulla elit rhoncus augue, in commodo ante ligula id dolor. Sed et varius purus. Maecenas risus ligula, gravida vitae odio at, vestibulum porttitor libero.</p>\r\n\r\n<p>Quisque rhoncus odio nec placerat sagittis. Nullam quis nisl bibendum augue tempus vulputate non non massa. Aliquam sed massa mi. Ut convallis dolor vitae quam dignissim, nec egestas diam posuere. Etiam varius massa ut nunc porttitor ultricies. In mattis blandit venenatis. Praesent in ligula orci. Suspendisse id sapien in nunc luctus cursus quis quis tellus. In fermentum vestibulum sapien, at venenatis dui auctor vehicula.</p>\r\n\r\n<p>Sed ac erat a orci aliquam interdum ut et arcu. Sed et pharetra lacus. In faucibus aliquam tellus, et rutrum lectus vehicula a. Etiam consectetur fermentum nisi, ac finibus neque elementum nec. Mauris vestibulum, nulla tempus rutrum sagittis, leo libero ornare nunc, blandit tempus erat ligula eu dui. Maecenas turpis odio, malesuada ac porttitor sit amet, porta nec justo. Mauris nisl justo, scelerisque eu enim nec, tincidunt euismod augue. Nulla commodo dapibus lacus, ultricies condimentum lectus tempor non. Cras quis fermentum mi.</p>\r\n', '10/03/2021', '18:18', 'todas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `revista`
--

CREATE TABLE `revista` (
  `id` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `revista`
--

INSERT INTO `revista` (`id`, `codigo`, `titulo`, `descricao`, `data`) VALUES
(1, '69555', 'Revista Ceti+3', '<p>Revista comemorativa aos 10 anos da escola&nbsp;<strong>Ceti Moderna</strong>.</p>\r\n', '10/03/2021');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `slider`
--

INSERT INTO `slider` (`id`, `titulo`, `texto`, `image`) VALUES
(1, 'Blog Ceti moderna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum odio mi, id vestibulum urna', 'b91e5d8c3643d06647ecdb69644067cb.jpg'),
(2, 'Slider Blog ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum odio mi, id vestibulum urna', '3ac065582e5ac5883beb43f9897406f7.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `textocard`
--

CREATE TABLE `textocard` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `textocard`
--

INSERT INTO `textocard` (`id`, `titulo`, `subtitulo`, `texto`) VALUES
(1, 'Blog Ceti Moderna', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revista`
--
ALTER TABLE `revista`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textocard`
--
ALTER TABLE `textocard`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `revista`
--
ALTER TABLE `revista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `textocard`
--
ALTER TABLE `textocard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
