<?
include "connectEng.php";
require_once "phpmailer/class.phpmailer.php";

	  
	// Encode the image string data into base64 

	  
	// Display the output 
	
	


$select = "SELECT EM.id_depmodel
,EM.id_jobitem
,EM.status_job
,EM.name_responsible
,EM.emailsend
,EM.plandate
,EM.comment_admin
,EM.empid
,EA.adddpmodel_id
,EA.model_subnew
,EMS.model_subid
,EMS.model_drawingid
,EMS.drawing
,EMS.modelname
,EMS.partname
,EM.id_modelact
,EJ.job_itemname
,EN.model_name
,EN.mode_partname
,EN.customer_partname
,EN.id_customer
,EC.cus_name
FROM Eng_ModelAction EM

INNER JOIN Eng_AddDepartmentModel EA ON  EM.id_depmodel = EA.adddpmodel_id

INNER JOIN Eng_ModelSub EMS ON EA.model_subnew = EMS.model_subid

INNER JOIN Eng_JobItemList EJ ON EM.id_jobitem  = EJ.job_itemid

INNER JOIN Eng_newModel EN ON EMS.model_drawingid = EN.model_drawingid

INNER JOIN Eng_Customer EC ON EN.id_customer = EC.cus_id

WHERE EM.status_job = '0' ";

$querymail = mssql_query($select);


$id_depmodel = array();
$id_jobitem = array();
$status_job = array();
$name_responsible = array();
$emailsend = array();
$plandate = array();
$comment_admin = array();
$empid = array();
$adddpmodel_id = array();
$model_subnew = array();
$model_drawingid = array();
$drawing = array();
$modelname = array();
$partname = array();
$modelact = array();
$job_itemname = array();
$model_name = array();
$mode_partname = array();
$customer_partname = array();
$id_customer = array();
$cus_name = array();
while($qry=mssql_fetch_array($querymail)){

$a =  $qry[0];
$b =  $qry[1];
$c =  $qry[2];
$d =  $qry[3];
$e =  $qry[4];
$f =  $qry[5];
$g =  $qry[6];
$h =  $qry[7];
$i =  $qry[8];
$j =  $qry[9];
$k =  $qry[11];
$l =  $qry[12];
$m =  $qry[13];
$n =  $qry[14];
$o =  $qry[15];
$p =  $qry[16];
$q =  $qry[17];
$r =  $qry[18];
$s =  $qry[19];
$t =  $qry[20];
$u =  $qry[21];


array_push($id_depmodel,$a);
array_push($id_jobitem,$b);
array_push($status_job,$c);
array_push($name_responsible,$d);
array_push($emailsend,$e);
array_push($plandate,$f);
array_push($comment_admin,$g);
array_push($empid,$h);
array_push($adddpmodel_id,$i);
array_push($model_subnew,$j);
array_push($model_drawingid,$k);
array_push($drawing,$l);
array_push($modelname,$m);
array_push($partname,$n);
array_push($modelact,$o);
array_push($job_itemname,$p);
array_push($model_name,$q);
array_push($mode_partname,$r);
array_push($customer_partname,$s);
array_push($id_customer,$t);
array_push($cus_name,$u);
}

$numa = count($id_depmodel);

function getNumDay($d1,$d2){


    $dArr1    = preg_split("/-/", $d1);
    list($year1, $month1, $day1) = $dArr1;
    $Day1 =  mktime(0,0,0,$month1,$day1,$year1);

    $dArr2    = preg_split("/-/", $d2);
    list($year2, $month2, $day2) = $dArr2;
    $Day2 =  mktime(0,0,0,$month2,$day2,$year2);

    return round(abs( $Day2 - $Day1 ) / 86400 );

    }

for($i = 0; $i<$numa; $i++){


      $ToDay = date("Y-m-d");

  $today = strtotime($ToDay)/ ( 60 * 60 * 24 );
  $plant  = strtotime($plandate[$i])/ ( 60 * 60 * 24 );

/*
  echo $today;
  echo "/";
  echo $plant;
  echo "<br />";

*/

$cal  = $today - $plant;
try{


    if($cal == -1 OR $cal > 0){

        $to = $emailsend[$i];
        $subject = "Engineer New Model || Drawing :"+$model_drawingid[$i];

        $message = "
        <html>
        <head>
        <title>Engineer New Model || Drawing :".$model_drawingid[$i]."</title>
        </head>
        <body>
        <h4>Dear '".$name_responsible[$i]." </h4>
        Please update information according to the assignment in new model
        <br/>
            <br/>
        <table  style='font-size:14px; margin-top:5px; border: 1px solid black; border-collapse: collapse ;width:100%'>
            <thead style='background-color:#1E1E1E; color:#fff; '>
            <tr>
            <th colspan='5'>MAGNET CLUCTH DETAILS</th>
            </tr>
            </thead>
            <tr style='background-color:#3E3E42;color:#fff;'
            <td align='center' style=' border: 1px solid black; '>Program Name</td>
            <td align='center' style=' border: 1px solid black; '>Customer Name</td>
            <td align='center' style=' border: 1px solid black; '>Drawing#</td>
            <td align='center' style=' border: 1px solid black; '>Model Name</td>
            <td align='center' style=' border: 1px solid black; '>Part Name</td>
            </tr>
            <tr>
            <td align='center' style=' border: 1px solid black; '>".$customer_partname[$i]."</td>
            <td align='center' style=' border: 1px solid black; '>".$cus_name[$i]."</td>
            <td align='center' style=' border: 1px solid black; '>".$model_drawingid[$i]."</td>
            <td align='center' style=' border: 1px solid black; '>".$model_name[$i]."</td>
            <td align='center' style=' border: 1px solid black; '>".$mode_partname[$i]."</td>
            </tr>
        </table>
        <br/>

        <hr>
        <br/>

        <table style='font-size:14px; margin-top:5px; border: 1px solid black; border-collapse: collapse ;width:100%'>
            <thead style='background-color:#0078D4; color:#fff; '>
            <tr>
            <th colspan='5'>ASSIGNMENT DISCRIPTION</th>
            </tr>
            </thead>
            <tr style='background-color:#50D9FF; color:#fff;'>
            <td align='center' style=' border: 1px solid black; '>Drawing#</td>
            <td align='center' style=' border: 1px solid black; '>Model Name</td>
            <td align='center' style=' border: 1px solid black; '>Part Name</td>

            <td align='center' style=' border: 1px solid black; '>Job</td>
            <td align='center' style=' border: 1px solid black; '>Comment</td>
            </tr>
            <tr>
            <td align='center' style=' border: 1px solid black; '>".$drawing[$i]."</td>
            <td align='center' style=' border: 1px solid black; '>".$modelname[$i]."</td>
            <td align='center' style=' border: 1px solid black; '>".$partname[$i]."</td>

            <td align='center' style=' border: 1px solid black; '>".$job_itemname[$i]."</td>
            <td align='center' style=' border: 1px solid black; '>".$comment_admin[$i]."</td>
            </tr>
        </table>
        <br/>
        <br/>
        <br/>
        <a href='octap01:83' >Click here to go to the website.!!</a>
        <br/>
        <br/>*If you have any questions, please contact the engineer department.
        <br/>*This Email Send Automatic You can't reply this e-mail.
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: newmodel@ogura-thai.com' . "\r\n";
        $headers .= 'Cc: oct-engineer@ogura-thai.com' . "\r\n";


        mail($to,$subject,$message,$headers);

                                   }else{

                                    throw new Exception("Not yet due exception");

                                   }


}catch(Exception $e){
    echo "Caught: " . $e->getMessage() . "\n";
}

}







?>