
<?

$a = 3000;
$b = 259;

$c = ($a % $b);

$d = floor($a/$b) ;
$i =  0;
$t = 15;
$o = 2;


    for (++$i; $i <= $t; $i++) {

        $i++;

        echo "The number is: $i <br>";
    }
 

 $filName = "Testcal.csv"; 
$objWrite = fopen("Testcal.csv", "w"); 
$no_Csv=1;
fwrite($objWrite,);
while($objResult) 
{ 
fwrite($objWrite, "\"$no_Csv\",\"$objResult[Emp_Email]\",\"$objResult[Emp_Name]\","); 
fwrite($objWrite, "\"$objResult[Emp_SurName]\",\"$objResult[Emp_NickName]\","); 
fwrite($objWrite, "\"$objResult[Pos_Name]\",\"$objResult[Dep_Name]\",\"$objResult[Emp_Nationality]\" \n"); 
$no_Csv++;
} 
fclose($objWrite); 

echo($c);
echo("//////");
    echo($d);
?>
