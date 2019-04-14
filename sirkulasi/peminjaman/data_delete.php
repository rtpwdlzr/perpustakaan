<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='delete_datapinjam'){

		$id_transaksipinjam=$_GET['id_transaksipinjam'];
		// echo"$id_buku";
		$dt=mysql_query("SELECT B.jumlah_buku, B.id_buku
										 FROM buku B, transaksipinjam TP
									   WHERE TP.id_buku=B.id_buku and id_transaksipinjam='".$id_transaksipinjam."'");
	  $datahasil=mysql_fetch_array($dt);
		$ambilIDBUKU=$datahasil['id_buku']; //simpan data id_buku
		$sisa=$datahasil['jumlah_buku']+1;
		$queryupdate="update buku set jumlah_buku='$sisa' where id_buku='".$ambilIDBUKU."'";
		$resultqueryupdate=mysql_query($queryupdate);

	 	$result=mysql_query("DELETE from transaksipinjam WHERE id_transaksipinjam='$id_transaksipinjam'");

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
