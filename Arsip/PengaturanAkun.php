<?php
if(isset($_POST['submit'])){
			
			if(empty($_POST['nama']))$nama="<font color=\"red\">nama harus diisi</font>";
			if(empty($_POST['alamat']))$alamat="<font color=\"red\">alamat harus diisi</font>";
			
			if(empty($_POST['prov']))$prov="<font color=\"red\">provinsi harus diisi</font>";		
			
			if(!(isset($nama) || isset($alamat) ||isset($prov) )){
				//update
				
					$q = sprintf("update member set nama_member='%s', alamat='%s', id_provinsi=%d where id_member=%d",
					mysql_real_escape_string($_POST['nama']),
					mysql_real_escape_string($_POST['alamat']),
					mysql_real_escape_string($_POST['prov']),					
					mysql_real_escape_string($_SESSION['idmember']));
				
				if(mysql_query($q)){
					echo '<meta http-equiv="refresh" content="0;url=index.php?p=b&c=a">';
				}
				
			}
			
}

if(isset($_POST['submitgantipassword'])){
			
			if(empty($_POST['passwordlama']))$passwordlama="<font color=\"red\">Password lama harus diisi</font>";
			if(empty($_POST['passwordbaru']))$passwordbaru="<font color=\"red\">Password baru harus diisi</font>";			
			if(empty($_POST['copasswordbaru']))$copasswordbaru="<font color=\"red\">Silahkan konfirmasi Password baru</font>";

			$q=sprintf("select id_member from member where id_member=%d and password=MD5('%s')",
				mysql_real_escape_string($_SESSION['idmember']),
				mysql_real_escape_string($_POST['passwordlama'])
				);
			$res = mysql_query($q);
			if(mysql_num_rows($res)<=0)
			$passwordlama="<font color=\"red\">Password lama salah</font>";
			
			if($_POST['passwordbaru']!=$_POST['copasswordbaru'])
			$copasswordbaru="<font color=\"red\">konfirmasi Password baru tidak sama</font>";	
			
			if(!(isset($passwordlama) || isset($passwordbaru) ||isset($copasswordbaru) )){
				//update
				
					$q = sprintf("update member set password=MD5('%s') where id_member=%d",
					mysql_real_escape_string($_POST['passwordbaru']),					
					mysql_real_escape_string($_SESSION['idmember']));
				
				if(mysql_query($q)){
					echo '<meta http-equiv="refresh" content="0;url=index.php?p=b&c=a#gantips">';
				}
				
			}
			
}
$q = sprintf("select nama_member,id_provinsi,alamat from member where id_member=%d",
            mysql_real_escape_string($_SESSION['idmember']));
		$res=mysql_query($q);
		
		$baris = mysql_fetch_object($res);

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
            Pengaturan Akun</h1>
        <h3>
        Ubah nama,alamat dan password anda</h3>
        <p>&nbsp;</p>
		<pre> <form name="form1" method="post" action="index.php?p=b&c=f">
 <p>Nama  			<input type="text" name="nama" value="<?php echo $baris->nama_member;?>" size="20"> <?php if(isset($nama))echo $nama;?></p>		
 <p>Provinsi		<select name="prov" style="border:1px;border-color:#fff">
<option value ="" selected="selected">masukan lokasi anda</option>
				<?php 
				$q = "select id_provinsi,nama_provinsi from provinsi";			
				$result=mysql_query($q);
				while($row = mysql_fetch_object($result)){?>
				<option value="<?php echo $row->id_provinsi;?>" <?php if($row->id_provinsi==$baris->id_provinsi)echo 'selected="selected"';?>><?php echo $row->nama_provinsi;?></option>
				<?php } ?>
			</select> <?php if(isset($prov))echo $prov;?></p>
<p>Alamat			<textarea name="alamat" rows="5"><?php echo $baris->alamat;?></textarea> <?php if(isset($alamat))echo $alamat;?></p>		
			<label><input type="submit" name="submit" value="Submit"></label>
        </form></pre>
<br><br><br>
		<h3>Ganti Password</h3><br><br><br>
	 <form name="form1" id="gantips" method="post" action="index.php?p=b&c=f">	
		<p>Password Lama 		<input type="password" name="passwordlama" value="" size="20"> <?php if(isset($passwordlama))echo $passwordlama;?></p>
<p>Password Baru 		<input type="password" name="passwordbaru" value="" size="20"> <?php if(isset($passwordbaru))echo $passwordbaru;?></p>
<p>Confirm Password Baru	<input type="password" name="copasswordbaru" value="" size="20"> <?php if(isset($copasswordbaru))echo $copasswordbaru;?></p>
					<input type="submit" name="submitgantipassword" value="Submit">
		</form>
		</div> 	</div>       
