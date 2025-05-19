<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Costa Carts</title>
    <link rel="stylesheet" href="{{ asset('web/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/fabric@5.0.0/dist/fabric.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .pickr .pcr-button {
            border: 2px solid #000000;
            padding: 20px;
            margin: 10px;
        }

        .addText_canvas {
            padding: 5px 10px;
            margin: 10px 5px;
            width: 100%;
        }

        .btn_delete_selected {
            position: relative;
            left: 325px;
            display: inline-block;
            font-weight: 400;
            font-family: inherit;
            color: #ffffff;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            background-color: #23272b;
            border-color: #1d2124;
            border-radius: 50px;
        }

        .btn_save_design {
            display: inline-block;
            font-weight: 400;
            color: #ffffff;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: #df097b;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 50px;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            float: right;
            position: relative;
            left: 335px;
        }

        .canvas-container {
            position: relative;
            /* width: 400px;
            height: 250px; */
            /* background-color: #df097b; */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            /*  clip-path: polygon(50% 0%, 0% 100%, 100% 100%); */
        }

        .canvas-container canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* clip-path: polygon(50% 0%, 0% 100%, 100% 100%); */
        }

        .canvas-container.canvasTop {
            clip-path: polygon(49% 100%, 100% 0, 0 0);
        }

        .canvas-container.canvasRight {
            clip-path: polygon(0 49%, 100% 100%, 100% 0);
        }

        .canvas-container.canvasBottom {
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        }

        .canvas-container.canvasLeft {
            clip-path: polygon(100% 54%, 0 0, 0 100%);
        }


        .black_canvas_container {
            position: relative;
          
            background-color: #000000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 10px;

        }

        .black_canvas_container canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }


        .black_canvas_container.canvasTopBlack {
            /* 90-degree rotated clipping path for the top */
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
            height: 75px; 
            width: 700px;
        }

        .black_canvas_container.canvasBottomBlack {
            /* 90-degree rotated clipping path for the bottom */
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
            height: 75px;
            width: 700px;
        }

        .black_canvas_container.canvasLeftBlack {
            /* Original clipping path for the left */
            clip-path: polygon(0 0, 50% 0, 50% 100%, 0% 100%);
            width: 150px;
            height: 500px;
        }

        .black_canvas_container.canvasRightBlack {
            /* Original clipping path for the right */
            clip-path: polygon(50% 0, 100% 0, 100% 100%, 50% 100%);
            width: 150px;
            height: 500px;
        }



        .wall_canvas_container {
            position: relative;
            width: 300px;
            height: 300px;
            background-color: #df097b;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 10px;
            clip-path: polygon(0 0%, 100% 0%, 100% 100%, 0% 100%);
        }

        .table_canvas_container {
            position: relative;
            width: 200px;
            height: 200px;
            /* background-color: #df097b !important; */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 10px;
        }

        .flag_canvas_container {
            position: relative;
            width: 200px;
            height: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 10px;
            clip-path: polygon(35.944% 84.679%, 35.944% 84.679%, 35.944% 77.362%, 35.944% 70.05%, 35.944% 62.739%, 35.944% 55.429%, 35.944% 48.115%, 35.944% 40.797%, 35.944% 33.472%, 35.944% 26.138%, 35.944% 18.792%, 35.944% 11.432%, 35.944% 11.432%, 37.497% 11.483%, 39.041% 11.528%, 40.574% 11.57%, 42.097% 11.611%, 43.609% 11.653%, 45.111% 11.701%, 46.603% 11.756%, 48.084% 11.821%, 49.555% 11.899%, 51.014% 11.993%, 51.014% 11.993%, 57.1% 12.497%, 62.904% 13.137%, 68.403% 13.919%, 73.58% 14.85%, 78.412% 15.938%, 82.88% 17.19%, 86.964% 18.614%, 90.644% 20.217%, 93.898% 22.005%, 96.708% 23.987%, 96.708% 23.987%, 97.293% 24.49%, 97.82% 25.007%, 98.289% 25.535%, 98.698% 26.073%, 99.048% 26.617%, 99.336% 27.166%, 99.563% 27.717%, 99.727% 28.267%, 99.829% 28.815%, 99.866% 29.358%, 99.866% 29.358%, 99.919% 36.283%, 99.959% 43.209%, 99.985% 50.134%, 100.002% 57.059%, 100.01% 63.984%, 100.012% 70.91%, 100.01% 77.835%, 100.006% 84.76%, 100.002% 91.685%, 100% 98.611%, 100% 98.611%, 100% 98.735%, 100% 98.86%, 100% 98.987%, 100% 99.116%, 100% 99.249%, 100% 99.387%, 100% 99.53%, 100% 99.679%, 100% 99.835%, 100% 100%, 100% 100%, 98.087% 99.815%, 96.203% 99.632%, 94.345% 99.45%, 92.508% 99.271%, 90.69% 99.094%, 88.887% 98.919%, 87.095% 98.747%, 85.311% 98.577%, 83.532% 98.411%, 81.754% 98.247%, 81.754% 98.247%, 77.579% 97.867%, 73.404% 97.487%, 69.229% 97.108%, 65.052% 96.729%, 60.875% 96.353%, 56.695% 95.978%, 52.514% 95.607%, 48.33% 95.239%, 44.143% 94.876%, 39.953% 94.516%, 39.953% 94.516%, 39.072% 94.432%, 38.307% 94.337%, 37.653% 94.228%, 37.106% 94.099%, 36.662% 93.946%, 36.317% 93.767%, 36.066% 93.556%, 35.905% 93.309%, 35.83% 93.023%, 35.837% 92.692%, 35.837% 92.692%, 35.923% 91.903%, 35.979% 91.112%, 36.011% 90.32%, 36.022% 89.525%, 36.019% 88.728%, 36.005% 87.927%, 35.986% 87.122%, 35.966% 86.313%, 35.95% 85.499%, 35.944% 84.679%);
            position: relative;
            top: -30px;
        }


        .table_canvas_container.tableTop {
            clip-path: polygon(10% 0, 90% 0, 100% 100%, 0% 100%);
            width: 450px;
            height: 150px;
        }

        .table_canvas_container.tableRight {
            clip-path: polygon(0 0, 100% 10%, 100% 86%, 0 100%);
        }

        .table_canvas_container.tableBottom {
            clip-path: polygon(0 0, 100% 0, 90% 100%, 10% 100%);
            width: 450px;
            height: 150px;
        }

        .table_canvas_container.tableLeft {
            clip-path: polygon(0 10%, 100% 0%, 100% 100%, 0 86%);
        }

        .table_canvas_container.tableCenter {
            width: 450px;
            height: 150px;
        }
    </style>

</head>

<body>

    <!-- Text Editor Modal -->
    <div class="modal fade" id="textModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="textModalContent">
                        <h5 class="" style="text-align: center">Text Property</h5> <br>
                        <input type="text" id="textString" placeholder="Enter text" class="form-control">
                        <button id="addText" class="addText_canvas btn btn-primary">Add Text</button>

                        <div class="d-flex justify-content-between align-items-center px-2 py-3">
                            <div class="" style="    display: flex; gap: 25px;">
                                <img src="{{ asset('web/img/bold.svg') }}" alt="" class="textIconImg"
                                    id="fontBold">
                                <img src="{{ asset('web/img/italic.svg') }}" alt="" class="textIconImg"
                                    id="fontItalic">
                                <img src="{{ asset('web/img/underline.svg') }}" alt="" class="textIconImg"
                                    id="fontUnderline">
                                <img src="{{ asset('web/img/line-through.svg') }}" alt="" class="textIconImg"
                                    id="fontLinethrough">
                            </div>
                        </div>

                        <div class="px-2" style="padding: 10px 0px;">
                            <label for="textColor">Color: </label>
                            <input type="color" id="textColor" value="#000000">
                        </div>
                        <div class="px-2" style="padding: 10px 0px;">
                            <label for="fontSize">Font Size: </label> <br>
                            <input type="number" id="fontSize" value="21" min="1" class="form-control">
                        </div>
                        <div class="px-2" style="padding: 10px 0px;">
                            <label for="fontFamily">Font Family: </label> <br>
                            <select id="fontFamily" style="width:100%"> <br>
                                <option value="Arial">Arial</option>
                                <option value="Helvetica">Helvetica</option>
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Courier New">Courier New</option>
                                <option value="Verdana">Verdana</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Comic Sans MS">Comic Sans MS</option>
                                <option value="Trebuchet MS">Trebuchet MS</option>
                                <option value="Palatino Linotype">Palatino Linotype</option>
                                <option value="Arial Black">Arial Black</option>
                                <option value="Impact">Impact</option>
                                <option value="Tahoma">Tahoma</option>
                                <option value="Lucida Sans Unicode">Lucida Sans Unicode</option>
                                <option value="Garamond">Garamond</option>
                                <option value="Roboto">Roboto</option>
                                <option value="Open Sans">Open Sans</option>
                                <option value="Lato">Lato</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Oswald">Oswald</option>
                                <option value="Raleway">Raleway</option>
                                <option value="Poppins">Poppins</option>
                                <option value="Merriweather">Merriweather</option>
                            </select>

                        </div>
                        <div class="px-2" style="padding: 10px 0px;">
                            <label for="textTransform">Text Transform: </label> <br>
                            <select id="textTransform" style="width:100%"> <br>
                                <option value="none">None</option>
                                <option value="uppercase">Uppercase</option>
                                <option value="lowercase">Lowercase</option>
                                <option value="capitalize">Capitalize</option>
                            </select>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="colorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center align-items-center">
                    <div class="vue-color-picker">
                        <div class="vue-color-picker-container">
                            <div id="vue_chrome_picker" style="text-align: center;">
                                <label style="font-size: 19px;">Change Background Color</label>
                                <div>
                                    <div id="color-picker"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image File Upload Modal -->
    <div class="modal fade" id="imageUploadModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="upContainer">
                        <input type="file" id="upload-button" accept="image/*" />
                        <label class="upLabel" for="upload-button">
                            <i class="fa-solid fa-upload"></i>&nbsp; Choose Or Drop Photos
                        </label>
                        <div id="error"></div>
                        <div id="image-display"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Sizing Modal -->
    <div class="modal fade" id="sizeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-3">
                    <h6 class="">Size</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="size" value="3x3" id="size1"
                            checked>
                        <label class="form-check-label" for="size1">
                            3 x 3 M
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="size" value="3x45"
                            id="size2">
                        <label class="form-check-label" for="size2">
                            3 x 4.5 M
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="size" value="3x6"
                            id="size3">
                        <label class="form-check-label" for="size3">
                            3 x 6 M
                        </label>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Social Media Modal -->
    <div class="modal fade" id="socialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body py-5 px-4">
                    <div class="socialIconsBox">
                        <div class="socialIcons">
                            <img src="{{ asset('web/img/facebook.png') }}" alt="" class="socialIconImg">
                        </div>
                        <div class="socialIcons">
                            <img src="{{ asset('web/img/instagram.png') }}" alt="" class="socialIconImg">
                        </div>
                        <div class="socialIcons">
                            <img src="{{ asset('web/img/social.png') }}" alt="" class="socialIconImg">
                        </div>
                    </div>
                    <div class="socialIconsBox">
                        <div class="socialIcons">
                            <img src="{{ asset('web/img/twitter.png') }}" alt="" class="socialIconImg">
                        </div>
                        <div class="socialIcons">
                            <img src="{{ asset('web/img/whatsapp.png') }}" alt="" class="socialIconImg">
                        </div>
                        <div class="socialIcons">
                            <img src="{{ asset('web/img/linkedin.png') }}" alt="" class="socialIconImg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Save and Continue Modal -->
    <div class="modal fade" id="saveContinueModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="">
                        <div class="formImgDiv">
                            <img src="{{ asset('web/img/formImg.png') }}" alt="">
                        </div>
                        <div class="formDiv p-5">
                            <h5 class=""><strong>Save this design</strong></h5>
                            <form id="formSubmit">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="design_name" name="design_name"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="design_email" name="design_email"
                                        required>
                                </div>
                                <div class="d-flex justify-content-end align-items-center">
                                    <button type="submit" id="submitbtn" class="btn pinkBtn mt-3">Save and
                                        Generate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mainParentConfig">
        <div class="leftBtnsOuterBox">
            <h5 class="pb-5 mb-3">Design Tools</h5>
            <div class="leftBtnsBox">
                <div class="designToolsBtns" data-bs-toggle="modal" data-bs-target="#textModal">
                    <img src="{{ asset('web/img/text.png') }}" alt="" class="">
                </div>
                <div class="designToolsBtns" data-bs-toggle="modal" data-bs-target="#colorModal">
                    <img src="{{ asset('web/img/brush.png') }}" alt="" class="">
                </div>
                <div class="designToolsBtns" data-bs-toggle="modal" data-bs-target="#imageUploadModal">
                    <img src="{{ asset('web/img/photo.png') }}" alt="" class="">
                </div>
                <div class="designToolsBtns" data-bs-toggle="modal" data-bs-target="#sizeModal">
                    <img src="{{ asset('web/img/full.png') }}" alt="" class="" style="width: 32px;">
                </div>
                <div class="designToolsBtns" data-bs-toggle="modal" data-bs-target="#socialModal">
                    <img src="{{ asset('web/img/share.png') }}" alt="" class="">
                </div>
            </div>
        </div>


        <div class="configBox">
            <!-- <button data-bs-toggle="modal" data-bs-target="#saveContinueModal">asdsd</button> -->
            <div class="topTimeLineDiv">
                <div class="tablinks active">Roof</div>
                <div class="configTimeLine"></div>
                <div class="tablinks">Walls</div>
                <div class="configTimeLine"></div>
                <div class="tablinks">Table</div>
                <div class="configTimeLine"></div>
                <div class="tablinks">Flags</div>
                <div class="tablinks"></div>
            </div>

            <div class="tabContent" id="Roof" style="display: block;">
                <div class="rows" style="display: flex; margin-top:50px;">
                    <div class="col-6">
                        <img src="{{ asset('web/img/roofImg.png') }}" usemap="#image-map" alt="Roof Image">
                        <br>
                    </div>

                    <div class="col-6" style="text-align: -webkit-center;">
                        <div id="canvas-container">
                            <div id="canvas_container_canvasTop" class="canvas-container canvasTop"
                                style="background-color: {{ $color1 }}; width: 400px; height: 250px;">
                                <canvas id="canvasTop" width="400" height="250"></canvas>
                            </div>
                            <div id="canvas_container_canvasRight" class="canvas-container canvasRight"
                                style="background-color: {{ $color1 }}; width: 320px;height: 400px;">
                                <canvas id="canvasRight" width="320" height="400"></canvas>
                            </div>
                            <div id="canvas_container_canvasBottom" class="canvas-container canvasBottom active"
                                style="background-color: {{ $color1 }}; width: 400px; height: 250px;">
                                <canvas id="canvasBottom" width="400" height="250"></canvas>
                            </div>
                            <div id="canvas_container_canvasLeft" class="canvas-container canvasLeft"
                                style="background-color: {{ $color1 }}; width: 320px;height: 400px;">
                                <canvas id="canvasLeft" width="320" height="400"></canvas>
                            </div>
                        </div>

                        <div id="black_canvas_container">
                            <div id="black_canvas_container_canvasTopBlack"
                                class="black_canvas_container canvasTopBlack"
                                style="background-color: {{ $color2 }};">
                                <canvas id="canvasTopBlack" height="75" width="700"></canvas>
                            </div>
                            <div id="black_canvas_container_canvasRightBlack"
                                class="black_canvas_container canvasRightBlack"
                                style="background-color: {{ $color2 }};">
                                <canvas id="canvasRightBlack" width="150" height="500"></canvas>
                            </div>
                            <div id="black_canvas_container_canvasBottomBlack"
                                class="black_canvas_container canvasBottomBlack"
                                style="background-color: {{ $color2 }};">
                                <canvas id="canvasBottomBlack" height="75" width="700"></canvas>
                            </div>
                            <div id="black_canvas_container_canvasLeftBlack"
                                class="black_canvas_container canvasLeftBlack"
                                style="background-color: {{ $color2 }};">
                                <canvas id="canvasLeftBlack" width="150" height="500"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <br><br>

            <map name="image-map">
                <area target="" alt="Top Black Area" title="Top Black Area" coords="93,14,319,37"
                    shape="rect" onclick="switchActiveCanvas('topBlack')" id="topBlack">
                <area target="" alt="First Area" title="First Area" coords="96,40,316,41,203,156"
                    shape="poly" onclick="switchActiveCanvas('top')" id="top">
                <area target="" alt="Right Black Area" title="Right Black Area" coords="361,52,402,303"
                    shape="rect" onclick="switchActiveCanvas('rightBlack')" id="rightBlack">
                <area target="" alt="Second Area" title="Second Area" coords="210,159,319,51,322,275"
                    shape="poly" onclick="switchActiveCanvas('right')" id="right">
                <area target="" alt="Bottom Black Area" title="Bottom Black Area" coords="45,390,407,435"
                    shape="rect" onclick="switchActiveCanvas('bottomBlack')" id="bottomBlack">
                <area target="" alt="Third Area" title="Third Area" coords="207,187,45,349,369,349"
                    shape="poly" onclick="switchActiveCanvas('bottom')" id="bottom">
                <area target="" alt="Left Black Area" title="Left Black Area" coords="53,45,77,275"
                    shape="rect" onclick="switchActiveCanvas('leftBlack')" id="leftBlack">
                <area target="" alt="Fourth Area" title="Fourth Area" coords="82,49,81,272,195,162"
                    shape="poly" onclick="switchActiveCanvas('left')" id="left">
            </map>

            <div class="tabContent" id="Wall">

                <div class="wallsContentBox mt-1">
                    <div class="wallsContentBoxes">
                        <div class="switch-container">
                            <label class="switch">
                                <input type="checkbox" id="leftwall_switch" class="switch">
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label" id="switch-label">Left Wall</span>
                        </div>

                        <div id="leftwall_data">
                            <p style="text-align: center;">Height</p>
                            <div class="partitionDiv parent">
                                <div class="halfDiv children">Half</div>
                                <div class="halfDiv children active">Full</div>
                            </div>
                            <div>
                                <div id="wall_canvas_container_canvasLeftWall"
                                    class="wall_canvas_container canvasLeftWall"
                                    style="background-color: {{ $color1 }};" data-key="leftWallSwitch"
                                    onclick="switchActiveCanvas('leftWallSwitch')">
                                    <canvas id="canvasLeftWall" width="300" height="300"></canvas>
                                </div>
                                <div class="d-flex justify-content-center py-3"></div>
                            </div>
                        </div>

                    </div>

                    <div class="wallsContentBoxes">
                        <div class="switch-container">
                            <label class="switch">
                                <input type="checkbox" id="rightwall_switch" class="switch">
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label" id="switch-label">Right Wall</span>
                        </div>


                        <div id="rightwall_data">
                            <p style="text-align: center;">Height</p>
                            <div class="partitionDiv parent">
                                <div class="halfDiv children">Half</div>
                                <div class="halfDiv children active">Full</div>
                            </div>
                            <div>
                                <div id="wall_canvas_container_canvasRightwall"
                                    class="wall_canvas_container canvasRightwall"
                                    style="background-color: {{ $color2 }};" data-key="rightWallSwitch"
                                    onclick="switchActiveCanvas('rightWallSwitch')">
                                    <canvas id="canvasRightWall" width="300" height="300"></canvas>
                                </div>
                                <div class="d-flex  py-3">
                                    <div class="position-absolute form-check d-flex " style="right: 675px;">
                                        <input class="form-check-input" type="checkbox" id="copy-left-wall">
                                        <label class="form-check-label" for="copy-left-wall">Copy Left
                                            Wall</label>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="wallsContentBoxes">
                        <div class="switch-container">
                            <label class="switch">
                                <input type="checkbox" id="backwall_switch" class="switch">
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label" id="switch-label">Back Wall</span>
                        </div>
                        <div id="backwall_data">
                            <div class="position-relative">
                                <div id="wall_canvas_container_canvasBackWall"
                                    class="wall_canvas_container canvasBackWall"
                                    style="background-color: {{ $color1 }};" data-key="backWallSwitch"
                                    onclick="switchActiveCanvas('backWallSwitch')">
                                    <canvas id="canvasBackWall" width="300" height="300"></canvas>
                                </div>
                                <div class="d-flex py-3">
                                    <div class="position-absolute mx-auto form-check d-flex" style="left: 85px;">
                                        <input class="form-check-input" type="checkbox" id="copy-back-wall">
                                        <label class="form-check-label" for="copy-back-wall">Copy Back Wall</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


            <div class="tabContent" id="Table">
                <div class="d-flex justify-content-center align-items-center pt-5 mt-5">
                    <div class="col-6">
                        <img src="{{ asset('web/img/tableImg.png') }}" usemap="#image-map-table" alt="Table Image">
                    </div>
                    <div class="col-6" style="text-align: -webkit-center;">
                        <div id="table_canvas_container">
                            <div id="table_canvas_container_tableTop" class="table_canvas_container tableTop"
                                style="background-color: {{ $color1 }};">
                                <canvas id="tableTop" width="450" height="150"></canvas>
                            </div>
                            <div id="table_canvas_container_tableRight" class="table_canvas_container tableRight"
                                style="background-color: {{ $color1 }};">
                                <canvas id="tableRight" width="200" height="200"></canvas>
                            </div>
                            <div id="table_canvas_container_tableBottom" class="table_canvas_container tableBottom "
                                style="background-color: {{ $color1 }};">
                                <canvas id="tableBottom" width="450" height="150"></canvas>
                            </div>
                            <div id="table_canvas_container_tableLeft" class="table_canvas_container tableLeft"
                                style="background-color: {{ $color1 }};">
                                <canvas id="tableLeft" width="200" height="200"></canvas>
                            </div>
                            <div id="table_canvas_container_tableCenter" class="table_canvas_container tableCenter"
                                style="background-color: {{ $color1 }};">
                                <canvas id="tableCenter" width="450" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <map name="image-map-table">
                <area target="" alt="tableTop" title="tableTop" id="tableTop" coords="120,37,436,133"
                    onclick="switchActiveCanvas('tableTop')" shape="rect">
                <area target="" alt="tableRight" title="tableRight" id="tableRight" coords="444,141,537,258"
                    onclick="switchActiveCanvas('tableRight')" shape="rect">
                <area target="" alt="tableBottom" title="tableBottom" id="tableBottom"
                    coords="122,270,432,366" onclick="switchActiveCanvas('tableBottom')" shape="rect">
                <area target="" alt="tableLeft" title="tableLeft" id="tableLeft" coords="19,144,113,261"
                    onclick="switchActiveCanvas('tableLeft')" shape="rect">
                <area target="" alt="tableCenter" title="tableCenter" id="tableCenter"
                    coords="123,145,432,261" onclick="switchActiveCanvas('tableCenter')" shape="rect">
            </map>


            <div class="tabContent" id="Flags">
                <div class="d-flex justify-content-center">
                    {{-- <div class="d-flex flex-column align-items-center mt-5 pt-5 pe-5 me-5">
                        <div class="switch-container">
                            <label class="switch">
                                <input type="checkbox" id="switch" checked>
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label" id="switch-label">Left Flag</span>
                        </div>
                        <div class="switch-container">
                            <label class="switch">
                                <input type="checkbox" id="switch" checked>
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label" id="switch-label">Right Flag</span>
                        </div>
                    </div> --}}
                    <div class="col-6">
                        <div class="d-flex justify-content-center align-items-center pt-5 mt-5">
                            <img src="{{ asset('web/img/flagsImg.png') }}" alt="" class=""
                                usemap="#flagImage-map">
                        </div>
                    </div>

                    <div class="col-6" style="text-align: -webkit-center;">
                        <h4 id="flag_heading"></h4> <br>
                        <div id="flag_canvas_container">
                            <div id="flag_canvas_container_flagLeft" class="flag_canvas_container flagLeft"
                                style="background-color: {{ $color2 }};">
                                <canvas id="flagLeft" width="200" height="500"
                                    class="canvas_flagLeft"></canvas>
                            </div>
                            <div id="flag_canvas_container_flagRight" class="flag_canvas_container flagRight"
                                style="background-color: {{ $color1 }};">

                                <canvas id="flagRight" width="200" height="500" class="canvas_flagRight">
                                </canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <map name="flagImage-map">
                <area alt="flagLeft" title="flagLeft" coords="14,4,118,421" shape="rect"
                    onclick="switchActiveCanvas('flagLeft')" id="flagLeft">
                <area alt="flagRight" title="flagRight" coords="398,7,296,423" shape="rect"
                    onclick="switchActiveCanvas('flagRight')" id="flagRight">
            </map>


            <div class="tabContent" id="Model3d" style="height: 100%; width: 100%;">
                <div class="d-flex justify-content-center align-items-center py-5 my-5">
                    {{-- <img src="{{ asset('web/img/3dModel.png') }}" alt="" class="img-fluid">  --}}
                    <iframe width="600" height="400" class="iframe-res" id="myIframe"
                        src="https://playcanv.as/e/p/md0CjQtX/" frameborder="0"></iframe>

                </div>
            </div>




            <div class="moveBtnBox">
                <button type="button" class="btn btn-dark backBtn">Back</button>
                <div id="btn_save_deleted">
                    <button id="deleteSelected" class="btn_delete_selected">Delete Selected Object</button>
                    <button id="saveDesign" class="btn_save_design">Save
                        Design</button>
                </div>
                <button type="button" class="btn pinkBtn nextBtn">Next</button>
                <button type="button" class="btn pinkBtn saveBtn d-none" data-bs-toggle="modal"
                    data-bs-target="#saveContinueModal">Save and Continue</button>
            </div>
        </div>

    </div>
    <script src="{{ asset('web/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $("#canvas_container_canvasTop").hide();
        $("#canvas_container_canvasRight").hide();
        $("#canvas_container_canvasBottom").show();
        $("#canvas_container_canvasLeft").hide();
        $("#black_canvas_container_canvasTopBlack").hide();
        $("#black_canvas_container_canvasRightBlack").hide();
        $("#black_canvas_container_canvasBottomBlack").hide();
        $("#black_canvas_container_canvasLeftBlack").hide();


        $("#table_canvas_container_tableTop").hide();
        $("#table_canvas_container_tableRight").hide();
        $("#table_canvas_container_tableBottom").hide();
        $("#table_canvas_container_tableLeft").hide();
        $("#table_canvas_container_tableCenter").hide();

        $("#flag_canvas_container_flagLeft").hide();
        $("#flag_canvas_container_flagRight").hide();

        $("#leftwall_data").hide();
        $("#rightwall_data").hide();
        $("#backwall_data").hide();

        $('#leftwall_switch').change(function() {
            if ($(this).is(':checked')) {
                $("#leftwall_data").show();
            } else {
                $("#leftwall_data").hide();
            }
        });

        $('#rightwall_switch').change(function() {
            if ($(this).is(':checked')) {
                $("#rightwall_data").show();
            } else {
                $("#rightwall_data").hide();
            }
        });

        $('#backwall_switch').change(function() {
            if ($(this).is(':checked')) {
                $("#backwall_data").show();
            } else {
                $("#backwall_data").hide();
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            // var checkboxes = document.querySelectorAll('.switch');
            // checkboxes.forEach(function(checkbox) {
            //     checkbox.addEventListener('change', function() {
            //         if (this.checked) {
            //             // Uncheck all other checkboxes
            //             checkboxes.forEach(function(cb) {
            //                 if (cb !== checkbox) {
            //                     cb.checked = false;
            //                 }
            //             });
            //         }
            //     });
            // });

            var leftPosition = 0;
            var topPosition = 0;
            var setCanvaCheck = '';

            // Define your canvases
            const canvasTop = new fabric.Canvas('canvasTop');
            const canvasRight = new fabric.Canvas('canvasRight');
            const canvasBottom = new fabric.Canvas('canvasBottom');
            const canvasLeft = new fabric.Canvas('canvasLeft');

            const canvasTopBlack = new fabric.Canvas('canvasTopBlack');
            const canvasRightBlack = new fabric.Canvas('canvasRightBlack');
            const canvasBottomBlack = new fabric.Canvas('canvasBottomBlack');
            const canvasLeftBlack = new fabric.Canvas('canvasLeftBlack');

            const canvasLeftWall = new fabric.Canvas('canvasLeftWall');
            const canvasRightWall = new fabric.Canvas('canvasRightWall');
            const canvasBackWall = new fabric.Canvas('canvasBackWall');

            const tableTop = new fabric.Canvas('tableTop');
            const tableRight = new fabric.Canvas('tableRight');
            const tableBottom = new fabric.Canvas('tableBottom');
            const tableLeft = new fabric.Canvas('tableLeft');
            const tableCenter = new fabric.Canvas('tableCenter');

            const flagLeft = new fabric.Canvas('flagLeft');
            const flagRight = new fabric.Canvas('flagRight');

            let activeCanvas = canvasBottom; // Default active canvas

            // Function to switch active canvas
            window.switchActiveCanvas = function(areaId) {
                console.log(areaId);
                console.log(`Switching to canvas: ${areaId}`);

                // Show the selected canvas container and set the active canvas
                switch (areaId) {
                    case 'top':
                        $("#canvas_container_canvasTop").show();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = canvasTop;
                        leftPosition = 250;
                        topPosition = 250;
                        break;
                    case 'right':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").show();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = canvasRight;
                        leftPosition = 250;
                        topPosition = 250;
                        break;
                    case 'bottom':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").show();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = canvasBottom;
                        leftPosition = 250;
                        topPosition = 250;
                        break;
                    case 'left':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").show();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = canvasLeft;
                        leftPosition = 250;
                        topPosition = 250;

                        break;
                    case 'topBlack':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").show();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();
                        activeCanvas = canvasTopBlack;
                        leftPosition = 150;
                        topPosition = 150;

                        break;
                    case 'rightBlack':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").show();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = canvasRightBlack;
                        leftPosition = 250;
                        topPosition = 250;

                        break;
                    case 'bottomBlack':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").show();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();


                        activeCanvas = canvasBottomBlack;
                        leftPosition = 250;
                        topPosition = 250;

                        break;
                    case 'leftBlack':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").show();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = canvasLeftBlack;
                        leftPosition = 250;
                        topPosition = 250;

                        break;

                    case 'leftWallSwitch':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = canvasLeftWall;
                        leftPosition = 250;
                        topPosition = 250;
                        break;

                    case 'rightWallSwitch':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = canvasRightWall;
                        leftPosition = 250;
                        topPosition = 250;
                        break;

                    case 'backWallSwitch':

                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = canvasBackWall;
                        leftPosition = 250;
                        topPosition = 250;
                        break;

                    case 'tableTop':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").show();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = tableTop;
                        leftPosition = 150;
                        topPosition = 50;


                        break;

                    case 'tableRight':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").show();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = tableRight;
                        leftPosition = 150;
                        topPosition = 150;
                        break;

                    case 'tableBottom':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").show();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = tableBottom;
                        leftPosition = 150;
                        topPosition = 150;
                        break;

                    case 'tableLeft':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();


                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").show();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = tableLeft;
                        leftPosition = 150;
                        topPosition = 50;
                        break;

                    case 'tableCenter':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").show();

                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = tableCenter;
                        leftPosition = 150;
                        topPosition = 50;
                        break;


                    case 'flagLeft':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();

                        //Flag
                        $("#flag_canvas_container_flagLeft").show();
                        $("#flag_canvas_container_flagRight").hide();

                        activeCanvas = flagLeft;
                        leftPosition = 150;
                        topPosition = 50;
                        $('#flag_heading').text('Flag Left');
                        break;


                    case 'flagRight':
                        $("#canvas_container_canvasTop").hide();
                        $("#canvas_container_canvasRight").hide();
                        $("#canvas_container_canvasBottom").hide();
                        $("#canvas_container_canvasLeft").hide();
                        $("#black_canvas_container_canvasTopBlack").hide();
                        $("#black_canvas_container_canvasRightBlack").hide();
                        $("#black_canvas_container_canvasBottomBlack").hide();
                        $("#black_canvas_container_canvasLeftBlack").hide();

                        //Table
                        $("#table_canvas_container_tableTop").hide();
                        $("#table_canvas_container_tableRight").hide();
                        $("#table_canvas_container_tableBottom").hide();
                        $("#table_canvas_container_tableLeft").hide();
                        $("#table_canvas_container_tableCenter").hide();
                        //Flag
                        $("#flag_canvas_container_flagLeft").hide();
                        $("#flag_canvas_container_flagRight").show();
                        activeCanvas = flagRight;
                        leftPosition = 150;
                        topPosition = 50;
                        $('#flag_heading').text('Flag Right');
                        break;
                    default:
                        console.error(`No canvas found for areaId: ${areaId}`); // Debugging line
                        return; // Exit function if no matching canvas is found
                }
                setCanvaCheck = activeCanvas.getElement().id;
                console.log(`Active canvas ID: ${activeCanvas.getElement().id}`);
                // addDefaultImage(activeCanvas, '{{ asset('web/img/1.png') }}');
                activeCanvas.discardActiveObject();
                activeCanvas.renderAll();
            };

            // Initialize Pickr
            const pickr = Pickr.create({
                el: '#color-picker',
                theme: 'nano',
                swatches: [
                    'rgba(244, 67, 54, 1)',
                    'rgba(233, 30, 99, 0.95)',
                    'rgba(156, 39, 176, 0.9)',
                    'rgba(103, 58, 183, 0.85)',
                    'rgba(63, 81, 181, 0.8)',
                    'rgba(33, 150, 243, 0.75)',
                    'rgba(3, 169, 244, 0.7)',
                    'rgba(0, 188, 212, 0.7)',
                    'rgba(0, 150, 136, 0.75)',
                    'rgba(76, 175, 80, 0.8)',
                    'rgba(139, 195, 74, 0.85)',
                    'rgba(205, 220, 57, 0.9)',
                    'rgba(255, 235, 59, 0.95)',
                    'rgba(255, 193, 7, 1)'
                ],
                default: '#ffffff',
                components: {
                    preview: true,
                    opacity: true,
                    hue: true,
                    interaction: {
                        hex: true,
                        rgba: true,
                        hsla: true,
                        hsva: true,
                        cmyk: true,
                        input: true,
                        clear: true,
                        save: true
                    }
                }
            });

            pickr.on('change', (color, instance) => {
                const rgbaColor = color.toRGBA().toString();
                // console.log(`Setting background color: ${rgbaColor}`); // Debugging line
                if (activeCanvas) {
                    activeCanvas.setBackgroundColor(rgbaColor, activeCanvas.renderAll.bind(
                        activeCanvas));
                }
                // } else {
                //     console.error('No active canvas found to set background color'); // Debugging line
                // }
            });


            document.getElementById('upload-button').addEventListener('change', function(e) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imgObj = new Image();
                    imgObj.src = event.target.result;
                    imgObj.onload = function() {
                        const defaultWidth = 100; // Set your desired default width here
                        const defaultHeight = (imgObj.height / imgObj.width) *
                            defaultWidth; // Maintain aspect ratio
                        // Get the active canvas dimensions
                        const canvasWidth = activeCanvas.getWidth();
                        const canvasHeight = activeCanvas.getHeight();
                        // Calculate the position to center the image
                        const leftPosition = (canvasWidth - defaultWidth) / 2;
                        const topPosition = (canvasHeight - defaultHeight) / 2;

                        const image = new fabric.Image(imgObj);
                        image.set({
                            left: leftPosition,
                            top: topPosition,
                            angle: 0,
                            opacity: 1,
                            scaleX: defaultWidth / imgObj
                                .width, // Scale according to default width
                            scaleY: defaultHeight / imgObj
                                .height, // Scale according to default height
                            cornerColor: 'blue',
                            hasControls: true,
                            hasBorders: true
                        });

                        if (activeCanvas) {
                            activeCanvas.add(image);
                            activeCanvas.setActiveObject(image);
                            activeCanvas.renderAll();
                        } else {
                            console.error('No active canvas found to add image'); // Debugging line
                        }
                    };
                };
                reader.readAsDataURL(e.target.files[0]);
            });

            function initializeCanvases() {
                const defaultImageUrl = '{{ asset('web/img/1.png') }}'; // Default image URL
                addDefaultImage(canvasTop, defaultImageUrl);
                addDefaultImage(canvasRight, defaultImageUrl);
                addDefaultImage(canvasBottom, defaultImageUrl);
                addDefaultImage(canvasLeft, defaultImageUrl);


                addDefaultImage(canvasLeftWall, defaultImageUrl);
                addDefaultImage(canvasRightWall, defaultImageUrl);
                addDefaultImage(canvasBackWall, defaultImageUrl);


                addDefaultImage(tableTop, defaultImageUrl);
                addDefaultImage(tableRight, defaultImageUrl);
                addDefaultImage(tableBottom, defaultImageUrl);
                addDefaultImage(tableLeft, defaultImageUrl);
                addDefaultImage(tableCenter, defaultImageUrl);

                addDefaultImage(flagLeft, defaultImageUrl);
                addDefaultImage(flagRight, defaultImageUrl);
            }
            initializeCanvases();

            function addDefaultImage(canvas, imageUrl) {
                const imgObj = new Image();
                imgObj.src = imageUrl;

                imgObj.onload = function() {
                    const defaultWidth = 100; // Desired default width
                    const defaultHeight = (imgObj.height / imgObj.width) *
                        defaultWidth; // Maintain aspect ratio

                    // Get canvas dimensions
                    const canvasWidth = canvas.getWidth();
                    const canvasHeight = canvas.getHeight();

                    // Calculate position to center the image
                    const leftPosition = (canvasWidth - defaultWidth) / 2;
                    const topPosition = (canvasHeight - defaultHeight) / 2;

                    // Create Fabric.js image object
                    const image = new fabric.Image(imgObj);
                    image.set({
                        left: leftPosition,
                        top: topPosition,
                        angle: 0,
                        opacity: 1,
                        scaleX: defaultWidth / imgObj.width, // Scale according to default width
                        scaleY: defaultHeight / imgObj.height, // Scale according to default height
                        cornerColor: 'white',
                        hasControls: true,
                        hasBorders: true
                    });

                    // Add image to the canvas
                    canvas.add(image);
                    canvas.setActiveObject(image);
                    canvas.renderAll();
                };
            }

            document.getElementById('addText').addEventListener('click', function() {
                const textString = document.getElementById('textString').value;
                if (textString.trim() !== "") {
                    const fontSize = parseInt(document.getElementById('fontSize').value);
                    const fontFamily = document.getElementById('fontFamily').value;
                    const textColor = document.getElementById('textColor').value;

                    // Create a new Fabric.js Text object
                    const text = new fabric.Text(textString, {
                        fontSize: fontSize,
                        fontFamily: fontFamily,
                        fill: textColor,
                        originX: 'center', // Set origin to center
                        originY: 'center', // Set origin to center
                        fontWeight: 'normal',
                        fontStyle: 'normal',
                        underline: false,
                        linethrough: false,
                        textAlign: 'left',
                        textBackgroundColor: ''
                    });

                    // Calculate the canvas dimensions
                    const canvasWidth = activeCanvas.getWidth();
                    const canvasHeight = activeCanvas.getHeight();

                    // Update coordinates to get accurate text dimensions
                    text.setCoords();
                    const textWidth = text.getScaledWidth();
                    const textHeight = text.getScaledHeight();

                    // Calculate position to center the text
                    const leftPosition = (canvasWidth - textWidth) / 2;
                    const topPosition = (canvasHeight - textHeight) / 2;

                    // Update the text object's position
                    text.set({
                        left: leftPosition,
                        top: topPosition
                    });

                    if (activeCanvas) {
                        activeCanvas.add(text).setActiveObject(text);
                        document.getElementById('textString').value = "";
                        activeCanvas.renderAll();
                    } else {
                        console.error('No active canvas found to add text'); // Debugging line
                    }
                }
            });


            // Apply text properties to selected text object
            activeCanvas.on('selection:created', updateProperties);
            activeCanvas.on('selection:updated', updateProperties);

            function updateProperties() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    document.getElementById('textString').value = activeObject.text;
                    document.getElementById('fontSize').value = activeObject.fontSize;
                    document.getElementById('fontFamily').value = activeObject.fontFamily;
                    document.getElementById('textColor').value = activeObject.fill;
                }
            }

            document.getElementById('fontBold').addEventListener('click', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('fontWeight', activeObject.fontWeight === 'bold' ? 'normal' :
                        'bold');
                    activeCanvas.renderAll();
                }
            });

            document.getElementById('fontItalic').addEventListener('click', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('fontStyle', activeObject.fontStyle === 'italic' ? 'normal' :
                        'italic');
                    activeCanvas.renderAll();
                }
            });

            document.getElementById('fontUnderline').addEventListener('click', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('underline', !activeObject.underline);
                    activeCanvas.renderAll();
                }
            });

            document.getElementById('fontLinethrough').addEventListener('click', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('linethrough', !activeObject.linethrough);
                    activeCanvas.renderAll();
                }
            });

            document.getElementById('textColor').addEventListener('change', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('fill', this.value);
                    activeCanvas.renderAll();
                }
            });

            document.getElementById('fontSize').addEventListener('input', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('fontSize', parseInt(this.value));
                    activeCanvas.renderAll();
                }
            });

            document.getElementById('fontFamily').addEventListener('change', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('fontFamily', this.value);
                    activeCanvas.renderAll();
                }
            });

            // document.getElementById('textTransform').addEventListener('change', function() {
            //     const activeObject = activeCanvas.getActiveObject();
            //     if (activeObject && activeObject.type === 'text') {
            //         activeObject.set('transformMatrix', [1, 0, 0, 1, 0, parseInt(this.value)]);
            //         activeCanvas.renderAll();
            //     }
            // });

            document.getElementById('textTransform').addEventListener('change', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    const transformType = this.value;
                    let transformedText = '';

                    switch (transformType) {
                        case 'uppercase':
                            transformedText = activeObject.text.toUpperCase();
                            break;
                        case 'lowercase':
                            transformedText = activeObject.text.toLowerCase();
                            break;
                        case 'capitalize':
                            transformedText = activeObject.text.split(' ').map(word =>
                                word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()
                            ).join(' ');
                            break;
                        default:
                            transformedText = activeObject.text;
                            break;
                    }

                    activeObject.set('text', transformedText);
                    activeCanvas.renderAll();
                }
            });


            document.getElementById('deleteSelected').addEventListener('click', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject) {
                    activeCanvas.remove(activeObject);
                    activeCanvas.renderAll();
                }
            });

            document.getElementById('saveDesign').addEventListener('click', function() {
                if (!activeCanvas) return;

                // Create a temporary canvas
                const tempCanvas = document.createElement('canvas');
                tempCanvas.width = activeCanvas.width;
                tempCanvas.height = activeCanvas.height;
                const tempCtx = tempCanvas.getContext('2d');

                // Clear the temporary canvas
                tempCtx.clearRect(0, 0, tempCanvas.width, tempCanvas.height);
                var clippingPath = "";
                // Get the clipping path for the active canvas
                console.log("Clipping Path " + setCanvaCheck)



                if (setCanvaCheck == "tableTop" || setCanvaCheck == "tableRight" || setCanvaCheck ==
                    "tableBottom" || setCanvaCheck == "tableLeft" || setCanvaCheck == "tableCenter") {
                    clippingPath = getComputedStyle(document.getElementById(
                        `table_canvas_container_${activeCanvas.getElement().id}`)).clipPath;
                } else if (setCanvaCheck == "canvasTopBlack" || setCanvaCheck == "canvasRightBlack" ||
                    setCanvaCheck == "canvasBottomBlack" || setCanvaCheck == "canvasLeftBlack") {
                    clippingPath = getComputedStyle(document.getElementById(
                        `black_canvas_container_${activeCanvas.getElement().id}`)).clipPath;
                } else if (setCanvaCheck == "flagRight" || setCanvaCheck == "flagLeft") {
                    clippingPath = getComputedStyle(document.getElementById(
                        `flag_canvas_container_${activeCanvas.getElement().id}`)).clipPath;
                } else if (setCanvaCheck == "canvasLeftWall" || setCanvaCheck == "canvasRightWall" ||
                    setCanvaCheck == "canvasBackWall") {
                    var elment = document.getElementById(`wall_canvas_container_canvasRightWall`);
                    clippingPath = getComputedStyle(elment).clipPath;

                } else {
                    clippingPath = getComputedStyle(document.getElementById(
                        `canvas_container_${activeCanvas.getElement().id}`)).clipPath;
                }

                console.log(clippingPath);
                // Extract coordinates from clipPath
                const points = extractClipPathPoints(clippingPath, tempCanvas.width, tempCanvas.height);

                // Apply the clipping path
                applyClipPath(tempCtx, points);

                // Draw the active canvas content onto the temporary canvas
                tempCtx.drawImage(activeCanvas.lowerCanvasEl, 0, 0);

                // Convert the temporary canvas to base64
                const base64Data = tempCanvas.toDataURL();

                // Determine the active canvas ID
                const canvasId = activeCanvas.getElement().id;

                // Send the data to the server
                fetch('{{ route('saveCanvas') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            base64Data: base64Data,
                            canvasId: canvasId // Include the canvas ID or any other relevant information
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Save successful: ' + setCanvaCheck);
                            console.log(setCanvaCheck);
                            if (setCanvaCheck == "canvasRightWall") {
                                const backWallImage = document.getElementById('rightWallImage');
                                backWallImage.src = data.data['canvasRightWall'];;
                            }
                            console.log('Save successful:', data);
                        } else {
                            alert('Save failed!');
                        }

                    })
                    .catch(error => {
                        console.error('Save failed:', error);
                    });
            });

            function extractClipPathPoints(clipPath, width, height) {
                const points = [];
                if (clipPath.includes('polygon')) {
                    const coords = clipPath.match(/polygon\(([^)]+)\)/)[1].split(',').map(p => p.trim().split(' '));
                    coords.forEach(point => {
                        const x = width * parseFloat(point[0]) / 100;
                        const y = height * parseFloat(point[1]) / 100;
                        points.push([x, y]);
                    });
                }
                return points;
            }

            function applyClipPath(ctx, points) {
                ctx.save();
                ctx.beginPath();
                points.forEach((point, index) => {
                    const [x, y] = point;
                    if (index === 0) {
                        ctx.moveTo(x, y);
                    } else {
                        ctx.lineTo(x, y);
                    }
                });
                ctx.closePath();
                ctx.clip();
            }

        });


        $('#copy-left-wall').change(function() {
            let _token = $('meta[name="csrf-token"]').attr('content');
            const rightWallImageSrc = $('#rightWallImage').attr('src');
            var WallImage = "";
            var canvas = "";
            if ($(this).is(':checked')) {
                $('#leftWallImage').attr('src', rightWallImageSrc);
                canvas = "canvasLeftWall";
                WallImage = rightWallImageSrc;
                $.ajax({
                    type: 'POST',
                    url: "{{ route('canvaImgset') }}",
                    data: {
                        _token: _token,
                        WallImage: WallImage,
                        canvas: canvas,
                    },
                    success: function(data) {

                    }
                });
            } else {
                $('#leftWallImage').attr('src', '{{ asset('web/img/1.png') }}'); // Set to a default image
                canvas = "canvasLeftWall";
                WallImage = null; // Use `null` instead of `NULL`
                $.ajax({
                    type: 'POST',
                    url: "{{ route('canvaImgset') }}",
                    data: {
                        _token: _token,
                        WallImage: WallImage,
                        canvas: canvas,
                    },
                    success: function(data) {}
                });
            }
        });



        $('#copy-back-wall').change(function() {
            let _token = $('meta[name="csrf-token"]').attr('content');
            const rightWallImageSrc = $('#rightWallImage').attr('src');
            var WallImage = "";
            var canvas = "";

            if ($(this).is(':checked')) {
                $('#backWallImage').attr('src', rightWallImageSrc);
                canvas = "canvasBackWall";
                WallImage = rightWallImageSrc;

            } else {
                $('#backWallImage').attr('src',
                    '{{ asset('web/img/1.png') }}'); // Set to a default image
                canvas = "canvasBackWall";
                WallImage = null;
            }

            $.ajax({
                type: 'POST',
                url: "{{ route('canvaImgset') }}",
                data: {
                    _token: _token,
                    WallImage: WallImage,
                    canvas: canvas,
                },
                success: function(data) {
                    console.log(data);
                }
            });

        });

        $('#formSubmit').submit(function(event) {
            event.preventDefault();
            let _token = $('meta[name="csrf-token"]').attr('content');
            var design_name = $("#design_name").val();
            var design_email = $("#design_email").val();
            $.ajax({
                type: "POST",
                url: "{{ route('formsubmitDesign') }}",
                data: {
                    _token: _token,
                    design_name: design_name,
                    design_email: design_email,
                },
                success: function(data) {
                    alert('Success');
                    location.reload();
                },
            });

        });

        // function send_message(message) {
        //     var app = document.getElementById("myIframe");
        //     // console.log(app);

        //     var canvasTop = "";
        //     var canvasRight = "";
        //     var canvasBottom = "";
        //     var canvasLeft = "";
        //     var canvasTopBlack = "";
        //     var canvasRightBlack = "";
        //     var canvasBottomBlack = "";
        //     var canvasLeftBlack = "";
        //     var canvasLeftWall = "";
        //     var canvasRightWall = "";
        //     var canvasBackWall = "";
        //     var tableTop = "";
        //     var tableRight = "";
        //     var tableBottom = "";
        //     var tableLeft = "";
        //     var tableCenter = "";
        //     var flatLeft = "";
        //     var flatRight = "";

        //     $.ajax({
        //         type: "GET",
        //         url: "{{ route('getBase64Data') }}",
        //         data: {},
        //         success: function(data) {
        //             canvasTop = data['canvasTop'];
        //             canvasRight = data['canvasRight'];
        //             canvasBottom = data['canvasBottom'];
        //             canvasLeft = data['canvasLeft'];
        //             canvasTopBlack = data['canvasTopBlack'];
        //             canvasRightBlack = data['canvasRightBlack'];
        //             canvasBottomBlack = data['canvasBottomBlack'];
        //             canvasLeftBlack = data['canvasLeftBlack'];
        //             canvasLeftWall = data['canvasLeftWall'];
        //             canvasRightWall = data['canvasRightWall'];
        //             canvasBackWall = data['canvasBackWall'];
        //             tableTop = data['tableTop'];
        //             tableRight = data['tableRight'];
        //             tableBottom = data['tableBottom'];
        //             tableLeft = data['tableLeft'];
        //             tableCenter = data['tableCenter'];
        //             flatLeft = data['flatLeft'];
        //             flatRight = data['flatRight'];

        //         },
        //     });
        //     message = "canvasTopPink " + canvasTop + "canvasRightPink " + canvasRight + "canvasBottomPink " + canvasBottom +
        //         "canvasLeftPink " + canvasLeft + "canvasTopBlack " + canvasTopBlack + "canvasRightBlack " +
        //         canvasRightBlack + "canvasBottomBlack " + canvasBottomBlack + "canvasLeftBlack " + canvasLeftBlack +
        //         "canvasLeftWall " + canvasLeftWall + "canvasRightWall " + canvasRightWall + "canvasBackWall " +
        //         canvasBackWall + "tableTop " + tableTop + "tableRight " + tableRight + "tableLeft " + tableLeft +
        //         "tableCenter " + tableCenter + "flatLeft " + flatLeft + "flatRight " + flatRight;
        //     app.contentWindow.postMessage(message, "*");
        // }


        var app = document.getElementById("myIframe");
        var message = [];
        window.onmessage = event => {
            $.ajax({
                type: "GET",
                url: "{{ route('getBase64Data') }}",
                data: {},
                success: function(data) {
                    message = {
                        canvasTop: data['canvasTop'],
                        canvasRight: data['canvasRight'],
                        canvasBottom: data['canvasBottom'],
                        canvasLeft: data['canvasLeft'],
                        canvasTopBlack: data['canvasTopBlack'],
                        canvasRightBlack: data['canvasRightBlack'],
                        canvasBottomBlack: data['canvasBottomBlack'],
                        canvasLeftBlack: data['canvasLeftBlack'],
                        canvasLeftWall: data['canvasLeftWall'],
                        canvasRightWall: data['canvasRightWall'],
                        canvasBackWall: data['canvasBackWall'],
                        tableTop: data['tableTop'],
                        tableRight: data['tableRight'],
                        tableBottom: data['tableBottom'],
                        tableLeft: data['tableLeft'],
                        tableCenter: data['tableCenter'],
                        flatLeft: data['flatLeft'],
                        flatRight: data['flatRight']
                    };

                    // Send data to iframe
                    // iframe.contentWindow.postMessage(message, "YOUR_IFRAME_ORIGIN");
                }
            });

            if (event.data == "app:ready") {
                app.contentWindow.postMessage(message, "*");
            }

        }

        function send_message() {
            var iframe = document.getElementById("myIframe");
            $.ajax({
                type: "GET",
                url: "{{ route('getBase64Data') }}",
                data: {},
                success: function(data) {
                    var message = {
                        canvasTop: data['canvasTop'],
                        canvasRight: data['canvasRight'],
                        canvasBottom: data['canvasBottom'],
                        canvasLeft: data['canvasLeft'],
                        canvasTopBlack: data['canvasTopBlack'],
                        canvasRightBlack: data['canvasRightBlack'],
                        canvasBottomBlack: data['canvasBottomBlack'],
                        canvasLeftBlack: data['canvasLeftBlack'],
                        canvasLeftWall: data['canvasLeftWall'],
                        canvasRightWall: data['canvasRightWall'],
                        canvasBackWall: data['canvasBackWall'],
                        tableTop: data['tableTop'],
                        tableRight: data['tableRight'],
                        tableBottom: data['tableBottom'],
                        tableLeft: data['tableLeft'],
                        tableCenter: data['tableCenter'],
                        flatLeft: data['flatLeft'],
                        flatRight: data['flatRight']
                    };

                    // Send data to iframe
                    iframe.contentWindow.postMessage(message, "YOUR_IFRAME_ORIGIN");
                }
            });
        }



        // window.addEventListener('message', function(event) {
        //     // Verify the origin of the message
        //     if (event.origin !== 'http://127.0.0.1:8000/configuration') {
        //         return;
        //     }

        //     var data = event.data;
        //     console.log("e" + event);
        //     if (event.data == "app:ready") {
        //         send_message();
        //         console.log('run');
        //     }

        //     // Handle the received data
        //     if (typeof data === 'object') {
        //         var canvasTop = data.canvasTop;
        //         var canvasRight = data.canvasRight;
        //         var canvasBottom = data.canvasBottom;
        //         var canvasLeft = data.canvasLeft;
        //         var canvasTopBlack = data.canvasTopBlack;
        //         var canvasRightBlack = data.canvasRightBlack;
        //         var canvasBottomBlack = data.canvasBottomBlack;
        //         var canvasLeftBlack = data.canvasLeftBlack;
        //         var canvasLeftWall = data.canvasLeftWall;
        //         var canvasRightWall = data.canvasRightWall;
        //         var canvasBackWall = data.canvasBackWall;
        //         var tableTop = data.tableTop;
        //         var tableRight = data.tableRight;
        //         var tableBottom = data.tableBottom;
        //         var tableLeft = data.tableLeft;
        //         var tableCenter = data.tableCenter;
        //         var flatLeft = data.flatLeft;
        //         var flatRight = data.flatRight;

        //         // Use the data to modify the 3D model
        //         // Add your code here to handle the data and update the 3D model
        //     }
        // }, false);




        // document.addEventListener('DOMContentLoaded', function() {
        //     fetch('/base64-data')
        //         .then(response => response.json())
        //         .then(data => {
        //             // Ensure the iframe is loaded before sending the message
        //             var iframe = document.getElementById('myIframe');
        //             iframe.onload = function() {
        //                 iframe.contentWindow.postMessage(data, 'https://playcanv.as');
        //                 // console.log(data);
        //             };
        //         });
        // });

        // window.addEventListener('message', function(event) {
        //     // console.log(event);
        //     if (event.origin !== 'http://127.0.0.1:8000/configuration') return; // Adjust to your domain

        //     const data = event.data;
        //     console.log(data);
        //     if (data) {
        //         console.log('Received base64 data:', data);
        //         // Example: Adding images to a canvas or handling the data
        //         canvas.addImage(data.canvasTop, { position: 'top' });
        //         // Repeat for other base64 data as needed
        //     }
        // });
    </script>

</body>

</html>
