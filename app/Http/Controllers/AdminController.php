<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;
class AdminController extends Controller
{
    public function view_category()
    {
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request)
    {
        $data=new Category;
        $data->category_name=$request->category_name;
        $data->save();
        return redirect()->back()->with('message','category add successfully');
    }
    public function delete_category($id)
    {
        $data=Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','category delete successfully');
    }
    public function view_product()
    {
        $cat=Category::all();
        return view('admin.products',compact('cat'));
    }
    public function add_product(Request $request)
    { 	
        $data=new Product;
        $data->title=$request->title;
        $data->description=$request->description;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $data->image=$imagename;

        $data->price=$request->price;
        $data->quantity=$request->quantity;
        $data->category=$request->category;
        $data->discount=$request->discount;
        $data->save();
        return redirect()->back()->with('message','product delete successfully');
    }

    public function show_product()
    {
        $datas=Product::paginate(10);
        return view('admin.show_product',compact('datas'));
    //  return view('admin.show_product',[
      //  'datas' => $datas 
      //  ]);
        return redirect()->back()->with('message','product delete successfully');
    }

    public function delete_product($id)
    {
        $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','product delete successfully');
    }

    public function update_product($id)
    {
        $data=Product::find($id);
        $cat=Category::all();
        return view('admin.update_product',compact('data','cat'));
    }
    public function update_product_confirm(Request $request, $id)
    {
        $data=Product::find($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $data->image=$imagename;
        }
        $data->price=$request->price;
        $data->quantity=$request->quantity;
        $data->category=$request->category;
        $data->discount=$request->discount;
        $data->update();
        return  redirect()->back()->with('message','product update successfully');
    }

    public function order()
    {
        $orders=Order::all();
        return view('admin.orderpage',compact('orders'));
    }
    public function delivery($id)
    {
        $order=Order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status="paid";
        $order->save();
        return redirect()->back();
    }
    public function print_pdf($id)
    {
        $order=Order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
    }
    public function send_email($id)
    {
        $order=Order::find($id);
        return view('admin.email_info',compact('order'));
    }
    public function send_user_email(Request $request, $id)
    {
        $order=Order::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,

        ];
        Notification::send($order,new SendEmailNotification($details));
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $searchtext=$request->search;
        $orders=Order::where('name','LIKE',"%$searchtext%")->orWhere('phone','LIKE',"%$searchtext%")
                        ->orWhere('address','LIKE',"%$searchtext%")
                        ->orWhere('product_title','LIKE',"%$searchtext%")->get();
        return view('admin.orderpage',compact('orders'));
    }
}
