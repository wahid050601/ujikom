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
                    <small class="info-sl-pem"></small>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-primary btn-mini rounded btn-disabled" disabled id="btn-cicilan" title="Pembayaran Cicilan"><i class="far fa-copy"></i></button>
                        <button type="button" class="btn btn-primary btn-mini rounded btn-disabled" disabled id="btn-lunas" title="Pembayaran Lunas"><i class="far fa-sticky-note"></i></button>
                    </div>
                    <div class="col-lg-10">
                        <span style="color: red; font-style: italic; font-size: 10px; display: contents;" class="note-metode-pem"> *) Pilih metode pembayaran</span>
                        <div class="show-form-pem">
                            <!-- FORM HERE -->
                            <!-- <button type="button" class="btn btn-primary btn-mini" id="btn-val-pem-ujian" style="display: none;"><i class="fas fa-check"></i>&nbsp; validasi</button> -->
                        </div>
                    </div>
                </div>
                <hr>
                <!-- <div class="row">
                    <div class="col-lg-3"><button type="button" class="btn btn-primary btn-sm btn-block " id="btn-val-pem-ujian"><i class="fas fa-check"></i>&nbsp; validasi</button></div>
                </div> -->
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
                        selectSiswa += '<option value="'+val.id+'-'+val.kls_siswa+'-'+val.prod_siswa+'-'+val.nama_siswa+'">'+val.nama_siswa+'-'+val.nis_siswa+'</option>';
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

    // SHOW INFORMATION PEMBAYARAN
    $('#sl-pem-ujian').on('change', function(){
        $('.info-sl-pem').text('');
        let idpem = $(this).val();

        $.ajax({
            method: 'POST',
            url: "pages/ujian/ujian-load-data.php",
            dataType: 'json',
            data: {
                "action": "loadInfoPem",
                "idpem": idpem,
            },
            success: function(msg){
                if(msg.status == 'success'){
                    let infopem = 'Jumlah Pembayaran Rp.<span class="nompem">'+ msg.infopem[0].jns_val +'</span> (Cicilan sebanyak '+ msg.infopem[0].jns_ccl +'x)';
                    $('.info-sl-pem').html(infopem);
                }else{
                    $('.info-sl-pem').html('not information');
                }
            }
        })
    })


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

    // === === === === === METODE PEMBAYARAN
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
        let idsiswa = $('#sl-siswa').val().split('-')[0];

        $.ajax({
            method: "POST",
            url: "pages/ujian/ujian-func-data.php",
            dataType: "json",
            data: {
                "action" : "checkPemUjian",
                "trigger": "cicilan",
                "idpem" : idpemujian,
                "idsiswa": idsiswa
            },
            success: function(msg){
                // console.log(msg.datapem[0]["jns_ccl"])
                let jmlccl = msg.infopem["jns_ccl"];
                let forloop = msg.datapem.length + 1;
                // console.log(msg.datapem);

                let formPemCcl = '';
                if(msg.datapem == ''){
                    for(let i=1; i <= jmlccl; i++){
                        formPemCcl += '<div clas="form-group"><input type="text" class="form-control form-control-sm mb-3" id="form-pem-ujian" placeholder="Cicilan ke-'+ i +' Rp. ..."></div>';
                    }
                    console.log("null");
                }else{
                    $.each(msg.datapem, function(id,val){
                        // LOOP FOR READY VALUE
                        for(let i=1; i <= msg.datapem.length; i++){
                            formPemCcl += '<div clas="form-group"><input type="text" class="form-control form-control-sm mb-3" id="form-pem-ujian" value="'+val.nom_pem+'"></div>';
                        }
    
                        // LOOP FOR EMPTY FORM
                        for(let i=forloop; i <= jmlccl; i++){
                            formPemCcl += '<div clas="form-group"><input type="text" class="form-control form-control-sm mb-3" id="form-pem-ujian" placeholder="Cicilan ke-'+ i +' Rp. ..."></div>';
                        }
                    });
                    console.log("exist");
                }
                let buttonVal = '<button type="button" class="btn btn-primary btn-mini" id="btn-val-pem-ujian" onClick="valPemUjian()"><i class="fas fa-check"></i>&nbsp; validasi</button>';
                $('.note-metode-pem').css('display', 'none');
                $('.show-form-pem').empty();
                $('.show-form-pem').append(formPemCcl);
                $('.show-form-pem').append(buttonVal);

            }
        });
    });

    // LUNAS
    $('#btn-lunas').on('click', function(){
        let idpemujian = $('#sl-pem-ujian').val();
        let idsiswa = $('#sl-siswa').val().split('-')[0];

        $.ajax({
            method: "POST",
            url: "pages/ujian/ujian-func-data.php",
            dataType: "json",
            data: {
                "action" : "checkPemUjian",
                "trigger": "lunas",
                "idpem" : idpemujian,
                "idsiswa": idsiswa
            },
            success: function(msg){
                // console.log(msg.datapem[0]["jns_ccl"])
                let jmlPem = msg.infopem;
                let formPemLunas = '<div clas="form-group"><label>Pembayaran</label><input type="text" class="form-control form-control-sm mb-3" id="form-pem-ujian" value="'+jmlPem+'" readonly></div>';
                let buttonVal = '<button type="button" class="btn btn-primary btn-mini" id="btn-val-pem-ujian" onClick="valPemUjian()"><i class="fas fa-check"></i>&nbsp; validasi</button>';
                $('.note-metode-pem').css('display', 'none');
                $('#btn-val-pem-ujian').css('display','contents');
                $('.show-form-pem').empty();
                $('.show-form-pem').append(formPemLunas);
                $('.show-form-pem').append(buttonVal);

            }
        });
    });

    // === === === === === VALIDASI PEMBAYARAN
    function valPemUjian(){
        if($('#form-pem-ujian').val() == ''){
            Swal.fire({
                title: 'warning',
                text: 'lengkapi form input pembayaran terlebih dahulu',
                icon: 'warning',
                showConfirmButton: true,
            });
        }else{
            $peminput = parseInt($('#form-pem-ujian').val());
            $pemexist = parseInt($('span.nompem').text());

            if($peminput > $pemexist){
                Swal.fire({
                    title: 'warning',
                    text: 'nominal pembayaran yang diinputkan melebihi jumlah nominal pembayaran',
                    icon: 'warning',
                    showConfirmButton: true,
                });
            }else{
                $.ajax({
                    method: 'POST',
                    url: 'pages/ujian/ujian-func-data.php',
                    dataType: 'json',
                    data: {
                        "action": "valPemUjian",
                        "idsiswa": $('#sl-siswa').val().split('-')[0],
                        "idpem": $('#sl-pem-ujian').val(),
                        "nompem": $('#form-pem-ujian').val()
                    },
                    success: function(stsval){
                        console.log(stsval);
                    }
                });

                // let kelas = $('#sl-kelas').val();
                // let prodi = $('#sl-prodi').val();
                // let siswa = $('#sl-siswa').val();
                // let pemUjian = $('#sl-pem-ujian').val();
                // let nominal = $('#form-pem-ujian').val();

                // let jsonData = {
                //     kelas : $('#sl-kelas').val(),
                //     prodi : $('#sl-prodi').val(),
                //     siswa : $('#sl-siswa').val().split('-')[3],
                //     pemUjian : $('#sl-pem-ujian').val(),
                //     nominal : $('#form-pem-ujian').val()
                // }

                // console.log(jsonData);
            }
        }
    }

</script>