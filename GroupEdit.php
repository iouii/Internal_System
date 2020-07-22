<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="unicorn/css/bootstrap.min.css">
    <link rel="stylesheet" href="unicorn/css/unicons.css">
    <link rel="stylesheet" href="unicorn/css/owl.carousel.min.css">
    <link rel="stylesheet" href="unicorn/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="unicorn/css/tooplate-style.css">
    <link rel="stylesheet" href="bbc.css">
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>


    <title>OguraClutch</title>
</head>
<?php

    include "chksession.php";
    include "connect.php";	
	
	
    $Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
    $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
    $Grp_IdEditCode=$_GET["Grp_Id"];
    $Grp_Id=base64_decode(base64_decode("$Grp_IdEditCode"));
    $sqlMem = "select * from Groups where Grp_Id='$Grp_Id'";
    $queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
    $rsT= mssql_fetch_array($queryMem);
	

?>


<script type="text/javascript">

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

</script>
</head>
<body>


<div class="container-fluid">

<div class="row">
<div class="col-lg-12 col-md-12 col-12 ">
<h3 class="ed-head">Edit Group</h3>
<br>
  <form id="form1" name="form1" method="post" action="GroupEditSave_DB.php">
    

          <div class="form-group row was-validated">
                    <label for="Grp_Name" class="col-sm-4 col-form-label">Groups Name :</label>
                    <div class="col-sm-8">
                        <input name="Grp_Name" type="text" id="Grp_Name" size="35" maxlength="35"
                            class='form-control in-pu' value="<?=$rsT['Grp_Name']?>" required />
                            <input name="Grp_Id" type="hidden" id="Grp_Id" value="<?=$rsT['Grp_Id']?>" />
                            <input name="Grp_NameOri" type="hidden" id="Emp_NumberOri" value="<?=$rsT['Grp_Name']?>" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Grp_Note" class="col-sm-4 col-form-label">Groups Note :</label>
                    <div class="col-sm-8">
                        <textarea name="Grp_Note" id="Grp_Note" cols="40" rows="5"
                            class='form-control in-pu'></textarea>

                        <br>
                        <center>
                            <input type="submit" name="button" id="button" value="Save" class="btn btn-primary" />
                            <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-primary" />
                            <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
                        </center>
                    </div>
                </div>
        </form>
      <p>&nbsp;</p>
      </p>
</div>

   

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../js/logging.js'></script>
</body>
</html>
