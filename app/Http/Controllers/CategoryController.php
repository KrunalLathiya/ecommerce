<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $categories = $this->validate($request, [
            'category_name'=>'required',
        ]);
        Category::create($categories);
        
        return redirect('admin/categories/add')->with('success', 'New Category has been created');
    }

    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category', 'id'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'category_name'=>'required'
        ]);
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();

        return redirect('admin/categories/index')->with('success', 'New Category has been updated');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('admin/categories/index')->with('success', 'New Category has been deleted');
    }

}
