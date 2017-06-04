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
        <!-- START WIDGETS -->                    
        <div class="row">
            <div class="col-md-6">      
                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-default widget-item-icon" onclick="location.href='mesaj.php';">
                    <div class="widget-item-left">
                        <span class="fa fa-envelope"></span>
                    </div>                             
                    <div class="widget-data">
                        <?php
                        $mesaj=$db->query('SELECT mesaj_id FROM mesaj');
                        $mesajsayisi=$mesaj->rowCount();
                        ?>
                        <div class="widget-int num-count"><?php echo $mesajsayisi ?></div>
                        <div class="widget-title">Yeni Mesaj</div>
                        <div class="widget-subtitle">Gelen Kutusu</div>
                    </div>      
                    <div class="widget-controls">                                
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>                            
                <!-- END WIDGET MESSAGES -->  
            </div>
            <div class="col-md-6">
                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-default widget-item-icon">
                    <div class="widget-item-left">
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="widget-data">
                        <?php
                        $kullanici=$db->query('SELECT kullanici_id FROM kullanici');
                        $kullanicisayisi=$kullanici->rowCount();
                        ?>
                        <div class="widget-int num-count"><?php echo $kullanicisayisi ?></div>
                        <div class="widget-title">Kayıtlı Üye</div>
                    </div>
                    <div class="widget-controls">                                
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>                            
                </div>                            
                <!-- END WIDGET REGISTRED -->
            </div>
        </div>
        <!-- END WIDGETS -->   
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Anasayfa</strong></h3>
                        </div>
                        <div class="panel-body">                                                                        
                            <p>Sitenizi Sol Taraftaki Menü Yardımıyla Düzenleyebilirsiniz.</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>                    
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                                                
</div>            
<!-- END PAGE CONTENT -->
<?php include "footer.php" ?>





