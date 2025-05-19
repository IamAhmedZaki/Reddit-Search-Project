<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Match INC. Tansaction Coordination Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
    <form method="POST" action="{{ route('send_mail') }}" enctype="multipart/form-data">
        @csrf
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
                            {{-- <div class="formFieldBox sellerOOR"> --}}
                            {{-- <h3 class="customFormInput2">Search Proprty identification for Dotloop</h3> --}}
                            <input type="text" class="form-control customFormInput2" id=""
                                placeholder="Search Proprty identification for Dotloop" name="mls_number">
                            {{-- </div> --}}
                        </td>
                    </tr>

                    <tr>
                        <td class="card customCard">
                            <div class="ques1Btn">
                                Question 2/16
                            </div>
                            <li class="ques1Li">Have you added Michael kang as a team memeber and admin to the loop you
                                craeted for this property in dotloop?</li>
                            <div class="form-check">
                                <input class="form-check-input customCheckBox" value="Yes" type="radio"
                                    name="michael_kang" value="" id="" checked>
                                <label class="form-check-label customLabel" for="">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check secondCheck">
                                <input class="form-check-input customCheckBox" value="No" type="radio"
                                    name="michael_kang" value="" id="">
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
                                    placeholder="Full Name" name="name1">
                                <input type="email" class="form-control customFormInput" id=""
                                    placeholder="Email Address" name="email1">
                            </div>
                            <div class="formFieldBox secondformFieldBox">
                                <input type="number" class="form-control customFormInput" id=""
                                    placeholder="Phone Number" name="number1">
                                <input type="text" class="form-control customFormInput" id=""
                                    placeholder="Current Address" name="address1">
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
                            <li class="ques1Li">Please list all buyers details
                            </li>
                            <div>
                                <div class="formFieldBox">
                                    <input type="text" class="form-control customFormInput" id=""
                                        placeholder="Full Name" name="name2[]">
                                    <input type="email" class="form-control customFormInput" id=""
                                        placeholder="Email Address" name="email2[]">
                                </div>
                                <div class="formFieldBox secondformFieldBox">
                                    <input type="number" class="form-control customFormInput" id=""
                                        placeholder="Phone Number" name="number2[]">
                                    <input type="text" class="form-control customFormInput" id=""
                                        placeholder="Current Address" name="address2[]">
                                </div>
                            </div>



                            <div id="additionalFields"></div>
                            <select class="form-select customSelect" name="buyers" id="buyersSelect">
                                <option selected>Add Buyers</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                        </td>
                    </tr>

                    <tr>
                        <td class="card customCard cartMt">
                            <div class="ques2BtnBox">
                                <div class="ques1Btn">
                                    Question 4/16
                                </div>
                                <div class="ques1Btn">SELLER’S CONTACT INFORMATION <br> LINES, 3,524, 526, 528, and
                                    530:THE
                                    PARTIES.
                                </div>
                            </div>
                            <li class="ques1Li">Do you know the full legal names of the sellers?</li>
                            <div class="thirdFormChecks">
                                <div class="form-check" style="width: 50%;">
                                    <input class="form-check-input customCheckBox legal_name" type="radio"
                                        name="legal_name" value="Yes" id="" checked>
                                    <label class="form-check-label customLabel" for="">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check" style="width: 50%;">
                                    <input class="form-check-input customCheckBox legal_name" type="radio"
                                        name="legal_name" value="No" id="">
                                    <label class="form-check-label customLabel" for="">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="formFieldBox legal_nameHidden">
                                <input type="text" class="form-control customFormInput" id=""
                                    placeholder="Full Name" name="name3">
                                <input type="email" class="form-control customFormInput" id=""
                                    placeholder="Email Address" name="email3">
                            </div>
                            <div class="formFieldBox secondformFieldBox legal_nameHidden">
                                <input type="number" class="form-control customFormInput" id=""
                                    placeholder="Phone Number" name="number3">
                                <input type="text" class="form-control customFormInput" id=""
                                    placeholder="Current Address" name="address3">
                            </div>
                            <div class="allSellersBox">
                                <div class="form-check">
                                    <input class="form-check-input customCheckBox allSellerCheckBox" value="Yes"
                                        type="checkbox" name="seller_current_address" id="" checked>
                                </div>
                                <p class="allSellersP">"All sellers have the same current address."</p>
                            </div>
                            <li class="ques1Li p-0">WHO IS THE OWNER OF RECORD (OOR)?</li>
                            <div class="formFieldBox sellerOOR">
                                <input type="text" class="form-control customFormInput" id=""
                                    placeholder="Enter (OOR) Name’" name="oor">
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
                                    <input class="form-check-input customCheckBox dual_agency" type="radio"
                                        name="dual_agency" value="Yes" id="" checked>
                                    <label class="form-check-label customLabel" for="">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check" style="width: 50%;">
                                    <input class="form-check-input customCheckBox dual_agency" type="radio"
                                        name="dual_agency" value="No" id="">
                                    <label class="form-check-label customLabel" for="">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="formFieldBox sellerOOR" id="dual_agencyHidden">
                                <input type="text" class="form-control customFormInput" id=""
                                    placeholder="Name of the LISTING Agent" name="agent">
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
                            <li class="ques1Li">What is the offer price? <span style="color: red;">*</span></li>

                            <div class="formFieldBox sellerOOR">
                                {{-- <h3 class="customFormInput2"></h3> --}}
                                <input type="number" class="form-control customFormInput2" id=""
                                    placeholder="" name="offer_price" required>
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
                                <input class="form-check-input customCheckBox credit_at_closing_radio  "
                                    type="checkbox" value="Yes" name="credit_at_closing_radio" id=""
                                    checked>
                                <label class="form-check-label customLabel" for="">
                                    Not Applicable
                                </label>
                            </div>

                            <div class="formFieldBox sellerOOR hidden" id="credit_at_closing_radioHidden">
                                {{-- <h3 class="customFormInput2"></h3> --}}
                                <input type="text" class="form-control customFormInput2" id=""
                                    placeholder="" name="credit_at_closing">
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
                            <li class="ques1Li pb-0">What is the earnest money amount? <span style="color: red;">*</span></li>
                            <div class="formFieldBox sellerOOR ques7Input2">
                                {{-- <h3 class="customFormInput2">Enter Earnest Money Amount</h3> --}}
                                <input type="number" class="form-control customFormInput2" id=""
                                    placeholder="Enter Earnest Money Amount" name="earning_money_amount" required>
                            </div>
                            <li class="ques1Li pb-0">What is the secondary earnest money amount (if
                                applicable)?
                            </li>
                            <div class="formFieldBox sellerOOR ques7Input2">
                                {{-- <h3 class="customFormInput2">Enter Secondary Earnest Money Amount</h3> --}}
                                <input type="number" class="form-control customFormInput2" id=""
                                    placeholder="Enter Secondary Earnest Money Amount" name="secondary_amount">
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
                            <li class="ques1Li pb-0">What is the closing date? <span style="color: red;">*</span></li>
                            <div class="formFieldBox sellerOOR ques7Input2">
                                {{-- <h3 class="customFormInput2"></h3> --}}
                                <input type="date" class="form-control customFormInput2" id=""
                                    placeholder="" name="closing_date" required>
                            </div>
                        </td>
                    </tr>

                    {{-- <tr>
                        <td class="card customCard cartMt">
                            <div class="ques2BtnBox">
                                <div class="ques1Btn">
                                    Question 10/16
                                </div>
                                <div class="ques1Btn">LINE 56: LOAN CONTINGENCY </div>
                            </div>
                            <li class="ques1Li">HAVE YOU UPLOADED THE PRE-APPROVAL LETTER OR PROOF OF FUNDS?</li>
                            <div class="d-flex">
                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input customCheckBox" type="radio"
                                            name="proof_of_funds" value="Yes" id="" checked>
                                        <label class="form-check-label customLabel" for="">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check secondCheck">
                                        <input class="form-check-input customCheckBox" type="radio"
                                            name="proof_of_funds" value="No" id="">
                                        <label class="form-check-label customLabel" for="">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="ques16Input">
                                    <div class="containerUpload">
                                        <div class="uploadInput">
                                            <input type="file" id="upload-button" name="proof_of_funds_file"
                                                multiple accept="image/*" />
                                            <label for="upload-button"><i class="fa-solid fa-upload"></i>Upload
                                                the
                                                form
                                                in Dotloop</label>
                                        </div>
                                        <div id="error"></div>
                                        <div id="image-display"></div>
                                    </div>
                                    <p class="dotloopLink">https://www.dotloop.com</p>
                                </div>
                            </div>
                        </td>
                    </tr> --}}

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
                                <div class="ques10SelectBoxes ps-2">
                                    <div class="form-check d-flex align-items-end">
                                        <input class="form-check-input customCheckBox customCheckBox2" type="radio"
                                            name="term_of_loan" value="Fixed" id="" checked required>
                                        <label class="form-check-label customLabel ms-0" for="">
                                            Fixed
                                        </label>
                                    </div>

                                </div>
                                <div class="ques10SelectBoxes ps-2">
                                    <div class="form-check d-flex align-items-end">
                                        <input class="form-check-input customCheckBox customCheckBox2" type="radio"
                                            name="term_of_loan" value="Adjustable" id="" required>
                                        <label class="form-check-label customLabel ms-0" for="">
                                            Adjustable
                                        </label>
                                    </div>

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
                                <div class="ques10SelectBoxes ps-2">
                                    <div class="form-check d-flex align-items-end">
                                        <input class="form-check-input customCheckBox customCheckBox2" type="radio"
                                            name="type_of_loan" value="USDA" id="" checked required>
                                        <label class="form-check-label customLabel ms-0" for="">
                                            USDA
                                        </label>
                                    </div>

                                </div>
                                <div class="ques10SelectBoxes ps-2">
                                    <div class="form-check d-flex align-items-end">
                                        <input class="form-check-input customCheckBox customCheckBox2" type="radio"
                                            name="type_of_loan" value="FHA" id="" required>
                                        <label class="form-check-label customLabel ms-0" for="">
                                            FHA
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="ques10SelectBox ques10SelectBoxRow">
                                <div class="ques10SelectBoxes ps-2">
                                    <div class="form-check d-flex align-items-end">
                                        <input class="form-check-input customCheckBox customCheckBox2" type="radio"
                                            name="type_of_loan" value="Conventoinal" id="" required>
                                        <label class="form-check-label customLabel ms-0" for="">
                                            Conventoinal
                                        </label>
                                    </div>

                                </div>
                                <div class="ques10SelectBoxes ps-2">
                                    <div class="form-check d-flex align-items-end">
                                        <input class="form-check-input customCheckBox customCheckBox2" type="radio"
                                            name="type_of_loan" value="VA" id="" required>
                                        <label class="form-check-label customLabel ms-0" for="">
                                            VA
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="ques10SelectBoxes w-100 ps-2">
                                <div class="form-check d-flex align-items-end">
                                    <input class="form-check-input customCheckBox customCheckBox2" type="radio"
                                        name="type_of_loan" value="Other" id="" required>
                                    <label class="form-check-label customLabel ms-0" for="">
                                        Other
                                    </label>
                                </div>

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
                            <input type="number" class="form-control customFormInput2" id=""
                                name="interest_rate" placeholder="">

                        </td>
                    </tr>

                    {{-- <tr>
                        <td class="card customCard cartMt">
                            <div class="ques2BtnBox">
                                <div class="ques1Btn">
                                    Question 13/19
                                </div>
                                <div class="ques1Btn">LINES 62-63: LOAN CONTINGENCY </div>
                            </div>
                            <li class="ques1Li pb-0"> WHAT IS THE DISCOUNT POINT PERCENTAGE, if any?</li>
                            <input type="text" class="form-control customFormInput2" id=""
                                name="discount_point_percentage" placeholder="">

                        </td>
                    </tr> --}}

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
                                            name="disclosure_form" value="Yes" id="" checked>
                                        <label class="form-check-label customLabel" for="">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check secondCheck">
                                        <input class="form-check-input customCheckBox" type="radio"
                                            name="disclosure_form" value="No" id="">
                                        <label class="form-check-label customLabel" for="">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="ques16Input">
                                    <div class="containerUpload">
                                        <div class="uploadInput">
                                            <input type="file" id="upload-button2" name="disclosure_form_file"
                                                multiple accept="image/*" />
                                            <label for="upload-button2"><i class="fa-solid fa-upload"></i>Upload
                                                the
                                                form
                                                in Dotloop</label>
                                        </div>
                                        <div id="error"></div>
                                        <div id="image-display2"></div>
                                    </div>
                                    <p class="dotloopLink">https://www.dotloop.com</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    {{--
                    <tr>
                        <td class="card customCard cartMt">
                            <div class="ques2BtnBox">
                                <div class="ques1Btn">
                                    Question 15/19
                                </div>
                                <div class="ques1Btn">LINE 122: PRORATIONS OF TAXES</div>
                            </div>
                            <li class="ques1Li pb-0">WHAT IS THE PERCENTAGE OF THE PRORATED <br> GENERAL REAL
                                ESTATE
                                TAXES?
                            </li>
                            <input type="text" class="form-control customFormInput2" id=""
                                name="proration_of_taxes" placeholder="">

                        </td>
                    </tr> --}}

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
                                        <input class="form-check-input customCheckBox existing_house" name="existing_house"
                                            type="radio" value="Yes" id="" checked>
                                        <label class="form-check-label customLabel" for="">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check secondCheck">
                                        <input class="form-check-input customCheckBox existing_house" name="existing_house"
                                            type="radio" value="No" id="">
                                        <label class="form-check-label customLabel" for="">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="ques16Input">
                                    <div class="formFieldBox secondformFieldBox">
                                        <input type="text" class="form-control customFormInput existing_houseHidden"
                                            name="existing_email_address" id=""
                                            placeholder=" Existing Home Address ">
                                    </div>
                                </div>
                            </div>

                            <div class="ques16NoteBox">
                                <h6 class="noteHdng">Note:</h6>
                                <p class="noteParar">(The information is required and needed for Lines 380-440 in
                                    the
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
                            <li class="ques1Li">Who is the buyers attorney?</li>
                            <div class="formFieldBox">
                                <input type="text" class="form-control customFormInput" id=""
                                    placeholder="Who Is The Buyer’s Attorney" name="buyer_attorny">
                            </div>
                            <div class="formFieldBox secondformFieldBox">
                                <input type="text" class="form-control customFormInput" id=""
                                    placeholder="Current Address" name="current_address">
                            </div>
                            <div class="formFieldBox secondformFieldBox">
                                <input type="email" class="form-control customFormInput" id=""
                                    placeholder="Email Address" name="buyer_attorny_email">
                                <input type="number" class="form-control customFormInput" id=""
                                    placeholder="Phone Number" name="buyer_attorny_phone">
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
                                    placeholder="Phone Number" name="loan_officer_phone">
                                <input type="email" class="form-control customFormInput" id=""
                                    placeholder="Email Address" name="loan_officer_email">
                            </div>
                        </td>
                    </tr>

                    {{-- <tr>
                        <td class="card customCard cartMt">
                            <div class="ques2BtnBox">
                                <div class="ques1Btn">
                                    Question 19/19
                                </div>
                                <div class="ques1Btn">MLS LISTING SHEET</div>
                            </div>
                            <li class="ques1Li">DID YOU UPLOAD THE MLS LISTING SHEET TO DOTLOOP?</li>
                            <div class="d-flex">
                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input customCheckBox" type="radio"
                                            name="mls_listing" value="Yes" id="" checked>
                                        <label class="form-check-label customLabel" for="">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check secondCheck">
                                        <input class="form-check-input customCheckBox" type="radio"
                                            name="mls_listing" value="No" id="">
                                        <label class="form-check-label customLabel" for="">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="ques16Input">
                                    <div class="containerUpload">
                                        <div class="uploadInput">
                                            <input type="file" name="mls_listing_file" id="upload-button3"
                                                multiple accept="image/*" />
                                            <label for="upload-button3"><i class="fa-solid fa-upload"></i>Upload
                                                the
                                                form
                                                in Dotloop</label>
                                        </div>
                                        <div id="error"></div>
                                        <div id="image-display3"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr> --}}
                    <tr>
                        <td class="card customCard cartMt">

                            <div class="d-flex">
                                <button
                                    style="padding: 10px;
    border-radius: 10px;
    color: white;
    border: none;
    background: #3D0605;"
                                    type="submit">Submit</button>
                            </div>
                        </td>
                    </tr>


                </table>

            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('script.js') }}"></script>
    <script>
        document.getElementById('buyersSelect').addEventListener('change', function() {
            const additionalFields = document.getElementById('additionalFields');
            additionalFields.innerHTML = ''; // Clear previous fields
            const numBuyers = parseInt(this.value);

            for (let i = 0; i < numBuyers; i++) {
                const fieldset = document.createElement('div');
                fieldset.classList.add('formFieldBox');
                fieldset.innerHTML = `
                   <div style="width: 100%; margin-top: 10px;">
                                <div class="formFieldBox">
                                    <input type="text" class="form-control customFormInput" id=""
                                        placeholder="Full Name" name="name2[]">
                                    <input type="email" class="form-control customFormInput" id=""
                                        placeholder="Email Address" name="email2[]">
                                </div>
                                <div class="formFieldBox secondformFieldBox">
                                    <input type="number" class="form-control customFormInput" id=""
                                        placeholder="Phone Number" name="number2[]">
                                    <input type="text" class="form-control customFormInput" id=""
                                        placeholder="Current Address" name="address2[]">
                                </div>
                            </div>
                `;
                additionalFields.append(fieldset);
            }
        });

        $(".dual_agency").click(function(e) {

            if ($(this).val() == "Yes") {
                $("#dual_agencyHidden").removeClass("hidden");
            } else {
                $("#dual_agencyHidden").addClass("hidden");

            }
        })
        $(".legal_name").click(function(e) {

            if ($(this).val() == "Yes") {
                $(".legal_nameHidden").removeClass("hidden");
            } else {
                $(".legal_nameHidden").addClass("hidden");

            }
        })
        $(".existing_house").click(function(e) {

            if ($(this).val() == "Yes") {
                $(".existing_houseHidden").removeClass("hidden");
            } else {
                $(".existing_houseHidden").addClass("hidden");

            }
        })
        $(".credit_at_closing_radio").click(function(e) {
            if ($(this).is(':checked')) {
                $("#credit_at_closing_radioHidden").addClass("hidden");
            } else {
                $("#credit_at_closing_radioHidden").removeClass("hidden");
            }
        });
    </script>
</body>

</html>
