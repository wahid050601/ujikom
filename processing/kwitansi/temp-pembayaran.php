
<style>
    .master {
        margin: -30px;
        display: flex;
    }
    .master .container {
        border: 1px solid black;
        height: 250px;
    }
    .master .container .header {
        background-color: lightgrey;
        font-family: sans-serif;
        text-align: center;
        padding: 7px;
    }
    .master .container .header span{
        font-size: 11px;
    }
    .master .container .body {
        font-family: sans-serif;
        font-size: 12px;
        padding-left: 8px;
        padding-right: 8px;
    }
    .master .container .body table tr th,td{
        padding: 4px;
        text-align: left;
    }
    .master .container .footer .ttd {
        position: absolute;
        right: 0;
        font-family: sans-serif;
        font-size: 12px;
    }
    .master .container .footer .ttd .space{
        height: 45px;
    }
    .master .container .footer .ttd b{
        border-bottom: 1px solid black;
        font-style: italic;
    }

    .master .container .footer .jumlah {
        position: absolute;
        left: auto;
        font-family: sans-serif;
        font-size: 16px;
        margin-left: 16px;
        padding-top: 25px;
    }
    .master .container .footer .jumlah span {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        padding-bottom: 5px;
        padding-top: 5px;
        background-color: lightgrey;
    }
</style>

<div class="master">
    <div class="container">
        <div class="header">
            <b>SMK AD-DA'WAH TP.2023/2024</b><br>
            <span>Jl.Raya Duri Kosambi Rt.003/01 Kel.Duri Kosambi kec.Cengkareng Jakarta Barat</span>
        </div>
        <div class="body">
            <table>
                <tr><th>NO.</th><th>:</th><td style="border-bottom: 1px solid black;">001/SMK-AD/KWT-PEM/IV/2023</td></tr>
            </table>
            <table width="100%">
                <tr><th>DITERIMA DARI</th><th>:</th><td style="border-bottom: 1px dotted black;"><b>Wahid Prayogo</b> (Kelas : XII Teknik Komputer dan Jaringan 1)</td></tr>
                <tr><th>SEJUMLAH</th><th>:</th><td style="border-bottom: 1px dotted black;">Rp. 300.000</td></tr>
                <tr><th>PEMBAYARAN</th><th>:</th><td width="80%" style="border-bottom: 1px dotted black;">Uji Kompetensi LSP Kelas-XII <i>(Ket: Cicilan-1)</i></td></tr>
            </table>
        </div>
        <div class="footer">
            <div class="payment">

            </div>
            <div class="jumlah">
                <span><b>Rp. 300.000</b></span>
            </div>
            <div class="ttd">
                <div class="tanggal">Jakarta, 03 Maret 2023</div>
                <div class="space"></div>
                <b>Vina Ellyza</b>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    function pembilang(nilai) {
      nilai = Math.floor(Math.abs(nilai));
     
      var simpanNilaiBagi = 0;
      var huruf = [
        '',
        'Satu',
        'Dua',
        'Tiga',
        'Empat',
        'Lima',
        'Enam',
        'Tujuh',
        'Delapan',
        'Sembilan',
        'Sepuluh',
        'Sebelas',
      ];
      var temp = '';
     
      if (nilai < 12) {
        temp = ' ' + huruf[nilai];
      } else if (nilai < 20) {
        temp = pembilang(Math.floor(nilai - 10)) + ' Belas';
      } else if (nilai < 100) {
        simpanNilaiBagi = Math.floor(nilai / 10);
        temp = pembilang(simpanNilaiBagi) + ' Puluh' + pembilang(nilai % 10);
      } else if (nilai < 200) {
        temp = ' Seratus' + pembilang(nilai - 100);
      } else if (nilai < 1000) {
        simpanNilaiBagi = Math.floor(nilai / 100);
        temp = pembilang(simpanNilaiBagi) + ' Ratus' + pembilang(nilai % 100);
      } else if (nilai < 2000) {
        temp = ' Seribu' + pembilang(nilai - 1000);
      } else if (nilai < 1000000) {
        simpanNilaiBagi = Math.floor(nilai / 1000);
        temp = pembilang(simpanNilaiBagi) + ' Ribu' + pembilang(nilai % 1000);
      } else if (nilai < 1000000000) {
        simpanNilaiBagi = Math.floor(nilai / 1000000);
        temp = pembilang(simpanNilaiBagi) + ' Juta' + pembilang(nilai % 1000000);
      } else if (nilai < 1000000000000) {
        simpanNilaiBagi = Math.floor(nilai / 1000000000);
        temp =
          pembilang(simpanNilaiBagi) + ' Miliar' + pembilang(nilai % 1000000000);
      } else if (nilai < 1000000000000000) {
        simpanNilaiBagi = Math.floor(nilai / 1000000000000);
        temp = pembilang(nilai / 1000000000000) + ' Triliun' + pembilang(nilai % 1000000000000);
      }
     
      return temp;
    }
     
    alert(pembilang(12000));
</script> -->