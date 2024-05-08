@extends('layout.hf')

@section('title' , 'غذا ها')

@section('content')


        <div class="container">
            <div class="row d-flex justify-content-center" id="categories">
                @foreach($category->foods as $food)
                        <div class="col-6 col-md-2 mx-5 my-5">
                            <a href="#">
                                <img src="{{asset(($food->image ? 'storage/'.$food->image : 'images/undefined-image.jpg' ))}}"  alt="123">
                                <span>{{$food->name}}</span>
                                <span style="bottom: -45px;font-size: 14px">{{number_format($food->price)}} ریال </span>
                                <a href="{{route('addtocart' , $food->id)}}" class="btn btn-outline-danger text-dark" style="position:absolute;bottom: -100px;left: 0;right: 0
                                ;margin: auto">
                                    سبد خرید
                                </a>
                            </a>
                        </div>
                @endforeach
            </div>
        </div>

@endsection

