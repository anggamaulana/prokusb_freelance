<?php
if(!(isset($_POST['submitcancel']))){
	
	if(isset($_POST['submit'])){
		if(empty($_POST['alert']))$alert="<font color=\"red\">Silahkan pilih frekuensi Email Alert </font>";
		
		if(!(isset($alert))){
			$q=sprintf("insert into job_alert(id_jenis_jobalert,id_member) values(%d,%d) ",
			mysql_real_escape_string($_POST['alert']),
			mysql_real_escape_string($_SESSION['idmember'])			
			);
			if(mysql_query($q)){
				echo '<meta http-equiv="refresh" content="0;url=index.php?p=b&c=d">';
			}
		}	
	}
	
}else{
	echo '<meta http-equiv="refresh" content="0;url=index.php?p=b&c=d">';
}

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
        <pre>
<tr>
<?php if(isset($alert))echo $alert;?>
<form enctype="multipart/form-data" name="iklan"  method="post" action="">
  <p>Durasi :	<input name="alert" type="radio" value="1" />Mingguan 

		<input name="alert" type="radio" value="2" />Bulanan
		
		
<input type="submit" name="submit" value="Simpan" onClick="cekForm()"> <input type="submit" name="submitcancel" value="Cancel">
</pre>
</form>






				</center>
			</td>
			</td>
  </tr>
   
       
</div> 	</div>       
