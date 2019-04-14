
<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='data_perpanjang'){
		$tgl_kembali=$_GET['tgl_kembali'];
		$id_transaksipinjam=$_GET['id_transaksipinjam'];

		//ambil data id_buku dan jumlah_buku

		$queryupdatetanggalkembali="update transaksipinjam set status_transaksipinjam='2', tgl_kembali='".$tgl_kembali."' where id_transaksipinjam='".$id_transaksipinjam."'";
	}

	$resultqueryupdatetglkembali=mysql_query($queryupdatetanggalkembali); //perintah update status peminjaman


	if (!$resultqueryinsert){
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
