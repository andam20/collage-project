<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold  text-xl text-gray-800 leading-tight">
            {{ __('Create Accountant') }}
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
                    <form class="needs-validation" action="{{ route('accountant.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">


                                <div class="row mb-4">
                                    <label for="name" class="col-sm-3 col-form-label">name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}" required>
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
                                    <label for="email" class="col-sm-3 col-form-label">email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}" required>
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

                                <div class="row mb-4" style="display: none;">
                                    <label for="user_id" class="col-sm-3 col-form-label">Company</label>
                                    <div class="col-sm-9">
                                         <input type="text" hide class="form-control" id="user_id" name="user_id"
                                            value="{{ $users->id}}" required>
                                        {{-- <select class="form-control select2" id="user" name="user" required>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->id == old('user', []) ? 'selected' : '' }}>
                                                    {{ $user->name }}</option>
                                            @endforeach
                                        </select> --}}
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
