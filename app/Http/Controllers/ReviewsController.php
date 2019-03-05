<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reviews;
use Session;

class ReviewsController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required|email',
    		'review' => 'required|max:255',
    		'rating' => 'required|integer'
    	]);

    	$review = new Reviews;

    	$review->product_id = $request->product_id;
    	$review->name = $request->name;
    	$review->email = $request->email;
    	$review->review = $request->review;
    	$review->ratings = $request->rating;

    	$review->save();

    	Session::flash('success','Your reviews has been received. Thank You');

    	return redirect()->back();

    }
}
