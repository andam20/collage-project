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
                                    <label for="category" class="col-sm-3 col-form-label">category</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="category" name="category"
                                            value="{{ $expense->category }}" required>
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
                                    <label for="income" class="col-sm-3 col-form-label">Income</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="income" name="income"
                                            value="{{ $expense->income }}" placeholder="it can be empty">
                                    </div>
                                </div>
                                
                                <div class="row mb-4">
                                    <label for="money_returned" class="col-sm-3 col-form-label">Money Returned</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="money_returned" name="money_returned"
                                            value="{{ $expense->money_returned }}" placeholder="it can be empty">
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
                                    <label for="status" class="col-sm-3 col-form-label">status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="status" name="status" required>
                                            <option value="Accepted" @selected(old('status', $expense->status) == 'accept')> accept</option>
                                            <option value="Pending" @selected(old('status', $expense->status) == 'pending')> pending</option>
                                            <option value="Rejected" @selected(old('status', $expense->status) == 'reject')> reject
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="date" class="col-sm-3 col-form-label"> Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="date" name="date"
                                            value="{{ $expense->date }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('translation.car.plate_number')])
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="paid_back" class="col-sm-3 col-form-label">paid back</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="paid_back" name="paid_back" required>
                                            <option value="Paid Back" @selected(old('paid_back', $expense->paid_back) == 'paid_back')> paid back</option>
                                            <option value="Not Paid Back" @selected(old('paid_back', $expense->not_paid_back) == 'not_paid_back')> not paid back</option>
                                            </option>
                                        </select>
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
