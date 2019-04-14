 <?php
 //permainan session
 include('session.php');
 if (empty($_SESSION['login_user']) AND empty($_SESSION['login_pass'])){
   header("location: index.php");
 }
  //Penulisan untuk kode otomatis
  //membuat auto kode PK
  include 'connection.php';
  $query = mysql_query("select max(id_transaksikembali) as maxID from transaksikembali");
  $data = mysql_fetch_array($query);
  $idMax = $data['maxID'];
  $noUrut = (int) substr($idMax,3,7);
  $noUrut++;
  $newID = "TRK".sprintf("%07s",$noUrut);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sirkulasi Perpustakaan - Pengembalian</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/js/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <script>
        function table_load(){
            url="sirkulasi/pengembalian/data_display.php?table=kembali"
            $("#table_area").load(url);
            }
        function table_loadcari(){
            no_induk=$("#no_induk").val();
            url="sirkulasi/pengembalian/data_displaykembali.php?table=kembalicari&no_induk="+no_induk;
            $("#table_area").load(url);
            }
        function konfirmasikembali(id_transaksipinjam){
    				url="sirkulasi/pengembalian/konfirmasikembali_display.php?table=conkembali&id_transaksipinjam="+id_transaksipinjam;
    				$("#editing_area").load(url);
    			  }
        function perpanjangan(id_transaksipinjam){
    				url="sirkulasi/pengembalian/perpanjangkembali_display.php?table=perpanjangankembali&id_transaksipinjam="+id_transaksipinjam;
    				$("#editing_area").load(url);
    			  }
        function insert_kembali(){
            id_transaksikembali=$("#id_transaksikembali").val();
            id_transaksipinjam=$("#id_transaksipinjam").val();
            jumlahdenda_transaksi=$("#jumlahdenda_transaksi").val();
    				url="sirkulasi/pengembalian/data_insert.php?table=insert_kembali&id_transaksikembali="+id_transaksikembali+"&id_transaksipinjam="+id_transaksipinjam+"&jumlahdenda_transaksi="+jumlahdenda_transaksi;
    				url=url.replace(/ /g,"%20");
    				$("#action_result").load(url, function(){
    					url="sirkulasi/pengembalian/data_display.php?table=kembali"
    					$("#table_area").load(url);
    				});
    			}
          function update_pinjam(){
              id_transaksipinjam=$("#id_transaksipinjam").val();
              tgl_kembali=$("#tgl_kembali").val();
              url="sirkulasi/pengembalian/data_perpanjang.php?table=data_perpanjang&id_transaksipinjam="+id_transaksipinjam+"&tgl_kembali="+tgl_kembali;
              url=url.replace(/ /g,"%20");
              $("#action_result").load(url, function(){
                url="sirkulasi/pengembalian/data_display.php?table=kembali"
                $("#table_area").load(url);
              });
            }
    </script>
    <style media="screen">
      .tengah{
        text-align: center;
      }
    </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Sirkulasi</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="peminjaman.php">Peminjaman</a></li>
                          <li class="active"><a  href="pengembalian.php">Pengembalian</a></li>
                          <li><a  href="usulan.php">Usulan Buku</a></li>
                          <li><a  href="bukuhilang.php">Buku Hilang</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Master</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="buku.php">Buku</a></li>
                          <li><a  href="anggota.php">Anggota</a></li>
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

      <!--
      **********************************************************************************************************************************************************
      MAIN CONTENT
      ***********************************************************************************************************************************************************
      -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            	<h3><i class="fa fa-angle-right"></i> Sirkulasi / Pengembalian </h3>
                <div class="row mt">
                  <div class="col-lg-12">
                      <div id="editing_area"></div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="form-panel">
                          <h4 class="mb"><i class="fa fa-angle-right"></i> Pengembalian Buku</h4>
                          <form>
                              <div class="form-group">
                                  <label>No Induk Anggota</label>
                                  <select id="no_induk" class="selectpicker form-control" data-live-search="true">
                                      <option selected disabled>Masukkan No Induk</option>
                                    <?php
                                        include 'connection.php';
                                        $query="SELECT no_induk, nama_siswa FROM anggota";
                                        $result = mysql_query($query);

                                        while ($data = mysql_fetch_array($result)){
                                          echo'
                                  						<option value='.$data['no_induk'].' data-subtext='.$data['nama_siswa'].'> '.$data['no_induk'].' </option>
                                  					';
                                  				}
                                    ?>
                                  </select>
                          			</div>
                              <button type="button" class="btn btn-warning" onclick="table_loadcari();">Cari</button>
                              <button type="button" class="btn btn-danger" onclick="table_load();">Reset</button>
                          </form>
                    </div><!-- /form-panel -->
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="form-panel">
                      <h4><i class="fa fa-angle-right"></i> Daftar Data Pengembalian </h4>
                      <section id="unseen">

                        <div id="table_area"></div>
                      </section>
                    </div><!-- /content-panel -->
                  </div><!-- /col-lg-4 -->
                </div>

          </section>
          <div id="action_result"></div>
      </section><!-- /MAIN CONTENT -->


      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Kembali ke atas
              <a href="peminjaman.php#" class="go-top">
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
