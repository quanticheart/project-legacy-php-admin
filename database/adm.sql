-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2020 às 22:18
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `adm`
--
CREATE DATABASE IF NOT EXISTS `adm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `adm`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigo`
--

CREATE TABLE `artigo` (
  `id` bigint(20) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_corre` int(6) NOT NULL,
  `codigoanuncio` int(11) NOT NULL,
  `url` varchar(80) NOT NULL,
  `chaves` varchar(160) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `video` varchar(280) NOT NULL,
  `artigo` text NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `endnun` int(10) NOT NULL,
  `cep` int(12) NOT NULL,
  `valor` int(10) NOT NULL,
  `ndisponivel` int(4) NOT NULL,
  `regiao` varchar(50) NOT NULL,
  `img1` varchar(50) NOT NULL,
  `img2` varchar(50) NOT NULL,
  `img3` varchar(50) NOT NULL,
  `img4` varchar(50) NOT NULL,
  `img5` varchar(50) NOT NULL,
  `img6` varchar(50) NOT NULL,
  `financia` varchar(1) NOT NULL,
  `ativo` varchar(1) NOT NULL,
  `destaque` varchar(1) NOT NULL,
  `destaqueluxo` varchar(1) NOT NULL,
  `data` varchar(10) NOT NULL,
  `hora` varchar(15) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `artigo`
--

INSERT INTO `artigo` (`id`, `id_usuario`, `id_cat`, `id_corre`, `codigoanuncio`, `url`, `chaves`, `titulo`, `descricao`, `video`, `artigo`, `endereco`, `endnun`, `cep`, `valor`, `ndisponivel`, `regiao`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `financia`, `ativo`, `destaque`, `destaqueluxo`, `data`, `hora`, `ip`) VALUES
(5380146743, 303779, 16, 915122, 9928312, 'sadasd', 'sadasd', 'sadasd', '&lt;p&gt;Digite a descri&amp;ccedil;&amp;atilde;o doadasdasd artigo aqui, com no maximo 255 caracteres&lt;/p&gt;', 'asdasd', '&lt;p&gt;Digite aqui o artigo a ser publicado, caso asdasdprecise, edite o texto usando o editor de texto ou usando codigo html&lt;/p&gt;', 'adasda', 222, 2222, 222, 222, '222', '9928312-img1-72d83c2da0660ff311634a4f2813f2fc.jpg', 'n', 'n', 'n', 'n', 'n', 'n', 's', 's', 's', '09/10/2016', '11:26:31', '177.125.24.217'),
(9858721786, 303779, 17, 915122, 9928312, 'sadasd', 'sadasd', 'sadasd', '&lt;p&gt;Digite a descri&amp;ccedil;&amp;atilde;o doadasdasd artigo aqui, com no maximo 255 caracteres&lt;/p&gt;', 'asdasd', '&lt;p&gt;Digite aqui o artigo a ser publicado, caso asdasdprecise, edite o texto usando o editor de texto ou usando codigo html&lt;/p&gt;', 'adasda', 222, 2222, 222, 222, '222', '9928312-img1-72d83c2da0660ff311634a4f2813f2fc.jpg', 'n', 'n', 'n', 'n', 'n', 'n', 's', 'n', 's', '09/10/2016', '11:26:31', '177.125.24.217'),
(9858721787, 999999, 16, 797723, 9928312, 'sadasd', 'sadasd', 'sadasd', '&lt;p&gt;Digite a descri&amp;ccedil;&amp;atilde;o doadasdasd artigo aqui, com no maximo 255 caracteres&lt;/p&gt;', 'asdasd', '&lt;p&gt;Digite aqui o artigo a ser publicado, caso asdasdprecise, edite o texto usando o editor de texto ou usando codigo html&lt;/p&gt;', 'adasda', 222, 2222, 222, 222, '222', '9928312-img1-72d83c2da0660ff311634a4f2813f2fc.jpg', 'n', 'n', 'n', 'n', 'n', 'n', 's', 's', 's', '09/10/2016', '11:26:31', '177.125.24.217'),
(9858721788, 999999, 18, 797723, 9928312, 'sadasd', 'sadasd', 'sadasd', '&lt;p&gt;Digite a descri&amp;ccedil;&amp;atilde;o doadasdasd artigo aqui, com no maximo 255 caracteres&lt;/p&gt;', 'asdasd', '&lt;p&gt;Digite aqui o artigo a ser publicado, caso asdasdprecise, edite o texto usando o editor de texto ou usando codigo html&lt;/p&gt;', 'adasda', 222, 2222, 222, 222, '222', '9928312-img1-72d83c2da0660ff311634a4f2813f2fc.jpg', 'n', 'n', 'n', 'n', 'n', 'n', 's', 'n', 's', '09/10/2016', '11:26:31', '177.125.24.217'),
(9858721789, 999999, 17, 797723, 9928312, 'sadasd', 'sadasd', 'sadasd', '&lt;p&gt;Digite a descri&amp;ccedil;&amp;atilde;o doadasdasd artigo aqui, com no maximo 255 caracteres&lt;/p&gt;', 'asdasd', '&lt;p&gt;Digite aqui o artigo a ser publicado, caso asdasdprecise, edite o texto usando o editor de texto ou usando codigo html&lt;/p&gt;', 'adasda', 222, 2222, 222, 222, '222', '9928312-img1-72d83c2da0660ff311634a4f2813f2fc.jpg', 'n', 'n', 'n', 'n', 'n', 'n', 's', 's', 's', '09/10/2016', '11:26:31', '177.125.24.217'),
(9858721790, 999999, 17, 797723, 9928312, 'sadasd', 'sadasd', 'sadasd', '&lt;p&gt;Digite a descri&amp;ccedil;&amp;atilde;o doadasdasd artigo aqui, com no maximo 255 caracteres&lt;/p&gt;', 'asdasd', '&lt;p&gt;Digite aqui o artigo a ser publicado, caso asdasdprecise, edite o texto usando o editor de texto ou usando codigo html&lt;/p&gt;', 'adasda', 222, 2222, 222, 222, '222', '9928312-img1-72d83c2da0660ff311634a4f2813f2fc.jpg', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', '09/10/2016', '11:26:31', '177.125.24.217');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ativo` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `ativo`) VALUES
(18, 'Nintendo', 's'),
(17, 'categ 2', 'n'),
(16, 'categ', 's'),
(19, 'kkk', 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `codigo_email`
--

CREATE TABLE `codigo_email` (
  `id` int(11) NOT NULL,
  `codigo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL,
  `tipo` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `codigo_email`
--

INSERT INTO `codigo_email` (`id`, `codigo`, `data`, `tipo`) VALUES
(34, 'am9ubnkyNTVkQGFhYS5jb20=', '2016-08-02 13:33:39', 'ativa'),
(32, 'am9ubnkyNTVkQGdtYWlsLmNvbTM=', '2016-07-29 19:59:30', 'ativa'),
(31, 'am9ubnkyNTVkQGdtYWlsLmNvbTI=', '2016-07-30 00:42:07', 'ativa'),
(35, 'am9ubnkyNTVmQGhvdG1pbC5jb20=', '2016-08-05 10:12:33', 'ativa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `snome` varchar(140) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `email` varchar(140) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `data` varchar(40) NOT NULL,
  `hora` varchar(40) NOT NULL,
  `msg` text NOT NULL,
  `ativo` varchar(1) NOT NULL,
  `cod` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

CREATE TABLE `cor` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cor1` varchar(7) NOT NULL,
  `cor2` varchar(7) NOT NULL,
  `ativo` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`id`, `nome`, `cor1`, `cor2`, `ativo`) VALUES
(1, 'BLUE JEANS', '#5D9CEC', '#4A89DC', 's'),
(2, 'AQUA', '#4FC1E9', '#3BAFDA', 's'),
(3, 'MINT', '#48CFAD', '#37BC9B', 's'),
(4, 'GRASS', '#A0D468', '#8CC152', 's'),
(5, 'SUNFLOWER', '#FFCE54', '#F6BB42', 's'),
(6, 'BITTERSWEET', '#FC6E51', '#E9573F', 's'),
(7, 'GRAPEFRUIT', '#ED5565', '#DA4453', 's'),
(8, 'LAVENDER', '#AC92EC', '#967ADC', 's'),
(9, 'PINK ROSE', '#EC87C0', '#D770AD', 's'),
(10, 'LIGHT GRAY', '#F5F7FA', '#E6E9ED', 's'),
(11, 'MEDIUM GRAY', '#CCD1D9', '#AAB2BD', 'n'),
(12, 'DARK GRAY 2', '#656D78', '#434A54', 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `corretor`
--

CREATE TABLE `corretor` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ativo` varchar(1) NOT NULL,
  `mestre` varchar(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cel1` varchar(20) NOT NULL,
  `cel2` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `corretor`
--

INSERT INTO `corretor` (`id`, `nome`, `ativo`, `mestre`, `email`, `cel1`, `cel2`) VALUES
(915122, 'Castiel', 's', 'n', 'jonny@hotmail.com', '255252852552', '25252525255');

-- --------------------------------------------------------

--
-- Estrutura da tabela `msg`
--

CREATE TABLE `msg` (
  `id_msg` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `snome` varchar(140) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `email` varchar(140) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `data` varchar(40) NOT NULL,
  `hora` varchar(40) NOT NULL,
  `msg` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `site`
--

CREATE TABLE `site` (
  `id` int(6) NOT NULL,
  `site` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `cel1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cel2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `mlogo` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `flogo` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `face` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `google` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emaildesc` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `site`
--

INSERT INTO `site` (`id`, `site`, `title`, `description`, `keywords`, `cel1`, `cel2`, `logo`, `mlogo`, `flogo`, `face`, `google`, `youtube`, `email1`, `email2`, `emaildesc`) VALUES
(1, 'http://casacerta.me/ ', '  CasaCerta', '  descrição ', 'descrição ', '3    ', '3    ', 'logoc7cf8ba0c7986ea2a99b2d58d9cec2cc.png', 'mlogo6265cd4407c3387fb6eef05e13e0baeb.png', 'flogo2a0e133cf0ded4c349321c6bf42ad838.png', '  3', '  3', '3    ', 'jj@hh333333 ', 'jjj@gg333 ', '  333 ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(5) NOT NULL,
  `nome` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `sobrenome` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `fotouser` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `userlogin` varchar(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `passlogin` varchar(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ativo` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `cor1` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `cor2` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data_ultimo` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nivel_usuario` enum('0','1','2','3') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `sobrenome`, `email`, `fotouser`, `userlogin`, `passlogin`, `ativo`, `cor1`, `cor2`, `data_cadastro`, `data_ultimo`, `nivel_usuario`) VALUES
(667156, 'ksadjasjdkl', 'sem ativar', 'jonny255f@hotmil.com', 'semfoto', 'semativamento', '21232f297a57a5a743894a0e4a801fc3', 's', '#4FC1E9', '#3BAFDA', '2016-08-04 13:13:11', '0000-00-00 00:00:00', '1'),
(999999, 'Admin', 'mestre', 'admin@admin.com', 'userf78940e9ff970a7c454a0a80672d4df6.jpg', 'admin', '21232f297a57a5a743894a0e4a801fc3', 's', '#656D78', '#434A54', '2016-07-26 15:13:53', '2020-10-25 17:32:25', '3'),
(303779, 'Jonatas ', 'Alves santos', 'jonny255d@gmail.com', 'usercdc9f2b31346e520d14650a4422f9a22.png', 'Jonny255d', '21232f297a57a5a743894a0e4a801fc3', 's', '#4FC1E9', '#3BAFDA', '2016-08-01 17:36:27', '2016-08-02 16:10:50', '0'),
(1000017, 'jonny255d', 'sem ativar', 'jonny255d@gmail2.com', 'semfoto', 'jonny', '21232f297a57a5a743894a0e4a801fc3', 's', '#4FC1E9', '#3BAFDA', '2016-08-01 17:36:27', '2020-10-25 17:36:44', '2');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `codigo_email`
--
ALTER TABLE `codigo_email`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cor`
--
ALTER TABLE `cor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `corretor`
--
ALTER TABLE `corretor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id_msg`);

--
-- Índices para tabela `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigo`
--
ALTER TABLE `artigo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9858721791;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `codigo_email`
--
ALTER TABLE `codigo_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1135466249;

--
-- AUTO_INCREMENT de tabela `cor`
--
ALTER TABLE `cor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `corretor`
--
ALTER TABLE `corretor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=915123;

--
-- AUTO_INCREMENT de tabela `msg`
--
ALTER TABLE `msg`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1135466249;

--
-- AUTO_INCREMENT de tabela `site`
--
ALTER TABLE `site`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000018;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
