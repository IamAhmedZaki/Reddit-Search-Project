@extends('admin.master.layout')


@section('content')
    <div class=" py-5">
        <div class="container-fluid">
            <h1 class="mb-4">Add Fonts</h1>
            <div class="row">
                <form method="POST" action="{{ route('uploadFont2') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <label> Font Name</label>
                        <input type="text" class="form form-control mb-5" name="font_name" required>
                    </div>
                    <div class="col-md-12">
                        <label>Upload Font</label>
                        <input type="file" name="font_file" required>
                    </div>
                    <div class="col-md-4 mt-5">
                        <button type="submit" class="pinkBtn">Upload Font</button>
                    </div>


            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
