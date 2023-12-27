<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Addawah | Dashboard</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/all.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">

      <!-- DataTables Pack -->
      <link rel="stylesheet" href="assets/datatable-pack/datables/dataTables.min.css">
      <link rel="stylesheet" href="assets/datatable-pack/autofill/autoFill.bootstrap4.min.css">
      <link rel="stylesheet" href="assets/datatable-pack/buttons/buttons.bootstrap4.min.css">
      <link rel="stylesheet" href="assets/datatable-pack/colreorders/colReorder.bootstrap4.min.css">
      <link rel="stylesheet" href="assets/datatable-pack/fixedcolumns/fixedColumns.bootstrap4.min.css">
      <link rel="stylesheet" href="assets/datatable-pack/fixedheaders/fixedHeader.bootstrap4.min.css">
      <link rel="stylesheet" href="assets/datatable-pack/scrollers/scroller.bootstrap4.min.css">
      <link rel="stylesheet" href="assets/datatable-pack/scrollers/scroller.bootstrap4.min.css">
      <link rel="stylesheet" href="assets/datatable-pack/searchbuilders/searchBuilder.bootstrap4.min.css">
      <link rel="stylesheet" href="assets/datatable-pack/selects/select.dataTables.min.css">


      <!-- Sweet Alert -->
      <link rel="stylesheet" href="assets/sweetalert/sweetalert2.min.css">
      <!-- Select2 -->
      <link rel="stylesheet" href="assets/select2/select2.css">
      <!-- am chart export.css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>

  <body>
  <!-- Pre-loader start -->
  <!-- <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div> -->
  <!-- Pre-loader end -->
<!-- ========================LOADING======================== -->
<style>
.loading {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(255, 255, 255, 1);
color: black;
display: flex;
align-items: center;
justify-content: center;
z-index: 9999;
font-size: 30px;
}
</style>
<div id="loading" class="loading">
    <img src="assets/images/setting.gif" alt="loading" style="width: 90px;"> &nbsp; Loading ...
</div>
<!-- ========================LOADING======================== -->

  
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a href="index.html">
                            <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <img src="assets/images/wahid.JPG" class="img-radius" alt="User-Profile-Image">
                                    <span>Wahid Prayogo</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li class="waves-effect waves-light">
                                        <a href="#!"><i class="ti-settings"></i> Settings</a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="user-profile.html"><i class="ti-user"></i> Profile</a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="auth-normal-sign-in.html"><i class="ti-power-off"></i> Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-80 img-radius" src="assets/images/wahid.JPG" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details">Wahid Prayogo</span>
                                    </div>
                                </div>

                            </div>
                            <!-- MENU -->
                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation"></div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="#" onclick="HtmlLoad('pages/pembayaran/pembayaran.php')" class="waves-effect waves-dark">
                                        <span class="pcoded-micon mt-2 mb-2"><i class="fas fa-signature"></i></i><b>P</b></span>
                                        <span class="pcoded-mtext mt-2 mb-2" data-i18n="nav.dash.main">Pembayaran</span>
                                        <span class="pcoded-mcaret mt-2 mb-2"></span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Dashboard -->
                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Dashboard</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="#" onclick="HtmlLoad('pages/dashboard/dashboard.php')" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fa fa-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Main Menu -->
                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Main Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-wallet"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Pembayaran</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="#" onclick="HtmlLoad('pages/spp/spp.php')" class="waves-effect waves-dark" id="mn-bayaran-spp">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-control-record"></i>&nbsp; SPP</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="#" onclick="HtmlLoad('pages/ujian/ujian.php')" class="waves-effect waves-dark" id="mn-ujian-spp">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs"><i class="ti-control-record"></i>&nbsp; Ujian</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="#" onclick="HtmlLoad('pages/kegiatan/kegiatan.php')" class="waves-effect waves-dark" id="mn-kegiatan-spp">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs"><i class="ti-control-record"></i>&nbsp; Kegiatan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-user-graduate"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Data Siswa</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="#" onclick="HtmlLoad('pages/siswa/siswa.php')" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-control-record"></i>&nbsp; Siswa Aktif</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="#" onclick="HtmlLoad('pages/siswa/siswa-non.php')" class="waves-effect waves-dark" id="mn-siswa-nonaktif">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs"><i class="ti-control-record"></i>&nbsp; Siswa Nonaktif</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- end MENU -->

                            <!-- Managemen PEMBAYARAN -->
                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Administrasi</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="#" onclick="HtmlLoad('pages/adm-katg/adm-katg.php')" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-genderless"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Kategori Pembayaran</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <!-- <li class="">
                                    <a href="#" onclick="HtmlLoad('pages/adm-pem/adm-pem.php')" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-genderless"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Jenis Pembayaran</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </nav>
                    

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="show-page">
                                        <!-- CONTENT HERE -->
                                    </div>
                                </div>
                                <div id="styleSelector"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="assets/pages/widget/amchart/gauge.js"></script>
    <script src="assets/pages/widget/amchart/serial.js"></script>
    <script src="assets/pages/widget/amchart/light.js"></script>
    <script src="assets/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- Icon/Fontawesom -->
    <script src="assets/icon/font-awesome/js/all.min.js"></script>

    <!-- DataTables -->
    <script src="assets/datatable-pack/datables/dataTables.min.js"></script>
    <script src="assets/datatable-pack/datables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/datatable-pack/autofill/dataTables.autoFill.min.js"></script>
    <script src="assets/datatable-pack/autofill/autoFill.bootstrap4.min.js"></script>
    <script src="assets/datatable-pack/buttons/dataTables.buttons.min.js"></script>
    <script src="assets/datatable-pack/buttons/buttons.bootstrap4.min.js"></script>
    <script src="assets/datatable-pack/buttons/buttons.colVis.min.js"></script>
    <script src="assets/datatable-pack/buttons/buttons.html5.min.js"></script>
    <script src="assets/datatable-pack/buttons/buttons.print.min.js"></script>
    <script src="assets/datatable-pack/colreorders/dataTables.colReorder.min.js"></script>
    <script src="assets/datatable-pack/datetime/dataTables.dateTime.min.js"></script>
    <script src="assets/datatable-pack/fixedcolumns/dataTables.fixedColumns.min.js"></script>
    <script src="assets/datatable-pack/fixedheaders/dataTables.fixedHeader.min.js"></script>
    <script src="assets/datatable-pack/scrollers/dataTables.scroller.min.js"></script>
    <script src="assets/datatable-pack/searchbuilders/dataTables.searchBuilder.min.js"></script>
    <script src="assets/datatable-pack/searchbuilders/searchBuilder.bootstrap4.min.js"></script>
    <script src="assets/datatable-pack/selects/dataTables.select.min.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/sweetalert/sweetalert2.all.min.js"></script>
    <!-- Select2 -->
    <script src="assets/select2/select2.js"></script>
    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="assets/js/script.js "></script>

    <script>
        
        // Load URL PAGES
        function HtmlLoad(url) {
            $('.show-page').empty();
            $('.show-page').load(url);
            
        }

        // Load URL PEMBAYARAN
        function HtmlLoadPem(urldata) {
            $('.page-pem').empty();
            $('.page-pem').load(urldata);
        }

        $(document).ready(function(){
            $.ajax({
                url: "pages/dashboard/dashboard.php",
                success: function(page){
                    $('.show-page').html(page);
                    $('title').html("My Addawah | Dashboard");
                    $('#loading').hide();
                }
            });
        });

    </script>
</body>

</html>