<div class="card">
    <div class="card-block show-page">
        <!-- Header -->
        <h5><i class="fas fa-book"></i> Rekapitulasi Keuangan</h5>
        <hr>

        <!-- Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-file"></i> Seting Laporan
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <select name="kat-laporan" id="kat-laporan" class="custom-select form-control-sm" style="width: 100%;">
                                        <option value="">_pilih kategori laporan_</option>
                                        <option value="triwulan">Laporan Triwulan (3 Bulan)</option>
                                        <option value="semester">Laporan Semester (6 Bulan)</option>
                                        <option value="custom">Laporan Custom</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="set-kat-pembayaran">
                                    <div class="years-set"></div>
                                
                                    <div class="triwulan-report" style="display: none;">
                                        <div class="form-group">
                                            <select name="kat-laporan-tw" id="kat-laporan-tw" class="custom-select form-control-sm" style="width: 100%;">
                                                <option value="">_pilih laporan_</option>
                                                <option value="tw1">Laporan Triwulan 1 (Januari - Maret)</option>
                                                <option value="tw2">Laporan Triwulan 2 (April - Juni)</option>
                                                <option value="tw3">Laporan Triwulan 3 (Juli - september)</option>
                                                <option value="tw4">Laporan Triwulan 4 (Oktober - Desember)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="semester-report" style="display: none;">
                                        <div class="form-group">
                                            <select name="kat-laporan-smt" id="kat-laporan-smt" class="custom-select form-control-sm" style="width: 100%;">
                                                <option value="">_pilih laporan_</option>
                                                <option value="smt1">Laporan Semester 1 (Januari - Juni)</option>
                                                <option value="smt2">Laporan Semester 2 (Juli - Desember)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="custom-report" style="display: none;">
                                        <div class="form-group">
                                            <input type="date" name="tgl-awal" id="tgl-awal" class="form-control">
                                        </div>
                                        <div class="text-center">S/D</div><br>
                                        <div class="form-group">
                                            <input type="date" name="tgl-akhir" id="tgl-akhir" class="form-control">
                                        </div>
                                    </div>
                                    
                                </div>
                                <button type="button" id="proc-rekap" class="btn btn-primary btn-mini"><i class="fas fa-check"></i> &nbsp; proses</button> 
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <!-- <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-file-pdf"></i> PDF</button>
                                <hr> -->
                                <div class="note-laporan text-center h5 mt-3">
                                    <i class="fas fa-exclamation-circle"></i>&nbsp; silahkan config laporan terlebih dahulu
                                </div>
                                
                                <div class="show-table"></div>
                                <div class="show-rekap" style="display: none;">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <table class="tbl-rekap-all">

                                            </table>
                                        </li>
                                    </ul>
                                </div>

                                <!-- <div class="text-center">
                                <i class="fas fa-exclamation-circle"></i> Silahkan konfigurasi laporan terlebih dahulu
                                </div> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $('#loading').hide();

    // Data Bulan
    var bulan = [
        "januari",
        "februari",
        "maret",
        "april",
        "mei",
        "juni",
        "juli",
        "agustus",
        "september",
        "oktober",
        "november",
        "desember"
    ];

    // Set Kategori Laporan
    $('#kat-laporan').on('change', function(){
        let valKat = $(this).val();

        $('.triwulan-report').css('display', 'none');
        $('.semester-report').css('display', 'none');
        $('.custom-report').css('display', 'none');

        if(valKat != ''){
            $('#loading').show();
            
            if(valKat != 'custom'){
                $.ajax({
                    method: 'post',
                    url: 'pages/rekapitulasi/rekapitulasi-keuangan-load.php',
                    dataType: 'json',
                    data: {'action': 'getYears'},
                    success: function(scs) {
                        let setYears = `
                        <div class="form-group">
                        <select name="year-report" id="year-report" class="custom-select form-control-sm" style="width: 100%;">
                        <option value="">_pilih tahun_</option>`;
                        $.each(scs.ydata, function(id,val){
                            setYears += `<option value="${val.tahun}">${val.tahun}</option>`;
                        });
                        setYears += `
                        </div>
                        </select>`;
                        $('.years-set').html(setYears);
                        $('#loading').hide();
                    }
                });
            }
            

            if(valKat == 'triwulan'){
                $('.triwulan-report').css('display', 'contents');
                
            }else if(valKat == 'semester') {
                $('.semester-report').css('display', 'contents');
                
            }else if(valKat == 'custom'){
                $('.years-set').html(null);
                $('.custom-report').css('display', 'contents');
                $('#loading').hide();
            }
        }else{
            $('.years-set').html(null);
            $('.triwulan-report').html(null);
            $('.semester-report').html(null);
            $('.custom-report').html(null);
        }

       
    });


    // Process Laporan Keuangan
    $('#proc-rekap').on('click', function(){
        let katLaporan = $('#kat-laporan').val();
        if(katLaporan == ''){
            Swal.fire({
                title: 'warning',
                text: 'Silahkan pilih kategori laporan .. !',
                icon: 'warning'
            });
        }else{

            let datajson = null;
            if(katLaporan == 'triwulan'){
                let tahun = $('#year-report').val();
                let report = $('#kat-laporan-tw').val();

                if(tahun == '' || report == ''){
                    Swal.fire({
                        title: 'warning',
                        text: 'Mohon lengkapi form laporan .. !',
                        icon: 'warning'
                    });
                }else{

                    if(report == 'tw1'){
                        datajson = {
                            tgl_awal: tahun + '-01-01',
                            tgl_akhir: tahun + '-03-31',
                        }
                    }else if(report == 'tw2'){
                        datajson = {
                            tgl_awal: tahun + '-04-01',
                            tgl_akhir: tahun + '-06-30',
                        }
                    }else if(report == 'tw3'){
                        datajson = {
                            tgl_awal: tahun + '-07-01',
                            tgl_akhir: tahun + '-09-30',
                        }
                    }else if(report == 'tw4'){
                        datajson = {
                            tgl_awal: tahun + '-10-01',
                            tgl_akhir: tahun + '-12-31',
                        }
                    }
                }
            }else if(katLaporan == 'semester'){
                let tahun = $('#year-report').val();
                let report = $('#kat-laporan-smt').val();

                if(tahun == '' || report == ''){
                    Swal.fire({
                        title: 'warning',
                        text: 'Mohon lengkapi form laporan .. !',
                        icon: 'warning'
                    });
                }else{

                    if(report == 'smt1'){
                        datajson = {
                            tgl_awal: tahun + '-01-01',
                            tgl_akhir: tahun + '-06-30',
                        }
                    }else if(report == 'smt2'){
                        datajson = {
                            tgl_awal: tahun + '-07-01',
                            tgl_akhir: tahun + '-12-31',
                        }
                    }
                }
            }else{
                let tgawal = $('#tgl-awal').val();
                let tgakhir = $('#tgl-akhir').val();
                
                if(tgawal == '' || tgakhir == ''){
                    Swal.fire({
                        title: 'warning',
                        text: 'Mohon lengkapi form laporan .. !',
                        icon: 'warning'
                    });
                }else{
                    datajson = {
                        tgl_awal: tgawal,
                        tgl_akhir: tgakhir,
                    }
                }
            }

            if(datajson == null){
                Swal.fire({
                    title: 'warning',
                    text: 'Mohon lengkapi form laporan .. !',
                    icon: 'warning'
                });
            }else{
                processLaporan(JSON.stringify(datajson));
            }
        }
    })


    // ========================================= FUNCTION ======================================
    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', { 
            style: 'currency', 
            currency: 'IDR' 
        }).format(number);
    }


    function processLaporan(dataJson){
        $('#loading').show();
        $('.show-table').html(null);
        let dataSend = JSON.parse(dataJson);
        dataSend.action = 'getReport';
       
        $.ajax({
            url: 'pages/rekapitulasi/rekapitulasi-keuangan-load.php',
            method: 'POST',
            dataType: 'json',
            data: dataSend,
            success: function(data){

                if(data.status == 'success'){

                    let tableSet = `
                    <table class="table table-bordered table-sm" id="table-laporan">
                    <thead class="bg-primary">
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                        </tr>
                    </thead>
                    <tbody>`;

                    // <th>Saldo</th>

                    $.each(data.rekapitulasi, function(id,val) {
                        tableSet += `
                        <tr>
                            <th>${val.no}</th>
                            <td>${val.tanggal}</td>
                            <td>${val.keterangan}</td>
                            <td>${formatRupiah(val.pemasukan)}</td>
                            <td>${formatRupiah(val.pengeluaran)}</td>
                        </tr>`;
                    });         
                    // <td>${val.saldo}</td>   
                    tableSet += `
                    </tbody>
                    </table>`;
                    $('.show-table').html(tableSet);

                    $('#table-laporan').DataTable({
                        scrollX: true,
                        autoWidth: false
                    });


                    // Rekap ALL
                    let rekapTable = '';
                    $.each(data.rekap_all, function(idx,valx){
                        rekapTable += `<tr><th>${valx.keterangan}</th><th> &nbsp;:&nbsp; </th><td>${formatRupiah(valx.value)}</td></tr>`;
                    });
                    $('.tbl-rekap-all').html(rekapTable);

                    $('.note-laporan').hide();
                    $('.show-table').css('display', 'contents');
                    $('.show-rekap').css('display', 'contents');

                    $('#loading').hide();
                }else{
                    Swal.fire({
                        title: data.status,
                        text: data.info,
                        icon: data.status
                    });
                }
            }
        });
    }

</script>