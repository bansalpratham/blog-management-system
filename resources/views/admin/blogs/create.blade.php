<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Blog</title>

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

        .note-editor.note-frame{
            border-radius:8px;
            overflow:hidden;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Add Blog</h1>

    <form action="/admin/blogs"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <!-- TITLE -->

        <div>

            <label>Title</label>

            <input type="text"
                   name="title"
                   placeholder="Enter blog title"
                   required>

        </div>

        <!-- CATEGORY -->

        <div>

            <label>Category</label>

            <select name="category" required>

                <option value="">
                    Select Category
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

        <!-- SHORT DESCRIPTION -->

        <div>

            <label>Short Description</label>

            <textarea name="short_description"
                      rows="4"
                      placeholder="Enter short description"
                      required></textarea>

        </div>

        <!-- CONTENT -->

        <div>

            <label>Content</label>

            <textarea id="summernote"
                      name="content"></textarea>

        </div>

        <!-- IMAGE -->

        <div>

            <label>Upload Image</label>

            <input type="file"
                   name="image"
                   required>

        </div>

        <!-- BUTTON -->

        <button type="submit">

            Add Blog

        </button>

    </form>

</div>

<script>

    $(document).ready(function(){

        $('#summernote').summernote({

            placeholder: 'Write blog content here...',

            tabsize: 2,

            height: 350

        });

    });

</script>

</body>
</html>