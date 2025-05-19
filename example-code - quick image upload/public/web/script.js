let currentTab = 0;

var app = "";
var message = [];


let firstSize = '3x3';
let mainColor1 = '#ee0d6e';
let mainColor2 = '#000000';
let default_text = '';

let lefWallStatus = false;
let leftWallHeight = "half";
let rightWallStatus = false;
let rightWallHeight = "half";
let backWallStatus = false;
let leftFlag = true;
let table_box = true;
let rightFlag = true;
const canvasData = {};

// Load saved values from sessionStorage on page load
$(document).ready(function () {

console.log("Current URL: ", window.location.href);  // Log the full URL to check if it's as expected

if (!window.location.href.includes("edit_design")) {
    console.log("URL does not include 'edit_design'. Proceeding...");

    if (sessionStorage.getItem('firstSize')) {
        firstSize = sessionStorage.getItem('firstSize');
        $("#select_size").val(firstSize);
        console.log("First size set from sessionStorage: ", firstSize);
    }
} else {
          console.log("URL includes 'edit_design'. Skipping size setup...");
        
        var selectSizeValue = $("#select_size").val();  // Save the current value of the select element
          // Alert the current value of the select element
        firstSize = selectSizeValue;  // Set firstSize to the value from the select element
        console.log("First size from the select element: ", firstSize);

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

    if (sessionStorage.getItem('default_text')) {
        default_text = sessionStorage.getItem('default_text');
        // $("#secondcolor").val(mainColor2);

    }
    $(".sizeFirst").click(function () {
        firstSize = $(this).val();
        sessionStorage.setItem('firstSize', firstSize);
    })


    $('#leftwall_switch').change(function () {
        lefWallStatus = $(this).is(':checked');
        console.log('lefWallStatus:', lefWallStatus);
    });

    $('#rightwall_switch').change(function () {
        rightWallStatus = $(this).is(':checked');
        console.log('rightWallStatus:', rightWallStatus);
    });
    $('.backwall_switch').change(function () {
        backWallStatus = $(this).is(':checked');
        console.log('backWallStatus:', backWallStatus);
    });
    $('#left_flag').change(function () {
        leftFlag = $(this).is(':checked');
        console.log('leftFlag:', leftFlag);
    });
    $('#right_flag').change(function () {
        rightFlag = $(this).is(':checked');
        console.log('rightFlag:', rightFlag);
    });

    $(".halfLeftWall").click(function () {
        leftWallHeight = "half";
    })
    $(".fullLeftWall").click(function () {
        leftWallHeight = "full";
    })
    $(".halfRightWall").click(function () {
        rightWallHeight = "half";
    })
    $(".fullRightWall").click(function () {
        rightWallHeight = "full";
    })

    console.log("firstSize", firstSize)
    console.log("mainColor1", mainColor1)
    console.log("mainColor2", mainColor2)
});


function showTab(n) {
    var tabs = document.getElementsByClassName("tabContent");
    var tablinks = document.getElementsByClassName("tablinks");

    if (n >= tabs.length) n = tabs.length - 1;
    if (n < 0) n = 0;
    for (let i = 0; i < tabs.length; i++) {
        tabs[i].style.display = "none";
        if (tablinks[i]) tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    tabs[n].style.display = "block";
    if (tablinks[n]) tablinks[n].className += " active";
    if (n === tabs.length - 1) {
        document.querySelector(".nextBtn").classList.add("d-none");
        document.querySelector(".saveBtn").classList.remove("d-none");
    } else {
        document.querySelector(".nextBtn").classList.remove("d-none");
        document.querySelector(".saveBtn").classList.add("d-none");
    }
    currentTab = n;
}


window.onload = function () {
    showTab(currentTab); // Display the first tab by default
};



// Set Active Class
const parents = document.querySelectorAll('.parent');
parents.forEach(parent => {
    const childrenElements = parent.querySelectorAll('.children');
    childrenElements.forEach(child => {
        child.addEventListener('click', function () {
            childrenElements.forEach(el => {
                el.classList.remove('active');
            });
            this.classList.add('active');
        });
    });
});


function send_message() {
    var iframe = document.getElementById("myIframe");
    $.ajax({
        type: "GET",
        url: "{{ route('getBase64Data') }}",
        data: {},
        success: function (data) {
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
