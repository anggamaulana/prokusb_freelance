<?php
session_start();
include"../koneksi.php";
if(isset($_REQUEST['i']))
$id = addslashes($_REQUEST['i']);
if(isset($_REQUEST['im']))
$im = addslashes($_REQUEST['im']);

if(isset($_SESSION['sid']) && isset($_SESSION['idmember'])){
$data = mysql_fetch_object(mysql_query("select photo from cv where id_cv=$id and id_member=".mysql_real_escape_string($_SESSION['idmember'])));

}else if(isset($_SESSION['sid']) && isset($_SESSION['idperusahaan'])){
$cekizin=sprintf("select pil.id_member,p.id_perusahaan from pekerjaan_pil pil,pekerjaan p where pil.id_pekerjaan=p.id_pekerjaan and pil.id_member=%d and p.id_perusahaan=%d",
		mysql_real_escape_string($im),
		mysql_real_escape_string($_SESSION['idperusahaan'])
	);
	$ck=mysql_query($cekizin);
	if(mysql_num_rows($ck)>0){	
		$data = mysql_fetch_object(mysql_query("select photo from cv where id_cv=$id "));

	}
}

header("Content-type: image/jpg");
echo $data->photo;

?>