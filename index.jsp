<%@ page contentType="text/html;charset=UTF-8" language="java"%>
<%@ page import="java.sql.*"%>
<%@ page import="java.lang.*;"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>


<!DOCTYPE html>

<html>
<head>
<title>why are you not working</title>
<meta charset="utf-8" />

</head>

<body>
    <%
        String test = "<b><u>bold and underlined</u></b>";
     %>

    <c:set var="test1" value="<u>underlined</u>" />
    <c:set var="test2" value="${test}" />

    <c:out value="${test}" escapeXml="false" />
    <c:out value="${test1}" escapeXml="false" />
    <c:out value="${test2}" escapeXml="false" />
	
<?php 
include "connectsql.php";
mssql_select_db("Web_news");

?>


   


<body>

<?php
$sel = "SELECT TOP 5  * FROM dbo.Ac_Gallery ORDER BY Ac_id DESC ";
$selQuery = mssql_query($sel);
$i = 0;
?>
 <div class="latest_newsarea"> <span>News Update!!</span>
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
      ?>
      </ul>
    </div>

<?php
$sel = "SELECT Ac_id,Ac_name,  Ac_image, AC_description FROM dbo.Ac_Gallery ORDER BY Ac_id DESC ";
$selQuery = mssql_query($sel);

?>



    <div class="thumbnail_slider_area ">

        <div class="owl-carousel">
            <?php
      while($result = mssql_fetch_array($selQuery)) {
              ?>
            <div class="signle_iteam"> <img src="images/news/<?php echo $result['Ac_image'];?>" alt="">
                <br>
                <p> <?php echo $result['Ac_name']; ?> </p>
                <p><a href="\\192.168.10.10\Picture\<?php echo $result['AC_description'];?>" target="_blank">Click
                        View</a></p>
            </div>
            <?  }
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

</body>
</html>