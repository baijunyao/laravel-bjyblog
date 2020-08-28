-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: 127.0.0.1	Database: sql_v6_8_0
-- ------------------------------------------------------
-- Server version 	8.0.19
-- Date: Sun, 09 Aug 2020 14:53:57 +0800

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
-- Table structure for table `bjy_article_tags`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_article_tags` (
  `article_id` int unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `tag_id` int unsigned NOT NULL DEFAULT '0' COMMENT '标签id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_article_tags`
--

LOCK TABLES `bjy_article_tags` WRITE;
/*!40000 ALTER TABLE `bjy_article_tags` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_article_tags` VALUES (1,1,'2017-07-17 23:35:12','2016-07-17 23:35:12',NULL),(2,2,'2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_article_tags` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_article_tags` with 2 row(s)
--

--
-- Table structure for table `bjy_articles`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_articles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '文章表主键',
  `category_id` tinyint(1) NOT NULL DEFAULT '0' COMMENT '分类id',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'slug',
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '作者',
  `markdown` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'markdown文章内容',
  `html` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'markdown转的html页面',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '关键词',
  `cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '封面图',
  `is_top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否置顶 1是 0否',
  `click` int unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_articles`
--

LOCK TABLES `bjy_articles` WRITE;
/*!40000 ALTER TABLE `bjy_articles` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_articles` VALUES (1,1,'欢迎使用 laravel-bjyblog','welcome-to-laravel-bjyblog','白俊遥','1. [切换语言](https://baijunyao.com/docs/laravel-bjyblog/其他配置.html)\n![](/uploads/article/5d9829577d311.png)\n2. [清空测试数据](https://baijunyao.com/docs/laravel-bjyblog/清空测试数据.html)\n3. [升级版本](https://baijunyao.com/docs/laravel-bjyblog/升级版本.html)','<ol>\n<li>\n<a href=\"https://baijunyao.com/docs/laravel-bjyblog/%E5%85%B6%E4%BB%96%E9%85%8D%E7%BD%AE.html\">切换语言</a>\n<img src=\"/uploads/article/5d9829577d311.png\" alt=\"\" />\n</li>\n<li>\n<a href=\"https://baijunyao.com/docs/laravel-bjyblog/%E6%B8%85%E7%A9%BA%E6%B5%8B%E8%AF%95%E6%95%B0%E6%8D%AE.html\">清空测试数据</a>\n</li>\n<li>\n<a href=\"https://baijunyao.com/docs/laravel-bjyblog/%E5%8D%87%E7%BA%A7%E7%89%88%E6%9C%AC.html\">升级版本</a>\n</li>\n</ol>\n','欢迎使用 laravel-bjyblog','laravel','/uploads/article/5d9829577d311.png',1,666,'2017-07-15 23:35:12','2016-07-15 23:35:12',NULL),(2,1,'已删除','deleted','白俊遥','内容','内容','描述','test','/uploads/article/5d9829577d311.png',0,222,'2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12'),(3,1,'Welcome to laravel-bjyblog','welcome-to-laravel-bjyblog','baijunyao','1. [Switch language](https://baijunyao.com/docs/laravel-bjyblog/en/OtherConfig.html)\n![](/uploads/article/5d9829577d311.png)\n2. [Clear test data](https://baijunyao.com/docs/laravel-bjyblog/en/ClearTestData.html)\n3. [Upgrade version](https://baijunyao.com/docs/laravel-bjyblog/en/Upgrade.html)','<ol>\n<li>\n<a href=\"https://baijunyao.com/docs/laravel-bjyblog/en/OtherConfig.html\">Switch language</a>\n<img src=\"/uploads/article/5d9829577d311.png\" alt=\"\" />\n</li>\n<li>\n<a href=\"https://baijunyao.com/docs/laravel-bjyblog/en/ClearTestData.html\">Clear test data</a>\n</li>\n<li>\n<a href=\"https://baijunyao.com/docs/laravel-bjyblog/en/Upgrade.html\">Upgrade version</a>\n</li>\n</ol>\n','welcome to laravel-bjyblog','laravel-bjyblog','/uploads/article/5d9829577d311.png',0,333,'2019-10-05 06:35:12','2019-10-05 06:35:12',NULL);
/*!40000 ALTER TABLE `bjy_articles` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_articles` with 3 row(s)
--

--
-- Table structure for table `bjy_categories`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '分类主键id',
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '分类名称',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'slug',
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '关键词',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `sort` tinyint(1) NOT NULL DEFAULT '0' COMMENT '排序',
  `pid` tinyint(1) NOT NULL DEFAULT '0' COMMENT '父级栏目id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_categories`
--

LOCK TABLES `bjy_categories` WRITE;
/*!40000 ALTER TABLE `bjy_categories` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_categories` VALUES (1,'php','php','php','php相关的文章',1,0,'2017-07-15 23:35:12','2016-07-15 23:35:12',NULL),(2,'用于删除','for-deletion','用于删除','用于删除',2,0,'2019-01-04 08:35:12','2019-01-04 08:35:12',NULL),(3,'已删除','deleted','已删除','已删除',3,0,'2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_categories` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_categories` with 3 row(s)
--

--
-- Table structure for table `bjy_comments`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `socialite_user_id` int unsigned NOT NULL DEFAULT '0' COMMENT '评论用户id 关联socialite_user表的id',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：文章评论',
  `pid` int unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `article_id` int unsigned NOT NULL COMMENT '文章id',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `is_audited` tinyint(1) NOT NULL COMMENT '是否已经通过审核',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_comments`
--

LOCK TABLES `bjy_comments` WRITE;
/*!40000 ALTER TABLE `bjy_comments` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_comments` VALUES (1,1,1,0,1,'评论的内容',1,'2017-07-15 23:35:12','2016-07-15 23:35:12',NULL),(2,1,1,0,1,'已删除',1,'2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_comments` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_comments` with 2 row(s)
--

--
-- Table structure for table `bjy_configs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_configs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '配置项键名',
  `value` text COLLATE utf8_unicode_ci COMMENT '配置项键值 1表示开启 0 关闭',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_configs`
--

LOCK TABLES `bjy_configs` WRITE;
/*!40000 ALTER TABLE `bjy_configs` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_configs` VALUES (101,'app.name','白俊遥博客','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(102,'bjyblog.head.keywords','个人博客,博客模板,thinkphp,laravel博客,php博客,技术博客,白俊遥','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(103,'bjyblog.head.description','白俊遥的php博客,个人技术博客,bjyblog,bjyadmin官方网站','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(107,'bjyblog.water.text','baijunyao.com','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(109,'bjyblog.water.size','15','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(110,'bjyblog.water.color','#008CBA','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(117,'bjyblog.icp','豫ICP备14009546号-3','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(118,'bjyblog.admin_email','baijunyao@baijunyao.com','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(119,'bjyblog.copyright_word','本文为白俊遥原创文章,转载无需和我联系,但请注明来自<a href=\"http://baijunyao.com\">白俊遥博客</a>http://baijunyao.com','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(123,'bjyblog.statistics','','2018-08-25 09:04:02','2018-08-25 09:04:02',NULL),(125,'bjyblog.author','白俊遥','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(128,'bjyblog.baidu_site_url','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(141,'bjyblog.alt_word','白俊遥博客','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(142,'mail.host','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(143,'mail.username','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(144,'mail.password','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(145,'mail.from.name','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(148,'bjyblog.notification_email','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(149,'bjyblog.head.title','白俊遥博客,技术博客,个人博客模板, php博客系统','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(150,'bjyblog.qq_qun.article_id','1','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(151,'bjyblog.qq_qun.number','88199093','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(152,'bjyblog.qq_qun.code','<a target=\"_blank\" href=\"//shang.qq.com/wpa/qunwpa?idkey=bba3fea90444ee6caf1fb1366027873fe14e86bada254d41ce67768fadd729ee\"><img border=\"0\" src=\"//pub.idqqimg.com/wpa/images/group.png\" alt=\"白俊遥博客群\" title=\"白俊遥博客群\"></a>','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(153,'bjyblog.qq_qun.or_code','/uploads/images/default.png','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(154,'mail.driver','smtp','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(155,'mail.port','465','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(156,'mail.encryption','ssl','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(157,'mail.from.address','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(158,'sentry.dsn','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(159,'database.connections.mysql.dump.dump_binary_path','/bin/','2018-12-03 13:39:22','2018-12-03 13:39:22',NULL),(160,'filesystems.disks.oss.access_id','','2018-12-04 14:29:52','2018-12-04 14:29:52',NULL),(161,'filesystems.disks.oss.access_key','','2018-12-04 14:29:52','2018-12-04 14:29:52',NULL),(162,'filesystems.disks.oss.bucket','','2018-12-04 14:29:52','2018-12-04 14:29:52',NULL),(163,'filesystems.disks.oss.endpoint','','2018-12-04 14:29:52','2018-12-04 14:29:52',NULL),(164,'backup.backup.destination.disks','[]','2018-12-04 14:29:52','2018-12-04 14:29:52',NULL),(165,'backup.notifications.mail.to','','2018-12-04 14:29:52','2018-12-04 14:29:52',NULL),(166,'app.locale','en','2019-02-26 13:10:52','2019-02-26 13:10:52',NULL),(167,'bjyblog.seo.use_slug','false','2019-05-19 11:43:00','2019-05-19 11:43:00',NULL),(168,'bjyblog.social_share.select_plugin','sharejs','2019-05-27 14:22:00','2019-05-27 14:22:00',NULL),(169,'bjyblog.social_share.jssocials_config','{\n    shares: [\"email\", \"twitter\", \"facebook\", \"googleplus\", \"linkedin\", \"pinterest\", \"stumbleupon\", \"pocket\", \"whatsapp\", \"messenger\", \"vkontakte\", \"telegram\", \"line\"],\n    showLabel: false,\n    showCount: false,\n    shareIn: \"popup\"\n}','2019-05-27 14:22:00','2019-05-27 14:22:00',NULL),(170,'bjyblog.social_share.sharejs_config','{\n    sites: [\"weibo\", \"qq\", \"wechat\", \"douban\", \"qzone\", \"linkedin\", \"facebook\", \"twitter\", \"google\"]\n}','2019-05-27 14:22:00','2019-05-27 14:22:00',NULL),(171,'bjyblog.logo_with_php_tag','true','2019-05-28 15:15:00','2019-05-28 15:15:00',NULL),(172,'bjyblog.cdn_domain','','2019-08-05 14:15:00','2019-08-05 14:15:00',NULL),(173,'bjyblog.comment_audit','false','2019-10-21 14:45:00','2019-10-21 14:45:00',NULL),(174,'services.baidu.appid','','2019-10-21 14:45:00','2019-10-21 14:45:00',NULL),(175,'services.baidu.appkey','','2019-10-21 14:45:00','2019-10-21 14:45:00',NULL),(176,'services.baidu.secret','','2019-10-21 14:45:00','2019-10-21 14:45:00',NULL),(177,'scout.driver','null','2019-11-19 14:45:00','2019-11-19 14:45:00',NULL),(178,'scout.elasticsearch.prefix','laravel_','2019-11-19 14:45:00','2019-11-19 14:45:00',NULL),(179,'scout.elasticsearch.host','127.0.0.1','2019-11-19 14:45:00','2019-11-19 14:45:00',NULL),(180,'scout.elasticsearch.port','9200','2019-11-19 14:45:00','2019-11-19 14:45:00',NULL),(181,'scout.elasticsearch.scheme','http','2019-11-19 14:45:00','2019-11-19 14:45:00',NULL),(182,'scout.elasticsearch.user','null','2019-11-19 14:45:00','2019-11-19 14:45:00',NULL),(183,'scout.elasticsearch.pass','null','2019-11-19 14:45:00','2019-11-19 14:45:00',NULL),(184,'scout.elasticsearch.analyzer','ik_max_word','2019-11-19 14:45:00','2019-11-19 14:45:00',NULL),(185,'session.domain','','2019-12-14 02:49:00','2019-12-14 02:49:00',NULL),(186,'scout.algolia.id','','2019-12-16 14:45:00','2019-12-16 14:45:00',NULL),(187,'scout.algolia.secret','','2019-12-16 02:49:00','2019-12-16 02:49:00',NULL);
/*!40000 ALTER TABLE `bjy_configs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_configs` with 57 row(s)
--

--
-- Table structure for table `bjy_consoles`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_consoles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '名称',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_consoles`
--

LOCK TABLES `bjy_consoles` WRITE;
/*!40000 ALTER TABLE `bjy_consoles` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_consoles` VALUES (1,'App\\Console\\Commands\\Upgrade\\V5_5_5_0','2018-09-27 14:26:00','2018-09-27 14:26:00',NULL),(3,'App\\Console\\Commands\\Upgrade\\V5_5_6_0','2018-09-28 02:26:00','2018-09-28 02:26:00',NULL),(4,'App\\Console\\Commands\\Upgrade\\V5_5_7_0','2018-11-06 14:26:00','2018-11-06 14:26:00',NULL),(5,'App\\Console\\Commands\\Upgrade\\V5_5_8_0','2018-12-31 13:03:00','2018-12-31 13:03:00',NULL),(6,'App\\Console\\Commands\\Upgrade\\V5_5_9_0','2018-12-31 13:03:00','2018-12-31 13:03:00',NULL),(7,'App\\Console\\Commands\\Upgrade\\V5_5_10_0','2018-12-31 13:03:00','2018-12-31 13:03:00',NULL),(8,'App\\Console\\Commands\\Upgrade\\V5_5_11_0','2019-02-26 13:10:00','2019-02-26 13:10:00',NULL),(9,'App\\Console\\Commands\\Upgrade\\V5_8_1_0','2019-02-26 13:10:00','2019-02-26 13:10:00',NULL),(10,'App\\Console\\Commands\\Upgrade\\V5_8_2_0','2019-02-26 13:10:00','2019-02-26 13:10:00',NULL),(11,'App\\Console\\Commands\\Upgrade\\V5_8_3_0','2019-05-17 13:10:00','2019-05-17 13:10:00',NULL),(12,'App\\Console\\Commands\\Upgrade\\V5_8_4_0','2019-05-19 10:28:00','2019-05-19 10:28:00',NULL),(13,'App\\Console\\Commands\\Upgrade\\V5_8_5_0','2019-06-01 10:28:00','2019-06-01 10:28:00',NULL),(14,'App\\Console\\Commands\\Upgrade\\V5_8_6_0','2019-06-22 10:28:00','2019-06-22 10:28:00',NULL),(15,'App\\Console\\Commands\\Upgrade\\V5_8_7_0','2019-06-28 10:28:00','2019-06-28 10:28:00',NULL),(16,'App\\Console\\Commands\\Upgrade\\V5_8_8_0','2019-07-01 14:28:00','2019-07-01 14:28:00',NULL),(18,'App\\Console\\Commands\\Upgrade\\V5_8_9_0','2019-07-27 06:28:00','2019-07-27 06:28:00',NULL),(19,'App\\Console\\Commands\\Upgrade\\V5_8_10_0','2019-08-02 14:01:00','2019-08-02 14:01:00',NULL),(20,'App\\Console\\Commands\\Upgrade\\V5_8_11_0','2019-08-05 14:11:00','2019-08-05 14:11:00',NULL),(21,'App\\Console\\Commands\\Upgrade\\V6_0_0','2019-09-18 14:30:00','2019-09-18 14:30:00',NULL),(22,'App\\Console\\Commands\\Upgrade\\V6_1_0','2019-09-28 14:30:00','2019-09-28 14:30:00',NULL),(23,'App\\Console\\Commands\\Upgrade\\V6_2_0','2019-10-20 02:30:00','2019-10-20 02:30:00',NULL),(24,'App\\Console\\Commands\\Upgrade\\V6_3_0','2019-10-26 05:35:00','2019-10-26 05:35:00',NULL),(25,'App\\Console\\Commands\\Upgrade\\V6_4_0','2019-11-09 02:35:00','2019-11-09 02:35:00',NULL),(26,'App\\Console\\Commands\\Upgrade\\V6_5_0','2019-11-09 02:35:00','2019-11-09 02:35:00',NULL),(27,'App\\Console\\Commands\\Upgrade\\V6_6_0','2019-12-14 05:03:00','2019-12-14 05:03:00',NULL),(28,'App\\Console\\Commands\\Upgrade\\V6_7_0','2019-12-21 03:03:00','2019-12-21 03:03:00',NULL);
/*!40000 ALTER TABLE `bjy_consoles` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_consoles` with 26 row(s)
--

--
-- Table structure for table `bjy_failed_jobs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_failed_jobs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_failed_jobs`
--

LOCK TABLES `bjy_failed_jobs` WRITE;
/*!40000 ALTER TABLE `bjy_failed_jobs` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `bjy_failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_failed_jobs` with 0 row(s)
--

--
-- Table structure for table `bjy_followables`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_followables` (
  `socialite_user_id` bigint unsigned NOT NULL,
  `followable_id` int unsigned NOT NULL,
  `followable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `relation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'follow' COMMENT 'follow/like/subscribe/favorite/upvote/downvote',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `bjy_followables_followable_type_index` (`followable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_followables`
--

LOCK TABLES `bjy_followables` WRITE;
/*!40000 ALTER TABLE `bjy_followables` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `bjy_followables` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_followables` with 0 row(s)
--

--
-- Table structure for table `bjy_friendship_links`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_friendship_links` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '链接名',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '链接地址',
  `sort` tinyint(1) DEFAULT '1' COMMENT '排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_friendship_links`
--

LOCK TABLES `bjy_friendship_links` WRITE;
/*!40000 ALTER TABLE `bjy_friendship_links` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_friendship_links` VALUES (1,'白俊遥博客','https://baijunyao.com',1,'2017-07-15 23:35:12','2016-07-15 23:35:12',NULL),(2,'已删除','https://deleted.com',2,'2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_friendship_links` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_friendship_links` with 2 row(s)
--

--
-- Table structure for table `bjy_git_projects`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_git_projects` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '项目主键',
  `sort` tinyint NOT NULL DEFAULT '1' COMMENT '排序',
  `type` tinyint NOT NULL DEFAULT '1' COMMENT '1:github 2:gitee',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '项目名',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_git_projects`
--

LOCK TABLES `bjy_git_projects` WRITE;
/*!40000 ALTER TABLE `bjy_git_projects` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_git_projects` VALUES (1,1,1,'baijunyao/thinkphp-bjyadmin','2017-10-23 13:09:04','2017-10-26 13:42:40',NULL),(2,2,2,'baijunyao/thinkphp-bjyadmin','2017-10-26 13:43:07','2017-10-26 14:02:28',NULL),(3,3,1,'baijunyao/thinkphp-bjyblog','2017-10-26 13:43:26','2017-10-26 14:02:40',NULL),(4,4,2,'baijunyao/thinkbjy','2017-10-26 13:43:56','2017-10-26 14:02:59',NULL),(5,5,1,'baijunyao/laravel-bjyadmin','2017-10-26 14:03:15','2017-10-26 14:03:15',NULL),(6,6,1,'baijunyao/laravel-bjyblog','2017-10-26 14:03:23','2017-10-26 14:03:23',NULL),(7,7,2,'baijunyao/laravel-bjyadmin','2017-10-26 14:07:24','2017-10-26 14:07:59',NULL),(8,8,2,'baijunyao/laravel-bjyblog','2017-10-26 14:07:47','2017-10-26 14:08:04',NULL),(9,9,2,'deleted/deleted','2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_git_projects` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_git_projects` with 9 row(s)
--

--
-- Table structure for table `bjy_jobs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bjy_jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_jobs`
--

LOCK TABLES `bjy_jobs` WRITE;
/*!40000 ALTER TABLE `bjy_jobs` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `bjy_jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_jobs` with 0 row(s)
--

--
-- Table structure for table `bjy_migrations`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_migrations`
--

LOCK TABLES `bjy_migrations` WRITE;
/*!40000 ALTER TABLE `bjy_migrations` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2017_07_11_225347_create_article_tags_table',1),(9,'2017_07_11_225347_create_articles_table',1),(10,'2017_07_11_225347_create_categories_table',1),(11,'2017_07_11_225347_create_comments_table',1),(12,'2017_07_11_225347_create_configs_table',1),(13,'2017_07_11_225347_create_friendship_links_table',1),(14,'2017_07_11_225347_create_notes_table',1),(15,'2017_07_11_225347_create_socialite_users_table',1),(16,'2017_07_11_225347_create_tags_table',1),(17,'2017_08_26_211441_create_jobs_table',1),(18,'2017_08_26_212556_create_failed_jobs_table',1),(19,'2017_10_18_203752_create_git_projects_table',1),(20,'2018_06_29_032244_create_laravel_follow_tables',1),(21,'2018_08_01_191920_create_navs_table',1),(22,'2018_09_04_204500_create_sites_table',1),(23,'2018_09_26_144126_create_consoles_table',1),(24,'2019_05_07_225949_create_socialite_clients_table',1);
/*!40000 ALTER TABLE `bjy_migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_migrations` with 24 row(s)
--

--
-- Table structure for table `bjy_navs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_navs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单主键',
  `sort` tinyint NOT NULL DEFAULT '1' COMMENT '排序',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单名',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '链接',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_navs`
--

LOCK TABLES `bjy_navs` WRITE;
/*!40000 ALTER TABLE `bjy_navs` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_navs` VALUES (1,1,'随言碎语','note','2018-08-04 04:41:26','2018-08-04 04:41:26',NULL),(2,1,'开源项目','git','2018-08-04 04:41:26','2018-08-04 04:41:26',NULL),(3,1,'已删除','deleted','2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_navs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_navs` with 3 row(s)
--

--
-- Table structure for table `bjy_notes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_notes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_notes`
--

LOCK TABLES `bjy_notes` WRITE;
/*!40000 ALTER TABLE `bjy_notes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_notes` VALUES (1,'技术这东西；懂的越多；不懂的就越多；','2017-07-17 23:35:12','2016-07-17 23:35:12',NULL),(2,'已删除','2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_notes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_notes` with 2 row(s)
--

--
-- Table structure for table `bjy_oauth_access_tokens`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `client_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bjy_oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_oauth_access_tokens`
--

LOCK TABLES `bjy_oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `bjy_oauth_access_tokens` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `bjy_oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_oauth_access_tokens` with 0 row(s)
--

--
-- Table structure for table `bjy_oauth_auth_codes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `client_id` int unsigned NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_oauth_auth_codes`
--

LOCK TABLES `bjy_oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `bjy_oauth_auth_codes` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `bjy_oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_oauth_auth_codes` with 0 row(s)
--

--
-- Table structure for table `bjy_oauth_clients`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_oauth_clients` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bjy_oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_oauth_clients`
--

LOCK TABLES `bjy_oauth_clients` WRITE;
/*!40000 ALTER TABLE `bjy_oauth_clients` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_oauth_clients` VALUES (1,NULL,'白俊遥博客 Password Grant Client','','http://localhost',0,1,0,'2019-06-29 12:35:12','2019-06-29 12:35:12');
/*!40000 ALTER TABLE `bjy_oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_oauth_clients` with 1 row(s)
--

--
-- Table structure for table `bjy_oauth_personal_access_clients`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_oauth_personal_access_clients` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bjy_oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_oauth_personal_access_clients`
--

LOCK TABLES `bjy_oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `bjy_oauth_personal_access_clients` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `bjy_oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_oauth_personal_access_clients` with 0 row(s)
--

--
-- Table structure for table `bjy_oauth_refresh_tokens`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bjy_oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_oauth_refresh_tokens`
--

LOCK TABLES `bjy_oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `bjy_oauth_refresh_tokens` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `bjy_oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_oauth_refresh_tokens` with 0 row(s)
--

--
-- Table structure for table `bjy_password_resets`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `bjy_password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_password_resets`
--

LOCK TABLES `bjy_password_resets` WRITE;
/*!40000 ALTER TABLE `bjy_password_resets` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `bjy_password_resets` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_password_resets` with 0 row(s)
--

--
-- Table structure for table `bjy_sites`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_sites` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `socialite_user_id` int unsigned NOT NULL DEFAULT '0' COMMENT '第三方用户id',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '网站名',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '网站链接',
  `audit` tinyint NOT NULL DEFAULT '0' COMMENT '审核状态1为通过审核',
  `sort` tinyint NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_sites`
--

LOCK TABLES `bjy_sites` WRITE;
/*!40000 ALTER TABLE `bjy_sites` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_sites` VALUES (1,1,'白俊遥博客','白俊遥的个人博客','https://baijunyao.com',0,1,'2018-11-15 12:35:12','2018-11-15 12:35:12',NULL),(2,1,'已删除','用于测试','https://deleted.com',1,1,'2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_sites` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_sites` with 2 row(s)
--

--
-- Table structure for table `bjy_socialite_clients`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_socialite_clients` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `client_secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_socialite_clients`
--

LOCK TABLES `bjy_socialite_clients` WRITE;
/*!40000 ALTER TABLE `bjy_socialite_clients` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_socialite_clients` VALUES (1,'qq','qq','','','2019-05-08 14:13:54','2019-05-08 14:13:54',NULL),(2,'weibo','weibo','','','2019-05-08 14:13:54','2019-05-08 14:13:54',NULL),(3,'github','github','','','2019-05-08 14:13:54','2019-05-08 14:13:54',NULL),(4,'google','google','','','2019-05-14 15:26:38','2019-05-14 15:26:38',NULL),(5,'facebook','facebook','','','2019-05-14 15:26:38','2019-05-14 15:26:38',NULL),(6,'vkontakte','vk','','','2019-07-01 15:26:38','2019-07-01 15:26:38',NULL);
/*!40000 ALTER TABLE `bjy_socialite_clients` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_socialite_clients` with 6 row(s)
--

--
-- Table structure for table `bjy_socialite_users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_socialite_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `socialite_client_id` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型 1：QQ  2：新浪微博 3：github',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '第三方昵称',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '头像',
  `openid` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '第三方用户id',
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'access_token token',
  `last_login_ip` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `login_times` int unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是admin',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_socialite_users`
--

LOCK TABLES `bjy_socialite_users` WRITE;
/*!40000 ALTER TABLE `bjy_socialite_users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_socialite_users` VALUES (1,1,'白俊遥','/uploads/article/default.jpg','1','','127.0.0.1',1,'baijunyao@baijunyao.com',0,NULL,'2017-07-23 23:35:12','2017-07-23 23:35:12',NULL),(2,1,'已删除','/uploads/article/default.jpg','2','','127.0.0.1',1,'deleted@baijunyao.com',0,NULL,'2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_socialite_users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_socialite_users` with 2 row(s)
--

--
-- Table structure for table `bjy_tags`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_tags` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '标签主键',
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标签名',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'slug',
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标签的关键字',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标签的描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_tags`
--

LOCK TABLES `bjy_tags` WRITE;
/*!40000 ALTER TABLE `bjy_tags` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_tags` VALUES (1,'laravel','laravel','laravel','Laravel是一套简洁、优雅的PHP Web开发框架(PHP Web Framework)。它可以让你从面条一样杂乱的代码中解脱出来；它可以帮你构建一个完美的网络APP，而且每行代码都可以简洁、富于表达力。','2017-07-15 23:35:12','2016-07-15 23:35:12',NULL),(2,'test','test','test','测试描述','2019-01-04 07:35:12','2019-01-04 07:35:12',NULL),(3,'已删除','deleted','delete','删除的标签','2019-01-04 07:35:12','2019-01-04 07:35:12','2019-01-04 07:35:12');
/*!40000 ALTER TABLE `bjy_tags` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_tags` with 3 row(s)
--

--
-- Table structure for table `bjy_users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bjy_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_users`
--

LOCK TABLES `bjy_users` WRITE;
/*!40000 ALTER TABLE `bjy_users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_users` VALUES (1,'test','test@test.com',NULL,'$2y$10$Tih53j..gI0nuSuVvSzkIuCjzya7TYyEmHPmVhRdlcxAhX1yyDXWC',NULL,'2016-10-21 23:35:12','2016-10-21 23:35:12',NULL),(2,'已删除','deleted@test.com',NULL,'$2y$10$UHmp52cL32x45aoGO7HByeCWVn6mtLug2whJvjE7GwzibLrRKrwIa',NULL,'2019-01-04 07:35:12','2016-01-04 07:35:12','2016-01-04 07:35:12');
/*!40000 ALTER TABLE `bjy_users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_users` with 2 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Sun, 09 Aug 2020 14:53:57 +0800
