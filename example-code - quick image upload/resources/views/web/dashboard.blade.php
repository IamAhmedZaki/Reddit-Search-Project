@extends('web.master.layout')


@section('content')
    <div class="tabContent" id="Designers" style="display: block;">
        <div class="d-flex justify-content-between align-items-center p-5 ps-1">
            <h1 class="dashHdng">All Designer</h1>
            <input type="date">
        </div>

        <div class="dasignersCardsBox">
            <div class="dasignersCards">
                @foreach ($designers as $designer)
                    <div class="card" style="width: 22rem;">
                        <img  src="{{ asset('profiles/' . $designer->profile_image) }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $designer->name }}</h5>
                            <p class="card-text">Junior Designer</p>
                            <p class="card-text"><strong>Business Plan</strong></p>
                            <button class="pinkBtn" id="showDashboard">View Insights</button>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="card" style="width: 22rem;">
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
                </div> --}}
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
                                        <div class="rankprogress-bar" role="rankprogressbar" style="width: 33%;"
                                            aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">Projects: 1/3</div>
                                    </div>
                                    <div class="rankprogress">
                                        <div class="rankprogress-bar" role="rankprogressbar" style="width: 20%;"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Users: 1/5</div>
                                    </div>
                                    <div class="rankprogress">
                                        <div class="rankprogress-bar" role="rankprogressbar" style="width: 75%;"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Designs/day:
                                            7500/10000</div>
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
@endsection
