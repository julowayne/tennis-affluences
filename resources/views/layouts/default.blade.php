<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>{{ $title }}</title>
</head>
<body>
@include('partials.navbar')
@yield('content')

  
</body>
</html>
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
body {
  background-color: #F9FAFB;
}
</style>