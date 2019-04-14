<?php
	include "connection.php";
	$table=$_GET['table'];

	//echo $table;

	if($table=='update_petugas'){
	//get the value from form update
	$id_petugas=$_GET['id_petugas'];
	$nama_petugas=$_GET['nama_petugas'];
	$alamat_petugas=$_GET['alamat_petugas'];
	$jenkel_petugas=$_GET['jenkel_petugas'];
	$notlp_petugas=$_GET['notlp_petugas'];



	//query for update data in database
	$query = "UPDATE petugas SET nama_petugas = '$nama_petugas', alamat_petugas = '$alamat_petugas',
				jenkel_petugas = '$jenkel_petugas', notlp_petugas = '$notlp_petugas'
				WHERE id_petugas='$id_petugas'";
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
