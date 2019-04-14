<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='delete_databuku'){

		$id_buku=$_GET['id_buku'];
		// echo"$id_buku";

	$result=mysql_query("DELETE from buku WHERE ID_BUKU='$id_buku'");

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
