<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="index-03.css">
   
    <link rel="stylesheet" href="select.css">
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>
    
    <script src="jquery-3.5.1.slim.min.js" ></script>
    <script src="bootstrap/js/popper.min.js" ></script>
    <script src="bootstrap/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/all.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="image\1ico.png" />
    <title>OguraClutch (Thailand) </title>
</head>
<style>
.br{
    margin-top: 55px;
}

.mr{
    margin-left:10px;
}

a:hover{
    text-decoration: none;
}
</style>
<body>
<body  onload="open();">
    <section id="home">
        <nav class="navbar navbar-expand-lg navbar-back head-hunter">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars" style="color:#fff;"></i>
            </button>
            <div class="collapse navbar-collapse tab" id="navbarTogglerDemo01">

                <a href=""> <img src="image/logo.png" class="lolo responsive" id="logo"
                        alt="OGURA CLUTCH(THAILAND)CO.,LTD." srcset="">
                    <p class="text-p-style"> OGURA CLUTCH (THAILAND) CO.,LTD. </p>
                </a>
                <ul class="navbar-nav mr-auto br">

                    <li class="nav-item mr ">
                        <a class="tablinks nav-link small" href="index.php"><i class="fas fa-home"
                                style="color:gary"></i>
                            Home <span class="sr-only">(Home)</span></a>
                    </li>
                    <li class="nav-item mr">

                        <a class="tablinks nav-link small" href="email-index.php" target="_blank"> <i
                                class="far fa-address-book" style="color:gary"></i><span
                                data-hover="E-MAIL & TELEPHONE"> E-Mail & Telephone</span></a>
                    </li>
                    <li class="nav-item mr">
                        <a class="nav-link small" href="#news"><i class="far fa-newspaper" style="color:gary"></i><span
                                data-hover="NEWS"> News Release</span></a>
                    </li>
                    <li class="nav-item mr">
                        <a class="nav-link small" href="#manual"><i class="far fas fa-desktop"
                                style="color:gary"></i><span data-hover="IT MANUAL"> IT Manual</span></a>
                    </li>
                    <li class="nav-item mr">
                        <a class="nav-link small" href="#about"><i class="far fa-building" style="color:gary"></i><span
                                data-hover="ABOUT US"> About us</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav br">

                    <li class="nav-item">
                        <a class="nav-link small " href="Login.php" target="_blank"><i class="fas fa-user-circle"
                                style="color:gary ; font-size:20px"></i><span data-hover="ABOUT US"> Login
                            </span></a>
                    </li>
                </ul>

            </div>
        </nav>

    </section>
    <section class="right" id="section1">

        <div class="container-fluid">
            <div class="row">
<?php
include('top-1.php');

//Senad Main Auto Training 
    include "hr_sendEmail_AutoTraining.php";
//Send Main Auto Tranings
    
?>
            </div>
        </div>
    </section>


    <section class="" id="section2">
    
        <div class="div-head">
            <center>
                <h2 class="head-text"><b>Web Link</b></h2>
            </center>
        </div>

<!-- weblink   -->
        <div class="row link-1">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card rounded-0 card-weblink">
                    <img src="images/icon/weblink/ocj.png" class="aic" id="logo" srcset="">
                    <div class="container">
                        <li> <a href="https://www.oguraclutch.co.jp/" target="_blank" rel="noopener noreferrer">
                                www.oguraclutch.co.jp </a></li>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card rounded-0 card-weblink">
                    <img src="images/icon/weblink/gkn-vector-logo.png" class="aic" id="logo" srcset="">
                    <div class="container">
                        <li><a href="https://portaldl.gkn.com/supplyWeb/account/login" target="_blank"
                                rel="noopener noreferrer">GKN Supplier Exchange </a></li>
                        <li><a href="https://portaldl.gkn.com/public/" target="_blank" rel="noopener noreferrer">GKN
                                DPS </a></li>
                        </li>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card rounded-0 card-weblink">
                    <img src="images/icon/weblink/vale.jpeg" class="aic" id="logo" srcset="">
                    <div class="container">
                        <li> <a href="https://www.esupply.valeo.com/cas/login?regularLogout" target="_blank"
                                rel="noopener noreferrer">WEB-EDI Valeo </a></li>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card rounded-0 card-weblink">
                    <img src="images/icon/weblink/marelli.jpg" class="aic" id="logo" srcset="">
                    <div class="container ">
                        <li class=""><a href="https://th01.calsonickansei.co.th:10443/CktSupplierSSLVPN" target="_blank"
                                rel="noopener noreferrer">WEB-EDI Marelli Thailand </a></li>
                        <li class=""><a href="https://webedi.ck-u.jp/ckmy/Login.aspx" target="_blank"
                                rel="noopener noreferrer">WEB-EDI
                                Calsonic Kansei Malaysia </a></li>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card rounded-0 card-weblink">
                    <img src="images/icon/weblink/orc-3.png" class="aic" id="logo" srcset="">
                    <div class="container">
                        <li> <a href="http://www.ogura-racing.com/" target="_blank" rel="noopener noreferrer">Ogura
                                Racing</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card rounded-0 card-weblink">
                    <img src="images/icon/weblink/hourglass_loader.gif" class="aic" id="logo" srcset="">
                    <div class="container">
                        <li> Coming Soon </li>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card rounded-0 card-weblink">
                    <img src="images/icon/weblink/ggoo.gif" class="aic" id="logo" srcset="">
                    <div class="container">
                        <li><a href="https://www.google.co.th" target="_blank" rel="noopener noreferrer">Google Search</a>
                        </li>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card rounded-0 card-weblink">
                    <img src="images/icon/weblink/tran.png" class="aic" id="logo" srcset="">
                    <div class="container">
                        <li> <a href="https://translate.google.com/" target="_blank" rel="noopener noreferrer">Google
                                Translation</a></li>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section id="news">
<!--slide news  -->
        <div class="div-head">
            <center>
                <h2 class="head-text"><b>News Release</b></h2>
            </center>
        </div>
        <iframe src="slide-news-frist.php" frameborder="0" class="frame-slidez"></iframe>
    </section>
    <section class="secv" id="manual">
        <div class="div-head">
            <center>
                <h2 class="head-text"><b>Program Manual</b></h2>
            </center>
        </div>
        <div class="row">
        <!-- manual text include-->
            <div class="col-lg-1 col-md-12 col-12 left-card">
            </div>
            <div class="col-lg-5 col-md-12 col-12 left-card">
                <div class="card rounded-0 card-manual">
                    <? include('manual-left.php');?>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-12 right-card">
                <div class="card rounded-0 card-manual">
                    <? include('manual-right.php');?>
                </div>
            </div>
        </div>
    </section>
    
    <section class="head-huntera" id="about">
        <!--about ogura-->
        <div class="card-body">
            <div class="row">

                <div class="col-lg-4 col-md-12 col-12">

                    <h5 class="us-h5"> Company Name</h5 class="us-h5">
                    <p class="us-p">&nbsp;Ogura Clutch (Thailand) Co.,Ltd.</p>


                    <h5 class="us-h5"> Address</h5 class="us-h5">
                    <p class="us-p">&nbsp;&nbsp;7/283 Moo 6 Tambon Mapyangphon Amphoe Pluakdaeng &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;Rayong 21140.
                    </p>
                    <h5 class="us-h5"> Founded </h5 class="us-h5">
                    <p class="us-p">&nbsp;August 3, 2009</p>
                    <h5 class="us-h5"> Capital </h5 class="us-h5">
                    <p class="us-p"> 300,000,000 THB. </p>
                    <h5 class="us-h5"> Employees </span></h5 class="us-h5">
                    <p class="us-p">&nbsp;400 member.</p>
                    <h5 class="us-h5"> Business </span></h5 class="us-h5">
                    <p class="us-p">Manufacture and sale of various types of clutch for general industry
                        (for office machine, machine tools, construction machines and industrail
                        machines.), fiber
                        tensioner, automotive A/C clutches, superchargers, power clutches, oil mist
                        separators,jet coolant systems, disaster prevention systems, etc</p>
                    <h5 class="us-h5"> Head Office </span></h5 class="us-h5">
                    <p class="us-p">&nbsp;Rayong (Thailand) Office </p>

                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <h5 class="us-h5"> Plants </h5 class="us-h5">
                    <p class="us-p">&nbsp; 3 Plants. </p>

                    <h5 class="us-h5"> Overseas Offices </h5 class="us-h5">
                    <li class="us-li">&nbsp; Ogura Clutch Co.,Ltd (Japan)</li>
                    <li class="us-li">&nbsp; Ogura Industrial Corporation (U.S.A.)</li>
                    <li class="us-li">&nbsp; Ogura Corporation (U.S.A.)</li>
                    <li class="us-li">&nbsp; Ogura S.A.S．(France)</li>
                    <li class="us-li">&nbsp; Ogura Clutch (Dong Guan) CO.,LTD. (China)</li>
                    <li class="us-li">&nbsp; Ogura Clutch (Wuxi) CO.,LTD. (China)</li>
                    <li class="us-li">&nbsp; Ogura Clutch (Changxing) CO.,LTD. (China)</li>
                    <li class="us-li">&nbsp; Ogura Clutch India PVT.LTD.</li>
                    <li class="us-li">&nbsp; Ogura Clutch Philippines, Inc.</li>
                    <br>
                    <h5 class="us-h5"> Affiliated Company </h5 class="us-h5">
                    <li class="us-li">&nbsp; TOKYO SEIKO CO.,LTD.</li>
                    <li class="us-li">&nbsp; TOYO CLUTCH CO.,LTD.</li>
                </div>

                <div class="col-lg-4 col-md-12 col-12">

                    <h5 class="us-h5"> Telephone </h5 class="us-h5">

                    <li class="us-li">Tel: +66(0)38-650 880-4</li>
                    <li class="us-li">Fax: +66(0)38-650 879 </li>
                    <br>
                    <h5 class="us-h5"> Map </h5 class="us-h5">
                    <img id="myImg" src="images/icon/map.jpg" alt="Map" style="width:20%;max-width:300px">
                    <br>
                    <br>
                    <h5 class="us-h5"> Google Map </h5 class="us-h5">


<!--google map api-->
                    <iframe class="gogle"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.977996310468!2d101.1161252143537!3d12.97325911835309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102c2f8e90baa21%3A0xf1a52a404ea5be17!2z4Lia4Lij4Li04Lip4Lix4LiXIOC5guC4reC4geC4uOC4o-C4sCDguITguKXguLHguJfguIrguYwgKOC5hOC4l-C4ouC5geC4peC4meC4lOC5jCkg4LiI4LmN4Liy4LiB4Lix4LiU!5e0!3m2!1sth!2sth!4v1566191137793!5m2!1sth!2sth"
                        width="900" height="400" frameborder="0" style="border:" allowfullscreen></iframe>

                </div>
            </div>
     
        
        <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    <a class="nav-link " id="myBtn" href="#home"><i class="fas fa-chevron-up"
            style="color:gary; font-size:30px"></i><span data-hover=""></span></a>
            
            <center>
            <p class="text-p-stylez tex">Copyright © 2019 OGURA CLUTCH (THAILAND) CO.,LTD. All Rights Reserved.
            </p>
        </center>
    </section>
 
<!--show model map ogura-->

<!--<div id="myModal2" class="modal2">

<div id="myModalx" class="modal-contentx">
  <span class="closex" title='close'>&times;</span>
  <img  src="images/icon/co1.jpg" id="img02">

  <img  src="images/icon/co2.jpg" id="img02">
</div>


</div> -->


</body>

<script>

var modalx = document.getElementById("myModal2");

var modalImgx = document.getElementById("img02");
var captionTextx = document.getElementById("caption");
var spanx = document.getElementsByClassName("closex")[0];


function open() {
modalx.style.display = "block";

//setTimeout("modalx.style.display = 'none';",10000);
}


spanx.onclick = function() {

modalx.style.display = "none";

}

window.onclick = function(event) {
if (event.target == modalx) {
modalx.style.display = "none";
}
}
</script>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");
window.onscroll = function() {
    scrollFunction()
};
function scrollFunction() {
    if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

</script>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}
</script>
<script>
function link_session() {

    location.href = "#section3";
}

function showtab() {

    document.getElementsByClassName("ul-tab").style.display = " inline-block";
}

function openTab(evt, tabname) {

    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabname).style.display = "block";
    evt.currentTarget.className += " active";

}
</script>
<script src="jquery.min2.js"></script>
<script>
$(document).ready(function() {
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            // Store hash
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function() {
                window.location.hash = hash;
            });
        } // End if
    });
});
</script>
<script>
// Get the element with id="defaultOpen" and click on it
//document.getElementById("defaultOpen").click();
</script>
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
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
   // slides[slideIndex - 1].style.display = "block";
   // dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>

<script>
// Get the modal
var modal = document.getElementById("myModal");
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function() {
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
</script>
<script>
function dis() {
    alert('ระบบอยู่ในระหว่างกำลังพัฒนา');
}
</script>
<script>
$(document).ready(function() {

    window.location.hash = "#top";
});
</script>


</html>


<!--
<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❅
  </div>
  
</div>

-->