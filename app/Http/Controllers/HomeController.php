<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Session;
use Stripe;
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
            $totalproduct=Product::all()->count();
            $totalorder=Order::all()->count();
            $totalcustomer=User::all()->count();
            $order=Order::all();

            $totalrevenue=0;
            foreach($order as $order)
            {
                $totalrevenue=$totalrevenue + $order->price;
            }

            $totaldelivered=Order::where('delivery_status','=','delivered')->get()->count();
            $totalprocessing=Order::where('delivery_status','=','processing')->get()->count();
           return view('admin.home',compact('totalproduct','totalorder','totalcustomer','totalrevenue','totaldelivered','totalprocessing'));
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

    public function show_cart()
    {
        if(Auth::id())
        {
            $user=Auth::user()->id;
            $cart=Cart::where('user_id','=',$user)->get();
            return view('home.showcart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
      
    }

    public function remove_cart($id)
    {
        $car_item=Cart::find($id);
        $car_item->delete();
        return redirect()->back();
    }

    public function cash_order()
    { 	

        $user=Auth::user()->id;
        $cart=Cart::where('user_id','=',$user)->get();
        foreach( $cart as $data)
        {
            $order=new Order;
            $order->name = $data->name;

            $order->email=$data->email;

            $order->phone=$data->phone; 	 	 	 	 	

            $order->address=$data->address;

            $order->user_id=$data->user_id;

            $order->product_title=$data->product_title;

            $order->quantity=$data->quantity;

            $order->price=$data->price;

            $order->image=$data->image;

            $order->product_id=$data->product_id;

            $order->payment_status= 'cash on delivery';

            $order->delivery_status= 'processing';
            $order->save();
            $cart_id=$data->id;
            $cart_item=Cart::find($cart_id);
            $cart_item->delete();
       
        }

        return redirect()->back()->with('message','we have recieved order your order successfully.we will connect with you soon');
    }

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }
    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice *100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment" 
        ]);
        $user=Auth::user()->id;
        $cart=Cart::where('user_id','=',$user)->get();
        foreach( $cart as $data)
        {
            $order=new Order;
            $order->name = $data->name;

            $order->email=$data->email;

            $order->phone=$data->phone; 	 	 	 	 	

            $order->address=$data->address;

            $order->user_id=$data->user_id;

            $order->product_title=$data->product_title;

            $order->quantity=$data->quantity;

            $order->price=$data->price;

            $order->image=$data->image;

            $order->product_id=$data->product_id;

            $order->payment_status= 'paid';

            $order->delivery_status= 'processing';
            $order->save();
            $cart_id=$data->id;
            $cart_item=Cart::find($cart_id);
            $cart_item->delete();
       
        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
}
   
