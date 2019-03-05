<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProdCategory;
use App\ProdSubCategory;
use App\Main_category;
use Image;
use Storage;
use Purifier;
use Session;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_categories = Main_category::all();
        $categories = ProdCategory::all();

        return view('products.create')->withMaincateg($main_categories)->withCategories($categories);
    }
    
  

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = ProdSubCategory::where('prodCategory_id', '=', $value)->get();

        $output = '<option value="">Select '.ucfirst($dependent).'</option>';

        foreach ($data as $row) {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }

        echo $output;

    }

    public function fetch_category(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = ProdCategory::where('main_category_id', '=', $value)->get();

        $output = '<option value="">Select '.ucfirst($dependent).'</option>';

        foreach ($data as $row) {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }

        echo $output;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_item(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:25',
            'main_category' => 'required|integer',
            'category' => 'required|integer',
            'price' => 'required',
            'list_price' => 'required',
            'image' => 'required|image',
            'description' => 'required'
        ]);


        $product = new Product;

        $product->title         = $request->title;
        $product->category      = $request->category;
        $product->subcategory   = $request->subcategory;
        $product->price         = $request->price;
        $product->list_price    = $request->list_price;
        $product->description   = Purifier::clean($request->description);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time(). '.' .$image->getClientOriginalExtension();

            $location = public_path('products/'.$filename);

            Image::make($image)->resize(1200,1200)->save($location);

            $product->image = $filename;
        }

        $product->save();

        Session::flash('success','You added one product to stock');

        return redirect()->route('products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $main_category = Main_category::all();
        $categories = ProdCategory::all();
        $subcategories = ProdSubCategory::all();
        $subcateg = [];
        $categ = [];
        $maincateg = [];

        foreach ($main_category as $main_categ) {
            $maincateg[$main_categ->id] = $main_categ->name;
        }

        foreach ($categories as $category) {
            $categ[$category->id] = $category->name;
        }
        foreach ($subcategories as $subcategory) {
            $subcateg[$subcategory->id] = $subcategory->name;
        }

        return view('products.edit')->withProduct($product)->withCategories($categ)->withSubcategories($subcateg)->withMaincateg($maincateg);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $this->validate($request, [
            'title' => 'required|max:25',
            'main_category' => 'required|integer',
            'category' => 'required|integer',
            'price' => 'required',
            'list_price' => 'required',
            'description' => 'required'
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time(). '.' .$image->getClientOriginalExtension();

            $location = public_path('products/'.$filename);

            Image::make($image)->resize(1200,1200)->save($location);

            $OldImage = $product->image;

            $product->image = $filename;

            Storage::delete($OldImage);
        }

        $product->title         = $request->title;
        $product->main_category = $request->main_category;
        $product->category      = $request->category;
        $product->subcategory   = $request->brand;
        $product->price         = $request->price;
        $product->list_price    = $request->list_price;
        $product->description   = Purifier::clean($request->description);

        $product->save();

        Session::flash('success','Product Update Was Successfully Completed');

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

