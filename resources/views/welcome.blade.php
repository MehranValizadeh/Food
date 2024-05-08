@extends('layout.hf')

@section('title' , 'صفحه اصلی')

@section('content')


        <div class="container">
            <div class="row" id="categories">
                @foreach($categories as $category)
                        <div class="col-4 col-md-2">
                            <a href="{{route('site.foods.show' , $category->id)}}">
                                <img src="{{asset(($category->image ? 'storage/'.$category->image : 'images/undefined-image.jpg' ))}}"  alt="123">
                                <span>{{$category->name}}</span>
                            </a>
                        </div>
                @endforeach
            </div>
        </div>


@endsection

