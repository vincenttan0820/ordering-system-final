@extends('layouts.app')
@section('title', 'Cart')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
        <h1 class="h3 mb-0 text-gray-800">Cart</h1>
    </div>

    <!-- cart item card -->

    <div class="mb-3">
        @if(isset($cart))
        @if($cart->items!=null)
        @foreach(json_decode($cart->items) as $item)
        <div class="mb-3">
            <div class="card shadow" style="border-radius: 15px;">
                <div class="row ">
                    <div class="col-md-4">
                    <img class="card-img-top" src="{{ asset('images/' . $item->images) }}" alt="Card image cap">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title">{{$item->name}}</h5>
                                </div>
                                <div class="col clicked" data-toggle="modal" data-target="#cartModal{{$item->id}}" data-itemid="{{$item->id}}">
                                    <i class="fas fa-edit float-right" style="font-size: 24px;"></i>
                                </div>
                            </div>
                            <p class="card-text">Single Price : RM {{$item->price}} </p>
                            <p class="card-text">Qty: {{$item->quantity}}</p>
                            <p class="card-text font-weight-bold">Total : RM {{$item->quantity*$item->price}}</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- popout modal -->
        <div class="modal fade" id="cartModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">{{$item->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                        <img class="card-img-top" src="{{ asset('images/' . $item->images) }}" alt="Card image cap">
                        </div>
                        <div class="float-right font-weight-bold"> RM <span id="price{{$item->id}}">{{$item->price}}</span></div>
                        <div class="mt-5">
                            Description:{{$item->description}}
                        </div>
                        <div class="float-right inline">
                            <button class="btn" id="up{{$item->id}}">
                                <i class="fa fa-chevron-up"></i>
                            </button>
                            <div class="bg-light text-center" id="quant{{$item->id}}">
                                {{$item->quantity}}
                            </div>
                            <button class="btn" id="down{{$item->id}}">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="font-weight-bold mr-auto">Total : RM <span id="total{{$item->id}}">{{number_format($item->quantity*$item->price,2)}}</span> </div>
                        <form action="{{route('updateCart',['id'=>auth()->user()->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="quantity" id="post_quant{{$item->id}}" value="{{$item->quantity}}">
                            <input type="hidden" name="item_id" value="{{$item->id}}">
                            <input type='submit' class="btn btn-primary" value="Update Cart">
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        @else
        <div>No Item in Cart~</div>
        @endif

    </div>
    <hr>
    @if(isset($cart))
    <h3 class="text-right mb-3">Total : RM {{number_format($cart->amount,2)}}</h3>
    <hr>
    <form action="{{route('checkout', ['id' => auth()->user()->id])}}" method="post">
        @csrf
        <div class="text-right">
            <input class="btn btn-primary mb-3" type="submit" value="Proceed Order">
        </div>
    </form>
    @endif
    
   



</div>
@endsection
@section('scripts')
<script type="application/javascript">
    $(document).ready(function() {
        // used and saved item variable in to javascript variable once the editbutton is clicked
        $(".clicked").on('click', function() {
            var itemID = $(this).data("itemid");
            console.log(itemID);
            var price = parseFloat($("#price" + itemID).html());
            var quant = parseFloat($("#quant" + itemID).html());
            var total = price * quant;
            console.log("itemID:" + itemID, "price:" + price, "total:" + total, "quantity:" + quant);

            //the add quantity button
            $("#up" + itemID).click(function() {
                total += price;
                quant += 1;
                $("#total" + itemID).html(total.toFixed(2));
                $("#quant" + itemID).html(quant);
                $("#post_quant" + itemID).val(quant);
            })
            //the minus quantity button
            $("#down" + itemID).click(function() {
                if (total > 0) {
                    total -= price;
                    quant -= 1;
                    $("#total" + itemID).html(Math.abs(total).toFixed(2));
                    $("#quant" + itemID).html(quant);
                    $("#post_quant" + itemID).val(quant);
                }
            })
        })
    });
</script>
@endsection