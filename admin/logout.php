<?php
session_start();
if(isset($_SESSION['sid']) && isset($_SESSION['idadmin'])){
						unset($_SESSION['sid']);
						unset($_SESSION['idadmin']);
						
						echo '<meta http-equiv="refresh" content="0;url=index.php">';
}
?>