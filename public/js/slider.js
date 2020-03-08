let slideNumber = 1;
let currentSlide = 1;

const slideScroll = (selectedSlide) => {
  const duration = Math.abs(selectedSlide - currentSlide)*800;
  
  $('.slider-container').stop().animate({
    left: `${(1 - selectedSlide)*100}vw`,
  }, duration);
  currentSlide = selectedSlide;
  console.log(1 - selectedSlide);
  $('.indicator').find('.indicator_icon').removeClass('fas').addClass('far');
};

$('.indicator-1').on('click', (e) => {
  e.preventDefault();
  slideScroll(1);
  $('.indicator-1').find('.indicator_icon').removeClass('far').addClass('fas');
});

$('.indicator-2').on('click', (e) => {
  e.preventDefault();
  slideScroll(2);
  $('.indicator-2').find('.indicator_icon').removeClass('far').addClass('fas');
});

$('.indicator-3').on('click', (e) => {
  e.preventDefault();
  slideScroll(3);
  $('.indicator-3').find('.indicator_icon').removeClass('far').addClass('fas');
});

$('.indicator-4').on('click', (e) => {
  e.preventDefault();
  slideScroll(4);
  $('.indicator-4').find('.indicator_icon').removeClass('far').addClass('fas');
});

$('.indicator-5').on('click', (e) => {
  e.preventDefault();
  slideScroll(5);
  $('.indicator-5').find('.indicator_icon').removeClass('far').addClass('fas');
});