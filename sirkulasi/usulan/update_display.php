<?php
include 'connection.php';

$table=$_GET['table'];

//echo $table;

if($table=='usulan'){
	$id_usulbuku=$_GET['id_usulbuku'];
	$query="SELECT id_petugas, judul_usulbuku, pengarang_usulbuku, penerbit_usulbuku, tahunterbit_usulbuku, keterangan_usulbuku, perkiraanharga_usulbuku
					FROM usulanbuku
					WHERE id_usulbuku='$id_usulbuku'";


	$tampil=mysql_query($query);

	while($row=mysql_fetch_array($tampil)) {
		echo '
				<input type="hidden" value="'.$id_usulbuku.'" id="id_usulbuku">
				<div class="col-lg-12">
					<div class="form-panel">
								<h4 class="mb"><i class="fa fa-angle-right"></i> Edit Area</h4>
										<form class="form-horizontal tasi-form">
												<div class="form-group">
												<label class="col-sm-2 control-label col-lg-2">Nama Petugas</label>
													<div class="col-lg-10">
														<select name="id_petugas" id="id_petugas" class="form-control">
													';
														//combobox dinamis
														include 'connection.php';
														$query2="SELECT id_petugas, nama_petugas FROM petugas";
														$result2 = mysql_query($query2);

														while ($data = mysql_fetch_array($result2)){
														echo'
																<option value='.$data['id_petugas'];

																	if($data['id_petugas']==$row['id_petugas'])
																		{
																			echo ' selected ';
																		}

																echo '> '.$data['nama_petugas'].'
																</option>';
														}
													echo'
														</select>
													</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Judul Usulan</label>
														<div class="col-lg-10">
																<input type="text" id="judul_usulbuku" class="form-control round-form" value="'.$row['judul_usulbuku'].'"/>
														</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Pengarang</label>
														<div class="col-lg-10">
																<input type="text" id="pengarang_usulbuku" class="form-control round-form" value="'.$row['pengarang_usulbuku'].'"/>
														</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Penerbit</label>
														<div class="col-lg-10">
																<input type="text" id="penerbit_usulbuku" class="form-control round-form" value="'.$row['penerbit_usulbuku'].'"/>
														</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Tahun Terbit</label>
														<div class="col-lg-10">
																<input type="text" id="tahunterbit_usulbuku" class="form-control round-form" value="'.$row['tahunterbit_usulbuku'].'"/>
														</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Keterangan</label>
														<div class="col-lg-10">
																<input type="text" id="keterangan_usulbuku" class="form-control round-form" value="'.$row['keterangan_usulbuku'].'"/>
														</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Perkiraan Harga</label>
														<div class="col-lg-10">
																<input type="text" id="perkiraanharga_usulbuku" class="form-control round-form" value="'.$row['perkiraanharga_usulbuku'].'"/>
														</div>
												</div>
												<div class="form-group" align="center">
													<button type="button" class="btn btn-primary"  onclick="save_update_usulan()">Update Usulan Buku</button>
													<button type="button" class="btn btn-warning"  onclick="location.reload();">Batal</button>
												</div>
										</form>
					</div><!-- /form-panel -->
				</div><!-- /col-lg-12 -->
		';
	}
}
?>
