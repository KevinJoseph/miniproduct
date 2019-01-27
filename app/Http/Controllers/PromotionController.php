<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Promotion;
use App\Category;
class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = DB::table('promotions')
                ->join('categories','promotions.id_category','=','categories.id')
                ->select('promotions.*','categories.name AS category')
                ->get();
             
        return view('promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotions.create');
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


        $promotion = new Promotion();
        $promotion->name = $request->get('name');
        $promotion->description = $request->get('description');
        $promotion->price = $request->get('price');
        $promotion->id_category =$category->id;
        $promotion->path_image = $imageName;
        $promotion->save();
        
        return redirect('promotions')->with('success', 'Se agrego la promoción correctamente.');
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
        $promotion = Promotion::find($id);
       
        return view('promotions.show',['categories' => $categories, 'promotion' => $promotion]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = Promotion::find($id);
        //encuentra la categoria_name, la envia como object
        $category = Category::find($promotion->id_category);
        return view('promotions.edit',['promotion' => $promotion,'category' => $category]);
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

         $promotion = Promotion::find($id);
         $promotion->name = $request->get('name');
         $promotion->description = $request->get('description');
         $promotion->price = $request->get('price');
         $promotion->id_category = $request->get('category');

         if(request()->image != null){
            /*IMAGE*/
             $imageName = time().'.'.request()->image->getClientOriginalExtension();
             request()->image->move(public_path('upload'), $imageName);
            /*end IMAGE*/
            $promotion->path_image = $imageName;
         }

        $promotion->save();         
        return redirect('/promotions')->with('success', 'Se actualizo los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();

        return redirect('/promotions')->with('success', 'Se elimino correctamente.');
    }
}
