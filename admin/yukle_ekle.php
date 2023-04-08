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
	$yer=$_GET['yer'];
	$dosyaad=$_FILES["dosya_ekle"]["name"];
	if ($_FILES["dosya_ekle"]["name"]!=""){
		if($yer=='a'){
			$dosyayol="../img/slider/".$dosyaad;
		}else if($yer=='u'){
			$dosyayol="../img/urunler/".$dosyaad;
		}else if($yer=='ud'){
			$id=$_GET['id'];
			$sql=mysqli_fetch_array(mysqli_query($db,"select * from product_main where ProductMain_id=".$id." ORDER BY ProductMain_id DESC LIMIT 1"));
			$dosyayol="../img/urunler/".$sql['ProductMain_name']."/".$dosyaad;
		}else if($yer=='s'){
			$dosyayol="../img/ssorumluluk/".$dosyaad;
		}else if($yer=='h'){
			$dosyayol="../img/haberler/".$dosyaad;
		}else if($yer=='r'){
			$dosyayol="../img/referans/".$dosyaad;
		}else if($yer=='se'){
			$dosyayol="../img/seltifica/".$dosyaad;
		}else if($yer=='ur'){
			$dosyayol="../img/uretim/".$dosyaad;
		}else if($yer=='k'){
			$dosyayol="../img/kartela/".$dosyaad;
		}
		$dtip=$_FILES["dosya_ekle"]["type"];
		if($dtip="image/jpg" or $dtip="image/png" or $dtip="image/gif")
		{
			if(is_uploaded_file($_FILES["dosya_ekle"]["tmp_name"])){
				$tasi=move_uploaded_file($_FILES["dosya_ekle"]["tmp_name"],$dosyayol);
				  	if($tasi){
				  		if($yer=='u'){
				  			if(p('urun_name')!=""){
				  				mysqli_query($db,"insert into product_main(ProductMain_img,ProductMain_name) values('$dosyaad','".p('urun_name')."')");
				  				$id=mysqli_fetch_array(mysqli_query($db,"select * from product_main ORDER BY ProductMain_id DESC LIMIT 1"));
								mkdir('../img/urunler/'.$id['ProductMain_name'],'0777');
						 		header('Location:urunler.php');
				  			}
				  			else{
				  				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  				header("refresh:0;url=ekle.php?yer=u");
				  			}
				  			
				  		}else if($yer=='a'){
				  			if(p('slider_text')!="" and p('slider_button')!=""and p('link')!=""){
				  				mysqli_query($db,"insert into home(Slider_img,Slider_text,Slider_button,Link_id) values('$dosyaad','".p('slider_text')."', '".p('slider_button')."', ".intval(p('link')).")");
						 		header('Location:anasayfa.php');
				  			}
				  			else{
				  				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  				header("refresh:0;url=ekle.php?yer=a");
				  			}
				  		}else if($yer=='ud'){
				  		    if(p('urun_text')!=""){
				  				mysqli_query($db,"insert into product(Product_img,Product_text,ProductMain_id) values('$dosyaad','".p('urun_text')."',".$id.")" );
						 	    header('Location:urun.php?urun='.$id);
				  			}
				  			else{
				  			    echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  				header("refresh:0;url=ekle.php?yer=ud&id=".$id);
				  			}
					  	}else if($yer=='s'){
				  			if(p('sosyal_title')!="" and p('sosyal_text')!=""){
				  				mysqli_query($db,"insert into ssorumluluk(Ssorumluluk_img,Ssorumluluk_title,Ssorumluluk_text) values('$dosyaad','".p('sosyal_title')."', '".p('sosyal_text')."')");
						 		header('Location:sosyal_sorumluluk.php');
				  			}
				  			else{
				  				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  				header("refresh:0;url=ekle.php?yer=s");
				  			}
				  		}else if($yer=='h'){
				  			if(p('haber_title')!="" and p('haber_text')!=""){
				  				mysqli_query($db,"insert into newscast(Newscast_img,Newscast_title,Newscast_text) values('$dosyaad','".p('haber_title')."', '".p('haber_text')."')");
						 		header('Location:haberler.php');
				  			}
				  			else{
				  				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  				header("refresh:0;url=ekle.php?yer=h");
				  			}
				  		}else if($yer=='r'){
				  				mysqli_query($db,"insert into reference(Reference_img) values('$dosyaad')");
						 		header('Location:referanslar.php');
				  		}else if($yer=='se'){
				  				mysqli_query($db,"insert into seltificas(Seltificas_img) values('$dosyaad')");
						 		header('Location:seltifikalar.php');
				  		}else if($yer=='k'){
				  				mysqli_query($db,"insert into kartela(Kartela_img) values('$dosyaad')");
						 		header('Location:kartela.php');
				  		}else if($yer=='ur'){
				  		    if(p('uretim_text')!=""){
				  				mysqli_query($db,"insert into production(Production_img,Production_text) values('$dosyaad','".p('uretim_text')."')" );
						 	    header('Location:uretim.php');
				  			}
				  			else{
				  			    echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  				header("refresh:0;url=ekle.php?yer=ur");
				  			}
					  	}
					}
					else{
					    echo "<script>alert('Dosya Yüklenemedi!!')</script>";
					}
			}
		}
		else {
			echo "Yanlış Dosya Tipi";
		}
	}
	else{
		echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
		if($yer=='u'){
			header("refresh:0;url=ekle.php?yer=u");
		}else if($yer=='a'){
			header("refresh:0;url=ekle.php?yer=a");
		}else if($yer=='ud'){
			$id=$_GET['id'];
			header("refresh:0;url=ekle.php?yer=ud&id=".$id);
		}else if($yer=='s'){
			header("refresh:0;url=ekle.php?yer=s");
		}else if($yer=='h'){
			header("refresh:0;url=ekle.php?yer=h");
		}else if($yer=='ha'){
			if(p('hakkimizda_title')!="" and p('hakkimizda_text')!=""){
				mysqli_query($db,"insert into about(About_title,About_text) values('".p('hakkimizda_title')."', '".p('hakkimizda_text')."')");
				header('Location:hakkimizda.php');
			}
			else{
				 header("refresh:0;url=ekle.php?yer=ha");
			}
		}else if($yer=='r'){
			header("refresh:0;url=ekle.php?yer=r");
		}else if($yer=='se'){
			header("refresh:0;url=ekle.php?yer=se");
		}else if($yer=='ur'){
			header("refresh:0;url=ekle.php?yer=ur");
		}else if($yer=='k'){
			header("refresh:0;url=ekle.php?yer=k");
		}

	}
}	
?>
<?php ob_end_flush();?>