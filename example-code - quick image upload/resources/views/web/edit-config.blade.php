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
        .dashboardBtn {
            background-color: #ee0d6e !important;
            color: white !important;
            padding: 6px 40px !important;
            border-radius: 30px;
            margin-top: -20px;
            margin-bottom: 10px;
        }

        .hidden {
            display: none !important;
        }

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
            /* left: 325px; */
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
            /* float: right; */
            /* position: relative; */
            /* left: 335px; */
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
            border: 10px red;
        }

        .canvas-container.canvasLeft {
            clip-path: polygon(100% 54%, 0 0, 0 100%);
        }

        .canvas-container.canvasTop3x4 {
            clip-path: polygon(0% 0%, 100% 0%, 75% 100%, 25% 100%);
        }

        .canvas-container.canvasRight3x4 {
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        }

        .canvas-container.canvasBottom3x4 {
            clip-path: polygon(0% 100%, 100% 100%, 73.3% -14%, 22.6% 0%);
        }

        .canvas-container.canvasLeft3x4 {
            clip-path: polygon(100% 47.5%, 0% 100%, 0% 0%);
        }

        .canvas-container.canvasTop3x6 {
            clip-path: polygon(0% 0%, 100% 0%, 75% 100%, 25% 100%);
        }

        .canvas-container.canvasRight3x6 {
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        }

        .canvas-container.canvasBottom3x6 {
            clip-path: polygon(0% 100%, 100% 100%, 73.3% -14.1%, 22.6% 0%);
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
            height: 40px;
            width: 300px;
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

        .table_canvas_container {
            position: relative;
            width: 200px;
            height: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 10px;
        }

        /*
        .flag_canvas_container {
            position: relative;
            width: 200px;
            height: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 10px;
            clip-path: path("")
            clip-path: polygon(35.944% 84.679%, 35.944% 84.679%, 35.944% 77.362%, 35.944% 70.05%, 35.944% 62.739%, 35.944% 55.429%, 35.944% 48.115%, 35.944% 40.797%, 35.944% 33.472%, 35.944% 26.138%, 35.944% 18.792%, 35.944% 11.432%, 35.944% 11.432%, 37.497% 11.483%, 39.041% 11.528%, 40.574% 11.57%, 42.097% 11.611%, 43.609% 11.653%, 45.111% 11.701%, 46.603% 11.756%, 48.084% 11.821%, 49.555% 11.899%, 51.014% 11.993%, 51.014% 11.993%, 57.1% 12.497%, 62.904% 13.137%, 68.403% 13.919%, 73.58% 14.85%, 78.412% 15.938%, 82.88% 17.19%, 86.964% 18.614%, 90.644% 20.217%, 93.898% 22.005%, 96.708% 23.987%, 96.708% 23.987%, 97.293% 24.49%, 97.82% 25.007%, 98.289% 25.535%, 98.698% 26.073%, 99.048% 26.617%, 99.336% 27.166%, 99.563% 27.717%, 99.727% 28.267%, 99.829% 28.815%, 99.866% 29.358%, 99.866% 29.358%, 99.919% 36.283%, 99.959% 43.209%, 99.985% 50.134%, 100.002% 57.059%, 100.01% 63.984%, 100.012% 70.91%, 100.01% 77.835%, 100.006% 84.76%, 100.002% 91.685%, 100% 98.611%, 100% 98.611%, 100% 98.735%, 100% 98.86%, 100% 98.987%, 100% 99.116%, 100% 99.249%, 100% 99.387%, 100% 99.53%, 100% 99.679%, 100% 99.835%, 100% 100%, 100% 100%, 98.087% 99.815%, 96.203% 99.632%, 94.345% 99.45%, 92.508% 99.271%, 90.69% 99.094%, 88.887% 98.919%, 87.095% 98.747%, 85.311% 98.577%, 83.532% 98.411%, 81.754% 98.247%, 81.754% 98.247%, 77.579% 97.867%, 73.404% 97.487%, 69.229% 97.108%, 65.052% 96.729%, 60.875% 96.353%, 56.695% 95.978%, 52.514% 95.607%, 48.33% 95.239%, 44.143% 94.876%, 39.953% 94.516%, 39.953% 94.516%, 39.072% 94.432%, 38.307% 94.337%, 37.653% 94.228%, 37.106% 94.099%, 36.662% 93.946%, 36.317% 93.767%, 36.066% 93.556%, 35.905% 93.309%, 35.83% 93.023%, 35.837% 92.692%, 35.837% 92.692%, 35.923% 91.903%, 35.979% 91.112%, 36.011% 90.32%, 36.022% 89.525%, 36.019% 88.728%, 36.005% 87.927%, 35.986% 87.122%, 35.966% 86.313%, 35.95% 85.499%, 35.944% 84.679%);
            position: relative;
            top: -30px;
        } */
        .flag_canvas_container {
            position: relative;
            width: 150px;
            height: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 10px;
            clip-path: path("M.28,496.56V2C12.4,3.28,24.14,3.51,35.45,5.82,83.84,15.71,122,40,142.07,86.8a95.31,95.31,0,0,1,7.37,36.26c.48,155.85.31,311.71.31,467.56V600c-15-4.18-28.74-8.19-42.57-11.83C74.7,579.62,42.24,571,9.64,563c-7.32-1.8-10-4.36-9.61-12.32C.83,532.9.28,515.08.28,496.56Z");
            top: 30px;
            /* Adjust this value based on your layout */
        }

        .flag_canvas_container1 {
            position: relative;
            width: 150px;
            height: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 10px;
            clip-path: polygon(100% 90.936%, 100% 90.936%, 100% 91.093%, 100% 91.249%, 100% 91.406%, 100% 91.562%, 100% 91.718%, 100% 91.875%, 100% 92.031%, 100% 92.188%, 100% 92.344%, 100% 92.501%, 100% 92.501%, 99.767% 92.701%, 99.47% 92.885%, 99.107% 93.053%, 98.678% 93.204%, 98.185% 93.338%, 97.627% 93.456%, 97.003% 93.558%, 96.314% 93.643%, 95.56% 93.712%, 94.741% 93.764%, 94.741% 93.764%, 85.259% 94.359%, 75.783% 94.96%, 66.315% 95.568%, 56.854% 96.182%, 47.401% 96.802%, 37.954% 97.429%, 28.514% 98.062%, 19.082% 98.702%, 9.657% 99.348%, 0.239% 100%, 0.239% 100%, 0.223% 91.955%, 0.216% 83.91%, 0.218% 75.865%, 0.228% 67.82%, 0.248% 59.775%, 0.276% 51.731%, 0.313% 43.686%, 0.359% 35.641%, 0.414% 27.596%, 0.478% 19.551%, 0.478% 19.551%, 0.665% 18.9%, 0.951% 18.255%, 1.338% 17.617%, 1.825% 16.985%, 2.412% 16.36%, 3.1% 15.742%, 3.888% 15.13%, 4.776% 14.525%, 5.764% 13.927%, 6.853% 13.335%, 6.853% 13.335%, 10.223% 11.745%, 13.958% 10.259%, 18.058% 8.874%, 22.522% 7.592%, 27.352% 6.412%, 32.546% 5.334%, 38.105% 4.358%, 44.029% 3.485%, 50.318% 2.714%, 56.972% 2.045%, 56.972% 2.045%, 61.136% 1.681%, 65.327% 1.354%, 69.545% 1.063%, 73.791% 0.809%, 78.064% 0.593%, 82.364% 0.412%, 86.692% 0.269%, 91.048% 0.163%, 95.43% 0.093%, 99.841% 0.06%, 99.841% 0.06%, 99.853% 8.849%, 99.859% 17.638%, 99.859% 26.427%, 99.853% 35.216%, 99.84% 44.004%, 99.821% 52.793%, 99.796% 61.582%, 99.764% 70.371%, 99.726% 79.16%, 99.681% 87.949%, 99.681% 87.949%, 99.704% 88.249%, 99.729% 88.549%, 99.756% 88.849%, 99.785% 89.149%, 99.816% 89.448%, 99.849% 89.746%, 99.884% 90.044%, 99.921% 90.342%, 99.959% 90.639%, 100% 90.936%);
            /* clip-path: path("M.28,496.56V2C12.4,3.28,24.14,3.51,35.45,5.82,83.84,15.71,122,40,142.07,86.8a95.31,95.31,0,0,1,7.37,36.26c.48,155.85.31,311.71.31,467.56V600c-15-4.18-28.74-8.19-42.57-11.83C74.7,579.62,42.24,571,9.64,563c-7.32-1.8-10-4.36-9.61-12.32C.83,532.9.28,515.08.28,496.56Z"); */
            top: 30px;
            /* Adjust this value based on your layout */
        }

        .table_canvas_container.tableTop {
            clip-path: polygon(10% 0, 90% 0, 100% 100%, 0% 100%);
            width: 370px;
            height: 150px;
        }

        .table_canvas_container.tableRight {
            clip-path: polygon(0 13%, 100% 0%, 100% 100%, 0 85%);
        }

        .table_canvas_container.tableBottom {
            clip-path: polygon(0 0, 100% 0, 90% 100%, 10% 100%);
            width: 370px;
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

         /* Modal Background */
         .modal-Gradient {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 20px
        }

        /* Modal Content */
        .modal-content-Gradient {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            margin: 15% auto;
            text-align: center;
            overflow: hidden;
        }

        /* Close Button */
        .close {
            float: right;
            font-size: 24px;
            cursor: pointer;
            color: #df097b
        }

        .gradLabel {
            display: inline;
            margin-bottom: -1.5rem;
            position: relative;
            bottom: 6px;
        }
        
        span.color1Span{
            text-align: center;
        }
        
        #open-modal {
            font-size: 12px;
            border: 1px solid;
            /* align-items: center; */
            text-align: center;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .modal-content-Gradient {
            color: #df097b;
            border-radius: 20px;
        }

        #apply-gradient{
            background-color: #FF0072;
            border: #FF0072;
            border-radius: 20px
            
        }

    </style>
</head>

<body>

    <input type="hidden" value="{{ $size }}" id="select_size">
    <!-- Image File Upload Modal -->
    {{-- <div class="modal fade" id="imageUploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div> --}}
    <input type="file" id="upload-button" accept="image/*" style="display: none;" />
    <!-- Sizing Modal -->
    <div class="modal fade" id="sizeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-3">
                    <h6 class="">Size</h6>
                    <div class="form-check">
                        <input class="form-check-input sizeFirst" type="radio" name="size" value="3x3"
                            id="size1" checked>
                        <label class="form-check-label" for="size1">
                            3 x 3 M
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input sizeFirst" type="radio" name="size" value="3x4"
                            id="size2">
                        <label class="form-check-label" for="size2">
                            3 x 4.5 M
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input sizeFirst" type="radio" name="size" value="3x6"
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
                        <div class="socialIcons" id="facebookShare">
                            <img src="{{ asset('web/img/facebook.png') }}" alt="" class="socialIconImg">
                        </div>
                        <div class="socialIcons" id="instagramShare">
                            <img src="{{ asset('web/img/instagram.png') }}" alt="" class="socialIconImg">
                        </div>
                        <div class="socialIcons" id="snapchatShare">
                            <img src="{{ asset('web/img/social.png') }}" alt="" class="socialIconImg">
                        </div>
                    </div>
                    <div class="socialIconsBox">
                        <div class="socialIcons" id="twitterShare">
                            <img src="{{ asset('web/img/x-ixon.png') }}" alt="" class="socialIconImg">
                        </div>
                        <div class="socialIcons" id="whatsappShare">
                            <img src="{{ asset('web/img/whatsapp.png') }}" alt="" class="socialIconImg">
                        </div>
                        <div class="socialIcons" id="linkedinShare">
                            <img src="{{ asset('web/img/linkedin.png') }}" alt="" class="socialIconImg">
                        </div>
                    </div>
                    <div class="socialIconsBox">
                        <input type="color" id="socialColor">
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
                                    <input type="text" class="form-control" id="design_name"
                                        value="{{ $design->design_name }}" name="design_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="design_email"
                                        value="{{ $design->design_email }}" name="design_email" required>
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
            {{-- <h5 class="pb-5 mb-3" style="text-align: center;">Design Tools</h5> --}}

            <div style="text-align: center;
            align-items: center;
            margin-left: -25px;">
                <a href="{{ route('profile') }}">
                    <button type="button" class="btn dashboardBtn">Dashboard</button>
                </a>

                <h5 class="pb-5 mb-3" style="text-align: center;">Design Tools</h5>
            </div>
            <div class="leftBtnsBox"><br>

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
                        <input type="number" id="fontSize" value="25" min="1" class="form-control">
                    </div>
                    <div class="px-2" style="padding: 10px 0px;">
                        <input type="text" id="fontSearch" placeholder="Search Fonts..."
                        style="width: 100%; margin-bottom: 10px; padding: 8px;" />
                        <select id="fontFamily" style="width:100%"> <br>
                            <option selected disabled>Select Font Family</option>
                            <option value="Arial" selected>Arial</option>
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
                            @foreach ($fonts as $key => $font)
                                <option value="{{ $font->font_name }}" data-src="{{ url('public/'.$font->font_path) }}">
                                    {{ $font->font_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-2" style="padding: 10px 0px;">
                        <select id="textTransform" style="width:100%"> <br>
                            <option selected disabled>Select Text Transform</option>
                            <option value="none" selected>None</option>
                            <option value="uppercase">Uppercase</option>
                            <option value="lowercase">Lowercase</option>
                            <option value="capitalize">Capitalize</option>
                        </select>
                    </div>
                </div>

                <div class="designToolsBtns" id="text_property_btn">
                    <img src="{{ asset('web/img/text.png') }}" alt="" class="">
                </div>



                <div class="designToolsBtns" id="color_property_btn">
                    <img src="{{ asset('web/img/brush.png') }}" alt="" class="">
                </div>
                <div id="colorProperty">
                    <div id="color-picker"></div>
                    {{-- <div id="open-modal">Choose<br>Gradient</div>

                    <!-- Modal -->
                    <div id="gradient-modal" class="modal-Gradient">
                        <div class="modal-content modal-content-Gradient">
                            <span class="close">&times;</span>
                            <h3>Select Gradient Type & Colors</h3>
                    
                            <label for="gradient-type">Gradient Type:</label>
                            <select id="gradient-type">
                                <option value="linear">Linear</option>
                                <option value="radial">Radial</option>
                                
                               
                            </select>
                    
                            <label class="gradLabel" for="color1">Color 1:</label>
                            <input type="color" id="color1" value="#ff0000">
                    
                            <label class="gradLabel" for="color2">Color 2:</label>
                            <input type="color" id="color2" value="#0000ff">
                    
                            <button id="apply-gradient">Apply Gradient</button>
                        </div>
                    </div> --}}


                </div>
                {{-- 
                <div class="designToolsBtns" data-bs-toggle="modal" data-bs-target="#imageUploadModal">
                    <img src="{{ asset('web/img/photo.png') }}" alt="" class="">
                </div> --}}
                <div class="designToolsBtns" id="imageUploadModal">
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


            <div class="tabContent" id="Roof" style="display: block;height: 80%;overflow: auto;">
                <div class="rows"
                    style="width: 100%;display: grid; margin-top: 20px; align-items: center;justify-content: center;">
                    <div class="col-6 position-relative" id="size3x3"
                        style="display: flex;justify-content: center;">
                        <div class="pinkCanvasContainOuter">
                            <div id="canvas-container">
                                <div id="canvas_container_canvasBottom" class="canvas-container canvasBottom sss"
                                    onclick="switchActiveCanvas('canvasBottom')"
                                    style="background-color: {{ $color1 }}; width: 1000px; height: 500px; outline:2px solid #000; margin-bottom:10px;">
                                    <canvas id="canvasBottom" width="1000" height="500"></canvas>
                                </div> <br><br><br><br>
                                <div id="black_canvas_container_canvasBottomBlack"
                                    class="black_canvas_container canvasBottomBlack"
                                    onclick="switchActiveCanvas('canvasBottomBlack')"
                                    style="background-color: {{ $color2 }}; width: 1000px; height: 75px;">
                                    <canvas id="canvasBottomBlack" height="75" width="1000"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-6 position-relative3x4"
                        style="text-align: -webkit-center;display:flex;gap:20px;position: relative;top: 60px; align-content: stretch;    flex-wrap: wrap;    flex-direction: column;"
                        id="size3x4">
                        <div class="pinkCanvasContainOuter3x4">
                            <div id="canvas-container3x4">
                                <div id="canvas_container_canvasRight3x4" class="canvas-container canvasRight3x4"
                                    onclick="switchActiveCanvas('canvasRight3x4')"
                                    style="background-color: {{ $color1 }}; width: 650px; height: 325px;">
                                    <canvas id="canvasRight3x4" width="650" height="325"></canvas>
                                </div>
                                <div id="black_canvas_container_canvasRightBlack3x4"
                                    class="black_canvas_container canvasRightBlack3x4"
                                    onclick="switchActiveCanvas('canvasRightBlack3x4')"
                                    style="background-color: {{ $color2 }}; width: 650px; height: 51px; position: relative; top: 10px;">
                                    <canvas id="canvasRightBlack3x4" height="55" width="650"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="pinkCanvasContainOuter3x4">
                            <div id="canvas-container3x4">
                                <div id="canvas_container_canvasBottom3x4" class="canvas-container canvasBottom3x4"
                                    onclick="switchActiveCanvas('canvasBottom3x4')"
                                    style="background-color: {{ $color1 }}; width: 875px; height: 325px;">
                                    <canvas id="canvasBottom3x4" width="875" height="325"></canvas>
                                </div>
                                <div id="black_canvas_container_canvasBottomBlack3x4"
                                    class="black_canvas_container canvasBottomBlack3x4"
                                    onclick="switchActiveCanvas('canvasBottomBlack3x4')"
                                    style="background-color: {{ $color2 }}; width: 875px; height: 51px; position: relative; top: 10px;">
                                    <canvas id="canvasBottomBlack3x4" height="55" width="875"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-6 position-relative3x6"
                        style="text-align: -webkit-center;display:flex;gap:20px;position: relative;top: 60px; align-content: stretch;    flex-wrap: wrap;    flex-direction: column;"
                        id="size3x6">

                        <div class="pinkCanvasContainOuter3x4">
                            <div id="canvas-container3x4">
                                <div id="canvas_container_canvasRight3x6" class="canvas-container canvasRight3x6"
                                    onclick="switchActiveCanvas('canvasRight3x6')"
                                    style="background-color: {{ $color1 }}; width: 650px; height: 425px;">
                                    <canvas id="canvasRight3x6" width="650" height="425"></canvas>
                                </div>
                                <div id="black_canvas_container_canvasRightBlack3x6"
                                    class="black_canvas_container canvasRightBlack3x6"
                                    onclick="switchActiveCanvas('canvasRightBlack3x6')"
                                    style="background-color: {{ $color2 }}; width: 650px; height: 51px; position: relative; top: 10px;">
                                    <canvas id="canvasRightBlack3x6" height="55" width="650"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="pinkCanvasContainOuter3x6">
                            <div id="canvas-container3x6">
                                <div class="pinkCanvasTopBotomImgs3x6">
                                    <div id="canvas_container_canvasBottom3x6"
                                        class="canvas-container canvasBottom3x6"
                                        onclick="switchActiveCanvas('canvasBottom3x6')"
                                        style="background-color: {{ $color1 }}; width: 900px; height: 250px;">
                                        <canvas id="canvasBottom3x6" width="900" height="250"></canvas>
                                    </div>
                                    <div id="black_canvas_container_canvasBottomBlack3x6"
                                        class="black_canvas_container canvasBottomBlack3x6"
                                        onclick="switchActiveCanvas('canvasBottomBlack3x6')"
                                        style="background-color: {{ $color2 }}; width: 900px; height: 51px; position: relative; top: 10px;">
                                        <canvas id="canvasBottomBlack3x6" height="55" width="900"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <br><br>


            <div class="tabContent" id="Wall" style="display: none;height: 80%;overflow: auto;">
                <div class="wallsContentBox mt-1" id="size3x3_Wall">
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
                                <div class="halfDiv halfLeftWall children leftwallChildren">Half</div>
                                <div class="halfDiv fullLeftWall children leftwallChildren">Full</div>
                            </div>
                            <div>
                                <div id="wall_canvas_container_canvasLeftHalfWall"
                                    class="wall_canvas_container canvasLeftHalfWall"
                                    style="background-color: {{ $color1 }}; width: 600px; height: 200px;"
                                    data-key="canvasLeftHalfWall" onclick="switchActiveCanvas('canvasLeftHalfWall')">
                                    <canvas id="canvasLeftHalfWall" width="600" height="200"></canvas>
                                </div>
                                <div id="wall_canvas_container_canvasLeftFullWall"
                                    class="wall_canvas_container canvasLeftFullWall"
                                    style="background-color: {{ $color1 }}; width: 600px; height: 390px;"
                                    data-key="canvasLeftFullWall" onclick="switchActiveCanvas('canvasLeftFullWall')">
                                    <canvas id="canvasLeftFullWall" width="600" height="390"></canvas>
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
                                <div class="halfDiv halfRightWall children rightwallChildren "
                                    id="rightwallChildrenHalf">
                                    Half
                                </div>
                                <div class="halfDiv fullRightWall children rightwallChildren"
                                    id="rightwallChildrenFull">Full
                                </div>
                            </div>
                            <div>
                                <div id="wall_canvas_container_canvasRightHalfWall"
                                    class="wall_canvas_container canvasRightHalfWall"
                                    style="background-color: {{ $color2 }};  width: 600px; height: 200px;"
                                    data-key="canvasRightHalfWall"
                                    onclick="switchActiveCanvas('canvasRightHalfWall')">
                                    <canvas id="canvasRightHalfWall" width="600" height="200"></canvas>
                                </div>
                                <div id="wall_canvas_container_canvasRightFullWall"
                                    class="wall_canvas_container canvasRightFullWall"
                                    style="background-color: {{ $color2 }}; width: 600px; height: 390px"
                                    data-key="canvasRightFullWall"
                                    onclick="switchActiveCanvas('canvasRightFullWall')">
                                    <canvas id="canvasRightFullWall" width="600" height="390"></canvas>
                                </div>
                                {{-- <div class="d-flex" id="copyLeftWallInput">
                                    <div class="position-absolute form-check d-flex " style="right: 675px;">
                                        <input class="form-check-input" type="checkbox" id="copy-left-wall">
                                        <label class="form-check-label" for="copy-left-wall">Copy Left
                                            Wall</label>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="wallsContentBoxes" id="3x3_backWall">
                        <div class="switch-container">
                            <label class="switch">
                                <input type="checkbox" class="switch backwall_switch" id="backwallSwitch">
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label" id="switch-label">Back Wall</span>
                        </div>
                        <div id="backwall_data">
                            <div class="position-relative">
                                <div id="wall_canvas_container_canvasBackWall3x3"
                                    class="wall_canvas_container canvasBackWall3x3"
                                    style="background-color: {{ $color1 }};width: 600px; height: 390px"
                                    data-key="backWallSwitch" onclick="switchActiveCanvas('canvasBackWall3x3')">
                                    <canvas id="canvasBackWall3x3" width="600" height="390"></canvas>
                                </div>
                                {{-- <div class="d-flex" id="copyBackWallInput">
                                    <div class="position-absolute mx-auto form-check d-flex" style="left: 85px;">
                                        <input class="form-check-input" type="checkbox" id="copy-back-wall">
                                        <label class="form-check-label" for="copy-back-wall">Copy Back
                                            Wall</label>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="wallsContentBoxes" id="3x4_backWall">
                        <div class="switch-container">
                            <label class="switch">
                                <input type="checkbox" class="switch backwall_switch" id="backwallSwitch">
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label" id="switch-label">Back Wall</span>
                        </div>
                        <div id="backwall_data2">
                            <div class="position-relative">
                                <div id="wall_canvas_container_canvasBackWall3x4"
                                    class="wall_canvas_container canvasBackWall3x4"
                                    style="background-color: {{ $color1 }};width: 900px; height: 390px"
                                    data-key="backWallSwitch" onclick="switchActiveCanvas('canvasBackWall3x4')">
                                    <canvas id="canvasBackWall3x4" width="900" height="390"></canvas>
                                </div>
                                {{-- <div class="d-flex" id="copy-back-wall3x4Input">
                                    <div class="position-absolute mx-auto form-check d-flex" style="left: 85px;">
                                        <input class="form-check-input" type="checkbox" id="copy-back-wall3x4">
                                        <label class="form-check-label" for="copy-back-wall3x4">Copy Back
                                            Wall</label>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="wallsContentBoxes" id="3x6_backWall" id="backwallSwitch">
                        <div class="switch-container">
                            <label class="switch">
                                <input type="checkbox" class="switch backwall_switch">
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label" id="switch-label">Back Wall</span>
                        </div>
                        <div id="backwall_data3">
                            <div class="position-relative">
                                <div id="wall_canvas_container_canvasBackWall3x6"
                                    class="wall_canvas_container canvasBackWall3x6"
                                    style="background-color: {{ $color1 }};width: 1200px; height: 390px"
                                    data-key="backWallSwitch" onclick="switchActiveCanvas('canvasBackWall3x6')">
                                    <canvas id="canvasBackWall3x6" width="1200" height="390"></canvas>
                                </div>
                                {{-- <div class="d-flex" id="copy-back-wall3x6Input">
                                    <div class="position-absolute mx-auto form-check d-flex" style="left: 85px;">
                                        <input class="form-check-input" type="checkbox" id="copy-back-wall3x6">
                                        <label class="form-check-label" for="copy-back-wall3x6">Copy Back
                                            Wall</label>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>







                </div>



            </div>


            <div class="tabContent" id="Table" style="display: none">
                <div class="d-flex justify-content-center align-items-center pt-1">
                    <div class="col-4">
                        <div class="switch-container">
                            <label class="switch">
                                <input type="checkbox" id="table_box" checked class="switch" checked>
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label" id="switch-label">Table</span>
                        </div>
                    </div>
                    <div class="col-8" style="text-align: -webkit-center;">
                        <div id="table_canvas_container">
                            <div id="table_canvas_container_tableTop" class="table_canvas_container tableTop"
                                style="background-color: {{ $color1 }};"
                                onclick="switchActiveCanvas('tableTop')">
                                <canvas id="tableTop" width="370" height="150"></canvas>
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
                                <canvas id="tableBottom" width="370" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tabContent" id="Flags" style="display: none">














                <div class="d-flex justify-content-center" style="position: relative; top: -50px;">
                    <div class="col-4" style="margin-top: 40px;">
                        <div class="switch-container">
                            <label class="switch">
                                <input type="checkbox" id="left_flag" checked class="switch">
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label" id="switch-label">Left flag</span>
                        </div>
                        <div class="switch-container">
                            <label class="switch">
                                <input type="checkbox" id="right_flag" checked class="switch">
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label" id="switch-label">Right flag</span>
                        </div>
                    </div>
                    <div class="col-8" style="text-align: -webkit-center;">
                        <h4 id="flag_heading"></h4> <br>
                        <div id="flag_canvas_container" class="d-flex justify-content-center align-items-center">
                            <div>
                                <h4
                                    style="    position: absolute;
                                top: 0;
                                font-weight: bold;">
                                    Front Flag</h4>
                            </div>
                            <div id="flag_canvas_container_flagLeft" class="flag_canvas_container1 flagLeft"
                                onclick="switchActiveCanvas('flagLeft')"
                                style="background-color: {{ $color2 }}; margin-right: 20px;">
                                <canvas id="flagLeft" width="150" height="600"
                                    class="canvas_flagLeft"></canvas>
                            </div>
                            <div>
                                <h4
                                    style="    position: absolute;
                                top: 0;
                                font-weight: bold;">
                                    Back Flag</h4>
                            </div>
                            <div id="flag_canvas_container_flagRight" class="flag_canvas_container flagRight"
                                onclick="switchActiveCanvas('flagRight')"
                                style="background-color: {{ $color1 }};">

                                <canvas id="flagRight" width="150" height="600" class="canvas_flagRight">
                                </canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <map name="flagImage-map" style="display: none">
                <area alt="flagLeft" title="flagLeft" coords="14,4,118,421" shape="rect"
                    onclick="switchActiveCanvas('flagLeft')" id="flagLeft">
                <area alt="flagRight" title="flagRight" coords="398,7,296,423" shape="rect"
                    onclick="switchActiveCanvas('flagRight')" id="flagRight">
            </map>


            <div class="tabContent" id="Model3d" style="height: 100%; width: 100%;">
                <div class="d-flex justify-content-center align-items-center ">
                    {{-- <img src="{{ asset('web/img/3dModel.png') }}" alt="" class="img-fluid">  --}}
                    <iframe width="100%" height="550" class="iframe-res" id="myIframe" style="width: 100%;"
                        src="https://playcanv.as/e/p/md0CjQtX/" frameborder="0">
                    </iframe>

                </div>
            </div>



            <div class="moveBtnBox">
                <button type="button" class="btn btn-dark backBtn">Back</button>
                <button type="button" class="btn btn-dark centerBtn" id="centerObject">Center</button>
                <div id="btn_save_deleted">
                    <button id="deleteSelected" class="btn_delete_selected">Delete Selected Object</button>
                    <button id="saveDesign" class="btn_save_design">Update
                        Design</button>
                </div>
                <button type="button" class="btn pinkBtn nextBtn">Next</button>
                <button type="button" class="btn pinkBtn saveBtn d-none" data-bs-toggle="modal"
                    data-bs-target="#saveContinueModal">Update and Continue</button>

            </div>

        </div>

    </div>

    <script src="{{ asset('web/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('web/script.js') }}"></script>
    <script>
        
    </script>
    <script>
        let leftwall_switch = "leftWallHide";
        let rightwall_switch = "rightWallHide";

        let table_boxValue = "on";
        let left_flagValue = "on";
        let right_flagValue = "on";
        let designs2 = @json($design);
        let appReadyTrue = 0;
        $(document).ready(function() {

            window.onmessage = event => {
                if (event.data == "app:ready") {
                    appReadyTrue = 1;
                }
            }

            let canvasBottomBase64 = "";
            let canvasBottomBlackBase64 = "";
            let canvasRight3x4Base64 = "";
            let canvasRightBlack3x4Base64 = "";
            let canvasBottom3x4Base64 = "";
            let canvasBottomBlack3x4Base64 = "";
            let canvasRight3x6Base64 = "";
            let canvasRightBlack3x6Base64 = "";
            let canvasBottom3x6Base64 = "";
            let canvasBottomBlack3x6Base64 = "";
            let tableTopBase64 = "";
            let tableRightBase64 = "";
            let tableCenterBase64 = "";
            let tableLeftBase64 = "";
            let tableBottomBase64 = "";
            let flagLeftBase64 = "";
            let flagRightBase64 = "";
            let canvasLeftHalfWallBase64 = "";
            let canvasLeftFullWallBase64 = "";
            let canvasRightHalfWallBase64 = "";
            let canvasRightFullWallBase64 = "";
            let canvasBackWall3x3Base64 = "";
            let canvasBackWall3x4Base64 = "";
            let canvasBackWall3x6Base64 = "";



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
            $("#backwall_data2").hide();
            $("#backwall_data3").hide();

            $('#leftwall_switch').change(function() {
                if ($(this).is(':checked')) {
                    $("#leftwall_data").show();
                    leftwall_switch = "leftWallShow";
                    $("#copyBackWallInput").removeClass('hidden');
                    $("#copyLeftWallInput").removeClass('hidden');
                    // $("#copy-back-wall3x4Input").removeClass('hidden');
                    // $("#copy-back-wall3x6Input").removeClass('hidden');
                    switchActiveCanvas('canvasLeftHalfWall');
                } else {
                    leftwall_switch = "leftWallHide";
                    $("#leftwall_data").hide();
                    $("#copyBackWallInput").addClass('hidden');
                    $("#copyLeftWallInput").addClass('hidden');
                    // $("#copy-back-wall3x4Input").addClass('hidden');
                    // $("#copy-back-wall3x6Input").addClass('hidden');
                }
            });

            $('#rightwall_switch').change(function() {
                if ($(this).is(':checked')) {
                    rightwall_switch = "rightWallShow";
                    $("#rightwall_data").show();
                    switchActiveCanvas('canvasRightHalfWall');
                } else {
                    rightwall_switch = "rightWallHide";
                    $("#rightwall_data").hide();
                }
            });

            $('.backwall_switch').change(function() {
                if ($(this).is(':checked')) {
                    $("#backwall_data").show();
                    $("#backwall_data2").show();
                    $("#backwall_data3").show();
                    switchActiveCanvas('canvasBackWall');
                } else {
                    $("#backwall_data").hide();
                    $("#backwall_data2").hide();
                    $("#backwall_data3").hide();
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

                $("#3x3_backWall").show();
                $("#3x4_backWall").hide();
                $("#3x6_backWall").hide();

            } else if (size == "3x4") {
                $("#size3x3").hide();
                $("#size3x4").show();
                $("#size3x6").hide();
                $("#3x3_backWall").hide();
                $("#3x4_backWall").show();
                $("#3x6_backWall").hide();
            } else if (size == "3x6") {
                $("#size3x3").hide();
                $("#size3x4").hide();
                $("#size3x6").show();
                $("#3x3_backWall").hide();
                $("#3x4_backWall").hide();
                $("#3x6_backWall").show();
            }


            $('input[name="size"]').on('change', function() {
                var val = $(this).val();
                $('#select_size').val($(this).val());
                if (val == "3x3") {
                    $("#size3x3").show();
                    $("#size3x4").hide();
                    $("#size3x6").hide();
                    $("#3x3_backWall").show();
                    $("#3x4_backWall").hide();
                    $("#3x6_backWall").hide();
                } else if (val == "3x4") {
                    $("#size3x3").hide();
                    $("#size3x4").show();
                    $("#size3x6").hide();
                    $("#3x3_backWall").hide();
                    $("#3x4_backWall").show();
                    $("#3x6_backWall").hide();
                } else if (val == "3x6") {
                    $("#size3x3").hide();
                    $("#size3x4").hide();
                    $("#size3x6").show();
                    $("#3x3_backWall").hide();
                    $("#3x4_backWall").hide();
                    $("#3x6_backWall").show();
                }

            });
        });




        document.addEventListener('DOMContentLoaded', function() {
            var setCanvaCheck = '';
            let activeCanvas = null;
            let designs3 = @json($design);

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
                canvasBackWall3x3: new fabric.Canvas('canvasBackWall3x3'),
                canvasBackWall3x4: new fabric.Canvas('canvasBackWall3x4'),
                canvasBackWall3x6: new fabric.Canvas('canvasBackWall3x6'),
                tableTop: new fabric.Canvas('tableTop'),
                tableRight: new fabric.Canvas('tableRight'),
                tableBottom: new fabric.Canvas('tableBottom'),
                tableLeft: new fabric.Canvas('tableLeft'),
                tableCenter: new fabric.Canvas('tableCenter'),
                flagLeft: new fabric.Canvas('flagLeft'),
                flagRight: new fabric.Canvas('flagRight')
            };

            activeCanvas2 = canvases['canvasBottom'];;

            const pinkColor = 'rgba(243, 33, 124)'; // Pink color in RGBA
            const redColor = 'rgba(166, 23, 23)'; // Pink color in RGBA
            const blackColor = 'rgba(2 ,0 ,0)'
            for (const [key, canvas] of Object.entries(canvases)) {
                if (key === 'canvasBottomBlack' || key === 'canvasBottomBlack3x6' || key ===
                    'canvasRightBlack3x6' || key === 'canvasRightBlack3x4' || key === 'canvasBottomBlack3x4') {
                    canvas.setBackgroundColor(mainColor2, canvas.renderAll.bind(canvas));

                } else {
                    canvas.setBackgroundColor(pinkColor, canvas.renderAll.bind(canvas));
                }
            }





            document.querySelector(".nextBtn").addEventListener("click", function() {
                showTab(currentTab + 1);
                console.log("Next " + currentTab);
                if (currentTab == 1) {

                }
                const interval = setInterval(() => {
                    if (currentTab == 4 && appReadyTrue == 1) {
                        

                        clearInterval(interval);
                        $("#deleteSelected").hide();
                        $("#saveDesign").hide();
                        $("#centerObject").addClass('d-none');
                        const base64DataUrl = "{{ route('getBase64Data') }}";
                        app = document.getElementById("myIframe");



                        app.contentWindow.postMessage("size:" + firstSize, "*");
                        app.contentWindow.postMessage("mainColor1:" + mainColor1, "*");
                        app.contentWindow.postMessage("mainColor2:" + mainColor2, "*");
                        app.contentWindow.postMessage("lefWallStatus:" + lefWallStatus, "*");
                        app.contentWindow.postMessage("leftWallHeight:" + leftWallHeight, "*");
                        app.contentWindow.postMessage("rightWallStatus:" + rightWallStatus, "*");
                        app.contentWindow.postMessage("rightWallHeight:" + rightWallHeight, "*");
                        app.contentWindow.postMessage("backWallStatus:" + backWallStatus, "*");
                        app.contentWindow.postMessage("table_box:" + table_box, "*");
                        app.contentWindow.postMessage("leftFlag:" + leftFlag, "*");
                        app.contentWindow.postMessage("rightFlag:" + rightFlag, "*");

                        // canvasBackWall3x6
                        function hideControlsForAllCanvases(canvases2) {
                            Object.values(canvases2).forEach(canvas => {
                                console.log("canvas", canvas)
                                canvas.discardActiveObject();

                                const objects = canvas.getObjects();
                                objects.forEach(obj => {
                                    if (obj.type === 'image' || obj.type ===
                                        'textbox'
                                    ) { // Check if the object is an image or text
                                        obj.set({
                                            hasControls: false, // Hide resizing/rotating controls
                                            hasBorders: false, // Hide borders
                                            selectable: false // Make object not selectable
                                        });
                                    }
                                });
                                canvas.renderAll();
                            });
                        }

                        // Call this function to hide controls on all canvases
                        hideControlsForAllCanvases(canvases);


                        const canvasIds = ['canvasBottom', 'canvasBottomBlack', 'canvasRight3x4',
                            'canvasRightBlack3x4', 'canvasBottom3x4', 'canvasBottomBlack3x4',
                            'canvasRight3x6', 'canvasRightBlack3x6', 'canvasBottom3x6',
                            'canvasBottomBlack3x6', 'tableTop', 'tableRight', 'tableCenter',
                            'tableLeft',
                            'tableBottom', 'flagLeft', 'flagRight', 'canvasLeftHalfWall',
                            'canvasLeftFullWall', 'canvasRightHalfWall', 'canvasRightFullWall',
                            'canvasBackWall3x3', 'canvasBackWall3x4',
                            'canvasBackWall3x6'
                        ];

                        // Object to store Base64 data for all canvases


                        // Iterate through each canvas ID
                        canvasIds.forEach((id, index) => {

                            // Get the canvas element by its ID
                            const canvas = document.getElementById(id);

                            if (canvas && canvas instanceof HTMLCanvasElement) {
                                // Get Base64 data for the canvas
                                try {
                                    const base64Data = getBase64FromCanvas(canvas, id);
                                    // console.log(`base64Data for ${id}`, base64Data);
                                    canvasData[id] =
                                        base64Data; // Store data with ID as key
                                } catch (error) {
                                    // console.error(`Error processing canvas with ID ${id}:`, error);
                                }
                            } else {
                                console.error(
                                    `Canvas with ID ${id} not found or is not an HTMLCanvasElement.`
                                );
                            }
                        });

                        // Function to convert a canvas to Base64-encoded data URL
                        function getBase64FromCanvas(canvas, id) {

                            if (!(canvas instanceof HTMLCanvasElement)) {
                                throw new Error('Provided element is not an HTMLCanvasElement.');
                            }
                            const tempCanvas = document.createElement('canvas');
                            tempCanvas.width = canvas.width;
                            tempCanvas.height = canvas.height;
                            const tempCtx = tempCanvas.getContext('2d');

                            if (!tempCtx) {
                                throw new Error('Failed to get 2D context from temporary canvas.');
                            }
                            tempCtx.drawImage(canvas, 0, 0);
                            return tempCanvas.toDataURL('image/png');
                        }

                        console.log("canvasData", canvasData);

                        // Post messages for each canvas separately
                        app.contentWindow.postMessage("canvasBottom:" + (canvasData.canvasBottom ||
                            ""), "*");
                        canvasBottomBase64 = canvasData.canvasBottom;
                        app.contentWindow.postMessage("canvasBottomBlack:" + (canvasData
                            .canvasBottomBlack ||
                            ""), "*");
                        canvasBottomBlackBase64 = canvasData.canvasBottomBlack;
                        app.contentWindow.postMessage("canvasRight3x4:" + (canvasData
                                .canvasRight3x4 || ""),
                            "*");
                        canvasRight3x4Base64 = canvasData.canvasRight3x4;
                        app.contentWindow.postMessage("canvasRightBlack3x4:" + (canvasData
                            .canvasRightBlack3x4 || ""), "*");
                        canvasRightBlack3x4Base64 = canvasData.canvasRightBlack3x4;
                        app.contentWindow.postMessage("canvasBottom3x4:" + (canvasData
                                .canvasBottom3x4 || ""),
                            "*");
                        canvasBottom3x4Base64 = canvasData.canvasBottom3x4;
                        app.contentWindow.postMessage("canvasBottomBlack3x4:" + (canvasData
                            .canvasBottomBlack3x4 || ""), "*");
                        canvasBottomBlack3x4Base64 = canvasData.canvasBottomBlack3x4;
                        app.contentWindow.postMessage("canvasRight3x6:" + (canvasData
                                .canvasRight3x6 || ""),
                            "*");
                        canvasRight3x6Base64 = canvasData.canvasRight3x6;
                        app.contentWindow.postMessage("canvasRightBlack3x6:" + (canvasData
                            .canvasRightBlack3x6 || ""), "*");
                        canvasRightBlack3x6Base64 = canvasData.canvasRightBlack3x6;
                        app.contentWindow.postMessage("canvasBottom3x6:" + (canvasData
                                .canvasBottom3x6 || ""),
                            "*");
                        canvasBottom3x6Base64 = canvasData.canvasBottom3x6;
                        app.contentWindow.postMessage("canvasBottomBlack3x6:" + (canvasData
                            .canvasBottomBlack3x6 || ""), "*");
                        canvasBottomBlack3x6Base64 = canvasData.canvasBottomBlack3x6;
                        app.contentWindow.postMessage("tableTop:" + (canvasData.tableTop || ""),
                            "*");
                        tableTopBase64 = canvasData.tableTop;
                        app.contentWindow.postMessage("tableRight:" + (canvasData.tableRight || ""),
                            "*");
                        tableRightBase64 = canvasData.tableRight;
                        app.contentWindow.postMessage("tableCenter:" + (canvasData.tableCenter ||
                            ""), "*");
                        tableCenterBase64 = canvasData.tableCenter;
                        app.contentWindow.postMessage("tableLeft:" + (canvasData.tableLeft || ""),
                            "*");
                        tableLeftBase64 = canvasData.tableLeft;
                        app.contentWindow.postMessage("tableBottom:" + (canvasData.tableBottom ||
                            ""), "*");
                        tableBottomBase64 = canvasData.tableBottom;
                        app.contentWindow.postMessage("flagLeft:" + (canvasData.flagLeft || ""),
                            "*");
                        flagLeftBase64 = canvasData.flagLeft;
                        app.contentWindow.postMessage("flagRight:" + (canvasData.flagRight || ""),
                            "*");
                        flagRightBase64 = canvasData.flagRight;
                        app.contentWindow.postMessage("canvasLeftHalfWall:" + (canvasData
                            .canvasLeftHalfWall ||
                            ""), "*");
                        canvasLeftHalfWallBase64 = canvasData.canvasLeftHalfWall;
                        app.contentWindow.postMessage("canvasLeftFullWall:" + (canvasData
                            .canvasLeftFullWall ||
                            ""), "*");
                        canvasLeftFullWallBase64 = canvasData.canvasLeftFullWall;
                        app.contentWindow.postMessage("canvasRightHalfWall:" + (canvasData
                            .canvasRightHalfWall || ""), "*");
                        canvasRightHalfWallBase64 = canvasData.canvasRightHalfWall;
                        app.contentWindow.postMessage("canvasRightFullWall:" + (canvasData
                            .canvasRightFullWall || ""), "*");
                        canvasRightFullWallBase64 = canvasData.canvasRightFullWall;
                        app.contentWindow.postMessage("canvasBackWall3x3:" + (canvasData
                            .canvasBackWall3x3 ||
                            ""), "*");
                        canvasBackWall3x3Base64 = canvasData.canvasBackWall3x3;
                        app.contentWindow.postMessage("canvasBackWall3x4:" + (canvasData
                            .canvasBackWall3x4 ||
                            ""), "*");
                        canvasBackWall3x4Base64 = canvasData.canvasBackWall3x4;
                        app.contentWindow.postMessage("canvasBackWall3x6:" + (canvasData
                            .canvasBackWall3x6 ||
                            ""), "*");
                        canvasBackWall3x6Base64 = canvasData.canvasBackWall3x6;

                        function enableControlsForAllCanvases(canvases) {
                            Object.values(canvases).forEach(canvas => {
                                const objects = canvas.getObjects();
                                objects.forEach(obj => {
                                    if (obj.type === 'image' || obj.type ===
                                        'textbox'
                                    ) { // Check if the object is an image or text
                                        obj.set({
                                            hasControls: true, // Show resizing/rotating controls
                                            hasBorders: true, // Show borders
                                            selectable: true // Make object selectable
                                        });
                                    }
                                });
                                canvas.renderAll();
                            });
                        }

                        // Call this function when you want to re-enable controls on all canvases
                        enableControlsForAllCanvases(canvases);
                        console.log('hahahahhahahhahaha');
                        

                    }
                }, 500);

            });
            document.querySelector(".backBtn").addEventListener("click", function() {

                showTab(currentTab - 1);
                if (currentTab < 4) {
                    $("#centerObject").removeClass('d-none');
                    $("#deleteSelected").show();
                    $("#saveDesign").show();
                }


            });

            // Function to set the active canvas
            window.switchActiveCanvas = function(areaId) {
                // alert("ss")
                const newActiveCanvas = canvases[areaId];
                if (newActiveCanvas && newActiveCanvas !== activeCanvas) {
                    if (activeCanvas) {
                        const previousCanvasElement = activeCanvas.getElement()
                            .parentNode; // Get the parent polygon container
                        previousCanvasElement.style.boxShadow = 'none'; // Remove the box shadow
                        previousCanvasElement.style.border = 'none'; // Remove the border
                        previousCanvasElement.style.backgroundColor =
                            ''; // Optionally reset the background color

                        activeCanvas.off('selection:created', updateProperties);
                        activeCanvas.off('selection:updated', updateProperties);
                    }

                    // Set the new active canvas
                    activeCanvas = newActiveCanvas;

                    const activeCanvasElement = activeCanvas.getElement()
                        .parentNode;
                    activeCanvasElement.style.border = '3px solid yellow';
                    setCanvaCheck = activeCanvas.getElement().id;
                    console.log(`Active canvas ID: ${activeCanvas.getElement().id}`);
                    // Attach event listeners to the new active canvas
                    activeCanvas.on('selection:created', updateProperties);
                    activeCanvas.on('selection:updated', updateProperties);
                    activeCanvas.on('object:selected', function(event) {
                        event.stopPropagation(); // Prevent re-activation on object click
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
                console.log("activeCanvas", activeCanvas)
                if (activeCanvas) {
                    activeCanvas.setBackgroundColor(rgbaColor, activeCanvas.renderAll.bind(
                        activeCanvas));
                }
            });
            

            

            let lastUploadedImageURL = null;
            
            
            document.getElementById('upload-button').addEventListener('change', function(e) {
                console.log("imageupload");
                
                console.log(e);
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imgObj = new Image();
                    imgObj.src = event.target.result;
                    lastUploadedImageURL = event.target.result;
                    quickie=document.getElementById('quickie')
                    quickie.src=lastUploadedImageURL;
                    imgObj.onload = function() {
                        const defaultWidth = 100;
                        const defaultHeight = (imgObj.height / imgObj.width) * defaultWidth;

                        const canvasWidth = activeCanvas.getWidth();
                        const canvasHeight = activeCanvas.getHeight();

                        const leftPosition = (canvasWidth - defaultWidth) / 2;
                        const topPosition = (canvasHeight - defaultHeight) / 2;

                        console.log('leftPosition => ' + leftPosition);
                        console.log('topPosition => ' + topPosition);
                        console.log('activeCanvas => ' + activeCanvas);

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
                e.target.value = '';
                $("#imageUploadModal").modal('hide')
            });

            document.getElementById('quickImageBtn').addEventListener('click',function () {
                if (!lastUploadedImageURL) {
                    alert('no image uploaded yet')
                    return;
                }

                imgObj=new Image()
                imgObj.src=lastUploadedImageURL;

                imgObj.onload=function(){
                    const defaultWidth=100;
                    const defaultHeight=(imgObj.height/imgObj.width)*defaultWidth

                    const canvasWidth=activeCanvas.getWidth()
                    const canvasHeight=activeCanvas.getHeight()

                    const leftPosition=(canvasWidth-defaultWidth)/2;
                    const topPosition=(canvasHeight-defaultHeight)/2;

                    const image= new fabric.Image(imgObj)
                    image.set({
                        left:leftPosition,
                        top:topPosition,
                        scaleX:defaultWidth/imgObj.width,
                        scaleY:defaultHeight/imgObj.height,
                        cornerColor:'blue',
                        hsControls:true,
                        hasBorders:true
                    })

                    if (activeCanvas) {
                        activeCanvas.add(image);
                        activeCanvas.setActiveObject(image);
                        activeCanvas.renderAll();
                    }
                }
            })



            function initializeCanvases() {
                let defaultImageUrl = '{{ asset('web/img/1.png') }}'; // Default image URL
                if (sessionStorage.getItem('image_url')) {
                    defaultImageUrl = sessionStorage.getItem('image_url');
                }

                console.log("sss", canvases.canvasBottom);
                // Set default image for specific canvases
                // addDefaultImage(canvases.canvasTop, defaultImageUrl);
                // addDefaultImage(canvases.canvasRight, defaultImageUrl);
                // addDefaultImage(canvases.canvasBottom, defaultImageUrl);
                // addDefaultImage(canvases.canvasLeft, defaultImageUrl);

                // addDefaultImage(canvases.canvasTop3x4, defaultImageUrl);
                // addDefaultImage(canvases.canvasRight3x4, defaultImageUrl);
                // addDefaultImage(canvases.canvasBottom3x4, defaultImageUrl);
                // addDefaultImage(canvases.canvasLeft3x4, defaultImageUrl);

                // addDefaultImage(canvases.canvasTop3x6, defaultImageUrl);
                // addDefaultImage(canvases.canvasRight3x6, defaultImageUrl);
                // addDefaultImage(canvases.canvasBottom3x6, defaultImageUrl);
                // addDefaultImage(canvases.canvasLeft3x6, defaultImageUrl);

                // addDefaultImage(canvases.canvasLeftHalfWall, defaultImageUrl);
                // addDefaultImage(canvases.canvasLeftFullWall, defaultImageUrl);
                // addDefaultImage(canvases.canvasRightHalfWall, defaultImageUrl);
                // addDefaultImage(canvases.canvasRightFullWall, defaultImageUrl);
                // addDefaultImage(canvases.canvasBackWall3x3, defaultImageUrl);
                // addDefaultImage(canvases.canvasBackWall3x4, defaultImageUrl);
                // addDefaultImage(canvases.canvasBackWall3x6, defaultImageUrl);

                // addDefaultImage(canvases.tableTop, defaultImageUrl);
                // addDefaultImage(canvases.tableRight, defaultImageUrl);
                // addDefaultImage(canvases.tableBottom, defaultImageUrl);
                // addDefaultImage(canvases.tableLeft, defaultImageUrl);
                // addDefaultImage(canvases.tableCenter, defaultImageUrl);

                // addDefaultImage(canvases.flagLeft, defaultImageUrl);
                // addDefaultImage(canvases.flagRight, defaultImageUrl);
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


                    const canvasWidth = activeCanvas.getWidth();
                    const canvasHeight = activeCanvas.getHeight();

                    const text = new fabric.Textbox(textString, {
                        fontSize: fontSize,
                        fontFamily: fontFamily,
                        fill: textColor,
                        originX: 'center',
                        originY: 'center',
                        editable: true,
                        textAlign: 'center',
                        width: canvasWidth -
                            20, // Set width close to canvas width, keeping some padding
                        noWrap: false // Enable text wrapping
                    });


                    // Center the text within the canvas
                    text.set({
                        left: canvasWidth / 2,
                        top: canvasHeight / 2
                    });

                    activeCanvas.add(text).setActiveObject(text);
                    document.getElementById('textString').value = "";
                    activeCanvas.renderAll();

                    // Update input field when text is selected
                    activeCanvas.on('selection:created', function(event) {
                        const selectedObject = event.selected[0];
                        if (selectedObject && selectedObject.type === 'textbox') {
                            document.getElementById('textString').value = selectedObject.text;
                            document.getElementById('fontSize').value = selectedObject.fontSize;
                            document.getElementById('fontFamily').value = selectedObject.fontFamily;
                            document.getElementById('textColor').value = selectedObject.fill;
                        }
                    });

                    // Update text properties on canvas when input fields change
                    document.getElementById('textString').addEventListener('input', function() {
                        const activeObject = activeCanvas.getActiveObject();
                        if (activeObject && activeObject.type === 'textbox') {
                            activeObject.set({
                                text: this.value
                            });
                            activeCanvas.renderAll();
                        }
                    });

                    document.getElementById('fontSize').addEventListener('input', function() {
                        const activeObject = activeCanvas.getActiveObject();
                        if (activeObject && activeObject.type === 'textbox') {
                            activeObject.set({
                                fontSize: parseInt(this.value)
                            });
                            activeCanvas.renderAll();
                        }
                    });

                    document.getElementById('fontFamily').addEventListener('input', function() {
                        const activeObject = activeCanvas.getActiveObject();
                        if (activeObject && activeObject.type === 'textbox') {
                            activeObject.set({
                                fontFamily: this.value
                            });
                            activeCanvas.renderAll();
                        }
                    });

                    document.getElementById('textColor').addEventListener('input', function() {
                        const activeObject = activeCanvas.getActiveObject();
                        if (activeObject && activeObject.type === 'textbox') {
                            activeObject.set({
                                fill: this.value
                            });
                            activeCanvas.renderAll();
                        }
                    });

                    // Alignment options
                    document.getElementById('alignCenter').addEventListener('click', function() {
                        const activeObject = activeCanvas.getActiveObject();
                        if (activeObject && activeObject.type === 'textbox') {
                            activeObject.set({
                                textAlign: 'center'
                            });
                            activeCanvas.renderAll();
                        }
                    });

                    document.getElementById('alignLeft').addEventListener('click', function() {
                        const activeObject = activeCanvas.getActiveObject();
                        if (activeObject && activeObject.type === 'textbox') {
                            activeObject.set({
                                textAlign: 'left'
                            });
                            activeCanvas.renderAll();
                        }
                    });

                    document.getElementById('alignRight').addEventListener('click', function() {
                        const activeObject = activeCanvas.getActiveObject();
                        if (activeObject && activeObject.type === 'textbox') {
                            activeObject.set({
                                textAlign: 'right'
                            });
                            activeCanvas.renderAll();
                        }
                    });

                    // Clear input fields when selection is cleared
                    activeCanvas.on('selection:cleared', function() {
                        document.getElementById('textString').value = "";
                        document.getElementById('fontSize').value = "";
                        document.getElementById('fontFamily').value = "";
                        document.getElementById('textColor').value = "#000000";
                    });
                }
            });





            document.getElementById('centerObject').addEventListener('click', function() {
                if (!activeCanvas) {
                    alert("No active canvas selected.");
                    console.error('No active canvas selected.');
                    return;
                }

                const activeObject = activeCanvas.getActiveObject();
                if (activeObject) {
                    const canvasWidth = activeCanvas.getWidth();
                    const canvasHeight = activeCanvas.getHeight();

                    if (activeObject.type === 'textbox') {
                        // Centering logic for text
                        const objectWidth = activeObject.width * activeObject.scaleX;
                        const objectHeight = activeObject.height * activeObject.scaleY;

                        const centerX = (canvasWidth - objectWidth) / 2;
                        const centerY = (canvasHeight - objectHeight) / 2;

                        activeObject.set({
                            left: centerX + (objectWidth / 2), // Adjust for center alignment
                            top: centerY + (objectHeight / 2) // Adjust for center alignment
                        });
                    } else if (activeObject.type === 'image') {
                        // Centering logic for image
                        const objectWidth = activeObject.width * activeObject.scaleX;
                        const objectHeight = activeObject.height * activeObject.scaleY;

                        const centerX = (canvasWidth - objectWidth) / 2;
                        const centerY = (canvasHeight - objectHeight) / 2;

                        activeObject.set({
                            left: centerX,
                            top: centerY
                        });
                    }

                    activeObject.setCoords(); // Update the object's coordinates
                    activeCanvas.renderAll(); // Render the canvas to reflect changes
                } else {
                    alert("No object selected to center.");
                    console.error('No object selected to center.');
                }
            });






            // Apply text properties to selected text object
            function updateProperties() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && (activeObject.type === 'textbox' || activeObject.type === 'text' ||
                        activeObject
                        .type === 'i-text')) {
                    document.getElementById('textString').value = activeObject.text;
                    document.getElementById('fontSize').value = activeObject.fontSize;
                    document.getElementById('fontFamily').value = activeObject.fontFamily;
                    document.getElementById('textColor').value = activeObject.fill;
                }
            }

            // Functionality for updating text properties
            document.getElementById('fontBold').addEventListener('click', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && (activeObject.type === 'textbox' || activeObject.type === 'text' ||
                        activeObject.type === 'i-text')) {
                    activeObject.set('fontWeight', activeObject.fontWeight === 'bold' ? 'normal' :
                        'bold');
                    activeCanvas.renderAll();
                }
            });

            document.getElementById('fontItalic').addEventListener('click', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && (activeObject.type === 'textbox' || activeObject.type === 'text' ||
                        activeObject.type === 'i-text')) {
                    activeObject.set('fontStyle', activeObject.fontStyle === 'italic' ? 'normal' :
                        'italic');
                    activeCanvas.renderAll();
                }
            });

            // Underline text
            document.getElementById('fontUnderline').addEventListener('click', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && (activeObject.type === 'textbox' || activeObject.type === 'text' ||
                        activeObject.type === 'i-text')) {
                    activeObject.set('underline', !activeObject.underline);
                    activeCanvas.renderAll();
                }
            });


            document.getElementById('fontLinethrough').addEventListener('click', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && (activeObject.type === 'textbox' || activeObject.type === 'text' ||
                        activeObject.type === 'i-text')) {
                    activeObject.set('linethrough', !activeObject.linethrough);
                    activeCanvas.renderAll();
                }
            });

            document.getElementById('textColor').addEventListener('change', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && (activeObject.type === 'textbox' || activeObject.type === 'text' ||
                        activeObject.type === 'i-text')) {
                    activeObject.set('fill', this.value);
                    activeCanvas.renderAll();
                }
            });

            document.getElementById('fontSize').addEventListener('input', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && (activeObject.type === 'textbox' || activeObject.type === 'text' ||
                        activeObject.type === 'i-text')) {
                    activeObject.set('fontSize', parseInt(this.value));
                    activeCanvas.renderAll();
                }
            });

            // document.getElementById('fontFamily').addEventListener('change', function() {
            //     const activeObject = activeCanvas.getActiveObject();
            //     if (activeObject && (activeObject.type === 'textbox' || activeObject.type === 'text' ||
            //             activeObject.type === 'i-text')) {
            //         activeObject.set('fontFamily', this.value);
            //         activeCanvas.renderAll();
            //     }
            // });

            document.getElementById('fontFamily').addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex]; // Get the selected option
                const selectedFont = selectedOption.value; // Get the font name
                const fontSrc = selectedOption.getAttribute('data-src'); // Get the font file path

                const activeObject = activeCanvas.getActiveObject(); // Get the active object on the canvas

                if (activeObject && (activeObject.type === 'textbox' || activeObject.type === 'text' ||
                        activeObject.type === 'i-text')) {
                    // Check if the font has a source (custom font)
                    if (fontSrc) {
                        const font = new FontFace(selectedFont,
                            `url(${fontSrc})`); // Dynamically load the font
                        font.load().then(function(loadedFont) {
                            document.fonts.add(loadedFont); // Add the font to the document
                            applyFontToCanvas(activeObject, selectedFont);
                        }).catch(function(error) {
                            console.error('Failed to load font:', error);
                        });
                    } else {
                        // Apply font directly if no `data-src` is provided
                        applyFontToCanvas(activeObject, selectedFont);
                    }
                }
            });

            // Helper function to apply font to the canvas object
            function applyFontToCanvas(object, fontFamily) {
                object.set('fontFamily', fontFamily);
                activeCanvas.renderAll(); // Re-render the canvas
            }


            document.getElementById('fontSearch').addEventListener('input', function() {
                const searchValue = this.value
                    .toLowerCase(); // Get the search input and convert to lowercase
                const fontDropdown = document.getElementById('fontFamily'); // Get the font dropdown
                const options = fontDropdown.options; // Get all options

                for (let i = 1; i < options.length; i++) { // Skip the first option (placeholder)
                    const option = options[i];
                    const fontName = option.text.toLowerCase(); // Get the font name in lowercase
                    if (fontName.includes(searchValue)) {
                        option.style.display = ''; // Show option if it matches the search
                    } else {
                        option.style.display = 'none'; // Hide option if it doesn't match
                    }
                }
            });


            document.getElementById('textTransform').addEventListener('change', function() {
                const activeObject = activeCanvas.getActiveObject();
                if (activeObject && (activeObject.type === 'textbox' || activeObject.type === 'text' ||
                        activeObject.type === 'i-text')) {
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
            let isObjectDeleted = false; // Flag to track deletion
            let copiedObject = null;


            document.addEventListener('keydown', function(event) {
                // Delete command (Delete key)
                if (event.key === 'Delete') {
                    const activeObjects = activeCanvas.getActiveObjects(); // Get all selected objects
                    if (activeObjects.length) {
                        isObjectDeleted = true; // Set flag when objects are deleted

                        // Loop through and remove each selected object
                        activeObjects.forEach(function(obj) {
                            activeCanvas.remove(obj);
                        });

                        activeCanvas.discardActiveObject(); // Deselect all objects after removal
                        activeCanvas.renderAll(); // Re-render canvas
                    }
                    $("#fontSize").val(25); // Example of resetting font size; modify as needed
                }

                // Copy command (Ctrl + C or Command + C)
                if ((event.ctrlKey || event.metaKey) && event.key === 'c') {
                    console.log("Copy command detected");
                    const activeObjects = activeCanvas.getActiveObjects();

                    if (activeObjects.length) {
                        copiedObjects = []; // Array to store copied objects

                        activeObjects.forEach(function(obj) {
                            obj.clone(function(clonedObject) {
                                clonedObject.originalLeft = obj
                                    .left; // Save the original left position
                                clonedObject.originalTop = obj
                                    .top; // Save the original top position
                                copiedObjects.push(clonedObject); // Store the cloned object
                                console.log("Copied Object:", clonedObject);
                            });
                        });
                    }
                }

                // Paste command (Ctrl + V or Command + V)
                if ((event.ctrlKey || event.metaKey) && event.key === 'v') {
                    console.log("Paste command detected");
                    if (copiedObjects && copiedObjects.length) {
                        // Calculate the bounding box of the copied objects
                        const groupBounds = calculateGroupBounds(copiedObjects);

                        // Get canvas center position
                        const canvasCenter = {
                            left: activeCanvas.getWidth() / 2,
                            top: activeCanvas.getHeight() / 2
                        };

                        // Calculate offset to center the group of objects
                        const offsetX = canvasCenter.left - (groupBounds.width / 2 + groupBounds.left);
                        const offsetY = canvasCenter.top - (groupBounds.height / 2 + groupBounds.top);

                        copiedObjects.forEach(function(copiedObject) {
                            copiedObject.clone(function(clonedObj) {
                                // Keep the relative position and apply the offset for centering
                                clonedObj.set({
                                    left: copiedObject.originalLeft + offsetX,
                                    top: copiedObject.originalTop + offsetY,
                                    evented: true
                                });

                                activeCanvas.add(
                                    clonedObj); // Add the cloned object to the canvas
                                activeCanvas.setActiveObject(clonedObj);
                                activeCanvas
                                    .renderAll(); // Re-render canvas with new object
                            });
                        });
                    }
                }

                // Select All command (Ctrl + A or Command + A)
                if ((event.ctrlKey || event.metaKey) && event.key === 'a') {
                    event.preventDefault(); // Prevent default select all behavior (e.g., for text)
                    selectAllObjects(); // Call the selectAllObjects function
                }
            });

            // Function to calculate the bounding box of a group of objects
            function calculateGroupBounds(objects) {
                let minLeft = Infinity;
                let minTop = Infinity;
                let maxRight = -Infinity;
                let maxBottom = -Infinity;

                objects.forEach(function(obj) {
                    const objBounds = obj.getBoundingRect();
                    if (objBounds.left < minLeft) minLeft = objBounds.left;
                    if (objBounds.top < minTop) minTop = objBounds.top;
                    if (objBounds.left + objBounds.width > maxRight) maxRight = objBounds.left + objBounds
                        .width;
                    if (objBounds.top + objBounds.height > maxBottom) maxBottom = objBounds.top + objBounds
                        .height;
                });

                return {
                    left: minLeft,
                    top: minTop,
                    width: maxRight - minLeft,
                    height: maxBottom - minTop
                };
            }

            // Function to select all objects on the canvas
            function selectAllObjects() {
                const allObjects = activeCanvas.getObjects(); // Get all objects on the canvas
                if (allObjects.length) {
                    // Clear the current selection
                    activeCanvas.discardActiveObject();

                    // Create an active selection for all objects
                    const selection = new fabric.ActiveSelection(allObjects, {
                        canvas: activeCanvas
                    });

                    // Set the active object to the selection
                    activeCanvas.setActiveObject(selection);

                    // Re-render the canvas with the selected objects
                    activeCanvas.renderAll();
                }
            }





            function copyCanvasDesign(sourceCanvasId, targetCanvasId) {
                var sourceCanvas = document.getElementById(sourceCanvasId);
                var targetCanvas = document.getElementById(targetCanvasId);

                if (sourceCanvas && targetCanvas) {
                    var sourceCtx = sourceCanvas.getContext('2d');
                    var targetCtx = targetCanvas.getContext('2d');

                    // Get dimensions of the source and target canvases
                    var sourceWidth = sourceCanvas.width;
                    var sourceHeight = sourceCanvas.height;
                    var targetWidth = targetCanvas.width;
                    var targetHeight = targetCanvas.height;

                    // Calculate the position to center the image
                    var x = (targetWidth - sourceWidth) / 2;
                    var y = (targetHeight - sourceHeight) / 2;

                    // Clear the target canvas
                    targetCtx.clearRect(0, 0, targetWidth, targetHeight);

                    // Draw the image from sourceCanvas to targetCanvas at calculated position
                    targetCtx.drawImage(sourceCanvas, x, y);
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

            let copyLeftWallChecked = false;
            let copyBackWallChecked = false;
            let copyBackWall3x4Checked = false;
            let copyBackWall3x6Checked = false;
            // Store the original design of canvasLeftHalfWall
            var originalCanvasRightHalfWallData = getCanvasData('canvasRightHalfWall');
            var originalCanvasRightFullWallData = getCanvasData('canvasRightFullWall');
            var originalCanvasBackWallData3x3 = getCanvasData('canvasBackWall3x3');
            var originalCanvasBackWallData3x4 = getCanvasData('canvasBackWall3x4');
            var originalCanvasBackWallData3x6 = getCanvasData('canvasBackWall3x6');

            // Event listener for the copy-left-wall checkbox
            if (document.getElementById('copy-left-wall')) {
                document.getElementById('copy-left-wall').addEventListener('change', function(event) {

                    var copy1 = "";
                    var copy2 = "";
                    var orginal = "";
                    if (leftWallHeight == "half") {
                        copy1 = "canvasLeftHalfWall";
                        copy2 = "canvasRightHalfWall";
                        orginal = originalCanvasRightHalfWallData;
                    } else if (leftWallHeight == "full") {
                        copy1 = "canvasLeftFullWall";
                        copy2 = "canvasRightFullWall";
                        orginal = originalCanvasRightFullWallData;
                    }
                    if (event.target.checked) {
                        copyLeftWallChecked = true;
                        copyCanvasDesign(copy1, copy2);
                    } else {
                        copyLeftWallChecked = false;
                        setCanvasData(copy2, orginal);
                    }
                });
            }



            const canvasLeftHalfWall = canvases.canvasLeftHalfWall;
            const canvasLeftFullWall = canvases.canvasLeftFullWall;

            // Listen for changes on canvasLeftHalfWall
            canvasLeftHalfWall.on('object:modified', function() {
                console.log('canvasLeftHalfWall modified');
                handleCanvasChange('canvasLeftHalfWall');
            });

            canvasLeftHalfWall.on('object:added', function() {
                console.log('Object added to canvasLeftHalfWall');
                handleCanvasChange('canvasLeftHalfWall');
            });

            canvasLeftHalfWall.on('object:removed', function() {
                console.log('Object removed from canvasLeftHalfWall');
                handleCanvasChange('canvasLeftHalfWall');
            });

            // Listen for changes on canvasLeftFullWall
            canvasLeftFullWall.on('object:modified', function() {
                console.log('canvasLeftFullWall modified');
                handleCanvasChange('canvasLeftFullWall');
            });

            canvasLeftFullWall.on('object:added', function() {
                console.log('Object added to canvasLeftFullWall');
                handleCanvasChange('canvasLeftFullWall');
            });

            canvasLeftFullWall.on('object:removed', function() {
                console.log('Object removed from canvasLeftFullWall');
                handleCanvasChange('canvasLeftFullWall');
            });

            // Listen for mouse click events on canvasLeftHalfWall
            canvasLeftHalfWall.on('mouse:down', function() {

                console.log('CanvasLeftHalfWall clicked');
                setTimeout(() => {
                    handleCanvasChange(
                        'canvasLeftHalfWall'); // Call function to handle change                
                }, 100);
            });

            // Listen for mouse click events on canvasLeftFullWall
            canvasLeftFullWall.on('mouse:down', function() {
                console.log('CanvasLeftFullWall clicked');
                setTimeout(() => {
                    handleCanvasChange(
                        'canvasLeftFullWall'); // Call function to handle change                
                }, 100);
                // handleCanvasChange('canvasLeftFullWall'); // Call function to handle change
            });

            function handleCanvasChange(changedCanvasKey) {
                let copy1 = "";
                let copy2 = "";

                if (changedCanvasKey === 'canvasLeftHalfWall') {
                    if (copyLeftWallChecked == true) {
                        console.log('Syncing canvasLeftHalfWall with canvasRightHalfWall');
                        copy1 = "canvasLeftHalfWall";
                        copy2 = "canvasRightHalfWall";
                        copyCanvasDesign(copy1, copy2);
                    }



                } else if (changedCanvasKey === 'canvasLeftFullWall') {
                    if (copyLeftWallChecked == true) {
                        console.log('Syncing canvasLeftFullWall with canvasRightFullWall');
                        copy1 = "canvasLeftFullWall";
                        copy2 = "canvasRightFullWall";
                        copyCanvasDesign(copy1, copy2);
                    }

                    if (copyBackWallChecked == true) {
                        console.log('Syncing canvasLeftHalfWall with canvasRightHalfWall');
                        copy1 = "canvasLeftFullWall";
                        copy2 = "canvasBackWall3x3";
                        copyCanvasDesign(copy1, copy2);
                    }

                    if (copyBackWall3x4Checked == true) {
                        console.log('Syncing canvasLeftHalfWall with canvasRightHalfWall');
                        copy1 = "canvasLeftFullWall";
                        copy2 = "canvasBackWall3x4";
                        copyCanvasDesign(copy1, copy2);
                    }
                    if (copyBackWall3x6Checked == true) {
                        console.log('Syncing canvasLeftHalfWall with canvasRightHalfWall');
                        copy1 = "canvasLeftFullWall";
                        copy2 = "canvasBackWall3x6";
                        copyCanvasDesign(copy1, copy2);
                    }

                }

            }

            var originalCanvasLeftFullWallData = getCanvasData('canvasLeftFullWall');

            document.getElementById('saveDesign').addEventListener('click', function() {
                $("#canvasBottom").click();
                if (!activeCanvas) return;




                function hideControlsForAllCanvases(canvases2) {
                    Object.values(canvases2).forEach(canvas => {
                        console.log("canvas", canvas)
                        canvas.discardActiveObject();


                        const objects = canvas.getObjects();
                        objects.forEach(obj => {
                            if (obj.type === 'image' || obj.type ===
                                'textbox') { // Check if the object is an image or text
                                obj.set({
                                    hasControls: false, // Hide resizing/rotating controls
                                    hasBorders: false, // Hide borders
                                    selectable: false // Make object not selectable
                                });
                            }
                        });
                        canvas.renderAll();
                    });
                }

                // Call this function to hide controls on all canvases
                hideControlsForAllCanvases(canvases);


                const canvasIds = ['canvasBottom', 'canvasBottomBlack', 'canvasRight3x4',
                    'canvasRightBlack3x4', 'canvasBottom3x4', 'canvasBottomBlack3x4',
                    'canvasRight3x6', 'canvasRightBlack3x6', 'canvasBottom3x6',
                    'canvasBottomBlack3x6', 'tableTop', 'tableRight', 'tableCenter', 'tableLeft',
                    'tableBottom', 'flagLeft', 'flagRight', 'canvasLeftHalfWall',
                    'canvasLeftFullWall', 'canvasRightHalfWall', 'canvasRightFullWall',
                    'canvasBackWall3x3', 'canvasBackWall3x4',
                    'canvasBackWall3x6'
                ];

                // Object to store Base64 data for all canvases


                // Iterate through each canvas ID
                canvasIds.forEach((id, index) => {

                    // Get the canvas element by its ID
                    const canvas = document.getElementById(id);

                    if (canvas && canvas instanceof HTMLCanvasElement) {
                        // Get Base64 data for the canvas
                        try {
                            const base64Data = getBase64FromCanvas(canvas, id);
                            // console.log(`base64Data for ${id}`, base64Data);
                            canvasData[id] = base64Data; // Store data with ID as key
                        } catch (error) {
                            // console.error(`Error processing canvas with ID ${id}:`, error);
                        }
                    } else {
                        console.error(
                            `Canvas with ID ${id} not found or is not an HTMLCanvasElement.`
                        );
                    }
                });
                // Function to convert a canvas to Base64-encoded data URL
                function getBase64FromCanvas(canvas, id) {

                    if (!(canvas instanceof HTMLCanvasElement)) {
                        throw new Error('Provided element is not an HTMLCanvasElement.');
                    }
                    const tempCanvas = document.createElement('canvas');
                    tempCanvas.width = canvas.width;
                    tempCanvas.height = canvas.height;
                    const tempCtx = tempCanvas.getContext('2d');

                    if (!tempCtx) {
                        throw new Error('Failed to get 2D context from temporary canvas.');
                    }
                    tempCtx.drawImage(canvas, 0, 0);
                    return tempCanvas.toDataURL('image/png');
                }
                canvasBottomBase64 = canvasData.canvasBottom;
                canvasBottomBlackBase64 = canvasData.canvasBottomBlack;
                canvasRight3x4Base64 = canvasData.canvasRight3x4;
                canvasRightBlack3x4Base64 = canvasData.canvasRightBlack3x4;
                canvasBottom3x4Base64 = canvasData.canvasBottom3x4;
                canvasBottomBlack3x4Base64 = canvasData.canvasBottomBlack3x4;
                canvasRight3x6Base64 = canvasData.canvasRight3x6;
                canvasRightBlack3x6Base64 = canvasData.canvasRightBlack3x6;
                canvasBottom3x6Base64 = canvasData.canvasBottom3x6;
                canvasBottomBlack3x6Base64 = canvasData.canvasBottomBlack3x6;
                tableTopBase64 = canvasData.tableTop;
                tableRightBase64 = canvasData.tableRight;
                tableCenterBase64 = canvasData.tableCenter;
                tableLeftBase64 = canvasData.tableLeft;
                tableBottomBase64 = canvasData.tableBottom;
                flagLeftBase64 = canvasData.flagLeft;
                flagRightBase64 = canvasData.flagRight;
                canvasLeftHalfWallBase64 = canvasData.canvasLeftHalfWall;
                canvasLeftFullWallBase64 = canvasData.canvasLeftFullWall;
                canvasRightHalfWallBase64 = canvasData.canvasRightHalfWall;
                canvasRightFullWallBase64 = canvasData.canvasRightFullWall;
                canvasBackWall3x3Base64 = canvasData.canvasBackWall3x3;
                canvasBackWall3x4Base64 = canvasData.canvasBackWall3x4;
                canvasBackWall3x6Base64 = canvasData.canvasBackWall3x6;

                function enableControlsForAllCanvases(canvases) {
                    Object.values(canvases).forEach(canvas => {
                        const objects = canvas.getObjects();
                        objects.forEach(obj => {
                            if (obj.type === 'image' || obj.type ===
                                'textbox') {
                                obj.set({
                                    hasControls: true,
                                    hasBorders: true,
                                    selectable: true
                                });
                            }
                        });
                        canvas.renderAll();
                    });
                }
                enableControlsForAllCanvases(canvases);




                let _token = $('meta[name="csrf-token"]').attr('content');
                const canvasDataValues = {};

                // Iterate over all canvases
                for (const [key, canvas] of Object.entries(canvases)) {
                    canvasDataValues[key] = canvas.toJSON(); // Save each canvas JSON
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('saveCanvasUpdate') }}",
                    data: {
                        _token: _token,
                        id: designs2.id,

                        select_size: firstSize,
                        mainColor1: mainColor1,
                        mainColor2: mainColor2,
                        lefWallStatus: lefWallStatus,
                        leftWallHeight: leftWallHeight,
                        rightWallStatus: rightWallStatus,
                        rightWallHeight: rightWallHeight,
                        backWallStatus: backWallStatus,
                        table_box: table_box,
                        leftFlag: leftFlag,
                        rightFlag: rightFlag,

                        canvasBottomBase64: canvasBottomBase64,
                        canvasBottomBlackBase64: canvasBottomBlackBase64,
                        canvasRight3x4Base64: canvasRight3x4Base64,
                        canvasRightBlack3x4Base64: canvasRightBlack3x4Base64,
                        canvasBottom3x4Base64: canvasBottom3x4Base64,
                        canvasBottomBlack3x4Base64: canvasBottomBlack3x4Base64,
                        canvasRight3x6Base64: canvasRight3x6Base64,
                        canvasRightBlack3x6Base64: canvasRightBlack3x6Base64,
                        canvasBottom3x6Base64: canvasBottom3x6Base64,
                        canvasBottomBlack3x6Base64: canvasBottomBlack3x6Base64,
                        tableTopBase64: tableTopBase64,
                        tableRightBase64: tableRightBase64,
                        tableCenterBase64: tableCenterBase64,
                        tableLeftBase64: tableLeftBase64,
                        tableBottomBase64: tableBottomBase64,
                        flagLeftBase64: flagLeftBase64,
                        flagRightBase64: flagRightBase64,
                        canvasLeftHalfWallBase64: canvasLeftHalfWallBase64,
                        canvasLeftFullWallBase64: canvasLeftFullWallBase64,
                        canvasRightHalfWallBase64: canvasRightHalfWallBase64,
                        canvasRightFullWallBase64: canvasRightFullWallBase64,
                        canvasBackWall3x3Base64: canvasBackWall3x3Base64,
                        canvasBackWall3x4Base64: canvasBackWall3x4Base64,
                        canvasBackWall3x6Base64: canvasBackWall3x6Base64,
                        canvasDataValues: JSON.stringify(canvasDataValues),

                        leftwall_switch: leftwall_switch,
                        rightwall_switch: rightwall_switch,
                        rightWallHeight: rightWallHeight,
                        leftWallHeight: leftWallHeight,
                        table_boxValue: table_boxValue,
                        left_flagValue: left_flagValue,
                        right_flagValue: right_flagValue,

                    },
                    success: function(data) {
                        alert('Success');

                    },
                });

            });

            function extractClipPathPoints(clipPath, width, height) {
                const points = [];
                if (clipPath.includes('polygon')) {
                    const coords = clipPath.match(/polygon\(([^)]+)\)/)[1].split(',').map(p => p.trim().split(
                        ' '));
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

            // if (sessionStorage.getItem('firstSize')) {
            //     firstSize = sessionStorage.getItem('firstSize');
            //     $("#select_size").val(firstSize);
            // }
            if (sessionStorage.getItem('mainColor1')) {
                mainColor1 = sessionStorage.getItem('mainColor1');
                $("#firstcolor").val(mainColor1);
            }
            if (sessionStorage.getItem('mainColor2')) {
                mainColor2 = sessionStorage.getItem('mainColor2');
                $("#secondcolor").val(mainColor2);

            }
            if (firstSize == "3x3") {

                switchActiveCanvas('canvasBottom')
            } else if (firstSize == "3x4") {
                switchActiveCanvas('canvasRight3x4')
            } else if (firstSize == "3x6") {
                switchActiveCanvas('canvasRight3x6')
            }

            $(".sizeFirst").click(function() {
                firstSize = $(this).val();

                if (firstSize == "3x3") {

                    switchActiveCanvas('canvasBottom')
                } else if (firstSize == "3x4") {
                    switchActiveCanvas('canvasRight3x4')
                } else if (firstSize == "3x6") {
                    switchActiveCanvas('canvasRight3x6')
                }
                sessionStorage.setItem('firstSize', firstSize);
            })


            $('#leftwall_switch').change(function() {
                lefWallStatus = $(this).is(':checked');
                console.log('lefWallStatus:', lefWallStatus);
            });

            $('#rightwall_switch').change(function() {
                rightWallStatus = $(this).is(':checked');
                console.log('rightWallStatus:', rightWallStatus);
            });
            $('.backwall_switch').change(function() {
                backWallStatus = $(this).is(':checked');
                console.log('backWallStatus:', backWallStatus);
            });
            

            
            
            // let currentBackWallStatus = designs2.backWallStatus;
            // This should be set before this script runs

            // Set the checkbox to match the initial value
            // if (currentBackWallStatus === true || currentBackWallStatus === 1 || currentBackWallStatus === "1") {
            //     $('.backwall_switch').prop('checked', true);
            // } else {
            //     $('.backwall_switch').prop('checked', false);
            //     console.log(currentBackWallStatus);
                
            // }

            // Allow changes by user
            // $('.backwall_switch').change(function () {
            //     backWallStatus = $(this).is(':checked');
            //     console.log('Updated backWallStatus:', backWallStatus);
            // });


            // $('.backwall_switch').prop('checked', backWallStatus1); // apply it on page load

            // Listen for changes
            // $('.backwall_switch').change(function () {
            //     // backWallStatus1 = $(this).is(':checked');
            //     console.log('backWallStatus:', backWallStatus1);
            //     console.log(backWallStatus1);
                
            // });
            
            

            $('#left_flag').change(function() {
                leftFlag = $(this).is(':checked');
                console.log('leftFlag:', leftFlag);
                if (leftFlag) {
                    left_flagValue = "on";
                    $("#flag_canvas_container_flagLeft").css('display', 'block');
                } else {
                    left_flagValue = "off";

                    $("#flag_canvas_container_flagLeft").css('display', 'none');
                }

            });
            $('#right_flag').change(function() {
                rightFlag = $(this).is(':checked');
                console.log('rightFlag:', rightFlag);
                if (rightFlag) {
                    right_flagValue = "on";
                    $("#flag_canvas_container_flagRight").css('display', 'block');
                } else {
                    right_flagValue = "off";

                    $("#flag_canvas_container_flagRight").css('display', 'none');
                }
            });
            $('#table_box').change(function() {
                table_box = $(this).is(':checked');

                if (table_box) {
                    table_boxValue = "on";
                    $("#table_canvas_container").css('display', 'block');
                } else {
                    table_boxValue = "off";

                    $("#table_canvas_container").css('display', 'none');
                }
                console.log('table_box:', table_box);
            });

            $(".halfLeftWall").click(function() {
                leftWallHeight = "half";
            })
            $(".fullLeftWall").click(function() {
                leftWallHeight = "full";
            })
            $(".halfRightWall").click(function() {
                rightWallHeight = "half";
            })
            $(".fullRightWall").click(function() {
                rightWallHeight = "full";
            })

            console.log("firstSize", firstSize)

            const canvasesToSetMainColor2 = [
                'canvasBottomBlack',
                'canvasRightBlack3x4',
                'canvasBottomBlack3x4',
                'canvasRightBlack3x6',
                'canvasBottomBlack3x6'
            ];

            // Loop through each canvas and set the background color
            for (const key in canvases) {
                const canvas = canvases[key];
                const color = canvasesToSetMainColor2.includes(key) ? mainColor2 :
                    mainColor1; // Set mainColor2 for specific canvases, else mainColor1
                canvas.setBackgroundColor(color, canvas.renderAll.bind(canvas));
            }
            $("#imageUploadModal").click(function(e) {
                $("#upload-button").click();
            })




            async function shareSocialMediaFunctions() {
                $("#canvasBottom").click();
                if (!activeCanvas) return;

                function hideControlsForAllCanvases(canvases2) {
                    Object.values(canvases2).forEach(canvas => {
                        console.log("canvas", canvas)
                        canvas.discardActiveObject();
                        // if (
                        //     canvas.lowerCanvasEl.id === "canvasBackWall3x3" ||
                        //     canvas.lowerCanvasEl.id === "canvasBackWall3x4" ||
                        //     canvas.lowerCanvasEl.id === "canvasBackWall3x6" ||
                        //     canvas.lowerCanvasEl.id === "canvasRightFullWall" ||
                        //     canvas.lowerCanvasEl.id === "canvasRightHalfWall"
                        // ) {
                        //     return;
                        // }

                        const objects = canvas.getObjects();
                        objects.forEach(obj => {
                            if (obj.type === 'image' || obj.type ===
                                'textbox') { // Check if the object is an image or text
                                obj.set({
                                    hasControls: false, // Hide resizing/rotating controls
                                    hasBorders: false, // Hide borders
                                    selectable: false // Make object not selectable
                                });
                            }
                        });
                        canvas.renderAll();
                    });
                }

                // Call this function to hide controls on all canvases
                hideControlsForAllCanvases(canvases);


                const canvasIds = ['canvasBottom', 'canvasBottomBlack', 'canvasRight3x4',
                    'canvasRightBlack3x4', 'canvasBottom3x4', 'canvasBottomBlack3x4',
                    'canvasRight3x6', 'canvasRightBlack3x6', 'canvasBottom3x6',
                    'canvasBottomBlack3x6', 'tableTop', 'tableRight', 'tableCenter', 'tableLeft',
                    'tableBottom', 'flagLeft', 'flagRight', 'canvasLeftHalfWall',
                    'canvasLeftFullWall', 'canvasRightHalfWall', 'canvasRightFullWall',
                    'canvasBackWall3x3', 'canvasBackWall3x4',
                    'canvasBackWall3x6'
                ];


                canvasIds.forEach((id, index) => {
                    const canvas = document.getElementById(id);
                    if (canvas && canvas instanceof HTMLCanvasElement) {
                        try {
                            const base64Data = getBase64FromCanvas(canvas, id);
                            canvasData[id] = base64Data; // Store data with ID as key
                        } catch (error) {}
                    } else {
                        console.error(
                            `Canvas with ID ${id} not found or is not an HTMLCanvasElement.`
                        );
                    }
                });
                // Function to convert a canvas to Base64-encoded data URL
                function getBase64FromCanvas(canvas, id) {

                    if (!(canvas instanceof HTMLCanvasElement)) {
                        throw new Error('Provided element is not an HTMLCanvasElement.');
                    }
                    const tempCanvas = document.createElement('canvas');
                    tempCanvas.width = canvas.width;
                    tempCanvas.height = canvas.height;
                    const tempCtx = tempCanvas.getContext('2d');

                    if (!tempCtx) {
                        throw new Error('Failed to get 2D context from temporary canvas.');
                    }
                    tempCtx.drawImage(canvas, 0, 0);
                    return tempCanvas.toDataURL('image/png');
                }
                canvasBottomBase64 = canvasData.canvasBottom;
                canvasBottomBlackBase64 = canvasData.canvasBottomBlack;
                canvasRight3x4Base64 = canvasData.canvasRight3x4;
                canvasRightBlack3x4Base64 = canvasData.canvasRightBlack3x4;
                canvasBottom3x4Base64 = canvasData.canvasBottom3x4;
                canvasBottomBlack3x4Base64 = canvasData.canvasBottomBlack3x4;
                canvasRight3x6Base64 = canvasData.canvasRight3x6;
                canvasRightBlack3x6Base64 = canvasData.canvasRightBlack3x6;
                canvasBottom3x6Base64 = canvasData.canvasBottom3x6;
                canvasBottomBlack3x6Base64 = canvasData.canvasBottomBlack3x6;
                tableTopBase64 = canvasData.tableTop;
                tableRightBase64 = canvasData.tableRight;
                tableCenterBase64 = canvasData.tableCenter;
                tableLeftBase64 = canvasData.tableLeft;
                tableBottomBase64 = canvasData.tableBottom;
                flagLeftBase64 = canvasData.flagLeft;
                flagRightBase64 = canvasData.flagRight;
                canvasLeftHalfWallBase64 = canvasData.canvasLeftHalfWall;
                canvasLeftFullWallBase64 = canvasData.canvasLeftFullWall;
                canvasRightHalfWallBase64 = canvasData.canvasRightHalfWall;
                canvasRightFullWallBase64 = canvasData.canvasRightFullWall;
                canvasBackWall3x3Base64 = canvasData.canvasBackWall3x3;
                canvasBackWall3x4Base64 = canvasData.canvasBackWall3x4;
                canvasBackWall3x6Base64 = canvasData.canvasBackWall3x6;

                function enableControlsForAllCanvases(canvases) {
                    Object.values(canvases).forEach(canvas => {
                        const objects = canvas.getObjects();
                        objects.forEach(obj => {
                            if (obj.type === 'image' || obj.type ===
                                'textbox') {
                                obj.set({
                                    hasControls: true,
                                    hasBorders: true,
                                    selectable: true
                                });
                            }
                        });
                        canvas.renderAll();
                    });
                }
                enableControlsForAllCanvases(canvases);



                const canvasDataValues = {};

                // Iterate over all canvases
                for (const [key, canvas] of Object.entries(canvases)) {
                    canvasDataValues[key] = canvas.toJSON(); // Save each canvas JSON
                }
                let _token = $('meta[name="csrf-token"]').attr('content');
                return new Promise((resolve, reject) => {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('saveCanvasUpdate') }}",
                        data: {
                            _token: _token,
                            id: designs2.id,

                            select_size: firstSize,
                            mainColor1: mainColor1,
                            mainColor2: mainColor2,
                            lefWallStatus: lefWallStatus,
                            leftWallHeight: leftWallHeight,
                            rightWallStatus: rightWallStatus,
                            rightWallHeight: rightWallHeight,
                            backWallStatus: backWallStatus,
                            table_box: table_box,
                            leftFlag: leftFlag,
                            rightFlag: rightFlag,

                            canvasBottomBase64: canvasBottomBase64,
                            canvasBottomBlackBase64: canvasBottomBlackBase64,
                            canvasRight3x4Base64: canvasRight3x4Base64,
                            canvasRightBlack3x4Base64: canvasRightBlack3x4Base64,
                            canvasBottom3x4Base64: canvasBottom3x4Base64,
                            canvasBottomBlack3x4Base64: canvasBottomBlack3x4Base64,
                            canvasRight3x6Base64: canvasRight3x6Base64,
                            canvasRightBlack3x6Base64: canvasRightBlack3x6Base64,
                            canvasBottom3x6Base64: canvasBottom3x6Base64,
                            canvasBottomBlack3x6Base64: canvasBottomBlack3x6Base64,
                            tableTopBase64: tableTopBase64,
                            tableRightBase64: tableRightBase64,
                            tableCenterBase64: tableCenterBase64,
                            tableLeftBase64: tableLeftBase64,
                            tableBottomBase64: tableBottomBase64,
                            flagLeftBase64: flagLeftBase64,
                            flagRightBase64: flagRightBase64,
                            canvasLeftHalfWallBase64: canvasLeftHalfWallBase64,
                            canvasLeftFullWallBase64: canvasLeftFullWallBase64,
                            canvasRightHalfWallBase64: canvasRightHalfWallBase64,
                            canvasRightFullWallBase64: canvasRightFullWallBase64,
                            canvasBackWall3x3Base64: canvasBackWall3x3Base64,
                            canvasBackWall3x4Base64: canvasBackWall3x4Base64,
                            canvasBackWall3x6Base64: canvasBackWall3x6Base64,
                            canvasDataValues: JSON.stringify(canvasDataValues),

                            leftwall_switch: leftwall_switch,
                            rightwall_switch: rightwall_switch,
                            rightWallHeight: rightWallHeight,
                            leftWallHeight: leftWallHeight,
                            table_boxValue: table_boxValue,
                            left_flagValue: left_flagValue,
                            right_flagValue: right_flagValue,

                        },
                        success: function(data) {
                            console.log("data", data.url)
                            resolve(data.url);


                        },
                    });
                });

            }

            $('#formSubmit').submit(function(event) {
                event.preventDefault();
                let _token = $('meta[name="csrf-token"]').attr('content');
                var design_name = $("#design_name").val();
                var design_email = $("#design_email").val();
                const canvasDataValues = {};

                // Iterate over all canvases
                for (const [key, canvas] of Object.entries(canvases)) {
                    canvasDataValues[key] = canvas.toJSON(); // Save each canvas JSON
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('formsubmitDesignUpdate') }}",
                    data: {
                        _token: _token,
                        id: designs2.design_config_id,
                        design_name: design_name,
                        design_email: design_email,


                        select_size: firstSize,
                        mainColor1: mainColor1,
                        mainColor2: mainColor2,
                        lefWallStatus: lefWallStatus,
                        leftWallHeight: leftWallHeight,
                        rightWallStatus: rightWallStatus,
                        rightWallHeight: rightWallHeight,
                        backWallStatus: backWallStatus,
                        table_box: table_box,
                        leftFlag: leftFlag,
                        rightFlag: rightFlag,

                        canvasBottomBase64: canvasBottomBase64,
                        canvasBottomBlackBase64: canvasBottomBlackBase64,
                        canvasRight3x4Base64: canvasRight3x4Base64,
                        canvasRightBlack3x4Base64: canvasRightBlack3x4Base64,
                        canvasBottom3x4Base64: canvasBottom3x4Base64,
                        canvasBottomBlack3x4Base64: canvasBottomBlack3x4Base64,
                        canvasRight3x6Base64: canvasRight3x6Base64,
                        canvasRightBlack3x6Base64: canvasRightBlack3x6Base64,
                        canvasBottom3x6Base64: canvasBottom3x6Base64,
                        canvasBottomBlack3x6Base64: canvasBottomBlack3x6Base64,
                        tableTopBase64: tableTopBase64,
                        tableRightBase64: tableRightBase64,
                        tableCenterBase64: tableCenterBase64,
                        tableLeftBase64: tableLeftBase64,
                        tableBottomBase64: tableBottomBase64,
                        flagLeftBase64: flagLeftBase64,
                        flagRightBase64: flagRightBase64,
                        canvasLeftHalfWallBase64: canvasLeftHalfWallBase64,
                        canvasLeftFullWallBase64: canvasLeftFullWallBase64,
                        canvasRightHalfWallBase64: canvasRightHalfWallBase64,
                        canvasRightFullWallBase64: canvasRightFullWallBase64,
                        canvasBackWall3x3Base64: canvasBackWall3x3Base64,
                        canvasBackWall3x4Base64: canvasBackWall3x4Base64,
                        canvasBackWall3x6Base64: canvasBackWall3x6Base64,

                        canvasDataValues: JSON.stringify(canvasDataValues),

                        leftwall_switch: leftwall_switch,
                        rightwall_switch: rightwall_switch,
                        rightWallHeight: rightWallHeight,
                        leftWallHeight: leftWallHeight,
                        table_boxValue: table_boxValue,
                        left_flagValue: left_flagValue,
                        right_flagValue: right_flagValue,


                    },
                    success: function(data) {

                        window.location.href = "https://eventbranding.co.uk/" + "your-design";

                    },
                });
            });


            // Get the social icons and add event listeners
            document.getElementById('facebookShare').addEventListener('click', async function() {
                if (!activeCanvas) {
                    console.error('No active canvas selected.');
                    return;
                }
                addIconToCanvas('facebook.png');
            });

            document.getElementById('whatsappShare').addEventListener('click', async function() {
                if (!activeCanvas) {
                    console.error('No active canvas selected.');
                    return;
                }
                addIconToCanvas('whatsapp.png');
            });

            document.getElementById('instagramShare').addEventListener('click', async function() {
                if (!activeCanvas) {
                    console.error('No active canvas selected.');
                    return;
                }
                addIconToCanvas('instagram.png');
            });

            document.getElementById('snapchatShare').addEventListener('click', async function() {
                if (!activeCanvas) {
                    console.error('No active canvas selected.');
                    return;
                }
                addIconToCanvas('snapchat.png');
            });

            document.getElementById('twitterShare').addEventListener('click', async function() {
                if (!activeCanvas) {
                    console.error('No active canvas selected.');
                    return;
                }
                addIconToCanvas('x-ixon.png');
            });

            document.getElementById('linkedinShare').addEventListener('click', async function() {
                if (!activeCanvas) {
                    console.error('No active canvas selected.');
                    return;
                }
                addIconToCanvas('linkedin.png');
            });

            // Function to add the icon to the active canvas
            function addIconToCanvas(iconName) {
                const canvasWidth = activeCanvas.getWidth();
                const canvasHeight = activeCanvas.getHeight();

                // Construct the URL for the icon dynamically in JavaScript
                const iconUrl = 'public/web/img/' + iconName;

                // Load the image corresponding to the icon
                fabric.Image.fromURL(iconUrl, function(img) {
                    // Set the image's properties
                    img.set({
                        left: canvasWidth / 2 - img.width / 2, // Center the image horizontally
                        top: canvasHeight / 2 - img.height / 2, // Center the image vertically
                        originX: 'center',
                        originY: 'center'
                    });

                    // Add the image to the canvas and make it the active object
                    activeCanvas.add(img).setActiveObject(img);
                    activeCanvas.renderAll();
                });
            }


            // Capture the color input element
            const colorPicker = document.getElementById('socialColor');

            // Listen for color changes
            colorPicker.addEventListener('input', function() {
                const color = colorPicker.value; // Get the selected color

                if (activeCanvas) {
                    const activeObject = activeCanvas.getActiveObject();

                    if (activeObject && activeObject.type === 'image') {
                        // Remove any existing filters first
                        activeObject.filters = [];

                        // Convert hex color to RGB
                        const rgb = hexToRgb(color);
                        const [r, g, b] = [rgb.r / 255, rgb.g / 255, rgb.b /
                            255
                        ]; // Normalize to 0-1 for ColorMatrix

                        // Apply the ColorMatrix filter to create a tint
                        const colorFilter = new fabric.Image.filters.ColorMatrix({
                            matrix: [
                                r, 0, 0, 0, 0,
                                0, g, 0, 0, 0,
                                0, 0, b, 0, 0,
                                0, 0, 0, 1, 0
                            ]
                        });

                        activeObject.filters.push(colorFilter);
                        activeObject.applyFilters();
                        activeCanvas.renderAll();
                    } else {
                        console.warn('No active image selected.');
                    }
                } else {
                    console.error('No active canvas selected.');
                }
            });

            // Helper function to convert hex color to RGB
            function hexToRgb(hex) {
                const bigint = parseInt(hex.slice(1), 16);
                return {
                    r: (bigint >> 16) & 255,
                    g: (bigint >> 8) & 255,
                    b: bigint & 255
                };
            }
            let designs = @json($design);
            leftwall_switch = designs.leftwall_switch;
            rightwall_switch = designs.rightwall_switch;
            rightWallHeight = designs.rightWallHeight2;
            leftWallHeight = designs.leftWallHeight2;
            table_boxValue = designs.table_boxValue;
            left_flagValue = designs.left_flagValue;
            right_flagValue = designs.right_flagValue;
            backWallStatus = (designs.backWallStatus === true || designs.backWallStatus === "true");

            setTimeout(() => {
            // Left Wall
            
            
            const leftWallChecked = (leftwall_switch === "leftWallShow");
            $("#leftwall_switch").prop("checked", leftWallChecked).trigger("change");
            if (leftWallChecked && leftWallHeight === "full") {
                $(".fullLeftWall").click();
            }

            // Right Wall
            const rightWallChecked = (rightwall_switch === "rightWallShow");
            $("#rightwall_switch").prop("checked", rightWallChecked).trigger("change");
            if (rightWallChecked && rightWallHeight === "full") {
                $(".fullRightWall").click();
            }
            
            
            
            console.log("Raw backWallStatus:", backWallStatus, typeof backWallStatus);
            
            // Back Wall
            $(".backwall_switch").prop("checked", backWallStatus).trigger("change");

            // Table Box
            const tableBoxChecked = (table_boxValue !== "off");
            $("#table_box").prop("checked", tableBoxChecked).trigger("change");

            // Left Flag
            const leftFlagChecked = (left_flagValue !== "off");
            $("#left_flag").prop("checked", leftFlagChecked).trigger("change");

            // Right Flag
            const rightFlagChecked = (right_flagValue !== "off");
            $("#right_flag").prop("checked", rightFlagChecked).trigger("change");
            }, 2000);

            // if(leftwall_switch == "")
            const canvasDataValues2 = JSON.parse(designs.canvasDataValues);

            // Iterate over all canvases and load the respective data
            for (const [key, canvasData] of Object.entries(canvasDataValues2)) {
                if (canvases[key]) { // Check if the canvas exists
                    canvases[key].loadFromJSON(canvasData, () => {
                        canvases[key].renderAll(); // Re-render the canvas after loading
                    });
                }
            }
        });
    </script>


</body>

</html>
