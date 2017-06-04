  <!-- START PAGE SIDEBAR -->
  <div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="index.php">ANTALYA</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="../<?php echo $kullanici['kullanici_profilresmi'];?>" alt="John Doe"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="../<?php echo $kullanici['kullanici_profilresmi'];?>" alt="John Doe"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?php echo $kullanici['kullanici_adsoyad'];?></div>
                    <div class="profile-data-title"><?php echo $kullanici['kullanici_yetki'];?></div>
                </div>
                <div class="profile-controls">
                    <a href="kullanici-profil.php" class="profile-control-left"><span class="fa fa-info"></span></a>
                </div>
            </div>                                                                        
        </li>
        <li class="xn-title">Yönlendirmeler</li>                    
        <li>
            <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Anasayfa</span></a>
        </li>
        <li>
            <a href="hakkimizda.php"><span class="fa fa-info"></span> <span class="xn-text">Hakkımızda</span></a>
        </li>
         <li>
            <a href="kullanici.php"><span class="fa fa-user"></span> <span class="xn-text">Kullanıcılar</span></a>
        </li>
        <li>
            <a href="yorum.php"><span class="fa fa-comment"></span> <span class="xn-text">Yorum İşlemleri</span></a>
        </li>
        <li>
        <a href="mesaj.php"><span class="fa fa-envelope-o"></span> <span class="xn-text">Mesaj İşlemleri</span></a>
        </li>
        <li>
            <a href="kategori.php"><span class="fa fa-list"></span> <span class="xn-text">Kategori İşlemleri</span></a>
        </li>
        <li>
            <a href="haber.php"><span class="fa fa-file-text"></span> <span class="xn-text">Haber İşlemleri</span></a>
        </li>
        <li>
            <a href="duyuru.php"><span class="fa fa-bullhorn"></span> <span class="xn-text">Duyuru İşlemleri</span></a>
        </li>
        <li>
            <a href="galeri.php"><span class="fa fa-image"></span> <span class="xn-text">Galeri İşlemleri</span></a>
        </li>
        <li>
            <a href="slider.php"><span class="fa fa-image"></span> <span class="xn-text">Slider İşlemleri</span></a>
        </li>
        <li>
            <a href="menu.php"><span class="fa fa-list"></span> <span class="xn-text">Menü İşlemleri</span></a>
        </li>

        <li class="xn-openable">
            <a href="#"><span class="fa fa-cog"></span> <span class="xn-text">Ayarlar</span></a>
            <ul>        
                <li><a href="genel-ayar.php">Genel Ayarlar</a></li>   
                <li><a href="iletisim-ayar.php">İletişim Ayarları</a></li>  
                <li><a href="sosyalmedya-ayar.php">Sosyal Medya Ayarları</a></li>  
            </ul>
        </li>   
        <!-- END X-NAVIGATION -->
    </div>
            <!-- END PAGE SIDEBAR -->