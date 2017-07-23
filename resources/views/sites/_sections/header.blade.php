<div class="preloader" style="display: none;">
        <div class="spinner"></div>
</div>
<header class="head" role="banner">
    <div class="wrap clearfix">
        <a href="{{ route('home') }}" class="logo"><img src="{{ asset('images/ok.png') }}" style="margin-top: -29px;" /></a>
        <nav class="main-nav" role="navigation" id="menu">
            <ul>
                <li><a href="{{ route('home') }}" title="{{ trans('sites.home') }}"><span>{{ trans('sites.home') }}</span></a></li>
                <li>
                    <a href="/site/cooking" title="{{ trans('sites.recipes') }}">
                        <span>{{ trans('sites.recipes') }}</span>
                    </a>
                </li>
                <li>
                    <a href="/site/blog" title="{{ trans('sites.blog') }}">
                        <span>{{ trans('sites.blog') }}</span>
                    </a>
                </li>
                <li>
                    <a href="/site/master">
                        <span>{{ trans('sites.topChef') }}</span>
                    </a>
                </li>
                @if(Auth::check())
                    <li class="current-menu-item" id="liHead">
                            <img src="{{ Auth::user()->avatar }}" alt="" style="width: 90px;">
                        <ul>
                            <li>
                                <a href="{{ asset('site/profile/user/' . Auth::user()->id) }}">
                                    <i class="fa fa-user" aria-hidden="true"></i> {{ trans('sites.profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('site/wislish/'.Auth::user()->id) }}">
                                    <i class="fa fa-heart" aria-hidden="true"></i> {{ trans('sites.listwishlish') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('order') }}">
                                   <i class="fa fa-shopping-cart" aria-hidden="true"></i> {{ trans('sites.order_list') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('order/sell') }}">
                                    <i class="fa fa-certificate" aria-hidden="true"></i> {{ trans('sites.order_list_sell') }}
                                </a>
                            </li>
                            <li>
                                {!! Form::open(['url' => url('logout'), 'method' => 'post']) !!}
                                    <a onclick="confirmButtonBeforeSubmit(this)" data-text="{{ trans('sites.sure') }}" >
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> {{ trans('sites.logout') }}
                                    </a>
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <nav class="user-nav" role="navigation">
            <ul>
                @if(Auth::check())
                    <li class="light">
                        <a href="/cart">
                            <i class="fa fa-cart-arrow-down fa-3x wishlishead" aria-hidden="true"></i>
                            <b id="cart_number"></b>
                            <span>{{ trans('sites.cart') }}</span>
                        </a>
                    </li>
                @else
                    <li class="medium"><a href="{{ route('login') }}" title="{{ trans('sites.login') }}"><i class="ico i-account"></i> <span>{{ trans('sites.login') }}</span></a></li>
                @endif
                    <li class="light">
                        <a href="/search" title="{{ trans('sites.search') }}">
                            <i class="ico i-search"></i> <span>{{ trans('sites.search') }}</span>
                        </a>
                    </li>
                    <li class="dark">
                        <a href="/cooking" title="{{ trans('sites.submitRepice') }}">
                            <i class="ico i-submitrecipe"></i> <span>{{ trans('sites.submitRepice') }}</span>
                        </a>
                    </li>
            </ul>
        </nav>
    </div>
</header>
