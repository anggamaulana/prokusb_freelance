<?php
if(isset($_POST['submit'])){
			
			if(empty($_POST['paket']))$paket="<font color=\"red\">Silahkan Pilih salah satu paket</font>";
			
			if(!(isset($paket))){
				
				$f = generatefaktur("transaksi");
				$q = sprintf("insert into transaksi(id_paket,faktur,id_perusahaan) values(%d,'%s',%d)",
				mysql_real_escape_string($_POST['paket']),
				mysql_real_escape_string($f),
				mysql_real_escape_string($_SESSION['idperusahaan'])
				);
				if(mysql_query($q)){
				
					$q = "select harga from paket where id_paket='".mysql_real_escape_string($_POST['paket'])."'";
					$res = mysql_fetch_array(mysql_query($q));
					$_SESSION['f']=$f;
					$_SESSION['h']=$res['harga'];
					echo '<meta http-equiv="refresh" content="0;url=index.php?p=c&c=k">';
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
            Paket Pembayaran</h1> <br>
			Silahkan Aktivasi member dengan melakukan pembayaran, silahkan pilih salah satu opsi paket
        <pre>
		
<tr>
  <form name="paketpembayaran"  method="post" action="index.php?p=c&c=e">
 

 <p>Pilih Paket Pembayaran : <?php if(isset($paket))echo $paket;?></p>
 <input name="paket" type="radio" value="1">	<label>3 Bulan 3 Iklan (Rp.10.000,00)</label>
	<label>{pilihan ini berisikan paket iklan selama 3 bulan dengan max iklan sebanyak 3 buah dengan biaya Rp.10.000,00}</label>
	
	
 <input name="paket" type="radio" value="2">	<label>6 Bulan 6 Iklan (Rp.20.000,00)</label>
	<label>{pilihan ini berisikan paket iklan selama 6 bulan dengan max iklan sebanyak 6 buah dengan biaya Rp.20.000,00}</label>
	
	
 <input name="paket" type="radio" value="3">	<label>12 Bulan 12 Iklan (Rp.35.000,00)</label>
	<label>{pilihan ini berisikan paket iklan selama 12 bulan dengan max iklan sebanyak 12 buah dengan biaya Rp.35.000,00}</label>
	
 
 <input type="submit" name="submit" value="Pilih">
  
 </pre>
</form>






				</center>
			</td>
			</td>
  </tr>
   
       
</div></div>        
