 /*Galeri*/
function gallery(id){
    ana = document.getElementById(id);
    ana.style.display = "table";
    if(window.screen.height >= window.screen.width){
           ana.getElementsByClassName("gimg")[0].style.animationName="widthzoom";
           ana.getElementsByClassName("gimg")[0].style.width = "80%";
           ana.getElementsByClassName("gimg")[0].style.height = "auto";
       }
	}
function gallerygo(id,idtwo){
       ana = document.getElementById(id);
       document.getElementById(idtwo).style.display = "none";
       ana.style.display = "table";
       if(window.screen.height >= window.screen.width){
           ana.getElementsByClassName("gimg")[0].style.animationName="widthzoom";
           ana.getElementsByClassName("gimg")[0].style.width = "80%";
           ana.getElementsByClassName("gimg")[0].style.height = "auto";
       }
	}     
function kapat(id){   
		 document.getElementById(id).style.display = "none";
	}