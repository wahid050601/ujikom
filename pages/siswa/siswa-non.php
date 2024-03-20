<div class="card">
    <div class="card-block show-page">
        <span><i class="fas fa-user-graduate"></i>&nbsp; Peserta Didik Non-Aktif</span>
        <hr>

        <!-- Body Page -->
        <div class="data-content mt-3">
            <table id="tb-siswa-non" class="table table-bordered table-xs" style="width:100%">
                <thead>
                    <tr class="bg-primary">
                        <td class="text-center">No</td>
                        <td class="text-center">Status</td>
                        <td class="text-center">No.Induk</td>
                        <td class="text-center">NISN</td>
                        <td class="text-center">Nama</td>
                        <td class="text-center">L/P</td>
                        <td class="text-center">Kelas</td>
                        <td class="text-center">Program Studi</td>
                        <td class="text-center">TP</td>
                        <td class="text-center">Tempat Lahir</td>
                        <td class="text-center">Tanggal Lahir</td>
                        <td class="text-center">Alamat</td>
                        <td class="text-center">Nama Ibu</td>
                        <td class="text-center">Nama Ayah</td>
                        <td class="text-center">No.Telp</td>
                        <td class="text-center">E-Mail</td>
                    </tr>
                </thead>
                <tbody class="data-siswa-non-append">

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    $.ajax({
        method: 'POST',
        url: 'pages/siswa/siswa-load.php',
        dataType: 'json',
        data: {"action" : "getDataSiswaNonaktif"},
        success: function(data){
            let number = 1;
            let datasiswalist = '';

            $.each(data.datasiswa, function(id,val){
                datasiswalist +=`
                <tr>
                    <th>${number++}</th>
                    <td class="text-danger">${val.status_siswa}</td>
                    <td>${val.nis_siswa}</td>
                    <td>${val.nisn_siswa}</td>
                    <td>${val.nama_siswa}</td>
                    <td>${val.jk_siswa}</td>
                    <td>${val.kls_siswa}</td>
                    <td>${val.prod_siswa}</td>
                    <td>${val.tp_siswa}</td>
                    <td>${val.tplahir_siswa}</td>
                    <td>${val.tglahir_siswa}</td>
                    <td>${val.alamat_siswa}</td>
                    <td>${val.ibu_siswa}</td>
                    <td>${val.ayah_siswa}</td>
                    <td>${val.tlp_siswa}</td>
                    <td>${val.email_siswa}</td>
                </tr>`;
            });
            $('.data-siswa-non-append').append(datasiswalist);
            $('#tb-siswa-non').DataTable({
                processing: true,
                serverside: true,
                selected: true,
                scrollX: true,
            });
        }
    })
    

    // Remove Loading
    $('#loading').hide();
</script>