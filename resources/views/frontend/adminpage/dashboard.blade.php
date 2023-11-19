@extends('frontend.adminpage.index')
@section('admin_content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="{{asset('detaildonate(css)/dashboardlayout.css')}}">

    <div class="container">
        <h1 style="font-weight: 700">Dashboard</h1>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-6 mt-5">
                <div class="card" style="width: 14rem; background: #039BE5;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mt-2">
                                <i class="fa-solid fa-users img-fluid" style="font-size: 50px; color: #ffffff"></i>
                            </div>
                            <div class="col-8 mt-1">
                                <div class="card-text textcard2">Total visitor</div>
                                <p class="card-text textcard">52,220</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mt-5">
                <div class="card" style="width: 14rem; background: #FDD835;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mt-2">
                                <i class="fa-solid fa-briefcase img-fluid" style="font-size: 50px; color: #ffffff"></i>
                            </div>
                            <div class="col-8 mt-1">
                                <div class="card-text textcard2">Total Project</div>
                                <p class="card-text textcard">50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="col-lg-3 col-md-6 col-6 mt-5">
                <div class="card" style="width: 14rem; background: #43A047;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mt-2">
                                <i class="fa-solid fa-money-check-dollar img-fluid" style="font-size: 50px; color: #ffffff"></i>
                            </div>
                            <div class="col-8 mt-1">
                                <div class="card-text textcard2">Total Donate</div>
                                <p class="card-text textcard">50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="col-lg-3 col-md-6 col-6 mt-5">
                <div class="card" style="width: 14rem; background: #E53935;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mt-2">
                                <i class="fa-solid fa-list-check img-fluid" style="font-size: 50px; color: #ffffff"></i>
                            </div>
                            <div class="col-8 mt-1">
                                <div class="card-text textcard2">Completed</div>
                                <p class="card-text textcard">20</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mt-3">
                <canvas id="chartone"></canvas>
            </div>
            <div class="col-lg-6 mt-3">
                <canvas id="charttwo"></canvas>
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
                        <input type="search" name="search" placeholder="Search By name" class="input-search"><button class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
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
    <script src="{{asset('js/chart.js')}}"></script>
@endsection
