<?php include "header.php";
$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Hakkımızda</h1>
            </div>
        </div>
    </div>
</section>
<section class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="about-us-wrapper">
            <div class="content-block">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-editor">
                            <article class="entry">
                                <header>
                                    <h3><?php echo $hakkimizdacek["hakkimizda_baslik"]; ?></h3>
                                </header>
                                <div class="content">
                                    <?php echo $hakkimizdacek["hakkimizda_icerik"]; ?>
                                </div>
                            </article>
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