


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- jquery --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>

    {{-- datatables --}}
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        
        















        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            {{-- <img src="{{ $logo->getFirstMediaUrl('images') }}" height="100px" width="100px"
                                alt="{{ URL::asset('/assets/images/place_holder.jpg') }}"> --}}
                        </div>
        
                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </div>
        
                        <div class="hidden text-decoration-none space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('company-profile.index')" :active="request()->routeIs('company-profile.index')">
                                {{ __('Company') }}
                            </x-nav-link>
                        </div>
                        {{-- <div class="hidden text-decoration-none space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('work-type.index')" :active="request()->routeIs('work-type.index')">
                                {{ __('WorkTypes') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden text-decoration-none space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('expense.index')" :active="request()->routeIs('expense.index')">
                                {{ __('Expense') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden text-decoration-none space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('charts')" :active="request()->routeIs('charts')">
                                {{ __('Charts') }}
                            </x-nav-link>
                        </div> --}}
                    </div>
        
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    {{-- <div>{{ Auth::user()->name }}</div> --}}
        
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
        
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
        
                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        
            <!-- Responsive Navigation Menu -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>
        
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    
        
                   
                </div>
            </div>
        </nav>
        





















        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow text-decoration-none">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 text-decoration-none lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </x-slot>
        
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 float-center" align="center">
                            {{ __("You're logged in! Company") }}
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


    <!-- Footer -->
    <footer class="text-center text-lg-start bg-white text-muted">
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            ©  <script>document.write(new Date().getFullYear())</script> Copyright:
            {{-- <a class="" href="#"> {{ $logo->name }}
            </a> --}}
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>

</html>

