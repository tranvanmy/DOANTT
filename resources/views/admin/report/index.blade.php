@extends('admin.master')

@section('title')
{{ trans('admin.category_manage') }}
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front">
                        <div class="bg-icon pull-left">
                            <i class="ti-eye text-warning"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b>{{ $sumPost }}</b></h3>
                            <p>{{ trans('admin.post') }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front">
                        <div class="bg-icon pull-left">
                            <i class="ti-shopping-cart text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3><b id="widget_count3">{{ $sumPost }}</b></h3>
                            <p>{{ trans('admin.order') }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front">
                        <div class="bg-icon pull-left">
                            <i class="ti-slice text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b>{{ $sumRecipe }}</b></h3>
                            <p>{{ trans('admin.recipe') }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front">
                        <div class="bg-icon pull-left">
                            <i class="ti-user text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b>{{ $sumUser }}</b></h3>
                            <p>{{ trans('admin.user') }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel main-chart">
                            <div class="panel-heading panel-tabs">
                                <ul class="nav nav-tabs nav-float" role="tablist">
                                    <li class="active text-center">
                                        <a href="#home" role="tab" data-toggle="tab">{{ trans('admin.user') }}</a>
                                    </li>
                                    <li class="text-center">
                                        <a href="#order" role="tab" data-toggle="tab">{{ trans('admin.order') }}</a>
                                    </li>
                                    <li class="text-center">
                                        <a href="#profile" role="tab" data-toggle="tab"><span class="hidden-xs">{{ trans('admin.post') }}</span>
                                        </a>
                                    </li>
                                    <li class="text-center">
                                        <a href="#repices" role="tab" data-toggle="tab"><span class="hidden-xs">{{ trans('admin.recipe') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home">
                                        <div class="form-group">
                                            {!! $chartUser->render() !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade in active" id="order">
                                        <div class="form-group">
                                            {!! $chartOrder->render() !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile">
                                        <div class="form-group">
                                                  
                                            {!! $chartPost->render() !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="repices">
                                        <div class="form-group">    
                                            {!! $chartRepices->render() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="background-overlay"></div>
    </section>
@endsection

@section('script')
<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
{{ Html::script('admin/user.js') }}
@endsection
