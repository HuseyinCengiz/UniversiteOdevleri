<!DOCTYPE html>
<html lang="en">
<head>        
    <!-- META SECTION -->
    <title>Antalya Tanıtım Admin Paneli</title>            
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->                    
    <!-- CSS INCLUDE -->        
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-night.css"/>
    <!-- EOF CSS INCLUDE -->             
    <!-- CKEDITOR -->
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>      
</head>
<body>
    <?php include "netting/baglanti.php";
    ob_start();
    session_start();
    $id=$_SESSION["kullanici_id"];
    $kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kullanici_id=:id");
    $kullanicisor->execute(array("id"=>$id));
    $kullanici=$kullanicisor->fetch(PDO::FETCH_ASSOC);
    ?>
    <?php 
    if(!isset($_SESSION["kullanici_id"]) || $kullanici["kullanici_yetki"]=="User")
    {
        header("Location:../giris.php");
    }
    ?>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">
      <?php include "sidebar.php"; ?>