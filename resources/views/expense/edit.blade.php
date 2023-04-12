<x-app-layout>

    <x-slot name="header">
        <h2 class="text-decoration-none text-xl text-gray-800 leading-tight">
            {{ __('edit Employee') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="needs-validation" novalidate action="{{ route('expense.update', $expense->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-8">


                                <div class="row mb-4">
                                    <label for="title" class="col-sm-3 col-form-label">title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $expense->title }}" required>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label for="company_profile_id" class="col-sm-3 col-form-label">Employee</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="company_profile_id"
                                            name="company_profile_id" required>
                                            @foreach ($company as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('company_profile_id', $expense->company_profile_id) ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="amount" class="col-sm-3 col-form-label">amount</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="amount" name="amount"
                                            value="{{ $expense->amount }}" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="category" class="col-sm-3 col-form-label">category</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="category" name="category"
                                            value="{{ $expense->category }}" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="description" class="col-sm-3 col-form-label">description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="description" name="description"
                                            value="{{ $expense->description }}" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="place" class="col-sm-3 col-form-label">place</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="place" name="place"
                                            value="{{ $expense->place }}" required>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button class="btn btn-primary" type="submit">submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
