<x-app-layout>
    <style>
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            margin: 13px
        }

        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            padding-right: 24px;
        }
    </style>

    <x-slot name="header">
        <h2 class="text-decoration-none text-xl text-gray-800 leading-tight">
            {{ __('Employee List') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-3 m-2">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 text-uppercase">
                            number of total employees
                            <p class="text-muted fw-medium"></p>
                            <h4 class="mb-0">{{ $count }} employee</h4>
                        </div>
                        <div class="flex-shrink-0 align-self-center">
                            {{-- <a href="{{ route('') }}"> --}}
                            <a>
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-3 m-2">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 text-uppercase">
                            number of Male employees
                            <p class="text-muted fw-medium"></p>
                            <h4 class="mb-0">{{ $countMale }} employee</h4>
                        </div>
                        <div class="flex-shrink-0 align-self-center">
                            {{-- <a href="{{ route('') }}"> --}}
                            <a>
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 m-2">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 text-uppercase">
                            number of FeMale employees
                            <p class="text-muted fw-medium"></p>
                            <h4 class="mb-0">{{ $countFemale }} employee</h4>
                        </div>
                        <div class="flex-shrink-0 align-self-center">
                            {{-- <a href="{{ route('') }}"> --}}
                            <a>
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     {{-- filter --}}
     {{-- <div class="d-flex justify-content-start mb-4">
        <div class="m-4">
            <label>Select The Date Range for Start Date </label>
            <div class="input-daterange input-group" id="datepicker" data-date-format="yyyy-m-d"
                data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker'>
                <input type="text" class="form-control" id="start" name="startDate"
                    placeholder=from onchange="dataChanged()" />
                <input type="text" class="form-control" id="end" name="endDate"
                    placeholder=To onchange="dataChanged()" />
            </div>
        </div>

        <div class="m-4">
            <label>filter gender</label>
            <select class="form-select" id="gender" name="gender" onchange="dataChanged()">
                <option value="" selected>gedner</option>
                @forelse ($gender as $item)
                    @if ($item->gender == 'male')
                        <option value="{{ $item->gender }}">{{ 'male' }}</option>
                    @endif
                    @if ($item->gender == 'female')
                        <option value="{{ $item->gender }}">{{ 'female' }}</option>
                    @endif
                @empty
                    <option value="">@lang('translation.none')</option>
                @endforelse
            </select>
        </div>
    </div> --}}



    <div class="row m-2 float-center">
        <div class="col-sm-12 col-md-6">
            <div class="dt-buttons btn-group flex-wrap">

                <a href="{{ route('company-profile.create') }}"><button
                        class="btn btn-primary buttons-csv buttons-html5" tabindex="0" aria-controls="example1"
                        type="button"><span>Create New
                            Employee</span></button></a>
                <p class="m-1"></p>
                <a href="{{ route('companyProfileExcel') }}"> <button
                        class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1"
                        type="button"><span>Export</span></button></a>
            </div>
        </div>
    </div>




    <div class="card m-3">
        <div class="p-2  rounded " style="padding-bottom: 112px">
            <table class="shadow rounded cell-border uk-table uk-table-hover uk-table-striped" id="MyTable">
                <thead class="thead-dark rounded">
                    <tr class=" rounded">
                        <th class="bg-secondary">id</th>
                        <th class="bg-secondary">image</th>
                        <th class="bg-secondary">First Name</th>
                        <th class="bg-secondary">Last Name</th>
                        <th class="bg-secondary">Salary</th>
                        <th class="bg-secondary">Gender</th>
                        <th class="bg-secondary">Start Date</th>
                        <th class="bg-secondary">phone number</th>
                        <th class="bg-secondary">email</th>
                        <th class="bg-secondary">address</th>
                        {{-- <th class="bg-secondary">password</th> --}}
                        <th class="bg-secondary">Manage</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</x-app-layout>



<script type="text/javascript">
    $(document).ready(function() {
        function dataChanged() {
            table.draw();
        }
        getParameter = (key) => {

address = window.location.search

parameterList = new URLSearchParams(address)

return parameterList.get(key)
}
        var table = $('#MyTable').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [10, 20, 50, 100],
            pageLength: 10,
            payment: [
                [7, "desc"]
            ],
            ajax: {
                url: "{{ route('company-profile.index') }}",
                method: "GET",
                data: function(d) {
                    d.startDate = $("#start").val();
                    d.endDate = $("#end").val();
                    // d.modelName = $('#modelName').find(":selected").val();
                    d.gender = $('#gedner').find(":selected").val();
                }
            },
            columns: [{
                    data: 'id',
                },
                {
                    data: 'image',
                    render: function(data, type, row) {
                        return `<img src="${data}" class="rounded float-center border border-warning shadow height="10px" align="center" width="100" height="100"/>`;
                    }
                },
                {
                    data: 'first_name',
                },
                {
                    data: 'last_name',
                },
                {
                    data: 'salary',
                },
                {
                    data: 'gender',
                },
                {
                    data: 'start_date',
                },
                {
                    data: 'phone_no',
                },
                {
                    data: 'email',
                },
                {
                    data: 'address',
                },
                // {
                //     data: 'password',
                // },
                {
                    data: 'action',
                    orderable: true,
                    searchable: true
                }
            ],
        });
        $("#datepicker").datepicker();

    });
</script>

@section('script') 
    <!-- Required datatable js -->
   <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>


<script type="text/javascript">

    $(document).ready(function() {
        function dataChanged() {
            table.draw();
        }





    });

    </script>
@endsection