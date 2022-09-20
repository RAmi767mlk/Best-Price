$(document).ready(function () {
var x = window.matchMedia("(max-width: 792px)")
console.log('mounted')
myFunction(x) 
x.addListener(myFunction) 

// SideBar

var y = document.querySelector('.end-nav')
var nav = document.querySelector('.nav-icon')

nav.addEventListener("click", ()=>{

if( y.style.transform === "translateX(-100%)" || y.style.transform === ''){
    y.style.transform = "translateX(0%)"
}
else{
    y.style.transform = "translateX(-100%)"
    
}
})
function myFunction(x){

  var y = document.querySelector('.end-nav')
  var no= document.querySelector('.mid-nav')
    if (!x.matches) {
      y.style.transform =  ""
      console.log('here')
      
      console.log(no)
      no.style.display = "flex"

    } 
    else{
      no.style.display = "none"
    }
   
}





// heartFill

$faHeart = $('.fa-heart')
$faHeart.on('click', ()=>{


  if($faHeart.hasClass('heartActive')){
    $faHeart.removeClass('heartActive')
  }
  else{
    $faHeart.addClass('heartActive')

  }
 
})



// Search Bar

$navToggler = $('.nav-toggler')
$midnav = $('.mid-nav')
$navToggler.on('click', ()=> {
  console.log($navToggler)
  console.log($midnav.css('display'))
  if( $midnav.css('display') !== 'none'){
    console.log( $midnav.css('display'))
    $midnav.css({'display':'none'});
  }
  else{
    console.log( $midnav.css('display'))
    $midnav.css({'display':'flex'});
   
  }
})

})



