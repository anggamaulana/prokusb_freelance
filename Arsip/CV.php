<?php
if(isset($_SESSION['sid']) && isset($_SESSION['idmember'])){
	if(isset($_POST['submitdel'])){
		if(empty($_POST['i']))$alert="<font color=\"red\">xss detect </font>";
		
		if(!(isset($alert))){
			$q=sprintf("delete from cv where id_cv=%d and id_member=%d ",
			mysql_real_escape_string($_POST['i']),
			mysql_real_escape_string($_SESSION['idmember'])			
			);
			if(mysql_query($q)){
				echo '<meta http-equiv="refresh" content="0;url=index.php?p=b&c=a">';
			}
		}	
	}


	$q = sprintf("select c.id_cv as id,waktu,c.lastupdate,c.kontak,p.nama_provinsi from cv c,provinsi p where c.id_provinsi=p.id_provinsi and id_member=%d",
            mysql_real_escape_string($_SESSION['idmember']));
		$res=mysql_query($q);
		
}else{

	if(isset($_GET['i'])){
	
	$_GET['i'] = (int)$_GET['i'];
	
	$cekizin=sprintf("select pil.id_member,p.id_perusahaan from pekerjaan_pil pil,pekerjaan p where pil.id_pekerjaan=p.id_pekerjaan and pil.id_member=%d and p.id_perusahaan=%d",
		mysql_real_escape_string($_GET['i']),
		mysql_real_escape_string($_SESSION['idperusahaan'])
	);
	$ck=mysql_query($cekizin);
	if(mysql_num_rows($ck)>0){
	
	
	$q = sprintf("select c.id_cv as id,waktu,c.lastupdate,c.kontak,p.nama_provinsi from cv c,provinsi p where c.id_provinsi=p.id_provinsi and id_member=%d",
            mysql_real_escape_string($_GET['i']));
		$res=mysql_query($q);
		
	}else{
		
		echo"<h3>anda tidak diperkenankan melihat list cv member ini</h3>";
		die();
	}
	}
	
}

?>
	

	<div id="page">
		<div id="content">
			<div class="post">
							
					<?php if(isset($_SESSION['sid']) && isset($_SESSION['idmember']))include "Arsip/menu.php";
					else if(isset($_SESSION['sid']) && isset($_SESSION['idperusahaan']))include "PasangIklan/menu.php";
					?>			
			</div>
		</div>
		
		<div style="clear: both;">&nbsp;</div>

 <div style="padding-left:100px" >
        <div class="clearboth">
        </div>
        <h1>
            List CV Yang telah dibuat</h1>
        <h3>
           
        </h3>
        <div class="formBtnSet right">
		<?php
		if(isset($_SESSION['sid']) && isset($_SESSION['idmember'])){
   ?>
		<form name="buatcv" method="post" action="index.php?p=b&c=j">
            <input id="CreateNewResume" value="Buat CV"  type="submit">
			</form>
			<?php
			}
			?>
			
        </div>
        <div class="clearboth">
        </div>
        <div id="Pg386ContentContainer" style="">
            <div class="jobListFuncBar">
                


                <div class="clearboth">
                </div>
            </div>
            

<div class="currentRegionResume pT10">
          
    
</div>
<div id="Pg386_ResumeList" class="bgw">
    
<div id="Pg386Container"> <div>                   <table id="Pg386DataTable" class="tablesorter gTable gTable" style="table-layout: auto;" cellpadding="0" cellspacing="20"><thead>      <tr><th style="display: table-cell;" class="sortableCol" sortindex="C8"><a class="C8">Dibuat Tanggal &nbsp;</a></th>      <th style="display: table-cell;" class="sortableCol sortD" sortindex="C15"><a class="C15">Terakhir Diupdate &nbsp;</a></th>   <th style="display: table-cell;" class="sortableCol" sortindex="C20"><a class="C20">Kontak&nbsp;</a></th>  <th style="display: table-cell;" class="sortableCol" sortindex="C20"><a class="C20">Provinsi&nbsp;</a></th> 

<?php
		if(isset($_SESSION['sid']) && isset($_SESSION['idmember'])){
   ?>
 <th style="display: table-cell;" class="sortableCol" sortindex="C20"><a class="C20">Action&nbsp;</a></th>
 <?php
 }
 ?>
 
 </tr> </thead>     <tbody> <tr>  <td style="display: table-cell;" width=""></td> </tr>
   
   <?php
		if(isset($_SESSION['sid']) && isset($_SESSION['idmember'])){
   ?>
   <form name="del" method="post" action="index.php?p=b&c=a">
   
   <?php
   }
   ?>
   
 <?php
		while($r = mysql_fetch_object($res)){
  ?>
  <tr>
	
	<td>
		<a href="index.php?p=<?php if(isset($_SESSION['idperusahaan']))echo 'c';else if(isset($_SESSION['idmember']))echo 'b';?>&c=<?php if(isset($_SESSION['idperusahaan']))echo 'p';else if(isset($_SESSION['idmember']))echo 'n';?>&i=<?php echo $r->id;?><?php if(isset($_GET['i'])) echo'&im='.$_GET['i'];?>" style="color:blue"><?php echo $r->waktu;?></a>
	</td>
	<td>
		<?php echo $r->lastupdate;?>
	</td>
	<td>
		<?php echo $r->kontak;?>
	</td>
	<td>
		<?php echo $r->nama_provinsi;?>
	</td></a>
	<td>
		<?php
			if(isset($_SESSION['sid']) && isset($_SESSION['idmember'])){
		?>
		<a href="index.php?p=b&c=j&m=e&i=<?php echo $r->id;?>">Edit </a>
		
		
		<input type="hidden" name="i" value="<?php echo $r->id;?>"><input type="submit" name="submitdel" value="Delete" style="background:none;border:0px;">
		
		<?php
		}
		?>
	</td>
  </tr>
  
  <?php
	}
  ?>
  
  <?php
		if(isset($_SESSION['sid']) && isset($_SESSION['idmember'])){
   ?>
 </form>
    <?php
   }
   ?>
   
   
   </tbody> </table>  <div id="Pg333Footer"></div> </div></div>
<div id="Pg333BodyContainer"></div></div>
                                             
</div>    
</div>
 
	<div class="otherRegionResume mT10">
      
        <h5 id="hidden_ID" class="pT3 pB3 hidden_Region" style="display:none;"><a style="cursor: pointer;" class="LoadResumeFrom" value="ID"><img class="flag" src="myjobsDB_CV_files/flag_ID.gif">View My resumes in&nbsp;Indonesia&nbsp;»</a></h5>

    </div>
	</div>
