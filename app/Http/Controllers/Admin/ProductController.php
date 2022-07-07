<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function index(){

        $products = Product::all();
        return view('admin.product.index', compact('products'));

    }

    public function add(){

        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    public function insert(Request $request) {

        $products = new Product();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products/', $filename);
            $products->image = $filename;
        }
        $products->category_id = $request->input('category_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->description = $request->input('description');
        $products->originalPrice = $request->input('originalPrice');
        $products->sellingPrice = $request->input('sellingPrice');
        $products->quantity = $request->input('quantity');
        $products->status = $request->input('status') == TRUE ? '1': '0';
        $products->trending = $request->input('trending') == TRUE ? '1': '0';
        $products->save();

        return redirect('products')->with('status', "Product added successfully");
    }

    public function edit($id){

        $products = Product::find($id);
        return view('admin.product.edit', compact('products'));
    }

    public function update(Request $request, $id){

        $products = Product::find($id);

        if($request->hasFile('image'))
        {
            //checking image already here
            $path = 'assets/uploads/products/'.$products->image;
            if(File::exists($path)){

                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products/', $filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->description = $request->input('description');
        $products->originalPrice = $request->input('originalPrice');
        $products->sellingPrice = $request->input('sellingPrice');
        $products->update();

        return redirect('products')->with('status', "Product updated successfully!");
    }

    public function destroy($id){

        $products = Product::find($id);

        $path = 'assets/uploads/products/'.$products->image;
        if(File::exists($path)){

            File::delete($path);
        }
        $products->delete();

        return redirect('products')->with('status', "Product deleted successfully!");
    }
}
