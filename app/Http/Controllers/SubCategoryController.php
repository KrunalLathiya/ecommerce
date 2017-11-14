<?php

namespace App\Http\Controllers;
use App\SubCategory;
use App\Category;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub_categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $subcategories = $this->validate($request, [
            'category_id'=>'required',
            'sub_category_name'=>'required',
            'sub_category_description'=>'required',
            'sub_main_image'=>'required|image|mimes:jpg,jpeg,png'
        ]);
        $subcategory = new SubCategory();
        $sub_main_image = $request->file('sub_main_image');
        $pageImageName = time().$sub_main_image->getClientOriginalName();
        $path = public_path().'/uploads/';
        $sub_main_image->move($path, $pageImageName);

        $subcategory->sub_category_name = $request->get('sub_category_name');
        $subcategory->category_id = $request->get('category_id');
        $subcategory->sub_category_description = $request->get('sub_category_description');
        $subcategory->sub_main_image = $pageImageName;

        $subcategory->save();
        
        return redirect('admin/subcategories/add')->with('success', 'New Sub Category has been created');
    }

    public function index()
    {
        $subcategories = SubCategory::all();

        return view('admin.sub_categories.index', compact('subcategories'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::find($id);

        return view('admin.sub_categories.edit', compact('subcategory', 'categories', 'id'));
    }

    public function update($id, Request $request)
    {
        $subcategory = SubCategory::find($id);

        $this->validate($request, [
            'category_id'=>'required',
            'sub_category_name'=>'required',
            'sub_category_description'=>'required'
        ]);
        if(!$subcategory->sub_main_image){
            $this->validate($request, ['sub_main_image' => 'required|image|mimes:jpg,jpeg,png']);
            $sub_main_image = $request->file('sub_main_image');
            $pageImageName = time().$sub_main_image->getClientOriginalName();
            $path = public_path().'/uploads/';
            $sub_main_image->move($path, $pageImageName);
        }
        else if($request->file('sub_main_image')){
            $this->validate($request, ['sub_main_image' => 'required|image|mimes:jpg,jpeg,png']);
            $sub_main_image = $request->file('sub_main_image');
            $pageImageName = time().$sub_main_image->getClientOriginalName();
            $path = public_path().'/uploads/';
            $sub_main_image->move($path, $pageImageName);
        }
        else{
            $pageImageName = $subcategory->sub_main_image;
        }
        $subcategory->sub_category_name = $request->get('sub_category_name');
        $subcategory->category_id = $request->get('category_id');
        $subcategory->sub_category_description = $request->get('sub_category_description');
        $subcategory->sub_main_image = $pageImageName;

        $subcategory->save();

        return redirect('admin/subcategories/index')->with('success', 'Your Category has been updated');
    }

    public function delete($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();

        return redirect('admin/subcategories/index')->with('success', 'Your Category has been deleted');
    }

    public function getsubcategory($id)
    {
        $subcategories = \DB::table('sub_categories')
                            ->select('id','sub_category_name')
                            ->where('category_id', '=', $id)
                            ->get();
        
        return response()->json($subcategories);
    }

}
