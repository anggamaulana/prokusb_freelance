<?php

	if(isset($_POST['submitdel'])){
		if(empty($_POST['i']))$alert="<font color=\"red\">xss detect </font>";
		
		if(!(isset($alert))){
			$q=sprintf("delete from job_alert where id_jobalert=%d and id_member=%d ",
			mysql_real_escape_string($_POST['i']),
			mysql_real_escape_string($_SESSION['idmember'])			
			);
			if(mysql_query($q)){
				echo '<meta http-equiv="refresh" content="0;url=index.php?p=b&c=d">';
			}
		}	
	}



	$q = sprintf("select ja.id_jobalert as id,j.jenis_alert as nama,ja.waktu,IF(frekuensi=7,'Mingguan','Bulanan') as frekuensi from jenis_alert j,job_alert ja where ja.id_jenis_jobalert=j.id_jenis_alert and ja.id_member=%d",
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
            Jobs Alert</h1>
        <h3>
            Anda bisa membuat Email Alert jika ada pekerjaan sesuai dengan yang anda pilih
        </h3>
        <div class="formBtnSet right">
		 <form name="alert" method="post" action="index.php?p=b&c=m">
            <input id="CreateNewResume" value="Buat Jobs Alert" type="submit">
			</form>
        </div>
        <div class="clearboth">
        </div>
        <div id="Pg386ContentContainer" style="">
            <div class="jobListFuncBar">
                


                <div class="clearboth">
                </div>
            </div>
            

<div id="Pg386_ResumeList" class="bgw">
    
<div id="Pg386Container"> <div>                   <table id="Pg386DataTable" class="tablesorter gTable gTable" style="table-layout: auto;" cellpadding="0" cellspacing="20">     <thead><tr>  <th style="display: table-cell;" class="sortableCol" sortindex="C21"><a class="C21">Nama JobsAlert&nbsp;</a></th>   <th style="display: table-cell;" class="sortableCol" sortindex="C8"><a class="C8">Dibuat Tanggal &nbsp;</a></th>                     <th style="display: table-cell;" class="sortableCol" sortindex="C8"><a class="C8">Frekuensi&nbsp;</a></th>   <th style="display: table-cell;" class="sortableCol" sortindex="C8"><a class="C8">action&nbsp;</a></th>       <tbody> 
 <form name="del" method="post" action="index.php?p=b&c=d">
 <?php
		
		if(mysql_num_rows($res)<=0){
			echo'Tidak ada data';die();
		}
		while($r = mysql_fetch_object($res)){
  ?>
  <tr>
	
	<td>
		<?php echo $r->nama;?></a>
	</td>
	<td>
		<?php echo $r->waktu;?>
	</td>
	<td>
		<?php echo $r->frekuensi;?>
	</td>
	<td>
		<b><input type="hidden" name="i" value="<?php echo $r->id;?>"><input type="submit" name="submitdel" value="Delete" style="background:none;border:0px;"></b>
	</td>
  </tr>
  <?php
	}
  ?>
 
 </tbody> 
 
 </table>  <div id="Pg333Footer"></div> </div></div>
<div id="Pg333BodyContainer"></div></div>
   
<div id="Pg386BodyContainer"></div>

</div>
 
<div class="otherRegionResume mT10">
      
        <h5 id="hidden_ID" class="pT3 pB3 hidden_Region" style="display:none;"><a style="cursor: pointer;" class="LoadResumeFrom" value="ID"><img class="flag" src="myjobsDB_CV_files/flag_ID.gif">View My resumes in&nbsp;Indonesia&nbsp;»</a></h5>

    </div>
    </div>
    </div>
