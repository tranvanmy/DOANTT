<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ Html::style('bower/bootstrap/dist/css/bootstrap.min.css') }}
        {{ Html::style('sites_custom/css/app.css') }}
        {{ Html::style('bower/swiper/dist/css/swiper.min.css') }}
        {{ Html::style('bower/font-awesome/css/font-awesome.min.css') }}
        {{ Html::style('sites_custom/css/lc_switch.css') }}
        {{ Html::style('sites_custom/css/custom.css') }}
        {{ Html::style('sites_custom/css/dashboard1.css') }}
        {{ Html::style('sites_custom/css/dashboard1_timeline.css') }}
        {{ Html::style('bower/themify-icons/css/themify-icons.css') }}
        {{ Html::style('bower/bootstrap-select/dist/css/bootstrap-select.min.css') }}
        <meta id="token" name="csrf-token" value="{{ csrf_token() }}">
        @yield('style')
    </head>
    <body class="skin-default">
        <div class="preloader">
            <div class="loader_img"><img src="{{ asset('images/admin/img/loader.gif') }}" alt="loading..."></div>
        </div>
        <!-- header logo: style can be found in header-->
        <header class="header">
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="" class="logo">
                    <!-- Add the class icon to your logo image or logo icon to add the marginin -->
                    <img src="{{ asset('images/admin/img/logo.png') }}" width="100%" alt="logo"/>
                </a>
                <!-- Header Navbar: style can be found in header-->
                <!-- Sidebar toggle button-->
                <div>
                    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                        <i class="fa fa-fw ti-menu"></i>
                    </a>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-fw ti-email black"></i>
                                <span class="label label-success"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages table-striped">
                                <li class="dropdown-title">{{ trans('admin.new_message') }}</li>
                                <li>
                                    <a href="" class="message striped-col">
                                        <img class="message-image img-circle" src="{{ asset('images/admin/img/authors/avatar7.jpg') }}" alt="avatar-image">

                                        <div class="message-body"><strong>{{ trans('admin.name_demo') }}</strong>
                                            <br>
                                                {{ trans('admin.message_demo') }}
                                            <br>
                                            <small>{{ trans('admin.just_now') }}</small>
                                            <span class="label label-success label-mini msg-lable">
                                                {{ trans('admin.new') }}
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="#">{{ trans('admin.view_all_message') }}</a>
                                </li>
                            </ul>

                        </li>
                        <!--rightside toggle-->
                        <li>
                            <a href="#" class="dropdown-toggle toggle-right" data-toggle="dropdown">
                                <i class="fa fa-fw ti-view-list black"></i>
                                <span class="label label-danger"></span>
                            </a>
                        </li>
                        <!-- User Account: style can be found in dropdown-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                                <img src="{{ asset('images/admin/img/authors/avatar1.jpg') }}" width="35" class="img-circle img-responsive pull-left" height="35" alt="User Image">
                                <div class="riot">
                                    <div>
                                        {{ trans('admin.name_demo') }}
                                        <span>
                                            <i class="caret"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('images/admin/img/authors/avatar1.jpg') }}" class="img-circle" alt="User Image">
                                    <p>{{ trans('admin.name_demo') }}</p>
                                </li>
                                <!-- Menu Body -->
                                <li class="p-t-3">
                                    <a href="">
                                        <i class="fa fa-fw ti-user"></i>
                                        {{ trans('admin.my_profile') }}
                                    </a>
                                </li>
                                <li role="presentation"></li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-fw ti-settings"></i>
                                        {{ trans('admin.account_setting') }}
                                    </a>
                                </li>
                                <li role="presentation" class="divider"></li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="">
                                            <i class="fa fa-fw ti-lock"></i>
                                            {{ trans('admin.lock') }}
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="">
                                            <i class="fa fa-fw ti-shift-right"></i>
                                            {{ trans('admin.logout') }}
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar-->
                <section class="sidebar">
                    <div id="menu" role="navigation">
                        <div class="nav_profile">
                            <div class="media profile-left">
                                <a class="pull-left profile-thumb" href="#">
                                    <img src="{{ asset('images/admin/img/authors/avatar1.jpg') }}" class="img-circle" alt="User Image"></a>
                                <div class="content-profile">
                                    <h4 class="media-heading">{{ trans('admin.name_demo') }}</h4>
                                    <ul class="icon-list">
                                        <li>
                                            <a href="">
                                                <i class="fa fa-fw ti-user"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-fw ti-lock"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-fw ti-settings"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-fw ti-shift-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="navigation">
                            <li>
                                <a href="">
                                    <i class="menu-icon ti-desktop"></i>
                                    <span class="mm-text ">{{ trans('admin.dashboard') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.category.index') }}">
                                    <i class="menu-icon ti-view-list"></i>
                                    <span>{{ trans('admin.category') }}</span>
                                </a>
                            </li>
                            <li class="menu-dropdown">
                                <a href="{{ route('admin.user.index') }}">
                            <li>
                                    <i class="menu-icon ti-user"></i>
                                    <span>{{ trans('admin.user') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.ingredient.index') }}">
                                    <i class="menu-icon ti-server"></i>
                                    <span>{{ trans('admin.ingredient') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon ti-check-box"></i>
                                    <span>{{ trans('admin.order') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon ti-gallery"></i>
                                    <span>{{ trans('admin.post') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon ti-layout-placeholder"></i>
                                    <span>{{ trans('admin.subscribe') }}</span>
                                </a>
                            </li>
                        </ul>
                        <!-- / .navigation -->
                    </div>
                    <!-- menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
            <aside class="right-side">
                <section class="content-header">
                    @yield('breadcrumb')
                </section>

                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </aside>
            <!-- /.right-side -->
        </div>
        <!-- ./wrapper -->
        <!-- global js -->
        <div id="qn"></div>
        {{ Html::script('bower/jquery/dist/jquery.min.js') }}
        {{ Html::script('sites_custom/js/app.js') }}
        {{ Html::script('sites_custom/js/jquery.flot.spline.js') }}
        {{ Html::script('sites_custom/js/jquery.flot.tooltip.js') }}
        {{ Html::script('sites_custom/js/newsTicker.js') }}
        {{ Html::script('bower/Flot/jquery.flot.js') }}
        {{ Html::script('bower/Flot/jquery.flot.resize.js') }}
        {{ Html::script('bower/Flot/jquery.flot.stack.js') }}
        {{ Html::script('bower/swiper/dist/js/swiper.min.js') }}
        {{ Html::script('bower/chart.js/dist/Chart.js') }}
        {{ Html::script('bower/moment/min/moment.min.js') }}
        {{ Html::script('sites_custom/js/dashboard1.js') }}
        {{ Html::script('bower/vue/dist/vue.min.js') }}
        {{ Html::script('bower/axios/dist/axios.min.js') }}
        {{ Html::script('bower/toastr/toastr.min.js') }}
        {{ Html::script('bower/bootstrap-select/dist/js/bootstrap-select.min.js') }}
        @yield('script')
    </body>
</html>
