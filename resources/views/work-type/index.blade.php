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
            {{ __('Job Title') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-4" id="action_btns">
                        <div class="btn-group mx-3">
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('workTypeExcel') }}">@lang('translation.export')</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-rounded btn-success waves-effect waves-light"
                            data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever=""> Add Job Title</button>
                    </div>
                    <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th> Created At</th>
                                <th> Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <form method="POST" action="{{ route('work-type.store') }}" onsubmit="disableInput()">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">add Name</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="col-form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">close</button>
                                        <button type="submit" class="btn btn-primary subm">submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <form method="POST" action="" id="editFrom" onsubmit="disableInput()">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">edit Name</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name" class="col-form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">close</button>
                                        <button type="submit" class="btn btn-primary subm">submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>

    {{-- datatable init --}}
    <script type="text/javascript">
        $(function() {
            let table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                lengthMenu: [10, 20, 50, 100],
                pageLength: 10,
                scrollX: true,
                order: [
                    [1, "desc"]
                ],
                // text transalations
                language: {
                    search: "search",
                    // lengthMenu: "@lang('translation.lengthMenu1') _MENU_ @lang('translation.lengthMenu2')",
                    processing: "@lang('translation.processing')",
                    // info: "infoShowing) _START_ @lang('translation.infoTo') _END_ @lang('translation.infoOf') _TOTAL_ @lang('translation.infoEntries')",
                    // emptyTable: "@lang('translation.emptyTable')",
                    paginate: {
                        "first": "paginate First",
                        "last": "paginate Last",
                        "next": "paginate Next",
                        "previous": "paginate Previous"
                    },
                },
                ajax: "{{ route('work-type.index') }}",

                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'created_at',
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            })

          

            //add buttons to action_btns
            table.buttons().container()
                .prependTo($('#action_btns'));

            // select dropdown for change the page length
            $('.dataTables_length select').addClass('form-select form-select-sm');

            // add margin top to the pagination and info 
            $('.dataTables_info, .dataTables_paginate').addClass('mt-3');

            let exampleModal = document.getElementById('editModal')
            exampleModal.addEventListener('show.bs.modal', function(event) {
                // Button that triggered the modal
                let button = event.relatedTarget

                document.getElementById('editFrom').action = button.getAttribute('data-bs-url');

                // Update the modal's content.
                let modalTitle = exampleModal.querySelector('.modal-title')
                let modalBodyInput = exampleModal.querySelector('.modal-body input#name')
                modalBodyInput.value = button.getAttribute('data-bs-name')
            })
        });

        function disableInput() {
            $(".subm").prop('disabled', true);
            setInterval(() => {
                $(".subm").prop('disabled', false);
            }, 10000);
        }
    </script>
