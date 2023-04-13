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
                <a href="{{ route('expense.create') }}"><button
                        class="btn btn-primary buttons-csv buttons-html5" tabindex="0" aria-controls="example1"
                        type="button"><span>Create New
                            expense</span></button></a>
                <p class="m-1"></p>
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
                    data: 'company_profile.name',
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