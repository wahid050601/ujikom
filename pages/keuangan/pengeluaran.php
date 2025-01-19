<style>
    .jml-total {
        /* background-color: lightgrey; */
        padding: 4px;
        border: 1px solid lightgray;
        border-radius: 5px;
        font-weight: 600;
    }

    .table-list-data {
        overflow-y: auto;
        overflow-x: auto;
        max-height: 300px;
    }

</style>

<div class="card">
    <div class="card-block show-page">
        <!-- Header -->
        <span class="h5"><i class="fas fa-file-upload"></i>&nbsp; Catatan Pengeluaran</span>
        <hr>
        <!-- Header End -->

        <!-- Body -->
        <button type="button" id="add-lap" class="btn btn-primary btn-mini mb-2"><i class="fas fa-plus"></i> Add</button>
        <button type="button" id="edit-lap" class="btn btn-primary btn-mini mb-2"><i class="fas fa-edit"></i> Edit</button>
        <button type="button" id="del-lap" class="btn btn-primary btn-mini mb-2"><i class="fas fa-trash"></i> Delete</button>
        <ul class="list-group">
            <li class="list-group-item table-show-laporan">
                <!-- Data Here -->
            </li>
        </ul>

        <!-- Body End -->
        
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addLaporanModal" tabindex="-1" role="dialog" aria-labelledby="addLaporanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLaporanModalLabel"><i class="fas fa-plus"></i> Tambah Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm" id="name-laporan" placeholder="nama laporan ...">
                    <br>
                    <textarea id="desc-lap" cols="10" rows="5" class="form-control form-control-sm" placeholder="Description ..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-mini" id="save-lap"><i class="fas fa-save"></i> simpan</button>
                <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal"><i class="fas fa-times"></i> tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editLaporanModal" tabindex="-1" role="dialog" aria-labelledby="editLaporanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLaporanModalLabel"><i class="fas fa-edit"></i> Edit Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm" id="name-edit-laporan" placeholder="nama laporan ...">
                    <br>
                    <textarea id="desc-edit-lap" cols="10" rows="5" class="form-control form-control-sm" placeholder="Description ..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-mini" id="save-edit-lap"><i class="fas fa-save"></i> simpan</button>
                <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal"><i class="fas fa-times"></i> tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Processing Modal -->
<!-- Modal -->
<div class="modal fade" id="processingModal" tabindex="-1" role="dialog" aria-labelledby="processingModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="processingModalLabel"><i class="fas fa-file-invoice"></i> Catatan Laporan : <span class="header-laporan"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <!-- PAGE PROCESSING -->
                <div class="process-section">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <form id="form-add-pengeluaran">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select id="sl-kategori" class="custom-select custom-select-md" style="width: 100%;">
                                            <option value="">_pilih kategori_</option>
                                            <option value="atk">ATK</option>
                                            <option value="internet">Internet</option>
                                            <option value="foto copy">Foto Copy</option>
                                            <option value="hardware">Hardware</option>
                                            <option value="elektronik">Elektronik</option>
                                            <option value="lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="nm-pengeluaran" class="form-control form-control-sm" placeholder="nama pengeluaran">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4"><input type="number" class="form-control form-control-sm" placeholder="Qty" id="qty-form"></div>
                                        <div class="col-lg-8"><input type="number" class="form-control form-control-sm" placeholder="nominal satuan Rp." id="satuan-form"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" id="ket-pengeluaran" class="form-control form-control-sm" placeholder="keterangan">
                                    </div>
                                    <div class="jml-total">
                                        JUMLAH TOTAL : <br>
                                        Rp. <span class="set-total">-</span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-mini mt-2" id="save-single-laporan"><i class="fas fa-check"></i> save</button>
                                </div>
                            </div>
                            </form>
                        </li>
                    </ul>
                </div>

                <!-- TABLE SHOW DATA -->
                <div class="table-list-data mt-3">
                    <!-- Data Here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-mini" id="commit-pengeluaran"><i class="fas fa-check"></i> commit</button>
                <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal"><i class="fas fa-times"></i> tutup</button>
            </div>
        </div>
    </div>
</div>


<script>
    
    // Load Laporan
    loadLaporanPengeluaran();


    // Set Process Laporan
    $('#satuan-form').keyup(function(){
        if($(this).val() != '' && $('#qty-form').val() != ''){
            let totalJumlah = parseInt($('#qty-form').val()) * parseInt($(this).val());
            $('.set-total').empty().html(totalJumlah);
        }else{
            $('.set-total').empty().html('-');
        }
    });

    // ======================================================= ACTION =================================================
    // ==== ADD
    $('#add-lap').on('click', function(){
        $('#name-laporan').val('');
        $('#addLaporanModal').modal('show');
    });
    $('#save-lap').on('click', function(){
        $('#loading').show();
        // console.log($('#name-laporan').val());

        $.ajax({
            method: 'POST',
            url: 'pages/keuangan/pengeluaran-func-data.php',
            dataType: 'json',
            data: {
                "action" : "addLaporanPengeluaran",
                "namelap" : $('#name-laporan').val(),
                "desclap" : $('#desc-lap').val()
            },
            beforeSend: function(send){
                $('#addLaporanModal').modal('hide');
            },
            success: function(msg){
                $('#loading').hide();
                Swal.fire({
                    title: msg.status,
                    text: msg.info,
                    icon: msg.status
                }).then((ok) =>{
                    $('#loading').show();
                    loadLaporanPengeluaran();
                });
            }
        });
    });

    // ==== EDIT
    $('#edit-lap').on('click', function(){
        if($('table.table-data-pengeluaran tr.selected').length > 0){
            $('#loading').show();
            let idlaporan =  $('tr.selected').data('id');
            $.ajax({
                method: 'POST',
                url: 'pages/keuangan/pengeluaran-func-data.php',
                dataType: 'json',
                data: {
                    "action" : "editLaporanPengeluaran",
                    "edited" : 'true',
                    "idlaporan" : idlaporan
                },
                success: function(load){
                    $('#name-edit-laporan').val(load.dataedit.nama_lap);
                    $('#desc-edit-lap').val(load.dataedit.desc_lap);
                    $('#editLaporanModal').modal('show');
                    $('#loading').hide();
                }
            });

        }else{
            Swal.fire({
                title: 'warning',
                text: 'pilih salah satu baris data pada table',
                icon: 'warning'
            });
        }
    });
    $('#save-edit-lap').on('click', function(){
        $('#loading').show();
        let jsonData = {
            idlaporan :  $('tr.selected').data('id'),
            namelap : $('#name-edit-laporan').val(),
            desclap : $('#desc-edit-lap').val()
        }

        $.ajax({
            method: 'POST',
            url: 'pages/keuangan/pengeluaran-func-data.php',
            dataType: 'json',
            data: {
                "action" : "editLaporanPengeluaran",
                "data" : JSON.stringify(jsonData),
            },
            beforeSend: function(send){
                $('#editLaporanModal').modal('hide');
            },
            success: function(msg){
                $('#loading').hide();
                Swal.fire({
                    title: msg.status,
                    text: msg.info,
                    icon: msg.status
                }).then((ok) =>{
                    $('#loading').show();
                    loadLaporanPengeluaran();
                });
            }
        });
    });

    // ==== DELETE
    $('#del-lap').on('click', function(){
        if($('table.table-data-pengeluaran tr.selected').length > 0){
            Swal.fire({
                title: 'hapus laporan',
                text: 'ingin hapus data laporan ini ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: "ya",
                cancelButtonText: "tidak"
            }).then((result) => {
                if(result.isConfirmed){
                    $('#loading').show();
                    let idlaporan = $('tr.selected').data('id');
                    $.ajax({
                        method: 'POST',
                        url: 'pages/keuangan/pengeluaran-func-data.php',
                        dataType: 'json',
                        data: {
                            "action" : "delLaporanPengeluaran",
                            "idlap" : idlaporan
                        },
                        success: function(msg){
                            $('#loading').hide();
                            Swal.fire({
                                title: msg.status,
                                text: msg.info,
                                icon: msg.status
                            }).then((ok) => {
                                loadLaporanPengeluaran();
                            });
                        }
                    });
                }
            });
        }else{
            Swal.fire({
                title: 'warning',
                text: 'pilih salah satu baris data pada table',
                icon: 'warning'
            });
        }
    });

    // ==== SAVE SINGLE LAPORAN
    $('#save-single-laporan').on('click', function(){
        if($('#nm-pengeluaran').val() == '' || $('#sl-kategori').val() == '' || $('#qty-form').val() == '' || $('#satuan-form').val() == ''){
            
            $('#processingModal').modal('hide');
            Swal.fire({
                title: 'Lengkapi Form',
                text: 'silahkan lengkapi form terlebih dahulu!',
                icon: 'warning',
            }).then((ok)=>{
                $('#processingModal').modal('show');
            });
        }else{
            $('#save-single-laporan').html('<i class="fas fa-spinner fa-pulse"></i> loading');
            let jsonLaporan = {
                action : 'addSubLaporanPengeluaran',
                idlaporan : $('.header-laporan').data('idlaporan'),
                kategori : $('#sl-kategori').val(),
                nama_pengeluaran : $('#nm-pengeluaran').val(),
                qty : $('#qty-form').val(),
                satuan : $('#satuan-form').val(),
                ket : $('#ket-pengeluaran').val()
            }
            // console.log(jsonLaporan);
            $.ajax({
                method: 'post',
                url: 'pages/keuangan/pengeluaran-func-data.php',
                dataType: 'json',
                data : jsonLaporan,
                beforeSend: function(bsend){
                    $('#form-add-pengeluaran')[0].reset();
                    $('.set-total').empty().html('-');
                    // $('#processingModal').modal('hide');
                },
                success: function(msg){
                    let idlaporan = $('.header-laporan').data('idlaporan');
                    loadDataSubLaporan(idlaporan);
                    $('#save-single-laporan').html('<i class="fas fa-check"></i> save');

                    $('#save-single-laporan').after(' &nbsp; <span class="note-add-laporan">'+msg.info+'</span>');
                    
                    $('.note-add-laporan').on('click', function(){
                        alert("merasa terpanggil");
                    });
                    setInterval(function(){
                        $('#save-single-laporan').next().remove();
                    },10000);
                }
            });
        }
    });

    // ==== PROCESS COMMIT
    $('#commit-pengeluaran').on('click', function(){
        $('#processingModal').modal('hide');
        let roleuser = localStorage.getItem('role');

        if(roleuser == 'kepsek'){
            Swal.fire({
                title: 'commit laporan',
                text: 'laporan ini tidak dapat diubah lagi setelah Commit!',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: "ya",
                cancelButtonText: "tidak"
            }).then((result) => {
                if(result.isConfirmed){
                    $('#loading').show();
                    let idlaporan = $('.header-laporan').data('idlaporan');
                    
                    $.ajax({
                        method: 'post',
                        url: 'pages/keuangan/pengeluaran-func-data.php',
                        dataType: 'json',
                        data: {
                            "action" : "commitLaporanPengeluaran",
                            "idlaporan" : idlaporan
                        },
                        success: function(msg){
                            loadLaporanPengeluaran();
                            Swal.fire({
                                title: 'berhasil',
                                text: msg.info,
                                icon: 'success'
                            });
                        }
                    });
                }else{
                    $('#processingModal').modal('show');
                }
            });
        }else{
            Swal.fire({
                title: 'warning',
                text: 'Commit hanya bisa dilakukan dengan akun Kepala Sekolah',
                icon: 'warning',
            }).then((result) => {
                $('#processingModal').modal('show');
            });
        }
    });

    // ============= FUNCTION
    function loadLaporanPengeluaran(){
        $.ajax({
            method: 'POST',
            url: 'pages/keuangan/pengeluaran-load-data.php',
            dataType: 'json',
            data: {
                "action" : "loadLaporan"
            },
            success: function(data){
                if(data.status == 'success'){
                    
                    let number = 1;
                    let listLaporan = `
                    <table class="table table-bordered table-xs table-data-pengeluaran">
                    <thead class="bg-primary">
                        <tr>
                            <th scope="col" width="3%">No.</th>
                            <th scope="col">Tgl.Pembuatan</th>
                            <th scope="col">Tgl.Konfirmasi</th>
                            <th scope="col">Laporan</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list-data-pengeluaran">`;
                    $.each(data.datalap, function(id,val){
                        let adjustment = val.adj_tgl == null && val.adj_by == null ? '-' : `${val.adj_tgl} (by ${val.adj_by})`;
                        let action = val.status_lap == 'commited' ? `<span onClick="processLaporan('${val.id}')" style="cursor: pointer;" class="label label-primary" id="proc-lap" data-idlap="${val.id}"><i class="fas fa-eye"></i> show</span>` : `<span onClick="processLaporan('${val.id}')" style="cursor: pointer;" class="label label-danger" id="proc-lap"><i class="far fa-file-alt"></i> proccess</span>`;
                        let label = val.status_lap == 'commited' ? 'danger' : 'primary';
                        listLaporan += `
                        <tr data-id="${val.id}">
                            <th>${number}</th>
                            <td>${val.create_tgl} (by ${val.create_by})</td>
                            <td>${adjustment}</td>
                            <td>${val.nama_lap}</td>
                            <td>${val.desc_lap}</td>
                            <td><span class="label label-${label}">${val.status_lap}</span></td>
                            <td>${action}</td>
                        </tr>`;
                        number++;
                    });
                    listLaporan += `
                    </tbody>
                    </table>`;
                    // console.log(listLaporan);
                    $('.table-show-laporan').empty();
                    $('.table-show-laporan').append(listLaporan);

                    $('.table-data-pengeluaran').DataTable({
                        select: true,
                        processing: true,
                        serverside: true,
                        selected: true,
                        scrollX: true,
                    });
                    $('#loading').hide();
                }
            }
        });
    }

    // Proccess Laporan
    function processLaporan(idlaporan){
        loadDataSubLaporan(idlaporan);
        $('#loading').show();
        $('#processingModal').modal('show');
    }

    // Load Table Laporan (Sub Laporan)
    function loadDataSubLaporan(idlaporan){
        $.ajax({
            method: 'POST',
            url: 'pages/keuangan/pengeluaran-load-data.php',
            dataType: 'json',
            data: {
                "action" : "loadProcessLaporan",
                "idlaporan" : idlaporan
            },
            success: function(lap){
                // set master laporan
                $('.header-laporan').empty().text(lap.master.nama_lap);
                $('.header-laporan').attr('data-idlaporan', lap.master.id);
                if(lap.master.status_lap == 'created'){
                    $('.process-section').css('display', 'contents');
                    $('#commit-pengeluaran').css('display', 'inline');
                }else{
                    $('.process-section').css('display', 'none');
                    $('#commit-pengeluaran').css('display', 'none');
                }

                // set detail laporan
                let listdetaillap = `
                <table class="table table-bordered table-xs table-show-detail">
                <thead class="bg-primary">
                    <tr>
                        ${lap.master.status_lap == 'created' ? '<th scope="col">Act</th>' : ''}
                        <th scope="col">Kategori</th>
                        <th scope="col">Pengeluaran</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Total</th>
                        <th scope="col">Ket.</th>
                    </tr>
                </thead>
                <tbody>`;

                if(lap.detail != ''){
                    $.each(lap.detail, function(id,val){
                        listdetaillap += `
                        <tr>
                            ${lap.master.status_lap == 'created' ? '<td><span class="label label-danger" id="del-laporan${val.id}" onclick="deleteSubLaporan('+lap.master.id+','+val.id+')"><i class="fas fa-trash"></i></span></td>' : ''}
                            <td>${val.kat_lap}</td>
                            <td>${val.nama_pengeluaran}</td>
                            <td>${val.hrg_satuan}@${val.qty}</td>
                            <td>${formatRupiah(val.total)}</td>
                            <td>${val.keterangan}</td>
                        </tr>`;
                    });
                }else{
                    listdetaillap += '<tr><td colspan="6" class="text-center"><i>data pengeluaran kosong</i></td></tr>';
                }

                listdetaillap += `
                </tbody>
                </table>`;
                $('.table-list-data').empty().append(listdetaillap);
                $('#loading').hide();
            }
        });
    }

    // Delete Laporan (Sub Laporan)
    function deleteSubLaporan(idlaporan,idSubLaporan){
        
        $('#del-laporan'+idSubLaporan).html('<i class="fas fa-spinner fa-pulse"></i>');
        
        // console.log(idlaporan);
        $.ajax({
            method: 'POST',
            url: 'pages/keuangan/pengeluaran-func-data.php',
            dataType: 'json',
            data: {
                "action" : "delSubLaporanPengeluaran",
                "idsublaporan" : idSubLaporan
            },
            success: function(msg){
                // $('#del-laporan'+idSubLaporan).closest('table').prev().html(msg.info);
                loadDataSubLaporan(idlaporan);
            }
        });
    };


    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', { 
            style: 'currency', 
            currency: 'IDR' 
        }).format(number);
    }
</script>