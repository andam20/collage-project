<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <div class="row row-cols-lg-2">
            <div class="col">
                <div class="container formContainer">
                    <h1 style="color: #F14836;">Welcome Back</h1>
                    <p class="welcome">welcome back! please enter you'r details</p>
                    <form method="POST" id="theForm" class="col col-xl-7 col-lg-8 col-md-11 col-sm-8"
                        action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputEmail1" style="font-weight: bold" class="form-label">Email</label>
                            <input type="email" placeholder="xxx@gmail.com" class="form-control mt-2 text-sm text-red-600 space-y-1" name="email" autocomplete="username" autofocus
                                id="exampleInputEmail1" required aria-describedby="emailHelp">
                                <x-input-error :messages="$errors->get('email')"  />
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                        <div class="mb-1">
                            <label for="exampleInputPassword1" style="font-weight: bold" class="form-label">Password </label>
                            <input type="password" placeholder="strong:up to 8 char, symbol,letter,number.. " class="form-control mt-2 text-sm text-red-600 space-y-1" id="exampleInputPassword1" name="password"
                                required autocomplete="current-password">
                            <x-input-error :messages="$errors->get('password')"/>

                        </div>

                        <div class="mb-3 form-check">
                            <label class="form-check-label" for="exampleCheck1">
                                <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                Remember Me</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    <button type="button" style="font-weight: bold" class="btn btn-link forgotpass">Forgot password? </button>
                                </a>
                            @endif
                        </div>
                        <button type="submit" style="background-color: #F14836;" class="btn text-white col-12 ">Sign in</button>
                    </form>

                    <div class="divhaveAccount">
                        <p class="HA haveAccount" style="color: #F14836;">don't have an account? </p> &nbsp; &nbsp;
                        <button class="btn btn-link haveAccount singUpHere" type="submit">
                            <a href="{{ 'register' }}"  style="color: #F14836;font-weight: bold" class="signUphereLink">Sing-up here</a></button>
                    </div>
                </div>
            </div>
            <div class="col d-none d-lg-block d-md-block">
                <img src="{{ URL::asset('assets/images/mobExp.gif') }}" class="theImage">
            </div>
        </div>
    </div>
</body>

</html>
<style>
    .form-control {
        box-shadow: 5px 5px 12px rgba(85, 81, 80, 0.2);
    }

    .welcome {
        color: grey;
        margin-bottom: 3%;
    }

    .form-check-label {
        font-size: 0.7em;
    }

    .btn-link {
        text-decoration: none;
        color: black;
        font-size: 0.8em;
        font-weight: 500;
    }

    .forgotpass {
        position: relative;
        left: 40%;
    }

    .btn-dark {
        margin-top: 5%;
        margin-bottom: 4%;
    }

    .googleIcon {
        margin-right: 5%;
    }

    .HA {
        margin-left: 2%;
    }

    .haveAccount {
        display: inline;
        font-size: 0.75em;
        color: grey;
    }

    .singUpHere {
        font-size: 0.95em;
        color: black;
        position: relative;
        left: 14%;
    }

    .divhaveAccount {
        margin-top: 2%;
    }

    .formContainer {
        margin-top: 18%;
        margin-left: 15%;
    }

    .theImage {
        border-radius: 0px 10px 10px 0px;
        background-color: pink;
        margin-top: 6%;
        width: 100%;

    }

    .signUphereLink {
        text-decoration: none;
        color: black;
        font-weight: 500;
    }



    @media only screen and (max-width:1400px) {
        .forgotpass {
            left: 30%;
        }

        .singUpHere {
            left: 7%;
        }
    }

    @media only screen and (max-width:1200px) {
        .theImage {
            margin-top: 20%;
        }

        .forgotpass {
            left: 25%;
        }

        .singUpHere {
            left: 4%;
        }
    }

    @media only screen and (max-width:992px) {
        .theImage {
            margin-top: 40%;
        }

        .forgotpass {
            left: 22%;
        }
    }

    @media only screen and (max-width:768px) {
        .forgotpass {
            left: 35%;
        }

        .singUpHere {
            left: 12%;
        }
    }

    @media only screen and (max-width:576px) {
        #theForm {
            width: 250px;
        }

        .container {
            margin-left: 5%;
        }

        .forgotpass {
            left: 16%;
        }

        .singUpHere {
            left: -1.5%;
        }
    }

    @media only screen and (max-width:540px) {
        .container {
            padding-left: 10%;
        }

    }

    @media only screen and (max-width:539px) {
        .container {
            padding-left: 5%;
        }

    }

    @media only screen and (max-width:336px) {
        .singUpHere {
            left: 145px;
            top: -28px;
        }
    }

    @media only screen and (max-width:280px) {
        #theForm {
            width: 230px;
        }

        .container {
            margin-left: -1%;
        }

    }
</style>
