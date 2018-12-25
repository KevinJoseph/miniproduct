<?php

namespace App;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name',
    'description',
    'price'
  ];
    
}
