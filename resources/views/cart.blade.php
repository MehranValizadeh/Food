@extends('layout.hf')

@section('title' , 'سبد خرید')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 text-right">
                @if(session('cart'))
                    @foreach(json_decode(session('cart'))->foods as $item)
                        <div class="d-flex align-items-center">
                            <div>
                                <img src="{{asset('storage/' . ( isset($item->image) ? $item->image : '' )) }}" alt="{{$item->name ?? ''}}"
                                     style="width: 50px;height: 50px ; border-radius: 100%">
                            </div>
                            <div class="text-center" style="width: 100%;display:flex;justify-content: space-evenly;">
                                <div style="width: 8rem">{{$item->name ?? ''}}</div>
                                <div style="width: 8rem">{{$item->count ?? ''}}</div>
                                <div style="width: 8rem">{{number_format($item->price * $item->count) ?? ''}}</div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                @endif
            </div>


            <div class="col-12 col-md-4 text-center">
                <img src="{{asset('images/bank.png')}}" alt="">
                <div>
                   <span>جمع قیمت</span>
                    <span>{{number_format(json_decode(session('cart') , true)['total_price']) ?? ''}} ریال </span>
                </div>
                <button class="btn btn-block btn-success mt-3">پرداخت</button>
            </div>
        </div>
    </div>



@endsection

