<?php include "header.php";
if(isset($_POST["arama"]))
{
  $aranan=$_POST["aranan"];
  $kategorisor=$db->query("SELECT * FROM kategori WHERE kategori_ad LIKE '%$aranan%' ORDER BY kategori_sira ASC LIMIT 25");
  $kategoricek=$kategorisor->fetchAll(PDO::FETCH_ASSOC); 
}
else
{
  $kategorisor=$db->query('SELECT * FROM kategori ORDER BY kategori_sira ASC LIMIT 25');
  $kategoricek=$kategorisor->fetchAll(PDO::FETCH_ASSOC);  
}
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
    <!-- SEARCH -->
    <li class="xn-search">
      <form action="" method="post">
        <input type="text" name="aranan" placeholder="Ara..."/>
        <input style="display: none;" type="submit" name="arama" />
      </form>
    </li>   
    <!-- END SEARCH -->
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
      <li class="active">Kategori</li>
    </ul> 
    <div class="row">
      <div class="col-md-12">
        <div class="form-horizontal">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>Kategori İşlemleri</strong><small style="margin-left: 5px;"><?php 
                if(@$_GET['durum']=='true')
                 { ?> <b style="color:Green;">İşlem Başarılı...</b>
               <?php } 
               else if(@$_GET['durum']=='false'){ ?>
               <b style="color:Red;">İşlem Başarısız...</b> <?php
             } else{}?>
           </small> </h3>
           <a href="kategori-ekle.php"><button class="btn btn-primary pull-right">Yeni Ekle</button></a>
         </div>
         <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-actions">
              <thead>
                <tr>
                  <th>Kategori Id</th>
                  <th>Kategori Ad</th>
                  <th>Kategori Sıra</th>
                  <th width="200px"></th>
                </tr>
              </thead>
              <tbody>    
                <?php
                foreach ($kategoricek as $value) {?>
                <tr>
                  <td><?php echo $value["kategori_id"];?></td>
                  <td><?php echo $value["kategori_ad"];?></td>
                  <td><?php echo $value["kategori_sira"];?></td>
                  <td>
                    <a href="kategori-duzenle.php?kategori_id=<?php echo $value["kategori_id"];?>"><button class="btn btn-default btn-rounded btn-sm"><span style="margin-right:5px;" class="fa fa-pencil"></span>Düzenle</button>
                    </a>
                    <a href="netting/islemler.php?kategorisil=ok&kategori_id=<?php echo $value["kategori_id"];?>"> <button class="btn btn-danger btn-rounded btn-sm""><span style="margin-right:5px;" class="fa fa-times"></span>Sil</button></a>
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