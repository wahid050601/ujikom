<ul class="list-group">
    <li class="list-group-item header-list text-center bg-primary text-white h6"><i class="fas fa-file-invoice"></i>&nbsp; PEMBAYARAN UJIAN</li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <select name="" id="" class="custom-select" style="width: 100%;">
                        <option value="">__pilih siswa__</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="" id="" class="custom-select" style="width: 100%;">
                        <option value="">__pilih pembayaran__</option>
                    </select>
                </div>
            </div>
        </div>
    </li>
</ul>

<script>
    $(document).ready(function(){
        $.ajax({
            method: "POST",
            url: "pages/ujian/ujian-load-data.php",
            dataType: "json",
            data: {"action" : "loadSiswa"},
            success: function(msg){
                alert("success");
            },
            error: function(msg){
                alert("error");
            }
        })
    });
</script>