<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main_category;
use Image;
use Session;
use Storage;

class Main_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maincateg = Main_category::all();
        return view('admin.main_category.index')->withMaincateg($maincateg);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.main_category.create');
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

        $category = new Main_category;

        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('products/categories/'.$filename);

            Image::make($image)->resize(800,400)->save($location);

            $category->image = $filename; 
        }

        $category->save();

        Session::flash('success','You have added '.$request->name.'category');

        return redirect()->route('admin.main_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Main_category::find($id);

        return view('admin.main_category.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Main_category::find($id);

        return view('admin.main_category.edit')->withCategory($category);
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
        $category = Main_category::find($id);

        $this->validate($request, array(
            'name' => 'required|max:255',
            'description'  =>  'required',
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
        $category->description = $request->input('description');

        $category->save();

        //set flash data with success message
        Session::flash('success', 'Category was updated successfully');

        //redirect with flash to post.show
         return redirect()->route('main_categories.index');
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
