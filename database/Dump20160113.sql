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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissao`
--

LOCK TABLES `permissao` WRITE;
/*!40000 ALTER TABLE `permissao` DISABLE KEYS */;
INSERT INTO `permissao` VALUES (1,1,'user','Cadastro de Usuários',1,1,1,1),(2,1,'unidade','Cadastro de Unidades',1,1,1,1),(3,83,'user','Cadastro de Usuários',0,0,0,0),(4,83,'unidade','Cadastro de Unidades',0,0,0,0);
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
INSERT INTO `unidade` VALUES (1,'Unidade Teste 1','12.222.554/0001-55',NULL,'unidade@unidade.com.br','����\0JFIF\0\0`\0`\0\0��\0\"Exif\0\0MM\0*\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0Ducky\0\0\0\0\0<\0\0��\0C\0		\n\n\r\n\n	\r��\0C��\0\0@\0@\"\0��\0\0\0\0\0\0\0\0\0\0\0	\n��\0�\0\0\0}\0!1AQa\"q2���#B��R��$3br�	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz���������������������������������������������������������������������������\0\0\0\0\0\0\0\0	\n��\0�\0\0w\0!1AQaq\"2�B����	#3R�br�\n$4�%�\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz��������������������������������������������������������������������������\0\0\0?\0����(��t_������B\r7M�(�,�%��$q\"(-$�Hʉ\Z�;���0��\0�s�P����w�O��ZN�!�m��Rm\Z�������:�AǗvm\'V�h�8��k|N�����u�*�\\x+M,�C�,�j�����\n�uL����&@5	�����\0���W�j��[�k\Z]α,����ɟ���h�\Z;[�J����|ǂc��2� c��o.�h�O�]7�_�\Zb������\\�gV��couuumw8Pb�l�vm�< m>����>��g�������\0L�ibW��!�)��)��M�I��E$n����>�����<c��\0^I�\rs�:�k��?��4�R�6XΖ���+�8���HW�%�����G��׾,�u��%���=��\0��IhuGմ�����O�	;�@B�i�Q�{�:5�Z!�@��QE\0���~?��Q�>x��6*�{�j\Z��uܦH-��r;���*�>0�>+|$�O��b�ĚEޔ�z ����u\0s�|����M��|S\'�$�ޓg�Y�)g\r�ե��+ُq���������\0�����S��d�\n|I��F�\n��>8�{�8m��C����{ss$�J�dtC$v`[�v��诃�̗^��Cqwm��:��V�ms���A<�,aAw�F;D�VU3�r��!񖭨�k��M��g����X�Oi6�.��G/�o�������n��H�I�����N���V?o�O��Ч��\0�:Β~�$1Emq�qq��b���������2H�Βs�\r�g?~�_��x���N���>�\0V��\Zl7�\n�^�XmP��Z��H�DJ�ʫ��Ο��h��X�M�t5ռA��_Ka��\Z��Yx���Y!����Ȳ��\r����.�B��[:�/\n|���M���M��w�|E�kKU��n5�:��\"EYn�UH�8�[��8�#E\0RQE\0QE�}���V�!�jx��b���`�ׅ��b3Z���m4+�m����x��\r��B�(P H1%��_?n_�>?�g�~;k^,���5�UѮtOOi���,e��]=Z9f�������#K�lD�\'_N����3����K�跟���?xk�q[u�	��1�խ�e.b��uvR)�,�ʡԾk�_�)o���_��.��;}c��\\~\'�\0�n�_���5��e����{�*]kw�V�*�7)<�9�vKwq)\0�ه����?n��_B�wy�\\\\X��\0j|<���Σ����i/	���ח��8cH�1Oej�g,��)nk�_�]/ُ�g�˟�>���7��ź4Z��-t�����Q�Kz��������I�%�3��������	|o�\0��~ޚN�7�e���\0f��~����ޑ����a\Z��<ˈ�O�r��oq�Gy-P��b��j��o\'�%��e����N�K�?��,���I�b�Q�5�KJ��ʹ���1���ȉ\"�v1�7\'�+P�=���\rE��z<\\\\C���g���eX� g=؁�{�Ҡ�_��\0�+�<x\nOx�Y��<?\r坄����i5��V��v�F��3�\r�$\0H��?�*��k�~�߰ϊ>�wT�t]S�Z��p���*Cv����Ƭ��v���Q�\08�c�d^xwU�����K�� ��ֶ�����I>��X�t�P�S�V��|���?�?�-4�S\\������\Z�q�������,���/�ڥ�Ư�D�@�<董��<�\0�v~&~�a��~���g�g���I�Y���\Z���W��H##��vQ�i��u��6#��<y���o��z�)w4z�o$h��V�����7*���Ϸ�=�y`�~ �\0��~˿>6k ������/xC@�%�	.�m�4��x��(�\ZI�S��24r[�(M�zo�\0�X�\0g_��R��[ö�����O�ںϛ}^���mل{v���\Zl�1�����(�GV�\0�x~%x����_j~6�lz\'�|#��#X�J���尿�n�>5g%�q��F�Ew��\'�U�t]������o_��_�g�<Eo��\0E�}o�ſ�����\rն�6��j7䨇h�W�!�(C��<�$,������W�;��~C�o��*�|aቮ�^هP� RѺH���Y��ta�`O����E�\'�?����Ԟ�ε�o�:���]	�{8��O���C̈��,�ؔP�FB��y@��','(18) 3608-8555','16074-260','SP','AraÃ§atuba','Amizade','Rua AntÃ´nio Corbucci','84');
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
INSERT INTO `user` VALUES (1,'Administrador','maurorvitor@gmail.com','adm','e10adc3949ba59abbe56e057f20f883e','2016-01-07 15:02:50','2016-01-13 14:43:29','1','����\0JFIF\0\0`\0`\0\0��\0\"Exif\0\0MM\0*\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0Ducky\0\0\0\0\0<\0\0��\0C\0		\n\n\r\n\n	\r��\0C��\0\0@\0@\"\0��\0\0\0\0\0\0\0\0\0\0\0	\n��\0�\0\0\0}\0!1AQa\"q2���#B��R��$3br�	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz���������������������������������������������������������������������������\0\0\0\0\0\0\0\0	\n��\0�\0\0w\0!1AQaq\"2�B����	#3R�br�\n$4�%�\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz��������������������������������������������������������������������������\0\0\0?\0����(��t_������B\r7M�(�,�%��$q\"(-$�Hʉ\Z�;���0��\0�s�P����w�O��ZN�!�m��Rm\Z�������:�AǗvm\'V�h�8��k|N�����u�*�\\x+M,�C�,�j�����\n�uL����&@5	�����\0���W�j��[�k\Z]α,����ɟ���h�\Z;[�J����|ǂc��2� c��o.�h�O�]7�_�\Zb������\\�gV��couuumw8Pb�l�vm�< m>����>��g�������\0L�ibW��!�)��)��M�I��E$n����>�����<c��\0^I�\rs�:�k��?��4�R�6XΖ���+�8���HW�%�����G��׾,�u��%���=��\0��IhuGմ�����O�	;�@B�i�Q�{�:5�Z!�@��QE\0���~?��Q�>x��6*�{�j\Z��uܦH-��r;���*�>0�>+|$�O��b�ĚEޔ�z ����u\0s�|����M��|S\'�$�ޓg�Y�)g\r�ե��+ُq���������\0�����S��d�\n|I��F�\n��>8�{�8m��C����{ss$�J�dtC$v`[�v��诃�̗^��Cqwm��:��V�ms���A<�,aAw�F;D�VU3�r��!񖭨�k��M��g����X�Oi6�.��G/�o�������n��H�I�����N���V?o�O��Ч��\0�:Β~�$1Emq�qq��b���������2H�Βs�\r�g?~�_��x���N���>�\0V��\Zl7�\n�^�XmP��Z��H�DJ�ʫ��Ο��h��X�M�t5ռA��_Ka��\Z��Yx���Y!����Ȳ��\r����.�B��[:�/\n|���M���M��w�|E�kKU��n5�:��\"EYn�UH�8�[��8�#E\0RQE\0QE�}���V�!�jx��b���`�ׅ��b3Z���m4+�m����x��\r��B�(P H1%��_?n_�>?�g�~;k^,���5�UѮtOOi���,e��]=Z9f�������#K�lD�\'_N����3����K�跟���?xk�q[u�	��1�խ�e.b��uvR)�,�ʡԾk�_�)o���_��.��;}c��\\~\'�\0�n�_���5��e����{�*]kw�V�*�7)<�9�vKwq)\0�ه����?n��_B�wy�\\\\X��\0j|<���Σ����i/	���ח��8cH�1Oej�g,��)nk�_�]/ُ�g�˟�>���7��ź4Z��-t�����Q�Kz��������I�%�3��������	|o�\0��~ޚN�7�e���\0f��~����ޑ����a\Z��<ˈ�O�r��oq�Gy-P��b��j��o\'�%��e����N�K�?��,���I�b�Q�5�KJ��ʹ���1���ȉ\"�v1�7\'�+P�=���\rE��z<\\\\C���g���eX� g=؁�{�Ҡ�_��\0�+�<x\nOx�Y��<?\r坄����i5��V��v�F��3�\r�$\0H��?�*��k�~�߰ϊ>�wT�t]S�Z��p���*Cv����Ƭ��v���Q�\08�c�d^xwU�����K�� ��ֶ�����I>��X�t�P�S�V��|���?�?�-4�S\\������\Z�q�������,���/�ڥ�Ư�D�@�<董��<�\0�v~&~�a��~���g�g���I�Y���\Z���W��H##��vQ�i��u��6#��<y���o��z�)w4z�o$h��V�����7*���Ϸ�=�y`�~ �\0��~˿>6k ������/xC@�%�	.�m�4��x��(�\ZI�S��24r[�(M�zo�\0�X�\0g_��R��[ö�����O�ںϛ}^���mل{v���\Zl�1�����(�GV�\0�x~%x����_j~6�lz\'�|#��#X�J���尿�n�>5g%�q��F�Ew��\'�U�t]������o_��_�g�<Eo��\0E�}o�ſ�����\rն�6��j7䨇h�W�!�(C��<�$,������W�;��~C�o��*�|aቮ�^هP� RѺH���Y��ta�`O����E�\'�?����Ԟ�ε�o�:���]	�{8��O���C̈��,�ؔP�FB��y@��'),(81,'MAURO ROGERIO VITO','maurorvitor@gmail.com','mauro','e10adc3949ba59abbe56e057f20f883e','2016-01-12 15:39:02',NULL,'1','����\0JFIF\0\0`\0`\0\0��\0\"Exif\0\0MM\0*\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0Ducky\0\0\0\0\0<\0\0��\0C\0		\n\n\r\n\n	\r��\0C��\0\0@\0@\"\0��\0\0\0\0\0\0\0\0\0\0\0	\n��\0�\0\0\0}\0!1AQa\"q2���#B��R��$3br�	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz���������������������������������������������������������������������������\0\0\0\0\0\0\0\0	\n��\0�\0\0w\0!1AQaq\"2�B����	#3R�br�\n$4�%�\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz��������������������������������������������������������������������������\0\0\0?\0����(��t_������B\r7M�(�,�%��$q\"(-$�Hʉ\Z�;���0��\0�s�P����w�O��ZN�!�m��Rm\Z�������:�AǗvm\'V�h�8��k|N�����u�*�\\x+M,�C�,�j�����\n�uL����&@5	�����\0���W�j��[�k\Z]α,����ɟ���h�\Z;[�J����|ǂc��2� c��o.�h�O�]7�_�\Zb������\\�gV��couuumw8Pb�l�vm�< m>����>��g�������\0L�ibW��!�)��)��M�I��E$n����>�����<c��\0^I�\rs�:�k��?��4�R�6XΖ���+�8���HW�%�����G��׾,�u��%���=��\0��IhuGմ�����O�	;�@B�i�Q�{�:5�Z!�@��QE\0���~?��Q�>x��6*�{�j\Z��uܦH-��r;���*�>0�>+|$�O��b�ĚEޔ�z ����u\0s�|����M��|S\'�$�ޓg�Y�)g\r�ե��+ُq���������\0�����S��d�\n|I��F�\n��>8�{�8m��C����{ss$�J�dtC$v`[�v��诃�̗^��Cqwm��:��V�ms���A<�,aAw�F;D�VU3�r��!񖭨�k��M��g����X�Oi6�.��G/�o�������n��H�I�����N���V?o�O��Ч��\0�:Β~�$1Emq�qq��b���������2H�Βs�\r�g?~�_��x���N���>�\0V��\Zl7�\n�^�XmP��Z��H�DJ�ʫ��Ο��h��X�M�t5ռA��_Ka��\Z��Yx���Y!����Ȳ��\r����.�B��[:�/\n|���M���M��w�|E�kKU��n5�:��\"EYn�UH�8�[��8�#E\0RQE\0QE�}���V�!�jx��b���`�ׅ��b3Z���m4+�m����x��\r��B�(P H1%��_?n_�>?�g�~;k^,���5�UѮtOOi���,e��]=Z9f�������#K�lD�\'_N����3����K�跟���?xk�q[u�	��1�խ�e.b��uvR)�,�ʡԾk�_�)o���_��.��;}c��\\~\'�\0�n�_���5��e����{�*]kw�V�*�7)<�9�vKwq)\0�ه����?n��_B�wy�\\\\X��\0j|<���Σ����i/	���ח��8cH�1Oej�g,��)nk�_�]/ُ�g�˟�>���7��ź4Z��-t�����Q�Kz��������I�%�3��������	|o�\0��~ޚN�7�e���\0f��~����ޑ����a\Z��<ˈ�O�r��oq�Gy-P��b��j��o\'�%��e����N�K�?��,���I�b�Q�5�KJ��ʹ���1���ȉ\"�v1�7\'�+P�=���\rE��z<\\\\C���g���eX� g=؁�{�Ҡ�_��\0�+�<x\nOx�Y��<?\r坄����i5��V��v�F��3�\r�$\0H��?�*��k�~�߰ϊ>�wT�t]S�Z��p���*Cv����Ƭ��v���Q�\08�c�d^xwU�����K�� ��ֶ�����I>��X�t�P�S�V��|���?�?�-4�S\\������\Z�q�������,���/�ڥ�Ư�D�@�<董��<�\0�v~&~�a��~���g�g���I�Y���\Z���W��H##��vQ�i��u��6#��<y���o��z�)w4z�o$h��V�����7*���Ϸ�=�y`�~ �\0��~˿>6k ������/xC@�%�	.�m�4��x��(�\ZI�S��24r[�(M�zo�\0�X�\0g_��R��[ö�����O�ںϛ}^���mل{v���\Zl�1�����(�GV�\0�x~%x����_j~6�lz\'�|#��#X�J���尿�n�>5g%�q��F�Ew��\'�U�t]������o_��_�g�<Eo��\0E�}o�ſ�����\rն�6��j7䨇h�W�!�(C��<�$,������W�;��~C�o��*�|aቮ�^هP� RѺH���Y��ta�`O����E�\'�?����Ԟ�ε�o�:���]	�{8��O���C̈��,�ؔP�FB��y@��'),(83,'Amadeu queiroz leme','amadoquequero@gmail.com','amadeu','e10adc3949ba59abbe56e057f20f883e','2016-01-13 14:45:20',NULL,'1',NULL),(86,'Juliana Berta Heiz','jujuba@gmail.com','juju','e10adc3949ba59abbe56e057f20f883e','2016-01-13 19:06:34',NULL,'1',NULL),(87,'Mirtes Tosco Biagria','mitinha@hotmail.com','MIRTINHA','e10adc3949ba59abbe56e057f20f883e','2016-01-13 19:09:06',NULL,'1',NULL),(88,'Lilian Mendes Teixeira','lilime@gmail.com','LILIAN','e10adc3949ba59abbe56e057f20f883e','2016-01-13 19:23:02',NULL,'1',NULL);
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

-- Dump completed on 2016-01-13 18:07:23
