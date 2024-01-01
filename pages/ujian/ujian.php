<ul class="list-group">
    <li class="list-group-item header-list text-center bg-primary text-white h6"><i class="fas fa-file-invoice"></i>&nbsp; PEMBAYARAN UJIAN</li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <select name="sl-kelas" id="sl-kelas" class="custom-select" style="width: 100%;">
                                <option value="">__pilih kelas__</option>
                                <option value="X">X (Sepuluh)</option>
                                <option value="XI">XI (Sebelas)</option>
                                <option value="XII">XII (Duabelas)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <select name="sl-prodi" id="sl-prodi" class="custom-select" style="width: 100%;">
                                <option value="">__pilih prodi__</option>
                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                <option value="Akuntansi Keuangan dan Lembaga">Akuntansi Keuangan dan Lembaga</option>
                                <option value="Bisnis daring dan Pemasaran">Bisnis daring dan Pemasaran</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <select name="sl-siswa" id="sl-siswa" class="form-control form-control-sm custom-select sl-siswa" style="width: 100%;">
                        <!-- <option value="">__pilih siswa__</option> -->
                    </select>
                </div>
                <div class="form-group">
                    <select name="sl-pem-ujian" id="sl-pem-ujian" class="custom-select" style="width: 100%;">
                        <option value="">__pilih pembayaran__</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-danger btn-sm btn-block btn-disabled" disabled id="btn-cicilan">cicilan &nbsp; <i class="fas fa-random"></i></button>
                        <button type="button" class="btn btn-danger btn-sm btn-block btn-disabled" disabled id="btn-lunas">lunas &nbsp; <i class="fas fa-random"></i></button>
                    </div>
                    <div class="col-lg-9">
                        <span style="color: red; font-style: italic; font-size: 10px; display: contents;" class="note-metode-pem"> *) Pilih metode pembayaran</span>
                        <div class="show-form-pem">
                            <!-- FORM HERE -->
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3"><button type="button" class="btn btn-primary btn-sm btn-block" id="btn-val-pem-ujian"><i class="fas fa-check"></i>&nbsp; validasi</button></div>
                </div>
            </div>

            <!-- DETAIL PEMBAYARAN -->
            <div class="col-lg-6">
                <div class="card border" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                    <div class="card-header text-center h6 border border-buttom"><i class="fas fa-search"></i>&nbsp; Detail Pembayaran Ujian</div>
                    <div class="card-body">
                        <!-- Notice -->
                        <div class="notice-detail" style="display: contents;">
                            <div class="alert bg-warning text-dark mt-2x text-center" role="alert">pilih salah satu siswa &nbsp;<i class="fas fa-exclamation"></i></div>
                        </div>
                        
                        <!-- Data -->
                        <span class="ujian-pem-null" style="display: none;"><i class="fas fa-hourglass-half fa-spin" ></i>&nbsp; siswa belum melakukan pembayaran Ujian</span>
                        <ul class="list-group mt-2 list-detail-ujian-siswa">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
</ul>

<script>
    // SELECT FORM
    $(document).ready(function(){
        $('#sl-kelas').select2({
            placeholder: '__pilih kelas__',
            theme: "classic"
        });
        $('#sl-prodi').select2({
            placeholder: '__pilih prodi__',
            theme: "classic"
        });
        $('#sl-siswa').select2({
            placeholder: '__pilih siswa__',
            theme: "classic"
        });
        $('#sl-siswa').select2({
            placeholder: '__pilih siswa__',
            theme: "classic"
        });
        $('#sl-pem-ujian').select2({
            placeholder: '__pilih pembayaran__',
            theme: "classic"
        });
    });


    // SHOW DATA SISWA (AFTER ACTION CHANGE SELECT PRODI)
    $('#sl-prodi').on('change', function(){
        let kelas = $('#sl-kelas').val();
        let prodi = $('#sl-prodi').val();

        if($('#sl-kelas').val() == ''){
            $('#sl-kelas').addClass('is-invalid');
        }else{
            $.ajax({
                method: "POST",
                url: "pages/ujian/ujian-load-data.php",
                dataType: "json",
                data: {
                    "action" : "loadSlSiswa",
                    "kelas" : kelas,
                    "prodi" : prodi
                },
                success: function(msg){
                    let selectSiswa = '';
                    $.each(msg.datasiswa, function(idx,val){
                        selectSiswa += '<option value="'+val.id+'-'+val.kls_siswa+'-'+val.prod_siswa+'">'+val.nama_siswa+'-'+val.nis_siswa+'</option>';
                    });

                    // Siswa
                    let firstSelect = '<option value="">__pilih siswa__</option>';
                    $('#sl-siswa').empty();
                    $('#sl-siswa').append(firstSelect).append(selectSiswa);

                    // Pem-Ujian
                    let firstSelectUjian = '<option value="">__pilih pembayaran__</option>';
                    $('#sl-pem-ujian').empty();
                    $('#sl-pem-ujian').append(firstSelectUjian);
                }
            });
        }
    });


    // GET DATA PEMBAYARAN
    $('#sl-siswa').on('change', function(){
        // FORM PEM SECTION
        $('.note-metode-pem').css('display', 'contents');
        $('.show-form-pem').empty();
        $('#btn-cicilan').addClass('btn-disabled');
        $('#btn-cicilan').attr('disabled', true);
        $('#btn-lunas').addClass('btn-disabled');
        $('#btn-lunas').attr('disabled', true);
        // END FORM PEM

        $(this).val() == '' ? $('.notice-detail').css('display', 'contents') : $('.notice-detail').css('display', 'none');
        
        let dataLoad = $('#sl-siswa').val();
        $.ajax({
            method: "POST",
            url: "pages/ujian/ujian-load-data.php",
            dataType: "json",
            data: {
                "action" : "loadPemUjian",
                "dataload" : dataLoad
            },
            success: function(msg){
                // LOAD PEMBAYARAN
                let dataPemUjian = '';
                $.each(msg.datapem, function(idx, val){
                    dataPemUjian += '<option value="'+val.id_jns+'">'+val.jns_pem+'</option>';
                });
                let firstSelect = '<option value="">__pilih pembayaran__</option>';
                
                $('#sl-pem-ujian').empty();
                $('#sl-pem-ujian').append(firstSelect).append(dataPemUjian);

                // LOAD DETAIL PEMBAYARAN
                if(msg.datainfopem == ''){
                    $('.list-detail-ujian-siswa').empty();
                    $('.ujian-pem-null').css('display', 'contents');
                }else{
                    let infoPem = '';
                    $.each(msg.datainfopem, function(idx, val){
                        infoPem += '<li class="list-group-item d-flex justify-content-between align-items-center">'+val.jns_pem+'<span>';
                        for(let i=1; i <= val.jml_pem; i++){
                            infoPem += '<span class="label label-primary">'+i+'x</span>';
                        }
                        infoPem += '</span></li>';
                    });
                    $('.ujian-pem-null').css('display', 'none');
                    $('.list-detail-ujian-siswa').empty();
                    $('.list-detail-ujian-siswa').append(infoPem);
                    
                }
            }
        });
    });

    // METODE PEMBAYARAN
    $('#sl-pem-ujian').on('change', function(){
        $('.note-metode-pem').css('display', 'contents');
        $('.show-form-pem').empty();
        if($(this).val() == ''){
            $('#btn-cicilan').addClass('btn-disabled');
            $('#btn-cicilan').attr('disabled', true);
            $('#btn-lunas').addClass('btn-disabled');
            $('#btn-lunas').attr('disabled', true);
        }else{
            $('#btn-cicilan').removeClass('btn-disabled');
            $('#btn-cicilan').attr('disabled', false);
            $('#btn-lunas').removeClass('btn-disabled');
            $('#btn-lunas').attr('disabled', false);
        }
    });

    // CICILAN
    $('#btn-cicilan').on('click', function(){
        let idpemujian = $('#sl-pem-ujian').val();

        $.ajax({
            method: "POST",
            url: "pages/ujian/ujian-func-data.php",
            dataType: "json",
            data: {
                "action" : "checkPemUjian",
                "idpem" : idpemujian
            },
            success: function(msg){
                // console.log(msg.datapem[0]["jns_ccl"])
                let jmlccl = msg.datapem[0]["jns_ccl"];

                let formPemCcl = '';
                for(let i=1; i <= jmlccl; i++){
                    formPemCcl += '<div clas="form-group"><input type="text" class="form-control form-control-sm mb-3" id="form-pem-ujian" placeholder="Cicilan ke-'+i+' Rp. ..."></div>';
                }
                $('.note-metode-pem').css('display', 'none');
                $('.show-form-pem').empty();
                $('.show-form-pem').append(formPemCcl);

            }
        });
    });

    // LUNAS
    $('#btn-lunas').on('click', function(){
        let idpemujian = $('#sl-pem-ujian').val();

        $.ajax({
            method: "POST",
            url: "pages/ujian/ujian-func-data.php",
            dataType: "json",
            data: {
                "action" : "checkPemUjian",
                "idpem" : idpemujian
            },
            success: function(msg){
                // console.log(msg.datapem[0]["jns_ccl"])
                let jmlPem = msg.datapem[0]["jns_val"];
                let formPemLunas = '<div clas="form-group"><label>Pembayaran</label><input type="text" class="form-control form-control-sm mb-3" id="form-pem-ujian" value="'+jmlPem+'" readonly></div>';
                $('.note-metode-pem').css('display', 'none');
                $('.show-form-pem').empty();
                $('.show-form-pem').append(formPemLunas);

            }
        });
    });

</script>