<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        //$products = Product::with('stock')->where('status','1')->get();
        $products = DB::table('products')
                    ->join('stocks','stocks.product_id','=','products.product_id')
                    ->select('products.*','stocks.product_name','stocks.p_photo')
                    ->where('products.status','1')
                    ->get();
        return view('front.home',compact('products'));
    }

    public function insert_cart($id){
        $product = DB::table('products')
                    ->join('stocks','stocks.product_id','=','products.product_id')
                    ->select('products.*','stocks.product_name','stocks.p_photo')
                    ->where('products.id',$id)
                    ->first();
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                'product_name'=>$product->product_name,
                'p_photo'=>$product->p_photo,
                'p_price'=>$product->p_price,
                'quantity'=>1
            ];
            
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product to cart added');
    }

    public function show_cart(){
        return view('front.cart');
    }
    public function update_cart(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart',$cart);
            session()->flash('success','Product updated..');
            //echo $request->id;
        }
    }
    public function remove_cart(Request $request){
        if($request->id){ 
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','Product removed..');
        }
    }
}
