<?php
		if(isset($_POST['submit'])){
			
			if(empty($_POST['email']))$email="<font color=\"red\">Email harus diisi</font>";
			if(empty($_POST['password']))$password="<font color=\"red\">Password harus diisi</font>";
			if(preg_match('/^[a-z][\w\.]*@[a-z0-9]+\.[a-z]{2,}/',$_POST['email'])==0)
	$email="<font color=\"red\">Email Harus valid</font>";
			
			if(!(isset($password) || isset($email))){
				$q = sprintf("select id_perusahaan as id from perusahaan where email='%s' and password=MD5('%s')",
				mysql_real_escape_string($_POST['email']),
				mysql_real_escape_string($_POST['password'])
				);
				$res = mysql_query($q);
				$id = mysql_fetch_object($res);
				if(mysql_num_rows($res)>0){
					if(isset($_SESSION['sid']))unset($_SESSION['sid']);
					if(isset($_SESSION['idmember']))unset($_SESSION['idmember']);
					$_SESSION['sid'] = session_id();
					$_SESSION['idperusahaan'] = $id->id;
					
					echo '<meta http-equiv="refresh" content="0;url=index.php?p=c&c=a">';
				}else{
					$noreguser="<font color=\"red\">user atau email salah</font>";
				}
			}
		}
		
		
if(isset($_POST['submitdaftar'])){

	if(empty($_POST['namaperusahaan']))$namaperusahaan="<font color=\"red\">Nama harus diisi</font>";
	if(empty($_POST['emailperusahaan']))$emailperusahaan="<font color=\"red\">Email harus diisi</font>";
	if(empty($_POST['passwordperusahaan']))$passwordperusahaan="<font color=\"red\">Password harus diisi</font>";
	if(empty($_POST['copassword']))$copassword="<font color=\"red\">Konfirmasi Password harus diisi</font>";
	if(empty($_POST['alamat']))$alamat="<font color=\"red\">Alamat harus diisi</font>";
	if(empty($_POST['provinsi']))$provinsi="<font color=\"red\">Provinsi harus diisi</font>";
	
	if(empty($_POST['agree']))$agree="<font color=\"red\">Anda belum menyatakan kebenaran data yang diisi</font>";
	
	if(preg_match('/^[a-z][\w\.]*@[a-z0-9]+\.[a-z]{2,}/',$_POST['emailperusahaan'])==0)
	$emailperusahaan="<font color=\"red\">Email Harus valid</font>";
	
	$q = "select email from perusahaan where email='".mysql_real_escape_string($_POST['emailperusahaan'])."'";	
	$result=mysql_query($q);
	if(mysql_num_rows($result)>0)
	$emailperusahaan="<font color=\"red\">Email tersebut Sudah Digunakan</font>";
	
	if($_POST['copassword']!=$_POST['passwordperusahaan'])
	$copassword="<font color=\"red\">Password belum terkonfirmasi</font>";	
	
	if(!(isset($namaperusahaan) || isset($emailperusahaan) || isset($passwordperusahaan) || isset($copassword) || isset($alamat) || isset($provinsi) || isset($agree))){
		
		 
	$q = sprintf('INSERT INTO  perusahaan (
				nama_perusahaan,email,password,alamat,id_provinsi
				)
				VALUES (
				\'%s\',\'%s\',MD5(\'%s\'),\'%s\',%d)',
				mysql_real_escape_string($_POST['namaperusahaan']),
				mysql_real_escape_string($_POST['emailperusahaan']),
				mysql_real_escape_string($_POST['passwordperusahaan']),
				mysql_real_escape_string($_POST['alamat']),					
				mysql_real_escape_string($_POST['provinsi']));
		if(mysql_query($q)){
			$id = mysql_insert_id();
			$_SESSION['sid'] = session_id();
			$_SESSION['idperusahaan'] = $id;
			
			echo '<meta http-equiv="refresh" content="0;url=index.php?p=c&c=e">';
		}
		
	}
}

	?>
<div id="page">
		
		
		<div style="clear: both;">&nbsp;</div>

<div style="float:left;margin-right:7px" >
        <div class="clearboth">
        </div>
        <h1>
            Pendaftaran Pemasang Iklan</h1>
        <pre>
<tr>

<form name="pendaftaran"  method="post" action="index.php?p=c">

Nama Perusahaan		<input type="text" name="namaperusahaan" value="<?php if(isset($_POST['namaperusahaan']))echo $_POST['namaperusahaan'];?>" size="20">
<?php if(isset($namaperusahaan))echo $namaperusahaan;?><br>
  
Email			<input type="text" name="emailperusahaan" value="<?php if(isset($_POST['emailperusahaan']))echo $_POST['emailperusahaan'];?>" size="20">
 <?php if(isset($emailperusahaan))echo $emailperusahaan;?><br>
Password		<input type="password" name="passwordperusahaan" value="<?php if(isset($_POST['passwordperusahaan']))echo $_POST['passwordperusahaan'];?>" size="20">
<?php if(isset($passwordperusahaan))echo $passwordperusahaan;?><br>
co-Password		<input type="password" name="copassword" value="<?php if(isset($_POST['copassword']))echo $_POST['copassword'];?>" size="20">
<?php if(isset($copassword))echo $copassword;?><br>
Alamat			<textarea name="alamat"rows="4" ><?php if(isset($_POST['alamat']))echo $_POST['alamat'];?></textarea>
<?php if(isset($alamat))echo $alamat;?><br>
Provinsi		<select name="provinsi" style="border:1px;border-color:#fff">
				<option value ="" selected="selected">masukan lokasi</option>
				<?php 
				$q = "select id_provinsi,nama_provinsi from provinsi";			
				$result=mysql_query($q);
				while($row = mysql_fetch_object($result)){?>
				<option value="<?php echo $row->id_provinsi;?>"><?php echo $row->nama_provinsi;?></option>
				<?php } ?>
			</select>
 <?php if(isset($provinsi))echo $provinsi;?><br>
    
<td colspan="2"><input type="checkbox" name="agree" id="agree" value="1"> Saya menyetujui bahwa data diatas benar adanya</td><br><?php if(isset($agree))echo $agree;?>


<input type="submit" name="submitdaftar" value="Simpan">  <input type="reset" value="selanjutnya">
</pre>
</form>
</tr>   
</div>    
	 
		<div style="margin-bottom:100px">
			<ul>
			
					<div id="search" >
						<form name="loginperusahaan" method="post" action="index.php?p=c">
							<div><pre>
							<h2 class="title">Login</h2>
Email    		<input type="text" name="email" value="<?php if(isset($_POST['email']))echo $_POST['email'];?>" size="20">
   <?php if(isset($email))echo $email;?><br>
Password 		<input type="password" name="password" value="<?php if(isset($_POST['password']))echo $_POST['password'];?>" size="20">
 <?php if(isset($password))echo $password;?>
 <?php if(isset($noreguser))echo $noreguser;?>
<p><input type="submit" name="submit" value="Login"> </p>

							</div>
						</form>
					</div>
			
			</ul>
		</div>
		<div style="clear:both"></div>
       
 </div>       
