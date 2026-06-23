<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body style="font-family: Arial; background:#f3f4f6;">

<div style="
width:400px;
margin:100px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
">

    <h1 style="text-align:center;">Login Admin</h1>

    @if(session('error'))
        <div style="
            background:red;
            color:white;
            padding:10px;
            margin-bottom:15px;
        ">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <div style="margin-bottom:15px;">
            <label>Email</label>

            <input
                type="email"
                name="email"
                required
                style="
                    width:100%;
                    padding:10px;
                    margin-top:5px;
                "
            >
        </div>

        <div style="margin-bottom:15px;">
            <label>Password</label>

            <input
                type="password"
                name="password"
                required
                style="
                    width:100%;
                    padding:10px;
                    margin-top:5px;
                "
            >
        </div>

        <button
            type="submit"
            style="
                width:100%;
                padding:12px;
                background:black;
                color:white;
                border:none;
                cursor:pointer;
            "
        >
            Login
        </button>

    </form>

</div>

</body>
</html>