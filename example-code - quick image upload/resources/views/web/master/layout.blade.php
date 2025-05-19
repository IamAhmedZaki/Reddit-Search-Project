<!DOCTYPE html>
<html lang="en">

<head>
    

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EB Marketing</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/favicon.PNG')}}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('admin/style.css') }}"> --}}

    <link rel="stylesheet" href="/css/modal.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .table-responsive {
            overflow-x: auto;
            display: block;
        }

        .table td, .table th {
            white-space: nowrap;
        }
    </style>
    <!-- DataTables CSS -->

</head>

<body style="background-color: #f8f9fa;">
    <div class="mainParent">
        <div class="mainParentInner">
            <div class="sidebar" id="sidebar">
                <div class="sideTabBox" id="">
                    <a href="#" class="sidebarCloseBtn" onclick="closeNav()">&times;</a>
                    <div class="tabBoxLogoDiv">
                        {{-- <h3 class=""></h3> --}}
                    </div>
                    <div class="tabBtnsBox">
                        <div class="">
                            <img src="{{ asset('img/EB_Logo.png') }}"
                                style="width: 100px;     margin-bottom: 20px;
    margin-top: -50px;">
                        </div>

                        
                        
                        <div class="tabBtns" onclick="showContent(event, 'Form')">
                            <a href="{{route('revision_design')}}" class="sideBarAnkers">
                                <img src="" alt="" class="tabImg">
                                <p class="tabImgTitle">Revisions <span id="todoCounter" class="badge bg-danger"></span></p>
                            </a>
                        </div>
                        
                        
                        <div class="tabBtns" onclick="showContent(event, 'Form')">
                            <a href="{{ route('your_design') }}" class="sideBarAnkers">
                                <img src="" alt="" class="tabImg">
                                <p class="tabImgTitle">My Designs</p>
                            </a>
                        </div>
                        <div class="tabBtns" onclick="showContent(event, 'Form')">
                            <a href="{{ route('all_design') }}" class="sideBarAnkers">
                                <img src="" alt="" class="tabImg">
                                <p class="tabImgTitle">All Designs</p>
                            </a>
                        </div>
                        <div class="tabBtns" onclick="showContent(event, 'Form')">
                            <a href="{{ route('index') }}" class="sideBarAnkers">
                                <img src="" alt="" class="tabImg">
                                <p class="tabImgTitle">Configurator</p>
                            </a>
                        </div>

               


                        <div class="tabBtns" onclick="showContent(event, 'Form')">
                            <a href="{{ route('fonts') }}" class="sideBarAnkers">
                                <img src="" alt="" class="tabImg">
                                <p class="tabImgTitle">Fonts</p>
                            </a>
                        </div>
                        @if (auth()->user()->role == 'Admin')
                            <div class="tabBtns">
                                <a href="{{ route('admin_usres') }}" class="sideBarAnkers">
                                    <img src="" alt="" class="tabImg">
                                    <p class="tabImgTitle">Users</p>
                                </a>
                            </div>
                        @endif
                        <div class="tabBtns" onclick="showContent(event, 'Form')">
                            <a href="{{ route('profile') }}" class="sideBarAnkers">
                                <img src="" alt="" class="tabImg">
                                <p class="tabImgTitle">My Profile</p>
                            </a>
                        </div>
                        <div class="tabBtns" onclick="showContent(event, 'Form')">
                            <a href="{{ route('send.email.form') }}" class="sideBarAnkers">
                                <img src="" alt="" class="tabImg">
                                <p class="tabImgTitle">Send Email</p>
                            </a>
                        </div>
                        <div class="" onclick="showContent(event, 'Form')">
                            <a href="{{ route('logout_admin') }}" class="sideBarAnkers">
                                <img src="{{ asset('img/sign-out.png') }}" alt="" class="tabImg" style="    width: 50px;">
                                {{-- <p class="tabImgTitle">Logout</p> --}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-overlay" id="overlay" onclick="closeNav()"></div>

            <div class="dashContentBox">
                <span class="sidebarOpenBtn" onclick="openNav()">&#9776; Open</span>

                @yield('content')







            </div>

        </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script> <!-- DataTables JS -->

    <script src="{{ asset('admin/script.js') }}"></script>
    <script>
       document.addEventListener("DOMContentLoaded", function () {
        function updateTodoCounter() {
            fetch("/get-incomplete-task")
            .then(response => response.json())
            .then(data => {
                document.getElementById("todoCounter").textContent = data.count;
            })
            .catch(error => console.error("Error fetching incomplete todos count:", error));
    }

    updateTodoCounter(); // Call function on page load
});

    </script>
    @yield('script')
</body>

</html>
