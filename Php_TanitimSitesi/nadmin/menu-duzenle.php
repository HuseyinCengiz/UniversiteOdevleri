<?php include "header.php";
$menusor=$db->prepare("SELECT * FROM menu where menu_id=:id");
$menusor->execute(array("id"=>$_GET["menu_id"]));
$menucek=$menusor->fetch(PDO::FETCH_ASSOC);
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
              <h3 class="panel-title"><strong>Menü Düzenleme</strong></h3>
            </div>
            <form action="netting/islemler.php" method="post"> 
              <div class="panel-body">    
              <input type="hidden" name="menu_id" value="<?php echo $menucek["menu_id"]; ?>" />
               <div class="form-group">
                   <label class="col-md-3 col-xs-12 control-label">Üst Menü</label>
                   <div class="col-md-6 col-xs-12">                                                                                
                       <select class="form-control select" name="menu_ust">
                           <option value="0">Üst Menü</option>
                        <?php
                        $selectmenusor=$db->prepare('SELECT * FROM menu WHERE menu_ust=:menuust ORDER BY menu_ad');
                        $selectmenusor->execute(array('menuust'=>'0'));
                        $selectmenucek=$selectmenusor->fetchAll(PDO::FETCH_ASSOC); 
                            foreach ($selectmenucek as $value) 
                                { ?>
                                <option value="<?php echo $value["menu_id"]; ?>"> <?php echo $value["menu_ad"];?></option>

                           <?php }
                        ?>
                       </select>
                   </div>
               </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Menü Ad</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" class="form-control" name="menu_ad" value="<?php echo $menucek["menu_ad"]; ?>" />
                    </div>                                            
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Menü İkon</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" class="form-control" name="menu_ikon" value="<?php echo $menucek["menu_ikon"]; ?>"  />
                    </div>                                            
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Menü URL</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" class="form-control" name="menu_url" value="<?php echo $menucek["menu_url"]; ?>"  />
                    </div>                                            
                  </div>
                </div>
                 <div class="form-group">
                     <label class="col-md-3 col-xs-12 control-label">Menü Detay</label>
                         <div class="col-md-6 col-xs-12">                                            
                             <div class="input-group">
                                 <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                 <textarea id="editor1" class="ckeditor" name="menu_detay" value="<?php echo $menucek["menu_detay"]; ?>" ></textarea>
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
                  <label class="col-md-3 col-xs-12 control-label">Aktif / Pasif</label>
                  <div class="col-md-6 col-xs-12">                                                                                            
                    <input type="checkbox" class="icheckbox" name="menu_durum"
                        <?php  
                          if($menucek["menu_durum"]==true)
                          {
                            echo "checked";
                          }
                        ?>
                    /> 
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Menü Sıra</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" class="form-control" name="menu_sira" value="<?php echo $menucek["menu_sira"]; ?>"  />
                    </div>                                            
                  </div>
                </div>
              </div>  
               <div class="panel-footer">   
               <button type="submit" name="menu-duzenle" class="btn btn-primary pull-right">Güncelle</button>
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