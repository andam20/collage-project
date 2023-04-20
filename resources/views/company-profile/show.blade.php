<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold  text-xl text-gray-800 leading-tight">
            {{ __('Show Company') }}
        </h2>
    </x-slot> --}}

    <style>
        .gradient-custom {
            background: hsla(196, 100%, 44%, 1);

            background: linear-gradient(90deg, hsla(196, 100%, 44%, 1) 0%, hsla(167, 67%, 67%, 1) 100%, hsla(331, 58%, 60%, 1) 100%);

            background: -moz-linear-gradient(90deg, hsla(196, 100%, 44%, 1) 0%, hsla(167, 67%, 67%, 1) 100%, hsla(331, 58%, 60%, 1) 100%);

            background: -webkit-linear-gradient(90deg, hsla(196, 100%, 44%, 1) 0%, hsla(167, 67%, 67%, 1) 100%, hsla(331, 58%, 60%, 1) 100%);

            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr="#00A6E2", endColorstr="#71E3CA", GradientType=1);
        }
    </style>

    <x-slot name="header">
        <h2 class="text-decoration-none text-xl text-gray-800 leading-tight">
            {{ __('Show Employee') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col col-lg-6">
                <div class="card" style="border-radius: .5rem;">
                    <div class="row">
                        <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">

                            <img src="{{ $imageUrl }}" alt="{{ URL::asset('/assets/images/place_holder.jpg') }}"
                                class="img-fluid my-5 rounded float-end" />
                            <h5 class="text-uppercase">
                                @foreach ($companies as $item)
                                    {{ $item->first_name }}{{' '}}{{$item->last_name}}
                                @endforeach
                            </h5>
                            <p>
                                @foreach ($companies as $item)
                                    {{ $item->work_type }}
                                @endforeach
                            </p>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6">
                                        <h6>First Name</h6>
                                        <p class="text-muted">
                                            @foreach ($companies as $item)
                                                {{ $item->first_name }}
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6>Last Name</h6>
                                        <p class="text-muted">
                                            @foreach ($companies as $item)
                                                {{ $item->last_name }}
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6>Start Date</h6>
                                        <p class="text-muted">
                                            @foreach ($companies as $item)
                                                {{ $item->start_date }}
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6>Phone</h6>
                                        <p class="text-muted">
                                            @foreach ($companies as $item)
                                                {{ $item->phone_no }}
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6>Email</h6>
                                        <p class="text-muted">
                                            @foreach ($companies as $item)
                                                {{ $item->email }}
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6>Address</h6>
                                        <p class="text-muted">
                                            @foreach ($companies as $item)
                                                {{ $item->address }}
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6>password</h6>
                                        <p class="text-muted">
                                            @foreach ($companies as $item)
                                                {{ $item->password }}
                                            @endforeach
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <h6>Period After Work:</h6>
                                        <p class="text-muted">
                                            {{ $daysDifference }}
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <h6>Expenses with category:</h6>
                                        <p class="text-muted">
                                            @forelse ($item->expense as $expense)
                                                <h6>
                                                    {{ $loop->iteration }}{{ '- ' }}
                                                    {{ $expense->category }}</h6>
                                            @empty
                                                {{ 'No Expense Yet' }}
                                            @endforelse
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <h6>Job Title</h6>
                                        <p class="text-muted">{{ $item->job_title }}</p>
                                    </div>
                                    <div class="col-6">
                                        <h6></h6>
                                        <p class="text-muted"></p>
                                    </div>
                                    <div class="col-6">
                                        <a class="" href="{{ route('company-profile.edit', $id) }}"><button
                                                class="btn btn-success">
                                                Edit Employees
                                            </button></a>
                                    </div>
                                    <div class="col-6">
                                        <a class="" href="{{ route('company-profile.index') }}"><button
                                                class="btn  btn-primary">
                                                List of Employees
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
