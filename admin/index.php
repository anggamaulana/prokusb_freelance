
<?php 
session_start();
if(!isset($_SESSION['sid']) && !isset($_SESSION['idadmin'])){
include"../koneksi.php";?>
<html>
<head>
	<title>Login Admin Lowker IT</title>
	<style type="text/css">
		.login{
			background-color:#d8d8d8;
			margin:auto;
			padding :10px;
			width:250px;
			height:150px;
			-moz-border-radius:5px;
			-webkit-border-radius:5px;
			
		}
	</style>
</head>
<body>
<?php

	if(isset($_POST['submit'])){
			
			if(empty($_POST['user']))$user="<font color=\"red\">user harus diisi</font>";
			if(empty($_POST['password']))$password="<font color=\"red\">Password harus diisi</font>";
			
			
			if(!(isset($password) || isset($user))){
				$q = sprintf("select id_admin as id from admin where admin='%s' and password=MD5('%s')",
				mysql_real_escape_string($_POST['user']),
				mysql_real_escape_string($_POST['password'])
				);
				$res = mysql_query($q);
				$id = mysql_fetch_object($res);
				if(mysql_num_rows($res)>0){
					$_SESSION['sid'] = session_id();
					$_SESSION['idadmin'] = $id->id;
					echo '<meta http-equiv="refresh" content="0;url=halamanadmin.php">';
				}else{
					$noreguser="<font color=\"red\">user atau password salah</font>";
				}
			}
		}
?>
<?php
	if(!isset($_GET['p'])){
?>
<div class="login">
<form name="form1" id="gantips" method="post" action="index.php">	
		User 		   <input type="text" name="user" value="" size="20"> <br><?php if(isset($user))echo $user;?></p>
		Password	<input type="password" name="password" value="" size="20"><br> <?php if(isset($password))echo $password;?><?php if(isset($noreguser))echo $noreguser;?><br>

					<input type="submit" name="submit" value="Submit">
		</form>


</div>
<?php
	}else if(isset($_GET['p']) && $_GET['p']=='a'){
		if(isset($_SESSION['sid']) && isset($_SESSION['idadmin']))
			include "halamanadmin.php";
		else
			echo '<meta http-equiv="refresh" content="0;url=index.php">';
	
	}
?>
</body>
</html>
<?php
	}else{
		echo '<meta http-equiv="refresh" content="0;url=halamanadmin.php">';
	}
?>