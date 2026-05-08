<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f5f5f5;
            color:#222;
        }

        .container{
            width:90%;
            max-width:1300px;
            margin:auto;
        }

        /*
        ======================
        NAVBAR
        ======================
        */

        .navbar{
            background:white;
            box-shadow:0 2px 10px rgba(0,0,0,0.08);
            position:sticky;
            top:0;
            z-index:1000;
        }

        .nav-wrapper{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:18px 0;
        }

        .logo{
            font-size:28px;
            font-weight:bold;
            color:#0d6efd;
            text-decoration:none;
        }

        .nav-links{
            display:flex;
            gap:25px;
        }

        .nav-links a{
            text-decoration:none;
            color:#222;
            font-weight:600;
            transition:0.3s;
        }

        .nav-links a:hover{
            color:#0d6efd;
        }

        /*
        ======================
        HERO SECTION
        ======================
        */

        .hero{
            background:linear-gradient(to right, #0d6efd, #3b82f6);
            color:white;
            padding:70px 20px;
            text-align:center;
        }

        .hero h1{
            font-size:48px;
            margin-bottom:15px;
        }

        .hero p{
            font-size:18px;
            opacity:0.9;
        }

        /*
        ======================
        MAIN CONTENT
        ======================
        */

        .main-content{
            display:grid;
            grid-template-columns:3fr 1fr;
            gap:30px;
            margin-top:40px;
            margin-bottom:50px;
        }

        /*
        ======================
        BLOG GRID
        ======================
        */

        .blog-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit, minmax(320px,1fr));
            gap:25px;
        }

        .blog-card{
            background:white;
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 3px 12px rgba(0,0,0,0.08);
            transition:0.3s;
        }

        .blog-card:hover{
            transform:translateY(-6px);
        }

        .blog-card img{
            width:100%;
            height:220px;
            object-fit:cover;
        }

        .blog-content{
            padding:20px;
        }

        .category{
            display:inline-block;
            background:#0d6efd;
            color:white;
            padding:6px 12px;
            border-radius:30px;
            font-size:13px;
            margin-bottom:12px;
        }

        .blog-content h2{
            font-size:24px;
            margin-bottom:12px;
            line-height:1.4;
        }

        .blog-content p{
            color:#666;
            margin-bottom:15px;
            line-height:1.7;
        }

        .date{
            font-size:14px;
            color:gray;
            margin-bottom:15px;
        }

        .read-more{
            display:inline-block;
            padding:10px 18px;
            background:#0d6efd;
            color:white;
            text-decoration:none;
            border-radius:6px;
        }

        /*
        ======================
        SIDEBAR
        ======================
        */

        .sidebar{
            display:flex;
            flex-direction:column;
            gap:25px;
        }

        .sidebar-box{
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 2px 10px rgba(0,0,0,0.08);
        }

        .sidebar-box h3{
            margin-bottom:15px;
        }

        .category-list a{
            display:block;
            text-decoration:none;
            color:#444;
            padding:10px 0;
            border-bottom:1px solid #eee;
        }

        .recent-post{
            display:flex;
            gap:12px;
            margin-bottom:15px;
        }

        .recent-post img{
            width:70px;
            height:70px;
            object-fit:cover;
            border-radius:6px;
        }

        .recent-post a{
            text-decoration:none;
            color:#222;
            font-size:14px;
            font-weight:600;
        }

        /*
        ======================
        FILTERS
        ======================
        */

        .filters{
            display:flex;
            gap:15px;
            margin-bottom:30px;
            flex-wrap:wrap;
        }

        .filters input,
        .filters select{
            padding:12px;
            border:1px solid #ddd;
            border-radius:6px;
            min-width:220px;
        }

        /*
        ======================
        FOOTER
        ======================
        */

        .footer{
            background:#111;
            color:white;
            padding:25px 0;
            text-align:center;
        }

        /*
        ======================
        RESPONSIVE
        ======================
        */

        @media(max-width:992px){

            .main-content{
                grid-template-columns:1fr;
            }

        }

        @media(max-width:768px){

            .nav-wrapper{
                flex-direction:column;
                gap:15px;
            }

            .hero h1{
                font-size:36px;
            }

            .filters{
                flex-direction:column;
            }

            .filters input,
            .filters select{
                width:100%;
            }

        }

    </style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar">

    <div class="container nav-wrapper">

        <a href="/" class="logo">
            BlogSphere
        </a>

        <div class="nav-links">

            <a href="/">Home</a>

<a href="/">Latest Blogs</a>

<a href="/category/Jobs">Jobs</a>

<a href="/category/Result">Results</a>

<a href="/category/News">News</a>

        </div>

    </div>

</nav>

<!-- HERO -->

<section class="hero">

    <div class="container">

        <h1>@yield('hero-title')</h1>

        <p>@yield('hero-subtitle')</p>

    </div>

</section>

<!-- PAGE CONTENT -->

<div class="container">

    @yield('content')

</div>

<!-- FOOTER -->

<footer class="footer">

    <div class="container">

        <p>
            © 2025 BlogSphere. All Rights Reserved.
        </p>

    </div>

</footer>

</body>
</html>