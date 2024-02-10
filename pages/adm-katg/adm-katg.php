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
                                        <!-- <td class="text-center">No.</td> -->
                                        <td class="text-center">Kategori</td>
                                        <td class="text-center">Action</td>
                                    </tr>
                                </thead>
                                <tbody class="tab-show-katg">
                                    <!-- Data Here -->
                                </tbody>
                            </table>
                            <small style="font-size: 11px; color:red; font-style: italic;"> *) pilih salah satu kategori</small>
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
        $('#loading').show();

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

                    // kategori += '<tr><td>'+val.num+'</td><td>'+val.katg+'</td><td>'+val.action+'</td></tr>';
                    let actionButton = '<span id="btnKatg" data-idkatg="'+val.katg_pem+'" class="label btn-primary">show <i class="fas fa-eye"></i></span>';
                    kategori += '<tr><td><span class="label label-success"><i class="fas fa-cube"></i> &nbsp;'+val.katg_pem.toUpperCase()+'</span></td><td class="text-center">'+actionButton+'</td></tr>';
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
                $('#loading').hide();
            }
            
        });
    
        
        // ACTION BUTTON CATEGORY
        $('#table-katg').on('click', '#btnKatg', function(){
            $('#loading').show();

            $('.notice-pem').css('display', 'none');
            $('.tab-show-pem').empty();
            $('.tab-show-pem').load("pages/adm-katg/adm-katg-pem.php");

            // Get kategori
            var kategoriPem = $(this).data("idkatg");
            loadDataMasterPem(kategoriPem);

        });
    });

    // FUNC===LOAD MASTER DATA JENIS PEMBAYARAN
    function loadDataMasterPem(kategori){
        $.ajax({
            method: "POST",
            url: "pages/adm-katg/adm-katg-load.php",
            dataType: "json",
            data: {
                "type" : "groupPem",
                "idkatg" : kategori
            },
            success: function(msg){
                $('.header-pem').html(kategori);
                $('.button-spp').append('<button id="bntaddpem" data-katg="'+kategori+'" class="btn label btn-primary"><i class="fas fa-plus"></i></button>');
                if(kategori == 'ujian' || kategori == 'kegiatan'){
                    $('.button-spp').append('<button id="bntdellpem" data-katg="'+kategori+'" class="btn label btn-primary" style="display: none;"><i class="fas fa-trash"></i></button>');
                }else{
                    $('.button-spp').append('<button id="bntdellpem" data-katg="'+kategori+'" class="btn label btn-primary"><i class="fas fa-trash"></i></button>');
                }
                
                if(msg.status == "success"){

                    $(document).ready(function(){

                        let datapem = '';
                        $.each(msg.data, function(key, val){
                            let button = '<span id="dell-ujian-pers" data-id="'+val.id+'" data-pem="'+val.pem+'" class="text-danger" style="font-size: 12px"><i class="fas fa-trash"></i></span>';
                            let buttonKegiatan = '<span id="dell-kegiatan-pers" data-id="'+val.id+'" data-pem="'+val.pem+'" class="text-danger" style="font-size: 12px"><i class="fas fa-trash"></i></span>';
                            datapem += `
                            <tr>
                                <td>`+val.num+`</td>`;
                                if(kategori == 'ujian'){
                                    datapem += `<td>`+button+` `+val.pem+`</td>`;
                                }else if(kategori == 'kegiatan'){
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
                        $('#loading').hide();

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
                    $('#loading').hide();
                    Swal.fire({ 
                        title: msg.status,
                        text: msg.info,
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }


    // FUNC===ADD PEMBAYARAN SPP
    function AddPembayaranSpp(valueData){
        //let dataInsPemSpp = JSON.stringify(valueData);
        $.ajax({
            method: "POST",
            url: "pages/adm-katg/adm-katg-func.php",
            dataType: "json",
            // data: "action=addpemSpp&" + valueData,
            data : {
                "action" : "addpemSpp",
                "bulan" : valueData["bulan"],
                "valtkj" : valueData["valtkj"],
                "valakl" : valueData["valakl"],
                "valbdp" : valueData["valbdp"],
                "tp" : valueData["tp"],
                "smtr" : valueData["smtr"]
            },
            beforeSend: function(data){
                $('#modalAddSpp').modal('hide');
            },
            success: function(msg){
                $('#loading').hide();
                Swal.fire({
                    title: msg.status,
                    // text: msg.info,
                    html: msg.info + msg.text,
                    icon: msg.status,
                    showConfirmButton: true
                }).then((ok) => {
                    $('.notice-pem').css('display', 'none');
                    $('.tab-show-pem').empty();
                    $('.tab-show-pem').load("pages/adm-katg/adm-katg-pem.php");
                    loadDataMasterPem(msg.katPem);
                });
            },
            error: function(msgError){
                Swal.fire({
                    title: msgError.status,
                    // text: msg.info,
                    html: msgError.info + msgError.text,
                    icon: msgError.status,
                    showConfirmButton: true
                }).then((ok) => {
                    $('#loading').hide();
                    $('.notice-pem').css('display', 'none');
                    $('.tab-show-pem').empty();
                    $('.tab-show-pem').load("pages/adm-katg/adm-katg-pem.php");
                    loadDataMasterPem(msgError.katPem);
                });
            }
        });
    }

    // FUNC===DELETE PEMBAYARAN SPP
    function DeletePembayaranSpp(dataDelPem){
        $.ajax({
            method: "POST",
            url: "pages/adm-katg/adm-katg-func.php",
            dataType: "json",
            data: {
                "action" : "delpemSpp",
                "trigger" : "true",
                "bulan" : dataDelPem["bulan"],
                "tp" : dataDelPem["tp"],
                "smtr" : dataDelPem["smtr"]
            },
            beforeSend: function(send){
                $('#modalDellSpp').modal('hide');
            },
            success: function(msg2){
                $('#loading').hide();
                Swal.fire({
                    title: msg2.statusDel.stsdel,
                    // text: msg.info,
                    html: msg2.statusDel.info + msg2.statusDel.text,
                    icon: msg2.statusDel.stsdel,
                    showConfirmButton: true
                }).then((ok) => {
                    $('.notice-pem').css('display', 'none');
                    $('.tab-show-pem').empty();
                    $('.tab-show-pem').load("pages/adm-katg/adm-katg-pem.php");
                    loadDataMasterPem(msg2.statusDel.katPem);
                });
            }
        });
    }

    // FUNC===ADD PEMBAYARAN UJIAN
    function AddPembayaranUjian(dataMapping){
        $.ajax({
            method: "POST",
            url:"pages/adm-katg/adm-katg-func.php",
            dataType: "json",
            data: {
                "action" : "addpemUjian",
                "umum" : dataMapping["pemUmum"],
                "tkj" : dataMapping["pemTkj"],
                "akl" : dataMapping["pemAkl"],
                "bdp" : dataMapping["pemBdp"],
                "ujian-pem" : dataMapping["pembayaran"],
                "kelas-pem-ujian" : dataMapping["kelas"],
                "tp-pem-ujian" : dataMapping["tp"],
                "smtr-pem-ujian" : dataMapping["smtr"]
            },
            beforeSend: function(send){
                $('#modalAddUjian').modal('hide');
            },
            success: function(msg){
                $('#loading').hide();
                Swal.fire({
                    title: msg.status,
                    text: msg.info,
                    html: msg.info + msg.text,
                    icon: msg.status,
                    showConfirmButton: true
                }).then((ok) => {
                    $('.notice-pem').css('display', 'none');
                    $('.tab-show-pem').empty();
                    $('.tab-show-pem').load("pages/adm-katg/adm-katg-pem.php");
                    loadDataMasterPem(msg.katPem);
                });
            }
        });
    }

    // FUNC===DELETE PEMBAYARAN UJIAN
    function DeletePembayaranUjian(idPem){
        $.ajax({
            method: "POST",
            url: "pages/adm-katg/adm-katg-func.php",
            dataType: "json",
            data: {
                "triger" : "true",
                "action" : "dellpemUjian",
                "idn" : idPem
            },
            success: function(stsdel){
                // $('#modalDellUjian').modal("hide");
                $('#loading').hide();
                Swal.fire({
                    title:stsdel.status,
                    text: stsdel.info,
                    html: stsdel.info + stsdel.text,
                    icon: stsdel.status,
                    showConfirmButton: true,
                }).then((ok) => {
                    $('.notice-pem').css('display', 'none');
                    $('.tab-show-pem').empty();
                    $('.tab-show-pem').load("pages/adm-katg/adm-katg-pem.php");
                    loadDataMasterPem(stsdel.katPem);
                });
            }
        });
    }

    // FUNC===ADD PEMBAYARAN KEGIATAN
    function AddPembayaranKegiatan(serializeData) {
        $.ajax({
            method: 'POST',
            url: 'pages/adm-katg/adm-katg-func.php',
            data: "action=addpemKegiatan&"+ serializeData,
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
                    }).then((ok) => {
                        $('.notice-pem').css('display', 'none');
                        $('.tab-show-pem').empty();
                        $('.tab-show-pem').load("pages/adm-katg/adm-katg-pem.php");
                        loadDataMasterPem(msgK.katPem);
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
        });
    }

    // FUNC===DELETE PEMBAYARAN KEGIATAN
    function DeletePembayaranKegiatan(idkegiatan){
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
                    $('#loading').hide();
                    Swal.fire({
                        title:stsdel.status,
                        text: stsdel.info,
                        html: stsdel.info + stsdel.text,
                        icon: stsdel.status,
                        showConfirmButton: true,
                    }).then((ok) => {
                        $('.notice-pem').css('display', 'none');
                        $('.tab-show-pem').empty();
                        $('.tab-show-pem').load("pages/adm-katg/adm-katg-pem.php");
                        loadDataMasterPem(stsdel.katPem);
                    });

                }else{
                    $('#loading').hide();
                    Swal.fire({
                        title:stsdel.status,
                        text: stsdel.info,
                        // html: stsdel.info + stsdel.text,
                        icon: stsdel.status,
                        showConfirmButton: true,
                    }).then((ok) => {
                        $('.notice-pem').css('display', 'none');
                        $('.tab-show-pem').empty();
                        $('.tab-show-pem').load("pages/adm-katg/adm-katg-pem.php");
                        loadDataMasterPem(stsdel.katPem);
                    });
                }
            }
        });
    }

</script>