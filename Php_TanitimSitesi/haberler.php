<?php include "header.php"; ?>
<section class="portfolio-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="details-selector">
                    <ul>
                        <li><a href="#" data-filter="*">Hepsi</a></li>
                    </ul>
                    <button class="btn btn-default" rel="minimal">Mini</button>
                    <button class="btn btn-default btn-selected" rel="detailed">Detaylı</button>
                </div>
            </div>
            <div class="col-sm-6 text-right">
                <div class="layout-selector">
                    <select name="categories" class="custom-select category-selector">
                        <option value="*">Kategoriler</option>
                         <?php
                        $kategorisor=$db->query('SELECT * FROM kategori ORDER BY kategori_sira');
                        $kategoricek=$kategorisor->fetchAll(PDO::FETCH_ASSOC); 
                            foreach ($kategoricek as $value) 
                                { ?>
                                <option value=".filter-<?php echo $value["kategori_ad"]; ?>"><?php echo $value["kategori_ad"];?></option>
                           <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="hp-portfolio-three">
                <div class="row">
                  <?php
                  if(isset($_GET["kategori_id"]))
                  {
                    $kategoriid=$_GET["kategori_id"];
                    $habersor=$db->prepare('SELECT * FROM haber where kategori_id=? ORDER BY haber_id DESC LIMIT 25');
                    $habersor->execute(array($kategoriid));
                    $habercek=$habersor->fetchAll(PDO::FETCH_ASSOC);
                  } 
                  else
                  {
                    $habersor=$db->query('SELECT * FROM haber ORDER BY haber_id DESC LIMIT 25');
                    $habercek=$habersor->fetchAll(PDO::FETCH_ASSOC);
                  }       
                  foreach ($habercek as $value) { 
                 $kategoriid=$value["kategori_id"];
                     $kategorisor=$db->prepare('SELECT * FROM kategori where kategori_id=? ORDER BY kategori_sira');
                     $kategorisor->execute(array($kategoriid));
                     $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC); 
                ?>      
                  <div class="col-sm-4 article-wrap filter-<?php echo $kategoricek["kategori_ad"];?>">
                    <article>
                        <figure>
                            <a href="<?php echo $value["haber_resimyol"];?>" class="fancybox-link" title="<?php echo $value["haber_ad"];?>">
                                <img src="<?php echo $value["haber_resimyol"];?>" alt="<?php echo $value["haber_ad"];?>"/>
                                <div class="overlay"><i class="typcn typcn-plus"></i></div>
                            </a>
                        </figure>
                        <div class="text">
                            <h4><a href="haber-detay.php?haber_id=<?php echo $value["haber_id"];?>"><?php echo $value["haber_ad"];?></a></h4>
                            <a href="#" class="category">{ <?php echo $kategoricek["kategori_ad"];?> }</a>
                            <p><?php echo substr($value["haber_tanitim"],0,100);?></p>
                            <footer>
                                <a href="#" class="icon-link"><i class="typcn typcn-eye-outline"></i> <?php echo $value["haber_goruntulenme"];?></a>
                            </footer>
                        </div>
                    </article>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</section>
<?php include "footer.php"; ?>