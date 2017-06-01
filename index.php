

<?php
include_once('view/header.php');
?>

<script>
$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    autoplay:true,
    autoplayTimeout:1500,
    autoplayHoverPause:false,
    margin:10,
    nav:false,
    loop:true,
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
      <img src="media/image/1.jpg" alt="projet1">
        <img src="media/image/2.jpg" alt="projet2">
      <img src="media/image/3.jpg" alt="projet3">
    </div>
    <div class="owl-controls">
        <div class="owl-dots">
            <div class="owl-dot active"><span></span></div>
            <div class="owl-dot"><span></span></div>
            <div class="owl-dot"><span></span></div>
        </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-6">
      <h1>Aspirateur de combat</h1>
      <p>Le top du combat en intérieur</p>
      <img class="gridPic" src="media/image/1.jpg" alt="projet1"></img>
      <button type="button" name="button">Voir plus</button>
    </div>
    <div class="col-6">
      <h1>Galaxy</h1>
      <p>Le top du combat à l'extérieur de la terre</p>
      <img class="gridPic" src="media/image/2.jpg" alt="projet2"></img>
      <button type="button" name="button">Voir plus</button>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <h1>Moto</h1>
      <p>Le top du voyage en extérieur. Loin de votre mari qui vous balance des chaussures dans la gueule.</p>
      <img class="gridPic" src="media/image/3.jpg" alt="projet3"></img>
      <button type="button" name="button">Voir plus</button>
    </div>
  </div>
</div>

<?php
include_once('view/footer.php');
?>
