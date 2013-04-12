<?php

if(isset($_SESSION['sid']) && isset($_SESSION['idperusahaan'])){
						unset($_SESSION['sid']);
						unset($_SESSION['idperusahaan']);
						
						echo '<meta http-equiv="refresh" content="0;url=index.php?p=c">';
}
?>