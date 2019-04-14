
<?php

	$table=$_GET['table'];
	if($table=='hilang'){

		include 'connection.php';
		$query = "SELECT HB.id_hilangbuku, B.judul_buku, A.nama_siswa, HB.keterangan_hilangbuku, HB.solusi_hilangbuku, DATE_FORMAT(HB.tgl_hilangbuku,'%d %b %Y') as tglhilang
							FROM hilangbuku HB, anggota A, buku B
							WHERE HB.no_induk=A.no_induk and HB.id_buku=B.id_buku
							ORDER BY HB.id_hilangbuku ASC
						 "; //the query for get all data in tb_student

		$tableStructure='
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Hilang Buku</th>
					<th>Nama Siswa</th>
					<th>Judul</th>
					<th>Keterangan Hilang</th>
					<th>Solusi</th>
					<th>Tanggal hilang</th>
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
					<td>'.$data['id_hilangbuku'].'</td>
					<td>'.$data['nama_siswa'].'</td>
					<td>'.$data['judul_buku'].'</td>
					<td>'.$data['keterangan_hilangbuku'].'</td>
					<td>'.$data['solusi_hilangbuku'].'</td>
					<td>'.$data['tglhilang'].'</td>
					<td class="tengah">
						<button type="button" class="btn btn-primary btn-xs btn-danger" onclick="hapuHilang(\''.$data['id_hilangbuku'].'\');">
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
