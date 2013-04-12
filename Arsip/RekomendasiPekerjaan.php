<?php
	$q = sprintf("select p.id_pekerjaan as id,p.nama_pekerjaan as Pekerjaan,per.nama_perusahaan as Perusahaan,k.nama_kategori_pekerjaan as Kategori,p.waktu_mulai as Mulai,p.waktu_habis as Deadline,prov.nama_provinsi as Provinsi from pekerjaan p,perusahaan per,kategori_pekerjaan k,provinsi prov,kat_pekerjaan_member kat where p.id_perusahaan=per.id_perusahaan and per.id_provinsi=prov.id_provinsi and  p.id_kategori_pekerjaan = k.id_kategori_pekerjaan and kat.id_kategori_pekerjaan=p.id_kategori_pekerjaan and p.waktu_habis > CURDATE() and kat.id_member=%d",
            mysql_real_escape_string($_SESSION['idmember']));
		$res=mysql_query($q);
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
            Rekomendasi Pekerjaan</h1>
        <h3>
            Kami telah Menemukan Rekomendasi Pekerjaan Untuk Anda
        </h3>
        <div class="formBtnSet right">
            
        </div>
		
        <div class="formContent">
                        
                             <div class="Pg333Handler" style="">
                
<div id="Pg333Container"> <div> 
<table id="Pg333DataTable" class="tablesorter gTable gTable" style="table-layout: auto;" cellpadding="0" cellspacing="20"><thead>
<tr>  
<th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">Pekerjaan &nbsp;</a></th>  
<th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">Perusahaan&nbsp;</a></th>   
 <th style="display: table-cell;" class="sortableCol" sortindex="C16"><a class="C16">Kategori &nbsp;</a></th>    
 <th style="display: table-cell;" class="sortableCol" sortindex="C39"><a class="C39">Mulai &nbsp;</a></th>    <th style="display: table-cell;" class="sortableCol sortD" sortindex="C34"><a class="C34">Dead Line &nbsp;</a></th>  
 <th style="display: table-cell;" class="sortableCol sortD" sortindex="C34"><a class="C34">Provinsi &nbsp;</a></th>    
 <td style="display: table-cell;" width=""><a name="Pg333_Link_200003000528657_ID" id="Pg333_Link_200003000528657_ID" class="" ></a></td> </tr></tbody> 
 
<?php
		while($rekomendasi = mysql_fetch_object($res)){
  ?>
  <tr>
	
	<td>
		<a href="index.php?p=b&c=k&i=<?php echo $rekomendasi->id;?>"><?php echo $rekomendasi->Pekerjaan;?></a>
	</td>
	<td>
		<?php echo $rekomendasi->Perusahaan;?>
	</td>
	<td>
		<?php echo $rekomendasi->Kategori;?>
	</td>
	<td>
		<?php echo $rekomendasi->Mulai;?>
	</td>
	<td>
		<?php echo $rekomendasi->Deadline;?>
	</td>
	<td>
		<?php echo $rekomendasi->Provinsi;?>
	</td>
  </tr>
  <?php
	}
  ?>
 
 </table>  <div id="Pg333Footer"></div> </div></div>
<div id="Pg333BodyContainer"></div></div>
                    </div>
</div></div>        
