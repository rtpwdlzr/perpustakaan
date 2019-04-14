<?php

include('session.php');
if (empty($_SESSION['login_user']) AND empty($_SESSION['login_pass'])){
  header("location: ../../index.php");
}

include 'connection.php';
$query = "SELECT TK.id_transaksikembali, TP.id_transaksipinjam, A.no_induk, A.nama_siswa, B.id_buku, B.judul_buku, DATE_FORMAT(TK.tgl_transaksikembali,'%d %b %Y') as tgltransaksikembali, TK.jumlahdenda_transaksikembali
          FROM transaksikembali TK, transaksipinjam TP, anggota A, buku B
          WHERE TK.id_transaksipinjam=TP.id_transaksipinjam and TP.no_induk=A.no_induk and TP.id_buku=B.id_buku and jumlahdenda_transaksikembali>0
          ORDER BY TK.id_transaksikembali ASC
         "; //the query for get all data in tb_student
$data = mysql_query($query);
?>
<html>
<head>
 <title>Laporan Semua Data Informasi Denda</title>
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
 <center><img src="../../assets/img/laporanheader.png" alt="Mountain View" style="width:800px;height:228px;"></center>
 <center><p><ins><b>Laporan Semua Data Informasi Denda</b></ins></p></center>
 <table  class="table table-bordered table-striped table-condensed">
        <tr>
           <th><font size="1"><center>No.</font></th>
           <th><font size="1"><center>ID Transaksikembali</font></th>
           <th><font size="1"><center>ID Transaksipinjam</font></th>
           <th><font size="1"><center>No Induk</font></th>
           <th><font size="1"><center>Nama</font></th>
           <th><font size="1"><center>ID Buku</font></th>
           <th><font size="1"><center>Judul Buku</font></th>
           <th><font size="1"><center>Tanggal Pengembalian</font></th>
           <th><font size="1"><center>Jumlah Denda (Rp)</font></th>
        </tr>
        <?php
            $nomor=1;
            while($hasil = mysql_fetch_array($data)){
        ?>
        <tr>
             <td><font size="1"><?php echo $nomor++ ?></font></td>
             <td><font size="1"><?php echo $hasil['id_transaksikembali']; ?></font></td>
             <td><font size="1"><?php echo $hasil['id_transaksipinjam']; ?></font></td>
             <td><font size="1"><?php echo $hasil['no_induk']; ?></font></td>
             <td><font size="1"><?php echo $hasil['nama_siswa']; ?></font></td>
             <td><font size="1"><?php echo $hasil['id_buku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['judul_buku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['tgltransaksikembali']; ?></font></td>
             <td style="text-align:right;"><font size="1"><?php echo $hasil['jumlahdenda_transaksikembali']; ?></font></td>
        <?php } ?>
    </table>
    <?php
      $resulttotaldenda = mysql_query("SELECT SUM(jumlahdenda_transaksikembali) as totaldenda
                                        FROM transaksikembali
                                        WHERE jumlahdenda_transaksikembali>0");
      $hasildendatotal = mysql_fetch_array($resulttotaldenda);
      echo "<a style='color:red;'><b>Total Denda Pengembalian Buku:  Rp. ". $hasildendatotal['totaldenda']."</b></a>";
    ?>
    <script>
  window.load = print_d();
  function print_d(){
   window.print();
  }
 </script>
</body>
</html>
