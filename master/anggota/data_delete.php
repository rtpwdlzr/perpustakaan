<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='delete_dataanggota'){

		$no_induk=$_GET['no_induk'];
		// echo"$id_buku";

	$result=mysql_query("DELETE from anggota WHERE no_induk='$no_induk'");

	if (!$result){
		echo 	'<script language="javascript">;
					Kesalahan!'.mysql_error();
		echo'		alert("Silakan Kamu Periksa Kembali Dengan Benar");
				</script>';
	}
	else {
		echo 	'<script language="javascript">;
					alert("Data berhasil dihapus");
				</script>';
		exit();
	}
}
?>
