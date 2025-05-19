function openNav() {
    document.getElementById("sidebar").style.width = "320px";
    document.getElementById("overlay").classList.add("overlay-active");
}
function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("overlay").classList.remove("overlay-active");
}

function showContent(evt, contentName) {
    var i, tabContent, tabBtns;
    tabContent = document.getElementsByClassName("tabContent");
    for (i = 0; i < tabContent.length; i++) {
      tabContent[i].style.display = "none";
    }
    tabBtns = document.getElementsByClassName("tabBtns");
    for (i = 0; i < tabBtns.length; i++) {
      tabBtns[i].className = tabBtns[i].className.replace(" active", "");
    }
    document.getElementById(contentName).style.display = "block";
    evt.currentTarget.className += " active";
}

const showDashboard = document.querySelectorAll("#showDashboard");
const dashboardDiv = document.getElementById("dashboardDiv");
const dasignersCardsBox = document.querySelector(".dasignersCardsBox");
showDashboard.forEach(e => {
    e.addEventListener("click", () => {
        dashboardDiv.style.display === "block";
        dasignersCardsBox.style.display === "none";
    });    
});



// DASHBOARD PAGE JS
// Design Completed Chart
const ctx = document.getElementById('designCompletedChart').getContext('3d');
const designCompletedChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['10:30 AM', '11:30 AM', '12:30 AM', '01:30 PM', '02:30 PM', '03:30 PM'],
        datasets: [{
            label: 'Designs',
            data: [3000, 5000, 7000, 9000, 8000, 7546],
            borderColor: '#007bff',
            fill: false
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
// Time Limit Chart
const ctx2 = document.getElementById('timeLimitChart').getContext('2d');
const timeLimitChart = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Over 60 Mins', 'Under 60 Mins', 'Paused'],
        datasets: [{
            data: [36, 38, 25],
            backgroundColor: ['#dc3545', '#17a2b8', '#ffc107']
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutoutPercentage: 60
    }
});
// DASHBOARD PAGE JS