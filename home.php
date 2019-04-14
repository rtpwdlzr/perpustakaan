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

    <title>Halaman Utama</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>

  </head>
  <body>
  <section id="container"  >

      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="home.php" class="logo"><b>Sirkulasi Perpustakaan SMK Wachid Hasyim Surabaya</b></a>

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>

      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a><img src="assets/img/logowahasa.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $login_session; ?></h5>

                  <li class="mt">
                      <a class="active" href="javascript:;">
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
          </div>
      </aside>

      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-9 main-chart">
                      <div class="row mt">
                        	<div class="col-md-4 col-sm-4 mb">
                            <div class="darkblue-panel pn">
                        			<div class="darkblue-header">
  						  			            <h5>KOLEKSI BUKU</h5>
                        			</div>
                        			<h1 class="mt"><i class="fa fa-book fa-3x"></i></h1>
                  								<p>Total data judul buku perpustakaan</p>
                  								<footer>
                  									<div class="centered">
                  										<h5><i class="fa fa-book"></i>
                                        <?php
                                            include 'connection.php';
                                            $query="SELECT count(*) as hasilbuku FROM buku";
                                            $result = mysql_query($query);
                                            $data = mysql_fetch_array($result);
                                            echo $data['hasilbuku'];
                                        ?>
                                      </h5>
                  									</div>
                  								</footer>
                        		</div>
                        	</div><!-- /col-md-4-->
                          <div class="col-md-4 col-sm-4 mb">
                            <div class="darkblue-panel pn">
                              <div class="darkblue-header">
                                  <h5>ANGGOTA PERPUSTAKAAN</h5>
                              </div>
                              <h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>
                                  <p>Total data anggota perpustakaan</p>
                                  <footer>
                                    <div class="centered">
                                      <h5><i class="fa fa-user"></i>
                                        <?php
                                            include 'connection.php';
                                            $query="SELECT count(*) as hasilanggota FROM anggota";
                                            $result = mysql_query($query);
                                            $data = mysql_fetch_array($result);
                                            echo $data['hasilanggota'];
                                        ?>
                                      </h5>
                                    </div>
                                  </footer>
                            </div>
                          </div><!-- /col-md-4-->
                          <div class="col-md-4 col-sm-4 mb">
                            <div class="darkblue-panel pn">
                        			<div class="darkblue-header">
  						  			            <h5>USULAN BUKU</h5>
                        			</div>
                        			<h1 class="mt"><i class="fa fa-plus-circle fa-3x"></i></h1>
                  								<p>Total data usulan buku perpustakaan</p>
                  								<footer>
                  									<div class="centered">
                  										<h5><i class="fa fa-plus-circle"></i>
                                        <?php
                                            include 'connection.php';
                                            $query="SELECT count(*) as hasilusulan FROM usulanbuku";
                                            $result = mysql_query($query);
                                            $data = mysql_fetch_array($result);
                                            echo $data['hasilusulan'];
                                        ?>
                                      </h5>
                  									</div>
                  								</footer>
                        		</div>
                        	</div><!-- /col-md-4-->
                      </div><!-- /row -->
                      <div class="row mt">
                        	<div class="col-md-4 col-sm-4 mb">
                            <div class="darkblue-panel pn">
                        			<div class="darkblue-header">
  						  			            <h5>PEMINJAMAN BUKU</h5>
                        			</div>
                        			<h1 class="mt"><i class="fa fa-random fa-3x"></i></h1>
                  								<p>Total data peminjaman buku</p>
                  								<footer>
                  									<div class="centered">
                  										<h5><i class="fa fa-random"></i>
                                        <?php
                                            include 'connection.php';
                                            $query="SELECT count(*) as hasilpeminjaman FROM transaksipinjam";
                                            $result = mysql_query($query);
                                            $data = mysql_fetch_array($result);
                                            echo $data['hasilpeminjaman'];
                                        ?>
                                      </h5>
                  									</div>
                  								</footer>
                        		</div>
                        	</div><!-- /col-md-4-->
                          <div class="col-md-4 col-sm-4 mb">
                            <div class="darkblue-panel pn">
                              <div class="darkblue-header">
                                  <h5>TOTAL DENDA</h5>
                              </div>
                              <h1 class="mt"><i class="fa fa-money fa-3x"></i></h1>
                                  <p>Total denda yang diterima perpustakaan</p>
                                  <footer>
                                    <div class="centered">
                                      <h5><i class="fa fa-money"></i>
                                        <?php
                                            include 'connection.php';
                                            $query="SELECT SUM(jumlahdenda_transaksikembali) as totaldenda FROM transaksikembali WHERE jumlahdenda_transaksikembali>0";
                                            $result = mysql_query($query);
                                            $data = mysql_fetch_array($result);
                                            echo "Rp. ".$data['totaldenda'];
                                        ?>
                                      </h5>
                                    </div>
                                  </footer>
                            </div>
                          </div><!-- /col-md-4-->
                          <div class="col-md-4 col-sm-4 mb">
                            <div class="darkblue-panel pn">
                        			<div class="darkblue-header">
  						  			            <h5>PENGEMBALIAN BUKU</h5>
                        			</div>
                        			<h1 class="mt"><i class="fa fa-retweet fa-3x"></i></h1>
                                  <p>Total data pengembalian buku</p>
                  								<footer>
                  									<div class="centered">
                  										<h5><i class="fa fa-retweet"></i>
                                        <?php
                                            include 'connection.php';
                                            $query="SELECT count(*) as hasilpengembalian FROM transaksikembali";
                                            $result = mysql_query($query);
                                            $data = mysql_fetch_array($result);
                                            echo $data['hasilpengembalian'];
                                        ?>
                                      </h5>
                  									</div>
                  								</footer>
                        		</div>
                        	</div><!-- /col-md-4-->
                      </div><!-- /row -->
                      <div class="form-panel">
                        <p><h3>Selamat Datang,</h3>Sistem informasi sirkulasi perpustakaan pada SMK Wachid Hasyim 1 Surabaya adalah aplikasi berbasis web yang dibangun untuk memberikan solusi permasalahan perpustakaan yang mampu mengelola data-data terkait perpustaan dengan tepat dan terintegrasi dengan baik serta mampu mengelola data-data tersebut menjadi laporan-laporan informasi yang terkait dengan proses sirkulasi buku perpustkaan yang diperlukan oleh pengguna atau petugas perpustakaan</p>
                      </div>
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->


                  <div class="col-lg-3 ds">
		                  <h3><a><b><font color="white"><div id="output"></div></font></b></a></h3>
                      <br><br>
                      <h3><a><b><font color="white"><div><?php echo "". date("l") . ", " .date("d/m/Y"); ?></div></font></b></a></h3>
                      <br><br>
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <footer class="site-footer">
          <div class="text-center">
              Kembali ke atas
              <a href="home.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
  </section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="assets/js/common-scripts.js"></script>
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
    <script src="assets/js/sparkline-chart.js"></script>
	<script src="assets/js/zabuto_calendar.js"></script>
	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            title: 'Selamat Datang di Sirkulasi Perpustakaan, <?php echo $login_session; ?>!',
            text: 'Pastikan data yang dimasukkan sesuai dengan informasi transaksi atau data yang ada.',
            sticky: true,
            time: '2',
            class_name: 'my-sticky-class'
        });
        return false;
        });
	</script>
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
    <script type="text/javascript">
    		window.setTimeout("waktu()",1000);
    		function waktu() {
    			var tanggal = new Date();
    			setTimeout("waktu()",1000);
    		   document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
    		}
  	 </script>
  </body>
</html>
