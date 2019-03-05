<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdSubCategory extends Model
{
	protected $table = 'prodSubCategories';

    protected $fillable = ['name','prodCategory_id'];

    public function ProdCategory()
    {
    	return $this->belongsTo('App\ProdCategory');
    }
}
