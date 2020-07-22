<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bbc.css">
    <link rel="stylesheet" href="index.css">
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>OguraClutch</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light head-hunter">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse tab" id="navbarTogglerDemo01">



           <a href="" class="lolo"> <img src="image/logo.png" class="lolo responsive" id="logo" alt="OGURA CLUTCH(THAILAND)CO.,LTD." srcset="">
            <p class="text-p-style"> OGURA CLUTCH(THAILAND)CO.,LTD. </p> 
</a>
            <ul class="navbar-nav mr-auto mt-5 mt-lg-0">

                <li class="nav-item ">
                    <a class="tablinks nav-link" onclick="openTab(event, 'tab1')"><i class="fas fa-home"
                            style="color:gary"></i>
                        Home <span class="sr-only">(Home)</span></a>
                </li>
                <li class="nav-item">

                    <a class="tablinks nav-link" onclick="openTab(event,'tab2')"><i class="far fa-address-book"
                            style="color:gary"></i><span data-hover="E-MAIL & TELEPHONE"> E-Mail & Telephone</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#section2"><i class="far fa-newspaper" style="color:gary"></i><span
                            data-hover="NEWS"> News</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#section3"><i class="far fas fa-desktop" style="color:gary"></i><span
                            data-hover="IT MANUAL"> IT Manual</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#section4"><span
                            data-hover="ABOUT US"> About us</span></a>
                </li>


            </ul>
            <ul class="navbar-nav mr-2 mt-2 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link " href="Login.php" target="_blank"><i class="fas fa-user-circle  "
                            style="color:gary ; font-size:24px"></i><span data-hover="ABOUT US"> Login
                        </span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">


            <div class="col-lg-3 col-md-12 col-12 left list-group-item">

                <br>
                <div class="tab">
                    <h4> <img src="images/sidebar_box_icon.png" class="ioc" alt=""> Menu List </h4>

                    <ul class="list-group list-group-flush menu-li">
                        <li class="list-group-item menu-li"><a class="tablinks" onclick="openTab(event, 'tab1')"
                                id="defaultOpen" rel="noopener noreferrer">
                                Home</a></li>
                        <li class="list-group-item menu-li"><a class="tablinks"
                                onclick="openTab(event, 'tab1');link_session();" rel="noopener noreferrer">IT Manual
                            </a>
                        </li>

                        <li class="list-group-item menu-li"><a
                                href="http://octap01:81/intranet/images/PDF/Calendar_2019.pdf" target="_blank"
                                rel="noopener noreferrer">Company Calender </a></li>
                        <li class="list-group-item menu-li"><a href="http://192.168.10.8:81/oct/main_login.php"
                                target="_blank" rel="noopener noreferrer">Check Drawing </a></li>
                        <li class="list-group-item menu-li"><a href="http://192.168.10.8:81/oct/main_login.php"
                                target="_blank" rel="noopener noreferrer">QRAP</a></li>
                        <li class="list-group-item menu-li"><a href="http://192.168.10.8:81/oct/main_login.php"
                                target="_blank" rel="noopener noreferrer">Check Appearance 300% </a></li>
                        <li class="list-group-item menu-li"><a href="http://192.168.10.8:81/oct/main_login.php"
                                target="_blank" rel="noopener noreferrer">HR Employees System </a></li>
                        <li class="list-group-item menu-li"><a href="http://192.168.10.8:81/oct/main_login.php"
                                target="_blank" rel="noopener noreferrer">WS & Company Rule </a></li>
                        <li class="list-group-item menu-li"><a href="http://octap01:81/intranet/BI.php" target="_blank"
                                rel="noopener noreferrer">BI
                                System </a></li>
                        <li class="list-group-item menu-li"><a class="tablinks" onclick="openTab(event,'tab2')">E-mail
                                &
                                Telephone</a></li>
                        <li class="list-group-item menu-li"><a href="http://octap01:81/emi/int/employee_Index.php"
                                target="_blank" rel="noopener noreferrer">HR Information </a></li>
                        <li class="list-group-item menu-li"><a href="images/PDF/OCTRules_Regulation.pdf" target="_Blank"
                                rel="noopener noreferrer">Computer & Networking security </a></li>
                    </ul>
                </div>
                <br>

                <div>

                    <h4> <img src="images/sidebar_box_icon.png" class="ioc" alt=""> Web Link </h4>

                    <ul class="list-group list-group-flush menu-li">

                        <li class="list-group-item list-group-item-action menu-li"><a
                                href="https://www.oguraclutch.co.jp/" target="_blank" rel="noopener noreferrer">
                                www.oguraclutch.co.jp </a></li>
                        <li class="list-group-item list-group-item-action menu-li"><a
                                href="https://th01.calsonickansei.co.th:10443/CktSupplierSSLVPN" target="_blank"
                                rel="noopener noreferrer">WEB-EDI Calsonic Kansei Thailand </a></li>
                        <li class="list-group-item list-group-item-action menu-li"><a
                                href="https://webedi.ck-u.jp/ckmy/Login.aspx" target="_blank"
                                rel="noopener noreferrer">WEB-EDI Calsonic Kansei Malaysia </a></li>
                        <li class="list-group-item list-group-item-action menu-li"><a
                                href="https://www.esupply.valeo.com/cas/login?regularLogout" target="_blank"
                                rel="noopener noreferrer">WEB-EDI Valeo </a></li>
                        <li class="list-group-item list-group-item-action menu-li"><a
                                href="https://www.esupply.valeo.com/cas/login?regularLogout" target="_blank"
                                rel="noopener noreferrer">GENIC </a></li>
                        <li class="list-group-item list-group-item-action menu-li"><a
                                href="https://portaldl.gkn.com/public/" target="_blank" rel="noopener noreferrer">GKN
                                DPS </a></li>
                        <li class="list-group-item list-group-item-action menu-li"><a
                                href="https://portaldl.gkn.com/supplyWeb/account/login" target="_blank"
                                rel="noopener noreferrer">GKN Supplier Exchange </a></li>

                    </ul>
                </div>


            </div>

            <div class="col-lg-9 col-md-12 col-12 right list-group-item  ">
                <br>
                <br>
                <div id="tab1" class="tabcontent">
                    <div>
                        <br>
                        <center>
                            <div>
                                <iframe src="slide.php" frameborder="0" class="welcome-iframe"></iframe></div>
                        </center>
                        <h4><img src="images/sidebar_box_icon.png" class="ioc" alt=""> Welcome to <span class="mobile-block">Ogura Clutch (Thailand) Intranet!</span></h4>

                        <div class="card-body">
                            <p class="wel-tex">
                                Hello everybody of this Web page made by the <b> IT department </b>, which is another
                                way.
                                Communication between all employees with the IT department, primarily publishers.
                                Will focus on the benefits available to all. Learn to use basic computer networking of
                                company.
                                The guide made each issue separately All of which will be collected at the menu <b>
                                    ITManual </b> and
                                also you can track all information related to the company
                                by clicking on the menu <b> News </b> and check <b>company calendar </b>from the this
                                webpage.

                            </p>

                        </div>
                    </div>

                    <br>

                    <div>
                        <div class=" card-header col-md-12 col-12 div-color " id=" section2">
                            <h4><i class="far fa-newspaper" style="color:gary"></i> News <iframe src="news-slide.php"
                                    frameborder="0" class="frame-slide"></iframe></h4>
                        </div>
                        <div class="card-body ">
                            <iframe src="slide-news-frist.php" class="fr-news card-body col-md-12 col-12  "
                                frameborder="0"></iframe>

                        </div>
                    </div>
                    <br>

                    <div>
                        <div class="card-header col-md-12 col-12 div-color" id="section3">
                            <h4><i class="	fas fa-desktop" style="color:gary"></i> Software & Program Manual</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12 ">
                                    <? include('manual-left.php');?>

                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <? include('manual-right.php');?>

                                </div>
                            </div>
                        </div>
                        <br>

                        <div>


                            <div class="card-header col-md-12 col-12 div-color" id="section4">
                                <h4><i class="far fa-building" style="color:gary"></i> About us</h4>
                            </div>

                            <div class="card-body">
                                <h5>  Company Name</h5>
                                <p class="us-p">Ogura Clutch (Thailand) Co.,Ltd.</p>

                                <br>
                                <h5>  Address</h5>
                                <p class="us-p">7/283 Moo 6 Tambon Mapyangphon Amphoe Pluakdaeng Rayong 21140.</p>

                                <br>
                                <h5>  Founded </h5>
                                <p class="us-p">August 3, 2009</p>

                                <br>
                                <h5> Telephone </h5>

                                <li class="us-li">Tel: +66(0)38-650 880-4</li>
                                <li class="us-li">Fax: +66(0)38-650 879 </li>


                                <br>
                                <h5> Overseas Offices </h5>

                                <li class="us-li"> Ogura Clutch Co.,Ltd (Japan)</li>
                                <li class="us-li"> Ogura Industrial Corporation (U.S.A.)</li>
                                <li class="us-li"> Ogura Corporation (U.S.A.)</li>
                                <li class="us-li"> Ogura S.A.S．(France)</li>
                                <li class="us-li"> Ogura Clutch (Dong Guan) CO.,LTD. (China)</li>
                                <li class="us-li"> Ogura Clutch (Wuxi) CO.,LTD. (China)</li>
                                <li class="us-li"> Ogura Clutch (Changxing) CO.,LTD. (China)</li>
                                <li class="us-li"> Ogura Clutch India PVT.LTD.</li>
                                <li class="us-li"> Ogura Clutch Philippines, Inc.</li>

                                <br>
                                <h5> Employees </span></h5>
                                <p class="us-p">250-400 member.</p>

                                <br>
                                <h5> Business </span></h5>
                                <p class="us-p">Manufacture and sale of various types of clutch for general industry
                                    (for office
                                    machine, machine tools, construction machines and industrail machines.), fiber
                                    tensioner, automotive A/C clutches, superchargers, power clutches, oil mist
                                    separators,jet coolant systems, disaster prevention systems, etc</p>

                                <br>
                                <h5> Office </span></h5>
                                <p class="us-p">Rayong Office </p>

                                <br>

                                <h5> Plants </h5>
                                <p class="us-p"> 3 Plants. </p>

                                <br>

                                <h5> Capital </h5>
                                <p>&nbsp; </p>

                                <br>

                                <h5> Affiliated Company </h5>

                                <li class="us-li"> TOKYO SEIKO CO.,LTD.</li>
                                <li class="us-li"> TOYO CLUTCH CO.,LTD.</li>
                                <li class="us-li"> SANSEN CO.,LTD.</li>

                            </div>



                            <div>
                                <br>
                                <div class="card-header col-md-12 col-12 div-color" id="">
                                    <h4><i class="fas fa-map-marker-alt" style="color:red"></i> Map</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-6 mr-lg-11 col-12 map-css meu top-mar">
                                            <img src="image/c.png" alt="" srcset="" class="responsive">
                                        </div>
                                        <div class="col-lg-6 mr-lg-11 col-12 map-css meu top-mar">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.977996310468!2d101.1161252143537!3d12.97325911835309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102c2f8e90baa21%3A0xf1a52a404ea5be17!2z4Lia4Lij4Li04Lip4Lix4LiXIOC5guC4reC4geC4uOC4o-C4sCDguITguKXguLHguJfguIrguYwgKOC5hOC4l-C4ouC5geC4peC4meC4lOC5jCkg4LiI4LmN4Liy4LiB4Lix4LiU!5e0!3m2!1sth!2sth!4v1566191137793!5m2!1sth!2sth"
                                                width="500" height="400" frameborder="0" style="border:"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>

                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.977996310468!2d101.1161252143537!3d12.97325911835309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102c2f8e90baa21%3A0xf1a52a404ea5be17!2z4Lia4Lij4Li04Lip4Lix4LiXIOC5guC4reC4geC4uOC4o-C4sCDguITguKXguLHguJfguIrguYwgKOC5hOC4l-C4ouC5geC4peC4meC4lOC5jCkg4LiI4LmN4Liy4LiB4Lix4LiU!5e0!3m2!1sth!2sth!4v1566191137793!5m2!1sth!2sth"
                                        width="500" height="400" frameborder="0" style="border:"
                                        allowfullscreen></iframe>
                                </div>
                            </div>

                        </div>



                    </div>
                </div>

                <div id="tab2" class="tabcontent">

                    <?
                    include('email-tab2.php');
                    
                    ?>
                </div>






            </div>
        </div>


</body>
<script>
function link_session() {

    location.href = "#section3";
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

        if (this.hash !== "") {
            // Prevent default anchor click behavior
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
document.getElementById("defaultOpen").click();
</script>

</html>