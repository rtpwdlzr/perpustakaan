
<?php

	$table=$_GET['table'];
	if($table=='kembali'){

		include 'connection.php';
		$query = "SELECT TP.id_transaksipinjam, TP.no_induk, A.nama_siswa ,B.judul_buku, DATE_FORMAT(TP.tgl_pinjam,'%d %b %Y') as tglpinjam, DATE_FORMAT(TP.tgl_kembali,'%d %b %Y') as tglkembali, if((timestampdiff(day,TP.tgl_kembali,curdate())*500)>0,timestampdiff(day,TP.tgl_kembali,curdate())*500,0) as denda
							FROM transaksipinjam TP, anggota A, Buku B
							WHERE TP.no_induk=A.no_induk and B.id_buku=TP.id_buku and (TP.status_transaksipinjam='0' or TP.status_transaksipinjam='2')
							GROUP BY TP.id_transaksipinjam
							ORDER BY TP.id_transaksipinjam ASC
						 "; //the query for get all data in tb_student

		$tableStructure='
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Pinjam</th>
					<th>No Induk</th>
					<th>Nama</th>
					<th>Judul Buku</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
					<th>Denda</th>
					<th class="tengah">Action</th>
				</tr>
			</thead>
			<tbody>';
		$nomor=1;
		$hasildenda=0;
		$result = mysql_query($query);
		while ($data = mysql_fetch_array($result)){ //mysql_fetch_array = get the query data into array
		if($data['denda']>0){$cetak="disabled";}else{$cetak="active";};
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
					<td>'.$data['denda'].'</td>
					<td class="tengah">
						<button type="button" class="btn btn-primary btn-xs btn-warning"
						onclick="konfirmasikembali(\''.$data['id_transaksipinjam'].'\')">
							Kembali
						</button>
						<button type="button" class="btn btn-primary btn-xs btn-danger '.$cetak.'"
						onclick="perpanjangan(\''.$data['id_transaksipinjam'].'\')">
							Perpanjang
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
