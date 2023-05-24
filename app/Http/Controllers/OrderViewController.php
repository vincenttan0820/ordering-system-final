<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order; // add this line

class OrderViewController extends Controller
{
    public function index()
    {
         $orders = DB::table('order')->paginate(5);
         return view('order_view', compact('orders'));
    }

    public function order1()
    {
        $orders = DB::table('bobaorder')->where('status', 'pending')->get();
        return view('order_view', compact('orders'));
    }

    public function complete($id)
    {
      $order = Order::find($id);
      $order->status = 'completed';
      $order->save();
      return redirect()->back()->with('success', 'Order completed successfully!');
    }

    public function uncomplete($id)
{
   $order = Order::find($id);
   if ($order->status == 'completed') {
      $order->status = 'pending';
  } else {
      $order->status = 'completed';
  }
  $order->save();
  return redirect()->back()->with('success', 'Order status updated successfully!');
    
}

public function markPending($id)
{
   $order = Order::find($id);
    $order->status = 'pending';
    $order->save();
    return redirect()->back()->with('success', 'Order marked as pending!');
}
    

public function markPaid($id)
{
   $order = Order::find($id);
    $order->paid = true;
    $order->save();
    return redirect()->back()->with('success', 'Order marked as paid!');
}
public function unpaid($id)
{
    $order = Order::findOrFail($id);
    $order->update(['paid' => false]);
    $order->save();
    return redirect()->back()->with('success', 'Order unpaid successfully!');
}
    
}
