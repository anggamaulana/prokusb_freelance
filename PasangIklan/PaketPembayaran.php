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
         Selamat Datang</h1> <br>
	
       
</div></div>        
