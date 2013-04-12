<div id="page">
<?php include"PasangIklan/menu.php";?>
<br><br>
<h3>Anda telah melakukan transaksi penambahan kuota<br> Silahkan lakukan pembayaran dengan format berita transaksi<br><br>

<?php
if(isset($_SESSION['f']) && isset($_SESSION['h'])){
echo $_SESSION['f'];
echo 'Sejumlah '.$_SESSION['h'];

unset($_SESSION['f']);
unset($_SESSION['h']);

}else{
	if(cektransaksiaktif($_SESSION['idperusahaan'])==true){
		$q = sprintf("select t.faktur,k.harga from transaksi_kuota t,kuota k,(select id_perusahaan,id_transaksi from transaksi where status_konfirm='A') as per where t.id_kuota=k.id_kuota and t.id_transaksi=per.id_transaksi and t.status_konfirm='W' and per.id_perusahaan=%d",mysql_real_escape_string($_SESSION['idperusahaan']));
		$res = mysql_fetch_array(mysql_query($q));
		echo '  <font color="red">'.$res['faktur'].'</font><br>';
		echo ' Sejumlah Rp'.$res['harga'];	
	}

}

echo " ke rekening ... <br> lakukan sms konfirmasi ke no ... agar bisa segera kami proses terimakasih telah menggunakan layanan kami<br>
Transaksi ini akan dicancel jika anda tidak melakukan pembayaran hingga masa berlaku member anda habis
<br> salam tim IT JOBS";
?>

</h3>

</div>