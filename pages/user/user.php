<style>
    table {
        width: 100%;
    }

    table tr th,td {
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .mn-list-1 {
        margin: 15px;
    }

    .mn-sub-list {
        margin: 10px;
    }
</style>


<div class="card">
    <div class="card-block show-page">
        <!-- Header -->
        <h5><i class="fas fa-users"></i> User Management</h5>
        <hr>

        <!-- Body -->
        <div class="row">
            <div class="col-lg-12">

                <ul class="list-group">
                    <li class="list-group-item"><i class="fas fa-th-list"></i> List Data User</li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary btn-mini rounded" id="add-user-btn"><i class="fas fa-plus"></i> add</button>
                        <button type="button" class="btn btn-primary btn-mini rounded" id="edit-user-btn"><i class="fas fa-pencil-alt"></i> edit</button>
                        <button type="button" class="btn btn-primary btn-mini rounded" id="delete-user-btn"><i class="fas fa-trash"></i> delete</button>
                        <button type="button" class="btn btn-primary btn-mini rounded" id="config-user-btn"><i class="fas fa-cogs"></i> config</button>

                        <div class="show-data-user">
                            
                        </div>
                    </li>
                </ul>

                <hr>

                <ul class="list-group">
                    <li class="list-group-item"><i class="fas fa-info-circle"></i> Informasi User</li>
                    <li class="list-group-item">
                        <div class="note-info-user" style="font-style: italic;">
                            <i class="fas fa-exclamation"></i> &nbsp; pilih/select salah satu data user
                        </div>

                        <div class="info-user" style="display: none;">
                            <div class="row">
                                <div class="col-lg-7">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                        <table>
                                            <tr>
                                                <th width="25%">Nama User</th>
                                                <th>:</th>
                                                <td class="name-user"></td>
                                            </tr>
                                            <tr>
                                                <th>No.Telp</th>
                                                <th>:</th>
                                                <td class="tlp-user"></td>
                                            </tr>
                                            <tr>
                                                <th>E-Mail</th>
                                                <th>:</th>
                                                <td class="email-user"></td>
                                            </tr>
                                            <tr>
                                                <th>User ID</th>
                                                <th>:</th>
                                                <td class="id-user"></td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <th>:</th>
                                                <td class="status-user"></td>
                                            </tr>
                                        </table>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-lg-5">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="header-acc-menus">
                                                <i class="fas fa-ellipsis-v"></i>&nbsp; List Menu Access
                                            </div>
                                            <hr>

                                            <div class="list-menus">
                                                <div class="mn-list-1">
                                                    <i class="fas fa-th-large"></i> Pembayaran <span class="pembayaran-mn"></span>
                                                </div>

                                                <div class="mn-list-1">
                                                    <i class="fas fa-th-large"></i> Konfigurasi User <span class="confuser-mn"></span>
                                                </div>

                                                <div class="mn-list-1">
                                                    <div><i class="fas fa-th-large"></i> Data Siswa</div>
                                                    <div class="mn-sub-list"> &emsp;&emsp;&emsp;&emsp; <i class="far fa-circle" style="font-size: 8px;"></i> Siswa Aktif <span class="siswaa-mn"></span></div>
                                                    <div class="mn-sub-list"> &emsp;&emsp;&emsp;&emsp; <i class="far fa-circle" style="font-size: 8px;"></i> Siswa Non-Aktif <span class="siswana-mn"></span></div>
                                                </div>

                                                <div class="mn-list-1">
                                                    <i class="fas fa-th-large"></i> Rombel & Prodi <span class="romprod-mn"></span>
                                                </div>

                                                <div class="mn-list-1">
                                                    <i class="fas fa-th-large"></i> Kategori Pembayaran <span class="katpem-mn"></span>
                                                </div>

                                                <div class="mn-list-1">
                                                    <div><i class="fas fa-th-large"></i> Keuangan</div>
                                                    <div class="mn-sub-list"> &emsp;&emsp;&emsp;&emsp; <i class="far fa-circle" style="font-size: 8px;"></i> Catatan Pemasukan <span class="catpem-mn"></span></div>
                                                    <div class="mn-sub-list"> &emsp;&emsp;&emsp;&emsp; <i class="far fa-circle" style="font-size: 8px;"></i> Catatan Pengeluaran <span class="catpeng-mn"></span></div>
                                                </div>

                                                <div class="mn-list-1">
                                                    <div><i class="fas fa-th-large"></i> Rekapitulasi</div>
                                                    <div class="mn-sub-list"> &emsp;&emsp;&emsp;&emsp; <i class="far fa-circle" style="font-size: 8px;"></i> Rekap Keuangan <span class="reku-mn"></span></div>
                                                    <div class="mn-sub-list"> &emsp;&emsp;&emsp;&emsp; <i class="far fa-circle" style="font-size: 8px;"></i> Rekap Pembayaran <span class="repem-mn"></span></div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- ==== MODAL SECTION ==== -->
<!-- Modal add user -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel"><i class="fas fa-plus"></i> &nbsp; Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-add-user">
                    <div class="form-group">
                        <label for="nm-user">Username</label>
                        <input type="text" class="form-control form-control-sm" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="nm-user">Password</label>
                        <input type="password" class="form-control form-control-sm" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="nm-user">Nama User</label>
                        <input type="text" class="form-control form-control-sm" id="nm-user" name="nm-user">
                    </div>
                    <div class="form-group">
                        <label for="nm-user">No.Telp</label>
                        <input type="text" class="form-control form-control-sm" id="tlp-user" name="tlp-user">
                    </div>
                    <div class="form-group">
                        <label for="nm-user">E-Mail</label>
                        <input type="email" class="form-control form-control-sm" id="email-user" name="email-user">
                    </div>
                    <div class="form-group">
                        <label for="alamat-user">Alamat</label>
                        <input type="text" class="form-control form-control-sm" id="alamat-user" name="alamat-user">
                    </div>
                    <div class="form-group">
                        <label for="sts-akun">Status Akun</label>
                        <select name="sts-akun" id="sts-akun" class="custom-select form-control-sm" style="width: 100%;">
                            <option value="">_pilih status_</option>
                            <option value="1" selected>Aktif</option>
                            <option value="0">Non-Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role-akun">Role Akun</label>
                        <select name="role-akun" id="role-akun" class="custom-select form-control-sm" style="width: 100%;">
                            <option value="">_pilih role_</option>
                            <option value="kepsek">Kepala Sekolah</option>
                            <option value="bendahara">Bendahara</option>
                            <option value="tu">Tata Usaha</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm rounded" data-dismiss="modal"><i class="fas fa-times"></i> batal</button>
                <button type="button" class="btn btn-primary btn-sm rounded" id="btn-submit-add-user"><i class="fas fa-save"></i> tambah</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal edit user -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel"><i class="fas fa-pencil-alt"></i> &nbsp; Update Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-edit-user">
                    <input type="hidden" id="id-user-edit" name="id-user-edit">
                    <div class="form-group">
                        <label for="nm-user">Username</label>
                        <input type="text" class="form-control form-control-sm" id="username-edit" name="username-edit">
                    </div>
                    <div class="form-group">
                        <label for="nm-user">Password</label>
                        <input type="password" class="form-control form-control-sm" id="password-edit" name="password-edit">
                    </div>
                    <div class="form-group">
                        <label for="nm-user">Nama User</label>
                        <input type="text" class="form-control form-control-sm" id="nm-user-edit" name="nm-user-edit">
                    </div>
                    <div class="form-group">
                        <label for="nm-user">No.Telp</label>
                        <input type="text" class="form-control form-control-sm" id="tlp-user-edit" name="tlp-user-edit">
                    </div>
                    <div class="form-group">
                        <label for="nm-user">E-Mail</label>
                        <input type="email" class="form-control form-control-sm" id="email-user-edit" name="email-user-edit">
                    </div>
                    <div class="form-group">
                        <label for="alamat-user">Alamat</label>
                        <input type="text" class="form-control form-control-sm" id="alamat-user-edit" name="alamat-user-edit">
                    </div>
                    <div class="form-group">
                        <label for="sts-akun">Status Akun</label>
                        <select name="sts-akun-edit" id="sts-akun-edit" class="custom-select form-control-sm" style="width: 100%;">
                            <option value="">_pilih status_</option>
                            <option value="1" selected>Aktif</option>
                            <option value="0">Non-Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role-akun">Role Akun</label>
                        <select name="role-akun-edit" id="role-akun-edit" class="custom-select form-control-sm" style="width: 100%;">
                            <option value="">_pilih role_</option>
                            <option value="kepsek">Kepala Sekolah</option>
                            <option value="bendahara">Bendahara</option>
                            <option value="tu">Tata Usaha</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm rounded" data-dismiss="modal"><i class="fas fa-times"></i> batal</button>
                <button type="button" class="btn btn-primary btn-sm rounded" id="btn-submit-edit-user"><i class="fas fa-pencil-alt"></i> update</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal config user -->
<div class="modal fade" id="configUserModal" tabindex="-1" role="dialog" aria-labelledby="configUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="configUserModalLabel"><i class="fas fa-cogs"></i> &nbsp; Config Role Akses User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="list-menus">

                    <ul class="list-group">
                        <li class="list-group-item"><input type="checkbox" id="mn-pembayaran" value="0"> Pembayaran</li>
                        <li class="list-group-item"><input type="checkbox" id="mn-conf-user" value="0"> Konfigurasi User</li>
                        <li class="list-group-item">
                            <div>Data Siswa</div>
                            <div class="mn-sub-list"> &emsp;&emsp;&emsp;&emsp; <input type="checkbox" id="mn-siswa-aktif" value="0"> Siswa Aktif</div>
                            <div class="mn-sub-list"> &emsp;&emsp;&emsp;&emsp; <input type="checkbox" id="mn-siswa-non" value="0"> Siswa Non-Aktif</div>
                        </li>
                        <li class="list-group-item"><input type="checkbox" id="mn-prod-rom" value="0"> Rombel & Prodi</li>
                        <li class="list-group-item"><input type="checkbox" id="mn-katg-pem" value="0"> Kategori Pembayaran</li>
                        <li class="list-group-item">
                            <div>Keuangan</div>
                            <div class="mn-sub-list"> &emsp;&emsp;&emsp;&emsp; <input type="checkbox" id="mn-cat-pem" value="0"> Catatan Pemasukan</div>
                            <div class="mn-sub-list"> &emsp;&emsp;&emsp;&emsp; <input type="checkbox" id="mn-cat-peng" value="0"> Catatan Pengeluaran</div>
                        </li>
                        <li class="list-group-item">
                            <div>Rekapitulasi</div>
                            <div class="mn-sub-list"> &emsp;&emsp;&emsp;&emsp; <input type="checkbox" id="mn-rekku" value="0"> Rekap Keuangan</div>
                            <div class="mn-sub-list"> &emsp;&emsp;&emsp;&emsp; <input type="checkbox" id="mn-rekpem" value="0"> Rekap Pembayaran</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm rounded" data-dismiss="modal"><i class="fas fa-times"></i> batal</button>
                <button type="button" class="btn btn-primary btn-sm rounded" id="btn-submit-config-user"><i class="fa-solid fa-gear"></i> config</button>
            </div>
        </div>
    </div>
</div>


<script>
    $('#loading').hide();

    // Load data user
    loadDataUser();


    // Add Data User
    $('#add-user-btn').on('click', function(){
        $('#form-add-user')[0].reset();
        $('#sts-akun').val('1').trigger('changes')
        $('#addUserModal').modal('show');
    });
    $('#btn-submit-add-user').on('click', function(){
        // set value data
        let username = $('#username').val();
        let password = $('#password').val();
        let namauser = $('#nm-user').val();
        let telp = $('#tlp-user').val();
        let email = $('#email-user').val();
        let alamat = $('#alamat-user').val();
        let statusakun = $('#sts-akun').val();
        let role = $('#role-akun').val();

        if(username == '' || password == '' || namauser == '' || telp == '' || email == '' || statusakun == '' || role == ''){
            $('#addUserModal').modal('hide');
            Swal.fire({
                icon: 'warning',
                title: 'Lengkapi Form',
                text: 'Mohon lengkapi semua form terlebih dahulu'
            }).then((ok) => {
                $('#addUserModal').modal('show');
            });
        }else{
            $('#loading').show();
            $('#addUserModal').modal('hide');
            $.ajax({
                url: 'pages/user/user-func.php',
                method: 'post',
                dataType: 'json',
                data: {
                    'action': 'addDataUser',
                    'username': username,
                    'password': password,
                    'nama': namauser,
                    'telp': telp,
                    'email': email,
                    'alamat': alamat,
                    'statusakun': statusakun,
                    'role': role
                },
                success: function(msg){
                    if(msg.status == 'success'){
                        Swal.fire({
                            title: msg.status,
                            text: msg.info,
                            icon: msg.status
                        }).then((ok) => {
                            $('#form-add-user')[0].reset();
                            loadDataUser();
                            $('#loading').hide();
                        });
                    }else{
                        Swal.fire({
                            title: msg.status,
                            text: msg.info,
                            icon: msg.status
                        }).then((ok) => {
                            $('#addUserModal').modal('show');
                            $('#loading').hide();
                        });
                    }
                    $('#loading').hide();
                }
            });
        }
    });


    // Edit Data User
    $('#edit-user-btn').on('click', function(){
        if($('table#table-userm tr.selected').length > 0){
            $('#loading').show();
            let idUser =  $('tr.selected').data('iduser');
            
            $.ajax({
                type: 'POST',
                url: 'pages/user/user-load.php',
                dataType: 'json',
                data: {
                    "action" : "loadSingleDataUser",
                    "iduser" : idUser
                },
                success: function(data) {
                    $('#id-user-edit').val(data.datas_user.id_adm);
                    $('#username-edit').val(data.datas_user.user_adm);
                    $('#password-edit').val(data.datas_user.pass_adm);
                    $('#nm-user-edit').val(data.datas_user.nama_adm);
                    $('#tlp-user-edit').val(data.datas_user.tlp_adm);
                    $('#email-user-edit').val(data.datas_user.email_adm);
                    $('#alamat-user-edit').val(data.datas_user.alamat_adm);
                    $('#sts-akun-edit').val(data.datas_user.sts_akun_adm);
                    $('#role-akun-edit').val(data.datas_user.role_adm);
                }
            });
            $('#editUserModal').modal('show');
            $('#loading').hide();
        }else{
            Swal.fire({
                title: "warning",
                text: "pilih salah satu data pengguna",
                icon: "warning",
            });
        }
    });
    $('#btn-submit-edit-user').on('click', function(){
        // set value data
        let id = $('#id-user-edit').val();
        let username = $('#username-edit').val();
        let password = $('#password-edit').val();
        let namauser = $('#nm-user-edit').val();
        let telp = $('#tlp-user-edit').val();
        let email = $('#email-user-edit').val();
        let alamat = $('#alamat-user-edit').val();
        let statusakun = $('#sts-akun-edit').val();
        let role = $('#role-akun-edit').val();

        if(username == '' || password == '' || namauser == '' || telp == '' || email == '' || statusakun == '' || role == ''){
            $('#editUserModal').modal('hide');
            Swal.fire({
                icon: 'warning',
                title: 'Lengkapi Form',
                text: 'Mohon lengkapi semua form terlebih dahulu'
            }).then((ok) => {
                $('#editUserModal').modal('show');
            });
        }else{
            $('#loading').show();
            $('#editUserModal').modal('hide');
            $.ajax({
                url: 'pages/user/user-func.php',
                method: 'post',
                dataType: 'json',
                data: {
                    'action': 'editDataUser',
                    'iduser': id,
                    'username': username,
                    'password': password,
                    'nama': namauser,
                    'telp': telp,
                    'email': email,
                    'alamat': alamat,
                    'statusakun': statusakun,
                    'role': role
                },
                success: function(msg){
                    if(msg.status == 'success'){
                        Swal.fire({
                            title: msg.status,
                            text: msg.info,
                            icon: msg.status
                        }).then((ok) => {
                            $('#form-add-user')[0].reset();
                            loadDataUser();
                            $('#loading').hide();
                        });
                    }else{
                        Swal.fire({
                            title: msg.status,
                            text: msg.info,
                            icon: msg.status
                        }).then((ok) => {
                            $('#editUserModal').modal('show');
                            $('#loading').hide();
                        });
                    }
                    $('#loading').hide();
                }
            });
        }
    });


    // Delete Data User
    $('#delete-user-btn').on('click', function(){
        if($('table#table-userm tr.selected').length > 0){
            Swal.fire({
                title: "Hapus Data Pengguna",
                html: "Ingin menghapus data pengguna ini ? <br><br> <i>seluruh konfigurasi pengguna yang dihapus akan hilang</i>",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "yes"
            }).then((result) => {
                if(result.isConfirmed){

                    let iduser =  $('tr.selected').data('iduser');
                    $.ajax({
                        url: 'pages/user/user-func.php',
                        method: 'post',
                        dataType: 'json',
                        data: {
                            'action': 'deleteDataUser',
                            'iduser': iduser
                        },
                        success: function(msg){
                            Swal.fire({
                                title: msg.status,
                                text: msg.info,
                                icon: msg.status,
                            }).then((ok) => {
                                $('.note-info-user').show();
                                $('.info-user').css('display', 'none');
                                loadDataUser();
                            });
                        }
                    });
                }
            });
        }else{
            Swal.fire({
                title: "warning",
                text: "pilih salah satu data pengguna untuk di hapus",
                icon: "warning",
            });
        }
    });


    // Config Data User
    // $('#mn-pembayaran').val();
    // $('#mn-conf-user').val();
    // $('#mn-siswa-aktif').val();
    // $('#mn-siswa-non').val();
    // $('#mn-prod-rom').val();
    // $('#mn-katg-pem').val();
    // $('#mn-cat-pem').val();
    // $('#mn-cat-peng').val();
    // $('#mn-rekku').val();
    // $('#mn-rekpem').val();

    $('#config-user-btn').on('click', function(){
        if($('table#table-userm tr.selected').length > 0){

            let idUser =  $('tr.selected').data('iduser');
            $.ajax({
                url: 'pages/user/user-load.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    "action" : "loadSingleDataUser",
                    "iduser" : idUser
                },
                success: function(data){
                    let sts_pembayaran = data.data_menu.pembayaran == '1' ? true : false;
                    $('#mn-pembayaran').val(data.data_menu.pembayaran).attr('checked', sts_pembayaran);

                    let sts_konfig_user = data.data_menu.konfig_user == '1' ? true : false;
                    $('#mn-conf-user').val(data.data_menu.konfig_user).attr('checked', sts_konfig_user);

                    let sts_dt_siswa_aktif = data.data_menu.dt_siswa_aktif == '1' ? true : false;
                    $('#mn-siswa-aktif').val(data.data_menu.dt_siswa_aktif).attr('checked', sts_dt_siswa_aktif);

                    let sts_td_siswa_nonaktif = data.data_menu.td_siswa_nonaktif == '1' ? true : false;
                    $('#mn-siswa-non').val(data.data_menu.td_siswa_nonaktif).attr('checked', sts_td_siswa_nonaktif);

                    let sts_rombel_prodi = data.data_menu.rombel_prodi == '1' ? true : false;
                    $('#mn-prod-rom').val(data.data_menu.rombel_prodi).attr('checked', sts_rombel_prodi);

                    let sts_kat_pembayaran = data.data_menu.kat_pembayaran == '1' ? true : false;
                    $('#mn-katg-pem').val(data.data_menu.kat_pembayaran).attr('checked', sts_kat_pembayaran);

                    let sts_catatan_pemasukan = data.data_menu.catatan_pemasukan == '1' ? true : false;
                    $('#mn-cat-pem').val(data.data_menu.catatan_pemasukan).attr('checked', sts_catatan_pemasukan);

                    let sts_catatan_pengeluaran = data.data_menu.catatan_pengeluaran == '1' ? true : false;
                    $('#mn-cat-peng').val(data.data_menu.catatan_pengeluaran).attr('checked', sts_catatan_pengeluaran);

                    let sts_rekap_keuangan = data.data_menu.rekap_keuangan == '1' ? true : false;
                    $('#mn-rekku').val(data.data_menu.rekap_keuangan).attr('checked', sts_rekap_keuangan);

                    let sts_rekap_pembayaran = data.data_menu.rekap_pembayaran == '1' ? true : false;
                    $('#mn-rekpem').val(data.data_menu.rekap_pembayaran).attr('checked', sts_rekap_pembayaran);
                }
            });

            $('#configUserModal').modal('show');

            // Act Pembayaran
            $('#mn-pembayaran').change(function(){
                $('#mn-pembayaran').val('1');
                if (!$('#mn-pembayaran').is(':checked')){
                    $('#mn-pembayaran').val('0');
                }
            });

            // Act Config User
            $('#mn-conf-user').change(function(){
                $('#mn-conf-user').val('1');
                if (!$('#mn-conf-user').is(':checked')){
                    $('#mn-conf-user').val('0');
                }
            });

            // Act Siswa Aktif
            $('#mn-siswa-aktif').change(function(){
                $('#mn-siswa-aktif').val('1');
                if (!$('#mn-siswa-aktif').is(':checked')){
                    $('#mn-siswa-aktif').val('0');
                }
            });

            // Act Siswa Non Aktif
            $('#mn-siswa-non').change(function(){
                $('#mn-siswa-non').val('1');
                if (!$('#mn-siswa-non').is(':checked')){
                    $('#mn-siswa-non').val('0');
                }
            });

            // Act Prodi Rombel
            $('#mn-prod-rom').change(function(){
                $('#mn-prod-rom').val('1');
                if (!$('#mn-prod-rom').is(':checked')){
                    $('#mn-prod-rom').val('0');
                }
            });

            // Act Katg Pembayaran
            $('#mn-katg-pem').change(function(){
                $('#mn-katg-pem').val('1');
                if (!$('#mn-katg-pem').is(':checked')){
                    $('#mn-katg-pem').val('0');
                }
            });

            // Act Catatan Pem
            $('#mn-cat-pem').change(function(){
                $('#mn-cat-pem').val('1');
                if (!$('#mn-cat-pem').is(':checked')){
                    $('#mn-cat-pem').val('0');
                }
            });

            // Act Catatan Pengeluaran
            $('#mn-cat-peng').change(function(){
                $('#mn-cat-peng').val('1');
                if (!$('#mn-cat-peng').is(':checked')){
                    $('#mn-cat-peng').val('0');
                }
            });

            // Act Rekap Keuangan
            $('#mn-rekku').change(function(){
                $('#mn-rekku').val('1');
                if (!$('#mn-rekku').is(':checked')){
                    $('#mn-rekku').val('0');
                }
            });

            // Act Rekap Pem
            $('#mn-rekpem').change(function(){
                $('#mn-rekpem').val('1');
                if (!$('#mn-rekpem').is(':checked')){
                    $('#mn-rekpem').val('0');
                }
            });

        }else{
            Swal.fire({
                title: "warning",
                text: "pilih salah satu data pengguna untuk di lakukan konfigurasi",
                icon: "warning",
            });
        }
    });
    $('#btn-submit-config-user').on('click', function(){
        $('#loading').show();
        let idUser =  $('tr.selected').data('iduser');
        let jsonConfMenu = {
            iduser: idUser,
            pembayaran: $('#mn-pembayaran').val(),
            config_user: $('#mn-conf-user').val(),
            siswa_aktif: $('#mn-siswa-aktif').val(),
            siswa_non: $('#mn-siswa-non').val(),
            prodi_rombel: $('#mn-prod-rom').val(),
            katg_pem: $('#mn-katg-pem').val(),
            catatan_pem: $('#mn-cat-pem').val(),
            catatan_peng: $('#mn-cat-peng').val(),
            rekap_keuangan: $('#mn-rekku').val(),
            rekap_pem: $('#mn-rekpem').val()
        }
        
        $.ajax({
            url: 'pages/user/user-func.php',
            method: 'post',
            dataType: 'json',
            data: {
                'action': 'configUserMenu',
                'dataconfig': jsonConfMenu
            },
            success: function(msg){
                if(msg.status == 'success'){
                    $('#configUserModal').modal('hide');
                    $('#loading').hide();
                    Swal.fire({
                        title: msg.status,
                        text: msg.info,
                        icon: msg.status
                    }).then((ok) => {
                        $('.note-info-user').show();
                        $('.info-user').css('display', 'none');
                        loadDataUser();
                    })
                }else{
                    $('#configUserModal').modal('hide');
                    $('#loading').hide();
                    Swal.fire({
                        title: msg.status,
                        text: msg.info,
                        icon: msg.status
                    }).then((ok) => {
                        $('#configUserModal').modal('show');
                    })
                }
            }
        });
    });



    function loadDataUser(){
        $.ajax({
            method: 'POST',
            url: 'pages/user/user-load.php',
            dataType: 'json',
            data: {'action' : 'loadDataUser'},
            success: function(users){
                if(users.status == 'success'){
                    
                    let nums = 1;
                    let listUser = `
                    <table class="table table-bordered table-sm" id="table-userm" width="100%">
                    <thead class="bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama User</th>
                            <th>No.Telp</th>
                            <th>E-Mail</th>
                            <th>User ID</th>
                            <th>Role Akun</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>`;

                    $.each(users.data_user, function(id,val){

                        let status = val.sts_akun_adm == '1' ? '<span class="badge badge-success">active</span>' : '<span class="badge badge-danger">disable</span>';
                        let role_akun = '';
                        if(val.role_adm == 'tu'){
                            role_akun = 'Tata Usaha';
                        }else if(val.role_adm == 'kepsek'){
                            role_akun = 'Kepala Sekolah';
                        }else if(val.role_adm == 'bendahara'){
                            role_akun = 'Bendahara';
                        }else{
                            role_akun = 'Administrator'
                        }


                        listUser += `
                        <tr data-iduser="${val.id_adm}">
                            <th>${nums}</th>
                            <td><span class="badge badge-primary badge-lg"><i class="fas fa-user"></i></span>&nbsp; ${val.nama_adm}</td>
                            <td>${val.tlp_adm}</td>
                            <td>${val.email_adm}</td>
                            <td>${val.user_adm}</td>
                            <td>${role_akun}</td>
                            <td>${status}</td>
                        </tr>`;

                        nums++;
                    });

                    listUser += `
                    </tbody>
                    </table>`;

                    // set table user list
                    $('.show-data-user').html(listUser);
                    let tableSetList = $('#table-userm').DataTable({
                        processing: true,
                        serverside: true,
                        select: true,
                        selected: true,
                        scrollX: true
                    });

                    // Get info detail user
                    tableSetList.on('select', function (e, dt, type, indexes){
                        if (type === 'row') {
                            let rowNode = tableSetList.row(indexes).node();
                            let idRow = $(rowNode).attr('data-iduser');

                            // get single info user
                            $.ajax({
                                method: 'POST',
                                url: 'pages/user/user-load.php',
                                dataType: 'json',
                                data: {
                                    'action' : 'loadSingleDataUser',
                                    'iduser' : idRow
                                },
                                success: function(users){
                                    if(users.status == 'success'){
                                        $('.note-info-user').hide();

                                        // set info user
                                        let userinfo = users.datas_user;
                                        let status_usr = userinfo.sts_akun_adm == '1' ? '<span class="badge badge-success">active</span>' : '<span class="badge badge-danger">disable</span>';
                                        $('.name-user').html(userinfo.nama_adm);        
                                        $('.tlp-user').html(userinfo.tlp_adm);        
                                        $('.email-user').html(userinfo.email_adm);        
                                        $('.id-user').html(userinfo.user_adm);        
                                        $('.status-user').html(status_usr);

                                        // set info menu
                                        let menus = users.data_menu;
                                        $('.pembayaran-mn').html(menus.pembayaran == '1' ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>');
                                        $('.confuser-mn').html(menus.konfig_user == '1' ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>');
                                        $('.siswaa-mn').html(menus.dt_siswa_aktif == '1' ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>');
                                        $('.siswana-mn').html(menus.td_siswa_nonaktif == '1' ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>');
                                        $('.romprod-mn').html(menus.rombel_prodi == '1' ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>');
                                        $('.katpem-mn').html(menus.kat_pembayaran == '1' ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>');
                                        $('.catpem-mn').html(menus.catatan_pemasukan == '1' ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>');
                                        $('.catpeng-mn').html(menus.catatan_pengeluaran == '1' ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>');
                                        $('.reku-mn').html(menus.rekap_keuangan == '1' ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>');
                                        $('.repem-mn').html(menus.rekap_pembayaran == '1' ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>');

                                        // Display data
                                        $('.note-info-user').hide();
                                        $('.info-user').css('display', 'contents');
                                        
                                    }else if(users.status == 'error'){
                                        Swal.fire({
                                            title: users.status,
                                            text: users.info,
                                            icon: users.status
                                        });
                                    }
                                }
                            })
                        }
                    });

                    tableSetList.on('deselect', function (e, dt, type, indexes) {
                        $('.note-info-user').show();
                        $('.info-user').css('display', 'none');
                    })
                    
                    $('#loading').hide();

                }else if(users.status == 'error'){
                    Swal.fire({
                        title: users.status,
                        text: users.info,
                        icon: users.status, 
                    });
                }
            }
        });
    }
</script>