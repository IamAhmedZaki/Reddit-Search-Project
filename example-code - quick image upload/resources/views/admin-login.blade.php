<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Collectiononthedrive-Login</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        section {
            position: relative;
            min-height: 100vh;
            background-color: #3D0605;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        section .container {
            position: relative;
            width: 800px;
            height: 500px;
            background: #fff;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        section .container .user {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
        }

        section .container .user .imgBx {
            position: relative;
            width: 50%;
            height: 100%;
            background: #ff0;
            transition: 0.5s;
        }

        section .container .user .imgBx img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        section .container .user .formBx {
            position: relative;
            width: 50%;
            height: 100%;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            transition: 0.5s;
        }

        section .container .user .formBx form h2 {
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-align: center;
            width: 100%;
            margin-bottom: 10px;
            color: #555;
        }

        section .container .user .formBx form input {
            position: relative;
            width: 100%;
            padding: 10px;
            background: #f5f5f5;
            color: #333;
            border: none;
            outline: none;
            box-shadow: none;
            margin: 8px 0;
            font-size: 14px;
            letter-spacing: 1px;
            font-weight: 300;
        }

        section .container .user .formBx form input[type='submit'] {
            max-width: 100px;
            background: #677eff;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 1px;
            transition: 0.5s;
        }

        section .container .user .formBx form .signup {
            position: relative;
            margin-top: 20px;
            font-size: 12px;
            letter-spacing: 1px;
            color: #555;
            text-transform: uppercase;
            font-weight: 300;
        }

        section .container .user .formBx form .signup a {
            font-weight: 600;
            text-decoration: none;
            color: #677eff;
        }

        section .container .signupBx {
            pointer-events: none;
        }

        section .container.active .signupBx {
            pointer-events: initial;
        }

        section .container .signupBx .formBx {
            left: 100%;
        }

        section .container.active .signupBx .formBx {
            left: 0;
        }

        section .container .signupBx .imgBx {
            left: -100%;
        }

        section .container.active .signupBx .imgBx {
            left: 0%;
        }

        section .container .signinBx .formBx {
            left: 0%;
        }

        section .container.active .signinBx .formBx {
            left: 100%;
        }

        section .container .signinBx .imgBx {
            left: 0%;
        }

        section .container.active .signinBx .imgBx {
            left: -100%;
        }

        @media (max-width: 991px) {
            section .container {
                max-width: 400px;
            }

            section .container .imgBx {
                display: none;
            }

            section .container .user .formBx {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <body>
        <section>
            <div class="container">
                <div class="user signinBx">

                    <div class="formBx">
                        <form action="{{ route('admin_login') }}" method="POST">
                            @csrf
                            <h2>Sign In</h2>
                            <input type="email" name="email" placeholder="Email" />
                            <input type="password" name="password" placeholder="Password" />
                            <input type="submit" name="" value="Login" />

                        </form>
                    </div>
                </div>

            </div>
        </section>
    </body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
    
        @if (Session::has('success'))

            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('error'))
    
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif
        const toggleForm = () => {
            const container = document.querySelector('.container');
            container.classList.toggle('active');
        };
    </script>
</body>

</html>
