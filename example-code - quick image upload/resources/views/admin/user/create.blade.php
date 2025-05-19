@extends('admin.master.layout')


@section('content')
    <div class=" py-5" id="Form">
        <h1 class="">Create User</h1>
        <div class="container-fluid pe-5 mt-4">
            <div class="card p-4">
                <form method="POST" action="{{ route('store_user') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-2">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="">
                                @if ($errors->has('name'))
                                    <span>{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="">
                                @if ($errors->has('email'))
                                    <span>{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Passowrd</label>
                                <input type="password" name="password" class="form-control" id="">
                                @if ($errors->has('password'))
                                    <span>{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span>{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Role</label>
                                <select class="form-select" name="role">
                                    <option value="Designer">Designer</option>
                                    <option value="Admin">Admin</option>
                                </select>
                                @if ($errors->has('role'))
                                    <span>{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                        </div>

                       
                    </div>
                    <div class="d-flex justify-content-end px-5">
                        <button type="submit" class="btn btn-dark">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
