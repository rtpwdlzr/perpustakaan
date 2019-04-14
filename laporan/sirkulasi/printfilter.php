<?php

include('session.php');
if (empty($_SESSION['login_user']) AND empty($_SESSION['login_pass'])){
  header("location: ../../index.php");
}

include 'connection.php';
if($_GET['bulan']=='Januari'){$bulan=1;}
elseif($_GET['bulan']=='Februari'){$bulan=2;}
elseif($_GET['bulan']=='Maret'){$bulan=3;}
elseif($_GET['bulan']=='April'){$bulan=4;}
elseif($_GET['bulan']=='Mei'){$bulan=5;}
elseif($_GET['bulan']=='Juni'){$bulan=6;}
elseif($_GET['bulan']=='Juli'){$bulan=7;}
elseif($_GET['bulan']=='Agustus'){$bulan=8;}
elseif($_GET['bulan']=='September'){$bulan=9;}
elseif($_GET['bulan']=='Oktober'){$bulan=10;}
elseif($_GET['bulan']=='November'){$bulan=11;}
else {$bulan=12;}
$tahun=$_GET['tahun'];
$query = "SELECT TP.id_transaksipinjam, A.no_induk, A.nama_siswa, B.id_buku, B.judul_buku, DATE_FORMAT(TP.tgl_pinjam,'%d %b %Y') as tglpinjam, DATE_FORMAT(TP.tgl_kembali,'%d %b %Y') as tglkembali, if(TP.status_transaksipinjam=0,'Dipinjam',if(TP.status_transaksipinjam=2,'Diperpanjang','Dikembalikan')) as status
          FROM transaksipinjam TP, anggota A, buku B
          WHERE TP.no_induk=A.no_induk and TP.id_buku=B.id_buku and MONTH(tgl_pinjam) = '".$bulan."' AND YEAR(tgl_pinjam) = '".$tahun."'
          ORDER BY TP.id_transaksipinjam ASC
         "; //the query for get all data in tb_student
$data = mysql_query($query);

?>
<html>
<head>
  <title>Laporan Data Sirkulasi Buku</title>
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
 <center><img src="../../assets/img/laporanheader.png" alt="Mountain View" style="width:800px;height:228px;"></center>
 <center><p><ins><b>Laporan Sirkulasi Buku</b></ins></p></center>
 <b>BULAN = <?php  echo $_GET['bulan'] ?></b>
 <br>
 <b>TAHUN = <?php echo $tahun ?></b>
 <table class="table table-bordered table-striped table-condensed">
        <tr>
          <th><font size="1"><center>No.</font></th>
          <th><font size="1"><center>ID Transaksipinjam</font></th>
          <th><font size="1"><center>No Induk</font></th>
          <th><font size="1"><center>Nama</font></th>
          <th><font size="1"><center>ID Buku</font></th>
          <th><font size="1"><center>Judul Buku</font></th>
          <th><font size="1"><center>Tanggal Pinjam</font></th>
          <th><font size="1"><center>Tanggal Kembali</font></th>
          <th><font size="1"><center>Status Pinjam</font></th>
        </tr>
        <?php
            $nomor=1;
            while($hasil = mysql_fetch_array($data)){
        ?>
        <tr>
          <td><font size="1"><?php echo $nomor++ ?></font></td>
          <td><font size="1"><?php echo $hasil['id_transaksipinjam']; ?></font></td>
          <td><font size="1"><?php echo $hasil['no_induk']; ?></font></td>
          <td><font size="1"><?php echo $hasil['nama_siswa']; ?></font></td>
          <td><font size="1"><?php echo $hasil['id_buku']; ?></font></td>
          <td><font size="1"><?php echo $hasil['judul_buku']; ?></font></td>
          <td><font size="1"><?php echo $hasil['tglpinjam']; ?></font></td>
          <td><font size="1"><?php echo $hasil['tglkembali']; ?></font></td>
          <td><font size="1"><?php echo $hasil['status']; ?></font></td>
        <?php } ?>
        </tr>
    </table>
    <script>
  window.load = print_d();
  function print_d(){
   window.print();
  }
 </script>
</body>
</html>
