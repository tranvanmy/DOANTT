@extends('sites.master')

@section('content')
@include('sites._sections.header')
<div class="row">
    <div class="col-md-7 col-md-offset-3 login full-width">
        <div class="panel panel-default">
            <div class="panel-heading panel-login">{{ trans('sites.login') }}</div>
            <div class="panel-body">
               @if(session()->has('message'))
                    <div class="alert alert-danger messageLogin" role="alert">{!! session()->get('message') !!}</div>
               @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ route('postLogin') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">{{ trans('sites.loginEmail') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">{{ trans('sites.passWord') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-3">
                            <div class="checkbox">
                                <label id="check_remember">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ trans('sites.remember') }}
                                </label>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn">
                                    {{ trans('sites.login') }}
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ trans('sites.forgot')}}
                                </a>|
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ trans('sites.regiter') }}
                                </a>
                            </div>
                            <div class="clearfix"></div>
                            <hr/>
                            <div class="socialite">
                                <a class="btn btn-primary " href="{!! route('facebook.login')!!}">
                                <i class="fa fa-facebook-square" aria-hidden="true"></i> {{ trans('sites.loginFacebook') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('sites._sections.footer')
@endsection
