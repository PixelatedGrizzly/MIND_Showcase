

<?php
include_once('view/header.php');
?>

<script>
$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    items:3,
    animateOut: 'fadeOut',
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:false,
    margin:10,
    nav:true,
    responsive:{
        1000:{
            items:1
        },
        2000:{
            items:3
        },
        3000:{
            items:5
        }
    }
  })
  $('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
  })
  $('.stop').on('click',function(){
      owl.trigger('stop.owl.autoplay')
  })
});
</script>

<div class="container">
  <div class="row">
    <div class="owl-carousel ">
      <div class="slide">
        <img src="media/image/1.jpg" alt="projet1">
      </div>
      <div class="slide">
        <img src="media/image/2.jpg" alt="projet2">
      </div>
      <div class="slide">
        <img src="media/image/3.jpg" alt="projet3">
      </div>
    </div>
  </div>
</div>

<?php
include_once('view/footer.php');
?>
