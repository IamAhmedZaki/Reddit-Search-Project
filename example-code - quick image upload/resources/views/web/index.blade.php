<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>EB Marketing</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/favicon.PNG')}}">
    <link rel="stylesheet" href="{{ asset('web/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/bootstrap.min.css') }}">
    <style>
        input[type="file"] {
            display: block !important;
        }
    </style>
</head>

<body>

    <!-- Design Tool Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="firstPgModalContent">
                        <label for="" class="form-label">Select a Size</label>
                        <select class="form-select firstPgSelect" id="select_size">
                            <option selected disabled>Select a Size</option>
                            <option value="3x3">3 x 3 M</option>
                            <option value="3x4">3 x 4.5 M</option>
                            <option value="3x6">3 x 6 M</option>
                        </select>
                    </div>
                    <label for="" class="mt-3 mb-1">Selet 2 main colors</label>
                    <div class="colorBox">
                        <div class="controls">
                            <label for="primary">
                                <input class="" type="color" name="" value="#ee0d6e" id="firstcolor">
                            </label>
                        </div>
                        <div class="controls">
                            <label for="primary">
                                <input class="" type="color" name="" value="#000000" id="secondcolor">
                            </label>
                        </div>
                    </div>
                    <label for="" class="mt-3 mb-1">Upload Default Image</label>

                    <form id="uploadForm" enctype="multipart/form-data">
                        <input type="file" name="default_image" id="default_image">
                    </form>
                        <label for="" class="mt-3 mb-1">Add Default Text</label>

                        <input type="text" name="default_text" class="form-control"  id="default_text">
                    <div class="text-center">
                        <button type="button" class="btn continueBtn" id="continueButton"
                            data-bs-dismiss="modal">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="mainParentBody">
        <div class="firstPageSelection">
            <div class="firstPgHdngBox">
                <span style="display: none"></span>

                @if (Session::has('user_id_get'))
                    <h1 class="firstPgHdng">Hi, {{ auth()->user()->name }} what would you like to do?</h1>
                @else
                    <h1 class="firstPgHdng">Hi, John what would you like to do?</h1>
                @endif



            </div>

            @if (Session::has('user_id_get'))
                <div class="firstPgBtnsBox">
                    <div class="firstPgSelectionBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="firstPgIconsBox">
                            <img src="{{ asset('web/img/design.png') }}" alt="" class="firstPgIcons">
                        </div>
                        <h6 class="firstPgIconsTitle">
                            Design a Gazebo

                        </h6>
                    </div>
                @else
                    <a href="{{ route('config') }}" style="color: #777777; text-decoration: none;">
                        <div class="firstPgBtnsBox">
                            <div class="firstPgSelectionBtn" data-bs-toggle="modal">
                                <div class="firstPgIconsBox">
                                    <img src="{{ asset('web/img/design.png') }}" alt="" class="firstPgIcons">
                                </div>
                                <h6 class="firstPgIconsTitle">
                                    Design a Gazebo

                                </h6>
                            </div>
                    </a>
            @endif
            <a href="{{ route('profile') }}" style="color: #777777; text-decoration: none;">
                <div class="firstPgSelectionBtn">
                    <div class="firstPgIconsBox">
                        <img src="{{ asset('web/img/user.png') }}" alt="" class="firstPgIcons">
                    </div>
                    <h6 class="firstPgIconsTitle">

                        Dashboard
            </a>
            </h6>
        </div>
        </a>
    </div>
    <div class="firstPgBtnsBox">
        <div class="firstPgSelectionBtn">
            <div class="firstPgIconsBox">
                <img src="{{ asset('web/img/contact.png') }}" alt="" class="firstPgIcons">
            </div>

            <h6 class="firstPgIconsTitle">
                Contact</h6>
        </div>
        <a href="{{ route('logout_user') }}" style="color: #777777; text-decoration: none;">
            <div class="firstPgSelectionBtn">
                <div class="firstPgIconsBox">
                    <img src="{{ asset('web/img/logOut.png') }}" alt="" class="firstPgIcons">
                </div>
                <h6 class="firstPgIconsTitle"> Logout</h6>
            </div>
        </a>
    </div>

    </div>
    </div>

    <script src="{{ asset('web/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('web/script.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#continueButton').on('click', function() {
                // Collect data
                var selectedSize = $('#select_size').val();
                var firstColor = $('#firstcolor').val();
                var secondColor = $('#secondcolor').val();

                // Send AJAX request
                $.ajax({
                    url: "{{ route('homeSizeColor') }}", // Replace with your route
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Include CSRF token
                        size: selectedSize,
                        color1: firstColor,
                        color2: secondColor
                    },
                    success: function(response) {
                        window.location.href = '{{ route('config') }}';
                        // Handle success response
                        console.log('Data saved successfully:', response);
                    },
                    error: function(xhr) {
                        // Handle error response
                        console.error('Error saving data:', xhr.responseText);
                    }
                });
            });
        });


        // let firstSize = '';
        // let mainColor1 = '#ee0d6e';
        // let mainColor2 = '#000000';

        sessionStorage.setItem('mainColor1', mainColor1);
        sessionStorage.setItem('mainColor2', mainColor2);
        $("#select_size").change(function() {
            firstSize = $(this).val();
            sessionStorage.setItem('firstSize', firstSize);
        });

        $("#firstcolor").change(function() {
            mainColor1 = $(this).val();
            sessionStorage.setItem('mainColor1', mainColor1);
        });

        $("#secondcolor").change(function() {
            mainColor2 = $(this).val();
            sessionStorage.setItem('mainColor2', mainColor2);
        });
           $("#default_text").change(function() {
            default_text = $(this).val();
            sessionStorage.setItem('default_text', default_text);
        });
        $('#default_image').on('change', function() {
            var formData = new FormData();
            formData.append('default_image', $('#default_image')[0].files[
                0]); // Append the file to the FormData object
            formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token for security

            $.ajax({
                url: '{{ route('upload_images') }}', // URL to the Laravel route handling the image upload
                type: 'POST',
                data: formData,
                processData: false, // Do not process the data into a query string
                contentType: false, // Do not set content type
                success: function(response) {
                    sessionStorage.setItem('image_url', response.image_url);
                    console.log("response", response);
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });
    </script>


</body>

</html>
