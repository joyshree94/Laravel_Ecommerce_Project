<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use App\Models\Category;
use App\Models\Product;
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
    }
   
