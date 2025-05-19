@extends('admin.master.layout')


@section('content')
    <div class=" py-5">
        <div class="container-fluid">
            <h1 class="mb-4">All Fonts</h1>
            <div class="row">
                <a href="{{ route('add_font') }}" style="text-decoration: none;">
                    <button class="pinkBtn mb-3">Add Font</button> </a>
                <div class="col-md-12">

                    <table class="table ranktable table-striped" id="example">
                        <thead>
                            <tr style="text-align: center;">
                                <th class="firstTh"  scope="col"> ID</th>

                                <th scope="col" >Font Name</th>

                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($fonts as $font)
                                <tr style="text-align: center;">
                                    <td>{{ $font->id }}</td>
                                    <td>{{ $font->font_name }}</td>
                                    <td>
                                        <a href="edit-font/{{ $font->id }}" class="btn btn-warning">
                                            <span><i class="fas fa-edit"></i></span>
                                        </a>
                                        <a href="delete-font/{{ $font->id }}" class="btn btn-danger"
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
            $('#example').DataTable({
                "dom": '<"dt-buttons"Bf><"clear">lirtp',
                "paging": true,
                "autoWidth": true,
                "buttons": [

                ]
            });
        });
    </script>
@endsection
