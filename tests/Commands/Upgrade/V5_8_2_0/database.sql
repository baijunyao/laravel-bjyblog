-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: 127.0.0.1	Database: sql_v5_8_2_0
-- ------------------------------------------------------
-- Server version 	8.0.19
-- Date: Sun, 09 Aug 2020 14:53:56 +0800

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_articles`
--

LOCK TABLES `bjy_articles` WRITE;
/*!40000 ALTER TABLE `bjy_articles` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_articles` VALUES (1,1,'写给 thinkphp 开发者的 laravel 系列教程 (一) 序言','白俊遥','终于；终于；终于；\n开始正式写 laravel 系列了；\n本系列教程主要面向的是多少懂点 thinkphp3.X 的开发者们；\n我把我从tp3转到laravel的历程转成一篇篇的文章教程；\n愿这一系列的文章；\n能成为童鞋们踏入laravel的引路人；\n\n如果还没下定决定要使用laravel；\n那么我上来就是一个连接；\n[关于 thinkphp 和 laravel 框架的选择](http://baijunyao.com/article/109)\n不是别人说好我也跟着说好的；\n而是我实实在在的使用过后；\n不断的发现 laravel 的优雅；\n真心喜欢；才这么推荐的；\n\n另外学习使用 laravel 不同于 thinkphp；\nthinkphp 的问题；百度一下基本都能解决；\nlaravel 一定要有一把梯子来翻墙；\ngoogle是必不可少的；\n现在体会不到没关系；\n咱边学边感受；\n最近一段时间大批的vpn被关停了；\n这里我推荐一款依然坚挺的；\n我一直在用的；\n也比较喜欢的`免费`翻墙软件；\n[推荐开发工具系列之 -- 翻墙软件 lantern](http://baijunyao.com/article/107)\n\n最后给童鞋们推荐比较不错的国内的laravel网站；\n[Laravel China 社区](https://laravel-china.org/)\n[Laravel 学院](http://laravelacademy.org/)\n[laravel速查表](https://cs.laravel-china.org/)\n\n种一棵树最好的时间是十年前；其次是现在；\n让我们开始吧；\n![laravel](/uploads/article/5958ab4dd9db4.jpg \"laravel\")','<p>终于；终于；终于；<br>开始正式写 laravel 系列了；<br>本系列教程主要面向的是多少懂点 thinkphp3.X 的开发者们；<br>我把我从tp3转到laravel的历程转成一篇篇的文章教程；<br>愿这一系列的文章；<br>能成为童鞋们踏入laravel的引路人；</p><p>如果还没下定决定要使用laravel；<br>那么我上来就是一个连接；<br><a href=\"http://baijunyao.com/article/109\">关于 thinkphp 和 laravel 框架的选择</a><br>不是别人说好我也跟着说好的；<br>而是我实实在在的使用过后；<br>不断的发现 laravel 的优雅；<br>真心喜欢；才这么推荐的；</p><p>另外学习使用 laravel 不同于 thinkphp；<br>thinkphp 的问题；百度一下基本都能解决；<br>laravel 一定要有一把梯子来翻墙；<br>google是必不可少的；<br>现在体会不到没关系；<br>咱边学边感受；<br>最近一段时间大批的vpn被关停了；<br>这里我推荐一款依然坚挺的；<br>我一直在用的；<br>也比较喜欢的<code>免费</code>翻墙软件；<br><a href=\"http://baijunyao.com/article/107\">推荐开发工具系列之 -- 翻墙软件 lantern</a></p><p>最后给童鞋们推荐比较不错的国内的laravel网站；<br><a href=\"https://laravel-china.org/\">Laravel China 社区</a><br><a href=\"http://laravelacademy.org/\">Laravel 学院</a><br><a href=\"https://cs.laravel-china.org/\">laravel速查表</a></p><p>种一棵树最好的时间是十年前；其次是现在；<br>让我们开始吧；<br><img src=\"/uploads/article/5958ab4dd9db4.jpg\" alt=\"laravel\" title=\"laravel\"></p>','终于；终于；终于；\n开始正式写 laravel 系列了；\n本系列教程主要面向的是多少懂点 thinkphp3.X 的开发者们；\n我把我从tp3转到laravel的历程转成一篇篇的文章教程；\n愿这一系列的文章；\n能成为童鞋们踏入laravel的引路人；\n\n如果还没下定决定要使用laravel；\n那么我上来就是一个连接；\n\n不是别人说好我也跟着说好的；\n而是我实实在在的使用过后；...','laravel,thinkphp, 教程','/uploads/article/5958ab4dd9db4.jpg',1,666,'2017-07-15 23:35:12','2016-07-15 23:35:12',NULL),(2,1,'已删除','白俊遥','内容','内容','描述','test','/uploads/article/5958ab4dd9db4.jpg',0,222,'2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_articles` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_articles` with 2 row(s)
--

--
-- Table structure for table `bjy_categories`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '分类主键id',
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '分类名称',
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
INSERT INTO `bjy_categories` VALUES (1,'php','php','php相关的文章',1,0,'2017-07-15 23:35:12','2016-07-15 23:35:12',NULL),(2,'用于删除','用于删除','用于删除',2,0,'2019-01-04 08:35:12','2019-01-04 08:35:12',NULL),(3,'已删除','已删除','已删除',3,0,'2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_categories` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_categories` with 3 row(s)
--

--
-- Table structure for table `bjy_chats`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_chats` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_chats`
--

LOCK TABLES `bjy_chats` WRITE;
/*!40000 ALTER TABLE `bjy_chats` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_chats` VALUES (1,'技术这东西；懂的越多；不懂的就越多；','2017-07-17 23:35:12','2016-07-17 23:35:12',NULL),(2,'已删除','2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_chats` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_chats` with 2 row(s)
--

--
-- Table structure for table `bjy_comments`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `oauth_user_id` int unsigned NOT NULL DEFAULT '0' COMMENT '评论用户id 关联oauth_user表的id',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：文章评论',
  `pid` int unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `article_id` int unsigned NOT NULL COMMENT '文章id',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `status` tinyint(1) NOT NULL COMMENT '1:已审核 0：未审核',
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
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_configs`
--

LOCK TABLES `bjy_configs` WRITE;
/*!40000 ALTER TABLE `bjy_configs` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_configs` VALUES (101,'app.name','白俊遥博客','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(102,'bjyblog.head.keywords','个人博客,博客模板,thinkphp,laravel博客,php博客,技术博客,白俊遥','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(103,'bjyblog.head.description','白俊遥的php博客,个人技术博客,bjyblog,bjyadmin官方网站','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(107,'bjyblog.water.text','baijunyao.com','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(109,'bjyblog.water.size','15','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(110,'bjyblog.water.color','#008CBA','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(117,'bjyblog.icp','豫ICP备14009546号-3','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(118,'bjyblog.admin_email','baijunyao@baijunyao.com','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(119,'bjyblog.copyright_word','本文为白俊遥原创文章,转载无需和我联系,但请注明来自<a href=\"http://baijunyao.com\">白俊遥博客</a>http://baijunyao.com','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(120,'services.qq.client_id','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(123,'bjyblog.statistics','','2018-08-25 09:04:02','2018-08-25 09:04:02',NULL),(125,'bjyblog.author','白俊遥','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(126,'services.qq.client_secret','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(128,'bjyblog.baidu_site_url','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(133,'services.weibo.client_id','','2018-08-24 12:26:02','2018-08-24 12:26:02',NULL),(134,'services.weibo.client_secret','','2018-08-24 12:26:02','2018-08-24 12:26:02',NULL),(139,'services.github.client_id','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(140,'services.github.client_secret','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(141,'bjyblog.alt_word','白俊遥博客','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(142,'mail.host','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(143,'mail.username','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(144,'mail.password','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(145,'mail.from.name','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(148,'bjyblog.notification_email','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(149,'bjyblog.head.title','白俊遥博客,技术博客,个人博客模板, php博客系统','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(150,'bjyblog.qq_qun.article_id','1','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(151,'bjyblog.qq_qun.number','88199093','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(152,'bjyblog.qq_qun.code','<a target=\"_blank\" href=\"//shang.qq.com/wpa/qunwpa?idkey=bba3fea90444ee6caf1fb1366027873fe14e86bada254d41ce67768fadd729ee\"><img border=\"0\" src=\"//pub.idqqimg.com/wpa/images/group.png\" alt=\"白俊遥博客群\" title=\"白俊遥博客群\"></a>','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(153,'bjyblog.qq_qun.or_code','/uploads/images/default.png','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(154,'mail.driver','smtp','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(155,'mail.port','465','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(156,'mail.encryption','ssl','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(157,'mail.from.address','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(158,'sentry.dsn','','2018-08-22 13:03:01','2018-08-22 13:03:01',NULL),(159,'database.connections.mysql.dump.dump_binary_path','/bin/','2018-12-03 13:39:22','2018-12-03 13:39:22',NULL),(160,'filesystems.disks.oss.access_id','','2018-12-04 14:29:52','2018-12-04 14:29:52',NULL),(161,'filesystems.disks.oss.access_key','','2018-12-04 14:29:52','2018-12-04 14:29:52',NULL),(162,'filesystems.disks.oss.bucket','','2018-12-04 14:29:52','2018-12-04 14:29:52',NULL),(163,'filesystems.disks.oss.endpoint','','2018-12-04 14:29:52','2018-12-04 14:29:52',NULL),(164,'backup.backup.destination.disks','[]','2018-12-04 14:29:52','2018-12-04 14:29:52',NULL),(165,'backup.notifications.mail.to','','2018-12-04 14:29:52','2018-12-04 14:29:52',NULL),(166,'app.locale','en','2019-02-26 13:10:52','2019-02-26 13:10:52',NULL);
/*!40000 ALTER TABLE `bjy_configs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_configs` with 42 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_consoles`
--

LOCK TABLES `bjy_consoles` WRITE;
/*!40000 ALTER TABLE `bjy_consoles` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_consoles` VALUES (1,'App\\Console\\Commands\\Upgrade\\V5_5_4_1','2018-09-27 14:26:00','2018-09-27 14:26:00',NULL),(2,'App\\Console\\Commands\\Upgrade\\V5_5_4_3','2018-09-27 14:26:00','2018-09-27 14:26:00',NULL),(3,'App\\Console\\Commands\\Upgrade\\V5_5_6_0','2018-09-28 02:26:00','2018-09-28 02:26:00',NULL),(4,'App\\Console\\Commands\\Upgrade\\V5_5_7_0','2018-11-06 14:26:00','2018-11-06 14:26:00',NULL),(5,'App\\Console\\Commands\\Upgrade\\V5_5_8_0','2018-12-31 13:03:00','2018-12-31 13:03:00',NULL),(6,'App\\Console\\Commands\\Upgrade\\V5_5_9_0','2018-12-31 13:03:00','2018-12-31 13:03:00',NULL),(7,'App\\Console\\Commands\\Upgrade\\V5_5_10_0','2018-12-31 13:03:00','2018-12-31 13:03:00',NULL),(8,'App\\Console\\Commands\\Upgrade\\V5_5_11_0','2019-02-26 13:10:52','2019-02-26 13:10:52',NULL),(9,'App\\Console\\Commands\\Upgrade\\V5_8_1_0','2019-02-26 13:10:52','2019-02-26 13:10:52',NULL);
/*!40000 ALTER TABLE `bjy_consoles` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_consoles` with 9 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_migrations`
--

LOCK TABLES `bjy_migrations` WRITE;
/*!40000 ALTER TABLE `bjy_migrations` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_07_11_225347_create_article_tags_table',1),(4,'2017_07_11_225347_create_articles_table',1),(5,'2017_07_11_225347_create_categories_table',1),(6,'2017_07_11_225347_create_chats_table',1),(7,'2017_07_11_225347_create_comments_table',1),(8,'2017_07_11_225347_create_configs_table',1),(9,'2017_07_11_225347_create_friendship_links_table',1),(10,'2017_07_11_225347_create_oauth_users_table',1),(11,'2017_07_11_225347_create_tags_table',1),(12,'2017_08_26_211441_create_jobs_table',1),(13,'2017_08_26_212556_create_failed_jobs_table',1),(14,'2017_10_18_203752_create_git_projects_table',1),(15,'2018_08_01_191920_create_navs_table',1),(16,'2018_09_04_204500_create_sites_table',1),(17,'2018_09_26_144126_create_consoles_table',1),(18,'2019_05_07_225949_create_oauth_clients_table',1);
/*!40000 ALTER TABLE `bjy_migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_migrations` with 18 row(s)
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
INSERT INTO `bjy_navs` VALUES (1,1,'随言碎语','chat','2018-08-04 04:41:26','2018-08-04 04:41:26',NULL),(2,1,'开源项目','git','2018-08-04 04:41:26','2018-08-04 04:41:26',NULL),(3,1,'已删除','deleted','2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_navs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_navs` with 3 row(s)
--

--
-- Table structure for table `bjy_oauth_clients`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_oauth_clients` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `client_secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `client_id_config` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `client_secret_config` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_oauth_clients`
--

LOCK TABLES `bjy_oauth_clients` WRITE;
/*!40000 ALTER TABLE `bjy_oauth_clients` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `bjy_oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_oauth_clients` with 0 row(s)
--

--
-- Table structure for table `bjy_oauth_users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_oauth_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型 1：QQ  2：新浪微博 3：github',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '第三方昵称',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '头像',
  `openid` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '第三方用户id',
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'access_token token',
  `last_login_ip` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `login_times` int unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bjy_oauth_users`
--

LOCK TABLES `bjy_oauth_users` WRITE;
/*!40000 ALTER TABLE `bjy_oauth_users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bjy_oauth_users` VALUES (1,1,'白俊遥','/uploads/article/default.jpg','1','','127.0.0.1',1,'baijunyao@baijunyao.com',0,'2017-07-23 23:35:12','2017-07-23 23:35:12',NULL),(2,1,'已删除','/uploads/article/default.jpg','2','','127.0.0.1',1,'deleted@baijunyao.com',0,'2019-01-04 08:35:12','2019-01-04 08:35:12','2019-01-04 08:35:12');
/*!40000 ALTER TABLE `bjy_oauth_users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bjy_oauth_users` with 2 row(s)
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
  `oauth_user_id` int unsigned NOT NULL DEFAULT '0' COMMENT '第三方用户id',
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
-- Table structure for table `bjy_tags`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bjy_tags` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '标签主键',
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标签名',
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
INSERT INTO `bjy_tags` VALUES (1,'laravel','2017-07-15 23:35:12','2016-07-15 23:35:12',NULL),(2,'test','2019-01-04 07:35:12','2019-01-04 07:35:12',NULL),(3,'已删除','2019-01-04 07:35:12','2019-01-04 07:35:12','2019-01-04 07:35:12');
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
INSERT INTO `bjy_users` VALUES (1,'test','test@test.com',NULL,'$2y$10$JuwJ4xDXmedN7imWI.80qOGAMOO6zx4jR/QgCOFKxkTVMnNWtJmjy',NULL,'2016-10-21 23:35:12','2016-10-21 23:35:12',NULL),(2,'已删除','deleted@test.com',NULL,'$2y$10$D0KtV9TWxmTJDl4QPBHYqeqscSaZzRuDKiB5fMXrYJ7bdp.I2.GWW',NULL,'2019-01-04 07:35:12','2016-01-04 07:35:12','2016-01-04 07:35:12');
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

-- Dump completed on: Sun, 09 Aug 2020 14:53:56 +0800
