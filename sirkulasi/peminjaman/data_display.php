
<?php

	$table=$_GET['table'];
	if($table=='pinjam'){

		include 'connection.php';
		$query = "SELECT TP.id_transaksipinjam, TP.no_induk, A.nama_siswa ,B.judul_buku, DATE_FORMAT(TP.tgl_pinjam,'%d %b %Y') as tglpinjam, DATE_FORMAT(TP.tgl_kembali,'%d %b %Y') as tglkembali, if(TP.status_transaksipinjam=0,'Dipinjam',if(TP.status_transaksipinjam=2,'Diperpanjang','Dikembalikan')) as status,TP.status_transaksipinjam
							FROM transaksipinjam TP, anggota A, Buku B
							WHERE TP.no_induk=A.no_induk and B.id_buku=TP.id_buku
							ORDER BY TP.id_transaksipinjam DESC
						 "; //the query for get all data in tb_student

		$tableStructure='
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Pinjam</th>
					<th>No Induk</th>
					<th>Nama</th>
					<th>Judul</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
					<th>Status</th>
					<th class="tengah">Action</th>
				</tr>
			</thead>
			<tbody>';
		$nomor=1;
		$result = mysql_query($query);

		while ($data = mysql_fetch_array($result)){ //mysql_fetch_array = get the query data into array
		if($data['status']=="Diperpanjang" or $data['status']=="Dipinjam"){$cetak="active";}else{$cetak="disabled";};
		$tableStructure=$tableStructure.
		'
				<tr>
					<td>
							'.$nomor++.'
					</td>
					<td>'.$data['id_transaksipinjam'].'</td>
					<td>'.$data['no_induk'].'</td>
					<td>'.$data['nama_siswa'].'</td>
					<td>'.$data['judul_buku'].'</td>
					<td>'.$data['tglpinjam'].'</td>
					<td>'.$data['tglkembali'].'</td>
					<td>'.$data['status'].'</td>
					<td class="tengah">
						<button type="button" class="btn btn-primary btn-xs btn-danger '.$cetak.' "
						onclick="hapusPinjam(\''.$data['id_transaksipinjam'].'\')">
							Hapus
						</button>
					</td>
				</tr>';
		}
		$tableStructure=$tableStructure.'
			<tbody>
			</table>';
		echo $tableStructure;
		}
?>
