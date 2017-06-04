<?php include "header.php";
$habersor=$db->prepare("SELECT * FROM haber where haber_id=:id");
$habersor->execute(array("id"=>$_GET["haber_id"]));
$habercek=$habersor->fetch(PDO::FETCH_ASSOC);
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
              <h3 class="panel-title"><strong>Haber Düzenle</strong><small style="margin-left: 5px;"><?php 
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
           <a href="haber.php"><button class="btn btn-warning pull-right">Geri Dön</button></a>
         </div>
         <form action="netting/islemler.php" enctype="multipart/form-data" method="post">
          <div class="panel-body">
            <input type="hidden" name="haber_id" value="<?php echo $habercek['haber_id'];?>">
            <input type="hidden" name="haber_resimyol" value="<?php echo $habercek['haber_resimyol'];?>">
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Yüklü Resim</label>
              <div class="col-md-6 col-xs-12">
               <img width="200px" height="100px" src=<?php echo '../'.$habercek['haber_resimyol'];?> >                                                
             </div>
           </div>      
           <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Haber Ad</label>
            <div class="col-md-6 col-xs-12">                                            
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                <input type="text" class="form-control" name="haber_ad" value="<?php echo $habercek['haber_ad'];?>" />
              </div>                                            
            </div>
          </div>
          <div class="form-group">
           <label class="col-md-3 col-xs-12 control-label">Kategori</label>
           <div class="col-md-6 col-xs-12">                                                                                
             <select class="form-control select" name="kategori_id">
              <?php
              $kategorisor=$db->query('SELECT * FROM kategori ORDER BY kategori_sira');
              $kategoricek=$kategorisor->fetchAll(PDO::FETCH_ASSOC); 
              foreach ($kategoricek as $value) 
                { ?>
              <option value="<?php echo $value["kategori_id"]; ?>"><?php echo $value["kategori_ad"]; ?></option>
              <?php }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Haber Tanıtım</label>
          <div class="col-md-6 col-xs-12">                                            
            <div class="input-group">
              <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
              <input type="text" class="form-control" name="haber_tanitim" value="<?php echo $habercek["haber_tanitim"];?>" />
            </div>                                            
          </div>
        </div>
        <div class="form-group">
         <label class="col-md-3 col-xs-12 control-label">Haber Detay</label>
         <div class="col-md-6 col-xs-12">                                            
           <div class="input-group">
             <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
             <textarea id="editor1" class="ckeditor" name="haber_detay"><?php echo $habercek['haber_detay'];?></textarea>
           </div>                                            
         </div>
       </div>
       <script type="text/javascript">
        CKEDITOR.replace('editor1',
        {
         filebrowserBrowseUrl:'assets/ckfinder/ckfinder.html',
         filebrowserImageBrowseUrl:'assets/ckfinder/ckfinder.html?type=Images',
         filebrowserFlashBrowseUrl:'assets/ckfinder/ckfinder.html?type=Flash',
         filebrowserUploadUrl:'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
         filebrowserImageUploadUrl:'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
         filebrowserFlashUploadUrl:'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
         forcePasteAsPlainText:true
       });
     </script>  
     <div class="form-group">
      <label class="col-md-3 col-xs-12 control-label">Haber Resim</label>
      <div class="col-md-6 col-xs-12">                                                                                          
        <input type="file" class="fileinput btn-primary" name="haber_resimyol" title="Resim ara"/>
      </div>
    </div>   
    <div class="form-group">
      <label class="col-md-3 col-xs-12 control-label">Aktif / Pasif</label>
      <div class="col-md-6 col-xs-12">                                                                                                                    
        <input type="checkbox" class="icheckbox" name="haber_durum"  <?php  if($habercek['haber_durum']==true) {  echo "checked";}?> /> 
      </div>
    </div>                                                                             
    <div class="panel-footer">   
     <button type="submit" name="haber-guncelle" class="btn btn-primary pull-right">Güncelle</button>
   </div>
 </div>
</form>
</div>
</div>                    
</div>
<!-- END PAGE CONTENT WRAPPER -->                                                
</div>   
</div>      
</div>      
<!-- END PAGE CONTENT -->
<?php include "footer.php" ?>