<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Antalya Tanıtım Giriş</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/giris.css">
</head>
<body>
  <?php
  session_start();
  if(@$_SESSION["kullanici_id"]!="")
  {
    header("Location:index.php");
  }
  ?>
  <!-- Mixins-->
  <!-- Pen Title-->
  <div class="pen-title">
    <h1>GİRİŞ</h1>
  </div>
  <div class="container">
    <div class="card"></div>
    <div class="card">
      <h1 class="title">GİRİŞ</h1>
      <form action="nadmin/netting/islemler.php" id="giris_formu" method="post" onsubmit="return false;">
        <div class="input-container">
          <input type="text" name="kullanici_eposta" id="giris_eposta" class="email" required="required"/>
          <label>Email</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" name="kullanici_sifre" id="giris_sifre" class="pass" required="required"/>
          <label>Şifre</label>
          <div class="bar"></div>
        </div>
        <div style="text-align: center;color:#e74c3c;margin-bottom: 15px;font-size:15px;font-weight:bold;">
         <p><?php if(@$_GET["durum"]=="no") { echo "Kullanıcı Bulunamadı!";} ?></p>
         <p> <?php  if(@$_GET["durum"]=="exit") { echo "Başarıyla Çıkış Yaptınız...";} ?></p>
         <p class="uyari"></p>
       </div>
       <div class="button-container">
        <button type="submit" name="giris-yap"><span>GİR</span></button>
      </div>
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">KAYIT
      <div class="close"></div>
    </h1>
    <form action="nadmin/netting/islemler.php" enctype="multipart/form-data" id="kayit_formu" method="post" onsubmit="return false;">
      <div class="input-container">
        <input type="text" name="kullanici_adsoyad" id="kayit_adsoyad"/>
        <label>AD-SOYAD</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="kullanici_eposta" id="kayit_email"/>
        <label>E-MAİL</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="kullanici_sifre" id="kayit_sifre" />
        <label>PASSWORD</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
       <span style="color:#b4e7d9; font-size: 20px;">Profil Resmi</span>
       <input type="file" name="kullanici_profilresmi" required="required"/>
       <div class="bar"></div>
     </div>
      <div class="input-container">
        <p style="font-size:15px;font-weight:bold;text-align: center;color:#e74c3c;" id="hata"></p>
     </div>
     <div class="button-container">
      <button type="submit" name="kayit-ol"><span>KAYIT OL</span></button>
    </div>
  </form>
</div>
</div>
<script src='js/vendor/jquery-1.10.1.min.js'></script>
<script src="js/giris.js"></script> 
<script src="js/kontrol.js" type="text/javascript"></script>
</body>
</html>
