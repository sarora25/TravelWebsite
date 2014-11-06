<!--This is the addlistings.php page -->

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

  //  ini_set('display_errors',1);
//error_reporting(E_ALL);




?>

<div id="main" class="container contentalign realign">
		<div style="position:relative; left:17px;">
                    <h2>Add a Listing</h2>
                    <p>Don't see your listing? Add one to the database!</p>
                </div>
                
			
		<div class="col-md-7" style="position:relative; left:235px;">
            <form method="post" action="process.php" enctype="multipart/form-data">
                
                
                
       	
                                <div class="row" style="margin-top:40px;">
                                        <div class="well well-sm" style="position:relative; bottom:25px;">				
                                                <div class="row" id="post-review-box" >
                                                        <div class="col-md-12">			
                                                                <h3 style="display:inline;">New Listing</h3><span class="pull-right">** = required field</span><h3></h3>										
                                                                
                                                                <input class="form-control keyup" id="new-place" name="place" placeholder="Place, e.g. 'Boom Boom Club' **" rows="1"><br/>                                                   
                                                                <span class='col-md-10 row'>
                                                                    <input class="form-control keyup" id="new-address" name="address" placeholder="Street address, e.g. 544 Edward St. **" rows="1"><br/>
                                                                </span>
                                                                <span class='col-md-5 row' style="">
                                                                    <input class="form-control keyup" id="new-city" name="city" placeholder="City ... **" rows="1"><br/>
                                                                </span>
                                                                <span class='col-md-5' style="">
                                                                    <input class="form-control keyup" id="new-state" name="state" placeholder="State ... **" rows="1"><br/>
                                                                </span>
                                                                <span class='col-md-5 row' style="">
                                                                    <input class="form-control keyup" id="new-zipcode" name="zip" placeholder="Zip Code ... **" rows="1"><br/>
                                                                </span></br>
                                                                <span class='col-md-5' style="">
                                                                    <input class="form-control" id="new-phonenumber" name="phonenumber" placeholder="Phone Number... " rows="1"><br/>
                                                                </span>
                                                                <span class='col-md-5 row' style="">
                                                                    <input class="form-control" id="new-website" name="website" placeholder="Website..." rows="1"><br/>
                                                                </span>
                                                                <textarea class="form-control" rows="5" id="new-description" name="description" placeholder="Enter a description (Max: 400 characters)..." 
                                                                          onKeyDown="limitText(this.form.description,this.form.countdown,400);" 
                                                                          onKeyUp="limitText(this.form.description,this.form.countdown,400);"></textarea>
                                                                          <font size="1">You have <input readonly type="text" name="countdown" size="3" value="400"> characters left.</font>
          
                                                                <div style="padding-top: 15px;">
                                                                    Tags (separate with space, max: 200 char):
                                                                    <textarea class="form-control tag" rows="2" id="new-tags" name="tag" placeholder="Tags (separate with space) (Max: 200 characters)..." 
                                                                    onKeyDown="limitText(this.form.tag,this.form.countdown2,200);" 
                                                                    onKeyUp="limitText(this.form.tag,this.form.countdown2,200);"></textarea>
                                                                    <font size="1">You have <input readonly type="text" name="countdown2" size="3" value="200"> characters left.</font>
                                                                </div>

                                                                <div style="padding-top: 15px;">
                                                                    <span class='col-md-5' style="position:relative; right:15px;">
                                                                        <textarea class="form-control" id="new-hours" name="hours" placeholder="Hours, eg, M-F 10am-6pm" rows="1"></textarea><br/>
                                                                    </span>

                                                                    Price: 
                                                                    <select class = "dropdown" name="price">
                                                                    <option value="Free">Free</option>
                                                                    <option value="$">$</option>
                                                                    <option value="$$">$$</option>
                                                                    <option value="$$$">$$$</option>
                                                                    <option value="$$$$">$$$$</option>
                                                                    <option value="$$$$$">$$$$$</option>
                                                                    </select>

                                                                    <span style="padding-left:10px;"> Type:</span> 
                                                                    <select class = "dropdown keyupspecial" name="type">
                                                                    <option value="">Pick One</option> 
                                                                    <option value="Hotel">Hotel</option>
                                                                    <option value="Restaurant">Restaurant</option>
                                                                    <option value="Attraction">Attraction</option>
                                                                    </select>
                                                                </div>

                                                                </br></br>
                                                           
                                                                  <table border="2px" style="display:inline-block;">   
                                                                    Upload Picture :&nbsp;&nbsp;<br/>
                                                                    <td>  
                                                                        <input type="file" id="image" name="image"/>
                                                                    </td>                                                                   
                                                                  </table>
                                                                  <a href="#" type="button" class="button" id="imagecancel" title="Remove Image" style="position:relative; bottom:7px; color:#000000;" onclick="return false;">
                                                                      <i style="font-size:20px; position:relative; bottom:10px;" class="glyphicon glyphicon-remove-circle"></i>
                                                                  </a>
                                                                
                                                                <br><br>
                                                                <a class="btn btn-warning btn-lg" id="listcancel" >Clear Form</a>										                  
                                                                <button class="btn btn-success btn-lg pull-right" id="listsubmit" type="submit" name="submit">Add Listing</button>

                                                        </div>
                                                </div>
                                        </div> 
                                </div>
				
			</form>
		</div>
	</div>  

<?php include 'footer.php'; ?>