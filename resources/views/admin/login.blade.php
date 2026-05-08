<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#f5f5f5;
        }

        .login-box{
            width:350px;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        h2{
            margin-bottom:20px;
            text-align:center;
        }

        input{
            width:100%;
            padding:12px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            background:black;
            color:white;
            cursor:pointer;
            border-radius:5px;
        }

        .error{
            color:red;
            margin-bottom:10px;
        }

    </style>

</head>

<body>

<div class="login-box">

    <h2>Admin Login</h2>

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/admin/login">

        @csrf

        <input type="email" name="email" placeholder="Enter Email">

        <input type="password" name="password" placeholder="Enter Password">

        <button type="submit">Login</button>

    </form>

</div>

</body>
</html>