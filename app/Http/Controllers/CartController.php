<?php

namespace App\Http\Controllers;

use App\Models\Admin\Equipment;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function GetCarts(){
        $carts = Cart::all();

        if($carts){
            return response()->json([
                'status' => 200,
                'carts' => $carts,
                'message' => 'success',
            ]);
        }
        else{
            return json_encode(['carts' =>'no record found']);
        }
    }

    public function pharmacyHome(Request $request){
        $data['products'] = Equipment::where('status','=','instock')->get();
        return view('pharmacy.home', $data);
    }

    public function Searching(Request $request){
        $products = Equipment::where('name', 'like', '%' . $request->search . '%')->get();
        if(count($products)>0){
            return json_encode($products);
        }
        else{
            return json_encode(['products' =>'no record found']);
        }

    }


    public function CreateCart(Request $request){
        // return 'CreateCart';
        $product = Equipment::where('id', $request->productId)->first();
        if ($product === null) {
            return response()->json([
                'status' => 500,
                'message' => 'product not found !',
            ]);
        }

        $isExist = Cart::where('product_id', $product->id)->first();

        // $carts = BookCart::where('user_id', auth()->id())->get();

        // if ($product->qty <= 0) {
        //     return response()->json([
        //         'status' => 400,
        //         'message' => 'book is empty'
        //     ]);
        // }
        if ($product->stockin <= 0) {
            return response()->json([
                'status' => 400,
                'message' => 'equipment is out of stock'
            ]);
        }

        if ($isExist) {
            return response()->json([
                'status' => 400,
                'message' => 'equipment is already added in cart',
            ]);
        } else {
            $carts = new Cart();
            $carts->product_id = $product->id;
            $carts->product_name = $product->name;
            $carts->stock = $product->stockin;
            $carts->qty = 1;
            $carts->sale_price = $product->sale_price;
            $carts->save();
            $carts->get();

            return response()->json([
                'status' => 200,
                'carts' => $carts,
                'message' => 'success'
            ]);
        }
    }


    public function UpdateQty(Request $request){

        $cart = Cart::where('id', '=', $request->cartId)->first();
        $product = Equipment::where('id', '=', $cart->product_id)->first();
        $itemQuantity = 0;
        if ($cart) {
            if ($cart->product_name == $product->name) {
                $itemQuantity = $request->qty;
            }
        }

        if ($product->stockin <= $itemQuantity && $request->qty > $product->stockin ) {
            return response()->json([
                'status' => 400,
                'message' => 'product is limited'
            ]);
        }

        $cart->qty = $request->qty;
        $cart->save();

        return response()->json([
            'status' => 200,
            'message' => 'success'
        ]);
    }


    public function DeleteCart(Request $request){
        $id = $request->cartId;
        $cart = Cart::where('id', '=', $id)->first();
        $cart->delete();

        return response()->json([
            'status' => 200,
            'message' => 'success'
        ]);
    }
}
