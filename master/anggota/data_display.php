
<?php

	$table=$_GET['table'];
	if($table=='anggota'){

		include 'connection.php';
		$query = "SELECT no_induk, nama_siswa, alamat_siswa, jenkel_siswa, notlp_siswa
							FROM anggota
							ORDER BY nama_siswa ASC
						 "; //the query for get all data in tb_student

		$tableStructure='
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>No</th>
					<th>No Induk</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Jenis Kelamin</th>
					<th>No Telepon</th>
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
					<td>'.$data['no_induk'].'</td>
					<td>'.$data['nama_siswa'].'</td>
					<td>'.$data['alamat_siswa'].'</td>
					<td>'.$data['jenkel_siswa'].'</td>
					<td>'.$data['notlp_siswa'].'</td>
					<td class="tengah">
						<button type="button" class="btn btn-primary btn-xs btn-warning"
						onclick="display_update_anggota(\''.$data['no_induk'].'\')">
							Edit
						</button>
						<button type="button" class="btn btn-primary btn-xs btn-danger" onclick="hapusAnggota(\''.$data['no_induk'].'\');">
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
