@extends('admin.master.layout')


@section('content')
    <div class=" py-5" id="Form">
        <h1 class="">Edit User</h1>
        <div class="container-fluid pe-5 mt-4">
            <div class="card p-4">
                <form method="POST" action="{{ route('update_user',$user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row p-2">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                    id="">
                                @if ($errors->has('name'))
                                    <span>{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="form-control" required>
                                @if ($errors->has('email'))
                                    <span>{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password (leave blank to keep current
                                    password):</label>
                                <input type="password" value="" name="password" class="form-control" id="">
                                @if ($errors->has('password'))
                                    <span>{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="Active" <?php if ($user->status == 'Active') {
                                        echo 'selected';
                                    } ?>>Active</option>
                                    <option value="Inactive" <?php if ($user->status == 'Inactive') {
                                        echo 'selected';
                                    } ?>>Inactive</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span>{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Phone No.</label>
                                <input type="number" value="{{ $user->phone }}" name="phone" class="form-control"
                                    id="">
                                @if ($errors->has('phone'))
                                    <span>{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Address</label>
                                <input type="text" value="{{ $user->address }}" name="address" class="form-control"
                                    id="">
                                @if ($errors->has('address'))
                                    <span>{{ $errors->first('address') }}</span>
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
