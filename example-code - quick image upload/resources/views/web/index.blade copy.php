<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Costa Carts</title>
    <link rel="stylesheet" href="{{ asset('web/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/bootstrap.min.css') }}">
</head>

<body>

    <!-- Design Tool Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="firstPgModalContent">
                        <label for="" class="form-label">Select a Size</label>
                        <select class="form-select firstPgSelect">
                            <option selected>Select a Size</option>
                            <option value="1">3 x 3 M</option>
                            <option value="2">3 x 4.5 M</option>
                            <option value="3">3 x 6 M</option>
                        </select>
                    </div>
                    <label for="" class="mt-3 mb-1">Selet 2 main colors</label>
                    <div class="colorBox">
                        <div class="controls">
                            <label for="primary">
                                <input class="" type="color" name="" value="#ee0d6e">
                            </label>
                        </div>
                        <div class="secondBlackBox"></div>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('config') }}">
                            <button type="button" class="btn continueBtn" data-bs-dismiss="modal">Continue</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="mainParentBody">
        <div class="firstPageSelection">
            <div class="firstPgHdngBox">
                <span style="display: none"> {{ $user = auth()->user() }}</span>
                <h1 class="firstPgHdng">Hi, {{ $name = $user->name }} what would you like to do?</h1>
            </div>
            <div class="firstPgBtnsBox">
                <div class="firstPgSelectionBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="firstPgIconsBox">
                        <img src="{{ asset('web/img/design.png') }}" alt="" class="firstPgIcons">
                    </div>
                    <h6 class="firstPgIconsTitle">Design a Gazebo</h6>
                </div>
                <div class="firstPgSelectionBtn">
                    <div class="firstPgIconsBox">
                        <img src="{{ asset('web/img/edit.png') }}" alt="" class="firstPgIcons">
                    </div>
                    <h6 class="firstPgIconsTitle">Edit Account</h6>
                </div>
            </div>
            <div class="firstPgBtnsBox">
                <div class="firstPgSelectionBtn">
                    <div class="firstPgIconsBox">
                        <img src="{{ asset('web/img/contact.png') }}" alt="" class="firstPgIcons">
                    </div>
                    <h6 class="firstPgIconsTitle">Contact</h6>
                </div>
                <div class="firstPgSelectionBtn">
                    <div class="firstPgIconsBox">
                        <img src="{{ asset('web/img/logOut.png') }}" alt="" class="firstPgIcons">
                    </div>
                    <h6 class="firstPgIconsTitle">
                        <a href="{{ route('logout_user') }}" style="color: #777777; text-decoration: none;">
                            Logout
                        </a>
                    </h6>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('web/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/script.js') }}"></script>
</body>

</html>
