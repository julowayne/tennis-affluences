<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>{{ $title }}</title>
</head>
<body>
@include('partials.navbar')
@yield('content')

<script src="https://chatbox.csml.dev/script.min.js?token=gpurlww7dnmnrd6fado1es9olns5rkfs" id="clevy-chatbox" async></script>  
</body>
</html>
<style>
/* @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap'); */
@import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
body {
  background-color: #F9FAFB;
}
</style>