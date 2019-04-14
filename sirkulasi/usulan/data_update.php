<?php
	include "connection.php";
	$table=$_GET['table'];

	//echo $table;

	if($table=='update_usulan'){
	//get the value from form update
	$id_usulbuku=$_GET['id_usulbuku'];
	$id_petugas=$_GET['id_petugas'];
	$judul_usulbuku=$_GET['judul_usulbuku'];
	$pengarang_usulbuku=$_GET['pengarang_usulbuku'];
	$penerbit_usulbuku=$_GET['penerbit_usulbuku'];
	$tahunterbit_usulbuku=$_GET['tahunterbit_usulbuku'];
	$keterangan_usulbuku=$_GET['keterangan_usulbuku'];
	$perkiraanharga_usulbuku=$_GET['perkiraanharga_usulbuku'];


	//query for update data in database
	$query = "UPDATE usulanbuku SET id_petugas = '$id_petugas', judul_usulbuku = '$judul_usulbuku',
				pengarang_usulbuku = '$pengarang_usulbuku', penerbit_usulbuku = '$penerbit_usulbuku', tahunterbit_usulbuku = '$tahunterbit_usulbuku', keterangan_usulbuku = '$keterangan_usulbuku', perkiraanharga_usulbuku = '$perkiraanharga_usulbuku'
				WHERE id_usulbuku='$id_usulbuku'";
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
