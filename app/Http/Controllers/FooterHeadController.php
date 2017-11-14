<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FooterHead;

class FooterHeadController extends Controller
{
    public function index()
    {
        $heads = FooterHead::all();
        
        return view('admin.footer.head.index', compact('heads'));
    }

    public function create()
    {
        return view('admin.footer.head.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'item_name'=>'required',
            'item_description'=>'required',
            'glyphiconclass'=>'required'
        ]);
        $head = new FooterHead();
        $head->item_name = $request->get('item_name');
        $head->item_description = $request->get('item_description');
        $head->glyphiconclass = $request->get('glyphiconclass');

        $head->save();

        return redirect('admin/footerhead/add')->with('success', 'New Footer Item has been created');
    }

    public function edit($id)
    {
        $head = FooterHead::find($id);

        return view('admin.footer.head.edit', compact('head', 'id'));
    }

    public function update($id, Request $request)
    {
        $head = FooterHead::find($id);
        $this->validate($request, [
            'item_name'=>'required',
            'item_description'=>'required',
            'glyphiconclass'=>'required'
        ]);
       
        $head->item_name = $request->get('item_name');
        $head->item_description = $request->get('item_description');
        $head->glyphiconclass = $request->get('glyphiconclass');

        $head->save();

        return redirect('admin/footerhead/index')->with('success', 'Your Item has been updated');
    }

    public function delete($id)
    {
        $head = FooterHead::find($id);
        $head->delete();

        return redirect('admin/footerhead/index')->with('success', 'Your Item has been deleted');
    }
    
}
