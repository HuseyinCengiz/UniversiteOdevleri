<?php include "header.php"; ?>
<?php 
$habersor=$db->prepare("SELECT * FROM haber where haber_id=:id");
$habersor->execute(array("id"=>$_GET["haber_id"]));
$habercek=$habersor->fetch(PDO::FETCH_ASSOC);
#Goruntulenme arttırma
$goruntulenme=$habercek["haber_goruntulenme"];
$goruntulenme+=1;
$habergoruntusor=$db->prepare("UPDATE haber SET haber_goruntulenme=? where haber_id=?");
$habergoruntusor->execute(array($goruntulenme,$_GET["haber_id"]));
?>
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><?php echo $habercek["haber_ad"];?></h1>
            </div>
        </div>
    </div>
</section>
<section class="main-container">
    <div class="container">
        <div class="row">

            <div class="col-sm-8">
                <div class="posts">
                    <article class="blog-post">
                        <header>
                            <h2>
                                <a href="#"><?php echo $habercek["haber_tanitim"];?></a>
                            </h2>
                            <ul class="info">
                                <?php
                                $kategoriid=$habercek["kategori_id"];
                                $kategorisor=$db->prepare('SELECT * FROM kategori where kategori_id=? ORDER BY kategori_sira');
                                $kategorisor->execute(array($kategoriid));
                                $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC); ?>
                                <li><a href="#">{ <?php echo $kategoricek["kategori_ad"];?> }</a></li>
                                <li><a href="#">{ <?php echo $habercek["haber_zaman"];?> }</a></li> 
                            </ul>
                        </header>
                        <div class="text-editor">
                            <?php echo $habercek["haber_detay"];?>
                        </div>
                    </article>

                    <!--Yorum Ekleme-->
                    <div class="comments">
                        <?php 
                        $yorumsor=$db->prepare('SELECT * FROM yorum where haber_id=? and yorum_onay=1 ORDER BY yorum_id DESC LIMIT 25');
                        $yorumsor->execute(array($habercek["haber_id"]));
                        $yorumsayisi=$yorumsor->rowCount();
                        $yorumcek=$yorumsor->fetchAll(PDO::FETCH_ASSOC); ?>
                        <h3>
                            <?php echo $yorumsayisi." Yorum"; ?>
                        </h3> 
                        <ul> 
                            <?php foreach ($yorumcek as  $value) { 
                                if($value["kullanici_id"]==0)
                                    { ?>
                                <li class="comment">
                                    <div class="user">
                                        <figure>
                                            <a href="#">
                                                <img src="myimg/Kullanici/no-photo-user.png" alt="Ziyaretçi"/>
                                            </a>
                                        </figure>
                                        <div class="name text-center">
                                            <a href="#">Ziyaretçi</a>
                                        </div>
                                    </div>
                                    <div class="comment-box highlighted">
                                        <div class="info">
                                            <div class="time-ago"><?php echo $value["yorum_eklenmetarihi"]; ?></div>
                                            <div class="comment-author">
                                                <a href="#">
                                                    { Ziyaretçi }
                                                </a>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <?php echo $value["yorum_icerik"]; ?>
                                        </div>
                                    </div>
                                </li>
                                <?php } else {
                                 $id=$value["kullanici_id"];
                                 $kullanicisor2=$db->prepare("SELECT * FROM kullanici WHERE kullanici_id=:id");
                                 $kullanicisor2->execute(array("id"=>$id));
                                 $kullanici2=$kullanicisor2->fetch(PDO::FETCH_ASSOC);
                                 ?>
                                 <li class="comment">
                                    <div class="user">
                                        <figure>
                                            <a href="#">
                                                <img src="<?php echo $kullanici2["kullanici_profilresmi"];?>" alt="<?php echo $kullanici2["kullanici_yetki"];?>"/>
                                            </a>
                                        </figure>
                                        <div class="name text-center">
                                            <a href="#"><?php echo $kullanici2["kullanici_adsoyad"];?></a>
                                        </div>
                                    </div>
                                    <div class="comment-box highlighted">
                                        <div class="info">
                                            <div class="time-ago"><?php echo $value["yorum_eklenmetarihi"]; ?></div>
                                            <div class="comment-author">
                                                <a href="#">
                                                    { <?php echo $kullanici2["kullanici_yetki"];?> }
                                                </a>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <?php echo $value["yorum_icerik"]; ?>
                                        </div>
                                    </div>
                                </li>
                                <?php   } ?>
                                <?php   } ?>
                            </ul>
                        </div>
                        <!--Yorum Ekleme-->
                        <div class="write-comment">
                            <h3>Yorum Yaz</h3>
                            <div class="user">
                                <?php if(isset($_SESSION["kullanici_id"])){ ?>
                                <figure>
                                    <a href="#">
                                        <img src="<?php echo $kullanici['kullanici_profilresmi'];?>" alt="<?php echo $kullanici['kullanici_adsoyad'];?>"/>
                                    </a>
                                </figure>
                                <div class="name text-center">
                                    <a href="#"><?php echo $kullanici['kullanici_adsoyad'];?></a>
                                </div>
                                <?php } else {?>
                                <figure>
                                    <a href="#">
                                        <img src="myimg/Kullanici/no-photo-user.png" alt="Ziyaretçi"/>
                                    </a>
                                </figure>
                                <div class="name text-center">
                                    <a href="#">Ziyaretçi</a>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="textarea-wrap">
                                <form  action="nadmin/netting/islemler.php" method="post">
                                    <input type="hidden" name="kullanici_id" value="<?php echo $kullanici["kullanici_id"];?>"/>
                                    <input type="hidden" name="haber_id" value="<?php echo $habercek["haber_id"];?>"/>
                                    <textarea placeholder="Akıllıca yorum yapınız..." name="yorum_icerik"></textarea>
                                    <button type="submit" name="yorum-ekle" class="send">Gönder</button>
                                </form>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>

                
                <aside class="col-sm-4">
                    <div class="widgets">
                        <div class="widget categories">
                            <h5>Kategoriler</h5>
                            <ul>
                                <?php $kategorisor=$db->query('SELECT * FROM kategori ORDER BY kategori_sira');
                                $kategoricek=$kategorisor->fetchAll(PDO::FETCH_ASSOC); 
                                foreach ($kategoricek as $value) 
                                    { ?>
                                <li><a href="haberler.php?kategori_id=<?php echo $value["kategori_id"];?>"><?php echo $value["kategori_ad"];?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="widget posts">
                            <div class="widget-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#popular" data-toggle="tab">Son Eklenenler</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="popular">
                                        <ul>
                                            <?php 
                                            $habersor=$db->query('SELECT * FROM haber ORDER BY haber_id DESC LIMIT 5');
                                            $habercek=$habersor->fetchAll(PDO::FETCH_ASSOC);        
                                            foreach ($habercek as $value) { 
                                               $kategoriid=$value["kategori_id"];
                                               $kategorisor=$db->prepare('SELECT * FROM kategori where kategori_id=? ORDER BY kategori_sira');
                                               $kategorisor->execute(array($kategoriid));
                                               $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC); 
                                               ?>
                                               <li>
                                                <figure>
                                                    <a href="#">
                                                        <img  width="50px" height="50px" src="<?php echo $value["haber_resimyol"];?>" alt="<?php echo $value["haber_ad"];?>"/>
                                                    </a>
                                                </figure>
                                                <div class="text">
                                                    <a href="#"><?php echo $value["haber_ad"];?> </a>
                                                    <a href="#" class="category">{ <?php echo $kategoricek["kategori_ad"];?> }</a>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <?php include "footer.php"; ?>