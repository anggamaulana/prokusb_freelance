<?php
	$idiklan = (int)$_GET['i'];
?>
	<div id="page">
		<div id="content">
			<div class="post">
								<?php include"PasangIklan/menu.php";?>
			</div>
		</div>
		
		<div style="clear: both;">&nbsp;</div>
	<?php
		$q = sprintf("select pil.waktu as Waktu,per.nama_perusahaan as Perusahaan,p.nama_pekerjaan as Pekerjaan,p.keterangan as Keterangan,p.waktu_mulai as Mulai,p.waktu_habis as Deadline,mem.id_member,mem.nama_member as Member,mem.alamat as AlamatMember,mem.jenis_kelamin as JenisKelamin,prov.nama_provinsi as Provinsi from pekerjaan_pil pil,pekerjaan p,member mem,provinsi prov,perusahaan per where p.id_perusahaan=per.id_perusahaan and pil.id_pekerjaan=p.id_pekerjaan and mem.id_provinsi=prov.id_provinsi and pil.id_member=mem.id_member and p.id_pekerjaan=%d and p.id_perusahaan=%d",
            mysql_real_escape_string($idiklan), mysql_real_escape_string($_SESSION['idperusahaan']));
		$res=mysql_query($q);
		$res2=mysql_query($q);
		
		$q2=sprintf("select p.nama_pekerjaan as Pekerjaan,per.nama_perusahaan as Perusahaan,p.waktu_mulai as Mulai,p.waktu_habis as Deadline from pekerjaan p,perusahaan per where p.id_perusahaan=per.id_perusahaan and p.id_pekerjaan=%d and p.id_perusahaan=%d",
            mysql_real_escape_string($idiklan), mysql_real_escape_string($_SESSION['idperusahaan']));
			
		if(mysql_num_rows($res)<=0)
		$res=mysql_query($q2);
		
		if(mysql_num_rows($res)<=0){
			echo "<h3>Tidak ada data</h3>";die();
		}
		$iklan = mysql_fetch_object($res);
		
		
?>	
	

<div style="padding-left:100px" >
        <div class="clearboth">
        </div>
        <h1>
           Detail Iklan</h1>
      
  <p><label>Iklan		 :	<?php echo $iklan->Pekerjaan;?></label></p>
  <p><label>Keterangan 	 :	<?php echo $iklan->Perusahaan;?></label></p>
  <p><label>Waktu Mulai  :	<?php echo $iklan->Mulai;?><label></p>
  <p><label>Waktu Selesai : <?php echo $iklan->Deadline;?><label></p>

<div>
<br><br>
<table cellpadding="10"><caption><h3>Data Pelamar Pekerjaan ini</h3></caption>
<tr>
  <th style="display: table-cell;" class="sortableCol" sortindex="C21"><a class="C21">Nama  &nbsp;</a></th> <th style="display: table-cell;" class="sortableCol" sortindex="C21"><a class="C21">Alamat &nbsp;</a></th> <th style="display: table-cell;" class="sortableCol" sortindex="C21"><a class="C21">Jenis Kelamin &nbsp;</a></th><th style="display: table-cell;" class="sortableCol" sortindex="C21"><a class="C21">Provinsi &nbsp;</a></th></div>
  </tr>     
  <?php
	if(mysql_num_rows($res)>0){
		while($pelamar = mysql_fetch_object($res2)){
  ?>
  <tr>
	
	<td>
		<a href="index.php?p=c&c=o&i=<?php echo $pelamar->id_member; ?>" style="color:blue"><?php echo $pelamar->Member;?></a>
	</td>
	<td>
		<?php echo $pelamar->AlamatMember;?>
	</td>
	<td>
		<?php echo $pelamar->JenisKelamin;?>
	</td>
	<td>
		<?php echo $pelamar->Provinsi;?>
	</td>
  </tr>
  <?php
	}
	}
  ?>
  </table>
</div></div>        
