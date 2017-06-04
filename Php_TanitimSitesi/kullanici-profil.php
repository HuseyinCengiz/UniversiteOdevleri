      <?php include "header.php"; ?>
      <?php
      if(@$_SESSION["kullanici_id"]=="")
      {
        header("Location:giris.php");
      }
      ?>
      <div class="container" style="padding-top: 60px;">
        <h1 class="page-header text-center">PROFİL</h1>
        <div class="row">
          <form action="nadmin/netting/islemler.php" method="post" enctype="multipart/form-data" >
            <!-- left column -->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="text-center">
                <img src="<?php echo $kullanici['kullanici_profilresmi'];?>" class="avatar img-circle img-thumbnail" alt="avatar">
                <input type="file" name="kullanici_profilresmi" class="text-center center-block well well-sm">
              </div>
              <input type="hidden" name="eski_resimyol" value="<?php echo $kullanici['kullanici_profilresmi'];?>">
              <input type="hidden" name="kullanici_id" value="<?php echo $kullanici['kullanici_id'];?>">
              <div class="col-md-4">
                <input class="btn btn-primary" value="Resmi Güncelle" name="userkresmiguncelle" type="submit" style="background-color: #3498db;margin-left:90px;">
              </div>
            </div>
          </form >
          <!-- edit form column -->
          <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            <?php if(@$_GET["islem"]=='true'){?>
            <div class="alert alert-info">
              <i class="fa fa-check"></i>
              <strong>Profil Güncellemesi Başarılı.</strong>
            </div>
            <?php } else if(@$_GET["islem"]=='false') { ?>
            <div class="alert alert-danger">
              <i class="fa fa-times"></i>
              <strong>Profil Güncellemesi Başarısız.</strong>
            </div>
            <?php } ?>
            <h3>Hesap Bilgileri</h3>
            <form class="form-horizontal" role="form" action="nadmin/netting/islemler.php" method="post">
             <input type="hidden" name="kullanici_id" value="<?php echo $kullanici['kullanici_id'];?>">  
             <div class="form-group">
              <label class="col-lg-3 control-label">Ad Soyad</label>
              <div class="col-lg-8">
                <input class="form-control" name="kullanici_adsoyad" type="text" value="<?php echo $kullanici['kullanici_adsoyad'];?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Email:</label>
              <div class="col-lg-8">
                <input class="form-control" name="kullanici_eposta" type="text" value="<?php echo $kullanici['kullanici_eposta'];?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Password:</label>
              <div class="col-md-8">
                <input class="form-control" name="kullanici_sifre" type="password" placeholder="Değiştirmek İstediğiniz Şifreyi Giriniz">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <input class="btn btn-primary" value="KAYDET" type="submit" name="userprofilkaydet" style="background-color: #3498db"/>
                <span></span>
                <input class="btn btn-default" value="İPTAL" type="reset"/>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


    <?php include "footer.php"; ?>