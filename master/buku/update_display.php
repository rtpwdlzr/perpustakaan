<?php
include 'connection.php';

$table=$_GET['table'];

//echo $table;

if($table=='buku'){
	$id_buku=$_GET['id_buku'];
	$query="SELECT id_buku,id_jenisbuku,judul_buku,pengarang_buku,penerbit_buku,tahunterbit_buku,jumlah_buku,total_buku
					FROM buku
					WHERE ID_BUKU='$id_buku'";


	$tampil=mysql_query($query);

	while($row=mysql_fetch_array($tampil)) {
		echo '
				<input type="hidden" value="'.$id_buku.'" id="id_buku">
				<div class="col-lg-12">
					<div class="form-panel">
								<h4 class="mb"><i class="fa fa-angle-right"></i> Edit Area</h4>
										<form class="form-horizontal tasi-form">
												<div class="form-group">
												<label class="col-sm-2 control-label col-lg-2">Judul</label>
													<div class="col-lg-10">
														<select name="id_jenisbuku" id="id_jenisbuku" class="form-control">
													';
														//combobox dinamis
														include 'connection.php';
														$query2="SELECT id_jenisbuku, nama_jenisbuku FROM jenis_buku";
														$result2 = mysql_query($query2);

														while ($data = mysql_fetch_array($result2)){
														echo'
																<option value='.$data['id_jenisbuku'];

																	if($data['id_jenisbuku']==$row['id_jenisbuku'])
																		{
																			echo ' selected ';
																		}

																echo '> '.$data['nama_jenisbuku'].'
																</option>';
														}
													echo'
														</select>
													</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Judul</label>
														<div class="col-lg-10">
																<input type="text" id="judul_buku" class="form-control round-form" value="'.$row['judul_buku'].'"/>
														</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Pengarang</label>
														<div class="col-lg-10">
																<input type="text" id="pengarang_buku" class="form-control round-form" value="'.$row['pengarang_buku'].'"/>
														</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Penerbit</label>
														<div class="col-lg-10">
																<input type="text" id="penerbit_buku" class="form-control round-form" value="'.$row['penerbit_buku'].'"/>
														</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label col-lg-2">Tahun Terbit</label>
														<div class="col-lg-10">
																<input type="text" id="tahunterbit_buku" class="form-control round-form" value="'.$row['tahunterbit_buku'].'"/>
														</div>
												</div>
												<div class="form-group" align="center">
													<button type="button" class="btn btn-primary"  onclick="save_update_buku()">Update Buku</button>
													<button type="button" class="btn btn-warning"  onclick="location.reload();">Batal</button>
												</div>
										</form>
					</div><!-- /form-panel -->
				</div><!-- /col-lg-12 -->
		';
	}
}
?>
