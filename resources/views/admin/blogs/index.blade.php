<!DOCTYPE html>
<html>
<head>
    <title>Manage Blogs | Admin Portal</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Roboto, Arial, sans-serif;
            background: #f4f6fb;
            color: #111827;
        }

        /* HEADER */
        .header {
            background: #111827;
            color: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header h1 { margin: 0; font-size: 22px; letter-spacing: -0.5px; }

        /* NAVIGATION BUTTONS */
        .nav-links {
            display: flex;
            gap: 12px;
        }

        .btn-nav {
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.1);
            color: #cbd5e1;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .add-btn {
            background: #10b981;
            color: white;
        }

        .add-btn:hover {
            background: #059669;
        }

        /* CONTAINER */
        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* TABLE STYLING */
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background: #f9fafb;
            padding: 16px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #6b7280;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 14px;
            vertical-align: middle;
        }

        tr:last-child td { border-bottom: none; }
        tr:hover { background: #f9fafb; }

        .blog-img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            background: #eff6ff;
            color: #2563eb;
            text-transform: capitalize;
        }

        /* ACTION BUTTONS */
        .actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            padding: 6px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-edit {
            background: #3b82f6;
            color: white;
        }

        .btn-edit:hover { background: #2563eb; }

        .btn-delete {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background: #fecaca;
        }

        /* MESSAGE */
        .alert {
            background: #ecfdf5;
            color: #065f46;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
            border-left: 4px solid #10b981;
            font-size: 14px;
        }

    </style>
</head>
<body>

<div class="header">
    <div class="header-left">
        <h1>Manage Blogs</h1>
    </div>
    
    <div class="nav-links">
        <a href="/admin/dashboard" class="btn-nav btn-back">← Dashboard</a>
        <a href="{{ route('blogs.create') }}" class="btn-nav add-btn">+ Add New</a>
    </div>
</div>

<div class="container">

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Blog Details</th>
                    <th>Category</th>
                    <th>Posted On</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <td>
                        <img src="{{ asset('uploads/'.$blog->image) }}" class="blog-img" alt="blog thumbnail">
                    </td>
                    <td>
                        <div style="font-weight: 600; color: #1f2937;">{{ $blog->title }}</div>
                        <div style="font-size: 12px; color: #9ca3af;">{{ Str::limit($blog->short_description, 50) }}</div>
                    </td>
                    <td>
                        <span class="badge">{{ $blog->category }}</span>
                    </td>
                    <td style="color: #6b7280; font-size: 13px;">
                        {{ $blog->created_at->format('M d, Y') }}
                    </td>
                    <td style="text-align: right;">
                        <div class="actions" style="justify-content: flex-end;">
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="action-btn btn-edit">Edit</a>
                            
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

                @if($blogs->isEmpty())
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: #9ca3af;">
                        No blogs found. Click "+ Add New" to get started!
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

</body>
</html>