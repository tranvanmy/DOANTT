<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>{{ trans('sites.framgia') }}</title>
    {{ Html::style('css/style.css') }}
    {{ Html::style('css/animate.css') }}
    {{ Html::style('bower/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('bower/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('bower/sweetalert/dist/sweetalert.css') }}
</head>
<body class="home">

    @yield('content')

    {{ Html::script('bower/sweetalert/dist/sweetalert.min.js') }}
    {{ Html::script('bower/jquery/dist/jquery.min.js') }}
    {{ Html::script('bower/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::script('js/jquery.slicknav.min.js') }}
    {{ Html::script('js/scripts.js') }}
    {{ Html::script('bower/jquery.uniform/dist/js/jquery.uniform.standalone.js') }}
    {{ Html::script('bower/wow/dist/wow.min.js') }}
    {{ Html::script('bower/axios/dist/axios.js') }}
    {{ Html::script('bower/vue/dist/vue.min.js') }}
    {{ Html::script('bower/toastr/toastr.min.js') }}
</body>
</html>