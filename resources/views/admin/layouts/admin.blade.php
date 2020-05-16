@extends('admin.layouts.gentelella')

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
                            <img src="{{ auth()->guard('socialite')->check() ? auth()->guard('socialite')->user()->avatar : asset('uploads/avatar/default.jpg') }}" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>{{ __('Admin Welcome') }}</span>
                            <h2>{{ auth()->guard('socialite')->check() ? auth()->guard('socialite')->user()->name : auth()->guard('admin')->user()->name }}</h2>
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
                                    <a><i class="fa fa-book"></i> {{ __('Article') }} <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/article/index') }}">{{ __('List') }}</a></li>
                                        <li><a href="{{ url('admin/article/replaceView') }}">{{ __('Batch Replace') }}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-th"></i> {{ __('Category & Nav') }} <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/category/index') }}">{{ __('Category') }}</a></li>
                                        <li><a href="{{ url('admin/nav/index') }}">{{ __('Nav') }}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-tags"></i> {{ __('Tag') }} <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/tag/index') }}">{{ __('List') }}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-comments"></i> {{ __('Comment') }} <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/comment/index') }}">{{ __('List') }}</a></li>
                                        <li><a href="{{ url('admin/comment/replaceView') }}">{{ __('Batch Replace') }}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-users"></i> {{ __('User') }} <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/user/index') }}">{{ __('Administrator') }}</a></li>
                                        <li><a href="{{ url('admin/socialiteUser/index') }}">{{ __('Socialite User') }}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-link"></i> {{ __('Link') }} <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/friendshipLink/index') }}">{{ __('Link') }}</a></li>
                                        <li><a href="{{ url('admin/site/index') }}">{{ __('Recommend Blog') }}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-commenting"></i> {{ __('Note') }} <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/note/index') }}">{{ __('List') }}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-cogs"></i> {{ __('Setting') }} <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin/config/email') }}">{{ __('Email') }}</a></li>
                                        <li><a href="{{ url('admin/socialiteClient/index') }}">{{ __('Socialite') }}</a></li>
                                        <li><a href="{{ url('admin/config/commentAudit') }}">{{ __('Comment Audit') }}</a></li>
                                        <li><a href="{{ url('admin/openSource/index') }}">{{ __('Open Source') }}</a></li>
                                        @if(config('app.locale') === 'zh-CN')
                                            <li><a href="{{ url('admin/config/qqQun') }}">QQ群</a></li>
                                        @endif
                                        <li><a href="{{ url('admin/config/backup') }}">{{ __('Backup') }}</a></li>
                                        <li><a href="{{ url('admin/config/seo') }}">{{ __('SEO') }}</a></li>
                                        <li><a href="{{ url('admin/config/socialShare') }}">{{ __('Social Share') }}</a></li>
                                        <li><a href="{{ url('admin/config/socialLinks') }}">{{ __('Social Links') }}</a></li>
                                        <li><a href="{{ url('admin/config/search') }}">{{ __('Search') }}</a></li>
                                        <li><a href="{{ url('admin/config/licenses') }}">{{ __('Licenses') }}</a></li>
                                        <li><a href="{{ url('admin/config/edit') }}">{{ __('Other Setting') }}</a></li>
                                        <li><a href="{{ url('admin/config/clear') }}">{{ __('Clear Cache') }}</a></li>
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
                                    {{ auth()->guard('socialite')->check() ? auth()->guard('socialite')->user()->name : auth()->guard('admin')->user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="{{ url('admin/login/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out </a></li>
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
