<?php
	include "connection.php";
	$table=$_GET['table'];

	//echo $table;

	if($table=='update_anggota'){
	//get the value from form update
	$no_induk=$_GET['no_induk'];
	$nama_siswa=$_GET['nama_siswa'];
	$alamat_siswa=$_GET['alamat_siswa'];
	$jenkel_siswa=$_GET['jenkel_siswa'];
	$notlp_siswa=$_GET['notlp_siswa'];


	//query for update data in database
	$query = "UPDATE anggota SET nama_siswa = '$nama_siswa', alamat_siswa = '$alamat_siswa',
				jenkel_siswa = '$jenkel_siswa', notlp_siswa = '$notlp_siswa'
				WHERE no_induk='$no_induk'";
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
