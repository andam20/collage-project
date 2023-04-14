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
                    <form class="needs-validation" novalidate
                        action="{{ route('company-profile.update', $companyProfile->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-8">


                                <div class="row mb-4">
                                    <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            value="{{ $companyProfile->first_name }}" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            value="{{ $companyProfile->last_name }}" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="salary" class="col-sm-3 col-form-label">Salary</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="salary" name="salary"
                                            value="{{ $companyProfile->salary }}" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="gender"  class="col-sm-3 col-form-label">gender</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="gender" name="gender" required>
                                            <option value="male" @selected(old('gender', $companyProfile->status) == 'male')> male</option>
                                            <option value="female" @selected(old('gender', $companyProfile->status) == 'female')> female
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="row mb-4">
                                    <label for="work_type_id" class="col-sm-3 col-form-label">Job Title</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="work_type_id"
                                            name="work_type_id" required>
                                            @foreach ($work_types as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('work_type_id', $companyProfile->work_type_id) ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="row mb-4">
                                    <label for="dob" class="col-sm-3 col-form-label">Start Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="start_date" name="start_date"
                                            value="{{ $companyProfile->start_date }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('translation.car.plate_number')])
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="phone_no" class="col-sm-3 col-form-label">Phone number</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="phone_no" name="phone_no"
                                            value="{{ $companyProfile->phone_no }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('translation.car.plate_number')])
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $companyProfile->email }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('translation.car.plate_number')])
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="address" class="col-sm-3 col-form-label">address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $companyProfile->address }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('translation.car.plate_number')])
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="image" class="col-sm-3 col-form-label">image</label>
                                    <div class="col-sm-9">
                                        <input type="file" accept="jpg,png,jpeg,gif,svg" class="form-control"
                                            id="image" name="image" value="{{ old('image') }}">
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('translation.image')])
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="password" class="col-sm-3 col-form-label">password</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="password" name="password"
                                            value="{{ $companyProfile->password }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('translation.car.plate_number')])
                                        </div>
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
    <h4>preview image</h4>
    <div class="images" width="100px" height="100px">
        <img src="{{ $companyProfile->getFirstMediaUrl('images') }}" title="Cover" alt="Cover" width="100px"
            height="100px">
    </div>

</x-app-layout>
