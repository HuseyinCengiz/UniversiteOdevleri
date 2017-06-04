<footer class="main-footer">
    <div class="footer-social">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <ul class="social-icons">
                        <li><a href="<?php echo $siteayarcek["site_facebook"];?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo $siteayarcek["site_twitter"];?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?php echo $siteayarcek["site_google"];?>"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="<?php echo $siteayarcek["site_youtube"];?>"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="footer-widget">
                        <a href="#" class="footer-logo"><img src="<?php echo $siteayarcek["site_logo"];?>" alt="Logo"/></a>
                        <div class="copyright">© 2017 Antalya Tanıtım <br />Sakarya Üniversitesi Mühendisleri Tarafından Geliştirildi.</div>
                        <div class="motto">Antalya'ya Gel Yazın Tadını Çıkar</div>
                        <address>
                           <?php echo $siteayarcek["site_adres"];?><br/>
                           <?php echo $siteayarcek["site_ilce"];?> / <?php echo $siteayarcek["site_il"];?>
                       </address>
                   </div>
               </div>
               <div class="col-sm-4">
                <div class="footer-widget">
                    <h2>Popüler Haberler</h2>
                    <ul class="popular-post">
                        <?php 
                        $habersor=$db->query('SELECT * FROM haber ORDER BY haber_goruntulenme DESC LIMIT 3');
                        $habercek=$habersor->fetchAll(PDO::FETCH_ASSOC);        
                        foreach ($habercek as $value) { ?>
                        <li>
                            <figure>
                                <a href="haber-detay.php?haber_id=<?php echo $value["haber_id"];?>">
                                    <img width="75px" height="75px" src="<?php echo $value["haber_resimyol"];?>" alt="<?php echo $value["haber_ad"];?>"/>
                                </a>
                            </figure>
                            <div class="text">
                                <a href="haber-detay.php?haber_id=<?php echo $value["haber_id"];?>"><?php echo $value["haber_ad"];?></a>
                            </div>
                        </li> 
                        <?php } ?> 
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer-widget">
                    <h2>Hakkımızda</h2>
                    <div class="text-widget">
                        <?php 
                        $hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=?");
                        $hakkimizdasor->execute(array(0));
                        $hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
                        echo substr($hakkimizdacek["hakkimizda_icerik"],200,600);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<div class="go-top">
    <i class="fa fa-angle-up"></i>
</div>
<script src="js/vendor/jquery-1.10.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/jquery.isotope.min.js"></script>
<script src="js/vendor/jquery.isotope.perfectmasonry.js"></script>
<script src="js/vendor/jquery.raty.min.js"></script>
<script src="js/vendor/jquery.flexslider.js"></script>
<script src="js/vendor/jquery.mousewheel.js"></script>
<script src="js/vendor/jquery.mCustomScrollbar.js"></script>
<script src="js/vendor/jquery.hoverdir.js"></script>
<script src="js/vendor/jquery.selectBoxIt.min.js"></script>
<script src="js/vendor/jquery.fancybox.pack.js"></script>
<script src="js/main.js"></script>
</body>
</html>
