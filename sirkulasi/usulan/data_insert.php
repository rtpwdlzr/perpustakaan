<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='insert_usulan'){
		$id_usulbuku=$_GET['id_usulbuku'];
		$id_petugas=$_GET['id_petugas'];
		$judul_usulbuku=$_GET['judul_usulbuku'];
		$pengarang_usulbuku=$_GET['pengarang_usulbuku'];
		$penerbit_usulbuku=$_GET['penerbit_usulbuku'];
		$tahunterbit_usulbuku=$_GET['tahunterbit_usulbuku'];
		$keterangan_usulbuku=$_GET['keterangan_usulbuku'];
		$perkiraanharga_usulbuku=$_GET['perkiraanharga_usulbuku'];

		$query="INSERT INTO usulanbuku(id_usulbuku,id_petugas,judul_usulbuku,pengarang_usulbuku,penerbit_usulbuku,tahunterbit_usulbuku,keterangan_usulbuku,perkiraanharga_usulbuku)
				VALUES('".$id_usulbuku."','".$id_petugas."','".$judul_usulbuku."','".$pengarang_usulbuku."','".$penerbit_usulbuku."','".$tahunterbit_usulbuku."','".$keterangan_usulbuku."','".$perkiraanharga_usulbuku."')";
	}

	$result=mysql_query($query);

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
