<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class SubCategory extends Model
{
    //
    protected $fillable = ['name'];

   public function category(){
         return $this->hasMany('App\Category', 'id', 'id_category');
    }
}
