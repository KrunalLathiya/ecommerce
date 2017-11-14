<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\PageSetting;
use App\SubCategory;
use App\HeaderTop;
use App\FooterHead;
use App\FooterTail;

class HomeController extends Controller
{
    
    public function index()
    {
        $data = Category::all();
        $pages = PageSetting::all();
        $top = HeaderTop::find(1);
        $footerhead = FooterHead::all();
        $footertail = FooterTail::all();
        $subcategories = SubCategory::all();
        
        return view('client.home', compact('data','pages','subcategories','top','footerhead','footertail'));
    }
}
