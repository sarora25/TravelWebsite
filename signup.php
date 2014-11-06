<?php
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("login/libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("login/config/db.php");

// load the registration class
require_once("login/classes/Registration.php");

// create the registration object. when this object is created, it will do all registration stuff automaticly
// so this single line handles the entire registration process.
$registration = new Registration();

// show negative messages
if ($registration->errors) {
    foreach ($registration->errors as $error) {
        echo $error;    
    }
}

// show positive messages
if ($registration->messages) {
    foreach ($registration->messages as $message) {
        echo $message;
    }
}

?>



<?php include 'header.php'; ?>

<div class="container contentalign realign" style="padding-left:32px;">
    <div style="position:relative; left:17px;"><h2>Sign Up</h2></div>
    
    <form action="signup.php" method="post" class="form-horizontal" style="position:relative; top:30px;" role="form" name="registerform">
        
        <div class="form-group">
            <label for="login_input_username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-4">
                <input type="text" name="user_name" class="login_input form-control" id="login_input_username" placeholder="Username" pattern="[a-zA-Z0-9]{2,64}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="login_input_password_new" class="col-sm-2 control-label">Password (min. 6 characters)</label>
            <div class="col-sm-4">
                <input type="password" name="user_password_new" class="login_input form-control" id="login_input_password_new" placeholder="Password" pattern=".{6,}" required autocomplete="off" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="login_input_password_repeat" class="col-sm-2 control-label">Verify Password</label>
            <div class="col-sm-4">
                <input type="password" name="user_password_repeat" class="login_input form-control" id="login_input_password_repeat" placeholder="Verify Password" pattern=".{6,}" required autocomplete="off" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="login_input_email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-4">
                <input type="email" name="user_email" class="login_input form-control" id="login_input_email" placeholder="Email" required />
            </div>
        </div>
        
        <div class="form-group" style="position:relative; left:153px;">
             By signing up, you agree to the <a href="#" data-toggle="modal" data-target="#popup"> Terms of Use and Privacy Policy</a> 
        </div>

        <div class="form-group">
            <div class="col-md-offset-5 col-md-3" style="padding-bottom: 30px; position:relative; right:38px;">
                <input type="submit" class="btn btn-info btn-lg" name="register" value="Sign Up!" />
            </div>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>