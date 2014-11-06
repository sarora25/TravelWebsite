
<?php

//Description: This page only has an upload button
//The user selects the picture they want to upload, and if it meets the criteria, then it will be uploaded to the database
//Code based from: http://www.w3schools.com/php/php_file_upload.asp

//This Block of code checks to see if the uploaded picture fits the formats: gif, jpeg, jpg, png
//If the upload is successful, it echoes back the temp name, name, size, and format of the file
//The image will also be uploaded to the server
error_reporting(E_ALL ^ E_NOTICE);
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    //If the file exsists, an error message is sent, and the picture does not get uploaded.
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  //echo "Invalid file";
  }
?> 


<!-- This is a form with just a browse button to locate the picture -->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"</link>
        <title>Vertical Prototype Create A User</title>
    </head>
<body>

<form action="postlogin.php" method="post" enctype="multipart/form-data" class="well form-inline" enctype="multipart/form-data">
	<div class="form-group">
		<label for="file">Filename:</label> 
	</div>
	
	<div class="form-group">
		<input type="file" name="file" id="file" class="form-control"><br>
	</div>
	
	<div class="form-group">
		<input type="submit" name="submit" value="Submit" class="form-control">
	</div>
	
</form>

</body>
</html> 