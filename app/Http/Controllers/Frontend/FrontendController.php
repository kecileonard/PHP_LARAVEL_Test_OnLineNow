<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function category()
    {
    	$categories = Category::all();
    	return view('frontend.category',compact('categories'));
    }


    public function dashboard()
    {
    	$categories=Category::where('status','1')->get();
    	return view('frontend.category',compact('categories'));
    }

}
