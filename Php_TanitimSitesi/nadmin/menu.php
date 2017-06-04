<?php include "header.php";
if(isset($_POST["arama"]))
{
  $aranan=$_POST['aranan'];
  $menusor=$db->query("SELECT * FROM menu WHERE menu_ad LIKE '%$aranan%' ORDER BY menu_id DESC LIMIT 25");
  $menucek=$menusor->fetchAll(PDO::FETCH_ASSOC);
  $verisayisi=$menusor->rowCount(); 
}
else{
 $menusor=$db->prepare('SELECT * FROM menu WHERE  menu_ust=:menuust ORDER BY menu_sira ASC LIMIT 25');
 $menusor->execute(array("menuust"=>'0'));
 $menucek=$menusor->fetchAll(PDO::FETCH_ASSOC);  
 $verisayisi=$menusor->rowCount(); 
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
      <li class="active">Menü</li>
    </ul> 
    <div class="row">
      <div class="col-md-12">
        <div class="form-horizontal">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>Menü İşlemleri</strong><small style="margin-left: 5px;"><?php 
              echo $verisayisi." Menü Listelendi";?>
              <?php 
                if(@$_GET['durum']=='true')
                 { ?> <b style="color:Green;">İşlem Başarılı...</b>
               <?php } 
               else if(@$_GET['durum']=='false')
                 { ?> <b style="color:Red;">İşlem Başarısız...</b>
               <?php
             } else{}?>
           </small> </h3></h3>
           <a href="menu-ekle.php"><button class="btn btn-primary pull-right">Yeni Ekle</button></a>
         </div>
         <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-actions">
              <thead>
                <tr>
                  <th width="200px;">Menü Ad</th>
                  <th>Üst Menü</th>
                  <th>Menü Sıra</th>
                  <th>Menü Durum</th>
                  <th width="200px"></th>
                </tr>
              </thead>
              <tbody>    
                <?php
                foreach ($menucek as $value){
                  $menu_id=$value["menu_id"]; ?>
                <tr>
                  <td><?php echo $value["menu_ad"];?></td>
                  <td><?php echo $value["menu_ust"];?></td>
                  <td><?php echo $value["menu_sira"];?></td>
                  <td> <?php if($value["menu_durum"]==true) { echo "Aktif";} else {echo "Pasif";}?></td>
                  <td>
                    <a href="menu-duzenle.php?menu_id=<?php echo $value["menu_id"];?>"><button class="btn btn-default btn-rounded btn-sm"><span style="margin-right:5px;" class="fa fa-pencil"></span>Düzenle</button>
                    </a>
                    <a href="netting/islemler.php?menusil=ok&menu_id=<?php echo $value["menu_id"];?>"> <button class="btn btn-danger btn-rounded btn-sm""><span style="margin-right:5px;" class="fa fa-times"></span>Sil</button></a>
                  </td>
                </tr>
                <?php 
                $altmenusor=$db->prepare("SELECT * FROM menu where menu_ust=:menuid");
                $altmenusor->execute(array('menuid'=>$menu_id));
                $cekaltmenu=$altmenusor->fetchAll(PDO::FETCH_ASSOC);
                foreach ($cekaltmenu as $item) {?>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item["menu_ad"];?></td>
                  <td><?php echo $item["menu_ust"];?></td>
                  <td><?php echo $item["menu_sira"];?></td>
                  <td> <?php if($item["menu_durum"]==true) { echo "Aktif";} else {echo "Pasif";}?></td>
                  <td>
                    <a href="menu-duzenle.php?menu_id=<?php echo $item["menu_id"];?>"><button class="btn btn-default btn-rounded btn-sm"><span style="margin-right:5px;" class="fa fa-pencil"></span>Düzenle</button>
                    </a>
                    <a href="netting/islemler.php?menusil=ok&menu_id=<?php echo $item["menu_id"];?>"> <button class="btn btn-danger btn-rounded btn-sm""><span style="margin-right:5px;" class="fa fa-times"></span>Sil</button></a>
                  </td>
                </tr>
              <?php }?>
                  <?php }
                  ?>
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