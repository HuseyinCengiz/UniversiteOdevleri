<?php include "header.php" ?>

<!-- PAGE CONTENT -->
<div class="page-content">
    <!-- START X-NAVIGATION VERTICAL -->
    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <!-- TOGGLE NAVIGATION -->
        <li class="xn-icon-button">
            <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
        </li>
        <!-- END TOGGLE NAVIGATION -->
        <!-- SIGN OUT -->
        <li class="xn-icon-button pull-right">
            <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
        </li> 
        <!-- END SIGN OUT -->
    </ul>
    <!-- END X-NAVIGATION VERTICAL -->                   
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <ul class="breadcrumb">
            <li><a href="index.php">Anasayfa</a></li>                    
            <li class="active">Yönetim Paneli</li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Kullanıcı Profil</strong></h3>
                        </div>
                        
                        <form action="netting/islemler.php" enctype="multipart/form-data" method="post"> 
                          <div class="panel-body">    
                            <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label"></label>
                              <div class="col-md-6 col-xs-12">                                                                                          
                                <input type="file" class="fileinput btn-primary" name="kullanici_profilresmi" id="filename" title="Resim ara"/>
                            </div>
                        </div>
                        <input type="hidden" name="eski_resimyol" value="<?php echo $kullanici['kullanici_profilresmi'];?>">
                        <input type="hidden" name="kullanici_id" value="<?php echo $kullanici['kullanici_id'];?>">   
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Kullanıcı Profil Resmi</label>
                            <div class="col-md-6 col-xs-12">
                              <img width="200px" height="150px" src="../<?php echo $kullanici["kullanici_profilresmi"];?>">                                        
                          </div>
                      </div>   
                  </div>                     
                  <div class="panel-footer">   
                      <div class="col-md-10"> 
                        <p style="<?php if(@$_GET["profilresmi"]=='true'){echo "color:green;";} else if(@$_GET["profilresmi"]=='false') { echo "color:red;";}  ?>">
                          <?php 
                          if(@$_GET["profilresmi"]=='true')
                          {
                            echo "Profil Resmi Değiştirildi.";
                        }
                        else if(@$_GET["profilresmi"]=='false')
                        {
                           echo "Profil Resmi Değiştirilemedi.";
                       }
                       ?> 
                   </p></div>
                   <div class="col-md-2"> <button type="submit" name="kresimguncelle" class="btn btn-primary pull-right">Profil Resmi Güncelle</button> </div>
               </div>
           </form>


           <form action="netting/islemler.php" method="post"> 
              <div class="panel-body">                                                                        
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Kullanıcı Ad Soyad</label>
                    <div class="col-md-6 col-xs-12">                                            
                        <div class="input-group">
                          <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                          <input type="text" class="form-control" name="kullanici_adsoyad" value="<?php echo $kullanici["kullanici_adsoyad"];?>"/>
                      </div>                                            
                  </div>
              </div>
              <input type="hidden" name="kullanici_id" value="<?php echo $kullanici['kullanici_id'];?>">  
              <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Kullanıcı Şifre</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" class="form-control" name="kullanici_sifre" placeholder="Değiştirmek İstediğiniz Şifrenizi Giriniz"/>
                  </div>                                            
              </div>
          </div>
      </div>
      <div class="panel-footer">   
        <div class="col-md-10"> 
          <p style="<?php if(@$_GET["islem"]=='true'){echo "color:green;";} else if(@$_GET["islem"]=='false') { echo "color:red;";} ?>">
            <?php 
            if(@$_GET["islem"]=='true')
            {
              echo "İşlem Başarılı...";
          }
          else if(@$_GET["islem"]=='false')
          {
           echo "İşlem Başarısız...";
       }
       ?> 
   </p></div>
   <div class="col-md-2"> <button type="submit" name="kullaniciprofilkaydet" class="btn btn-primary pull-right">Güncelle</button> </div>
</div>
</form>

</div>
</div>
</div>
</div>                    
</div>
<!-- END PAGE CONTENT WRAPPER -->                                                
</div>            
<!-- END PAGE CONTENT -->
<?php include "footer.php" ?>





