<header class="head" role="banner">
    <div class="wrap clearfix">
        <a href="" class="logo"><img src="{{ asset('images/ok.png') }}" style="margin-top: -29px;" /></a>
        <nav class="main-nav" role="navigation" id="menu">
            <ul>
                <li class="current-menu-item"><a href="" title="{{ trans('sites.home') }}"><span>{{ trans('sites.home') }}</span></a></li>
                <li>
                    <a href="" title="{{ trans('sites.recipes') }}"><span>{{ trans('sites.recipes') }}</span></a>
                    <ul>
                        <li><a href="">{{ trans('sites.home') }}</a></li><li><a href="" title="{{ trans('sites.recipes') }}">{{ trans('sites.recipes') }}</a></li>
                    </ul>
                </li>
                <li><a href="" title="{{ trans('sites.blog') }}"><span>{{ trans('sites.blog') }}</span></a>
                    <ul>
                        <li><a href="" title="{{ trans('sites.blogPost') }}">{{ trans('sites.blogPost') }}</a></li>
                    </ul>
                </li>
                <li><a href="#"><span>{{ trans('sites.topChef') }}</span></a>
                    <ul>
                        <li><a href="" title=""></a></li>
                    </ul>
                </li>
                <li><a href="" title="{{ trans('sites.contact') }}"><span>{{ trans('sites.contact') }}</span></a></li>
            </ul>
        </nav>
        <nav class="user-nav" role="navigation">
            <ul>
                <li class="light"><a href="" title="{{ trans('sites.search') }}"><i class="ico i-search"></i> <span>{{ trans('sites.search') }}</span></a></li>
                <li class="medium"><a href="" title="{{ trans('sites.myAccount') }}"><i class="ico i-account"></i> <span>{{ trans('sites.myAccount') }}</span></a></li>
                <li class="dark"><a href="" title="{{ trans('sites.submitRepice') }}"><i class="ico i-submitrecipe"></i> <span>{{ trans('sites.submitRepice') }}</span></a></li>
            </ul>
        </nav>
    </div>
</header>
