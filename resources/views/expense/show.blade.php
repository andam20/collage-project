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
        {{ __('Show Expense') }}
    </h2>
</x-slot>

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col col-lg-6">
                <div class="card" style="border-radius: .5rem;">
                    <div class="row">
                        <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">

                            {{-- <img src="{{ $imageUrl }}" alt="{{ URL::asset('/assets/images/place_holder.jpg') }}"
                                class="img-fluid my-5 rounded float-end" /> --}}
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6">
                                        <h6>category</h6>
                                        <p class="text-muted">
                                            @foreach ($expenses as $item)
                                                {{ $item->category }}
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6>amount</h6>
                                        <p class="text-muted">
                                            @foreach ($expenses as $item)
                                                {{ $item->amount }}
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6>description</h6>
                                        <p class="text-muted">
                                            @foreach ($expenses as $item)
                                                {{ $item->description }}
                                            @endforeach
                                        </p>
                                    </div>
                                    
                                    <div class="col-6">
                                        <h6>status</h6>
                                        <p class="text-muted">
                                            @foreach ($expenses as $item)
                                                {{ $item->status }}
                                            @endforeach
                                        </p>
                                    </div>
                                    
                                    <div class="col-6">
                                        <h6>paid back</h6>
                                        <p class="text-muted">
                                            @foreach ($expenses as $item)
                                                {{ $item->paid_back }}
                                            @endforeach
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <h6>Date</h6>
                                        <p class="text-muted">
                                            @foreach ($expenses as $item)
                                                {{ $item->date }}
                                            @endforeach
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <h6>Period After Expense:</h6>
                                        <p class="text-muted">
                                            {{ $daysDifference }}
                                        </p>
                                    </div>


                                    <div class="col-6">
                                        <a class="" href="{{ route('expense.edit',$id) }}"><button
                                                class="btn btn-success">
                                                Edit Expense
                                            </button></a>
                                    </div>
                                    <div class="col-6">
                                        <a class="" href="{{ route('expense.index') }}"><button
                                                class="btn  btn-primary">
                                                List of Expenses
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
