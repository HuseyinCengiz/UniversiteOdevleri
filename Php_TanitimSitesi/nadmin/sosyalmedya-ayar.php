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
            <li class="active">Sosyal Medya</li>
        </ul> 
        <div class="row">
            <div class="col-md-12">
             
                <div class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Sosyal Medya Ayarları</strong></h3>
                        </div>                                                                    
                        <form action="netting/islemler.php" method="post"> 
                            <div class="panel-body">                                                                        
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Facebook</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-facebook"></span></span>
                                            <input type="text" class="form-control" name="site_facebook" value="<?php echo $ayarcek["site_facebook"] ?>"/>
                                        </div>                                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Twitter</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-twitter"></span></span>
                                            <input type="text" class="form-control" name="site_twitter" value="<?php echo $ayarcek["site_twitter"] ?>" />
                                        </div>                                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Youtube</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-youtube"></span></span>
                                            <input type="text" class="form-control" name="site_youtube" value="<?php echo $ayarcek["site_youtube"] ?>"/>
                                        </div>                                            
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Google</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-google"></span></span>
                                            <input type="text" class="form-control" name="site_google" value="<?php echo $ayarcek["site_google"] ?>"/>
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
                                   <div class="col-md-2"> <button type="submit" name="sosyalmedyaayar-kaydet" class="btn btn-primary pull-right">Güncelle</button> </div>
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





