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


<div class="login">
<?php echo form_open(base_url().'index.php/adminpage/loginreg');?>
Username  <?php echo form_input('username',set_value('username'));?>
<br>
Password  <?php echo form_password('password',set_value('password'));?>
<br>
<?php echo form_submit('submit','Masuk');?>
<?php echo form_close();?>
<?php echo validation_errors();if(isset($pesanerror))echo $pesanerror;?>

</div>

</body>
</html>