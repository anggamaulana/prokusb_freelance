<?php
	$q = sprintf("select p.id_pekerjaan as id,pil.waktu as Waktu,p.nama_pekerjaan as Pekerjaan,per.nama_perusahaan as Perusahaan,p.waktu_mulai as Mulai,p.waktu_habis as Deadline from pekerjaan_pil pil,pekerjaan p,perusahaan per where pil.id_pekerjaan=p.id_pekerjaan and p.id_perusahaan=per.id_perusahaan and pil.id_member=%d",
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
            Sejarah Lamaran Kerja</h1>
        <h3>
            Dibawah ini adalah ringkasan pekerjaan yang telah anda lamar
        </h3>
		
       
</div>  
<div style="padding-left:60px";class="formContent">
                        <ul id="Pg333targetall">
                             <div class="Pg333Handler" style="">
                
<div id="Pg333Container"> <div>                   <table id="Pg333DataTable" class="tablesorter gTable gTable" style="table-layout: auto;" cellpadding="0" cellspacing="20"><thead><tr>   <th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">Waktu &nbsp;</a></th>   <th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">Pekerjaan &nbsp;</a></th>  <th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">Perusahaan &nbsp;</a></th>  <th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">Mulai &nbsp;</a></th>     <th style="display: table-cell;" class="sortableCol" sortindex="C6"><a class="C6">Dead Line &nbsp;</a></th>    </tr> </thead>     

<?php
		while($sejarahlamaran = mysql_fetch_object($res)){
  ?>
  <tr>
	
	<td>
		<?php echo $sejarahlamaran->Waktu;?>
	</td>
	<td>
		<a href="index.php?p=b&c=k&i=<?php echo $sejarahlamaran->id;?>"><?php echo $sejarahlamaran->Pekerjaan;?></a>
	</td>
	<td>
		<?php echo $sejarahlamaran->Perusahaan;?>
	</td>
	<td>
		<?php echo $sejarahlamaran->Mulai;?>
	</td>
	<td>
		<?php echo $sejarahlamaran->Deadline;?>
	</td>
	
  </tr>
  <?php
	}
  ?>


      </table>  <div id="Pg333Footer"></div> </div></div>
<div id="Pg333BodyContainer"></div></div>
                         
                        </ul>
                    </div>	</div>
             
