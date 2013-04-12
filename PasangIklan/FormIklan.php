<?php
		$q = sprintf("select p.id_pekerjaan,p.nama_pekerjaan,p.waktu_mulai,p.waktu_habis,j.jumlah from pekerjaan p left join (select id_pekerjaan,count(*) as jumlah from pekerjaan_pil group by id_pekerjaan) as j on p.id_pekerjaan=j.id_pekerjaan where p.id_perusahaan=%d",
            mysql_real_escape_string($_SESSION['idperusahaan']));
			
		
		
		$res=mysql_query($q);
	
?>
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
           
       <form name="Iklan"  method="post" action="index.php?p=c&c=n">
  <label>
  <input type="submit" name="Submit" value="Tambah Iklan">
  </label>

</form>

 <br><br>

<table cellpadding="10">
<tr>
  <th style="display: table-cell;" class="sortableCol" sortindex="C21"><a class="C21">Nama Pekerjaan &nbsp;</a></th> <th style="display: table-cell;" class="sortableCol" sortindex="C21"><a class="C21">Waktu Mulai &nbsp;</a></th> <th style="display: table-cell;" class="sortableCol" sortindex="C21"><a class="C21">Deadline&nbsp;</a></th><th style="display: table-cell;" class="sortableCol" sortindex="C21"><a class="C21">Jumlah Pelamar &nbsp;</a></th>
 

  </tr>
  <?php
		while($row = mysql_fetch_object($res)){
  ?>
  <tr>
	<td>
		<?php echo '<a href="index.php?p=c&c=l&i='.$row->id_pekerjaan.'" style="color:blue">'.$row->nama_pekerjaan.'</a>';?>
	</td>
	<td>
		<?php echo $row->waktu_mulai;?>
	</td>
	<td>
		<?php echo $row->waktu_habis;?>
	</td>
	<td>
		<?php if($row->jumlah!=NULL)echo $row->jumlah; else echo '0';?>
	</td>
  </tr>
  <?php
	}
  ?>
 </table>  
       
</div> </div>       
