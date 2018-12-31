<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Promotion;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $promotions = Promotion::paginate(4);

        $categories = Category::All();

        return view('inicio',['promotions' => $promotions, 'categories' => $categories]);
    }

    public function categoryList(){
        $categories = Category::All();
        return $categories;
    }

    public function showProducts($id){

        $products = Product::where('id_category',$id)->paginate(6);
        return view('show',['categories' => $this->categoryList(), 'products' => $products]);
    }



}