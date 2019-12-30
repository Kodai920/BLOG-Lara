<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Category;
use App\Post;
use Newsletter;
use Illuminate\Support\Facades\Session;
use App\Tag;

class FrontendController extends Controller
{
    public function index(){
        $settings = Settings::first();
        $categories = Category::take(5)->get();
        $first_post = Post::orderBy('created_at','desc')->first();
        $second_post = Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first();
        $first_category = Category::orderBy('created_at','desc')->first();
        $second_category = Category::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
        $category = Category::take(1)->get();
        $post = Post::first();
        return view('index')->with('settings',$settings)
                            ->with('categories',$categories)
                            ->with('first_post',$first_post)
                            ->with('second_post',$second_post)
                            ->with('third_post',$third_post)
                            ->with('first_category',$first_category)
                            ->with('second_category',$second_category)
                            ->with('category',$category)
                            ->with('post',$post);
    }

    public function tag(Tag $tag){
        $settings = Settings::first();
        $tags = Tag::take(5)->get();
        $posts = Post::take(5)->get();
        return view('tag')->with('tag',$tag)
                          ->with('tags',$tags)
                          ->with('settings',$settings)
                          ->with('posts',$posts);
    }

    public function category(Category $category){
        $settings = Settings::first();
        $categories = Category::take(5)->get();
        $tags = Tag::take(5)->get();
        return view('category')->with('category',$category)
                               ->with('settings',$settings)
                               ->with('tags',$tags)
                               ->with('categories',$categories);
    }

    public function single_post($slug){
        $settings = Settings::first();
        $post = Post::where('slug',$slug)->first();
        $categories = Category::take(5)->get();
        $tags = Tag::take(5)->get();
        $prev_id = Post::where('id','<',$post->id)->max('id');
        $next_id = Post::where('id','>',$post->id)->min('id');
        return view('single')->with('post',$post)
                             ->with('prev',Post::find($prev_id))
                             ->with('next',Post::find($next_id))
                             ->with('settings',$settings)
                             ->with('categories',$categories)
                             ->with('tags',$tags);
    }

    public function search(){
        $posts = Post::where('title','like','%'.request('query').'%')->get();
        $settings = Settings::first();
        $categories = Category::take(5)->get();

        return view('results')->with('posts',$posts)
                              ->with('title','Search results : '.request('query'))
                              ->with('query',request('query'))
                              ->with('settings',$settings)
                              ->with('categories',$categories);
    }

    public function subscribe(){
        $email = request('email');
        Newsletter::subscribe($email);

        Session::flash('success','Successfully subscrobed');
        return redirect()->back();
    }
}
