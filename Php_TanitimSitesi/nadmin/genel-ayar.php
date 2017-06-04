<?php include "header.php";
$ayarsor=$db->prepare("SELECT * FROM site_ayar where site_id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>
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
      <li class="active">Genel Ayarlar</li>
    </ul> 
    <div class="row">
      <div class="col-md-12">
        <div class="form-horizontal">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>Genel Ayarlar</strong></h3>
            </div>

            <form action="netting/islemler.php" enctype="multipart/form-data" method="post"> 
              <div class="panel-body">    
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label"></label>
                  <div class="col-md-6 col-xs-12">                                                                                          
                    <input type="file" class="fileinput btn-primary" name="site_logo" id="filename" title="Resim ara"/>
                  </div>
                </div>      
                                                                              
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Logo</label>
                  <div class="col-md-6 col-xs-12">
                    <?php
                    if(strlen($ayarcek["site_logo"])>0)
                      {?>
                    <img width="200px" height="150px" src="../<?php echo $ayarcek['site_logo']; ?>">
                    <?php } else {?>
                    <img width="200px" height="150px" src="../myimg/logo-yok.png"/>
                    <?php  }   
                    ?>                                                                            
                  </div>
                </div>   
                </div>                     
                <div class="panel-footer">   
                  <div class="col-md-10"> 
                    <p style="<?php if(@$_GET["logo"]=='true'){echo "color:green;";} else if(@$_GET["logo"]=='false') { echo "color:red;";}  else { echo "color:red;"; } ?>">
                      <?php 
                      if(@$_GET["logo"]=='true')
                      {
                        echo "Logo Değiştirildi.";
                      }
                      else if(@$_GET["logo"]=='false')
                      {
                       echo "Logo Değiştirilemedi.";
                     }
                     else if(@$_GET["logo"]=='boyut')
                     {
                      echo "Yüklemek İstediğiniz Logonun Boyutu Çok Fazla 5 Mb'den Az Olmalı!";
                    }
                    else if(@$_GET["logo"]=='tasima')
                    {
                     echo "Logo Taşınamadı!";
                   }
                   else if(@$_GET["logo"]=='gecici')
                   {
                     echo "Logo Geçici Adrese Gelemedi!";
                   }
                   else if(@$_GET["logo"]=='tur')
                   {
                     echo "Yüklemek İstediğiniz Logonun Türü [Jpeg/Jpg] ya da Png Olmalı!";
                   }
                   ?> 
                 </p></div>
                 <div class="col-md-2"> <button type="submit" name="sitelogo-kaydet" class="btn btn-primary pull-right">Logo Güncelle</button> </div>
               </div>
             </form>

             <form action="netting/islemler.php" method="post"> 
              <div class="panel-body">                                                                        
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Site Url</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" class="form-control" name="site_url" value="<?php echo $ayarcek["site_url"] ?>"/>
                    </div>                                            
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Site Başlığı</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" class="form-control" name="site_title" value="<?php echo $ayarcek["site_title"] ?>" />
                    </div>                                            
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Site Açıklamaları</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" class="form-control" name="site_description" value="<?php echo $ayarcek["site_description"] ?>"/>
                    </div>                                            
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Site Anahtar Kelimeleri</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" class="form-control" name="site_keywords" value="<?php echo $ayarcek["site_keywords"] ?>"/>
                    </div>                                            
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Site Yazar</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" class="form-control" name="site_author" value="<?php echo $ayarcek["site_author"] ?>"/>
                    </div>                                            
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Site Galeri Yazı</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" class="form-control" name="site_galeri" value="<?php echo $ayarcek["site_galeri"] ?>"/>
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
                 <div class="col-md-2"> <button type="submit" name="genelayar-kaydet" class="btn btn-primary pull-right">Güncelle</button> </div>
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