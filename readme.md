[创建 QQ 群及捐赠渠道](https://baijunyao.com/article/124)  

## 链接
- 博客：[http://baijunyao.com](http://baijunyao.com)   
- github：[https://github.com/baijunyao/laravel-bjyblog](https://github.com/baijunyao/laravel-bjyblog)   
- 码云：[https://gitee.com/shuaibai123/laravel-bjyblog](https://gitee.com/shuaibai123/laravel-bjyblog)    

## 简介
这个项目是把 [thinkphp-bjyblog](https://github.com/baijunyao/thinkphp-bjyblog) 用 laravel 框架重构后的产物；  

下图中的[白俊遥博客](https://baijunyao.com)即是使用 laravel-bjyblog 开发的个人博客
![laravel-bjyblog](https://baijunyao.com/uploads/article/20171210/5a2d533982e36.jpg)  

## 使用说明
[开源项目系列之thinkphp-bjyblog博客](https://baijunyao.com/article/129)  

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
欢迎提交PR或者告诉我来收录你的网站；  

## 更新记录
#### v5.5.0.8
1. 升级baijunyao/laravel-print至3.1
2. 只允许使用 oauth 账号登录评论
3. 统一编码风格
4. 自定义验证类用于验证评论内容
5. 更合理的获取评论请求数据
6. 增加中间件用于防止未登录状态请求评论接口
#### v5.5.0.7
1. 设置session过期时间为30天
2. 评论出错返回403错误并阻止继续操作
3. 增加评论草稿箱功能防止评论丢失
4. 底部增加版本号
5. 底部2017改为2018年
6. request只取指定字段
#### v5.5.0.6
1. 解决登录后丢失评论内容的问题
2. 解决dusk测试关闭过快评论失败的问题
#### v5.5.0.5
1. 后台增加清除缓存的菜单
2. 已经登录后台后再访问登录页面自动跳转到后台首页
3. 修复彻底删除评论后跳转不正确的问题
4. 设置随言碎语和开源项目页面的title
5. Powered by改为中文
#### v5.5.0.4
1. require laravel-print 用于调试打印
2. 开启自动发现dusk
3. require dbal用于修改字段
4. 修改文章内容字段类型为mediumText
5. 把char改为string
6. 删除text字段类型的长度  

**注: 因表迁移不支持修改 text 类型 ；所以建议安装 5.5.0.4 之前版本的童鞋手动把 articles 表的 markdown 和 html 字段从 text 类型改为 mediumtext ；以防止生成的 html 过长无法完整储存；**
#### v5.5.0.3
1. 不追踪favicon.ico文件
2. 水印文字从数据库配置中获取
3. 修复分类和标签列表title、keywords、description未正确设置的问题
#### v5.5.0.2
1. 前台dusk测试完成
2. 访问不存在的文章时返回404页面
#### v5.5.0.1
1. 修复社会化登录的错误
#### v5.5.0.0
1. 升级laravel框架到5.5版本
#### v5.3.0.6
1. 修复show_message函数改名造成的错误
2. 修复右侧捐款链接错误的问题
3. 切分日志保留1年的记录
#### v5.3.0.5
1. 新增或者编辑文章后更新标签统计缓存
#### v5.3.0.4
1. 博客版本号从配置项中获取
2. 规范统一使用驼峰命名
#### v5.3.0.3
1. 全局路由约束；限制id必须为数字
#### v5.3.0.2
1. 完善使用说明
2. 自动过滤一些无意义评论
#### v5.3.0.1
1. 第一个稳定版本