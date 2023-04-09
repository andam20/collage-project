<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 float-center" align="center">
                    {{ __("You're logged in! For ") }}
                    <br>
                    {{-- <span class="text-dark fw-bold " style="text-bold">{{$logo->name}} </span> --}}
                    Company our slogan is: 
                    {{-- <span class="text-dark fw-bold " style="text-bold">{{$logo->slogan}} </span> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
