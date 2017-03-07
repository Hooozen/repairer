-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `aid` smallint(4) unsigned NOT NULL,
  `apw` varchar(32) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `list`
--

DROP TABLE IF EXISTS `list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `list` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ldevice` varchar(5) NOT NULL,
  `luid` int(10) unsigned NOT NULL,
  `lrid` smallint(4) unsigned DEFAULT NULL,
  `ldetail` varchar(200) NOT NULL,
  `lstime` int(11) NOT NULL,
  `lotime` int(11) DEFAULT NULL,
  `letime` int(11) DEFAULT NULL,
  `lstate` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `lreply` varchar(200) DEFAULT NULL,
  `lcomt` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `list`
--

LOCK TABLES `list` WRITE;
/*!40000 ALTER TABLE `list` DISABLE KEYS */;
INSERT INTO `list` VALUES (1,'其他',1,1,'宿舍网断了，麻烦帮忙给修一下（上次就是麻烦你们给修的，也是同样的情况',1464953621,1464953621,1464953621,'2',NULL,NULL),(2,'笔记本',2,2,'电脑风扇声音比较大，应该是要清灰了，能星期三下午7.8节课过来看看吗？麻烦技服的同学了！！！宿舍楼15#543',1473660091,1473660091,1473660091,'2',NULL,NULL),(3,'笔记本',2,2,'电脑风扇声音比较大，应该是要清灰了，能星期三下午7.8节课过来看看吗？麻烦技服的同学了！！！宿舍楼15#543',1473660108,1473660108,1473660108,'2',NULL,NULL),(4,'笔记本',2,2,'电脑风扇声音比较大，应该是要清灰了，能星期三下午7.8节课过来看看吗？麻烦技服的同学了！！！宿舍楼15#543',1473660109,1473660109,1473660109,'2',NULL,NULL),(5,'笔记本',3,2,'电脑CPU与磁盘占用率100%导致卡顿',1474171915,1474171915,1474171915,'2',NULL,NULL),(6,'笔记本',3,2,'电脑CPU与磁盘占用率100%导致卡顿',1474172076,1474172076,1474172076,'2',NULL,NULL),(7,'笔记本',3,9,'电脑因卡顿，误操作系统重置为win8,想重做为win10',1481281368,1481281368,1481281368,'2',NULL,NULL),(8,'笔记本',4,2,'反应慢，升win10后开机还有字母什么的，还有就是打游戏老卡顿！',1474287860,1474287860,1474287860,'2',NULL,NULL),(9,'笔记本',5,9,'测试1',1474439477,1474439477,1474439477,'2',NULL,NULL),(10,'笔记本',6,9,'我的电脑上中国知网检索文件 无法检索出相关文件 之前都是可以的 用同学的电脑也是可以的 不知道是哪里出问题了浏览器是360系统是8',1474850678,1474850678,1474850678,'2',NULL,NULL),(11,'笔记本',7,9,'更换操作系统，装windows7系统',1478070224,1478070224,1478070224,'2',NULL,NULL),(12,'笔记本',8,9,'升级win10系统后，插入耳机没有声音，但是虚拟机win7是有声音的，耳机插孔都是好的',1478073648,1478073648,1478073648,'2',NULL,NULL),(13,'笔记本',9,9,'清灰，噪音大，然后就是能不能把网盘清理下下',1478169205,1478169205,1478169205,'2',NULL,NULL),(14,'笔记本',10,9,'电脑清灰',1478169731,1478169731,1478169731,'2',NULL,NULL),(15,'笔记本',10,9,'电脑清灰',1480034002,1480034002,1480034002,'2',NULL,NULL),(16,'笔记本',11,9,'清灰就ok',1478171583,1478171583,1478171583,'2',NULL,NULL),(17,'笔记本',12,9,'1.开机之后可以弹出光驱，不放光盘推进去之后，光驱就不能弹出来。重启之后，遇到同样的问题。\r\n2.清灰。\r\n3.3.0接口速度慢和2.0接口几乎没区别，同一u盘传输同样的文件在别人电脑上速度会快。\r\n若能预约上万分感谢！',1478172833,1478172833,1478172833,'2',NULL,NULL),(18,'笔记本',13,9,'比较卡，系统感觉有点问题，就是速度很慢',1478175437,1478175437,1478175437,'2',NULL,NULL),(19,'笔记本',14,9,'清灰。',1478175595,1478175595,1478175595,'2',NULL,NULL),(20,'笔记本',15,13,'u盘弹不出来，卸载不干净重装不了',1478176678,1478176678,1478176678,'2',NULL,NULL),(21,'笔记本',16,9,'姓名填不上。。。。需要装cad2014   装不上的话需要重装系统TAT',1478177623,1478177623,1478177623,'2',NULL,NULL),(22,'笔记本',17,9,'重装系统',1478179111,1478179111,1478179111,'2',NULL,NULL),(23,'笔记本',18,9,'我的电脑最近出现蓝屏情况，每次蓝屏代码还都不一样，希望有大神助我，请吃饭勾搭可以吗(๑•ั็ω•็ั๑)',1478179115,1478179115,1478179115,'2',NULL,NULL),(24,'笔记本',19,9,'华硕FX50J   电脑清灰，电脑有时候会出现蓝屏。（蓝屏问题能不能解决看命啦）重点是清灰，求帮助~~蟹蟹',1478181165,1478181165,1478181165,'2',NULL,NULL),(25,'笔记本',20,9,'电脑刷完一次机之后很卡，不知道怎么了',1478185649,1478185649,1478185649,'2',NULL,NULL),(26,'笔记本',20,9,'电脑经常卡  有时候就自动死机了不知道是不是  硬盘坏了',1478224812,1478224812,1478224812,'2',NULL,NULL),(27,'笔记本',21,9,'清灰和电脑卡顿',1478222005,1478222005,1478222005,'2',NULL,NULL),(28,'笔记本',22,9,'电脑运行缓慢，太久没清灰，系统感觉不太稳定',1478234616,1478234616,1478234616,'2',NULL,NULL),(29,'笔记本',23,9,'电脑卡到不行，感觉已经无法正常使用了，尤其是用wps的时候，打开一个wps整个电脑会变得特别卡，然后360显示内存占用到99%',1478248321,1478248321,1478248321,'2',NULL,NULL),(30,'笔记本',24,9,'电脑太卡，想清理一下，提高运行速度',1478256990,1478256990,1478256990,'2',NULL,NULL),(31,'笔记本',25,9,'电脑清灰，联想拯救者14',1478264485,1478264485,1478264485,'2',NULL,NULL),(32,'笔记本',26,9,'惠普暗夜精灵2',1478268428,1478268428,1478268428,'2',NULL,NULL),(33,'笔记本',26,9,'惠普暗夜精灵2',1478323820,1478323820,1478323820,'2',NULL,NULL),(34,'笔记本',27,9,'华硕笔记本，电脑最近英雄联盟老联不进去，而且发现电脑速度变慢。',1478276609,1478276609,1478276609,'2',NULL,NULL),(35,'笔记本',28,9,'清灰  软件问题',1478320596,1478320596,1478320596,'2',NULL,NULL),(36,'笔记本',29,9,'清灰',1478321224,1478321224,1478321224,'2',NULL,NULL),(37,'笔记本',30,9,'散热不好',1478321734,1478321734,1478321734,'2',NULL,NULL),(38,'笔记本',31,9,'拆机清灰',1478322524,1478322524,1478322524,'2',NULL,NULL),(39,'笔记本',32,9,'清除一些软件，下载并留下一些必要软件就行。',1478268856,1478268856,1478268856,'2',NULL,NULL),(40,'笔记本',33,9,'清灰尘',1478325611,1478325611,1478325611,'2',NULL,NULL),(41,'笔记本',34,9,'故障排查，清灰',1478325846,1478325846,1478325846,'2',NULL,NULL),(42,'笔记本',35,9,'软件安装问题维地，CAD',1478325857,1478325857,1478325857,'2',NULL,NULL),(43,'笔记本',36,9,'安装破解版的ps软件',1478326520,1478326520,1478326520,'2',NULL,NULL),(44,'笔记本',37,9,'软件故障，清灰',1478326905,1478326905,1478326905,'2',NULL,NULL),(45,'笔记本',38,9,'想做win10系统',1478327099,1478327099,1478327099,'2',NULL,NULL),(46,'笔记本',39,9,'mbp 装的wps不能用怎么办呀',1478327376,1478327376,1478327376,'2',NULL,NULL),(47,'笔记本',40,9,'装内存条',1478328140,1478328140,1478328140,'2',NULL,NULL),(48,'笔记本',41,9,'苹果MacBook 2012版，mac os系统运行占cpu超高，87％左右，所以巨卡。',1478329205,1478329205,1478329205,'2',NULL,NULL),(49,'笔记本',42,9,'c盘内存越来越小',1478329226,1478329226,1478329226,'2',NULL,NULL),(50,'笔记本',43,9,'系统安装',1478330411,1478330411,1478330411,'2',NULL,NULL),(51,'笔记本',43,9,'你好，刚刚重装系统因为要在有电源情况下才可以，所以没能装好，不知道你们什么时候有时间可以来七号楼帮我再装一下，谢谢',1478332594,1478332594,1478332594,'2',NULL,NULL),(52,'笔记本',44,9,'运行速度慢，部分键盘按键失灵。',1478330609,1478330609,1478330609,'2',NULL,NULL),(53,'笔记本',45,9,'开不了机',1478333069,1478333069,1478333069,'2',NULL,NULL),(54,'笔记本',46,9,'清灰',1478333664,1478333664,1478333664,'2',NULL,NULL),(55,'笔记本',47,9,'电脑清灰',1478334339,1478334339,1478334339,'2',NULL,NULL),(56,'笔记本',48,9,'灰尘清理',1478334394,1478334394,1478334394,'2',NULL,NULL),(57,'笔记本',49,9,'灰尘清理',1478334615,1478334615,1478334615,'2',NULL,NULL),(58,'笔记本',50,9,'电脑自带Microsoft office 软件激活过运行7天变成未授权，不能用了。联想笔记本。另外，电脑特别卡，买来的时候就有点卡，c 盘不知道怎么清理。',1478335737,1478335737,1478335737,'2',NULL,NULL),(59,'笔记本',51,9,'电脑开机困难',1478335997,1478335997,1478335997,'2',NULL,NULL),(60,'笔记本',52,9,'win10系统换win8',1478336190,1478336190,1478336190,'2',NULL,NULL),(61,'笔记本',53,9,'渲染设备丢失，开机慢，电脑变卡',1478336364,1478336364,1478336364,'2',NULL,NULL),(62,'笔记本',54,9,'惠普 电脑风扇声音大',1478337016,1478337016,1478337016,'2',NULL,NULL),(63,'笔记本',54,9,'惠普 电脑开机就成灰屏了，也没反应\r\n电脑重启不了',1482467870,1482467870,1482467870,'2',NULL,NULL),(64,'笔记本',55,9,'笔记本外接显示器不亮了，当把显示器和笔记本连接后，笔记本的屏幕也不亮了，把VGA线拔下来笔记本的屏幕就可以亮了，我觉得应该是显示器坏了',1478337599,1478337599,1478337599,'2',NULL,NULL),(65,'笔记本',56,9,'c盘空间太小',1478337933,1478337933,1478337933,'2',NULL,NULL),(66,'笔记本',57,9,'装ps',1478338825,1478338825,1478338825,'2',NULL,NULL),(67,'笔记本',58,9,'电脑卡顿，玩游戏十分不流畅，QQ空间有时候打不开，QQ农场进不去',1478344014,1478344014,1478344014,'2',NULL,NULL),(68,'笔记本',59,9,'电脑需要安装一些Word，office，PS那些软件。',1478357136,1478357136,1478357136,'2',NULL,NULL),(69,'笔记本',60,9,'清灰',1478411867,1478411867,1478411867,'2',NULL,NULL),(70,'笔记本',61,9,'重装系统',1478416775,1478416775,1478416775,'2',NULL,NULL),(71,'笔记本',62,13,'就是清个灰',1478424482,1478424482,1478424482,'2',NULL,NULL),(72,'笔记本',63,8,'电脑可以连接WiFi，但上不了网，，，，，，，！',1478427098,1478427098,1478427098,'2',NULL,NULL),(73,'笔记本',64,8,'戴尔灵越7559',1478437907,1478437907,1478437907,'2',NULL,NULL),(74,'笔记本',65,7,'我的是安装了win10系统的DELL电脑，所出现的问题是1.无法打开pdf文件与照片\r\n2.开机后右下角有时无法显现声音或wifi标志\r\n3.关机时偶尔会更新但始终更新失败（已经设置了不更新）',1478506064,1478506064,1478506064,'2',NULL,NULL),(75,'笔记本',66,16,'我希望能帮忙安装并破解pr,ae',1478506467,1478506467,1478506467,'2',NULL,NULL),(76,'笔记本',67,9,'笔记本安装上了ssd，后续4k对齐工作无法确认是否正确，求帮助，装系统的优盘已经准备好，求大神带飞。。。',1478600448,1478600448,1478600448,'2',NULL,NULL),(77,'笔记本',68,7,'dell装系统windows7和windows8多次都没装成。',1478780664,1478780664,1478780664,'2',NULL,NULL),(78,'台式机',69,9,'    主机启动不了 ',1478842451,1478842451,1478842451,'2',NULL,NULL),(79,'笔记本',70,16,'型号:联想天逸100-141BD\r\n想重装win10。\r\n备份系统被玩坏了，无法一键还原',1478877629,1478877629,1478877629,'2',NULL,NULL),(80,'笔记本',71,9,'战神k650d7清灰',1478951906,1478951906,1478951906,'2',NULL,NULL),(81,'笔记本',72,9,'戴尔 刚买的 感觉有点卡win8系统',1479124961,1479124961,1479124961,'2',NULL,NULL),(82,'台式机',73,9,'台式电脑，开机无显示。',1479184926,1479184926,1479184926,'2',NULL,NULL),(83,'台式机',73,9,'台式电脑，开机无显示。',1479184926,1479184926,1479184926,'2',NULL,NULL),(84,'笔记本',74,9,'电脑屏幕一直处于屏保状态，进不了桌面。',1479221153,1479221153,1479221153,'2',NULL,NULL),(85,'笔记本',75,9,'电脑C盘总是很满，（我已经尽力把应用装到D盘了）\r\n',1479262101,1479262101,1479262101,'2',NULL,NULL),(86,'笔记本',76,9,'更改了电脑的一些参数设置，然后电脑开机就黑屏，这剩下了一个鼠标箭头',1479271724,1479271724,1479271724,'2',NULL,NULL),(87,'笔记本',77,9,'因为换了一个新硬盘，所以需要装一个win7的系统',1479354003,1479354003,1479354003,'2',NULL,NULL),(88,'笔记本',78,9,'有的时候很卡，问题很多啊。',1479354182,1479354182,1479354182,'2',NULL,NULL),(89,'笔记本',79,9,'win10一直蓝屏重启',1479355432,1479355432,1479355432,'2',NULL,NULL),(90,'笔记本',80,9,'安装office,photoshop,CAD,vegas软件，',1479355941,1479355941,1479355941,'2',NULL,NULL),(91,'笔记本',81,9,'开不了机，可能进水了，我有点不确定',1479358024,1479358024,1479358024,'2',NULL,NULL),(92,'笔记本',82,9,'华硕A555l',1479365017,1479365017,1479365017,'2',NULL,NULL),(93,'笔记本',83,9,'戴尔，win10系统，忘记密码无法登录',1479366116,1479366116,1479366116,'2',NULL,NULL),(94,'笔记本',84,9,'连不上校园网 ',1479368077,1479368077,1479368077,'2',NULL,NULL),(95,'笔记本',85,9,'华硕windows10 开机后屏幕一直闪，无法操作',1479376580,1479376580,1479376580,'2',NULL,NULL),(96,'笔记本',86,9,'系统卡顿，想重装系统，然后再帮忙装下cad软件吧，电脑为联想z 580，谢啦',1479649196,1479649196,1479649196,'2',NULL,NULL),(97,'笔记本',87,9,'显卡故障',1478170609,1478170609,1478170609,'2',NULL,NULL),(98,'笔记本',88,9,'打英雄联盟老是掉线，是不是系统不行了',1480235603,1480235603,1480235603,'2',NULL,NULL),(99,'笔记本',89,7,'希望帮助安装一个固态硬盘，并且想把win10系统装在固态硬盘上，谢谢',1480347065,1480347065,1480347065,'2',NULL,NULL),(100,'笔记本',89,7,'在DELL笔记本上想加一个固态硬盘，再安装一下系统',1480385505,1480385505,1480385505,'2',NULL,NULL),(101,'笔记本',90,9,'清灰，内存不足问题\r\n',1480390827,1480390827,1480390827,'2',NULL,NULL),(102,'笔记本',91,9,'清灰 杀毒',1480390883,1480390883,1480390883,'2',NULL,NULL),(103,'笔记本',92,9,'电脑容易卡机，出现死机问题，打开电脑时桌面上会出现一些之前没有的图标，打开之后是一个网址。',1480390901,1480390901,1480390901,'2',NULL,NULL),(104,'笔记本',93,9,'电脑卡，WIFI功能不好用，有时连不上或掉线，以前让同学重装系统失败了，我不太懂，希望能让大神再重装一下系统。',1480405596,1480405596,1480405596,'2',NULL,NULL),(105,'笔记本',94,9,'我的电脑是比较老的戴尔 然后一打开就蓝屏说让我重启一下 重启了还是蓝屏 网上说是硬件有问题',1480415291,1480415291,1480415291,'2',NULL,NULL),(106,'笔记本',95,9,'Lenovos41    win10电脑键乱键，就是中间的一些键会显示别的，比如输入i会显示w这样',1480669389,1480669389,1480669389,'2',NULL,NULL),(107,'笔记本',96,9,'电脑网卡驱动升级后上不了网了',1480823975,1480823975,1480823975,'2',NULL,NULL),(108,'笔记本',97,9,'戴尔灵越5000   连不上wifi，时好时坏',1480849752,1480849752,1480849752,'2',NULL,NULL),(109,'笔记本',97,9,'戴尔灵越5000   连不上wifi，时好时坏',1480849772,1480849772,1480849772,'2',NULL,NULL),(110,'笔记本',98,9,'总是开机之后就黑屏。。',1480862628,1480862628,1480862628,'2',NULL,NULL),(111,'笔记本',99,9,'windows 10 开机黑屏',1480862775,1480862775,1480862775,'2',NULL,NULL),(112,'笔记本',100,9,'登录后电脑黑屏，但是内存释放器还在，也能正常使用',1480948503,1480948503,1480948503,'2',NULL,NULL),(113,'笔记本',101,9,'苹果Mac Pro \r\n电脑卡顿严重',1480990237,1480990237,1480990237,'2',NULL,NULL),(114,'笔记本',102,16,'win7一直停留在欢迎界面转圈，进不了系统。',1481190755,1481190755,1481190755,'2',NULL,NULL),(115,'笔记本',103,1,'哈哈哈哈',1474287610,1474287610,1474287610,'2',NULL,NULL),(116,'笔记本',104,9,'重装系统',1481465311,1481465311,1481465311,'2',NULL,NULL),(117,'笔记本',105,9,'我的背光键盘不亮了，原来亮，后来不亮了，',1481529207,1481529207,1481529207,'2',NULL,NULL),(118,'笔记本',106,9,'电脑突然黑屏，没办法启动和关机，',1481690886,1481690886,1481690886,'2',NULL,NULL),(119,'笔记本',107,16,'电脑开机显示\r\nReboot and Select proper Boot device or Insert Boot Media in selected Boot device and press a key\r\n玩游戏FPS值很低\r\n电脑也有很多灰\r\n电脑型号\r\n华硕K53T',1482027822,1482027822,1482027822,'2',NULL,NULL),(120,'笔记本',108,16,'我开机的时候它显示自动修复无法修复此计算机，然后然后重启了好几次都是这样，Windows 10，拜托啦，比心比心',1482107860,1482107860,1482107860,'2',NULL,NULL),(121,'笔记本',109,9,'华硕x53s，用了3年以上，开机黑屏',1482384607,1482384607,1482384607,'2',NULL,NULL),(122,'笔记本',110,9,'Wbin ux2c ',1478337081,1478337081,1478337081,'2',NULL,NULL),(123,'笔记本',111,9,'电脑连不上WiFi',1482752072,1482752072,1482752072,'2',NULL,NULL),(124,'笔记本',112,9,'需要重新安装系统',1482894992,1482894992,1482894992,'2',NULL,NULL);
/*!40000 ALTER TABLE `list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repairer`
--

DROP TABLE IF EXISTS `repairer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repairer` (
  `rid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `rname` varchar(5) NOT NULL,
  `rpw` varchar(32) NOT NULL,
  `rtel` char(11) DEFAULT NULL,
  `rqq` char(11) DEFAULT NULL,
  `rtimes` tinyint(4) DEFAULT '0',
  `rsign` varchar(140) DEFAULT NULL,
  `ryear` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repairer`
--

LOCK TABLES `repairer` WRITE;
/*!40000 ALTER TABLE `repairer` DISABLE KEYS */;
INSERT INTO `repairer` VALUES (1,'李浩然','e10adc3949ba59abbe56e057f20f883e','18729225597','599389535',2,'未填写',2014),(2,'白清宇','da2b58cd9b86de933633db61f4ccece0',NULL,NULL,6,NULL,2015),(3,'张倩倩','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,0,NULL,2016),(4,'王雅仕','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,0,NULL,2016),(5,'刘冲','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,0,NULL,2016),(6,'邹成禹','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,0,NULL,2016),(7,'李昭男','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,4,NULL,2016),(8,'管鹏博','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,2,NULL,2016),(9,'李晴','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,103,NULL,2015),(10,'张成思','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,0,NULL,2015),(11,'李英豪','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,0,NULL,2015),(12,'孙明晨','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,0,NULL,2015),(13,'袁欣如','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,2,NULL,2016),(14,'赖坤豪','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,0,NULL,2016),(15,'夏全虎','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,0,NULL,2016),(16,'史文凯','fdc92af92935782fe36e65eab1e35851',NULL,NULL,5,NULL,2016),(17,'郑连民','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,0,NULL,2015);
/*!40000 ALTER TABLE `repairer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(5) NOT NULL,
  `ustunum` char(12) DEFAULT NULL,
  `uapart` tinyint(4) NOT NULL,
  `utel` char(11) NOT NULL,
  `utimes` tinyint(4) DEFAULT '0',
  `openId` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `utel` (`utel`),
  UNIQUE KEY `openId` (`openId`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'王苗苗',NULL,6,'13609282923',0,NULL),(2,'程乐',NULL,15,'18792775589',0,NULL),(3,'胡自群',NULL,12,'13572133910',0,NULL),(4,'刘建明',NULL,15,'15129396851',0,NULL),(5,'郑连民',NULL,15,'13201521650',0,NULL),(6,'吕婉毓',NULL,8,'13299161315',0,NULL),(7,'杨国华',NULL,15,'15877515721',0,NULL),(8,'杜思佳',NULL,14,'18292043892',0,NULL),(9,'张梦寒',NULL,7,'13571885474',0,NULL),(10,'朱秀蕊',NULL,6,'18309202059',0,NULL),(11,'彭廷龙',NULL,15,'13201525001',0,NULL),(12,'张洪铭',NULL,1,'13152480670',0,NULL),(13,'舒瑜晗',NULL,14,'18792503027',0,NULL),(14,'李',NULL,13,'18706876401',0,NULL),(15,'王璐璐',NULL,8,'13571886979',0,NULL),(16,'h',NULL,8,'13572068965',0,NULL),(17,'耿新瑞',NULL,6,'15029999775',0,NULL),(18,'向钰琳',NULL,7,'13572081762',0,NULL),(19,'张钰瑶',NULL,7,'18729283766',0,NULL),(20,'罗保洋',NULL,4,'13201530105',0,NULL),(21,'环工黄永涛',NULL,9,'13571895952',0,NULL),(22,'马晨',NULL,16,'18829890166',0,NULL),(23,'颜思源',NULL,4,'18302996319',0,NULL),(24,'刘峥',NULL,5,'15092579597',0,NULL),(25,'魏浩',NULL,16,'13149201279',0,NULL),(26,'张金蕊',NULL,5,'15029753282',0,NULL),(27,'薛勇',NULL,15,'18149391780',0,NULL),(28,'黄纲发',NULL,11,'18229098763',0,NULL),(29,'袁翼',NULL,4,'18291938029',0,NULL),(30,'董欣艺',NULL,5,'15619228428',0,NULL),(31,'朱桦',NULL,6,'15129012915',0,NULL),(32,'刘东梅',NULL,5,'15229889979',0,NULL),(33,'邓添荣',NULL,4,'15191578838',0,NULL),(34,'赵艳荣',NULL,14,'18292004798',0,NULL),(35,'杨帅',NULL,7,'18740460309',0,NULL),(36,'张若晖',NULL,6,'18220862292',0,NULL),(37,'靳坤鹏',NULL,13,'18829278332',0,NULL),(38,'汪守洋',NULL,15,'13609256916',0,NULL),(39,'姜琛',NULL,6,'18202929962',0,NULL),(40,'李玉峰',NULL,15,'18220830396',0,NULL),(41,'杨玉州',NULL,5,'18209218011',0,NULL),(42,'李闪',NULL,12,'13571902325',0,NULL),(43,'帅水琴',NULL,7,'18821799010',0,NULL),(44,'张煜杰',NULL,4,'18291899697',0,NULL),(45,'张晶',NULL,6,'18049228851',0,NULL),(46,'单佳欣',NULL,13,'13259967905',0,NULL),(47,'王宏',NULL,16,'18392567450',0,NULL),(48,'蒋春宇',NULL,16,'18292007773',0,NULL),(49,'杨郅涵',NULL,16,'18133969758',0,NULL),(50,'钱寒雨',NULL,17,'15129242110',0,NULL),(51,'李泽鹏',NULL,4,'15291912859',0,NULL),(52,'陆星宇',NULL,17,'13032929829',0,NULL),(53,'朱安江',NULL,10,'18092418307',0,NULL),(54,'黄泽',NULL,9,'13572081258',0,NULL),(55,'孔庆丰',NULL,16,'18392003845',0,NULL),(56,'刘璐',NULL,4,'13572985907',0,NULL),(57,'吴宏伟',NULL,2,'17791524198',0,NULL),(58,'袁帅帅',NULL,15,'17792619138',0,NULL),(59,'罗崔月',NULL,14,'13032985360',0,NULL),(60,'王召月',NULL,14,'18829041062',0,NULL),(61,'孙淑媛',NULL,7,'18292889184',0,NULL),(62,'刘鑫',NULL,12,'13572015283',0,NULL),(63,'刘德闯',NULL,13,'18191216013',0,NULL),(64,'盛赢',NULL,15,'18724678071',0,NULL),(65,'杜佳',NULL,8,'15291855980',0,NULL),(66,'易远铨',NULL,13,'13572018353',0,NULL),(67,'杨梦超',NULL,12,'13180058332',0,NULL),(68,'周万里',NULL,15,'18429013225',0,NULL),(69,'左阳之',NULL,14,'18729338131',0,NULL),(70,'孙浩',NULL,15,'15102977603',0,NULL),(71,'王忠毅',NULL,9,'13572023168',0,NULL),(72,'刘悦伟',NULL,15,'15076163139',0,NULL),(73,'赵裕民',NULL,2,'15399483560',0,NULL),(74,'贺刘壮',NULL,15,'18792951193',0,NULL),(75,'陈丽',NULL,14,'15291985215',0,NULL),(76,'洪涛',NULL,9,'18792597029',0,NULL),(77,'李丹宏',NULL,2,'13572085655',0,NULL),(78,'王禹',NULL,15,'17780182127',0,NULL),(79,'孙元哲',NULL,11,'18292004489',0,NULL),(80,'王旗',NULL,15,'15858174645',0,NULL),(81,'杨荣',NULL,9,'18829039078',0,NULL),(82,'欧艳',NULL,14,'13689243547',0,NULL),(83,'王玮瑛',NULL,8,'17792620628',0,NULL),(84,'黄雨薇',NULL,14,'18309258114',0,NULL),(85,'黄长峰',NULL,9,'13479929341',0,NULL),(86,'徐树朋',NULL,13,'18829037228',0,NULL),(87,'刘世雄',NULL,16,'18292004350',0,NULL),(88,'赵旭晗',NULL,12,'18982741432',0,NULL),(89,'杨欣岸',NULL,13,'18792870806',0,NULL),(90,'邹东晓',NULL,8,'13572012355',0,NULL),(91,'樊鑫',NULL,8,'15085402644',0,NULL),(92,'孔丽琼',NULL,8,'18302996626',0,NULL),(93,'李琨鹏',NULL,12,'13636718287',0,NULL),(94,'李晨',NULL,5,'18632751015',0,NULL),(95,'黄培培',NULL,14,'13572017859',0,NULL),(96,'段倩冰',NULL,14,'13193385987',0,NULL),(97,'孟茹',NULL,14,'18729575649',0,NULL),(98,'崔金玉',NULL,6,'15102965690',0,NULL),(99,'马志鹏',NULL,15,'15229350676',0,NULL),(100,'谯磊',NULL,15,'18291626170',0,NULL),(101,'张婧雅',NULL,6,'18974971812',0,NULL),(102,'木尼热',NULL,14,'18792712738',0,NULL),(103,'石妍',NULL,14,'18829891324',0,'1'),(104,'田文静',NULL,14,'14729022518',0,NULL),(105,'许梦凡',NULL,14,'18165360301',0,NULL),(106,'闫珍珍',NULL,14,'18229015376',0,NULL),(107,'刘伟平',NULL,12,'13572025612',0,NULL),(108,'周雨',NULL,7,'15229058716',0,NULL),(109,'罗红梅',NULL,5,'18292880013',0,NULL),(110,'田一粟',NULL,2,'13572955213',0,NULL),(111,'李钰',NULL,7,'13609167667',0,NULL),(112,'冉红',NULL,9,'18009248087',0,NULL),(113,'李浩然','201424060120',15,'18729225597',0,'1234567890098765432112345678'),(120,'李浩然','201424060120',12,'[object HTM',0,'1234567890098765432112345670');
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

-- Dump completed on 2017-02-17 18:28:02