<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='delete_datausulan'){

		$id_usulbuku=$_GET['id_usulbuku'];
		// echo"$id_buku";

	$result=mysql_query("DELETE from usulanbuku WHERE id_usulbuku='$id_usulbuku'");

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
