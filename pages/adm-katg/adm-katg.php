<!-- ========================LOADING======================== -->
<style>
  .loading {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.3);
  color: black;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  font-size: 30px;
}
</style>
<!-- <div id="loading" class="loading"><i class="fas fa-circle-notch fa-spin fa-lg"></i>&nbsp; Loading</div> -->
<!-- ========================LOADING======================== -->

<div class="card">
    <div class="card-block show-page">
        
        <div class="header-katg">
            <span class="h6"><i class="fas fa-bookmark"></i>&nbsp; Kategori Pembayaran</span>
        </div>

        <hr>

        <div class="body-katg">
            <div class="row">
                <div class="col-lg-4">
                    <div class="list-group">
                        <div class="list-group-item">                           
                            <table id="table-katg" class="table table-striped table-bordered table-xs" style="width:100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <td class="text-center">No.</td>
                                        <td class="text-center">Kategori</td>
                                        <td class="text-center">Action</td>
                                    </tr>
                                </thead>
                                <tbody class="tab-show-katg">
                                    <!-- Data Here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="notice-pem">
                                <div class="alert alert-warning alert-dismissible fade show bg-warning text-dark" role="alert">
                                    <span>Pilih salah satu <strong>Kategori Pembayaran</strong></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            </div>
                            <div class="tab-show-pem">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- JQUERY -->
<script>
    $(document).ready(function(){

        // LOAD KATEGORI PEMBAYARAN
        $.ajax({
            method: "POST",
            url: "pages/adm-katg/adm-katg-load.php",
            dataType: "json",
            data: {
                "type" : "groupKatg"
            },
            success: function(msg){
                
                let kategori = '';
                $.each(msg.data, function(key, val){
                    kategori += '<tr><td>'+val.num+'</td><td>'+val.katg+'</td><td>'+val.action+'</td></tr>';
                });

                $('.tab-show-katg').append(kategori);


                $('#table-katg').DataTable({
                    processing: true,
                    serverside: true,
                    // select: true,
                    scrollCollapse: true,
                    scrollX: true,
                    searching: false,
                    info: false,
                    paging: false,
                });
            }
            
        });
    
        
        // ACTION BUTTON CATEGORY
        $('#table-katg').on('click', '#btnKatg', function(){

            $('.notice-pem').css('display', 'none');
            $('.tab-show-pem').empty();
            $('.tab-show-pem').load("pages/adm-katg/adm-katg-pem.php");

            // Get kategori
            var kat = $(this).data("idkatg");

            
            $.ajax({
                method: "POST",
                url: "pages/adm-katg/adm-katg-load.php",
                dataType: "json",
                data: {
                    "type" : "groupPem",
                    "idkatg" : $(this).data("idkatg")
                },
                success: function(msg){
                    $('.header-pem').html(kat);
                    $('.button-spp').append('<button id="bntaddpem" data-katg="'+kat+'" class="btn label btn-primary"><i class="fas fa-plus"></i></button>');
                    if(kat == 'ujian' || kat == 'kegiatan'){
                        $('.button-spp').append('<button id="bntdellpem" data-katg="'+kat+'" class="btn label btn-primary" style="display: none;"><i class="fas fa-trash"></i></button>');
                    }else{
                        $('.button-spp').append('<button id="bntdellpem" data-katg="'+kat+'" class="btn label btn-primary"><i class="fas fa-trash"></i></button>');
                    }
                    // $('.button-spp').append('<button id="bntrelpem" data-katg="'+kat+'" class="btn label btn-primary"><i class="fas fa-sync-alt"></i></button>');

                    if(msg.status == "success"){

                        $(document).ready(function(){

                            let datapem = '';
                            $.each(msg.data, function(key, val){
                                let button = '<span id="dell-ujian-pers" data-id="'+val.id+'" data-pem="'+val.pem+'" class="text-danger" style="font-size: 12px"><i class="fas fa-trash"></i></span>';
                                let buttonKegiatan = '<span id="dell-kegiatan-pers" data-id="'+val.id+'" data-pem="'+val.pem+'" class="text-danger" style="font-size: 12px"><i class="fas fa-trash"></i></span>';
                                datapem += `
                                <tr>
                                    <td>`+val.num+`</td>`;
                                    if(kat == 'ujian'){
                                        datapem += `<td>`+button+` `+val.pem+`</td>`;
                                    }else if(kat == 'kegiatan'){
                                        datapem += `<td>`+buttonKegiatan+` `+val.pem+`</td>`;
                                    }else{
                                        datapem += `<td>`+val.pem+`</td>`;
                                    }
                                    datapem += `<td>`+val.ket+`</td>
                                    <td>Rp. `+val.nominal+`,-</td>
                                    <td>`+val.cicil+` x</td>
                                    <td>`+val.tp+` `+val.smtr+`</td>
                                    <td>`+val.katg+`</td>
                                </tr>`;
                            });
                            $('#show-pem').append(datapem);

                            $('#table-jns').DataTable({
                                processing: true,
                                serverside: true,
                                // select: true,
                                scrollCollapse: true,
                                scrollX: true,
                                scrollY: 300,
                                searching: false,
                                info: false,
                                paging: true,
                            });

                            $('#table-jns_length').css('display', 'none');

                        });

                    }else{

                        $('.notice-pem').css('display', 'none');
                        $('#table-jns').DataTable({
                            processing: true,
                            serverside: true,
                            // select: true,
                            scrollCollapse: true,
                            scrollX: true,
                            searching: false,
                            info: false,
                            paging: false,
                        });

                        Swal.fire({ 
                            title: msg.status,
                            text: msg.info,
                            icon: 'warning',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                    // ADD PEMBAYARAN SPP
                    $('#bntaddpem').on('click', function(){
                        var data = $(this).data("katg");

                        if(data == "spp"){
                            $('#modalAddSpp').modal('show');
                        }else if(data == "ujian"){
                            $('#modalAddUjian').modal('show');
                        }else if(data == 'kegiatan'){
                            $('#modalAddKegiatan').modal('show');
                        }
                    });

                    // ADD PEMBAYARAN SPP
                    $('#btnadd-spp').on('click', function(){
                        $.ajax({
                            method: "POST",
                            url: "pages/adm-katg/adm-katg-func.php",
                            dataType: "json",
                            data: {
                                "action" : "addpemSpp",
                                "bulan" : $('#bulan-spp').val(),
                                "valtkj" : $('#tkjpem-spp').val(),
                                "valakl" : $('#aklpem-spp').val(),
                                "valbdp" : $('#bdppem-spp').val(),
                                "tp" : $('#tp-spp').val(),
                                "smtr" : $('#smtr-spp').val()
                            },
                            beforeSend: function(data){
                                $('#modalAddSpp').modal('hide');
                            },
                            success: function(msg){
                                Swal.fire({
                                    title: msg.status,
                                    // text: msg.info,
                                    html: msg.info + msg.text,
                                    icon: msg.status,
                                    showConfirmButton: true
                                });
                            }
                        });
                    });

                    // ============= DELETE PEMBAYARAN ALL SHOW MODAL =====================
                    $('#bntdellpem').on('click', function(){
                        var data = $(this).data("katg");

                        if(data == "spp"){
                            $('#modalDellSpp').modal('show');

                            $('#formDelSpp')[0].reset();
                            $('.notice').empty();
                            $('#btndel-spp').attr('disabled', true);
                            $('#btndel-spp').addClass('btn-disabled');
                            $('#tp-spp-del').empty();
                            $('.tb-del-spp').empty();
                            $('.notready-del-spp').css('display', 'none');
                            $('.ready-del-spp').css('display', 'none');

                        }
                        // else if(data == "ujian"){
                        //     $('#modalDellUjian').modal('show');
                        // }
                    });
                    // ========================= END SHOW MODAL ==================================

                    $('#btncanceldelpem').on('click', function(){
                        $('#btndel-spp').attr('disabled', true);
                        $('#btndel-spp').addClass('btn-disabled');
                        $('#tp-spp-del').empty();
                    });

                    $('#bntdellpem').on('click', function(){
                        let katg = $(this).data('katg');

                        $.ajax({
                            method: "POST",
                            url: "pages/adm-katg/adm-katg-func.php",
                            dataType: "json",
                            data: {
                                "action" : "delpemSpp",
                                "katg" : katg
                            },
                            success: function(msg){
                                // Append Tahun Pelajaran
                                let tp = '';
                                $.each(msg.jnstp, function(key, val){
                                    tp += '<option value="'+val.jns_tp+'">'+val.jns_tp+'</option>';
                                });
                                $('#tp-spp-del').append('<option value="">__ pilih tahun pelajaran __</option>').append(tp);

                                // Action Validasi hapus pembayaran
                                $('#btn-val-del-spp').on('click', function(event){
                                    event.preventDefault();
                                    if($('#bulan-spp-del').val() == '' || $('#tp-spp-del').val() == '' ||  $('#smtr-spp-del').val() == ''){
                                        // CHECK IF FORM NULL
                                        $('#modalDellSpp').modal('hide');
                                        Swal.fire({
                                            title: "warning",
                                            html: "harap lengkapi <strong>bulan</strong>, <strong>tahun pelajaran</strong> dan <strong>semester</strong>",
                                            icon: "warning",
                                            showConfirmButton: true,
                                        }).then((ok) => {
                                            $('#modalDellSpp').modal('show');
                                        });
                                    }else{
                                        $.ajax({
                                            method: "POST",
                                            url: "pages/adm-katg/adm-katg-func.php",
                                            dataType: "json",
                                            data:{
                                                "action" : "delpemSpp",
                                                "jns" : $('#bulan-spp-del').val(),
                                                "tp" : $('#tp-spp-del').val(),
                                                "smtr" : $('#smtr-spp-del').val()
                                            },
                                            success: function(msg2){

                                                if(msg2.status == 'ready'){
                                                    let valdel = '';
                                                    $.each(msg2.jnspem, function(key, val){
                                                        valdel += `
                                                        <div class="d-flex justify-content-between align-items-center" style="padding: 2px;">`+val.jns_pem+`-`+val.jns_ket+` TP.`+val.jns_tp+`</div>`;
                                                    });
                                                    let notice = 'data pembayaran SPP dapat dihapus';
                                                    $('.text-del-spp').empty();
                                                    $('.text-del-spp').html(notice);
                                                    $('.list-show-pem-spp').empty();
                                                    $('.list-show-pem-spp').html(valdel);
                                                    $('#btndel-spp').attr('disabled', false);
                                                    $('#btndel-spp').removeClass('btn-disabled');
                                                    $('.ready-del-spp').css('display', 'contents');
                                                    // $('.tb-del-spp').css('display', 'contents');
                                                }else if(msg2.status == 'notready'){
                                                    let headersppnotready = 'Pembayaran SPP Bulan '+$('#bulan-spp-del').val()+' TP.'+$('#tp-spp-del').val()+' Semester '+$('#smtr-spp-del').val();
                                                    let valdel = '';
                                                    $.each(msg2.jnspem, function(key, val){
                                                        valdel += `
                                                        <p class="d-flex justify-content-between align-items-center" style="padding: 2px;">
                                                            `+val.siswa+` <span class="label label-success">`+val.status+`</span>
                                                        </p>`;
                                                    });
                                                    $('.header-delspp').text(headersppnotready);
                                                    $('.list-pem-spp').append(valdel);
                                                    $('#btndel-spp').attr('disabled', true);
                                                    $('#btndel-spp').addClass('btn-disabled');
                                                    $('.notready-del-spp').css('display', 'contents');

                                                }else if(msg2.status == ''){
                                                    let note = `pembayaran bulan 
                                                                <strong>`+$('#bulan-spp-del').val()+`</strong> 
                                                                tahun pelajaran 
                                                                <strong>`+$('#tp-spp-del').val()+`</strong> 
                                                                semester 
                                                                <strong>`+$('#smtr-spp-del').val()+`</strong> 
                                                                tidak ditemukan
                                                                `;
                                                    $('#modalDellSpp').modal('hide');
                                                    Swal.fire({
                                                        title: "warning",
                                                        html: note,
                                                        icon: "warning",
                                                        showConfirmButton: true,
                                                    }).then((ok) => {
                                                        $('#btndel-spp').attr('disabled', true);
                                                        $('#btndel-spp').addClass('btn-disabled');
                                                        $('#modalDellSpp').modal('show');
                                                    });
                                                }

                                                // ACTION DELETE PEMBAYARAN
                                                $('#btndel-spp').on('click', function(){
                                                    let bulan = $('#bulan-spp-del').val();
                                                    let tp = $('#tp-spp-del').val();
                                                    let smtr = $('#smtr-spp-del').val();
                                                    $('#modalDellSpp').modal('hide');
                                                    Swal.fire({
                                                        title: 'Delete',
                                                        text: 'Ingin hapus data pembayaran spp ?',
                                                        icon: 'question',
                                                        showCancelButton: true,
                                                        confirmButtonText: "yes"
                                                    }).then((result) => {
                                                        if(result.isConfirmed){
                                                            $.ajax({
                                                                method: "POST",
                                                                url: "pages/adm-katg/adm-katg-func.php",
                                                                dataType: "json",
                                                                data: {
                                                                    "action" : "delpemSpp",
                                                                    "trigger" : "true",
                                                                    "bulan" : bulan,
                                                                    "tp" : tp,
                                                                    "smtr" : smtr
                                                                },
                                                                beforeSend: function(send){
                                                                    $('#modalDellSpp').modal('hide');
                                                                },
                                                                success: function(msg2){
                                                                    Swal.fire({
                                                                        title: msg2.statusDel.stsdel,
                                                                        // text: msg.info,
                                                                        html: msg2.statusDel.info + msg2.statusDel.text,
                                                                        icon: msg2.statusDel.stsdel,
                                                                        showConfirmButton: true
                                                                    });
                                                                }
                                                            });
                                                        }else{
                                                            $('#modalDellSpp').modal('show');
                                                        }
                                                    });
                                                });
                                            }
                                        });
                                    }
                                });
                            }
                        });
                    });

                    // ADD PEMBAYARAN UJIAN
                    // Set Global Variable Nominal Pembayaran
                    var nom_umum = '';
                    var nom_tkj = '';
                    var nom_akl = '';
                    var nom_bdp = '';
                    // KATEGORY UMUM
                    $('#ck-pem-umum').change(function(){
                        let form = `
                        <div class="row">
                        <div class="col-lg-8">
                            <input type="number" class="form-control form-control-sm" id="val-ujian-umum" placeholder="nominal pembayaran">
                        </div>
                        <div class="col-lg-4">
                            <select class="custom-select form-control-sm" id="ccl-nominal-pem-umum" style="width: 100%;">
                                <option value="">__cicilan__</option>`;
                            for(let i=1; i <= 10; i++){
                                form += `<option value="`+i+`">`+i+`x Cicilan</option>`;
                            }
                        form += `</select>
                        </div>
                        </div>`;
                        $('.form-prodi').append(form);

                        // Unchecked
                        if(!$('#ck-pem-umum').is(':checked')){
                            $('input#val-ujian-umum').remove();
                            $('select#ccl-nominal-pem-umum').remove();
                        }
                    });

                    // PRODI TKJ
                    $('#ck-pem-tkj').change(function(){
                        let formtkj = `
                        <div class="row">
                        <div class="col-lg-8">
                            <input type="number" class="form-control form-control-sm" id="val-ujian-tkj" placeholder="nominal pembayaran TKJ">
                        </div>
                        <div class="col-lg-4">
                            <select class="custom-select form-control-sm" id="ccl-nominal-pem-tkj" style="width: 100%;">
                                <option value="">__cicilan__</option>`;
                            for(let i=1; i <= 10; i++){
                                formtkj += `<option value="`+i+`">`+i+`x Cicilan</option>`;
                            }
                        formtkj += `</select>
                        </div>
                        </div>`;
                        $('.form-prodi').append(formtkj);

                        // Unchecked
                        if(!$('#ck-pem-tkj').is(':checked')){
                            $('input#val-ujian-tkj').remove();
                            $('select#ccl-nominal-pem-tkj').remove();
                        }
                    });

                    // PRODI AKL
                    $('#ck-pem-akl').change(function(){
                        let formakl = `
                        <div class="row">
                        <div class="col-lg-8">
                            <input type="number" class="form-control form-control-sm" id="val-ujian-akl" placeholder="nominal pembayaran AKL">
                        </div>
                        <div class="col-lg-4">
                            <select class="custom-select form-control-sm" id="ccl-nominal-pem-akl" style="width: 100%;">
                                <option value="">__cicilan__</option>`;
                            for(let i=1; i <= 10; i++){
                                formakl += `<option value="`+i+`">`+i+`x Cicilan</option>`;
                            }
                        formakl += `</select>
                        </div>
                        </div>`;
                        $('.form-prodi').append(formakl);

                        // Unchecked
                        if(!$('#ck-pem-akl').is(':checked')){
                            $('input#val-ujian-akl').remove();
                            $('select#ccl-nominal-pem-akl').remove();
                        }
                    });

                    // PRODI BDP
                    $('#ck-pem-bdp').change(function(){
                        let formbdp = `
                        <div class="row">
                        <div class="col-lg-8">
                            <input type="number" class="form-control form-control-sm" id="val-ujian-bdp" placeholder="nominal pembayaran BDP">
                        </div>
                        <div class="col-lg-4">
                            <select class="custom-select form-control-sm" id="ccl-nominal-pem-bdp" style="width: 100%;">
                                <option value="">__cicilan__</option>`;
                                for(let i=1; i <= 10; i++){
                                    formbdp += `<option value="`+i+`">`+i+`x Cicilan</option>`;
                                }
                        formbdp +=`</select>
                        </div>
                        </div>`;
                        $('.form-prodi').append(formbdp);

                        // Unchecked
                        if(!$('#ck-pem-bdp').is(':checked')){
                            $('input#val-ujian-bdp').remove();
                            $('select#ccl-nominal-pem-bdp').remove();
                        }
                    });

                    $("input:checkbox").change(function(){
                        // PRODI CHECK ISSET
                        if($('#ck-pem-tkj').is(':checked') || $('#ck-pem-akl').is(':checked') || $('#ck-pem-bdp').is(':checked')){
                            $('#ck-pem-umum').attr('disabled', true);

                        }else if(!$('#ck-pem-tkj').is(':checked') || !$('#ck-pem-akl').is(':checked') || !$('#ck-pem-bdp').is(':checked')){
                            $('#ck-pem-umum').attr('disabled', false);
                        }
                        // UMUM CHECK ISSET
                        if($('#ck-pem-umum').is(':checked')){
                            $('#ck-pem-tkj').attr('disabled', true);
                            $('#ck-pem-akl').attr('disabled', true);
                            $('#ck-pem-bdp').attr('disabled', true);

                        }else if(!$('#ck-pem-tkj').is(':checked')){
                            $('#ck-pem-tkj').attr('disabled', false);
                            $('#ck-pem-akl').attr('disabled', false);
                            $('#ck-pem-bdp').attr('disabled', false);
                        }
                    });

                    // BUTTON ADD ACTION
                    $('#btnadd-ujian-pem').on('click', function(e){
                        e.preventDefault();
                        // get data nominal
                        nom_umum += $('#val-ujian-umum').val()+ '-' +$('#ccl-nominal-pem-umum').val();
                        nom_tkj += $('#val-ujian-tkj').val()+ '-' +$('#ccl-nominal-pem-tkj').val();
                        nom_akl += $('#val-ujian-akl').val()+ '-' +$('#ccl-nominal-pem-akl').val();
                        nom_bdp += $('#val-ujian-bdp').val()+ '-' +$('#ccl-nominal-pem-bdp').val();

                        $.ajax({
                            method: "POST",
                            url:"pages/adm-katg/adm-katg-func.php",
                            dataType: "json",
                            data: {
                                "action" : "addpemUjian",
                                "umum" : nom_umum,
                                "tkj" : nom_tkj,
                                "akl" : nom_akl,
                                "bdp" : nom_bdp,
                                "ujian-pem" : $('#ujian-pem').val(),
                                "kelas-pem-ujian" : $('#kls-ujian-pem').val(),
                                "tp-pem-ujian" : $('#tp-ujian-pem').val(),
                                "smtr-pem-ujian" : $('#smtr-ujian-pem').val()
                            },
                            beforeSend: function(send){
                                $('#modalAddUjian').modal('hide');
                            },
                            success: function(msg){
                                Swal.fire({
                                    title: msg.status,
                                    text: msg.info,
                                    html: msg.info + msg.text,
                                    icon: msg.status,
                                    showConfirmButton: true
                                });
                            }
                        });
                        
                    });

                    $('#table-jns').on('click', '#dell-ujian-pers', function(){
                        $('.notready-del').css('display', 'none');
                        $('.ready-del').css('display', 'none');
                        $('#btndell-ujian-pem').attr('disabled', true);
                        $('#btndell-ujian-pem').addClass('btn-disabled');

                        let id_pem = $(this).data('id');
                        $.ajax({
                            method: "POST",
                            url: "pages/adm-katg/adm-katg-func.php",
                            dataType: "json",
                            data: {
                                "action" : "dellpemUjian",
                                "id_pem" : id_pem
                            },
                            success: function(msgdel){
                                if(msgdel.status == 'not-ready'){
                                    $('.list-pem-ujian').empty();
                                    let show = '';
                                    $.each(msgdel.data, function(key, val){
                                        show += `
                                        <p class="d-flex justify-content-between align-items-center" style="padding: 2px;">
                                            `+val.nama+` <span class="label label-success">`+val.status+`</span>
                                        </p>`;
                                    });
                                    $('.list-pem-ujian').append(show);
                                    $('.notready-del').css('display', 'contents');

                                }else if(msgdel.status == 'ready'){
                                    $('.ready-del').css('display', 'contents');
                                    $('.text-del').text(msgdel.info);
                                    $('#btndell-ujian-pem').attr('disabled', false);
                                    $('#btndell-ujian-pem').removeClass('btn-disabled');
                                }
                            }
                        });
                        $('#modalDellUjian').modal("show");

                        // Process Delete
                        $('#btndell-ujian-pem').on('click', function(){
                            $('#modalDellUjian').modal("hide");
                            Swal.fire({
                                title:"question",
                                text: "ingin hapus data pembayaran ujian ?",
                                icon: "question",
                                confirmButtonText: "hapus",
                                cancelButtonText: "batal",
                                showConfirmButton: true,
                                showCancelButton: true,

                            }).then((result) => {
                                if(result.isConfirmed){
                                    $.ajax({
                                        method: "POST",
                                        url: "pages/adm-katg/adm-katg-func.php",
                                        dataType: "json",
                                        data: {
                                            "triger" : "true",
                                            "action" : "dellpemUjian",
                                            "idn" : id_pem
                                        },
                                        success: function(stsdel){
                                            $('#modalDellUjian').modal("hide");
                                            Swal.fire({
                                                title:stsdel.status,
                                                text: stsdel.info,
                                                html: stsdel.info + stsdel.text,
                                                icon: stsdel.status,
                                                showConfirmButton: true,

                                            });
                                        }
                                    });
                                }
                            });
                        });
                    });

                    // ACTION PEMBAYARAN KEGIATAN
                    $('#btn-cancel-kegiatan').on('click', function(){
                        $('#formAddKegiatan')[0].reset();
                    })
                    // ADD KEGIATAN
                    $('#btn-add-pem-kegiatan').on('click', function(e){
                        e.preventDefault();

                        $.ajax({
                            method: 'POST',
                            url: 'pages/adm-katg/adm-katg-func.php',
                            data: "action=addpemKegiatan&"+ $('#formAddKegiatan').serialize(),
                            dataType: 'json',
                            beforeSend: function(send){
                                $('#modalAddKegiatan').modal('hide');
                            },
                            success: function(msgK){
            
                                if(msgK.status == 'success'){
                                    $('#formAddKegiatan')[0].reset();
                                    Swal.fire({
                                        title:msgK.status,
                                        text: msgK.info,
                                        html: msgK.info + msgK.text,
                                        icon: msgK.status,
                                        showConfirmButton: true,
                                    });
                                }else if(msgK.status == 'warning'){
                                    Swal.fire({
                                        title: msgK.status,
                                        text: msgK.info,
                                        // html: stsdel.info + stsdel.text,
                                        icon: msgK.status,
                                        showConfirmButton: true,
                                    }).then((ok) => {
                                        $('#modalAddKegiatan').modal('show');
                                    });
                                }
                            }
                        })
                    });

                    // DELL KEGIATAN
                    $('#table-jns').on('click', '#dell-kegiatan-pers', function(){
                        let idkegiatan = $(this).data('id');
                        let pemkegiatan = $(this).data('pem');

                        $.ajax({
                            method: 'POST',
                            url: 'pages/adm-katg/adm-katg-func.php',
                            dataType: 'json',
                            data: {
                                "action" : "delpemKegiatan",
                                "idkegiatan" : idkegiatan
                            },
                            success: function(msgdel){
                                $('.header-delkegiatan').empty();
                                
                                if(msgdel.status == 'not-ready'){
                                    $('.header-delkegiatan').text(pemkegiatan);
                                    $('.notready-del').css('display', 'contents');
                                    $('.ready-del').css('display', 'none');
                                    $('.list-pem-kegiatan').empty();
                                    let show = '';
                                    $.each(msgdel.data, function(key, val){
                                        show += `
                                        <p class="d-flex justify-content-between align-items-center" style="padding: 2px;">
                                            `+val.siswa+` <span class="label label-success">`+val.status+`</span>
                                        </p>`;
                                    });
                                    $('#btndell-kegiatan-pem').attr('disabled', true);
                                    $('#btndell-kegiatan-pem').addClass('btn-disabled');
                                    $('.list-pem-kegiatan').append(show);
                                }else if(msgdel.status == 'ready'){
                                    $('.notready-del').css('display', 'none');
                                    $('.ready-del').css('display', 'contents');
                                    $('#btndell-kegiatan-pem').attr('disabled', false);
                                    $('#btndell-kegiatan-pem').removeClass('btn-disabled');
                                    $('.text-del').html(msgdel.info);
                                }
                            }
                        });
                        $('#modalDellKegiatan').modal('show');

                        $('#btndell-kegiatan-pem').on('click', function(e){
                            e.preventDefault();
                            $('#modalDellKegiatan').modal('hide');
                            Swal.fire({
                                title:"question",
                                text: "ingin hapus data pembayaran kegiatan ?",
                                icon: "question",
                                confirmButtonText: "hapus",
                                cancelButtonText: "batal",
                                showConfirmButton: true,
                                showCancelButton: true,

                            }).then((result) => {
                                if(result.isConfirmed){
                                    $.ajax({
                                        method: 'POST',
                                        url: "pages/adm-katg/adm-katg-func.php",
                                        dataType: "json",
                                        data: {
                                            "action" : "delpemKegiatan",
                                            "triger" : "true",
                                            "iddelkeg" : idkegiatan
                                        },
                                        success: function(stsdel){
                                            if(stsdel.status == 'success'){
                                                Swal.fire({
                                                    title:stsdel.status,
                                                    text: stsdel.info,
                                                    html: stsdel.info + stsdel.text,
                                                    icon: stsdel.status,
                                                    showConfirmButton: true,
                                                });
                                            }else{
                                                Swal.fire({
                                                    title:stsdel.status,
                                                    text: stsdel.info,
                                                    // html: stsdel.info + stsdel.text,
                                                    icon: stsdel.status,
                                                    showConfirmButton: true,
                                                });
                                            }
                                        }
                                    });
                                }
                            });
                        });
                    })
                }
            });
        });
    });



</script>