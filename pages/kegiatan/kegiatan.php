<style>
    .my-table tr th,td{
        padding-right: 10px;
        padding-top: 8px;
    }

    .my-shadow {
        box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;
    }
</style>

<ul class="list-group">
    <li class="list-group-item header-list text-center bg-primary text-white h6"><i class="fas fa-file-invoice"></i>&nbsp; PEMBAYARAN KEGIATAN</li>
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
                    <select name="sl-pem-kegiatan" id="sl-pem-kegiatan" class="custom-select" style="width: 100%;">
                        <option value="">__pilih pembayaran__</option>
                    </select>
                    <small class="info-sl-pem"></small>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-primary btn-mini rounded btn-disabled" disabled id="btn-cicilan" data-toggle="tooltip" data-placement="top" title="Pembayaran Cicilan"><i class="far fa-copy"></i></button>
                        <button type="button" class="btn btn-primary btn-mini rounded btn-disabled" disabled id="btn-lunas" data-toggle="tooltip" data-placement="top" title="Pembayaran Lunas"><i class="far fa-sticky-note"></i></button>
                    </div>
                    <div class="col-lg-9">
                        <span style="color: red; font-style: italic; font-size: 10px; display: contents;" class="note-metode-pem"><i class="fas fa-arrow-left"></i>&nbsp; Pilih metode pembayaran</span>
                        <div class="show-form-pem">
                            <!-- FORM HERE -->
                            <!-- <button type="button" class="btn btn-primary btn-mini" id="btn-val-pem-kegiatan" style="display: none;"><i class="fas fa-check"></i>&nbsp; validasi</button> -->
                        </div>
                    </div>
                </div>
                <hr>

                <!-- TABLE DETAIL PROCESS PEM -->
                <div class="tb-detail-pem" style="border: 1px solid lightgray; border-radius: 5px; display: none;">
                    <table class="my-table mt-3 mb-3 ml-3 mr-3">
                        <tr>
                            <th width="10%">Nama</th>
                            <th>:</th>
                            <td class="tbu-nama"> </td>
                        </tr>
                        <tr>
                            <th width="10%">No.Induk</th>
                            <th>:</th>
                            <td class="tbu-induk"> </td>
                        </tr>
                        <tr>
                            <th width="10%">Kelas</th>
                            <th>:</th>
                            <td class="tbu-kelas"> </td>
                        </tr>
                        <tr>
                            <th width="10%">Jurusan</th>
                            <th>:</th>
                            <td class="tbu-jurusan"> </td>
                        </tr>
                        <tr>
                            <th width="10%">Pembayaran</th>
                            <th>:</th>
                            <td class="tbu-pem"></td>
                        </tr>
                        <tr>
                            <th width="10%">Jumlah</th>
                            <th>:</th>
                            <td class="tbu-jumlah"></td>
                        </tr>
                        <tr>
                            <th width="10%">Ket.Pembayaran</th>
                            <th>:</th>
                            <td class="tbu-ketpem"></td>
                        </tr>
                        <tr>
                            <th width="10%">Validator</th>
                            <th>:</th>
                            <td class="tbu-admin"></td>
                        </tr>
                    </table>
                    <div class="button-proc mt-3 mb-3 ml-3 mr-3">
                        <button type="button" class="btn btn-primary btn-mini" id="btn-sub-pem"><i class="fas fa-check"></i>&nbsp; process</button>
                        <button type="button" class="btn btn-secondary btn-mini" id="btn-can-pem"><i class="fas fa-times"></i>&nbsp; batal</button>
                    </div>
                </div>

                <div class="note-payment">
                    <!-- Success Payment -->
                </div>
            </div>

            <!-- DETAIL PEMBAYARAN -->
            <div class="col-lg-6">
                <div class="card border" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                    <div class="card-header text-center h6 border border-buttom"><i class="fas fa-search"></i>&nbsp; Detail Pembayaran kegiatan</div>
                    <div class="card-body">
                        <!-- Notice -->
                        <div class="notice-detail" style="display: contents;">
                            <div class="alert bg-warning text-dark mt-2 text-center" role="alert">pilih salah satu siswa &nbsp;<i class="fas fa-exclamation"></i></div>
                        </div>
                        <div class="loading-data" style="display: none;">
                            <div class="h5 text-center"><i class="fas fa-spinner fa-pulse"></i> Loading ..</div>
                        </div>
                        <!-- Data -->
                        <div class="kegiatan-pem-null" style="display: none;">
                            <div class="text-center"><i class="fas fa-hourglass-half fa-spin" ></i>&nbsp; siswa belum melakukan pembayaran kegiatan</div>
                        </div>
                        <ul class="list-group mt-2 list-detail-kegiatan-siswa">

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
        $('#loading').hide();

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
        $('#sl-pem-kegiatan').select2({
            placeholder: '__pilih pembayaran__',
            theme: "classic"
        });

        $('button[data-toggle="tooltip"]').tooltip();
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
                url: "pages/kegiatan/kegiatan-load-data.php",
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

                    // Pem-kegiatan
                    let firstSelectkegiatan = '<option value="">__pilih pembayaran__</option>';
                    $('#sl-pem-kegiatan').empty();
                    $('#sl-pem-kegiatan').append(firstSelectkegiatan);
                }
            });
        }
    });

    // SHOW INFORMATION PEMBAYARAN
    $('#sl-pem-kegiatan').on('change', function(){
        $('.info-sl-pem').text('');
        let idpem = $(this).val() == '' ? 'null' : $(this).val();
        
        if(idpem != 'null'){
            $.ajax({
                method: 'POST',
                url: "pages/kegiatan/kegiatan-load-data.php",
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
                        $('.info-sl-pem').html(null);
                    }
                }
            });
        }else{
            $('.info-sl-pem').html(null);
        }
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

        if($(this).val() == ''){
            $('.notice-detail').css('display', 'contents');
            $('.loading-data').css('display', 'none');
        }else{
            $('.notice-detail').css('display', 'none');
            $('.loading-data').css('display', 'contents');
        }
        
        let dataLoad = $('#sl-siswa').val();
        $.ajax({
            method: "POST",
            url: "pages/kegiatan/kegiatan-load-data.php",
            dataType: "json",
            data: {
                "action" : "loadPemkegiatan",
                "dataload" : dataLoad
            },
            success: function(msg){
                // LOAD PEMBAYARAN
                let dataPemkegiatan = '';
                $.each(msg.datapem, function(idx, val){
                    dataPemkegiatan += '<option value="'+val.id_jns+'">'+val.jns_pem+'</option>';
                });
                let firstSelect = '<option value="">__pilih pembayaran__</option>';
                
                $('#sl-pem-kegiatan').empty();
                $('#sl-pem-kegiatan').append(firstSelect).append(dataPemkegiatan);

                // LOAD DETAIL PEMBAYARAN
                let mydata = msg.datainfopem == '' ? 'null' : JSON.stringify(msg.datainfopem);
                loadDetailpemkegiatanSiswa('multiDetail', dataLoad.split('-')[0]);
            }
        });
    });

    // === === === === === METODE PEMBAYARAN
    $('#sl-pem-kegiatan').on('change', function(){
        $('.note-metode-pem').css('display', 'contents');
        $('.show-form-pem').empty();
        if($(this).val() == ''){
            $('.note-payment').empty();
            $('#btn-cicilan').addClass('btn-disabled');
            $('#btn-cicilan').attr('disabled', true);
            $('#btn-lunas').addClass('btn-disabled');
            $('#btn-lunas').attr('disabled', true);
        }else{
            let idsiswa = $('#sl-siswa').val().split('-')[0];
            let idpem = $(this).val();
            loadDetailPemKW(idsiswa,idpem, 'load');
        }
    });

    // CICILAN
    $('#btn-cicilan').on('click', function(){
        let idpemkegiatan = $('#sl-pem-kegiatan').val();
        let idsiswa = $('#sl-siswa').val().split('-')[0];

        $.ajax({
            method: "POST",
            url: "pages/kegiatan/kegiatan-func-data.php",
            dataType: "json",
            data: {
                "action" : "checkPemkegiatan",
                "trigger": "cicilan",
                "idpem" : idpemkegiatan,
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
                        let set_readonly = i != forloop ? 'readonly' : '';
                        formPemCcl += '<div clas="form-group"><input type="text" class="form-control form-control-sm mb-3" id="form-pem-kegiatan" placeholder="Cicilan ke-'+ i +' Rp. ..." '+ set_readonly +'></div>';
                    }
                }else{
                    $.each(msg.datapem, function(id,val){
                        // LOOP FOR READY VALUE
                        for(let i=1; i <= msg.datapem.length; i++){
                            formPemCcl += '<div clas="form-group"><input type="text" class="form-control form-control-sm mb-3" value="'+val.nom_pem+'" readonly></div>';
                        }
    
                        // LOOP FOR EMPTY FORM
                        for(let i=forloop; i <= jmlccl; i++){
                            if(forloop == jmlccl){
                                formPemCcl += `
                                <div clas="form-group">
                                    <small style="color:red; text-style: italic;">*)pembayaran cicilan terakhir</small>
                                    <input type="text" class="form-control form-control-sm mb-3" id="form-pem-kegiatan" value="`+msg.sisapem+`" readonly>
                                </div>`;
                            }else{
                                let set_readonly = i != forloop ? 'readonly' : '';
                                formPemCcl += `
                                <div clas="form-group">
                                    <input type="text" class="form-control form-control-sm mb-3" id="form-pem-kegiatan" placeholder="Cicilan ke-`+ i +` Rp. ..." `+ set_readonly +`>
                                </div>`;
                            }
                        }
                    });
                }
                let buttonVal = '<button type="button" class="btn btn-primary btn-mini" id="btn-val-pem-kegiatan" onClick="valPemkegiatan()"><i class="fas fa-check"></i>&nbsp; validasi</button>';
                $('.note-metode-pem').css('display', 'none');
                $('.show-form-pem').empty();
                $('.show-form-pem').append(formPemCcl);
                $('.show-form-pem').append(buttonVal);

            }
        });
    });

    // LUNAS
    $('#btn-lunas').on('click', function(){
        let idpemkegiatan = $('#sl-pem-kegiatan').val();
        let idsiswa = $('#sl-siswa').val().split('-')[0];

        $.ajax({
            method: "POST",
            url: "pages/kegiatan/kegiatan-func-data.php",
            dataType: "json",
            data: {
                "action" : "checkPemkegiatan",
                "trigger": "lunas",
                "idpem" : idpemkegiatan,
                "idsiswa": idsiswa
            },
            success: function(msg){
                // console.log(msg.datapem[0]["jns_ccl"])
                let jmlPem = msg.infopem;
                let formPemLunas = '<div clas="form-group"><label>Pembayaran</label><input type="text" class="form-control form-control-sm mb-3" id="form-pem-kegiatan" value="'+jmlPem+'" readonly></div>';
                let buttonVal = '<button type="button" class="btn btn-primary btn-mini" id="btn-val-pem-kegiatan" onClick="valPemkegiatan()"><i class="fas fa-check"></i>&nbsp; validasi</button>';
                $('.note-metode-pem').css('display', 'none');
                $('#btn-val-pem-kegiatan').css('display','contents');
                $('.show-form-pem').empty();
                $('.show-form-pem').append(formPemLunas);
                $('.show-form-pem').append(buttonVal);

            }
        });
    });

    // === === === === === VALIDASI PEMBAYARAN === === === === ===
    function valPemkegiatan(){
        $('#loading').show();

        if($('#form-pem-kegiatan').val() == ''){
            
            Swal.fire({
                title: 'warning',
                text: 'lengkapi form input pembayaran terlebih dahulu',
                icon: 'warning',
                showConfirmButton: true,
            });
        }else{
            $peminput = parseInt($('#form-pem-kegiatan').val());
            $pemexist = parseInt($('span.nompem').text());

            if($peminput > $pemexist){
                $('#loading').hide();
                Swal.fire({
                    title: 'warning',
                    text: 'pembayaran yang diinputkan melebihi jumlah nominal pembayaran',
                    icon: 'warning',
                    showConfirmButton: true,
                });
            }else{

                $.ajax({
                    method: 'POST',
                    url: 'pages/kegiatan/kegiatan-func-data.php',
                    dataType: 'json',
                    data: {
                        "action": "valPemkegiatan",
                        "trigger": "validasi",
                        "idsiswa": $('#sl-siswa').val().split('-')[0],
                        "idpem": $('#sl-pem-kegiatan').val()
                    },
                    success: function(stsval){
                        $('select#sl-kelas').attr('disabled',true);
                        $('select#sl-prodi').attr('disabled',true);
                        $('select#sl-siswa').attr('disabled',true);
                        $('select#sl-pem-kegiatan').attr('disabled',true);
                        $('#btn-cicilan').addClass('btn-disabled disabled waves-effect waves-light');
                        $('#btn-lunas').addClass('btn-disabled disabled waves-effect waves-light');
                        $('#btn-val-pem-kegiatan').addClass('btn-disabled disabled waves-effect waves-light');
                        $('#btn-val-pem-kegiatan').html('<i class="fas fa-spinner fa-pulse"></i>&nbsp; validasi');
                        $('.tb-detail-pem td').html('');

                        $('.tbu-nama').text(stsval.datasiswa["nama_siswa"]);
                        $('.tbu-induk').text(stsval.datasiswa["nis_siswa"]);
                        $('.tbu-kelas').text(stsval.datasiswa["kls_siswa"]);
                        $('.tbu-jurusan').text(stsval.datasiswa["prod_siswa"]);
                        $('.tbu-pem').text(stsval.datapem["jns_pem"]+' (Rp.'+ stsval.datapem["jns_val"] +')');
                        $('.tbu-jumlah').text('Rp.'+$('#form-pem-kegiatan').val());
                        
                        let labelstatus = '';
                        // console.log(parseInt($('#form-pem-kegiatan').val()) + parseInt(stsval.lastpem));
                        let labellunas = (parseInt($('#form-pem-kegiatan').val()) + parseInt(stsval.lastpem)) == stsval.datapem["jns_val"] ? '<span class="label label-success"><i class="fas fa-check"></i> lunas</span>' : '';
                        let stslunas = (parseInt($('#form-pem-kegiatan').val()) + parseInt(stsval.lastpem)) == stsval.datapem["jns_val"] ? '-l' : '';
                        if(stsval.dataval == ''){
                            labelstatus += '<span class="label label-primary pem-proc-l" data-ccl="ccl-1'+stslunas+'">cicilan-1</span>';
                        }else{
                            let ccl = stsval.dataval.length + 1;
                            labelstatus += '<span class="label label-primary pem-proc-l" data-ccl="ccl-'+ccl+''+stslunas+'">cicilan-'+ccl+'</span> ';
                        }
                        $('.tbu-ketpem').html(labelstatus+ ' ' +labellunas);
                        $('.tbu-admin').html('<i class="fas fa-user"></i> Vina Elyza');
                        
                        // Display table
                        $('.tb-detail-pem').css('display', 'contents');
                        $('#loading').hide();
                    }
                });
            }
        }
    }

    // Cancel Process
    $('#btn-can-pem').on('click', function(){
        Swal.fire({
            title: 'Cancel',
            text: 'Ingin Batalkan Proses Pembayaran ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: "iya",
            cancelButtonText: "tidak"
        }).then((result) => {
            if(result.isConfirmed){
                $('select#sl-kelas').attr('disabled',false);
                $('select#sl-prodi').attr('disabled',false);
                $('select#sl-siswa').attr('disabled',false);
                $('select#sl-pem-kegiatan').attr('disabled',false);
                $('#btn-cicilan').removeClass('btn-disabled disabled waves-effect waves-light');
                $('#btn-lunas').removeClass('btn-disabled disabled waves-effect waves-light');
                $('#btn-val-pem-kegiatan').removeClass('btn-disabled disabled waves-effect waves-light');
                $('#btn-val-pem-kegiatan').html('<i class="fas fa-check"></i>&nbsp; validasi');
                $('.tb-detail-pem td').html('');
                $('.tb-detail-pem').css('display','none');
            }
        });
    });

    // Submit Process
    $('#btn-sub-pem').on('click', function(){
        let status_pem = $('table tr td.tbu-ketpem').text().split(' ');
        status_pem = status_pem.length > 2 ? status_pem.pop() : status_pem[0];
        // console.log(status_pem);
        let jasondata = {
            action: "valPemkegiatan",
            trigger: "procpem",
            siswa: $('#sl-siswa').val().split('-')[0],
            idpem: $('#sl-pem-kegiatan').val(),
            ketpem: $('table tr td.tbu-ketpem span.pem-proc-l').data('ccl'),
            nompem: parseInt($('#form-pem-kegiatan').val()),
            status: status_pem
        }

        Swal.fire({
            title: 'Proses',
            text: 'Ingin Proses Pembayaran ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: "iya",
            cancelButtonText: "tidak"
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    method: 'POST',
                    url: 'pages/kegiatan/kegiatan-func-data.php',
                    dataType: 'json',
                    data: jasondata,
                    success: function(stss){
                        if(stss.status == 'success'){
                            Swal.fire({
                                title: stss.status,
                                text: stss.info,
                                icon: stss.status,
                                showConfirmButton: true
                            }).then((ok) => {
                                $('select#sl-kelas').attr('disabled',false);
                                $('select#sl-prodi').attr('disabled',false);
                                $('select#sl-siswa').attr('disabled',false);
                                $('select#sl-pem-kegiatan').attr('disabled',false);
                                $('.tb-detail-pem').css('display', 'none');
                                $('.show-form-pem').empty();

                                let idsiswa = $('#sl-siswa').val().split('-')[0];
                                let idpem = $('#sl-pem-kegiatan').val();
                                loadDetailPemKW(idsiswa,idpem, 'pay');
                            })
                        }
                    }
                });
            }
        });
    });


    // === === === === === FUNCTION LOAD DETAIL PEMBAYARAN === === === === === 
    // load data detail pembayaran
    function loadDetailpemkegiatanSiswa(kat, idsiswa, idpem = 0){

        if(kat == 'multiDetail'){
            $.ajax({
                method: 'POST',
                url: 'pages/kegiatan/kegiatan-load-data.php',
                dataType: 'json',
                data: {
                    "action": "loadDetailPemkegiatan",
                    "trigger": kat,
                    "idpem": idpem,
                    "idsiswa": idsiswa
                },
                success: function(msg){
                    if(msg.data == ''){
                        $('.loading-data').css('display', 'none');
                        $('.list-detail-kegiatan-siswa').empty();
                        $('.kegiatan-pem-null').css('display', 'contents');
                    }else{
                        let infoPem = '';
                        $.each(msg.data, function(idx, val){
                            let lunas = val.total_pem == val.jns_val ? '<span class="label label-success"><i class="fas fa-check"></i></span>' : '';
                            infoPem += '<li class="list-group-item d-flex justify-content-between align-items-center">'+val.jns_pem+'<span>';
                            for(let i=1; i <= val.jml_pem; i++){
                                infoPem += '<span class="label label-primary">'+i+'x</span>';
                            }
                            infoPem += lunas+'</span></li>';
                        });
                        $('.kegiatan-pem-null').css('display', 'none');
                        $('.loading-data').css('display', 'none');
                        $('.list-detail-kegiatan-siswa').empty();
                        $('.list-detail-kegiatan-siswa').append(infoPem);
                        
                    }
                }
            });

        }else if(kat == 'singleDetail'){

        }
    }

    // load detail pembayaran (kwitansi)
    function loadDetailPemKW(idsiswa,idpem, trigger){
        $.ajax({
            method: 'POST',
            url: 'pages/kegiatan/kegiatan-load-data.php',
            dataType: 'json',
            data: {
                "action": "loadpemKW",
                "idsiswa": idsiswa,
                "idpem": idpem,
                "trigger": trigger,
            },
            success: function(data){

                // LOAD MODE
                if(data.load.active == 'true'){
                    if(data.load.load_ketlunas == 'true'){
                        $('#btn-cicilan').attr('disabled', true);
                        $('#btn-cicilan').addClass('btn-disabled disabled waves-effect waves-light');
                        $('#btn-lunas').attr('disabled', true);
                        $('#btn-lunas').addClass('btn-disabled disabled waves-effect waves-light');
        
                        let cardHistPayment = '';
                        $.each(data.load.load_datapem,function(id,val){
                            let statuspem = val.status_pem != 'lunas' ? '<i class="fas fa-copy"></i>&nbsp; '+ val.status_pem : '<i class="fas fa-check"></i>&nbsp; lunas';
                            let dataKwitansi = 'pem=kegiatan&idsiswa='+val.id+'&idjns='+val.id_jns+'&idpem='+val.id_pem_keg;
                            let buttonPrint = '<a href="processing/pdf.php?'+dataKwitansi+'" target="_blank" class="label label-primary" id="print-kwt-payspp"><i class="fas fa-print"></i></a>';
                            cardHistPayment += `
                            <div class="card-body mb-3 my-shadow">
                                <h6 class="card-title">
                                    <div class="text-right">${buttonPrint}<span class="label label-primary">${statuspem}</span></div>
                                    <i class="fas fa-th-large text-primary"></i>&nbsp; ${val.jns_pem}
                                </h6>
                                <br>
                                <div class="card-text">
                                    <table class="my-table">
                                        <tr>
                                            <th>Nama</th>
                                            <th>:</th>
                                            <td>${val.nama_siswa}</td>
                                        </tr>
                                        <tr>
                                            <th>No.Induk</th>
                                            <th>:</th>
                                            <td>${val.nis_siswa}</td>
                                        </tr>
                                        <tr>
                                            <th>Kelas</th>
                                            <th>:</th>
                                            <td>${val.kls_siswa}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>:</th>
                                            <td>${val.tanggal_pem}</td>
                                        </tr>
                                        <tr>
                                            <th>Pembayaran</th>
                                            <th>:</th>
                                            <td>Rp.${val.nom_pem}</td>
                                        </tr>
                                    </table>
                                    <div class="validator text-right">
                                        <span class="text-primary"><i class="fas fa-signature"></i>&nbsp; Validate By</span>
                                        <br>
                                        <span style="font-size: 11px; font-style: italic; border-bottom: 1px solid grey;">${val.nama_adm}</span>
                                    </div>
                                </div>
                            </div>`;
                        });
        
                        $('.note-payment').empty();
                        $('.note-payment').html(cardHistPayment);

                    }else if(data.load.load_ketlunas == 'false' || data.load.load_ketlunas == 'null'){
                        $('.note-payment').empty();
                        $('#btn-cicilan').attr('disabled', false);
                        $('#btn-cicilan').removeClass('btn-disabled disabled waves-effect waves-light');
                        $('#btn-lunas').attr('disabled', false);
                        $('#btn-lunas').removeClass('btn-disabled disabled waves-effect waves-light');
                    }

                }


                // PAY MODE
                if(data.pay.active == 'true'){
                    // console.log(data.pay);
                    let cardHistPayment = '';
                    let statuspem = data.pay.pay_datapem.status_pem == 'lunas' ? '<i class="fas fa-copy"></i>&nbsp; lunas' : '<i class="fas fa-copy"></i>&nbsp; '+ data.pay.pay_datapem.status_pem;
                    let dataKwitansi = 'pem=kegiatan&idsiswa='+data.pay.pay_datapem.id+'&idjns='+data.pay.pay_datapem.id_jns+'&idpem='+data.pay.pay_datapem.id_pem_keg;
                    let buttonPrint = '<a href="processing/pdf.php?'+dataKwitansi+'" target="_blank" class="label label-primary" id="print-kwt-payspp"><i class="fas fa-print"></i></a>';
                    cardHistPayment += `
                    <div class="card-body mb-3 my-shadow">
                        <h6 class="card-title">
                            <div class="text-right">${buttonPrint}<span class="label label-primary">${statuspem}</span></div>
                            <i class="fas fa-th-large text-primary"></i>&nbsp; ${data.pay.pay_datapem.jns_pem}
                        </h6>
                        <br>
                        <div class="card-text">
                            <table class="my-table">
                                <tr>
                                    <th>Nama</th>
                                    <th>:</th>
                                    <td>${data.pay.pay_datapem.nama_siswa}</td>
                                </tr>
                                <tr>
                                    <th>No.Induk</th>
                                    <th>:</th>
                                    <td>${data.pay.pay_datapem.nis_siswa}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <th>:</th>
                                    <td>${data.pay.pay_datapem.kls_siswa}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>:</th>
                                    <td>${data.pay.pay_datapem.tanggal_pem}</td>
                                </tr>
                                <tr>
                                    <th>Pembayaran</th>
                                    <th>:</th>
                                    <td>Rp.${data.pay.pay_datapem.nom_pem}</td>
                                </tr>
                            </table>
                            <div class="d-flex justify-content-between mt-3">
                                <div class="button-cancel">
                                    <button type="button" class="btn btn-secondary btn-mini" id="close-pay"><i class="fas fa-times"></i>&nbsp;tutup</button>
                                </div>
                                <div class="validator text-right">
                                    <span class="text-primary"><i class="fas fa-signature"></i>&nbsp; Validate By</span>
                                    <br>
                                    <span style="font-size: 11px; font-style: italic; border-bottom: 1px solid grey;">${data.pay.pay_datapem.nama_adm}</span>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    
                    loadDetailpemkegiatanSiswa('multiDetail',idsiswa);
                    $('.note-payment').empty();
                    $('.note-payment').html(cardHistPayment);

                    $('#close-pay').on('click', function(){
                        // alert("terpanggil");
                        $('#sl-pem-kegiatan').val('').trigger('change');

                        $('#btn-cicilan').removeClass('disabled waves-effect waves-light').attr('disabled', true);
                        $('#btn-lunas').removeClass('disabled waves-effect waves-light').attr('disabled', true);
                    });
                }
            }
        })
    }


</script>