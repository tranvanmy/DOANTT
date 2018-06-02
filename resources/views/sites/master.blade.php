<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>UTT-Cook</title>
    <link rel="shortcut icon" type="icon" href="/images/favicon.ico">
    {{ Html::style('css/style.css') }}
    {{ Html::style('css/animate.css') }}
    {{ Html::style('bower/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('bower/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('bower/sweetalert/dist/sweetalert.css') }}
    {{ Html::style('bower/toastr/toastr.min.css') }}
    <meta id="token" name="csrf-token" value="{{ csrf_token() }}">
    @yield('style')

</head>
<body class="home">
<script lang="javascript">var _vc_data = {id : 5689903, secret : '13be534852c70016e7d3d4ba30445c90'};(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async=true; ga.defer=true;ga.src = '//live.vnpgroup.net/client/tracking.js?id=5689903';var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>                
    @yield('content')

    {{ Html::script('bower/sweetalert/dist/sweetalert.min.js') }}
    {{ Html::script('bower/jquery/dist/jquery.min.js') }}
    {{ Html::script('bower/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::script('js/jquery.slicknav.min.js') }}
    {{ Html::script('js/scripts.js') }}
    {{ Html::script('bower/jquery.uniform/dist/js/jquery.uniform.standalone.js') }}
    {{ Html::script('bower/wow/dist/wow.min.js') }}
    {{ Html::script('bower/axios/dist/axios.min.js') }}
    {{ Html::script('bower/vue/dist/vue.min.js') }}
    {{ Html::script('bower/toastr/toastr.min.js') }}
    {{ Html::script('js/profile.js') }}
    {{ Html::script('js/subcrice.js') }}
    {{ Html::script('sites_custom/js/cart.js') }}
    @yield('script')

</body>
</html>
