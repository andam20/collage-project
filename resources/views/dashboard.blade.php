<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            {{-- <div class="bg-white overflow-hidden shadow-sm">
                <div class="p-6 text-gray-900 float-center" align="center">
                    {{ __("You're logged in! to the  company") }} 
                    <br>
                </div>
            </div> --}}
    <h1 style="font-weight: bold;margin-bottom: 12px" class="text-uppercase bg-white rounded p-4" align="center">{{ $logo->name }}</h1>

        </div>

        <div align="center">
            <a href="">

                @empty($logo)
                    <img src="{{ asset('/assets/images/logo-light.png') }}" alt="" height="19">
                @else
                    <img style="height: 100px;width: 200px" src="{{ getFile($logo, 'images') }}"
                        alt="Generic placeholder image" class="img-fluid col-lg-6 rounded m-4">
                @endempty
            </a>
        </div>
    </div>
</x-app-layout>
