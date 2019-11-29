<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Category;
use App\Post;

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
        return view('index')->with('settings',$settings)
                            ->with('categories',$categories)
                            ->with('first_post',$first_post)
                            ->with('second_post',$second_post)
                            ->with('third_post',$third_post)
                            ->with('first_category',$first_category)
                            ->with('second_category',$second_category);
    }

    public function category(Category $category){
        $settings = Settings::first();
        $categories = Category::take(5)->get();
        return view('category')->with('category',$category)
                               ->with('settings',$settings)
                               ->with('categories',$categories);
    }
}
