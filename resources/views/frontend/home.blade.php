@extends('layouts.frontend')

@section('title', 'Latest Blogs')

@section('hero-title', 'Latest Blogs')

@section('hero-subtitle', 'Stay updated with latest news, jobs, results and admit cards')

@section('content')

<div class="main-content">

    <!-- LEFT SIDE -->

    <div>

        <!-- FILTERS -->

        <div class="filters">

            <input type="text"
                   id="search"
                   placeholder="Search blogs...">

            <select id="category">

                <option value="">
                    All Categories
                </option>

                <option value="Jobs">
                    Jobs
                </option>

                <option value="Result">
                    Result
                </option>

                <option value="Admit Card">
                    Admit Card
                </option>

                <option value="News">
                    News
                </option>

            </select>

        </div>

        <!-- BLOGS -->

        <div id="blog-container">

            @include('frontend.filtered-blogs')

        </div>

    </div>

    <!-- RIGHT SIDEBAR -->

    <div class="sidebar">

        <!-- CATEGORY BOX -->

        <div class="sidebar-box">

            <h3>Categories</h3>

            <div class="category-list">

               <a href="/category/Jobs">Jobs</a>

<a href="/category/Result">Results</a>

<a href="/category/Admit Card">Admit Card</a>

<a href="/category/News">News</a>

            </div>

        </div>

        <!-- RECENT POSTS -->

        <div class="sidebar-box">

            <h3>Recent Posts</h3>

            @foreach($blogs->take(4) as $recent)

            <div class="recent-post">

                <img src="{{ asset('uploads/'.$recent->image) }}">

                <div>

                    <a href="/blog/{{ $recent->slug }}">

                        {{ $recent->title }}

                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

<script>

$(document).ready(function(){

    function fetchBlogs()
    {
        let category = $('#category').val();

        let search = $('#search').val();

        $.ajax({

            url: "/filter-blogs",

            method: "GET",

            data: {
                category: category,
                search: search
            },

            success: function(response)
            {
                $('#blog-container').html(response);
            }

        });
    }

    $('#category').change(fetchBlogs);

    $('#search').keyup(fetchBlogs);

});

</script>

@endsection