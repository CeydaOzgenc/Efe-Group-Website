<?php ob_start(); ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Efe Group | İletişim</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Heebo:100,900|Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-fixed/">
<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/98d968c43b.js" crossorigin="anonymous"></script>
<?php include "admin/database.php";
$info=mysqli_fetch_array(mysqli_query($db,"select * from contact"));
?>
<?php
if(p("btn_gonder")=="Gönder"){
            if ($_FILES["contact_dosya"]["name"]!=""){
                $dtip=$_FILES["contact_dosya"]["type"];
                if($dtip=="application/pdf"){
		            $mb=($_FILES['contact_dosya']['size']/1024)/1024;
		            if($mb<=100){
		                if(is_uploaded_file($_FILES["contact_dosya"]["tmp_name"])){
		                    if(p('contact_isim') and p('contact_mail') and p('contact_call') and p('contact_konu') and p('contact_mesaj')){
		                        $dosyaad=$_FILES["contact_dosya"]["name"];
		                        $dosyayol="dosyalar/".$dosyaad;
		                        $tasi=move_uploaded_file($_FILES["contact_dosya"]["tmp_name"],$dosyayol);
		                        if($tasi){
		                            mysqli_query($db,"insert into contact_mesaj(ContactMesaj_isim,ContactMesaj_mail,ContactMesaj_call,ContactMesaj_file,ContactMesaj_konu,ContactMesaj_mesaj) values('".p('contact_isim')."','".p('contact_mail')."','".p('contact_call')."','".$dosyaad."', '".p('contact_konu')."','".p('contact_mesaj')."')");
                                    echo "<script>alert('Mesajınız iletildi..')</script>";
                                    header("refresh:0;url=iletisim.php");
		                        }else{
		                            echo "<script>alert('Dosya yüklenemedi!!')</script>";
		                        }
                            }else{
                                echo "<script>alert('* alanların dorldurulması zorunludur!!')</script>";
                            }
		                }
		                else{
		                    echo "<script>alert('Dosya yüklenemedi!')</script>";
		                }
		            }else{
		                echo "<script>alert('Dosya boyutu 100 MB'ı geçmemeli!!')</script>";
		            }
		            
		        }else{
		            echo "<script>alert('Dosya uzantınız pdf olmalıdır!!')</script>";
		        }
            }else{
                if(p('contact_isim') and p('contact_mail') and p('contact_call') and p('contact_konu') and p('contact_mesaj')){
                    mysqli_query($db,"insert into contact_mesaj(ContactMesaj_isim,ContactMesaj_mail,ContactMesaj_call,ContactMesaj_file,ContactMesaj_konu,ContactMesaj_mesaj) values('".p('contact_isim')."','".p('contact_mail')."','".p('contact_call')."','".$dosyaad."', '".p('contact_konu')."','".p('contact_mesaj')."')");
                    echo "<script>alert('Mesajınız iletiildi..')</script>";
                    header("refresh:0;url=iletisim.php");
                }else{
                    echo "<script>alert('* alanların dorldurulması zorunludur!!')</script>";
                }
                
            }

    }
?>
</head>

<body>
<?php include "navbar.php" ?>
<div class="container main">
    <div class="row">
        <div class="col-md-7">
          <div class="ilet">
            <iframe src="https://mapsengine.google.com/map/embed?mid=zNR57B68pgDs.kus-mzcjKXlw" width="100%" height="350px"></iframe>
          </div>
        </div>
        <div class="col-md-5">
          <div class="ilet i_height">
            <div class="i_center">
              <span>
                <i class='fas fa-phone-volume'></i>
                <?php echo $info['Contact_call']; ?>
              </span>
              <span>
                <i class='fas fa-envelope-open'></i>
                <?php echo $info['Contact_mail']; ?>
              </span>
              <span>
                <i class='fas fa-map-marked-alt'></i>
                <?php echo $info['Contact_maps']; ?>
              </span>
            </div>
          </div>
        </div>
    </div>
     <div class="row">
        <div class="col-sm-12">
          <div class="ilet">
            <div class="contact-wrap w-100 p-md-5 p-4">
              <h3 class="mb-4">İletişim</h3>
              <form method="POST" id="contactForm" name="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="contact_isim" id="name" placeholder="* İsim">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="email" class="form-control" name="contact_mail" id="email" placeholder="* Email">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="contact_call" id="subject" placeholder="* Telefon Numarası">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="file" class="form-control" name="contact_dosya" id="subject">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="contact_konu" id="subject" placeholder="* Konu">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea name="contact_mesaj" class="form-control" id="message" cols="30" rows="7" placeholder="* Mesajınız"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="submit" name="btn_gonder" value="Gönder" class="btn btn-ozel">
                    </div>
                  </div>
                </div>
              </form>
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
<?php ob_end_flush();?>
