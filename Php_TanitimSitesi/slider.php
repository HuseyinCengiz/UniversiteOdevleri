        <div class="homepage-slider hidden-xs">
            <div class="slider-controls">
                <button class="left"><i class="fa fa-angle-left"></i></button>
                <button class="right"><i class="fa fa-angle-right"></i></button>
            </div>
            <ul class="slides">
         <?php
                $slidersor=$db->query('SELECT * FROM slider ORDER BY slider_id DESC LIMIT 4');
                $slidercek=$slidersor->fetchAll(PDO::FETCH_ASSOC);        
                    foreach ($slidercek as $value) { ?>
                      <li style="background-image: url('<?php echo $value["slider_resimyol"]; ?>')">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-1">
                                <div class="slider-text no-border">
                                    <div class="details">
                                        <a href="#" class="category">{ <?php echo $value["slider_ad"]; ?> }</a>
                                        <p><?php echo $value["slider_aciklama"]; ?></p>
                                        <a href="<?php echo $value["slider_link"]; ?>" class="btn btn-default">DETAYLAR</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                   <?php } ?>
            </ul>
        </div>