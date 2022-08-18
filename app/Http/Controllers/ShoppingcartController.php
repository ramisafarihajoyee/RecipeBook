<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class ShoppingcartController extends Controller
{
   //index method//
    public function index(){
        $sessiondata = session('email');
        $cart_item = Cart::where('email', $sessiondata)
                    ->orderBy('id', 'desc')
                    ->get();
        // return view('competition/result', ['result_list' => $result_fetch]);
        return view('/shopping_cart/shoppingcart', ['cart' => $cart_item]);
    }

    public function form(){
        return view('/shopping_cart/addintocart');
    }

    public function add(Request $request){
        $sessiondata = session('email');  
        $name  = $request->input('name');
        $quantity  = $request->input('quantity');
        $price = $request->input('price');

        $value = Cart::insert(['shopping_item'=>$name, 'quantity'=>$quantity, 'price'=>$price,
        'email'=> $sessiondata]);

        if($value == 0){
            return redirect('/shopping_cart/addintocart');
        }else{
            return redirect('/shopping_cart/shoppingcart'); 
        }
    }

    function delete($id){

        $item_to_delete = Cart::where('id', $id)->delete();
        if($item_to_delete){
            return redirect("/shopping_cart/shoppingcart");
        }else{
            echo "try again";
        }
    }

    public function show()
    {
        $users = DB::select('select * from users');
 
        //return view('shoppingcart', ['users' => $users]);
        foreach ($users as $user) {
            echo $user->email;
        }
    }
}
