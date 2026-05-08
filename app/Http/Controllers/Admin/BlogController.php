<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'short_description' => 'required',
            'content' => 'required',
            'image' => 'required|image'
        ]);

        $imageName = null;

        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);
        }

        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category' => $request->category,
            'image' => $imageName,
            'short_description' => $request->short_description,
            'content' => $request->content,
        ]);

        return redirect('/admin/blogs')
            ->with('success', 'Blog Added Successfully');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $imageName = $blog->image;

        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);
        }

        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category' => $request->category,
            'image' => $imageName,
            'short_description' => $request->short_description,
            'content' => $request->content,
        ]);

        return redirect('/admin/blogs')
            ->with('success', 'Blog Updated Successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        return redirect('/admin/blogs')
            ->with('success', 'Blog Deleted Successfully');
    }
}