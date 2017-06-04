<?php 
session_start();
session_destroy();
include "netting/baglanti.php";
$cikisdegistir=$db->prepare("UPDATE menu SET menu_durum=? where menu_url in('kullanici-profil.php','nadmin/cikis.php')");
$cikisdegistir->execute(array(0));
$girisdegistir=$db->prepare("UPDATE menu SET menu_durum=? where menu_url in('giris.php')");
$girisdegistir->execute(array(1));
header("Location:../giris.php?durum=exit");
?>