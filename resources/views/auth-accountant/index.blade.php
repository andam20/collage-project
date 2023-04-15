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
        <a class="navbar-brand text-uppercase" style="font-weight: bold;color: red" href="/">
            @foreach ($accountant as $item)
                {{ $item->user->name }}
            @endforeach
        </a>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('acc-profile') }}">Profile </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('acc-employee') }}">All Expenses</a>
                </li>
            </ul>
        </div>
        <div class="mt-6 p-4">
            <form action="{{ route('acc-logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout @forelse ($accountant as $item)
                        {{ $item->name }}
                    @empty
                    @endforelse
                </button>
            </form>

        </div>
    </nav>

    <h3 style="background-color: grey;color: red;padding: 12px" align='center'>
        {{ 'Welcome to your profile page' }}
    </h3>

</body>

</html>
