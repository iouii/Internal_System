<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>
    
    <script src="jquery-3.5.1.slim.min.js" ></script>
    <script src="bootstrap/js/popper.min.js" ></script>
    <script src="bootstrap/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <!--load all styles -->
    <title>OguraClutch (Thailand) </title>
</head>

<body>
    <style>
    body {
        background-color: #003366;
        overflow-x: hidden !important;
    }
    ul {
        list-style-type: circle;
    }
    a.textlast:hover {
        color: #FFFF00 !important;
    }
    #section0 {
        background-color: #ffffff;
        height: 100px;
    }
    .menu {
        font-size: 40px;
        text-align: center;
        padding-top: 12px;
        color: #004d99;
    }
    .logoen {
        margin-left: auto;
        margin-right: auto;

        margin-bottom: 50px;
    }

    .foot {
        margin-top: 50px;
    }

    .foot a {
        color: #fff;
    }

    .responsive {
        width: 100%;
        max-width: 350px;
        height: auto;

    }

    @media screen and (min-width: 751px) {
        div.menu {
            font-size: 40px;
        }
    }

    @media screen and (max-width: 750px) {
        div.menu {
            font-size: 20px;
        }
    }



    @media screen and (min-width: 1301px) {
        img.logoen {
            margin-top: 80px;
        }
    }

    @media screen and (max-width: 1300px) {
        img.logoen {
            margin-top: 150px;
        }
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 10px;
        padding-bottom: 10px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        border: 1px solid #888;
        width: 100%;
        height: 100%;
    }
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
    </style>


    </head>
    <script type="text/JavaScript">

        setTimeout("location.href = 'index.php';",7000);

</script>
    <!--<body onload="open();">-->

    <body >


        <div class="col-lg-12 col-md-12 col-12 ">
            <center>
                <img src="images/icon/logo.png" class="logoen responsive">
            </center>
        </div>

        <section id="section0" class="col-lg-12 col-md-12 col-12">

            <div id="menu" class="menu  ">


                <b>
                    <p> Welcome To Ogura Clutch (Thailand) Intranet </p>
                </b>


            </div>

        </section>


        <div class="foot">
            <center>
                <p><a href="Index.php" onMouseOut="MM_swapImgRestore()"
                        onMouseOver="MM_swapImage('Image2','','images/Entersite.png',1)"><img
                            src="images/icon/enter_site.png" onmouseover="this.src='images/icon/enter_site1.png'"
                            onmouseout="this.src='images/icon/enter_site.png'" name="Image2" width="250px"
                            height="100px" border="0"></a>

                    <li>
                        <p>
                            <h6><i class='fas fa-circle' style='font-size:8px;color:#ffffff;'></i><a
                                    href='images/PDF/10rule.pdf' target="_Blank" class="textlast"> 10 Rule of
                                    Security
                                    Data</h6></a></span>
                        </p>
                    </li>
                    <li>
                        <p>
                            <h6><i class='fas fa-circle' style='font-size:8px; color:#ffffff;'></i><a
                                    href='images/PDF/OCTRules_Regulation.pdf' target="_Blank" class="textlast">
                                    Computer
                                    & Networking Security </h6></a></span>
                        </p>
                    </li>

            </center>


        </div>

        <div id="myModal2" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Some text in the Modal..</p>
            </div>

        </div>
    </body>
    <script>
    var modal = document.getElementById("myModal2");
    var btn = document.getElementById("myBtn2");
    var span = document.getElementsByClassName("close")[0];
    function open() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

</html>