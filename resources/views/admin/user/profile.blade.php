@extends('admin.master')
@section('title')
{{ trans('admin.category_manage') }}
@endsection
@section('style')
<meta id="token" name="csrf-token" value="{{ csrf_token() }}">
@endsection
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ trans('admin.viewUser') }}
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">
                        <i class="fa fa-fw ti-home"></i>
                    </a>
                </li>
                <li>
                    <a href="#">{{  trans('admin.user') }}</a>
                </li>
                <li class="active">
                {{ $data['name']}}
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel ">
                        <div class="panel-body">
                            <div class="panel panel-widget panel-default col-md-4">
                                <div class="form-group">
                                    <div class="text-center mbl m-t-10">
                                        <img src="{{ $data['avatar'] }}" alt="" class="img-circle img-bor"/>
                                    </div>
                                </div>
                                <div class="profile_user text-center">
                                    <h3 class="user_name_max">{{ $data['name'] }}</h3>
                                    <p>{{ $data['email'] }}</p>
                                    <span class="fa-stack faceb fa-lg">
                                         <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-stack-1x fa-facebook fa-inverse"></i>
                                    </span>
                                    <span class="fa-stack googleplus fa-lg">
                                         <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-flag fa-stack-1x fa-google-plus fa-inverse"></i>
                                    </span>
                                    <span class="fa-stack tweet-btn fa-lg">
                                         <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-flag fa-stack-1x fa-twitter fa-inverse"></i>
                                    </span>
                                </div>
                                &nbsp;&nbsp;
                                <div class="profile_user text-center">
                                    <button type="button" class="btn btn-success btn-sm">{{ trans('admin.follows') }}</button>
                                    <button type="button" class="btn btn-primary btn-sm">Message</button>
                                </div>
                                <br/>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-custom">
                                            <li class="active">
                                                <a href="#tab-activity" data-toggle="tab">
                                                    <strong>{{ trans('admin.post') }}</strong>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#followers" data-toggle="tab">
                                                    <strong>{{ trans('admin.follows') }}</strong>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#byfollowers" data-toggle="tab">
                                                    <strong>{{ trans('admin.byFollows') }}</strong>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab-events" data-toggle="tab">
                                                    <strong>{{ trans('admin.cooking') }}</strong>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content nopadding noborder">
                                            <div id="tab-activity" class="tab-pane animated fadeInRight fade in active">
                                                <div class="table-responsive">
                                                    <table class="table table-responsive">
                                                        <tbody>
                                                        @foreach($data->posts as $post)
                                                        <tr>
                                                            <td class="text-center">
                                                                <i class="text-center glyphicon glyphicon-plus"></i>
                                                            </td>
                                                            <td>
                                                              <a href="{{ $post->id }}" class="label label-success"> {{ $post->title }} </a>
                                                            </td>
                                                            <td>
                                                                {{ $post->created_at}}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- tab-pane -->
                                            <div class="tab-pane animated fadeInRight" id="followers">
                                            @foreach($data->follows as $follow)
                                                <div class="row m-t-l-10">
                                                    <div class="col-md-6 col-lg-6 col-sm-6 bord">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="img">
                                                                    <a href="#">
                                                                    <img class="media-object thumbnail img-responsive"
                                                                             height="60" width="60"
                                                                             src="{{ ($follow->userFollow->avatar)}}"
                                                                             alt="avatar image">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="details">
                                                                    <div class="name">
                                                                    <br/>
                                                                        <a href="  {{ ($follow->userFollow->id )}}" class="label label-success">  {{ ($follow->userFollow->name)}}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                            <div class="tab-pane animated fadeInRight" id="byfollowers">
                                                <div class="row m-t-l-10">
                                                @foreach($data->followBys as $byfollow)
                                                    <div class="col-md-6 col-lg-6 col-sm-6 bord">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="img">
                                                                    <a href="#">
                                                                        <img class="media-object thumbnail img-responsive"
                                                                             height="60" width="60"
                                                                             src="{{ ($byfollow->user->avatar) }}"
                                                                             alt="avatar image">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="details">
                                                                    <div class="name">
                                                                     <br/>
                                                                        <a href="{{ ($byfollow->user->id) }}" class="label label-success">{{ ($byfollow->user->name) }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                </div>
                                            </div>
                                            <div class="tab-pane animated fadeInRight" id="tab-events">
                                                <div class="events">
                                                    <div class="row m-t-l-10">
                                                      @foreach($data->cookings as $cooking)
                                                        <div class="col-sm-12 col-md-12 bord">
                                                            <div class="media">
                                                                <a class="pull-left" href="#">
                                                                    <img class="media-object thumbnail"
                                                                         src="{{ $cooking->image }}" alt="image"
                                                                         height="80" width="80"/>
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="event-title">
                                                                        <a href="{{ $cooking->id }}" class="label label-danger">{{ $cooking->name }}</a>
                                                                    </h4>
                                                                    <small class="text-success">
                                                                        <i class="icon-location-pin icons"></i>
                                                                       {{ $cooking->description }}
                                                                    </small>
                                                                    <br/>
                                                                    <p class="label label-danger">time:{{ $cooking->time }}</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                    <!-- row -->
                                                    <br/>
                                                    <!-- row -->
                                                </div>
                                                <!-- events -->
                                            </div>
                                            <!-- tab-pane -->
                                        </div>
                                        <!-- tab-content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
