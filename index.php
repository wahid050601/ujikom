
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
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet"> -->
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
    <!-- morris chart -->
    <link rel="stylesheet" type="text/css" href="assets/css/morris.js/css/morris.css">

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
    <!-- <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" /> -->
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
                        <a href="index.php">
                            <img class="img-fluid" src="assets/images/logo-apps-new.png" alt="Theme-Logo" width="100px" />
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
                                    <img src="assets/images/user-blank.webp" class="img-radius" alt="User-Profile-Image">
                                    <!-- USER -->
                                    <span class="user-set"></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <!-- <li class="waves-effect waves-light">
                                        <a href="#!"><i class="ti-settings"></i> Settings</a>
                                    </li> -->
                                    <li class="waves-effect waves-light">
                                        <a href="user-profile.html"><i class="ti-user"></i> Profile</a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="#" id="logout"><i class="ti-power-off"></i> Logout</a>
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
                                    <img class="img-80 img-radius" src="assets/images/user-blank.webp" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details"></span>
                                    </div>
                                </div>

                            </div>
                            <!-- MENU -->
                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation"></div>

                            <ul class="pcoded-item pcoded-left-item" id="mn-pembayaran">
                                <li class="active">
                                    <a href="#" onclick="HtmlLoad('pages/pembayaran/pembayaran.php')" class="waves-effect waves-dark">
                                        <span class="pcoded-micon mt-2 mb-2"><i class="fas fa-signature"></i></i><b>P</b></span>
                                        <span class="pcoded-mtext mt-2 mb-2" data-i18n="nav.dash.main">Pembayaran</span>
                                        <span class="pcoded-mcaret mt-2 mb-2"></span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Dashboard -->
                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation"><i class="fa fa-home"></i> Dashboard</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="#" onclick="HtmlLoad('pages/dashboard/dashboard.php')" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fa fa-genderless"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>

                            <!-- User Management -->
                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation" id="mn-user-mgm"><i class="fas fa-users-cog"></i> User Management</div>
                            <ul class="pcoded-item pcoded-left-item" id="mn-user-mgm-sc">
                                <li class="">
                                    <a href="#" onclick="HtmlLoad('pages/user/user.php')" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fa fa-genderless"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">konfigurasi user</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Akademik -->
                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation" id="mn-akademik"><i class="fas fa-graduation-cap"></i> Akademik</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu" id="mn-akademik-siswa">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-genderless"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Data Siswa</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="" id="mn-akademik-siswa-act">
                                            <a href="#" onclick="HtmlLoad('pages/siswa/siswa.php')" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i style="font-size: 8px;" class="fas fa-circle"></i>&nbsp; Siswa Aktif</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="" id="mn-akademik-siswa-non">
                                            <a href="#" onclick="HtmlLoad('pages/siswa/siswa-non.php')" class="waves-effect waves-dark" id="mn-siswa-nonaktif">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs"><i style="font-size: 8px;" class="fas fa-circle"></i>&nbsp; Siswa Nonaktif</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="" id="mn-akademik-rombel">
                                    <a href="#" onclick="HtmlLoad('pages/rombel/rombel.php')" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-genderless"></i><b>R</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Rombel & Prodi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <!-- end MENU -->

                            <!-- Managemen pembayaran -->
                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation" id="mn-administrasi"><i class="fas fa-book"></i> Administrasi</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="" id="mn-adm-kat-pembayaran">
                                    <a href="#" onclick="HtmlLoad('pages/adm-katg/adm-katg.php')" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-genderless"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Kategori Pembayaran</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu" id="mn-adm-keuangan">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-genderless"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Keuangan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="" id="mn-adm-keuangan-pemasukan">
                                            <a href="#" onclick="HtmlLoad('pages/keuangan/pemasukan.php')" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i style="font-size: 8px;" class="fas fa-circle"></i>&nbsp; Catatan Pemasukan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="" id="mn-adm-keuangan-keluaran">
                                            <a href="#" onclick="HtmlLoad('pages/keuangan/pengeluaran.php')" class="waves-effect waves-dark" id="mn-siswa-nonaktif">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs"><i style="font-size: 8px;" class="fas fa-circle"></i>&nbsp; Catatan Pengeluaran</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu" id="mn-adm-rekap">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fas fa-genderless"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Rekapitulasi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="" id="mn-adm-rekap-keuangan">
                                            <a href="#" onclick="HtmlLoad('pages/rekapitulasi/rekapitulasi-keuangan.php')" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i style="font-size: 8px;" class="fas fa-circle"></i>&nbsp; Rekap Keuangan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="" id="mn-adm-rekap-pem">
                                            <a href="#" onclick="HtmlLoad('pages/rekapitulasi/rekapitulasi-pembayaran.php')" class="waves-effect waves-dark" id="mn-siswa-nonaktif">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs"><i style="font-size: 8px;" class="fas fa-circle"></i>&nbsp; Rekap Pembayaran</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
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
    <!-- <script src="https://www.amcharts.com/lib/3/amcharts.js"></script> -->
    <!-- <script src="assets/pages/widget/amchart/gauge.js"></script>
    <script src="assets/pages/widget/amchart/serial.js"></script>
    <script src="assets/pages/widget/amchart/light.js"></script>
    <script src="assets/pages/widget/amchart/pie.min.js"></script> -->

    <!-- <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script> -->
    <!-- Icon/Fontawesom -->
    <script src="assets/icon/font-awesome/js/all.min.js"></script>
    
    <!-- Morris Chart js -->
    <script src="assets/js/raphael/raphael.min.js"></script>
    <script src="assets/js/morris.js/morris.js"></script>


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

        // LOGOUT
        $('#logout').on('click', function(){
            localStorage.removeItem('loginToken');
            localStorage.removeItem('user');
            window.location.href = "/myApps/login.php";
        });

        // Login check
        var tokenLogin = localStorage.getItem('loginToken');
        var user = localStorage.getItem('user');
        if(tokenLogin == null){
            // alert('Token login tidak ada')
            window.location.href = "/myApps/login.php";
        }else{
            // alert('Token : ' + tokenLogin);
            $('#more-details').text(user);

            // Config Role Menus
            $.ajax({
                url: 'login-act.php',
                method: 'post',
                dataType: 'json',
                data: {
                    'action': 'getmenus',
                    'id': localStorage.getItem('id')
                },
                success: function(menus){
                    // Set menus access
                    let pembayaran = menus.menu.pembayaran;
                    let config_user = menus.menu.konfig_user;
                    let siswa_aktif = menus.menu.dt_siswa_aktif;
                    let siswa_non = menus.menu.td_siswa_nonaktif;
                    let rombel_prodi = menus.menu.rombel_prodi;
                    let kat_pembayaran = menus.menu.kat_pembayaran;
                    let cat_pemasukan = menus.menu.catatan_pemasukan;
                    let cat_pengeluaran = menus.menu.catatan_pengeluaran;
                    let rekap_keuangan = menus.menu.rekap_keuangan;
                    let rekap_pembayaran = menus.menu.rekap_pembayaran;

                    // Config menus
                    // === Pembayaran
                    if(pembayaran == '0'){
                        $('#mn-pembayaran').hide();
                    }else{
                        $('#mn-pembayaran').show();
                    }

                    // === User Management
                    if(config_user == '0'){
                        $('#mn-user-mgm').hide();
                        $('#mn-user-mgm-sc').hide();
                    }else{
                        $('#mn-user-mgm').show();
                        $('#mn-user-mgm-sc').show();
                    }

                    // === Akademik
                    if(siswa_aktif == '0' && siswa_non == '0' && rombel_prodi == '0'){
                        $('#mn-akademik').hide();
                        $('#mn-akademik-siswa').hide();
                        $('#mn-akademik-siswa-act').hide();
                        $('#mn-akademik-siswa-non').hide();
                        $('#mn-akademik-rombel').hide();
                    }else{
                        $('#mn-akademik').show();

                        if(siswa_aktif == '0' && siswa_non == '0'){
                            $('#mn-akademik-siswa').hide();
                            $('#mn-akademik-siswa-act').hide();
                            $('#mn-akademik-siswa-non').hide();
                        }else{
                            $('#mn-akademik-siswa').show();

                            if(siswa_aktif == '0'){
                                $('#mn-akademik-siswa-act').hide();
                            }else{
                                $('#mn-akademik-siswa-act').show();
                            }

                            if(siswa_non == '0'){
                                $('#mn-akademik-siswa-non').hide();
                            }else{
                                $('#mn-akademik-siswa-non').show();
                            }
                        }

                        if(rombel_prodi == '0'){
                            $('#mn-akademik-rombel').hide();
                        }else{
                            $('#mn-akademik-rombel').show();
                        }
                    }

                    // === Administrasi
                    if(kat_pembayaran == '0' && cat_pemasukan == '0' && cat_pengeluaran == '0' && rekap_keuangan == '0' && rekap_pembayaran == '0'){
                        $('#mn-administrasi').hide();
                        $('#mn-adm-kat-pembayaran').hide();
                        $('#mn-adm-keuangan').hide();
                        $('#mn-adm-keuangan-pemasukan').hide();
                        $('#mn-adm-keuangan-keluaran').hide();
                        $('#mn-adm-rekap').hide();
                        $('#mn-adm-rekap-keuangan').hide();
                        $('#mn-adm-rekap-pem').hide();
                    }else{
                        $('#mn-administrasi').show();

                        if(kat_pembayaran == '0'){
                            $('#mn-adm-kat-pembayaran').hide();
                        }else{
                            $('#mn-adm-kat-pembayaran').show();
                        }

                        if(cat_pemasukan == '0' && cat_pengeluaran == '0'){
                            $('#mn-adm-keuangan').hide();
                            $('#mn-adm-keuangan-pemasukan').hide();
                            $('#mn-adm-keuangan-keluaran').hide();
                        }else{
                            $('#mn-adm-keuangan').show();

                            if(cat_pemasukan == '0'){
                                $('#mn-adm-keuangan-pemasukan').hide();
                            }else{
                                $('#mn-adm-keuangan-pemasukan').show();
                            }

                            if(cat_pengeluaran == '0'){
                                $('#mn-adm-keuangan-keluaran').hide();
                            }else{
                                $('#mn-adm-keuangan-keluaran').show();
                            }
                        }

                        if(rekap_keuangan == '0' && rekap_pembayaran == '0'){
                            $('#mn-adm-rekap').hide();
                            $('#mn-adm-rekap-keuangan').hide();
                            $('#mn-adm-rekap-pem').hide();
                        }else{
                            $('#mn-adm-rekap').show();

                            if(rekap_keuangan == '0'){
                                $('#mn-adm-rekap-keuangan').hide();
                            }else{
                                $('#mn-adm-rekap-keuangan').show();
                            }

                            if(rekap_pembayaran == '0'){
                                $('#mn-adm-rekap-pem').hide();
                            }else{
                                $('#mn-adm-rekap-pem').show();
                            }
                        }
                    }
                    // mn-administrasi
                    // mn-adm-kat-pembayaran
                    // mn-adm-keuangan
                    // mn-adm-keuangan-pemasukan
                    // mn-adm-keuangan-keluaran
                    // mn-adm-rekap
                    // mn-adm-rekap-keuangan
                    // mn-adm-rekap-pem

                }
            })
        }
        
        // Load URL PAGES
        function HtmlLoad(url) {
            $('.show-page').empty();
            $('.show-page').load(url);
            $('#loading').show();
            
        }

        // Load URL PEMBAYARAN
        function HtmlLoadPem(urldata,idbtn) {
            $('.page-pem').empty();
            $('.page-pem').load(urldata);

            $('.btn-pem-show').removeClass('btn-danger').addClass('btn-primary');
            $('#mn-'+ idbtn).removeClass('btn-primary').addClass('btn-danger');
        }


        function loadMenus(){
            $('.menus-entry').empty();
            $('.menus-entry').load('pages/menus/menus.php');
        }


        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', { 
                style: 'currency', 
                currency: 'IDR' 
            }).format(number);
        }

        $(document).ready(function(){
            loadMenus();

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