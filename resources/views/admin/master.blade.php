<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta id="token" name="csrf-token" value="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" />

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
        {{ Html::style('bower/toastr/toastr.min.css') }}
        {{ Html::style('admin/css/customAdmin.css') }}
        <meta id="token" name="csrf-token" value="{{ csrf_token() }}">
         {!! Charts::assets() !!}
        @yield('style')
    </head>
    <body class="skin-default">
        <div class="preloader">
            <div class="loader_img"><img src="{{ asset('images/admin/img/loader.gif') }}" alt="loading..."></div>
        </div>
        <header class="header">
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="" class="logo">
                    <img src="{{ asset('images/logo.png') }}" width="100%" alt="logo"/>
                </a>
                <div>
                    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                        <i class="fa fa-fw ti-menu"></i>
                    </a>
                </div>
                <div class="navbar-right" id="myprofile">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                                <img src="{{ Auth::user()->avatar }}" width="35" class="img-circle img-responsive pull-left" height="35" alt="User Image">
                                <div class="riot">
                                    <div>
                                        {{ Auth::user()->name }}
                                        <span>
                                            <i class="caret"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
                                    <p>{{ Auth::user()->name }}</p>
                                </li>
                                <li class="p-t-3">
                                    <a v-on:click="showInfor({{ Auth::user()->id }})">
                                        <i class="fa fa-fw ti-user"></i>
                                        {{ trans('admin.my_profile') }}
                                    </a>
                                </li>
                                <li role="presentation" class="divider"></li>
                                <li class="user-footer">
                                    <a href="{{ route('logout') }}">
                                        <i class="fa fa-fw ti-shift-right"></i>
                                        {{ trans('admin.logout') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                     <div id="profileUser" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">
                                        <i class="fa fa-paint-brush" aria-hidden="true"></i> {{ trans('admin.infor') }}
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createPost">
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <h4>Họ và Tên:</h4> @{{ fillItem.name }}
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Email</h4>  @{{ fillItem.email }}
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Phone:</h4> @{{ fillItem.phone }}
                                            </div>
                                            <div class="col-md-4 col-md-offset-3" id="avatar_admin">
                                                <img v-bind:src="fillItem.avatar"  class="img-circle image_admin" alt="">
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                 <button type="button" class="btn btn-success" v-on:click="update_admin(fillItem.id)">{{ trans('admin.account_setting') }}</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('sites.close') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="Updateprofile" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">
                                        <i class="fa fa-paint-brush" aria-hidden="true"></i> {{ trans('admin.infor') }}
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateAdmin(fillItem.id)">
                                        <div class="form-group">
                                            <div class="form-group col-md-4" >
                                                <label for="name">{{ trans('sites.name') }}</label>
                                                <input type="text" name="name" class="form-control" v-model="fillItem.name" />
                                                <span v-if="formErrorsUpdate['name']" class="error text-danger">@{{ formErrorsUpdate['name'][0] }}</span><br>
                                                <br/>
                                            </div>
                                            <div class="form-group col-md-4" >
                                                <label for="name">{{ trans('sites.phone') }}</label>
                                                <input type="text" name="phone" class="form-control" v-model="fillItem.phone" />
                                                <span v-if="formErrorsUpdate['phone']" class="error text-danger">@{{ formErrorsUpdate['phone'][0] }}</span><br>
                                                <br/>
                                            </div>
                                             <div class="form-group col-md-4" >
                                                <label for="name">{{ trans('sites.phone') }}</label>
                                                <input type="text" name="email" class="form-control" v-model="fillItem.email" />
                                                <span v-if="formErrorsUpdate['email']" class="error text-danger">@{{ formErrorsUpdate['email'][0] }}</span><br>
                                                <br/>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group col-md-4" >
                                                <label for="name">{{ trans('admin.password') }}</label>
                                                <input type="password" name="password" class="form-control" v-model="fillItem.password" />
                                                <span v-if="formErrorsUpdate['password']" class="error text-danger">@{{ formErrorsUpdate['password'][0] }}</span><br>
                                                <br/>
                                            </div>
                                             <div class="form-group col-md-4" >
                                                <label for="name">{{ trans('admin.newpasss') }}</label>
                                                <input type="password" name="newpassword" class="form-control" v-model="fillItem.newpassword" />
                                                <span v-if="formErrorsUpdate['newpassword']" class="error text-danger">@{{ formErrorsUpdate['newpassword'][0] }}</span><br>
                                                <br/>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="name">{{ trans('admin.confirm_pass') }}</label>
                                                <input type="password" name="confirm_pass" class="form-control" v-model="fillItem.confirm_pass" />
                                                <span v-if="formErrorsUpdate['confirm_pass']" class="error text-danger">@{{ formErrorsUpdate['comfirm_pass'][0] }}</span><br>
                                                <br/>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group col-md-5 col-md-offset-2">
                                                <div class="img-circle">
                                                    <img v-bind:src="fillItem.avatar" alt="" class="img-circle image_admin" id="imgprofile">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <br>
                                            <div class="form-group col-md-5 col-md-offset-3">
                                                <div class="file-upload-form">
                                                    <input type="file" @change="previewImage" accept="image/*" name="avatar">
                                                </div>
                                                 <span v-if="formErrorsUpdate['avatar']" class="error text-danger">@{{ formErrorsUpdate['avatar'][0] }}</span><br>
                                                <br/>
                                                <div class="image-preview" v-if="imageData.length > 0">
                                                    <img class="preview img-circle image_admin" :src="imageData">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success"> {{ trans('admin.update_account') }}
                                                </button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    {{ trans('sites.close') }}
                                                </button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">
                <section class="sidebar">
                    <div id="menu" role="navigation">
                        <div class="nav_profile">
                            <div class="media profile-left">
                                <a class="pull-left profile-thumb" href="#">
                                    <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image"></a>
                                <div class="content-profile">
                                    <h4 class="media-heading">{{ Auth::user()->name }}</h4>
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
                                <a href="{{ route('admin.cooking.index') }}">
                                    <i class="menu-icon ti-files"></i>
                                    <span>{{ trans('admin.cooking') }}</span>
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
                                <a href="{{ route('admin.order.index') }}">
                                    <i class="menu-icon ti-check-box"></i>
                                    <span>{{ trans('admin.order') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.post.index') }}">
                                    <i class="menu-icon ti-gallery"></i>
                                    <span>{{ trans('admin.post') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.subcrice.index') }}">
                                    <i class="menu-icon ti-layout-placeholder"></i>
                                    <span>{{ trans('admin.subscribe') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://my.vchat.vn/home/type.php?module=msg" target="_blank">
                                  <i class="menu-icon ti-layout-placeholder"></i>
                                    <span>{{ trans('admin.inbox') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </section>
            </aside>
            <aside class="right-side">
                <section class="content-header">
                    @yield('breadcrumb')
                </section>
                <section class="content">
                    @yield('content')
                </section>
            </aside>-->
        </div>
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
        {{ Html::script('bower/toastr/toastr.min.js') }}
        {{ Html::script('admin/profile_admin.js') }}
        @yield('script')
    </body>
</html>
