<?php include "header.php";?>
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
      <li class="active">Ekle</li>
    </ul> 
    <div class="row">
      <div class="col-md-12">
        <div class="form-horizontal">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>Galeri Ekleme</strong></h3>
            </div>
            <form action="netting/islemler.php" enctype="multipart/form-data" method="post"> 
              <div class="panel-body">    
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Galeri Bilgi</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" class="form-control" name="galeri_bilgi" />
                    </div>                                            
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Galeri Resim</label>
                  <div class="col-md-6 col-xs-12">                                                                                          
                    <input type="file" class="fileinput btn-primary" name="galeri_resimyol" title="Resim ara"/>
                  </div>
                </div>   
              </div>                                                                                 
              <div class="panel-footer">   
               <button type="submit" name="galeri-ekle" class="btn btn-primary pull-right">Ekle</button>
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