<?php


function generatefaktur($table){
		
		$loop=true;
		$f='';
		while($loop){
			$id_gen = uniqid();
			$f = 'INV-'.substr($id_gen,strlen($id_gen)-8,strlen($id_gen));
			$q = 'select faktur from '.$table.' where faktur=\''.mysql_real_escape_string($f).'\'';
			$r = mysql_query($q);
			if(mysql_num_rows($r)<=0)
				$loop=false;
		}
		
		return $f;
	
}


function cektransaksiaktif($id_perusahaan){
		
		$q = 'select id_transaksi from transaksi where status_konfirm=\'A\' and id_perusahaan='.mysql_real_escape_string($id_perusahaan).'';
		$r = mysql_query($q); 
		
		if($r==FALSE)
			return false;
		
		if(mysql_num_rows($r)>0)
			return true;
		else
			return false;
	}
	
function cektransaksiwaiting($id_perusahaan){
		
		$q = 'select id_transaksi from transaksi where status_konfirm=\'W\' and id_perusahaan='.mysql_real_escape_string($id_perusahaan).'';
		$r = mysql_query($q);
		
		if($r==FALSE)
			return false;
		
		if(mysql_num_rows($r)>0)
			return true;
		else
			return false;
	}
	
function cektransaksikuotawaiting($id_perusahaan){
		
		$q = 'select id_trans_k from transaksi_kuota where status_konfirm=\'W\' and id_transaksi='.mysql_real_escape_string(caritransaksiwaiting($id_perusahaan)).'';
		$r = mysql_query($q); 
		
		if($r==FALSE)
			return false;
			
		if(mysql_num_rows($r)>0)
			return true;
		else
			return false;
	}
function cektransaksikuotaaktif($id_perusahaan){
		
		$q = 'select id_trans_k from transaksi_kuota where status_konfirm=\'A\' and id_transaksi='.mysql_real_escape_string(caritransaksiaktif($id_perusahaan)).'';
		$r = mysql_query($q); 
		
		if($r==FALSE)
			return false;
		
		if(mysql_num_rows($r)>0)
			return true;
		else
			return false;
	}
	
function caritransaksiaktif($id_perusahaan){
		
		$q = 'select id_transaksi from transaksi where status_konfirm=\'A\' and id_perusahaan='.mysql_real_escape_string($id_perusahaan).'';
		$r = mysql_query($q); 
		
		if($r==FALSE)
			return false;
		
		$row = mysql_fetch_object($r);
		if(mysql_num_rows($r)>0)
			return $row->id_transaksi;
		else
			return false;
}

function caritransaksiwaiting($id_perusahaan){
		
		$q = 'select id_transaksi from transaksi where status_konfirm=\'W\' and id_perusahaan='.mysql_real_escape_string($id_perusahaan).'';
		$r = mysql_query($q); 
		
		if($r==FALSE)
			return false;
		
		$row = mysql_fetch_object($r);
		if(mysql_num_rows($r)>0)
			return $row->id_transaksi;
		else
			return false;
}


function cariwaktuhabis($waktumulai,$id_paket){
		
		$q = sprintf('select \'%s\'+INTERVAL (select rentang from paket where id_paket=%d) MONTH as waktuhabis',
		mysql_real_escape_string($waktumulai),
		mysql_real_escape_string($id_paket));
		$row=mysql_fetch_object(mysql_query($q));
		$result=$row->waktuhabis;
		
			return $result;
		
	}
	
function sisakuota($idperusahaan){
	$q2 = sprintf("select p.jatah_iklan,t.waktu_selesai from perusahaan p,transaksi t where t.id_perusahaan=p.id_perusahaan and t.status_konfirm='A' and p.id_perusahaan=%d",
            mysql_real_escape_string($idperusahaan));
		
	$r=mysql_query($q2);	
	
	if($r==FALSE || mysql_num_rows($r)<=0)
			return false;		
			
	$res2=mysql_fetch_object($r);
	return $res2->jatah_iklan;
}

function expired($idperusahaan){
	$q2 = sprintf("select distinct t.id_perusahaan,t.waktu_selesai from transaksi t where t.status_konfirm='A' and t.id_perusahaan=%d",
            mysql_real_escape_string($idperusahaan));
			$r=mysql_query($q2);
			
			if($r==FALSE || mysql_num_rows($r)<=0)
			return false;
			
	$res2=mysql_fetch_object($r);
	return $res2->waktu_selesai;
}

function waktumulaiberlaku($idperusahaan){
	$q2 = sprintf("select distinct t.id_perusahaan,t.waktu_mulai from transaksi t where t.status_konfirm='A' and t.id_perusahaan=%d",
            mysql_real_escape_string($idperusahaan));
	$res2=mysql_fetch_object(mysql_query($q2));
	return $res2->waktu_mulai;
}

?>