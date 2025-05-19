<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>EB Marketing</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/favicon.PNG')}}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logout-btn {
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .table-container {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        {{-- <a href="{{ route('admin_logout_2') }}">
        <button type="button" class="btn btn-danger logout-btn"
           >
            Logout
        </button>
        </a> --}}
      

        <div class="table-container">
            <table id="userTable" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->status }}</td>
                            <td>
                                <a href="{{ route('edit_user', $user->id) }}"><button
                                        class="btn btn-primary btn-sm">Edit</button></a>
                                <a href="{{ route('delete_user', $user->id) }}"
                                    onclick="return confirm('Are you sure?')"><button
                                        class="btn btn-danger btn-sm">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });

     
    </script>

</body>

</html>
