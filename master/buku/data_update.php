<?php
	include "connection.php";
	$table=$_GET['table'];

	//echo $table;

	if($table=='update_buku'){
	//get the value from form update
	$id_buku=$_GET['id_buku'];
	$id_jenisbuku=$_GET['id_jenisbuku'];
	$judul_buku=$_GET['judul_buku'];
	$pengarang_buku=$_GET['pengarang_buku'];
	$penerbit_buku=$_GET['penerbit_buku'];
	$tahunterbit_buku=$_GET['tahunterbit_buku'];
	$jumlah_buku=$_GET['jumlah_buku'];

	//query for update data in database
	$query = "UPDATE buku SET id_jenisbuku = '$id_jenisbuku', judul_buku = '$judul_buku',
				pengarang_buku = '$pengarang_buku', penerbit_buku = '$penerbit_buku', tahunterbit_buku = '$tahunterbit_buku',
				jumlah_buku = '$jumlah_buku'
				WHERE ID_BUKU='$id_buku'";
	}
	 $hasil = mysql_query($query);

	 //see the result
	if (!$hasil){
		echo 	'<script language="javascript">;
					Kesalahan!'.mysql_error();
		echo'		alert("Silakan Kamu Periksa Kembali Dengan Benar");
						location.reload();
				</script>';

	}
	else {
		echo 	'<script language="javascript">;
					alert("Data berhasil diubah");
					location.reload();
				</script>';

		exit();
	}
?>
