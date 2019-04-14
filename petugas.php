<?php
//permainan session
include('session.php');
if (empty($_SESSION['login_user']) AND empty($_SESSION['login_pass'])){
  header("location: index.php");
}


 //Penulisan untuk kode otomatis
 //membuat auto kode PK
 include 'connection.php';
 $query = mysql_query("select max(id_petugas) as maxID from petugas");
 $data = mysql_fetch_array($query);
 $idMax = $data['maxID'];
 $noUrut = (int) substr($idMax,3,7);
 $noUrut++;
 $newID = "MPT".sprintf("%07s",$noUrut);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sirkulasi Perpustakaan - Petugas</title>

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

<script src="http://code.jquery.com/jquery-2.0.0.js"></script>

    <link href="assets/js/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <script>
        function table_load(){
            url="master/petugas/data_display.php?table=petugas"
            $("#table_area").load(url);
            }

        function insert_petugas(){
    				id_petugas=$("#id_petugas").val();
            nama_petugas=$("#nama_petugas").val();
            alamat_petugas=$("#alamat_petugas").val();
            jenkel_petugas=$("#jenkel_petugas").val();
            notlp_petugas=$("#notlp_petugas").val();
            username=$("#username").val();
            password=$("#password").val();
    				url="master/petugas/data_insert.php?table=insert_petugas&id_petugas="+id_petugas+"&nama_petugas="+nama_petugas+"&alamat_petugas="+alamat_petugas+"&jenkel_petugas="+jenkel_petugas+"&notlp_petugas="+notlp_petugas+"&username="+username+"&password="+password;
    				url=url.replace(/ /g,"%20");
    				$("#action_result").load(url, function(){
    					url="master/petugas/data_display.php?table=petugas"
    					$("#table_area").load(url);
    				});
    			  }

        function hapusPetugas(id_petugas){
    				var r = confirm("Anda yakin akan menghapus data?");
    				if (r == true){
  					url="master/petugas/data_delete.php?table=delete_datapetugas&id_petugas="+id_petugas;

  					$("#action_result").load(url, function(){
  						url="master/petugas/data_display.php?table=petugas"
  						$("#table_area").load(url);
  					});
    				}
    			  }

        function display_update_petugas(id_petugas){
    				url="master/petugas/update_display.php?table=petugas&id_petugas="+id_petugas;
    				$("#editing_area").load(url);
    			  }

        function save_update_petugas(){
            id_petugas=$("#id_petugas").val();
            nama_petugas=$("#nama_petugas").val();
            alamat_petugas=$("#alamat_petugas").val();
            jenkel_petugas=$("#jenkel_petugas").val();
            notlp_petugas=$("#notlp_petugas").val();


    				url="master/petugas/data_update.php?table=update_petugas&id_petugas="+id_petugas+"&nama_petugas="+nama_petugas+"&alamat_petugas="+alamat_petugas+"&jenkel_petugas="+jenkel_petugas+"&notlp_petugas="+notlp_petugas;

    				url=url.replace(/ /g,"%20");

    				$("#action_result").load(url, function(){
    					url=url="master/petugas/data_display.php?table=petugas"
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
                          <li><a  href="anggota.php">Anggota</a></li>
                          <li class="active"><a  href="petugas.php">Petugas</a></li>
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
            	<h3><i class="fa fa-angle-right"></i> Master / Petugas </h3>
                <div class="row mt">
                  <div class="col-lg-12">
                    <div class="form-panel tengah">
                        <button type="button" class="btn btn-round btn-success" data-toggle="modal" data-target="#myModalTambah">Tambah Petugas</button>
                        <div id="editing_area"></div>
                    </div>
                  </div>
                </div>
                <div class="row mt">
        		  		<div class="col-lg-12">
                    <div class="form-panel">
                      <h4><i class="fa fa-angle-right"></i> Daftar Data Petugas</h4>
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
              <h4 class="modal-title" id="myModalLabel">Tambah Data Petugas Perpustakaan</h4>
            </div>
            <div class="modal-body">
              <form>
          			<div class="form-group">
                  <label>ID Petugas</label>
          				<input type="text" class="form-control" id="id_petugas" placeholder="Id Petugas Perpustakaan" value="<?php echo $newID; ?>" readonly>
          			</div>
                <div class="form-group">
                  <label>Nama</label>
          				<input type="text" class="form-control" id="nama_petugas" placeholder="Nama Lengkap Petugas">
          			</div>
                <div class="form-group">
                  <label>Alamat</label>
          				<input type="text" class="form-control" id="alamat_petugas" placeholder="Alamat Petugas">
          			</div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
          				<select id="jenkel_petugas" class=" form-control">
                    <option selected disabled>Pilih Salah Satu ...</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
          			</div>
                <div class="form-group">
                  <label>Nomor Telepon</label>
          				<input type="text" class="form-control bfh-phone" data-format="+62 (ddd) dddd dddd d" id="notlp_petugas" placeholder="Nomor telepon yang dapat dihubungi">
          			</div>
                <div class="form-group">
                  <label>Username</label>
          				<input type="text" class="form-control" id="username" placeholder="username untuk akses">
          			</div>
                <div class="form-group">
                  <label>Password</label>
          				<input type="text" class="form-control" id="password" placeholder="password">
          			</div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="button" class="btn btn-primary" onclick="insert_petugas();">Simpan Petugas</button>
            </div>
          </div>
        </div>
      </div>



      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Kembali ke atas
              <a href="petugas.php#" class="go-top">
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
