-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Mar-2021 às 19:14
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
-- Database: `blog_school`
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

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `codigo`, `categoria`) VALUES
(1, 'teste-com-espaco', 'teste com espaÃ§o'),
(2, 'teste', 'teste'),
(3, 'nova-categoria-teste', 'Nova categoria teste');

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
(4, '76902', 'Teste slide 1', '<p>teste</p>\r\n', '04/03/2021'),
(5, '77647', 'teste slide 2', '<p>adsad as dasas f a</p>\r\n', '04/03/2021'),
(6, '62843', 'teste 3 data', '<p>adas</p>\r\n', '05/03/2021');

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
(26, '05-03-2021-13-09-13-106299343.jpeg', '76902'),
(27, '05-03-2021-13-09-14-197656884.jpeg', '76902'),
(28, '05-03-2021-13-09-16-779425895.jpeg', '76902'),
(29, '05-03-2021-13-09-18-880302255.jpeg', '76902'),
(30, '05-03-2021-13-09-19-708453410.jpeg', '76902'),
(31, '05-03-2021-13-09-21-401682530.jpeg', '76902'),
(32, '05-03-2021-13-09-56-726094884.jpeg', '77647'),
(33, '05-03-2021-13-09-57-104789813.jpeg', '77647'),
(34, '05-03-2021-13-09-59-364992971.jpeg', '77647'),
(35, '05-03-2021-13-10-01-578093008.jpeg', '77647'),
(36, '05-03-2021-13-10-02-501696122.jpeg', '77647'),
(37, '05-03-2021-13-10-04-447310885.jpeg', '77647'),
(38, '05-03-2021-13-15-48-292072240.jpeg', '62843'),
(39, '05-03-2021-13-15-50-773793039.jpeg', '62843'),
(40, '05-03-2021-13-15-52-340991543.jpeg', '62843'),
(53, '08-03-2021-11-14-01-264454094.jpeg', '29835'),
(54, '08-03-2021-11-14-06-970464604.jpeg', '29835'),
(55, '08-03-2021-11-14-11-826433110.jpeg', '29835'),
(56, '08-03-2021-11-14-22-869083267.jpeg', '29835');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`id`, `url`, `titulo`, `subtitulo`, `autor`, `image`, `conteudo`, `data`, `hora`, `categoria`) VALUES
(9, 'nova-postagem-teste', 'Nova postagem teste', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat.', 'teste1', '2aa382d492e0729424169c3b0ab90a0a.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '03/03/2021', '15:15', 'teste-com-espaco'),
(10, 'teste-2021-imagem', 'Teste 2021 imagem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat.', 'teste2', '1cfcb3bda1a386d1ea6722de02321f7a.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '03/03/2021', '15:18', 'teste'),
(11, 'verificar-postagens-teste', 'Verificar postagens teste', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat.', 'teste3', '9ab7609be7383d8d41a5bab894dd5af9.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '03/03/2021', '15:19', 'teste-com-espaco'),
(12, '2021-teste-blog', '2021 teste blog', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat.', 'teste4', '8bc55f8c0df9271314fae9dcf97441db.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '03/03/2021', '15:24', 'teste-com-espaco'),
(13, 'teste-publicacao-final', 'Teste publicaÃ§Ã£o final', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat.', 'Bruno Lopes', '609aef4dc16a15e40e0f33e967ea77dc.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\n&nbsp; &nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\n&nbsp; &nbsp; quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\n&nbsp; &nbsp; consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\n&nbsp; &nbsp; cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\n&nbsp; &nbsp; proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\n&nbsp; &nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\n&nbsp; &nbsp; quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\n&nbsp; &nbsp; consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\n&nbsp; &nbsp; cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\n&nbsp; &nbsp; proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '05/03/2021', '15:08', 'nova-categoria-teste'),
(14, 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit-sed-do-eiusmodtempor-incididunt-ut-labore-et-dolore-magna-aliqua--ut-enim-ad-minim-veniamquis-nostrud-exercitation-ullamco-laboris-nisi-ut-aliquip-ex-ea-commodoconseq', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&#13;&#10;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&#13;&#10;quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&#13;&#10;conseq', 'teste', 'Bruno Silva', '383cc742a9c57b49ccf2e0547c587010.jpg', '<p>Teste Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed orci lorem, sagittis quis tempus nec, bibendum id arcu. Quisque mollis quam vel ipsum euismod, quis egestas sem consectetur. Suspendisse potenti. Duis lacinia nulla eu lacus efficitur, ut rutrum elit congue. In convallis urna ac libero condimentum vulputate. Sed dignissim quis nisi eu ultricies. Integer sed cursus dolor, ac finibus ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>\r\n\r\n<p>Vivamus iaculis ante urna, et aliquet sem varius et. Nulla facilisi. Etiam ac diam lacinia, varius arcu elementum, accumsan est. Praesent neque enim, tristique eget scelerisque in, maximus ut erat. Phasellus egestas laoreet quam sagittis fermentum. Phasellus eu pellentesque enim. Nam accumsan tempus diam id pellentesque. Phasellus dignissim leo quis enim elementum, eget tincidunt nunc convallis. Curabitur mollis malesuada laoreet. Aliquam euismod, tortor vitae ultricies sollicitudin, ante eros commodo sapien, rhoncus dignissim ex eros vitae nibh. Quisque eu iaculis velit. Aenean laoreet turpis nibh. Aenean lacinia ipsum in magna pellentesque euismod.</p>\r\n\r\n<p>Curabitur posuere mauris pretium, pulvinar orci ut, pellentesque elit. Donec imperdiet ut nulla at mattis. Vivamus pellentesque at elit vel sodales. Sed odio tortor, iaculis a erat interdum, iaculis lobortis tellus. Ut placerat augue et orci bibendum dictum. Nullam sodales, magna quis consectetur sodales, ante ex gravida urna, ut facilisis sapien nisi eu nulla. Pellentesque quis felis eget nunc consectetur interdum id vitae nisl. Vivamus vulputate erat nec rutrum rutrum. Quisque sodales, tortor ac ultrices semper, turpis libero dapibus lacus, et varius nunc tortor vitae turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>\r\n\r\n<p>Cras varius molestie felis eget aliquam. Morbi auctor egestas velit nec volutpat. Vivamus porta mi tincidunt metus vehicula condimentum. Mauris in risus lorem. Aenean vitae odio euismod, semper justo eu, feugiat nisi. Nunc finibus lorem orci, commodo convallis dui vulputate eget. Maecenas pulvinar tempus vestibulum. Etiam ante sem, aliquet et varius sit amet, porta cursus ligula. Aenean eu libero a ex blandit facilisis. Praesent accumsan ultricies varius. Vestibulum pharetra gravida felis in posuere. Nulla facilisi. Cras ultricies elit vel odio egestas, ac varius velit finibus. Curabitur lacus augue, ullamcorper at ex commodo, porta laoreet leo. In hac habitasse platea dictumst.</p>\r\n\r\n<p>Sed odio nibh, lobortis vitae mi vel, ullamcorper vulputate urna. Proin auctor elit ipsum, vel gravida justo bibendum eu. In scelerisque eros in mauris convallis gravida. Proin ut porta enim. Mauris non malesuada arcu. Vivamus consectetur luctus tellus, id volutpat mauris viverra et. Aliquam erat volutpat. Nulla facilisi. Proin molestie dignissim ligula a tincidunt. Curabitur sagittis id tellus sit amet venenatis. Nam consequat a erat nec luctus. Etiam lobortis facilisis aliquam. Maecenas dapibus volutpat sapien. Pellentesque sollicitudin, sem nec varius faucibus, lorem neque tempor ligula, quis fringilla odio massa ac urna. Nulla euismod dapibus dolor, et laoreet nulla posuere nec. Sed ut facilisis mauris.</p>\r\n\r\n<p>Morbi at nibh eget velit pellentesque lobortis in vel justo. Sed pretium purus libero, finibus facilisis lacus porttitor a. Nunc dignissim metus ut dolor elementum, vel pellentesque odio dictum. Mauris sagittis id ligula sit amet efficitur. Donec pulvinar fermentum magna, ut lobortis augue convallis id. In pretium egestas erat vitae consequat. Pellentesque ac dignissim risus. Etiam ut convallis arcu.</p>\r\n\r\n<p>Pellentesque eu diam auctor, egestas lorem at, blandit eros. Curabitur ultricies ullamcorper nulla, vel venenatis nibh. Mauris semper erat ac nisl semper, sed interdum erat facilisis. Integer finibus urna molestie turpis placerat dictum. Duis ultrices tincidunt purus a suscipit. Suspendisse sed feugiat ex. Aenean vel neque elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris eget magna at sapien iaculis viverra. Vivamus laoreet mauris ut faucibus porttitor. Nulla mollis velit eu consequat mollis. Sed pellentesque felis ac ligula eleifend, eu suscipit risus finibus. Donec mauris arcu, pellentesque eget dui eu, consectetur elementum lacus.</p>\r\n', '06/03/2021', '15:25', 'nova-categoria-teste'),
(15, 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit--nullam-aliquet-lacus-tortor-vitae-hendrerit-ipsum-imperdiet-vel--nulla-condimentum-erat-id-purus-auctor-lacinia--', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet lacus tortor, vitae hendrerit ipsum imperdiet vel. Nulla condimentum erat id purus auctor lacinia. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet lacus tortor, vitae hendrerit ipsum imperdiet vel. Nulla condimentum erat id purus auctor lacinia. Vestibulum fermentum enim lectus, quis feugiat nisl rhoncus id. Fusce quis sapien eget sapien maximus convallis ut nec arcu. Ut imperdiet massa ut purus mollis, in venenatis leo mollis. Donec feugiat ultricies vulputate. Cras bibendum neque sed dui vulputate, nec elementum ex efficitur. Nulla facilisi. Ut in massa sed justo hendrerit faucibus nec porta mauris. Proin molestie ac nunc et venenatis.', 'Bruno Silva', 'addc5536c8889e41683703fc58d3ea41.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet lacus tortor, vitae hendrerit ipsum imperdiet vel. Nulla condimentum erat id purus auctor lacinia. Vestibulum fermentum enim lectus, quis feugiat nisl rhoncus id. Fusce quis sapien eget sapien maximus convallis ut nec arcu. Ut imperdiet massa ut purus mollis, in venenatis leo mollis. Donec feugiat ultricies vulputate. Cras bibendum neque sed dui vulputate, nec elementum ex efficitur. Nulla facilisi. Ut in massa sed justo hendrerit faucibus nec porta mauris. Proin molestie ac nunc et venenatis.</p>\r\n\r\n<p>Pellentesque condimentum egestas purus, quis venenatis ipsum dignissim ac. Curabitur sit amet quam vitae velit elementum viverra nec semper turpis. Suspendisse maximus placerat ultricies. In hac habitasse platea dictumst. Ut sagittis id ex eu mollis. Curabitur varius nibh sit amet mattis sollicitudin. Donec a congue lacus, non euismod orci. Pellentesque eget enim elementum, auctor nunc ac, pellentesque augue. Vivamus ligula nisi, aliquam id mauris eget, gravida semper ex.</p>\r\n\r\n<p>Aliquam vel auctor elit, quis pharetra lacus. Duis et mi est. Sed sit amet imperdiet libero. Donec tincidunt pulvinar lorem, eu finibus dui dignissim ac. Vestibulum vestibulum purus libero, vitae iaculis nisi interdum at. Vestibulum tempor risus ut ipsum vehicula, non ornare ante suscipit. Sed sit amet pellentesque est. Ut sem massa, aliquam sit amet tempor placerat, porttitor ut urna. Curabitur congue, felis quis bibendum sollicitudin, tortor diam tempus tellus, quis viverra enim magna non sem. Integer ac aliquet ex. Nam mattis mi at neque interdum cursus. Suspendisse dictum augue a mattis consequat. Suspendisse interdum nunc at ultricies euismod. Fusce ultricies consequat leo.</p>\r\n\r\n<p>Integer congue non est sit amet sagittis. Nunc vitae pretium erat, nec ornare ante. Phasellus cursus nunc massa, ac rutrum justo maximus nec. Donec vulputate auctor eros ornare pellentesque. Vivamus pellentesque leo quis justo scelerisque tincidunt. Maecenas elementum eros id porta euismod. Suspendisse potenti. Duis at rutrum lorem.</p>\r\n\r\n<p>Nullam sodales tempor sapien non mattis. Sed consequat porttitor augue in sodales. Curabitur eu consectetur erat. Morbi vitae purus at elit bibendum congue. Duis sit amet lectus at felis congue laoreet quis non libero. Suspendisse viverra, enim a cursus laoreet, augue eros laoreet eros, non suscipit velit ligula non metus. Maecenas volutpat arcu nisi, id molestie lectus lacinia a.</p>\r\n\r\n<p>Nullam sagittis arcu consequat tempus condimentum. Proin ullamcorper lacus eu diam tristique, a egestas diam luctus. Nulla congue metus eget vestibulum ultricies. Suspendisse ut urna mi. Proin a consequat arcu, vel dictum lectus. Ut porttitor cursus quam vel consectetur. Nam fringilla nec augue eget hendrerit. Suspendisse quis sem laoreet, auctor est sit amet, sollicitudin nisl. Maecenas hendrerit purus a pellentesque dignissim. In id lectus condimentum, mollis nisi in, consequat justo. Nunc tristique dolor purus, eget dignissim velit congue in. Aliquam ornare tortor nec commodo rhoncus. Quisque at felis maximus, lacinia arcu at, malesuada magna. Aliquam tincidunt ante eget sem cursus, auctor tempus tellus aliquet.</p>\r\n', '06/03/2021', '15:31', 'nova-categoria-teste');

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
(3, '29835', 'editado ', '<p>editado</p>\r\n', '08/03/2021');

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
(1, 'teste 2', 'teste 2', 'a6bd22046eb8a3469c73aeaf8f0dc07d.jpg'),
(3, 'new slider', 'texto', '039547710b7ca5ccd2728e83baf0e985.jpg');

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
(1, 'Seja Bem vindo Blog', 'teste subtitulo. teste 123.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `revista`
--
ALTER TABLE `revista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `textocard`
--
ALTER TABLE `textocard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
