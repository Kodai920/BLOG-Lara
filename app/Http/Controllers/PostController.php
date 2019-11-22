<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use Auth;


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
        return view('posts.create');
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
            'featured' => 'required|image'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        //Mass Assignment
        $post = Post::create([
        'title' => $request->title,
        'description' => $request->description,
        'featured_img' => asset('uploads/posts/'.$featured_new_name)
        ]);

        $post->save();

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
        return view('posts.show')->with('post',$post)
                                ->with('user',Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with('post',$post);
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
            'featured' => 'nullable|image'
        ]);

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name);
            $post->featured_img = asset('uploads/posts/'.$featured_new_name);
        }

        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();

        $post->fill($request->input())->save();

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
