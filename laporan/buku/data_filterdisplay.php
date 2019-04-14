
<?php
include 'connection.php';

	$table=$_GET['table'];
	if($table=='buku'){

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

		$query = "SELECT B.id_buku, JB.nama_jenisbuku, B.judul_buku, B.pengarang_buku, B.penerbit_buku, B.tahunterbit_buku,
											DATE_FORMAT(B.tanggalmasuk_buku,'%d %b %Y') as tanggalmasukbuku, B.jumlah_buku, B.total_buku,
											(SELECT COUNT(ID_TRANSAKSIPINJAM) FROM transaksipinjam WHERE ID_BUKU=B.id_buku) as totaldipinjam
							FROM buku B, jenis_buku JB
							WHERE  B.id_jenisbuku=JB.id_jenisbuku and MONTH(tanggalmasuk_buku) = '".$bulan."' AND YEAR(tanggalmasuk_buku) = '".$tahun."'
							ORDER BY B.id_buku ASC"; //the query for get all data in tb_student

		$tableStructure='
		<b>BULAN = '.$_GET['bulan'].'</b>
		<br>
		<b>TAHUN = '.$tahun.'</b>
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Buku</th>
					<th>Nama jenis</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Tahun Terbit</th>
					<th>Tanggal Masuk</th>
					<th>Total Dipinjam</th>
					<th>Jumlah</th>
					<th>Total</th>
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
					<td>'.$data['tanggalmasukbuku'].'</td>
					<td>'.$data['totaldipinjam'].'</td>
					<td>'.$data['jumlah_buku'].'</td>
					<td>'.$data['total_buku'].'</td>
				</tr>';
		}
		$tableStructure=$tableStructure.'
			<tbody>
			</table>';
		echo $tableStructure;
		}
?>
