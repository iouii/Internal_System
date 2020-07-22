<?php 
include "connectsql.php";
mssql_select_db("Web_news");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<style>
.thumbnail_slider_area{

  margin-top:20px;
}
body{
  background-color: #2d7ad2 !important;
  color:#ffffff;
}
.neww{

  z-index:2px;
}
.signle_iteam a{
  color:#fff;
}
</style>
<body>
<!--
<?php/*
$sel = "SELECT TOP 5  * FROM dbo.Ac_Gallery ORDER BY Ac_id DESC ";
$selQuery = mssql_query($sel);
$i = 0;
?>

 <div class="latest_newsarea col-md-12 col-12"> <span class="cole col-md-12 col-12"> News Update!!</span>
      <ul id="ticker01" class="news_sticker">
        <?php
      while($result = mssql_fetch_array($selQuery)) {
          if($i < 3){
              ?>

              <li>  <img src="image\ic-new.gif" alt=""><a href="\\192.168.10.10\Picture\<?php echo $result['AC_description'];?>" target="_blank"><?php echo $result['Ac_name']; ?></a></li>
       <?php
          }else{
        ?>
             <li><a href="\\192.168.10.10\Picture\<?php echo $result['AC_description'];?>" target="_blank"><?php echo $result['Ac_name']; ?></a></li>
        <?php
          }

       $i = $i + 1;
      }
      */?>
      </ul>
    </div>
    -->
<?php
$sel = "SELECT Ac_id,Ac_name,  Ac_image, AC_description FROM dbo.Ac_Gallery ORDER BY Ac_id DESC ";
$selQuery = mssql_query($sel);
$i=0;
?>



    <div class="thumbnail_slider_area ">

        <div class="owl-carousel">
            <?php
      while($result = mssql_fetch_array($selQuery)) {
        if($i < 3){ ?>
            <div class="signle_iteam"><img src="images/news/<?php echo $result['Ac_image'];?>" alt="">
                <br>
                <p> <?php echo $result['Ac_name']; ?> </p>
                <p><a href="\\192.168.10.10\Picture\<?php echo $result['AC_description'];?>" target="_blank">Click
                        View</a></p>
            </div>
            <?php
          }else{
        ?>
         <div class="signle_iteam"> <img src="images/news/<?php echo $result['Ac_image'];?>" alt="">
                <br>
                <p> <?php echo $result['Ac_name']; ?> </p>
                <p><a href="\\192.168.10.10\Picture\<?php echo $result['AC_description'];?>" target="_blank">Click
                        View</a></p>
            </div>
            <?php
        }
       $i =$i+1;
             
          }
          ?>

        </div>

    </div>

    
    

</body>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.li-scroller.1.0.js"></script>
<script src="assets/js/custom.js"></script>

</html>