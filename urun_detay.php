<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Efe Group | Ürünler</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Heebo:100,900|Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-fixed/">
<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/98d968c43b.js" crossorigin="anonymous"></script>
<?php include "admin/database.php";
$anaurun_id=$_GET['urun'];
if($anaurun_id){
  $sqlproduct=mysqli_query($db,"select * from product where ProductMain_id=".$anaurun_id);
  $anaurun=mysqli_fetch_array(mysqli_query($db,"select * from product_main where ProductMain_id=".$anaurun_id));
}
else{
  $sqlproduct=mysqli_query($db,"select * from product");
}
?>
</head>

<body>
<?php include "navbar.php" ?>
<div class="container main">
  <div class="row">
    <?php $say=0; $rows = mysqli_fetch_all($sqlproduct, MYSQLI_ASSOC);
     foreach ($rows as $urunler) {
      if($say==0){$idNext=$say+1; $idBack=count($rows)-1;}
      elseif ($say==count($rows)-1) {$idNext=0; $idBack=$say-1;}
      else{$idNext=$say+1; $idBack=$say-1;}
      if(!$anaurun_id){$anaurun=mysqli_fetch_array(mysqli_query($db,"select * from product_main where ProductMain_id=".$urunler['ProductMain_id']));} ?>
      <div class="git" id="<?php echo $urunler['Product_Id'];?>">
        <div class="resim">
          <a onClick="kapat(<?php echo $urunler['Product_Id'];?>)" class="close">X</a>
          <a class="icon n1" onClick="gallerygo(<?php echo $rows[$idBack]['Product_Id']?>,<?php echo $urunler['Product_Id'];?>)"><</a>
          <img class="gimg" src="<?php echo "img/urunler/".$anaurun['ProductMain_name']."/".$urunler['Product_img'];?>">
          <a class="icon" onClick="gallerygo(<?php echo $rows[$idNext]['Product_Id']?>,<?php echo $urunler['Product_Id'];?>)">></a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="zoombox">
          <img src="<?php echo "img/urunler/".$anaurun['ProductMain_name']."/".$urunler['Product_img'];?>" class="zoomboximg">
          <div class="zoomboxDiv">
            <div class="center_ozel">
                <span>
                    <h4><?php echo $urunler['Product_text']?></h4>
                    <i class='fas fa-expand-alt' onclick=" <?php echo 'gallery('.$urunler['Product_Id'].')'?> "></i>
                </span>
             </div>
          </div>
        </div>
      </div>
    <?php $say++; } ?>
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
  <script src="js/gallery.js"></script>
  <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>