<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderDeleteController extends Controller {
   public function index() {
      $orders = DB::select('select * from bobaorder');
      return view('order_delete_view',['orders'=>$orders]);
   }
   public function destroy($id) {
      DB::delete('delete from bobaorder where id = ?',[$id]);
      echo "Record deleted successfully.<br/>";
      echo '<a href = "/main">Click Here</a> to go back.';
   }
}
