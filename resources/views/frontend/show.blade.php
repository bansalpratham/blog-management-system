<!DOCTYPE html>
<html>
<head>

<title>{{ $blog->title }}</title>

<style>

body{
    margin:0;
    font-family: Arial, sans-serif;
    background:#f4f6fb;
    color:#111827;
}

/* HEADER */
.header{
    background:#111827;
    color:white;
    padding:20px 30px;
    font-size:18px;
}

.header a{
    color:white;
    text-decoration:none;
}

/* CONTAINER */
.container{
    max-width:1100px;
    margin:auto;
    padding:30px 20px;
    display:grid;
    grid-template-columns: 2fr 1fr;
    gap:25px;
}

/* MAIN ARTICLE */
.article{
    background:white;
    padding:25px;
    border-radius:14px;
    box-shadow:0 4px 12px rgba(0,0,0,0.05);
}

.article img{
    width:100%;
    height:300px;
    object-fit:cover;
    border-radius:12px;
    margin-bottom:20px;
}

.category{
    display:inline-block;
    padding:5px 10px;
    font-size:12px;
    border-radius:20px;
    background:#e0f2fe;
    color:#0369a1;
    margin-bottom:10px;
}

.title{
    font-size:28px;
    font-weight:bold;
    margin:10px 0;
}

.meta{
    font-size:13px;
    color:#6b7280;
    margin-bottom:20px;
}

.content{
    font-size:16px;
    line-height:1.8;
    color:#374151;
}

/* SIDEBAR */
.sidebar{
    display:flex;
    flex-direction:column;
    gap:15px;
}

.box{
    background:white;
    padding:15px;
    border-radius:12px;
    box-shadow:0 4px 12px rgba(0,0,0,0.05);
}

.box h3{
    margin-top:0;
    font-size:16px;
}

/* RELATED POST ITEM */
.item{
    padding:10px 0;
    border-bottom:1px solid #eee;
}

.item:last-child{
    border:none;
}

.item a{
    text-decoration:none;
    color:#111827;
    font-size:14px;
}

.item a:hover{
    color:#2563eb;
}

/* BACK BUTTON */
.back{
    display:inline-block;
    margin-bottom:15px;
    text-decoration:none;
    color:#2563eb;
    font-size:14px;
}

@media(max-width:900px){
    .container{
        grid-template-columns:1fr;
    }
}

</style>

</head>

<body>

<div class="header">
    <a href="/">← Back to Home</a>
</div>

<div class="container">

    <!-- ARTICLE -->
    <div class="article">

        <a href="/" class="back">← All Blogs</a>

        <img src="{{ asset('uploads/'.$blog->image) }}">

        <span class="category">
            {{ $blog->category }}
        </span>

        <div class="title">
            {{ $blog->title }}
        </div>

        <div class="meta">
            Posted on {{ $blog->created_at->format('d M Y') }}
        </div>

        <div class="content">
            {!! $blog->content !!}
        </div>

    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <!-- ABOUT -->
        <div class="box">
            <h3>About Blog</h3>
            <p style="font-size:13px;color:#6b7280;">
                Latest updates on jobs, results, admit cards and news.
            </p>
        </div>

        <!-- RELATED POSTS -->
        <div class="box">
            <h3>Recent Posts</h3>

            @foreach(\App\Models\Blog::latest()->take(5)->get() as $item)

            <div class="item">
                <a href="/blog/{{ $item->slug }}">
                    {{ $item->title }}
                </a>
            </div>

            @endforeach

        </div>

    </div>

</div>

</body>
</html>