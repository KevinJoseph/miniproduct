<?php

namespace App;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use App\Category;


class Promotion extends Model
{
   protected $fillable = [
    'name',
    'description',
    'price',
    'image',
    'id_category'
  ];
   public function category(){
         return $this->hasMany('App\Category', 'id', 'id_category');
    }
}
