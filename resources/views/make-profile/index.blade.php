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

    <div class="row m-2 float-center">
        <div class="col-sm-12 col-md-6">
            <div class="dt-buttons btn-group flex-wrap">

                <a href="{{ route('company-profile.create') }}"><button class="btn btn-primary buttons-csv buttons-html5"
                        tabindex="0" aria-controls="example1" type="button"><span>Create New
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
                        <th class="bg-secondary">Name</th>
                        <th class="bg-secondary">Work Type</th>
                        <th class="bg-secondary">Start Date</th>
                        <th class="bg-secondary">Manage</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</x-app-layout>


<script type="text/javascript">
    $(document).ready(function() {
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
                    // d.startDate = $("#start").val();
                    // d.endDate = $("#end").val();
                    // d.modelName = $('#modelName').find(":selected").val();
                    // d.active = $('#active').find(":selected").val();
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
                    data: 'name',
                },
                {
                    data: 'work_type',
                },
                {
                    data: 'start_date',
                },
                {
                    data: 'action',
                    orderable: true,
                    searchable: true
                }
            ],
        });
    });
</script>
