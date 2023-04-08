<!DOCTYPE html>
<html lang="en">
<head>
  <title>Efe Group | Hakkımızda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Heebo:100,900|Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-fixed/">
<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/98d968c43b.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
<?php include "admin/database.php";
$sqlabout=mysqli_query($db,"select * from about");
?>
</head>
<body class="hakkinda_body">
<?php include "navbar.php" ?>
<div class="container main">
  <div class="row hakkinda">
    <div class="col-sm-7">
      <div class="float-right">
      <?php $aboutone=mysqli_fetch_array($sqlabout); ?>
      <h1><?php echo $aboutone['About_title']; ?></h1>
      <p><?php echo $aboutone['About_text']; ?></p>
      </div>
    </div>
  </div>
  <div class="row hakkinda">
    <div class="col-sm-7">
      <div class="float-right">  
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <?php $count=mysqli_num_rows($sqlabout)-1; ?>
        <ol class="carousel-indicators">
          <?php for($x=0;$x<$count;$x++){ ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $x ;?>" <?php if($x==0){ echo 'class="active"'; }?>></li>
          <?php } ?>
        </ol>
        <div class="carousel-inner">
          <?php $say=0; while ($about_detay=mysqli_fetch_array($sqlabout)){ ?>
          <div class="item <?php if($say==0){ echo 'active';} ?>">
            <div class="carousel-caption">
              <h3><?php echo $about_detay['About_title'];?></h3>
              <p><?php echo $about_detay['About_text'];?></p>
            </div>
          </div>
          <?php $say++; } ?>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-2 icon">
          <a href="https://www.youtube.com/channel/UCvtXMd-vxI0gQzy1ENTXDdQ" title="Youtube" target="_blank"><i class='fab fa-youtube'></i></a>
          <a href="https://twitter.com/efegroup35" title="Twitter" target="_blank"><i class='fab fa-twitter'></i></a>
          <a href="https://www.linkedin.com/company/efegroup/" title="Linkedin" target="_blank"><i class='fab fa-linkedin'></i></a>
          <a title="Facebook" target="_blank" href="https://www.facebook.com/efegroup35"><i class='fab fa-facebook-f'></i></a>
          <a href="https://www.instagram.com/efe.group/" title="Instagram" target="_blank"><i style="margin-right:0px;" class='fab fa-instagram'></i></a>
        </div>
        <div class="col-sm-9">
          <ul class="footer_nav">
            <li><a href="sosyal_sorumluluk.php">Sosyal Sorumluluk</a></li>
            <li><a href="hakkinda.php">Hakkımızda</a></li>
            <li><a href="referanslar.php">Referanslar</a></li>
            <li><a href="seltifikalar.php">Seltifikalar</a></li>
            <li><a href="haberler.php">Haberler</a></li>
            <li><a href="iletisim.php">İletişim</a></li>
            <li><a href="urunler.php">Ürünler</a></li>
            <li><a href="uretim.php">Üretim</a></li>
          </ul>
        </div>
        <div class="col-sm-1 cevir">
            <div class="dropdown">
                <i class="fa fa-language ceviri" style="font-size:25px; color: #ffeb00"></i>
                <div class="dropdown-content">
                    <ul>
                        <li><a href="#">TR</a></li>
                        <li><a href="#">DU</a></li>
                        <li><a href="#">EU</a></li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright text-center ">© Copyright 2021 Efegroup Tüm Hakları  Saklıdır.
    </div>
  </footer>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
