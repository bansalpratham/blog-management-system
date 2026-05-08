<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>

    <style>

        body{
            margin:0;
            font-family:'Segoe UI', sans-serif;
            background:#f4f6fb;
        }

        /* HEADER */
        .header{
            background:#111827;
            color:white;
            padding:20px 30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .header h2{
            margin:0;
            font-size:20px;
        }

        .logout-btn{
            background:#ef4444;
            color:white;
            border:none;
            padding:10px 15px;
            border-radius:8px;
            cursor:pointer;
        }

        /* CONTAINER */
        .container{
            padding:30px;
        }

        /* GRID */
        .grid{
            display:grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap:20px;
        }

        /* CARD */
        .card{
            background:white;
            padding:25px;
            border-radius:14px;
            box-shadow:0 6px 18px rgba(0,0,0,0.06);
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-5px);
        }

        .card h3{
            margin:0;
            font-size:14px;
            color:#6b7280;
        }

        .card h1{
            margin:10px 0 0;
            font-size:28px;
            color:#111827;
        }

        /* ACTION SECTION */
        .actions{
            margin-top:30px;
            display:flex;
            gap:15px;
            flex-wrap:wrap;
        }

        .btn{
            padding:12px 18px;
            border-radius:10px;
            text-decoration:none;
            font-weight:500;
            transition:0.3s;
            display:inline-block;
        }

        .btn-dark{
            background:#111827;
            color:white;
        }

        .btn-dark:hover{
            background:#000;
        }

        .btn-green{
            background:#16a34a;
            color:white;
        }

        .btn-green:hover{
            background:#15803d;
        }

        .btn-blue{
            background:#2563eb;
            color:white;
        }

        .btn-blue:hover{
            background:#1d4ed8;
        }

        /* FOOTER NOTE */
        .note{
            margin-top:30px;
            color:#6b7280;
            font-size:13px;
        }

    </style>

</head>

<body>

<!-- HEADER -->
<div class="header">

    <h2>Admin Dashboard</h2>

    <form method="POST" action="/admin/logout">
        @csrf
        <button class="logout-btn">Logout</button>
    </form>

</div>

<!-- MAIN -->
<div class="container">

    <!-- STATS CARDS -->
    <div class="grid">

        <div class="card">
            <h3>Total Blogs</h3>
            <h1>{{ \App\Models\Blog::count() }}</h1>
        </div>

        <div class="card">
            <h3>Jobs</h3>
            <h1>{{ \App\Models\Blog::where('category','Jobs')->count() }}</h1>
        </div>

        <div class="card">
            <h3>Results</h3>
            <h1>{{ \App\Models\Blog::where('category','Result')->count() }}</h1>
        </div>

        <div class="card">
            <h3>Admit Cards</h3>
            <h1>{{ \App\Models\Blog::where('category','Admit Card')->count() }}</h1>
        </div>

    </div>

    <!-- ACTION BUTTONS -->
    <div class="actions">

        <a href="/admin/blogs" class="btn btn-dark">
            📚 Manage Blogs
        </a>

        <a href="/admin/blogs/create" class="btn btn-green">
            ➕ Add Blog
        </a>

        <a href="/" class="btn btn-blue">
            🌐 View Website
        </a>

    </div>

    <p class="note">
        Tip: This dashboard updates automatically based on database data.
    </p>

</div>

</body>
</html>