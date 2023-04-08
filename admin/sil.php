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
         
?>
<html>
<head>
<meta charset="utf-8">
<title>Efe Group | Admin</title>
<link rel="stylesheet"  href="css/reset.css">
<link rel="stylesheet"  href="css/style.css">
</head>
<body>
<?php
function remove_dir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object)
        {
            if ($object != "." && $object != "..")
            {
                if (is_dir($dir. "/" . $object)) {
                    remove_dir($dir . "/" . $object);
                } else {
                    unlink($dir . "/" . $object);
                }
            }
        }
        rmdir($dir);
   }
}
 ?>
<?php $yer=$_GET['yer']; $sil=$_GET['sil'];
    if($yer=='a'){
        $bul=mysqli_fetch_array(mysqli_query($db,"select * from home where Slider_Id='".$sil."'"));
        unlink('../img/slider/'.$bul['Slider_img']);
        mysqli_query($db,"delete from home where Slider_Id='".$sil."'");
        header('Location:anasayfa.php');
    }else if($yer=='u'){
        $bul=mysqli_fetch_array(mysqli_query($db,"select * from product_main where ProductMain_id='".$sil."'"));
        unlink('../img/urunler/'.$bul['ProductMain_img']);
        remove_dir('../img/urunler/'.$bul['ProductMain_name']);
        mysqli_query($db,"delete from product_main where ProductMain_id='".$sil."'");
        header('Location:urunler.php');
    }else if($yer=='ud'){
        $bul=mysqli_fetch_array(mysqli_query($db,"select * from product where Product_Id='".$sil."'"));
        $anabul=mysqli_fetch_array(mysqli_query($db,"select * from product_main where ProductMain_Id='".$bul['ProductMain_id']."'"));
        unlink('../img/urunler/'.$anabul['ProductMain_name']."/".$bul['Product_img']);
        mysqli_query($db,"delete from product where Product_Id='".$sil."'");
        header('Location:urun.php?urun='.$bul['ProductMain_id']);
    }else if($yer=='s'){
        $bul=mysqli_fetch_array(mysqli_query($db,"select * from ssorumluluk where Ssorumluluk_id='".$sil."'"));
        unlink('../img/ssorumluluk/'.$bul['Ssorumluluk_img']);
        mysqli_query($db,"delete from ssorumluluk where Ssorumluluk_id='".$sil."'");
        header('Location:sosyal_sorumluluk.php');
    }
    else if($yer=='h'){
        $bul=mysqli_fetch_array(mysqli_query($db,"select * from newscast where Newscast_id='".$sil."'"));
        unlink('../img/haberler/'.$bul['Newscast_img']);
        mysqli_query($db,"delete from newscast where Newscast_id='".$sil."'");
        header('Location:haberler.php');
    }else if($yer=='ha'){
        mysqli_query($db,"delete from about where About_id='".$sil."'");
        header('Location:hakkimizda.php');
    }
    else if($yer=='m'){
        mysqli_query($db,"delete from contact_mesaj where ContactMesaj_id='".$sil."'");
        header('Location:iletisim.php');
    }else if($yer=='r'){
        $bul=mysqli_fetch_array(mysqli_query($db,"select * from reference where Reference_id='".$sil."'"));
        unlink('../img/referans/'.$bul['Reference_img']);
        mysqli_query($db,"delete from reference where Reference_id='".$sil."'");
        header('Location:referanslar.php');
    }else if($yer=='se'){
        $bul=mysqli_fetch_array(mysqli_query($db,"select * from seltificas where Seltificas_id='".$sil."'"));
        unlink('../img/seltifica/'.$bul['Seltificas_img']);
        mysqli_query($db,"delete from seltificas where Seltificas_id='".$sil."'");
        header('Location:seltifikalar.php');
    }else if($yer=='ur'){
        $bul=mysqli_fetch_array(mysqli_query($db,"select * from production where Production_id='".$sil."'"));
        unlink('../img/uretim/'.$bul['Production_img']);
        mysqli_query($db,"delete from production where Production_id='".$sil."'");
        header('Location:uretim.php');
    }
    else if($yer=='k'){
        $bul=mysqli_fetch_array(mysqli_query($db,"select * from kartela where Kartela_id='".$sil."'"));
        unlink('../img/kartela/'.$bul['Kartela_img']);
        mysqli_query($db,"delete from kartela where Kartela_id='".$sil."'");
        header('Location:kartela.php');
    }
			    
?>
</body>
</html>
<?php } ?>
<?php ob_end_flush();?>