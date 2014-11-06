<!--This is the header.php page -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SFSU FAU Joint Software Engineering Project Fall 2013</title>

        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/jquery.fileupload.css">
        
        <script language="javascript" type="text/javascript">
        function limitText(limitField, limitCount, limitNum) {
                if (limitField.value.length > limitNum) {
                        limitField.value = limitField.value.substring(0, limitNum);
                } else {
                        limitCount.value = limitNum - limitField.value.length;
                }
        }
        </script>
        
    </head>
	
    <body>
        <!-- -->
        <!--navigation bar/ Header
        ==============================================-->
        <div class="navbar navbar-default"> <!--navbar pushes nav 10px to left, narbardefault gives gray background-->
            <div class="container"> <!-- centers ? -->
                <div class="navbar-header"> <!-- navbarheader does nothing??-->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
                        <!-- typebutton does nothing?, navbartoggle gives default button a graphic and fixes it to the right.
                        datatogglecollapse enables button to expand and collapse with a transition, datatarget selects what info to display during expand: navbarcollapse class-->
                        <span class="icon-bar"></span> <!-- span tag is like a filler tag..-->
                        <span class="icon-bar"></span> <!-- creates a horizontal bar graphic INSIDE the button-->
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand">
                        <a href="index.php" class="tip brandmod" data-toggle="tooltip" data-placement="left" title="Home"> <!-- navbarbrand changes font and size-->
                            <font face="brush script mt">Eagle Eye</br></font>
                        </a>
                    </div>
                </div>
                <div style="width: 450px; margin-left: auto; margin-right: auto;">
                    <span class="navbar-text" style="position:relative; bottom:10px;">
                        <b>SFSU FAU Joint Software Engineering Project Fall 2013</b>
                    </span>
                </div>
                
                </br></br></br>
                <div class="navbar-collapse collapse col-md-9"> <!-- navbarcollapse allows nav to be seen, collapse callapses nav when nav doesnt fit in view-->
                    <ul id="nav" class="nav navbar-nav" style="position:relative; top:5px;"> <!-- nav removes bullet points from ul, navbarnav makes it horizontal and changes font/color-->
                        <li><a href="index.php" >Home  <span class="glyphicon glyphicon-home"</span> </a></li>
                        <li><a href="addlisting.php">Add a Listing <span class="glyphicon glyphicon-book"</span> </a></li>
                        <!--<li><a href="search.php">Attractions <span class="glyphicon glyphicon-camera"</span> </a></li>
                        <li><a href="search.php">Restaurants <span class="glyphicon glyphicon-cutlery"</span></a></li>-->
                        <li><a href="write.php">Write a Review <span class="glyphicon glyphicon-pencil"</span> </a></li>
                        <li><a href="aboutus.php">About Us <span class="glyphicon glyphicon-info-sign"</span> </a></li>
                    </ul>

                    <p class="navbar-text" style="">
                        <?php
                        
                        if (empty($_SESSION['user_name'])) {
                            echo" <a href=\"signup.php\" class=\"btn btn-info\">Sign Up!</a>";
                            echo" <a href=\"login.php\" class=\"btn btn-success\">Login</a>";
                        }
                        else{
                            echo" <a href=\"login.php?logout\" class=\"btn btn-success\">Logout</a>";
                            echo" Logged in as " . $_SESSION['user_name'] ;
                        }
                        ?>
                    </p>
                    
                </div>					 
            </div> <!--end container-->
        </div> <!--end nav-->
		
		<!--Search Bar
        ==============================================-->
                <div class="container">
                    <div style="width:800px; margin-left: auto; margin-right: auto;">
                        <!--<div class="col-md-9" style="">-->
                            <form id="searchBar" action="search.php" method="get"><!--Norm "place" and "filter" variable will get automatically appended to serach.php -Marco-->
                                <div class="input-group input-group-lg realign" style="z-index:1;">
                                  <!--<span class="input-group-addon"><span class="glyphicon glyphicon-search" style="font-size:15px;"></span></span>-->
                                  <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span id="filter">No Filter</span> <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a>Hotels</a></li>
                                      <li><a>Restaurants</a></li>
                                      <li><a>Attractions</a></li>
                                      <li class="divider"></li>
                                      <li><a id="nofilter">No Filter</a></li>
                                    </ul>
                                  </div><!-- /btn-group -->
                                  <input type="text" name="place" class="form-control" placeholder="Search Places...">
                                  <span class="input-group-btn">
                                        <button type="submit" id="go" name="filter" value="" class="btn btn-default">Go!</button>
                                  </span>
                                </div>
                            </form>
                        <!--</div>-->
                    </div>
                </div>