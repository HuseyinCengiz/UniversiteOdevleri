        <?php
        $galerisor=$db->query('SELECT * FROM galeri ORDER BY galeri_id DESC LIMIT 25');
        $galericek=$galerisor->fetchAll(PDO::FETCH_ASSOC);        
         ?>
        <section class="quote-wrap quote-wrap-two">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Galeri</h2>
                        <div class="text"><?php echo $siteayarcek["site_galeri"];?> </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="portfolio-wrap homepage-portfolio-two">
            <div class="hp-portfolio-two">
             <?php foreach ($galericek as $value) { 
               $genislik=array('width1','width2');
               $yukseklik=array('height1','height2');
               $genis=$genislik[rand(0,1)];
               $yuksek=$yukseklik[rand(0,1)];
                ?>
             <article class="<?php echo $genis." ".$yuksek;?>">
             <div class="inner" style="background-image: url('<?php echo $value["galeri_resimyol"];?>');">
                    <a href="">
                        <span class="overlay"></span><span class="big"><?php echo $value["galeri_bilgi"];?></span>
                    </a>
                </div>
            </article>
            <?php } ?>
        </div>
    </section>