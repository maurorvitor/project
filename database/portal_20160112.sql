CREATE DATABASE  IF NOT EXISTS `portal` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `portal`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissao`
--

LOCK TABLES `permissao` WRITE;
/*!40000 ALTER TABLE `permissao` DISABLE KEYS */;
INSERT INTO `permissao` VALUES (1,1,'user','UsuÃ¡rios',1,1,1,1),(2,1,'unidade','Unidades',1,1,1,1);
/*!40000 ALTER TABLE `permissao` ENABLE KEYS */;
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
INSERT INTO `unidade` VALUES (1,'Unidade Teste 1','12.222.554/0001-55',NULL,'unidade@unidade.com.br','ÿØÿà\0JFIF\0\0`\0`\0\0ÿá\0\"Exif\0\0MM\0*\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿì\0Ducky\0\0\0\0\0<\0\0ÿÛ\0C\0		\n\n\r\n\n	\rÿÛ\0CÿÀ\0\0@\0@\"\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0	\nÿÄ\0µ\0\0\0}\0!1AQa\"q2‘¡#B±ÁRÑğ$3br‚	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ\0\0\0\0\0\0\0\0	\nÿÄ\0µ\0\0w\0!1AQaq\"2B‘¡±Á	#3RğbrÑ\n$4á%ñ\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ\0\0\0?\0ıü¢Š(Çßt_…Ş¹ÖõıB\r7Mµ(,™%İÜ$q\"(-$²HÊ‰\Zò;ªª³0Ìÿ\0ásüPø›¦ÉwàO†öZN›!ÛmãİRm\Zâé·éğÛÏ:ÆAÇ—vm\'VÈh—8şñk|Nø­ü™u­*×\\x+M,ÑCÅ,±jÚÁÊíó\nÃuLà³Ú&@5	¼“ö¦ÿ\0‚ÕøWöjñ‡ô[¯k\Z]Î±,ÖÒËãÉŸÀ–‚hğ\Z;[½J´½ÚÅ|Ç‚c¬±2É c´Úo.¿h‡O¬]7Ã_Š\Zb¾æğş‡¤\\øgV†–couuumw8Pb•l£vmÍ< m>¥ğçâ>‹ñgÁöº÷‡ï–ÿ\0L»ibWòŞ!–) –)ÉÑM‘IŠ²E$nªêÊ>‹ö¸ı¢<cáÿ\0^Iâ\rsÃ:æ—k©û?¯‰4½R¯6XÎ–ş³½+¶8™ï¦HW…%¤ó ô¯ØGö›×¾,üu»ñ%ç„íü=àÿ\0‰ÖIhuGÕ´ÏøœøŸO„	;Í@BóiêQÖ{Ï:5ÑZ!’@ÙÔQE\0ÆşÑ~?ºøQû>xïÅ6*{á¯j\Z­¸uÜ¦H-¤•r;Œ¨â»*ç>0ø>+|$ñO…ä‘bÄšEŞ”Îz ˆŸÃu\0sÑ|ºğÀMáç|S\'„$ğŞ“g¥Yê)g\rıÕ¥´¢+Ùqò€ÜêÀ€àá—åÿ\0ÛáÄËÚSÀºdŸ\n|I üF†\nİë>8{‹8m¢–CØÄöï{ss$³JßdtC$v`[Ûv¹“è¯ƒºÌ—^Š³Cqwmâ¿é:¤¶V–ms¨´±A<Ò,aAw“F;D‚VU3³rşé!ñ–­¨êkÑüMøgı§ßXŞOi6.–ÜG/o¯›åı¬”‘n¥¸HÜIÙâŒöƒğNƒñÄV?oµOè·ŞĞ§–ÿ\0Æ:Î’~É$1EmqéqqÓî®b¾ŠÊô®±¶2H‹Î’s¿\r¿g?~È_ü¬xûÆüNñ¯Äí>ÿ\0VÕâ±\Zl7Ï\nø^ŞXmP˜­ZÜÛHĞDJÑÊ«ÛÎŸ…¿h¿ÚX‡MÓt5Õ¼AğµŞ_Kaâí\ZêãYxôûÛY!±ÊìÈ²¼×\r³í±Ø.¬B²ì[:Á/\n|ı‰´Máü–Màñw‡|Eá‹kKU¶†n5İ:ü¢\"EYnäUHÒ8ã[…Š8Ñ#E\0RQE\0QEğ}çüËVø!ûjxËöbğÂü`ñ×…ã—Æb3ZÒô¨m4+Ém¥Á’öxÍ\rÍûB°(P H1%‚ô_?n_ƒ>?ûg„~;k^,ıšï5UÑ®tOOiáô×,e’Ì]=Z9f²¼µâÆñ®#K¦lDâ\'_Nıºşø3ÄşÓõKè·ŸµëË?xkÄq[uİ	îæ1µÕ­ìe.bËuvR)¢,°Ê¡Ô¾kâ_ø)oü‹ş_ƒş.·’;}cá±ñ\\~\'ÿ\0„nÏ_¸±Ö5»ƒe£Ùù{Å*]kw×V÷*×7)<†9’vKwq)\0öÙ‡ö•ı?nŸø_Bøwy­\\\\XŞÿ\0j|<½½ğÎ£§éö’i/	º‹Ã×—¶Â8cH„1OejêŸg,¢)nkÅ_ğ]/ÙâgÄËŸ„>Ôõè¼7ğóÅº4Z÷-táğÒÚêQËKzŸ»‚Õîí¢³IÜ%¸3«¬–¯–¼û	|oÿ\0‚~ŞšNƒ7ƒeı‘ÿ\0fßÙ~ŞûÃğŞ‘¬¥¯‰a\Z<ËˆßOŸrİÏoq¦Gy-Pî‰…éûbÍÎj¿ğo\'í%ğŸöeñ—ì£ğÛNøKÃ?‰Ş,¶ÖüIñbçQ‘5KJ´—Í´°»±1³¬È‰\"‹v1Ü7\'›+Pï=›àï\rEà¿éz<\\\\C¤ÙÃg³¾ùeXĞ g=Ø’{šÒ ¹_Œÿ\0¼+û<x\nOxÓY·Ğ<?\rå„—³«´i5İÌV¶êv‚Fùæ‰3Œ\rÙ$\0Hê«ç?ø*ïìk®~ßß°ÏŠ>øwTÓt]SÄZ†p·—ï*Cvš­¥ä¼Æ¬ûÌvîïÉQ’\08Ác¿d^xwU¸ø½ ßKáù ×ôÖ¶¶¾”Æ×I>ŸíX‘tÈP‚SíVÌÁ|èŸà¬?²?-4½S\\ø­¤Şé¾¾\ZÜq­­ûÚˆÌÅ,¨‘/”Ú¥‹Æ¯¹Dó@ê<è‘£ùö<ÿ\0ƒv~&~ËaÕÆ~¾ÑìgĞgµ‚¼I”Yø«Ã\ZÂÄWÇÃH##ïÍvQ„išşuà¿ø6#ã…<y Éão‡×z¹)w4zî³o$hÓøVáÊìˆËè7*±»‹Ï·’=¯y`¢~ ÿ\0‚Œ~Ë¿>6k ½ø­¤Ãâ/xC@Ö%Š	.¯mï4§¹x´ë˜(İ\ZIŸSŒ24r[»(M®zoÿ\0ÁXÿ\0g_øûRğ¾¥ñ[Ã¶ºöâËOŞÚºÏ›}^ëÎòmÙ„{v–·\Zlù1É±»«£(øGVÿ\0ƒx~%x«ãÏÂ_j~6ğlz\'‚|#à#XJ½¿Òï¦½Òn¼>5g%´qµ¼FÛEw·š\'ŠU–t]„ÕŒ¿ğo_Æ‰_´g‹<Eoãï\0Eá}oâÅ¿Œ¬ ¯\rÕ¶—6¥«j7ä¨‡hºWÔ!Š(C˜¤<$,åéßìÃûWü;ı³~Cão…ş*Ó|aá‰®Ğ^Ù‡P“ RÑºHªèÛY •ta•`O¡×ÈğEø\'çŒ?à›Ÿ±ÔñÎµá½oÄ:°¾’]	§{8£O±°‰CÌˆìÅ,•Ø”P…FBäıy@ÿÙ','(18) 3608-8555','16074-260','SP','AraÃƒÂ§atuba','Amizade','Rua AntÃƒÂ´nio Corbucci','84');
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Administrador','maurorvitor@gmail.com','adm','e10adc3949ba59abbe56e057f20f883e','2016-01-07 15:02:50','2016-01-12 21:02:37','1','ÿØÿà\0JFIF\0\0`\0`\0\0ÿá\0\"Exif\0\0MM\0*\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿì\0Ducky\0\0\0\0\0<\0\0ÿÛ\0C\0		\n\n\r\n\n	\rÿÛ\0CÿÀ\0\0@\0@\"\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0	\nÿÄ\0µ\0\0\0}\0!1AQa\"q2‘¡#B±ÁRÑğ$3br‚	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ\0\0\0\0\0\0\0\0	\nÿÄ\0µ\0\0w\0!1AQaq\"2B‘¡±Á	#3RğbrÑ\n$4á%ñ\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ\0\0\0?\0ıü¢Š(Çßt_…Ş¹ÖõıB\r7Mµ(,™%İÜ$q\"(-$²HÊ‰\Zò;ªª³0Ìÿ\0ásüPø›¦ÉwàO†öZN›!ÛmãİRm\Zâé·éğÛÏ:ÆAÇ—vm\'VÈh—8şñk|Nø­ü™u­*×\\x+M,ÑCÅ,±jÚÁÊíó\nÃuLà³Ú&@5	¼“ö¦ÿ\0‚ÕøWöjñ‡ô[¯k\Z]Î±,ÖÒËãÉŸÀ–‚hğ\Z;[½J´½ÚÅ|Ç‚c¬±2É c´Úo.¿h‡O¬]7Ã_Š\Zb¾æğş‡¤\\øgV†–couuumw8Pb•l£vmÍ< m>¥ğçâ>‹ñgÁöº÷‡ï–ÿ\0L»ibWòŞ!–) –)ÉÑM‘IŠ²E$nªêÊ>‹ö¸ı¢<cáÿ\0^Iâ\rsÃ:æ—k©û?¯‰4½R¯6XÎ–ş³½+¶8™ï¦HW…%¤ó ô¯ØGö›×¾,üu»ñ%ç„íü=àÿ\0‰ÖIhuGÕ´ÏøœøŸO„	;Í@BóiêQÖ{Ï:5ÑZ!’@ÙÔQE\0ÆşÑ~?ºøQû>xïÅ6*{á¯j\Z­¸uÜ¦H-¤•r;Œ¨â»*ç>0ø>+|$ñO…ä‘bÄšEŞ”Îz ˆŸÃu\0sÑ|ºğÀMáç|S\'„$ğŞ“g¥Yê)g\rıÕ¥´¢+Ùqò€ÜêÀ€àá—åÿ\0ÛáÄËÚSÀºdŸ\n|I üF†\nİë>8{‹8m¢–CØÄöï{ss$³JßdtC$v`[Ûv¹“è¯ƒºÌ—^Š³Cqwmâ¿é:¤¶V–ms¨´±A<Ò,aAw“F;D‚VU3³rşé!ñ–­¨êkÑüMøgı§ßXŞOi6.–ÜG/o¯›åı¬”‘n¥¸HÜIÙâŒöƒğNƒñÄV?oµOè·ŞĞ§–ÿ\0Æ:Î’~É$1EmqéqqÓî®b¾ŠÊô®±¶2H‹Î’s¿\r¿g?~È_ü¬xûÆüNñ¯Äí>ÿ\0VÕâ±\Zl7Ï\nø^ŞXmP˜­ZÜÛHĞDJÑÊ«ÛÎŸ…¿h¿ÚX‡MÓt5Õ¼AğµŞ_Kaâí\ZêãYxôûÛY!±ÊìÈ²¼×\r³í±Ø.¬B²ì[:Á/\n|ı‰´Máü–Màñw‡|Eá‹kKU¶†n5İ:ü¢\"EYnäUHÒ8ã[…Š8Ñ#E\0RQE\0QEğ}çüËVø!ûjxËöbğÂü`ñ×…ã—Æb3ZÒô¨m4+Ém¥Á’öxÍ\rÍûB°(P H1%‚ô_?n_ƒ>?ûg„~;k^,ıšï5UÑ®tOOiáô×,e’Ì]=Z9f²¼µâÆñ®#K¦lDâ\'_Nıºşø3ÄşÓõKè·ŸµëË?xkÄq[uİ	îæ1µÕ­ìe.bËuvR)¢,°Ê¡Ô¾kâ_ø)oü‹ş_ƒş.·’;}cá±ñ\\~\'ÿ\0„nÏ_¸±Ö5»ƒe£Ùù{Å*]kw×V÷*×7)<†9’vKwq)\0öÙ‡ö•ı?nŸø_Bøwy­\\\\XŞÿ\0j|<½½ğÎ£§éö’i/	º‹Ã×—¶Â8cH„1OejêŸg,¢)nkÅ_ğ]/ÙâgÄËŸ„>Ôõè¼7ğóÅº4Z÷-táğÒÚêQËKzŸ»‚Õîí¢³IÜ%¸3«¬–¯–¼û	|oÿ\0‚~ŞšNƒ7ƒeı‘ÿ\0fßÙ~ŞûÃğŞ‘¬¥¯‰a\Z<ËˆßOŸrİÏoq¦Gy-Pî‰…éûbÍÎj¿ğo\'í%ğŸöeñ—ì£ğÛNøKÃ?‰Ş,¶ÖüIñbçQ‘5KJ´—Í´°»±1³¬È‰\"‹v1Ü7\'›+Pï=›àï\rEà¿éz<\\\\C¤ÙÃg³¾ùeXĞ g=Ø’{šÒ ¹_Œÿ\0¼+û<x\nOxÓY·Ğ<?\rå„—³«´i5İÌV¶êv‚Fùæ‰3Œ\rÙ$\0Hê«ç?ø*ïìk®~ßß°ÏŠ>øwTÓt]SÄZ†p·—ï*Cvš­¥ä¼Æ¬ûÌvîïÉQ’\08Ác¿d^xwU¸ø½ ßKáù ×ôÖ¶¶¾”Æ×I>ŸíX‘tÈP‚SíVÌÁ|èŸà¬?²?-4½S\\ø­¤Şé¾¾\ZÜq­­ûÚˆÌÅ,¨‘/”Ú¥‹Æ¯¹Dó@ê<è‘£ùö<ÿ\0ƒv~&~ËaÕÆ~¾ÑìgĞgµ‚¼I”Yø«Ã\ZÂÄWÇÃH##ïÍvQ„išşuà¿ø6#ã…<y Éão‡×z¹)w4zî³o$hÓøVáÊìˆËè7*±»‹Ï·’=¯y`¢~ ÿ\0‚Œ~Ë¿>6k ½ø­¤Ãâ/xC@Ö%Š	.¯mï4§¹x´ë˜(İ\ZIŸSŒ24r[»(M®zoÿ\0ÁXÿ\0g_øûRğ¾¥ñ[Ã¶ºöâËOŞÚºÏ›}^ëÎòmÙ„{v–·\Zlù1É±»«£(øGVÿ\0ƒx~%x«ãÏÂ_j~6ğlz\'‚|#à#XJ½¿Òï¦½Òn¼>5g%´qµ¼FÛEw·š\'ŠU–t]„ÕŒ¿ğo_Æ‰_´g‹<Eoãï\0Eá}oâÅ¿Œ¬ ¯\rÕ¶—6¥«j7ä¨‡hºWÔ!Š(C˜¤<$,åéßìÃûWü;ı³~Cão…ş*Ó|aá‰®Ğ^Ù‡P“ RÑºHªèÛY •ta•`O¡×ÈğEø\'çŒ?à›Ÿ±ÔñÎµá½oÄ:°¾’]	§{8£O±°‰CÌˆìÅ,•Ø”P…FBäıy@ÿÙ'),(81,'MAURO ROGERIO VITO','maurorvitor@gmail.com','mauro','e10adc3949ba59abbe56e057f20f883e','2016-01-12 15:39:02',NULL,'1','ÿØÿà\0JFIF\0\0`\0`\0\0ÿá\0\"Exif\0\0MM\0*\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿì\0Ducky\0\0\0\0\0<\0\0ÿÛ\0C\0		\n\n\r\n\n	\rÿÛ\0CÿÀ\0\0@\0@\"\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0	\nÿÄ\0µ\0\0\0}\0!1AQa\"q2‘¡#B±ÁRÑğ$3br‚	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ\0\0\0\0\0\0\0\0	\nÿÄ\0µ\0\0w\0!1AQaq\"2B‘¡±Á	#3RğbrÑ\n$4á%ñ\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ\0\0\0?\0ıü¢Š(Çßt_…Ş¹ÖõıB\r7Mµ(,™%İÜ$q\"(-$²HÊ‰\Zò;ªª³0Ìÿ\0ásüPø›¦ÉwàO†öZN›!ÛmãİRm\Zâé·éğÛÏ:ÆAÇ—vm\'VÈh—8şñk|Nø­ü™u­*×\\x+M,ÑCÅ,±jÚÁÊíó\nÃuLà³Ú&@5	¼“ö¦ÿ\0‚ÕøWöjñ‡ô[¯k\Z]Î±,ÖÒËãÉŸÀ–‚hğ\Z;[½J´½ÚÅ|Ç‚c¬±2É c´Úo.¿h‡O¬]7Ã_Š\Zb¾æğş‡¤\\øgV†–couuumw8Pb•l£vmÍ< m>¥ğçâ>‹ñgÁöº÷‡ï–ÿ\0L»ibWòŞ!–) –)ÉÑM‘IŠ²E$nªêÊ>‹ö¸ı¢<cáÿ\0^Iâ\rsÃ:æ—k©û?¯‰4½R¯6XÎ–ş³½+¶8™ï¦HW…%¤ó ô¯ØGö›×¾,üu»ñ%ç„íü=àÿ\0‰ÖIhuGÕ´ÏøœøŸO„	;Í@BóiêQÖ{Ï:5ÑZ!’@ÙÔQE\0ÆşÑ~?ºøQû>xïÅ6*{á¯j\Z­¸uÜ¦H-¤•r;Œ¨â»*ç>0ø>+|$ñO…ä‘bÄšEŞ”Îz ˆŸÃu\0sÑ|ºğÀMáç|S\'„$ğŞ“g¥Yê)g\rıÕ¥´¢+Ùqò€ÜêÀ€àá—åÿ\0ÛáÄËÚSÀºdŸ\n|I üF†\nİë>8{‹8m¢–CØÄöï{ss$³JßdtC$v`[Ûv¹“è¯ƒºÌ—^Š³Cqwmâ¿é:¤¶V–ms¨´±A<Ò,aAw“F;D‚VU3³rşé!ñ–­¨êkÑüMøgı§ßXŞOi6.–ÜG/o¯›åı¬”‘n¥¸HÜIÙâŒöƒğNƒñÄV?oµOè·ŞĞ§–ÿ\0Æ:Î’~É$1EmqéqqÓî®b¾ŠÊô®±¶2H‹Î’s¿\r¿g?~È_ü¬xûÆüNñ¯Äí>ÿ\0VÕâ±\Zl7Ï\nø^ŞXmP˜­ZÜÛHĞDJÑÊ«ÛÎŸ…¿h¿ÚX‡MÓt5Õ¼AğµŞ_Kaâí\ZêãYxôûÛY!±ÊìÈ²¼×\r³í±Ø.¬B²ì[:Á/\n|ı‰´Máü–Màñw‡|Eá‹kKU¶†n5İ:ü¢\"EYnäUHÒ8ã[…Š8Ñ#E\0RQE\0QEğ}çüËVø!ûjxËöbğÂü`ñ×…ã—Æb3ZÒô¨m4+Ém¥Á’öxÍ\rÍûB°(P H1%‚ô_?n_ƒ>?ûg„~;k^,ıšï5UÑ®tOOiáô×,e’Ì]=Z9f²¼µâÆñ®#K¦lDâ\'_Nıºşø3ÄşÓõKè·ŸµëË?xkÄq[uİ	îæ1µÕ­ìe.bËuvR)¢,°Ê¡Ô¾kâ_ø)oü‹ş_ƒş.·’;}cá±ñ\\~\'ÿ\0„nÏ_¸±Ö5»ƒe£Ùù{Å*]kw×V÷*×7)<†9’vKwq)\0öÙ‡ö•ı?nŸø_Bøwy­\\\\XŞÿ\0j|<½½ğÎ£§éö’i/	º‹Ã×—¶Â8cH„1OejêŸg,¢)nkÅ_ğ]/ÙâgÄËŸ„>Ôõè¼7ğóÅº4Z÷-táğÒÚêQËKzŸ»‚Õîí¢³IÜ%¸3«¬–¯–¼û	|oÿ\0‚~ŞšNƒ7ƒeı‘ÿ\0fßÙ~ŞûÃğŞ‘¬¥¯‰a\Z<ËˆßOŸrİÏoq¦Gy-Pî‰…éûbÍÎj¿ğo\'í%ğŸöeñ—ì£ğÛNøKÃ?‰Ş,¶ÖüIñbçQ‘5KJ´—Í´°»±1³¬È‰\"‹v1Ü7\'›+Pï=›àï\rEà¿éz<\\\\C¤ÙÃg³¾ùeXĞ g=Ø’{šÒ ¹_Œÿ\0¼+û<x\nOxÓY·Ğ<?\rå„—³«´i5İÌV¶êv‚Fùæ‰3Œ\rÙ$\0Hê«ç?ø*ïìk®~ßß°ÏŠ>øwTÓt]SÄZ†p·—ï*Cvš­¥ä¼Æ¬ûÌvîïÉQ’\08Ác¿d^xwU¸ø½ ßKáù ×ôÖ¶¶¾”Æ×I>ŸíX‘tÈP‚SíVÌÁ|èŸà¬?²?-4½S\\ø­¤Şé¾¾\ZÜq­­ûÚˆÌÅ,¨‘/”Ú¥‹Æ¯¹Dó@ê<è‘£ùö<ÿ\0ƒv~&~ËaÕÆ~¾ÑìgĞgµ‚¼I”Yø«Ã\ZÂÄWÇÃH##ïÍvQ„išşuà¿ø6#ã…<y Éão‡×z¹)w4zî³o$hÓøVáÊìˆËè7*±»‹Ï·’=¯y`¢~ ÿ\0‚Œ~Ë¿>6k ½ø­¤Ãâ/xC@Ö%Š	.¯mï4§¹x´ë˜(İ\ZIŸSŒ24r[»(M®zoÿ\0ÁXÿ\0g_øûRğ¾¥ñ[Ã¶ºöâËOŞÚºÏ›}^ëÎòmÙ„{v–·\Zlù1É±»«£(øGVÿ\0ƒx~%x«ãÏÂ_j~6ğlz\'‚|#à#XJ½¿Òï¦½Òn¼>5g%´qµ¼FÛEw·š\'ŠU–t]„ÕŒ¿ğo_Æ‰_´g‹<Eoãï\0Eá}oâÅ¿Œ¬ ¯\rÕ¶—6¥«j7ä¨‡hºWÔ!Š(C˜¤<$,åéßìÃûWü;ı³~Cão…ş*Ó|aá‰®Ğ^Ù‡P“ RÑºHªèÛY •ta•`O¡×ÈğEø\'çŒ?à›Ÿ±ÔñÎµá½oÄ:°¾’]	§{8£O±°‰CÌˆìÅ,•Ø”P…FBäıy@ÿÙ');
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

-- Dump completed on 2016-01-12 17:56:56
