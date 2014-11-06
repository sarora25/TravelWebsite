<!--This is the search.php page-->
<?php 
session_start();
include 'header.php'; 

 /* version 2.0
 */
require_once ("Includes/connectDB.php");

require_once('globals.php');

?>

<div class="container contentalign" style="padding-left:32px;">
    <?php 
 //print_r ( $_SESSION);
 if (isset($_SESSION['userlogin']))
      echo $_SESSION['userlogin']; ?>
    
                
    <!--Test code for search functionality
    implemented by Norm Johnson
    Source taken from http://php.about.com/od/phpwithmysql/ss/php_search.htm
    =============================================
 <p>Outside of search</p>-->
  
 <?php
 if(!empty($_GET['place']) || !empty($_GET['filter'])){ //Norm use this check before you execute any other code.-Marco
   # echo "<p>The variable passed from the search bar is " . $_GET['place'] . "</p>";
   $place = $_GET['place'];
   $place = strtoupper($place); #turns value uppercase
   $place = strip_tags($place); #removes code entered in search
   $place = trim($place); #takes out whitespace
   
   $filter = $_GET['filter'];
   $filter = substr($filter, 0, -1); #removes the plural of the filter to match the column of the table
   $filter = strtoupper($filter); #turns value uppercase
   #echo "<p>Filter value : " . $filter . "</p>";
   # echo "<p>The variable should be uppercase: " . $place . "</p>";
    
    /*if($_GET['place'] == "") #if nothing was entered in search bar  //Dont need this check anymore, because of 'if' check above-Marco
    {
        echo "<p>You forgot to enter something to search for</p>";
        exit;                                                         //Do NOT use 'exit;'!! Exit causes the page to stop rendering, therefore anything after this point wont get executed-Marco
    }*/
    
   # echo "<p>The variable for (" . $place . ") has not been initialized </p>";

   $link = mysql_connect('sfsuswe.com:3306', 'f13g10', 'teamten123');
   if (!$link) {
       die('Could not connect: ' . mysql_error());
   }
   mysql_select_db('student_f13g10');

  # $place = strtoupper($place); #turns value uppercase, moved
  # $place = strip_tags($place); #removes code entered in search, moved
  # $place = trim($place); #takes out whitespace, moved
  # $filter = strtoupper($filter); #turns value uppercase, placed earlier in code when variable is initialized
  # echo "<p>Filter value : " . $filter . "</p>"; #moved
   
   if(!$filter == "NO FILTER")
   {
       $data = mysql_query("SELECT * FROM backup_table WHERE upper(tag) LIKE '%$place%'"); #searches tag list for what user entered
   }
   else 
   {
       $data = mysql_query("SELECT * FROM backup_table WHERE upper(type) LIKE '%$filter%' AND upper(tag) LIKE '%$place%'"); #searches tag list of all entries that match the filter
   }

   $numofmatches=mysql_num_rows($data);
   if($numofmatches == 0)
   {
       $data = mysql_query("SELECT * FROM backup_table WHERE MATCH (tag) AGAINST ('$place, $filter')"); //FULL TEXT SEARCH AS LAST RESORT
       $numofmatches=mysql_num_rows($data); //checks again
       
       if($numofmatches == 0){ //if results is 0 than output message
            echo " <div class =\"container contentalign\" style=\"\">";
            echo "<p>There were no entries matching your results</p>";
            echo "  </div>";
       }
       else # will display the number of entries
       { 
            echo "<div class=\"container contentalign\" style=\"padding-left:32px;\">";
            echo "    <h3>Search Results for " . $_GET['place'] . "</h3>";
            echo $numofmatches . " result(s) found";
       }

   } #end if statement
   else # will display the number of entries
       { 
            echo "<div class=\"container contentalign\" style=\"padding-left:32px;\">";
            echo "    <h3>Search Results for " . $_GET['place'] . "</h3>";
            echo $numofmatches . " result(s) found";
       }
   
   while($result = mysql_fetch_array($data))
   {
       $q = $result['id'];
       $totrat = 0;
       $qry = mysql_query("SELECT * FROM reviews WHERE listing_id = $q order by id desc");
       $reviews = $qry;
       if(mysql_num_rows($qry) != 0)
       {
           $numratings = mysql_num_rows($qry);
           while($fetrow = mysql_fetch_assoc($qry))
           {
               $totrat += $fetrow['rating'];
           }
           $totrat = $totrat / $numratings;
           $rating = round($totrat, 2);
       }    
       else {
          $rating = 'Not yet rated'; 
       }#calculates rating

       
       
       echo "      <div class =\"container\" style=\"\">";
       echo "            <div class=\"col-md-2\">";
       echo "            <h4></h4> <!--leave this empty h4 tag here for proper spacing-->";
       //echo "            <a class=\"col-md-12 no-resize\">";
       if(!empty($result['filename'])){
            echo "       <a href=\"image.php?id=".$result['id']. "\" target=\"_blank\"><img src=image.php?id=".$result['id']. " width=170px height=105px/></a>";
       }
       else{
           echo "       <img src=img/noimage2.png width=170px height=105px/>";
       }
       //echo "            </a>";
       echo "        </div>";
       echo "        <div class=\"col-md-8\" style=\"position: relative; top:11px;\">";
       echo "            <h4 style=\"display:inline; padding-right: 10px;\"><u><a class=\"placename\" href=\"listings2.php?q=" . $result['id'] . "\">" . $result['name'] . "</a></u></h4>";
       echo "            <form action=\"write.php\" method=\"get\" style=\"display:inline;\">";
       echo "              <button name=\"write\" value=\"" . $result['name'] . "\" class=\"label btn-success write2 searchwrite\" style=\"\">Write a Review</button></br>";
       echo "              <input id=\"listing_id-hidden\" name=\"listing_id\" type=\"hidden\" value=\"" . $result['id'] . "\"/>";
       echo "            </form>";
       echo "            <b>Rating: </b>" . $rating . "<span style=\"position:relative; left:15px;\"><b>Price: </b>" . $result['price'] ."</span><br>";
       echo              $result['street_address'].", " . $result['city']. ", " . $result['state']. " " .$result['zip']."<br>";
       echo              $result['contact_phone1']. "<br><a href=\"" . $result['contact_website'] . "\"> ". $result['contact_website'] ."</a><br>";
       
       if(mysql_num_rows($reviews) != 0)
       {
           if(mysql_num_rows($reviews) >= 3)
           {
               $counter = 3;
           }
           else {
               $counter = mysql_num_rows($reviews);
           }

           while ($fetrow = mysql_fetch_assoc($reviews) && counter > 0)
           {
               echo $fetrow["comment"];
               $counter--;
           }
           
       }
       
      # echo "            \"Best trip I ever had!!\"</br>";
      # echo "            \"You will see everything in SF in a day\"</br>";       
       echo "        </div>";
       echo "    </div>";
       echo "    <hr>";
   } #end while loop

   
 /*  $numofmatches=mysql_num_rows($data);
   if($numofmatches == 0)
   {
       echo "<p>There were no entries matching your results</p>";
   } #end if statement    # moved further up in page
  */


 }//end if statement
 else{
       echo " <div class =\"container contentalign\" style=\"\">";
       echo "<p>There were no entries matching your results</p>";
       echo "  </div>";
 }
 ?>

    <!--End search test code -->
    
</div><!--/. container-->                   

<?php include 'footer.php'; ?>