<x-app-layout>

    <x-slot name="header">
        <h2 class="text-decoration-none text-xl text-gray-800 leading-tight">
            {{ __('edit Accountant') }}
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
                    <form class="needs-validation" novalidate action="{{ route('accountant.update', $accountant->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-8">


                                <div class="row mb-4">
                                    <label for="name" class="col-sm-3 col-form-label">name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $accountant->name }}" required>
                                    </div>
                                </div>

                              


                                <div class="row mb-4">
                                    <label for="user_id" class="col-sm-3 col-form-label">Company</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="user_id"
                                            name="user_id" required>
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('user_id', $accountant->user_id) ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="email" class="col-sm-3 col-form-label">email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ $accountant->email }}" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="password" class="col-sm-3 col-form-label">password</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="password" name="password"
                                            value="{{ $accountant->password }}" required>
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
