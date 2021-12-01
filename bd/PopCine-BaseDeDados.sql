CREATE DATABASE  IF NOT EXISTS `popcine` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `popcine`;
-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: popcine
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atores`
--

DROP TABLE IF EXISTS `atores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atores` (
  `id_ator` int(11) NOT NULL AUTO_INCREMENT,
  `id_pess_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_ator`,`id_pess_fk`),
  KEY `fk_atores_pessoas1_idx` (`id_pess_fk`),
  CONSTRAINT `fk_atores_pessoas1` FOREIGN KEY (`id_pess_fk`) REFERENCES `pessoas` (`id_pess`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atores`
--

LOCK TABLES `atores` WRITE;
/*!40000 ALTER TABLE `atores` DISABLE KEYS */;
INSERT INTO `atores` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,11),(10,12),(11,13),(12,14),(13,15),(14,16),(15,17),(16,18),(17,20),(18,21),(19,22),(20,23),(21,24),(22,25),(23,26),(24,27),(25,29),(26,30),(27,31),(28,32),(29,33),(30,34),(31,35),(32,36),(33,39),(34,40),(35,41),(36,42),(37,43),(38,44),(39,45),(40,46),(41,47),(42,49),(43,50),(44,51),(45,52),(46,53),(47,54),(48,55),(49,56),(50,58),(51,59),(52,60),(53,61),(54,62),(55,63),(56,64),(57,65);
/*!40000 ALTER TABLE `atores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id_clie` int(11) NOT NULL AUTO_INCREMENT,
  `nome_clie` varchar(100) NOT NULL,
  `datanascimento_clie` date NOT NULL,
  `id_logi_clie_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_clie`),
  KEY `id_logi_clie_fk_idx` (`id_logi_clie_fk`),
  CONSTRAINT `id_logi_clie_fk` FOREIGN KEY (`id_logi_clie_fk`) REFERENCES `login_cliente` (`id_logi_clie`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (4,'Danilo Lopes','1999-09-03',1),(5,'Vinicius Louzada','1999-12-20',2),(6,'Rui Nascimento','1996-09-20',3),(7,'Brendo Araújo','1999-02-12',4),(15,'Ruizinho','1996-06-21',13);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes_ingressos`
--

DROP TABLE IF EXISTS `clientes_ingressos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes_ingressos` (
  `id_clie_ingr` int(11) NOT NULL AUTO_INCREMENT,
  `id_clie_fk` int(11) NOT NULL,
  `id_ingr_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_clie_ingr`),
  KEY `fk_clientes_has_ingressos_ingressos1_idx` (`id_ingr_fk`),
  KEY `fk_clientes_has_ingressos_clientes1_idx` (`id_clie_fk`),
  CONSTRAINT `fk_clientes_has_ingressos_clientes1` FOREIGN KEY (`id_clie_fk`) REFERENCES `clientes` (`id_clie`),
  CONSTRAINT `fk_clientes_has_ingressos_ingressos1` FOREIGN KEY (`id_ingr_fk`) REFERENCES `ingressos` (`id_ingr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes_ingressos`
--

LOCK TABLES `clientes_ingressos` WRITE;
/*!40000 ALTER TABLE `clientes_ingressos` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes_ingressos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diretores`
--

DROP TABLE IF EXISTS `diretores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diretores` (
  `id_dire` int(11) NOT NULL AUTO_INCREMENT,
  `id_pess_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_dire`,`id_pess_fk`),
  KEY `fk_diretores_pessoas1_idx` (`id_pess_fk`),
  CONSTRAINT `fk_diretores_pessoas1` FOREIGN KEY (`id_pess_fk`) REFERENCES `pessoas` (`id_pess`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diretores`
--

LOCK TABLES `diretores` WRITE;
/*!40000 ALTER TABLE `diretores` DISABLE KEYS */;
INSERT INTO `diretores` VALUES (1,9),(2,10),(3,19),(4,28),(5,38),(6,48),(7,57);
/*!40000 ALTER TABLE `diretores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filmes`
--

DROP TABLE IF EXISTS `filmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filmes` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `nome_film` varchar(150) NOT NULL,
  `duracao_film` int(11) NOT NULL,
  `sinopse_film` text NOT NULL,
  `dataestreia_film` date NOT NULL,
  `classificacao_film` enum('L','10','12','14','16','18') NOT NULL,
  `orcamento_film` float NOT NULL,
  `trailer_film` varchar(255) NOT NULL,
  `bilheteria_film` float DEFAULT NULL,
  `capafilme_film` varchar(255) NOT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filmes`
--

LOCK TABLES `filmes` WRITE;
/*!40000 ALTER TABLE `filmes` DISABLE KEYS */;
INSERT INTO `filmes` VALUES (1,'Viúva Negra',135,'Natasha Romanoff, também conhecida como Viúva Negra, confronta o lado mais sombrio de sua história quando surge uma perigosa conspiração ligada ao seu passado. Perseguida por uma força implacável disposta a tudo para destruí-la, Natasha precisa agora lidar com seu passado como espiã e com as relações que deixou para trás muito antes de se tornar uma Vingadora.','2021-07-08','12',200000000,'Gm3o0bfGP3g',369811000,'public\\img\\capa-filmes\\viuvanegra.jpg'),(2,'Star Wars: Episódio IX\n',142,'Com o retorno do Imperador Palpatine, a Resistência toma a frente da batalha. Treinando para ser uma completa Jedi, Rey se encontra em conflito com passado e futuro, e teme pelas respostas que pode conseguir com Kylo Ren.','2019-12-19','10',250000000,'jiRTfUYOHCs',1074140000,'public\\img\\capa-filmes\\starwars.jpg'),(3,'Venom Tempo de Carnificina',97,'O relacionamento entre Eddie e Venom (Tom Hardy) está evoluindo. Buscando a melhor forma de lidar com a inevitável simbiose, esse dois lados descobrem como viver juntos e, de alguma forma, se tornarem melhores juntos do que separados.','2021-10-07','14',110000000,'K1TloEu4EXA',424000000,'public\\img\\capa-filmes\\venom.jpg'),(4,'Shang-Chi e a Lenda dos Dez Anéis',132,'Shang-Chi precisa confrontar o passado que pensou ter deixado para trás. Ao mesmo tempo, ele é envolvido em uma teia de mistérios da organização conhecida como Dez Anéis.','2021-09-02','12',150000000,'wAmkU6FEKUw',430238000,'public/img/capa-filmes/shang.jpg'),(5,'Free Guy Assumindo o Controle',115,'Um caixa de banco preso a uma entediante rotina tem sua vida virada de cabeça para baixo quando ele descobre que é personagem em um brutalmente realista vídeo game de mundo aberto. Agora ele precisa aceitar sua realidade e lidar com o fato de que é o único que pode salvar o mundo.','2021-08-19','12',110000000,'G7LdgyxvoN8',317000000,'public\\img\\capa-filmes\\freeguy.jpg'),(6,'Eternos',157,'Após os eventos de “Vingadores: Ultimato”, os Eternos, uma raça alienígena imortal criada pelos Celestiais que vivem em segredo na Terra há mais de 7000 anos, se reúnem após uma tragédia inesperada para proteger a humanidade de seus colegas malignos: os Deviantes.','2021-11-04','12',200000000,'lRrSFvZUgGw',300000000,'public\\img\\capa-filmes\\eternos.jpg'),(7,'Velozes & Furiosos 9',145,'Dominic Toretto e sua família precisam enfrentar o seu irmão mais novo Jakob, um assassino mortal que está trabalhando com uma antiga inimiga, a cyber-terrorista Cipher.','2021-06-24','14',200000000,'mLWJfHCU7b4',704238000,'public\\img\\capa-filmes\\velozes9.jpg');
/*!40000 ALTER TABLE `filmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filmes_generos`
--

DROP TABLE IF EXISTS `filmes_generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filmes_generos` (
  `id_film_gene` int(11) NOT NULL AUTO_INCREMENT,
  `id_film_fk` int(11) NOT NULL,
  `id_gene_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_film_gene`),
  KEY `fk_filmes_has_generos_generos1_idx` (`id_gene_fk`),
  KEY `fk_filmes_has_generos_filmes1_idx` (`id_film_fk`),
  CONSTRAINT `fk_filmes_has_generos_filmes1` FOREIGN KEY (`id_film_fk`) REFERENCES `filmes` (`id_film`),
  CONSTRAINT `fk_filmes_has_generos_generos1` FOREIGN KEY (`id_gene_fk`) REFERENCES `generos` (`id_gene`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filmes_generos`
--

LOCK TABLES `filmes_generos` WRITE;
/*!40000 ALTER TABLE `filmes_generos` DISABLE KEYS */;
INSERT INTO `filmes_generos` VALUES (1,1,1),(2,1,18),(3,1,16),(4,1,12),(5,2,1),(6,2,18),(7,2,12),(8,3,12),(9,3,1),(10,3,18),(11,4,1),(12,4,18),(13,4,9),(14,5,4),(15,5,1),(16,5,18),(17,5,12),(18,6,1),(19,6,18),(20,6,12),(21,7,1),(22,7,18),(23,7,9),(24,7,16);
/*!40000 ALTER TABLE `filmes_generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filmes_legedas_tradutores`
--

DROP TABLE IF EXISTS `filmes_legedas_tradutores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filmes_legedas_tradutores` (
  `id_film_lege_trad` int(11) NOT NULL AUTO_INCREMENT,
  `id_film_fk` int(11) NOT NULL,
  `id_lege_trad_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_film_lege_trad`),
  KEY `fk_filmes_has_legendas_tradutores_legendas_tradutores1_idx` (`id_lege_trad_fk`),
  KEY `fk_filmes_has_legendas_tradutores_filmes1_idx` (`id_film_fk`),
  CONSTRAINT `fk_filmes_has_legendas_tradutores_filmes1` FOREIGN KEY (`id_film_fk`) REFERENCES `filmes` (`id_film`),
  CONSTRAINT `fk_filmes_has_legendas_tradutores_legendas_tradutores1` FOREIGN KEY (`id_lege_trad_fk`) REFERENCES `legendas_tradutores` (`id_lege_trad`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filmes_legedas_tradutores`
--

LOCK TABLES `filmes_legedas_tradutores` WRITE;
/*!40000 ALTER TABLE `filmes_legedas_tradutores` DISABLE KEYS */;
INSERT INTO `filmes_legedas_tradutores` VALUES (1,1,1),(2,1,2),(3,1,3),(4,2,4),(5,2,5),(6,2,6),(7,3,7),(8,3,8),(9,3,9),(10,4,10),(11,4,11),(12,4,12),(13,5,13),(14,5,14),(15,5,15),(16,6,16),(17,6,17),(18,6,18),(19,7,19),(20,7,20),(21,7,21);
/*!40000 ALTER TABLE `filmes_legedas_tradutores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filmes_pessoas`
--

DROP TABLE IF EXISTS `filmes_pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filmes_pessoas` (
  `id_filmespessoas` int(11) NOT NULL AUTO_INCREMENT,
  `id_film_fk` int(11) NOT NULL,
  `id_pess_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_filmespessoas`),
  KEY `fk_filmes_has_pessoas_pessoas1_idx` (`id_pess_fk`),
  KEY `fk_filmes_has_pessoas_filmes1_idx` (`id_film_fk`),
  CONSTRAINT `fk_filmes_has_pessoas_filmes1` FOREIGN KEY (`id_film_fk`) REFERENCES `filmes` (`id_film`),
  CONSTRAINT `fk_filmes_has_pessoas_pessoas1` FOREIGN KEY (`id_pess_fk`) REFERENCES `pessoas` (`id_pess`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filmes_pessoas`
--

LOCK TABLES `filmes_pessoas` WRITE;
/*!40000 ALTER TABLE `filmes_pessoas` DISABLE KEYS */;
INSERT INTO `filmes_pessoas` VALUES (1,2,10),(2,2,11),(3,2,12),(4,2,13),(5,2,14),(6,2,15),(7,2,16),(8,2,17),(9,2,18),(10,1,1),(11,1,2),(12,1,3),(13,1,4),(14,1,5),(15,1,6),(16,1,7),(17,1,8),(18,1,9),(19,3,19),(20,3,20),(21,3,21),(22,3,22),(23,3,23),(24,3,24),(25,3,25),(26,3,26),(27,3,27),(28,4,28),(29,4,29),(30,4,30),(31,4,31),(32,4,32),(33,4,33),(34,4,34),(35,4,35),(36,4,36),(37,5,38),(38,5,39),(39,5,40),(40,5,41),(41,5,42),(42,5,43),(43,5,44),(44,5,45),(45,5,46),(46,5,47),(47,6,48),(48,6,49),(49,6,50),(50,6,51),(51,6,52),(52,6,53),(53,6,54),(54,6,55),(55,6,56),(56,7,57),(57,7,58),(58,7,59),(59,7,60),(60,7,61),(61,7,62),(62,7,63),(63,7,64),(64,7,65);
/*!40000 ALTER TABLE `filmes_pessoas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formas_pagamento`
--

DROP TABLE IF EXISTS `formas_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formas_pagamento` (
  `id_form_paga` int(11) NOT NULL AUTO_INCREMENT,
  `pagamento_form_paga` enum('Boleto','Pix','Cartão de Crédito','Cartão de Débito') NOT NULL,
  PRIMARY KEY (`id_form_paga`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formas_pagamento`
--

LOCK TABLES `formas_pagamento` WRITE;
/*!40000 ALTER TABLE `formas_pagamento` DISABLE KEYS */;
INSERT INTO `formas_pagamento` VALUES (1,'Boleto'),(3,'Pix'),(4,'Cartão de Crédito'),(5,'Cartão de Débito');
/*!40000 ALTER TABLE `formas_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generos`
--

DROP TABLE IF EXISTS `generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generos` (
  `id_gene` int(11) NOT NULL AUTO_INCREMENT,
  `nomegenero_gene` varchar(50) NOT NULL,
  PRIMARY KEY (`id_gene`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generos`
--

LOCK TABLES `generos` WRITE;
/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` VALUES (1,'Ação\r'),(2,'Animação\n'),(3,'Clássicos'),(4,'Comédia\n'),(5,'Documentários\n'),(6,'Drama\n'),(7,'Esportes'),(8,'Estrangeiros\n'),(9,'Fantasia\n'),(10,'Fé e Espiritualidade\n'),(11,'Festas de fim de ano\n'),(12,'Ficção ciéntifica\n'),(13,'Musicais'),(14,'Policial\n'),(15,'Romance'),(16,'Suspense\n'),(17,'Terror'),(18,'Aventura'),(19,'Crime');
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingressos`
--

DROP TABLE IF EXISTS `ingressos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingressos` (
  `id_ingr` int(11) NOT NULL AUTO_INCREMENT,
  `preco_ingr` float NOT NULL,
  `tipo_ingr` enum('Meia','Inteira','Corporativo','Convidado') NOT NULL,
  `datacompra_ingr` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_form_paga_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_ingr`),
  KEY `fk_Ingresso_Forma_Pagamento1_idx` (`id_form_paga_fk`),
  CONSTRAINT `fk_Ingresso_Forma_Pagamento1` FOREIGN KEY (`id_form_paga_fk`) REFERENCES `formas_pagamento` (`id_form_paga`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingressos`
--

LOCK TABLES `ingressos` WRITE;
/*!40000 ALTER TABLE `ingressos` DISABLE KEYS */;
INSERT INTO `ingressos` VALUES (1,10,'Inteira','2021-11-30 13:00:00',3),(2,20,'Inteira','2021-11-30 11:57:11',1),(4,45,'Inteira','2021-12-01 00:23:06',4),(5,24,'Meia','2021-12-01 01:20:28',1),(6,52,'Meia','2021-12-01 01:20:28',3);
/*!40000 ALTER TABLE `ingressos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `legendas`
--

DROP TABLE IF EXISTS `legendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `legendas` (
  `id_lege` int(11) NOT NULL AUTO_INCREMENT,
  `idioma_lege` varchar(50) NOT NULL,
  PRIMARY KEY (`id_lege`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `legendas`
--

LOCK TABLES `legendas` WRITE;
/*!40000 ALTER TABLE `legendas` DISABLE KEYS */;
INSERT INTO `legendas` VALUES (1,'Inglês'),(2,'Português'),(3,'Espanhol');
/*!40000 ALTER TABLE `legendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `legendas_tradutores`
--

DROP TABLE IF EXISTS `legendas_tradutores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `legendas_tradutores` (
  `id_lege_trad` int(11) NOT NULL AUTO_INCREMENT,
  `id_lege_fk` int(11) NOT NULL,
  `id_trad_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_lege_trad`),
  KEY `fk_legendas_has_tradutores_tradutores1_idx` (`id_trad_fk`),
  KEY `fk_legendas_has_tradutores_legendas1_idx` (`id_lege_fk`),
  CONSTRAINT `fk_legendas_has_tradutores_legendas1` FOREIGN KEY (`id_lege_fk`) REFERENCES `legendas` (`id_lege`),
  CONSTRAINT `fk_legendas_has_tradutores_tradutores1` FOREIGN KEY (`id_trad_fk`) REFERENCES `tradutores` (`id_trad`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `legendas_tradutores`
--

LOCK TABLES `legendas_tradutores` WRITE;
/*!40000 ALTER TABLE `legendas_tradutores` DISABLE KEYS */;
INSERT INTO `legendas_tradutores` VALUES (1,1,2),(2,2,1),(3,3,1),(4,1,3),(5,2,4),(6,3,5),(7,1,2),(8,2,6),(9,3,6),(10,1,2),(11,2,6),(12,3,6),(13,1,2),(14,2,6),(15,3,6),(16,1,7),(17,2,6),(18,3,6),(19,1,2),(20,2,1),(21,3,6);
/*!40000 ALTER TABLE `legendas_tradutores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_cliente`
--

DROP TABLE IF EXISTS `login_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_cliente` (
  `id_logi_clie` int(11) NOT NULL AUTO_INCREMENT,
  `email_logi_clie` varchar(100) NOT NULL,
  `senha_logi_clie` varchar(255) NOT NULL,
  PRIMARY KEY (`id_logi_clie`),
  UNIQUE KEY `email_logi_clie_UNIQUE` (`email_logi_clie`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_cliente`
--

LOCK TABLES `login_cliente` WRITE;
/*!40000 ALTER TABLE `login_cliente` DISABLE KEYS */;
INSERT INTO `login_cliente` VALUES (1,'danlopes.eng@gmail.com','Danilo#123'),(2,'vinelow33@gmail.com','lanaxd'),(3,'sruy19@gmail.com','cosk^#1212'),(4,'brendocomp.eng@gmail.com','flatuc10'),(13,'sruy13@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$UnpFTGl4aXRHcUZkaXBUTA$xh1VuAiO+C17xxzQfnA7QN/MsRkS4vIHTOcW6i4AYf8');
/*!40000 ALTER TABLE `login_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas` (
  `id_pess` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pess` varchar(150) NOT NULL,
  PRIMARY KEY (`id_pess`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` VALUES (1,'Scarlett Johansson'),(2,'Rachel Weisz'),(3,'Ray Winstone'),(4,'Ever Anderson'),(5,'Florence Pugh'),(6,'David Harbour'),(7,'Olga Kurylenko'),(8,'Violet McGraw'),(9,'Cate Shortland'),(10,'J.J. Abrams\n'),(11,'Carrie Fisher'),(12,'Daisy Ridley'),(13,'John Boyega'),(14,'Anthony Daniels'),(15,'Mark Hamill'),(16,'Adam Driver'),(17,'Oscar Isaac'),(18,'Naomi Ackie'),(19,'Andy Serkis'),(20,'Tom Hardy'),(21,'Michelle Williams'),(22,'Reid Scott'),(23,'Peggy Lu'),(24,'Woody Harrelson'),(25,'Naomie Harris'),(26,'Stephen Graham'),(27,'Sian Webber'),(28,'Destin Daniel Cretton'),(29,'Simu Liu'),(30,'Awkwafina'),(31,'Fala Chen'),(32,'Yuen Wah'),(33,'Tony Leung Chiu-Wai'),(34,'Meng’er Zhang'),(35,'Michelle Yeoh'),(36,'Ben Kingsley'),(38,'Shawn Levy'),(39,'Ryan Reynolds'),(41,'Lil Rel Howery'),(42,'Taika Waititi'),(43,'Owen Burke'),(44,'Jodie Comer'),(45,'Joe Keery'),(46,'Utkarsh Ambudkar'),(47,'Kayla Caulfield'),(48,'Chloé Zhao'),(49,'Gemma Chan'),(50,'Angelina Jolie'),(51,'Barry Keoghan'),(52,'Lia McHugh'),(53,'Richard Madden'),(54,'Kumail Nanjiani'),(55,'Lauren Ridloff'),(56,'Brian Tyree Henry'),(57,'Justin Lin'),(58,'Vin Diesel'),(59,'Tyrese Gibson'),(60,'John Cena'),(61,'Jordana Brewster'),(62,'Michelle Rodriguez'),(63,'Ludacris'),(64,'Nathalie Emmanuel'),(65,'Sung Kang');
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas_fisicas`
--

DROP TABLE IF EXISTS `pessoas_fisicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas_fisicas` (
  `id_clie_fk` int(11) NOT NULL,
  `cpf_pess_fisi` char(14) DEFAULT NULL,
  PRIMARY KEY (`id_clie_fk`),
  CONSTRAINT `fk_pessoas_fisicas_clientes1` FOREIGN KEY (`id_clie_fk`) REFERENCES `clientes` (`id_clie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_fisicas`
--

LOCK TABLES `pessoas_fisicas` WRITE;
/*!40000 ALTER TABLE `pessoas_fisicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoas_fisicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas_juridicas`
--

DROP TABLE IF EXISTS `pessoas_juridicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas_juridicas` (
  `id_clie_fk` int(11) NOT NULL,
  `cnpj_pess_juri` char(18) DEFAULT NULL,
  PRIMARY KEY (`id_clie_fk`),
  CONSTRAINT `fk_pessoas_juridicas_clientes1` FOREIGN KEY (`id_clie_fk`) REFERENCES `clientes` (`id_clie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_juridicas`
--

LOCK TABLES `pessoas_juridicas` WRITE;
/*!40000 ALTER TABLE `pessoas_juridicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoas_juridicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poltronas`
--

DROP TABLE IF EXISTS `poltronas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poltronas` (
  `id_polt` int(11) NOT NULL AUTO_INCREMENT,
  `acessivel_polt` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_polt`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poltronas`
--

LOCK TABLES `poltronas` WRITE;
/*!40000 ALTER TABLE `poltronas` DISABLE KEYS */;
INSERT INTO `poltronas` VALUES (1,0),(2,0),(3,0),(4,0),(5,0),(6,0),(7,0),(8,0),(9,0),(10,0),(11,0),(12,0),(13,0),(14,0),(15,0),(16,0),(17,0),(18,0),(19,0),(20,0),(21,0),(22,0),(23,0),(24,0),(25,0),(26,0),(27,0),(28,0),(29,0),(30,0),(31,0),(32,0),(33,0),(34,0),(35,0),(36,0),(37,0),(38,0),(39,0),(40,0),(41,0),(42,0),(43,0),(44,0),(45,0),(46,1),(47,1),(48,1),(49,1),(50,1);
/*!40000 ALTER TABLE `poltronas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poltronas_sessoes`
--

DROP TABLE IF EXISTS `poltronas_sessoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poltronas_sessoes` (
  `id_polt_sess` int(11) NOT NULL AUTO_INCREMENT,
  `id_sala_sess_fk` int(11) NOT NULL,
  `id_sala_polt_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_polt_sess`),
  KEY `fk_id_sala_polt_idx` (`id_sala_polt_fk`),
  KEY `fk_id_sala_sessss_idx` (`id_sala_sess_fk`),
  CONSTRAINT `fk_id_sala_polt` FOREIGN KEY (`id_sala_polt_fk`) REFERENCES `salas_poltronas` (`id_sala_polt`),
  CONSTRAINT `fk_id_sala_sessss` FOREIGN KEY (`id_sala_sess_fk`) REFERENCES `salas_sessoes` (`id_sala_sess`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poltronas_sessoes`
--

LOCK TABLES `poltronas_sessoes` WRITE;
/*!40000 ALTER TABLE `poltronas_sessoes` DISABLE KEYS */;
INSERT INTO `poltronas_sessoes` VALUES (1,16,53),(2,16,57),(3,1,25),(4,1,37);
/*!40000 ALTER TABLE `poltronas_sessoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poltronas_vendidas`
--

DROP TABLE IF EXISTS `poltronas_vendidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poltronas_vendidas` (
  `id_polt_vendidas` int(11) NOT NULL AUTO_INCREMENT,
  `id_ingr_fk` int(11) NOT NULL,
  `id_polt_sess_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_polt_vendidas`),
  KEY `fk_poltronas_vendidas_ingressos1_idx` (`id_ingr_fk`),
  KEY `fk_id_polt_sess_idx` (`id_polt_sess_fk`),
  CONSTRAINT `fk_id_polt_sess` FOREIGN KEY (`id_polt_sess_fk`) REFERENCES `poltronas_sessoes` (`id_polt_sess`),
  CONSTRAINT `fk_poltronas_vendidas_ingressos1` FOREIGN KEY (`id_ingr_fk`) REFERENCES `ingressos` (`id_ingr`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poltronas_vendidas`
--

LOCK TABLES `poltronas_vendidas` WRITE;
/*!40000 ALTER TABLE `poltronas_vendidas` DISABLE KEYS */;
INSERT INTO `poltronas_vendidas` VALUES (1,1,1),(2,2,2),(7,5,3),(8,6,4);
/*!40000 ALTER TABLE `poltronas_vendidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salas`
--

DROP TABLE IF EXISTS `salas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salas` (
  `id_sala` int(11) NOT NULL AUTO_INCREMENT,
  `nome_sala` varchar(30) NOT NULL,
  `capacidade_sala` int(11) NOT NULL,
  PRIMARY KEY (`id_sala`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salas`
--

LOCK TABLES `salas` WRITE;
/*!40000 ALTER TABLE `salas` DISABLE KEYS */;
INSERT INTO `salas` VALUES (1,'A1',50),(2,'B2',50),(3,'C3',50),(4,'D4',50),(5,'E5',50);
/*!40000 ALTER TABLE `salas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salas_poltronas`
--

DROP TABLE IF EXISTS `salas_poltronas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salas_poltronas` (
  `id_sala_polt` int(11) NOT NULL AUTO_INCREMENT,
  `id_polt_fk` int(11) NOT NULL,
  `id_sala_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_sala_polt`),
  KEY `fk_salas_has_poltronas_poltronas1_idx` (`id_polt_fk`),
  KEY `fk_id_salaa_idx` (`id_sala_fk`),
  CONSTRAINT `fk_id_salaa` FOREIGN KEY (`id_sala_fk`) REFERENCES `salas` (`id_sala`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_salas_has_poltronas_poltronas1` FOREIGN KEY (`id_polt_fk`) REFERENCES `poltronas` (`id_polt`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salas_poltronas`
--

LOCK TABLES `salas_poltronas` WRITE;
/*!40000 ALTER TABLE `salas_poltronas` DISABLE KEYS */;
INSERT INTO `salas_poltronas` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,1),(8,8,1),(9,9,1),(10,10,1),(11,11,1),(12,12,1),(13,13,1),(14,14,1),(15,15,1),(16,16,1),(17,17,1),(18,18,1),(19,19,1),(20,20,1),(21,21,1),(22,22,1),(23,23,1),(24,24,1),(25,25,1),(26,26,1),(27,27,1),(28,28,1),(29,29,1),(30,30,1),(31,31,1),(32,32,1),(33,33,1),(34,34,1),(35,35,1),(36,36,1),(37,37,1),(38,38,1),(39,39,1),(40,40,1),(41,41,1),(42,42,1),(43,43,1),(44,44,1),(45,45,1),(46,46,1),(47,47,1),(48,48,1),(49,49,1),(50,50,1),(51,1,2),(52,2,2),(53,3,2),(54,4,2),(55,5,2),(56,6,2),(57,7,2),(58,8,2),(59,9,2),(60,10,2),(61,11,2),(62,12,2),(63,13,2),(64,14,2),(65,15,2),(66,16,2),(67,17,2),(68,18,2),(69,19,2),(70,20,2),(71,21,2),(72,22,2),(73,23,2),(74,24,2),(75,25,2),(76,26,2),(77,27,2),(78,28,2),(79,29,2),(80,30,2),(81,31,2),(82,32,2),(83,33,2),(84,34,2),(85,35,2),(86,36,2),(87,37,2),(88,38,2),(89,39,2),(90,40,2),(91,41,2),(92,42,2),(93,43,2),(94,44,2),(95,45,2),(96,46,2),(97,47,2),(98,48,2),(99,49,2),(100,50,2),(101,1,3),(102,2,3),(103,3,3),(104,4,3),(105,5,3),(106,6,3),(107,7,3),(108,8,3),(109,9,3),(110,10,3),(111,11,3),(112,12,3),(113,13,3),(114,14,3),(115,15,3),(116,16,3),(117,17,3),(118,18,3),(119,19,3),(120,20,3),(121,21,3),(122,22,3),(123,23,3),(124,24,3),(125,25,3),(126,26,3),(127,27,3),(128,28,3),(129,29,3),(130,30,3),(131,31,3),(132,32,3),(133,33,3),(134,34,3),(135,35,3),(136,36,3),(137,37,3),(138,38,3),(139,39,3),(140,40,3),(141,41,3),(142,42,3),(143,43,3),(144,44,3),(145,45,3),(146,46,3),(147,47,3),(148,48,3),(149,49,3),(150,50,3),(151,1,4),(152,2,4),(153,3,4),(154,4,4),(155,5,4),(156,6,4),(157,7,4),(158,8,4),(159,9,4),(160,10,4),(161,11,4),(162,12,4),(163,13,4),(164,14,4),(165,15,4),(166,16,4),(167,17,4),(168,18,4),(169,19,4),(170,20,4),(171,21,4),(172,22,4),(173,23,4),(174,24,4),(175,25,4),(176,26,4),(177,27,4),(178,28,4),(179,29,4),(180,30,4),(181,31,4),(182,32,4),(183,33,4),(184,34,4),(185,35,4),(186,36,4),(187,37,4),(188,38,4),(189,39,4),(190,40,4),(191,41,4),(192,42,4),(193,43,4),(194,44,4),(195,45,4),(196,46,4),(197,47,4),(198,48,4),(199,49,4),(200,50,4),(201,1,5),(202,2,5),(203,3,5),(204,4,5),(205,5,5),(206,6,5),(207,7,5),(208,8,5),(209,9,5),(210,10,5),(211,11,5),(212,12,5),(213,13,5),(214,14,5),(215,15,5),(216,16,5),(217,17,5),(218,18,5),(219,19,5),(220,20,5),(221,21,5),(222,22,5),(223,23,5),(224,24,5),(225,25,5),(226,26,5),(227,27,5),(228,28,5),(229,29,5),(230,30,5),(231,31,5),(232,32,5),(233,33,5),(234,34,5),(235,35,5),(236,36,5),(237,37,5),(238,38,5),(239,39,5),(240,40,5),(241,41,5),(242,42,5),(243,43,5),(244,44,5),(245,45,5),(246,46,5),(247,47,5),(248,48,5),(249,49,5),(250,50,5);
/*!40000 ALTER TABLE `salas_poltronas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salas_sessoes`
--

DROP TABLE IF EXISTS `salas_sessoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salas_sessoes` (
  `id_sala_sess` int(11) NOT NULL AUTO_INCREMENT,
  `id_sala_fk` int(11) NOT NULL,
  `id_sess_film_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_sala_sess`),
  KEY `fk_salas_has_sessoes_salas1_idx` (`id_sala_fk`),
  KEY `fk_id_sess_film_idx` (`id_sess_film_fk`),
  CONSTRAINT `fk_id_sess_filmeeeeee` FOREIGN KEY (`id_sess_film_fk`) REFERENCES `sessoes_filmes` (`id_sess_film`),
  CONSTRAINT `fk_salas_has_sessoes_salas1` FOREIGN KEY (`id_sala_fk`) REFERENCES `salas` (`id_sala`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salas_sessoes`
--

LOCK TABLES `salas_sessoes` WRITE;
/*!40000 ALTER TABLE `salas_sessoes` DISABLE KEYS */;
INSERT INTO `salas_sessoes` VALUES (1,1,1),(5,4,2),(9,3,3),(12,4,4),(13,5,5),(16,2,8);
/*!40000 ALTER TABLE `salas_sessoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessoes`
--

DROP TABLE IF EXISTS `sessoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessoes` (
  `id_sess` int(11) NOT NULL AUTO_INCREMENT,
  `hora_sess` time NOT NULL,
  PRIMARY KEY (`id_sess`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessoes`
--

LOCK TABLES `sessoes` WRITE;
/*!40000 ALTER TABLE `sessoes` DISABLE KEYS */;
INSERT INTO `sessoes` VALUES (1,'17:40:00'),(2,'19:30:00'),(3,'20:50:00');
/*!40000 ALTER TABLE `sessoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessoes_filmes`
--

DROP TABLE IF EXISTS `sessoes_filmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessoes_filmes` (
  `id_sess_film` int(11) NOT NULL AUTO_INCREMENT,
  `id_sess_fk` int(11) NOT NULL,
  `id_film_fk` int(11) NOT NULL,
  `data_sess_film` date NOT NULL,
  PRIMARY KEY (`id_sess_film`),
  KEY `fk_sessoes_has_filmes_filmes1_idx` (`id_film_fk`),
  KEY `fk_sessoes_has_filmes_sessoes1_idx` (`id_sess_fk`),
  CONSTRAINT `fk_sessoes_has_filmes_filmes1` FOREIGN KEY (`id_film_fk`) REFERENCES `filmes` (`id_film`),
  CONSTRAINT `fk_sessoes_has_filmes_sessoes1` FOREIGN KEY (`id_sess_fk`) REFERENCES `sessoes` (`id_sess`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessoes_filmes`
--

LOCK TABLES `sessoes_filmes` WRITE;
/*!40000 ALTER TABLE `sessoes_filmes` DISABLE KEYS */;
INSERT INTO `sessoes_filmes` VALUES (1,1,1,'2021-11-29'),(2,2,2,'2021-11-29'),(3,3,3,'2021-11-29'),(4,1,4,'2021-11-30'),(5,2,5,'2021-11-30'),(6,3,6,'2021-11-30'),(7,2,1,'2021-11-30'),(8,2,1,'2021-11-29');
/*!40000 ALTER TABLE `sessoes_filmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tradutores`
--

DROP TABLE IF EXISTS `tradutores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tradutores` (
  `id_trad` int(11) NOT NULL AUTO_INCREMENT,
  `nometradutor_trad` varchar(150) NOT NULL,
  PRIMARY KEY (`id_trad`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tradutores`
--

LOCK TABLES `tradutores` WRITE;
/*!40000 ALTER TABLE `tradutores` DISABLE KEYS */;
INSERT INTO `tradutores` VALUES (1,'Christopher Cavco'),(2,'Coffee Prison'),(3,'Saubhik'),(4,'Nyxsha'),(5,'Duarte'),(6,'Sub Trader'),(7,'Shanice');
/*!40000 ALTER TABLE `tradutores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'popcine'
--

--
-- Dumping routines for database 'popcine'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-30 22:28:58
