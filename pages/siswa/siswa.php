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
                        <td class="text-center">Tempat Lahir</td>
                        <td class="text-center">Tanggal Lahir</td>
                        <td class="text-center">Alamat</td>
                        <td class="text-center">Nama Ibu</td>
                        <td class="text-center">Nama Ayah</td>
                        <td class="text-center">No.Telp</td>
                        <td class="text-center">E-Mail</td>
                    </tr>
                </thead>
                <tbody>

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
                <input type="hidden" id="idsiswa" name="idsiswa">
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

<script>
    $(document).ready(function(){
        tbCore = $('#tb-siswa').DataTable({
            processing: true,
            serverside: true,
            selected: true,
            scrollX: true,
            ajax: {
                'type': "POST",
                'data': function(data){
                    data.type = "group";
                    data.keyId = "null";
                },
                'url': "pages/siswa/siswa-load.php",
            },
            sAjaxDataProp: "",
            columns: [
                {data: "num"},
                {data: "btn"},
                {data: "nis"},
                {data: "nisn"},
                {data: "nama"},
                {data: "jk"},
                {data: "tplahir"},
                {data: "tglahir"},
                {data: "alamat"},
                {data: "ibu"},
                {data: "ayah"},
                {data: "tlp"},
                {data: "email"},
            ],
        });



        // Tambah data siswa
        $('#btnAdd').on('click', function(){

            $('#addModalLabel .title').html("Tambah Data Siswa");
            $('.modal-footer button[type=submit]').attr('id', 'addsiswa');
            $('.modal-footer button[type=submit] span').html('Save');
            $('.modal-body form').attr('id', 'formAddSiswa');
            $('#formAddSiswa')[0].reset();
            $('#addModal').modal('show');
        })

        $('#addModal').on('click', '#addsiswa', function(){
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
                $.ajax({
                    method: "POST",
                    dataType:"json",
                    url: "pages/siswa/siswa-func.php",
                    data: "action=add&" + $('#formAddSiswa').serialize(),
                    beforeSend: function(data){
                        $('#formAddSiswa')[0].reset(),
                        $('#addModal').modal('hide')
                    },
                    success: function(msg){
                        Swal.fire({
                            title: msg.status,
                            text: msg.text,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((ok)=>{
                            $('.show-page').empty();
                            $('.show-page').load('pages/siswa/siswa.php');
                        })
                    }

                });
                $('#addModal').modal('hide');
                // Swal.fire(
                //     'Berhasil',
                //     'Data siswa berhasil ditambah',
                //     'success'
                // )
            }
        });


        // Update data Siswa
        $('#tb-siswa tbody').on('click', '#btnEdit', function(){
            var idsiswa = $(this).data('id');

            $('#addModalLabel .title').html("Update Data Siswa");
            $('.modal-footer button[type=submit] span').html('Update');
            $('.modal-footer button[type=submit]').attr('id', 'updatesiswa');
            $('.modal-body form').attr('id', 'formUpdate');

            $.ajax({
                type: 'POST',
                url: 'pages/siswa/siswa-load.php',
                data: 'type=single&keyId=' + idsiswa,
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(index, value) {
                        $('#idsiswa').val(value.id);
                        $('#nis').val(value.nis);
                        $('#nisn').val(value.nisn);
                        $('#nama').val(value.nama);
                        $('#jk').val(value.jk);
                        $('#tplahir').val(value.tplahir);
                        $('#tglahir').val(value.tglahir);
                        $('#alamat').val(value.alamat);
                        $('#ibu').val(value.ibu);
                        $('#ayah').val(value.ayah);
                        $('#tlp').val(value.tlp);
                        $('#email').val(value.email);
                    })
                }
            });
            $('#addModal').modal('show');
        });

        $('#addModal').on('click', '#updatesiswa', function(){
            event.preventDefault();

            $.ajax({
                method: 'POST',
                url: 'pages/siswa/siswa-func.php',
                dataType: 'json',
                data: 'action=updt&' + $('#formUpdate').serialize(),
                beforeSend: function(data){
                    $('#formUpdate')[0].reset(),
                    $('#addModal').modal('hide')
                },
                success: function(msg){
                    Swal.fire({ 
                    title: msg.status,
                    text: msg.text,
                    icon: 'success',
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
                                text: msg.text,
                                icon: 'success',
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