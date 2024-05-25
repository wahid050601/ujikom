<style>
    .box-body {
        display: flex;
        flex-wrap: wrap;
    }

    .parent{
        /* flex: 1 0 21%; */
        border: 1px solid rgb(181, 181, 181);
        border-radius: 5px;
        padding: 10px;
        margin: 5px
    }

    .rombel {
        font-size: 20px;
    }

    .prodi {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; 
        /* width: 100px; */

    }

    .table-custom {
        width: 100%;
    }
    .table-custom tr th, td {
        border: 1px solid lightgrey;
        padding: 5px;
        font-size: 12px;
    }
</style>

<div class="card">
    <div class="card-block show-page">
        <!-- Header -->
        <span><i class="fas fa-university"></i>&nbsp; Rombongan Belajar</span>
        <hr>

        <button type="button" class="btn btn-primary btn-mini rounded" id="btnAdd-rombel"><i class="fas fa-plus"></i> add</button>
        <ul class="list-group mt-2">
            <!-- <li class="list-group-item">
                <button class="btn btn-primary btn-mini"><i class="fas fa-pencil-alt"></i> edit</button>
                <button class="btn btn-primary btn-mini"><i class="fas fa-trash"></i> delete</button>
            </li> -->
            <li class="list-group-item">
                <div class="row row-rombel-list">
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- Modal Section -->
<!-- ADD ROMBEL -->
<div class="modal fade" id="addRombelModal" tabindex="-1" role="dialog" aria-labelledby="addRombelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRombelModalLabel"><i class="fas fa-university"></i> Tambah Rombel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-add-rombel">
                    <div class="form-group">
                        <label for="">Nama Rombel</label>
                        <input type="text" id="nama-rombel" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select id="kelas-rombel" class="custom-select form-control-sm" style="width: 100%;">
                            <option value="">_ pilih kelas _</option>
                            <option value="X">X (Sepuluh)</option>
                            <option value="XI">XI (Sebelas)</option>
                            <option value="XII">XII (Duabelas)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Program Studi</label>
                        <select id="prodi-rombel" class="custom-select form-control-sm" style="width: 100%;">
                            <option value="">_ pilih prodi _</option>
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            <option value="Akuntansi Keuangan dan Lembaga">Akuntansi Keuangan dan Lembaga</option>
                            <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-8">
                                <label for="">Tahun Pelajaran</label>
                                <input type="text" id="tp-rombel" class="form-control form-control-sm" placeholder="Ex : 2018/2019">
                            </div>
                            <div class="col-lg-4">
                                <label for="">Semester</label>
                                <select id="smtr-rombel" class="custom-select form-control-sm" style="width: 100%;">
                                    <option value="">_ pilih smtr _</option>
                                    <option value="ganjil">Ganjil</option>
                                    <option value="genap">Genap</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                <button type="button" class="btn btn-primary btn-mini" id="btn-save-add-rombel"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- VIEW ROMBEL -->
<div class="modal fade" id="viewRombelModal" tabindex="-1" role="dialog" aria-labelledby="viewRombelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="viewRombelModalLabel"><i class="fas fa-university"></i> View Rombel <span class="rombel-name"></span></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="button-temp-main mb-2" style="position: absolute; z-index: 9999;">
                    
                </div>
                <div class="show-rombel-view">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
                <!-- <button type="button" class="btn btn-primary btn-mini"><i class="fas fa-save"></i> Simpan</button> -->
            </div>
        </div>
    </div>
</div>

<!-- VIEW-EDIT ROMBEL -->
<div class="modal fade" id="viewEditRombelModal" tabindex="-1" role="dialog" aria-labelledby="viewEditRombelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="viewEditRombelModalLabel"><i class="fas fa-university"></i> Register Rombel <span class="rombel-name-tm"></span></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-edit mb-2 d-flex flex-row">
                    <input type="text" class="form-control form-control-sm" id="updt-nm-rombel" style="width: 50%;">
                    <!-- <button type="button" class="ml-2 btn btn-primary btn-mini" id="btn-updt-nm-rombel"><i class="fas fa-check"></i></button> -->
                    <!-- <div class="ml-3 sts-updt-rombel" style="color: lightgreen;"><i class="fas fa-check"></i> Rombel berhasil diubah</div> -->
                </div>
                <hr>
                <div class="button-temp mb-2" style="position: absolute; z-index: 9999;">
                    
                </div>
                <div class="show-rombel-temp">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
                <!-- <button type="button" class="btn btn-primary btn-mini"><i class="fas fa-save"></i> Simpan</button> -->
            </div>
        </div>
    </div>
</div>

<script>
    $('#loading').hide();

    // Load Rombel
    loadRombelSiswa();

    // Add rombel
    $('#btnAdd-rombel').on('click', function(){
        $('#addRombelModal').modal('show');
    });
    
    $('#btn-save-add-rombel').on('click', function(){
        if($('#nama-rombel').val() == '' || $('#kelas-rombel').val() == '' || $('#prodi-rombel').val() == '' || $('#tp-rombel').val() == '' || $('#smtr-rombel').val() == ''){
            $('#addRombelModal').modal('hide');
            Swal.fire({
                title : "warning",
                text: "lengkapi form terlebih dahulu !",
                icon: "warning",
                confirmButtonText: 'lengkapi'
            }).then((ok)=>{
                $('#addRombelModal').modal('show');
            });
        }else{
            $('#loading').show();
            let datarombel_json = {
                action : "addRombel",
                rombel : $('#nama-rombel').val(),
                kelas : $('#kelas-rombel').val(),
                prodi : $('#prodi-rombel').val(),
                tp : $('#tp-rombel').val(),
                smtr : $('#smtr-rombel').val()
            }
    
            $.ajax({
                method: 'post',
                url: 'pages/rombel/rombel-func.php',
                dataType: 'json',
                data: datarombel_json,
                beforeSend: function(cls){
                    $('#form-add-rombel')[0].reset();
                    $('#addRombelModal').modal('hide');
                },
                success: function(msg){
                    $('#loading').hide();
                    Swal.fire({
                        title: msg.status,
                        text: msg.info,
                        icon: msg.status
                    }).then((ok)=>{
                        loadRombelSiswa();
                    });
                }
            });
        }
    });

    // Register
    // $('#reg-rombel-siswa').on('click', function(){});
    

    function loadRombelSiswa(){
        $('#loading').show();

        $.ajax({
            method: 'post',
            url: 'pages/rombel/rombel-load.php',
            dataType: 'json',
            data: {"action" : "loadRombel"},
            success: function(msg){
                if(msg.status == 'success'){
                    if(msg.datarombel == ''){
                        $('.row-rombel-list').empty();

                        let nullRombel = `
                        <div class="col-lg-12 text-center">
                            <span class="h5"><i class="fas fa-exclamation-circle"></i> Rombongan belajar belum dibuat ...</span>
                        </div>`;
                        $('.row-rombel-list').append(nullRombel);
                    }else{
                        $('.row-rombel-list').empty();
                        let setRombel = '';

                        $.each(msg.datarombel, function(id,val){
                            setRombel += `
                            <div class="col-lg-2">
                                <div class="parent">
                                    <div class="rombel"><i class="fas fa-university"></i> ${val.nama_rbl}</div>
                                    <div class="prodi" title="${val.kelas_rbl+ ' ' +val.prodi_rbl}">${val.kelas_rbl+ ' ' +val.prodi_rbl}</div>
                                    <div class="tp-smtr" title="${val.tp_rbl}" style="color: red; font-size: 10px; font-style: italic;">TP. ${val.tp_rbl}</div>
                                    <div class="button">
                                        <span onclick="viewRombel('${val.id_rbl}', '${val.nama_rbl}')" class="label label-primary" title="view data siswa" style="cursor: pointer;"><i class="fas fa-eye"></i></span>
                                        <span onclick="editRombel('${val.id_rbl}', '${val.nama_rbl}')" class="label label-primary" title="register data siswa" style="cursor: pointer;"><i class="fas fa-pencil-alt"></i></span>
                                        <span onclick="naikkelasRombel('${val.id_rbl}','${val.nama_rbl}','${val.tp_rbl}')" class="label label-primary" title="naik kelas/semester" style="cursor: pointer;"><i class="fas fa-arrow-alt-circle-up"></i></span>
                                        <span onclick="delRombel('${val.id_rbl}','${val.nama_rbl}')" class="label label-danger" title="hapus rombel" style="cursor: pointer;"><i class="fas fa-trash"></i></span>
                                    </div>
                                </div>
                            </div>`;
                        });
                        $('.row-rombel-list').append(setRombel);
                        $('#loading').hide();
                    }
                }else{

                }
            }
        });
    }

    // CRUD FUNCTION ROMBEL
    function viewRombel(idrombel, namaRombel){
        $('#loading').show();

        $.ajax({
            method: 'post',
            url: 'pages/rombel/rombel-load.php',
            dataType: 'json',
            data: {
                'action' : 'loadSingleRombel',
                'idrombel' : idrombel
            },
            success: function(rbl){
                let tableRombel = `
                <table class="table-custom" id="table-main-siswa">
                <thead class="bg-primary">
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>NISN</th>
                    <th>Kelas</th>
                </tr>
                </thead>
                <tbody>`;
                $.each(rbl.datarbl, function(id,val){
                    tableRombel += `
                    <tr>
                        <td><input type="checkbox" value="${val.id}"></td>
                        <td>${val.nama_siswa}</td>
                        <td>${val.nis_siswa}</td>
                        <td>${val.nisn_siswa}</td>
                        <td>${val.kls_siswa}</td>
                    </tr>`;
                });
                tableRombel += `
                </tbody>
                </table>`;

                $('.button-temp-main').empty();
                $('.button-temp-main').append(`<button type="button" onclick="unregisterRombel('${idrombel}','${namaRombel}')" class="btn btn-primary btn-mini"><i class="fas fa-arrow-right"></i> unregister</button>`);

                $('.show-rombel-view').empty();
                $('.show-rombel-view').append(tableRombel);
                $('#table-main-siswa').DataTable({
                    "dom": 'ftipr'
                });

                $('.rombel-name').html(namaRombel);
                $('#viewRombelModal').modal('show');

                $('#loading').hide();
            }
        });
        
    }

    function editRombel(idrombel, namaRombel){
        // $('#viewEditRombelModal').modal('hide');
        $('#loading').show();

        $.ajax({
            method: 'post',
            url: 'pages/rombel/rombel-load.php',
            dataType: 'json',
            data: {
                'action' : 'editLoadSingleRombel',
                'idrombel' : idrombel
            },
            success: function(rbl){
                // console.log(rbl);
                let tableRombel = `
                <table class="table-custom" id="table-temp-siswa">
                <thead class="bg-primary">
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>NISN</th>
                    <th>Kelas</th>
                </tr>
                </thead>
                <tbody>`;
                $.each(rbl.listsiswa, function(id,val){
                    tableRombel += `
                    <tr>
                        <td width="5%"><input type="checkbox" id="reg-rombel" value="${val.id}" name="reg-rombel"></td>
                        <td>${val.nama_siswa}</td>
                        <td>${val.nis_siswa}</td>
                        <td>${val.nisn_siswa}</td>
                        <td>${val.kls_siswa}</td>
                    </tr>`;
                });
                tableRombel += `
                </tbody>
                </table>`;

                $('.show-rombel-temp').empty();
                $('.show-rombel-temp').append(tableRombel);
                $('#table-temp-siswa').DataTable({
                    "dom": 'ftipr'
                });
                
                $('#updt-nm-rombel').val(namaRombel);
                $('#btn-updt-nm-rombel').remove();
                $('#updt-nm-rombel').after(`<button type="button" data-idrombel="${idrombel}" class="ml-2 btn btn-primary btn-mini" id="btn-updt-nm-rombel"><i class="fas fa-check"></i></button>`);
                
                $('#btn-updt-nm-rombel').on('click', function(){
                    $('#loading').show();
                    $.ajax({
                        method: 'post',
                        url: 'pages/rombel/rombel-func.php',
                        dataType: 'json',
                        data: {
                            'action' : 'editNamaRombel',
                            'idrombel' : idrombel,
                            'nmrombel' : $('#updt-nm-rombel').val()
                        },
                        beforeSend: function(bs){
                            $('#viewEditRombelModal').modal('hide');
                        },
                        success: function(rbl){
                            loadRombelSiswa();
                            // $('#viewEditRombelModal').modal('show');
                        }
                    });
                })

                $('.button-temp').empty();
                $('.button-temp').html(`<button type="button" onclick="registerRombel('${idrombel}','${namaRombel}')" class="btn btn-primary btn-mini" id="reg-rombel-siswa"><i class="fas fa-arrow-left"></i> register</button>`);

                $('.rombel-name-tm').html(namaRombel);
                $('#viewEditRombelModal').modal('show');

                $('#loading').hide();
            }
        });
    }

    function registerRombel(idrombel, namaRombel){
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });

        // Function set
        // let idrombel = $(this).data('idrombel');
        // let namaRombel = $('.rombel-name-tm').text();

        if(val.length == 0){
            $('#viewEditRombelModal').modal('hide');
            Swal.fire({
                title: "warning",
                text: "pilih setidaknya satu siswa untuk register",
                icon: 'warning'
            }).then((ok)=>{
                $('#viewEditRombelModal').modal('show');
            });
        }else{
            
            $('#loading').show();
            let sendId = JSON.stringify(val);
            $.ajax({
                method: 'post',
                url: 'pages/rombel/rombel-func.php',
                dataType: 'json',
                data: {
                    'action' : 'regRombelSiswa',
                    'idsiswa' : sendId,
                    'idrombel' : idrombel
                },
                beforeSend: function(bs){
                    $('#viewEditRombelModal').modal('hide');
                },
                success: function(msg){
                    $('#loading').hide();
                    let info = msg.status == 'success' ? val.length + ' siswa berhasil di-register pada rombel '+ namaRombel : msg.info;
                    Swal.fire({
                        title: msg.status,
                        text: info,
                        icon: msg.status
                    }).then((ok)=>{
                        editRombel(idrombel, namaRombel);
                    });
                }
            });
        }
    }

    function unregisterRombel(idrombel, namaRombel){
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });

        if(val.length == 0){
            $('#viewRombelModal').modal('hide');
            Swal.fire({
                title: "warning",
                text: "pilih setidaknya satu siswa untuk unregister",
                icon: 'warning'
            }).then((ok)=>{
                $('#viewRombelModal').modal('show');
            });
        }else{
            
            $('#loading').show();
            let sendId = JSON.stringify(val);
            $.ajax({
                method: 'post',
                url: 'pages/rombel/rombel-func.php',
                dataType: 'json',
                data: {
                    'action' : 'unregRombelSiswa',
                    'idsiswa' : sendId,
                    'idrombel' : idrombel
                },
                beforeSend: function(bs){
                    $('#viewRombelModal').modal('hide');
                },
                success: function(msg){
                    $('#loading').hide();
                    let info = msg.status == 'success' ? val.length + ' siswa berhasil unregister dari rombel '+ namaRombel : msg.info;
                    Swal.fire({
                        title: msg.status,
                        text: info,
                        icon: msg.status
                    }).then((ok)=>{
                        viewRombel(idrombel, namaRombel);
                    });
                }
            });
        }
    }

    function naikkelasRombel(idrombel, namaRombel, tpRombel){
        let tp = tpRombel.split(' ')[0];
        let smtr = tpRombel.split(' ')[1];

        if(smtr == 'ganjil'){
            Swal.fire({
                title: 'Semester',
                text: 'Rombel '+ namaRombel+ ' akan memasuki semester GENAP Tp.' + tp,
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'tidak',
                confirmButtonText: 'iya'
            }).then((result) => {
                if(result.isConfirmed){
                    $('#loading').show();
                    $.ajax({
                        method: 'post',
                        url: 'pages/rombel/rombel-func.php',
                        dataType: 'json',
                        data: {
                            'action' : 'naikKelasRombel',
                            'idrombel' : idrombel,
                            'smtr' : smtr,
                            'tp' : tp
                        },
                        success: function(msg){
                            $('#loading').hide();
                            Swal.fire({
                                title: msg.status,
                                text: 'Rombel '+ namaRombel +msg.info,
                                icon: msg.status
                            }).then((ok) => {
                                loadRombelSiswa();
                            });
                        }
                    });
                }
            });
        }else{
            Swal.fire({
                title: 'Naik Jenjang',
                text: 'Rombel '+ namaRombel+ ' akan naik Jenjang kelas pada semester Ganjil Tahun Pelajaran yang baru',
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'tidak',
                confirmButtonText: 'iya'
            }).then((result) => {
                if(result.isConfirmed){
                    $('#loading').show();
                    $.ajax({
                        method: 'post',
                        url: 'pages/rombel/rombel-func.php',
                        dataType: 'json',
                        data: {
                            'action' : 'naikKelasRombel',
                            'idrombel' : idrombel,
                            'smtr' : smtr,
                            'tp' : tp
                        },
                        success: function(msg){
                            $('#loading').hide();
                            Swal.fire({
                                title: msg.status,
                                text: 'Rombel '+ namaRombel +msg.info,
                                icon: msg.status
                            }).then((ok) => {
                                loadRombelSiswa();
                            });
                        }
                    });
                }
            });
        }
    }

    function delRombel(idrombel, namaRombel){
        Swal.fire({
            title: 'Hapus Rombel',
            text: 'Ingin hapus rombel '+ namaRombel +' ?',
            icon: 'question',
            showCancelButton: true
        }).then((result)=>{
            if(result.isConfirmed){
                $('#loading').show();
                $.ajax({
                    method: 'post',
                    url: 'pages/rombel/rombel-func.php',
                    dataType: 'json',
                    data: {
                        'action' : 'delRombel',
                        'idrombel' : idrombel
                    },
                    success: function(msg){
                        $('#loading').hide();
                        Swal.fire({
                            title: msg.status,
                            text: msg.info,
                            icon: msg.status
                        }).then((ok)=>{
                            loadRombelSiswa();
                        });
                    }
                });
            }
        });
    }


</script>