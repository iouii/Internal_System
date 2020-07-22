<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bbc.css">
    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {
  vertical-align: middle;
height:450px;
}

/* Slideshow container */
.slideshow-container {
  max-width: 750px;
  position: relative;
  margin: auto;
  border-radius: 5px;
  /*box-shadow: 0 8px 10px rgba(0, 0, 0, 0.3); */
  opacity:0.9;
}


/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 10px;
  width: 10px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 1.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: 1s;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 500px) {
  .text {font-size: 11px}
}
</style>
</head>
<body>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <!-- 
  <div class="carousel-item active w-100">
    <a href="http://octap01:81/emi/oct/index.php" target="_blank"><img src="images/Slide/01-1.jpg" class="d-block w-100" style="width:100%" alt="..."></a>
    </div>
    <div class="carousel-item w-100">
    <a href="images/PDF/10rule.pdf" target="_blank"><img src="images/Slide/02.png" class="d-block w-100" style="width:100%" alt="..."></a>
    </div>
    <div class="carousel-item w-100">
    <a href="http://octap01:81/emi/oct/index.php" target="_blank"><img src="images/Slide/03.jpg" class="d-block w-100"style="width:100%" alt="..."></a>
    </div>
    <div class="carousel-item w-100">
    <a href="http://octap01:81/emi/oct/index.php" target="_blank"><img src="images/Slide/04.jpg" class="d-block w-100"style="width:100%" alt="..."></a>
    </div>
    <div class="carousel-item w-100">
    <a href="http://octap01:81/emi/oct/index.php" target="_blank"><img src="images/Slide/05.jpg" class="d-block w-100"style="width:100%" alt="..."></a>
    </div>
-->
<div class="carousel-item w-100">
    <a href="http://octap01:81/emi/oct/index.php" target="_blank"><img src="images/Slide/IMG_2764.png" class="d-block w-100"style="width:100%" alt="..."></a>
    </div>
    <div class="carousel-item w-100">
    <a href="http://octap01:81/emi/oct/index.php" target="_blank"><img src="images/Slide/IMG_2987.png" class="d-block w-100"style="width:100%" alt="..."></a>
    </div>
  </div>
</div>
<!--
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <a href="http://octap01:81/emi/oct/index.php" target="_blank">  <img src="images/Slide/01-1.jpg"" style="width:100%"></a>
  
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <a href="images/PDF/10rule.pdf" target="_blank"> <img src="images/Slide/02.jpg" style="width:100%"></a>
  
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 5</div>
  <a href="http://octap01:81/emi/oct/index.php" target="_blank">   <img src="images/Slide/03.jpg" style="width:100%"></a>
  
</div>


<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <a href="http://octap01:81/emi/oct/index.php" target="_blank">  <img src="images/Slide/04.jpg" style="width:100%"></a>
  
</div>


<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <a href="http://octap01:81/emi/oct/index.php" target="_blank">  <img src="images/Slide/05.jpg" style="width:100%"></a>
  
</div>

</div>
</div>
    <br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>


-->


<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>

</body>
</html> 
