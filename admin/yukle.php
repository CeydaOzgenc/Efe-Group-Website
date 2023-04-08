<?php ob_start(); ?>
<?php
	session_start();
	if(!$_SESSION)
	{
		echo "<script> alert ('ADMİNE ÖZELDİR!'); </script>";
		header("refresh:0;url=index.php");
	}
	else{
?>
<?php
	include "database.php";
	$yer=$_GET['yer']; $duzen=$_GET['duzen'];
	$dosyaad=$_FILES["dosya"]["name"];
	if ($_FILES["dosya"]["name"]!=""){
		if($yer=='a'){
			$dosyayol="../img/slider/".$dosyaad;
		}
		else if($yer=='u'){
			$dosyayol="../img/urunler/".$dosyaad;
		}
		else if($yer=='s'){
			$dosyayol="../img/ssorumluluk/".$dosyaad;
		}else if($yer=='h'){
			$dosyayol="../img/haberler/".$dosyaad;
		}else if($yer=='ud'){
		    $id=$_GET['id'];
		    $sql=mysqli_fetch_array(mysqli_query($db,"select * from product_main where ProductMain_id=".$id." ORDER BY ProductMain_id DESC LIMIT 1"));
			$dosyayol="../img/urunler/".$sql['ProductMain_name']."/".$dosyaad;
		}else if($yer=='ur'){
			$dosyayol="../img/uretim/".$dosyaad;
		}
		$dtip=$_FILES["dosya"]["type"];
		if($dtip="image/jpg" or $dtip="image/png" or $dtip="image/gif")
		{
			if(is_uploaded_file($_FILES["dosya"]["tmp_name"])){
				$tasi=move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyayol);
				  if($tasi){
				  		if($yer=='a'){
				  		    if(p('slider_text')!="" and p('slider_button')!=""and p('link')!=""){
				  				mysqli_query($db,"update home set Slider_img='".$dosyaad."', Slider_text='".p('slider_text')."', Slider_button='".p('slider_button')."', Link_id='".intval(p('link'))."' where Slider_Id=".$duzen);
				  			}
				  			else{
				  				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  			}
						 	header('refresh:0;url=anasayfa.php');
				  		}
				  		else if($yer=='u'){
				  			if($duzen!=1){
				  			    if(p('urun_name')!=""){
				  				    mysqli_query($db,"update product_main set ProductMain_img='".$dosyaad."', ProductMain_name='".p('urun_name')."' where ProductMain_id=".$duzen);
				  			    }
				  			    else{
				  				    echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  			    }
				  			}
				  			else{
				  				mysqli_query($db,"update product_main set ProductMain_img='".$dosyaad."' where ProductMain_id=".$duzen);
				  			}
						 	header('refresh:0;url=urunler.php');
				  		}
				  		else if($yer=='s'){
				  		    if(p('sosyal_title')!="" and p('sosyal_text')!=""){
				  				mysqli_query($db,"update ssorumluluk set Ssorumluluk_img='".$dosyaad."', Ssorumluluk_title='".p('sosyal_title')."', Ssorumluluk_text='".p('sosyal_text')."' where Ssorumluluk_id='".$duzen."'");
				  			}
				  			else{
				  				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  			}
							header('refresh:0;url=sosyal_sorumluluk.php');
						}
						else if($yer=='h'){
						    if(p('haber_title')!="" and p('haber_text')!=""){
				  				mysqli_query($db,"update newscast set Newscast_img='".$dosyaad."', Newscast_title='".p('haber_title')."', Newscast_text='".p('haber_text')."' where Newscast_id ='".$duzen."'");
				  			}
				  			else{
				  				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  			}
							header('refresh:0;url=haberler.php');
						}
						else if($yer=='ud'){
						    if(p('urun_text')!=""){
				  				mysqli_query($db,"update product set Product_img='".$dosyaad."', Product_text='".p('urun_text')."' where Product_Id='".$duzen."'");
				  			}
				  			else{
				  			    echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  			}
			                header('refresh:0;url=urun.php?urun='.$id);
						}else if($yer=='ur'){
						    if(p('uretim_text')!=""){
				  				mysqli_query($db,"update production set Production_img='".$dosyaad."', Production_text='".p('uretim_text')."' where Production_id='".$duzen."'");
				  			}
				  			else{
				  			    echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  			}
			                header('refresh:0;url=uretim.php');
						}
					}
				}
		}
		else {
			echo "Yanlış Dosya Tipi";
		}
	}
	else{
		if($yer=='a'){
		    if(p('slider_text')!="" and p('slider_button')!=""and p('link')!=""){
				mysqli_query($db,"update home set Slider_text='".p('slider_text')."', Slider_button='".p('slider_button')."', Link_id=".intval(p('link'))." where Slider_Id=".$duzen);
			}else{
				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
			}
			header('refresh:0;url=anasayfa.php');
		}
		else if($yer=='u'){
			if($duzen!=1){
			    if(p('urun_name')!=""){
				  	mysqli_query($db,"update product_main set ProductMain_name='".p('urun_name')."' where ProductMain_id='".$duzen."'");
				 }else{
				  	echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				 }
			}
			header('refresh:0;url=urunler.php');
		}
		else if($yer=='s'){
		    if(p('sosyal_title')!="" and p('sosyal_text')!=""){
				mysqli_query($db,"update ssorumluluk set Ssorumluluk_title='".p('sosyal_title')."', Ssorumluluk_text='".p('sosyal_text')."' where Ssorumluluk_id='".$duzen."'");
			}else{
				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
			}
			header('refresh:0;url=sosyal_sorumluluk.php');
		}else if($yer=='h'){
		    if(p('haber_title')!="" and p('haber_text')!=""){
				mysqli_query($db,"update newscast set Newscast_title='".p('haber_title')."', Newscast_text='".p('haber_text')."' where 	Newscast_id='".$duzen."'");
			}else{
				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
			}
			header('refresh:0;url=haberler.php');
		}else if($yer=='ha'){
		    if(p('hakkimizda_title')!="" and p('hakkimizda_text')!=""){
				mysqli_query($db,"update about set About_title='".p('hakkimizda_title')."', About_text='".p('hakkimizda_text')."' where About_id='".$duzen."'");
			}
			else{
				 echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
			}
			header('refresh:0;url=hakkimizda.php');
		}else if($yer=='ud'){
		    if(p('urun_text')!=""){
				$id=$_GET['id'];
			    mysqli_query($db,"update product set Product_text='".p('urun_text')."' where Product_Id='".$duzen."'");
			}else{
				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
			}
			header('refresh:0;url=urun.php?urun='.$id);
		}else if($yer=='ur'){
		    if(p('uretim_text')!=""){
				mysqli_query($db,"update production set Production_text='".p('uretim_text')."' where Production_id='".$duzen."'");
		    }else{
				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
			}
			header('refresh:0;url=uretim.php');
		}
	}
	
}?>
<?php ob_end_flush();?>