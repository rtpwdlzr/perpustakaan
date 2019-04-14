<?php

include('session.php');
if (empty($_SESSION['login_user']) AND empty($_SESSION['login_pass'])){
  header("location: ../../index.php");
}

include 'connection.php';
$query = "SELECT B.id_buku, JB.nama_jenisbuku, B.judul_buku, B.pengarang_buku, B.penerbit_buku, B.tahunterbit_buku,
                  DATE_FORMAT(B.tanggalmasuk_buku,'%d %b %Y') as tanggalmasukbuku, B.jumlah_buku, B.total_buku,
                  (SELECT COUNT(ID_TRANSAKSIPINJAM) FROM transaksipinjam WHERE ID_BUKU=B.id_buku) as totaldipinjam
          FROM buku B, jenis_buku JB
          WHERE  B.id_jenisbuku=JB.id_jenisbuku
          ORDER BY B.id_buku ASC
         "; //the query for get all data in tb_student
$data = mysql_query($query);
?>
<html>
<head>
 <title>Laporan Semua Data Koleksi Buku</title>
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
 <center><img src="../../assets/img/laporanheader.png" alt="Mountain View" style="width:800px;height:228px;"></center>
 <center><p><ins><b>Laporan Semua Data Koleksi Buku</b></ins></p></center>
 <table  class="table table-bordered table-striped table-condensed">
        <tr>
           <th><font size="1"><center>No.</font></th>
           <th><font size="1"><center>ID Buku</font></th>
           <th><font size="1"><center>Nama jenis</font></th>
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
    </table>
    <script>
  window.load = print_d();
  function print_d(){
   window.print();
  }
 </script>
</body>
</html>
