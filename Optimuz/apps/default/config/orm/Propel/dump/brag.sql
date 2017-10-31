-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: localhost    Database: acerbrag
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `alternativa`
--

DROP TABLE IF EXISTS `alternativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alternativa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pergunta_id` int(10) unsigned NOT NULL,
  `texto` varchar(500) DEFAULT NULL,
  `posicao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pergunta_alternativa_idx` (`pergunta_id`),
  CONSTRAINT `fk_pergunta_alternativa` FOREIGN KEY (`pergunta_id`) REFERENCES `pergunta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alternativa`
--

LOCK TABLES `alternativa` WRITE;
/*!40000 ALTER TABLE `alternativa` DISABLE KEYS */;
INSERT INTO `alternativa` VALUES (1,2,'Masculino',0),(2,2,'Feminino',1),(3,4,'Masculino',0),(4,4,'Feminino',1),(5,7,'123132123',0),(6,7,'asasdasd',1),(7,7,'31123123',2),(8,7,'12312312312',3),(9,7,'1312312312',4),(10,8,'123123 12312 123123123',0),(11,8,'3123 sasd',1),(12,9,'Tulipa',0),(13,9,'Pringuim',1),(14,11,'1312312',0),(15,11,'321312312312312',1),(16,13,'Masculino',0),(17,13,'Feminino',1),(18,16,'123132123',0),(19,16,'asasdasd',1),(20,16,'31123123',2),(21,16,'12312312312',3),(22,16,'1312312312',4),(23,17,'123123 12312 123123123',0),(24,17,'3123 sasd',1),(25,18,'Tulipa',0),(26,20,'Masculino',0),(27,20,'Feminino',1),(28,23,'123132123',0),(29,23,'asasdasd',1),(30,23,'31123123',2),(31,23,'12312312312',3),(32,23,'1312312312',4),(33,24,'123123 12312 123123123',0),(34,24,'3123 sasd',1),(35,25,'Tulipa',0),(36,27,'Masculino',0),(37,27,'Feminino',1),(38,30,'123132123',0),(39,30,'asasdasd',1),(40,30,'31123123',2),(41,30,'12312312312',3),(42,30,'1312312312',4),(43,31,'123123 12312 123123123',0),(44,31,'3123 sasd',1),(45,32,'Tulipa',0),(46,34,'Masculino',0),(47,34,'Feminino',1),(48,37,'123132123',0),(49,37,'asasdasd',1),(50,37,'31123123',2),(51,37,'12312312312',3),(52,37,'1312312312',4),(53,38,'123123 12312 123123123',0),(54,38,'3123 sasd',1),(55,39,'Tulipa',0),(56,41,'Masculino',0),(57,41,'Feminino',1),(58,44,'123132123',0),(59,44,'asasdasd',1),(60,44,'31123123',2),(61,44,'12312312312',3),(62,44,'1312312312',4),(63,45,'123123 12312 123123123',0),(64,45,'3123 sasd',1),(65,46,'Tulipa',0),(66,48,'Masculino',0),(67,48,'Feminino',1),(68,49,'adasdasda',0),(69,49,'adasdasdasd',1),(70,50,'1232323',0),(71,50,'asdsadasdasdsa',1),(72,52,'Masculino',0),(73,52,'Feminino',1);
/*!40000 ALTER TABLE `alternativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `mensagem` varchar(175) NOT NULL,
  `observacao` text,
  `data` datetime NOT NULL,
  `nivel` int(1) unsigned NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `tipo` int(1) unsigned DEFAULT NULL,
  `registro_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auditoria_usuario_idx` (`usuario_id`),
  CONSTRAINT `FK_auditoria_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` VALUES (1,0,'Usuário fez login','Bruno Cordeiro da Silva','2017-07-31 11:56:25',3,'127.0.0.1',1,NULL),(2,0,'Usuário fez logoff','Bruno Cordeiro da Silva','2017-07-31 12:14:23',3,'127.0.0.1',1,NULL),(3,0,'Usuário fez login','Bruno Cordeiro da Silva','2017-07-31 12:14:56',3,'127.0.0.1',1,NULL),(4,0,'Cadastrado básico atualizado','Um e Meio 12 (1)','2017-08-01 17:09:41',3,'127.0.0.1',1,NULL),(5,0,'Cadastrado básico adicionado','Eae jão (9)','2017-08-01 17:10:23',3,'127.0.0.1',1,NULL),(6,0,'Cadastrado básico removido','Eae jão (9)','2017-08-01 17:12:40',3,'127.0.0.1',1,NULL),(7,0,'Usuário fez logoff','Bruno Cordeiro da Silva','2017-08-01 17:28:58',3,'127.0.0.1',2,NULL),(8,0,'Usuário fez login','Bruno Cordeiro da Silva','2017-08-01 17:29:10',3,'127.0.0.1',2,NULL),(9,0,'Usuário fez logoff','Bruno Cordeiro da Silva','2017-08-01 17:30:26',3,'127.0.0.1',2,NULL),(10,0,'Usuário fez login','Bruno Cordeiro da Silva','2017-08-01 17:30:30',3,'127.0.0.1',2,NULL),(11,0,'Cadastrado básico adicionado','Quarente e oito (7)','2017-08-01 17:34:00',3,'127.0.0.1',1,NULL),(12,0,'Usuário fez login','Bruno Cordeiro da Silva','2017-08-09 11:27:38',3,'127.0.0.1',2,NULL),(13,0,'Usuário fez login','Bruno Cordeiro da Silva','2017-08-14 17:44:43',3,'127.0.0.1',2,NULL),(14,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-08-14 17:54:59',3,'127.0.0.1',2,NULL),(15,1,'O usuário foi cadastrado','Jose Emillio Barbosa (administra12d12r@plugdigital.com.br)','2017-08-14 17:56:46',3,'127.0.0.1',2,2),(16,1,'A imagem do usuário foi alterada',NULL,'2017-08-14 18:17:26',3,'127.0.0.1',2,6),(17,1,'El usuario se ha registrado','New Name Desc (adminis1212trad12r@plugdigital.com.br)','2017-08-14 18:17:29',3,'127.0.0.1',2,6),(18,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-08-21 18:15:52',3,'127.0.0.1',2,NULL),(19,1,'O usuário foi atualizado','<p>Os seguintes campos foram modificados:</p><ul><li> Data Cadastro: de <strong>2017-08-21 18:30:19</strong> para <strong>2017-08-21 18:31:14</strong></li></ul>','2017-08-21 18:31:44',3,'127.0.0.1',2,2),(20,1,'La imagen del usuario ha cambiado',NULL,'2017-08-21 18:32:01',3,'127.0.0.1',2,2),(21,1,'O usuário foi atualizado','<p>Os seguintes campos foram modificados:</p><ul><li> Perfil: de <strong>Apontador</strong> para <strong>Contador</strong></li><li> Departamento: de <strong>Dezessete</strong> para <strong>Vinte</strong></li><li> Nome: de <strong>Jose Emillio Barbosa</strong> para <strong>Jose Emillio Barbosa Silva</strong></li><li> Data Cadastro: de <strong>2017-08-21 18:31:14</strong> para <strong>2017-08-21 18:32:16</strong></li></ul>','2017-08-21 18:32:17',3,'127.0.0.1',2,2),(22,1,'O usuário foi atualizado','<p>Os seguintes campos foram modificados:</p><ul><li> Data Cadastro: de <strong>2017-08-21 18:32:16</strong> para <strong>2017-08-21 18:32:29</strong></li></ul>','2017-08-21 18:32:29',3,'127.0.0.1',2,2),(23,1,'O usuário foi atualizado','<p>Os seguintes campos foram modificados:</p><ul><li> Data Cadastro: de <strong>2017-08-21 18:32:29</strong> para <strong>2017-08-21 18:32:38</strong></li></ul>','2017-08-21 18:32:38',3,'127.0.0.1',2,2),(24,1,'O usuário foi atualizado','<p>Os seguintes campos foram modificados:</p><ul><li> Data Cadastro: de <strong>2017-08-21 18:32:38</strong> para <strong>2017-08-21 18:34:35</strong></li></ul>','2017-08-21 18:34:35',3,'127.0.0.1',2,2),(25,1,'O usuário foi atualizado','<p>Os seguintes campos foram modificados:</p><ul><li> Tipo Acesso: novo valor <strong>B</strong></li><li> Data Cadastro: de <strong>2017-08-21 18:34:35</strong> para <strong>2017-08-21 18:34:40</strong></li></ul>','2017-08-21 18:34:40',3,'127.0.0.1',2,2),(26,1,'O usuário foi atualizado','<p>Os seguintes campos foram modificados:</p><ul><li> Cargo: de <strong>Um e Meio 12</strong> para <strong>Quatro</strong></li><li> Data Cadastro: de <strong>2017-08-21 18:34:40</strong> para <strong>2017-08-21 18:35:48</strong></li></ul>','2017-08-21 18:35:48',3,'127.0.0.1',2,2),(27,1,'O usuário foi atualizado','<p>Os seguintes campos foram modificados:</p><ul><li> Perfil: de <strong>Contador</strong> para <strong>Regular</strong></li><li> Data Cadastro: de <strong>2017-08-21 18:35:48</strong> para <strong>2017-08-21 18:37:41</strong></li></ul>','2017-08-21 18:37:41',3,'127.0.0.1',2,2),(28,1,'O usuário foi atualizado','<p>Os seguintes campos foram modificados:</p><ul><li> Perfil: de <strong>Regular</strong> para <strong>Administrador</strong></li><li> Data Cadastro: de <strong>2017-08-21 18:37:41</strong> para <strong>2017-08-21 18:37:52</strong></li></ul>','2017-08-21 18:37:52',3,'127.0.0.1',2,2),(29,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-08-22 12:53:57',3,'127.0.0.1',2,NULL),(30,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-08 13:11:18',3,'127.0.0.1',2,NULL),(31,1,'Cadastrado básico atualizado','12Sete (7)','2017-09-08 13:31:19',3,'127.0.0.1',1,NULL),(32,1,'O usuário foi atualizado','<p>Os seguintes campos foram modificados:</p><ul><li> Tipo Acesso: novo valor <strong>B</strong></li><li> Data Cadastro: de <strong>2017-08-14 18:17:22</strong> para <strong>2017-09-08 13:31:45</strong></li></ul>','2017-09-08 13:31:45',3,'127.0.0.1',2,6),(33,1,'O usuário foi atualizado','<p>Os seguintes campos foram modificados:</p><ul><li> Cargo: de <strong>Cinco</strong> para <strong>Um e Meio 12</strong></li><li> Data Cadastro: de <strong>2017-09-08 13:31:45</strong> para <strong>2017-09-08 13:31:59</strong></li></ul>','2017-09-08 13:31:59',3,'127.0.0.1',2,6),(34,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-11 10:36:58',3,'127.0.0.1',2,NULL),(35,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-13 10:05:58',3,'127.0.0.1',2,NULL),(36,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-13 13:14:02',3,'127.0.0.1',2,NULL),(37,1,'Usuário fez logoff','Bruno Cordeiro da Silva','2017-09-13 13:14:46',3,'127.0.0.1',2,NULL),(38,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-13 13:14:54',3,'127.0.0.1',2,NULL),(39,1,'Usuário fez logoff','Bruno Cordeiro da Silva','2017-09-13 13:23:04',3,'127.0.0.1',2,NULL),(40,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-13 13:23:13',3,'127.0.0.1',2,NULL),(41,1,'Usuário fez logoff','Bruno Cordeiro da Silva','2017-09-13 13:26:04',3,'127.0.0.1',2,NULL),(42,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-13 13:26:10',3,'127.0.0.1',2,NULL),(43,1,'Usuário fez logoff','Bruno Cordeiro da Silva','2017-09-13 13:26:37',3,'127.0.0.1',2,NULL),(44,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-13 13:26:54',3,'127.0.0.1',2,NULL),(45,1,'Usuário fez logoff','Bruno Cordeiro da Silva','2017-09-13 13:27:08',3,'127.0.0.1',2,NULL),(46,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-13 13:27:16',3,'127.0.0.1',2,NULL),(47,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-13 15:25:50',3,'127.0.0.1',2,NULL),(48,1,'Pesquisa cadastrada',NULL,'2017-09-13 15:50:38',3,'127.0.0.1',3,11),(49,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-18 09:44:34',3,'127.0.0.1',2,NULL),(50,1,'Usuário fez logoff','Bruno Cordeiro da Silva','2017-09-18 09:44:39',3,'127.0.0.1',2,NULL),(51,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-18 09:46:48',3,'127.0.0.1',2,NULL),(52,1,'Usuário fez logoff','Bruno Cordeiro da Silva','2017-09-18 09:48:07',3,'127.0.0.1',2,NULL),(53,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-18 09:48:11',3,'127.0.0.1',2,NULL),(54,1,'Pesquisa cadastrada',NULL,'2017-09-18 09:49:43',3,'127.0.0.1',3,12),(55,1,'Notícia cadastrada','Bruno Cordeiro da Silva (bcordeiro.dev@gmail.com)','2017-09-18 09:50:29',3,'127.0.0.1',5,1),(56,1,'O usuário atualizou seus próprios dados','<p>Os seguintes campos foram modificados:</p><ul><li> Cargo: novo valor <strong>Um e Meio 12</strong></li><li> Departamento: novo valor <strong>qUINZE</strong></li><li> Dni: de <strong>05224434190</strong> para <strong>123456789</strong></li><li> Data Contratacao: novo valor <strong>09/20/17</strong></li><li> Estado Civil: novo valor <strong>S</strong></li><li> Sexo: novo valor <strong>F</strong></li></ul>','2017-09-18 10:11:53',3,'127.0.0.1',2,1),(57,1,'Premio cadastrado','Bruno Cordeiro da Silva (bcordeiro.dev@gmail.com)','2017-09-18 10:30:57',3,'127.0.0.1',6,1),(58,1,'Premio cadastrado','Bruno Cordeiro da Silva (bcordeiro.dev@gmail.com)','2017-09-18 10:31:18',3,'127.0.0.1',6,2),(59,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-18 13:49:02',3,'127.0.0.1',2,NULL),(60,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-19 17:41:28',3,'127.0.0.1',2,NULL),(61,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-25 19:42:55',3,'127.0.0.1',2,NULL),(62,1,'Usuário fez logoff','Bruno Cordeiro da Silva','2017-09-25 19:43:18',3,'127.0.0.1',2,NULL),(63,1,'Usuário fez login','Bruno Cordeiro da Silva','2017-09-25 19:48:13',3,'127.0.0.1',2,NULL);
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao_resposta_forum`
--

DROP TABLE IF EXISTS `avaliacao_resposta_forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao_resposta_forum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned NOT NULL,
  `resposta_forum_id` int(10) unsigned NOT NULL,
  `data_avaliacao` date DEFAULT NULL,
  `nota` enum('1','2','3','4','5') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_avaliacao_resposta_forum_usuario_idx` (`usuario_id`),
  KEY `fk_avaliacao_resposta_forum_resposta_forum_idx` (`resposta_forum_id`),
  CONSTRAINT `fk_avaliacao_resposta_forum_resposta_forum` FOREIGN KEY (`resposta_forum_id`) REFERENCES `resposta_forum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacao_resposta_forum_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao_resposta_forum`
--

LOCK TABLES `avaliacao_resposta_forum` WRITE;
/*!40000 ALTER TABLE `avaliacao_resposta_forum` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao_resposta_forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Um e Meio 12'),(2,'Dois'),(3,'Tres'),(4,'Quatro'),(5,'Cinco'),(6,'Seis'),(7,'12Sete'),(8,'Oito');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo_pesquisa`
--

DROP TABLE IF EXISTS `cargo_pesquisa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo_pesquisa` (
  `cargo_id` int(10) unsigned NOT NULL,
  `pesquisa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cargo_id`,`pesquisa_id`),
  KEY `fk_cargo_pesquisa_pesquisa_idx` (`pesquisa_id`),
  CONSTRAINT `fk_cargo_pesquisa_cargo` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cargo_pesquisa_pesquisa` FOREIGN KEY (`pesquisa_id`) REFERENCES `pesquisa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo_pesquisa`
--

LOCK TABLES `cargo_pesquisa` WRITE;
/*!40000 ALTER TABLE `cargo_pesquisa` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo_pesquisa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `posicao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'123231231232',2),(2,'1231232321',3),(3,'23123123131',4),(4,'123213123123312',2),(5,'12312312213',3),(6,'12312312312',4),(7,'12312312',2),(8,'123123123',3),(9,'123123',2),(10,'213123',3);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coleta_pesquisa`
--

DROP TABLE IF EXISTS `coleta_pesquisa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coleta_pesquisa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned NOT NULL,
  `pesquisa_id` int(10) unsigned NOT NULL,
  `data_criacao` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_coleta_pesquisa_pesquisa_idx` (`pesquisa_id`),
  KEY `fk_coleta_pesquisa_usuario_idx` (`usuario_id`),
  CONSTRAINT `fk_coleta_pesquisa_pesquisa` FOREIGN KEY (`pesquisa_id`) REFERENCES `pesquisa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coleta_pesquisa_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coleta_pesquisa`
--

LOCK TABLES `coleta_pesquisa` WRITE;
/*!40000 ALTER TABLE `coleta_pesquisa` DISABLE KEYS */;
/*!40000 ALTER TABLE `coleta_pesquisa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario_noticia`
--

DROP TABLE IF EXISTS `comentario_noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario_noticia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `noticia_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `data_comentario` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comentario_noticia_noticia_idx` (`noticia_id`),
  KEY `fk_comentario_noticia_usuario_idx` (`usuario_id`),
  CONSTRAINT `fk_comentario_noticia_noticia` FOREIGN KEY (`noticia_id`) REFERENCES `noticia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_noticia_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario_noticia`
--

LOCK TABLES `comentario_noticia` WRITE;
/*!40000 ALTER TABLE `comentario_noticia` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario_noticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'qUINZE'),(2,'Dezessei'),(3,'Dezessete'),(4,'Dezoito'),(5,'Dezenove'),(6,'Vinte'),(7,'Quarente e oito');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento_pesquisa`
--

DROP TABLE IF EXISTS `departamento_pesquisa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento_pesquisa` (
  `departamento_id` int(10) unsigned NOT NULL,
  `pesquisa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`departamento_id`,`pesquisa_id`),
  KEY `fk_departamento_pesquisa_pesquisa_idx` (`pesquisa_id`),
  CONSTRAINT `fk_departamento_pesquisa_departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_departamento_pesquisa_pesquisa` FOREIGN KEY (`pesquisa_id`) REFERENCES `pesquisa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento_pesquisa`
--

LOCK TABLES `departamento_pesquisa` WRITE;
/*!40000 ALTER TABLE `departamento_pesquisa` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamento_pesquisa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cidade` varchar(250) DEFAULT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `complemento` varchar(175) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'Brasilia','Qnm 8 Conjunto H','Ceilandia','72210088','3','Frente a Padoca'),(3,'12312312321','QNP 17 Conjunto C','12312312','7221008','12','12312'),(7,'12312312321','ThuPanga La Kunga','23123','70070710','12','123123123'),(8,'12312312321','QNP 17 Conjunto C','12312312','7221008','12','12312'),(9,'12312312321','QNP 17 Conjunto C','12312312','7221008','12','12312'),(10,'12312312321','QNP 17 Conjunto C','12312312','7221008','12','12312'),(11,'12312312321','QNP 17 Conjunto C','12312312','7221008','12','12312');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `topico` text,
  `data_cricacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum`
--

LOCK TABLES `forum` WRITE;
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticia`
--

DROP TABLE IF EXISTS `noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `tema` varchar(100) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `sub_titulo` text,
  `descricao` text,
  `data_cadastro` datetime DEFAULT NULL,
  `visualizacao` int(11) DEFAULT '0',
  `ativa` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_noticia_usuario_idx` (`usuario_id`),
  CONSTRAINT `fk_noticia_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticia`
--

LOCK TABLES `noticia` WRITE;
/*!40000 ALTER TABLE `noticia` DISABLE KEYS */;
INSERT INTO `noticia` VALUES (1,1,NULL,'12312312','asdasdas','asdsasdas','2017-09-18 09:50:29',0,1);
/*!40000 ALTER TABLE `noticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `nivel` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador','3'),(2,'Regular','2'),(3,'Contador','2'),(4,'Vereador','2'),(5,'Apontador','2'),(12,'Perfil Teste','3'),(13,'Gerenciador RH','3'),(14,'Financeiro','3'),(15,'Hellhow','3'),(16,'Bruno Cordeiro','3'),(17,'jHOW','3'),(18,'Perfile ThuPanga','3'),(19,'Jão','3');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_permissao`
--

DROP TABLE IF EXISTS `perfil_permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_permissao` (
  `perfil_id` int(10) unsigned NOT NULL,
  `permissao_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`perfil_id`,`permissao_id`),
  KEY `fk_perfil_permissao_permissao_idx` (`permissao_id`),
  CONSTRAINT `fk_perfil_permissao_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_permissao_permissao` FOREIGN KEY (`permissao_id`) REFERENCES `permissao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_permissao`
--

LOCK TABLES `perfil_permissao` WRITE;
/*!40000 ALTER TABLE `perfil_permissao` DISABLE KEYS */;
INSERT INTO `perfil_permissao` VALUES (1,1),(2,1),(3,1),(4,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(1,2),(13,2),(16,2),(18,2),(19,2),(1,3),(2,3),(4,3),(5,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(1,4),(2,4),(3,4),(13,4),(14,4),(16,4),(18,4),(19,4),(1,5),(5,5),(12,5),(1,6),(2,6),(3,6),(4,6),(18,6),(19,6),(1,7),(19,7),(1,8),(19,8),(1,9),(1,10),(19,10),(1,11),(19,11),(1,12),(1,13),(1,14);
/*!40000 ALTER TABLE `perfil_permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pergunta`
--

DROP TABLE IF EXISTS `pergunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pergunta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pesquisa_id` int(10) unsigned NOT NULL,
  `categoria_id` int(10) unsigned DEFAULT NULL,
  `texto` varchar(500) DEFAULT NULL,
  `tipo_resposta` int(11) DEFAULT NULL,
  `posicao` int(11) DEFAULT NULL,
  `obrigatoria` tinyint(1) DEFAULT '1',
  `excecao` int(2) DEFAULT '0',
  `gatilho_excecao` int(11) unsigned DEFAULT NULL,
  `pergunta_mae_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pergunta_pesquisa_idx` (`pesquisa_id`),
  KEY `fk_pergunta_categoria_idx` (`categoria_id`),
  CONSTRAINT `fk_pergunta_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pergunta_pesquisa` FOREIGN KEY (`pesquisa_id`) REFERENCES `pesquisa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pergunta`
--

LOCK TABLES `pergunta` WRITE;
/*!40000 ALTER TABLE `pergunta` DISABLE KEYS */;
INSERT INTO `pergunta` VALUES (1,4,1,'Idade',2,1,1,0,NULL,NULL),(2,4,1,'Sexo',4,2,1,0,NULL,NULL),(3,5,1,'Idade',2,1,1,0,NULL,NULL),(4,5,1,'Sexo',4,2,1,0,NULL,NULL),(5,5,4,'asasd asdasdasdasd',1,2,1,0,NULL,NULL),(6,5,4,'Perfunta dois',2,3,1,0,NULL,NULL),(7,5,4,'Pergunta Três',3,4,1,0,NULL,NULL),(8,5,5,'Pergunta Seis ',4,5,1,0,NULL,NULL),(9,5,5,'Bruno Cordeiro',6,6,1,0,NULL,NULL),(10,5,6,'Tem aqui',1,7,1,0,NULL,NULL),(11,5,6,'asdasdasd',5,8,1,0,NULL,NULL),(12,6,1,'Idade',2,1,1,0,NULL,NULL),(13,6,1,'Sexo',4,2,1,0,NULL,NULL),(14,6,4,'asasd asdasdasdasd',1,2,1,0,NULL,NULL),(15,6,4,'Perfunta dois',2,3,1,0,NULL,NULL),(16,6,4,'Pergunta Três',3,4,1,0,NULL,NULL),(17,6,5,'Pergunta Seis ',4,5,1,0,NULL,NULL),(18,6,5,'Bruno Cordeiro',6,6,1,0,NULL,NULL),(19,7,1,'Idade',2,1,1,0,NULL,NULL),(20,7,1,'Sexo',4,2,1,0,NULL,NULL),(21,7,4,'asasd asdasdasdasd',1,2,1,0,NULL,NULL),(22,7,4,'Perfunta dois',2,3,1,0,NULL,NULL),(23,7,4,'Pergunta Três',3,4,1,0,NULL,NULL),(24,7,5,'Pergunta Seis ',4,5,1,0,NULL,NULL),(25,7,5,'Bruno Cordeiro',6,6,1,0,NULL,NULL),(26,8,1,'Idade',2,1,1,0,NULL,NULL),(27,8,1,'Sexo',4,2,1,0,NULL,NULL),(28,8,4,'asasd asdasdasdasd',1,2,1,0,NULL,NULL),(29,8,4,'Perfunta dois',2,3,1,0,NULL,NULL),(30,8,4,'Pergunta Três',3,4,1,0,NULL,NULL),(31,8,5,'Pergunta Seis ',4,5,1,0,NULL,NULL),(32,8,5,'Bruno Cordeiro',6,6,1,0,NULL,NULL),(33,9,1,'Idade',2,1,1,0,NULL,NULL),(34,9,1,'Sexo',4,2,1,0,NULL,NULL),(35,9,4,'asasd asdasdasdasd',1,2,1,0,NULL,NULL),(36,9,4,'Perfunta dois',2,3,1,0,NULL,NULL),(37,9,4,'Pergunta Três',3,4,1,0,NULL,NULL),(38,9,5,'Pergunta Seis ',4,5,1,0,NULL,NULL),(39,9,5,'Bruno Cordeiro',6,6,1,0,NULL,NULL),(40,10,1,'Idade',2,1,1,0,NULL,NULL),(41,10,1,'Sexo',4,2,1,0,NULL,NULL),(42,10,4,'asasd asdasdasdasd',1,2,1,0,NULL,NULL),(43,10,4,'Perfunta dois',2,3,1,0,NULL,NULL),(44,10,4,'Pergunta Três',3,4,1,0,NULL,NULL),(45,10,5,'Pergunta Seis ',4,5,1,0,NULL,NULL),(46,10,5,'Bruno Cordeiro',6,6,1,0,NULL,NULL),(47,11,1,'Idade',2,1,1,0,NULL,NULL),(48,11,1,'Sexo',4,2,1,0,NULL,NULL),(49,11,7,'asdasdasdasd',3,2,1,0,NULL,NULL),(50,11,8,'adsasdasdasdasdasdas',6,3,1,0,NULL,NULL),(51,12,1,'Idade',2,1,1,0,NULL,NULL),(52,12,1,'Sexo',4,2,1,0,NULL,NULL),(53,12,10,'asdasdasd',1,2,1,0,NULL,NULL),(54,12,9,'sadasdasd',1,3,1,0,NULL,NULL);
/*!40000 ALTER TABLE `pergunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissao`
--

DROP TABLE IF EXISTS `permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `slug` varchar(60) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `nivel` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissao`
--

LOCK TABLES `permissao` WRITE;
/*!40000 ALTER TABLE `permissao` DISABLE KEYS */;
INSERT INTO `permissao` VALUES (1,'Logar como','logar-como','permite logar com o usuário de outra pessoa','3'),(2,'Gerenciar permissoes','gerenciar-permissoes','Permite que o usuário altere suas permissões de acesso aos modulos do sistema','2'),(3,'Gerenciar perfis','gerenciar-perfis','Permite o gerenciamentos das filiais atribuidas ao usuário.','2'),(4,'Gerenciar departamentos','gerenciar-departamentos','Permite gerenciar os derpartamentos cadastrados no sistema.','2'),(5,'Gerenciar usuários','gerenciar-usuarios','Permite gerenciar os usuários cadastrados no sistema.','2'),(6,'Gerenciar cargos','gerenciar-cargos','Permite o gerenciamento dos cargos no sistema.','2'),(7,'Cadastrar pesquisa','cadastrar-pesquisa','Permite efetuar o cadastramento de novas pesquisas.','2'),(8,'Editar pesquisa','editar-pesquisa','Permite editar as informações da pesquisa.','2'),(9,'Visualizar coletas','visualizar-coletas','Permite a visualização das coletas efetuadas.','2'),(10,'Visualizar pesquisa','visualizar-pesquisa','Permite visualizar as pesquisas efetuadas.','2'),(11,'Visualizar relatórios','visualizar-relatorios','Permite a visualização dos relatórios gerados.','2'),(12,'Gerenciar noticias','gerenciar-noticias','Permite efetuar o gerenciamento de noticias','2'),(13,'Gerencia premios','gerenciar-premios','Permite efetuar o gerenciamento do cadastro de premios.','2'),(14,'Gerenciar solicitações','gerenciar-solicitacoes','Permite gerenciar as solicitações efetuados pelos usuários','2');
/*!40000 ALTER TABLE `permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesquisa`
--

DROP TABLE IF EXISTS `pesquisa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesquisa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `criador_id` int(10) unsigned NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descricao` text,
  `data_criacao` datetime DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `publicada` tinyint(1) DEFAULT '0',
  `tipo_pesquisa` enum('E','L') DEFAULT NULL COMMENT 'livre, engajamento.',
  `anonima` tinyint(1) DEFAULT NULL,
  `idade_inicial` int(11) DEFAULT NULL,
  `idade_final` int(11) DEFAULT NULL,
  `genero` enum('M','F','T') DEFAULT NULL COMMENT 'masculino, femenino, todos\n',
  `quantidade_pontos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pesquisa_autor_idx` (`criador_id`),
  CONSTRAINT `pesquisa_criador` FOREIGN KEY (`criador_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesquisa`
--

LOCK TABLES `pesquisa` WRITE;
/*!40000 ALTER TABLE `pesquisa` DISABLE KEYS */;
INSERT INTO `pesquisa` VALUES (1,1,'Teste Nova agenda Teste 12','1231231232123123','2017-09-13 15:42:34','2017-09-15','2017-10-07',1,0,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,'Teste Nova agenda Teste 12','1231231232123123','2017-09-13 15:43:23','2017-09-15','2017-10-07',1,0,NULL,NULL,NULL,NULL,NULL,NULL),(3,1,'Teste Nova agenda Teste 12','1231231232123123','2017-09-13 15:43:36','2017-09-15','2017-10-07',1,0,NULL,NULL,NULL,NULL,NULL,NULL),(4,1,'Teste Nova agenda Teste 12','1231231232123123','2017-09-13 15:44:28','2017-09-15','2017-10-07',1,0,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,'Teste Nova agenda Teste 12','1231231232123123','2017-09-13 15:46:27','2017-09-15','2017-10-07',1,0,NULL,NULL,NULL,NULL,NULL,NULL),(6,1,'Teste Nova agenda Teste 12','1231231232123123','2017-09-13 15:48:12','2017-09-15','2017-10-07',1,0,NULL,NULL,NULL,NULL,NULL,NULL),(7,1,'Teste Nova agenda Teste 12','1231231232123123','2017-09-13 15:48:21','2017-09-15','2017-10-07',1,0,NULL,NULL,NULL,NULL,NULL,NULL),(8,1,'Teste Nova agenda Teste 12','1231231232123123','2017-09-13 15:48:27','2017-09-15','2017-10-07',1,0,NULL,NULL,NULL,NULL,NULL,NULL),(9,1,'Teste Nova agenda Teste 12','1231231232123123','2017-09-13 15:48:54','2017-09-15','2017-10-07',1,0,NULL,NULL,NULL,NULL,NULL,NULL),(10,1,'Teste Nova agenda Teste 12','1231231232123123','2017-09-13 15:48:59','2017-09-15','2017-10-07',1,0,NULL,NULL,NULL,NULL,NULL,NULL),(11,1,'Agenda Teste','asasdas','2017-09-13 15:50:37','2017-09-13','2017-09-14',1,0,NULL,NULL,NULL,NULL,NULL,NULL),(12,1,'12312 123','asdsasdsds','2017-09-18 09:49:43','2017-09-21','2017-09-30',1,0,'E',0,1,40,'F',12);
/*!40000 ALTER TABLE `pesquisa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesquisa_habilitada`
--

DROP TABLE IF EXISTS `pesquisa_habilitada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesquisa_habilitada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pesquisa_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `respondida` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_pesquisa_habilitada_pesquisa_idx` (`pesquisa_id`),
  KEY `fk_pesquisa_habilitada_usuario_idx` (`usuario_id`),
  CONSTRAINT `fk_pesquisa_habilitada_pesquisa` FOREIGN KEY (`pesquisa_id`) REFERENCES `pesquisa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pesquisa_habilitada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesquisa_habilitada`
--

LOCK TABLES `pesquisa_habilitada` WRITE;
/*!40000 ALTER TABLE `pesquisa_habilitada` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesquisa_habilitada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `premio`
--

DROP TABLE IF EXISTS `premio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `premio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` int(11) NOT NULL DEFAULT '0',
  `quantidade` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `descricao` text,
  PRIMARY KEY (`id`),
  KEY `fk_premio_usuario_idx` (`usuario_id`),
  CONSTRAINT `fk_premio_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `premio`
--

LOCK TABLES `premio` WRITE;
/*!40000 ALTER TABLE `premio` DISABLE KEYS */;
INSERT INTO `premio` VALUES (1,1,'Teste Primeiro Video',12,12231,'2017-09-18 10:30:57',1,'ASDASDASDAS'),(2,1,'Teste Nova agenda Teste',1231,12321,'2017-09-18 10:31:17',1,'12312ad asdasd');
/*!40000 ALTER TABLE `premio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resposta`
--

DROP TABLE IF EXISTS `resposta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resposta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coleta_pesquisa_id` int(10) unsigned NOT NULL,
  `pergunta_id` int(10) unsigned NOT NULL,
  `alternativa_id` int(10) unsigned DEFAULT NULL,
  `texto` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_resposta_alternativa_idx` (`alternativa_id`),
  KEY `fk_resposta_coleta_pesquisa_idx` (`coleta_pesquisa_id`),
  KEY `fk_resposta_pergunta_idx` (`pergunta_id`),
  CONSTRAINT `fk_resposta_formulario` FOREIGN KEY (`coleta_pesquisa_id`) REFERENCES `coleta_pesquisa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_resposta_opcao_escolhida` FOREIGN KEY (`alternativa_id`) REFERENCES `alternativa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_resposta_pergunta` FOREIGN KEY (`pergunta_id`) REFERENCES `pergunta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resposta`
--

LOCK TABLES `resposta` WRITE;
/*!40000 ALTER TABLE `resposta` DISABLE KEYS */;
/*!40000 ALTER TABLE `resposta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resposta_forum`
--

DROP TABLE IF EXISTS `resposta_forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resposta_forum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forum_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `data_resposta` datetime DEFAULT NULL,
  `descricao` varchar(355) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_resposta_forum_usuario_idx` (`usuario_id`),
  KEY `fk_resposta_forum_forum_idx` (`forum_id`),
  CONSTRAINT `fk_resposta_forum_forum` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_resposta_forum_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resposta_forum`
--

LOCK TABLES `resposta_forum` WRITE;
/*!40000 ALTER TABLE `resposta_forum` DISABLE KEYS */;
/*!40000 ALTER TABLE `resposta_forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitacao_resgate`
--

DROP TABLE IF EXISTS `solicitacao_resgate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitacao_resgate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `solicitante_id` int(10) unsigned NOT NULL,
  `aprovador_id` int(10) unsigned DEFAULT NULL,
  `premio_id` int(10) unsigned NOT NULL,
  `data_solicitacao` varchar(45) NOT NULL,
  `status` enum('A','P','R') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_solicitacao_resgate_usuario_idx` (`solicitante_id`),
  KEY `fk_solicitacao_resgate_premio_idx` (`premio_id`),
  KEY `fk_solicitacao_resgate_aprovador_idx` (`aprovador_id`),
  CONSTRAINT `fk_solicitacao_resgate_aprovador` FOREIGN KEY (`aprovador_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitacao_resgate_premio` FOREIGN KEY (`premio_id`) REFERENCES `premio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitacao_resgate_solicitante` FOREIGN KEY (`solicitante_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitacao_resgate`
--

LOCK TABLES `solicitacao_resgate` WRITE;
/*!40000 ALTER TABLE `solicitacao_resgate` DISABLE KEYS */;
INSERT INTO `solicitacao_resgate` VALUES (1,2,NULL,1,'2017-09-08 13:31:59',''),(2,6,NULL,2,'2017-09-08 13:31:59',''),(3,2,NULL,1,'2017-09-08 13:31:59',''),(4,6,NULL,2,'2017-09-08 13:31:59','');
/*!40000 ALTER TABLE `solicitacao_resgate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil_id` int(10) unsigned NOT NULL,
  `endereco_id` int(10) unsigned DEFAULT NULL,
  `cargo_id` int(10) unsigned DEFAULT NULL,
  `departamento_id` int(10) unsigned DEFAULT NULL,
  `matricula` varchar(55) DEFAULT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dni` varchar(11) DEFAULT NULL COMMENT 'cpf da argentina\n',
  `data_nascimento` date DEFAULT NULL,
  `data_contratacao` date DEFAULT NULL,
  `celular` varchar(11) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `token` char(64) DEFAULT NULL,
  `nome_usuario` varchar(255) DEFAULT NULL,
  `senha` char(128) DEFAULT NULL,
  `token_senha` char(64) DEFAULT NULL,
  `token_firebase` varchar(255) DEFAULT NULL,
  `data_rescisao` date DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `tipo_acesso` enum('M','B') DEFAULT 'M' COMMENT 'mobile, backend\n',
  `estado_civil` enum('C','S','V','D','O') DEFAULT 'O' COMMENT 'casado, solteiro, viuvo, divorciado, outro.\n',
  `nivel_acesso` char(1) DEFAULT '1',
  `usuario_validado` tinyint(1) DEFAULT '0',
  `sexo` enum('M','F') DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `usuario_UNIQUE` (`nome_usuario`),
  UNIQUE KEY `token_UNIQUE` (`token`),
  UNIQUE KEY `token_senha_UNIQUE` (`token_senha`),
  KEY `FK_usuario_perfil_idx` (`perfil_id`),
  KEY `fk_usuario_endereco_idx` (`endereco_id`),
  KEY `fk_usuario_idx` (`departamento_id`),
  KEY `fk_usuario_cargo_idx` (`cargo_id`),
  CONSTRAINT `fk_usuario_cargo` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_endereco` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_usuario_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,1,1,1,NULL,'Bruno Cordeiro da Silva','bcordeiro.dev@gmail.com','123456789','1995-09-27','2017-09-20','61986347089','',NULL,'bruno.cordeiro','daa42c402cf8bc1afb2d3b5e9bbdd89722676fdd693c78078d34d96d5dfe56901d04dcfd8197b9f5210e5b56b23192331b6d451b20ec481905435794e18c10ee',NULL,'',NULL,1,'M','S','3',0,'F',NULL),(2,1,11,4,6,'1312312312312','Jose Emillio Barbosa Silva','administra12d12r@plugdigital.com.br','21312123','2017-08-15','2017-08-23','45645645645','12213121233',NULL,'','',NULL,NULL,'2017-08-02',1,'B','S','2',0,'M','2017-08-21 18:37:52'),(6,1,7,1,4,'1312312312312','New Name Desc','adminis1212trad12r@plugdigital.com.br','123123113','2017-08-26','2017-08-24','32314223341','12213121233',NULL,NULL,'',NULL,NULL,'2017-08-31',1,'B','S','2',0,'M','2017-09-08 13:31:59');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valor_ponto_avaliacao_forum`
--

DROP TABLE IF EXISTS `valor_ponto_avaliacao_forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valor_ponto_avaliacao_forum` (
  `id` int(11) NOT NULL,
  `nota` varchar(45) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valor_ponto_avaliacao_forum`
--

LOCK TABLES `valor_ponto_avaliacao_forum` WRITE;
/*!40000 ALTER TABLE `valor_ponto_avaliacao_forum` DISABLE KEYS */;
/*!40000 ALTER TABLE `valor_ponto_avaliacao_forum` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-26 10:01:30
