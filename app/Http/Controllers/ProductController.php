<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Product;
use App\Category;
class ProductController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadcategory(){
      
         $categories = DB::table('categories')->select('categories.id', 'categories.name')->get();
        
         return response()->json(['categories' => $categories]);
    }

    public function index()
    {
        //$products = Product::paginate(3);

        $products = DB::table('products')
                ->join('categories','products.id_category','=','categories.id')
                ->select('products.*','categories.name AS category')
                ->get();
             
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
        'name'=>'required',
        'description'=> 'required',
        'price' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        /*IMAGE*/
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('upload'), $imageName);
        /*end IMAGE*/

        $category = Category::find($request->get('category'));


        $product = new Product();
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->id_category =$category->id;
        $product->path_image = $imageName;
        $product->save();
        
        return redirect('products')->with('success', 'El producto se agrego correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::All();
        $product = Product::find($id);
    
        return view('products.show',['categories' => $categories, 'product' => $product]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        //encuentra la categoria_name, la envia como object
        $category = Category::find($product->id_category);
        return view('products.edit',['product' => $product,'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
        'name'=>'required',
        'description'=> 'required',
        'price' => 'required'
        //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
         $product = Product::find($id);
         $product->name = $request->get('name');
         $product->description = $request->get('description');
         $product->price = $request->get('price');
         $product->id_category = $request->get('category');

         if(request()->image != null){
            /*IMAGE*/
             $imageName = time().'.'.request()->image->getClientOriginalExtension();
             request()->image->move(public_path('upload'), $imageName);
            /*end IMAGE*/
            $product->path_image = $imageName;
         }

        $product->save();         
        return redirect('/products')->with('success', 'Se actualizo los datos correctamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Se elimino correctamente el producto.');
    }

}
