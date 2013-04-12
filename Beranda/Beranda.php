
	<?php
		if(isset($_POST['submit'])){
			
			if(empty($_POST['email']))$email="<font color=\"red\">Email harus diisi</font>";
			if(empty($_POST['password']))$password="<font color=\"red\">Password harus diisi</font>";
			if(preg_match('/^[a-z][\w\.]*@[a-z0-9]+\.[a-z]{2,}/',$_POST['email'])==0)
			$email="<font color=\"red\">Email Harus valid</font>";
			
			if(!(isset($password) || isset($email))){
				$q = sprintf("select id_member as id from member where email='%s' and password=MD5('%s')",
				mysql_real_escape_string($_POST['email']),
				mysql_real_escape_string($_POST['password'])
				);
				$res = mysql_query($q);
				$id = mysql_fetch_object($res);
				if(mysql_num_rows($res)>0){
					if(isset($_SESSION['sid']))unset($_SESSION['sid']);
					if(isset($_SESSION['idperusahaan']))unset($_SESSION['idperusahaan']);
					$_SESSION['sid'] = session_id();
					$_SESSION['idmember'] = $id->id;
					echo '<meta http-equiv="refresh" content="0;url=index.php?p=b">';
				}else{
					$noreguser="<font color=\"red\">user atau email salah</font>";
				}
			}
		}
	?>
	<div id="page">
		<div id="content">
			<div class="post">
			<?php
					if(isset($_SESSION['sid']) && isset($_SESSION['idmember']))
						include"Arsip/menu.php";
					else if(isset($_SESSION['sid']) && isset($_SESSION['idperusahaan']))
						include"PasangIklan/menu.php";
			?>	
			<form name="search"method="post" action="index.php?p=a&c=b">

				<h2 class="title"><a href="#">Cari Pekerjaan </a></h2>
								<input type="text" name="s" id="search-text" value="" />
				<select name="prov" style="border:1px;border-color:#fff">
				<option value ="" selected="selected">Masukan lokasi kerja</option>
				<option value ="">--------------------------</option>
				<?php 
				$q = "select id_provinsi,nama_provinsi from provinsi";			
				$result=mysql_query($q);
				while($row = mysql_fetch_object($result)){?>
				<option value="<?php echo $row->id_provinsi;?>"><?php echo $row->nama_provinsi;?></option>
				<?php } ?>
			</select>		<br>
			<select name="kat_p" style="border:1px;border-color:#fff">
				<option value ="" selected="selected">masukan Kategori kerja</option>
				<option value ="">--------------------------</option>
				<?php 
				$q = "select id_kategori_pekerjaan as id,nama_kategori_pekerjaan as nm from kategori_pekerjaan";			
				$result=mysql_query($q);
				while($row = mysql_fetch_object($result)){?>
				<option value="<?php echo $row->id;?>"><?php echo $row->nm;?></option>
				<?php } ?>
			</select>	
			<br>	
			<input type="submit" name="submit" id="search-submit" value="CARI" /> 
				  </form>
			</div>
		
        
			<div id="column1" style="width:600px;margin-bottom:20px">
			<h2>Daftar Pekerjaan</h2><br><br>
			<ul>
			
			<?php
			
			$q = "select k.id_kategori_pekerjaan as id,k.nama_kategori_pekerjaan as Kategori,IF(j.jumlah IS NULL,0,j.jumlah) as jumlah from kategori_pekerjaan k left join (select id_kategori_pekerjaan,count(id_pekerjaan) as jumlah from pekerjaan group by id_kategori_pekerjaan) as j  on k.id_kategori_pekerjaan=j.id_kategori_pekerjaan";			
				$result=mysql_query($q);
				$jml = mysql_num_rows($result);
				$data=array();
				$j=0;
			while($row = mysql_fetch_object($result)){
				$data[$j]['id'] = $row->id;
				$data[$j]['Kategori'] = $row->Kategori;
				$data[$j]['jumlah'] = $row->jumlah;	
				$j++;
			}
			
			
			echo '<div style="float:left">';
			for($i=0;$i<$jml/2;$i++){
			echo '<li><a href="index.php?p=a&c=b&i='.$data[$i]['id'].'">'.$data[$i]['Kategori'].'('.$data[$i]['jumlah'].')</a></li>
			';
			}
			echo '</div>';
			
			
			echo '<div style="float:left;margin-left:30px;">';
			for($i=($jml/2)+1;$i<$jml;$i++)
			echo '<li><a href="index.php?p=a&c=b&i='.$data[$i]['id'].'">'.$data[$i]['Kategori'].'('.$data[$i]['jumlah'].')</a></li>
			';
			echo '</div>';
			
			
			?>
			
			</ul>
			</div>	
			<br>
			<div id="column1">
			<h2>Lowongan Terbaru</h2><br><br>
			<ul>
			
			<?php
			$q = "select id_pekerjaan as id,nama_pekerjaan from pekerjaan order by waktu_mulai desc limit 0,10";			
				$result=mysql_query($q);
			while($row = mysql_fetch_object($result)){
				echo '<li><a href="index.php?p=b&c=k&i='.$row->id.'">'.$row->nama_pekerjaan.'</a></li>';
			}
			?>
			
			</ul>
			</div>
			
			
		</div>
		<!-- end #content -->
		<div style="float:left;width:200px;">
			<ul>
			
					<div id="search" >
					<?php
						if(!isset($_SESSION['sid']) && !isset($_SESSION['idmember'])){
					
					?>
						<form name="loginmember" method="post" action="index.php">
							<div><pre>
							<h2 class="title">Login</h2>
Email	   <input type="text" name="email" id="search-text" value="<?php if(isset($_POST['email']))echo $_POST['email'];?>" />
 <?php if(isset($email))echo $email;?>
<br>Password   <input type="password" name="password" id="search-text" value="<?php if(isset($_POST['password']))echo $_POST['password'];?>" />
 <?php if(isset($password))echo $password;?>
 <?php if(isset($noreguser))echo $noreguser;?>
<br>
<input type="submit" name="submit" id="search-submit" value="Login" />

Belum punya akun?? <a href="index.php?p=a&c=c">Sign Up</a>
</pre>

			
									
							</div>
						</form>
						<?php
						}
						?>
					</div>
			
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	
