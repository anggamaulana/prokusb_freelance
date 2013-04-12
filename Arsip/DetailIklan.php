<?php

	$_GET['i'] = (int)$_GET['i'];
	
	if(isset($_POST['submit'])){
		$_POST['i']=(int)$_POST['i'];
		$q1= sprintf("select id_pekerjaan from pekerjaan_pil where id_pekerjaan=%d and id_member=%d",
		mysql_real_escape_string($_POST['i']),
		mysql_real_escape_string($_SESSION['idmember'])
		);
		$res1=mysql_query($q1);
		$hsl=mysql_num_rows($res1);
		
		if($hsl>0)
		$alert='<font color="red">Anda sudah melamar pekerjaan ini</font>';
		
		if(!(isset($alert))){
			$q=sprintf("insert into pekerjaan_pil(id_pekerjaan,id_member) values(%d,%d)",
				mysql_real_escape_string($_POST['i']),
				mysql_real_escape_string($_SESSION['idmember'])
			);
			if(mysql_query($q)){
				$alert='<font color="red">Anda sudah melamar pekerjaan ini</font>';
			}
		
		}
	
	}
	
	
	$q = sprintf("select p.nama_pekerjaan as Pekerjaan,per.nama_perusahaan as Perusahaan,k.nama_kategori_pekerjaan as Kategori,p.waktu_mulai as Mulai,p.waktu_habis as Deadline,prov.nama_provinsi as Provinsi,p.keterangan as Keterangan from pekerjaan p,perusahaan per,kategori_pekerjaan k,provinsi prov where p.id_perusahaan=per.id_perusahaan and per.id_provinsi=prov.id_provinsi and  p.id_kategori_pekerjaan = k.id_kategori_pekerjaan and  p.id_pekerjaan=%d",
            mysql_real_escape_string($_GET['i']));
		$res=mysql_query($q);
?>
	<div id="page">
		<div id="content">
			<div class="post">
						<?php
						if(isset($_SESSION['sid']) && isset($_SESSION['idmember'])){
					if(isset($_GET['p']) && $_GET['p']=='b')
						include"Arsip/menu.php";
						}
						?>						
			</div>
		</div>
		
		<div style="clear: both;">&nbsp;</div>
		

<div style="padding-left:100px" >
        <div class="clearboth">
        </div>
        <h1>
            Detail Iklan</h1>
        <pre>
<tr>

<?php
		while($rekomendasi = mysql_fetch_object($res)){
  ?>
  <p>Judul 	:<?php echo $rekomendasi->Pekerjaan;?>	
  
Kategori    :<?php echo $rekomendasi->Kategori;?>  
 
Perusahaan	: <?php echo $rekomendasi->Perusahaan;?>


Provinsi 	: <?php echo $rekomendasi->Provinsi;?>	

Mulai Berlaku	: <?php echo $rekomendasi->Mulai;?>	

Dead Line	: <?php echo $rekomendasi->Deadline;?>	

Keterangan	: <?php echo $rekomendasi->Keterangan;?>	

<?php
}

?>

</pre>







				</center>
			</td>
			</td>
  </tr>
  
  <?php
 
if(isset($_SESSION['sid']) && isset($_SESSION['idmember'])){

$q1= sprintf("select id_pekerjaan from pekerjaan_pil where id_pekerjaan=%d and id_member=%d",
		mysql_real_escape_string($_GET['i']),
		mysql_real_escape_string($_SESSION['idmember'])
		);
		$res1=mysql_query($q1);
		$hsl=mysql_num_rows($res1);
		if($hsl<=0){
?>
	<form name="lamar" method="post" action="index.php?p=b&c=k&i=<?php echo $_GET['i'];?>">
		Perusahaan ini dapat melihat CV anda untuk bahan pertimbangan<br>
		<input type="hidden" name="i" value="<?php echo $_GET['i'];?>">
		<input type="submit" name="submit" value="Masukkan Lamaran">
	</form>
	
<?php
}else{
	echo '<h3>Anda sudah melamar pekerjaan ini</h3>';
}
}
?>   
       
</div> 	</div>       
