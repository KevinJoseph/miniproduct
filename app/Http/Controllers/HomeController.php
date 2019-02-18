<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Promotion;
use App\Product;
use App\Category;
use App\Subcategory;
use App\Brand;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $promotions = Promotion::All();

        $categories = Category::All();

        return view('inicio',['promotions' => $promotions, 'categories' => $categories]);
    }

    public function categoryList(){
        $categories = Category::All();
        return $categories;
    }

    public function subcategoryList($id){
        $subcategories = Subcategory::where('id_category',$id)->get();
        return $subcategories;
    }

    public function brandList($id){
        $brands = Brand::where('id',1)->get();
        return $brands;
    }
    public function showProducts($id){

        $products = Product::where('id_category',$id)->paginate(6);
        return view('show',['categories' => $this->categoryList(), 'products' => $products,'subcategories'=>$this->subcategoryList($id),'brands' =>$this->brandList($id)]);
    }
    public function productEspecifid($id){
        $categories = Category::All();
        $product = Product::find($id);
    
        return view('product',['categories' => $categories, 'product' => $product]);
    }


}