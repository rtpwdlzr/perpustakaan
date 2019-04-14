<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='delete_datahilang'){

		$id_hilangbuku=$_GET['id_hilangbuku'];
		// echo"$id_buku";
		$dt=mysql_query("select B.jumlah_buku, B.total_buku, HB.id_buku from hilangbuku HB, buku B where HB.id_buku=B.id_buku and id_hilangbuku='".$id_hilangbuku."'");
		$datahasil=mysql_fetch_array($dt);
		$ambilIDBUKU=$datahasil['id_buku'];
		$sisajumlah=$datahasil['jumlah_buku']+1;
		$sisatotal=$datahasil['total_buku']+1;
		$queryupdate="update buku set jumlah_buku='$sisajumlah', total_buku='$sisatotal' where id_buku='".$ambilIDBUKU."'";

		$result=mysql_query("DELETE from hilangbuku WHERE id_hilangbuku='$id_hilangbuku'");
			$result1=mysql_query($queryupdate);
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
