<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SubCategory;
use App\Category;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $subcategories = DB::table('sub_categories')
                ->join('categories','sub_categories.id_category','=','categories.id')
                ->select('sub_categories.*','categories.name AS category')
                ->get();
             
        return view('subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subcategories.create');
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
        ]);

         $subcategory = new SubCategory();
         $subcategory->name = $request->get('name');

         //Busca el name de la categoria
         $category = Category::find($request->get('category'));

         $subcategory->id_category =$category->id;
         $subcategory->save();

         return redirect('subcategories')->with('success','La Subcategoria se agrego correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = SubCategory::find($id);

        $category = Category::find($subcategory->id_category);
        return view('subcategories.edit',['subcategory' => $subcategory,'category' => $category]);
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
        ]);

         $subcategory = SubCategory::find($id);
         $subcategory->name = $request->get('name');
         $subcategory->id_category = $request->get('category');
         $subcategory->save();

         return redirect('subcategories')->with('success','Se actualizo los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();

        return redirect('/subcategories')->with('success', 'Se elimino correctamente la categoria.');
    }
}
