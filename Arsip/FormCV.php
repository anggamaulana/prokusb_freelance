<?php
if(isset($_POST['submit']) || isset($_POST['submitupdate'])){
			
			if(empty($_POST['nama_depan']))$nama_depan="<font color=\"red\">nama depan harus diisi</font>";
			if(empty($_POST['nama_belakang']))$nama_belakang="<font color=\"red\">Nama Belakang harus diisi</font>";
			if(empty($_POST['negara']))$negara="<font color=\"red\">Negara harus diisi</font>";
			if(empty($_POST['kontak']))$kontak="<font color=\"red\">Kontak harus diisi</font>";
			if(empty($_POST['status']))$status="<font color=\"red\">Status harus diisi</font>";
			if(empty($_POST['agama']))$agama="<font color=\"red\">Agama harus diisi</font>";
			if(empty($_POST['status_kediaman']))$status_kediaman="<font color=\"red\">Status Kediaman harus diisi</font>";
			if(empty($_POST['kendaraan']))$kendaraan="<font color=\"red\">Kendaraan harus diisi</font>";
			if(preg_match('/[0-9]/',$_POST['jumlah_anak'])==0)$jumlah_anak="<font color=\"red\">Jumlah Anak harus diisi</font>";
			if(empty($_POST['alamat']))$alamat="<font color=\"red\">alamat harus diisi</font>";
			if(empty($_POST['kode_pos']))$kode_pos="<font color=\"red\">Kode Pos harus diisi</font>";
			if(empty($_POST['jkel']))$jkel="<font color=\"red\">jenis Kelamin harus diisi</font>";
			if(empty($_POST['tempat_lahir']))$tempat_lahir="<font color=\"red\">Tempat Lahir harus diisi</font>";
			if(empty($_POST['tanggal_lahir']))$tanggal_lahir="<font color=\"red\">Tanggal Lahir harus diisi</font>";
			if(empty($_FILES['photo']['name']))$photo="<font color=\"red\">Foto harus diisi</font>";
			if(empty($_POST['bidang_studi']))$bidang_studi="<font color=\"red\">Bidang Studi harus diisi</font>";
			if(empty($_POST['pengalaman']))$pengalaman="<font color=\"red\">Pengalaman harus diisi</font>";
			if(empty($_POST['pekerjaan']))$pekerjaan="<font color=\"red\">Pekerjaan harus diisi</font>";
			if(empty($_POST['industri']))$industri="<font color=\"red\">Industri harus diisi</font>";
			if(empty($_POST['perusahaan']))$perusahaan="<font color=\"red\">Perusahaan harus diisi</font>";
			if(empty($_POST['karier']))$karier="<font color=\"red\">Karir harus diisi</font>";
			if(empty($_POST['gaji_terakhir']))$gaji_terakhir="<font color=\"red\">Gaji Terakhir harus diisi</font>";
			if(empty($_POST['harapan_gaji']))$harapan_gaji="<font color=\"red\">Harapan gaji harus diisi</font>";
			if(empty($_POST['posisi']))$posisi="<font color=\"red\">Posisi  harus diisi</font>";
			if(empty($_POST['gaji_bulanan']))$gaji_bulanan="<font color=\"red\">Gaji Bulanan harus diisi</font>";
			if(empty($_POST['tugas_kerja']))$tugas_kerja="<font color=\"red\">Tugas Kerja harus diisi</font>";
			if(empty($_POST['posisidiinginkan']))$posisidiinginkan="<font color=\"red\">Posisi yang diinginkan harus diisi</font>";	
			if(empty($_POST['ip']))$agree="<font color=\"red\">IP harus diisi</font>";
			if(empty($_POST['agree']))$agree="<font color=\"red\">Anda belum menyetujui kebenaran data ini</font>";
			if(empty($_POST['pendidikan']))$pendidikan="<font color=\"red\">Pendidikan harus diisi</font>";
			if(empty($_POST['prov']))$prov="<font color=\"red\">Provinsi harus diisi</font>";
			//string check for xss attack--------------------
			if(preg_match('/^[LM]+$/',$_POST['status'])==0)$status="<font color=\"red\">Format status tidak benar</font>";
			
			if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/',$_POST['tanggal_lahir'])==0)
			$tanggal_lahir="<font color=\"red\">format tanggal harus yyyy-mm-dd</font>";
			
			if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/',$_POST['pengalaman'])==0)
			$pengalaman="<font color=\"red\">format tanggal harus yyyy-mm-dd</font>";
			
			if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/',$_POST['pengalamansampai'])==0)
			$pengalamansampai="<font color=\"red\">format tanggal harus yyyy-mm-dd</font>";
			
			if(preg_match('/^[0-9][0-9\.]*[0-9]+$/',$_POST['ip'])==0)
			$ip="<font color=\"red\">format ip yang diterima angka dan titik</font>";
			
			if(preg_match('/^[0-9]+$/',$_POST['gaji_terakhir'])==0)
			$gaji_terakhir="<font color=\"red\">format gaji harus angka</font>";
			
			if(preg_match('/^[0-9]+$/',$_POST['harapan_gaji'])==0)
			$harapan_gaji="<font color=\"red\">format gaji harus angka</font>";
			
			if(preg_match('/^[0-9]+$/',$_POST['gaji_bulanan'])==0)
			$gaji_bulanan="<font color=\"red\">format gaji harus angka</font>";
						
			if($_FILES['photo']['error']!=0)$photo="<font color=\"red\">Terjadi masalah saat upload</font>";
			
			
			if(preg_match('/^[\w\W\s]+((\.jpg)|(\.JPG)|(\.JPEG)|(\.PNG)|(\.GIF)|(\.jpeg)|(\.png)|(\.gif))+$/',$_FILES['photo']['name'])==0)
			$photo="<font color=\"red\">Hanya gambar yang boleh diupload (jpg,jpeg,png,gif)</font>";
			
						
			if($_FILES['photo']['size']>900000)
			$photo="<font color=\"red\">Gambar tidak boleh lebih dari 900 kb</font>";			
			
			
			
			
			if(isset($_POST['submit'])){
				
				
			
			if(!(isset($nama_depan) || isset($nama_belakang) || isset($negara) || isset($kontak) || isset($status) || isset($agama) || isset($status_kediaman) || isset($kendaraan) || isset($jumlah_anak) || isset($alamat) || isset($kode_pos) || isset($jkel) || isset($tempat_lahir) || isset($tanggal_lahir) || isset($photo) || isset($pendidikan) || isset($bidang_studi) || isset($ip) || isset($pengalaman) || isset($pengalamansampai) || isset($pekerjaan) || isset($industri) || isset($perusahaan) || isset($karier) || isset($gaji_terakhir) || isset($harapan_gaji) || isset($posisi) || isset($gaji_bulanan) || isset($tugas_kerja) || isset($posisidiinginkan) || isset($agree) || isset($prov))){
			
				//do something
				$foto = file_get_contents($_FILES['photo']['tmp_name']);
				
				
				$q=sprintf("INSERT INTO cv (lastupdate,id_member, nama_depan, nama_belakang, negara_kediaman, kontak, status, agama, status_kediaman, kendaraan, jumlah_anak, alamat, kode_pos, jenis_kelamin, tempat_lahir, tanggal_lahir, photo, pendidikan, pengalaman, pengalamansampai, pekerjaan_terakhir, industri_terakhir, tingkat_karier, gaji_terakhir, harapan_gaji, bidang_studi, ip, perusahaan, posisi, gaji_bulanan, tugas_kerja, posisi_yang_diinginkan, id_provinsi) VALUES (
					NOW(),%d,'%s','%s','%s','%s','%s','%s','%s','%s',%d,'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',%d,%d,'%s','%s','%s','%s',%d,'%s','%s',%d)",
						mysql_real_escape_string($_SESSION['idmember']),
						mysql_real_escape_string($_POST['nama_depan']),
						mysql_real_escape_string($_POST['nama_belakang']),
						mysql_real_escape_string($_POST['negara']),
						mysql_real_escape_string($_POST['kontak']),
						mysql_real_escape_string($_POST['status']),
						mysql_real_escape_string($_POST['agama']),
						mysql_real_escape_string($_POST['status_kediaman']),
						mysql_real_escape_string($_POST['kendaraan']),
						mysql_real_escape_string($_POST['jumlah_anak']),
						mysql_real_escape_string($_POST['alamat']),
						mysql_real_escape_string($_POST['kode_pos']),
						mysql_real_escape_string($_POST['jkel']),
						mysql_real_escape_string($_POST['tempat_lahir']),
						mysql_real_escape_string($_POST['tanggal_lahir']),
						mysql_real_escape_string($foto),
						mysql_real_escape_string($_POST['pendidikan']),
						mysql_real_escape_string($_POST['pengalaman']),
						mysql_real_escape_string($_POST['pengalamansampai']),
						mysql_real_escape_string($_POST['pekerjaan']),
						mysql_real_escape_string($_POST['industri']),
						mysql_real_escape_string($_POST['karier']),
						mysql_real_escape_string($_POST['gaji_terakhir']),
						mysql_real_escape_string($_POST['harapan_gaji']),
						mysql_real_escape_string($_POST['bidang_studi']),
						mysql_real_escape_string($_POST['ip']),
						mysql_real_escape_string($_POST['perusahaan']),
						mysql_real_escape_string($_POST['posisi']),
						mysql_real_escape_string($_POST['gaji_bulanan']),
						mysql_real_escape_string($_POST['tugas_kerja']),
						mysql_real_escape_string($_POST['posisidiinginkan']),
						mysql_real_escape_string($_POST['prov'])
					);
					
					if(mysql_query($q)){
						echo '<meta http-equiv="refresh" content="0;url=index.php?p=b&c=a">';
					}
				
				
			}
			}
			
			if(isset($_POST['submitupdate'])){
			
			if(!(isset($nama_depan) || isset($nama_belakang) || isset($negara) || isset($kontak) || isset($status) || isset($agama) || isset($status_kediaman) || isset($kendaraan) || isset($jumlah_anak) || isset($alamat) || isset($kode_pos) || isset($jkel) || isset($tempat_lahir) || isset($tanggal_lahir) || isset($pendidikan) || isset($bidang_studi) || isset($ip) || isset($pengalaman) || isset($pengalamansampai) || isset($pekerjaan) || isset($industri) || isset($perusahaan) || isset($karier) || isset($gaji_terakhir) || isset($harapan_gaji) || isset($posisi) || isset($gaji_bulanan) || isset($tugas_kerja) || isset($posisidiinginkan) || isset($agree) || isset($prov))){
						
						//do update
						if(!empty($_FILES['photo']['name'])){
							$file = file_get_contents($_FILES['photo']['tmp_name']);
							
							$foto = ",photo='".mysql_real_escape_string($file)."'";
						}else{
							$foto =" ";
						}	
							
							
						$q=sprintf("update cv set lastupdate=NOW(), nama_depan='%s', nama_belakang='%s', negara_kediaman='%s', kontak='%s', status='%s', agama='%s', status_kediaman='%s', kendaraan='%s', jumlah_anak=%d, alamat='%s', kode_pos='%s', jenis_kelamin='%s', tempat_lahir='%s', tanggal_lahir='%s', pendidikan='%s', pengalaman='%s', pengalamansampai='%s', pekerjaan_terakhir='%s', industri_terakhir='%s', tingkat_karier='%s', gaji_terakhir=%d, harapan_gaji=%d, bidang_studi='%s', ip=%f, perusahaan='%s', posisi='%s', gaji_bulanan=%d, tugas_kerja='%s', posisi_yang_diinginkan='%s', id_provinsi=%d ",
						mysql_real_escape_string($_POST['nama_depan']),
						mysql_real_escape_string($_POST['nama_belakang']),
						mysql_real_escape_string($_POST['negara']),
						mysql_real_escape_string($_POST['kontak']),
						mysql_real_escape_string($_POST['status']),
						mysql_real_escape_string($_POST['agama']),
						mysql_real_escape_string($_POST['status_kediaman']),
						mysql_real_escape_string($_POST['kendaraan']),
						mysql_real_escape_string($_POST['jumlah_anak']),
						mysql_real_escape_string($_POST['alamat']),
						mysql_real_escape_string($_POST['kode_pos']),
						mysql_real_escape_string($_POST['jkel']),
						mysql_real_escape_string($_POST['tempat_lahir']),
						mysql_real_escape_string($_POST['tanggal_lahir']),						
						mysql_real_escape_string($_POST['pendidikan']),
						mysql_real_escape_string($_POST['pengalaman']),
						mysql_real_escape_string($_POST['pengalamansampai']),
						mysql_real_escape_string($_POST['pekerjaan']),
						mysql_real_escape_string($_POST['industri']),
						mysql_real_escape_string($_POST['karier']),
						mysql_real_escape_string($_POST['gaji_terakhir']),
						mysql_real_escape_string($_POST['harapan_gaji']),
						mysql_real_escape_string($_POST['bidang_studi']),
						mysql_real_escape_string($_POST['ip']),
						mysql_real_escape_string($_POST['perusahaan']),
						mysql_real_escape_string($_POST['posisi']),
						mysql_real_escape_string($_POST['gaji_bulanan']),
						mysql_real_escape_string($_POST['tugas_kerja']),
						mysql_real_escape_string($_POST['posisidiinginkan']),
						mysql_real_escape_string($_POST['prov'])					
						);	
						
						$q .=$foto." where id_member=".mysql_real_escape_string($_SESSION['idmember'])." and id_cv=".mysql_real_escape_string($_POST['i']); 
						
						
						if(mysql_query($q)){
							echo '<meta http-equiv="refresh" content="0;url=index.php?p=b&c=a">';
						}else{
							echo mysql_error();	
						}
						
				}
			}
}


if(isset($_GET['m']) && $_GET['m']=='e')
{
	$q=sprintf("select nama_depan, nama_belakang, negara_kediaman, kontak, status, agama, status_kediaman, kendaraan, jumlah_anak, alamat, kode_pos, jenis_kelamin, tempat_lahir, tanggal_lahir, pendidikan, pengalaman, pengalamansampai, pekerjaan_terakhir, industri_terakhir, tingkat_karier, gaji_terakhir, harapan_gaji, bidang_studi, ip, perusahaan, posisi, gaji_bulanan, tugas_kerja, posisi_yang_diinginkan, id_provinsi from cv where id_cv=%d and id_member=%d",
		addslashes($_GET['i']),
		addslashes($_SESSION['idmember'])
	);
	$a=mysql_query($q);
	if(mysql_num_rows($a)<=0)
	{
		echo '<h3>Forbidden Access</h3>';die();
	}	
	$r = mysql_fetch_object($a);

}
?>

<script type="text/javascript">
	$(function(){	
		$('#tanggal_lahir').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth:true,
			changeYear:true,
			yearRange:'1980:1998',
			defaultDate:'-23y'
		});
		$('#pengalaman').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth:true,
			changeYear:true,
			yearRange:'1980:2020',
			defaultDate:'now'
		});
		$('#pengalaman_sampai').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth:true,
			changeYear:true,
			yearRange:'1980:2020',
			defaultDate:'now'
		});
	});
	</script>

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
            Buat CV</h1>
        <pre>
<tr>

<form enctype="multipart/form-data" name="CV"  method="post" action="index.php?p=b&c=j<?php
	if(isset($_GET['m']) && $_GET['m']=='e'){
		if(isset($_GET['i']))
			echo '&m=e&i='.addslashes($_GET['i']);
	}
?>">

<?php
	if(isset($_GET['m']) && $_GET['m']=='e'){
		if(isset($_GET['i']))
			echo '<input type="hidden" name="i" value="'.addslashes($_GET['i']).'"';
	}
?>
	
  <p>Nama Depan 			<input type="text" name="nama_depan" value="<?php if(isset($_POST['nama_depan']))echo $_POST['nama_depan'];else if(isset($r)) echo $r->nama_depan;?>" size="20"> <?php if(isset($nama_depan))echo $nama_depan;?>
 
Nama Belakang			<input type="text" name="nama_belakang" value="<?php if(isset($_POST['nama_belakang']))echo $_POST['nama_belakang'];else if(isset($r)) echo $r->nama_belakang;?>" size="20"><?php if(isset($nama_belakang))echo $nama_belakang;?>

Negara Kediaman 		<input type="text" name="negara" value="<?php if(isset($_POST['negara']))echo $_POST['negara'];else if(isset($r)) echo $r->negara_kediaman;?>" size="20"><?php if(isset($negara))echo $negara;?>

Kontak				<input type="text" name="kontak" value="<?php if(isset($_POST['kontak']))echo $_POST['kontak'];else if(isset($r)) echo $r->kontak;?>" size="20"><?php if(isset($kontak))echo $kontak;?>

Status				<select name="status">
    <option value ="">Status</option>
    <option value="L" <?php if(isset($_POST['status']) && $_POST['status']=='L')echo 'selected="selected"';else if(isset($r) && $r->status=='L') echo 'selected="selected"';?>>Lajang</option>
    <option value="M" <?php if(isset($_POST['status']) && $_POST['status']=='L')echo 'selected="selected"';else if(isset($r) && $r->status=='M') echo 'selected="selected"';?>>Menikah</option>
  </select><?php if(isset($status))echo $status;?>
 
Agama				<select name="agama">
    <option value ="">Agama</option>
    <option value="Islam" <?php if(isset($_POST['agama']) && $_POST['agama']=='Islam')echo 'selected="selected"';else if(isset($r) && $r->agama=='Islam') echo 'selected="selected"';?>>Islam</option>
    <option value="Kristen" <?php if(isset($_POST['agama']) && $_POST['agama']=='Kristen')echo 'selected="selected"';else if(isset($r) && $r->agama=='Kristen') echo 'selected="selected"';?>>Kristen</option>
    <option value="Hindu" <?php if(isset($_POST['agama']) && $_POST['agama']=='Hindu')echo 'selected="selected"';else if(isset($r) && $r->agama=='Hindu') echo 'selected="selected"';?>>Hindu</option>
    <option value="Budha" <?php if(isset($_POST['agama']) && $_POST['agama']=='Budha')echo 'selected="selected"';else if(isset($r) && $r->agama=='Budha') echo 'selected="selected"';?>>Budha</option>
    <option value="Katholik" <?php if(isset($_POST['agama']) && $_POST['agama']=='Katholik')echo 'selected="selected"';else if(isset($r) && $r->agama=='Katholik') echo 'selected="selected"';?>>Katholik</option>
    <option value="Konghuchu" <?php if(isset($_POST['agama']) && $_POST['agama']=='Konghuchu')echo 'selected="selected"';else if(isset($r) && $r->agama=='Konghuchu') echo 'selected="selected"';?>>Konghuchu</option>
  </select><?php if(isset($agama))echo $agama;?>

Status Kediaman 		<input type="radio" name="status_kediaman" value="WNI" <?php if(isset($_POST['status_kediaman']) && $_POST['status_kediaman']=='WNI')echo 'checked="checked"';else if(isset($r) && $r->status_kediaman=='WNI') echo 'checked="checked"';?>>WNI <input type="radio" name="status_kediaman" value="WNA" <?php if(isset($_POST['status_kediaman']) && $_POST['status_kediaman']=='WNA')echo 'checked="checked"';else if(isset($r) && $r->status_kediaman=='WNA') echo 'checked="checked"';?>>WNA<br><?php if(isset($status_kediaman))echo $status_kediaman;?><br>
    
Kendaraan			<select name="kendaraan">
    <option value ="" >Kendaraan</option>
    <option value="Mobil" <?php if(isset($_POST['kendaraan']) && $_POST['kendaraan']=='Mobil')echo 'selected="selected"';else if(isset($r) && $r->kendaraan=='Mobil') echo 'selected="selected"';?>>Mobil</option>
    <option value="Motor" <?php if(isset($_POST['kendaraan']) && $_POST['kendaraan']=='Motor')echo 'selected="selected"';else if(isset($r) && $r->kendaraan=='Motor') echo 'selected="selected"';?>>Motor</option>
	<option value="Lainnya" <?php if(isset($_POST['kendaraan']) && $_POST['kendaraan']=='Lainnya')echo 'selected="selected"';else if(isset($r) && $r->kendaraan=='Lainnya') echo 'selected="selected"';?>>Lainnya</option>
    <option value="Tidak ada" <?php if(isset($_POST['kendaraan']) && $_POST['kendaraan']=='Tidak ada')echo 'selected="selected"';else if(isset($r) && $r->kendaraan=='Tidak ada') echo 'selected="selected"';?>>Tidak ada</option>
  </select><?php if(isset($kendaraan))echo $kendaraan;?>
 
Jumlah Anak			<select name="jumlah_anak">
    <option value ="">Jumlah Anak</option>
    <option value="0" <?php if(isset($_POST['jumlah_anak']) && $_POST['jumlah_anak']=='0')echo 'selected="selected"';else if(isset($r) && $r->jumlah_anak=='0') echo 'selected="selected"';?>>0</option>
    <option value="1" <?php if(isset($_POST['jumlah_anak']) && $_POST['jumlah_anak']=='1')echo 'selected="selected"';else if(isset($r) && $r->jumlah_anak=='1') echo 'selected="selected"';?>>1</option>
    <option value="2" <?php if(isset($_POST['jumlah_anak']) && $_POST['jumlah_anak']=='2')echo 'selected="selected"';else if(isset($r) && $r->jumlah_anak=='2') echo 'selected="selected"';?>>2</option>
    <option value="3" <?php if(isset($_POST['jumlah_anak']) && $_POST['jumlah_anak']=='3')echo 'selected="selected"';else if(isset($r) && $r->jumlah_anak=='3') echo 'selected="selected"';?>>3</option>
    <option value="4" <?php if(isset($_POST['jumlah_anak']) && $_POST['jumlah_anak']=='4')echo 'selected="selected"';else if(isset($r) && $r->jumlah_anak=='4') echo 'selected="selected"';?>>4</option>
	<option value="5" <?php if(isset($_POST['jumlah_anak']) && $_POST['jumlah_anak']=='5')echo 'selected="selected"';else if(isset($r) && $r->jumlah_anak=='5') echo 'selected="selected"';?>>lebih dari 4</option>
  </select><?php if(isset($jumlah_anak))echo $jumlah_anak;?>
  
Provinsi			<select name="prov">
				<option value ="" selected="selected">Masukan lokasi Tempat tinggal</option>
				<option value ="">--------------------------</option>
				<?php 
				$q = "select id_provinsi,nama_provinsi from provinsi";			
				$result=mysql_query($q);
				while($row = mysql_fetch_object($result)){?>
				<option value="<?php echo $row->id_provinsi;?>" <?php if(isset($r) && $row->id_provinsi==$r->id_provinsi) echo 'selected="selected"';?>><?php echo $row->nama_provinsi;?></option>
				<?php } ?>
			</select><?php if(isset($prov))echo $prov;?>

Alamat				<textarea type="text" name="alamat" rows="5"><?php if(isset($_POST['alamat']))echo $_POST['alamat'];else if(isset($r)) echo $r->alamat;?></textarea><?php if(isset($alamat))echo $alamat;?>
  
Kode Pos			<input type="text" name="kode_pos" value="<?php if(isset($_POST['kode_pos']))echo $_POST['kode_pos'];else if(isset($r)) echo $r->kode_pos;?>" size="10"><?php if(isset($kode_pos))echo $kode_pos;?>

Jenis kelamin			<input type="radio" name="jkel" value="L" <?php if(isset($_POST['jkel']) && $_POST['jkel']=='L')echo 'checked="checked"';else if(isset($r) && $r->jenis_kelamin=='L') echo 'checked="checked"';?>>Laki-laki	<input type="radio" name="jkel" value="P" <?php if(isset($_POST['jkel']) && $_POST['jkel']=='P')echo 'checked="checked"';else if(isset($r) && $r->jenis_kelamin=='P') echo 'checked="checked"';?>>Perempuan	<?php if(isset($jkel))echo $jkel;?>
					
Tempat lahir			<input type="text" name="tempat_lahir" value="<?php if(isset($_POST['tempat_lahir']))echo $_POST['tempat_lahir'];else if(isset($r)) echo $r->tempat_lahir;?>" size="20"> <?php if(isset($tempat_lahir))echo $tempat_lahir;?>
 
Tanggal lahir			<input type="text" id="tanggal_lahir" name="tanggal_lahir" value="<?php if(isset($_POST['tanggal_lahir']))echo $_POST['tanggal_lahir'];else if(isset($r)) echo $r->tanggal_lahir;?>" size="35">(yyy-mm-dd)	<?php if(isset($tanggal_lahir))echo $tanggal_lahir;?>		
    
Photo				<input type="file" name="photo" value=""><?php if(isset($photo))echo $photo;?><br>
--------------------------------------------------------------------------------------------------------------------------------------    
Pendidikan		        <select name="pendidikan">
    <option value ="">Pendidikan</option>
    <option value="TK" <?php if(isset($_POST['pendidikan']) && $_POST['pendidikan']=='TK')echo 'selected="selected"';else if(isset($r) && $r->pendidikan=='TK') echo 'selected="selected"';?>>TK</option>
    <option value="SD" <?php if(isset($_POST['pendidikan']) && $_POST['pendidikan']=='SD')echo 'selected="selected"';else if(isset($r) && $r->pendidikan=='SD') echo 'selected="selected"';?>>SD</option>
    <option value="SMP" <?php if(isset($_POST['pendidikan']) && $_POST['pendidikan']=='SMP')echo 'selected="selected"';else if(isset($r) && $r->pendidikan=='SMP') echo 'selected="selected"';?>>SMP</option>
    <option value="SMA" <?php if(isset($_POST['pendidikan']) && $_POST['pendidikan']=='SMA')echo 'selected="selected"';else if(isset($r) && $r->pendidikan=='SMA') echo 'selected="selected"';?>>SMA</option>
    <option value="Sarjana" <?php if(isset($_POST['pendidikan']) && $_POST['pendidikan']=='Sarjana')echo 'selected="selected"';else if(isset($r) && $r->pendidikan=='Sarjana') echo 'selected="selected"';?>>Sarjana</option>
  </select> <?php if(isset($pendidikan))echo $pendidikan;?>
  
Bidang Studi                    <input type="text" name="bidang_studi" value="<?php if(isset($_POST['bidang_studi']))echo $_POST['bidang_studi'];else if(isset($r)) echo $r->bidang_studi;?>"><?php if(isset($bidang_studi))echo $bidang_studi;?>

IP				<input type="text" name="ip" value="<?php if(isset($_POST['ip']))echo $_POST['ip'];else if(isset($r)) echo $r->ip;?>"><?php if(isset($ip))echo $ip;?><br>
--------------------------------------------------------------------------------------------------------------------------------------  
Pengalaman kerja dari   	<input type="text" id="pengalaman" name="pengalaman" value="<?php if(isset($_POST['pengalaman']))echo $_POST['pengalaman'];else if(isset($r)) echo $r->pengalaman;?>"><?php if(isset($pengalaman))echo $pengalaman;?>
	<br>			sampai <input type="text" id="pengalaman_sampai" name="pengalamansampai" value="<?php if(isset($_POST['pengalamansampai']))echo $_POST['pengalamansampai'];else if(isset($r)) echo $r->pengalamansampai;?>"><?php if(isset($pengalamansampai))echo $pengalamansampai;?>
	
   
Pekerjaan Terakhir    		<input type="text" name="pekerjaan" value="<?php if(isset($_POST['pekerjaan']))echo $_POST['pekerjaan'];else if(isset($r)) echo $r->pekerjaan_terakhir;?>"> <?php if(isset($pekerjaan))echo $pekerjaan;?>
    
Industri Terakhir     		<input type="text" name="industri" value="<?php if(isset($_POST['industri']))echo $_POST['industri'];else if(isset($r)) echo $r->industri_terakhir;?>"><?php if(isset($industri))echo $industri;?>
  
Perusahaan 			<input type="text" name="perusahaan" value="<?php if(isset($_POST['perusahaan']))echo $_POST['perusahaan'];else if(isset($r)) echo $r->perusahaan;?>"> <?php if(isset($perusahaan))echo $perusahaan;?>
  
Tingkat Karier 			<select name="karier">
	<option value="">Masukkan Level Karir</option>
      <option value="awal" <?php if(isset($_POST['karier']) && $_POST['karier']=='awal')echo 'selected="selected"';else if(isset($r) && $r->tingkat_karier=='awal') echo 'selected="selected"';?>>Level Awal</option>
      <option value="pertengahan" <?php if(isset($_POST['karier']) && $_POST['karier']=='pertengahan')echo 'selected="selected"';else if(isset($r) && $r->tingkat_karier=='pertengahan') echo 'selected="selected"';?>>Pertengahan</option>
      <option value="senior" <?php if(isset($_POST['karier']) && $_POST['karier']=='senior')echo 'selected="selected"';else if(isset($r) && $r->tingkat_karier=='senior') echo 'selected="selected"';?>>Senior</option>
      <option value="top" <?php if(isset($_POST['karier']) && $_POST['karier']=='top')echo 'selected="selected"';else if(isset($r) && $r->tingkat_karier=='top') echo 'selected="selected"';?>>Top</option>
    </select> <?php if(isset($karier))echo $karier;?>
  
Gaji Terakhir(Rp)   		<input type="text" name="gaji_terakhir" value="<?php if(isset($_POST['gaji_terakhir']))echo $_POST['gaji_terakhir'];else if(isset($r)) echo $r->gaji_terakhir;?>"> <?php if(isset($gaji_terakhir))echo $gaji_terakhir;?>
    
Harapan Gaji (Rp)		<input type="text" name="harapan_gaji" value="<?php if(isset($_POST['harapan_gaji']))echo $_POST['harapan_gaji'];else if(isset($r)) echo $r->harapan_gaji;?>"> <input type="checkbox" name="checkbox" value="checkbox">bisa nego <?php if(isset($harapan_gaji))echo $harapan_gaji;?>

Posisi 				<input type="text" name="posisi" value="<?php if(isset($_POST['posisi']))echo $_POST['posisi'];else if(isset($r)) echo $r->posisi;?>"> <?php if(isset($posisi))echo $posisi;?>

Gaji Bulanan(Rp) 		<input type="text" name="gaji_bulanan" value="<?php if(isset($_POST['gaji_bulanan']))echo $_POST['gaji_bulanan'];else if(isset($r)) echo $r->gaji_bulanan;?>"> <?php if(isset($gaji_bulanan))echo $gaji_bulanan;?>
   
Tugas Kerja			<input type="text" name="tugas_kerja" value="<?php if(isset($_POST['tugas_kerja']))echo $_POST['tugas_kerja'];else if(isset($r)) echo $r->tugas_kerja;?>"> <?php if(isset($tugas_kerja))echo $tugas_kerja;?>
   
Posisi Yang Diinginkan		<input type="text" name="posisidiinginkan" value="<?php if(isset($_POST['posisidiinginkan']))echo $_POST['posisidiinginkan'];else if(isset($r)) echo $r->posisi_yang_diinginkan;?>"> <?php if(isset($posisidiinginkan))echo $posisidiinginkan;?><br>
--------------------------------------------------------------------------------------------------------------------------------------   
  <tr>
<td colspan="2"><input type="checkbox" name="agree" id="agree" value="1"> Saya menyetujui bahwa data diatas benar adanya</td> <?php if(isset($agree))echo $agree;?>
</tr>

<input type="submit" <?php if(isset($_GET['m']) && $_GET['m']=='e')echo 'name="submitupdate"'; else echo 'name="submit"';?> value="Simpan"> <input type="reset" value="Reset">

</pre>
</form>






				</center>
			</td>
			</td>
  </tr>
   
       
</div> 	</div>       
