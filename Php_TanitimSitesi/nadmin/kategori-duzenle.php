<?php include "header.php";
$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id=:id");
$kategorisor->execute(array("id"=>$_GET["kategori_id"]));
$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
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
              <h3 class="panel-title"><strong>Kategori Düzenle</strong><small style="margin-left: 5px;"><?php 
                if(@$_GET['durum']=='true')
                 { ?> <b style="color:Green;">İşlem Başarılı...</b>
               <?php } 
               else if(@$_GET['durum']=='false')
                 { ?> <b style="color:Red;">İşlem Başarısız...</b>
             <?php
             } else{}?>
           </small> </h3>
           <a href="kategori.php"><button class="btn btn-warning pull-right">Geri Dön</button></a>
         </div>
         <form action="netting/islemler.php" enctype="multipart/form-data" method="post">
          <input type="hidden" name="kategori_id" value="<?php echo $kategoricek['kategori_id'];?>">
          <div class="panel-body">  
         <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Kategori Ad</label>
          <div class="col-md-6 col-xs-12">                                            
            <div class="input-group">
              <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
              <input type="text" class="form-control" name="kategori_ad" value="<?php echo $kategoricek['kategori_ad'];?>" />
            </div>                                            
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Kategori Sıra</label>
          <div class="col-md-6 col-xs-12">                                            
            <div class="input-group">
              <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
              <input type="text" class="form-control" name="kategori_sira" value="<?php echo $kategoricek['kategori_sira'];?>" />
            </div>                                            
          </div>
        </div>
      </div>                                                                                 
      <div class="panel-footer">   
       <button type="submit" name="kategori-duzenle" class="btn btn-primary pull-right">Güncelle</button>
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