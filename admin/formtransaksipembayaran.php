<?php
session_start();
if(isset($_SESSION['sid']) && isset($_SESSION['idadmin'])){
include "../koneksi.php";
include "../PasangIklan/fungsi.php";
if(!isset($_POST['cancel'])){
	if(isset($_POST['submit'])){
		//do something
		if(empty($_POST['mulai']))$waktu='<font color="red">Field Waktu kosong</font>';
		if(empty($_POST['status']))$waktu='<font color="red">Field status kosong</font>';
		
		if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/',$_POST['mulai'])==0)
		$waktu="<font color=\"red\">format tanggal harus yyyy-mm-dd</font>";
		
		if(preg_match('/^[AC]+$/',$_POST['status'])==0)
	$status="<font color=\"red\">Status salah</font>";
		if(!(isset($waktu) || isset($status))){
			$paket=mysql_fetch_object(mysql_query("select id_paket,id_perusahaan from transaksi where id_transaksi=".mysql_real_escape_string($_POST['i']).""));
			$perusahaan=$paket->id_perusahaan;
			$idpaket=$paket->id_paket;
			
			
			$q=sprintf("update transaksi set status_konfirm='%s', waktu_mulai='%s', waktu_selesai='%s' where id_transaksi=%d",
			mysql_real_escape_string($_POST['status']),
			mysql_real_escape_string($_POST['mulai']),
			mysql_real_escape_string(cariwaktuhabis($_POST['mulai'],$idpaket)),
			mysql_real_escape_string($_POST['i']));
			if(mysql_query($q)){
				$q=sprintf("update perusahaan set jatah_iklan=(select max_iklan from paket where id_paket=%d) where id_perusahaan=%d",
				mysql_real_escape_string($idpaket),mysql_real_escape_string($perusahaan));
				mysql_query($q);
				echo '<meta http-equiv="refresh" content="0;url=halamanadmin.php">';
			
			}
		}
	
	
	}
}else{
	echo '<meta http-equiv="refresh" content="0;url=halamanadmin.php">';
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../js/base/jquery.ui.all.css">
	<script src="../js/jquery-1.6.2.js"></script>
	<script src="../js/jquery.ui.core.js"></script>	
	<script src="../js/jquery.ui.datepicker.js"></script>
	<script type="text/javascript">
	$(function(){	
		$('#mulai').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth:true,
			changeYear:true
		});
	});
	</script>

</head>

<body>

<?php include"menu.php";

$_GET['i'] = (int)$_GET['i'];
		
			$q="select t.id_transaksi,t.waktu as Waktu,p.paket as Paket,t.faktur as Faktur,per.nama_perusahaan as Perusahaan,per.email as Email,p.rentang from transaksi t, paket p, perusahaan per where t.id_perusahaan=per.id_perusahaan and t.id_paket=p.id_paket and t.id_transaksi=".mysql_real_escape_string($_GET['i'])."";
			$res=mysql_query($q);
			$r=mysql_fetch_object($res);
?><br><Br>
<h2>Transaksi Pembayaran Aktivasi Paket</h2>
<form id="form1" name="form1" method="post" action="">
<input type="hidden" name="i" value="<?php echo $_GET['i'];?>">
<p><b>Waktu Order :</b> <?php 
echo $r->Waktu; 
?></p>
<p><b>Paket : </b><?php 
echo $r->Paket; ?></p>
<p><b>Faktur :</b> <?php 
echo $r->Faktur; 
?></p>
<p><b>Perusahaan:</b> <?php 
echo $r->Perusahaan; 
?></p>
<p><b>Email :</b> <?php
 echo $r->Email; 
 ?></p>
  <p><b>Waktu Mulai Berlaku</b>
    <input name="mulai" type="text" id="mulai" /><?php if(isset($waktu))echo $waktu;?>
</p>
Masa Berlaku adalah <?php echo $r->rentang;?> Bulan
  <p><b>Status</b>
    <select name="status" id="status">
      <option value="A">Aktifkan</option>
      <option value="C">Cancel</option>
    </select><?php if(isset($status))echo $status;?>
</p>
<input type="submit" name="submit" value="Submit"> <input type="submit" name="cancel" value="Cancel">
</form>
</body>
</html>
<?php
}

?>