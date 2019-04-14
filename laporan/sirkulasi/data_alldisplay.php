
<?php

	$table=$_GET['table'];
	if($table=='sirkulasi'){

		include 'connection.php';
		$query = "SELECT TP.id_transaksipinjam, A.no_induk, A.nama_siswa, B.id_buku, B.judul_buku, DATE_FORMAT(TP.tgl_pinjam,'%d %b %Y') as tglpinjam, DATE_FORMAT(TP.tgl_kembali,'%d %b %Y') as tglkembali, if(TP.status_transaksipinjam=0,'Dipinjam',if(TP.status_transaksipinjam=2,'Diperpanjang','Dikembalikan')) as status
							FROM transaksipinjam TP, anggota A, buku B
							WHERE TP.no_induk=A.no_induk and TP.id_buku=B.id_buku
							ORDER BY TP.id_transaksipinjam ASC
						 ";

		$tableStructure='
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Transaksipinjam</th>
					<th>No Induk</th>
					<th>Nama</th>
					<th>ID Buku</th>
					<th>Judul Buku</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
					<th>Status Pinjam</th>
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
					<td>'.$data['id_transaksipinjam'].'</td>
					<td>'.$data['no_induk'].'</td>
					<td>'.$data['nama_siswa'].'</td>
					<td>'.$data['id_buku'].'</td>
					<td>'.$data['judul_buku'].'</td>
					<td>'.$data['tglpinjam'].'</td>
					<td>'.$data['tglkembali'].'</td>
					<td>'.$data['status'].'</td>
				</tr>';
		}
		$tableStructure=$tableStructure.'
			<tbody>
			</table>';
		echo $tableStructure;
		}
?>
