[创建 QQ 群及捐赠渠道](https://baijunyao.com/article/124)  

## 链接
- 博客：[http://baijunyao.com](http://baijunyao.com)   
- github：[https://github.com/baijunyao/laravel-bjyblog](https://github.com/baijunyao/laravel-bjyblog)   
- 码云：[https://gitee.com/shuaibai123/laravel-bjyblog](https://gitee.com/shuaibai123/laravel-bjyblog)    

## 简介
这个项目是把 [thinkphp-bjyblog](https://github.com/baijunyao/thinkphp-bjyblog) 用 laravel 框架重构后的产物；  

下图中的[白俊遥博客](https://baijunyao.com)即是使用 laravel-bjyblog 开发的个人博客
![Thinkbjy](http://statics.baijunyao.com/images/other/thinkbjy.jpg)  

## 使用说明
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
改为 thinkphp-bjyblog 的数据库链接；
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
后台 /admin/index/index  
默认账号：test@test.com   
初始密码：123456   

## 从thinkphp-bjyblog迁移数据
使用 [thinkphp-bjyblog](https://github.com/baijunyao/thinkphp-bjyblog)  的童鞋我并没有抛弃你们；  
我还准备好了命令行；  
可以把数据一键从 thinkphp-bjyblog 迁移到 laravel-bjyblog；  
配置OLD_DB_HOST、OLD_DB_PORT、OLD_DB_DATABASE、OLD_DB_USERNAME、OLD_DB_PASSWORD 为thinkphp-bjyblog的数据库；  
然后运行 `php artisan migration:fromThinkPHPBjyBlog`

## 项目介绍
1. 前台响应式页面布局适配PC、手机、平板；
2. 带表情的ajax无限级评论系统；
3. 队列邮件通知；
4. QQ、微博、github第三方登录；
5. markdown 编辑器；

## 版权
项目使用 MIT 协议；免费开源可随意使用；