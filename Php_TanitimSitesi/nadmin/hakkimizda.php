<?php include "header.php";
$ayarsor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=?");
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
            <li class="active">Hakkımızda</li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Hakkımızda Düzenleme Sayfası</strong></h3>
                        </div> 
                        <form action="netting/islemler.php" method="post"> 
                            <div class="panel-body">                                                                        
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Başlık</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                            <input type="text" class="form-control" name="hakkimizda_baslik" value="<?php echo $ayarcek["hakkimizda_baslik"] ?>"/>
                                        </div>                                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">İçerik</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <textarea id="editor1" class="ckeditor" name="hakkimizda_icerik"><?php echo $ayarcek["hakkimizda_icerik"] ?></textarea>
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
                               <div class="col-md-2"> <button type="submit" name="hakkimizda-kaydet" class="btn btn-primary pull-right">Güncelle</button> </div>
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





