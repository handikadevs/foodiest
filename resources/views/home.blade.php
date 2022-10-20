@extends('layouts.app')

@section('content')
<div class="u-body">
    <!-- Doughnut Chart -->
    <div class="row">
        <div class="col-sm-6 col-xl-3 mb-4">
            <div class="card">
                <div class="card-body media align-items-center px-xl-3">
                    <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                        <canvas class="js-doughnut-chart" width="70" height="70"
                                data-set="[65, 35]"
                                data-colors='[
              "#2972fa",
                                  "#f6f9fc"
                                ]'></canvas>

                        <div class="u-doughnut__label text-info">65</div>
                    </div>

                    <div class="media-body">
                        <h5 class="h6 text-muted text-uppercase mb-2">
                            Total Food <i class="fa fa-arrow-up text-success ml-1"></i>
                        </h5>
                        <span class="h2 mb-0">400</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4">
            <div class="card">
                <div class="card-body media align-items-center px-xl-3">
                    <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                        <canvas class="js-doughnut-chart" width="70" height="70"
                                data-set="[35, 65]"
                                data-colors='[
              "#fab633",
                                  "#f6f9fc"
                                ]'></canvas>

                        <div class="u-doughnut__label text-warning">35</div>
                    </div>

                    <div class="media-body">
                        <h5 class="h6 text-muted text-uppercase mb-2">
                            Total Cake <i class="fa fa-arrow-down text-danger ml-1"></i>
                        </h5>
                        <span class="h2 mb-0">200</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4">
            <div class="card">
                <div class="card-body media align-items-center px-xl-3">
                    <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                        <canvas class="js-doughnut-chart" width="70" height="70"
                                data-set="[60, 40]"
                                data-colors='[
              "#0dd157",
                                  "#f6f9fc"
                                ]'></canvas>

                        <div class="u-doughnut__label text-success">60</div>
                    </div>

                    <div class="media-body">
                        <h5 class="h6 text-muted text-uppercase mb-2">
                            Total Drink <i class="fa fa-arrow-up text-success ml-1"></i>
                        </h5>
                        <span class="h2 mb-0">250</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4">
            <div class="card">
                <div class="card-body media align-items-center px-xl-3">
                    <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                        <canvas class="js-doughnut-chart" width="70" height="70"
                                data-set="[25, 85]"
                                data-colors='[
              "#fb4143",
                                  "#f6f9fc"
                                ]'></canvas>

                        <div class="u-doughnut__label text-danger">25</div>
                    </div>

                    <div class="media-body">
                        <h5 class="h6 text-muted text-uppercase mb-2">
                            Total User <i class="fa fa-arrow-up text-danger ml-1"></i>
                        </h5>
                        <span class="h2 mb-0">800</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Doughnut Chart -->

    <!-- Overall Income -->
    <div class="card mb-4">
        <!-- Card Header -->
        <header class="card-header d-md-flex align-items-center">
            <h2 class="h3 card-header-title">Active Users</h2>

            <!-- Nav Tabs -->
            <ul id="overallIncomeTabsControl" class="nav nav-tabs card-header-tabs ml-md-auto mt-3 mt-md-0">
                <li class="nav-item mr-4">
                    <a class="nav-link active" href="#overallIncomeTab1" role="tab" aria-selected="true" data-toggle="tab">
                        <span class="d-none d-md-inline">Last</span>
                        7 days
                    </a>
                </li>
                <li class="nav-item mr-4">
                    <a class="nav-link" href="#overallIncomeTab2" role="tab" aria-selected="false" data-toggle="tab">
                        <span class="d-none d-md-inline">Last</span>
                        30 days
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#overallIncomeTab3" role="tab" aria-selected="false" data-toggle="tab">
                        <span class="d-none d-md-inline">Last</span>
                        90 days
                    </a>
                </li>
            </ul>
            <!-- End Nav Tabs -->
        </header>
        <!-- End Card Header -->

        <!-- Card Body -->
        <div class="card-body">
            <div class="tab-content" id="overallIncomeTabs">
                <!-- Tab Content -->
                <div class="tab-pane fade show active" id="overallIncomeTab1" role="tabpanel">
                    <div class="row">
                        <!-- Chart -->
                        <div class="col-md-9 mb-4 mb-md-0" style="min-height: 300px;">
                            <canvas class="js-overall-income-chart" width="1000" height="300"></canvas>
                        </div>
                        <!-- End Chart -->

                        <div class="col-md-3">
                            <!-- Total Income -->
                            <div>
                                <div class="media align-items-center">
                                    <div class="media-body d-flex align-items-baseline">
                                        <span class="u-indicator u-indicator--xxs bg-primary mr-2"></span>
                                        <h5 class="h6 text-muted text-uppercase mb-1">Total saved recept</h5>
                                    </div>

                                    <div class="d-flex align-items-center h4 text-success">
                                        <span>+9.5%</span>
                                        <span class="small">
                                            <i class="fa fa-arrow-up ml-2"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="h3 mb-0">5300</span>
                            </div>
                            <!-- End Total Income -->

                            <hr>

                            <!-- Total Installs -->
                            <div>
                                <div class="media align-items-center">
                                    <div class="media-body d-flex align-items-baseline">
                                        <span class="u-indicator u-indicator--xxs bg-secondary mr-2"></span>
                                        <h5 class="h6 text-muted text-uppercase mb-1">Total like recept</h5>
                                    </div>

                                    <div class="d-flex align-items-center h4 text-success">
                                        <span>+7.5%</span>
                                        <span class="small">
                                            <i class="fa fa-arrow-up ml-2"></i>
                                        </span>
                                    </div>
                                </div>

                                <span class="h3 mb-0">1600</span>
                            </div>
                            <!-- End Total Installs -->

                            <hr>

                            <!-- Active Users -->
                            <div>
                                <div class="media align-items-center">
                                    <div class="media-body d-flex align-items-baseline">
                                        <span class="u-indicator u-indicator--xxs bg-info mr-2"></span>
                                        <h5 class="h6 text-muted text-uppercase mb-1">total created recept</h5>
                                    </div>

                                    <div class="d-flex align-items-center h4 text-danger">
                                        <span>-3.5%</span>
                                        <span class="small">
                                            <i class="fa fa-arrow-down ml-2"></i>
                                        </span>
                                    </div>
                                </div>

                                <span class="h3 mb-0">1200</span>
                            </div>
                            <!-- End Active Users -->

                            <hr>

                            <a class="btn btn-block btn-outline-primary" href="#">Learn More</a>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->

                <!-- Tab Content -->
                <div class="tab-pane fade" id="overallIncomeTab2" role="tabpanel">
                    <div class="row">
                        <!-- Chart -->
                        <div class="col-md-9 mb-4 mb-md-0" style="min-height: 300px;">
                            <canvas class="js-overall-income-chart" width="1000" height="300"></canvas>
                        </div>
                        <!-- End Chart -->

                        <div class="col-md-3">
                            <!-- Total Income -->
                            <div>
                                <div class="media align-items-center">
                                    <div class="media-body d-flex align-items-baseline">
                                        <span class="u-indicator u-indicator--xxs bg-primary mr-2"></span>
                                        <h5 class="h6 text-muted text-uppercase mb-1">Total Income</h5>
                                    </div>

                                    <div class="d-flex align-items-center h4 text-success">
                                        <span>+10.4%</span>
                                        <span class="small">
                                            <i class="fa fa-arrow-up ml-2"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="h3 mb-0">$48,650</span>
                            </div>
                            <!-- End Total Income -->

                            <hr>

                            <!-- Total Installs -->
                            <div>
                                <div class="media align-items-center">
                                    <div class="media-body d-flex align-items-baseline">
                                        <span class="u-indicator u-indicator--xxs bg-secondary mr-2"></span>
                                        <h5 class="h6 text-muted text-uppercase mb-1">Total Installs</h5>
                                    </div>

                                    <div class="d-flex align-items-center h4 text-success">
                                        <span>+7.9%</span>
                                        <span class="small">
                                            <i class="fa fa-arrow-up ml-2"></i>
                                        </span>
                                    </div>
                                </div>

                                <span class="h3 mb-0">5,169,854</span>
                            </div>
                            <!-- End Total Installs -->

                            <hr>

                            <!-- Active Users -->
                            <div>
                                <div class="media align-items-center">
                                    <div class="media-body d-flex align-items-baseline">
                                        <span class="u-indicator u-indicator--xxs bg-info mr-2"></span>
                                        <h5 class="h6 text-muted text-uppercase mb-1">Active Users</h5>
                                    </div>

                                    <div class="d-flex align-items-center h4 text-danger">
                                        <span>-2.5%</span>
                                        <span class="small">
                                            <i class="fa fa-arrow-down ml-2"></i>
                                        </span>
                                    </div>
                                </div>

                                <span class="h3 mb-0">389,545</span>
                            </div>
                            <!-- End Active Users -->

                            <hr>

                            <a class="btn btn-block btn-outline-primary" href="#">Learn More</a>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->

                <!-- Tab Content -->
                <div class="tab-pane fade" id="overallIncomeTab3" role="tabpanel">
                    <div class="row">
                        <!-- Chart -->
                        <div class="col-md-9 mb-4 mb-md-0" style="min-height: 300px;">
                            <canvas class="js-overall-income-chart" width="1000" height="300"></canvas>
                        </div>
                        <!-- End Chart -->

                        <div class="col-md-3">
                            <!-- Total Income -->
                            <div>
                                <div class="media align-items-center">
                                    <div class="media-body d-flex align-items-baseline">
                                        <span class="u-indicator u-indicator--xxs bg-primary mr-2"></span>
                                        <h5 class="h6 text-muted text-uppercase mb-1">Total Income</h5>
                                    </div>

                                    <div class="d-flex align-items-center h4 text-success">
                                        <span>+12.8%</span>
                                        <span class="small">
                                            <i class="fa fa-arrow-up ml-2"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="h3 mb-0">$112,800</span>
                            </div>
                            <!-- End Total Income -->

                            <hr>

                            <!-- Total Installs -->
                            <div>
                                <div class="media align-items-center">
                                    <div class="media-body d-flex align-items-baseline">
                                        <span class="u-indicator u-indicator--xxs bg-secondary mr-2"></span>
                                        <h5 class="h6 text-muted text-uppercase mb-1">Total Installs</h5>
                                    </div>

                                    <div class="d-flex align-items-center h4 text-success">
                                        <span>+8.1%</span>
                                        <span class="small">
                                            <i class="fa fa-arrow-up ml-2"></i>
                                        </span>
                                    </div>
                                </div>

                                <span class="h3 mb-0">9,151,304</span>
                            </div>
                            <!-- End Total Installs -->

                            <hr>

                            <!-- Active Users -->
                            <div>
                                <div class="media align-items-center">
                                    <div class="media-body d-flex align-items-baseline">
                                        <span class="u-indicator u-indicator--xxs bg-info mr-2"></span>
                                        <h5 class="h6 text-muted text-uppercase mb-1">Active Users</h5>
                                    </div>

                                    <div class="d-flex align-items-center h4 text-danger">
                                        <span>-1.5%</span>
                                        <span class="small">
                                            <i class="fa fa-arrow-down ml-2"></i>
                                        </span>
                                    </div>
                                </div>

                                <span class="h3 mb-0">3252,191</span>
                            </div>
                            <!-- End Active Users -->

                            <hr>

                            <a class="btn btn-block btn-outline-primary" href="#">Learn More</a>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
        </div>
        <!-- End Card Body -->
    </div>
    <!-- End Overall Income -->

    </div>
    <!-- End Current Projects -->
</div>
@endsection
