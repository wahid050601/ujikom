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
                                    <input type="date" name="tgl-awal" id="tgl-awal" class="form-control">
                                </div>
                                <div class="text-center">S/D</div><br>
                                <div class="form-group">
                                    <input type="date" name="tgl-akhir" id="tgl-akhir" class="form-control">
                                </div>
                                <button type="button" id="proc-rekap" class="btn btn-primary btn-mini"><i class="fas fa-check"></i> &nbsp; proses</button>
                                <!-- <div class="form-group">
                                    <select name="kat-laporan" id="kat-laporan" class="custom-select form-control-sm" style="width: 100%;">
                                        <option value="">_pilih kategori laporan_</option>
                                        <option value="triwulan">Triwulan (3 Bulan)</option>
                                        <option value="semester">Semester (6 Bulan)</option>
                                        <option value="custom">Custom</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="set-kat-pembayaran">
                                    
                                </div> -->
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-file-pdf"></i> PDF</button>
                                <hr>
                                <div class="note-laporan text-center h5 mt-3">
                                    <i class="fas fa-exclamation-circle"></i>&nbsp; silahkan config laporan terlebih dahulu
                                </div>
                                
                                <div class="show-table" style="display: none;"></div>
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

        let formSet = `
        <div class="form-group">
            <select name="sel-tahun" id="sel-tahun" class="custom-select form-control-sm" style="width: 100%;">
                <option value="">_pilih tahun_</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
        </div>
        <div class="form-group">
        <select name="sel-bulan" id="sel-bulan" class="custom-select form-control-sm" style="width: 100%;">
        <option value="">_pilih bulan_</option>`;

        $.each(bulan, function(id,val){
            formSet += '<option value"'+ val +'">'+ val +'</option>';
        });
                
        formSet += `
        </select>
        </div>
        <div class="form-group"><label>S/D</label></div>
        <div class="form-group">`;

        if(valKat == 'custom'){
            formSet += `<select name="sel-bulan-cs" id="sel-bulan-cs" class="custom-select form-control-sm" style="width: 100%;" ><option value="">_pilih bulan_</option>`;
            $.each(bulan, function(id,val){
                formSet += '<option value="'+ val +'">'+ val +'</option>'
            });
            formSet += `</select>`;
        }else{
            formSet += `<input type="text" readonly class="form-control form-control-sm" value="maret">`;
        }
        formSet += `
        </div>
        <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-cog"></i>proses laporan</button>`;

        $('.set-kat-pembayaran').html(formSet);
    });


    

    $('#proc-rekap').on('click', function(){
        let tglAwal = $('#tgl-awal').val();
        let tglAkhir = $('#tgl-akhir').val();
        if(tglAwal == '' || tglAkhir == ''){
            Swal.fire({
                title: 'warning',
                text: 'lengkapi form tanggal terlebih dahulu',
                icon: 'warning'
            });
        }else{
            $.ajax({
                url: 'pages/rekapitulasi/rekapitulasi-keuangan-load.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    'action': 'getReport',
                    'tgl_awal': tglAwal,
                    'tgl_akhir': tglAkhir
                },
                success: function(data){
                    if(data.status == 'success'){

                        let tableSet = `
                        <table class="table table-bordered table-sm" id="table-laporan" style="width: 100%;">
                        <thead class="bg-primary">
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>`;

                        $.each(data.rekapitulasi, function(id,val) {
                            tableSet += `
                            <tr>
                                <td>${val.no}</td>
                                <td>${val.tanggal}</td>
                                <td>${val.keterangan}</td>
                                <td>${val.pemasukan}</td>
                                <td>${val.pengeluaran}</td>
                                <td>${val.saldo}</td>
                            </tr>`;
                        });            
                        tableSet += `
                        </tbody>
                        </table>`;
                        $('.show-table').html(tableSet);

                        $('#table-laporan').DataTable({
                            scrollX: true,
                        });


                        // Rekap ALL
                        let rekapTable = '';
                        $.each(data.rekap_all, function(idx,valx){
                            rekapTable += `<tr><th>${valx.keterangan}</th><th> &nbsp;:&nbsp; </th><td>${valx.value}</td></tr>`;
                        });
                        $('.tbl-rekap-all').html(rekapTable);

                        $('.note-laporan').hide();
                        $('.show-table').css('display', 'contents');
                        $('.show-rekap').css('display', 'contents');

                        // $('.total-peng')
                        // $('.saldo-akhir')

                    }
                }
            });
        }
    })

</script>