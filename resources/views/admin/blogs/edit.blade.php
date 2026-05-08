<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Blog</title>

    <!-- JQUERY -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- SUMMERNOTE CSS -->

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css"
          rel="stylesheet">

    <!-- SUMMERNOTE JS -->

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            background:#f5f5f5;
            padding:40px;
        }

        .container{
            max-width:900px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        h1{
            margin-bottom:25px;
            color:#0d6efd;
        }

        form{
            display:flex;
            flex-direction:column;
            gap:20px;
        }

        input,
        textarea,
        select{
            width:100%;
            padding:12px;
            border:1px solid #ddd;
            border-radius:6px;
            font-size:16px;
        }

        img{
            border-radius:8px;
            margin-top:10px;
        }

        button{
            background:#0d6efd;
            color:white;
            border:none;
            padding:14px;
            border-radius:6px;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#0b5ed7;
        }

        label{
            font-weight:bold;
            margin-bottom:5px;
            display:block;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Edit Blog</h1>

    <form action="/admin/blogs/{{ $blog->id }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

        <!-- TITLE -->

        <div>

            <label>Title</label>

            <input type="text"
                   name="title"
                   value="{{ $blog->title }}"
                   required>

        </div>

        <!-- CATEGORY -->

        <div>

            <label>Category</label>

            <input type="text"
                   name="category"
                   value="{{ $blog->category }}"
                   required>

        </div>

        <!-- SHORT DESCRIPTION -->

        <div>

            <label>Short Description</label>

            <textarea name="short_description"
                      rows="4"
                      required>{{ $blog->short_description }}</textarea>

        </div>

        <!-- CONTENT -->

        <div>

            <label>Content</label>

            <textarea id="summernote"
                      name="content">{{ $blog->content }}</textarea>

        </div>

        <!-- CURRENT IMAGE -->

        <div>

            <label>Current Image</label>

            <br>

            <img src="{{ asset('uploads/'.$blog->image) }}"
                 width="220">

        </div>

        <!-- NEW IMAGE -->

        <div>

            <label>Upload New Image</label>

            <input type="file"
                   name="image">

        </div>

        <!-- BUTTON -->

        <button type="submit">

            Update Blog

        </button>

    </form>

</div>

<script>

    $(document).ready(function(){

        $('#summernote').summernote({

            placeholder: 'Edit blog content...',

            tabsize: 2,

            height: 350

        });

    });

</script>

</body>
</html>