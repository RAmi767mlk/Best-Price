$button = $('.message-div')
$ShowHideMore = $('.product-cards');
$ShowHideMore.each(function() {
    var $times = $(this).children('.card');
    console.log($times.length)
    if ($times.length > 13) {
        $ShowHideMore.children(':nth-of-type(n+13)').addClass('moreShown').hide();
        $button.show();
        $button.addClass('more-times').find('p.message').html('+ Show more');
    }
});

$(document).on('click', '.message-div ', function() {
  var that = $(this);
  console.log(that)
  var thisParent = that.siblings('div.product-cards');
  if (that.hasClass('more-times')) {
    thisParent.find('.moreShown').show();
    that.toggleClass('more-times', 'less-times').find('p.message').html('- Show less');
  } else {
    thisParent.find('.moreShown').hide();
    that.toggleClass('more-times', 'less-times').find('p.message').html('- Show more');
  }  
});




$(document).ready(function(){
    $('.categories').slick({
      responsive: [
  {
    breakpoint: 792,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      infinite: true,
      dots: true
    }
  },
  ]});})
  
  
   $(document).ready(function () {
  $x = window.matchMedia("(max-width: 792px)")
  $var = $('.categories').offset();
  console.log($var.top)
  if($x.matches){
  $scrollTop= $var.top+120
  }  
  else{
  $scrollTop= $var.top
  }
  $('#go-top').goTop({
  scrollTop: $scrollTop,
  scrollSpeed: 10,
  fadeInSpeed: 1000,
  fadeOutSpeed: 500
  })
  })