<?php

// Home 模块
Route::namespace('Home')->group(function () {
    // 首页
    Route::get('/', 'IndexController@index');
    // 分类
    Route::get('category/{id}/{slug?}', 'IndexController@category');
    // 标签
    Route::get('tag/{id}/{slug?}', 'IndexController@tag');
    // 随言碎语
    Route::get('note', 'IndexController@note')->name('note');
    // 开源项目
    Route::get('git', 'IndexController@git');
    // 文章详情
    Route::get('article/{id}/{slug?}', 'IndexController@article');
    // 文章评论
    Route::post('comment', 'IndexController@comment')->middleware('auth.socialite');
    // 检测是否登录
    Route::get('checkLogin', 'IndexController@checkLogin');
    // 搜索文章
    Route::get('search', 'IndexController@search');
    // feed
    Route::get('feed', 'IndexController@feed');
    // 推荐博客
    Route::prefix('site')->group(function () {
        Route::get('/', 'SiteController@index');
        Route::post('store', 'SiteController@store')->middleware('auth.socialite', 'clean.xss');
    });
});

// auth
Route::namespace('Auth')->prefix('auth')->as('auth.')->group(function () {
    // Socialite
    Route::prefix('socialite')->as('socialite.')->group(function () {
        // 重定向
        Route::get('redirectToProvider/{service}', 'SocialiteController@redirectToProvider')->name('redirectToProvider');
        // 获取用户资料并登录
        Route::get('handleProviderCallback/{service}', 'SocialiteController@handleProviderCallback')->name('handleProviderCallback');
        // 退出登录
        Route::get('logout', 'SocialiteController@logout')->name('logout');
    });

    // 后台登录
    Route::prefix('admin')->group(function () {
        Route::post('login', 'AdminController@login');
    });
});

// 后台登录页面
Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::redirect('/', url('admin/login/index'));
    Route::prefix('login')->group(function () {
        // 登录页面
        Route::get('index', 'LoginController@index')->middleware('admin.login');
        // 退出
        Route::get('logout', 'LoginController@logout');
    });
});

// Admin 模块
Route::namespace('Admin')->prefix('admin')->middleware('admin.auth')->group(function () {
    // 首页控制器
    Route::prefix('index')->group(function () {
        // 后台首页
        Route::get('index', 'IndexController@index');
        // 更新系统
        Route::get('upgrade', 'IndexController@upgrade');
    });

    // 文章管理
    Route::prefix('article')->group(function () {
        // 文章列表
        Route::get('index', 'ArticleController@index');
        // 发布文章
        Route::get('create', 'ArticleController@create');
        Route::post('store', 'ArticleController@store');
        // 编辑文章
        Route::get('edit/{id}', 'ArticleController@edit');
        Route::post('update/{id}', 'ArticleController@update');
        // 上传图片
        Route::post('uploadImage', 'ArticleController@uploadImage');
        // 删除文章
        Route::get('destroy/{id}', 'ArticleController@destroy');
        // 恢复删除的文章
        Route::get('restore/{id}', 'ArticleController@restore');
        // 彻底删除文章
        Route::get('forceDelete/{id}', 'ArticleController@forceDelete');
        // 批量替换功能视图
        Route::get('replaceView', 'ArticleController@replaceView');
        // 批量替换功能
        Route::post('replace', 'ArticleController@replace');
    });

    // 分类管理
    Route::prefix('category')->group(function () {
        // 分类列表
        Route::get('index', 'CategoryController@index');
        // 添加分类
        Route::get('create', 'CategoryController@create');
        Route::post('store', 'CategoryController@store');
        // 编辑分类
        Route::get('edit/{id}', 'CategoryController@edit');
        Route::post('update/{id}', 'CategoryController@update');
        // 排序
        Route::post('sort', 'CategoryController@sort');
        // 删除分类
        Route::get('destroy/{id}', 'CategoryController@destroy');
        // 恢复删除的分类
        Route::get('restore/{id}', 'CategoryController@restore');
        // 彻底删除分类
        Route::get('forceDelete/{id}', 'CategoryController@forceDelete');
    });

    // 标签管理
    Route::prefix('tag')->group(function () {
        // 标签列表
        Route::get('index', 'TagController@index');
        // 添加标签
        Route::get('create', 'TagController@create');
        Route::post('store', 'TagController@store');
        // 编辑标签
        Route::get('edit/{id}', 'TagController@edit');
        Route::post('update/{id}', 'TagController@update');
        // 删除标签
        Route::get('destroy/{id}', 'TagController@destroy');
        // 恢复删除的标签
        Route::get('restore/{id}', 'TagController@restore');
        // 彻底删除标签
        Route::get('forceDelete/{id}', 'TagController@forceDelete');
    });

    // 评论管理
    Route::prefix('comment')->group(function () {
        // 评论列表
        Route::get('index', 'CommentController@index');
        // 删除评论
        Route::get('destroy/{id}', 'CommentController@destroy');
        // 恢复删除的评论
        Route::get('restore/{id}', 'CommentController@restore');
        // 彻底删除评论
        Route::get('forceDelete/{id}', 'CommentController@forceDelete');
        // 批量替换功能视图
        Route::get('replaceView', 'CommentController@replaceView');
        // 批量替换功能
        Route::post('replace', 'CommentController@replace');
    });

    // 管理员
    Route::prefix('user')->group(function () {
        // 管理员列表
        Route::get('index', 'UserController@index');
        // 编辑管理员
        Route::get('edit/{id}', 'UserController@edit');
        Route::post('update/{id}', 'UserController@update');
        // 删除管理员
        Route::get('destroy/{id}', 'UserController@destroy');
        // 恢复删除的管理员
        Route::get('restore/{id}', 'UserController@restore');
        // 彻底删除管理员
        Route::get('forceDelete/{id}', 'UserController@forceDelete');
    });

    // Socialite client
    Route::prefix('socialiteClient')->group(function () {
        Route::get('index', 'SocialiteClientController@index');
        Route::get('edit/{id}', 'SocialiteClientController@edit');
        Route::post('update/{id}', 'SocialiteClientController@update');
    });

    // 第三方用户管理
    Route::prefix('socialiteUser')->group(function () {
        // 用户列表
        Route::get('index', 'SocialiteUserController@index');
        // 编辑管理员
        Route::get('edit/{id}', 'SocialiteUserController@edit');
        Route::post('update/{id}', 'SocialiteUserController@update');
    });

    // 友情链接管理
    Route::prefix('friendshipLink')->group(function () {
        // 友情链接列表
        Route::get('index', 'FriendshipLinkController@index');
        // 添加友情链接
        Route::get('create', 'FriendshipLinkController@create');
        Route::post('store', 'FriendshipLinkController@store');
        // 编辑友情链接
        Route::get('edit/{id}', 'FriendshipLinkController@edit');
        Route::post('update/{id}', 'FriendshipLinkController@update');
        // 排序
        Route::post('sort', 'FriendshipLinkController@sort');
        // 删除友情链接
        Route::get('destroy/{id}', 'FriendshipLinkController@destroy');
        // 恢复删除的友情链接
        Route::get('restore/{id}', 'FriendshipLinkController@restore');
        // 彻底删除友情链接
        Route::get('forceDelete/{id}', 'FriendshipLinkController@forceDelete');
    });

    // 推荐博客管理
    Route::prefix('site')->group(function () {
        // 推荐博客列表
        Route::get('index', 'SiteController@index');
        // 添加推荐博客
        Route::get('create', 'SiteController@create');
        Route::post('store', 'SiteController@store');
        // 编辑推荐博客
        Route::get('edit/{id}', 'SiteController@edit');
        Route::post('update/{id}', 'SiteController@update');
        // 排序
        Route::post('sort', 'SiteController@sort');
        // 删除推荐博客
        Route::get('destroy/{id}', 'SiteController@destroy');
        // 恢复删除的推荐博客
        Route::get('restore/{id}', 'SiteController@restore');
        // 彻底删除推荐博客
        Route::get('forceDelete/{id}', 'SiteController@forceDelete');
    });

    // 随言碎语管理
    Route::prefix('note')->group(function () {
        // 随言碎语列表
        Route::get('index', 'NoteController@index');
        // 添加随言碎语
        Route::get('create', 'NoteController@create');
        Route::post('store', 'NoteController@store');
        // 编辑随言碎语
        Route::get('edit/{id}', 'NoteController@edit');
        Route::post('update/{id}', 'NoteController@update');
        // 删除随言碎语
        Route::get('destroy/{id}', 'NoteController@destroy');
        // 恢复删除的随言碎语
        Route::get('restore/{id}', 'NoteController@restore');
        // 彻底删除随言碎语
        Route::get('forceDelete/{id}', 'NoteController@forceDelete');
    });

    // 系统设置
    Route::prefix('config')->group(function () {
        // 编辑配置项页面
        Route::get('edit', 'ConfigController@edit');
        // 编辑邮箱配置页面
        Route::get('email', 'ConfigController@email');
        // 编辑 socialite 配置页面
        Route::get('socialite', 'ConfigController@socialite');
        // 编辑 qq 群配置页面
        Route::get('qqQun', 'ConfigController@qqQun');
        // 编辑备份配置页面
        Route::get('backup', 'ConfigController@backup');
        // SEO
        Route::get('seo', 'ConfigController@seo');
        // Social Share
        Route::get('socialShare', 'ConfigController@socialShare');
        // 编辑配置
        Route::post('update', 'ConfigController@update');
        // 清空各种缓存
        Route::get('clear', 'ConfigController@clear');
    });

    // 开源项目管理
    Route::prefix('gitProject')->group(function () {
        // 开源项目列表
        Route::get('index', 'GitProjectController@index');
        // 添加开源项目
        Route::get('create', 'GitProjectController@create');
        Route::post('store', 'GitProjectController@store');
        // 编辑开源项目
        Route::get('edit/{id}', 'GitProjectController@edit');
        Route::post('update/{id}', 'GitProjectController@update');
        // 排序
        Route::post('sort', 'GitProjectController@sort');
        // 删除开源项目
        Route::get('destroy/{id}', 'GitProjectController@destroy');
        // 恢复删除的开源项目
        Route::get('restore/{id}', 'GitProjectController@restore');
        // 彻底删除开源项目
        Route::get('forceDelete/{id}', 'GitProjectController@forceDelete');
    });

    // 菜单管理
    Route::prefix('nav')->group(function () {
        // 菜单列表
        Route::get('index', 'NavController@index');
        // 添加菜单
        Route::get('create', 'NavController@create');
        Route::post('store', 'NavController@store');
        // 编辑菜单
        Route::get('edit/{id}', 'NavController@edit');
        Route::post('update/{id}', 'NavController@update');
        // 排序
        Route::post('sort', 'NavController@sort');
        // 删除菜单
        Route::get('destroy/{id}', 'NavController@destroy');
        // 恢复删除的菜单
        Route::get('restore/{id}', 'NavController@restore');
        // 彻底删除菜单
        Route::get('forceDelete/{id}', 'NavController@forceDelete');
    });
});
