<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EB-Marketing -Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            /*   background: linear-gradient(90deg, hsla(213, 77%, 14%, 1) 0%, hsla(202, 27%, 45%, 1) 100%); */
            background-color: #4158D0;
            background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);

            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Ubuntu', sans-serif;
            height: 100vh;
            margin: -20px 0 50px;
        }

        h1 {
            font-weight: 700;
            margin: 0;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 10px;
            letter-spacing: 0.5px;
            margin: 10px 0 10px;
            text-align: left;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #273342;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        button {
            border-radius: 8px;
            background: linear-gradient(90deg, hsla(213, 77%, 14%, 1) 0%, hsla(202, 27%, 45%, 1) 100%);
            border: 1px solid linear-gradient(90deg, hsla(213, 77%, 14%, 1) 0%, hsla(202, 27%, 45%, 1) 100%);
            color: #FFFFFF;
            font-size: 12px;
            font-weight: 700;
            padding: 18px 45px;
            letter-spacing: 1px;
            text-transform: capitalize;
            transition: transform 80ms ease-in;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 18px 15px;
            margin: 8px 0;
            width: 100%;
            border-radius: 8px;
        }

        .main {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 868px;
            max-width: 100%;
            min-height: 520px;
        }

        .form-main {
            /* position: absolute; */
            top: 0;
            height: 100%;
        }

        .login-box {
            left: 0;
            width: 100%;
            z-index: 2;
        }






        .social-main {
            margin: 30px 0;
        }

        .social-main a {
            border: 1px solid #DDDDDD;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="form-main login-box">
            <form action="{{route('admin_login')}}" method="POST">
                @csrf
                <h1>Login</h1>
                <input type="email" name="email" required placeholder="Email" />
                <input type="password" name="password" required placeholder="Password" />
                <button type="submit">Log In</button>
            </form>
        </div>

    </div>
</body>

</html>
