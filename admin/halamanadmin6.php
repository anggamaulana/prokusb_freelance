<?php
session_start();
if(isset($_SESSION['sid']) && isset($_SESSION['idadmin'])){
include "../koneksi.php";



?>
<?php include"menu2.php";?>
<form id="form1" name="form1" method="post" action="halamanadmin2.php">
  Cari Faktur
    <input name="fakt" type="text" id="fakt" />
    <input type="submit" name="submit" value="Cari" />
</form>
<p>
  <?php
			$q="select tk.waktu,tk.id_trans_k as id,tk.id_transaksi,k.jumlah,tk.faktur,per.nama_perusahaan as Perusahaan,tk.status_konfirm as status from transaksi_kuota tk,kuota k,perusahaan per,transaksi t where tk.id_kuota=k.id_kuota and tk.id_transaksi=t.id_transaksi and t.id_perusahaan=per.id_perusahaan and t.status_konfirm='A' and (tk.status_konfirm='C' or tk.status_konfirm='E')";
			
			if(isset($_POST['submit'])){
				$q="select tk.waktu,tk.id_trans_k as id,tk.id_transaksi,k.jumlah,tk.faktur,per.nama_perusahaan as Perusahaan,tk.status_konfirm as status from transaksi_kuota tk,kuota k,perusahaan per,transaksi t where tk.id_kuota=k.id_kuota and tk.id_transaksi=t.id_transaksi and t.id_perusahaan=per.id_perusahaan and t.status_konfirm='A' and (tk.status_konfirm='C' or tk.status_konfirm='E') and  tk.faktur like '".mysql_real_escape_string($_POST['fakt'])."%'";
			
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
    <td>Menggunakan Transaksi</td>
    <td>Penambahan Kuota</td>
    <td>faktur</td>
	<td>Perusahaan</td>    
    <td>Status</td>
  
  </tr>
  <?php
  	while($r=mysql_fetch_object($res)){
  ?>
  <tr>
  		<td><?php
			echo $r->waktu;
		?></td>
		<td><?php
			echo $r->id;
		?></td>
		<td><?php
			echo $r->jumlah;
		?></td>
		<td><?php
			echo $r->faktur;
		?></td>
		<td><?php
			echo $r->Perusahaan;
		?></td>
		<td>
			<?php
			echo $r->status;
		?>
		</td>
  </tr>
  </tr>
  <?php
  }
  ?>
</table>

<?php
}else{
	echo "<h3>Tidak ada transaksi penambahan kuota cancel atau expired</h3>";

}
?>
<p>&nbsp;</p>
<p>&nbsp; </p>
<?php

}
?>
