<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderTop;

class HeaderTopController extends Controller
{
    public function create()
    {
        $top = HeaderTop::first();
        return view('admin.header_top.create', compact('top'));
    }

    public function store(Request $request)
    {
        $top = HeaderTop::find(1);
        $this->validate($request ,[
            'notice'=>'required',
            'offer'=>'required',
            'mail'=>'required',
            'facebook'=>'required|url',
            'twitter'=>'required|url',
            'instagram'=>'required|url',
            'pinterest'=>'required|url',
            'phno'=>'required',
            'address'=>'required'
        ]);
        $top->notice = $request->get('notice');
        $top->offer = $request->get('offer');
        $top->mail = $request->get('mail');
        $top->facebook = $request->get('facebook');
        $top->twitter = $request->get('twitter');
        $top->instagram = $request->get('instagram');
        $top->pinterest = $request->get('pinterest');
        $top->phno = $request->get('phno');
        $top->address = $request->get('address');

        $top->save();
        
        return redirect('admin/headertop/add')->with('success', 'New Item has been updated');
    }
}
