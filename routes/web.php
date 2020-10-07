<?php

declare(strict_types=1);

// Home 模块
Route::name('home.')->group(function () {
    Route::name('article.')->group(function () {
        Route::get('/', \App\Http\Controllers\Home\ArticleController::class . '@index')->name('index');
        Route::get('article/{article}/{slug?}', \App\Http\Controllers\Home\ArticleController::class . '@show')->name('show');
        Route::get('search', \App\Http\Controllers\Home\ArticleController::class . '@search')->name('search');
    });
    Route::get('category/{category}/{slug?}', \App\Http\Controllers\Home\CategoryController::class . '@show')->name('category.show');
    Route::get('tag/{tag}/{slug?}', \App\Http\Controllers\Home\TagController::class . '@show')->name('tag.show');
    Route::get('note', \App\Http\Controllers\Home\NoteController::class . '@index')->name('note.index');
    Route::get('openSource', \App\Http\Controllers\Home\OpenSourceController::class . '@index')->name('openSource.index');
    Route::get('feed', \App\Http\Controllers\Home\FeedController::class . '@index')->name('feed.index');
    Route::prefix('site')->name('site.')->group(function () {
        Route::get('/', \App\Http\Controllers\Home\SiteController::class . '@index')->name('index');
        Route::post('store', \App\Http\Controllers\Home\SiteController::class . '@store')->middleware('auth.socialite', 'clean.xss')->name('store');
    });
    Route::middleware('auth.socialite')->group(function () {
        Route::get('socialiteUser/{socialiteUser}', \App\Http\Controllers\Home\SocialiteUserController::class . '@show')->name('socialiteUser.show');
        Route::post('comment', \App\Http\Controllers\Home\CommentController::class . '@store')->name('comment.store');
        Route::prefix('like')->name('like.')->group(function () {
            Route::post('store', \App\Http\Controllers\Home\LikeController::class . '@store')->name('store');
            Route::delete('destroy', \App\Http\Controllers\Home\LikeController::class . '@destroy')->name('destroy');
        });
    });
});

// auth
Route::prefix('auth')->as('auth.')->group(function () {
    // Socialite
    Route::prefix('socialite')->as('socialite.')->group(function () {
        // 重定向
        Route::get('redirectToProvider/{service}', \App\Http\Controllers\Auth\SocialiteController::class . '@redirectToProvider')->name('redirectToProvider');
        // 获取用户资料并登录
        Route::get('handleProviderCallback/{service}', \App\Http\Controllers\Auth\SocialiteController::class . '@handleProviderCallback')->name('handleProviderCallback');
        // 退出登录
        Route::get('logout', \App\Http\Controllers\Auth\SocialiteController::class . '@logout')->name('logout');
    });

    // 后台登录
    Route::prefix('admin')->group(function () {
        Route::post('login', \App\Http\Controllers\Auth\AdminController::class . '@login');
    });
});

// 后台登录页面
Route::prefix('admin')->group(function () {
    Route::redirect('/', url('admin/login/index'));
    Route::prefix('login')->group(function () {
        // 登录页面
        Route::get('index', \App\Http\Controllers\Admin\LoginController::class . '@index')->middleware('admin.login');
        // 退出
        Route::get('logout', \App\Http\Controllers\Admin\LoginController::class . '@logout');
    });
});

// Admin 模块
Route::prefix('admin')->middleware('admin.auth')->group(function () {
    // 首页控制器
    Route::prefix('index')->group(function () {
        // 后台首页
        Route::get('index', \App\Http\Controllers\Admin\IndexController::class . '@index');
        // 更新系统
        Route::get('upgrade', \App\Http\Controllers\Admin\IndexController::class . '@upgrade');
        // For local testing only
        Route::get('loginUserForTest', \App\Http\Controllers\Admin\IndexController::class . '@loginUserForTest');
    });

    // 文章管理
    Route::prefix('article')->group(function () {
        // 文章列表
        Route::get('index', \App\Http\Controllers\Admin\ArticleController::class . '@index');
        // 发布文章
        Route::get('create', \App\Http\Controllers\Admin\ArticleController::class . '@create');
        Route::post('store', \App\Http\Controllers\Admin\ArticleController::class . '@store');
        // 编辑文章
        Route::get('edit/{id}', \App\Http\Controllers\Admin\ArticleController::class . '@edit');
        Route::post('update/{id}', \App\Http\Controllers\Admin\ArticleController::class . '@update');
        // 上传图片
        Route::post('uploadImage', \App\Http\Controllers\Admin\ArticleController::class . '@uploadImage');
        // 删除文章
        Route::get('destroy/{id}', \App\Http\Controllers\Admin\ArticleController::class . '@destroy');
        // 恢复删除的文章
        Route::get('restore/{id}', \App\Http\Controllers\Admin\ArticleController::class . '@restore');
        // 彻底删除文章
        Route::get('forceDelete/{id}', \App\Http\Controllers\Admin\ArticleController::class . '@forceDelete');
        // 批量替换功能视图
        Route::get('replaceView', \App\Http\Controllers\Admin\ArticleController::class . '@replaceView');
        // 批量替换功能
        Route::post('replace', \App\Http\Controllers\Admin\ArticleController::class . '@replace');
    });

    // 分类管理
    Route::prefix('category')->group(function () {
        // 分类列表
        Route::get('index', \App\Http\Controllers\Admin\CategoryController::class . '@index');
        // 添加分类
        Route::get('create', \App\Http\Controllers\Admin\CategoryController::class . '@create');
        Route::post('store', \App\Http\Controllers\Admin\CategoryController::class . '@store');
        // 编辑分类
        Route::get('edit/{id}', \App\Http\Controllers\Admin\CategoryController::class . '@edit');
        Route::post('update/{id}', \App\Http\Controllers\Admin\CategoryController::class . '@update');
        // 排序
        Route::post('sort', \App\Http\Controllers\Admin\CategoryController::class . '@sort');
        // 删除分类
        Route::get('destroy/{id}', \App\Http\Controllers\Admin\CategoryController::class . '@destroy');
        // 恢复删除的分类
        Route::get('restore/{id}', \App\Http\Controllers\Admin\CategoryController::class . '@restore');
        // 彻底删除分类
        Route::get('forceDelete/{id}', \App\Http\Controllers\Admin\CategoryController::class . '@forceDelete');
    });

    // 标签管理
    Route::prefix('tag')->group(function () {
        // 标签列表
        Route::get('index', \App\Http\Controllers\Admin\TagController::class . '@index');
        // 添加标签
        Route::get('create', \App\Http\Controllers\Admin\TagController::class . '@create');
        Route::post('store', \App\Http\Controllers\Admin\TagController::class . '@store');
        // 编辑标签
        Route::get('edit/{id}', \App\Http\Controllers\Admin\TagController::class . '@edit');
        Route::post('update/{id}', \App\Http\Controllers\Admin\TagController::class . '@update');
        // 删除标签
        Route::get('destroy/{id}', \App\Http\Controllers\Admin\TagController::class . '@destroy');
        // 恢复删除的标签
        Route::get('restore/{id}', \App\Http\Controllers\Admin\TagController::class . '@restore');
        // 彻底删除标签
        Route::get('forceDelete/{id}', \App\Http\Controllers\Admin\TagController::class . '@forceDelete');
    });

    // 评论管理
    Route::prefix('comment')->group(function () {
        // 评论列表
        Route::get('index', \App\Http\Controllers\Admin\CommentController::class . '@index');
        // 编辑评论
        Route::get('edit/{id}', \App\Http\Controllers\Admin\CommentController::class . '@edit');
        Route::post('update/{id}', \App\Http\Controllers\Admin\CommentController::class . '@update');
        // 删除评论
        Route::get('destroy/{id}', \App\Http\Controllers\Admin\CommentController::class . '@destroy');
        // 恢复删除的评论
        Route::get('restore/{id}', \App\Http\Controllers\Admin\CommentController::class . '@restore');
        // 彻底删除评论
        Route::get('forceDelete/{id}', \App\Http\Controllers\Admin\CommentController::class . '@forceDelete');
        // 批量替换功能视图
        Route::get('replaceView', \App\Http\Controllers\Admin\CommentController::class . '@replaceView');
        // 批量替换功能
        Route::post('replace', \App\Http\Controllers\Admin\CommentController::class . '@replace');
    });

    // 管理员
    Route::prefix('user')->group(function () {
        // 管理员列表
        Route::get('index', \App\Http\Controllers\Admin\UserController::class . '@index');
        // 编辑管理员
        Route::get('edit/{id}', \App\Http\Controllers\Admin\UserController::class . '@edit');
        Route::post('update/{id}', \App\Http\Controllers\Admin\UserController::class . '@update');
        // 删除管理员
        Route::get('destroy/{id}', \App\Http\Controllers\Admin\UserController::class . '@destroy');
        // 恢复删除的管理员
        Route::get('restore/{id}', \App\Http\Controllers\Admin\UserController::class . '@restore');
        // 彻底删除管理员
        Route::get('forceDelete/{id}', \App\Http\Controllers\Admin\UserController::class . '@forceDelete');
    });

    // Socialite client
    Route::prefix('socialiteClient')->group(function () {
        Route::get('index', \App\Http\Controllers\Admin\SocialiteClientController::class . '@index');
        Route::get('edit/{id}', \App\Http\Controllers\Admin\SocialiteClientController::class . '@edit');
        Route::post('update/{id}', \App\Http\Controllers\Admin\SocialiteClientController::class . '@update');
    });

    // 第三方用户管理
    Route::prefix('socialiteUser')->group(function () {
        // 用户列表
        Route::get('index', \App\Http\Controllers\Admin\SocialiteUserController::class . '@index');
        // 编辑管理员
        Route::get('edit/{id}', \App\Http\Controllers\Admin\SocialiteUserController::class . '@edit');
        Route::post('update/{id}', \App\Http\Controllers\Admin\SocialiteUserController::class . '@update');
    });

    // 友情链接管理
    Route::prefix('friendshipLink')->group(function () {
        // 友情链接列表
        Route::get('index', \App\Http\Controllers\Admin\FriendshipLinkController::class . '@index');
        // 添加友情链接
        Route::get('create', \App\Http\Controllers\Admin\FriendshipLinkController::class . '@create');
        Route::post('store', \App\Http\Controllers\Admin\FriendshipLinkController::class . '@store');
        // 编辑友情链接
        Route::get('edit/{id}', \App\Http\Controllers\Admin\FriendshipLinkController::class . '@edit');
        Route::post('update/{id}', \App\Http\Controllers\Admin\FriendshipLinkController::class . '@update');
        // 排序
        Route::post('sort', \App\Http\Controllers\Admin\FriendshipLinkController::class . '@sort');
        // 删除友情链接
        Route::get('destroy/{id}', \App\Http\Controllers\Admin\FriendshipLinkController::class . '@destroy');
        // 恢复删除的友情链接
        Route::get('restore/{id}', \App\Http\Controllers\Admin\FriendshipLinkController::class . '@restore');
        // 彻底删除友情链接
        Route::get('forceDelete/{id}', \App\Http\Controllers\Admin\FriendshipLinkController::class . '@forceDelete');
    });

    // 推荐博客管理
    Route::prefix('site')->group(function () {
        // 推荐博客列表
        Route::get('index', \App\Http\Controllers\Admin\SiteController::class . '@index');
        // 添加推荐博客
        Route::get('create', \App\Http\Controllers\Admin\SiteController::class . '@create');
        Route::post('store', \App\Http\Controllers\Admin\SiteController::class . '@store');
        // 编辑推荐博客
        Route::get('edit/{id}', \App\Http\Controllers\Admin\SiteController::class . '@edit');
        Route::post('update/{id}', \App\Http\Controllers\Admin\SiteController::class . '@update');
        // 排序
        Route::post('sort', \App\Http\Controllers\Admin\SiteController::class . '@sort');
        // 删除推荐博客
        Route::get('destroy/{id}', \App\Http\Controllers\Admin\SiteController::class . '@destroy');
        // 恢复删除的推荐博客
        Route::get('restore/{id}', \App\Http\Controllers\Admin\SiteController::class . '@restore');
        // 彻底删除推荐博客
        Route::get('forceDelete/{id}', \App\Http\Controllers\Admin\SiteController::class . '@forceDelete');
    });

    // 随言碎语管理
    Route::prefix('note')->group(function () {
        // 随言碎语列表
        Route::get('index', \App\Http\Controllers\Admin\NoteController::class . '@index');
        // 添加随言碎语
        Route::get('create', \App\Http\Controllers\Admin\NoteController::class . '@create');
        Route::post('store', \App\Http\Controllers\Admin\NoteController::class . '@store');
        // 编辑随言碎语
        Route::get('edit/{id}', \App\Http\Controllers\Admin\NoteController::class . '@edit');
        Route::post('update/{id}', \App\Http\Controllers\Admin\NoteController::class . '@update');
        // 删除随言碎语
        Route::get('destroy/{id}', \App\Http\Controllers\Admin\NoteController::class . '@destroy');
        // 恢复删除的随言碎语
        Route::get('restore/{id}', \App\Http\Controllers\Admin\NoteController::class . '@restore');
        // 彻底删除随言碎语
        Route::get('forceDelete/{id}', \App\Http\Controllers\Admin\NoteController::class . '@forceDelete');
    });

    // 系统设置
    Route::prefix('config')->group(function () {
        // 编辑配置项页面
        Route::get('edit', \App\Http\Controllers\Admin\ConfigController::class . '@edit');
        // 编辑邮箱配置页面
        Route::get('email', \App\Http\Controllers\Admin\ConfigController::class . '@email');
        // 编辑 socialite 配置页面
        Route::get('socialite', \App\Http\Controllers\Admin\ConfigController::class . '@socialite');
        // Comment Audit
        Route::get('commentAudit', \App\Http\Controllers\Admin\ConfigController::class . '@commentAudit');
        // 编辑 qq 群配置页面
        Route::get('qqQun', \App\Http\Controllers\Admin\ConfigController::class . '@qqQun');
        // 编辑备份配置页面
        Route::get('backup', \App\Http\Controllers\Admin\ConfigController::class . '@backup');
        // Upload
        Route::get('upload', \App\Http\Controllers\Admin\ConfigController::class . '@upload');
        // SEO
        Route::get('seo', \App\Http\Controllers\Admin\ConfigController::class . '@seo');
        // Social Share
        Route::get('socialShare', \App\Http\Controllers\Admin\ConfigController::class . '@socialShare');
        // Social Links
        Route::get('socialLinks', \App\Http\Controllers\Admin\ConfigController::class . '@socialLinks');
        // Search
        Route::get('search', \App\Http\Controllers\Admin\ConfigController::class . '@search');
        // Licenses
        Route::get('licenses', \App\Http\Controllers\Admin\ConfigController::class . '@licenses');
        // 编辑配置
        Route::post('update', \App\Http\Controllers\Admin\ConfigController::class . '@update');
        // 清空各种缓存
        Route::get('clear', \App\Http\Controllers\Admin\ConfigController::class . '@clear');
    });

    // 开源项目管理
    Route::prefix('openSource')->group(function () {
        // 开源项目列表
        Route::get('index', \App\Http\Controllers\Admin\OpenSourceController::class . '@index');
        // 添加开源项目
        Route::get('create', \App\Http\Controllers\Admin\OpenSourceController::class . '@create');
        Route::post('store', \App\Http\Controllers\Admin\OpenSourceController::class . '@store');
        // 编辑开源项目
        Route::get('edit/{id}', \App\Http\Controllers\Admin\OpenSourceController::class . '@edit');
        Route::post('update/{id}', \App\Http\Controllers\Admin\OpenSourceController::class . '@update');
        // 排序
        Route::post('sort', \App\Http\Controllers\Admin\OpenSourceController::class . '@sort');
        // 删除开源项目
        Route::get('destroy/{id}', \App\Http\Controllers\Admin\OpenSourceController::class . '@destroy');
        // 恢复删除的开源项目
        Route::get('restore/{id}', \App\Http\Controllers\Admin\OpenSourceController::class . '@restore');
        // 彻底删除开源项目
        Route::get('forceDelete/{id}', \App\Http\Controllers\Admin\OpenSourceController::class . '@forceDelete');
    });

    // 菜单管理
    Route::prefix('nav')->group(function () {
        // 菜单列表
        Route::get('index', \App\Http\Controllers\Admin\NavController::class . '@index');
        // 添加菜单
        Route::get('create', \App\Http\Controllers\Admin\NavController::class . '@create');
        Route::post('store', \App\Http\Controllers\Admin\NavController::class . '@store');
        // 编辑菜单
        Route::get('edit/{id}', \App\Http\Controllers\Admin\NavController::class . '@edit');
        Route::post('update/{id}', \App\Http\Controllers\Admin\NavController::class . '@update');
        // 排序
        Route::post('sort', \App\Http\Controllers\Admin\NavController::class . '@sort');
        // 删除菜单
        Route::get('destroy/{id}', \App\Http\Controllers\Admin\NavController::class . '@destroy');
        // 恢复删除的菜单
        Route::get('restore/{id}', \App\Http\Controllers\Admin\NavController::class . '@restore');
        // 彻底删除菜单
        Route::get('forceDelete/{id}', \App\Http\Controllers\Admin\NavController::class . '@forceDelete');
    });
});
