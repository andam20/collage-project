<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <title>Accountant</title>
</head>

<body>





    <nav class="navbar navbar-expand-lg navbar-light bg-light " style="padding-left: 22px">
        <a class="navbar-brand text-uppercase" style="font-weight: bold;color: red" href="">
            @foreach ($accountant as $item)
                {{ $item->user->name }}
            @endforeach
        </a>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('acc-profile') }}">Profile</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('acc-employee') }}">All Expenses</a>
                </li>
            </ul>
        </div>
        <div class="mt-6 p-4">
            <form action="{{ route('acc-logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout
                    @forelse ($accountant as $item)
                        {{ $item->name }}
                    @empty
                    @endforelse
                </button>
            </form>

        </div>
    </nav>

    <section class="vh-100" style="background-color: grey;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-md-9 col-lg-7 col-xl-5">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                        alt="Generic placeholder image" class="img-fluid"
                                        style="width: 180px; border-radius: 10px;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1"></h5>
                                    <p class="mb-2 pb-1 text-uppercase" style="color: #2b2a2a;font-weight: bold">
                                        @foreach ($accountant as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </p>
                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                        style="background-color: #efefef;">
                                        <div>
                                            <p class="small text-muted mb-1">email</p>
                                            <p class="mb-0">
                                                @foreach ($accountant as $item)
                                                    {{ $item->email }}
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="px-3">
                                            <p class="small text-muted mb-1">password</p>
                                            <p class="mb-0">  @foreach ($accountant as $item)
                                                {{ $item->password }}
                                            @endforeach</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>
