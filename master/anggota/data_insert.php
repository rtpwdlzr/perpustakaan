
<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='insert_anggota'){
		$no_induk=$_GET['no_induk'];
		$nama_siswa=$_GET['nama_siswa'];
		$alamat_siswa=$_GET['alamat_siswa'];
		$jenkel_siswa=$_GET['jenkel_siswa'];
		$notlp_siswa=$_GET['notlp_siswa'];

		$query="INSERT INTO anggota(no_induk,nama_siswa,alamat_siswa,jenkel_siswa,notlp_siswa)
				VALUES('".$no_induk."','".$nama_siswa."','".$alamat_siswa."','".$jenkel_siswa."','".$notlp_siswa."')";
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
