<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function ProdCategory()
    {
    	return $this->belongsTo('App\ProdCategory');
    }

     public function Main_category()
    {
    	return $this->belongsTo('App\Main_category','main_category');
    }
}
