
<?php

	$table=$_GET['table'];
	if($table=='anggota'){

		include 'connection.php';
		$query = "SELECT no_induk, nama_siswa, alamat_siswa, jenkel_siswa, notlp_siswa,
											(SELECT COUNT(ID_TRANSAKSIPINJAM) FROM transaksipinjam WHERE NO_INDUK=A.NO_INDUK) as totalpinjam,
											(SELECT SUM(TK.JUMLAHDENDA_TRANSAKSIKEMBALI)
											 FROM transaksikembali TK, transaksipinjam TP
											 WHERE TK.ID_TRANSAKSIPINJAM=TP.ID_TRANSAKSIPINJAM AND TP.NO_INDUK=A.NO_INDUK) as totaldenda
							FROM anggota A
							ORDER BY nama_siswa ASC
						 ";

		$tableStructure='
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>No</th>
					<th>No Induk</th>
					<th>Nama Siswa</th>
					<th>Alamat</th>
					<th>Jenis Kelamin</th>
					<th>Nomor Telepon</th>
					<th>Total Peminjaman Buku</th>
					<th>Total Bayar Denda</th>
				</tr>
			</thead>
			<tbody>';
		$nomor=1;
		$result = mysql_query($query);

		while ($data = mysql_fetch_array($result)){ //mysql_fetch_array = get the query data into array
		$tableStructure=$tableStructure.
		'
				<tr>
					<td>
							'.$nomor++.'
					</td>
					<td>'.$data['no_induk'].'</td>
					<td>'.$data['nama_siswa'].'</td>
					<td>'.$data['alamat_siswa'].'</td>
					<td>'.$data['jenkel_siswa'].'</td>
					<td>'.$data['notlp_siswa'].'</td>
					<td>'.$data['totalpinjam'].'</td>
					<td>'.$data['totaldenda'].'</td>
				</tr>';
		}
		$tableStructure=$tableStructure.'
			<tbody>
			</table>';
		echo $tableStructure;
		}
?>

