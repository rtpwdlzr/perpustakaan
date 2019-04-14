<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='delete_datapetugas'){

		$id_petugas=$_GET['id_petugas'];
		// echo"$id_buku";

	$result=mysql_query("DELETE from petugas WHERE id_petugas='$id_petugas'");

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
