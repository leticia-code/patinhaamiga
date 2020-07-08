-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 08/07/2020 às 15:30
-- Versão do servidor: 5.6.47
-- Versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fernando_patinha`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Leticia Cardoso', 'patinha@amiga.com.br', '$2y$10$Rn42hKdoMhP0C.tZymz7RuD3sk6n1kqvn81Kkqn2IfgMkYLNscfAG');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_adocoes`
--

CREATE TABLE `tbl_adocoes` (
  `id` int(11) NOT NULL,
  `id_ong` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `nome_pet` varchar(220) NOT NULL,
  `cliente_nome` varchar(220) NOT NULL,
  `cliente_email` varchar(220) NOT NULL,
  `cliente_telefone` varchar(220) NOT NULL,
  `cliente_mensagem` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tbl_adocoes`
--

INSERT INTO `tbl_adocoes` (`id`, `id_ong`, `id_pet`, `nome_pet`, `cliente_nome`, `cliente_email`, `cliente_telefone`, `cliente_mensagem`, `created`) VALUES
(13, 1, 19, 'Marcio', 'Fernando de Almeida', 'fernandoa.code@gmail.com', '(19) 99501-3653', 'OlÃ¡, tenho interesse!', '2020-07-04 20:16:28'),
(14, 1, 5, 'Malaquias', 'Fernando de', 'fernandoa.code@gmail.com', '(19) 99501-3653', 'teste1234', '2020-07-05 16:42:54'),
(15, 1, 7, 'Soneca', 'Fernando de', 'nando-de-almeida@hotmail.com', '(19) 99501-3653', 'testando', '2020-07-05 23:27:31'),
(16, 1, 7, 'Soneca', 'Fernando', 'nando-de-almeida@hotmail.com', '(19) 99501-3653', 'teste', '2020-07-05 23:50:19'),
(17, 1, 5, 'Malaquias', 'Leticia', 'fernandoa.code@gmail.com', '(19) 99501-3653', 'teste', '2020-07-05 23:52:16'),
(18, 1, 7, 'Soneca', 'Leticia', 'fernandoa.code@gmail.com', '(19) 99501-3653', 'blablabalbeblelbel', '2020-07-05 23:52:51'),
(19, 1, 7, 'Soneca', 'JOAO', 'lojavirtual12354@gmail.com', '(19) 99501-3653', 'testete', '2020-07-05 23:53:02'),
(20, 1, 7, 'Soneca', 'Fernando de', 'nando-de-almeida@hotmail.com', '(19) 99501-3653', '1211221', '2020-07-05 23:53:10'),
(21, 1, 7, 'Soneca', 'Leticia', 'fernandoa.code@gmail.com', '(12) 11221-1212', '2121', '2020-07-05 23:54:01'),
(22, 1, 7, 'Soneca', 'Fernando', 'testebla@gmail.com', '(19) 99501-3653', 'teste hospedado', '2020-07-07 22:40:10'),
(23, 2, 20, 'Thor', 'LetÃ­cia', 'leticiacardoso31@hotmail.com', '(19) 98415-5014', 'teste', '2020-07-08 12:49:02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_doacoes`
--

CREATE TABLE `tbl_doacoes` (
  `id` int(11) NOT NULL,
  `id_ong` int(11) NOT NULL,
  `doa_alimento` varchar(30) NOT NULL,
  `doa_medicamento` varchar(30) NOT NULL,
  `doa_higiene` varchar(30) NOT NULL,
  `doa_nome` varchar(120) NOT NULL,
  `doa_email` varchar(120) NOT NULL,
  `doa_telefone` varchar(120) NOT NULL,
  `doa_mensagem` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tbl_doacoes`
--

INSERT INTO `tbl_doacoes` (`id`, `id_ong`, `doa_alimento`, `doa_medicamento`, `doa_higiene`, `doa_nome`, `doa_email`, `doa_telefone`, `doa_mensagem`, `created`) VALUES
(1, 1, 'Sim', 'Sim', 'Sim', 'Fernando de Almeida', 'fernandoa.code@gmail.com', '(19) 99501-3653', 'OlÃ¡, testando doaÃ§Ã£o!', '2020-07-04 20:19:07'),
(2, 1, 'Sim', 'Nao', 'Sim', 'Fernando de', 'nando-de-almeida@hotmail.com', '(19) 99501-3653', '12345', '2020-07-05 16:43:52'),
(3, 1, 'Sim', 'Sim', 'Nao', 'Fernando', 'nando-de-almeida@hotmail.com', '(19) 99501-3653', 'teste', '2020-07-05 23:48:37'),
(4, 1, 'Sim', 'Sim', 'Sim', 'Leticia', 'fernandoa.code@gmail.com', '(19) 99501-3653', 'teste 2', '2020-07-05 23:49:02'),
(5, 1, 'Sim', 'Sim', 'Sim', 'Jose', 'testebla@gmail.com', '(19) 99501-3653', 'teste', '2020-07-05 23:49:22'),
(6, 1, 'Sim', 'Sim', 'Sim', 'fernando', 'fernandoa.code@gmail.com', '(19) 99501-3653', 'teste hospedado', '2020-07-07 22:39:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_index`
--

CREATE TABLE `tbl_index` (
  `id` int(11) NOT NULL,
  `video_principal` varchar(220) NOT NULL,
  `titulo_missao` varchar(220) NOT NULL,
  `missao` text NOT NULL,
  `video_sec` varchar(220) NOT NULL,
  `sobre_esquerdo` text NOT NULL,
  `sobre_direito` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tbl_index`
--

INSERT INTO `tbl_index` (`id`, `video_principal`, `titulo_missao`, `missao`, `video_sec`, `sobre_esquerdo`, `sobre_direito`) VALUES
(1, 'https://www.youtube.com/embed/QiCpsIS90F0', 'O seu novo amiguinho de 4 patas estÃ¡ aqui!', '<p>NÃ³s da patinha amiga temos a importante missÃ£o de juntamente com as ONG\'s, conseguirmos uma melhor condiÃ§Ã£o de vida e tudo o que um animalzinho carente necessita, atravÃ©s de adoÃ§Ãµes e doaÃ§Ãµes, feitas de uma maneira rÃ¡pida, simples, segura e moderna por um meio digital.</p>                    ', 'https://www.youtube.com/embed/QiCpsIS90F0', '<p>Por meio deste projeto, buscamos alcanÃ§ar as pessoas que possam colaborar com a retirada de animais do estado de vulnerabilidade nas ruas, tendo tambÃ©m a oportunidade de ajudar as ONG\'s responsÃ¡veis pelos devidos cuidados. Para que se recuperem e possam voltar a ter uma vida normal encontrando alguÃ©m disposto a enche-los com todo o amor e carinho que merecem. AtravÃ©s de nossa plataforma as pessoas poderÃ£o</p>                    ', '<p>doar os animais que infelizmente nÃ£o possuem condiÃ§Ãµes de cuidar ou mesmo que fora encontrado em situaÃ§Ã£o de rua, adotar e doar monetariamente em instituiÃ§Ãµes que se cadastrarem previamente em nosso sistema, depois de passarem por uma rigorosa anÃ¡lise, afim de analiser realmente se essa instituiÃ§Ã£o erÃ¡ fazer o que hÃ¡ de melhor<br>para os animais.</p>                    ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `news_email` varchar(120) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `news_email`, `created`) VALUES
(1, 'teste@teste.com.br', '2020-07-04 19:33:11'),
(2, 'teste2@dois.omc.br', '2020-07-04 19:34:07'),
(3, 'tres@tres', '2020-07-04 19:34:50'),
(4, '1212@2121', '2020-07-04 19:35:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_ongs`
--

CREATE TABLE `tbl_ongs` (
  `id` int(11) NOT NULL,
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
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tbl_ongs`
--

INSERT INTO `tbl_ongs` (`id`, `descricao`, `cnpj`, `nome_fantasia`, `nome`, `telefone`, `email`, `senha`, `endereco`, `numero`, `complemento`, `estado`, `cidade`, `cep`, `alimentacao`, `medicacao`, `higiene`, `razao_social`, `banco`, `agencia`, `conta`, `imagem`, `instagram`, `facebook`, `created`) VALUES
(1, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    ', '00.000.000/0000-00', 'ONG E-PET', 'Fernando de Almeida PrÃ©como', '(19) 99501-3653', 'fernandoa.code@gmail.com', '$2y$10$Rn42hKdoMhP0C.tZymz7RuD3sk6n1kqvn81Kkqn2IfgMkYLNscfAG', 'Rua Testando do Testando', '4123', '', 'SP', 'Nova Odessa', '11111-111', '035%', '070%', '100%', 'ONG E-PET', 'Caixa econÃ´mica Federal', '000000-03', '2328844', 'WhatsApp Image 2020-06-27 at 8.33.22 PM.jpeg', 'instagram.com', 'facebook.com', '2020-06-29 14:54:04'),
(2, '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '85.266.660/0001-71', 'Con Animal ', 'LetÃ­cia de Oliveira Cardoso', '(19) 98415-5014', 'leticiacardoso31@hotmail.com', '$2y$10$B7JUNG12tqCZWeg9wzOIx.ksjQ5vxG9gV8CQKAUUf2k1ubdXEr6Zq', 'Cuba', '357', '', 'SÃ£o Paulo', 'HortolÃ¢ndia ', '13186-380', '60%', '30%', '20%', 'con animal', 'ItaÃº ', '0058', '0841894-2', 'Con_animal_5e0cb1e96ecc7.jpg', 'instagram.com/conanimalong', 'facebook.com/conanimalong', '2020-07-07 23:00:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_pets`
--

CREATE TABLE `tbl_pets` (
  `id` int(11) NOT NULL,
  `id_ong` int(11) NOT NULL,
  `id_porte` int(11) NOT NULL,
  `nome_pet` varchar(220) NOT NULL,
  `sexo` varchar(220) NOT NULL,
  `imagem` varchar(220) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tbl_pets`
--

INSERT INTO `tbl_pets` (`id`, `id_ong`, `id_porte`, `nome_pet`, `sexo`, `imagem`) VALUES
(7, 1, 1, 'Soneca', 'Macho', 'soneca.jpg'),
(5, 1, 3, 'Malaquias', 'Macho', 'mala.jpg'),
(19, 1, 2, 'Marcio', 'Macho', '2.jpg'),
(6, 1, 1, 'Queen', 'FÃªmea', 'queen.jpg'),
(20, 2, 3, 'Thor', 'Macho', 'retrato-de-cachorro-boxer-fofo_124437-691.jpg'),
(21, 2, 2, 'Paco', 'Macho', 'thumb-1920-49327.jpg'),
(22, 2, 1, 'Lilith', 'FÃªmea', '1093-gatos-pretos-sao-animais-fascinantes-co-articles_media_mobile-4.jpg'),
(23, 2, 1, 'Belinha', 'FÃªmea', 'shitzy.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_porte`
--

CREATE TABLE `tbl_porte` (
  `id_porte_id` int(11) NOT NULL,
  `nome_porte` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tbl_porte`
--

INSERT INTO `tbl_porte` (`id_porte_id`, `nome_porte`) VALUES
(1, 'Pequeno'),
(2, 'MÃ©dio'),
(3, 'Grande');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_adocoes`
--
ALTER TABLE `tbl_adocoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_doacoes`
--
ALTER TABLE `tbl_doacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_index`
--
ALTER TABLE `tbl_index`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_ongs`
--
ALTER TABLE `tbl_ongs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_pets`
--
ALTER TABLE `tbl_pets`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_porte`
--
ALTER TABLE `tbl_porte`
  ADD PRIMARY KEY (`id_porte_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_adocoes`
--
ALTER TABLE `tbl_adocoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tbl_doacoes`
--
ALTER TABLE `tbl_doacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbl_index`
--
ALTER TABLE `tbl_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbl_ongs`
--
ALTER TABLE `tbl_ongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_pets`
--
ALTER TABLE `tbl_pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tbl_porte`
--
ALTER TABLE `tbl_porte`
  MODIFY `id_porte_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
