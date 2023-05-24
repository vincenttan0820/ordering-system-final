<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function showCart($id)
    {
        $cart = Cart::where('user_id', $id)->where('status', 'pending')->first();
        // dd($cart);
        return view('showCart')->with('cart', $cart);
    }

    public function showHistory($id)
    {
        $order = Order::where('user_id', $id)->orderBy('created_at','desc')->get();
        return view('showHistory')->with('order', $order);
    }

    //Add item from menu page
    public function addToCart(Request $request,$id)
    {
        // dd($request);
        $this->saveitem($request,$id);
        return redirect()->route('showMenu',['id'=>auth()->user()->id]);
    }

    public function updateCart(Request $request,$id)
    {
        // dd($request);
        $this->saveitem($request,$id);
        return redirect()->route('showCart',['id'=>auth()->user()->id]);
    }

    private function saveitem($request,$id){
        $item = Menu::find($request->item_id);
        $cart = Cart::where('user_id', $id)->where('status', 'pending')->first();

        //items array
        $array = array(
            "id"=> $item->id,
            "name"=> $item->name,
            "description"=> $item->description,
            "category_id" => $item->category_id,
            "price" => $item->price,
            "quantity" => $request->quantity,
            "images" => $item->images,
        );
        $price = $item->price * $request->quantity;
        $delete = false;

        if($cart == null)
        {

            $cart = new Cart;
            $json_result = array($array);
            $cart->items = json_encode($json_result);
            $cart->status = 'pending';
            $cart->amount = $price;
            $cart->user_id = $id;
        }
        else
        {
            if ($request->quantity == 0) {

                $item_list = json_decode($cart->items,true);
                if(count($item_list) == 1)
                {
                    $delete = true;
                }
                else
                {
                    $exists = 0;
                    $count = 0;

                    foreach($item_list as $i)
                    {
                        // dd($item_list);

                        if($i['id'] == $item->id)
                        {
                            unset($item_list[$count]);
                            $cart->amount = $cart->amount-($i['price'] * $i['quantity']);
                            break;
                        }
                        $count++;
                    }
                }

            }
            else
            {
                $item_list = json_decode($cart->items);
                $exists = 0;
                foreach($item_list as $i)
                {
                    if($i->id == $item->id)
                    {
                        $cart->amount = $cart->amount - ($i->price * $i->quantity) + $price;
                        $i->quantity = $request->quantity;
                        $exists = 1;
                        break;
                    }
                }
                if($exists == 0)
                {
                    $cart->amount = $cart->amount+$price;
                    array_push( $item_list, $array);
                    // dd($item_list,$array);
                }

            }
            $cart->items = json_encode($item_list);

        }
        if($delete == true)
        {
            $cart->delete();
        }
        else
        {
            $cart->save();
        }
    }

    public function checkout($id)
    {
        $cart = Cart::where('user_id', $id)->where('status', 'pending')->first();

        $order = new Order();
        $order->items = $cart->items;
        $order->status = 'pending';
        $order->amount = $cart->amount;
        $order->user_id = $id;
        $order->save();
        $cart->status = 'complete';
        $cart->order_id = $order->id;
        $cart->save();

        return redirect()->route('showHistory',['id'=>auth()->user()->id]);
    }


}
