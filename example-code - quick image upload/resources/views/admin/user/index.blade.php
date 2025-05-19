@extends('admin.master.layout')


@section('content')
    <div class=" py-5">
        <div class="container-fluid">
            <h1 class="mb-4">All Users</h1>
            <a href="{{ route('create_users') }}">
                <button class="btn btn-danger">Create User</button>
            </a>
            <div class="row">
                <div class="col-md-12">

                    <table class="table ranktable table-striped" id="userTable">
                        <thead>
                            <tr style="text-align: center;">
                                <th  scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr style="text-align: center;">
                                    <td><span class="rankbadge rankbadge-success"></span>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('edit_users', $user->id) }}" class="btn btn-warning">
                                            <span><i class="fa-sharp fa-solid fa-user-pen"></i></span>
                                        </a>
                                        <a href="{{ route('delete_user', $user->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete?')">
                                            <span style="color: white;"><i class="fa-solid fa-trash"></i></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            //Only needed for the filename of export files.
            //Normally set in the title tag of your page.
            // DataTable initialisation
            $('#userTable').DataTable({
                "dom": '<"dt-buttons"Bf><"clear">lirtp',
                "paging": true,
                "autoWidth": true,
                "buttons": [

                ]
            });
        });
    </script>
@endsection
