<?php

	if(isset($_POST['submitdel'])){
			
			if(empty($_POST['i']))$alert="<font color=\"red\">xss detect</font>";
			
			if(!(isset($alert))){
				$q = sprintf("delete from surat_lamaran where id_lamaran=%d and id_member=%d",
					mysql_real_escape_string($_POST['i']),
					mysql_real_escape_string($_SESSION['idmember'])
				);
				mysql_query($q);
			}
	}
	$q = sprintf("select id_lamaran as id,waktu,judul,isi,waktu_update from surat_lamaran");
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
            Surat Lamaran</h1>
        
   <div class="formBtnSet right">
   <form name="formsurat" method="post" action="index.php?p=b&c=l">
            <input id="CreateNewResume" value="Buat Surat Lamaran" type="submit">
			</form>
        </div>
		 <table id="Pg333DataTable" class="tablesorter gTable gTable" style="table-layout: auto;" cellpadding="0" cellspacing="20"><thead><tr> <th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">Waktu dibuat &nbsp;</a></th>   <th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">Judul &nbsp;</a></th>     <th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">Waktu Update terakhir &nbsp;</a></th>  <th style="display: table-cell;" class="sortableCol" sortindex="C7"><a class="C7">action &nbsp;</a></th>       </tr> </thead>     

<?php
		while($r = mysql_fetch_object($res)){
  ?>
  <tr>
	
	<td>
		<?php echo $r->waktu;?>
	</td>
	<td>
		<?php echo $r->judul;?>
	</td>
	
	<td>
		<?php echo $r->waktu_update;?>
	</td>
	<td>

	<form name="lamar" method="post" action="index.php?p=b&c=i">
	<a href="index.php?p=b&c=l&m=e&i=<?php echo $r->id?>">edit </a> 
	<input type="hidden" name="i" value="<?php echo $r->id;?>">
		<input type="submit" name="submitdel" value="Delete" style="background:none;border:0px">
	</form></td>
	
  </tr>
  <?php
	}
  ?>


      </table> 
       
</div></div>       
