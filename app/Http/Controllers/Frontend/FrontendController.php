<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
       $featured_products = Product::where('trending', '1')->take(15)->get();
       $trending_category = Category::where('popular', '1')->take(15)->get();
        return view( 'frontend.index', compact('featured_products', 'trending_category'));

    }

    public function category(){
        $category = Category::where('status', '0')->get();
        $trending_category = Category::where('popular','1')->take(15);
        return view('frontend.category', compact('category', 'trending_category'));
    }

    public function view_category($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));


        } else {
            return redirect('/')->with('status', "Slug doesnot exist!");

        }
    }
    public function product_view($category_slug, $product_slug) {

        if (Category::where('slug', $category_slug)->exists()){
            if(Product::where('slug',$product_slug )->exists())
            {
                $products = Product::where('slug', $product_slug)->first();
                return view('frontend.products.view', compact('products'));

            }else {

                return redirect('/')->with('status', "The Link was broken");
            }

        }else{
            return redirect('/')->with('status', "No such category found!");
        }
    }

    public function searchProduct(Request $request) {
        $search_product = $request->product_name;

        if($search_product != "")
        {
            $product = Product::where("name", "LIKE", "%$search_product%")->first();
            if($product){
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            else
            {
                return redirect()->back()->with("status", "kein Produkt gefunden!");
            }
        }
        else
        {
            return redirect()->back();
        }

    }
}
