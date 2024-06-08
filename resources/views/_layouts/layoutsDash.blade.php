<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/style.css') }} ">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{url('bootstrap.min.css') }}">
</head>
<body>
         
      <div>
        @include('_layouts\sidebar\sidebar')
      </div>
    <div class="container mt-3">
            <h4>Hello {{Auth::user()->name}} in you're dashboard</h4>
            <hr>
            @yield('content')
      </div>      
      
       <script src="{{asset('js/index.js')}}"> </script>
</body>
</html>