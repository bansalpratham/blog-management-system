@extends('layouts.frontend')

@section('title', $category . ' Blogs')

@section('hero-title', $category . ' Blogs')

@section('hero-subtitle', 'Browse all ' . $category . ' related posts')

@section('content')

<div class="main-content">

    <!-- LEFT SIDE -->

    <div>

        @if($blogs->count() > 0)

            <div class="blog-grid">

                @foreach($blogs as $blog)

                <div class="blog-card">

                    <img src="{{ asset('uploads/'.$blog->image) }}">

                    <div class="blog-content">

                        <span class="category">

                            {{ $blog->category }}

                        </span>

                        <h2>

                            {{ $blog->title }}

                        </h2>

                        <div class="date">

                            Published on
                            {{ $blog->created_at->format('d M Y, h:i A') }}

                        </div>

                        <p>

                            {{ \Illuminate\Support\Str::limit($blog->short_description, 120) }}

                        </p>

                        <a href="/blog/{{ $blog->slug }}"
                           class="read-more">

                            Read More

                        </a>

                    </div>

                </div>

                @endforeach

            </div>

        @else

            <div class="sidebar-box">

                <h2>No Blogs Found</h2>

                <p>
                    No blogs available in this category.
                </p>

            </div>

        @endif

    </div>

    <!-- SIDEBAR -->

    <div class="sidebar">

        <div class="sidebar-box">

            <h3>Categories</h3>

            <div class="category-list">

                <a href="/category/Jobs">Jobs</a>

                <a href="/category/Result">Results</a>

                <a href="/category/Admit Card">Admit Card</a>

                <a href="/category/News">News</a>

            </div>

        </div>

    </div>

</div>

@endsection