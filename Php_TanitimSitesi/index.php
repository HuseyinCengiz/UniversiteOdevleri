<?php include "header.php"; ?>
<?php include "slider.php"; ?>
<?php include "galeri.php"; ?>
<section class="recent-blog-wrap">
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="recent-blog">
                <div class="row">
                    <div class="col-sm-8">
                     <div style="margin-bottom: 25px;" class="row">
                        <div class="col-sm-9">
                            <h2>Son Haberler</h2>
                        </div>
                        <div class="col-sm-3">
                            <a class="btn btn-default btn-alternate pull-right" href="haberler.php">Tüm Haberler</a>
                        </div>
                    </div>
                    <div class="row">
                     <?php 
                     $habersor=$db->query('SELECT * FROM haber ORDER BY haber_id DESC LIMIT 2');
                     $habercek=$habersor->fetchAll(PDO::FETCH_ASSOC);        
                     foreach ($habercek as $value) { ?>
                     <div class="col-sm-6">
                        <article class="left-article">
                            <h3><?php echo $value["haber_ad"]; ?></h3>
                            <ul class="info">
                                <li>{ <a href="#"> <?php echo $value["haber_ad"]; ?></a> }</li>
                                <li>{ <a href="#"><?php echo $value["haber_zaman"]; ?></a> }</li>
                            </ul>
                            <figure>
                                <a href="haber-detay.php?haber_id=<?php echo $value["haber_id"];?>">
                                    <img width="100px;" height="100px;" src="<?php echo $value["haber_resimyol"]; ?>" alt="<?php echo $value["haber_ad"]; ?>"/>
                                </a>
                            </figure>
                            <div class="text">
                             <p> <?php echo substr($value["haber_tanitim"],0,100)."...";?></p>
                         </div>
                         <a class="btn btn-default" href="haber-detay.php?haber_id=<?php echo $value["haber_id"];?>">Devamını Oku</a>
                     </article>
                 </div>
                 <?php } ?>
             </div>
         </div>
         <div class="col-sm-4">
             <div class="widgets">
                <div class="widget posts">
                    <h5>Duyurular</h5>
                    <div class="widget-tabs">
                        <div class="tab-content">
                            <div class="tab-pane active" >
                                <ul>
                                    <?php 
                                    $duyurusor=$db->query('SELECT * FROM duyuru ORDER BY duyuru_id DESC LIMIT 5');
                                    $duyurucek=$duyurusor->fetchAll(PDO::FETCH_ASSOC);        
                                    foreach ($duyurucek as $value) { ?>
                                    <li>
                                        <figure>
                                            <a href="#">
                                          <img  width="50px" height="50px" src="<?php echo $value["duyuru_resimyol"];?>" alt="Duyuru"/>
                                           </a>
                                       </figure>
                                       <div class="text">
                                        <p><?php echo $value["duyuru_bilgi"];?></p>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>
<?php include "footer.php"; ?>