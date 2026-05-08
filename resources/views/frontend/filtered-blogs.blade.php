@php
use Illuminate\Support\Str;
@endphp

<div class="blog-grid">

@forelse($blogs as $blog)

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

            {{ Str::limit($blog->short_description, 120) }}

        </p>

        <a href="/blog/{{ $blog->slug }}"
           class="read-more">

            Read More

        </a>

    </div>

</div>

@empty

<h2>No Blogs Found</h2>

@endforelse

</div>