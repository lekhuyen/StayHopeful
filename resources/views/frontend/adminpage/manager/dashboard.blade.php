@extends('frontend.adminpage.index')
@section('admin_content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('admincss/dashboardlayout.css') }}">

    <div class="container">
        <h1 style="font-weight: 700">Dashboard</h1>
        <div class="row">
            <div class="col-lg-6 col-xl-3 col-xxl-3 col-md-6 col-sm-12 mt-5">
                <div class="card"
                    style="width: 100%;height: 100%;background-color: #5856d6;
                background-image: linear-gradient(45deg, #5856d6 0%, #6f67db 100%);">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mt-2">
                                <i class="fa-solid fa-users img-fluid" style="font-size: 50px; color: #ffffff"></i>
                            </div>
                            <div class="col-8 mt-1">
                                <div class="card-text textcard2">Total visitor</div>
                                <p class="card-text textcard">52,220</p>
                            </div>
                            <div class="chart-dashboard">
                                <canvas id="chartone"></canvas>
                                <div class="chart-value"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" class="svg-inline--fa fa-caret-up fa-w-10 me-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" style="width: 10px; height: 20px;"><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg> 
                                    12.2%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-xxl-3 col-md-6 col-sm-12 mt-5">
                <div class="card"
                    style="width: 100%;height: 100%; background-color: #39f;
                background-image: linear-gradient(45deg, #39f 0%, #2982cc 100%);">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mt-2">
                                <i class="fa-solid fa-briefcase img-fluid" style="font-size: 50px; color: #ffffff"></i>
                            </div>
                            <div class="col-8 mt-1">
                                <div class="card-text textcard2">Total Project</div>
                                <p class="card-text textcard">50</p>
                            </div>
                            <div class="chart-dashboard">
                                <canvas id="charttwo"></canvas>
                                <div class="chart-value" style="background: #f77676; color: #d93737"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="svg-inline--fa fa-caret-down fa-w-10 me-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" style="width: 10px; height: 20px;">
                                    <path fill="currentColor" d="M288.662 160H31.338c-17.818 0-26.741 21.543-14.142 34.142l128.662 128.662c7.81 7.81 20.474 7.81 28.284 0l128.662-128.662C315.403 181.543 306.48 160 288.662 160z"></path>
                                  </svg>
                                    20.2%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-xxl-3 col-md-6 col-sm-12 mt-5">
                <div class="card"
                    style="width: 100%;height: 100%; background-color: #2eb85c;
                background-image: linear-gradient(45deg, #2eb85c 0%, #1b9e3e 100%);">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mt-2">
                                <i class="fa-solid fa-money-check-dollar img-fluid"
                                    style="font-size: 50px; color: #ffffff"></i>
                            </div>
                            <div class="col-8 mt-1">
                                <div class="card-text textcard2">Total Donate</div>
                                <p class="card-text textcard">50</p>
                            </div>
                            <div class="chart-dashboard">
                                <canvas id="chartthree"></canvas>
                                <div class="chart-value"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" class="svg-inline--fa fa-caret-up fa-w-10 me-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" style="width: 10px; height: 20px;"><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg> 
                                    9.2%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-xxl-3 col-md-6 col-sm-12 mt-5">
                <div class="card"
                    style="width: 100%;height: 100%;background-color: #e55353;
                background-image: linear-gradient(45deg, #e55353 0%, #d93737 100%);">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mt-2">
                                <i class="fa-solid fa-list-check img-fluid" style="font-size: 50px; color: #ffffff"></i>
                            </div>
                            <div class="col-8 mt-1">
                                <div class="card-text textcard2">Completed</div>
                                <p class="card-text textcard">20</p>
                            </div>
                            <div class="chart-dashboard">
                                <canvas id="chartfour"></canvas>
                                <div class="chart-value"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" class="svg-inline--fa fa-caret-up fa-w-10 me-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" style="width: 10px; height: 20px;"><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg> 
                                    16.2%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="bigchart">
                    <div class="flexbigchart">
                        <div class="textbigchart">Maintained Profits</div>
                        <div class="selectbigchart">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
                    </div>
                    <div class="bigchart-show">
                        <canvas id="chartbig"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 project-table">
                <div class="row">
                    <div class="col-lg-12 project-table-head">
                        <p class="mt-3">List Project</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-3 mt-3">
                        <input type="search" name="search" placeholder="Search By name" class="input-search"><button
                            class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 ">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Project Name</th>
                                    <th>Total</th>
                                    <th>Create_on</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Quỹ Từ Thiện</td>
                                    <td>5000 nghìn tỷ</td>
                                    <td>20-15/1999</td>
                                    <td>Not Complete</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Quỹ Từ Thiện</td>
                                    <td>5000 nghìn tỷ</td>
                                    <td>20-15/1999</td>
                                    <td>Not Complete</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Quỹ Từ Thiện</td>
                                    <td>5000 nghìn tỷ</td>
                                    <td>20-15/1999</td>
                                    <td>Not Complete</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Quỹ Từ Thiện</td>
                                    <td>5000 nghìn tỷ</td>
                                    <td>20-15/1999</td>
                                    <td>Not Complete</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Quỹ Từ Thiện</td>
                                    <td>5000 nghìn tỷ</td>
                                    <td>20-15/1999</td>
                                    <td>Not Complete</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Quỹ Từ Thiện</td>
                                    <td>5000 nghìn tỷ</td>
                                    <td>20-15/1999</td>
                                    <td>Not Complete</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/chart.js') }}"></script>
@endsection
