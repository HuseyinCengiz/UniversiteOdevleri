      <?php include "header.php"; ?>
      <div class="container">
        <div class="row">
          <div class="col-md-2"> </div>
          <div class="col-md-8">
            <h1>Bize Ulaşın</h1>
            <p>Kısa Formu Doldurun Ve En Kısa Zamanda Bizim Sizinle İletişim Kurmamızı Bekleyiniz.</p> <br> 
            <!-- BEGIN DOWNLOAD PANEL -->
            <div class="panel panel-default well">
              <div class="panel-body">
               <form action="nadmin/netting/islemler.php" class="form-horizontal track-event-form bv-form" data-goaltype="”General”" data-formname="”ContactUs”" method="post" id="iletisim_formu" novalidate="novalidate" onsubmit="return false;">
                <div class="form-group">               
                  <div class="col-sm-6">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" class="form-control" id="mad" placeholder="Adınız" name="mesaj_ad" data-bv-field="C_FirstName">
                    </div>
                    <small data-bv-validator="notEmpty" data-bv-validator-for="C_FirstName" class="help-block" style="display: none;">Required</small></div>                
                    <div class="col-sm-6">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="msoyad" placeholder="Soyadınız" name="mesaj_soyad" data-bv-field="C_LastName"></div>
                        <small data-bv-validator="notEmpty" data-bv-validator-for="C_LastName" class="help-block" style="display: none;">Required</small></div>
                      </div>
                      <div class="form-group">               
                        <div class="col-sm-6">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-envelope"></i>
                            </div>
                            <input type="text" class="form-control" id="meposta" placeholder="E-posta" name="mesaj_eposta" data-bv-field="C_EmailAddress">
                          </div>
                          <small data-bv-validator="notEmpty" data-bv-validator-for="C_EmailAddress" class="help-block" style="display: none;">Required</small></div>                
                          <div class="col-sm-6">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-info"></i>
                              </div>
                              <input type="text" class="form-control" id="mkonu" placeholder="Konu" name="mesaj_konu">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-phone"></i>                      
                              </div>
                              <input type="text" class="form-control" id="mtel" placeholder="Telefon" name="mesaj_tel">
                            </div>                                    
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-comment fa-2"></i>                
                              </div>                  
                              <textarea class="form-control" name="mesaj_icerik" id="micerik" rows="5" style="width:99.9%" placeholder="Mesajınızı Buraya Giriniz."></textarea>
                            </div>                                    
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-2">
                          <button id="contacts-submit" type="submit" id="gonder" name="mesaj-ekle" class="btn btn-default btn-info">Gönder</button>
                          </div>
                          <div class="col-sm-10">
                            <p class="uyari"></p>
                            <?php  if(@$_GET["durum"]=='true'){?>
                            <p style="color:green; padding-top: 10px;"> 
                              <?php  echo"Mesajınız Başarıyla Gönderildi.";?> 
                            </p>
                            <?php } else if(@$_GET["durum"]=='false') { ?>
                            <p style="color:red; padding-top: 10px;">
                              <?php   echo"Mesajınız Gönderilemedi."; ?> 
                            </p>
                            <?php }?>
                          </div>
                        </div>
                      </form>
                    </div><!-- end panel-body -->
                  </div><!-- end panel -->
                  <!-- END DOWNLOAD PANEL -->
                </div><!-- end col-md-8 -->
                <div class="col-md-2"> 
                </div>
              </div>
            </div>
            <?php include "footer.php"; ?>
            <script src="js/kontrol.js" type="text/javascript"></script>