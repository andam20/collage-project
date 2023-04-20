<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold  text-xl text-gray-800 leading-tight">
            {{ __('Create Expense') }}
        </h2>
    </x-slot>


    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-xl-6">
            <div class="card m-2">
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
                    <form class="needs-validation" action="{{ route('expense.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">


                                <div class="row mb-4">
                                    <label for="category" class="col-sm-3 col-form-label">category</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="category" name="category"
                                            value="{{ old('category') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="image" class="col-sm-3 col-form-label">image</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" id="image" name="image"
                                            value="{{ old('image') }}">
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('translation.image')])
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="date" class="col-sm-3 col-form-label">Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="date" name="date"
                                            value="{{ old('date') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="amount" class="col-sm-3 col-form-label">amount</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="amount" name="amount"
                                            value="{{ old('amount') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="income" class="col-sm-3 col-form-label">Income</label>
                                    <div class="col-sm-9">
                                        <input type="number" placeholder="it can be null" class="form-control"
                                            id="income" name="income" value="{{ old('income') }}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="money_returned" class="col-sm-3 col-form-label">money returned</label>
                                    <div class="col-sm-9">
                                        <input type="number" placeholder="it can be null" class="form-control"
                                            id="money_returned" name="money_returned"
                                            value="{{ old('money_returned') }}">
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="company_profile_id" class="col-sm-3 col-form-label">which Employee
                                        :</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="company_profile_id"
                                            name="company_profile_id" required>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('company_profile') ? 'selected' : '' }}>
                                                    {{ $item->first_name }}{{' '}}{{$item->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="description" class="col-sm-3 col-form-label">description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="description" name="description"
                                            value="{{ old('description') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label" for="status">status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="status" name="status" required>
                                            <option value="Accepted" @selected(old('status') == 'accept')>accept</option>
                                            <option value="Rejected" @selected(old('status') == 'reject')>reject</option>
                                            <option value="Pending" @selected(old('status') == 'pending')>pending</option>
                                        </select>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label" for="paid_back">paid back</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="paid_back" name="paid_back" required>
                                            <option value="Paid Back" @selected(old('paid_back') == 'paid_back')>paid back</option>
                                            <option value="Not Paid Back" @selected(old('paid_back') == 'not_paid_back')>not paid back
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button class="btn btn-primary float-end" type="submit">submit</button>
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
    </div>
</x-app-layout>
