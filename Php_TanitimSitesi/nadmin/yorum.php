<?php include "header.php";
$yorumsor=$db->query('SELECT * FROM yorum ORDER BY yorum_id ASC,yorum_onay DESC LIMIT 25');
$yorumcek=$yorumsor->fetchAll(PDO::FETCH_ASSOC);  
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
      <li class="active">Yorum</li>
    </ul> 
    <div class="row">
      <div class="col-md-12">
        <div class="form-horizontal">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>Yorum İşlemleri</strong><small style="margin-left: 5px;"><?php 
              if(@$_GET['islem']=='true')
                 { ?> <b style="color:Green;">İşlem Başarılı...</b>
               <?php } 
               else if(@$_GET['islem']=='false')
                 { ?> <b style="color:Red;">İşlem Başarısız...</b>
               <?php
             } else{}?>
           </small> </h3>
         </div>
         <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-actions">
              <thead>
                <tr>
                  <th>Yorum Id</th>
                  <th>Yorum İçerik</th>
                  <th>Kullanıcı</th>
                  <th>Haber Id</th>
                  <th>Yorum Onay</th>
                  <th width="200px"></th>
                </tr>
              </thead>
              <tbody>    
                <?php
                foreach ($yorumcek as $value) {?>
                <tr>
                  <td><?php echo $value["yorum_id"];?></td>
                  <td><?php echo $value["yorum_icerik"];?></td>
                  <td><?php 
                    if($value["kullanici_id"]==0)
                    {
                      echo "Ziyaretçi";
                    }
                    else
                    {
                      echo "Üye";
                    }
                    ?>
                  </td>
                  <td><?php echo $value["haber_id"];?></td>
                  <td> <?php if($value["yorum_onay"]==true) { echo "Aktif";} else {echo "Pasif";}?></td>
                  <td>
                    <a href="netting/islemler.php?yorumaktif=ok&yorum_id=<?php echo $value["yorum_id"];?>"><button class="btn btn-default btn-rounded btn-sm"><span style="margin-right:5px;" class="fa fa-check"></span>Onayla</button>
                    </a>
                    <a href="netting/islemler.php?yorumsil=ok&yorum_id=<?php echo $value["yorum_id"];?>"> <button class="btn btn-danger btn-rounded btn-sm""><span style="margin-right:5px;" class="fa fa-times"></span>Sil</button></a>
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