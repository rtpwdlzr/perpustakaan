
<?php
include 'connection.php';

	$table=$_GET['table'];
	if($table=='denda'){

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

		$query = "SELECT TK.id_transaksikembali, TP.id_transaksipinjam, A.no_induk, A.nama_siswa, B.id_buku, B.judul_buku, DATE_FORMAT(TK.tgl_transaksikembali,'%d %b %Y') as tgltransaksikembali, TK.jumlahdenda_transaksikembali
							FROM transaksikembali TK, transaksipinjam TP, anggota A, buku B
							WHERE TK.id_transaksipinjam=TP.id_transaksipinjam and TP.no_induk=A.no_induk and TP.id_buku=B.id_buku and jumlahdenda_transaksikembali>0 and MONTH(tgl_transaksikembali) = '".$bulan."' AND YEAR(tgl_transaksikembali) = '".$tahun."'
							ORDER BY TK.id_transaksikembali ASC"; //the query for get all data in tb_student

		$tableStructure='
		<b>BULAN = '.$_GET['bulan'].'</b>
		<br>
		<b>TAHUN = '.$tahun.'</b>
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Transaksikembali</th>
					<th>ID Transaksipinjam</th>
					<th>No Induk</th>
					<th>Nama</th>
					<th>ID Buku</th>
					<th>Judul Buku</th>
					<th>Tanggal Pengembalian</th>
					<th>Jumlah Denda (Rp)</th>
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
					<td>'.$data['id_transaksikembali'].'</td>
					<td>'.$data['id_transaksipinjam'].'</td>
					<td>'.$data['no_induk'].'</td>
					<td>'.$data['nama_siswa'].'</td>
					<td>'.$data['id_buku'].'</td>
					<td>'.$data['judul_buku'].'</td>
					<td>'.$data['tgltransaksikembali'].'</td>
					<td style="text-align:right;">'.$data['jumlahdenda_transaksikembali'].'</td>
				</tr>';
		}
		$tableStructure=$tableStructure.'
			<tbody>
			</table>';
		echo $tableStructure;
		$resulttotaldenda = mysql_query("SELECT SUM(jumlahdenda_transaksikembali) as totaldenda
																			FROM transaksikembali
																			WHERE jumlahdenda_transaksikembali>0 and MONTH(tgl_transaksikembali) = '".$bulan."' AND YEAR(tgl_transaksikembali) = '".$tahun."'");
		$hasildendatotal = mysql_fetch_array($resulttotaldenda);
		echo "<a style='color:red;'><b>Total Denda Pengembalian Buku:  Rp. ". $hasildendatotal['totaldenda']."</b></a>";
		}
?>
