<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
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
                    <h1 style="color: #F14836;">Welcome</h1>
                    <p class="welcome">welcome! please enter you'r details</p>                        
                        <form id="theForm" class="col col-xl-7 col-lg-8 col-md-11 col-sm-8" method="POST"
                            action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputEmail1" style="font-weight: bold" class="form-label">Name</label>
                                <input type="Text" name="name" placeholder="meta company"  value="{{old('name')}}" class="form-control" id="exampleInputEmail1">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" style="font-weight: bold" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="xxx@gmail.com"
                                    aria-describedby="emailHelp" name="email" value="{{ old('email') }}" required
                                    autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>

                            <div class="row mb-4 mt-4 borderd">
                                <label for="image" style="font-weight: bold" class="form-label">Logo</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" id="image" name="image"
                                        value="{{ old('image') }}">
                                </div>
                            </div>

                            <!-- slogan -->
                            <div class="mt-4">
                                <label for="slogan" style="font-weight: bold" class="col-sm-3 col-form-label">Slogan</label>
                                <input id="slogan" placeholder="we are the best!" class="block mt-1 w-full form-control" type="text"
                                    name="slogan" value="{{ old('slogan') }}" required />
                                <x-input-error :messages="$errors->get('slogan')" class="mt-2" />
                            </div>

                            <!-- Start Date -->
                            <div class="mt-4">
                                <x-input-label for="start_date" style="font-weight: bold" :value="__('Start date')" />
                                <x-text-input id="start_date" class="block mt-1 w-full form-control" type="date"
                                    name="start_date" :value="old('start_date')" required />
                                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                            </div>
                            <br>


                            <div class="mb-3">
                                <label for="exampleInputPassword1" style="font-weight: bold" class="form-label">Password</label>
                                <input type="password" placeholder="strong:up to 8 char, symbol,letter,number.. " class="form-control" name="password" id="exampleInputPassword1">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" name="password" required
                                    autocomplete="new-password" />
                            </div>

                            <div class="mb-1">
                                <label for="exampleInputPassword2" style="font-weight: bold" class="form-label">Password Confiramtion</label>
                                <input type="password" name="password_confirmation" required autocomplete="new-password"
                                    class="form-control" id="exampleInputPassword2">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            {{-- <div class="mb-1">
                                <label for="role" style="font-weight: bold" class="form-label">Choose The Role</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" id="role" name="role" required>
                                        <option value="top_admin" @selected(old('role') == 'top_admin')>Top Admin</option>
                                        <option value="comapny" @selected(old('role') == 'comapny')>Company Owner</option>
                                        <option value="hr" @selected(old('role') == 'hr')>Human Resources</option>
                                    </select>
                                </div>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div> --}}


                            <div class="mb-3 form-check">
                                <button type="button" class="btn btn-link forgotpass "><a class="signUphereLink"
                                    style="color: #F14836; font-weight: bold"  href="{{ route('login') }}">Already Registered </a></button>
                            </div>

                            <button type="submit" style="background-color: #F14836;font-weight: bold" class="btn mb-3 col-12 text-white">Sign Up</button>
                        </form>
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
    .container {
        margin-top: -70px;

    }

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
        left: 60%;
    }

    .btn-dark {
        margin-top: 5%;
        margin-bottom: 4%;
    }

    .googleIcon {
        margin-right: 5%;
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
