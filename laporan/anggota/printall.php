<?php

include('session.php');
if (empty($_SESSION['login_user']) AND empty($_SESSION['login_pass'])){
  header("location: ../../index.php");
}

include 'connection.php';
$query = "SELECT no_induk, nama_siswa, alamat_siswa, jenkel_siswa, notlp_siswa,
                  (SELECT COUNT(ID_TRANSAKSIPINJAM) FROM transaksipinjam WHERE NO_INDUK=A.NO_INDUK) as totalpinjam,
                  (SELECT SUM(TK.JUMLAHDENDA_TRANSAKSIKEMBALI)
                   FROM transaksikembali TK, transaksipinjam TP
                   WHERE TK.ID_TRANSAKSIPINJAM=TP.ID_TRANSAKSIPINJAM AND TP.NO_INDUK=A.NO_INDUK) as totaldenda
          FROM anggota A
          ORDER BY nama_siswa ASC
         ";
$data = mysql_query($query);
?>
<html>
<head>
 <title>Laporan Semua Data Anggota Perpustakaan</title>
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
 <center><img src="../../assets/img/laporanheader.png" alt="Mountain View" style="width:800px;height:228px;"></center>
 <center><p><ins><b>Laporan Semua Anggota Perpustakaan</b></ins></p></center>
 <table  class="table table-bordered table-striped table-condensed">
        <tr>
           <th><font size="1"><center>No.</font></th>
           <th><font size="1"><center>No Induk/font></th>
           <th><font size="1"><center>Nama Siswa</font></th>
           <th><font size="1"><center>Alamat</font></th>
           <th><font size="1"><center>Jenis Kelamin</font></th>
           <th><font size="1"><center>Nomor Telepon</font></th>
           <th><font size="1"><center>Total Peminjaman Buku</font></th>
           <th><font size="1"><center>Total Bayar Denda</font></th>
        </tr>
        <?php
            $nomor=1;
            while($hasil = mysql_fetch_array($data)){
        ?>
        <tr>
             <td><font size="1"><?php echo $nomor++ ?></font></td>
             <td><font size="1"><?php echo $hasil['no_induk']; ?></font></td>
             <td><font size="1"><?php echo $hasil['nama_siswa']; ?></font></td>
             <td><font size="1"><?php echo $hasil['alamat_siswa']; ?></font></td>
             <td><font size="1"><?php echo $hasil['jenkel_siswa']; ?></font></td>
             <td><font size="1"><?php echo $hasil['notlp_siswa']; ?></font></td>
             <td><font size="1"><?php echo $hasil['totalpinjam']; ?></font></td>
             <td><font size="1"><?php echo $hasil['totaldenda']; ?></font></td>
        <?php } ?>
    </table>
    <script type="text/javascript">
  window.load = print_d();
  function print_d(){
   window.print();
  window.close();
  }
 </script>
</body>
</html>
