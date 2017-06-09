<?php include_once 'authentication.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Maritime | Dashboard</title>
	<link rel="icon" type="image/ico" href="favicon.ico">	

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body class="nav-md" id="main-body" ng-app="dashboard" ng-controller="dashboardCtrl" account-profile>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img class="company-logo" src="images/npcmstlogo.png"> <span>Maritime</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{accountProfile.picture}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{accountProfile.fullname}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">   
                  <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                  <li><a><i class="fa fa-desktop"></i> Registrar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="students.php"><i class="fa fa-group"></i> Students</a></li>
                      <li><a href="#"><i class="fa fa-table"></i> Enrollment</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cogs"></i> Maintenance <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="subjects.php"><i class="fa fa-book"></i> Subjects</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i> Courses</a></li>
                      <li><a href="#"><i class="fa fa-sort-alpha-asc"></i> Sections</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Faculty <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#"><i class="fa fa-user"></i> Instructors</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen" ng-click="fullscreen.toggleFullScreen('#main-body')">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="javascript:;" logout-account>
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{accountProfile.picture}}" alt="">{{accountProfile.fullname}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="javascript:;" logout-account><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <!-- <li role="presentation" class="dropdown"> -->
                  <!-- <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"> -->
                    <!-- <i class="fa fa-envelope-o"></i> -->
                    <!-- <span class="badge bg-green">6</span> -->
                  <!-- </a> -->
                  <!-- <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu"> -->
                    <!-- <li> -->
                      <!-- <a> -->
                        <!-- <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span> -->
                        <!-- <span> -->
                          <!-- <span>John Smith</span> -->
                          <!-- <span class="time">3 mins ago</span> -->
                        <!-- </span> -->
                        <!-- <span class="message"> -->
                          <!-- Film festivals used to be do-or-die moments for movie makers. They were where... -->
                        <!-- </span> -->
                      <!-- </a> -->
                    <!-- </li> -->
                    <!-- <li> -->
                      <!-- <a> -->
                        <!-- <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span> -->
                        <!-- <span> -->
                          <!-- <span>John Smith</span> -->
                          <!-- <span class="time">3 mins ago</span> -->
                        <!-- </span> -->
                        <!-- <span class="message"> -->
                          <!-- Film festivals used to be do-or-die moments for movie makers. They were where... -->
                        <!-- </span> -->
                      <!-- </a> -->
                    <!-- </li> -->
                    <!-- <li> -->
                      <!-- <a> -->
                        <!-- <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span> -->
                        <!-- <span> -->
                          <!-- <span>John Smith</span> -->
                          <!-- <span class="time">3 mins ago</span> -->
                        <!-- </span> -->
                        <!-- <span class="message"> -->
                          <!-- Film festivals used to be do-or-die moments for movie makers. They were where... -->
                        <!-- </span> -->
                      <!-- </a> -->
                    <!-- </li> -->
                    <!-- <li> -->
                      <!-- <a> -->
                        <!-- <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span> -->
                        <!-- <span> -->
                          <!-- <span>John Smith</span> -->
                          <!-- <span class="time">3 mins ago</span> -->
                        <!-- </span> -->
                        <!-- <span class="message"> -->
                          <!-- Film festivals used to be do-or-die moments for movie makers. They were where... -->
                        <!-- </span> -->
                      <!-- </a> -->
                    <!-- </li> -->
                    <!-- <li> -->
                      <!-- <div class="text-center"> -->
                        <!-- <a> -->
                          <!-- <strong>See All Alerts</strong> -->
                          <!-- <i class="fa fa-angle-right"></i> -->
                        <!-- </a> -->
                      <!-- </div> -->
                    <!-- </li> -->
                  <!-- </ul> -->
                <!-- </li> -->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="x_content bs-example-popovers">
                  <div class="alert alert-info alert-dismissible fade in">
                    <h1>Welcome!</h1> <h4>Introducing Maritime Enrollment System.</h4>
                  </div>
              </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <strong>Copyright &copy;  <?php echo date("Y"); ?> Maritime Enrollment System.</strong> All Rights Reserved. 
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>	
    <script src="vendors/bootbox/bootbox.min.js"></script>	

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script src="angular/angular.min.js"></script>
    <script src="modules/fullscreen.js"></script>
    <script src="modules/bootstrap-modal.js"></script>
    <script src="modules/account.js"></script>
    <script src="controllers/dashboard.js"></script>
	
  </body>
</html>
