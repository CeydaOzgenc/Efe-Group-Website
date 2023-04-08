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
            $about=mysqli_query($db,"select * from about");
            if(p("btngnc")=="Güncelle")
            {
                if(p("about_title")!="" and p("about_text")!=""){
                    mysqli_query($db,"update about set About_title='".p("about_title")."', About_text='".p("about_text")."' where About_id=1") ;
                }else{
                    echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
                }
                header("refresh:0;url=hakkimizda.php");

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
                                    <form method="post">
                                        <div class="card-header bg-primary">
                                            <h2>Hakkımızda Yazısı</h2>
                                        </div>
                                        <div class="card-body">
                                            <?php $aboutone=mysqli_fetch_array($about); ?>
                                            <div class="col-xl-6 col-md-6" style="color:#000;  margin: 2%;">
                                                <h3>Hakkımızda Başlık</h3><br>
                                                <input class="form-control profil-form" type="text" name="about_title" value="<?php echo $aboutone['About_title']; ?>">
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000;  margin: 2%;">
                                                <h3>Hakkımızda Yazı</h3><br>
                                                <textarea class="form-control profil-form" name="about_text">
                                                    <?php echo $aboutone['About_text']; ?>
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-primary d-flex align-items-center justify-content-between">
                                            <input class="text-white" style="background: none; border:none;" type="submit" value="Güncelle" name="btngnc"/>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="card text-white mb-4">
                                    <div class="card-header bg-primary">
                                        <h2>Hakkımızda Slider<h2>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>Hakkımızda Slider Başlığı</th>
                                                    <th>Hakkımızda Slider Yazısı</th>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Hakkımızda Slider Başlığı</th>
                                                    <th>Hakkımızda Slider Yazısı</th>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php while ($about_detay=mysqli_fetch_array($about)){ ?>
                                                <tr>
                                                    <td><?php echo $about_detay['About_title'];?></td>
                                                    <td><?php echo $about_detay['About_text'];?></td>
                                                    <td>
                                                        <a href="<?php echo "duzen.php?yer=ha&duzen=".$about_detay["About_id"] ?>">
                                                            <input class="btn btn-primary" type="submit" value="Düzenle">
                                                        </a>
                                                        <a href="<?php echo 'sil.php?yer=ha&sil='.$about_detay["About_id"] ?>">
                                                            <input class="btn btn-danger" type="submit" value="Sil">
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer bg-primary d-flex align-items-center justify-content-between">
                                        <a class="small text-white" href="ekle.php?yer=ha">Yeni Ekle</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
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