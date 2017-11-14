<?php

namespace App\Http\Controllers;
use App\PageSetting;
use App\Category;
use App\HeaderTop;
use App\FooterTail;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = PageSetting::all();
        
        return view('admin.pages.index', compact('pages'));
    }
    public function create()
    {
        return view('admin.pages.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'page_name'=>'required',
            'page_content'=>'required',
            'page_main_image'=>'required|image|mimes:jpg,jpeg,png'
        ]);
        $page = new PageSetting();
        $page_image = $request->file('page_main_image');
        $pageImageName = time().$page_image->getClientOriginalName();
        $path = public_path().'/uploads/';
        $page_image->move($path, $pageImageName);

        $page->page_name = $request->get('page_name');
        $page->page_content = $request->get('page_content');
        $page->page_main_image = $pageImageName;

        $page->save();

        return redirect('admin/pagesettings/add')->with('success', 'New Page has been created');


    }
    public function edit($id)
    {
        $page = PageSetting::find($id);

        return view('admin.pages.edit', compact('page', 'id'));
    }
    public function update($id, Request $request)
    {
        $page = PageSetting::find($id);

        $this->validate($request, [
            'page_name'=>'required',
            'page_content'=>'required'
        ]);
       
        if(!$page->page_main_image){
            $this->validate($request, ['page_main_image' => 'required|image|mimes:jpg,jpeg,png']);
            $page_image = $request->file('page_main_image');
            $pageImageName = time().$page_image->getClientOriginalName();
            $path = public_path().'/uploads/';
            $page_image->move($path, $pageImageName);
        }
        else if($request->file('page_main_image')){
            $this->validate($request, ['page_main_image' => 'required|image|mimes:jpg,jpeg,png']);
            $page_image = $request->file('page_main_image');
            $pageImageName = time().$page_image->getClientOriginalName();
            $path = public_path().'/uploads/';
            $page_image->move($path, $pageImageName);
        }
        else{
            $pageImageName = $page->page_main_image;
        }
        $page->page_name = $request->get('page_name');
        $page->page_content = $request->get('page_content');
        $page->page_main_image = $pageImageName;

        $page->save();
        return redirect('admin/pagesettings/index')->with('success', 'Your Page has been updated');

    }
    public function delete($id)
    {
        $page = PageSetting::find($id);
        $page->delete();

        return redirect('admin/pagesettings/index')->with('success', 'Your Page has been deleted');
    }

    public function show($id)
    {
        $data = Category::all();
        $pages = PageSetting::all();
        $page = PageSetting::find($id);
        $top = HeaderTop::find(1);
        $footertail = FooterTail::all();

        return view('client.pages.show', compact('page', 'pages', 'data', 'top', 'footertail'));
    }
}
