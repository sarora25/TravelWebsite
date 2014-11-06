<!--This is the write.php page -->

<?php
    
session_start();

if (empty($_SESSION['user_name'])) {

header ("Location: login.php");

} 
include 'header.php'; 
include 'Includes/functions.php'; 
//include 'Includes/connect.php';
    require_once ("Includes/connectDB.php");

    require_once('globals.php');
//ini_set('display_errors',1);
//error_reporting(E_ALL);
  
 if (!empty($_GET['listing_id'])){
    $placeid = $_GET['listing_id'];
 }
 else{
     $placeid="";
 }
 
 if (!empty($_GET['write'])){
    $placename = $_GET['write'];
 }
else{
     $placename="";
 }
?>
<!--for filling in the "place" field when directed from a "specific" write a review button-->
	<div id="main" class="container contentalign realign">
		<div style="position:relative; left:17px;"><h2>Write a Review</h2></div>
			
		<div class="col-md-7" style="position:relative; left:235px;">
			<form action="processrev.php" method="post" enctype="multipart/form-data">
	
                                <div class="row" style="margin-top:40px;">
                                        <div class="well well-sm" style="position:relative; bottom:25px;">				
                                                <div class="row" id="post-review-box" >
                                                        <div class="col-md-12">			
                                                                <h3 style="display:inline;">Your Review</h3> <span class="pull-right">** = required field</span><h3></h3>										
                                                                <input id="user_id-hidden" name="user_id" type="hidden" value="<?php  echo $_SESSION['user_id'] ?>"> 
                                                                <input id="listing_id-hidden" name="listing_id" type="hidden" value= "<?php echo $placeid?>"> 

                                                                <input type="text" class="form-control" id="new-place" name="placeOfReview" placeholder="Place, e.g. 'Boom Boom Club' **" rows="1"><br />
                                                                <input type="text" class="form-control" id="new-title" name="title" placeholder="Title, e.g. 'Best night ever!' **" rows="1"><br />
                                                                <textarea class="form-control" cols="50" rows="5" id="new-review" name="comment" placeholder="Enter your review here... **"></textarea><br />

                                                                <div class="text-right">
                                                                        Rating: 
                                                                        <select class = "dropdown" name="rating">
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        </select>
                                                                </div>


                                                                  <table border="2px" style="display:inline-block">   
                                                                    Upload Picture :&nbsp;&nbsp;<br/>
                                                                    <td>  <input type="file" id="image" name="image" /></td>
                                                                  </table>
                                                                  <a href="#" type="button" class="button" id="imagecancel" title="Remove Image" style="position:relative; bottom:7px; color:#000000;" onclick="return false;">
                                                                      <i style="font-size:20px; position:relative; bottom:10px;" class="glyphicon glyphicon-remove-circle"></i>
                                                                  </a>

                                                                <!-- end file input-->
                                                                <br><br>
                                                                <a class="btn btn-warning btn-lg" id="revcancel">Clear Form</a>										                  
                                                                <button class="btn btn-success btn-lg pull-right" id="revsubmit" type="submit" name="submit">Post Review</button>

                                                        </div>
                                                </div>
                                        </div> 
                                </div>
				
			</form>
		</div>
	</div>
<?php include 'footer.php'; ?>
<script>
    $("#new-place").val("<?php echo $placename ?>");
</script>	
