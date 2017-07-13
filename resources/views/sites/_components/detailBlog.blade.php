@extends('sites.master')
@section('content')
@include('sites._sections.header')
<main class="main login" role="main">
    <div class="wrap clearfix">
        <nav class="breadcrumbs">
            <ul>
                <li><a href="index.html" title="Home">{{ trans('sites.home') }}</a></li>
                <li><a href="/site/blog">{{ trans('sites.blog') }}</a></li>
                <li>{{ $detailPost['title'] }}</li>
            </ul>
        </nav>
        <div class="row">
            <header class="s-title wow fadeInLeft">
                <h1>{{ $detailPost['title'] }}</h1>
            </header>
            <!--content-->
            <section class="content three-fourth wow fadeInLeft">
                <!--blog entry-->
                <article class="post single">
                    <div class="entry-meta">
                        <div class="avatar">
                            <a href="{{ route('site.user.show', [$detailPost->user->id]) }}">
                                <img src="{{ $detailPost->user->avatar}}" alt="" />
                                <span>{{ $detailPost->user->name }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="entry-featured"><a href="#"><img src="{{ $detailPost->image }}" alt="" /></a></div>
                        <div class="entry-content">
                          {{ $detailPost->content}}
                      </div>
                  </div>
              </article>
              <!--comments-->
              @include('sites._components.comments')
          </section>
          <!--right sidebar-->
          @include('sites._components.category_component')
          <!--//right sidebar-->
      </div>
      <!--//row-->
  </div>
  <!--//wrap-->
</main>
@include('sites._sections.footer')
@endsection
@section('script')
{{ Html::script('js/blog.js') }}  
@endsection
