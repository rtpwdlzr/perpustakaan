
<?php
	include 'connection.php';

	$table=$_GET['table'];

	if($table=='insert_kembali'){
		$id_transaksikembali=$_GET['id_transaksikembali'];
		$id_transaksipinjam=$_GET['id_transaksipinjam'];
		$jumlahdenda_transaksi=$_GET['jumlahdenda_transaksi'];

		//ambil data id_buku dan jumlah_buku
		$dt=mysql_query("SELECT B.jumlah_buku, B.id_buku
										 FROM buku B, transaksipinjam TP
									   WHERE TP.id_buku=B.id_buku and id_transaksipinjam='".$id_transaksipinjam."'");

		//eksekusi ambil data id_buku dan jumlah_buku
		$datahasil=mysql_fetch_array($dt);

		$ambilIDBUKU=$datahasil['id_buku']; //simpan data id_buku
		$sisa=$datahasil['jumlah_buku']+1; // simpan data jumlah_buku

		$queryupdate="update buku set jumlah_buku='".$sisa."' where id_buku='".$ambilIDBUKU."'";


		$queryinsert="insert into transaksikembali(id_transaksikembali,id_transaksipinjam,jumlahdenda_transaksikembali) values('".$id_transaksikembali."','".$id_transaksipinjam."','".$jumlahdenda_transaksi."')";


		$queryupdatestatus="update transaksipinjam set status_transaksipinjam='1' where id_transaksipinjam='".$id_transaksipinjam."'";
	}

	$resultqueryupdate=mysql_query($queryupdate);  //perintah update
	$resultqueryinsert=mysql_query($queryinsert); //perintah insert tabel kembali
	$resultqueryupdatestatus=mysql_query($queryupdatestatus); //perintah update status peminjaman


	if ($resultqueryinsert==$resultqueryupdatestatus || $resultqueryupdatestatus==$resultqueryupdate){
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
