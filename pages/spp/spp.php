<!-- ========================LOADING======================== -->
<style>
  .loading {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.7);
  color: black;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  font-size: 30px;
}
</style>
<div id="loading" class="loading"><i class="fas fa-circle-notch fa-spin fa-lg"></i>&nbsp; Loading</div>
<!-- ========================LOADING======================== -->

<ul class="list-group">
    <li class="list-group-item header-list text-center bg-primary text-white h6"><i class="fas fa-file-invoice"></i>&nbsp; PEMBAYARAN SPP</li>
    <li class="list-group-item">
        
        <div class="row">
            <div class="col-lg-7">

            <!-- FORM PAYMENT -->
                <div class="input-group">
                    <select name="" id="spp-siswa-sl" class="custom-select custom-select-md form-siswa" style="width: 100%;">
                        <option value="">__ pilih siswa __</option>
                    </select>
                </div>

                <div class="input-group">
                    <select name="" id="spp-sl" class="custom-select custom-select-md form-siswa" style="width: 100%;">
                        <option value="">__ pilih SPP __</option>
                    </select>
                </div>

                <button type="button" id="btn-gnr-spp" name="btn-proc-spp" class="btn btn-primary btn-sm"><span class="icon"><i class="fas fa-check"></i></span>&nbsp; validasi</button>
            <!-- END FORM PAYMENT -->


            <!-- TABLE VALIDATION READY PAY -->
                <div class="table-spp" style="display: none;">
                    <table class="table table-striped table-sm mt-5">
                        <tr>
                            <th>Nama Siswa</th>
                            <th>:</th>
                            <td id="nama-siswa"> </td>
                        </tr>
                        <tr>
                            <th>No. Induk</th>
                            <th>:</th>
                            <td id="nis-siswa"> </td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <th>:</th>
                            <td id="kls-siswa"> </td>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <th>:</th>
                            <td id="prod-siswa"> </td>
                        </tr>
                        <tr>
                            <th>Pembayaran</th>
                            <th>:</th>
                            <td id="ket-spp"> </td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <th>:</th>
                            <td id="val-spp"> </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th>:</th>
                            <td><span id="sts-pem" class="label label-primary"><i class="fas fa-spinner fa-pulse"></i>&nbsp; proses</span></td>
                        </tr>
                        <tr>
                            <th>Validator</th>
                            <th>:</th>
                            <td><i class="fas fa-user"></i> <span id="validator-pem" data-idvalidator="1">Vina Elyza</span></td>
                        </tr>
                    </table>

                    <button type="button" id="btn-proc-spp" class="btn btn-success btn-sm mt-3"><i class="fas fa-check"></i>&nbsp; proses pembayaran</button>
                    <button type="button" id="btn-proc-cancel" class="btn btn-danger btn-sm mt-3"><i class="fas fa-times"></i>&nbsp; batal</button>
                </div>
            <!-- END TABLE VALIDATION RADY PAY -->

            <!-- TABLE VALIDATION NOT READY PAY -->
            <div class="info-payspp-show" style="display: none;">
                <div class="card mt-4 border border-secondary">
                    <div class="card-header text-center bg-secondary text-white"  style="padding: 5px;">
                        <span class="header-payspp-siswa"></span>
                    </div>
                    <div class="card-body">
                        <span class="card-title h5 nama-siswa"> </span> | <span class="nis-siswa"></span>
                        <hr>
                        <div class="body-show-pay">
                            <p>Tgl.Pembayaran : <span class="tgl-pem-siswa"></span></p>
                            <p>Validator : <span class="validator-siswa"></span></p>
                            <p>Status : <span class="text-success"><i class="fas fa-check"></i> Lunas</span></p>
                        </div>
                        <div class="button-show-pay">
                            <button type="button" class="btn btn-primary btn-sm" id="print-kwt-payspp"><i class="fas fa-print"></i> Print</button>
                            <button type="button" class="btn btn-secondary btn-sm" id="btnclose-payspp"><i class="fas fa-times"></i> Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END TABLE VALIDATION NOT READY PAY -->
            </div>


            <!-- INFORMATION DETAIL -->
            <div class="col-lg-5">
                <div class="card border" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                    <div class="card-header text-center h6 border border-buttom"><i class="fas fa-search"></i>&nbsp; Detail Pembayaran SPP</div>
                    <div class="card-body">
                        <!-- Notice -->
                        <div class="alert bg-warning text-dark mt-2 notice-detail text-center" role="alert">pilih salah satu siswa &nbsp;<i class="fas fa-exclamation"></i></div>
                        
                        <!-- Data -->
                        <span class="spp-null"><i class="fas fa-hourglass-half fa-spin"></i>&nbsp; siswa belum melakukan pembayaran SPP</span>
                        <ul class="list-group mt-2 list-detail-spp-siswa">

                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </li>
</ul>





<!-- ===================================== MODAL SECTION =========================================== -->

<!-- DETAIL SPP -->
<div class="modal fade" id="detailSpp" tabindex="-1" role="dialog" aria-labelledby="detailSppLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailSppLabel">Detail SPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                
                <table class="table table-striped table-sm">
                    <tr>
                        <th>Nama Siswa</th>
                        <th>:</th>
                        <td id="show-siswa"> </td>
                    </tr>
                    <tr>
                        <th>No. Induk</th>
                        <th>:</th>
                        <td id="show-nis"> </td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <th>:</th>
                        <td id="show-kls"> </td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <th>:</th>
                        <td id="show-prod"> </td>
                    </tr>
                    <tr>
                        <th>Pembayaran</th>
                        <th>:</th>
                        <td id="show-spp"> </td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <th>:</th>
                        <td id="show-val"> </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <th>:</th>
                        <td id="show-sts"> </td>
                    </tr>
                    <tr>
                        <th>Tgl.Pembayaran</th>
                        <th>:</th>
                        <td id="show-tgl"> </td>
                    </tr>
                    <tr>
                        <th>Validator</th>
                        <th>:</th>
                        <td id="show-adm"> </td>
                    </tr>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-print"></i>&nbsp; print</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp; tutup</button>
            </div>
        </div>
    </div>
</div>





<script>

    $(document).ready(function(){
        
        // LIST DETAIL
        $('.list-detail-spp-siswa').hide();
        $('.spp-null').hide();

        // GET DATA SISWA
        $.ajax({
            method: 'POST',
            url: 'pages/spp/spp-load-data.php',
            dataType: 'json',
            data: { "type" : "siswa" },
            success: function(msg){

                let selectOpt = '';
                $.each(msg.data, function(key, val){
                    selectOpt += '<option value="'+val.id+'-'+val.prod_siswa+'">'+val.nama_siswa+' - '+val.nis_siswa+'</option>';
                });
                $('#spp-siswa-sl').append(selectOpt);
                $('#loading').hide();
            }
        });

        // Select Data Siswa
        $('#spp-siswa-sl').on('change', function(){

            if($(this).val() == ''){
                $('.notice-detail').show();
                $('.list-detail-spp-siswa').hide();
                $('#spp-sl').empty();
                $('#spp-sl').append('<option>__ pilih SPP__</option>');
                $('.spp-null').hide();

            }else{
                $('.notice-detail').hide();
                $('.list-detail-spp-siswa').show();
                
                
                // LIST SPP
                $.ajax({
                    method: "POST",
                    url: "pages/spp/spp-load-data.php",
                    dataType: "json",
                    data: {
                        "type" : "spp",
                        "valspp" : $(this).val()
                    },
                    success: function(msg){
                        $('#spp-sl').empty();

                        let selectOpt = '';
                        $.each(msg.data, function(key, val){
                            selectOpt += '<option value="'+val.id_jns+'">'+val.jns_ket+' - '+val.jns_pem+'</option>';
                        });
                        $('#spp-sl').append(selectOpt);
                    }
                });

                // KET PEMBAYARAN SISWA
                let idSiswashowpay = $('#spp-siswa-sl').val();
                showDetailPaymentSpp(idSiswashowpay);
            }
            
        });


        // Action Validation Button
        $('#btn-gnr-spp').on('click', function(){
            $('.table-spp').css('display', 'none');
            $('.info-payspp-show').css('display', 'none');

            var idsiswa = $('#spp-siswa-sl').val();
            var idspp = $('#spp-sl').val();

            if($('#spp-siswa-sl').val() == '' || $('#spp-sl').val() == ''){

                Swal.fire({
                    title: "warning",
                    text: "mohon lengkapi form terlebih dahulu",
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 1500
                });

            }else{
                let Validsiswa = $('#spp-siswa-sl').val();
                let Validspp = $('#spp-sl').val();
                $('span.icon').html('<i class="fas fa-sync-alt fa-spin"></i>');
                validasiPaymentSpp(Validsiswa, Validspp);
            }
        });


        // Action Cancel Proccess Button
        $('#btn-proc-cancel').on('click', function(){   

            Swal.fire({
                title: 'Notice',
                text: 'Ingin Batalkan Proses Pembayaran ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: "iya",
                cancelButtonText: "tidak"
            }).then((result) => {
                if(result.isConfirmed){
                    $('span.icon').html('<i class="fas fa-check"></i>');
                    $('#btn-gnr-spp').removeClass('btn-disabled disabled waves-effect waves-light');
                    $('#btn-gnr-spp').attr('disabled', false);
                    $('.table-spp').hide();

                    $('#spp-siswa-sl').attr('disabled', false);
                    $('#spp-sl').attr('disabled', false);
                }
            });
            
        })

        // Action Cancel Show Pay SPP (Ready)
        $('#btnclose-payspp').on('click', function(){
            $('span.icon').html('<i class="fas fa-check"></i>');
            $('#btn-gnr-spp').removeClass('btn-disabled disabled waves-effect waves-light');
            $('#btn-gnr-spp').attr('disabled', false);

            $('#spp-siswa-sl').attr('disabled', false);
            $('#spp-sl').attr('disabled', false);
            $('.header-payspp-siswa').empty();
            $('.nama-siswa').empty();
            $('.nis-siswa').empty();
            $('.nis-nisn-siswa').empty();
            $('.tgl-pem-siswa').empty();
            $('.validator-siswa').empty();
            $('.info-payspp-show').css('display', 'none');
        })

        // Action Process Button
        $('#btn-proc-spp').on('click', function(){
            Swal.fire({
                title: "Notice",
                text: "Ingin Memproses Pembayaran ini ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: "iya",
                cancelButtonText: "tidak",
            }).then(result => {
                if(result.isConfirmed){
                    let idSiswa = $('#spp-siswa-sl').val();
                    let idSpp = $('#spp-sl').val();
                    let idAdmin = $('#validator-pem').data('idvalidator');
                    // console.log(idSiswa+'|'+idSpp+'|'+idAdmin);

                    $.ajax({
                        method: 'POST',
                        url: 'pages/spp/spp-func-data.php',
                        dataType: 'json',
                        data: {
                            "act": "procSpp",
                            "actntriger": "true",
                            "idsiswapay": idSiswa,
                            "idspppay": idSpp,
                            "idadminpay": idAdmin
                        },
                        success: function(msgs){
                            if(msgs.status == "success"){
                                Swal.fire({
                                    title: msgs.info,
                                    text: msgs.text,
                                    icon: 'success',
                                    showConfirmButton: true
                                }).then((ok) => {
                                    showDetailPaymentSpp(idSiswa);
                                    validasiPaymentSpp(idSiswa, idSpp);
                                });
                            }else if(msgs.status == "error"){
                                Swal.fire({
                                    title: msgs.info,
                                    text: msgs.text,
                                    icon: 'error',
                                    showConfirmButton: true
                                });
                            }
                        }
                    });
                }
            })
        });

        
    });

    // FUNCTION SHOW DETAIL PAYMENT SPP
    function showDetailPaymentSpp(idSiswa){
        $.ajax({
            method: "POST",
            url: "pages/spp/spp-load-data.php",
            dataType: "json",
            data: {
                "type" : "dtlSppSiswa",
                "idsiswa" : idSiswa
            },
            success: function(msg){
                if(msg.data == null){

                    $('.list-detail-spp-siswa').empty();
                    $('.spp-null').show();
                }else{

                    $('.list-detail-spp-siswa').empty();
                    $('.spp-null').hide();

                    var dataDetail = '';
                    $.each(msg.data, function(key, val){
                        dataDetail += '<li class="list-group-item d-flex justify-content-between align-items-center"><span class="spp-name">'+ val.jns_pem +'</span><span class="spp-sts"><span class="label label-success badge-pill"><i class="fas fa-check"></i></span><span data-idspp="'+ val.id_jns +'" class="label btn-primary badge-pill show-detail-spp"><i class="fas fa-eye"></i></span></span></li>'
                    });
                    $('.list-detail-spp-siswa').append(dataDetail);


                    // Action Show Detail SPP
                    $('.show-detail-spp').on('click', function(){

                        $.ajax({
                            method: "POST",
                            url: "pages/spp/spp-load-data.php",
                            dataType: "json",
                            data: {
                                "type" : "showSppSiswa",
                                "idspp" : $(this).data("idspp")
                            },
                            success: function(msg){
                                
                                $.each(msg.data, function(key, val){
                                    $('#show-siswa').html(val.nama_siswa);
                                    $('#show-nis').html(val.nis_siswa);
                                    $('#show-kls').html(val.kls_siswa);
                                    $('#show-prod').html(val.prod_siswa);
                                    $('#show-spp').html(val.jns_pem);
                                    $('#show-val').html('Rp. '+val.jns_val);
                                    $('#show-sts').html('<span class="label label-success"><i class="fas fa-check"></i></i>&nbsp; '+val.status_spp+'</span>');
                                    $('#show-tgl').html(val.tanggal_pem);
                                    $('#show-adm').html(val.nama_adm);
                                });
                            }
                        });
                        $('#detailSpp').modal('show');
                        // alert("SHOW DATA")
                    })
                    
                }
            }
        });
    }

    // FUNCTION READY PAY OR NOT
    function validasiPaymentSpp(idSiswaval, idSppval){
        $.ajax({
            method: 'POST',
            url: "pages/spp/spp-func-data.php",
            dataType: 'json',
            data: {
                "act" : "procSpp",
                "idsiswa" : idSiswaval,
                "idspp" : idSppval,
                "validasi": "true"
            },
            success: function(msg){
                if(msg.status == 'notreadypay'){
                    $('.table-spp').css('display', 'none');
                    $('#spp-siswa-sl').attr('disabled', true);
                    $('#spp-sl').attr('disabled', true);
                    $('#btn-gnr-spp').addClass('btn-disabled disabled waves-effect waves-light');
                    $('#btn-gnr-spp').attr('disabled', true);
                    $('.info-payspp-show').css('display', 'contents');

                    $.each(msg.datas, function(key, val){
                        $('.header-payspp-siswa').html(val.jns_pem+' - '+val.prod_siswa);
                        $('.nama-siswa').html(val.nama_siswa);
                        $('.nis-siswa').html(val.nis_siswa);
                        $('.nis-nisn-siswa').html(val.nis_siswa);
                        $('.tgl-pem-siswa').html(val.tanggal_pem);
                        $('.validator-siswa').html(val.nama_adm);
                    });
                }else if(msg.status == 'readypay'){
                    $('.info-payspp-show').css('display', 'none');
                    $('#spp-siswa-sl').attr('disabled', true);
                    $('#spp-sl').attr('disabled', true);
                    $('#btn-gnr-spp').addClass('btn-disabled disabled waves-effect waves-light');
                    $('#btn-gnr-spp').attr('disabled', true);
                    
                    // DATA SISWA
                    $.each(msg.siswa, function(key, val){
                        $('#nama-siswa').html(val.nama_siswa);
                        $('#nis-siswa').html(val.nis_siswa);
                        $('#kls-siswa').html(val.kls_siswa);
                        $('#prod-siswa').html(val.prod_siswa);
                    });

                    // DATA SPP
                    $.each(msg.spp, function(key, val){
                        $('#ket-spp').html(val.jns_pem);
                        $('#val-spp').html('Rp. '+val.jns_val);
                    });
                    $('.table-spp').css('display', 'contents');
                }
                
            }
        });
    }
    

</script>