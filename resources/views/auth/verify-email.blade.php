<x-guest-layout>
    <div class="mb-0 text-sm text-gray-600">
        <div align="center">
            <h1 style="font-weight: bold;font-size: 150%;margin-bottom: 12px" class="m-2">{{$logo->name}}</h1>
            <a href="/">

                @empty($logo)
                    <img src="{{ asset('/assets/images/logo-light.png') }}" alt="" height="19">
                @else
                    <img style="height: 200px;width: 300px" src="{{ getFile($logo, 'images') }}" alt="Generic placeholder image"
                        class="img-fluid col-lg-6 rounded m-4">
                @endempty
            </a>
        </div>
        {{ __('Thanks for signing up to our employee expense management system! Before getting started, could you verify the email of your company by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>



    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf



            <div>
                <x-primary-button>
                    {{ __('Send Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
