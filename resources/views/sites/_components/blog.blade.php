@extends('sites.master')
@section('content')
@include('sites._sections.header')
<main class="main login" role="main">
    <!--wrap-->
    <div class="wrap clearfix" id="blog">
        <!--breadcrumbs-->
        <nav class="breadcrumbs">
            <ul>
                <li>
                    <a href="{{ asset('/') }}">
                        {{trans('sites.home') }}
                    </a>
                </li>
                <li>
                    {{ trans('sites.blog') }}
                </li>
            </ul>
        </nav>
        <!--//breadcrumbs-->
        <!--row-->
        <div class="row">
            <header class="s-title wow fadeInLeft">
                <h1>{{ trans('sites.blog') }}</h1>
            </header>
            <!--content-->
            <section class="content three-fourth wow fadeInLeft">
                <div  v-for="item in items">
                    <article class="post wow fadeInUp">
                        <div class="entry-meta">
                            <div class="avatar">
                                <a v-bind:href="'/site/profile/user/' + item.user.id"><img v-bind:src="item.user.avatar"/><span>@{{ item.user.name }}</span></a>
                            </div>
                        </div>
                        <div class="container">
                            <div class="entry-featured"><a v-bind:href="'/site/blog/' + item.id"><img v-bind:src="item.image" alt="" /></a></div>
                            <div class="entry-content">
                                <h2><a v-bind:href="'/site/blog/' + item.id">@{{ item.title }}</a></h2>
                                <p> @{{ item.description }}</p>
                            </div>
                            <div class="actions">
                                <div>
                                    <div class="more">
                                        <i class="fa fa-book" aria-hidden="true"></i>
                                        <a v-bind:href="'/site/blog/' + item.id">{{ trans('sites.read_more') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="pager wow fadeInUp">
                    <nav>
                        <ul class="pagination">
                            <li v-if="pagination.current_page > 1">
                                <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li v-for="page in pagesNumber"
                            v-bind:class="[ page == isActived ? 'active' : '']">
                            <a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                        </li>
                        <li v-if="pagination.current_page < pagination.last_page">
                            <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)"> <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <!--//content-->
        <!--right sidebar-->
        @include('sites._components.category_component')
    </div>
</div>
</main>
@include('sites._sections.footer')
@endsection
@section('script')
{{ Html::script('js/blog.js') }}  
@endsection
