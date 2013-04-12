	
	<div id="page">
		
		
		<div style="clear: both;">&nbsp;</div>
		
	

<div style="padding-left:100px" >
        <div class="clearboth">
        </div>
        <h2>
            Hasil Pencarian</h2>
			
        <div class="formContent">
                        
                             <div class="Pg333Handler" style="">
                
<div id="Pg333Container"> <div> <?php
	if(isset($_POST['submit'])){
		$q = sprintf("select p.id_pekerjaan as id,p.nama_pekerjaan as Pekerjaan,k.nama_kategori_pekerjaan as Kategori,per.nama_perusahaan as Perusahaan,p.waktu_mulai as Mulai,p.waktu_habis as Deadline,prov.nama_provinsi as Provinsi from pekerjaan p,perusahaan per,provinsi prov,kategori_pekerjaan k where p.id_kategori_pekerjaan=k.id_kategori_pekerjaan and p.id_perusahaan=per.id_perusahaan and per.id_provinsi=prov.id_provinsi and p.waktu_habis>=CURDATE() and p.nama_pekerjaan like '%s' ",
            '%'.mysql_real_escape_string($_POST['s'])."%",
            mysql_real_escape_string($_POST['prov']));
			
		if(!empty($_POST['kat_p'])){
			$_POST['kat_P'] = (int)$_POST['kat_p'];
			$q.=' and p.id_kategori_pekerjaan='.mysql_real_escape_string($_POST['kat_p']);
		}
		
		if(!empty($_POST['prov'])){
			$_POST['prov'] = (int)$_POST['prov'];
			$q.=' and  per.id_provinsi='.mysql_real_escape_string($_POST['prov']);
		}
	}else{
		$_GET['i']=(int)$_GET['i'];
		$q = sprintf("select p.id_pekerjaan as id,p.nama_pekerjaan as Pekerjaan,k.nama_kategori_pekerjaan as Kategori,per.nama_perusahaan as Perusahaan,p.waktu_mulai as Mulai,p.waktu_habis as Deadline,prov.nama_provinsi as Provinsi from pekerjaan p,perusahaan per,provinsi prov,kategori_pekerjaan k where p.id_kategori_pekerjaan=k.id_kategori_pekerjaan and p.id_perusahaan=per.id_perusahaan and per.id_provinsi=prov.id_provinsi and p.waktu_habis>=CURDATE() and p.id_kategori_pekerjaan=%d",            
            mysql_real_escape_string($_GET['i']));
	}
	
	
	
	$result=mysql_query($q);
		if(mysql_num_rows($result)<=0){
			echo '<td><b>Tidak ada Hasil Pencarian yang sesuai</b></td>';
		}else{
		?>
<table id="Pg333DataTable" class="tablesorter gTable gTable" style="table-layout: auto;" cellpadding="0" cellspacing="20"><thead>
<tr>  
<th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">Pekerjaan &nbsp;</a></th> 
<th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">Kategori &nbsp;</a></th>  
<th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">Perusahaan&nbsp;</a></th>    
<th style="display: table-cell;" class="sortableCol" sortindex="C16"><a class="C16">Mulai &nbsp;</a></th>  <th style="display: table-cell;" class="sortableCol sortD" sortindex="C34"><a class="C34">Dead Line &nbsp;</a></th>    
<th style="display: table-cell;" class="sortableCol sortD" sortindex="C34"><a class="C34">Provinsi &nbsp;</a></th>  </th>  

 </tr>
 
 <?php
	
	while($row = mysql_fetch_object($result)){
		echo '<tr><td><a href="index.php?p=b&c=k&i='.$row->id.'">'.$row->Pekerjaan.'</a></td>';
		echo '<td>'.$row->Kategori.'</td>';
		echo '<td>'.$row->Perusahaan.'</td>';
		echo '<td>'.$row->Mulai.'</td>';
		echo '<td>'.$row->Deadline.'</td>';
		echo '<td>'.$row->Provinsi.'</td> </tr>';
	}
	
	
 ?>

 </tbody> 
 </table>  
 <?php
  }
 ?>
 <div id="Pg333Footer"></div> </div></div>
<div id="Pg333BodyContainer"></div></div>
                    </div>
</div></div>        
