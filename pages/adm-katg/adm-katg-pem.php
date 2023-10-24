<!-- ========================LOADING======================== -->
<style>
  .loading {
  position: fixed;
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

<div class="list-group-item text-center">
    <h6><i class="fas fa-bookmark"></i>&nbsp; Data Pembayaran <span class="header-pem" style="text-transform: uppercase;"></span></h6>
</div>



<div class="button-spp mt-2">
    <!-- Button Here -->
</div>
<table id="table-jns" class="table table-striped table-bordered table-xs" style="width:100%">
    <thead>
        <tr class="bg-primary">
            <td>No.</td>
            <td>Pembayaran</td>
            <td>Prodi</td>
            <td>Nominal</td>
            <td>Cicilan</td>
            <td>Tahun Pelajaran</td>
            <td>Kategori</td>
        </tr>
    </thead>
    <tbody id="show-pem">

    </tbody>
</table>


<!-- MODAL DATA SPP -->
<!-- ADD -->
<div class="modal fade" id="modalAddSpp" tabindex="-1" role="dialog" aria-labelledby="modalAddSppLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modalAddSppLabel"><i class="fas fa-plus"></i>&nbsp; Tambah Data Pembayaran SPP</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
        <div class="form-group">
            <label for="">Bulan</label>
            <select class="custom-select form-control-sm" name="bulan-spp" id="bulan-spp" style="width: 100%;">
                <option value="">__ pilih bulan __</option>
                <option value="januari">januari</option>
                <option value="februari">februari</option>
                <option value="maret">maret</option>
                <option value="april">april</option>
                <option value="mei">mei</option>
                <option value="juni">juni</option>
                <option value="juli">juli</option>
                <option value="agustus">agustus</option>
                <option value="september">september</option>
                <option value="oktober">oktober</option>
                <option value="november">november</option>
                <option value="desember">desember</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Nominal Pembayaran</label>
            <input type="number" class="form-control form-control-sm" name="tkjpem-spp" id="tkjpem-spp" placeholder="TKJ">
            <input type="number" class="form-control form-control-sm" name="aklpem-spp" id="aklpem-spp" placeholder="AKL">
            <input type="number" class="form-control form-control-sm" name="bdppem-spp" id="bdppem-spp" placeholder="BDP">
        </div>

        <div class="form-group">
            <label for="">Tahun Pelajaran</label>
            <input type="text" class="form-control form-control-sm" name="tp-spp" id="tp-spp">
        </div>

        <div class="form-group">
            <label for="">Semester</label>
            <select class="custom-select form-control-sm" name="smtr-spp" id="smtr-spp" style="width: 100%;">
                <option value="">__ pilih semester __</option>
                <option value="ganjil">Ganjil</option>
                <option value="genap"></option>
            </select>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp; batal</button>
        <button type="submit" class="btn btn-primary btn-sm" id="btnadd-spp"><i class="fas fa-save"></i>&nbsp; simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- DELL -->
<div class="modal fade" id="modalDellSpp" tabindex="-1" role="dialog" aria-labelledby="modalDellSppLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modalDellSppLabel"><i class="fas fa-trash"></i>&nbsp; Hapus Data Pembayaran SPP</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="formDelSpp">
        <div class="form-group">
            <label for="">Bulan</label>
            <select class="custom-select form-control-sm" name="bulan-spp-del" id="bulan-spp-del" style="width: 100%;">
                <option value="">__ pilih bulan __</option>
                <option value="januari">januari</option>
                <option value="februari">februari</option>
                <option value="maret">maret</option>
                <option value="april">april</option>
                <option value="mei">mei</option>
                <option value="juni">juni</option>
                <option value="juli">juli</option>
                <option value="agustus">agustus</option>
                <option value="september">september</option>
                <option value="oktober">oktober</option>
                <option value="november">november</option>
                <option value="desember">desember</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Tahun Pelajaran</label>
            <select class="custom-select form-control-sm" name="tp-spp-del" id="tp-spp-del" style="width: 100%;">
            </select>
        </div>

        <div class="form-group">
            <label for="">Semester</label>
            <select class="custom-select form-control-sm" name="smtr-spp-del" id="smtr-spp-del" style="width: 100%;">
                <option value="">__ pilih semester __</option>
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
        </div>
        <hr>
        <button type="button" id="btn-val-del-spp" class="btn label btn-success"><i class="fas fa-check"></i> Validasi</button>
        <!-- NOT READY DELL -->
        <div class="notready-del-spp" style="display: none;">
          <hr>
          <style>
            .list-pem-spp {
              height: 150px;
              width: auto;
              overflow-y: scroll;
              overflow-x: scroll;
            }
          </style>
          <small class="text-danger"><i>*) data pembayaran SPP tidak dapat dihapus, terdapat siswa yang sudah melakukan pembayaran</i></small>
          <ul class="list-group">
            <li class="list-group-item bg-primary text-center header-delspp" style="padding: 3px;"></li>
            <li class="list-group-item list-pem-spp">

            </li>
          </ul>
        </div>

        <!-- READY DELL -->
        <div class="ready-del-spp" style="display: none;">
          <hr>
          <div class="alert bg-success text-center text-white">
            <i class="fas fa-check"></i> <i class="text-del-spp"> </i>
          </div>
          <ul class="list-group" style="margin-top: -20px;">
            <li class="list-group-item list-show-pem-spp">

            </li>
          </ul>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" id="btncanceldelpem" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp; batal</button>
        <button type="submit" class="btn btn-primary btn-sm btn-disabled" id="btndel-spp" disabled><i class="fas fa-trash"></i>&nbsp; hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END MODAL DATA SPP -->


<!-- MODAL DATA UJIAN -->
<!-- ADD -->
<div class="modal fade" id="modalAddUjian" tabindex="-1" role="dialog" aria-labelledby="modalAddUjianLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modalAddUjianLabel"> <i class="fas fa-plus"></i> Tambah Data Pembayaran Ujian</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="formAddUjian">
        <div class="form-group">
          <label for="">Pembayaran</label>
          <div class="row">
            <div class="col-lg-8">
              <input type="text" class="form-control form-control-sm" id="ujian-pem" name="ujian-pem">
            </div>
            <div class="col-lg-4">
              <select class="custom-select form-control-sm" name="kls-ujian-pem" id="kls-ujian-pem" style="width: 100%;">
                <option value="">__kelas__</option>
                <option value="umum">Umum</option>
                <option value="X">X <small>(sepuluh)</small></option>
                <option value="XI">XI <small>(sebelas)</small></option>
                <option value="XII">XII <small>(sebelas)</small></option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <input type="checkbox" class="prodi" id="ck-pem-umum">
          <label for="ck-pem-umum">Umum</label>
          &nbsp;
          <input type="checkbox" class="prodi" id="ck-pem-tkj">
          <label for="ck-pem-tkj">TKJ</label>
          &nbsp;
          <input type="checkbox" class="prodi" id="ck-pem-akl">
          <label for="ck-pem-akl">AKL</label>
          &nbsp;
          <input type="checkbox" class="prodi" id="ck-pem-bdp">
          <label for="ck-pem-bdp">BDP</label>
        </div>

        <div class="form-group form-prodi">
          <!-- <div class="row">
            <div class="col-lg-8">
              <input type="text" class="form-control form-control-sm" id="nominal-pem" name="nominal-pem">
            </div>
            <div class="col-lg-4">
              <select class="custom-select form-control-sm" name="ccl-nominal-pem" id="ccl-nominal-pem" style="width: 100%;">
                <option value="">__cicilan__</option>
                <option value="1">1x Cicilan</option>
                <option value="2">2x Cicilan</option>
                <option value="3">3x Cicilan</option>
                <option value="4">4x Cicilan</small></option>
                <option value="5">5x Cicilan</option>
                <option value="6">6x Cicilan</option>
                <option value="7">7x Cicilan</option>
                <option value="8">8x Cicilan</option>
                <option value="9">9x Cicilan</option>
                <option value="10">10x Cicilan</option>
              </select>
            </div>
          </div> -->
        </div>

        <div class="form-group">
          <label for="">Tahun Pelajaran</label>
          <input type="text" class="form-control form-control-sm" name="tp-ujian-pem" id="tp-ujian-pem" placeholder="Ex: 2018/2019">
        </div>

        <div class="form-group">
          <label for="">Semester</label>
          <select class="custom-select form-control-sm" name="smtr-ujian-pem" id="smtr-ujian-pem" style="width: 100%;">
            <option value="">__pilih semester__</option>
            <option value="ganjil">Ganjil</option>
            <option value="genap">Genap</option>
          </select>
        </div>

      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        <button type="button" class="btn btn-primary btn-sm" id="btnadd-ujian-pem"><i class="fas fa-save"></i> Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- DELL -->
<div class="modal fade" id="modalDellUjian" tabindex="-1" role="dialog" aria-labelledby="modalDellUjianLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modalDellUjianLabel"> <i class="fas fa-trash"></i> Hapus Data Pembayaram Ujian</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- NOT READY DELL -->
        <div class="notready-del" style="display: none;">
          <style>
            .list-pem-ujian {
              height: 150px;
              width: auto;
              overflow-y: scroll;
              overflow-x: scroll;
            }
          </style>
          <small class="text-danger"><i>*) data pembayaran ujian tidak dapat dihapus, terdapat siswa yang sudah melakukan pembayaran</i></small>
          <ul class="list-group">
            <li class="list-group-item bg-primary text-center" style="padding: 3px;">Ujian Semester Ganjil-Kelas X</li>
            <li class="list-group-item  list-pem-ujian">

            </li>
          </ul>
        </div>
        
        <!-- READY DELL -->
        <div class="ready-del" style="display: none;">
          <div class="alert bg-success text-center text-white">
            <i class="fas fa-check"></i> <i class="text-del"> </i>
          </div>
        </div>

      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        <button type="button" class="btn btn-primary btn-sm" id="btndell-ujian-pem"><i class="fas fa-trash"></i> Hapus</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL DATA UJIAN -->


<!-- MODAL DATA KEGIATAN -->
<!-- ADD -->
<div class="modal fade" id="modalAddKegiatan" tabindex="-1" role="dialog" aria-labelledby="modalAddKegiatanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modalAddKegiatanLabel"><i class="fas fa-plus"></i> Tambah Data Pembayaran Kegiatan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="formAddKegiatan">

          <div class="form-group">
            <label for="">Pembayaran</label>
            <div class="row">
              <div class="col-lg-8">
                <input type="text" class="form-control form-control-sm" id="kegiatan-pem" name="kegiatan-pem">
              </div>
              <div class="col-lg-4">
                <select class="custom-select form-control-sm" name="kls-kegiatan-pem" id="kls-kegiatan-pem" style="width: 100%;">
                  <option value="">__kelas__</option>
                  <option value="umum">Umum</option>
                  <option value="X">X <small>(sepuluh)</small></option>
                  <option value="XI">XI <small>(sebelas)</small></option>
                  <option value="XII">XII <small>(sebelas)</small></option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="">Jurusan</label>
            <select class="custom-select form-control-sm" name="prodi-kegiatan-pem" id="prodi-kegiatan-pem" style="width: 100%;">
              <option value="">__pilih jurusan</option>
              <option value="UMUM">Umum (semua jurusan)</option>
              <option value="TKJ">Teknik Komputer dan Jaringan</option>
              <option value="AKL">Akuntansi Keuangan dan Lembaga</option>
              <option value="BDP">Bisnis Daring dan Pemasaran</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="">Nominal Pembayaran</label>
            <div class="row">
              <div class="col-lg-8">
                <input type="number" class="form-control form-control-sm" id="nom-kegiatan-pem" name="nom-kegiatan-pem">
              </div>
              <div class="col-lg-4">
                <select class="custom-select form-control-sm" name="ccl-kegiatan-pem" id="ccl-kegiatan-pem" style="width: 100%;">
                  <option value="">__cicilan__</option>
                  <script>
                    $(document).ready(function(){
                      let cclForm = ""
                      for(i = 1; i <= 10; i++){
                        cclForm += '<option value="'+i+'">'+i+'x Cicilan</option>';
                      }
                      $('#ccl-kegiatan-pem').append(cclForm);
                    });
                  </script>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="">Tahun Pelajaran</label>
            <input type="text" class="form-control form-control-sm" name="tp-kegiatan-pem" id="tp-kegiatan-pem" placeholder="Ex: 2018/2019">
          </div>

          <div class="form-group">
            <label for="">Semester</label>
            <select class="custom-select form-control-sm" name="smtr-kegiatan-pem" id="smtr-kegiatan-pem" style="width: 100%;">
              <option value="">__pilih semester__</option>
              <option value="ganjil">Ganjil</option>
              <option value="genap">Genap</option>
            </select>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" id="btn-cancel-kegiatan" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        <button type="button" class="btn btn-primary btn-sm" id="btn-add-pem-kegiatan"><i class="fas fa-save"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- DELL -->
<div class="modal fade" id="modalDellKegiatan" tabindex="-1" role="dialog" aria-labelledby="modalDellKegiatanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modalDellKegiatanLabel"><i class="fas fa-trash"></i> Hapus Data Pembayaran Kegiatan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- NOT READY DELL -->
        <div class="notready-del" style="display: none;">
          <style>
            .list-pem-kegiatan {
              height: 150px;
              width: auto;
              overflow-y: scroll;
              overflow-x: scroll;
            }
          </style>
          <small class="text-danger"><i>*) data pembayaran kegiatan tidak dapat dihapus, terdapat siswa yang sudah melakukan pembayaran</i></small>
          <ul class="list-group">
            <li class="list-group-item bg-primary text-center header-delkegiatan" style="padding: 3px;"></li>
            <li class="list-group-item  list-pem-kegiatan">

            </li>
          </ul>
        </div>
        
        <!-- READY DELL -->
        <div class="ready-del" style="display: none;">
          <div class="alert bg-success text-center text-white">
            <i class="fas fa-check"></i> <i class="text-del"> </i>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        <button type="button" class="btn btn-primary btn-sm" id="btndell-kegiatan-pem"><i class="fas fa-trash"></i> Hapus</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL DATA KEGIATAN -->