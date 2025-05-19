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

        .canvas-container.canvasTop3x4 {
            clip-path: polygon(0% 0%, 100% 0%, 75% 100%, 25% 100%);
        }

        .canvas-container.canvasRight3x4 {
            clip-path: polygon(0% 46%, 100% 100%, 100% 0%);
        }

        .canvas-container.canvasBottom3x4 {
            clip-path: polygon(0% 100%, 100% 100%, 73.3% 0%, 22.6% 0%);
        }

        .canvas-container.canvasLeft3x4 {
            clip-path: polygon(100% 47.5%, 0% 100%, 0% 0%);
        }

        .canvas-container.canvasTop3x6 {
            clip-path: polygon(0% 0%, 100% 0%, 75% 100%, 25% 100%);
        }

        .canvas-container.canvasRight3x6 {
            clip-path: polygon(0% 46%, 100% 100%, 100% 0%);
        }

        .canvas-container.canvasBottom3x6 {
            clip-path: polygon(0% 100%, 100% 100%, 73.3% 0%, 22.6% 0%);
        }

        .canvas-container.canvasLeft3x6 {
            clip-path: polygon(100% 47.5%, 0% 100%, 0% 0%);
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
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
            height: 75px;
            width: 700px;
        }

        .black_canvas_container.canvasBottomBlack {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
            height: 75px;
            width: 700px;
        }

        .black_canvas_container.canvasLeftBlack {
            clip-path: polygon(0 0, 50% 0, 50% 100%, 0% 100%);
            width: 150px;
            height: 500px;
        }

        .black_canvas_container.canvasRightBlack {
            clip-path: polygon(50% 0, 100% 0, 100% 100%, 50% 100%);
            width: 150px;
            height: 500px;
        }

        .wall_canvas_container {
            position: relative;
            background-color: #df097b;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 10px;
            clip-path: polygon(0 0%, 100% 0%, 100% 100%, 0% 100%);
        }

        .wall_canvas_container.canvasLeftHalfWall,
        .wall_canvas_container.canvasRightHalfWall {
            width: 300px;
            height: 300px;
        }

        .wall_canvas_container.canvasLeftFullWall,
        .wall_canvas_container.canvasRightFullWall {
            width: 600px;
            height: 300px;
        }

        .table_canvas_container {
            position: relative;
            width: 200px;
            height: 200px;
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
            width: 430px;
            height: 150px;
        }

        .table_canvas_container.tableRight {
            clip-path: polygon(0 13%, 100% 0%, 100% 100%, 0 85%);
        }

        .table_canvas_container.tableBottom {
            clip-path: polygon(0 0, 100% 0, 90% 100%, 10% 100%);
            width: 430px;
            height: 150px;
        }

        .table_canvas_container.tableLeft {
            clip-path: polygon(1% 0, 100% 12%, 100% 88%, 0 100%);
        }

        .table_canvas_container.tableCenter {
            width: 450px;
            height: 200px;
        }

        .textIconImg_toolbar {
            padding: 0px;
            margin: 7px;
            border: 2px solid #000;
            width: 35px;
            border-radius: 5px;
        }

        canvas {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <input type="hidden" value="{{ $size }}" id="select_size">
    <!-- Image File Upload Modal -->
    <div class="modal fade" id="imageUploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input class="form-check-input" type="radio" name="size" value="3x4" id="size2">
                        <label class="form-check-label" for="size2">
                            3 x 4.5 M
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="size" value="3x6" id="size3">
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
            <h5 class="pb-5 mb-3" style="text-align: center;">Design Tools</h5>
            <div class="leftBtnsBox"><br>

                <div class="designToolsBtns" id="text_property_btn">
                    <img src="{{ asset('web/img/text.png') }}" alt="" class="">
                </div>



                <div id="textProperty">
                    <input type="text" id="textString" placeholder="Enter text" class="form-control">
                    <button id="addText" class="addText_canvas btn btn-primary"
                        style=" border-radius: 50px;  background-color: #df097b; color:white; border:none; outline:none;">Add
                    </button>
                    <div class="d-flex justify-content-between align-items-center px-2 py-3">
                        <div class="" style="display: flex; justify-content: center; gap: 10px;">
                            <img src="{{ asset('web/img/bold.svg') }}" alt="" class="textIconImg"
                                id="fontBold"
                                style="    padding: 0px; margin: 7px;border: 2px solid #000;width: 35px;border-radius: 5px;">
                            <img src="{{ asset('web/img/italic.svg') }}" alt="" class="textIconImg"
                                id="fontItalic">
                            <br>
                            <img src="{{ asset('web/img/underline.svg') }}" alt="" class="textIconImg"
                                id="fontUnderline">
                            <img src="{{ asset('web/img/line-through.svg') }}" alt="" class="textIconImg"
                                id="fontLinethrough" style=" ">
                        </div>
                    </div>
                    <div class="px-2" style="padding: 10px 0px; display: flex; gap: 20px;">
                        <label for="textColor"> Text Color: </label>
                        <input type="color" id="textColor" value="#000000">
                    </div>
                    <div class="px-2" style="padding: 10px 0px;">
                        <label for="fontSize">Font Size: </label> <br>
                        <input type="number" id="fontSize" value="21" min="1" class="form-control">
                    </div>
                    <div class="px-2" style="padding: 10px 0px;">

                        <select id="fontFamily" style="width:100%"> <br>
                            <option selected disabled>Select Font Family</option>
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
                        <select id="textTransform" style="width:100%"> <br>
                            <option selected disabled>Select Text Transform</option>
                            <option value="none">None</option>
                            <option value="uppercase">Uppercase</option>
                            <option value="lowercase">Lowercase</option>
                            <option value="capitalize">Capitalize</option>
                        </select>
                    </div>
                </div>



                <div class="designToolsBtns" id="color_property_btn">
                    <img src="{{ asset('web/img/brush.png') }}" alt="" class="">
                </div>
                <div id="colorProperty">
                    <div id="color-picker"></div>
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
                    <div class="col-4 position-relative" style="text-align: -webkit-center;">
                    </div>

                    <div class="col-6 position-relative" style="text-align: -webkit-center;" id="size3x3">
                        <div class="pinkCanvasContainOuter">
                            <div id="canvas-container">
                                <div class="pinkCanvasTopBotomImgs">
                                    <div id="canvas_container_canvasTop" class="canvas-container canvasTop"
                                        onclick="switchActiveCanvas('canvasTop')"
                                        style="background-color: {{ $color1 }}; width: 300px; height: 150px;">
                                        <canvas id="canvasTop" width="300" height="150"></canvas>
                                    </div>
                                    <div id="canvas_container_canvasBottom" class="canvas-container canvasBottom"
                                        onclick="switchActiveCanvas('canvasBottom')"
                                        style="background-color: {{ $color1 }}; width: 400px; height: 180px;">
                                        <canvas id="canvasBottom" width="400" height="180"></canvas>
                                    </div>
                                </div>
                                <div class="pinkCanvasLeftRightImgs">
                                    <div id="canvas_container_canvasLeft" class="canvas-container canvasLeft"
                                        onclick="switchActiveCanvas('canvasLeft')"
                                        style="background-color: {{ $color1 }}; width: 150px;height: 300px;">
                                        <canvas id="canvasLeft" width="150" height="300"></canvas>
                                    </div>

                                    <div id="canvas_container_canvasRight" class="canvas-container canvasRight"
                                        onclick="switchActiveCanvas('canvasRight')"
                                        style="background-color: {{ $color1 }}; width: 150px;height: 300px;">
                                        <canvas id="canvasRight" width="150" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="blackCanvasContainOuter">
                            <div id="black_canvas_container">
                                <div class="blackCanvasTopBotomImgs">
                                    <div id="black_canvas_container_canvasTopBlack"
                                        class="black_canvas_container canvasTopBlack"
                                        onclick="switchActiveCanvas('canvasTopBlack')"
                                        style="background-color: {{ $color2 }}; width: 280px; height: 40px;">
                                        <canvas id="canvasTopBlack" height="40" width="280"></canvas>
                                    </div>
                                    <div id="black_canvas_container_canvasBottomBlack"
                                        class="black_canvas_container canvasBottomBlack"
                                        onclick="switchActiveCanvas('canvasBottomBlack')"
                                        style="background-color: {{ $color2 }}; width: 390px; height: 40px;">
                                        <canvas id="canvasBottomBlack" height="40" width="390"></canvas>
                                    </div>
                                </div>
                                <div class="blackCanvasLeftRightImgs">
                                    <div id="black_canvas_container_canvasLeftBlack"
                                        class="black_canvas_container canvasLeftBlack"
                                        onclick="switchActiveCanvas('canvasLeftBlack')"
                                        style="background-color: {{ $color2 }}; width: 70px; height: 300px;">
                                        <canvas id="canvasLeftBlack" width="70" height="300"></canvas>
                                    </div>
                                    <div id="black_canvas_container_canvasRightBlack"
                                        class="black_canvas_container canvasRightBlack"
                                        onclick="switchActiveCanvas('canvasRightBlack')"
                                        style="background-color: {{ $color2 }}; width: 70px; height: 300px;">
                                        <canvas id="canvasRightBlack" width="70" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="col-6 position-relative3x4" style="text-align: -webkit-center;" id="size3x4">
                        <div class="pinkCanvasContainOuter3x4">
                            <div id="canvas-container3x4">
                                <div class="pinkCanvasTopBotomImgs3x4">
                                    <div id="canvas_container_canvasTop3x4" class="canvas-container canvasTop3x4"
                                        onclick="switchActiveCanvas('canvasTop3x4')"
                                        style="background-color: {{ $color1 }}; width: 300px; height: 150px;">
                                        <canvas id="canvasTop3x4" width="300" height="150"></canvas>
                                    </div>
                                    <div id="canvas_container_canvasBottom3x4"
                                        class="canvas-container canvasBottom3x4"
                                        onclick="switchActiveCanvas('canvasBottom3x4')"
                                        style="background-color: {{ $color1 }}; width: 400px; height: 180px;">
                                        <canvas id="canvasBottom3x4" width="400" height="180"></canvas>
                                    </div>
                                </div>
                                <div class="pinkCanvasLeftRightImgs">
                                    <div id="canvas_container_canvasLeft3x4" class="canvas-container canvasLeft3x4"
                                        onclick="switchActiveCanvas('canvasLeft3x4')"
                                        style="background-color: {{ $color1 }}; width: 150px;height: 300px;">
                                        <canvas id="canvasLeft3x4" width="150" height="300"></canvas>
                                    </div>

                                    <div id="canvas_container_canvasRight3x4" class="canvas-container canvasRight3x4"
                                        onclick="switchActiveCanvas('canvasRight3x4')"
                                        style="background-color: {{ $color1 }}; width: 150px;height: 300px;">
                                        <canvas id="canvasRight3x4" width="150" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="blackCanvasContainOuter3x4">
                            <div id="black_canvas_container3x4">
                                <div class="blackCanvasTopBotomImgs">
                                    <div id="black_canvas_container_canvasTopBlack3x4"
                                        class="black_canvas_container canvasTopBlack3x4"
                                        onclick="switchActiveCanvas('canvasTopBlack3x4')"
                                        style="background-color: {{ $color2 }}; width: 280px; height: 40px;">
                                        <canvas id="canvasTopBlack3x4" height="40" width="280"></canvas>
                                    </div>
                                    <div id="black_canvas_container_canvasBottomBlack3x4"
                                        class="black_canvas_container canvasBottomBlack3x4"
                                        onclick="switchActiveCanvas('canvasBottomBlack3x4')"
                                        style="background-color: {{ $color2 }}; width: 390px; height: 40px;">
                                        <canvas id="canvasBottomBlack3x4" height="40" width="390"></canvas>
                                    </div>
                                </div>
                                <div class="blackCanvasLeftRightImgs">
                                    <div id="black_canvas_container_canvasLeftBlack3x4"
                                        class="black_canvas_container canvasLeftBlack3x4"
                                        onclick="switchActiveCanvas('canvasLeftBlack3x4')"
                                        style="background-color: {{ $color2 }}; width: 70px; height: 300px;">
                                        <canvas id="canvasLeftBlack3x4" width="70" height="300"></canvas>
                                    </div>
                                    <div id="black_canvas_container_canvasRightBlack3x4"
                                        class="black_canvas_container canvasRightBlack3x4"
                                        onclick="switchActiveCanvas('canvasRightBlack3x4')"
                                        style="background-color: {{ $color2 }}; width: 70px; height: 300px;">
                                        <canvas id="canvasRightBlack3x4" width="70" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 position-relative3x6" style="text-align: -webkit-center;" id="size3x6">
                        <div class="pinkCanvasContainOuter3x6">
                            <div id="canvas-container3x6">
                                <div class="pinkCanvasTopBotomImgs3x6">
                                    <div id="canvas_container_canvasTop3x6" class="canvas-container canvasTop3x6"
                                        onclick="switchActiveCanvas('canvasTop3x6')"
                                        style="background-color: {{ $color1 }}; width: 300px; height: 150px;">
                                        <canvas id="canvasTop3x6" width="300" height="150"></canvas>
                                    </div>
                                    <div id="canvas_container_canvasBottom3x6"
                                        class="canvas-container canvasBottom3x6"
                                        onclick="switchActiveCanvas('canvasBottom3x6')"
                                        style="background-color: {{ $color1 }}; width: 400px; height: 180px;">
                                        <canvas id="canvasBottom3x6" width="400" height="180"></canvas>
                                    </div>
                                </div>
                                <div class="pinkCanvasLeftRightImgs">
                                    <div id="canvas_container_canvasLeft3x6" class="canvas-container canvasLeft3x6"
                                        onclick="switchActiveCanvas('canvasLeft3x6')"
                                        style="background-color: {{ $color1 }}; width: 150px;height: 300px;">
                                        <canvas id="canvasLeft3x6" width="150" height="300"></canvas>
                                    </div>

                                    <div id="canvas_container_canvasRight3x6" class="canvas-container canvasRight3x6"
                                        onclick="switchActiveCanvas('canvasRight3x6')"
                                        style="background-color: {{ $color1 }}; width: 150px;height: 300px;">
                                        <canvas id="canvasRight3x6" width="150" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="blackCanvasContainOuter3x6">
                            <div id="black_canvas_container3x6">
                                <div class="blackCanvasTopBotomImgs">
                                    <div id="black_canvas_container_canvasTopBlack3x6"
                                        class="black_canvas_container canvasTopBlack3x6"
                                        onclick="switchActiveCanvas('canvasTopBlack3x6')"
                                        style="background-color: {{ $color2 }}; width: 280px; height: 40px;">
                                        <canvas id="canvasTopBlack3x6" height="40" width="280"></canvas>
                                    </div>
                                    <div id="black_canvas_container_canvasBottomBlack3x6"
                                        class="black_canvas_container canvasBottomBlack3x6"
                                        onclick="switchActiveCanvas('canvasBottomBlack3x6')"
                                        style="background-color: {{ $color2 }}; width: 390px; height: 40px;">
                                        <canvas id="canvasBottomBlack3x6" height="40" width="390"></canvas>
                                    </div>
                                </div>
                                <div class="blackCanvasLeftRightImgs">
                                    <div id="black_canvas_container_canvasLeftBlack3x6"
                                        class="black_canvas_container canvasLeftBlack3x6"
                                        onclick="switchActiveCanvas('canvasLeftBlack3x6')"
                                        style="background-color: {{ $color2 }}; width: 70px; height: 300px;">
                                        <canvas id="canvasLeftBlack3x6" width="70" height="300"></canvas>
                                    </div>
                                    <div id="black_canvas_container_canvasRightBlack3x6"
                                        class="black_canvas_container canvasRightBlack3x6"
                                        onclick="switchActiveCanvas('canvasRightBlack3x6')"
                                        style="background-color: {{ $color2 }}; width: 70px; height: 300px;">
                                        <canvas id="canvasRightBlack3x6" width="70" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>



                </div>
            </div> <br><br>


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
                                <div class="halfDiv children leftwallChildren active">Half</div>
                                <div class="halfDiv children leftwallChildren">Full</div>
                            </div>
                            <div>
                                <div id="wall_canvas_container_canvasLeftHalfWall"
                                    class="wall_canvas_container canvasLeftHalfWall"
                                    style="background-color: {{ $color1 }};" data-key="canvasLeftHalfWall"
                                    onclick="switchActiveCanvas('canvasLeftHalfWall')">
                                    <canvas id="canvasLeftHalfWall" width="300" height="300"></canvas>
                                </div>
                                <div id="wall_canvas_container_canvasLeftFullWall"
                                    class="wall_canvas_container canvasLeftFullWall"
                                    style="background-color: {{ $color1 }};" data-key="canvasLeftFullWall"
                                    onclick="switchActiveCanvas('canvasLeftFullWall')">
                                    <canvas id="canvasLeftFullWall" width="600" height="300"></canvas>
                                </div>
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
                                <div class="halfDiv children rightwallChildren active" id="rightwallChildrenHalf">Half
                                </div>
                                <div class="halfDiv children rightwallChildren" id="rightwallChildrenFull">Full</div>
                            </div>
                            <div>
                                <div id="wall_canvas_container_canvasRightHalfWall"
                                    class="wall_canvas_container canvasRightHalfWall"
                                    style="background-color: {{ $color2 }};" data-key="canvasRightHalfWall"
                                    onclick="switchActiveCanvas('canvasRightHalfWall')">
                                    <canvas id="canvasRightHalfWall" width="300" height="300"></canvas>
                                </div>
                                <div id="wall_canvas_container_canvasRightFullWall"
                                    class="wall_canvas_container canvasRightFullWall"
                                    style="background-color: {{ $color2 }};" data-key="canvasRightFullWall"
                                    onclick="switchActiveCanvas('canvasRightFullWall')">
                                    <canvas id="canvasRightFullWall" width="600" height="300"></canvas>
                                </div>
                                <div class="d-flex">
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
                                    onclick="switchActiveCanvas('canvasBackWall')">
                                    <canvas id="canvasBackWall" width="300" height="300"></canvas>
                                </div>
                                <div class="d-flex">
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
                <div class="d-flex justify-content-center align-items-center pt-1">
                    <div class="col-6" style="text-align: -webkit-center;">
                        <div id="table_canvas_container">
                            <div id="table_canvas_container_tableTop" class="table_canvas_container tableTop"
                                style="background-color: {{ $color1 }};"
                                onclick="switchActiveCanvas('tableTop')">
                                <canvas id="tableTop" width="450" height="150"></canvas>
                            </div>
                            <div
                                style="display: flex; justify-content: space-around; align-items: center;     gap: 5px;">
                                <div id="table_canvas_container_tableRight" class="table_canvas_container tableRight"
                                    style="background-color: {{ $color1 }};"
                                    onclick="switchActiveCanvas('tableRight')">
                                    <canvas id="tableRight" width="200" height="200"></canvas>
                                </div>

                                <div id="table_canvas_container_tableCenter"
                                    class="table_canvas_container tableCenter"
                                    style="background-color: {{ $color1 }};"
                                    onclick="switchActiveCanvas('tableCenter')">
                                    <canvas id="tableCenter" width="450" height="200"></canvas>
                                </div>
                                <div id="table_canvas_container_tableLeft" class="table_canvas_container tableLeft"
                                    style="background-color: {{ $color1 }};"
                                    onclick="switchActiveCanvas('tableLeft')">
                                    <canvas id="tableLeft" width="200" height="200"></canvas>
                                </div>
                            </div>
                            <div id="table_canvas_container_tableBottom" class="table_canvas_container tableBottom "
                                style="background-color: {{ $color1 }};"
                                onclick="switchActiveCanvas('tableBottom')">
                                <canvas id="tableBottom" width="450" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tabContent" id="Flags">
                <div class="d-flex justify-content-center" style="position: relative; top: -50px;">
                    <div class="col-6" style="text-align: -webkit-center;">
                        <h4 id="flag_heading"></h4> <br>
                        <div id="flag_canvas_container" class="d-flex justify-content-center align-items-center">
                            <div id="flag_canvas_container_flagLeft" class="flag_canvas_container flagLeft"
                                onclick="switchActiveCanvas('flagLeft')"
                                style="background-color: {{ $color2 }};">
                                <canvas id="flagLeft" width="200" height="500"
                                    class="canvas_flagLeft"></canvas>
                            </div>
                            <div id="flag_canvas_container_flagRight" class="flag_canvas_container flagRight"
                                onclick="switchActiveCanvas('flagRight')"
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


            {{-- <div class="tabContent" id="Model3d" style="height: 100%; width: 100%;">
                <div class="d-flex justify-content-center align-items-center py-5 my-5"> --}}
            {{-- <img src="{{ asset('web/img/3dModel.png') }}" alt="" class="img-fluid">  --}}
            {{-- <iframe width="600" height="400" class="iframe-res" id="myIframe"
                        src="https://playcanv.as/e/p/md0CjQtX/" frameborder="0"></iframe>

                </div>
            </div> --}}



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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {

            $("#textProperty").hide();
            $("#colorProperty").hide();

            let isTextPropertyVisible = false;
            let isColorPropertyVisible = false;

            $("#text_property_btn").click(function() {
                if (isTextPropertyVisible) {
                    $("#textProperty").hide();
                } else {
                    $("#textProperty").show();
                }
                isTextPropertyVisible = !isTextPropertyVisible; // Toggle the flag
            });

            $("#color_property_btn").click(function() {
                if (isColorPropertyVisible) {
                    $("#colorProperty").hide();
                } else {
                    $("#colorProperty").show();
                }
                isColorPropertyVisible = !isColorPropertyVisible; // Toggle the flag
            });


            $("#leftwall_data").hide();
            $("#rightwall_data").hide();
            $("#backwall_data").hide();

            $('#leftwall_switch').change(function() {
                if ($(this).is(':checked')) {
                    $("#leftwall_data").show();
                    switchActiveCanvas('canvasLeftHalfWall');
                } else {
                    $("#leftwall_data").hide();
                }
            });

            $('#rightwall_switch').change(function() {
                if ($(this).is(':checked')) {
                    $("#rightwall_data").show();
                    switchActiveCanvas('canvasRightHalfWall');
                } else {
                    $("#rightwall_data").hide();
                }
            });

            $('#backwall_switch').change(function() {
                if ($(this).is(':checked')) {
                    $("#backwall_data").show();
                    switchActiveCanvas('canvasBackWall');
                } else {
                    $("#backwall_data").hide();
                }
            });


            $('#wall_canvas_container_canvasLeftFullWall').hide();

            $('.leftwallChildren').on('click', function() {
                $('.leftwallChildren').removeClass('active');
                $(this).addClass('active');
                $('#wall_canvas_container_canvasLeftHalfWall, #wall_canvas_container_canvasLeftFullWall')
                    .hide();
                if ($(this).text() === 'Half') {
                    $('#wall_canvas_container_canvasLeftHalfWall').show();
                    switchActiveCanvas('canvasLeftHalfWall');
                } else if ($(this).text() === 'Full') {
                    $('#wall_canvas_container_canvasLeftFullWall').show();
                    switchActiveCanvas('canvasLeftFullWall');
                }
            });

            $('.leftwallChildren.active').trigger('click');


            $('#wall_canvas_container_canvasRightHalfwall').hide();

            $('#wall_canvas_container_canvasRightHalfWall').show();
            $('#wall_canvas_container_canvasRightFullWall').hide();

            $('#rightwallChildrenHalf').click(function() {
                $('#wall_canvas_container_canvasRightHalfWall').show();
                $('#wall_canvas_container_canvasRightFullWall').hide();
                switchActiveCanvas('canvasRightHalfWall');
                $('#rightwallChildrenHalf').addClass('active');
                $('#rightwallChildrenFull').removeClass('active');
            });

            $('#rightwallChildrenFull').click(function() {
                $('#wall_canvas_container_canvasRightHalfWall').hide();
                $('#wall_canvas_container_canvasRightFullWall').show();
                switchActiveCanvas('canvasRightFullWall');
                $('#rightwallChildrenHalf').removeClass('active');
                $('#rightwallChildrenFull').addClass('active');
            });

            var size = $("#select_size").val();



            if (size == "3x3") {
                $("#size3x3").show();
                $("#size3x4").hide();
                $("#size3x6").hide();
            } else if (size == "3x4") {
                $("#size3x3").hide();
                $("#size3x4").show();
                $("#size3x6").hide();
            } else if (size == "3x6") {
                $("#size3x3").hide();
                $("#size3x4").hide();
                $("#size3x6").show();
            }


            $('input[name="size"]').on('change', function() {
                var val = $(this).val();
                $('#select_size').val($(this).val());
                if (val == "3x3") {
                    $("#size3x3").show();
                    $("#size3x4").hide();
                    $("#size3x6").hide();
                } else if (val == "3x4") {
                    $("#size3x3").hide();
                    $("#size3x4").show();
                    $("#size3x6").hide();
                } else if (val == "3x6") {
                    $("#size3x3").hide();
                    $("#size3x4").hide();
                    $("#size3x6").show();
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




        document.addEventListener('DOMContentLoaded', function() {
            var setCanvaCheck = '';
            let activeCanvas = null;

            const canvases = {
                canvasTop: new fabric.Canvas('canvasTop'),
                canvasRight: new fabric.Canvas('canvasRight'),
                canvasBottom: new fabric.Canvas('canvasBottom'),
                canvasLeft: new fabric.Canvas('canvasLeft'),
                canvasTopBlack: new fabric.Canvas('canvasTopBlack'),
                canvasRightBlack: new fabric.Canvas('canvasRightBlack'),
                canvasBottomBlack: new fabric.Canvas('canvasBottomBlack'),
                canvasLeftBlack: new fabric.Canvas('canvasLeftBlack'),
                canvasTop3x4: new fabric.Canvas('canvasTop3x4'),
                canvasRight3x4: new fabric.Canvas('canvasRight3x4'),
                canvasBottom3x4: new fabric.Canvas('canvasBottom3x4'),
                canvasLeft3x4: new fabric.Canvas('canvasLeft3x4'),
                canvasTopBlack3x4: new fabric.Canvas('canvasTopBlack3x4'),
                canvasRightBlack3x4: new fabric.Canvas('canvasRightBlack3x4'),
                canvasBottomBlack3x4: new fabric.Canvas('canvasBottomBlack3x4'),
                canvasLeftBlack3x4: new fabric.Canvas('canvasLeftBlack3x4'),
                canvasTop3x6: new fabric.Canvas('canvasTop3x6'),
                canvasRight3x6: new fabric.Canvas('canvasRight3x6'),
                canvasBottom3x6: new fabric.Canvas('canvasBottom3x6'),
                canvasLeft3x6: new fabric.Canvas('canvasLeft3x6'),
                canvasTopBlack3x6: new fabric.Canvas('canvasTopBlack3x6'),
                canvasRightBlack3x6: new fabric.Canvas('canvasRightBlack3x6'),
                canvasBottomBlack3x6: new fabric.Canvas('canvasBottomBlack3x6'),
                canvasLeftBlack3x6: new fabric.Canvas('canvasLeftBlack3x6'),
                canvasLeftHalfWall: new fabric.Canvas('canvasLeftHalfWall'),
                canvasLeftFullWall: new fabric.Canvas('canvasLeftFullWall'),
                canvasRightHalfWall: new fabric.Canvas('canvasRightHalfWall'),
                canvasRightFullWall: new fabric.Canvas('canvasRightFullWall'),
                canvasBackWall: new fabric.Canvas('canvasBackWall'),
                tableTop: new fabric.Canvas('tableTop'),
                tableRight: new fabric.Canvas('tableRight'),
                tableBottom: new fabric.Canvas('tableBottom'),
                tableLeft: new fabric.Canvas('tableLeft'),
                tableCenter: new fabric.Canvas('tableCenter'),
                flagLeft: new fabric.Canvas('flagLeft'),
                flagRight: new fabric.Canvas('flagRight')
            };

            // Function to set the active canvas
            window.switchActiveCanvas = function(areaId) {
                const newActiveCanvas = canvases[areaId];
                if (newActiveCanvas && newActiveCanvas !== activeCanvas) {
                    if (activeCanvas) {
                        activeCanvas.off('selection:created', updateProperties);
                        activeCanvas.off('selection:updated', updateProperties);
                    }
                    activeCanvas = newActiveCanvas;
                    setCanvaCheck = activeCanvas.getElement().id;
                    console.log(`Active canvas ID: ${activeCanvas.getElement().id}`);
                    // Attach event listeners to the new active canvas
                    activeCanvas.on('selection:created', updateProperties);
                    activeCanvas.on('selection:updated', updateProperties);
                    activeCanvas.on('object:selected', function() {
                        // Prevents re-activation of the canvas on object click
                        event.stopPropagation();
                    });
                }
            };

            // Pickr color picker initialization
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
                if (activeCanvas) {
                    activeCanvas.setBackgroundColor(rgbaColor, activeCanvas.renderAll.bind(activeCanvas));
                }
            });

            // Add Image to Canvas
            document.getElementById('upload-button').addEventListener('change', function(e) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imgObj = new Image();
                    imgObj.src = event.target.result;
                    imgObj.onload = function() {
                        const defaultWidth = 100;
                        const defaultHeight = (imgObj.height / imgObj.width) * defaultWidth;

                        const canvasWidth = activeCanvas.getWidth();
                        const canvasHeight = activeCanvas.getHeight();

                        const leftPosition = (canvasWidth - defaultWidth) / 2;
                        const topPosition = (canvasHeight - defaultHeight) / 2;

                        const image = new fabric.Image(imgObj);
                        image.set({
                            left: leftPosition,
                            top: topPosition,
                            scaleX: defaultWidth / imgObj.width,
                            scaleY: defaultHeight / imgObj.height,
                            cornerColor: 'blue',
                            hasControls: true,
                            hasBorders: true
                        });

                        if (activeCanvas) {
                            activeCanvas.add(image);
                            activeCanvas.setActiveObject(image);
                            activeCanvas.renderAll();
                        } else {
                            console.error('No active canvas found to add image');
                        }
                    };
                };
                reader.readAsDataURL(e.target.files[0]);
            });



            function initializeCanvases() {
                const defaultImageUrl = '{{ asset('web/img/1.png') }}'; // Default image URL

                // Set default image for specific canvases
                addDefaultImage(canvases.canvasTop, defaultImageUrl);
                addDefaultImage(canvases.canvasRight, defaultImageUrl);
                addDefaultImage(canvases.canvasBottom, defaultImageUrl);
                addDefaultImage(canvases.canvasLeft, defaultImageUrl);

                addDefaultImage(canvases.canvasTop3x4, defaultImageUrl);
                addDefaultImage(canvases.canvasRight3x4, defaultImageUrl);
                addDefaultImage(canvases.canvasBottom3x4, defaultImageUrl);
                addDefaultImage(canvases.canvasLeft3x4, defaultImageUrl);

                addDefaultImage(canvases.canvasTop3x6, defaultImageUrl);
                addDefaultImage(canvases.canvasRight3x6, defaultImageUrl);
                addDefaultImage(canvases.canvasBottom3x6, defaultImageUrl);
                addDefaultImage(canvases.canvasLeft3x6, defaultImageUrl);

                addDefaultImage(canvases.canvasLeftHalfWall, defaultImageUrl);
                addDefaultImage(canvases.canvasLeftFullWall, defaultImageUrl);
                addDefaultImage(canvases.canvasRightHalfWall, defaultImageUrl);
                addDefaultImage(canvases.canvasRightFullWall, defaultImageUrl);
                addDefaultImage(canvases.canvasBackWall, defaultImageUrl);

                addDefaultImage(canvases.tableTop, defaultImageUrl);
                addDefaultImage(canvases.tableRight, defaultImageUrl);
                addDefaultImage(canvases.tableBottom, defaultImageUrl);
                addDefaultImage(canvases.tableLeft, defaultImageUrl);
                addDefaultImage(canvases.tableCenter, defaultImageUrl);

                addDefaultImage(canvases.flagLeft, defaultImageUrl);
                addDefaultImage(canvases.flagRight, defaultImageUrl);
            }


            // Function to add a default image to a canvas
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

            // Initialize canvases with default images
            initializeCanvases();


            // Add text to canvas
            document.getElementById('addText').addEventListener('click', function() {
                if (!activeCanvas) {
                    console.error('No active canvas selected.');
                    return;
                }

                const textString = document.getElementById('textString').value;
                if (textString.trim() !== "") {
                    const fontSize = parseInt(document.getElementById('fontSize').value);
                    const fontFamily = document.getElementById('fontFamily').value;
                    const textColor = document.getElementById('textColor').value;

                    const text = new fabric.Text(textString, {
                        fontSize: fontSize,
                        fontFamily: fontFamily,
                        fill: textColor,
                        originX: 'center',
                        originY: 'center',
                        editable: true // Make text editable
                    });

                    const canvasWidth = activeCanvas.getWidth(); // Ensure activeCanvas is not null
                    const canvasHeight = activeCanvas.getHeight();

                    text.setCoords();
                    const textWidth = text.getScaledWidth();
                    const textHeight = text.getScaledHeight();

                    const leftPosition = (canvasWidth - textWidth) / 2;
                    const topPosition = (canvasHeight - textHeight) / 2;

                    text.set({
                        left: leftPosition,
                        top: topPosition
                    });

                    activeCanvas.add(text).setActiveObject(text);
                    document.getElementById('textString').value = "";
                    activeCanvas.renderAll();
                }
            });

            // Apply text properties to selected text object
            function updateProperties() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    document.getElementById('textString').value = activeObject.text;
                    document.getElementById('fontSize').value = activeObject.fontSize;
                    document.getElementById('fontFamily').value = activeObject.fontFamily;
                    document.getElementById('textColor').value = activeObject.fill;
                }
            }

            // Functionality for updating text properties
            document.getElementById('fontBold').addEventListener('click', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('fontWeight', activeObject.fontWeight === 'bold' ? 'normal' : 'bold');
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

            // Underline text
            document.getElementById('fontUnderline').addEventListener('click', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('underline', !activeObject.underline);
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

            // Delete selected object
            document.getElementById('deleteSelected').addEventListener('click', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject) {
                    activeCanvas.remove(activeObject);
                    activeCanvas.renderAll();
                }
            });


            function copyCanvasDesign(sourceCanvasId, targetCanvasId) {
                var sourceCanvas = document.getElementById(sourceCanvasId);
                var targetCanvas = document.getElementById(targetCanvasId);

                if (sourceCanvas && targetCanvas) {
                    var sourceCtx = sourceCanvas.getContext('2d');
                    var targetCtx = targetCanvas.getContext('2d');

                    // Copy the image from sourceCanvas to targetCanvas
                    targetCtx.clearRect(0, 0, targetCanvas.width, targetCanvas.height);
                    targetCtx.drawImage(sourceCanvas, 0, 0);
                }
            }

            // Function to get the current design of a canvas as a base64 string
            function getCanvasData(canvasId) {
                var canvas = document.getElementById(canvasId);
                return canvas.toDataURL();
            }

            // Function to set the design of a canvas from a base64 string
            function setCanvasData(canvasId, dataUrl) {
                var canvas = document.getElementById(canvasId);
                var ctx = canvas.getContext('2d');
                var img = new Image();
                img.onload = function() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas
                    ctx.drawImage(img, 0, 0); // Draw the image on the canvas
                };
                img.src = dataUrl;
            }

            // Store the original design of canvasLeftHalfWall
            var originalCanvasLeftHalfWallData = getCanvasData('canvasLeftHalfWall');

            // Event listener for the copy-left-wall checkbox
            document.getElementById('copy-left-wall').addEventListener('change', function(event) {
                if (event.target.checked) {
                    copyCanvasDesign('canvasRightHalfWall', 'canvasLeftHalfWall');
                } else {
                    // Restore the original canvasLeftHalfWall design
                    setCanvasData('canvasLeftHalfWall', originalCanvasLeftHalfWallData);
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
                    setCanvaCheck == "canvasBottomBlack" || setCanvaCheck == "canvasLeftBlack" ||
                    setCanvaCheck == "canvasTopBlack3x4" || setCanvaCheck == "canvasRightBlack3x4" ||
                    setCanvaCheck == "canvasBottomBlack3x4" || setCanvaCheck == "canvasLeftBlack3x4" ||
                    setCanvaCheck == "canvasTopBlack3x6" || setCanvaCheck == "canvasRightBlack3x6" ||
                    setCanvaCheck == "canvasBottomBlack3x6" || setCanvaCheck == "canvasLeftBlack3x6") {
                    clippingPath = getComputedStyle(document.getElementById(
                        `black_canvas_container_${activeCanvas.getElement().id}`)).clipPath;
                } else if (setCanvaCheck == "flagRight" || setCanvaCheck == "flagLeft") {
                    clippingPath = getComputedStyle(document.getElementById(
                        `flag_canvas_container_${activeCanvas.getElement().id}`)).clipPath;
                } else if (setCanvaCheck == "canvasLeftHalfWall" || setCanvaCheck == "canvasLeftFullWall" ||
                    setCanvaCheck == "canvasRightHalfWall" || setCanvaCheck == "canvasRightFullWall" ||
                    setCanvaCheck == "canvasBackWall") {
                    // var elment = document.getElementById(`wall_canvas_container_canvasRightWall`);
                    // clippingPath = getComputedStyle(elment).clipPath;
                    clippingPath = getComputedStyle(document.getElementById(
                        `wall_canvas_container_${activeCanvas.getElement().id}`)).clipPath;
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
                const select_size = document.getElementById("select_size").value;;
              
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
                            select_size: select_size,
                            canvasId: canvasId // Include the canvas ID or any other relevant information
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Save successful: ' + setCanvaCheck);
                            console.log(setCanvaCheck);
                            // if (setCanvaCheck == "canvasRightWall") {
                            //     const backWallImage = document.getElementById('rightWallImage');
                            //     backWallImage.src = data.data['canvasRightWall'];;
                            // }
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



        // document.addEventListener('DOMContentLoaded', function() {
        //     // Function to copy the design from one canvas to another
        //     function copyCanvasDesign(sourceCanvasId, targetCanvasId) {
        //         var sourceCanvas = document.getElementById(sourceCanvasId);
        //         var targetCanvas = document.getElementById(targetCanvasId);

        //         if (sourceCanvas && targetCanvas) {
        //             var sourceCtx = sourceCanvas.getContext('2d');
        //             var targetCtx = targetCanvas.getContext('2d');

        //             // Copy the image from sourceCanvas to targetCanvas
        //             targetCtx.clearRect(0, 0, targetCanvas.width, targetCanvas.height); // Clear target canvas
        //             targetCtx.drawImage(sourceCanvas, 0, 0);
        //         }
        //     }

        //     // Event listener for the copy-left-wall checkbox
        //     document.getElementById('copy-left-wall').addEventListener('change', function(event) {
        //         if (event.target.checked) {
        //             copyCanvasDesign('canvasRightHalfWall', 'canvasLeftHalfWall');
        //         }
        //     });
        // });
    </script>

</body>

</html>
