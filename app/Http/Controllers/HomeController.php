<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
class HomeController extends Controller
{
    public function index()
    {
        $data=Product::paginate(9);
        return view('home.userpage',compact('data'));
    }
    public function redirect()
    {
        $usertype=Auth::user()->usertype;
        if($usertype=='1')
        {
           return view('admin.home');
        }
        else
        {
            $data=Product::paginate(9);
        return view('home.userpage',compact('data'));
        }
    }
    public function product_details($id)
    {
        $product_item=Product::find($id);
        return view('home.product_details',compact('product_item'));
    }

    public function add_cart(Request $request, $id)
    {
	
        if(Auth::id())
        {
            $user=Auth::user();
            $product=Product::find($id);
            $cart=new Cart;
            $cart->name =	$user->name; 
            $cart->email 	=$user->email; 
            $cart->phone 	=$user->phone; 
            $cart->address 	=$user->address; 
            $cart->product_title = $product->title;
        	$cart->quantity 	=$request->quantity;
            if($product->discount!=null)
            {
                $cart->price 	= $product->discount * $request->quantity;
            }
           else
           {
            $cart->price 	=$product->price * $request->quantity;
           }
            $cart->image 	=$product->image;
            $cart->product_id 	=$product->id;
            $cart->user_id =$user->id; 
            $cart->save();
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }
}
   
