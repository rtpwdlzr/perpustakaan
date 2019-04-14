<?php
include 'connection.php';

$table=$_GET['table'];

//echo $table;

if($table=='petugas'){
	$id_petugas=$_GET['id_petugas'];
	$query="SELECT nama_petugas,alamat_petugas,jenkel_petugas,notlp_petugas,username,password
					FROM petugas
					WHERE id_petugas='$id_petugas'";


	$tampil=mysql_query($query);

	while($row=mysql_fetch_array($tampil)) {
		echo '
				<input type="hidden" value="'.$id_petugas.'" id="id_petugas">
				<div class="col-lg-12">
					<div class="form-panel">
								<h4 class="mb"><i class="fa fa-angle-right"></i> Edit Area</h4>
										<form class="form-horizontal tasi-form">
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Nama</label>
														<div class="col-lg-10">
																<input type="text" id="nama_petugas" class="form-control round-form" value="'.$row['nama_petugas'].'"/>
														</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Alamat</label>
														<div class="col-lg-10">
																<input type="text" id="alamat_petugas" class="form-control round-form" value="'.$row['alamat_petugas'].'"/>
														</div>
												</div>
												<div class="form-group">
												<label class="col-sm-2 control-label col-lg-2">Jenis Kelamin</label>
													<div class="col-lg-10">
													<select id="jenkel_petugas" class=" form-control">
														<option selected disabled>Pilih Jenis Buku dan Pastikan Terisi ...</option>
														<option value="L">Laki-laki</option>
														<option value="P">Perempuan</option>
													</select>
													</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Nomor Telepon</label>
														<div class="col-lg-10">
																<input type="text" id="notlp_petugas" class="form-control round-form" value="'.$row['notlp_petugas'].'"/>
														</div>
												</div>
												<div class="form-group" align="center">
													<button type="button" class="btn btn-primary"  onclick="save_update_petugas()">Update Petugas</button>
													<button type="button" class="btn btn-warning"  onclick="location.reload();">Batal</button>
												</div>
										</form>
					</div><!-- /form-panel -->
				</div><!-- /col-lg-12 -->
		';
	}
}
?>
