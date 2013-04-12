<?php
session_start();
if(isset($_SESSION['sid']) && isset($_SESSION['idadmin'])){
include "../koneksi.php";
if(!isset($_POST['cancel'])){
	if(isset($_POST['submit'])){
		//do something
		if(preg_match('/^[AC]+$/',$_POST['status'])==0)
		$status="<font color=\"red\">Status salah</font>";
		
		$cek=mysql_query("select tk.id_trans_k from transaksi t,transaksi_kuota tk where tk.id_transaksi=t.id_transaksi and t.status_konfirm='A' and tk.id_trans_k=".mysql_real_escape_string($_POST['i'])."");
		if(mysql_num_rows($cek)<=0)$status='<font color="red">Maaf id transaksi untuk penambahan kuota tidak aktif</font>';
		
		$cek=mysql_query("select tk.id_trans_k from transaksi t,transaksi_kuota tk where tk.id_transaksi=t.id_transaksi and t.status_konfirm='A' and tk.status_konfirm='A' and tk.id_trans_k=".mysql_real_escape_string($_POST['i'])."");
		if(mysql_num_rows($cek)>0)$status='<font color="red">Maaf transaksi ini untuk penambahan kuota ini sudah aktif</font>';
		
		if(!(isset($status))){
			$paket=mysql_fetch_object(mysql_query("select k.jumlah,t.id_perusahaan from transaksi t,transaksi_kuota tk,kuota k where tk.id_transaksi=t.id_transaksi and tk.id_kuota=k.id_kuota and tk.id_trans_k=".mysql_real_escape_string($_POST['i']).""));
			$perusahaan=$paket->id_perusahaan;
			$jumlah=$paket->jumlah;
			
			
			$q=sprintf("update transaksi_kuota set status_konfirm='%s' where id_trans_k=%d",
			mysql_real_escape_string($_POST['status']),mysql_real_escape_string($_POST['i']));
			
			if(mysql_query($q)){
				$q=sprintf("update perusahaan set jatah_iklan=jatah_iklan+%d where id_perusahaan=%d",
				mysql_real_escape_string($jumlah),mysql_real_escape_string($perusahaan));
				mysql_query($q);
				echo '<meta http-equiv="refresh" content="0;url=halamanadmin2.php">';
			
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

</head>

<body>

<?php include"menu.php";

$_GET['i'] = (int)$_GET['i'];
		
			$q="select tk.waktu,tk.id_trans_k as id,tk.id_transaksi,k.jumlah,tk.faktur,per.nama_perusahaan as Perusahaan,per.email as Email from transaksi_kuota tk,kuota k,perusahaan per,transaksi t where tk.id_kuota=k.id_kuota and tk.id_transaksi=t.id_transaksi and t.id_perusahaan=per.id_perusahaan and t.status_konfirm='A' and tk.id_trans_k=".mysql_real_escape_string($_GET['i'])."";
			$res=mysql_query($q);
			$r=mysql_fetch_object($res);
?>
<br><Br>
<h2>Penambahan Kuota</h2>
<form id="form1" name="form1" method="post" action="">
<input type="hidden" name="i" value="<?php echo $_GET['i'];?>">
<p><b>Waktu Order :</b> <?php 
echo $r->waktu; 
?></p>
<p><b>Jumlah penambahan Kuota  :</b> <?php 
echo $r->jumlah; 
?></p>
<p><b>Faktur :</b> <?php 
echo $r->faktur; 
?></p>
<p><b>Perusahaan:</b> <?php 
echo $r->Perusahaan; 
?></p>
<p><b>Email :</b> <?php
 echo $r->Email; 
 ?></p>

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