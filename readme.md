[创建 QQ 群及捐赠渠道](https://baijunyao.com/article/124)  

## 链接
- 博客：[http://baijunyao.com](http://baijunyao.com)   
- github：[https://github.com/baijunyao/laravel-bjyblog](https://github.com/baijunyao/laravel-bjyblog)   
- 码云：[https://gitee.com/shuaibai123/laravel-bjyblog](https://gitee.com/shuaibai123/laravel-bjyblog)    

## 简介
这个项目是把 [thinkphp-bjyblog](https://github.com/baijunyao/thinkphp-bjyblog) 用 laravel 框架重构后的产物；  

下图中的[白俊遥博客](https://baijunyao.com)即是使用 laravel-bjyblog 开发的个人博客
![laravel-bjyblog](https://baijunyao.com/uploads/article/20171210/5a2d533982e36.jpg)  

## 安装使用
可以通过以下两种命令安装；  
```bash
composer create-project baijunyao/laravel-bjyblog  blog && cd blog && php artisan bjyblog:install && php artisan bjyblog:migrate
```
或者：  
```bash
git clone git@gitee.com:shuaibai123/laravel-bjyblog.git blog && cd blog && cp .env.example .env && composer install -vvv && php artisan bjyblog:install && php artisan bjyblog:migrate
```
更加详细的安装文档请参考文章：[开源项目系列之thinkphp-bjyblog博客](https://baijunyao.com/article/129)  

## 项目介绍
1. 纯手工前台响应式页面布局适配PC、平板、手机；
2. 带表情的ajax无限级评论系统；
3. 队列邮件通知；
4. QQ、微博、github第三方登录；
5. markdown 编辑器；

## 版权
项目使用 MIT 协议；免费开源可随意使用；

## 使用本项目搭建的博客
- [白俊遥博客](https://baijunyao.com)  
- [韩佳鑫博客](https://www.hanjiaxin.com)  
- [Sails博客](https://smile.sails.site)  
- [義往昔博客](http://www.maocaoying.com)  
欢迎提交PR或者告诉我来收录你的网站；  

## 更新记录
#### v5.5.0.15 (2018-03-18)
1. 解决添加文章时的错误提示
2. 后台首页只count(id)
#### v5.5.0.14 (2018-03-03)
1. 使用laravel-flash替代flash_message
2. 文章模型关联标签
3. 首页列表文章使用模型关联代替join
4. 解决文章页面有序和无序列表无法正常显示样式的问题
5. 使用模型关联代替join获取文章详情数据
6. 使用访问器过滤描述中的换行
7. 分类页面使用模型关联代替join
8. 使用模型关联重构前台标签下的文章列表
9. 更新系统功能完成
#### v5.5.0.13 (2018-02-23)
1. 增加bjyblog:migrate命令
#### v5.5.0.12 (2018-02-23)
1. 修复数据库密码获取错误的问题
2. 使用gitee以解决clone太慢的问题
3. 解决install报错的问题
#### v5.5.0.11 (2018-02-23)
1. 引入baijunyao/laravel-flash
2. 引入baijunyao/laravel-model
3. 增加旧标签记录
4. readme增加tag日期
5. 使用模型关联替代join获取后台文章列表
6. 文章模型关联分类模型
7. 使用关联模型替代join获取标签下的文章数统计

**注: 因引入了新的包；升级后记得执行`composer install --no-dev && composer dump-autoload`命令**
#### v5.5.0.10 (2018-02-10)
1. 解决第三方账号关联管理员后无法回复评论的问题
2. 增加bjyblog:install命令以简化安装
3. 修复后台无法退出的问题
4. 修复分类没有按照sort字段排序的问题
#### v5.5.0.9 (2018-02-03)
1. 使用 mews/purifier 过滤评论加强 xss 防护
2. 添加EditorConfig配置
3. 修复移动端版权说明样式错乱的问题
4. 默认使用 /config/session.php 定义的 session 过期时间
5. 升级prism增加复制功能
#### v5.5.0.8 (2018-01-26)
1. 升级baijunyao/laravel-print至3.1
2. 只允许使用 oauth 账号登录评论
3. 统一编码风格
4. 自定义验证类用于验证评论内容
5. 更合理的获取评论请求数据
6. 增加中间件用于防止未登录状态请求评论接口
#### v5.5.0.7 (2018-01-22)
1. 设置session过期时间为30天
2. 评论出错返回403错误并阻止继续操作
3. 增加评论草稿箱功能防止评论丢失
4. 底部增加版本号
5. 底部2017改为2018年
6. request只取指定字段
#### v5.5.0.6 (2018-01-16)
1. 解决登录后丢失评论内容的问题
2. 解决dusk测试关闭过快评论失败的问题
#### v5.5.0.5 (2018-01-14)
1. 后台增加清除缓存的菜单
2. 已经登录后台后再访问登录页面自动跳转到后台首页
3. 修复彻底删除评论后跳转不正确的问题
4. 设置随言碎语和开源项目页面的title
5. Powered by改为中文
#### v5.5.0.4 (2018-01-08)
1. require laravel-print 用于调试打印
2. 开启自动发现dusk
3. require dbal用于修改字段
4. 修改文章内容字段类型为mediumText
5. 把char改为string
6. 删除text字段类型的长度  

**注: 因表迁移不支持修改 text 类型 ；所以建议安装 5.5.0.4 之前版本的童鞋手动把 articles 表的 markdown 和 html 字段从 text 类型改为 mediumtext ；以防止生成的 html 过长无法完整储存；**
#### v5.5.0.3 (2018-01-05)
1. 不追踪favicon.ico文件
2. 水印文字从数据库配置中获取
3. 修复分类和标签列表title、keywords、description未正确设置的问题
#### v5.5.0.2 (2018-01-02)
1. 前台dusk测试完成
2. 访问不存在的文章时返回404页面
#### v5.5.0.1 (2017-12-28)
1. 修复社会化登录的错误
#### v5.5.0.0 (2017-12-24)
1. 升级laravel框架到5.5版本
#### v5.3.0.6 (2017-12-21)
1. 修复show_message函数改名造成的错误
2. 修复右侧捐款链接错误的问题
3. 切分日志保留1年的记录
#### v5.3.0.5 (2017-12-20)
1. 新增或者编辑文章后更新标签统计缓存
#### v5.3.0.4 (2017-12-17)
1. 博客版本号从配置项中获取
2. 规范统一使用驼峰命名
#### v5.3.0.3 (2017-12-14)
1. 全局路由约束；限制id必须为数字
#### v5.3.0.2 (2017-12-12)
1. 完善使用说明
2. 自动过滤一些无意义评论
#### v5.3.0.1 (2017-12-09)
1. 第一个稳定版本
#### v5.3.0-rc.4 (2017-12-03)
1. 优化处理缓存的方式
#### v5.3.0-rc.3 (2017-11-26)
1. 加入组织功能完成
#### v5.3.0-rc.2 (2017-10-27)
1. 增加开源项目功能
#### v5.3.0-rc.1 (2017-09-21)
1. 修复各种bug
#### v5.3.0-beta.4 (2017-09-19)
1. 回收站及恢复功能完成
#### v5.3.0-beta.3 (2017-08-31)
1. 使用DB编辑数据后清空缓存
#### v5.3.0-beta.2 (2017-08-23)
1. 使用优雅的方式更新缓存数据
#### v5.3.0-beta.1 (2017-08-18)
1. 使用缓存完善功能
#### v5.3.0-alpha.3 (2017-08-06)
1. 处理一些图片相关的问题
#### v5.3.0-alpha.2 (2017-07-24)
1. 数据填充完成
#### v5.3.0-alpha.1 (2017-07-11)
1. 发布第一个完整的内测版
#### v1.5.3 (2017-06-29)
1. 修复表情和头像的bug
#### v1.5.2 (2017-06-27)
1. 把第三方登录的用户保存在本地
#### v1.5.1 (2017-06-25)
1. 使用ubb标签的方式重构评论表情
#### v1.5.0 (2017-06-13)
1. 后台配置项功能完成
#### v1.4.0 (2017-05-16)
1. 后台分类管理完成
#### v1.3.0 (2017-05-05)
1. 后台随言碎语功能完成
#### v1.2.0 (2017-05-01)
1. 友情链接管理完成
#### v1.1.1 (2017-04-26)
1. 正式开始上线使用
#### v1.1.0 (2017-04-07)
1. 后台增加评论列表
#### v1.0.0 (2017-03-29)
1. 初始版本完成