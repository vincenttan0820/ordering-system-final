<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderUpdateController extends Controller {
   public function index() {
      $orders = DB::select('select * from bobaorder');
      return view('order_edit_view',['orders'=>$orders]);
   }
   public function show($id) {
      $orders = DB::select('select * from bobaorder where id = ?',[$id]);
      return view('order_update',['orders'=>$orders]);
   }
   public function edit(Request $request,$id) {
      $name = $request->input('order_name');
      DB::update('update bobaorder set name = ? where id = ?',[$name,$id]);
      echo "Record updated successfully.<br/>";
      echo '<a href = "/main">Click Here</a> to go back.';
   }
}