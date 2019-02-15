@php
  $bg = array('bg_1.jpg', 'bg_2.jpg', 'bg_3.jpg', 'bg_4.jpg', 'bg_5.jpg','bg_6.jpg',
              'bg_7.jpg', 'bg_8.jpg', 'bg_9.jpg', 'bg_10.jpg', 'bg_11.jpg');
  $i = rand(0, count($bg)-1);
  $selectedBg = "$bg[$i]";
@endphp
<style type="text/css">
body {
  height: 100vh;
}
.login-page,
.register-page {
  background-image: url("{{ asset('/vendor/adminlte/images')}}/{{$selectedBg}}");
  height: 100vh;
  background-size: cover;
  background-position: center;
}
.login-box-body {
  background-color: rgba(248, 248, 248, 0.8);
}
.login-logo a{
  color:#fff;
}

</style>
