<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>
</head>
<body>
	<div>
	<h4>Data-----------------------------------</h4>
		<a href='<?php echo site_url('adminpage/pengiklan')?>'>Data Pengiklan</a> |
		<a href='<?php echo site_url('adminpage/datamember')?>'>Data Member</a> |
		
		
		<a href='<?php echo site_url('adminpage/paketpembayaran')?>'>Paket Pembayaran</a> | 
		<a href='<?php echo site_url('adminpage/paketpenambahkuota')?>'>Paket Penambah Kuota</a> | 
		<a href='<?php echo site_url('adminpage/katpekerjaan')?>'>Kategori Pekerjaan</a> |	
		
			<br>
		
		<a href='<?php echo site_url('adminpage/datatransaksiaktif')?>'>Transaksi aktif</a> |
		<a href='<?php echo site_url('adminpage/datatransaksikuotaaktif')?>'>Transaksi Kuota aktif</a> |
		<a href='<?php echo site_url('adminpage/datatransaksiexpired')?>'>Transaksi Expired</a> |
		<a href='<?php echo site_url('adminpage/datatransaksicancel')?>'>Transaksi Cancel</a> |
	
	<h4>Menunggu Konfirmasi-----------------------------------</h4>
		<a href='<?php echo site_url('adminpage/datatransaksimenunggu')?>'>Transaksi Menunggu Konfirmasi</a> |
		<a href='<?php echo site_url('adminpage/datatransaksikuotamenunggu')?>'>Transaksi Kuota Menunggu Konfirmasi</a> |
	<br><br>
	<a href='<?php echo site_url('adminpage/logout')?>'>Logout</a> |
		
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
