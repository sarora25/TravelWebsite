<?php
    
require_once ("Includes/connectDB.php");
require_once('globals.php');
    
  //   ini_set('display_errors',-1);
//error_reporting(E_ALL);

      function assertValidUpload($code)
    {
        if ($code == UPLOAD_ERR_OK) {
            return;
        }
 
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $msg = 'Image is too large';
                break;
 
            case UPLOAD_ERR_PARTIAL:
                $msg = 'Image was only partially uploaded';
                break;
 
            case UPLOAD_ERR_NO_FILE:
                $msg = 'No image was uploaded';
                break;
 
            case UPLOAD_ERR_NO_TMP_DIR:
                $msg = 'Upload folder not found';
                break;
 
            case UPLOAD_ERR_CANT_WRITE:
                $msg = 'Unable to write uploaded file';
                break;
 
            case UPLOAD_ERR_EXTENSION:
                $msg = 'Upload failed due to extension';
                break;
 
            default:
                $msg = 'Unknown error';
        }
 
        throw new Exception($msg);
    }
 
    $errors = array();
    
    if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){ //checks if image was passed in the form
        try {
            /*if (!array_key_exists('image', $_FILES)) {
                throw new Exception('Image not found in uploaded data');
            }*/

            $image = $_FILES['image'];

            // ensure the file was successfully uploaded
            assertValidUpload($image['error']);

            if (!is_uploaded_file($image['tmp_name'])) {
                throw new Exception('File is not an uploaded file');
            }

            $imageinfo = getImageSize($image['tmp_name']);

            if (!$imageinfo) {
                throw new Exception('File is not an image');
            }
        }
        catch (Exception $ex) {
            $errors[] = $ex->getMessage();
        }
    }
//print_r ($errors);
//echo (count($errors));
    if (count($errors) == 0) {
        // no errors, so insert the image
        
        if(empty($_POST['listing_id'])){
            echo("<script>alert('2');</script>");
            $p = $_POST['placeOfReview'];
            $p=trim($p);
            
            $qary = mysql_query("SELECT id FROM listings WHERE name ='" . $p ."'");
            //if qary is false redirect to listing is not available for your review. code later!
            $res = mysql_fetch_array($qary);
            $listing_id = $res['id'];
            echo $listing_id;
            if(empty($listing_id)){
                header ("Location: reviewdenied.php");
            }
        }
        else{
            $listing_id = $_POST['listing_id'];
        }
         
           $query = sprintf(  "insert into reviews (place,comment,subject,rating,user_id,listing_id,date_created,filename,mime_type,file_size,file_data)
                values ('%s','%s','%s','%d','%d','%d','%s','%s','%s','%s','%s')",
                $place = $_POST['placeOfReview'],
                $comment =$_POST['comment'],
                $subject =$_POST['title'] , 
                $rating = $_POST['rating'],
                $user_id= $_POST['user_id'],
                $listing_id,
                $date_created =  date("Y-m-d h:m:s"),
                mysql_real_escape_string($image['name']),
                mysql_real_escape_string($imageinfo['mime']),
                $image['size'],
                mysql_real_escape_string(
                file_get_contents($image['tmp_name'])
                )
            );

        //echo $query;
        mysql_query($query, $db);

        $id = (int) mysql_insert_id($db);
        echo mysql_error();
        // finally, redirect the user to view the new image
        //echo 'stored successfully';
        if(!empty($listing_id)){
            header ("Location: reviewconfirm.php");
        }
    }
?>