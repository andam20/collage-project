<x-layout>

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless (count($formFields) == 0)
            <h1></h1>
        @else
            <p>No listings found</p>
        @endunless

    </div>

    <div class="mt-6 p-4">

        @foreach ($formFields as $item)
            <h1 style="color: red;font-size: 60px">
                <span style="color: black">
                    name:</span>
                {{ $item->name }}
            </h1>

            <h1 style="color: red;font-size: 60px">
                <span style="color: black">
                    Comapny:</span>
                {{ $item->user->name }}
            </h1>
        @endforeach

        <span style="color: black;font-size: 60px">
            The employees are :</span>
        @foreach ($company as $item)
            @foreach ($item->company_profiles as $item)
                <h1 style="color: red;font-size: 60px">
                    {{ $item->name }}
                </h1>
            @endforeach
        @endforeach


        <span style="color: black;font-size: 60px">
            The amounts are :</span>
        @foreach ($company as $item)
            @foreach ($item->company_profiles as $item)
               @foreach ($item->expense as $exp)
               <h1 style="color: red;font-size: 60px">
                {{ $exp->amount }}
            </h1>
               @endforeach
            @endforeach
        @endforeach

    </div>
</x-layout>
