<?php
if(isset($_GET['i']))
$_GET['i'] = (int)$_GET['i'];

if(!(isset($_POST['submitcancel']))){
	if(!isset($_GET['m'])){
	if(isset($_POST['submit'])){

		if(empty($_POST['judul']))$judul="<font color=\"red\">Judul harus diisi</font>";
		if(empty($_POST['isi']))$isi="<font color=\"red\">Isi harus diisi</font>";
		
		if(!(isset($judul) || isset($isi))){
			$q=sprintf("insert into surat_lamaran(judul,isi,id_member) values('%s','%s',%d) ",
			mysql_real_escape_string($_POST['judul']),
			mysql_real_escape_string($_POST['isi']),
			mysql_real_escape_string($_SESSION['idmember'])
			);
			if(mysql_query($q)){
				echo '<meta http-equiv="refresh" content="0;url=index.php?p=b&c=i">';
			}
		}	
	}
	}else{
		
		
			
		if(isset($_POST['submitedit'])){
			$q=sprintf("update surat_lamaran set judul='%s',isi ='%s',waktu_update=NOW() where id_lamaran=%d and id_member=%d",
			mysql_real_escape_string($_POST['judul']),
			mysql_real_escape_string($_POST['isi']),		
			mysql_real_escape_string($_GET['i']),
			mysql_real_escape_string($_SESSION['idmember'])
			);
			if(mysql_query($q)){
				
			}
		}
		
		$q = sprintf("select id_lamaran as id,waktu,judul,isi,waktu_update from surat_lamaran where id_lamaran=%d and id_member=%d", mysql_real_escape_string($_GET['i']),mysql_real_escape_string($_SESSION['idmember']));
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			$r=mysql_fetch_object($res);
	}
}else{
	echo '<meta http-equiv="refresh" content="0;url=index.php?p=b&c=i">';

}

?>
	<div id="page">
		<div id="content">
			<div class="post">
					<?php include "Arsip/menu.php";?>					
			</div>
		</div>
		
		<div style="clear: both;">&nbsp;</div>
		

<div style="padding-left:100px" >
        <div class="clearboth">
        </div>
        <h1>
            Surat Lamaran</h1>
        <pre>
<tr>

<form name="iklan"  method="post" 
<?php if(isset($_GET['m']) && $_GET['m']=='e')
echo 'action="index.php?p=b&c=l&m=e&i='.$_GET['i'].'"'; 
else
echo 'action="index.php?p=b&c=l"'; 
 ?>>
  <p>Judul 			<input type="text" name="judul" value="<?php if(isset($r))echo $r->judul;?>" size="20"><?php if(isset($judul))echo $judul;?>

Isi			<textarea name="isi" cols="60"rows="30" ><?php if(isset($r))echo $r->isi;?></textarea><?php if(isset($isi))echo $isi;?>

<input type="submit" <?php if(isset($_GET['m']) && $_GET['m']=='e')echo 'name="submitedit"'; else echo 'name="submit"';?> value="Simpan"> <input type="submit" name="submitcancel" value="Cancel">

</pre>
</form>






				</center>
			</td>
			</td>
  </tr>
   
       
</div> 	</div>       
