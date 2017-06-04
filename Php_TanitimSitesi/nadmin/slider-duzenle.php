<?php include "header.php";
$slidersor=$db->prepare("SELECT * FROM slider where slider_id=:id");
$slidersor->execute(array("id"=>$_GET["slider_id"]));
$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);
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
      <li class="active">Düzenle</li>
    </ul> 
    <div class="row">
      <div class="col-md-12">
        <div class="form-horizontal">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>Slider Düzenle</strong><small style="margin-left: 5px;"><?php 
                if(@$_GET['durum']=='true')
                 { ?> <b style="color:Green;">İşlem Başarılı...</b>
               <?php } 
               else if(@$_GET['durum']=='false')
                 { ?> <b style="color:Red;">İşlem Başarısız...</b>
               <?php } 
               else if(@$_GET['durum']=='tip')
                 { ?> <b style="color:Red;">Sadece "PNG/JPG" Tipinde Ekleyebilirsiniz...</b>
               <?php } 
               else if(@$_GET['durum']=='boyut')
                 { ?> <b style="color:Red;">Dosya Boyutu Çok Fazla...</b>
               <?php } 
               else if(@$_GET['durum']=='tasima')
                 { ?> <b style="color:Red;">Taşıma Başarısız...</b>
               <?php } 
               else if(@$_GET['durum']=='yuklenme'){ ?>
               <b style="color:Red;">Yükleme İşlemi Başarısız...</b> <?php
             } else{}?>
           </small> </h3>
           <a href="slider.php"><button class="btn btn-warning pull-right">Geri Dön</button></a>
         </div>
         <form action="netting/islemler.php" enctype="multipart/form-data" method="post">
          <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id'];?>">
          <input type="hidden" name="slider_resimyol" value="<?php echo $slidercek['slider_resimyol'];?>">
          <div class="panel-body">
           <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Yüklü Resim</label>
            <div class="col-md-6 col-xs-12">
             <img width="200px" height="100px" src=<?php echo '../'.$slidercek['slider_resimyol'];?> >                                                                   
           </div>
         </div>      
         <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Slider Ad</label>
          <div class="col-md-6 col-xs-12">                                            
            <div class="input-group">
              <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
              <input type="text" class="form-control" name="slider_ad" value="<?php echo $slidercek['slider_ad'];?>" />
            </div>                                            
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Slider Açıklama</label>
          <div class="col-md-6 col-xs-12">                                            
            <div class="input-group">
              <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
              <input type="text" class="form-control" name="slider_aciklama" value="<?php echo $slidercek['slider_aciklama'];?>" />
            </div>                                            
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Slider Link</label>
          <div class="col-md-6 col-xs-12">                                            
            <div class="input-group">
              <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
              <input type="text" class="form-control" name="slider_link" value="<?php echo $slidercek['slider_link'];?>" />
            </div>                                            
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Slider Sıra</label>
          <div class="col-md-6 col-xs-12">                                            
            <div class="input-group">
              <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
              <input type="text" class="form-control" name="slider_sira" value="<?php echo $slidercek['slider_sira'];?>" />
            </div>                                            
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Slider Resim</label>
          <div class="col-md-6 col-xs-12">                                                                                          
            <input type="file" class="fileinput btn-primary" name="slider_resimyol" title="Resim ara"/>
          </div>
        </div>   
        <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Aktif / Pasif</label>
          <div class="col-md-6 col-xs-12">                                                                                                                             
            <input type="checkbox" class="icheckbox" name="slider_durum"  <?php  if($slidercek['slider_durum']==true) {  echo "checked";}?> /> 
          </div>
        </div>
      </div>                                                                                 
      <div class="panel-footer">   
       <button type="submit" name="slider-guncelle" class="btn btn-primary pull-right">Güncelle</button>
     </div>
   </form>
 </div>
</div>
</div>                    
</div>
<!-- END PAGE CONTENT WRAPPER -->                                                
</div>            
<!-- END PAGE CONTENT -->
<?php include "footer.php" ?>