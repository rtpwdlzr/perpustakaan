<?php
include 'connection.php';

$table=$_GET['table'];

if($table=='perpanjangankembali'){
	$id_transaksipinjam=$_GET['id_transaksipinjam'];
	$query="select B.judul_buku, A.no_induk, A.nama_siswa, DATE_FORMAT(TP.tgl_kembali,'%d %b %Y') as tglkembali
											from transaksipinjam TP, buku B, Anggota A
											where TP.id_buku=B.id_buku and TP.no_induk=A.no_induk and id_transaksipinjam='".$id_transaksipinjam."'";


	$tampil=mysql_query($query);

	while($row=mysql_fetch_array($tampil)) {
		echo '
				<div class="col-md-6 col-md-offset-3">
					<div class="form-panel">
						<h4 class="mb"><i class="fa fa-angle-right"></i> Perpanjang Pengembalian Buku</h4>
						<form class="form-panel">
								<div class="form-group">
									<label>ID Transaksi Pinjam</label>
									<input type="text" class="form-control" value="'.$id_transaksipinjam.'" readonly>
								</div>
								<div class="form-group">
									<label>Nama</label>
									<input type="text" class="form-control" value="'.$row['no_induk'].'" readonly>
								</div>
								<div class="form-group">
									<label>No Induk</label>
									<input type="text" class="form-control"  value="'.$row['nama_siswa'].'" readonly>
								</div>
								<div class="form-group">
									<label>Judul Buku</label>
									<input type="text" class="form-control" value="'.$row['judul_buku'].'" readonly>
								</div>
								<div class="form-group">
									<label>Tanggal Kembali Awal</label>
									<input type="text" class="form-control" value="'.$row['tglkembali'].'" readonly>
								</div>
								<div class="form-group">
									<label>Tanggal Kembali Baru</label>
									<input type="date" class="form-control" id="tgl_kembali">
								</div>
								<input type="hidden" value="'.$id_transaksipinjam.'" id="id_transaksipinjam">
								<div class="form-group" align="center">
									<button type="button" class="btn btn-primary"  onclick="update_pinjam()">Simpan Perpanjang Pengembalian</button>
									<button type="button" class="btn btn-warning"  onclick="location.reload();">Batal</button>
								</div>
						</form>
					</div>
				</div>
		';
	}
}
?>
