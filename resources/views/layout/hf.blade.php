<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>  الوفود - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('styles/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('styles/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


<div class="container mb-5">
    <div class="row d-flex align-items-center">
        <div class="col-6 d-flex">
            <h5 class="text-right">سفارش غذا در الو فود !</h5>
            <a href="{{route('cart')}}" class="mr-5">
                <i class="fa fa-shopping-cart text-dark"></i>
            </a>
        </div>
        <div class="col-6">
            <img src="{{asset('images/snappfood.png')}}" alt="" id="logo">
        </div>
    </div>


    @yield('content')

</div>



@include('layout.footer')

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
