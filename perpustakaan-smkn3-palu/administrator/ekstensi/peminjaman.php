<?php
$tgl_pinjam=date('Y-m-d');
$tujuh_hari= mktime(0,0,0, date('n'), date('j')+7, date('Y'));
$kembali=date('Y-m-d',$tujuh_hari);
?>