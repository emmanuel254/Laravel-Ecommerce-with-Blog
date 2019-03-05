<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use Mail;
use Session;
use App\Post;
use App\ProdCategory;
use App\Product;
use App\Tag;
use App\Main_category;
use App\ProdSubCategory;
use App\Reviews;
/**
 * 
 */
class pagesController extends Controller
{
	
	public function getIndex()
	{
		

		$posts = Post::orderBy('created_at','desc')->limit(4)->get();
		$main = Main_category::all();
		$newArrivals = Main_category::orderBy('created_at','desc')->limit(3)->get();
		$categories = ProdCategory::paginate(4);
		$products = Product::all();

		//items in the cart
		$cart = Cart::content();

		return view('pages.home')->withPosts($posts)->withMain($main)->withCategories($categories)->withProducts($products)->withCart($cart)->withNewArrivals($newArrivals);
	}
	//getting all the products on a single page
	public function shopping()
	{
	    $main = Main_category::all();//main category items
	    $cart = Cart::content();
		$products = Product::all();
		$categories = ProdCategory::paginate(4);

		return view('shopping.index')->withProducts($products)->withCategories($categories)->withMain($main)->withCart($cart);
	}

	//showing products for main category only

	public function main_category(Request $request,$main_category)
	{
		$main = Main_category::all();//main category items
        $cart = Cart::content();
        $product = Product::all();//aids in getting cart items to avoid errors
		$categories = ProdCategory::paginate(4);
		

		if ($request->has('subcategory')) {
			$catname = ProdSubCategory::find($request->subcategory);
			$products = Product::where('subcategory', '=' , $request->subcategory)->get();//as specified by the user

		}else{
			$products = Product::where('main_category', '=' , $main_category)->get();//as specified by the user
			$catname = Main_category::find($main_category);
		}

		return view('shopping.main_category')->withProducts($products)->withCategories($categories)->withCart($cart)->withMain($main)->withProduct($product)->withCatname($catname);
	}

	public function subcategory(Request $request,$subcategory)
	{
		$main = Main_category::all();//main category items
        $cart = Cart::content();
        $product = Product::all();//aids in getting cart items to avoid errors
		$categories = ProdCategory::paginate(4);
		

		
		$catname = ProdSubCategory::find($subcategory);
		$products = Product::where('subcategory', '=' , $subcategory)->get();//as specified by the user		

		return view('shopping.main_category')->withProducts($products)->withCategories($categories)->withCart($cart)->withMain($main)->withProduct($product)->withCatname($catname);
	}

	//quick view of a single product
	public function single_product(Request $request, $id)
	{
		$data = $request->category;
		$cart = Cart::content();
		$category = ProdCategory::find($data);
		$main = Main_category::all();//main category items
		$product = Product::find($id);
		$categories = ProdCategory::paginate(4);
		$reviews = Reviews::where('product_id','=',$id)->get();

		return view('products.single')->withProduct($product)->withCategories($categories)->withCategory($category)->withCart($cart)->withMain($main)->withReviews($reviews);
	}

 
	//chatting site page
	public function chat()
	{
		$categories = ProdCategory::paginate(4);
		
		return view('chats.index')->withCategories($categories);
	}

	public function categories($id)
	{
		//selecting all products from an individual category
		$main = Main_category::all();//main category items
		$cart = Cart::content();
		$prodcategory = ProdCategory::find($id);
		$categories = ProdCategory::paginate(4);

		return view('shopping.singlecategory')->withcategory($prodcategory)->withCategories($categories)->withMain($main)->withCart($cart);
	}

	public function getAbout(){
		$categories = ProdCategory::paginate(4);

		$posts = Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.about')->withPosts($posts)->withCategories($categories);
	}


	public function getContact(){

		$product = Product::all();//aids in getting cart items to avoid errors
		$cart = Cart::content();
		$main = Main_category::all();//main category items
		$categories = ProdCategory::paginate(4);
		return view('pages.contact')->withCategories($categories)->withMain($main)->withCart($cart)->withProduct($product);
	}

	public function postContact(Request $request){
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10'
		  ]);

		$data = [
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
		];

		Mail::send('emails.contact',$data,function($message) use ($data){
			$message->from($data['email']);
			$message->to('manuewalcoz@gmail.com');
			$message->subject($data['subject']);
		});

		Session::flash('success','Your Email was sent!!');

		return redirect()->route('index');
	}

	public function questions(){

        $product = Product::all();//aids in getting cart items to avoid errors
		$cart = Cart::content();
		$main = Main_category::all();//main category items
		$categories = ProdCategory::paginate(4);
		$tags = Tag::all();

		return view('pages.questions')->withCategories($categories)->withTags($tags)->withMain($main)->withCart($cart)->withProduct($product);
	}
}