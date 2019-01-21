@extends('layouts.gentelella')

@section('body')

    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url('admin/index/index') }}" class="site_title"><i class="fa fa-paw"></i> <span>laravel-bjyblog</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{{ auth()->guard('oauth')->check() ? auth()->guard('oauth')->user()->avatar : asset('uploads/avatar/default.jpg') }}" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ auth()->guard('oauth')->check() ? auth()->guard('oauth')->user()->name : auth()->guard('admin')->user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a><i class="fa fa-book"></i> 文章管理 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/article/index') }}">文章列表</a></li>
                                        <li><a href="{{ url('admin/article/replaceView') }}">批量替换</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-th"></i> 分类菜单 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/category/index') }}">分类管理</a></li>
                                        <li><a href="{{ url('admin/nav/index') }}">菜单管理</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-tags"></i> 标签管理 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/tag/index') }}">标签列表</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-comments"></i> 评论管理 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/comment/index') }}">评论列表</a></li>
                                        <li><a href="{{ url('admin/comment/replaceView') }}">批量替换</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-users"></i> 用户管理 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/user/index') }}">管理员列表</a></li>
                                        <li><a href="{{ url('admin/oauthUser/index') }}">第三方用户列表</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-link"></i> 友情链接 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/friendshipLink/index') }}">友情链接</a></li>
                                        <li><a href="{{ url('admin/site/index') }}">推荐博客</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-commenting"></i> 随言碎语 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/chat/index') }}">随言碎语列表</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-cogs"></i> 系统设置 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/config/email') }}">邮箱配置</a></li>
                                        <li><a href="{{ url('admin/config/oauth') }}">第三方登录</a></li>
                                        <li><a href="{{ url('admin/gitProject/index') }}">开源项目</a></li>
                                        <li><a href="{{ url('admin/config/qqQun') }}">QQ群</a></li>
                                        <li><a href="{{ url('admin/config/backup') }}">备份</a></li>
                                        <li><a href="{{ url('admin/config/edit') }}">其他配置</a></li>
                                        <li><a href="{{ url('admin/config/clear') }}">清空缓存</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a href="{{ url('admin/config/edit') }}" data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('admin/login/logout') }}" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->guard('oauth')->check() ? auth()->guard('oauth')->user()->name : auth()->guard('admin')->user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="{{ url('admin/login/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>@yield('nav') <small>@yield('description')</small></h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for..." name="wd" value="{{ request()->input('wd') }}">
                                        <span class="input-group-btn">
                                      <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

@endsection
