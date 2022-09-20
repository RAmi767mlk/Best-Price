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
  

  $button = $('.message')
$ShowHideMore = $('.similar-stores');
$ShowHideMore.each(function() {
    var $times = $(this).children('.store');
    console.log($times.length)
    if ($times.length > 2) {
        $ShowHideMore.children(':nth-of-type(n+3)').addClass('moreShown').hide();
        $button.show();
        $button.addClass('more-times').html('...show-more');
    }
});

$(document).on('click', '.message ', function() {
  var that = $(this);
  console.log(that)
  var thisParent = that.siblings('li.similar-stores');
  if (that.hasClass('more-times')) {
    thisParent.find('.moreShown').show();
    that.toggleClass('more-times', 'less-times').html(' Show less');
  } else {
    thisParent.find('.moreShown').hide();
    that.toggleClass('more-times', 'less-times').html('...Show more');
  }  
});

$x = window.matchMedia("(max-width: 411px)")
if($x){
  console.log('it is')
}
