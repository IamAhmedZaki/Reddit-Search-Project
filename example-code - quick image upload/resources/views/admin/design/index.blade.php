@extends('admin.master.layout')


@section('content')
    <div class=" py-5">
        <div class="container-fluid">
            <h1 class="mb-4">All User Design</h1>
            <div class="row">
                <div class="col-md-12">

                    <table class="table ranktable table-striped" id="example">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col">User ID</th>

                                <th class="firstTh" scope="col">User Name</th>
                                <th scope="col">User Email</th>
                                {{-- <th scope="col">Design Link</th> --}}
                                <th scope="col">View Design</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <form method="GET" action="{{ url()->current() }}" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search by name or email..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                        <tbody>
                            @php
                                $index = 0;
                            @endphp

                            @foreach ($designs as $design)
                                @if ($index > 0)
                                    <tr style="text-align: center;">
                                        <td>{{ $design->id }}</td>
                                        <td>{{ $design->design_name }}</td>
                                    
                                        <td>{{ $design->design_email}}</td>
                                        {{-- <td><strong><a href="#"> Link</a></strong></td> --}}
                                        <td>
                                            <a href="view_design/{{ $design->generated_key}}" class="btn btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="edit_design/{{ $design->generated_key}}" class="btn btn-warning">
                                                <span><i class="fas fa-edit"></i></span>
                                            </a>
                                            <a href="delete_design/{{$design->generated_key}}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete?')">
                                                <span style="color: white;"><i class="fa-solid fa-trash"></i></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                                @php
                                    $index++;
                                @endphp
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $designs->appends(['search' => request('search')])->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    
<script>
    // $(document).ready(function() {
    //     //Only needed for the filename of export files.
    //     //Normally set in the title tag of your page.
    //     // DataTable initialisation
    //     $('#example').DataTable({
    //         "dom": '<"dt-buttons"Bf><"clear">lirtp',
    //         "paging": true,
    //         "autoWidth": true,
    //         "buttons": [

    //         ]
    //     });
    // });
</script>
@endsection
