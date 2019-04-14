
<?php

	$table=$_GET['table'];
	if($table=='usulan'){

		include 'connection.php';
		$query = "SELECT UB.id_usulbuku, P.nama_petugas, UB.judul_usulbuku, UB.pengarang_usulbuku, UB.penerbit_usulbuku, UB.tahunterbit_usulbuku, UB.keterangan_usulbuku, UB.perkiraanharga_usulbuku, DATE_FORMAT(UB.tgl_usulbuku,'%d %b %Y') as tglusul
							FROM usulanbuku UB, petugas P
							WHERE UB.id_petugas=P.id_petugas
							ORDER BY UB.id_usulbuku ASC
						 "; //the query for get all data in tb_student

		$tableStructure='
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Usul Buku</th>
					<th>Nama Petugas</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Tahun Terbit</th>
					<th>Keterangan</th>
					<th>Perkiraan Harga</th>
					<th>Tanggal Usulan</th>
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
					<td>'.$data['id_usulbuku'].'</td>
					<td>'.$data['nama_petugas'].'</td>
					<td>'.$data['judul_usulbuku'].'</td>
					<td>'.$data['pengarang_usulbuku'].'</td>
					<td>'.$data['penerbit_usulbuku'].'</td>
					<td>'.$data['tahunterbit_usulbuku'].'</td>
					<td>'.$data['keterangan_usulbuku'].'</td>
					<td>'.$data['perkiraanharga_usulbuku'].'</td>
					<td>'.$data['tglusul'].'</td>
					<td class="tengah">
						<button type="button" class="btn btn-primary btn-xs btn-warning"
						onclick="display_update_usulan(\''.$data['id_usulbuku'].'\')">
							Edit
						</button>
						<button type="button" class="btn btn-primary btn-xs btn-danger" onclick="hapusUsulan(\''.$data['id_usulbuku'].'\');">
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
