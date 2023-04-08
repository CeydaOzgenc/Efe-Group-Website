var dizi="Web Tasarım";
var bak=0;
var don=1;
setInterval(function(){
	if(don==1){degis(bak);bak++;if(dizi.length<bak){don=2;}}
	else if(don==2){bak--;degis(bak);if(bak<0){don=1;}}},200);
function degis(bak){
	var slidermain = document.getElementsByClassName("slider__slide--active")[0];
	var slidertext = slidermain.getElementsByClassName("yedek")[0].innerHTML;
	var yazi="";
	for(var y=0;y<slidertext.length;y++){
		yazi= yazi +slidertext[y];
		if(bak==y){
			slidermain.getElementsByClassName("visible")[0].innerHTML=yazi;
		}
	}
	if(bak==slidertext.length){
		for(var z=slidertext.length;z>=0;z--){
			if(bak==z){	    
				slidermain.getElementsByClassName("visible")[0].innerHTML=yazi.substring(0,bak);					  
			}
		}
	}
}