<div class="card">
    <div class="card-block show-page">
        <!-- Header -->
        <span><i class="fas fa-user-graduate"></i>&nbsp; Peserta Didik Aktif</span>
        <hr>
        <!-- Header End -->

        <!-- Body -->
        <button class="btn btn-primary btn-mini rounded" id="btnAdd"><i class="fas fa-plus"></i>&nbsp; add</button>
        <button class="btn btn-success btn-mini rounded"><i class="fas fa-download"></i>&nbsp; download</button>

        <div class="data-content mt-3">
            <table id="tb-siswa" class="table table-bordered table-xs" style="width:100%">
                <thead>
                    <tr class="bg-primary">
                        <td class="text-center">No</td>
                        <td class="text-center">Action</td>
                        <td class="text-center">No.Induk</td>
                        <td class="text-center">NISN</td>
                        <td class="text-center">Nama</td>
                        <td class="text-center">L/P</td>
                        <td class="text-center">Kelas</td>
                        <td class="text-center">Program Studi</td>
                        <td class="text-center">TP</td>
                        <td class="text-center">Tempat Lahir</td>
                        <td class="text-center">Tanggal Lahir</td>
                        <td class="text-center">Alamat</td>
                        <td class="text-center">Nama Ibu</td>
                        <td class="text-center">Nama Ayah</td>
                        <td class="text-center">No.Telp</td>
                        <td class="text-center">E-Mail</td>
                    </tr>
                </thead>
                <tbody class="show-data-siswa">

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Add -->
<div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="addModalLabel"><i class="fas fa-user-graduate"></i>&nbsp; <span class="title">Tambah Data Siswa</span></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
            <form action="" method="post" id="formAddSiswa">
                <!-- <input type="hidden" id="idsiswa" name="idsiswa"> -->
                <!-- CONTENT FORM -->
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" class="form-control form-control-sm" id="nis" name="nis">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control form-control-sm" id="nisn" name="nisn">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nama">Nama Siswa/i</label>
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">L/P</label>
                            <select class="custom-select custom-select-sm" style="width: 100%;" id="jk" name="jk">
                                <option value="">-- pilih --</option>
                                <option value="L">L (Laki-laki)</option>
                                <option value="P">P (Perempuan)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tplahir">Tempat Lahir</label>
                            <input type="text" class="form-control form-control-sm" id="tplahir" name="tplahir">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tglahir">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-sm" id="tglahir" name="tglahir">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea class="form-control form-control-sm" id="alamat" name="alamat" rows="2"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ibu">Nama Ibu</label>
                            <input type="text" class="form-control form-control-sm" id="ibu" name="ibu">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ayah">Nama Ayah</label>
                            <input type="text" class="form-control form-control-sm" id="ayah" name="ayah">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tlp">No. Telpon</label>
                            <input type="text" class="form-control form-control-sm" id="tlp" name="tlp">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm rounded" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-sm rounded" id="addsiswa"><i class="fas fa-save"></i> <span>Save</span> </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="editModalLabel"><i class="fas fa-user-edit"></i>&nbsp; <span class="title">Edit Data Siswa</span></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
            <form action="" method="post" id="formEditSiswa">
                <input type="hidden" id="idsiswa" name="idsiswa">
                <!-- CONTENT FORM -->
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="edit-nis">NIS</label>
                            <input type="text" class="form-control form-control-sm" id="edit-nis" name="edit-nis">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="edit-nisn">NISN</label>
                            <input type="text" class="form-control form-control-sm" id="edit-nisn" name="edit-nisn">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="edit-nama">Nama Siswa/i</label>
                            <input type="text" class="form-control form-control-sm" id="edit-nama" name="edit-nama">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">L/P</label>
                            <select class="custom-select custom-select-sm" style="width: 100%;" id="edit-jk" name="edit-jk">
                                <option value="">-- pilih --</option>
                                <option value="L">L (Laki-laki)</option>
                                <option value="P">P (Perempuan)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="edit-tplahir">Tempat Lahir</label>
                            <input type="text" class="form-control form-control-sm" id="edit-tplahir" name="edit-tplahir">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="edit-tglahir">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-sm" id="edit-tglahir" name="edit-tglahir">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="edit-alamat">Alamat Lengkap</label>
                            <textarea class="form-control form-control-sm" id="edit-alamat" name="edit-alamat" rows="2"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="edit-ibu">Nama Ibu</label>
                            <input type="text" class="form-control form-control-sm" id="edit-ibu" name="edit-ibu">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="edit-ayah">Nama Ayah</label>
                            <input type="text" class="form-control form-control-sm" id="edit-ayah" name="edit-ayah">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="edit-tlp">No. Telpon</label>
                            <input type="text" class="form-control form-control-sm" id="edit-tlp" name="edit-tlp">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="edit-email">E-Mail</label>
                            <input type="email" class="form-control form-control-sm" id="edit-email" name="edit-email">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm rounded" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-sm rounded" id="editsiswa"><i class="fas fa-save"></i> <span>Save</span> </button>
            </div>
            </form>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){

        // Load first page data siswa
        $.ajax({
            method: "POST",
            url: "pages/siswa/siswa-load.php",
            dataType: "json",
            data: {"action" : "getDataSiswa"},
            success: function(datas){
                let datatablesiswa = '';
                let number = 1;

                $.each(datas.datatable.data, function(id,val){
                    datatablesiswa +=`
                    <tr>
                        <th>${number++}</th>
                        <td>${val.btn}</td>
                        <td>${val.nis_siswa}</td>
                        <td>${val.nisn_siswa}</td>
                        <td>${val.nama_siswa}</td>
                        <td>${val.jk_siswa}</td>
                        <td>${val.kls_siswa}</td>
                        <td>${val.prod_siswa}</td>
                        <td>${val.tp_siswa}</td>
                        <td>${val.tplahir_siswa}</td>
                        <td>${val.tglahir_siswa}</td>
                        <td>${val.alamat_siswa}</td>
                        <td>${val.ibu_siswa}</td>
                        <td>${val.ayah_siswa}</td>
                        <td>${val.tlp_siswa}</td>
                        <td>${val.email_siswa}</td>
                    </tr>`;
                });
                $('.show-data-siswa').append(datatablesiswa);
                $('#tb-siswa').DataTable({
                    processing: true,
                    serverside: true,
                    selected: true,
                    scrollX: true,
                });

                $('#loading').hide();
            }
        });

        // Tambah data siswa
        $('#btnAdd').on('click', function(){
            $('#formAddSiswa')[0].reset();
            $('#addModal').modal('show');
        });

        $('#addModal').on('click', '#addsiswa', function(event){
            event.preventDefault();

            if($('#nis').val() == '' || $('#nisn').val() == '' || $('#nama').val() == '' || $('#jk').val() == '' || $('#tplahir').val() == ''){
                $('#addModal').modal('hide');
                Swal.fire({
                    title: 'Warning!',
                    text: 'Mohon lengkapi form isian',
                    icon: 'warning',
                    confirmButtonText: 'lengkapi'
                }).then((ok)=>{
                    $('#addModal').modal('show');
                })
            }else{
                // console.log($('#formAddSiswa').serialize());
                $.ajax({
                    method: "POST",
                    dataType:"json",
                    url: "pages/siswa/siswa-func.php",
                    data: "action=addSiswa&" + $('#formAddSiswa').serialize(),
                    beforeSend: function(data){
                        $('#formAddSiswa')[0].reset(),
                        $('#addModal').modal('hide')
                    },
                    success: function(msg){
                        Swal.fire({
                            title: msg.status,
                            text: msg.info,
                            icon: msg.status,
                            showConfirmButton: false,
                            timer: 1500
                        }).then((ok)=>{
                            $('.show-page').empty();
                            $('.show-page').load('pages/siswa/siswa.php');
                        })
                    }

                });
                $('#addModal').modal('hide');
            }
        });


        // Update data Siswa
        $('#tb-siswa').on('click', '#btnEdit', function(){
            var idsiswa = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: 'pages/siswa/siswa-load.php',
                dataType: 'json',
                data: {
                    "action" : "getDetailSiswa",
                    "idsiswa" : idsiswa
                },
                success: function(data) {
                    $.each(data.datasiswa, function(index, value) {
                        $('#idsiswa').val(value.id);
                        $('#edit-nis').val(value.nis_siswa);
                        $('#edit-nisn').val(value.nisn_siswa);
                        $('#edit-nama').val(value.nama_siswa);
                        $('#edit-jk').val(value.jk_siswa);
                        $('#edit-tplahir').val(value.tplahir_siswa);
                        $('#edit-tglahir').val(value.tglahir_siswa);
                        $('#edit-alamat').val(value.alamat_siswa);
                        $('#edit-ibu').val(value.ibu_siswa);
                        $('#edit-ayah').val(value.ayah_siswa);
                        $('#edit-tlp').val(value.tlp_siswa);
                        $('#edit-email').val(value.email_siswa);
                    })
                }
            });
            $('#editModal').modal('show');
        });

        $('#editModal').on('click', '#editsiswa', function(){
            event.preventDefault();

            $.ajax({
                method: 'POST',
                url: 'pages/siswa/siswa-func.php',
                dataType: 'json',
                data: 'action=editSiswa&' + $('#formEditSiswa').serialize(),
                beforeSend: function(data){
                    $('#formEditSiswa')[0].reset(),
                    $('#editModal').modal('hide')
                },
                success: function(msg){
                    Swal.fire({ 
                    title: msg.status,
                    text: msg.info,
                    icon: msg.status,
                    showConfirmButton: false,
                    timer: 1500
                    }).then((ok)=>{
                        $('.show-page').empty();
                        $('.show-page').load('pages/siswa/siswa.php');
                    });
                }
            });
            
        });



        // Delete data Siswa
        $('#tb-siswa').on('click', '#btnDell', function(){
            var idsiswa = $(this).data('id');
            
            Swal.fire({
                title: 'Delete',
                text: 'Ingin hapus data siswa ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: "yes"
            }).then((result) => {
                if(result.isConfirmed){
                    $.ajax({
                        method: 'POST',
                        url: 'pages/siswa/siswa-func.php',
                        data: 'action=del&id=' + idsiswa,
                        dataType: 'json',
                        success: function(msg){
                            Swal.fire({
                                title: msg.status,
                                text: msg.info,
                                icon: msg.status,
                                showConfirmButton: false,
                                timer: 1500
                            }).then((ok) => {
                                $('.show-page').empty();
                                $('.show-page').load('pages/siswa/siswa.php');
                            })
                        }

                    })
                }
            })
        });
   });
</script>