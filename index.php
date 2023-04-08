<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Efe Group</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Heebo:100,900|Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-fixed/">
<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/98d968c43b.js" crossorigin="anonymous"></script>
<?php include "admin/database.php";
$sqlhome=mysqli_query($db,"select * from home");
?>
</head>

<body>
<?php include "navbar.php" ?>
<div class="slider">
  <?php $say=0; while ($slider=mysqli_fetch_array($sqlhome)){ ?>
  <div class="slider__slide <?php if($say==0){ echo 'slider__slide--active';} ?>" data-slide="<?php echo $slider['Slider_Id'] ?>">
    <div class="slider__wrap">
      <div class="slider__back" style=" background: url(<?php echo 'img/slider/'.$slider['Slider_img'] ?>) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
        <h1 class="id"><?php echo $slider['Slider_Id'] ?></h1>
      </div>
    </div>
    <div class="slider__inner" style=" background: url(<?php echo 'img/slider/'.$slider['Slider_img'] ?>) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
      <div class="slider__content">
        <div class="slider__right">
          <h1>
            <span class="text">
              <b class="visible"></b>
            </span>
            <span class="yedek"><?php echo $slider['Slider_text'];?></span>
          </h1>
          <?php $link=mysqli_fetch_array(mysqli_query($db,"select * from link where Link_id=".$slider['Link_id']));?>
          <a href="<?php echo $link['Link_uzanti']; ?>"><input class="slider__button" type="button" value="<?php echo $slider['Slider_button'] ?>"></a>
        </div>
        <a class="go-to-next"></a>
      </div>
    </div>
  </div>
  <?php $say++; } ?>
  <div class="slider__indicators"></div>
</div>
<footer class="footer fixed-bottom">
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
  <script src="js/index.js"></script>
  <script type="text/jscript" src="js/textvisible.js"></script>
  <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
