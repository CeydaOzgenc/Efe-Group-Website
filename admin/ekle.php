<?php ob_start(); ?>
<!DOCTYPE html>
<?php
    include "database.php";
    session_start();
    if(!$_SESSION)
    {
        echo "<script> alert ('ADMİNE ÖZELDİR!'); </script>";
        header("refresh:0;url=index.php");
    }
    else{
        $urunler=mysqli_query($db,"select * from product_main");
        $yer=$_GET['yer'];
        if ($yer=='ud') {
            $id=$_GET['id'];
        }
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Efe Group | Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand logo" href="anasayfa.php"><img src="../img/logo.png"></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="cikis.php">Çıkış</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="anasayfa.php">
                                Anasayfa
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                Ürünler
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <?php while ($urun=mysqli_fetch_array($urunler)){ 
                                    if($urun['ProductMain_id']==1){?>
                                        <a class="nav-link" href="urunler.php"><?php echo $urun['ProductMain_name'] ?></a>
                                    <?php }else { ?>
                                    <a class="nav-link" href="<?php echo 'urun.php?urun='.$urun['ProductMain_id'] ?>"><?php echo $urun['ProductMain_name'] ?></a>
                                    <?php } 
                                } ?>
                                </nav>
                            </div>
                            <a class="nav-link" href="hakkimizda.php">
                                Hakkımızda
                            </a>
                            <a class="nav-link" href="kartela.php">
                                Kartela
                            </a>
                            <a class="nav-link" href="referanslar.php">
                                Referanslar
                            </a>
                            <a class="nav-link" href="seltifikalar.php">
                                Seltifikalar
                            </a>
                            <a class="nav-link" href="uretim.php">
                                Üretim
                            </a>
                            <a class="nav-link" href="haberler.php">
                                Haberler
                            </a>
                            <a class="nav-link" href="iletisim.php">
                                iletişim
                            </a>
                            <a class="nav-link" href="sosyal_sorumluluk.php">
                                Sosyal Sorumluluk
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <br>
                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="card text-white mb-4">
                                    <form method="post" action="<?php 
                                    if($yer=='ud'){
                                        echo 'yukle_ekle.php?yer='.$yer.'&id='.$id;
                                    }
                                    else{
                                        echo 'yukle_ekle.php?yer='.$yer;
                                    }?>
                                        " enctype="multipart/form-data">
                                        <div class="card-header bg-primary">
                                            <h2>Ekleme<h2>
                                        </div>
                                        <div class="card-body">
                                            <?php if($yer=='u'){
                                            ?>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Ürün Adı:</h3><br>
                                                <input class="form-control profil-form" type="text" name="urun_name">
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Ürün Fotoğraf :</h3><br>
                                                <input class="form-control profil-form" type="file" name="dosya_ekle">
                                            </div>
                                            <?php }else if($yer=='a'){
                                            ?>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Slider Resmi :</h3><br>
                                                <input class="form-control profil-form" type="file" name="dosya_ekle">
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Slider Yazısı :</h3><br>
                                                <input class="form-control profil-form" type="text" name="slider_text">
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Slider Buton :</h3><br>
                                                <input class="form-control profil-form" type="text" name="slider_button">
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3 for="link">Slider Buton Linki:</h3><br>
                                                <select name="link" id="color">
                                                    <?php $link=mysqli_query($db,"select * from link ");
                                                    while ($name=mysqli_fetch_array($link)){ ?>
	                                                    <option value="<?php echo $name['Link_id'];?>"><?php echo $name['Link_name']; ?></option>
	                                                <?php } ?>
                                                </select>
                                            </div>
                                            <?php }else if($yer=='ud'){ ?>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Ürün Fotoğrafı :</h3><br>
                                                <input class="form-control profil-form" type="file" name="dosya_ekle">
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Ürün Yazısı :</h3><br>
                                                <input class="form-control profil-form" type="text" name="urun_text">
                                            </div>
                                            <?php }else if($yer=='s'){ ?>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Sosyal Sorumluluk Fotografı :</h3><br>
                                                <input class="form-control profil-form" type="file" name="dosya_ekle">
                                            </div>
                                             <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Sosyal Sorumluluk Başlığı :</h3><br>
                                                <input class="form-control profil-form" type="text" name="sosyal_title">
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Sosyal Sorumluluk Yazısı :</h3><br>
                                                <textarea class="form-control profil-form" name="sosyal_text">
                                                </textarea>
                                            </div>
                                            <?php }else if($yer=='h'){ ?>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Haber Fotografı :</h3><br>
                                                <input class="form-control profil-form" type="file" name="dosya_ekle">
                                            </div>
                                             <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Haber Başlığı :</h3><br>
                                                <input class="form-control profil-form" type="text" name="haber_title">
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Haber Yazısı :</h3><br>
                                                <textarea class="form-control profil-form" name="haber_text">
                                                </textarea>
                                            </div>
                                            <?php }else if($yer=='ha'){ ?>
                                             <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Hakkımızda Slider Başlığı :</h3><br>
                                                <input class="form-control profil-form" type="text" name="hakkimizda_title">
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Hakkımızda Slider Yazısı :</h3><br>
                                                <textarea class="form-control profil-form" name="hakkimizda_text">
                                                </textarea>
                                            </div>
                                            <?php }else if($yer=='r'){ ?>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Referans Fotografı :</h3><br>
                                                <input class="form-control profil-form" type="file" name="dosya_ekle">
                                            </div>
                                            <?php }else if($yer=='se'){ ?>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Seltifika Fotografı :</h3><br>
                                                <input class="form-control profil-form" type="file" name="dosya_ekle">
                                            </div>
                                            <?php }else if($yer=='ur'){ ?>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Üretim Fotoğrafı :</h3><br>
                                                <input class="form-control profil-form" type="file" name="dosya_ekle">
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Üretim Yazısı :</h3><br>
                                                <input class="form-control profil-form" type="text" name="uretim_text">
                                            </div>
                                            <?php }else if($yer=='k'){ ?>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Kartela Fotografı :</h3><br>
                                                <input class="form-control profil-form" type="file" name="dosya_ekle">
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="card-footer bg-primary d-flex align-items-center justify-content-between">
                                            <input class="text-white" style="background: none; border:none;" type="submit" value="Ekle" name="dzn" />
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Website 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
<?php ob_end_flush();?>