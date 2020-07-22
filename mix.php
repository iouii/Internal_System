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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>Document</title>
</head>
<style>
@media (min-width: 768px) {

    /* show 3 items */
    .carousel-inner .active,
    .carousel-inner .active+.carousel-item,
    .carousel-inner .active+.carousel-item+.carousel-item,
    .carousel-inner .active+.carousel-item+.carousel-item+.carousel-item ,
    .carousel-inner .active+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
        display: block;
    }

  


    .carousel-inner .active.carousel-item{
        position: absolute;
        top: 0;
        right: -33.3333%;
        z-index: -1;
        display: block;
        visibility: visible;
    }

 
}

.card-news{

  height:300px;
  width:300px;
}

.card-img-top{
    width:auto;
    height:150px;
}
</style>
<?php 
include "connect.php";
mssql_select_db("Web_news");

?>
<?php
$sel ="SELECT Ac_id,Ac_name,  Ac_image, AC_description FROM dbo.Ac_Gallery ORDER BY Ac_id DESC ";
$selQuery = mssql_query($sel);
$i=0;
?>

<body>


    <div class="container-fluid">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto">

                <?php
      while($result = mssql_fetch_array($selQuery)) {
        if($i < 1){  ?>
                <div class="carousel-item col-md-3 active">
                    <div class="card card-news">
                   
                        <img class="card-img-top img-fluid" src="images/news/<?php echo $result['Ac_image'];?>"
                            alt="Card image cap">
                            
                        <div class="card-body">
                            <h4 class="card-title"> <?php echo $result['Ac_name']; ?> </h4>
                            <p class="card-text"><small class="text-muted"><a href="\\192.168.10.10\Picture\<?php echo $result['AC_description'];?>" target="_blank">Click
                        View</a></small></p>
                        </div>
                    </div>
                </div>

                <?php
          }else{
        ?>
                <div class="carousel-item col-md-3 ">
                    <div class="card card-news">
                        <img class="card-img-top img-fluid" src="images/news/<?php echo $result['Ac_image'];?>"
                            alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"> <?php echo $result['Ac_name']; ?> </h4>
                            <p class="card-text"><small class="text-muted"><a href="\\192.168.10.10\Picture\<?php echo $result['AC_description'];?>" target="_blank">Click
                        View</a></small></p>
                        </div>
                    </div>
                </div>

                <?php
        }
       $i =$i+1;
             
          }
          ?>




            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</body>

<script>
$(document).ready(function() {
    $("#myCarousel").on("slide.bs.carousel", function(e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 4;
        var totalItems = $(".carousel-item").length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    $(".carousel-item")
                        .eq(i)
                        .appendTo(".carousel-inner");
                } else {
                    $(".carousel-item")
                        .eq(0)
                        .appendTo($(this).find(".carousel-inner"));
                }
            }
        }
    });
});
</script>

</html>