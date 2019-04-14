<?php
//permainan session
include('session.php');
if (empty($_SESSION['login_user']) AND empty($_SESSION['login_pass'])){
  header("location: index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sirkulasi Perpustakaan - Anggota</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="assets/css/bootstrap-formhelpers.css" rel="stylesheet">
    <link href="assets/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <link href="assets/js/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <script>
        function table_load(){
            url="master/anggota/data_display.php?table=anggota"
            $("#table_area").load(url);
            }

        function insert_anggota(){
    				no_induk=$("#no_induk").val();
            nama_siswa=$("#nama_siswa").val();
            alamat_siswa=$("#alamat_siswa").val();
            jenkel_siswa=$("#jenkel_siswa").val();
            notlp_siswa=$("#notlp_siswa").val();
    				url="master/anggota/data_insert.php?table=insert_anggota&no_induk="+no_induk+"&nama_siswa="+nama_siswa+"&alamat_siswa="+alamat_siswa+"&jenkel_siswa="+jenkel_siswa+"&notlp_siswa="+notlp_siswa;
    				url=url.replace(/ /g,"%20");
    				$("#action_result").load(url, function(){
    					url="master/anggota/data_display.php?table=anggota"
    					$("#table_area").load(url);
    				});
    			  }

        function hapusAnggota(no_induk){
    				var r = confirm("Anda yakin akan menghapus data?");
    				if (r == true){
  					url="master/anggota/data_delete.php?table=delete_dataanggota&no_induk="+no_induk;

  					$("#action_result").load(url, function(){
  						url="master/anggota/data_display.php?table=anggota"
  						$("#table_area").load(url);
  					});
    				}
    			  }

        function display_update_anggota(no_induk){
    				url="master/anggota/update_display.php?table=anggota&no_induk="+no_induk;
    				$("#editing_area").load(url);
    			  }

        function save_update_anggota(){
            no_induk=$("#no_induk").val();
            nama_siswa=$("#nama_siswa").val();
            alamat_siswa=$("#alamat_siswa").val();
            jenkel_siswa=$("#jenkel_siswa").val();
            notlp_siswa=$("#notlp_siswa").val();

    				url="master/anggota/data_update.php?table=update_anggota&no_induk="+no_induk+"&nama_siswa="+nama_siswa+"&alamat_siswa="+alamat_siswa+"&jenkel_siswa="+jenkel_siswa+"&notlp_siswa="+notlp_siswa;

    				url=url.replace(/ /g,"%20");

    				$("#action_result").load(url, function(){
    					url="master/anggota/data_display.php?table=anggota"
    					$("#table_area").load(url);
    				});
      			}

    </script>
    <style media="screen">
      .tengah{
        text-align: center;
      }
    </style>
  </head>

  <body onload="table_load();">

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="home.php" class="logo"><b>Sirkulasi Perpustakaan SMK Wachid Hasyim Surabaya</b></a>
            <!--logo end-->

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a><img src="assets/img/logowahasa.png" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php echo $login_session; ?></h5>

                  <li class="mt">
                      <a href="home.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Halaman Utama</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Sirkulasi</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="peminjaman.php">Peminjaman</a></li>
                          <li><a  href="pengembalian.php">Pengembalian</a></li>
                          <li><a  href="usulan.php">Usulan Buku</a></li>
                          <li><a  href="bukuhilang.php">Buku Hilang</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Master</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="buku.php">Buku</a></li>
                          <li class="active"><a  href="anggota.php">Anggota</a></li>
                          <li><a  href="petugas.php">Petugas</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Laporan</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="lapusulan.php">Cetak Usulan Buku</a></li>
                          <li><a  href="lapbuku.php">Cetak Koleksi Buku</a></li>
                          <li><a  href="lapanggota.php">Cetak Anggota Perpustakaan</a></li>
                          <li><a  href="lapsirkulasi.php">Cetak Sirkulasi Buku</a></li>
                          <li><a  href="lapdenda.php">Cetak Informasi Denda</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            	<h3><i class="fa fa-angle-right"></i> Master / Anggota </h3>
                <div class="row mt">
                  <div class="col-lg-12">
                    <div class="form-panel tengah">
                        <button type="button" class="btn btn-round btn-success" data-toggle="modal" data-target="#myModalTambah">Tambah Anggota</button>
                        <div id="editing_area"></div>
                    </div>
                  </div>
                </div>
                <div class="row mt">
        		  		<div class="col-lg-12">
                    <div class="form-panel">
                      <h4><i class="fa fa-angle-right"></i> Daftar Data Anggota </h4>
                      <section id="unseen">
                        <div id="table_area"></div>
                      </section>
                    </div><!-- /content-panel -->
                  </div><!-- /col-lg-4 -->
        	  	</div><!-- /row -->
          </section>
          <div id="action_result"></div>
      </section><!-- /MAIN CONTENT -->



      <!-- Modal Tambah Buku-->
      <div class="modal fade" id="myModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Tambah Data Anggota Perpustakaan</h4>
            </div>
            <div class="modal-body">
              <form>
          			<div class="form-group">
                  <label>No Induk</label>
          				<input type="text" class="form-control" id="no_induk" placeholder="Nomor Induk Siswa Harus Terisi">
          			</div>
                <div class="form-group">
                  <label>Nama</label>
          				<input type="text" class="form-control" id="nama_siswa" placeholder="Nama Lengkap Siswa">
          			</div>
                <div class="form-group">
                  <label>Alamat</label>
          				<input type="text" class="form-control" id="alamat_siswa" placeholder="Alamat Siswa">
          			</div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
          				<select id="jenkel_siswa" class=" form-control">
                    <option selected disabled>Pilih Salah Satu ...</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
          			</div>
                <div class="form-group">
                  <label>Nomor Telepon</label>
          				<input type="text" class="form-control bfh-phone" data-format="+62 (ddd) dddd dddd d" id="notlp_siswa" placeholder="Nomor telepon yang dapat dihubungi">
          			</div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="button" class="btn btn-primary" onclick="insert_anggota();">Simpan Anggota</button>
            </div>
          </div>
        </div>
      </div>



      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Kembali ke atas
              <a href="anggota.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <script src="assets/js/bootstrap-select.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/bootstrap-formhelpers.js"></script>
  <script>
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });
      $(document).ready(function () {
        var mySelect = $('#first-disabled2');
        $('#special').on('click', function () {
          mySelect.find('option:selected').prop('disabled', true);
          mySelect.selectpicker('refresh');
        });
        $('#special2').on('click', function () {
          mySelect.find('option:disabled').prop('disabled', false);
          mySelect.selectpicker('refresh');
        });
        $('#basic2').selectpicker({
          liveSearch: true,
          maxOptions: 1
        });
      });
  </script>>

  </body>
</html>
