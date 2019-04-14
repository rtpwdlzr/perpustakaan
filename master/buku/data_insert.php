
<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='insert_buku'){
		$id_buku=$_GET['id_buku'];
		$id_jenisbuku=$_GET['id_jenisbuku'];
		$judul_buku=$_GET['judul_buku'];
		$pengarang_buku=$_GET['pengarang_buku'];
		$penerbit_buku=$_GET['penerbit_buku'];
		$tahunterbit_buku=$_GET['tahunterbit_buku'];
		$jumlah_buku=$_GET['jumlah_buku'];
		$total_buku=$_GET['total_buku'];

		$query="INSERT INTO buku(id_buku,id_jenisbuku,judul_buku,pengarang_buku,penerbit_buku,tahunterbit_buku,jumlah_buku,total_buku)
				VALUES('".$id_buku."','".$id_jenisbuku."','".$judul_buku."','".$pengarang_buku."','".$penerbit_buku."','".$tahunterbit_buku."','".$jumlah_buku."','".$total_buku."')";
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
