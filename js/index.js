$(document).ready(function(){
  for (var i=1; i <= $('.slider__slide').length; i++){
    var id = document.getElementsByClassName('id')[i-1].innerHTML;
    $('.slider__indicators').append('<div class="slider__indicator" data-slide="'+id+'"></div>')
  }
  setTimeout(function(){
    $('.slider__wrap').addClass('slider__wrap--hacked');
  }, 1000);
})
var autoplay = setInterval(auto, 10000);
function goToSlide(number){
  $('.slider__slide').removeClass('slider__slide--active');
  $('.slider__slide[data-slide='+number+']').addClass('slider__slide--active');
  
}

$('.slider__next, .go-to-next').on('click', function(){
  var currentSlide = Number($('.slider__slide--active').data('slide'));
  var totalSlides = $('.slider__slide').length;
  currentSlide++
  if (currentSlide > totalSlides){
    currentSlide = 1;
  }
  goToSlide(document.getElementsByClassName('id')[currentSlide-1].innerHTML);
})

function auto(){
  var currentSlide = Number($('.slider__slide--active').data('slide'));
  var totalSlides = $('.slider__slide').length;
  currentSlide++;
  if (currentSlide > totalSlides){
    currentSlide = 1;
  }
  goToSlide(document.getElementsByClassName('id')[currentSlide-1].innerHTML);
}
