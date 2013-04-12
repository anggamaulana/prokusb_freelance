<?php

if(isset($_SESSION['sid']) && isset($_SESSION['idmember'])){

$q=sprintf("select nama_depan, nama_belakang, negara_kediaman, kontak, (IF(status='M','Menikah','Lajang')) as status, agama, status_kediaman, kendaraan, jumlah_anak, alamat, kode_pos, (IF(jenis_kelamin='L','Laki-Laki','Perempuan')) as jenis_kelamin, tempat_lahir, tanggal_lahir, pendidikan, pengalaman, pengalamansampai, pekerjaan_terakhir, industri_terakhir, tingkat_karier, gaji_terakhir, harapan_gaji, bidang_studi, ip, perusahaan, posisi, gaji_bulanan, tugas_kerja, posisi_yang_diinginkan, id_provinsi from cv where id_cv=%d and id_member=%d",
		addslashes($_GET['i']),
		addslashes($_SESSION['idmember'])
	);
	$a=mysql_query($q);
	if(mysql_num_rows($a)<=0){
		echo '<h3>Tidak ada data</h3>'; die();
	}
	
	$r = mysql_fetch_object($a);
}else{	
	
if(isset($_GET['i']) && isset($_GET['im'])){

	$_GET['i']=(int)$_GET['i'];
	$_GET['im']=(int)$_GET['im'];
	
	$cekizin=sprintf("select pil.id_member,p.id_perusahaan from pekerjaan_pil pil,pekerjaan p where pil.id_pekerjaan=p.id_pekerjaan and pil.id_member=%d and p.id_perusahaan=%d",
		mysql_real_escape_string($_GET['im']),
		mysql_real_escape_string($_SESSION['idperusahaan'])
	);
	$ck=mysql_query($cekizin);
	if(mysql_num_rows($ck)>0){
	
	
	$q=sprintf("select nama_depan, nama_belakang, negara_kediaman, kontak, (IF(status='M','Menikah','Lajang')) as status, agama, status_kediaman, kendaraan, jumlah_anak, alamat, kode_pos, (IF(jenis_kelamin='L','Laki-Laki','Perempuan')) as jenis_kelamin, tempat_lahir, tanggal_lahir, pendidikan, pengalaman, pengalamansampai, pekerjaan_terakhir, industri_terakhir, tingkat_karier, gaji_terakhir, harapan_gaji, bidang_studi, ip, perusahaan, posisi, gaji_bulanan, tugas_kerja, posisi_yang_diinginkan, id_provinsi from cv where id_cv=%d and id_member=%d",
		addslashes($_GET['i']),
		addslashes($_GET['im'])
	);
		$res=mysql_query($q);
		if(mysql_num_rows($res)<=0){
			echo 'forbidden access';die();		
		}
		$r = mysql_fetch_object($res);
		
	}else{
		
		echo"<h3>anda tidak diperkenankan melihat cv member ini</h3>";
		die();
	}
}else{

	echo '<h3>Forbidden access</h3>';die();
}

}

?>
	<div id="page">
		<div id="content">
			<div class="post">
				<?php 
				if(isset($_SESSION['sid']) && isset($_SESSION['idmember']))
				include "Arsip/menu.php";
				if(isset($_SESSION['sid']) && isset($_SESSION['idperusahaan']))
				include "PasangIklan/menu.php";
				?>					
			</div>
		</div>
		
		<div style="clear: both;">&nbsp;</div>
		

<div style="padding-left:100px" >
        <div class="clearboth">
        </div>
        <h1>
            Detail CV</h1>
        <pre>
<tr>

<img src="Arsip/imge.php?i=<?php if(isset($_GET['i']))echo $_GET['i'];?>&im=<?php if(isset($_GET['im']))echo $_GET['im'];?>" width="200" height="250">

  <p>Nama Depan 	<?php echo $r->nama_depan;  ?>		
 
Nama Belakang		<?php echo $r->nama_belakang;  ?>		

Negara Kediaman 	<?php echo $r->negara_kediaman;  ?>		

Kontak				<?php echo $r->kontak;  ?>	

Status				<?php echo $r->status;  ?>	
 
Agama				<?php echo $r->nama_depan;  ?>	

Status Kediaman 		<?php echo $r->status_kediaman;  ?>	
    
Kendaraan			<?php echo $r->kendaraan;  ?>	
 
Jumlah Anak			<?php echo $r->jumlah_anak;  ?>	

Alamat				<?php echo $r->alamat;  ?>	
  
Kode Pos			<?php echo $r->kode_pos;  ?>	

Jenis kelamin			<?php echo $r->jenis_kelamin;  ?>	
					
Tempat lahir			<?php echo $r->tempat_lahir;  ?>	
 
Tanggal lahir						<?php echo $r->tanggal_lahir;  ?>	
    
	
--------------------------------------------------------------------------------------------------------------------------------------    
Pendidikan		        <?php echo $r->pendidikan;  ?>	
  
Bidang Studi                    <?php echo $r->bidang_studi;  ?>	

IP				<?php echo $r->ip;  ?>	
--------------------------------------------------------------------------------------------------------------------------------------  
Pengalaman kerja dari   	<?php echo $r->pengalaman;  ?> sampai 	 <?php echo $r->pengalamansampai;  ?>
   
Pekerjaan Terakhir    		<?php echo $r->pekerjaan_terakhir;  ?>	
    
Industri Terakhir     		<?php echo $r->industri_terakhir;  ?>	
  
Perusahaan 			<?php echo $r->perusahaan;  ?>	
  
Tingkat Karier 			<?php echo $r->tingkat_karier;  ?>	

Gaji Terakhir(Rp)   		<?php echo $r->gaji_terakhir;  ?>	
    
Harapan Gaji (Rp)		<?php echo $r->harapan_gaji;  ?>	

Posisi 				<?php echo $r->posisi;  ?>	

Gaji Bulanan(Rp) 		<?php echo $r->gaji_bulanan;  ?>	

Tugas Kerja			<?php echo $r->tugas_kerja;  ?>	
   
Posisi Yang Diinginkan		<?php echo $r->posisi_yang_diinginkan;  ?>	
--------------------------------------------------------------------------------------------------------------------------------------   

</pre>
				</center>
			</td>
			</td>
  </tr>
   
       
</div> 	</div>       
