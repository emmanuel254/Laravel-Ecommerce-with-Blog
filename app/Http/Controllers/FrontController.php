<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Auth;
use App\Product;
use App\ProdCategory;
use App\Main_category;
use App\AddressCart;

class FrontController extends Controller
{
	public function add_cart(Request $request){
		//product categories
		$categories = ProdCategory::paginate(4);
        $main = Main_category::all();//main category items

	    $product_id = $request->product_id;
        $Quantity = $request->quantity;
        $image = $request->image;
        $product = Product::find($product_id);
        Cart::add(array('id' => $product_id, 'name' => $product->title, 'qty' => $Quantity, 'image' => $image ,'price' => $product->price));



    	
    	 $cart = Cart::content();
    	 $ids = $cart->pluck('id');
    	 $products = Product::findmany($ids);

   		 // return view('shopping.cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'))->withCategories($categories)->withProducts($products);

         return redirect()->back();	
	}

    public function cart(Request $request) {
       
    	 $categories = ProdCategory::paginate(4);
         $main = Main_category::all();//main category items

      //increment the quantity
    if ($request->has('product_id') && $request->has('increment') == 1) {
    	$rowId = Cart::search(function ($key, $value) use($request){ return $key->id == $request->product_id; });
       
        $item = $rowId->first();
        	//dd($rowId);

        Cart::update($item->rowId, $item->qty + 1);
    }

    //decrease the quantity
    if ($request->has('product_id') && $request->has('decrease') == 1) {
        $rowId = Cart::search(function ($key, $value) use($request){ return $key->id == $request->product_id; });
       
        $item = $rowId->first();
        	//dd($rowId);

        Cart::update($item->rowId, $item->qty - 1);
    }

    //destroy the item completely
    if ($request->has('product_id') && $request->has('destroy')) {
        $rowId = Cart::search(function ($key, $value) use($request){ return $key->id == $request->product_id; });
       
        $item = $rowId->first();
        	//dd($rowId);

        Cart::remove($item->rowId);
    }

    $products = Product::all();

    $cart = Cart::content();

    return view('shopping.cart', array('cart' => $cart,'product' => $products))->withCategories($categories)->withMain($main);
}

	  public function store(Request $request, $identifier)
    {
         $this->validate($request, [
            'name' => 'required|max:65',
            'email' => 'required|max:50',
            'phone' => 'required|integer',
            'landmark' => 'required|max:100',
            'town' => 'required|max:45',
            'address_type' => 'required',
            'address' => 'required',
            'pickup_point' => 'required|max:255'
        ]);

        $content = Cart::content();

        $content2 = serialize($content);
        //dd(unserialize($content2));

         //$item = Cart::restore($identifier);
        //dd($item);



         foreach ($content as $item) {

         	$order = new AddressCart;

         	$order->product_name        = $item->name;
	        $order->product_id      = $item->id;
	        $order->product_qty   = $item->qty;
	        $order->Product_price   = $item->price;
	        $order->subtotal    = $item->subtotal;


	        $order->fullname   = $request->name;
	        $order->email = $request->email;
	        $order->phone_number = $request->phone;
	        $order->town  = $request->town;
	        $order->landmark = $request->landmark;
	        $order->address_type = $request->address_type;
	        $order->address = $request->address;
	        $order->pickup_point = $request->pickup_point;

	        $order->save();
         }

        //Cart::instance('shopping')->store($identifier);

        return view('shopping.thankYou');
       
    }

    public function thanks(){
        $categories = ProdCategory::paginate(4);
         return view('shopping.thankYou')->withCategories($categories);
    }
	
}
