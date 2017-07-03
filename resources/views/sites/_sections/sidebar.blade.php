<aside class="sidebar one-fourth">
    <div class="widget wow fadeInRight">
    
        <h3>{{ trans('sites.recipeCategory') }}</h3>
        <ul class="boxed">
            <li class="light"><a href="" title="{{ trans('sites.piza') }}"><i class="ico i-appetizers"></i> <span>{{ trans('sites.piza') }}</span></a></li>
            <li class="medium"><a href="" title="{{ trans('sites.cocktails') }}"><i class="ico i-cocktails"></i> <span>{{ trans('sites.cocktails') }}</span></a></li>
            <li class="dark"><a href="" title="{{ trans('sites.deserts') }}"><i class="ico i-deserts"></i> <span>{{ trans('sites.deserts') }}</span></a></li>
        </ul>
    </div>
    <div class="widget wow fadeInRight" data-wow-delay=".2s">
        <h3>{{ trans('sites.tips')}}</h3>
        <ul class="articles_latest">
            <li>
                <a href="">
                    <img src="{{ asset('images/img9.jpg') }}" alt="" />
                    <h6>{{ trans('sites.howTo') }}</h6>
                </a>
            </li>
        </ul>
    </div>
    <div class="widget members wow fadeInRight" data-wow-delay=".4s">
        <h3>{{ trans('sites.ourMember') }}</h3>
        <div id="members-list-options" class="item-options">
            <a href="#">{{ trans('sites.newest') }}</a>
            <a class="selected" href="#">{{ trans('sites.active') }}</a>
            <a href="#">{{ trans('sites.popular') }}</a>
        </div>
        <ul class="boxed">
            <li><div class="avatar"><a href=""><img src="{{ asset('images/avatar1.jpg') }}" alt="" /><span>{{ trans('sites.name') }}</span></a></div></li>
        </ul>
    </div>
    <div class="widget wow fadeInRight" data-wow-delay=".2s">
        <h3>{{ trans('sites.topRating') }}</h3>
        <ul class="articles_latest">
            <li>
                <a href="blog_single.html">
                    <img src="{{ asset('images/img9.jpg') }}" alt="" />
                    <h6>{{ trans('sites.howTo') }}</h6>
                </a>
            </li>
        </ul>
    </div>
    <div class="widget wow fadeInRight" data-wow-delay=".6s">
        <h3>{{ trans('sites.ads')}}</h3>
        <a href="#"><img src="{{ asset('images/advertisment.jpg') }}" alt="" /></a>
    </div>
</aside>
