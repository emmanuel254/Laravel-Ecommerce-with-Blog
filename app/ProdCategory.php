<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdCategory extends Model
{
	protected $table = 'prodCategories';

    protected $fillable = ['name'];

    public function ProdSubCategories()
    {
    	return $this->hasMany('App\ProdSubCategory','ProdCategory_id');
    }
    public function Products()
    {
    	return $this->hasMany('App\Product','category');
    }
    public function Main_category()
    {
        return $this->belongsTo('App\Main_category');
    }
}
