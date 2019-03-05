<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    
   		public function index()
 
		{
		 
		return view('shopping.search');
		 
		}
 
 
 
		public function search(Request $request)
		 
		{
		 
			if($request->ajax())
			 
			{
			 
				$output="";
				 
				$products=Product::where('title','LIKE','%'.$request->search."%")->get();
				 
				if($products)
				 
				{
					$output = '<ul class="dropdown-menu" style="display:block;position:absolute;width:100%;">';
				 
					foreach ($products as $key => $product) {
					 
					$output .='<li><a href="#">'.$product->title.'</a></li>';
					 
					}
					 
					 $output .= '</ul>';
					 
					return Response($output);
					 				 
				 }
			 
			 
			 
			  }
		 
		 
		 
		}

}
