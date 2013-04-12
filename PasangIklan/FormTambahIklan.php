<?php



if(!isset($_POST['cancel'])){
	if(isset($_POST['submit'])){
		if(empty($_POST['nama']))$nama="<font color=\"red\">Nama harus diisi </font>";
		if(empty($_POST['kategori']))$kategori="<font color=\"red\">Kategori harus diisi </font>";
		if(empty($_POST['waktu']))$mulai="<font color=\"red\">Waktu mulai harus diisi</font>";
		if(empty($_POST['deadline']))$deadline="<font color=\"red\">Deadline harus diisi </font>";
		if(empty($_POST['keterangan']))$keterangan="<font color=\"red\">Keterangan harus diisi </font>";
		
		if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/',$_POST['waktu'])==0)
		$mulai="<font color=\"red\">format tanggal harus yyyy-mm-dd</font>";
		
		if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/',$_POST['deadline'])==0)
		$deadline="<font color=\"red\">format tanggal harus yyyy-mm-dd</font>";
		
		if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/',$_POST['deadline'])>0 && preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/',$_POST['waktu'])>0){
			$a=strtotime($_POST['waktu']);
			$b=strtotime($_POST['deadline']);		
			if($b<$a)
			$deadline="<font color=\"red\">Deadline seharusnya lebih besar dari waktu mulainya</font>";
			
			
		}
		
		if(!(isset($nama)|| isset($kategori)|| isset($mulai)|| isset($deadline)|| isset($keterangan) )){
			$q=sprintf("insert into pekerjaan(nama_pekerjaan,id_kategori_pekerjaan,id_perusahaan,keterangan,waktu_mulai,waktu_habis) values('%s',%d,%d,'%s','%s','%s')",
			mysql_real_escape_string($_POST['nama']),
			mysql_real_escape_string($_POST['kategori']),
			mysql_real_escape_string($_SESSION['idperusahaan']),
			mysql_real_escape_string($_POST['keterangan']),	
			mysql_real_escape_string($_POST['waktu']),
			mysql_real_escape_string($_POST['deadline'])
			);
			if(mysql_query($q)){
					
				
				echo '<meta http-equiv="refresh" content="0;url=index.php?p=c&c=b">';
			}
		}	
	}
}else{
	echo '<meta http-equiv="refresh" content="0;url=index.php?p=c&c=b">';
	
}




?>

<script type="text/javascript">
	$(function(){	
		$('#waktu').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth:true,
			changeYear:true,
			yearRange:'2012:2020',
			defaultDate:'now'
		});
		$('#deadline').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth:true,
			changeYear:true,
			yearRange:'2012:2020',
			defaultDate:'now'
		});
	});
	</script>
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
            Tambah Iklan</h1>
        <pre>
<tr>
<form  name="iklan"  method="post" action="index.php?p=c&c=n">
  <p>Nama Pekerjaan 			<input type="text" name="nama" value="<?php if(isset($_POST['nama']))echo $_POST['nama'];?>" size="20"> <?php if(isset($nama))echo $nama;?>
 
Kategori Pekerjaan		<select name="kategori">
				<option value="">Masukkan Kategori</option>
				<option value="">------------------------</option>
<?php
		$q = "select id_kategori_pekerjaan as id,nama_kategori_pekerjaan as Kategori from kategori_pekerjaan";			
			$result=mysql_query($q);
			while($row = mysql_fetch_object($result)){
				echo '<option value="'.$row->id.'">'.$row->Kategori.'</option>';
			}
			
			?>
	</select><?php if(isset($kategori))echo $kategori;?>

Waktu Mulai 			<input type="text" name="waktu" id="waktu" value="<?php if(isset($_POST['waktu']))echo $_POST['waktu'];?>" size="20"><?php if(isset($mulai))echo $mulai;?>

Dead Line			<input type="text" name="deadline" id="deadline" value="<?php if(isset($_POST['deadline']))echo $_POST['deadline'];?>" size="20"><?php if(isset($deadline))echo $deadline;?>

Keterangan			<textarea name="keterangan" rows="20" cols="60" ><?php if(isset($_POST['keterangan']))echo $_POST['keterangan'];?></textarea><?php if(isset($keterangan))echo $keterangan;?>

<input type="submit" name="submit" value="Simpan"> <input type="submit" name="cancel" value="Cancel">
</pre>
</form>






				</center>
			</td>
			</td>
  </tr>
   
       
</div> 	</div>     

 
