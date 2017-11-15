## 简略说明
一些筒子们着急着想先体验下laravel版的博客；  
经不住童鞋们的一再催促；  
以及我这段时间的测试；  
感觉博客可以初步使用了； 
于是；我加班加点的把数据库迁移文件和填充文件搞出来；  
想先体验折腾的拿去玩吧；   
项目还在完善中；  
待更成熟点后；我会写详细的文章讲解；  
后台 /admin/index/index  
默认账号：test@test.com   
初始密码：123456  
网站配置以及第三方登录的key可以在后台配置项中填写  

补充；  
最近看到不少童鞋在博客上留言安装的有问题；  
写个简单的安装流程吧；  
首先要安装composer；
如果不会安装的参考 [composer的初级使用](https://baijunyao.com/article/113);  
配置好本地环境主要是指向public目录；  
参考 [phpstudy 配置虚拟主机](https://baijunyao.com/article/114);  
然后把项目下载到本地；  
在项目跟目录执行安装命令；  
```bash
composer install -vvv
```
然后把 `.env.example改名为.env`;  
生成APP_KEY；
```bash
php artisan key:generate
```
把 `.env` 文件中的 `APP_URL` 改为自己的域名；  
把 `.env` 文件中的 DB_HOST、DB_PORT、DB_DATABASE、DB_USERNAME、DB_PASSWORD；  
改为自己的数据库链接；
运行迁移命令；
```bash
php artisan migrate
```
运行数据填充命令;
```bash
php artisan db:seed
```
ok；人品好的话；  
一个跟我博客一样的项目就完成了；