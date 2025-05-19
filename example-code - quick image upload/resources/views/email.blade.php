<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Match INC. Tansaction Coordination Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        :root {
            --main-color: #3D0605;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            user-select: none;
            font-family: "Poppins", sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        ul,
        ol,
        li {
            margin-bottom: 0 !important;
        }

        body {
            background-color: #f8fafc;
        }

        .topImgBox {
            height: 268px;
        }

        .topImg {
            width: 100%;
        }

        .contentMainBox {
            position: absolute;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);
            max-width: 691px;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .spacematchHdng {
            color: white;
            font-weight: 800;
            font-size: 20px;
            padding-left: 3px;
        }

        .tcsHdng {
            color: white;
            padding-top: 7px;
            font-weight: 800;
            font-size: 20px;
        }

        .tcsP {
            color: white;
            padding-top: 10px;
            font-weight: 300;
            font-size: 14px;
        }

        .customCard {
            margin-top: 9px;
            border: 1px solid #F2F5F9;
            border-radius: 10px;
            padding: 40px;
            width: 100%;
        }

        .ques1Btn {
            border: 1px solid var(--main-color);
            border-radius: 20px;
            padding: 8px 16px;
            width: max-content;
            font-weight: 500;
            font-size: 12px;
        }

        .ques1Li {
            padding-top: 16px;
            padding-bottom: 24px;
            font-weight: 600;
            font-size: 18px;
            /* text-align: left; */
        }

        .customCheckBox {
            height: 24px;
            width: 24px;
            border-radius: 4px;
            background-color: var(--main-color);
        }

        .form-check-input:checked {
            background-color: var(--main-color);
            border-color: var(--main-color);
        }

        .form-check-input:focus {
            box-shadow: none;
            border-color: var(--main-color);
        }

        .form-check-input:checked[type=radio] {
            --bs-form-check-bg-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m6 10 3 3 6-6'/%3e%3c/svg%3e");
        }

        .form-check-input[type=radio] {
            border-radius: .25em;
        }

        .customLabel {
            font-weight: 500;
            font-size: 16px;
            margin-left: 32px;
        }

        .secondCheck {
            margin-top: 40px;
        }

        .cartMt {
            margin-top: 24px;
        }

        .secondcustomCard {
            height: 627px;
        }

        .ques2BtnBox {
            display: flex;
            align-items: center;
            column-gap: 45px;
        }

        .customFormInput {
            font-weight: 400;
            font-size: 16px;
            color: black;
            border: 1px solid #F3F1FC;
            border-radius: 10px;
            padding: 16px 17px;
            box-shadow: 0px 20px 30px 0px #DCD5F033;
        }

        .customFormInput::placeholder {
            color: black;
        }

        .customFormInput:focus {
            box-shadow: none;
            border-color: lightgray;
        }

        .formFieldBox {
            display: flex;
            align-items: center;
            column-gap: 24px;
        }

        .secondformFieldBox {
            margin-top: 20px;
        }

        .customSelect {
            border: 1px solid black;
            width: max-content;
            margin-top: 24px;
            font-weight: 600;
            font-size: 18px;
        }

        .customSelect:focus {
            box-shadow: none;
            border-color: black;
        }

        .thirdFormChecks {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .allSellersBox {
            background-color: var(--main-color);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: 21px;
            margin-top: 20px;
            margin-bottom: 24px;
            padding: 16px;
            border-radius: 10px;
        }

        .allSellersP {
            font-weight: 400;
            font-size: 16px;
            margin-bottom: 0;
        }

        .allSellerCheckBox {
            background-color: white;
        }

        .allSellerCheckBox:checked {
            background-color: var(--main-color);
            border: 1px solid white;
        }

        .allSellerCheckBox:focus {
            box-shadow: none;
            border-color: var(--main-color);
        }

        .sellerOOR {
            margin-top: 20px;
        }

        .customFormInput2 {
            background-color: #f8fafc;
            width: 611px;
            height: 69px;
            padding: 0px 10px;
            border-radius: 10px;
            cursor: default;
            font-size: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #212529;
        }

        .customFormInput2:focus {
            box-shadow: none;
            border-color: lightgray;
            background-color: #f8fafc;
        }

        .ques7Input2 {
            margin-top: 29px;
        }

        .ques10SelectBox {
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: 24px;
        }

        .ques10SelectBoxes {
            width: 294px;
            height: 56px;
            border: 1px solid #F3F1FC;
            border-radius: 10px;
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 52px;
            box-shadow: 0px 20px 30px 0px #DCD5F033;
        }

        .ques10TickImgBox {
            position: absolute;
            left: 10px;
            display: none;
        }

        .ques10TickImgBox.active {
            display: block;
        }

        .ques10SelectBoxRow {
            margin-bottom: 20px;
        }

        .ques16Input {
            margin-left: 237px;
        }

        .ques16NoteBox {
            margin-top: 28px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            row-gap: 10px;
        }

        .dotloopLink {
            text-align: center;
            margin-top: 9px;
        }

        table {
            width: 100%;
        }




        /* IMAGE UPLOAD CSS */
        .containerUpload {
            box-shadow: 0px 20px 30px 0px #DCD5F033;
            border: 1px dashed black;
            border-radius: 10px;
        }

        .uploadInput input[type="file"] {
            display: none;
        }

        .uploadInput label {
            display: block;
            position: relative;
            font-size: 1.1em;
            text-align: center;
            width: 16em;
            padding: 1em 0;
            border-radius: 0.3em;
            cursor: pointer;
        }

        #image-display {
            position: relative;
            width: 90%;
            margin: 0 auto;
            display: flex;
            justify-content: space-evenly;
            gap: 1.25em;
            flex-wrap: wrap;
        }

        #image-display figure {
            width: 45%;
        }

        #image-display img {
            width: 100%;
        }

        #image-display figcaption {
            font-size: 0.8em;
            text-align: center;
            color: #5a5861;
        }

        .uploadActive {
            border: 0.2em solid #025bee;
        }

        #error {
            text-align: center;
            color: #ff3030;
        }

        /* IMAGE UPLOAD CSS */
    </style>
</head>

<body>
    <div class="main">
        <div class="topImgBox">
            <img src="{{ asset('img/top.png') }}" alt="" class="topImg">
        </div>
        <div class="contentMainBox">
            <div class="">
                <div class="d-flex align-items-end">
                    <div class="">
                        <img src="{{ asset('img/logo.png') }}" alt="" class="">
                    </div>
                    <h6 class="spacematchHdng">SPACEMATCH INC.</h6>
                </div>
                <h5 class="tcsHdng">TRANSACTION COORDINATION Services:</h5>
                <p class="tcsP">WELCOME TO THE SPACEMATCH INC. TRANSACTION COORDINATION SERVICES!</p>
            </div>


            <table>
                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques1Btn">
                            Question 1/16
                        </div>
                        <li class="ques1Li">Please provide the mls# or property address?</li>
                        <div class="formFieldBox sellerOOR">
                            <h3 class="customFormInput2">{{ $data['mls_number'] }}</h3>
                            <!-- <input type="text" class="form-control customFormInput2" id="" placeholder="Search Proprty Identification for Dotloop" readonly> -->
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="card customCard">
                        <div class="ques1Btn">
                            Question 2/16
                        </div>
                        <li class="ques1Li">Have you added Michael Kang as a team member and admin to
                            the loop you created for this property in dotloop?</li>
                        <div class="form-check">
                            <input class="form-check-input customCheckBox" type="radio" name="flexRadioDefault"
                                value="" id="" readonly <?php if($data['michael_kang'] == "Yes") echo "checked"; ?>>
                            <label class="form-check-label customLabel" for="">
                                Yes
                            </label>
                        </div>
                        <div class="form-check secondCheck">
                            <input class="form-check-input customCheckBox" type="radio" name="flexRadioDefault"
                                readonly <?php if($data['michael_kang'] == "No") echo "checked"; ?> id="">
                            <label class="form-check-label customLabel" for="">
                                No
                            </label>
                        </div>
                    </td>
                </tr>

                {{-- <tr>
                    <td class="card customCard cartMt">
                        <div class="formFieldBox">
                            <input type="text" class="form-control customFormInput" id=""
                                placeholder="Full Name" readonly value="{{$data['name1']}}">
                            <input type="email" class="form-control customFormInput" id=""
                                placeholder="Email Address" readonly value="{{$data['email1']}}">
                        </div>
                        <div class="formFieldBox secondformFieldBox">
                            <input type="number" class="form-control customFormInput" id=""
                                placeholder="Phone Number" readonly value="{{$data['number1']}}">
                            <input type="number" class="form-control customFormInput" id=""
                                placeholder="Current Address" readonly value="{{$data['address1']}}">
                        </div>
                    </td>
                </tr> --}}

                <tr>
                    <td class="card customCard secondcustomCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 3/16
                            </div>
                            <div class="ques1Btn">LINES, 2,524, 526, 528, and 530:THE PARTIES.</div>
                        </div>
                        <li class="ques1Li"> Please list all buyers details
                        </li>
                        @foreach ($data['name2'] as $key => $item)
                        <li class="ques1Li"> Buyer {{ $key + 1 }}
                        </li>
                        <div class="formFieldBox">
                            <input type="text" class="form-control customFormInput" id=""
                                placeholder="Full Name" readonly value="{{$data['name2'][$key]}}">
                            <input type="email" class="form-control customFormInput" id=""
                                placeholder="Email Address" readonly value="{{$data['email2'][$key]}}">
                        </div>
                        <div class="formFieldBox secondformFieldBox">
                            <input type="number" class="form-control customFormInput" id=""
                                placeholder="Phone Number" readonly value="{{$data['number2'][$key]}}">
                            <input type="text" class="form-control customFormInput" id=""
                                placeholder="Current Address" readonly value="{{$data['address2'][$key]}}">
                        </div>
                        @endforeach

                    </td>
                </tr>

                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 4/16
                            </div>
                            <div class="ques1Btn">SELLER’S CONTACT INFORMATION <br> LINES, 3,524, 526, 528, and 530:THE
                                PARTIES.
                            </div>
                        </div>
                        <li class="ques1Li">Do you know the full legal names of the sellers?</li>
                        <div class="thirdFormChecks">
                            <div class="form-check" style="width: 50%;">
                                <input class="form-check-input customCheckBox" type="radio"
                                    name="flexRadioDefault2" value="" id="" <?php if($data['legal_name'] == "Yes") echo "checked"; ?>>
                                <label class="form-check-label customLabel" for="">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check" style="width: 50%;">
                                <input class="form-check-input customCheckBox" type="radio"
                                    name="flexRadioDefault2" value="" id=""  <?php if($data['legal_name'] == "No") echo "checked"; ?>>
                                <label class="form-check-label customLabel" for="">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="formFieldBox">
                            <input type="text" class="form-control customFormInput" id=""
                                placeholder="Full Name" readonly value="{{ $data['name3'] }}">
                            <input type="email" class="form-control customFormInput" id=""
                                placeholder="Email Address" readonly value="{{ $data['email3'] }}">
                        </div>
                        <div class="formFieldBox secondformFieldBox">
                            <input type="number" class="form-control customFormInput" id=""
                                placeholder="Phone Number" readonly value="{{ $data['number3'] }}">
                            <input type="text" class="form-control customFormInput" id=""
                                placeholder="Current Address" readonly value="{{ $data['address3'] }}">
                        </div>
                        <div class="allSellersBox">
                            <div class="form-check">
                                <input class="form-check-input customCheckBox allSellerCheckBox" type="radio"
                                    value="" id="" readonly <?php if($data['seller_current_address'] == "Yes") echo "checked"; ?>>
                            </div>
                            <p class="allSellersP">"All sellers have the same current address."</p>
                        </div>
                        <li class="ques1Li p-0">WHO IS THE OWNER OF RECORD (OOR)?</li>
                        <div class="formFieldBox sellerOOR">
                            <input type="text" class="form-control customFormInput" id=""
                                placeholder="Enter (OOR) Name’" readonly value="{{ $data['oor'] }}">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 5/16
                            </div>
                            <div class="ques1Btn">LINES 4 AND 372: DUAL AGENCY </div>
                        </div>
                        <li class="ques1Li">Does dual agency apply for this transaction?If yes,provide the
                            name of the listing agent.</li>
                        <div class="thirdFormChecks">
                            <div class="form-check" style="width: 50%;">
                                <input class="form-check-input customCheckBox" type="radio"
                                    name="flexRadioDefault3" value="" id="" readonly <?php if($data['dual_agency'] == "Yes") echo "checked"; ?>>
                                <label class="form-check-label customLabel" for="">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check" style="width: 50%;">
                                <input class="form-check-input customCheckBox" type="radio"
                                    name="flexRadioDefault3" value="" id=""  readonly <?php if($data['dual_agency'] == "No") echo "checked"; ?>>
                                <label class="form-check-label customLabel" for="">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="formFieldBox sellerOOR">
                            <input type="text" class="form-control customFormInput" id=""
                                placeholder="Name of the LISTING Agent" readonly value="{{ $data['agent'] }}">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 6/16
                            </div>
                            <div class="ques1Btn">LINE 36: OFFER PRICE </div>
                        </div>
                        <li class="ques1Li">What is the offer price?</li>

                        <div class="formFieldBox sellerOOR">
                            <h3 class="customFormInput2">{{$data['offer_price']}}</h3>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 7/16
                            </div>
                            <div class="ques1Btn">LINE 41: CREDIT AT CLOSING </div>
                        </div>
                        <li class="ques1Li">What is the credit at closing(if applicable)?</li>
                        <div class="form-check">
                            <input class="form-check-input customCheckBox" type="checkbox" value=""
                                id="" readonly <?php if($data['credit_at_closing_radio'] == "Yes") echo "checked"; ?>>
                            <label class="form-check-label customLabel" for="">
                                Not Applicable
                            </label>
                        </div>

                        <div class="formFieldBox sellerOOR">
                            <h3 class="customFormInput2">{{ $data['credit_at_closing'] }}</h3>
                            <!-- <input type="text" class="form-control customFormInput2" id="" placeholder=""> -->
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 8/16
                            </div>
                            <div class="ques1Btn">LINE 42: EARNEST MONEY </div>
                        </div>
                        <li class="ques1Li pb-0">What is the earnest money amount?</li>
                        <div class="formFieldBox sellerOOR ques7Input2">
                            <h3 class="customFormInput2">{{ $data['earning_money_amount'] }}</h3>
                            <!-- <input type="text" class="form-control customFormInput2" id="" placeholder="Enter Earnest Money Amount"> -->
                        </div>
                        <li class="ques1Li pb-0">What is the secondary earnest money amount (if
                            applicable)?</li>
                        <div class="formFieldBox sellerOOR ques7Input2">
                            <h3 class="customFormInput2">{{ $data['secondary_amount'] }}</h3>
                            <!-- <input type="text" class="form-control customFormInput2" id="" placeholder="Enter Secondary Earnest Money Amount"> -->
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 9/16
                            </div>
                            <div class="ques1Btn">LINE 49: CLOSING DATE </div>
                        </div>
                        <li class="ques1Li pb-0"> What is the closing date?</li>
                        <div class="formFieldBox sellerOOR ques7Input2">
                            <h3 class="customFormInput2">{{ $data['closing_date'] }}</h3>
                            <!-- <input type="text" class="form-control customFormInput2" id="" placeholder=""> -->
                        </div>
                    </td>
                </tr>


                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 10/16
                            </div>
                            <div class="ques1Btn">LINES 60-61: LOAN CONTINGENCY </div>
                        </div>
                        <li class="ques1Li">What is the term of the loan?</li>
                        <div class="ques10SelectBox">
                            <div class="ques10SelectBoxes">
                                <div class="ques10TickImgBox  <?php if($data['term_of_loan'] == "Fixed") echo "active"; ?>">
                                    <img src="{{ asset('img/tick.png') }}" alt="" class="ques10TickImg">
                                </div>
                                <span class="">Fixed</span>
                            </div>
                            <div class="ques10SelectBoxes">
                                <div class="ques10TickImgBox <?php if($data['term_of_loan'] == "Adjustable") echo "active"; ?>">
                                    <img src="{{ asset('img/tick.png') }}" alt="" class="ques10TickImg">
                                </div>
                                <span class="">Adjustable</span>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 11/16
                            </div>
                            <div class="ques1Btn">LINES 60-61: LOAN CONTINGENCY </div>
                        </div>
                        <li class="ques1Li">What is the type of the loan?</li>
                        <div class="ques10SelectBox ques10SelectBoxRow">
                            <div class="ques10SelectBoxes">
                                <div class="ques10TickImgBox <?php if($data['type_of_loan'] == "USDA") echo "active"; ?>">
                                    <img src="{{ asset('img/tick.png') }}" alt="" class="ques10TickImg">
                                </div>
                                <span class="">USDA</span>
                            </div>
                            <div class="ques10SelectBoxes">
                                <div class="ques10TickImgBox <?php if($data['type_of_loan'] == "FHA") echo "active"; ?>">
                                    <img src="{{ asset('img/tick.png') }}" alt="" class="ques10TickImg">
                                </div>
                                <span class="">FHA</span>
                            </div>
                        </div>
                        <div class="ques10SelectBox ques10SelectBoxRow">
                            <div class="ques10SelectBoxes <?php if($data['type_of_loan'] == "Conventoinal") echo "active"; ?>">
                                <div class="ques10TickImgBox">
                                    <img src="{{ asset('img/tick.png') }}" alt="" class="ques10TickImg">
                                </div>
                                <span class="">Conventoinal</span>
                            </div>
                            <div class="ques10SelectBoxes">
                                <div class="ques10TickImgBox <?php if($data['type_of_loan'] == "VA") echo "active"; ?>">
                                    <img src="{{ asset('img/tick.png') }}" alt="" class="ques10TickImg">
                                </div>
                                <span class="">VA</span>
                            </div>
                        </div>
                        <div class="ques10SelectBoxes w-100">
                            <div class="ques10TickImgBox <?php if($data['type_of_loan'] == "Other") echo "active"; ?>">
                                <img src="{{ asset('img/tick.png') }}" alt="" class="ques10TickImg">
                            </div>
                            <span class="">Other</span>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 12/16
                            </div>
                            <div class="ques1Btn">LINES 62-63: LOAN CONTINGENCY </div>
                        </div>
                        <li class="ques1Li pb-0">What is the interest rate(in%)?</li>
                        <div class="formFieldBox sellerOOR ques7Input2">
                            <h3 class="customFormInput2">{{$data['interest_rate']}}</h3>
                            <!-- <input type="text" class="form-control customFormInput2" id="" placeholder=""> -->
                        </div>
                    </td>
                </tr>



                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 13/16
                            </div>
                            <div class="ques1Btn">LINES 112-115: DISCLOSURE FORMS</div>
                        </div>
                        <li class="ques1Li">Have you uploaded the disclosure forms?</li>
                        <div class="d-flex">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input customCheckBox" type="radio"
                                        name="flexRadioDefault5" value="" id="" readonly  <?php if($data['disclosure_form'] == "Yes") echo "checked"; ?>>
                                    <label class="form-check-label customLabel" for="">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check secondCheck">
                                    <input class="form-check-input customCheckBox" type="radio"
                                        name="flexRadioDefault5" value="" id="" readonly  <?php if($data['disclosure_form'] == "No") echo "checked"; ?>>
                                    <label class="form-check-label customLabel" for="">
                                        No
                                    </label>
                                </div>
                            </div>
                            {{-- <div class="ques16Input">
                                <div class="containerUpload">
                                    <div class="uploadInput">
                                        <input type="file" id="upload-button" multiple accept="image/*" />
                                        <label for="upload-button"><i class="fa-solid fa-upload"></i>Upload the form
                                            in Dotloop</label>
                                    </div>
                                    <div id="error"></div>
                                    <div id="image-display"></div>
                                </div>
                                <p class="dotloopLink">https://www.dotloop.com</p>
                            </div> --}}
                        </div>
                    </td>
                </tr>



                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 14/16
                            </div>
                            <div class="ques1Btn">LINES 378-379: SALE OF BUYER’S REAL ESTATE</div>
                        </div>
                        <li class="ques1Li">Does the buyer need to sell their house before making this
                            purchase ?If yes,what is the address of their existing home?</li>
                        <div class="d-flex">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input customCheckBox" type="radio" value=""
                                        id="" readonly <?php if($data['existing_house'] == "Yes") echo "checked"; ?>>
                                    <label class="form-check-label customLabel" for="">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check secondCheck">
                                    <input class="form-check-input customCheckBox" type="radio" value=""
                                        id="" readonly <?php if($data['existing_house'] == "No") echo "checked"; ?>>
                                    <label class="form-check-label customLabel" for="">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="ques16Input">
                                <div class="formFieldBox secondformFieldBox">
                                    <input type="text" class="form-control customFormInput" id=""
                                        placeholder=" Existing Home Address " readonly value="{{ $data['existing_email_address'] }}">
                                </div>
                            </div>
                        </div>

                        <div class="ques16NoteBox">
                            <h6 class="noteHdng">Note:</h6>
                            <p class="noteParar">(The information is required and needed for Lines 380-440 in the
                                contract.)</p>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 15/16
                            </div>
                            <div class="ques1Btn"> LINES 543, 545, and 547:BUYER’S ATTORNEY</div>
                        </div>
                        <li class="ques1Li"> Who is the buyers attorney?</li>
                        <div class="formFieldBox">
                            <input type="text" class="form-control customFormInput" id=""
                                placeholder="Who Is The Buyer’s Attorney" readonly value="{{ $data['buyer_attorny'] }}">
                        </div>
                        <div class="formFieldBox secondformFieldBox">
                            <input type="text" class="form-control customFormInput" id=""
                                placeholder="Current Address" readonly value="{{ $data['current_address'] }}">
                        </div>
                        <div class="formFieldBox secondformFieldBox">
                            <input type="email" class="form-control customFormInput" id=""
                                placeholder="Email Address" readonly value="{{ $data['buyer_attorny_email'] }}">
                            <input type="number" class="form-control customFormInput" id=""
                                placeholder="Phone Number" readonly value="{{ $data['buyer_attorny_phone'] }}">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="card customCard cartMt">
                        <div class="ques2BtnBox">
                            <div class="ques1Btn">
                                Question 16/16
                            </div>
                            <div class="ques1Btn">LINES 551 and 553:LOAN OFFICER</div>
                        </div>
                        <li class="ques1Li">Who is the loan officer?</li>
                        <div class="formFieldBox">
                            <input type="number" class="form-control customFormInput" id=""
                                placeholder="Phone Number" readonly value="{{ $data['loan_officer_phone'] }}">
                            <input type="email" class="form-control customFormInput" id=""
                                placeholder="Email Address" readonly value="{{ $data['loan_officer_email'] }}">
                        </div>
                    </td>
                </tr>


            </table>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
