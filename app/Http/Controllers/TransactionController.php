<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Cart;
use App\Models\Admin\Equipment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function IndexTransaction(Request $request){
        $transactions = Transaction::latest()->get();
        return view('transactions.index', compact('transactions'));
    }


    public function Transaction(Request $request){
        $params = $request->all();
        $transaction = \DB::transaction(function () use ($params) {
            $transactions = new Transaction();
            $transactions->transaction_code = mt_rand(1000, 10000);
            $transactions->name = $params['buyer'];
            $transactions->total_price = $params['total'];
            $transactions->accept = $params['accept'];
            $transactions->return = $params['return'];
            $transactions->save();

            $book_carts = Cart::all();
            if ($transactions->save() && $book_carts) {
                foreach ($book_carts as $cart) {
                    $itembasetotal = $cart->qty * $cart->sale_price;
                    $orderItemParams = new TransactionDetail();
                    $orderItemParams->product_id = $cart->product_id;
                    $orderItemParams->transaction_id = $transactions->id;
                    $orderItemParams->qty = $cart->qty;
                    $orderItemParams->name = $cart->product_name;
                    $orderItemParams->base_price = $cart->sale_price;
                    $orderItemParams->base_total = $itembasetotal;
                    $orderItemParams->save();
                    if ($orderItemParams) {
                        $product = Equipment::where('id','=',$cart->product_id)->first();
                        $product->stockin -= $cart->qty;
                        $product->stockout += $cart->qty;
                        $product->save();
                    }
                    $cart->delete();
                }
            }

            return $transactions;
        });

        if ($transaction) {
            return redirect()->back();
        }
    }


    public function ShowTransaction(Request $request){
        $id =  $request->transaction_id;
        $transaction_detail = TransactionDetail::where('transaction_id', '=', $id)->get();
        $data['transactions'] =   $transaction_detail;
        $data['transaction_id'] = $id;
        $data['transaction_total'] = TransactionDetail::where('transaction_id', '=', $id)->sum('base_total');
        return view('transactions.show', $data);
    }


    public function PrintStruck(Request $request){
        $user_id = session()->get('USER_DATA');
        $data['username'] = User::where('id','=', $user_id)->first();
        $data['transaction'] = Transaction::where('id','=',$request->transaction_id)->first();
        $data['transaction_details'] = TransactionDetail::where('transaction_id','=',$request->transaction_id)->get();
        return view('transactions.print-view', $data);
    }

    public function TransactionsDestroy(Request $request){
        $transaction = Transaction::where('id','=',$request->transection_id)->first();
        if($transaction->delete()){
            return  $transaction->transaction_id;
        }
        return redirect()->back()->with('msg','transaction deleted successfully');
    }

    public function SubmitRemainingPrice(Request $request){
        $id = $request->transaction_id;
        $transaction = Transaction::where('id','=', $id)->first();
        $transaction->return  -=  $request->remainings;
        $transaction->accept  -=  $request->remainings;
        $transaction->save();
        return redirect()->back();
     }

}
