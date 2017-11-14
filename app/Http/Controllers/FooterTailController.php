<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FooterTail;
use App\HeaderTop;
use App\FooterHead;
use App\PageSetting;
use App\Category;


class FooterTailController extends Controller
{
    public function index()
    {
        $tails = FooterTail::all();
        
        return view('admin.footer.tail.index', compact('tails'));
    }

    public function create()
    {
        return view('admin.footer.tail.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'menu_item_name'=>'required',
            'menu_item_description'=>'required',
            'menu_item_main_image'=>'required|image|mimes:jpg,jpeg,png'
        ]);
        $tail = new FooterTail();
        $header_image = $request->file('menu_item_main_image');
        $headerImageName = time().$header_image->getClientOriginalName();
        $path = public_path().'/uploads/';
        $header_image->move($path, $headerImageName);

        $tail->menu_item_name = $request->get('menu_item_name');
        $tail->menu_item_description = $request->get('menu_item_description');
        $tail->menu_item_main_image = $headerImageName;

        $tail->save();

        return redirect('admin/footertail/add')->with('success', 'New Footer Menu Item has been created');
    }

    public function edit($id)
    {
        $tail = FooterTail::find($id);
        
        return view('admin.footer.tail.edit', compact('tail', 'id'));
    }

    public function update($id, Request $request)
    {
        $tail = FooterTail::find($id);
        $this->validate($request, [
            'menu_item_name'=>'required',
            'menu_item_description'=>'required'
        ]);
        if($request->file('menu_item_main_image'))
        {
            $this->validate($request, [
                'menu_item_main_image'=>'image|mimes:jpg,jpeg,png'
            ]);
            $header_image = $request->file('menu_item_main_image');
            $headerImageName = time().$header_image->getClientOriginalName();
            $path = public_path().'/uploads/';
            $header_image->move($path, $headerImageName);
            $tail->menu_item_main_image = $headerImageName;
        }
        $tail->menu_item_name = $request->get('menu_item_name');
        $tail->menu_item_description = $request->get('menu_item_description');

        $tail->save();

        return redirect('admin/footertail/index')->with('success', 'Your Menu Item has been updated');
    }

    public function delete($id)
    {
        $tail = FooterTail::find($id);
        $tail->delete();

        return redirect('admin/footertail/index')->with('success', 'Your Menu Item has been deleted');
    }

    public function show($id)
    {
        $data = Category::all();
        $pages = PageSetting::all();
        $footercontent = FooterTail::find($id);
        $top = HeaderTop::find(1);
        $footerhead = FooterHead::all();
        $footertail = FooterTail::all();

        return view('client.pages.footercontent', compact('data','pages','top', 'footercontent','footerhead','footertail'));
    }
    
}
