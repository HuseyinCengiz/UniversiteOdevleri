<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Antalya Tanıtım</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="content/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/typicons.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery.selectBoxIt.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
    <?php include "nadmin/netting/baglanti.php"; 
    ob_start();
    session_start();
    @$id=$_SESSION["kullanici_id"];
    $kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kullanici_id=:id");
    $kullanicisor->execute(array("id"=>$id));
    $kullanici=$kullanicisor->fetch(PDO::FETCH_ASSOC);

    ?>
    <?php include "ustmenu.php"; ?>
    <header class="main-header hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo">
                        <figure>
                            <a href="index.php"><img src="<?php echo $siteayarcek["site_logo"];?>" alt="Logo"/></a>
                        </figure>
                    </div>
                </div>
                <div class="col-sm-8 text-right">
                    <a href="#" class="menu-button">Menü <i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </header>
    <header class="mobile-logo visible-xs">
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="logo">
                        <figure>
                            <a href="index.html"><img src="content/logo.png" alt="Logo"/></a>
                        </figure>
                    </div>
                    <div class="mobile-search">
                        <form action="#">
                            <div class="input-group">
                                <input type="text" class="form-control" name="s" placeholder="Search something interesting">
                                <span class="input-group-addon"><button type="submit"><i class="fa fa-search"></i></button></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>