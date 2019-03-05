<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Post;
use App\Tag;
use App\ProdCategory;
use App\Product;
use App\Main_category;

class BlogController extends Controller
{
	public function getIndex() {
		$posts = Post::paginate(10);
        $tags = Tag::all();
        $product = Product::all();//aids in getting cart items to avoid errors
        $cart = Cart::content();
        $main = Main_category::all();//main category items
        $categories = ProdCategory::paginate(4);

		return view('blog.index')->withPosts($posts)->withTags($tags)->withCategories($categories)->withProduct($product)->withCart($cart)->withMain($main);
	}

    public function getSingle($slug){
    	//fetch from DB based on slug
    	$post = Post::where('slug','=', $slug)->first();
        $categories = ProdCategory::paginate(4);
        $product = Product::all();//aids in getting cart items to avoid errors
        $cart = Cart::content();
        $main = Main_category::all();//main category items

    	//return the view and pass in the post object
    	return view('blog.single')->withPost($post)->withCategories($categories)->withProduct($product)->withCart($cart)->withMain($main);
    }
}
