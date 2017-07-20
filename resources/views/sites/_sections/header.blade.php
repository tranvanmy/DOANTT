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
                    <a href="#">
                        <span>{{ trans('sites.topChef') }}</span>
                    </a>
                </li>
                <li>
                    <a href="" title="{{ trans('sites.contact') }}">
                        <span>{{ trans('sites.contact') }}</span>
                    </a>
                </li>
                @if(Auth::check())
                    <li class="current-menu-item" style="margin-left: 100px;">
                            <img src="{{ Auth::user()->avatar }}" alt="" style="width: 90px;">
                        <ul>
                            <li>
                                <a href="{{ asset('site/profile/user/' . Auth::user()->id) }}">
                                    {{ trans('sites.profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('site/wislish/'.Auth::user()->id) }}">
                                    <span>{{ trans('sites.listwishlish') }}</span>
                                </a>
                            </li>
                            <li>
                                {!! Form::open(['url' => url('logout'), 'method' => 'post']) !!}
                                    <a onclick="confirmButtonBeforeSubmit(this)" data-text="{{ trans('sites.sure') }}" >{{ trans('sites.logout') }}
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
                @else
                    <li class="medium"><a href="{{ route('login') }}" title="{{ trans('sites.login') }}"><i class="ico i-account"></i> <span>{{ trans('sites.login') }}</span></a></li>
                @endif
                    <li class="light"><a href="" title="{{ trans('sites.search') }}"><i class="ico i-search"></i> <span>{{ trans('sites.search') }}</span></a></li>
                    <li class="dark"><a href="" title="{{ trans('sites.submitRepice') }}"><i class="ico i-submitrecipe"></i> <span>{{ trans('sites.submitRepice') }}</span></a></li>
                    <li class="light">
                    @if(Auth::check())
                        <a href="">
                            <i class="fa fa-cart-arrow-down fa-4x wishlishead" aria-hidden="true"></i>
                            <span>{{ trans('sites.cart') }}</span>
                        </a>
                    @endif
                    </li>
            </ul>
        </nav>
    </div>
</header>
