<?php
if(isset($_POST['submit'])){

	if(empty($_POST['nama']))$nama="<font color=\"red\">Nama harus diisi</font>";
	if(empty($_POST['email']))$email="<font color=\"red\">Email harus diisi</font>";
	if(empty($_POST['password']))$password="<font color=\"red\">Password harus diisi</font>";
	if(empty($_POST['copassword']))$copassword="<font color=\"red\">Konfirmasi Password harus diisi</font>";
	if(empty($_POST['alamat']))$alamat="<font color=\"red\">Alamat harus diisi</font>";
	if(empty($_POST['provinsi']))$provinsi="<font color=\"red\">Provinsi harus diisi</font>";
	if(empty($_POST['status']))$status="<font color=\"red\">Status harus diisi</font>";
	if(empty($_POST['tanggal_lahir']))$tanggal_lahir="<font color=\"red\">Tanggal Lahir harus diisi</font>";
	if(empty($_POST['tempat_lahir']))$tempat_lahir="<font color=\"red\">Tempat Lahir harus diisi</font>";
	if(empty($_POST['jkel']))$j_kel="<font color=\"red\">Jenis Kelmamin harus diisi</font>";
	if(empty($_POST['agama']))$agama="<font color=\"red\">Agama harus diisi</font>";
	if(empty($_POST['pilihan_pekerjaan']))$pilihan_pekerjaan="<font color=\"red\">Pilihan Pekerjaan harus diisi</font>";
	if(empty($_POST['agree']))$agree="<font color=\"red\">Anda belum menyatakan kebenaran data yang diisi</font>";
	
	if(preg_match('/^[a-z][\w\.]*@[a-z0-9]+\.[a-z]{2,}/',$_POST['email'])==0)
	$email="<font color=\"red\">Email Harus valid</font>";
	
	$q = "select email from member where email='".mysql_real_escape_string($_POST['email'])."'";		
	$result=mysql_query($q);
	if(mysql_num_rows($result)>0)
	$email="<font color=\"red\">Email tersebut Sudah Digunakan</font>";
	
	if($_POST['copassword']!=$_POST['password'])
	$copassword="<font color=\"red\">Password belum terkonfirmasi</font>";
	
	if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/',$_POST['tanggal_lahir'])==0)
	$tanggal_lahir="<font color=\"red\">format tanggal harus yyyy-mm-dd</font>";
	
	//if(isset($_POST['jkel']) && (strcmp($_POST['jkel'],'L')!=0 || strcmp($_POST['jkel'],'P')!=0))
	//$j_kel="<font color=\"red\">format jenis kelamin salah, anda mencoba melakukan xss wtf...</font>";
	
	 //if(strcmp($_POST['status'],'L')!=0 || strcmp($_POST['status'],'M')!=0)
	 //$status="<font color=\"red\">format status salah, anda mencoba melakukan xss wtf...</font>";
	
	if(!(isset($nama) || isset($email) || isset($password) || isset($copassword) || isset($alamat) || isset($provinsi) || isset($status) || isset($tanggal_lahir) || isset($tempat_lahir) || isset($j_kel) || isset($agama) || isset($pilihan_pekerjaan) || isset($agree))){
		
		 
	$q = sprintf('INSERT INTO  member (
				nama_member,email,password,alamat,status,tanggal_lahir,tempat_lahir,jenis_kelamin,
				agama,id_provinsi
				)
				VALUES (
				\'%s\',\'%s\', MD5(\'%s\') ,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',%d)',
				mysql_real_escape_string($_POST['nama']),
				mysql_real_escape_string($_POST['email']),
				mysql_real_escape_string($_POST['password']),
				mysql_real_escape_string($_POST['alamat']),
				mysql_real_escape_string($_POST['status']),
				mysql_real_escape_string($_POST['tanggal_lahir']),
				mysql_real_escape_string($_POST['tempat_lahir']),
				mysql_real_escape_string($_POST['jkel']),
				mysql_real_escape_string($_POST['agama']),
				mysql_real_escape_string($_POST['provinsi']));
		if(mysql_query($q)){
			$id = mysql_insert_id();
                        
			if(count($_POST['pilihan_pekerjaan'])>0){
                            
				foreach($_POST['pilihan_pekerjaan'] as $kat){
					$q = sprintf("insert into kat_pekerjaan_member(id_member,id_kategori_pekerjaan) values(%d,%d)",
					mysql_real_escape_string($id),
					mysql_real_escape_string($kat));
                                        mysql_query($q);
				}
			}
			$_SESSION['sid'] = session_id();
			$_SESSION['idmember'] = $id;
			
			echo '<meta http-equiv="refresh" content="0;url=index.php?p=b">';
		}
		
	}
}
?>

	<div id="page">
		<div id="content">
			<div class="post">
			
			</div>
		</div>
		
		<div style="clear: both;">&nbsp;</div>
		
<div style="padding-left:100px" >
        <div class="clearboth">
        </div>
        <h1>
            Pendaftaran Member</h1>
        <pre>
<tr>

<form name="LoginMember"  method="post" action="index.php?p=a&c=c">


Nama member		<input type="text" name="nama" value="<?php if(isset($_POST['nama']))echo $_POST['nama'];?>" size="20"><?php if(isset($nama))echo $nama;?>
<br>
Email			<input type="text" name="email" value="<?php if(isset($_POST['email']))echo $_POST['email'];?>" size="20"><?php if(isset($email))echo $email;?>
	<br>
Password		<input type="password" name="password" value="" size="20"><?php if(isset($password))echo $password;?>
	<br>
co-Password		<input type="password" name="copassword" value="" size="20"><?php if(isset($copassword))echo $copassword;?>
	<br>
Alamat			<textarea name="alamat" value="" rows="5"><?php if(isset($_POST['alamat']))echo $_POST['alamat'];?></textarea><?php if(isset($alamat))echo $alamat;?>
	<br>
Provinsi		<select name="provinsi">
				<option value ="" selected="selected">masukan lokasi asal</option>
				<?php 
				
				
				$q = "select id_provinsi,nama_provinsi from provinsi";			
				$result=mysql_query($q);
				while($row = mysql_fetch_object($result)){?>
				<option value="<?php echo $row->id_provinsi;?>"><?php echo $row->nama_provinsi;?></option>
				<?php } ?>
			</select><?php if(isset($provinsi))echo $provinsi;?>
	<br>
Status			<select name="status">
    <option value ="">Status</option>
    <option value="L">Lajang</option>
    <option value="M">Menikah</option>
  </select>
  <br>
Tempat lahir		<input type="text" name="tempat_lahir" value="<?php if(isset($_POST['tempat_lahir']))echo $_POST['tempat_lahir'];?>" size="20"><?php if(isset($tempat_lahir))echo $tempat_lahir;?>
<br>
Tanggal lahir		<input type="text" id="tanggal_lahir" name="tanggal_lahir" value="" size="35">(Tanggal/bulan/tahun)	 <?php if(isset($tanggal_lahir))echo $tanggal_lahir;?>
		<br>
Jenis kelamin:		<input type="radio" name="jkel" value="L">Laki-laki	<input type="radio" name="jkel" value="P">Perempuan	
	<br><?php if(isset($j_kel))echo $j_kel;?><br>
Agama			<select name="agama">
    <option value ="">Agama</option>
    <option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Katolik">Katolik</option>
	<option value="Hindu">Hindu</option>
	<option value="Budha">Budha</option>
  </select><?php if(isset($agama))echo $agama;?>
 <br>
Pilihan Pekerjaan	<select name="pilihan_pekerjaan[]" multiple="multiple" style="height:200px"><?php
		$q = "select id_kategori_pekerjaan as id,nama_kategori_pekerjaan as Kategori from kategori_pekerjaan";			
			$result=mysql_query($q);
			while($row = mysql_fetch_object($result)){
				echo '<option value="'.$row->id.'">'.$row->Kategori.'</option>';
			}
			
			?>
	</select><?php if(isset($pilihan_pekerjaan))echo $pilihan_pekerjaan;?>
  <tr>
<td colspan="2"><input type="checkbox" name="agree" id="agree" value="1"> Saya menyetujui bahwa data diatas benar adanya <br><?php if(isset($agree))echo $agree;?>
<br></td>
</tr>

<input type="submit" name="submit" value="Simpan"> <input type="reset" value="Reset">

</pre>
</form>






				</center>
			</td>
			</td>
  </tr>
   
       
</div> 	</div>       
