
<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='insert_petugas'){
		$id_petugas=$_GET['id_petugas'];
		$nama_petugas=$_GET['nama_petugas'];
		$alamat_petugas=$_GET['alamat_petugas'];
		$jenkel_petugas=$_GET['jenkel_petugas'];
		$notlp_petugas=$_GET['notlp_petugas'];
		$username=$_GET['username'];
		$password=$_GET['password'];

		$query="INSERT INTO petugas(id_petugas,nama_petugas,alamat_petugas,jenkel_petugas,notlp_petugas,username,password)
				VALUES('".$id_petugas."','".$nama_petugas."','".$alamat_petugas."','".$jenkel_petugas."','".$notlp_petugas."','".$username."','".$password."')";
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
