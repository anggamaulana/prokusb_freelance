<?php

if(isset($_SESSION['sid']) && isset($_SESSION['idmember'])){
						unset($_SESSION['sid']);
						unset($_SESSION['idmember']);
						header("location=index.php");
						echo '<meta http-equiv="refresh" content="0;url=index.php">';
}
?>