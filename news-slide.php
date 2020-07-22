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
.neww{

z-index:2px;
}
.thumbnail_slider_area{

margin-top:20px;
}
body{
   /* background-color: rgb(232, 232, 232) !important;*/
   background-color:#444343;
}
.slide-a{
color
}
</style>
<?php 
include "connectsql.php";
mssql_select_db("Web_news");

?>
<?php
$sel = "SELECT TOP 4  * FROM dbo.Ac_Gallery ORDER BY Ac_id DESC ";
$selQuery = mssql_query($sel);
$i = 0;
?>
 
      <ul id="ticker01" class="">
        <?php
      while($result = mssql_fetch_array($selQuery)) {
          if($i < 3){
              ?>

              <li>  <img src="image\ic-new.gif" alt=""><a class="slide-a" href="\\192.168.10.10\Picture\<?php echo $result['AC_description'];?>" target="_blank"><?php echo $result['Ac_name']; ?></a></li>
       <?php
          }else{
        ?>
             <li><a href="\\192.168.10.10\Picture\<?php echo $result['AC_description'];?>" target="_blank"><?php echo $result['Ac_name']; ?></a></li>
        <?php
          }

       $i = $i + 1;
      }
      ?>
      </ul>
 
    
</body>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.li-scroller.1.0.js"></script>
<script src="assets/js/custom.js"></script>

</html>