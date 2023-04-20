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
            {{ __('Expense List') }}
        </h2>
    </x-slot>


    <div class="row m-2 float-center">
        <div class="col-sm-12 col-md-6">
            <div class="dt-buttons btn-group flex-wrap">
                <a href="{{ route('expense.create') }}"><button class="btn btn-primary buttons-csv buttons-html5"
                        tabindex="0" aria-controls="example1" type="button"><span>Create New
                            expense</span></button></a>
                <p class="m-1"></p>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-2 m-2">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 text-uppercase">
                            amount of all expense
                            <p class="text-muted fw-medium"></p>
                            <h4 class="mb-0">{{ $amount }}</h4>
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
        <div class="col-md-2 m-2">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 text-uppercase">
                            number of expense
                            <p class="text-muted fw-medium"></p>
                            <h4 class="mb-0">{{ $amountCount }}</h4>
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
        <div class="col-md-2 m-2">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 text-uppercase">
                            amount of all income
                            <p class="text-muted fw-medium"></p>
                            <h4 class="mb-0">{{ $income }}</h4>
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
        <div class="col-md-2 m-2">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 text-uppercase">
                            number of incomes
                            <p class="text-muted fw-medium"></p>
                            <h4 class="mb-0">{{ $incomeCount }}</h4>
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

        <div class="col-md-2 m-2">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 text-uppercase">
                            number of rejtes
                            <p class="text-muted fw-medium"></p>
                            <h4 class="mb-0">{{ $reject }}</h4>
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


        <div class="col-md-2 m-2">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 text-uppercase">
                            number of Accepted
                            <p class="text-muted fw-medium"></p>
                            <h4 class="mb-0">{{ $accept }}</h4>
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

        <div class="col-md-2 m-2">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 text-uppercase">
                            number of Pending
                            <p class="text-muted fw-medium"></p>
                            <h4 class="mb-0">{{ $pending }}</h4>
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

        <div class="col-md-2 m-2">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 text-uppercase">
                            no. not paid backs
                            <p class="text-muted fw-medium"></p>
                            <h4 class="mb-0">{{ $not_paid_back }}</h4>
                        </div>
                        <div class="flex-shrink-0 align-self-center">
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

        <div class="col-md-2 m-2">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 text-uppercase">
                            no. paid backs
                            <p class="text-muted fw-medium"></p>
                            <h4 class="mb-0">{{ $paid_back }}</h4>
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
                            <p class="text-muted fw-medium text-uppercase"> top 3 employees with expense
                            </p>
                            @forelse ($topCompanyProfiles as $item)
                                {{ $loop->iteration }} {{ '-' }}
                                {{ $item->first_name }}{{ '(' }}{{ $item->total_expenses }}{{ ' IQD )' }}.
                                <br>

                            @empty
                                {{ 'there is no employee with expenses' }}
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <div class="card m-3">
        <div class="p-2  rounded " style="padding-bottom: 112px">
            <table class="shadow rounded cell-border uk-table uk-table-hover uk-table-striped" id="MyTable">
                <thead class="thead-dark rounded">
                    <tr class=" rounded">
                        <th class="bg-secondary">id</th>
                        <th class="bg-secondary">category</th>
                        <th class="bg-secondary">date</th>

                        <th class="bg-secondary">employee</th>
                        <th class="bg-secondary">amount</th>
                        <th class="bg-secondary">description</th>

                        <th class="bg-secondary">status</th>
                        <th class="bg-secondary">paid back</th>
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
                url: "{{ route('expense.index') }}",
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
                    data: 'category',
                },
                {
                    data: 'date',
                },
                {
                    data: 'company_profile.first_name',
                },
                {
                    data: 'amount',
                },
                {
                    data: 'description',
                },
                {
                    data: 'status',
                },
                {
                    data: 'paid_back',
                },
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
