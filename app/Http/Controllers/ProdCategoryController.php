<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProdCategory;
use App\ProdSubCategory;
use App\Main_category;
use Session;
use Storage;
use Image;

class ProdCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProdCategory::all();

        return view('prodcategories.index')->withCategories($categories);
    }

    public function subcategory($id)
    {
        $category = ProdCategory::find($id);

        return view('products.createSub')->withCategory($category);
    }

    public function subcategorystore(Request $request)
    {
        $this->validate($request, [
            'subcategory' => 'required|max:255'
        ]);

        $subcategory = new ProdSubCategory;

        $subcategory->name = $request->subcategory;
        $subcategory->prodCategory_id = $request->category_id;

        $subcategory->save();

        Session::flash('success','subcategory added successfully');

        return redirect()->route('prodcategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maincats = Main_category::all();
       
        return view('prodcategories.create')->withMaincat($maincats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:prodCategories',
            'description' => 'required|max:255',
            'image' => 'required|image'
        ]);

        $category = new ProdCategory;

        $category->name = $request->name;
        $category->description = $request->description;
        $category->main_category_id = $request->main_category;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('products/categories/'.$filename);

            Image::make($image)->resize(800,400)->save($location);

            $category->image = $filename; 
        }

        $category->save();

        Session::flash('success','You have added one category');

        return redirect()->route('prodcategories.index');

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
        $category = ProdCategory::find($id);
       $main_category = Main_category::all();
       $maincategory = Main_category::find($category->main_category_id);

       $maincateg = [];

         foreach ($main_category as $main_categ) {
            $maincateg[$main_categ->id] = $main_categ->name;
        }
        return view('prodcategories.edit')->withCategory($category)->withMaincateg($main_category)
                                         ->withcurrentCateg($maincategory);
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
               //validate the data
        $category = ProdCategory::find($id);

        $this->validate($request, array(
            'name' => 'required|max:255',
            'description'  =>  'required',
            'main_category' => 'required|integer',
            'image' => 'image'
        ));

        if ($request->hasFile('image')) {
            //delete the old photo and add the new photo
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('products/categories/'.$filename);

            Image::make($image)->resize(1000,400)->save($location);

            $oldFileName = $category->image;

            //update image
            $category->image = $filename;
            //delete the old file
            Storage::delete($oldFileName);

        }
        
        //save data into database
        $category->name = $request->input('name');
        $category->main_category_id = $request->input('main_category');
        $category->description = $request->input('description');

        $category->save();

        //set flash data with success message
        Session::flash('success', 'Category was updated successfully');

        //redirect with flash to post.show
         return redirect()->route('prodcategories.index');
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
