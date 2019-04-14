
<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='insert_pinjam'){
		$id_transaksipinjam=$_GET['id_transaksipinjam'];
		$no_induk=$_GET['no_induk'];
		$id_petugas=$_GET['id_petugas'];
		$id_buku=$_GET['id_buku'];
		$tgl_kembali=$_GET['tgl_kembali'];

		$dt=mysql_query("select jumlah_buku from buku where id_buku='".$id_buku."'");
		$datahasil=mysql_fetch_array($dt);
		$sisa=$datahasil['jumlah_buku']-1;
		$queryupdate="update buku set jumlah_buku='$sisa' where id_buku='".$id_buku."'";


		$query="INSERT INTO transaksipinjam(id_transaksipinjam,no_induk,id_petugas,id_buku,tgl_kembali, status_transaksipinjam)
				VALUES('".$id_transaksipinjam."','".$no_induk."','".$id_petugas."','".$id_buku."','".$tgl_kembali."', 0)";
	}

	$result=mysql_query($query);
	$result3=mysql_query($queryupdate);

	if ($result==$result3){
		echo 	'<script language="javascript">;
					alert("Data baru berhasil ditambahkan");
						location.reload();
				</script>';
	}
	else {
		echo 	'<script language="javascript">;
					Kesalahan!'.mysql_error();
		echo'		alert("Silakan Kamu Periksa Kembali Dengan Benar");
				</script>';
		exit();

	}
?>
