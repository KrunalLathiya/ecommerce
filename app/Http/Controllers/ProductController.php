<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Image;
use App\PageSetting;
use App\FooterHead;
use App\FooterTail;
use App\HeaderTop;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();

        return view('admin.products.create', compact('categories','subcategories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'product_name'=>'required',
            'product_sku_no'=>'required',
            'product_price'=>'required',
            'product_quantity'=> 'required',
            'product_description'=>'required',
            'product_image'=>'required|image|mimes:jpg,jpeg,png',
            'options'=>'required'
        ]);
        $product = new Product();
        $product->category_id = $request->get('category_id');
        $product->sub_category_id = $request->get('sub_category_id');
        $product->product_name = $request->get('product_name');
        $product->product_sku_no = $request->get('product_sku_no');
        $product->product_price = $request->get('product_price');
        $product->product_quantity = $request->get('product_quantity');
        $product->product_description = $request->get('product_description');
        $product->options = $request->get('options');

        if($request->file('product_image'))
        {
            $path = public_path().'/uploads/';
            $permissions = intval( config('permissions.directory'), 8 );
            \File::makeDirectory($path, $permissions, true, true);
           
            $file = $request->file('product_image');
            $fileName = time().$file->getClientOriginalName();
            $file->move($path, $fileName);
        }
        $product->product_image = $fileName;

        $product->save();
        
        return redirect('admin/products/add')->with('success', 'New Product has been created');
    }

    public function index()
    {
        $products = \DB::table('products')
                    ->select('categories.category_name as category_name', 'sub_categories.sub_category_name as sub_category_name',
                            'products.product_sku_no','products.product_price',
                            'products.product_description', 'products.product_name',
                            'products.product_quantity', 'products.id')
                    ->join('categories', 'categories.id','=','products.category_id')
                    ->join('sub_categories', 'sub_categories.id','=', 'products.sub_category_id')
                    ->get();

        return view('admin.products.index', compact('products'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $product = Product::find($id);

        return view('admin.products.edit', compact('product','categories','subcategories','id'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'product_name'=>'required',
            'product_sku_no'=>'required',
            'product_price'=>'required',
            'product_quantity'=> 'required',
            'product_description'=>'required',
            'options'=>'required'
        ]);
        $product = Product::find($id);
        
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->product_name = $request->product_name;
        $product->product_sku_no = $request->product_sku_no;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_description = $request->product_description;
        $product->options = $request->options;

        $product->save();

        $imgArr = [];
        if($request->file('product_images'))
        {
            $path = public_path().'/uploads/'.$id.'/';
            
            \File::makeDirectory($path, 0777, true, true);
            for($i=0; $i<count($request->file('product_images')); $i++)
            {
                $file = $request->file('product_images')[$i];
                $fileName = time().$file->getClientOriginalName();
                $file->move($path, $fileName);
                $imgArr['image_name'] = $fileName;
                $imgArr['product_id'] = $id;
                $imgArr['sub_category_id'] = $product->sub_category_id;
                Image::create($imgArr);
            }
        }

        return redirect('admin/products/index')->with('success', 'Your Product has been updated');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('admin/products/index')->with('success', 'New Product has been deleted');
    }

    public function subdescription($id)
    {
        $data = Category::all();
        $pages = PageSetting::all();
        $top = HeaderTop::find(1);
        $footertail = FooterTail::all();
        $description = \DB::table('sub_categories')
                    ->select('categories.category_name as category_name', 'sub_categories.sub_main_image', 'sub_categories.sub_category_description', 'sub_categories.id as sub_category_id')
                    ->leftJoin('categories','categories.id', '=', 'sub_categories.category_id')
                    ->where('sub_categories.id','=', $id)
                    ->get();

        return view('client.products.list', compact('description', 'data', 'pages', 'top', 'footertail'));
    }

    public function detail($id)
    {
        $data = Category::all(); 
        $pages = PageSetting::all();
        $top = HeaderTop::find(1);
        $footertail = FooterTail::all();
        $detail = \DB::table('products')
                    ->select('products.*', 'categories.category_name', 'sub_categories.sub_category_name', 'sub_categories.id as sub_categories_id')
                    ->leftJoin('categories', 'categories.id','=', 'products.category_id')
                    ->leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
                    ->where('products.id','=', $id)
                    ->first();

        return view('client.products.detail', compact('data', 'pages', 'detail', 'top', 'footertail'));
    }

    public function deleteImage($id)
    {
        $image = Image::find($id);
        $pathToFile = 'uploads/'.$id.'/'.$image->image_name;
        \File::delete($pathToFile);
        $image->delete();

        return back()->with('success', 'Your image has been deleted');
    }

}
