@extends('layouts.app')
@section('title', 'Order History')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
        <h1 class="h3 mb-0 text-gray-800">Order</h1>
    </div>
    <!-- cart item card -->

    <div class="mb-3">
        @if(isset($order))

        @foreach($order as $ord )
        <div class="card shadow p-3 mb-3" style="border-radius: 15px;"> 
        <div class="row">
            <div class="col">
            <h3 class="float-left ">Order Date : {{$ord->created_at->format('d/m/Y')}}</h3>
            </div>
            <div class="col">
            <h3 class="float-right ">Time : {{$ord->created_at->format('g:i A')}}</h3>
            </div>
        </div>    
            @if($ord->items!=null)
            @foreach(json_decode($ord->items) as $item)
            <div class="mb-3">
                <div class="card shadow" style="border-radius: 15px;">
                    <div class="row ">
                        <div class="col-md-4">
                        <img class="card-img-top" src="{{ asset('images/' . $item->images) }}" alt="Card image cap"> 
                                               <!--{{ asset('images/' . $item->images) }} this one is the code want to replace the src  -->
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">{{$item->name}}</h5>
                                    </div>
                                </div>
                                <p class="card-text">Qty: {{$item->quantity}}</p>
                                <p class="card-text">RM : {{$item->quantity*$item->price}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <h3 class="text-right mb-3">Total : {{number_format($ord->amount,2)}}</h3>
            <hr>
            @endif
        </div>
        @endforeach

        @else<div>No Order Made</div>
        @endif
    </div>


</div>

@endsection