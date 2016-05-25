-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: portal
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
-- Table structure for table `permissao`
--

DROP TABLE IF EXISTS `permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissao` (
  `idpermissao` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) DEFAULT NULL,
  `tabela` varchar(50) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `inserir` int(11) DEFAULT NULL,
  `alterar` int(11) DEFAULT NULL,
  `apagar` int(11) DEFAULT NULL,
  `visualizar` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpermissao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissao`
--

LOCK TABLES `permissao` WRITE;
/*!40000 ALTER TABLE `permissao` DISABLE KEYS */;
INSERT INTO `permissao` VALUES (1,1,'user','Cadastro de UsuÃ¡rios',1,1,1,1),(2,1,'unidade','Cadastro de Unidades',1,1,1,1),(3,83,'user','Cadastro de UsuÃ¡rios',1,1,1,1),(4,83,'unidade','Cadastro de Unidades',1,1,1,1);
/*!40000 ALTER TABLE `permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teste`
--

DROP TABLE IF EXISTS `teste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teste` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `observacao` text,
  `concorda` bit(1) DEFAULT b'0',
  `sexo` varchar(1) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `arquivo` blob,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teste`
--

LOCK TABLES `teste` WRITE;
/*!40000 ALTER TABLE `teste` DISABLE KEYS */;
INSERT INTO `teste` VALUES (1,'Teste 12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Teste 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Teste 4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'hiiman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'hiiman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'hiiman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'viu so',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'viu so','ha ha ah a','','M','S',NULL,NULL,NULL,NULL),(26,'Teste 123','obs 123','','M','S',87,'0000-00-00 00:00:00','17:19:51',NULL),(27,'666d5d6d','ad56f65a65d','','F','S',87,'2016-05-25 03:00:00','10:20:19',NULL),(28,'ddd','ddd','','F','',0,'2016-05-25 03:00:00','11:26:18',NULL),(29,'dd','fadfad','','F','',0,'2016-05-25 03:00:00','11:27:40',NULL),(30,'ddd ddd','fadfa','','F','',0,'2016-05-25 03:00:00','11:31:08',NULL),(31,'dddddd','d','','M','',0,'2016-05-25 03:00:00','11:40:39',NULL),(32,'dfadf','ddadfa','','M','S',0,'1970-01-01 02:00:00','00:00:00',NULL),(33,'dfadfjjajjdii','fadkfoao','','M','V',0,'2016-05-25 03:00:00','11:40:40',NULL);
/*!40000 ALTER TABLE `teste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidade`
--

DROP TABLE IF EXISTS `unidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidade` (
  `idunidade` int(11) NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `cei` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `image` blob,
  `fone` varchar(15) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idunidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidade`
--

LOCK TABLES `unidade` WRITE;
/*!40000 ALTER TABLE `unidade` DISABLE KEYS */;
INSERT INTO `unidade` VALUES (1,'Unidade Teste 1','12.222.554/0001-55',NULL,'unidade@unidade.com.br','ÿ\Øÿ\à\0JFIF\0\0`\0`\0\0ÿ\á\0\"Exif\0\0MM\0*\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿ\ì\0Ducky\0\0\0\0\0<\0\0ÿ\Û\0C\0		\n\n\r\n\n	\rÿ\Û\0CÿÀ\0\0@\0@\"\0ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0	\nÿ\Ä\0µ\0\0\0}\0!1AQa\"q2‘¡#B±ÁR\Ñğ$3br‚	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹º\Â\Ã\Ä\Å\Æ\Ç\È\É\Ê\Ò\Ó\Ô\Õ\Ö\×\Ø\Ù\Ú\á\â\ã\ä\å\æ\ç\è\é\êñòóôõö÷øùúÿ\Ä\0\0\0\0\0\0\0\0	\nÿ\Ä\0µ\0\0w\0!1AQaq\"2B‘¡±Á	#3Rğbr\Ñ\n$4\á%ñ\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹º\Â\Ã\Ä\Å\Æ\Ç\È\É\Ê\Ò\Ó\Ô\Õ\Ö\×\Ø\Ù\Ú\â\ã\ä\å\æ\ç\è\é\êòóôõö÷øùúÿ\Ú\0\0\0?\0ıü¢Š(\Ç\ßt_…\Ş¹\ÖõıB\r7Mµ(,™%\İ\Ü$q\"(-$²HÊ‰\Zò;ªª³0\Ìÿ\0\ásüPø›¦\Éw\àO†öZN›!\Ûm\ã\İRm\Z\â\é·\éğ\Û\Ï:\ÆAÇ—vm\'V\Èh—8şñk|Nø­ü™u­*\×\\x+M,\ÑC\Å,±j\ÚÁ\Ê\íó\n\ÃuL\à³\Ú&@5	¼“ö¦ÿ\0‚\ÕøWöjñ‡ô[¯k\Z]Î±,\Ö\Ò\Ë\ãÉŸÀ–‚hğ\Z;[½J´½\Ú\Å|Ç‚c¬±2\É c´\Úo.¿h‡O¬]7\Ã_Š\Zb¾\æğş‡¤\\øgV†–couuumw8Pb•l£vm\Í< m>¥ğ\ç\â>‹ñgÁöº÷‡\ï–ÿ\0L»ibWò\Ş!–) –)\É\ÑM‘IŠ²E$nª\ê\Ê>‹ö¸ı¢<c\áÿ\0^I\â\rs\Ã:\æ—k©û?¯‰4½R¯6XÎ–ş³½+¶8™\ï¦HW…%¤ó ô¯\ØGö›×¾,üu»ñ%\ç„\íü=\àÿ\0‰\ÖIhuGÕ´\ÏøœøŸO„	;\Í@Bói\êQ\Ö{\Ï:5\ÑZ!’@\Ù\ÔQE\0\Æş\Ñ~?ºøQû>x\ï\Å6*{\á¯j\Z­¸uÜ¦H-¤•r;Œ¨\â»*\ç>0ø>+|$ñO…\ä‘bÄšEŞ”\Îz ˆŸ\Ãu\0s\Ñ|ºğÀM\á\ç|S\'„$ğŞ“g¥Y\ê)g\rıÕ¥´¢+Ùqò€\Ü\êÀ€\à\á—\åÿ\0\Û\á\Ä\Ë\ÚSÀºdŸ\n|I üF†\n\İ\ë>8{‹8m¢–C\Ø\Äö\ï{ss$³J\ßdtC$v`[\Ûv¹“è¯ƒºÌ—^Š³Cqwm\â¿\é:¤¶V–ms¨´±A<\Ò,aAw“F;D‚VU3³rş\é!ñ–­¨\êk\ÑüMøgı§\ßX\ŞOi6.–\ÜG/o¯›\åı¬”‘n¥¸H\ÜI\Ù\âŒöƒğNƒñ\ÄV?oµO\è·\ŞĞ§–ÿ\0\Æ:Î’~\É$1Emq\éqq\Ó\î®b¾Š\Êô®±¶2H‹Î’s¿\r¿g?~\È_ü¬xû\ÆüNñ¯\Ä\í>ÿ\0V\Õ\â±\Zl7\Ï\nø^\ŞXmP˜­Z\Ü\ÛH\ĞDJ\ÑÊ«\ÛÎŸ…¿h¿\ÚX‡M\Ót5Õ¼Ağµ\Ş_Ka\â\í\Z\ê\ãYxôû\ÛY!±\Ê\ìÈ²¼\×\r³\í±\Ø.¬B²\ì[:Á/\n|ı‰´M\áü–M\àñw‡|E\á‹kKU¶†n5\İ:ü¢\"EYn\äUH\Ò8\ã[…Š8\Ñ#E\0RQE\0QEğ}\çü\ËVø!ûjx\Ëöbğ\Âü`ñ×…\ã—\Æb3Z\Òô¨m4+\Ém¥Á’öx\Í\r\ÍûB°(P H1%‚ô_?n_ƒ>?ûg„~;k^,ıš\ï5UÑ®tOOi\áô\×,e’\Ì]=Z9f²¼µ\â\Æñ®#K¦lD\â\'_Nıºşø3\Äş\ÓõKè·Ÿµ\ë\Ë?xk\Äq[u\İ	\î\æ1µÕ­\ìe.b\ËuvR)¢,°Ê¡Ô¾k\â_ø)oü‹ş_ƒş.·’;}c\á±ñ\\~\'ÿ\0„n\Ï_¸±\Ö5»ƒe£\Ùù{\Å*]kw\×V÷*\×7)<†9’vKwq)\0öÙ‡ö•ı?nŸø_Bøwy­\\\\X\Şÿ\0j|<½½ğÎ£§\éö’i/	º‹\Ã×—¶\Â8cH„1Oej\êŸg,¢)nk\Å_ğ]/Ù\âg\ÄËŸ„>\Ôõ\è¼7ğóÅº4Z÷-t\áğ\Ò\Ú\êQ\ËKzŸ»‚\Õ\îí¢³I\Ü%¸3«¬–¯–¼û	|oÿ\0‚~ŞšNƒ7ƒeı‘ÿ\0f\ß\Ù~\Şû\ÃğŞ‘¬¥¯‰a\Z<Ëˆ\ßOŸr\İ\Ïoq¦Gy-Pî‰…\éûb\Í\Îj¿ğo\'\í%ğŸöeñ—\ì£ğ\ÛNøK\Ã?‰\Ş,¶\ÖüIñb\çQ‘5KJ´—Í´°»±1³¬È‰\"‹v1\Ü7\'›+P\ï=›\à\ï\rE\à¿\éz<\\\\C¤\Ù\Ãg³¾ùeX\Ğ g=Ø’{šÒ ¹_Œÿ\0¼+û<x\nOx\ÓY·\Ğ<?\rå„—³«´i5\İ\ÌV¶\êv‚Fù\æ‰3Œ\r\Ù$\0H\ê«\ç?ø*\ï\ìk®~\ßß°ÏŠ>øwT\Ót]S\ÄZ†p·—\ï*Cvš­¥\ä¼Æ¬û\Ìv\î\ï\ÉQ’\08Ác¿d^xwU¸ø½ \ßK\áù \×ôÖ¶¶¾”\Æ\×I>Ÿ\íX‘t\ÈP‚S\íV\ÌÁ|\èŸ\à¬?²?-4½S\\ø­¤\Ş\é¾¾\Z\Üq­­û\Úˆ\Ì\Å,¨‘/”Ú¥‹Æ¯¹Dó@\ê<è‘£ùö<ÿ\0ƒv~&~\Ëa\Õ\Æ~¾\Ñ\ìg\Ğgµ‚¼I”Yø«\Ã\Z\Â\ÄW\Ç\ÃH##\ï\ÍvQ„išşu\à¿ø6#\ã…<y \É\ão‡\×z¹)w4z\î³o$h\ÓøV\á\Ê\ìˆ\Ë\è7*±»‹Ï·’=¯y`¢~ ÿ\0‚Œ~Ë¿>6k ½ø­¤\Ã\â/xC@\Ö%Š	.¯m\ï4§¹x´\ë˜(\İ\ZIŸSŒ24r[»(M®zoÿ\0ÁXÿ\0g_øûRğ¾¥ñ[Ã¶ºö\â\ËO\ŞÚºÏ›}^\ë\ÎòmÙ„{v–·\Zlù1\É±»«£(øGVÿ\0ƒx~%x«\ã\Ï\Â_j~6ğlz\'‚|#\à#XJ½¿\Òï¦½\Òn¼>5g%´qµ¼F\ÛEw·š\'ŠU–t]„\ÕŒ¿ğo_\Æ‰_´g‹<Eo\ã\ï\0E\á}o\âÅ¿Œ¬ ¯\rÕ¶—6¥«j7ä¨‡hºW\Ô!Š(C˜¤<$,\å\é\ß\ì\ÃûWü;ı³~C\ão…ş*\Ó|aá‰®\Ğ^Ù‡P“ RÑºHª\è\ÛY •ta•`O¡\×\ÈğEø\'\çŒ?\à›Ÿ±ÔñÎµ\á½o\Ä:°¾’]	§{8£O±°‰CÌˆ\ì\Å,•Ø”P…FB\äıy@ÿ\Ù','(18) 3608-8555','16074-260','SP','AraÃƒÂ§atuba','Amizade','Rua AntÃƒÂ´nio Corbucci','84');
/*!40000 ALTER TABLE `unidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `dtcriacao` timestamp NULL DEFAULT NULL,
  `tdultacesso` timestamp NULL DEFAULT NULL,
  `ativo` binary(1) DEFAULT '1',
  `image` blob,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Administrador','maurorvitor@gmail.com','adm','e10adc3949ba59abbe56e057f20f883e','2016-01-07 15:02:50','2016-05-02 22:39:21','1','ÿ\Øÿ\à\0JFIF\0\0`\0`\0\0ÿ\á\0\"Exif\0\0MM\0*\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿ\ì\0Ducky\0\0\0\0\0<\0\0ÿ\Û\0C\0		\n\n\r\n\n	\rÿ\Û\0CÿÀ\0\0@\0@\"\0ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0	\nÿ\Ä\0µ\0\0\0}\0!1AQa\"q2‘¡#B±ÁR\Ñğ$3br‚	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹º\Â\Ã\Ä\Å\Æ\Ç\È\É\Ê\Ò\Ó\Ô\Õ\Ö\×\Ø\Ù\Ú\á\â\ã\ä\å\æ\ç\è\é\êñòóôõö÷øùúÿ\Ä\0\0\0\0\0\0\0\0	\nÿ\Ä\0µ\0\0w\0!1AQaq\"2B‘¡±Á	#3Rğbr\Ñ\n$4\á%ñ\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹º\Â\Ã\Ä\Å\Æ\Ç\È\É\Ê\Ò\Ó\Ô\Õ\Ö\×\Ø\Ù\Ú\â\ã\ä\å\æ\ç\è\é\êòóôõö÷øùúÿ\Ú\0\0\0?\0ıü¢Š(\Ç\ßt_…\Ş¹\ÖõıB\r7Mµ(,™%\İ\Ü$q\"(-$²HÊ‰\Zò;ªª³0\Ìÿ\0\ásüPø›¦\Éw\àO†öZN›!\Ûm\ã\İRm\Z\â\é·\éğ\Û\Ï:\ÆAÇ—vm\'V\Èh—8şñk|Nø­ü™u­*\×\\x+M,\ÑC\Å,±j\ÚÁ\Ê\íó\n\ÃuL\à³\Ú&@5	¼“ö¦ÿ\0‚\ÕøWöjñ‡ô[¯k\Z]Î±,\Ö\Ò\Ë\ãÉŸÀ–‚hğ\Z;[½J´½\Ú\Å|Ç‚c¬±2\É c´\Úo.¿h‡O¬]7\Ã_Š\Zb¾\æğş‡¤\\øgV†–couuumw8Pb•l£vm\Í< m>¥ğ\ç\â>‹ñgÁöº÷‡\ï–ÿ\0L»ibWò\Ş!–) –)\É\ÑM‘IŠ²E$nª\ê\Ê>‹ö¸ı¢<c\áÿ\0^I\â\rs\Ã:\æ—k©û?¯‰4½R¯6XÎ–ş³½+¶8™\ï¦HW…%¤ó ô¯\ØGö›×¾,üu»ñ%\ç„\íü=\àÿ\0‰\ÖIhuGÕ´\ÏøœøŸO„	;\Í@Bói\êQ\Ö{\Ï:5\ÑZ!’@\Ù\ÔQE\0\Æş\Ñ~?ºøQû>x\ï\Å6*{\á¯j\Z­¸uÜ¦H-¤•r;Œ¨\â»*\ç>0ø>+|$ñO…\ä‘bÄšEŞ”\Îz ˆŸ\Ãu\0s\Ñ|ºğÀM\á\ç|S\'„$ğŞ“g¥Y\ê)g\rıÕ¥´¢+Ùqò€\Ü\êÀ€\à\á—\åÿ\0\Û\á\Ä\Ë\ÚSÀºdŸ\n|I üF†\n\İ\ë>8{‹8m¢–C\Ø\Äö\ï{ss$³J\ßdtC$v`[\Ûv¹“è¯ƒºÌ—^Š³Cqwm\â¿\é:¤¶V–ms¨´±A<\Ò,aAw“F;D‚VU3³rş\é!ñ–­¨\êk\ÑüMøgı§\ßX\ŞOi6.–\ÜG/o¯›\åı¬”‘n¥¸H\ÜI\Ù\âŒöƒğNƒñ\ÄV?oµO\è·\ŞĞ§–ÿ\0\Æ:Î’~\É$1Emq\éqq\Ó\î®b¾Š\Êô®±¶2H‹Î’s¿\r¿g?~\È_ü¬xû\ÆüNñ¯\Ä\í>ÿ\0V\Õ\â±\Zl7\Ï\nø^\ŞXmP˜­Z\Ü\ÛH\ĞDJ\ÑÊ«\ÛÎŸ…¿h¿\ÚX‡M\Ót5Õ¼Ağµ\Ş_Ka\â\í\Z\ê\ãYxôû\ÛY!±\Ê\ìÈ²¼\×\r³\í±\Ø.¬B²\ì[:Á/\n|ı‰´M\áü–M\àñw‡|E\á‹kKU¶†n5\İ:ü¢\"EYn\äUH\Ò8\ã[…Š8\Ñ#E\0RQE\0QEğ}\çü\ËVø!ûjx\Ëöbğ\Âü`ñ×…\ã—\Æb3Z\Òô¨m4+\Ém¥Á’öx\Í\r\ÍûB°(P H1%‚ô_?n_ƒ>?ûg„~;k^,ıš\ï5UÑ®tOOi\áô\×,e’\Ì]=Z9f²¼µ\â\Æñ®#K¦lD\â\'_Nıºşø3\Äş\ÓõKè·Ÿµ\ë\Ë?xk\Äq[u\İ	\î\æ1µÕ­\ìe.b\ËuvR)¢,°Ê¡Ô¾k\â_ø)oü‹ş_ƒş.·’;}c\á±ñ\\~\'ÿ\0„n\Ï_¸±\Ö5»ƒe£\Ùù{\Å*]kw\×V÷*\×7)<†9’vKwq)\0öÙ‡ö•ı?nŸø_Bøwy­\\\\X\Şÿ\0j|<½½ğÎ£§\éö’i/	º‹\Ã×—¶\Â8cH„1Oej\êŸg,¢)nk\Å_ğ]/Ù\âg\ÄËŸ„>\Ôõ\è¼7ğóÅº4Z÷-t\áğ\Ò\Ú\êQ\ËKzŸ»‚\Õ\îí¢³I\Ü%¸3«¬–¯–¼û	|oÿ\0‚~ŞšNƒ7ƒeı‘ÿ\0f\ß\Ù~\Şû\ÃğŞ‘¬¥¯‰a\Z<Ëˆ\ßOŸr\İ\Ïoq¦Gy-Pî‰…\éûb\Í\Îj¿ğo\'\í%ğŸöeñ—\ì£ğ\ÛNøK\Ã?‰\Ş,¶\ÖüIñb\çQ‘5KJ´—Í´°»±1³¬È‰\"‹v1\Ü7\'›+P\ï=›\à\ï\rE\à¿\éz<\\\\C¤\Ù\Ãg³¾ùeX\Ğ g=Ø’{šÒ ¹_Œÿ\0¼+û<x\nOx\ÓY·\Ğ<?\rå„—³«´i5\İ\ÌV¶\êv‚Fù\æ‰3Œ\r\Ù$\0H\ê«\ç?ø*\ï\ìk®~\ßß°ÏŠ>øwT\Ót]S\ÄZ†p·—\ï*Cvš­¥\ä¼Æ¬û\Ìv\î\ï\ÉQ’\08Ác¿d^xwU¸ø½ \ßK\áù \×ôÖ¶¶¾”\Æ\×I>Ÿ\íX‘t\ÈP‚S\íV\ÌÁ|\èŸ\à¬?²?-4½S\\ø­¤\Ş\é¾¾\Z\Üq­­û\Úˆ\Ì\Å,¨‘/”Ú¥‹Æ¯¹Dó@\ê<è‘£ùö<ÿ\0ƒv~&~\Ëa\Õ\Æ~¾\Ñ\ìg\Ğgµ‚¼I”Yø«\Ã\Z\Â\ÄW\Ç\ÃH##\ï\ÍvQ„išşu\à¿ø6#\ã…<y \É\ão‡\×z¹)w4z\î³o$h\ÓøV\á\Ê\ìˆ\Ë\è7*±»‹Ï·’=¯y`¢~ ÿ\0‚Œ~Ë¿>6k ½ø­¤\Ã\â/xC@\Ö%Š	.¯m\ï4§¹x´\ë˜(\İ\ZIŸSŒ24r[»(M®zoÿ\0ÁXÿ\0g_øûRğ¾¥ñ[Ã¶ºö\â\ËO\ŞÚºÏ›}^\ë\ÎòmÙ„{v–·\Zlù1\É±»«£(øGVÿ\0ƒx~%x«\ã\Ï\Â_j~6ğlz\'‚|#\à#XJ½¿\Òï¦½\Òn¼>5g%´qµ¼F\ÛEw·š\'ŠU–t]„\ÕŒ¿ğo_\Æ‰_´g‹<Eo\ã\ï\0E\á}o\âÅ¿Œ¬ ¯\rÕ¶—6¥«j7ä¨‡hºW\Ô!Š(C˜¤<$,\å\é\ß\ì\ÃûWü;ı³~C\ão…ş*\Ó|aá‰®\Ğ^Ù‡P“ RÑºHª\è\ÛY •ta•`O¡\×\ÈğEø\'\çŒ?\à›Ÿ±ÔñÎµ\á½o\Ä:°¾’]	§{8£O±°‰CÌˆ\ì\Å,•Ø”P…FB\äıy@ÿ\Ù'),(81,'MAURO ROGERIO VITO','maurorvitor@gmail.com','mauro','e10adc3949ba59abbe56e057f20f883e','2016-01-12 15:39:02',NULL,'1','ÿ\Øÿ\à\0JFIF\0\0`\0`\0\0ÿ\á\0\"Exif\0\0MM\0*\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿ\ì\0Ducky\0\0\0\0\0<\0\0ÿ\Û\0C\0		\n\n\r\n\n	\rÿ\Û\0CÿÀ\0\0@\0@\"\0ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0	\nÿ\Ä\0µ\0\0\0}\0!1AQa\"q2‘¡#B±ÁR\Ñğ$3br‚	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹º\Â\Ã\Ä\Å\Æ\Ç\È\É\Ê\Ò\Ó\Ô\Õ\Ö\×\Ø\Ù\Ú\á\â\ã\ä\å\æ\ç\è\é\êñòóôõö÷øùúÿ\Ä\0\0\0\0\0\0\0\0	\nÿ\Ä\0µ\0\0w\0!1AQaq\"2B‘¡±Á	#3Rğbr\Ñ\n$4\á%ñ\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹º\Â\Ã\Ä\Å\Æ\Ç\È\É\Ê\Ò\Ó\Ô\Õ\Ö\×\Ø\Ù\Ú\â\ã\ä\å\æ\ç\è\é\êòóôõö÷øùúÿ\Ú\0\0\0?\0ıü¢Š(\Ç\ßt_…\Ş¹\ÖõıB\r7Mµ(,™%\İ\Ü$q\"(-$²HÊ‰\Zò;ªª³0\Ìÿ\0\ásüPø›¦\Éw\àO†öZN›!\Ûm\ã\İRm\Z\â\é·\éğ\Û\Ï:\ÆAÇ—vm\'V\Èh—8şñk|Nø­ü™u­*\×\\x+M,\ÑC\Å,±j\ÚÁ\Ê\íó\n\ÃuL\à³\Ú&@5	¼“ö¦ÿ\0‚\ÕøWöjñ‡ô[¯k\Z]Î±,\Ö\Ò\Ë\ãÉŸÀ–‚hğ\Z;[½J´½\Ú\Å|Ç‚c¬±2\É c´\Úo.¿h‡O¬]7\Ã_Š\Zb¾\æğş‡¤\\øgV†–couuumw8Pb•l£vm\Í< m>¥ğ\ç\â>‹ñgÁöº÷‡\ï–ÿ\0L»ibWò\Ş!–) –)\É\ÑM‘IŠ²E$nª\ê\Ê>‹ö¸ı¢<c\áÿ\0^I\â\rs\Ã:\æ—k©û?¯‰4½R¯6XÎ–ş³½+¶8™\ï¦HW…%¤ó ô¯\ØGö›×¾,üu»ñ%\ç„\íü=\àÿ\0‰\ÖIhuGÕ´\ÏøœøŸO„	;\Í@Bói\êQ\Ö{\Ï:5\ÑZ!’@\Ù\ÔQE\0\Æş\Ñ~?ºøQû>x\ï\Å6*{\á¯j\Z­¸uÜ¦H-¤•r;Œ¨\â»*\ç>0ø>+|$ñO…\ä‘bÄšEŞ”\Îz ˆŸ\Ãu\0s\Ñ|ºğÀM\á\ç|S\'„$ğŞ“g¥Y\ê)g\rıÕ¥´¢+Ùqò€\Ü\êÀ€\à\á—\åÿ\0\Û\á\Ä\Ë\ÚSÀºdŸ\n|I üF†\n\İ\ë>8{‹8m¢–C\Ø\Äö\ï{ss$³J\ßdtC$v`[\Ûv¹“è¯ƒºÌ—^Š³Cqwm\â¿\é:¤¶V–ms¨´±A<\Ò,aAw“F;D‚VU3³rş\é!ñ–­¨\êk\ÑüMøgı§\ßX\ŞOi6.–\ÜG/o¯›\åı¬”‘n¥¸H\ÜI\Ù\âŒöƒğNƒñ\ÄV?oµO\è·\ŞĞ§–ÿ\0\Æ:Î’~\É$1Emq\éqq\Ó\î®b¾Š\Êô®±¶2H‹Î’s¿\r¿g?~\È_ü¬xû\ÆüNñ¯\Ä\í>ÿ\0V\Õ\â±\Zl7\Ï\nø^\ŞXmP˜­Z\Ü\ÛH\ĞDJ\ÑÊ«\ÛÎŸ…¿h¿\ÚX‡M\Ót5Õ¼Ağµ\Ş_Ka\â\í\Z\ê\ãYxôû\ÛY!±\Ê\ìÈ²¼\×\r³\í±\Ø.¬B²\ì[:Á/\n|ı‰´M\áü–M\àñw‡|E\á‹kKU¶†n5\İ:ü¢\"EYn\äUH\Ò8\ã[…Š8\Ñ#E\0RQE\0QEğ}\çü\ËVø!ûjx\Ëöbğ\Âü`ñ×…\ã—\Æb3Z\Òô¨m4+\Ém¥Á’öx\Í\r\ÍûB°(P H1%‚ô_?n_ƒ>?ûg„~;k^,ıš\ï5UÑ®tOOi\áô\×,e’\Ì]=Z9f²¼µ\â\Æñ®#K¦lD\â\'_Nıºşø3\Äş\ÓõKè·Ÿµ\ë\Ë?xk\Äq[u\İ	\î\æ1µÕ­\ìe.b\ËuvR)¢,°Ê¡Ô¾k\â_ø)oü‹ş_ƒş.·’;}c\á±ñ\\~\'ÿ\0„n\Ï_¸±\Ö5»ƒe£\Ùù{\Å*]kw\×V÷*\×7)<†9’vKwq)\0öÙ‡ö•ı?nŸø_Bøwy­\\\\X\Şÿ\0j|<½½ğÎ£§\éö’i/	º‹\Ã×—¶\Â8cH„1Oej\êŸg,¢)nk\Å_ğ]/Ù\âg\ÄËŸ„>\Ôõ\è¼7ğóÅº4Z÷-t\áğ\Ò\Ú\êQ\ËKzŸ»‚\Õ\îí¢³I\Ü%¸3«¬–¯–¼û	|oÿ\0‚~ŞšNƒ7ƒeı‘ÿ\0f\ß\Ù~\Şû\ÃğŞ‘¬¥¯‰a\Z<Ëˆ\ßOŸr\İ\Ïoq¦Gy-Pî‰…\éûb\Í\Îj¿ğo\'\í%ğŸöeñ—\ì£ğ\ÛNøK\Ã?‰\Ş,¶\ÖüIñb\çQ‘5KJ´—Í´°»±1³¬È‰\"‹v1\Ü7\'›+P\ï=›\à\ï\rE\à¿\éz<\\\\C¤\Ù\Ãg³¾ùeX\Ğ g=Ø’{šÒ ¹_Œÿ\0¼+û<x\nOx\ÓY·\Ğ<?\rå„—³«´i5\İ\ÌV¶\êv‚Fù\æ‰3Œ\r\Ù$\0H\ê«\ç?ø*\ï\ìk®~\ßß°ÏŠ>øwT\Ót]S\ÄZ†p·—\ï*Cvš­¥\ä¼Æ¬û\Ìv\î\ï\ÉQ’\08Ác¿d^xwU¸ø½ \ßK\áù \×ôÖ¶¶¾”\Æ\×I>Ÿ\íX‘t\ÈP‚S\íV\ÌÁ|\èŸ\à¬?²?-4½S\\ø­¤\Ş\é¾¾\Z\Üq­­û\Úˆ\Ì\Å,¨‘/”Ú¥‹Æ¯¹Dó@\ê<è‘£ùö<ÿ\0ƒv~&~\Ëa\Õ\Æ~¾\Ñ\ìg\Ğgµ‚¼I”Yø«\Ã\Z\Â\ÄW\Ç\ÃH##\ï\ÍvQ„išşu\à¿ø6#\ã…<y \É\ão‡\×z¹)w4z\î³o$h\ÓøV\á\Ê\ìˆ\Ë\è7*±»‹Ï·’=¯y`¢~ ÿ\0‚Œ~Ë¿>6k ½ø­¤\Ã\â/xC@\Ö%Š	.¯m\ï4§¹x´\ë˜(\İ\ZIŸSŒ24r[»(M®zoÿ\0ÁXÿ\0g_øûRğ¾¥ñ[Ã¶ºö\â\ËO\ŞÚºÏ›}^\ë\ÎòmÙ„{v–·\Zlù1\É±»«£(øGVÿ\0ƒx~%x«\ã\Ï\Â_j~6ğlz\'‚|#\à#XJ½¿\Òï¦½\Òn¼>5g%´qµ¼F\ÛEw·š\'ŠU–t]„\ÕŒ¿ğo_\Æ‰_´g‹<Eo\ã\ï\0E\á}o\âÅ¿Œ¬ ¯\rÕ¶—6¥«j7ä¨‡hºW\Ô!Š(C˜¤<$,\å\é\ß\ì\ÃûWü;ı³~C\ão…ş*\Ó|aá‰®\Ğ^Ù‡P“ RÑºHª\è\ÛY •ta•`O¡\×\ÈğEø\'\çŒ?\à›Ÿ±ÔñÎµ\á½o\Ä:°¾’]	§{8£O±°‰CÌˆ\ì\Å,•Ø”P…FB\äıy@ÿ\Ù'),(83,'Amadeu queiroz leme','amadoquequero@gmail.com','amadeu','e10adc3949ba59abbe56e057f20f883e','2016-01-13 14:45:20',NULL,'1',NULL),(86,'Juliana Berta Heiz','jujuba@gmail.com','juju','e10adc3949ba59abbe56e057f20f883e','2016-01-13 19:06:34',NULL,'1',NULL),(87,'Mirtes Tosco Biagria','mitinha@hotmail.com','MIRTINHA','e10adc3949ba59abbe56e057f20f883e','2016-01-13 19:09:06',NULL,'1',NULL),(88,'Lilian Mendes Teixeira','lilime@gmail.com','LILIAN','e10adc3949ba59abbe56e057f20f883e','2016-01-13 19:23:02',NULL,'1',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-25 18:03:08
