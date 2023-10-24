<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-block show-page">
                <div class="header text-center h5">
                    <span><i class="fas fa-file-invoice"></i>&nbsp; Sistem Pembayaran SPP</span>
                </div>
                <hr>
                <div class="body">
                    <form action="" method="POST" class="form-spp">
                        <div class="input-group">
                            <select name="" id="spp-siswa-sl" class="custom-select custom-select-md" style="width: 100%;">
                                <option value="">- pilih siswa -</option>
                            </select>
                        </div>
                    </form>
                    <br>

                    <div class="box-spp">
                        <div class="card border border-primary">
                            <div class="card-header bg-primary text-center h6">
                                <span><i class="fas fa-file-export"></i>&nbsp; PEMBAYARAN</span>
                            </div>
                            <div class="card-body">
                                <!-- Note -->
                                <div class="note-spp text-center text-dark">
                                    <h5 class="card-title">administrasi tidak ditemukan</h5>
                                    <p class="card-text">mohon pilih siswa terlebih dahulu</p>
                                </div>

                                <!-- Payment -->
                                <div class="pay-spp text-dark">
                                    <!-- Select SPP -->
                                    <div class="row sc-input-spp">
                                        <div class="col-lg-5">
                                            <div class="input-group">
                                                <select name="spp-sl" id="spp-sl" class="custom-select custom-select-sm" style="width: 100%;">
                                                    <option value="">- pilih spp -</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="button" class="btn btn-primary btn-sm" id="btn-val-spp"><i class="fas fa-check"></i>&nbsp; validasi</button>
                                        </div>
                                    </div>

                                    <!-- Show Detail SPP -->
                                    <div class="row sc-info-spp">
                                        <hr>
                                        <div class="col-lg-2"><!-- not data --></div>
                                        <div class="col-lg-8">
                                            <div class="info-spp">
                                                <ul class="list-group">
                                                    <li class="list-group-item list-group-item-dark text-center"><i class="fas fa-info-circle"></i>&nbsp; Detail Pembayaran</li>
                                                    <li class="list-group-item">Nama Siswa : &nbsp;<span>Wahid prayogo</span></li>
                                                    <li class="list-group-item">No.Induk : &nbsp;<span>16.0001</span></li>
                                                    <li class="list-group-item">Pembayaran : &nbsp;<span>SPP Bulan Juli 2023</span></li>
                                                    <li class="list-group-item">Keterangan : &nbsp;<span class="label label-success">LUNAS</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-2"><!-- not data --></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-block show-page">
                <div class="header text-center h6">
                    <span><i class="fas fa-info"></i>&nbsp; Informasi Administrasi Individu</span>
                </div>
                <hr>
                <div class="body">

                    <div class="alert alert-warning bg-warning text-dark notice-data">
                        <span><i class="fas fa-exclamation"></i>&nbsp; data siswa tidak ditemukan</span>
                    </div>

                    <div class="content-data">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Cras justo odio
                                <span class="badge badge-success badge-pill">lunas</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Dapibus ac facilisis in
                                <span class="badge badge-success badge-pill">lunas</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Morbi leo risus
                                <span class="badge badge-success badge-pill">lunas</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- JS Section -->
<script>
    
    $(document).ready(function(){

        // Component
        $('.note-spp').show();
        $('.pay-spp').hide();
        $('.content-data').hide();


        // GET DATA SISWA
        $.ajax({
            method: 'POST',
            url: 'pages/spp/spp-load-data.php',
            data: 'type=group',
            dataType: 'json',
            success: function(msg){

                let selectOpt = '';
                $.each(msg.data, function(key, val){
                    selectOpt += '<option value="'+val.id+'">'+val.nama_siswa+' - '+val.nis_siswa+'</option>';
                });
                $('#spp-siswa-sl').append(selectOpt);
            }
        });

        // GET DATA SPP
        $.ajax({
            method: 'POST',
            url: 'pages/spp/spp-load-data.php',
            data: 'type=spp',
            dataType: 'json',
            success: function(spp){
                let selectSpp = '';
                $.each(spp.data, function(key, val){
                    selectSpp += '<option value="'+val.id_jns+'">'+val.jns_pem+' ('+val.jns_val+')</option>';
                });
                $('#spp-sl').append(selectSpp);
            }
        });


        // Action select data SISWA
        $('.form-spp').on('change', '#spp-siswa-sl', function(){

            if($(this).val() == ''){

                $('.notice-data').show();
                $('.content-data').hide();
                $('.note-spp').show();
                $('.pay-spp').hide();

            }else{

                $('.notice-data').hide();
                $('.content-data').show();
                $('.note-spp').hide();
                $('.pay-spp').show();
                $('.sc-info-spp').hide();
                $('#btn-val-spp').attr('disabled', false);
            }
            
        });

        // Action Button Validasi SPP
        $('#spp-sl').on('change', function(){

            if($(this).val() == ''){
                
                $('#btn-val-spp').attr('disabled', false);
                $('.sc-info-spp').hide();
                Swal.fire({
                    title: "warning",
                    text: "silahkan pilih pembayaran spp",
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 1500
                }).then((ok) => {
                    // $('#btn-val-spp').attr('disabled', false);
                    // $('.sc-info-spp').hide();
                })
            }
        });


        $('#btn-val-spp').on('click', function(){

            if($('#spp-sl').val() == ''){
                Swal.fire({
                    title: "warning",
                    text: "silahkan pilih pembayaran spp",
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 1500
                })
            }else{
                Swal.fire({
                    title: 'Validasi',
                    text: 'pastikan iuran sudah dibayarkan oleh Siswa',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: "sudah",
                    cancelButtonText: "belum"
                }).then((result) => {
                    if(result.isConfirmed){
                        $('#btn-val-spp').attr('disabled', true);
                        $('.sc-info-spp').show();
                    }
                });
            }
        })

    });

</script>