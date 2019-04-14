
<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='insert_hilang'){
		$id_hilangbuku=$_GET['id_hilangbuku'];
	  $id_buku=$_GET['id_buku'];
		$no_induk=$_GET['no_induk'];
		$keterangan_hilangbuku=$_GET['keterangan_hilangbuku'];
		$solusi_hilangbuku=$_GET['solusi_hilangbuku'];

		$dt=mysql_query("select jumlah_buku, total_buku from buku where id_buku='".$id_buku."'");
		$datahasil=mysql_fetch_array($dt);
		$sisajumlah=$datahasil['jumlah_buku']-1;
		$sisatotal=$datahasil['total_buku']-1;
		$queryupdate="update buku set jumlah_buku='$sisajumlah', total_buku='$sisatotal' where id_buku='".$id_buku."'";

		$query="INSERT INTO hilangbuku(id_hilangbuku,id_buku,no_induk,keterangan_hilangbuku,solusi_hilangbuku)
				VALUES('".$id_hilangbuku."','".$id_buku."','".$no_induk."','".$keterangan_hilangbuku."','".$solusi_hilangbuku."')";
	}

	$result=mysql_query($query);
	$result1=mysql_query($queryupdate);

	if (!$result){
		echo 	'<script language="javascript">;
					Kesalahan!'.mysql_error();
		echo'		alert("Silakan Kamu Periksa Kembali Dengan Benar");
				</script>';
	}
	else {
		echo 	'<script language="javascript">;
					alert("Data baru berhasil ditambahkan");
						location.reload();
				</script>';
		exit();
	}
?>
