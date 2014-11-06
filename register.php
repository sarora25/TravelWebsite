<?php
    //Description: This page lets the user type in a username and password, and put them into the database
    //Code based from: http://www.w3schools.com/php/php_forms.asp

require_once("includes/db.php");

/**other variables */
$userNameIsUnique = true;
$passwordIsValid = true;
$userIsEmpty = false;
$passwordIsEmpty = false;
$password2IsEmpty = false;

$username = "";
$password = "";
$password2 = "";



/** Check that the page was requested from itself via the POST method. */
if ($_SERVER['REQUEST_METHOD'] == "POST"){

    if (isset($_POST['username'])){
        $username = $_POST['username'];
    }
    if (isset($_POST['password'])){
        $password = $_POST['password'];
    }
    if (isset($_POST['password2'])){
        $password2 = $_POST['password2'];
    }

    
    /** Check whether the user has filled in the name in the text field "user" */
    if ($username==""){
        $userIsEmpty = true;
    }
    
    /** Create database connection */
    
    $ID = VPDB::getInstance()->get_id_by_username($username);
    if ($ID) {
        $userNameIsUnique = false;
    }

    /** Check whether a password was entered and confirmed correctly */
    if ($password=="")
    $passwordIsEmpty = true;
    if ($password2=="")
    $password2IsEmpty = true;
    if ($password!=$password2) {
        $passwordIsValid = false;
    }

    /** Check whether the boolean values show that the input data was validated successfully.
     * If the data was validated successfully, add it as a new entry in the database.
     * After adding the new entry, close the connection and redirect.
     */
    if (!$userIsEmpty && $userNameIsUnique && !$passwordIsEmpty && !$password2IsEmpty && $passwordIsValid) {
        VPDB::getInstance()->create_user($_POST['username'], $_POST['password']);
        session_start();
        $_SESSION['username'] = $_POST['username'];
        header('Location: index.php' );
        exit;
    }
}
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"</link>
        <title>Vertical Prototype Create A User</title>
    </head>
    <body>

            <form name ="register" class="well" action="register.php" method="POST" style="visibility:visible"> 
                <!--well-grey background form-inline, puts the classes titled "forms-groups" in line.-->
                <div class="form-group"> 
                    <input type="text" class="form-control" placeholder="Username" name="username"> <!--form-control gives input box a rounded design-->
                    <?php
                    /** Display error messages if "user" field is empty or there is already a user with that name*/
                    if ($userIsEmpty) {
                        echo ("Enter a Username");
                        echo ("<br/>");
                    }
                    if (!$userNameIsUnique) {
                        echo ("Username Already Exsists");
                        echo ("<br/>");
                    }
                    ?>
                </div>


                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <?php
                    /** Display error messages if the "password" field is empty */
                    if ($passwordIsEmpty) {
                        echo ("Enter a password");
                        echo ("<br/>");
                    }
                    ?>
                </div>


                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password2">
                    <?php
                     /** Display error messages if the "password2" field is empty
                      * or its contents do not match the "password" field
                     */
                     if ($password2IsEmpty) {
                        echo ("Confirm your password");
                        echo ("<br/>");
                     }
                     if (!$password2IsEmpty && !$passwordIsValid) {
                        echo ("<div>The passwords do not match</div>");
                        echo ("<br/>");
                     }
                     ?>
                </div>

                

                <button type="submit" class="btn btn-primary">Create User</button> 
            </form>
    </body>

</html>