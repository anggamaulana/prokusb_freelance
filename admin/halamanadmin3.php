<?php
session_start();
if(isset($_SESSION['sid']) && isset($_SESSION['idadmin'])){
include "../koneksi.php";



?>
<?php include"menu2.php";?>
<form id="form1" name="form1" method="post" action="halamanadmin.php">
  Cari Faktur
    <input name="fakt" type="text" id="fakt" />
    <input type="submit" name="submit" value="Cari" />
</form>
<p>
  <?php
			$q="select t.id_transaksi,t.waktu as Waktu,p.paket as Paket,t.faktur as Faktur,per.nama_perusahaan as Perusahaan,per.email as Email,t.waktu_mulai as Mulai,t.waktu_selesai as Deadline from transaksi t, paket p, perusahaan per where t.id_perusahaan=per.id_perusahaan and t.id_paket=p.id_paket and t.status_konfirm='A'";
			
			if(isset($_POST['submit'])){
				$q=$q="select t.id_transaksi,t.waktu as Waktu,p.paket as Paket,t.faktur as Faktur,per.nama_perusahaan as Perusahaan,per.email as Email,t.waktu_mulai as Mulai,t.waktu_selesai as Deadline from transaksi t, paket p, perusahaan per where t.id_perusahaan=per.id_perusahaan and t.id_paket=p.id_paket and t.status_konfirm='W' and t.faktur like '".mysql_real_escape_string($_POST['fakt'])."%'";
			}	
			
			
			$res=mysql_query($q);
	?>
</p>
<?php 
		if(mysql_num_rows($res)>0){
?>
<table width="893">
  <tr>
    <td>Waktu Transaksi </td>
    <td>Paket</td>
    <td>Faktur</td>
    <td>Perusahaan</td>
	<td>Email Perusahaan</td>
    <td>Waktu Mulai Berlaku</td>
    <td> Waktu Kadaluarsa </td>
    <td>Status</td>
  
  </tr>
  <?php
  	while($r=mysql_fetch_object($res)){
  ?>
  <tr>
  		<td><?php
			echo $r->Waktu;
		?></td>
		<td><?php
			echo $r->Paket;
		?></td>
		<td><?php
			echo $r->Faktur;
		?></td>
		<td><?php
			echo $r->Perusahaan;
		?></td>
		<td><?php
			echo $r->Email;
		?></td>
		<td><?php
			echo $r->Mulai;
		?></td>
		<td><?php
			echo $r->Deadline;
		?></td>
		<td>
			Aktif
		</td>
  </tr>
  </tr>
  <?php
  }
  ?>
</table>

<?php
}else{
	echo "<h3>Tidak ada transaksi yang menunggu konfirmasi sekarang</h3>";

}
?>
<p>&nbsp;</p>
<p>&nbsp; </p>
<?php

}
?>
