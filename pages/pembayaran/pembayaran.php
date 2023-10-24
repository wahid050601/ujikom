<div class="card">
    <div class="card-block show-page">
        <div class="header-pem text-center">
            <span class="h5"><i class="fas fa-file-invoice"></i>&nbsp; Pembayaran Administrasi Sekolah</span>
        </div>
        <hr>

        <div class="btn-pem">
            <div class="card border text-center">
                <ul class="list-group">
                    <li class="list-group-item list-btn-pem">
                        <!-- <a href="pembayaran-load.php?katpem=spp" class="btn btn-primary btn-sm ml-2 mr-2" style="text-transform: uppercase;"><i class="fas fa-tag fa-flip-horizontal"></i> spp</a> -->
                        <!-- <button class="btn btn-primary btn-sm mr-2"><i class="fas fa-bookmark"></i>&nbsp; SPP</button>
                        <button class="btn btn-primary btn-sm mr-2"><i class="fas fa-bookmark"></i>&nbsp; UJIAN</button> -->
                    </li>
                </ul>
            </div>
        </div>

        
        <div class="body-pem">

            <!-- Notice -->
            <!-- <div class="alert alert-warning bg-warning text-dark text-center">
                <span>
                    <i class="fas fa-exclamation"></i>&nbsp; pilih salah satu jenis kategori pembayaran
                </span>
            </div> -->

            <!-- Form Pembayaran-->
            <div class="page-pem">

            </div>
        </div>
    </div>
</div>

<!-- SCRIPT JS & JQUERY -->
<script>

    $(document).ready(function(){
        
        // Load kategori pembayaran
        $.ajax({
            url: 'pages/pembayaran/pembayaran-load.php',
            method: 'POST',
            dataType: "json",
            data: { "idkat" : "loadkat" },
            success: function(data){

                // Button Pembayaran
                if(data.data == '') {
                    let textnote = '<i class="fas fa-spinner fa-pulse"></i> &nbsp;kategori pembayaran tidak ada';
                    $('.list-btn-pem').append(textnote);

                }else{

                    let kategori = '';
                    $.each(data.data, function(key, val){
                        kategori += '<a href="#" onclick="HtmlLoadPem('+"'pages/"+val.katg_pem+"/"+val.katg_pem+".php'"+')" class="btn btn-primary btn-sm ml-2 mr-2" style="text-transform: uppercase;" id="mn-'+val.katg_pem+'"><i class="fas fa-cog fa-spin"></i>'+val.katg_pem+'</a>';
                    });
                    $('.list-btn-pem').append(kategori);

                }
            }
        });
    })
</script>