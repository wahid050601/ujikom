<div class="card">
    <div class="card-block show-page">
        <!-- Header -->
        <h5><i class="fas fa-file-signature"></i> Rekapitulasi Pembayaran</h5>
        <hr>

        <!-- Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="form-group">
                                    <select name="sel-tp" id="sel-tp" class="custom-select form-control-sm" style="width: 100%;">
                                        <option value="">_pilih tahun pelajaran_</option>
                                        <option value="2020/2021" selected>TP. 2020/2021</option>
                                        <option value="2021/2022">TP. 2021/2022</option>
                                        <option value="2022/2023">TP. 2022/2023</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="sel-prodi" id="sel-prodi" class="custom-select form-control-sm" style="width: 100%;">
                                        <option value="">_pilih prodi_</option>
                                        <option value="TKJ" selected>Teknik Komputer dan Jaringan</option>
                                        <option value="AKL">Akuntansi Keuangan dan Lembaga</option>
                                        <option value="BDP">Bisnis Daring dan Pemasaran</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="sel-siswa" id="sel-siswa" class="custom-select form-control-sm" style="width: 100%;">
                                        <option value="">_pilih siswa_</option>
                                        <option value="20.0001" selected>20.0001 | Alfiah</option>
                                        <option value="20.0002">20.0002 | Nayla</option>
                                        <option value="20.0003">20.0003 | Nanda</option>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-cog"></i> proses</button>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-7">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-exclamation-circle"></i> Informasi Data Siswa
                            </li>
                            <li class="list-group-item">
                                <table class="table table-sm">
                                    <tr>
                                        <th>No.NIS</th>
                                        <th width="4%">:</th>
                                        <td>20.0001</td>
                                    </tr>
                                    <tr>
                                        <th>No.NISN</th>
                                        <th width="4%">:</th>
                                        <td>00333824338</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Sisw/i</th>
                                        <th width="4%">:</th>
                                        <td>Alfiah</td>
                                    </tr>
                                    <tr>
                                        <th>Program Studi</th>
                                        <th width="4%">:</th>
                                        <td>Teknik Komputer dan Jaringan (TKJ)</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Pelajaran</th>
                                        <th width="4%">:</th>
                                        <td>2020/2021</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Kelulusan</th>
                                        <th width="4%">:</th>
                                        <td>2023</td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span><i class="fas fa-th-list"></i> History Pembayaran Siswa/i</span>
                                <!-- <span><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i> download</button></span> -->
                            </div>
                        </li>
                        <li class="list-group-item">
                            <table class="table table-bordered table-sm" id="tbl-hist-pembayaran">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>no</th>
                                        <th>Tahun Pelajaran</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Jumlah (Rp)</th>
                                        <th>Status Pembayaran</th>
                                        <th>Tanggal</th>
                                        <th>Ket.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2020/2021</td>
                                        <td>SPP Semester 1</td>
                                        <td>1,200,000</td>
                                        <td>Sudah Bayar</td>
                                        <td>10/08/2020</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2020/2021</td>
                                        <td>SPP Semester 2</td>
                                        <td>1,200,000</td>
                                        <td>Sudah Bayar</td>
                                        <td>10/02/2021</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>2020/2021</td>
                                        <td>Uang Buku</td>
                                        <td>500,000</td>
                                        <td>Belum Bayar</td>
                                        <td>-</td>
                                        <td>Tunggakan</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>2021/2022</td>
                                        <td>SPP Semester 1</td>
                                        <td>1,200,000</td>
                                        <td>Sudah Bayar</td>
                                        <td>10/08/2021</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>2021/2022</td>
                                        <td>SPP Semester 2</td>
                                        <td>1,200,000</td>
                                        <td>Sudah Bayar</td>
                                        <td>10/02/2022</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>2021/2022</td>
                                        <td>Uang Kegiatan</td>
                                        <td>700,000</td>
                                        <td>Belum Bayar</td>
                                        <td>-</td>
                                        <td>Tunggakan</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>2022/2023</td>
                                        <td>SPP Semester 1</td>
                                        <td>1,200,000</td>
                                        <td>Sudah Bayar</td>
                                        <td>10/08/2022</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>2022/2023</td>
                                        <td>SPP Semester 2</td>
                                        <td>1,200,000</td>
                                        <td>Sudah Bayar</td>
                                        <td>10/02/2023</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>2023/2024</td>
                                        <td>SPP Semester 1</td>
                                        <td>1,200,000</td>
                                        <td>Sudah Bayar</td>
                                        <td>10/08/2023</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>2023/2024</td>
                                        <td>SPP Semester 2</td>
                                        <td>1,200,000</td>
                                        <td>Sudah Bayar</td>
                                        <td>10/02/2024</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>2023/2024</td>
                                        <td>Uang Kelulusan</td>
                                        <td>1,000,000</td>
                                        <td>Belum Bayar</td>
                                        <td>-</td>
                                        <td>Tunggakan Kelulusan</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
</div>


<script>
    $('#loading').hide();

    $('#tbl-hist-pembayaran').DataTable({
        scrollX: true
    });
</script>