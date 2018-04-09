@extends('sites.master')
@section('content')
@include('sites._sections.header')
<main class="main login" role="main">
    <div class="wrap clearfix" id="repicesCooking">
        <nav class="breadcrumbs">
            <ul>
                <li><a href="index.html" title="Home">{{ trans('sites.home') }}</a></li>
                <li>{{ trans('sites.repices') }}</li>
            </ul>
        </nav>
        <div class="row">
            <header class="s-title wow fadeInLeft">
                <h1>{{ trans('sites.repices') }}</h1>
            </header> 
            <section class="content three-fourth wow fadeInUp">
                <div class="entries row">
                    <!--item-->
                    <div>
                    @foreach( $listCookings as $listCooking)
                        <div class="entry one-third wow fadeInLeft">
                            <figure>
                                <img src="/{{ $listCooking->image }}" alt="" />
                                <figcaption><a  href="/site/cooking/{{ $listCooking->id }}"><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a></figcaption>
                            </figure>
                            <div class="container">
                                <h2><a href="/site/cooking/{{ $listCooking->id }}">{{ $listCooking->name }}</a></h2> 
                                <div class="actions">
                                    <div>
                                        <div class="difficulty">
                                            <i class="ico i-medium"></i>
                                            <a v-bind:href="'/site/cooking/'+ item.id"> {{ $listCooking->level->name }}</a>
                                        </div>
                                        <div class="likes">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>{{ $listCooking->time }}
                                        </div>
                                        <div class="comments">
                                            <i class="fa fa-star-half-o" aria-hidden="true"></i>{{ $listCooking->rate_point }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach                      
                    </div>
                </div>
            </section>              
            <!--right sidebar-->
            @include('sites._sections.sidebar')
        </div>
           {{ $listCookings->links() }}
        </div>
    </main>
<!--//wrap-->
@include('sites._sections.footer')
@endsection
