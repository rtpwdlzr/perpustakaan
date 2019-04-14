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
$query = "SELECT B.id_buku, JB.nama_jenisbuku, B.judul_buku, B.pengarang_buku, B.penerbit_buku, B.tahunterbit_buku,
                  DATE_FORMAT(B.tanggalmasuk_buku,'%d %b %Y') as tanggalmasukbuku, B.jumlah_buku, B.total_buku,
                  (SELECT COUNT(ID_TRANSAKSIPINJAM) FROM transaksipinjam WHERE ID_BUKU=B.id_buku) as totaldipinjam
          FROM buku B, jenis_buku JB
          WHERE  B.id_jenisbuku=JB.id_jenisbuku and MONTH(tanggalmasuk_buku) = '".$bulan."' AND YEAR(tanggalmasuk_buku) = '".$tahun."'
          ORDER BY B.id_buku ASC
         "; //the query for get all data in tb_student
$data = mysql_query($query);

?>
<html>
<head>
 <title>Laporan Usulan Buku</title>
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
 <center><img src="../../assets/img/laporanheader.png" alt="Mountain View" style="width:800px;height:228px;"></center>
 <center><p><ins><b>Laporan Data Usulan Buku</b></ins></p></center>
 <b>BULAN = <?php  echo $_GET['bulan'] ?></b>
 <br>
 <b>TAHUN = <?php echo $tahun ?></b>
 <table class="table table-bordered table-striped table-condensed">
        <tr>
           <th><font size="1"><center>No.</font></th>
           <th><font size="1"><center>ID Usul</font></th>
           <th><font size="1"><center>Nama Jenis</font></th>
           <th><font size="1"><center>Judul</font></th>
           <th><font size="1"><center>Pengarang</font></th>
           <th><font size="1"><center>Penerbit</font></th>
           <th><font size="1"><center>Tahun Terbit</font></th>
           <th><font size="1"><center>Tanggal Masuk</font></th>
           <th><font size="1"><center>Total Dipinjam</font></th>
           <th><font size="1"><center>Jumlah</font></th>
           <th><font size="1"><center>Total</font></th>
        </tr>
        <?php
            $nomor=1;
            while($hasil = mysql_fetch_array($data)){
        ?>
        <tr>
             <td><font size="1"><?php echo $nomor++ ?></font></td>
             <td><font size="1"><?php echo $hasil['id_buku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['nama_jenisbuku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['judul_buku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['pengarang_buku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['penerbit_buku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['tahunterbit_buku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['tanggalmasukbuku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['totaldipinjam']; ?></font></td>
             <td><font size="1"><?php echo $hasil['jumlah_buku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['total_buku']; ?></font></td>
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
