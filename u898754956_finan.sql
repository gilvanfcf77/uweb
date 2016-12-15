-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Set-2015 às 00:51
-- Versão do servidor: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gerenciador_de_financas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita_despesas`
--

CREATE TABLE IF NOT EXISTS `receita_despesas` (
  `id` int(11) NOT NULL COMMENT 'chave primária',
  `nome` varchar(50) NOT NULL COMMENT 'Conta de Telefone',
  `tipo` int(1) NOT NULL COMMENT '1 - Receita, 2- Despesa',
  `classe` int(1) NOT NULL COMMENT '1- Variável 2- Fixo',
  `datahora` datetime NOT NULL,
  `valor` float NOT NULL,
  `usuario` int(11) NOT NULL COMMENT 'Id Usuário a quem pertence',
  `descricao` text COMMENT 'Comentários Adicionais'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL COMMENT 'chave primária',
  `login` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` int(11) NOT NULL COMMENT '1 - Feminino, 2 - Masculino',
  `identidade` varchar(20) DEFAULT NULL COMMENT '’Apenas numeros .’ ',
  `cpf` varchar(11) NOT NULL COMMENT '’Apenas numeros .’',
  `nascimento` date NOT NULL,
  `estado_civil` int(11) NOT NULL COMMENT '’1. Solteiro ; 2. Casado ; 3. Separado ; 12 4. Divorciado ; 5. Viuvo ; 6. Uniao estavel .’',
  `funcao_empresa` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(9) NOT NULL COMMENT '’Apenas numeros .’',
  `perfil` int(11) NOT NULL COMMENT '’1. Padrao ; 2. Administrador .’',
  `cad_usuario` int(11) NOT NULL COMMENT '’Id do usuario que efetuou o cadastro .’',
  `cad_datahora` datetime(6) NOT NULL COMMENT '’Data e hora de efetivacao do cadastro .’'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nome`, `sexo`, `identidade`, `cpf`, `nascimento`, `estado_civil`, `funcao_empresa`, `email`, `telefone`, `perfil`, `cad_usuario`, `cad_datahora`) VALUES
(1, 'admin', 'admin', 'Administrador Padrão', 2, NULL, '00000000000', '2015-09-04', 1, 'Administração', 'admin@minhaempresa.com.br', '900000000', 2, 1, '2015-09-04 19:38:37.430592');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `receita_despesas`
--
ALTER TABLE `receita_despesas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`,`identidade`,`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receita_despesas`
--
ALTER TABLE `receita_despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'chave primária';
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'chave primária',AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
