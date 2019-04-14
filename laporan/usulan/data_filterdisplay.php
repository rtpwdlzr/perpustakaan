
<?php
include 'connection.php';

	$table=$_GET['table'];
	if($table=='usulanfilter'){

		if($_GET['bulan']=='Januari'){$bulan=1;}
		elseif($_GET['bulan']=='Februari'){$bulan=2;}
		elseif($_GET['bulan']=='Maret'){$bulan=3;}
		elseif($_GET['bulan']=='April'){$bulan=4;}
		elseif($_GET['bulan']=='Mei'){$bulan=5;}
		elseif($_GET['bulan']=='Juni'){$bulan=6;}
		elseif($_GET['bulan']=='Juli'){$bulan=7;}
		elseif($_GET['bulan']=='Agustus'){$bulan=8;}
		elseif($_GET['bulan']=='September'){$bulan=9;}
		elseif($_GET['bulan']=='Oktober'){$bulan=10;}
		elseif($_GET['bulan']=='November'){$bulan=11;}
		else {$bulan=12;}
		$tahun=$_GET['tahun'];

		$query = "SELECT UB.id_usulbuku, P.nama_petugas, UB.judul_usulbuku, UB.pengarang_usulbuku, UB.penerbit_usulbuku, UB.tahunterbit_usulbuku, UB.keterangan_usulbuku, UB.perkiraanharga_usulbuku, DATE_FORMAT(UB.tgl_usulbuku,'%d %b %Y') as tglusulbuku
							FROM usulanbuku UB, petugas P
							WHERE UB.id_petugas=P.id_petugas and MONTH(TGL_USULBUKU) = '".$bulan."' AND YEAR(TGL_USULBUKU) = '".$tahun."'
							ORDER BY UB.id_usulbuku ASC
						 "; //the query for get all data in tb_student

		$tableStructure='
		<b>BULAN = '.$_GET['bulan'].'</b>
		<br>
		<b>TAHUN = '.$tahun.'</b>
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
					<td>'.$data['tglusulbuku'].'</td>
				</tr>';
		}
		$tableStructure=$tableStructure.'
			<tbody>
			</table>';
		echo $tableStructure;
		}
?>
