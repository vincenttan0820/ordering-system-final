@extends('layouts.app')
@section('title', 'Menu')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
    <h1 class="h3 mb-0 text-gray-800">Menu</h1>
  </div>

  <!-- categories filter -->
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Categories
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item category" href="{{ route('showMenu', ['id' => auth()->user()->id]) }}">
        All Categories
      </a>
      @foreach ($category as $cat)
      <a class="dropdown-item category" href="{{ route('showMenu', ['id' => auth()->user()->id, 'category_id' => $cat->id]) }}">
        {{ $cat->name }}
      </a>
      @endforeach
    </div>
  </div>

  <!-- the menu item (grid card) -->
  <div class="p-5">
    <div class="row mb-5">
      @foreach ($menu as $item)
      <div class="col mb-5 clickable" data-itemid="{{ $item->id }}">
        <div class="card shadow-lg" style="width: 18rem;border-radius: 15px;" data-toggle="modal" data-target="#itemModal{{ $item->id }}">
          <div class="card-body">
            <img class="card-img-top" style=" max-width: 100%;height: 200px; display: block; margin: 0 auto;" src="{{ asset('images/' . $item->images) }}" alt="Card image cap">
            <h5 class="card-title">{{ $item->name }}</h5>
            <p class="card-text">{{ $item->description }}</p>
            <p class="card-text float-right font-weight-bold"> RM {{ $item->price }}</p>
          </div>
        </div>
      </div>


      <!-- popout modal -->
      <div class="modal fade" id="itemModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="itemModalLabel{{ $item->id }}">{{ $item->name }}
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-2">
                <img class="card-img-top" style=" max-width: 100%;height: 300px; display: block; margin: 0 auto;" src="{{ asset('images/' . $item->images) }}" alt="Card image cap">
              </div>
              <div class="float-right font-weight-bold"> RM <span id="price{{ $item->id }}">{{ $item->price }}</span></div>
              <div class="mt-5">
                Description: {{ $item->description }}
              </div>
              <div class="float-right inline">
                <button class="btn" id="up{{ $item->id }}">
                  <i class="fa fa-chevron-up"></i>
                </button>
                <div class="bg-light text-center" id="quant{{ $item->id }}">
                  @if (isset($cart))
                  @php
                  $found=false;
                  @endphp
                  @foreach (json_decode($cart->items) as $cart_item)
                  @if ($cart_item->id == $item->id)
                  {{ $cart_item->quantity }}
                  @php
                  $found=true;
                  @endphp
                  @break
                  @endif

                  @endforeach
                  @if($found==false)
                  0
                  @endif
                  @else
                  0
                  @endif
                </div>
                <button class="btn" id="down{{ $item->id }}">
                  <i class="fa fa-chevron-down"></i>
                </button>
              </div>
            </div>
            <div class="modal-footer">
              <div class="font-weight-bold mr-auto">Total : <span id="total{{ $item->id }}">0.00</span> </div>
              <form action="{{ route('addToCart', ['id' => auth()->user()->id]) }}" method="post">
                @csrf
                <input type="hidden" name="quantity" id="post_quant{{ $item->id }}" value="0">
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <input type='submit' class="btn btn-primary" value="Add to Cart">
              </form>

            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="application/javascript">
  $(document).ready(function() {
    //display selected category
    var selectedCategory = localStorage.getItem('selectedCategory');
    if (selectedCategory !== null) {
      $('#dropdownMenuButton').html(selectedCategory);
      console.log(selectedCategory);
    }
    //store the selected category in the local storage
    $(".category").on("click", function() {
      var selectedCategory = $(this).html();
      localStorage.setItem('selectedCategory', selectedCategory);
    });
    // used and saved item variable in to javascript variable once the card is clicked
    $(".clickable").click(function() {
      var itemID = $(this).data("itemid");
      var price = parseFloat($("#price" + itemID).html());
      var quant = parseFloat($("#quant" + itemID).html());
      var total = price * quant;
      console.log("itemID:" + itemID, "price:" + price, "total:" + total, "quantity:" + quant);
      $("#total" + itemID).html(Math.abs(total).toFixed(2));
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
      //refreshing the page after modal popout close (to reset the quantity display if user not perform addtocart)
      $("#itemModal" + itemID).on('hidden.bs.modal', function() {
        $("#filterForm").submit();
      })
    });

  })
</script>
@endsection