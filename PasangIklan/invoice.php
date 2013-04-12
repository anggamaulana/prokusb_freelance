<div id="page">
<?php include"PasangIklan/menu.php";?>
<br><br>
<h3>Silahkan lakukan pembayaran dengan format berita transaksi<br><br>

<?php
if(isset($_SESSION['f']) && isset($_SESSION['h'])){
echo $_SESSION['f'];
echo 'Sejumlah '.$_SESSION['h'];

unset($_SESSION['f']);
unset($_SESSION['h']);

}else{
	if(cektransaksiaktif($_SESSION['idperusahaan'])==false){
		$q = sprintf("select t.faktur,p.harga from transaksi t,paket p where t.id_paket=p.id_paket and t.id_perusahaan=%d and t.status_konfirm='W'",mysql_real_escape_string($_SESSION['idperusahaan']));
		$res = mysql_fetch_array(mysql_query($q));
		echo '<font color="red">'.$res['faktur'].'</font><br>';
		echo '<br> Sejumlah '.$res['harga'];	
	}

}

echo " ke rekening ... <br> lakukan sms konfirmasi ke no ... agar bisa segera kami proses terimakasih telah menggunakan layanan kami<br> salam tim IT JOBS";
?>

</h3>
</div>