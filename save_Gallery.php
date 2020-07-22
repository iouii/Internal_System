
<?php
 include "connectsql.php";
 mssql_select_db("Web_news");
////////////////////into image////////////////////////
//delete data
 if(isset($_POST["Del"]))
 {
	if($_POST["Del"] == "Del")
		{
			$del = "DELETE FROM Ac_Gallery WHERE Ac_id = '".$_POST["edit"]."'";

		
		if($_POST["edit"] != 0)
		{
		$delquery = mssql_query($del);
		echo "<script>";
		echo "alert('Delete data completely');";
		echo "window.location='Add_Gallery.php'";
		echo "</script>";
		}else
			{
			echo "<script>";
			echo "alert('Not data Delete');";
			echo "window.location='Add_Gallery.php'";
			echo "</script>";
			}
		}
}
//delete data
$name_image = $_FILES['pho_add']['name']; 
move_uploaded_file($_FILES['pho_add']['tmp_name'],"images/news/". $_FILES['pho_add']['name']); 


/////save File_image
if(isset($_POST['edit']) && $_POST['edit'] != "0"){
if(isset($_POST['edit']) && $_POST['edit'] != "0" ){
	

  $updateedit  = "update Ac_Gallery set Ac_name = '".$_POST['ac_name']."', Ac_datetime = '".$_POST['ac_datetime']."',";
  $updateedit .= " AC_description = '".$_POST['folder_name']."',";

   if( $name_image != "" && isset($_POST["pho_addedit"]) != "")
   		{
   	   		$updateedit .= "Ac_image = '".$name_image."'";
   	   		//echo("1");
   	   		
      	}
  if(isset($_POST["pho_addedit"]) != "" && empty($_FILES["pho_add"]["name"]))
 	 	{
  			$updateedit .= "Ac_image = '".$_POST["pho_addedit"]."'";
  			//echo("2");
  		}
  $updateedit .= "where Ac_id = '".$_POST['edit']."' ";
  $queryedit = mssql_query($updateedit);
 	if( isset($queryedit)){
 		echo "<script>";
		echo "alert('Edit data');";
		echo "window.location='Add_Gallery.php'";
		echo "</script>";
 	}

}else{
	echo "<script>";
		echo "alert('Please data intup  give completely!!');";
		echo "window.location='Add_Gallery.php'";
		echo "</script>";
		
}
}
 
 //echo $name_image;

//echo $_FILES['folder_name']['name'];

 /////save File_image


////////////////////into image////////////////////////
if(empty($_POST['edit']) || $_POST['edit'] == "0"){
$name_image = $_FILES['pho_add']['name']; 
if(($_POST["ac_name"] !=""  && $_POST["ac_datetime"] != "") && ( $name_image != "" && $_POST["folder_name"]) != ""){	
 	
 	//การอัฟโหลดรูปภาพ
	/*move_uploaded_file($_FILES["pho_add"]["tmp_name"],"Photo/".$_FILES["pho_add"]["name"]);
	$insert = "INSERT INTO Add_Gallery(Ad_name,Ad_dateTime,Ad_image,Ad_description) VALUES ('".$_POST["ac_name"]."','".$_POST["ac_datetime"]."','".$ar_image."','".$_POST["ac_description"]."')";
	$query = mssql_query($insert);*/
	//การอัฟโหลดรูปภาพ
	 
	move_uploaded_file($_FILES['pho_add']['tmp_name'],"images/news/". $_FILES['pho_add']['name']); 
	$insert = "INSERT INTO Ac_Gallery(Ac_name,Ac_datetime,Ac_image,AC_description) VALUES ('".$_POST["ac_name"]."','".$_POST["ac_datetime"]."','".$name_image."','".$_POST["folder_name"]."')";	
    $query = mssql_query($insert);
	
if($query != ""){
		
		echo "<script>";
		echo "alert('Save data');";
		echo "window.location='Add_Gallery.php'";
		echo "</script>";
	}
	
	
}
else
{

		echo "<script>";
		echo "alert('Please data intup  give completely!!');";
		echo "window.location='Add_Gallery.php'";
		echo "</script>";
	
}
}



mssql_close();
?>