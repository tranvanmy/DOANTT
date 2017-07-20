<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>{{ trans('sites.framgia') }}</title>
    <link rel="shortcut icon" type="icon" href="images/favicon.ico">
    {{ Html::style('css/style.css') }}
    {{ Html::style('css/animate.css') }}
    {{ Html::style('bower/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('bower/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('bower/sweetalert/dist/sweetalert.css') }}
    {{ Html::style('bower/toastr/toastr.min.css') }}
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300&amp;subset=vietnamese" rel="stylesheet">    <meta id="token" name="csrf-token" value="{{ csrf_token() }}">
    @yield('style')

</head>
<script lang="javascript">(function() {var pname = ( (document.title !='')? document.title : document.querySelector('h1').innerHTML );var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async=1; ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=b3905c95262af552b195bf500d6d7813&data=eyJzc29faWQiOjEzMDE1MjUsImhhc2giOiI3MTIxYzU4OTRmYmMwMGQ3ZjdmMWNjNTQ5ZmJkOTYyOSJ9&pname='+pname;var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();
</script>
<body class="home">
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
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    {{ Html::script('bower/ckeditor/ckeditor.js') }}
    {{ Html::script('sites_custom/js/config.lfm.ckeditor.js') }}
    {{ Html::script('js/profile.js') }}
    {{ Html::script('js/subcrice.js') }}
    @yield('script')

</body>
</html>
