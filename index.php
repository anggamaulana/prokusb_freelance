<?php
	session_start();
	include"koneksi.php";
	

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Freelancer get a job!! </title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<link rel="stylesheet" href="js/base/jquery.ui.all.css">
	<script src="js/jquery-1.6.2.js"></script>
	<script src="js/jquery.ui.core.js"></script>	
	<script src="js/jquery.ui.datepicker.js"></script>
	<script type="text/javascript">
	$(function(){	
		$('#tanggal_lahir').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth:true,
			changeYear:true,
			yearRange:'1980:2000',
			defaultDate:'+1m +7d -25y'
		});
	});
	</script>
</head>
<body>
<div id="wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">Freelance</a></h1>
			
		</div>
		 
		<div id="menu">
			<ul>
				<li><a href="index.php?p=a&c=a">Beranda</a></li>
				<li><a href="index.php?p=b">Arsip</a></li>
				<li><a href="index.php?p=c">Pasang Iklan</a></li>
			</ul>
		</div>
	</div>
	
	<!-- end #header -->
	<!-- start #page -->
	<?php 
			
			if(isset($_GET['p']) && $_GET['p']=='a'){
				if(isset($_GET['c']) && $_GET['c']=='a'){
					include "Beranda/Beranda.php";
				}else if(isset($_GET['c']) && $_GET['c']=='b'){
					include "Beranda/HasilPencarian.php";
				}else if(isset($_GET['c']) && $_GET['c']=='c'){
					include "Beranda/LoginMember.php";
				}
			
			}else if(isset($_GET['p']) && $_GET['p']=='b'){
				if(isset($_SESSION['sid']) && isset($_SESSION['idmember'])){
					if(isset($_GET['c']) && $_GET['c']=='a'){
						include "Arsip/CV.php";
					}else if(isset($_GET['c']) && $_GET['c']=='b'){
						include "Arsip/DataLamaran.php";
					}else if(isset($_GET['c']) && $_GET['c']=='c'){
						include "Arsip/FormCV.php";
					}else if(isset($_GET['c']) && $_GET['c']=='d'){
						include "Arsip/JobsAlert.php";
					}else if(isset($_GET['c']) && $_GET['c']=='e'){
						include "Arsip/PekerjaanyangDisimpan.php";
					}else if(isset($_GET['c']) && $_GET['c']=='f'){
						include "Arsip/PengaturanAkun.php";
					}else if(isset($_GET['c']) && $_GET['c']=='g'){
						include "Arsip/PermintaanCV.php";
					}else if(isset($_GET['c']) && $_GET['c']=='h'){
						include "Arsip/RekomendasiPekerjaan.php";
					}else if(isset($_GET['c']) && $_GET['c']=='i'){
						include "Arsip/SuratLamaran.php";
					}else if(isset($_GET['c']) && $_GET['c']=='j'){
						include "Arsip/FormCV.php";
					}else if(isset($_GET['c']) && $_GET['c']=='k'){
						include "Arsip/DetailIklan.php";
					}else if(isset($_GET['c']) && $_GET['c']=='l'){
						include "Arsip/FormSuratLamaran.php";
					}else if(isset($_GET['c']) && $_GET['c']=='m'){
						include "Arsip/FormJobsAlert.php";
					}else if(isset($_GET['c']) && $_GET['c']=='n'){
						include "Arsip/LihatCV.php";
					}else if(isset($_GET['c']) && $_GET['c']=='logout'){
						
						include "Arsip/logout.php";
					}else{
						include "Arsip/CV.php";
					}
				}else{
					if(isset($_GET['c']) && $_GET['c']=='k')
						include "Arsip/DetailIklan.php";
					else
						include "error.php";
				}
			}else if(isset($_GET['p']) && $_GET['p']=='c'){
				if(isset($_SESSION['sid']) && isset($_SESSION['idperusahaan'])){
					include "PasangIklan/fungsi.php";
					
					if(isset($_GET['c']) && $_GET['c']=='a'){
						
							include "PasangIklan/FormIklan.php";
						
					}if(isset($_GET['c']) && $_GET['c']=='l'){
						
							include "PasangIklan/FormDetail IklanMember.php";
						
					}else if(isset($_GET['c']) && $_GET['c']=='b'){
						
							include "PasangIklan/FormIklan.php";
							
					}else if(isset($_GET['c']) && $_GET['c']=='c'){
						include "PasangIklan/FormSelamatDatang.php";
					}else if(isset($_GET['c']) && $_GET['c']=='d'){
						include "PasangIklan/LoginPerusahaan.php";
					}else if(isset($_GET['c']) && $_GET['c']=='e'){
						
						
							include "PasangIklan/PaketPembayaran.php";
						
					}else if(isset($_GET['c']) && $_GET['c']=='f'){
						
							include "PasangIklan/PengaturanAkunPerusahaan.php";
							
					}else if(isset($_GET['c']) && $_GET['c']=='g'){
						
								include "PasangIklan/TambahKuota.php";
						
					}else if(isset($_GET['c']) && $_GET['c']=='logout'){
						include "PasangIklan/logout.php";
					}else if(isset($_GET['c']) && $_GET['c']=='k'){
						include "PasangIklan/invoice.php";
					}else if(isset($_GET['c']) && $_GET['c']=='m'){
						if(cektransaksiaktif($_SESSION['idperusahaan'])==TRUE){							
								include "PasangIklan/kuotasudahaktif.php";							
						}else{
							if(cektransaksiwaiting($_SESSION['idperusahaan'])==TRUE)
								include "PasangIklan/invoice.php";
							else
								include "PasangIklan/PaketPembayaran.php";
						}
					}else if(isset($_GET['c']) && $_GET['c']=='n'){
						include "PasangIklan/FormTambahIklan.php";
					}else if(isset($_GET['c']) && $_GET['c']=='o'){
						
							include "Arsip/CV.php";
							
					}else if(isset($_GET['c']) && $_GET['c']=='p'){
						
							include "Arsip/LihatCV.php";
							
					}else{
						echo '<meta http-equiv="refresh" content="0;url=index.php?p=c&c=b">';
					}
				}else{
					include "PasangIklan/LoginPerusahaan.php";
				}
			
			}else{
				include "Beranda/Beranda.php";
			}
	
	?>
	<!-- end #page -->
</div>
<div id="footer-content">
	<div id="footer-bg" class="container">
		<div id="column1">
			<h2></h2>
			<p></p>
		</div>
		<div id="column2">
			<h2></h2>
			<p></p>
		</div>
		<div id="column3">
			<h2></h2>
			
		</div>
	</div>
</div>
<div id="footer">
	<p></a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
