<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
 
    public function __construct()
{
    $this->middleware('auth');
}
    
    public function getAdmin()
    {
        return view('admin.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blog posts in it from the database
            $posts = Post::orderBy('id', 'desc')->paginate(5);
        //return a view and pass in the above variable
            return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating the entered data
        $this->validate($request, array(
            'title'          =>  'required|max:255',
            'slug'           =>  'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'    =>  'required|integer',
            'body'           =>  'required',
            'featured_image' =>  'sometimes|image'
        ));
        //store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug  = $request->slug;
        $post->category_id = $request->category_id;
        $post->body  = purifier::clean($request->body);//html purifier--find it

        //save our image
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);

            Image::make($image)->resize(800,400)->save($location);

            $post->image = $filename;

        }

        $post->save();

        $post->tags()->sync($request->tags,false);

        Session::flash('success','Your post was successfully saved');//replace flash with put is session is permanent

        //redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save it as a variable
         $post = Post::find($id);
         $categories = Category::all();
         $cats = [];

         foreach ($categories as $category) {
             $cats[$category->id] = $category->name;
         }

         $tags = Tag::all();
         $tags2 = [];
         foreach ($tags as $tag) {
             $tags2[$tag->id] = $tag->name;
         }
        //return the view and pass the above variable
         return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
        $post = Post::find($id);

        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'  =>  "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id' => 'required|integer',
            'body'  =>  'required',
            'featured_image' => 'image'
        ));

        if ($request->hasFile('featured_image')) {
            //delete the old photo and add the new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);

            Image::make($image)->resize(800,400)->save($location);

            $oldFileName = $post->image;

            //update image
            $post->image = $filename;
            //delete the old file
            Storage::delete($oldFileName);

        }
        
        //save data into database
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = purifier::clean($request->input('body'));

        $post->save();

        $post->tags()->sync($request->tags);

        //set flash data with success message
        Session::flash('success', 'Your post was updated successfully');

        //redirect with flash to post.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->tags()->detach();

        Storage::delete($post->image);

        $post->delete();

        Session::flash('success', 'Post successfully deleted');

        return redirect()->route('posts.index');
    }
}
