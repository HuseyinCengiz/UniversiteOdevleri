<?php include "header.php";
  $duyurusor=$db->query('SELECT * FROM duyuru LIMIT 25');
  $duyurucek=$duyurusor->fetchAll(PDO::FETCH_ASSOC);  
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
      <li class="active">Duyuru</li>
    </ul> 
    <div class="row">
      <div class="col-md-12">
        <div class="form-horizontal">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>Duyuru İşlemleri</strong><small style="margin-left: 5px;"><?php 
                if(@$_GET['durum']=='true')
                 { ?> <b style="color:Green;">İşlem Başarılı...</b>
               <?php } 
               else if(@$_GET['durum']=='false')
                 { ?> <b style="color:Red;">İşlem Başarısız...</b>
               <?php } 
               else if(@$_GET['durum']=='tur')
                 { ?> <b style="color:Red;">Sadece "PNG/JPG" Tipinde Ekleyebilirsiniz...</b>
               <?php } 
               else if(@$_GET['durum']=='boyut')
                 { ?> <b style="color:Red;">Dosya Boyutu Çok Fazla...</b>
               <?php } 
               else if(@$_GET['durum']=='tasima')
                 { ?> <b style="color:Red;">Taşıma Başarısız...</b>
               <?php } 
               else if(@$_GET['durum']=='gecici'){ ?>
               <b style="color:Red;">Yükleme İşlemi Başarısız...</b> <?php
             } else{}?>
           </small> </h3>
           <a href="duyuru-ekle.php"><button class="btn btn-primary pull-right">Yeni Ekle</button></a>
         </div>
         <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-actions">
              <thead>
                <tr>
                  <th width="200px">Duyuru Resim</th>
                  <th>Duyuru Bilgi</th>
                  <th width="200px"></th>
                </tr>
              </thead>
              <tbody>    
                <?php
                foreach ($duyurucek as $value) {?>
                <tr>
                  <td><img width="200px" height="100px" src="<?php echo '../'.$value["duyuru_resimyol"] ?>" /> </td>
                  <td><?php echo $value["duyuru_bilgi"];?></td>
                  <td>
                    <a href="netting/islemler.php?duyurusil=ok&duyuru_id=<?php echo $value["duyuru_id"];?>&resim=<?php echo $value["duyuru_resimyol"] ?>" /> <button class="btn btn-danger btn-rounded btn-sm""><span style="margin-right:5px;" class="fa fa-times"></span>Sil</button></a>
                  </td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>                                
        </div>
      </div>
    </div>
  </div>
</div>                    
</div>
<!-- END PAGE CONTENT WRAPPER -->                                                
</div>            
<!-- END PAGE CONTENT -->
<?php include "footer.php" ?>