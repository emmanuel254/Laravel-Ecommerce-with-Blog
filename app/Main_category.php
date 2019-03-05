<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Main_category extends Model
{
	protected $table = 'main_category';

     public function ProdCategories()
    {
    	return $this->hasMany('App\ProdCategory','main_category_id');
    }

     public function Products()
    {
    	return $this->hasMany('App\Product','main_category');
    }
}
