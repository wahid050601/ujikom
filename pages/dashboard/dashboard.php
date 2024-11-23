<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h1 class="text-c-purple" id="count-datasiswa">0</h1>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fas fa-user-graduate f-50"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-purple">
                <!-- IF ANY NOTE -->
                <h6 class="text-white m-b-0">Siswa/i Aktif</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h1 class="text-c-green" id="count-rombel">0</h1>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fas fa-university f-50"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-green">
                <!-- IF ANY NOTE -->
                <h6 class="text-white m-b-0">Rombongan Belajar</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="text-c-red" id="count-pemasukan">Rp.0</h4>
                        <!-- <h6 class="text-muted m-b-0">Pemasukan</h6> -->
                    </div>
                    <div class="col-4 text-right">
                        <i class="fas fa-file-download f-50"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-red">
                <!-- IF ANY NOTE -->
                <h6 class="text-white m-b-0">Pemasukan (Curent Date)</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="text-c-blue" id="count-pengeluaran">Rp.0</h4>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fas fa-file-upload f-50"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-blue">
                <!-- IF ANY NOTE -->
                <h6 class="text-white m-b-0">Pengeluaran (Curent Date)</h6>
            </div>
        </div>
    </div>




    <!-- <div class="col-xl-4 col-md-12">
        <div class="card ">
            <div class="card-header">
                <h5>Active User</h5>
            </div>
            <div class="card-block">
                <div class="align-middle m-b-30">
                    <img src="assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                    <div class="d-inline-block">
                        <h6>David Jones</h6>
                        <p class="text-muted m-b-0">Developer</p>
                    </div>
                </div>
                <div class="align-middle m-b-30">
                    <img src="assets/images/avatar-1.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                    <div class="d-inline-block">
                        <h6>David Jones</h6>
                        <p class="text-muted m-b-0">Developer</p>
                    </div>
                </div>
                <div class="align-middle m-b-30">
                    <img src="assets/images/avatar-3.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                    <div class="d-inline-block">
                        <h6>David Jones</h6>
                        <p class="text-muted m-b-0">Developer</p>
                    </div>
                </div>
                <div class="align-middle m-b-30">
                    <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                    <div class="d-inline-block">
                        <h6>David Jones</h6>
                        <p class="text-muted m-b-0">Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>

<div class="row">
    <div class="col-lg-6">
        <!-- LINE CHART start -->
        <div class="card">
            <div class="card-header">
                <h5>Grafik Pemasukan (Curent Year)</h5>
                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
            </div>
            <div class="card-block">
                <div id="line-chart-data" style="height: 250px;"></div>
            </div>
        </div>
        <!-- LINE CHART Ends -->
    </div>

    <div class="col-lg-6">
        <!-- LINE CHART start -->
        <div class="card">
            <div class="card-header">
                <h5>Grafik Pengeluaran (Curent Year)</h5>
                <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
            </div>
            <div class="card-block">
                <div id="line-chart-data-sc" style="height: 250px;"></div>
            </div>
        </div>
        <!-- LINE CHART Ends -->
    </div>
</div>

<!--  -->



<script>
    $(document).ready(function(){

        // Get data Card
        $.ajax({
            url: 'pages/dashboard/dashboard-load.php',
            method: 'POST',
            dataType: 'json',
            data: {'action': 'getCountCard'},
            success: function(count){
                $('#count-datasiswa').html(count.data_siswa.jml_siswa);
                $('#count-rombel').html(count.rombel.jml_rombel);
                $('#count-pemasukan').html("Rp." + count.pemasukan);
                $('#count-pengeluaran').html("Rp." + count.pengeluaran);

                let grafik_pemasukan = count.grafik_pemasukan;
                let grafik_pengeluaran = count.grafik_pengeluaran;
                let grafikPemasukan = new Morris.Line({
                    // ID of the element in which to draw the chart.
                    element: 'line-chart-data',
                    data: grafik_pemasukan,
                    xkey: 'month',
                    ykeys: ['value'],
                    labels: ['val'],
                    parseTime: false
                });

                let grafikPengeluaran = new Morris.Line({
                    // ID of the element in which to draw the chart.
                    element: 'line-chart-data-sc',
                    data: grafik_pengeluaran,
                    xkey: 'month',
                    ykeys: ['value'],
                    labels: ['Value'],
                    parseTime: false
                });

                $('#loading').hide();
            }
        });
        
    });

</script>