<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class FrontendController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('frontend.home', compact('blogs'));
    }

    public function category($category)
{
    $blogs = Blog::where('category', $category)
                    ->latest()
                    ->get();

    return view('frontend.category', compact('blogs', 'category'));
}

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return view('frontend.show', compact('blog'));
    }

    public function filter(Request $request)
    {
        $blogs = Blog::query();

        if($request->category)
        {
            $blogs->where('category', $request->category);
        }

        if($request->date)
        {
            $blogs->whereDate('publish_date', $request->date);
        }

        if($request->search)
        {
            $blogs->where('title', 'like', '%'.$request->search.'%');
        }

        $blogs = $blogs->latest()->get();

        return view('frontend.filtered-blogs', compact('blogs'))->render();
    }
}