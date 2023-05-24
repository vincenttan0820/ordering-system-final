<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderInsertController extends Controller {
   public function insertform() {
      return view('order_create');
   }
	
   public function insert(Request $request) {
      $name = $request->input('order_name');
      $date = date('Y-m-d H:i:s');
      DB::insert('insert into bobaorder (name, date) values (?, ?)', [$name, $date]);
      echo "Record inserted successfully.<br/>";
      echo '<a href = "/insert">Click Here</a> to go back.';

  }

  


}