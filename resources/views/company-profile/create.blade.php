<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold  text-xl text-gray-800 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>


    <div class="col-lg-12" align="end">
        {{-- <a href="{{ route('work-type.create') }}">
            <button style="margin-right: 22px;margin-top: 22px;" type="button"
                class="btn btn-rounded btn-success waves-effect waves-light" data-bs-toggle="modal"
                data-bs-target="#exampleModal" data-bs-whatever=""> Add Job Title</button></a> --}}
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-xl-6">
            @forelse ($job_titles as $item)
            @empty
                <h3 class="bg-red" style="color: red"> {{ 'Plese add a Job Title' }} </h3>
            @endforelse
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
                    <form class="needs-validation" action="{{ route('company-profile.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row mb-4">
                                    <label for="first_name" class="col-sm-3 col-form-label">first name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            value="{{ old('first_name') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="last_name" class="col-sm-3 col-form-label">last name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            value="{{ old('last_name') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="salary" class="col-sm-3 col-form-label">salary</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="salary" name="salary"
                                            value="{{ old('last_name') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label" for="gender">gender</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="gender" name="gender" required>
                                            <option value="male" @selected(old('gender') == 'male')>male</option>
                                            <option value="female" @selected(old('gender') == 'female')>female</option>
                                        </select>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4" style="display: none;">
                                    <label for="user" class="col-sm-3 col-form-label">Company</label>
                                    <div class="col-sm-9">
                                        <input type="text" hide class="form-control" id="user" name="user"
                                            value="{{ $users->id }}" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="job_title" class="col-sm-3 col-form-label">Job title</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="job_title" name="job_title" required>
                                            @foreach ($job_titles as $job_title)
                                                <option value="{{ $job_title->name }}"
                                                    {{ $job_title->name == old('job_title', []) ? 'selected' : '' }}>
                                                    {{ $job_title->name }}</option>
                                            @endforeach
                                        </select>
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
                                    <label for="start_date" class="col-sm-3 col-form-label">Start Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="start_date" name="start_date"
                                            value="{{ old('start_date') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="row mb-4">
                                    <label for="desc" class="col-sm-3 col-form-label">description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="desc" name="desc"
                                            value="{{ old('desc') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="row mb-4">
                                    <label for="dob" class="col-sm-3 col-form-label">Birthdate</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="dob" name="dob"
                                            value="{{ old('dob') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row mb-4">
                                    <label for="phone_no" class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="phone_no" name="phone_no"
                                            value="{{ old('phone_no') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row mb-4">
                                    <label for="salary" class="col-sm-3 col-form-label">salary</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="salary" name="salary"
                                            value="{{ old('salary') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row mb-4">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ old('address') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="password" class="col-sm-3 col-form-label">password</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="password" name="password"
                                            value="{{ old('password') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
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
