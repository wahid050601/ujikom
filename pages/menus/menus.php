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
<div class="pcoded-navigation-label" data-i18n="nav.category.navigation"><i class="fas fa-users-cog"></i> User Management</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="#" onclick="HtmlLoad('pages/user/user.php')" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="fa fa-genderless"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">konfigurasi user</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>

<!-- Akademik -->
<div class="pcoded-navigation-label" data-i18n="nav.category.navigation"><i class="fas fa-graduation-cap"></i> Akademik</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="fas fa-genderless"></i></span>
            <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Data Siswa</span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
            <li class=" ">
                <a href="#" onclick="HtmlLoad('pages/siswa/siswa.php')" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i style="font-size: 8px;" class="fas fa-circle"></i>&nbsp; Siswa Aktif</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class=" ">
                <a href="#" onclick="HtmlLoad('pages/siswa/siswa-non.php')" class="waves-effect waves-dark" id="mn-siswa-nonaktif">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs"><i style="font-size: 8px;" class="fas fa-circle"></i>&nbsp; Siswa Nonaktif</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="#" onclick="HtmlLoad('pages/rombel/rombel.php')" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="fas fa-genderless"></i><b>R</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Rombel & Prodi</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
<!-- end MENU -->

<!-- Managemen pembayaran -->
<div class="pcoded-navigation-label" data-i18n="nav.category.navigation"><i class="fas fa-book"></i> Administrasi</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="#" onclick="HtmlLoad('pages/adm-katg/adm-katg.php')" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="fas fa-genderless"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Kategori Pembayaran</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="fas fa-genderless"></i></span>
            <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Keuangan</span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
            <li class=" ">
                <a href="#" onclick="HtmlLoad('pages/keuangan/pemasukan.php')" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i style="font-size: 8px;" class="fas fa-circle"></i>&nbsp; Catatan Pemasukan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class=" ">
                <a href="#" onclick="HtmlLoad('pages/keuangan/pengeluaran.php')" class="waves-effect waves-dark" id="mn-siswa-nonaktif">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs"><i style="font-size: 8px;" class="fas fa-circle"></i>&nbsp; Catatan Pengeluaran</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </li>
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="fas fa-genderless"></i></span>
            <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Rekapitulasi</span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
            <li class=" ">
                <a href="#" onclick="HtmlLoad('pages/rekapitulasi/rekapitulasi-keuangan.php')" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i style="font-size: 8px;" class="fas fa-circle"></i>&nbsp; Rekap Keuangan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class=" ">
                <a href="#" onclick="HtmlLoad('pages/rekapitulasi/rekapitulasi-pembayaran.php')" class="waves-effect waves-dark" id="mn-siswa-nonaktif">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs"><i style="font-size: 8px;" class="fas fa-circle"></i>&nbsp; Rekap Pembayaran</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </li>
</ul>