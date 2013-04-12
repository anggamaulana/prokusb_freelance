<?php
if(isset($_POST['submit'])){
			
			if(empty($_POST['kuota']))$kuota="<font color=\"red\">Silahkan Pilih salah satu opsi penambahan Kuota</font>";
			
			if(!(isset($kuota))){
				
				$f = generatefaktur("transaksi_kuota");
				$idtrans =caritransaksiaktif($_SESSION['idperusahaan']);
				$q = sprintf("insert into transaksi_kuota(id_kuota,faktur,id_transaksi) values(%d,'%s',%d)",
				mysql_real_escape_string($_POST['kuota']),
				mysql_real_escape_string($f),
				mysql_real_escape_string($idtrans)
				);
				if(mysql_query($q)){
					
					$q = "select harga from kuota where id_kuota='".mysql_real_escape_string($_POST['kuota'])."'";
					$res = mysql_fetch_array(mysql_query($q));
					$_SESSION['f']=$f;
					$_SESSION['h']=$res['harga'];
					echo '<meta http-equiv="refresh" content="0;url=index.php?p=c&c=m">';
				}
			
			}
			
}
?>
	<div id="page">
		<div id="content">
			<div class="post">
								<?php include"PasangIklan/menu.php";?>
			</div>
		</div>
		
		<div style="clear: both;">&nbsp;</div>

<div style="padding-left:100px" >
        <div class="clearboth">
        </div>
        <h1>
            Tambah Kuota</h1>
        <pre>
<tr>
  <form name="paketpembayaran"  method="post" action="index.php?p=c&c=g">
 

 <p>Pilih Opsi Tambah Kuota :  <?php if(isset($kuota))echo $kuota;?></p>
 <input name="kuota" type="radio" value="1">	<label>3 Iklan (Rp.7.000,00)</label>
	<label>{pilihan ini berisikan tambahan paket iklan sebanyak 3 buah dengan biaya Rp.7.000,00}</label>
	
	
 <input name="kuota" type="radio" value="2">	<label>6 Iklan (Rp.13.000,00)</label>
	<label>{pilihan ini berisikan tambahan paket iklan sebanyak 6 buah dengan biaya Rp.13.000,00}</label>
	
 
 <input type="submit" name="submit" value="Pilih">
  
 </pre>
</form>

  </tr>
   
       
</div> </div>       
