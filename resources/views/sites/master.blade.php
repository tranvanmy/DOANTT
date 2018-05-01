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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300&amp;subset=vietnamese" rel="stylesheet">
    <meta id="token" name="csrf-token" value="{{ csrf_token() }}">
    @yield('style')

</head>
<body class="home">

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{latest-api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

        <script lang="javascript">var _vc_data = {id : 1301525, secret : '7121c5894fbc00d7f7f1cc549fbd9629'};(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async=true; ga.defer=true;ga.src = '//live.vnpgroup.net/client/tracking.js';var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>
    @yield('content')

    {{ Html::script('bower/sweetalert/dist/sweetalert.min.js') }}
    {{ Html::script('bower/jquery/dist/jquery.min.js') }}
    {{ Html::script('bower/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::script('js/jquery.slicknav.min.js') }}
    {{ Html::script('js/scripts.js') }}
    {{ Html::script('bower/jquery.uniform/dist/js/jquery.uniform.standalone.js') }}
    {{ Html::script('bower/wow/dist/wow.min.js') }}
    {{ Html::script('bower/axios/dist/axios.min.js') }}
    {{ Html::script('bower/axios/dist/axios.js') }}
    {{ Html::script('bower/vue/dist/vue.min.js') }}
    {{ Html::script('bower/toastr/toastr.min.js') }}
    {{-- <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script> --}}
    {{-- {{ Html::script('bower/ckeditor/ckeditor.js') }} --}}
    {{-- {{ Html::script('sites_custom/js/config.lfm.ckeditor.js') }}  --}}
    {{ Html::script('js/profile.js') }}
    {{ Html::script('js/subcrice.js') }}
    {{ Html::script('sites_custom/js/cart.js') }}
    @yield('script')

</body>
</html>
