<style>
    .cur-day-list {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    
    .bold {
        font-weight: 800;
    }

    .list-realtime-pemasukan {
        max-height: 150px;
        overflow: auto;
    }
</style>

<div class="card">
    <div class="card-block show-page">
        <!-- Header -->
        <span class="h5"><i class="fas fa-file-download"></i>&nbsp; Catatan Pemasukan</span>
        <hr>
        <!-- Header End -->

        <!-- Body -->
        <!-- HEAD -->
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item bold">Pemasukan (Current Day)</li>
                    <li class="list-group-item">
                        <div class="list-realtime-pemasukan">
                            <!-- NRT -->
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item bold">Filter Pemasukan</li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <form class="form-inline">
                                <div class="input-group mb-2 mr-sm-2">    
                                    <input type="date" class="form-control" id="fperiod">
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <label for="" style="font-size: 20px;"> s.d </label>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="date" class="form-control" id="lperiod">
                                </div>
                                <button type="button" class="btn btn-primary btn-sm mb-2" id="filer-button"><i class="fas fa-random"></i> Filter</button> &nbsp; 
                                <button type="button" class="btn btn-primary btn-sm mb-2" id="reset-button"><i class="fas fa-sync-alt"></i> Reset</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- TABLE -->
        <br>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-group">
                    <li class="list-group-item app-table-pemasukan">
                        <!-- Data table pemasukan here -->
                    </li>
                </ul>
            </div>
        </div>
        <!-- Body End -->
        
    </div>
</div>




<script>
    // $(document).ready(function(){
        $('#loading').show();
        LoadListPemasukan();

        setInterval(function(){
            // alert("RELOAD 30 DETIK");
            $('.list-realtime-pemasukan').empty();
            $('.list-realtime-pemasukan').append('<i class="fas fa-spinner fa-pulse"></i>');
            listNRTpemasukan();

        }, 30000);
        
    // });

    // Filter
    $('#filer-button').on('click', function(){
        if($('#fperiod').val() != '' && $('#lperiod').val() != ''){
            $('#loading').show();
            let fprd = $('#fperiod').val();
            let lprd = $('#lperiod').val();
            // console.log(fprd+'------'+lprd);
            LoadListPemasukan(fprd,lprd);

        }else{
            Swal.fire({
                title: 'Warning!',
                text: 'Mohon lengkapi form isian',
                icon: 'warning'
            });
        }
    });

    // Reset
    $('#reset-button').on('click', function(){
        $('#loading').show();
        $('#fperiod').val('');
        $('#lperiod').val('');
        LoadListPemasukan();
    });


    // ===============================================================================================================
    function LoadListPemasukan(Fperiode = null, Lperiode = null){
        $.ajax({
            method: 'POST',
            url: 'pages/keuangan/pemasukan-load-data.php',
            dataType: 'json',
            data: {
                "action" : "loadDataPemasukan",
                "fperiode" : Fperiode,
                "lperiode" : Lperiode
            },
            success: function(list){

                let tableData = `
                <table class="table table-bordered table-xs table-list-pemasukan">
                    <thead class="bg-primary">
                        <tr>
                            <th>Tanggal</th>
                            <th>ID Pembayaran</th>
                            <th>Kategori</th>
                            <th>Jenis Pembayaran</th>
                            <th>Nama Siswa</th>
                            <th>Jml.Pembayaran</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="list-data-pemasukan">`;
                $.each(list.dataPem, function(id,val){
                    let kategori = '';
                    if(val.kat_pem == 'spp'){kategori += '<span class="label label-primary">spp</span>'}else if(val.kat_pem == 'ujian'){kategori += '<span class="label label-success">ujian</span>'}else{kategori += '<span class="label label-danger">kegiatan</span>'}
                    tableData +=`
                    <tr>
                        <td>${val.tanggal_pem}</td>
                        <td>${val.id_pem}</td>
                        <td>${kategori}</td>
                        <td>${val.jns_pem}</td>
                        <td>${val.nama_siswa}</td>
                        <td>Rp. ${val.nom_pem}</td>
                        <td>${val.status}</td>
                    </tr>`;
                });
                tableData += `
                    </tbody>
                </table>`;
                $('.app-table-pemasukan').empty();
                $('.app-table-pemasukan').append(tableData);
                // $('.list-data-pemasukan').empty();
                // $('.list-data-pemasukan').append(tableData);
                // $('.table-list-pemasukan').destroy();
                $('.table-list-pemasukan').DataTable({
                    processing: true,
                    serverside: true,
                    selected: true,
                    scrollX: true,
                    destroy: true
                });


                // NRT
                let listNRT = '';
                $.each(list.nrt, function(idx,valx){
                    listNRT += `
                    <div class="cur-day-list">
                        <i class="fas fa-th-large"></i> 
                        <span>${valx.nama_siswa}</span>
                        <span class="label label-primary">${valx.kat_pem}</span>
                        <span class="label label-primary"><i class="far fa-clock"></i> ${valx.tanggal_pem.split(' ')[1]}</span>
                    </div>`;
                });
                $('.list-realtime-pemasukan').empty();
                $('.list-realtime-pemasukan').append(listNRT);

                $('#loading').hide();
            },
            error: function(error){
                alert(error.info);
            }
        });
    }

    function listNRTpemasukan(){
        $.ajax({
            method: 'POST',
            url: 'pages/keuangan/pemasukan-load-data.php',
            dataType: 'json',
            data: {
                "action" : "loadDataPemasukanNRT"
            },
            success: function(nrt){
                let listNRTdata = '';
                $.each(nrt.nrt, function(idx,valx){
                    listNRTdata += `
                    <div class="cur-day-list">
                        <i class="fas fa-th-large"></i> 
                        <span>${valx.nama_siswa}</span>
                        <span class="label label-primary">${valx.kat_pem}</span>
                        <span class="label label-primary"><i class="far fa-clock"></i> ${valx.tanggal_pem.split(' ')[1]}</span>
                    </div>`;
                });
                $('.list-realtime-pemasukan').empty();
                $('.list-realtime-pemasukan').append(listNRTdata);

                $('#loading').hide();
            }
        })
    }

</script>