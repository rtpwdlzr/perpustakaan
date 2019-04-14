<?php
include 'connection.php';

$table=$_GET['table'];

//echo $table;

if($table=='anggota'){
	$no_induk=$_GET['no_induk'];
	$query="SELECT no_induk,nama_siswa,alamat_siswa,jenkel_siswa,notlp_siswa
					FROM anggota
					WHERE no_induk='$no_induk'";


	$tampil=mysql_query($query);

	while($row=mysql_fetch_array($tampil)) {
		echo '
				<input type="hidden" value="'.$no_induk.'" id="no_induk">
				<div class="col-lg-12">
					<div class="form-panel">
								<h4 class="mb"><i class="fa fa-angle-right"></i> Edit Area</h4>
										<form class="form-horizontal tasi-form">
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Nama</label>
														<div class="col-lg-10">
																<input type="text" id="nama_siswa" class="form-control round-form" value="'.$row['nama_siswa'].'"/>
														</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Alamat</label>
														<div class="col-lg-10">
																<input type="text" id="alamat_siswa" class="form-control round-form" value="'.$row['alamat_siswa'].'"/>
														</div>
												</div>
												<div class="form-group">
												<label class="col-sm-2 control-label col-lg-2">Jenis Kelamin</label>
													<div class="col-lg-10">
													<select id="jenkel_siswa" class=" form-control">
														<option selected disabled>Pilih Jenis Buku dan Pastikan Terisi ...</option>
														<option value="L">Laki-laki</option>
														<option value="P">Perempuan</option>
													</select>
													</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Nomor Telepon</label>
														<div class="col-lg-10">
																<input type="text" id="notlp_siswa" class="form-control round-form" value="'.$row['notlp_siswa'].'"/>
														</div>
												</div>
												<div class="form-group" align="center">
													<button type="button" class="btn btn-primary"  onclick="save_update_anggota()">Update Anggota</button>
													<button type="button" class="btn btn-warning"  onclick="location.reload();">Batal</button>
												</div>
										</form>
					</div><!-- /form-panel -->
				</div><!-- /col-lg-12 -->
		';
	}
}
?>
