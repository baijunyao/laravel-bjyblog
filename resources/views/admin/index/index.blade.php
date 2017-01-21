@extends('layouts.admin')

@section('title', '管理后台首页')

@section('nav', '后台首页')

@section('description', '后台管理首页')

@section('css')
    <link href="{{ asset('statics/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="row top_tiles" style="margin: 10px 0;">
        <div class="col-md-3 col-sm-3 col-xs-6 tile">
            <span>Total Sessions</span>
            <h2>231,809</h2>
        <span class="sparkline_one" style="height: 160px;">
              <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
          </span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 tile">
            <span>Total Revenue</span>
            <h2>$ 231,809</h2>
        <span class="sparkline_one" style="height: 160px;">
              <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
          </span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 tile">
            <span>Total Sessions</span>
            <h2>231,809</h2>
        <span class="sparkline_two" style="height: 160px;">
              <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
          </span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 tile">
            <span>Total Sessions</span>
            <h2>231,809</h2>
        <span class="sparkline_one" style="height: 160px;">
              <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
          </span>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Network Activities <small>Graph title sub-title</small></h3>
                    </div>
                    <div class="col-md-6">
                        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                    </div>
                </div>
                <div class="x_content">
                    <div class="demo-container" style="height:250px">
                        <div id="placeholder3xx3" class="demo-placeholder" style="width: 100%; height:250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel fixed_height_320">
                <div class="x_title">
                    <h2>App Devices <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h4>App Versions</h4>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>1.5.2</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>123k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>1.5.3</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>53k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>1.5.4</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>23k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>1.5.5</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>3k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>0.1.5.6</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>1k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel fixed_height_320">
                <div class="x_title">
                    <h2>Daily users <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="" style="width:100%">
                        <tr>
                            <th style="width:37%;">
                                <p>Top 5</p>
                            </th>
                            <th>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <p class="">Device</p>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <p class="">Progress</p>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square blue"></i>IOS </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square green"></i>Android </p>
                                        </td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square purple"></i>Blackberry </p>
                                        </td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square aero"></i>Symbian </p>
                                        </td>
                                        <td>15%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square red"></i>Others </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel fixed_height_320">
                <div class="x_title">
                    <h2>Profile Settings <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <ul class="quick-list">
                            <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a></li>
                            <li><i class="fa fa-thumbs-up"></i><a href="#">Favorites</a></li>
                            <li><i class="fa fa-calendar-o"></i><a href="#">Activities</a></li>
                            <li><i class="fa fa-cog"></i><a href="#">Settings</a></li>
                            <li><i class="fa fa-area-chart"></i><a href="#">Logout</a></li>
                        </ul>

                        <div class="sidebar-widget">
                            <h4>Profile Completion</h4>
                            <canvas width="150" height="80" id="foo" class="" style="width: 160px; height: 100px;"></canvas>
                            <div class="goal-wrapper">
                                <span id="gauge-text" class="gauge-value pull-left">0</span>
                                <span class="gauge-value pull-left">%</span>
                                <span id="goal-text" class="goal-value pull-right">100%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 widget_tally_box">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User Uptake</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div id="graph_bar" style="width:100%; height:200px;"></div>

                    <div class="col-xs-12 bg-white progress_summary">

                        <div class="row">
                            <div class="progress_title">
                                <span class="left">Escudor Wireless 1.0</span>
                                <span class="right">This sis</span>
                                <div class="clearfix"></div>
                            </div>

                            <div class="col-xs-2">
                                <span>SSD</span>
                            </div>
                            <div class="col-xs-8">
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="89"></div>
                                </div>
                            </div>
                            <div class="col-xs-2 more_info">
                                <span>89%</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="progress_title">
                                <span class="left">Mobile Access</span>
                                <span class="right">Smart Phone</span>
                                <div class="clearfix"></div>
                            </div>

                            <div class="col-xs-2">
                                <span>App</span>
                            </div>
                            <div class="col-xs-8">
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="79"></div>
                                </div>
                            </div>
                            <div class="col-xs-2 more_info">
                                <span>79%</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="progress_title">
                                <span class="left">WAN access users</span>
                                <span class="right">Total 69%</span>
                                <div class="clearfix"></div>
                            </div>

                            <div class="col-xs-2">
                                <span>Usr</span>
                            </div>
                            <div class="col-xs-8">
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="69"></div>
                                </div>
                            </div>
                            <div class="col-xs-2 more_info">
                                <span>69%</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- start of weather widget -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Today's Weather <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="temperature"><b>Monday</b>, 07:30 AM
                                <span>F</span>
                  <span><b>C</b>
                                  </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="weather-icon">
                  <span>
                                      <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                                  </span>

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="weather-text">
                                <h2>Texas
                                    <br><i>Partly Cloudy Day</i>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="weather-text pull-right">
                            <h3 class="degrees">23</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="row weather-days">
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Mon</h2>
                                <h3 class="degrees">25</h3>
                  <span>
                                          <canvas id="clear-day" width="32" height="32">
                                          </canvas>

                                  </span>
                                <h5>15
                                    <i>km/h</i>
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Tue</h2>
                                <h3 class="degrees">25</h3>
                                <canvas height="32" width="32" id="rain"></canvas>
                                <h5>12
                                    <i>km/h</i>
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Wed</h2>
                                <h3 class="degrees">27</h3>
                                <canvas height="32" width="32" id="snow"></canvas>
                                <h5>14
                                    <i>km/h</i>
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Thu</h2>
                                <h3 class="degrees">28</h3>
                                <canvas height="32" width="32" id="sleet"></canvas>
                                <h5>15
                                    <i>km/h</i>
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Fri</h2>
                                <h3 class="degrees">28</h3>
                                <canvas height="32" width="32" id="wind"></canvas>
                                <h5>11
                                    <i>km/h</i>
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Sat</h2>
                                <h3 class="degrees">26</h3>
                                <canvas height="32" width="32" id="cloudy"></canvas>
                                <h5>10
                                    <i>km/h</i>
                                </h5>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end of weather widget -->

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel fixed_height_320">
                <div class="x_title">
                    <h2>Incomes <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <ul class="quick-list">
                            <li><i class="fa fa-bars"></i><a href="#">Subscription</a></li>
                            <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                            <li><i class="fa fa-support"></i><a href="#">Help Desk</a> </li>
                            <li><i class="fa fa-heart"></i><a href="#">Donations</a> </li>
                        </ul>

                        <div class="sidebar-widget">
                            <h4>Goal</h4>
                            <canvas width="150" height="80" id="foo2" class="" style="width: 160px; height: 100px;"></canvas>
                            <div class="goal-wrapper">
                                <span class="gauge-value pull-left">$</span>
                                <span id="gauge-text2" class="gauge-value pull-left">3,200</span>
                                <span id="goal-text2" class="goal-value pull-right">$5,000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('js')



    <!-- Chart.js -->
    <script src="{{ asset('statics/gentelella/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('statics/gentelella/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- morris.js -->
    <script src="{{ asset('statics/gentelella/vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('statics/gentelella/vendors/morris.js/morris.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('statics/gentelella/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('statics/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('statics/gentelella/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('statics/gentelella/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('statics/gentelella/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('statics/gentelella/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('statics/gentelella/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('statics/gentelella/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('statics/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('statics/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('statics/gentelella/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('statics/gentelella/vendors/DateJS/build/date.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('statics/gentelella/production/js/moment/moment.min.js') }}"></script>
    <script src="{{ asset('statics/gentelella/production/js/datepicker/daterangepicker.js') }}"></script>


    <!-- Flot -->
    <script>
        $(document).ready(function() {
            //random data
            var d1 = [
                [0, 1],
                [1, 9],
                [2, 6],
                [3, 10],
                [4, 5],
                [5, 17],
                [6, 6],
                [7, 10],
                [8, 7],
                [9, 11],
                [10, 35],
                [11, 9],
                [12, 12],
                [13, 5],
                [14, 3],
                [15, 4],
                [16, 9]
            ];

            //flot options
            var options = {
                series: {
                    curvedLines: {
                        apply: true,
                        active: true,
                        monotonicFit: true
                    }
                },
                colors: ["#26B99A"],
                grid: {
                    borderWidth: {
                        top: 0,
                        right: 0,
                        bottom: 1,
                        left: 1
                    },
                    borderColor: {
                        bottom: "#7F8790",
                        left: "#7F8790"
                    }
                }
            };
            var plot = $.plot($("#placeholder3xx3"), [{
                label: "Registrations",
                data: d1,
                lines: {
                    fillColor: "rgba(150, 202, 89, 0.12)"
                }, //#96CA59 rgba(150, 202, 89, 0.42)
                points: {
                    fillColor: "#fff"
                }
            }], options);
        });
    </script>
    <!-- /Flot -->

    <!-- jQuery Sparklines -->
    <script>
        $(document).ready(function() {
            $(".sparkline_one").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
                type: 'bar',
                height: '40',
                barWidth: 9,
                colorMap: {
                    '7': '#a1a1a1'
                },
                barSpacing: 2,
                barColor: '#26B99A'
            });

            $(".sparkline_two").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
                type: 'line',
                width: '200',
                height: '40',
                lineColor: '#26B99A',
                fillColor: 'rgba(223, 223, 223, 0.57)',
                lineWidth: 2,
                spotColor: '#26B99A',
                minSpotColor: '#26B99A'
            });
        });
    </script>
    <!-- /jQuery Sparklines -->

    <!-- Doughnut Chart -->
    <script>
        $(document).ready(function() {
            var options = {
                legend: false,
                responsive: false
            };

            new Chart(document.getElementById("canvas1"), {
                type: 'doughnut',
                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                data: {
                    labels: [
                        "Symbian",
                        "Blackberry",
                        "Other",
                        "Android",
                        "IOS"
                    ],
                    datasets: [{
                        data: [15, 20, 30, 10, 30],
                        backgroundColor: [
                            "#BDC3C7",
                            "#9B59B6",
                            "#E74C3C",
                            "#26B99A",
                            "#3498DB"
                        ],
                        hoverBackgroundColor: [
                            "#CFD4D8",
                            "#B370CF",
                            "#E95E4F",
                            "#36CAAB",
                            "#49A9EA"
                        ]
                    }]
                },
                options: options
            });
        });
    </script>
    <!-- /Doughnut Chart -->

    <!-- bootstrap-daterangepicker -->
    <script type="text/javascript">
        $(document).ready(function() {

            var cb = function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            };

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function() {
                console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function() {
                console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
                console.log("cancel event fired");
            });
            $('#options1').click(function() {
                $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function() {
                $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function() {
                $('#reportrange').data('daterangepicker').remove();
            });
        });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- morris.js -->
    <script>
        $(document).ready(function() {
            Morris.Bar({
                element: 'graph_bar',
                data: [
                    { "period": "Jan", "Hours worked": 80 },
                    { "period": "Feb", "Hours worked": 125 },
                    { "period": "Mar", "Hours worked": 176 },
                    { "period": "Apr", "Hours worked": 224 },
                    { "period": "May", "Hours worked": 265 },
                    { "period": "Jun", "Hours worked": 314 },
                    { "period": "Jul", "Hours worked": 347 },
                    { "period": "Aug", "Hours worked": 287 },
                    { "period": "Sep", "Hours worked": 240 },
                    { "period": "Oct", "Hours worked": 211 }
                ],
                xkey: 'period',
                hideHover: 'auto',
                barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                ykeys: ['Hours worked', 'sorned'],
                labels: ['Hours worked', 'SORN'],
                xLabelAngle: 60,
                resize: true
            });

            $MENU_TOGGLE.on('click', function() {
                $(window).resize();
            });
        });
    </script>
    <!-- /morris.js -->

    <!-- Skycons -->
    <script>
        var icons = new Skycons({
                    "color": "#73879C"
                }),
                list = [
                    "clear-day", "clear-night", "partly-cloudy-day",
                    "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                    "fog"
                ],
                i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);

        icons.play();
    </script>
    <!-- /Skycons -->

    <!-- gauge.js -->
    <script>
        var opts = {
            lines: 12,
            angle: 0,
            lineWidth: 0.4,
            pointer: {
                length: 0.75,
                strokeWidth: 0.042,
                color: '#1D212A'
            },
            limitMax: 'false',
            colorStart: '#1ABC9C',
            colorStop: '#1ABC9C',
            strokeColor: '#F0F3F3',
            generateGradient: true
        };
        var target = document.getElementById('foo'),
                gauge = new Gauge(target).setOptions(opts);

        gauge.maxValue = 100;
        gauge.animationSpeed = 32;
        gauge.set(80);
        gauge.setTextField(document.getElementById("gauge-text"));

        var target = document.getElementById('foo2'),
                gauge = new Gauge(target).setOptions(opts);

        gauge.maxValue = 5000;
        gauge.animationSpeed = 32;
        gauge.set(4200);
        gauge.setTextField(document.getElementById("gauge-text2"));
    </script>
    <!-- /gauge.js -->

@endsection