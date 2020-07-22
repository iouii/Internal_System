<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Drag and Drop table rows in PHP Mysql- ItSolutionStuff.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
    <div class="container">
        <h3 class="text-center">Dynamic Drag and Drop table rows in PHP Mysql - ItSolutionStuff.com</h3>
        <table class="table table-bordered">
        <thead class="row_position">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Defination</th>
            </tr>
            </thead >
            <tbody class="row_position">
            <?php


            require('connect.php');


            $sql = "SELECT * FROM Employee";
            $query = mssql_query($sql);
            while($user =mssql_fetch_array($query)){
          

            ?>
                <tr  id="<?php echo $user[0]; ?>">
                    <td><?php echo $user[1]; ?></td>
                    <td><?php echo $user[2] ;?></td>
                    <td><?php echo $user[3]; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div> <!-- container / end -->
</body>


<script type="text/javascript">
    $( ".row_position" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });


    function updateOrder(data) {
        $.ajax({
            url:"ajaxPro.php",
            type:'post',
            data:{position:data},
            success:function(){
                alert('your change successfully saved');
            }
        })
    }
</script>
</html>