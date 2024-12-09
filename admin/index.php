<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard analytics - Frest - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/dragula.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/widgets.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-analytics.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <?php include_once 'header.php';?>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
	<?php include_once 'sidebar.php';?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Dashboard Analytics Start -->
<section id="dashboard-analytics">
  <div class="row">
    <!-- Website Analytics Starts-->
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Website Analytics</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-body pb-1">
          <div class="d-flex justify-content-around align-items-center flex-wrap">
            <div class="user-analytics mr-2">
              <i class="bx bx-user mr-25 align-middle"></i>
              <span class="align-middle text-muted">Users</span>
              <div class="d-flex">
                <div id="radial-success-chart"></div>
                <h3 class="mt-1 ml-50">61K</h3>
              </div>
            </div>
            <div class="sessions-analytics mr-2">
              <i class="bx bx-trending-up align-middle mr-25"></i>
              <span class="align-middle text-muted">Sessions</span>
              <div class="d-flex">
                <div id="radial-warning-chart"></div>
                <h3 class="mt-1 ml-50">92K</h3>
              </div>
            </div>
            <div class="bounce-rate-analytics">
              <i class="bx bx-pie-chart-alt align-middle mr-25"></i>
              <span class="align-middle text-muted">Bounce Rate</span>
              <div class="d-flex">
                <div id="radial-danger-chart"></div>
                <h3 class="mt-1 ml-50">72.6%</h3>
              </div>
            </div>
          </div>
          <div id="analytics-bar-chart" class="my-75"></div>
        </div>
      </div>

    </div>
    <div class="col-xl-3 col-md-6 col-sm-12 dashboard-referral-impression">
      <div class="row">
        <!-- Referral Chart Starts-->
        <div class="col-xl-12 col-12">
          <div class="card">
            <div class="card-body text-center pb-0">
              <h2>$32,690</h2>
              <span class="text-muted">Referral 40%</span>
              <div id="success-line-chart"></div>
            </div>
          </div>
        </div>
        <!-- Impression Radial Chart Starts-->
        <div class="col-xl-12 col-12">
          <div class="card">
            <div class="card-body donut-chart-wrapper">
              <div id="donut-chart" class="d-flex justify-content-center"></div>
              <ul class="list-inline d-flex justify-content-around mb-0">
                <li> <span class="bullet bullet-xs bullet-primary mr-50"></span>Social</li>
                <li> <span class="bullet bullet-xs bullet-info mr-50"></span>Email</li>
                <li> <span class="bullet bullet-xs bullet-warning mr-50"></span>Search</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-12 col-sm-12">
      <div class="row">
        <!-- Conversion Chart Starts-->
        <div class="col-xl-12 col-md-6 col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between pb-xl-0 pt-xl-1">
              <div class="conversion-title">
                <h4 class="card-title">Conversion</h4>
                <p>60%
                  <i class="bx bx-trending-up text-success font-size-small align-middle mr-25"></i>
                </p>
              </div>
              <div class="conversion-rate">
                <h2>89k</h2>
              </div>
            </div>
            <div class="card-body text-center">
              <div id="bar-negative-chart" class="negative-bar-chart"></div>
            </div>
          </div>
        </div>
        <div class="col-xl-12 col-md-6 col-12">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                      <div class="avatar-content">
                        <i class="bx bx-user text-primary font-medium-2"></i>
                      </div>
                    </div>
                    <div class="total-amount">
                      <h5 class="mb-0">$38,566</h5>
                      <small class="text-muted">Conversion</small>
                    </div>
                  </div>
                  <div id="primary-line-chart"></div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <div class="avatar bg-rgba-warning m-0 p-25 mr-75 mr-xl-2">
                      <div class="avatar-content">
                        <i class="bx bx-dollar text-warning font-medium-2"></i>
                      </div>
                    </div>
                    <div class="total-amount">
                      <h5 class="mb-0">$53,659</h5>
                      <small class="text-muted">Income</small>
                    </div>
                  </div>
                  <div id="warning-line-chart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- Activity Card Starts-->
    <div class="col-xl-3 col-md-6 col-12 activity-card">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Activity</h4>
        </div>
        <div class="card-body pt-1">
          <div class="d-flex activity-content">
            <div class="avatar bg-rgba-primary m-0 mr-75">
              <div class="avatar-content">
                <i class="bx bx-bar-chart-alt-2 text-primary"></i>
              </div>
            </div>
            <div class="activity-progress flex-grow-1">
              <small class="text-muted d-inline-block mb-50">Total Sales</small>
              <small class="float-right">$8,125</small>
              <div class="progress progress-bar-primary progress-sm">
                <div class="progress-bar" role="progressbar" aria-valuenow="50" style="width:50%"></div>
              </div>
            </div>
          </div>
          <div class="d-flex activity-content">
            <div class="avatar bg-rgba-success m-0 mr-75">
              <div class="avatar-content">
                <i class="bx bx-dollar text-success"></i>
              </div>
            </div>
            <div class="activity-progress flex-grow-1">
              <small class="text-muted d-inline-block mb-50">Income Amount</small>
              <small class="float-right">$18,963</small>
              <div class="progress progress-bar-success progress-sm">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" style="width:80%"></div>
              </div>
            </div>
          </div>
          <div class="d-flex activity-content">
            <div class="avatar bg-rgba-warning m-0 mr-75">
              <div class="avatar-content">
                <i class="bx bx-stats text-warning"></i>
              </div>
            </div>
            <div class="activity-progress flex-grow-1">
              <small class="text-muted d-inline-block mb-50">Total Budget</small>
              <small class="float-right">$14,150</small>
              <div class="progress progress-bar-warning progress-sm">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" style="width:60%"></div>
              </div>
            </div>
          </div>
          <div class="d-flex mb-75">
            <div class="avatar bg-rgba-danger m-0 mr-75">
              <div class="avatar-content">
                <i class="bx bx-check text-danger"></i>
              </div>
            </div>
            <div class="activity-progress flex-grow-1">
              <small class="text-muted d-inline-block mb-50">Completed Tasks</small>
              <small class="float-right">106</small>
              <div class="progress progress-bar-danger progress-sm">
                <div class="progress-bar" role="progressbar" aria-valuenow="30" style="width:30%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Profit Report Card Starts-->
    <div class="col-xl-3 col-md-6 col-12 profit-report-card">
      <div class="row">
        <div class="col-md-12 col-sm-6">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="card-title">Profit Report</h4>
              <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
            </div>
            <div class="card-body d-flex justify-content-around">
              <div class="d-inline-flex mr-xl-2">
                <div id="profit-primary-chart"></div>
                <div class="profit-content ml-50 mt-50">
                  <h5 class="mb-0">$12k</h5>
                  <small class="text-muted">2020</small>
                </div>
              </div>
              <div class="d-inline-flex">
                <div id="profit-info-chart"></div>
                <div class="profit-content ml-50 mt-50">
                  <h5 class="mb-0">$64k</h5>
                  <small class="text-muted">2019</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-sm-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Registrations</h4>
            </div>
            <div class="card-body">
              <div class="d-flex align-items-end justify-content-around">
                <div class="registration-content mr-xl-1">
                  <h4 class="mb-0">56.3k</h4>
                  <i class="bx bx-trending-up success align-middle"></i>
                  <span class="text-success">12.8%</span>
                </div>
                <div id="registration-chart"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sales Chart Starts-->
    <div class="col-xl-3 col-md-6 col-12 sales-card">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div class="card-title-content">
            <h4 class="card-title">Sales</h4>
            <small class="text-muted">Calculated in last 7 days</small>
          </div>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-body">
          <div id="sales-chart" class="mb-2"></div>
          <div class="d-flex justify-content-between my-1">
            <div class="sales-info d-flex align-items-center">
              <i class='bx bx-up-arrow-circle text-primary font-medium-5 mr-50'></i>
              <div class="sales-info-content">
                <h6 class="mb-0">Best Selling</h6>
                <small class="text-muted">Sunday</small>
              </div>
            </div>
            <h6 class="mb-0">28.6k</h6>
          </div>
          <div class="d-flex justify-content-between mt-2">
            <div class="sales-info d-flex align-items-center">
              <i class='bx bx-down-arrow-circle icon-light font-medium-5 mr-50'></i>
              <div class="sales-info-content">
                <h6 class="mb-0">Lowest Selling</h6>
                <small class="text-muted">Thursday</small>
              </div>
            </div>
            <h6 class="mb-0">986k</h6>
          </div>
        </div>
      </div>
    </div>
    <!-- Growth Chart Starts-->
    <div class="col-xl-3 col-md-6 col-12 growth-card">
      <div class="card">
        <div class="card-body text-center">
          <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButtonSec"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              2020
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec">
              <a class="dropdown-item" href="javascript:void(0);">2020</a>
              <a class="dropdown-item" href="javascript:void(0);">2019</a>
              <a class="dropdown-item" href="javascript:void(0);">2018</a>
            </div>
          </div>
          <div id="growth-Chart"></div>
          <h6 class="mt-2"> 62% Growth in 2020</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- Task Card Starts -->
    <div class="col-lg-7">
      <div class="row">
        <div class="col-12">
          <div class="card widget-todo">
            <div class="card-header border-bottom d-flex justify-content-between align-items-center flex-wrap">
              <h4 class="card-title d-flex mb-25 mb-sm-0">
                <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Tasks
              </h4>
              <ul class="list-inline d-flex mb-25 mb-sm-0">
                <li class="d-flex align-items-center">
                  <i class='bx bx-filter font-medium-3 mr-50'></i>
                  <div class="dropdown">
                    <div class="dropdown-toggle mr-1 cursor-pointer" role="button" id="dropdownMenuButton"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</div>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="javascript:void(0);">My Tasks</a>
                      <a class="dropdown-item" href="javascript:void(0);">Due this week</a>
                      <a class="dropdown-item" href="javascript:void(0);">Due next week</a>
                      <a class="dropdown-item" href="javascript:void(0);">Custom Filter</a>
                    </div>
                  </div>
                </li>
                <li class="d-flex align-items-center">
                  <i class='bx bx-sort mr-50 font-medium-3'></i>
                  <div class="dropdown">
                    <div class="dropdown-toggle cursor-pointer" role="button" id="dropdownMenuButton2"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort</div>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                      <a class="dropdown-item" href="javascript:void(0);">None</a>
                      <a class="dropdown-item" href="javascript:void(0);">Alphabetical</a>
                      <a class="dropdown-item" href="javascript:void(0);">Due Date</a>
                      <a class="dropdown-item" href="javascript:void(0);">Assignee</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="card-body px-0 py-1">
              <ul class="widget-todo-list-wrapper" id="widget-todo-list">
                <li class="widget-todo-item">
                  <div class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                    <div class="widget-todo-title-area d-flex align-items-center">
                      <i class='bx bx-grid-vertical mr-25 font-medium-4 cursor-move'></i>
                      <div class="checkbox checkbox-shadow">
                        <input type="checkbox" class="checkbox__input" id="checkbox1">
                        <label for="checkbox1"></label>
                      </div>
                      <span class="widget-todo-title ml-50">Add SCSS and JS files if required</span>
                    </div>
                    <div class="widget-todo-item-action d-flex align-items-center">
                      <div class="badge badge-pill badge-light-success mr-1">frontend</div>
                      <div class="avatar bg-rgba-primary m-0 mr-50">
                        <div class="avatar-content">
                          <span class="font-size-base text-primary">RA</span>
                        </div>
                      </div>
                      <div class="dropdown">
                        <span
                          class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">View Details</a>
                          <a class="dropdown-item" href="javascript:void(0);">Duplicate Task</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete Task</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="widget-todo-item">
                  <div class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                    <div class="widget-todo-title-area d-flex align-items-center">
                      <i class='bx bx-grid-vertical mr-25 font-medium-4 cursor-move'></i>
                      <div class="checkbox checkbox-shadow">
                        <input type="checkbox" class="checkbox__input" id="checkbox2">
                        <label for="checkbox2"></label>
                      </div>
                      <span class="widget-todo-title ml-50">Check your changes, before commiting</span>
                    </div>
                    <div class="widget-todo-item-action d-flex align-items-center">
                      <div class="badge badge-pill badge-light-danger mr-1">backend</div>
                      <div class="avatar m-0 mr-50">
                        <img src="app-assets/images/profile/user-uploads/social-2.jpg" alt="img placeholder"
                          height="32" width="32">
                      </div>
                      <div class="dropdown">
                        <span
                          class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">View Details</a>
                          <a class="dropdown-item" href="javascript:void(0);">Duplicate Task</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete Task</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="widget-todo-item completed">
                  <div class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                    <div class="widget-todo-title-area d-flex align-items-center">
                      <i class='bx bx-grid-vertical mr-25 font-medium-4 cursor-move'></i>
                      <div class="checkbox checkbox-shadow">
                        <input type="checkbox" class="checkbox__input" id="checkbox3" checked>
                        <label for="checkbox3"></label>
                      </div>
                      <span class="widget-todo-title ml-50">Dribble, Behance, UpLabs & Pinterest Post</span>
                    </div>
                    <div class="widget-todo-item-action d-flex align-items-center">
                      <div class="badge badge-pill badge-light-primary mr-1">UI/UX</div>
                      <div class="avatar bg-rgba-primary m-0 mr-50">
                        <div class="avatar-content">
                          <span class="font-size-base text-primary">JP</span>
                        </div>
                      </div>
                      <div class="dropdown">
                        <span
                          class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">View Details</a>
                          <a class="dropdown-item" href="javascript:void(0);">Duplicate Task</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete Task</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="widget-todo-item">
                  <div class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                    <div class="widget-todo-title-area d-flex align-items-center">
                      <i class='bx bx-grid-vertical mr-25 font-medium-4 cursor-move'></i>
                      <div class="checkbox checkbox-shadow">
                        <input type="checkbox" class="checkbox__input" id="checkbox4">
                        <label for="checkbox4"></label>
                      </div>
                      <span class="widget-todo-title ml-50">Fresh Design Web & Responsive Miracle</span>
                    </div>
                    <div class="widget-todo-item-action d-flex align-items-center">
                      <div class="badge badge-pill badge-light-info mr-1">Design</div>
                      <div class="avatar m-0 mr-50">
                        <img src="app-assets/images/profile/user-uploads/user-05.jpg" alt="img placeholder"
                          height="32" width="32">
                      </div>
                      <div class="dropdown">
                        <span
                          class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">View Details</a>
                          <a class="dropdown-item" href="javascript:void(0);">Duplicate Task</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete Task</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="widget-todo-item">
                  <div class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                    <div class="widget-todo-title-area d-flex align-items-center">
                      <i class='bx bx-grid-vertical mr-25 font-medium-4 cursor-move'></i>
                      <div class="checkbox checkbox-shadow">
                        <input type="checkbox" class="checkbox__input" id="checkbox5">
                        <label for="checkbox5"></label>
                      </div>
                      <span class="widget-todo-title ml-50">Add Calendar page, source and credit page in
                        documentation</span>
                    </div>
                    <div class="widget-todo-item-action d-flex align-items-center">
                      <div class="badge badge-pill badge-light-warning mr-1">Javascript</div>
                      <div class="avatar bg-rgba-primary m-0 mr-50">
                        <div class="avatar-content">
                          <span class="font-size-base text-primary">AK</span>
                        </div>
                      </div>
                      <div class="dropdown">
                        <span
                          class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">View Details</a>
                          <a class="dropdown-item" href="javascript:void(0);">Duplicate Task</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete Task</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="widget-todo-item">
                  <div class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                    <div class="widget-todo-title-area d-flex align-items-center">
                      <i class='bx bx-grid-vertical mr-25 font-medium-4 cursor-move'></i>
                      <div class="checkbox checkbox-shadow">
                        <input type="checkbox" class="checkbox__input" id="checkbox6">
                        <label for="checkbox6"></label>
                      </div>
                      <span class="widget-todo-title ml-50">Add Angular Starter-kit</span>
                    </div>
                    <div class="widget-todo-item-action d-flex align-items-center">
                      <div class="badge badge-pill badge-light-primary mr-1">UI/UX</div>
                      <div class="avatar m-0 mr-50">
                        <img src="app-assets/images/profile/user-uploads/user-05.jpg" alt="img placeholder"
                          height="32" width="32">
                      </div>
                      <div class="dropdown">
                        <span
                          class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">View Details</a>
                          <a class="dropdown-item" href="javascript:void(0);">Duplicate Task</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete Task</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Daily Financials Card Starts -->
    <div class="col-lg-5">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title">
            Order Timeline
          </h4>
        </div>
        <div class="card-body">
          <ul class="timeline mb-0">
            <li class="timeline-item timeline-icon-primary active">
              <div class="timeline-time">September, 16</div>
              <h6 class="timeline-title">1983, orders, $4220</h6>
              <p class="timeline-text">2 hours ago</p>
              <div class="timeline-content">
                <img src="app-assets/images/icon/pdf.png" alt="document" height="23" width="19"
                  class="mr-50">New Order.pdf
              </div>
            </li>
            <li class="timeline-item timeline-icon-primary active">
              <div class="timeline-time">September, 17</div>
              <h6 class="timeline-title">12 Invoices have been paid</h6>
              <p class="timeline-text">25 minutes ago</p>
              <div class="timeline-content">
                <img src="app-assets/images/icon/pdf.png" alt="document" height="23" width="19"
                  class="mr-50">Invoices.pdf
              </div>
            </li>
            <li class="timeline-item timeline-icon-primary active pb-0">
              <div class="timeline-time">September, 18</div>
              <h6 class="timeline-title">Order #37745 from September</h6>
              <p class="timeline-text">4 minutes ago</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Dashboard Analytics end -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->
    <div class="customizer d-none d-md-block"><a class="customizer-toggle" href="javascript:void(0);"><i class="bx bx-cog bx bx-spin white"></i></a><div class="customizer-content p-2">
  <h4 class="text-uppercase mb-0">Theme Customizer</h4>
  <small>Customize & Preview in Real Time</small>
  <a href="javascript:void(0)" class="customizer-close">
		<i class="bx bx-x"></i>
  </a>
  <hr>
  <!-- Theme options starts -->
  <h5 class="mt-1">Theme Layout</h5>
  <div class="theme-layouts">
    <div class="d-flex justify-content-start">
      <div class="mx-50">
        <fieldset>
          <div class="radio">
            <input type="radio" name="layoutOptions" value="false" id="radio-light" class="layout-name" data-layout=""
              checked>
            <label for="radio-light">Light</label>
          </div>
        </fieldset>
      </div>
      <div class="mx-50">
        <fieldset>
          <div class="radio">
            <input type="radio" name="layoutOptions" value="false" id="radio-dark" class="layout-name"
              data-layout="dark-layout">
            <label for="radio-dark">Dark</label>
          </div>
        </fieldset>
      </div>
      <div class="mx-50">
        <fieldset>
          <div class="radio">
            <input type="radio" name="layoutOptions" value="false" id="radio-semi-dark" class="layout-name"
              data-layout="semi-dark-layout">
            <label for="radio-semi-dark">Semi Dark</label>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
  <!-- Theme options starts -->
  <hr>

  <!-- Menu Colors Starts -->
  <div id="customizer-theme-colors">
    <h5>Menu Colors</h5>
    <ul class="list-inline unstyled-list">
      <li class="color-box bg-primary selected" data-color="theme-primary"></li>
      <li class="color-box bg-success" data-color="theme-success"></li>
      <li class="color-box bg-danger" data-color="theme-danger"></li>
      <li class="color-box bg-info" data-color="theme-info"></li>
      <li class="color-box bg-warning" data-color="theme-warning"></li>
      <li class="color-box bg-dark" data-color="theme-dark"></li>
    </ul>
    <hr>
  </div>
  <!-- Menu Colors Ends -->
  <!-- Menu Icon Animation Starts -->
  <div id="menu-icon-animation">
    <div class="d-flex justify-content-between align-items-center">
      <div class="icon-animation-title">
        <h5 class="pt-25">Icon Animation</h5>
      </div>
      <div class="icon-animation-switch">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" checked id="icon-animation-switch">
          <label class="custom-control-label" for="icon-animation-switch"></label>
        </div>
      </div>
    </div>
    <hr>
  </div>
  <!-- Menu Icon Animation Ends -->
  <!-- Collapse sidebar switch starts -->
  <div class="collapse-sidebar d-flex justify-content-between align-items-center">
    <div class="collapse-option-title">
      <h5 class="pt-25">Collapse Menu</h5>
    </div>
    <div class="collapse-option-switch">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch">
        <label class="custom-control-label" for="collapse-sidebar-switch"></label>
      </div>
    </div>
  </div>
  <!-- Collapse sidebar switch Ends -->
  <hr>

  <!-- Navbar colors starts -->
  <div id="customizer-navbar-colors">
    <h5>Navbar Colors</h5>
    <ul class="list-inline unstyled-list">
      <li class="color-box bg-white border selected" data-navbar-default=""></li>
      <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
      <li class="color-box bg-success" data-navbar-color="bg-success"></li>
      <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
      <li class="color-box bg-info" data-navbar-color="bg-info"></li>
      <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
      <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
    </ul>
    <small><strong>Note :</strong> This option with work only on sticky navbar when you scroll page.</small>
    <hr>
  </div>
  <!-- Navbar colors starts -->
  <!-- Navbar Type Starts -->
  <h5>Navbar Type</h5>
  <div class="navbar-type d-flex justify-content-start">
    <div class="hidden-ele mx-50">
      <fieldset>
        <div class="radio">
          <input type="radio" name="navbarType" value="false" id="navbar-hidden">
          <label for="navbar-hidden">Hidden</label>
        </div>
      </fieldset>
    </div>
    <div class="mx-50">
      <fieldset>
        <div class="radio">
          <input type="radio" name="navbarType" value="false" id="navbar-static">
          <label for="navbar-static">Static</label>
        </div>
      </fieldset>
    </div>
    <div class="mx-50">
      <fieldset>
        <div class="radio">
          <input type="radio" name="navbarType" value="false" id="navbar-sticky" checked>
          <label for="navbar-sticky">Fixed</label>
        </div>
      </fieldset>
    </div>
  </div>
  <hr>
  <!-- Navbar Type Starts -->

  <!-- Footer Type Starts -->
  <h5>Footer Type</h5>
  <div class="footer-type d-flex justify-content-start">
    <div class="mx-50">
      <fieldset>
        <div class="radio">
          <input type="radio" name="footerType" value="false" id="footer-hidden">
          <label for="footer-hidden">Hidden</label>
        </div>
      </fieldset>
    </div>
    <div class="mx-50">
      <fieldset>
        <div class="radio">
          <input type="radio" name="footerType" value="false" id="footer-static" checked>
          <label for="footer-static">Static</label>
        </div>
      </fieldset>
    </div>
    <div class="mx-50">
      <fieldset>
        <div class="radio">
          <input type="radio" name="footerType" value="false" id="footer-sticky">
          <label for="footer-sticky" class="">Sticky</label>
        </div>
      </fieldset>
    </div>
  </div>
  <!-- Footer Type Ends -->
  <hr>

  <!-- Card Shadow Starts-->
  <div class="card-shadow d-flex justify-content-between align-items-center py-25">
    <div class="hide-scroll-title">
      <h5 class="pt-25">Card Shadow</h5>
    </div>
    <div class="card-shadow-switch">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" checked id="card-shadow-switch">
        <label class="custom-control-label" for="card-shadow-switch"></label>
      </div>
    </div>
  </div>
  <!-- Card Shadow Ends-->
  <hr>

  <!-- Hide Scroll To Top Starts-->
  <div class="hide-scroll-to-top d-flex justify-content-between align-items-center py-25">
    <div class="hide-scroll-title">
      <h5 class="pt-25">Hide Scroll To Top</h5>
    </div>
    <div class="hide-scroll-top-switch">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="hide-scroll-top-switch">
        <label class="custom-control-label" for="hide-scroll-top-switch"></label>
      </div>
    </div>
  </div>
  <!-- Hide Scroll To Top Ends-->
</div>

    </div>
    <!-- End: Customizer-->

    <!-- Buynow Button-->
    <div class="buy-now"><a href="https://1.envato.market/frest_admin" target="_blank" class="btn btn-danger">Buy Now</a>

    </div>
    <!-- demo chat-->
    <div class="widget-chat-demo"><!-- widget chat demo footer button start -->
<button class="btn btn-primary chat-demo-button glow px-1"><i class="livicon-evo"
    data-options="name: comments.svg; style: lines; size: 24px; strokeColor: #fff; autoPlay: true; repeat: loop;"></i></button>
<!-- widget chat demo footer button ends -->
<!-- widget chat demo start -->
<div class="widget-chat widget-chat-demo d-none">
  <div class="card mb-0">
    <div class="card-header border-bottom p-0">
      <div class="media m-75">
        <a href="JavaScript:void(0);">
          <div class="avatar mr-75">
            <img src="app-assets/images/portrait/small/avatar-s-2.jpg" alt="avtar images" width="32"
              height="32">
            <span class="avatar-status-online"></span>
          </div>
        </a>
        <div class="media-body">
          <h6 class="media-heading mb-0 pt-25"><a href="javaScript:void(0);">Kiara Cruiser</a></h6>
          <span class="text-muted font-small-3">Active</span>
        </div>
      </div>
      <div class="heading-elements">
        <i class="bx bx-x widget-chat-close float-right my-auto cursor-pointer"></i>
      </div>
    </div>
    <div class="card-body widget-chat-container widget-chat-demo-scroll">
      <div class="chat-content">
        <div class="badge badge-pill badge-light-secondary my-1">today</div>
        <div class="chat">
          <div class="chat-body">
            <div class="chat-message">
              <p>How can we help? 😄</p>
              <span class="chat-time">7:45 AM</span>
            </div>
          </div>
        </div>
        <div class="chat chat-left">
          <div class="chat-body">
            <div class="chat-message">
              <p>Hey John, I am looking for the best admin template.</p>
              <p>Could you please help me to find it out? 🤔</p>
              <span class="chat-time">7:50 AM</span>
            </div>
          </div>
        </div>
        <div class="chat">
          <div class="chat-body">
            <div class="chat-message">
              <p>Stack admin is the responsive bootstrap 4 admin template.</p>
              <span class="chat-time">8:01 AM</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer border-top p-1">
      <form class="d-flex" onsubmit="widgetChatMessageDemo();" action="javascript:void(0);">
        <input type="text" class="form-control chat-message-demo mr-75" placeholder="Type here...">
        <button type="submit" class="btn btn-primary glow px-1"><i class="bx bx-paper-plane"></i></button>
      </form>
    </div>
  </div>
</div>
<!-- widget chat demo ends -->

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
		<?php include_once 'footer.php';?>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="app-assets/vendors/js/extensions/dragula.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/components.min.js"></script>
    <script src="app-assets/js/scripts/footer.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/dashboard-analytics.min.js"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->

<!-- /index.html by,  04:42:26 GMT -->
</html>