<!DOCTYPE html>
<html>
<head>

<title>Blog Home</title>

<style>

body{
    margin:0;
    font-family: Arial, sans-serif;
    background:#f4f6fb;
    color:#111827;
}

/* HERO */
.hero{
    background:#111827;
    color:white;
    padding:60px 20px;
    text-align:center;
}

.hero h1{
    font-size:42px;
    margin-bottom:10px;
}

.hero p{
    color:#cbd5e1;
    font-size:16px;
}

/* CONTAINER */
.container{
    max-width:1200px;
    margin:auto;
    padding:30px 20px;
}

/* GRID */
.grid{
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap:20px;
}

/* BLOG CARD */
.card{
    background:white;
    border-radius:14px;
    overflow:hidden;
    box-shadow:0 4px 12px rgba(0,0,0,0.06);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
    box-shadow:0 8px 18px rgba(0,0,0,0.12);
}

.card img{
    width:100%;
    height:180px;
    object-fit:cover;
}

.card-body{
    padding:15px;
}

.category{
    display:inline-block;
    padding:5px 10px;
    font-size:12px;
    border-radius:20px;
    background:#e0f2fe;
    color:#0369a1;
    margin-bottom:8px;
}

.title{
    font-size:18px;
    font-weight:bold;
    margin:8px 0;
}

.desc{
    font-size:14px;
    color:#6b7280;
    margin-bottom:12px;
    line-height:1.5;
}

/* BUTTON */
.read-btn{
    display:inline-block;
    padding:8px 12px;
    background:#111827;
    color:white;
    border-radius:8px;
    text-decoration:none;
    font-size:13px;
}

.read-btn:hover{
    background:#1f2937;
}

/* FOOTER */
footer{
    text-align:center;
    padding:30px;
    color:#6b7280;
    margin-top:40px;
}

</style>

</head>

<body>

<!-- HERO -->
<div class="hero">
    <h1>Welcome to Blog Portal</h1>
    <p>Latest updates on jobs, results, admit cards & news</p>
</div>

<!-- CONTENT -->
<div class="container">

    <div class="grid">

        @foreach($blogs as $blog)

        <div class="card">

            <img src="{{ asset('uploads/'.$blog->image) }}">

            <div class="card-body">

                <span class="category">
                    {{ $blog->category }}
                </span>

                <div class="title">
                    {{ $blog->title }}
                </div>

                <div class="desc">
                    {{ Str::limit($blog->short_description, 100) }}
                </div>

                <a href="/blog/{{ $blog->slug }}" class="read-btn">
                    Read More →
                </a>

            </div>

        </div>

        @endforeach

    </div>

</div>

<footer>
    © {{ date('Y') }} Blog Management System
</footer>

</body>
</html>