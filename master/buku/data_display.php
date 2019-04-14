
<?php

	$table=$_GET['table'];
	if($table=='buku'){

		include 'connection.php';
		$query = "SELECT B.id_buku, JB.nama_jenisbuku, B.judul_buku, B.pengarang_buku, B.penerbit_buku, B.tahunterbit_buku, DATE_FORMAT(B.tanggalmasuk_buku,'%d %b %Y') as tglmasuk, B.jumlah_buku, B.total_buku, (B.total_buku-B.jumlah_buku) as dipinjam
							FROM buku B, jenis_buku JB
							WHERE  B.id_jenisbuku=JB.id_jenisbuku
							ORDER BY B.id_buku ASC
						 "; //the query for get all data in tb_student

		$tableStructure='
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Buku</th>
					<th>Jenis Buku</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Tahun Terbit</th>
					<th>Tanggal Masuk</th>
					<th>Dipinjamkan</th>
					<th>Jumlah</th>
					<th>Total</th>
					<th class="tengah">Action</th>
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
					<td>'.$data['id_buku'].'</td>
					<td>'.$data['nama_jenisbuku'].'</td>
					<td>'.$data['judul_buku'].'</td>
					<td>'.$data['pengarang_buku'].'</td>
					<td>'.$data['penerbit_buku'].'</td>
					<td>'.$data['tahunterbit_buku'].'</td>
					<td>'.$data['tglmasuk'].'</td>
					<td>'.$data['dipinjam'].'</td>
					<td>'.$data['jumlah_buku'].'</td>
					<td>'.$data['total_buku'].'</td>
					<td class="tengah">
						<button type="button" class="btn btn-primary btn-xs btn-warning"
						onclick="display_update_buku(\''.$data['id_buku'].'\')">
							Edit
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
