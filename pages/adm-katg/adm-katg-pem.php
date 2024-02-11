<div class="list-group-item text-center">
    <h6><i class="fas fa-bookmark"></i>&nbsp; Data Pembayaran <span class="header-pem" style="text-transform: uppercase;"></span></h6>
</div>



<div class="button-spp mt-2">
    <!-- Button Here -->
</div>
<table id="table-jns" class="table table-striped table-bordered table-xs" style="width:100%">
    <thead>
        <tr class="bg-primary">
            <td class="text-center">No.</td>
            <td class="text-center">Pembayaran</td>
            <td class="text-center">Prodi</td>
            <td class="text-center">Nominal</td>
            <td class="text-center">Cicilan</td>
            <td class="text-center">Tahun Pelajaran</td>
            <td class="text-center">Kategori</td>
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
      <form action="" method="POST" id="formAddPemSpp">
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
            <input type="text" class="form-control form-control-sm" name="tp-spp" id="tp-spp" placeholder="Ex: 2018/2019">
        </div>

        <div class="form-group">
            <label for="">Semester</label>
            <select class="custom-select form-control-sm" name="smtr-spp" id="smtr-spp" style="width: 100%;">
                <option value="">__ pilih semester __</option>
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp; batal</button>
        <button type="button" class="btn btn-primary btn-sm" id="btnadd-spp"><i class="fas fa-save"></i>&nbsp; simpan</button>
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
        <hr>
        <div class="ready-del-spp" style="display: none;">
          <img src="assets/images/verified.gif" alt="verified" style="width: 40px;">
          <span>Validasi Berhasil! Data dapat dihapus</span>
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
                <option value="XII">XII <small>(duabelas)</small></option>
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
          <!-- PRODI HERE -->
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
        <h6 class="modal-title" id="modalDellUjianLabel"><i class="fas fa-th-list"></i> Data Pembayaran Ujian</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <!-- NOT READY DELL -->
        <div class="notready-del" style="display: contents;">
          <style>
            .list-pem-ujian {
              height: 150px;
              width: auto;
              overflow-y: scroll;
              /* overflow-x: scroll; */
            }
          </style>
          <small class="text-danger"><i>*) data pembayaran ujian tidak dapat dihapus, terdapat siswa yang sudah melakukan pembayaran</i></small>
          <ul class="list-group">
            <li class="list-group-item bg-primary text-center header-pem-ujian" style="padding: 3px;"> </li>
            <li class="list-group-item  list-pem-ujian">

            </li>
          </ul>
        </div>
        
        <!-- READY DELL -->
        <!-- <div class="ready-del" style="display: none;">
          <div class="alert bg-success text-center text-white">
            <i class="fas fa-check"></i> <i class="text-del"> </i>
          </div>
        </div> -->

      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
        <!-- <button type="button" class="btn btn-primary btn-sm" id="btndell-ujian-pem"><i class="fas fa-trash"></i> Hapus</button> -->
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
        <h6 class="modal-title" id="modalDellKegiatanLabel"><i class="fas fa-th-list"></i>&nbsp; Data Pembayaran Kegiatan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <!-- NOT READY DELL -->
        <div class="notready-del">
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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
        <!-- <button type="button" class="btn btn-primary btn-sm" id="btndell-kegiatan-pem"><i class="fas fa-trash"></i> Hapus</button> -->
      </div>
    </div>
  </div>
</div>
<!-- END MODAL DATA KEGIATAN -->




<script>
  // ADD PEMBAYARAN SHOW ALL MODAL
  $('.button-spp').on('click', '#bntaddpem', function(){
    var data = $('#bntaddpem').data('katg');

    if(data == "spp"){
        $('#modalAddSpp').modal('show');
    }else if(data == "ujian"){
        $('#modalAddUjian').modal('show');
    }else if(data == 'kegiatan'){
        $('#modalAddKegiatan').modal('show');
    }
  });


  // ================================================================== SPP SECTION ========================================
  // DELETE PEMBAYARAN SPP (SHOW)
  $('.button-spp').on('click', '#bntdellpem', function(){
    $('#btn-val-del-spp').hide();
    let kategori = $('#bntdellpem').data('katg');

    $('#smtr-spp-del').on('change', function(){
      if($('#bulan-spp-del').val() == '' || $('#tp-spp-del').val() == ''){
        alert("lengkapi form sebelumnya");
        $('#smtr-spp-del').val('');
      }else{
        $('#btn-val-del-spp').show();
      }
    });

    $('#modalDellSpp').modal('show');
    $('#formDelSpp')[0].reset();
    $('.notice').empty();
    $('#btndel-spp').attr('disabled', true);
    $('#btndel-spp').addClass('btn-disabled');
    $('#tp-spp-del').empty();
    $('.tb-del-spp').empty();
    $('.notready-del-spp').css('display', 'none');
    $('.ready-del-spp').css('display', 'none');

    $.ajax({
      method: "POST",
      url: "pages/adm-katg/adm-katg-func.php",
      dataType: "json",
      data: {
          "action" : "delpemSpp",
          "katg" : kategori
      },
      success: function(msg){
        // Append Tahun Pelajaran
        let tp = '';
        $.each(msg.jnstp, function(key, val){
            tp += '<option value="'+val.jns_tp+'">'+val.jns_tp+'</option>';
        });
        $('#tp-spp-del').append('<option value="">__ pilih tahun pelajaran __</option>').append(tp);
      }
    });

  });

  
  // VALIDATION DELETE PEMBAYARAN SPP
  $('#btn-val-del-spp').on('click', function(event){
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
            // let valdel = '';
            // $.each(msg2.jnspem, function(key, val){
            //     valdel += `
            //     <div class="d-flex justify-content-between align-items-center" style="padding: 2px;">`+val.jns_pem+`-`+val.jns_ket+` TP.`+val.jns_tp+`</div>`;
            // });
            // let notice = 'data pembayaran SPP dapat dihapus';
            // $('.text-del-spp').empty();
            // $('.text-del-spp').html(notice);
            // $('.list-show-pem-spp').empty();
            // $('.list-show-pem-spp').html(valdel);
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
      }
    });
  });


   
  // === === === ACTION TAMBAH PEMBAYARAN SPP === === ===
  $('#btnadd-spp').on('click', function(){
    if($('#bulan-spp').val() == '' || $('#tkjpem-spp').val() == '' || $('#aklpem-spp').val() == '' || $('#bdppem-spp').val() == '' || $('#tp-spp').val() == '' || $('#smtr-spp').val() == ''){
      $('#modalAddSpp').modal('hide');
      Swal.fire({
        title: "WARNING",
        text: "Harap lengkapi semua Form",
        icon: "warning",
        showConfirmButton: true
      }).then((ok) => {
        $('#modalAddSpp').modal('show');
      });

    }else{
      var dataJson = {
          bulan : $('#bulan-spp').val(),
          valtkj : $('#tkjpem-spp').val(),
          valakl : $('#aklpem-spp').val(),
          valbdp : $('#bdppem-spp').val(),
          tp : $('#tp-spp').val(),
          smtr : $('#smtr-spp').val()
      }
      $('#loading').show();
      AddPembayaranSpp(dataJson);
    }
  });

  // === === === ACTION DELETE PEMBAYARAN SPP === === ===
  $('#btndel-spp').on('click', function(){
    let dataDelPem = {
      bulan : $('#bulan-spp-del').val(),
      tp :  $('#tp-spp-del').val(),
      smtr : $('#smtr-spp-del').val()
    }

    $('#modalDellSpp').modal('hide');
    Swal.fire({
        title: 'Delete',
        text: 'Ingin hapus data pembayaran spp ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: "yes"
    }).then((result) => {
        if(result.isConfirmed){
          $('#loading').show();
          DeletePembayaranSpp(dataDelPem);
            // console.log(dataDelPem);
        }else{
            $('#modalDellSpp').modal('show');
        }
    });
  });
// ================================================================ END SPP SECTION ======================================




// ================================================================= UJIAN SECTION =======================================
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


  // === === === ACTION TAMBAH PEMBYARAN UJIAN === === === 
  $('#btnadd-ujian-pem').on('click', function(){
    if($('#ujian-pem').val() == '' || $('#kls-ujian-pem').val() == '' || $('#tp-ujian-pem').val() == '' || $('#smtr-ujian-pem').val() == ''){
      $('#modalAddUjian').modal('hide');
      Swal.fire({
        title: "WARNING",
        text: "Harap lengkapi semua Form",
        icon: "warning",
        showConfirmButton: true
      }).then((ok) => {
        $('#modalAddUjian').modal('show');
      });

    }else{
      $('#loading').show();
      // get data nominal
      nom_umum += $('#val-ujian-umum').val()+ '-' +$('#ccl-nominal-pem-umum').val();
      nom_tkj += $('#val-ujian-tkj').val()+ '-' +$('#ccl-nominal-pem-tkj').val();
      nom_akl += $('#val-ujian-akl').val()+ '-' +$('#ccl-nominal-pem-akl').val();
      nom_bdp += $('#val-ujian-bdp').val()+ '-' +$('#ccl-nominal-pem-bdp').val();
      
      var mappingDataUjian = {
        pembayaran : $('#ujian-pem').val(),
        kelas : $('#kls-ujian-pem').val(),
        tp : $('#tp-ujian-pem').val(),
        smtr : $('#smtr-ujian-pem').val(),
        pemUmum : nom_umum,
        pemTkj : nom_tkj,
        pemAkl : nom_akl,
        pemBdp : nom_bdp
      }
      AddPembayaranUjian(mappingDataUjian);
    }
  });


  // === === === ACTION DELETE PEMBAYARAN UJAIN === === ===
  $('#table-jns').on('click', '#dell-ujian-pers', function(){
    let idPemUjian = $(this).data('id');
    let titlePem = $(this).data('pem');

    $.ajax({
      method: "POST",
      url: "pages/adm-katg/adm-katg-func.php",
      dataType: "json",
      data: {
        "action" : "dellpemUjian",
        "id_pem" : idPemUjian
      },
      success: function(msg){
        // console.log(msg); 
        if(msg.status == 'not-ready'){
          $('.list-pem-ujian').empty();
          let show = '';
          $.each(msg.data, function(key, val){
              show += `
              <p class="d-flex justify-content-between align-items-center" style="padding: 2px;">
                  `+val.nama+` <span class="label label-success">`+val.status+`</span>
              </p>`;
          });
          $('.header-pem-ujian').html(titlePem);
          $('.list-pem-ujian').append(show);
          $('.notready-del').css('display', 'contents');
          $('#modalDellUjian').modal('show');

        }else if(msg.status == 'ready'){
          Swal.fire({
            title: "Hapus",
            text: "Ingin hapus pembayaran "+ titlePem +" ?",
            icon: "question",
            confirmButtonText: "iya",
            cancelButtonText: "tidak",
            showCancelButton: true
          }).then((result) => {
            if(result.isConfirmed){
              $('#loading').show();
              DeletePembayaranUjian(idPemUjian);
            }
          });
        }
      }
    });
  });

  // ========================================================= END SECTION PEMBAYARAN UJIAN ================================




  // ========================================================= SECTION PEMBAYARAN KEGIATAN =================================
 
  // === === === ACTION TAMBAH PEMBAYARAN KEGIATAN === === ===
  $('#btn-add-pem-kegiatan').on('click', function(){
    if($('#kegiatan-pem').val() == '' || $('#kls-kegiatan-pem').val() == '' || $('#prodi-kegiatan-pem').val() == '' || $('#nom-kegiatan-pem').val() == '' || $('#ccl-kegiatan-pem').val() == '' || $('#tp-kegiatan-pem').val() == '' || $('#smtr-kegiatan-pem').val() == ''){
      $('#modalAddKegiatan').modal('hide');
      Swal.fire({
        title: "WARNING",
        text: "Harap lengkapi semua Form",
        icon: "warning",
        showConfirmButton: true
      }).then((ok) => {
        $('#modalAddKegiatan').modal('show');
      });
      
    }else{
      let serializeData = $('#formAddKegiatan').serialize();
      AddPembayaranKegiatan(serializeData);
    }
    
  });


  // === === === ACTION HAPUS PEMBAYARAN KEGIATAN === === ===
  $('#table-jns').on('click', '#dell-kegiatan-pers', function(){
    let idPemKegiatan = $(this).data("id");
    let labelJnsPembayaran = $(this).data("pem");

    $.ajax({
      method: "POST",
      url: "pages/adm-katg/adm-katg-func.php",
      dataType: "json",
      data: {
        "action" : "delpemKegiatan",
        "idkegiatan" : idPemKegiatan
      },
      success: function(msg){
        if(msg.status == 'not-ready'){
          $('.header-delkegiatan').html(labelJnsPembayaran);
          $('.list-pem-kegiatan').empty();
          let show = '';
          $.each(msg.data, function(key, val){
              show += `
              <p class="d-flex justify-content-between align-items-center" style="padding: 2px;">
                  `+val.siswa+` <span class="label label-success">`+val.status+`</span>
              </p>`;
          });
          $('.list-pem-kegiatan').append(show);
          $('#modalDellKegiatan').modal('show');

        }else if(msg.status == 'ready'){
          Swal.fire({
            title: "Hapus",
            text: "Ingin hapus pembayaran "+ labelJnsPembayaran +" ?",
            icon: "question",
            confirmButtonText: "iya",
            cancelButtonText: "tidak",
            showCancelButton: true
          }).then((result) => {
            if(result.isConfirmed){
              $('#loading').show();
              DeletePembayaranKegiatan(idPemKegiatan);
            }
          });
        }
      }
    });
  });


</script>