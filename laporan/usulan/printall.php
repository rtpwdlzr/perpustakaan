<?php

include('session.php');
if (empty($_SESSION['login_user']) AND empty($_SESSION['login_pass'])){
  header("location: ../../index.php");
}

include 'connection.php';
$query = "SELECT UB.id_usulbuku, P.nama_petugas, UB.judul_usulbuku, UB.pengarang_usulbuku, UB.penerbit_usulbuku, UB.tahunterbit_usulbuku, UB.keterangan_usulbuku, UB.perkiraanharga_usulbuku, DATE_FORMAT(UB.tgl_usulbuku,'%d %b %Y') as tglusulbuku
          FROM usulanbuku UB, petugas P
          WHERE UB.id_petugas=P.id_petugas
          ORDER BY UB.id_usulbuku ASC
         "; //the query for get all data in tb_student
$data = mysql_query($query);
?>
<html>
<head>
 <title>Laporan Semua Data Usulan Buku</title>
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
 <center><img src="../../assets/img/laporanheader.png" alt="Mountain View" style="width:800px;height:228px;"></center>
 <center><p><ins><b>Laporan Semua Data Usulan Buku</b></ins></p></center>
 <table  class="table table-bordered table-striped table-condensed">
        <tr>
           <th><font size="1"><center>No.</font></th>
           <th><font size="1"><center>ID Usul Buku</font></th>
           <th><font size="1"><center>Nama Petugas</font></th>
           <th><font size="1"><center>Judul</font></th>
           <th><font size="1"><center>Pengarang</font></th>
           <th><font size="1"><center>Penerbit</font></th>
           <th><font size="1"><center>Tahun Terbit</font></th>
           <th><font size="1"><center>Keterangan</font></th>
           <th><font size="1"><center>Perkiraan Harga</font></th>
           <th><font size="1"><center>Tanggal Usulan</font></th>
        </tr>
        <?php
            $nomor=1;
            while($hasil = mysql_fetch_array($data)){
        ?>
        <tr>
             <td><font size="1"><?php echo $nomor++ ?></font></td>
             <td><font size="1"><?php echo $hasil['id_usulbuku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['nama_petugas']; ?></font></td>
             <td><font size="1"><?php echo $hasil['judul_usulbuku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['pengarang_usulbuku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['penerbit_usulbuku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['tahunterbit_usulbuku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['keterangan_usulbuku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['perkiraanharga_usulbuku']; ?></font></td>
             <td><font size="1"><?php echo $hasil['tglusulbuku']; ?></font></td>
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
