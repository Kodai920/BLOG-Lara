<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Category;
use App\Tag;

class PostController extends Controller
{

    public function __construct(){

        $this->middleware('auth')->except('index','trashed');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts',$posts);
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

        if($categories->count() == 0){
            Session::flash('info','You must have some categories before creating post');
            return redirect()->route('category.create');
        }
        return view('posts.create')->with('categories',$categories)
                                   ->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'featured' => 'required|image',
            'category' => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        //Mass Assignment
        $post = Post::create([
        'title' => $request->title,
        'slug' => str_slug($request->title),
        'description' => $request->description,
        'featured_img' => asset('uploads/posts/'.$featured_new_name),
        'category_id' => $request->category,
        'user_id' => Auth::id()
        ]);

        $post->save();

        $post->tags()->attach($request->tags);

        Session::flash('success','Post Created Successfully');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post)
                                 ->with('categories',Category::all())
                                 ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //validation
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'featured' => 'nullable|image',
            'category' => 'required'
        ]);

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name);
            $post->featured_img = asset('uploads/posts/'.$featured_new_name);
        }

        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->save();

        // $post->fill($request->input())->save();
        // $post->tags()->attach($request->tags);

        Session::flash('success','Post Updated Successfully');

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('success','Post Deleted Successfully');
        return redirect()->route('posts.index');
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        // Session::flash('success','Post Permanently Deleted Successfully');
        return view('posts.trashed')->with('posts',$posts);
    }

    public function restore($id){

        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post Restored Successfully');
        return redirect()->route('posts.index');
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post Permanently Deleted Successfully');
        return redirect()->route('posts.trashed');
    }
}
