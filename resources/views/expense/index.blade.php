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




    <div align="center">

        <div class="row">

            <div class="col-1 m-2" style="padding-top: 20px" align="center">
                <div class="flex-grow-1 text-uppercase">
                    <p class="text-muted fw-medium"></p>
                    <h4 class="mb-0"></h4>
                </div>
            </div>
            <div class="col-3 m-2 card" style="padding-top: 20px" align="center">
                <div class="flex-grow-1 text-uppercase">
                    amount of all expenses
                    <p class="text-muted fw-medium"></p>
                    @empty($amount)
                        {{ "0"}}
                    @else
                        <h4 class="mb-0">{{ $amount }}</h4>
                    @endempty
                </div>
            </div>

            <div class="col-md-3 m-2 card" style="padding-top: 20px" align="center">
                <div class="flex-grow-1 text-uppercase">
                    amount of all income
                    <p class="text-muted fw-medium"></p>
                    @empty($income)
                        {{ "0"}} IQD
                    @else
                        <h4 class="mb-0">{{ $income }} IQD</h4>
                    @endempty
                </div>
            </div>

            <div class="col-md-3 m-2 card" style="padding-top: 20px" align="center">
                <div class="flex-grow-1 text-uppercase">
                    no. paid backs
                    <p class="text-muted fw-medium"></p>
                    <h4 class="mb-0">{{ $paid_back }}</h4>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="col-1 m-2" style="padding-top: 20px" align="center">
                <div class="flex-grow-1 text-uppercase">
                    <p class="text-muted fw-medium"></p>
                    <h4 class="mb-0"></h4>
                </div>
            </div>
            <div class="col-3 m-2 card" style="padding-top: 20px" align="center">
                <div class="flex-grow-1 text-uppercase">
                    number of Accepted
                    <p class="text-muted fw-medium"></p>
                    <h4 class="mb-0">{{ $accept }}</h4>
                </div>
            </div>

            <div class="col-md-3 m-2 card" style="padding-top: 20px" align="center">
                <div class="flex-grow-1 text-uppercase">
                    number of Pending
                    <p class="text-muted fw-medium"></p>
                    <h4 class="mb-0">{{ $pending }}</h4>
                </div>
            </div>

            <div class="col-md-3 m-2 card" style="padding-top: 20px" align="center">
                <div class="flex-grow-1 text-uppercase">
                    number of rejtes
                    <p class="text-muted fw-medium"></p>
                    <h4 class="mb-0">{{ $reject }}</h4>
                </div>
            </div>
        </div>
    </div>




    <div align="center">
        <div class="row">
            @forelse ($topCompanyProfiles as $item)
                <div class="col-md-4">
                    <div class="card mini-stats-wid" style="background-color: #aaa">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1 text-uppercase">
                                    <p class="text-muted fw-medium text-uppercase"> top {{ $loop->iteration }}
                                        employees with expense
                                    </p>

                                    {{ $loop->iteration }} {{ '-' }}
                                    {{ $item->first_name }}{{ '(' }}{{ $item->total_expenses }}{{ ' IQD )' }}.
                                    <br>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- {{ 'there is no employee with expenses' }} --}}
            @endforelse
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
                        {{-- <th class="bg-secondary">employee</th> --}}
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
                // {
                //     data: 'company_profiles',
                // },
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
