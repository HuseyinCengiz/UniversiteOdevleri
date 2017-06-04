  <?php 
  $siteayarsor=$db->prepare("Select * from site_ayar where site_id=?");
  $siteayarsor->execute(array(0));
  $siteayarcek=$siteayarsor->fetch(PDO::FETCH_ASSOC);
  ?>
  <header class="navbar navbar-default hidden-menu hidden-menu-up">
    <div class="container">
      <div class="row">
        <div class="navbar-header col-sm-3">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="menu-title">Menü</span>
            <i class="fa fa-bars"></i>
          </button>
          <ul class="social-icons nav navbar-nav">
            <li><a href="<?php echo $siteayarcek["site_facebook"];?>"><i class="fa fa-facebook"></i></a></li>
            <li><a href="<?php echo $siteayarcek["site_twitter"];?>"><i class="fa fa-twitter"></i></a></li>
            <li><a href="<?php echo $siteayarcek["site_google"];?>"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="<?php echo $siteayarcek["site_youtube"];?>"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
        <div class="col-sm-9">
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
              <?php
              $menusor=$db->prepare('SELECT * FROM menu where menu_ust=:menuust and menu_durum in(1) ORDER BY menu_sira DESC LIMIT 10');
              $menusor->execute(array('menuust'=>'0'));
              $menucek=$menusor->fetchAll(PDO::FETCH_ASSOC);
              foreach ($menucek as  $value) { 
                $menuid=$value['menu_id'];  
                $altmenusor=$db->prepare('SELECT * FROM menu WHERE  menu_ust=:menuid and menu_durum in(1) ORDER BY menu_sira ASC');
                $altmenusor->execute(array("menuid"=>$menuid));
                $altmenucek=$altmenusor->fetchAll(PDO::FETCH_ASSOC);
                $altmenusay=$altmenusor->rowCount();
                ?>
                <li <?php if($altmenusay!=0)
                {
                  echo 'class="dropdown"';
                } ?> >
                <a href="<?php
                if(strlen($value["menu_url"])>0)
                {
                  echo $value["menu_url"];
                }
                else if(strlen($value["menu_url"])==0)
                {
                  echo "menudetay?menu_id=".$value["menu_id"];
                }
                ?>">
                <?php echo $value["menu_ad"]; ?>
              </a>
              <?php if($altmenusay!=0){?>
              <ul class="dropdown-menu" role="menu">
                <?php 
                foreach ($altmenucek as$altvalue ) {?>
                <li>
                  <a href="<?php
                  if(strlen($altvalue["menu_url"])>0)
                  {
                    echo $altvalue["menu_url"];
                  }
                  else if(strlen($altvalue["menu_url"])==0)
                  {
                    echo "menudetay?menu_id=".$altvalue["menu_id"];
                  }
                  ?>">
                  <?php echo $altvalue["menu_ad"]; ?>
                </a>
              </li>
              <?php } ?>
            </ul>
            <?php }?>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>
  </div>
</div>
</header>