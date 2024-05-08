@extends('layout.hf')

@section('title' , 'صفحه اصلی')

@section('content')

    <div class="container mb-5">
        <div class="row d-flex align-items-center">
            <div class="col-6">
                <h5 class="text-right">غذا های دسته بندی ...</h5>
            </div>
            <div class="col-6">
                <img src="{{asset('images/snappfood.png')}}" alt="" id="logo">
            </div>
        </div>


        <div class="container">
            <div class="row" id="categories">
                <div class="col-4 col-md-2">
                    <a href="">
                        <img src="{{asset('images/categories/1.jpg')}}" alt="">
                        <span>پیتزا</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
