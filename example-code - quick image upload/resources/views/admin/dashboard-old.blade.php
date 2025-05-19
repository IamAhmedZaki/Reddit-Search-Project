<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
</head>

<body style="background-color: #f8f9fa;">
    <div class="mainParent">

        <div class="mainParentInner">
            <div class="sidebar" id="sidebar">
                <div class="sideTabBox" id="">
                    <a href="#" class="sidebarCloseBtn" onclick="closeNav()">&times;</a>
                    <div class="tabBoxLogoDiv">
                        <h3 class="">SuperAdmin</h3>
                    </div>
                    <div class="tabBtnsBox">
                        <div class="tabBtns active" onclick="showContent(event, 'Designers')">
                            <a href="#" class="sideBarAnkers">
                                <img src="" alt="" class="tabImg">
                                <p class="tabImgTitle">Designers Insights</p>
                            </a>
                        </div>
                        <div class="tabBtns" onclick="showContent(event, 'Rankings')">
                            <a href="#" class="sideBarAnkers">
                                <img src="" alt="" class="tabImg">
                                <p class="tabImgTitle">Rankings</p>
                            </a>
                        </div>
                        <div class="tabBtns" onclick="showContent(event, 'Form')">
                            <a href="#" class="sideBarAnkers">
                                <img src="" alt="" class="tabImg">
                                <p class="tabImgTitle">Form</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-overlay" id="overlay" onclick="closeNav()"></div>

            <div class="dashContentBox">
                <span class="sidebarOpenBtn" onclick="openNav()">&#9776; Open</span>

                <div class="tabContent" id="Designers" style="display: block;">
                    <div class="d-flex justify-content-between align-items-center p-5 ps-1">
                        <h1 class="dashHdng">All Designer</h1>
                        <input type="date">
                    </div>

                    <div class="dasignersCardsBox">
                        <div class="dasignersCards">
                            <div class="card" style="width: 22rem;">
                                <img src="{{ asset('admin/img/designer.png') }}" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Ahmed Khan</h5>
                                    <p class="card-text">Junior Designer</p>
                                    <p class="card-text"><strong>Business Plan</strong></p>
                                    <button class="pinkBtn" id="showDashboard">View Insights</button>
                                </div>
                            </div>
                            <div class="card" style="width: 22rem;">
                                <img src="{{ asset('admin/img/designer.png') }}" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Ahmed Khan</h5>
                                    <p class="card-text">Junior Designer</p>
                                    <p class="card-text"><strong>Business Plan</strong></p>
                                    <button class="pinkBtn" id="showDashboard">View Insights</button>
                                </div>
                            </div>
                            <div class="card" style="width: 22rem;">
                                <img src="{{ asset('admin/img/designer.png') }}" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Ahmed Khan</h5>
                                    <p class="card-text">Junior Designer</p>
                                    <p class="card-text"><strong>Business Plan</strong></p>
                                    <button class="pinkBtn" id="showDashboard">View Insights</button>
                                </div>
                            </div>
                            <div class="card" style="width: 22rem;">
                                <img src="{{ asset('admin/img/designer.png') }}" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Ahmed Khan</h5>
                                    <p class="card-text">Junior Designer</p>
                                    <p class="card-text"><strong>Business Plan</strong></p>
                                    <button class="pinkBtn" id="showDashboard">View Insights</button>
                                </div>
                            </div>
                        </div>



                    </div>



                    <div id="dashboardDiv">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="info-box">
                                                <p>Projects</p>
                                                <h2>3</h2>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="info-box">
                                                <p>Designs</p>
                                                <h2>34</h2>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="info-box">
                                                <p>New</p>
                                                <h2>3</h2>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="info-box">
                                                <p>Storage</p>
                                                <h2>128/500 GB</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="designCompletedChart"></canvas>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="chart-container">
                                                <canvas id="timeLimitChart"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="plan-details">
                                                <h3>Plan Details</h3>
                                                <p>Teams Plan - $99/mo</p>
                                                <div class="rankprogress">
                                                    <div class="rankprogress-bar" role="rankprogressbar"
                                                        style="width: 33%;" aria-valuenow="33" aria-valuemin="0"
                                                        aria-valuemax="100">Projects: 1/3</div>
                                                </div>
                                                <div class="rankprogress">
                                                    <div class="rankprogress-bar" role="rankprogressbar"
                                                        style="width: 20%;" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100">Users: 1/5</div>
                                                </div>
                                                <div class="rankprogress">
                                                    <div class="rankprogress-bar" role="rankprogressbar"
                                                        style="width: 75%;" aria-valuenow="75" aria-valuemin="0"
                                                        aria-valuemax="100">Designs/day: 7500/10000</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="activity-log">
                                        <h3>Activity</h3>
                                        <div class="activity-item">
                                            <p><strong>James Anderson</strong> called "Books-API" with the JavaScript
                                                webhook and commented...</p>
                                        </div>
                                        <div class="activity-item">
                                            <p><strong>James Anderson</strong> called "Books-API" with the JavaScript
                                                webhook and commented...</p>
                                        </div>
                                        <div class="activity-item">
                                            <p><strong>James Anderson</strong> called "Books-API" with the JavaScript
                                                webhook and commented...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="tabContent py-5" id="Rankings">
                    <div class="container-fluid">
                        <h1 class="mb-4">Designer Leaderboard</h1>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-dark">Quantity of designs</button>
                                    <button type="button" class="btn btn-outline-dark">Time Taken</button>
                                </div>
                                <div class="mb-3 tableBtnsBox">
                                    <button type="button" class="tableTopBtns">Today</button>
                                    <button type="button" class="tableTopBtns">Yesterday</button>
                                    <button type="button" class="tableTopBtns">Last 7 days</button>
                                    <button type="button" class="tableTopBtns">Last 30 days</button>
                                    <button type="button" class="tableTopBtns">Last month</button>
                                    <input type="date" class="form-control-inline tableTopBtns">
                                    <!-- <input type="date" class="form-control-inline"> -->
                                </div>
                                <!-- <div class="mb-3">
                                </div> -->
                                <table class="table ranktable table-striped">
                                    <thead>
                                        <tr>
                                            <th class="firstTh" scope="col">Name</th>
                                            <th scope="col">Rank</th>
                                            <th scope="col">Area</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Day</th>
                                            <th class="lastTh" scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="rankbadge rankbadge-success">↑</span> Mr. Ahmed</td>
                                            <td>1st</td>
                                            <td>Sadar</td>
                                            <td>Karachi</td>
                                            <td>Wed Apr 5, 2023</td>
                                            <td>10:45.20 am</td>
                                        </tr>
                                        <tr>
                                            <td><span class="rankbadge rankbadge-success">↑</span> Mr. Ahmed</td>
                                            <td>2nd</td>
                                            <td>Sadar</td>
                                            <td>Karachi</td>
                                            <td>Wed Apr 5, 2023</td>
                                            <td>10:45.20 am</td>
                                        </tr>
                                        <tr>
                                            <td><span class="rankbadge rankbadge-danger">↓</span> Mr. Ahmed</td>
                                            <td>3rd</td>
                                            <td>Sadar</td>
                                            <td>Karachi</td>
                                            <td>Wed Apr 5, 2023</td>
                                            <td>10:45.20 am</td>
                                        </tr>
                                        <tr>
                                            <td><span class="rankbadge rankbadge-success">↑</span> Mr. Ahmed</td>
                                            <td>3rd</td>
                                            <td>Sadar</td>
                                            <td>Karachi</td>
                                            <td>Wed Apr 5, 2023</td>
                                            <td>10:45.20 am</td>
                                        </tr>
                                        <tr>
                                            <td class="firstTd"><span class="rankbadge rankbadge-danger">↓</span> Mr.
                                                Ahmed</td>
                                            <td>3rd</td>
                                            <td>Sadar</td>
                                            <td>Karachi</td>
                                            <td>Wed Apr 5, 2023</td>
                                            <td class="lastTd">10:45.20 am</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <div class="card px-5 py-3 mt-5">
                                    <h2>Average by Design</h2>
                                    <div class="plan-details">
                                        <div class="plan-icon">👥</div>
                                        <div class="plan-info">
                                            <h3>Teams Plan</h3>
                                            <p>$99/mo</p>
                                        </div>
                                    </div>
                                    <div class="progress-section">
                                        <div class="progress-item mb-4">
                                            <div class="d-flex justify-content-between px-2">
                                                <p class="mb-1">Projects</p>
                                                <span>1/3</span>
                                            </div>
                                            <div class="rankprogress-bar">
                                                <div class="rankprogress projects-progress"></div>
                                            </div>
                                        </div>
                                        <div class="progress-item mb-4">
                                            <div class="d-flex justify-content-between px-2">
                                                <p class="mb-1">Users</p>
                                                <span>1/5</span>
                                            </div>
                                            <div class="rankprogress-bar">
                                                <div class="rankprogress users-progress"></div>
                                            </div>

                                        </div>
                                        <div class="progress-item mb-4">
                                            <div class="d-flex justify-content-between px-2">
                                                <p class="mb-1">Designs/day</p>
                                                <span>7.5k/10k</span>
                                            </div>
                                            <div class="rankprogress-bar">
                                                <div class="rankprogress designs-progress"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="card rankcard">
                                    <div class="card-body">
                                        <h5 class="card-title rankcard-title">Average by Design</h5>
                                        <p class="card-text">Teams Plan - $99/mo</p>
                                        <div class="rankprogress mb-3">
                                            <div class="rankprogress-bar progress-bar" role="rankprogressbar progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">Projects: 1/3</div>
                                        </div>
                                        <div class="rankprogress mb-3">
                                            <div class="rankprogress-bar progress-bar" role="rankprogressbar progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Users: 1/5</div>
                                        </div>
                                        <div class="rankprogress mb-3">
                                            <div class="rankprogress-bar progress-bar" role="rankprogressbar progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Designs/day: 7500/10000</div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tabContent py-5" id="Form">
                    <h1 class="">Admin Form</h1>
                    <div class="container-fluid pe-5 mt-4">
                        <div class="card p-4">
                            <form>
                                <div class="row p-2">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" class="form-control" id=""
                                                placeholder="Jack Sullivan">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" class="form-control" id=""
                                                placeholder="jack.s@email.com">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">State</label>
                                            <select class="form-select">
                                                <option selected>Goa</option>
                                                <option value="1">Karachi</option>
                                                <option value="2">Mumbai</option>
                                                <option value="3">Islamabad</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Pincode</label>
                                            <input type="text" class="form-control" id=""
                                                placeholder="403001">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Phone No.</label>
                                            <input type="number" class="form-control" id=""
                                                placeholder="9876543210">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Date of birth</label>
                                            <input type="date" class="form-control" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end px-5">
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>

        </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('admin/script.js') }}"></script>
</body>

</html>
