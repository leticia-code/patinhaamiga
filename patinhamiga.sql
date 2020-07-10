-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 10-Jul-2020 às 00:24
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patinhamiga`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `email` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Leticia Cardoso', 'patinha@amiga.com.br', '$2y$10$Rn42hKdoMhP0C.tZymz7RuD3sk6n1kqvn81Kkqn2IfgMkYLNscfAG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_adocoes`
--

DROP TABLE IF EXISTS `tbl_adocoes`;
CREATE TABLE IF NOT EXISTS `tbl_adocoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ong` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `nome_pet` varchar(220) NOT NULL,
  `cliente_nome` varchar(220) NOT NULL,
  `cliente_email` varchar(220) NOT NULL,
  `cliente_telefone` varchar(220) NOT NULL,
  `cliente_mensagem` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_adocoes`
--

INSERT INTO `tbl_adocoes` (`id`, `id_ong`, `id_pet`, `nome_pet`, `cliente_nome`, `cliente_email`, `cliente_telefone`, `cliente_mensagem`, `created`) VALUES
(24, 4, 38, 'PaÃ§oca', 'LetÃ­cia ', 'leticiacardoso31@hotmail.com', '(19) 93845-2176', 'Desejo adotar o paÃ§oca, tenho boas condiÃ§Ãµes de manter o animal e jÃ¡ adotei outro gato.', '2020-07-09 13:15:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_doacoes`
--

DROP TABLE IF EXISTS `tbl_doacoes`;
CREATE TABLE IF NOT EXISTS `tbl_doacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ong` int(11) NOT NULL,
  `doa_alimento` varchar(30) NOT NULL,
  `doa_medicamento` varchar(30) NOT NULL,
  `doa_higiene` varchar(30) NOT NULL,
  `doa_nome` varchar(120) NOT NULL,
  `doa_email` varchar(120) NOT NULL,
  `doa_telefone` varchar(120) NOT NULL,
  `doa_mensagem` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_index`
--

DROP TABLE IF EXISTS `tbl_index`;
CREATE TABLE IF NOT EXISTS `tbl_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_principal` varchar(220) NOT NULL,
  `titulo_missao` varchar(220) NOT NULL,
  `missao` text NOT NULL,
  `video_sec` varchar(220) NOT NULL,
  `sobre_esquerdo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_index`
--

INSERT INTO `tbl_index` (`id`, `video_principal`, `titulo_missao`, `missao`, `video_sec`, `sobre_esquerdo`) VALUES
(1, 'https://www.youtube.com/embed/QiCpsIS90F0', 'O seu novo amiguinho de 4 patas estÃ¡ aqui!', '<p>NÃ³s da patinha amiga temos a importante missÃ£o de juntamente com as ONG\'s, conseguirmos uma melhor condiÃ§Ã£o de vida e tudo o que um animalzinho carente necessita, atravÃ©s de adoÃ§Ãµes e doaÃ§Ãµes, feitas de uma maneira rÃ¡pida, simples, segura e moderna por um meio digital.</p>                    ', 'https://www.youtube.com/embed/EMy3J0z2fuQ', '<p>Por meio deste projeto, buscamos alcanÃ§ar as pessoas que possam colaborar com a retirada de animais do estado de vulnerabilidade nas ruas, tendo tambÃ©m a oportunidade de ajudar as ONG\'s responsÃ¡veis pelos devidos cuidados. Para que se recuperem e possam voltar a ter uma vida normal encontrando alguÃ©m disposto a enche-los com todo o amor e carinho que merecem. AtravÃ©s de nossa plataforma as pessoas poderÃ£o doar os animais que infelizmente nÃ£o possuem condiÃ§Ãµes de cuidar ou mesmo que fora encontrado em situaÃ§Ã£o de rua, adotar e doar monetariamente em instituiÃ§Ãµes que se cadastrarem previamente em nosso sistema, depois de passarem por uma rigorosa anÃ¡lise, a fim de analisar realmente se essa instituiÃ§Ã£o irÃ¡ fazer o que hÃ¡ de melhor<br>para os animais.</p>                    ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_news`
--

DROP TABLE IF EXISTS `tbl_news`;
CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_email` varchar(120) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `news_email`, `created`) VALUES
(2, 'teste2@dois.omc.br', '2020-07-04 19:34:07'),
(3, 'tres@tres', '2020-07-04 19:34:50'),
(4, '1212@2121', '2020-07-04 19:35:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_ongs`
--

DROP TABLE IF EXISTS `tbl_ongs`;
CREATE TABLE IF NOT EXISTS `tbl_ongs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text,
  `cnpj` varchar(30) NOT NULL,
  `nome_fantasia` varchar(120) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(220) NOT NULL,
  `endereco` varchar(220) DEFAULT NULL,
  `numero` varchar(30) DEFAULT NULL,
  `complemento` varchar(220) DEFAULT NULL,
  `estado` varchar(220) DEFAULT NULL,
  `cidade` varchar(220) DEFAULT NULL,
  `cep` varchar(220) DEFAULT NULL,
  `alimentacao` varchar(220) DEFAULT NULL,
  `medicacao` varchar(220) DEFAULT NULL,
  `higiene` varchar(220) DEFAULT NULL,
  `razao_social` varchar(220) DEFAULT NULL,
  `banco` varchar(220) DEFAULT NULL,
  `agencia` varchar(220) DEFAULT NULL,
  `conta` varchar(220) DEFAULT NULL,
  `imagem` varchar(220) DEFAULT NULL,
  `instagram` varchar(220) DEFAULT NULL,
  `facebook` varchar(220) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_ongs`
--

INSERT INTO `tbl_ongs` (`id`, `descricao`, `cnpj`, `nome_fantasia`, `nome`, `telefone`, `email`, `senha`, `endereco`, `numero`, `complemento`, `estado`, `cidade`, `cep`, `alimentacao`, `medicacao`, `higiene`, `razao_social`, `banco`, `agencia`, `conta`, `imagem`, `instagram`, `facebook`, `created`) VALUES
(4, '<p>PROJETO MI &amp; AU - AssociaÃ§Ã£o de Defesa Animal - Ã© uma associaÃ§Ã£o sem fins lucrativos que atua em Guarulhos-SP, que proporciona o encontro e a cooperaÃ§Ã£o entre pessoas que acreditam na existÃªncia de relaÃ§Ãµes harmoniosas entre pessoas, animais e o meio ambiente. Para isso, trabalha com a doaÃ§Ã£o de animais esterilizados e com a educaÃ§Ã£o sobre posse e guarda responsÃ¡vel, alÃ©m de defender a esterilizaÃ§Ã£o (castraÃ§Ã£o) como forma de controle populacional e promoÃ§Ã£o do bem estar dos animais.</p>', '35.893.649/0001-63', 'PROJETO MI & AU', 'Roberto', '(19) 99102-0602', 'ongmieau@gmail.com', '$2y$10$Ji5UTSU4EgN3.S49KSGfIOPnXsuAjdWXSXjcPMSRbFsl36O1/Sr2O', 'JoÃ£o da Costa', '752', '', 'SÃ£o Paulo', 'HortolÃ¢ndia', '13185-255', '30%', '70%', '50%', 'Mi Au Amigo dos Animais', 'Bradesco', '5245', '0646100', 'unnamed.png', 'ongmiau', 'projetomiau', '2020-07-09 12:47:12'),
(5, '<p>A Ong Super Vira Lata Ã© uma associaÃ§Ã£o civil, nÃ£o governamental, com carÃ¡ter humanitÃ¡rio de proteÃ§Ã£o e bem-estar dos animais, sem fins lucrativos ou econÃ´micos.<br>Atualmente abriga mais de 1000 animais resgatados.</p>                    ', '22.315.008/0001-80', 'Super Vira Lata', 'Enzo', '(19) 99696-6247', 'amordebichoo@outlook.com', '$2y$10$tLNMIaFbfhG34okhXAVrQ.j7mVJ5q7enrrT3yW0FkE6ZER/QUOnhq', 'Rua Bento de Arruda Camargo ', '360 ', '', 'SÃ£o Paulo', 'Campinas', '13088-650', '50%', '65%', '45%', 'Super Vira Lata', 'Bradesco', '3798', '52615226', 'logo.jpg', 'superviralata', 'fb.com/ongsuperviralata', '2020-07-09 16:50:37'),
(6, '<p>Criada em 2018, por pessoas que amam animais e nÃ£o suporta ver eles em situaÃ§Ã£o de rua. Foi criada a Movimenta CÃ£o, com o intuito de ajudar animais de rua principalmente, para que eles tenham amor, carinho e cuidado por pessoas que realmente se importam com eles.</p>', '18.138.679/0001-45', 'Movimenta cÃ£o', 'Willian', '(19) 98805-3349', 'williamzenf5@gmail.com', '$2y$10$WoMxwdv9NY.CLDJzjivqCuxCA/WDjPbm/Mo082wVtzQ/ZST9GlGfO', 'Rua Camilo de Camargo', '710', 'Casa', 'SÃ£o Paulo', 'HortolÃ¢ndia', '13185-678', '70%', '75%', '60%', 'EsperanÃ§a', 'Inter', '0001-9', '639012-6', 'images.jpg', 'Instragam.com/movicao', 'Facebook.com/movi.cao', '2020-07-09 17:13:33'),
(3, '<p>Em 2015 se tornou a instituiÃ§Ã£o que mais ajuda animais no paÃ­s, ao se tornar uma â€œONG mÃ£eâ€ que ampara mais de 450 abrigos cadastrados em nÃ­vel nacional, que sÃ£o auxiliados em um sistema de rodÃ­zio com raÃ§Ã£o, medicamentos, vacinas, atendimento veterinÃ¡rio, eventos de adoÃ§Ã£o e projetos de conscientizaÃ§Ã£o. Os parceiros da instituiÃ§Ã£o auxiliam diretamente e mensalmente cerca de 10 mil animais. SÃ£o nove anos de trabalho, realizaÃ§Ãµes e grandes conquistas, e Ã© empreendendo socialmente que a <strong>AMPARA</strong> atua de forma preventiva com seus trÃªs principais pilares: adoÃ§Ã£o, castraÃ§Ã£o e, principalmente, a conscientizaÃ§Ã£o, atravÃ©s de projetos educativos voltados para o pÃºblico infantil e adulto.</p>                                        ', '79.272.896/0001-18', 'Ampara Animal', 'Anne S. Santos', '(19) 99167-5041', 'amparaanimal@gmail.com', '$2y$10$lfznh1j9/12uaq2jxwIyj.nPA9sV3F6stK1tR3fT3L9JrnIa8/X7a', 'Rua das Flores Coloridas ', '461', '', 'Sao Paulo', 'JundiaÃ­', '18245-044', '55%', '58%', '20%', 'Ampara Animal ONG de ProteÃ§Ã£o Animal', 'Bradesco', '2869', '15015594', 'AMPARA_Animal-logo.jpg', 'instagram.com/amparaanimal', 'facebook.com/amparanimal/', '2020-07-09 00:10:54'),
(7, '<p>Somos um grupo de voluntÃ¡rios na luta para resgatar, tratar e doar gatos das ruas. Nossa especialidade Ã© o resgate de gatos, pois somos amantes dos felinos ronronantes, e temos anos de experiÃªncia com gatos resgatados.</p>', '94.627.118/0001-98', 'Adote um Ronrom', 'Carlos', '(19) 99455-4436', 'adoteumronromm@outlook.com', '$2y$10$TdhnmtYv65wt1yN664Qk4.a3a9/fAecHdRlce2pT5RlvAKmQyf4X2', 'Rua Francisco Humberto Zuppi', '810 ', '', 'SÃ£o Paulo', 'Campinas', '13083-350', '45%', '20%', '55%', 'Adote um Ronrom', 'Banco do Brasil', '5289', '63257194', 'logo2.png', 'adoteumronrom', 'fb.com/ongadoteumronrom', '2020-07-09 17:24:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_pets`
--

DROP TABLE IF EXISTS `tbl_pets`;
CREATE TABLE IF NOT EXISTS `tbl_pets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ong` int(11) NOT NULL,
  `id_porte` int(11) NOT NULL,
  `nome_pet` varchar(220) NOT NULL,
  `sexo` varchar(220) NOT NULL,
  `imagem` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_pets`
--

INSERT INTO `tbl_pets` (`id`, `id_ong`, `id_porte`, `nome_pet`, `sexo`, `imagem`) VALUES
(34, 4, 3, 'Billy', 'Macho', 'adotar-cachorro-rua-quais-os-cuidados.jpg'),
(40, 5, 2, 'Milk', 'Macho', '5cdeac3b1d442.jpg'),
(39, 5, 2, 'Ruivo', 'Macho', '5cdeacf192db8.jpg'),
(32, 4, 2, 'Fred', 'Macho', '5-coisas-que-fazem-seu-cachorro-viralata-feliz.jpg'),
(33, 4, 2, 'Luke', 'Macho', 'adoÃ§Ã£o-de-cachorro-filhote.jpg'),
(24, 3, 2, 'SebastiÃ£o', 'Masculino', 'SebastiÃ£o.jpeg'),
(30, 3, 1, 'Juliet', 'Feminino', 'WhatsApp Image 2020-06-26 at 11.36.45 PM.jpeg'),
(26, 3, 2, 'Thor', 'Masculino', 'Thor.jpg'),
(27, 3, 1, 'Mia', 'Feminino', 'WhatsApp Image 2020-06-26 at 11.36.47 PM.jpeg'),
(29, 3, 1, 'Caramelo', 'Masculino', 'Caramelo.jpeg'),
(31, 3, 2, 'Layla', 'Feminino', 'brinquedos-para-cachorro-760x450.jpg'),
(35, 4, 3, 'Spike', 'Macho', 'c70f1bc999d70c0864103ed3862f7464.jpg'),
(36, 4, 1, 'Mel', 'FÃªmea', 'cachorro-para-adocao.jpg'),
(37, 4, 1, 'Izzy', 'FÃªmea', 'Google-Gato-2.jpg'),
(38, 4, 1, 'PaÃ§oca', 'Macho', 'whatsapp-image-2020-03-30-at-15.14.20.jpeg'),
(41, 5, 2, 'Bombom', 'FÃªmea', '5ccae25db2c3c.jpg'),
(42, 5, 2, 'Amarelo', 'Macho', '5ccae14dbd3aa.jpg'),
(43, 5, 2, 'Florzinha', 'FÃªmea', '95202158_3231025443588333_1586948501286158336_o.jpg'),
(44, 5, 2, 'Pitta', 'FÃªmea', '54200943_2394263087264577_7146734754870591488_o.jpg'),
(45, 5, 2, 'Aladin', 'Macho', '54213608_2391554924202060_3703983979368546304_o.jpg'),
(46, 5, 2, 'Liz', 'FÃªmea', '53861055_2391140974243455_5785959355945844736_o.jpg'),
(55, 6, 2, 'Caramelo', 'Masculino', 'images-3.jpg'),
(48, 6, 1, 'Nino', 'Masculino', 'images (22).jpeg'),
(49, 7, 1, 'Emma', 'FÃªmea', '53528469_2388872047803681_8138437712764993536_o.jpg'),
(50, 7, 1, 'Bigode', 'Macho', '53570253_2388866134470939_4300827160400101376_o.jpg'),
(51, 7, 1, 'Malhada', 'FÃªmea', '18301649_1563052800385614_857594249724768830_n.jpg'),
(52, 7, 1, 'Panqueca', 'FÃªmea', '54278733_2388878601136359_5828905000226521088_o.jpg'),
(53, 7, 1, 'Eva', 'FÃªmea', '54407586_2388874124470140_7851808092399337472_o.jpg'),
(54, 7, 1, 'Tino', 'Macho', '16178512_1453255064698722_7039433251686245743_o.jpg'),
(57, 6, 1, 'Mel', 'Feminino', 'images-2.jpg'),
(58, 6, 1, 'Zeus', 'Masculino', '9k=.jpg'),
(59, 6, 3, 'Miguel', 'Masculino', 'images-1.jpg'),
(61, 6, 1, 'Carlos', 'Masculino', 'images-4.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_porte`
--

DROP TABLE IF EXISTS `tbl_porte`;
CREATE TABLE IF NOT EXISTS `tbl_porte` (
  `id_porte_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_porte` varchar(120) NOT NULL,
  PRIMARY KEY (`id_porte_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_porte`
--

INSERT INTO `tbl_porte` (`id_porte_id`, `nome_porte`) VALUES
(1, 'Pequeno'),
(2, 'MÃ©dio'),
(3, 'Grande');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
