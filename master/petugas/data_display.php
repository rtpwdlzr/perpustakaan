
<?php

	$table=$_GET['table'];
	if($table=='petugas'){

		include 'connection.php';
		$query = "SELECT id_petugas, nama_petugas, alamat_petugas, jenkel_petugas, notlp_petugas
							FROM petugas
							ORDER BY id_petugas ASC
						 "; //the query for get all data in tb_student

		$tableStructure='
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Petugas</th>
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
					<td>'.$data['id_petugas'].'</td>
					<td>'.$data['nama_petugas'].'</td>
					<td>'.$data['alamat_petugas'].'</td>
					<td>'.$data['jenkel_petugas'].'</td>
					<td>'.$data['notlp_petugas'].'</td>
					<td class="tengah">
						<button type="button" class="btn btn-primary btn-xs btn-warning"
						onclick="display_update_petugas(\''.$data['id_petugas'].'\')">
							Edit
						</button>
						<button type="button" class="btn btn-primary btn-xs btn-danger" onclick="hapusPetugas(\''.$data['id_petugas'].'\');">
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
