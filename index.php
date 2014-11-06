<!--This is the index.php page -->

<?php 
session_start();
include 'header.php'; ?>	


<center class="realign">
 <!--carousel
 ==============================================-->
	<div id="meCarousel" class="carousel slide" style="bottom:50px;" > <!--carousel adjusts the left and right controls to fit the picture and slide makes slides slide automatically on interaction, wont slide unless you click. slide creates the transition effect-->

		<ol class = "carousel-indicators"> <!--turns ordered list into little circles to click on, aligns bottom middle-->
			<li data-target="#meCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#meCarousel" data-slide-to="1"></li> <!-- -->
			<li data-target="#meCarousel" data-slide-to="2"></li> <!-- each number corresponds to a picture-->
		</ol>

		<div class="carousel-inner"> <!-- arrnges them in slide format: shows 1 at a time, instead of a list of all images shown at once-->
			<div class="item active"> <!--carousel-inner hides all the items, if no item class, it wont be hidden-->
				<a href="listings2.php?q=1" class="slidelink" ><img src="img/homepage/slide1.jpg"/></a>
				<div class="container">
                                    <div class="col-md-5 col-md-offset-3" style="position: relative; left:50px;">
					<div class="carousel-caption" style="padding-top:0px;"> <!-- centers text/whatever at center-bottom of picture, if pic too small, it wont show.-->
						<h4>Twin Peaks, San Francisco CA</h4>
						<!--<p>This tag will contain the text which we want to appear on our slide</p>
						<p><a class="btn btn-large btn-primary">Sign Up</a></p>-->
					</div>
                                    </div>
				</div>
			</div>

			<div class="item">
				<a href="listings2.php?q=5" class="slidelink"><img src="img/homepage/slide2.jpg"/></a>
				<div class="container">
                                    <div class="col-md-5 col-md-offset-3" style="position: relative; left:50px;">
					<div class="carousel-caption" style="padding-top:0px;">
						<h4>Pier 39, San Francisco CA</h4>
					</div>
                                    </div>
				</div>
			</div>
			<div class="item">
				<a href="listings2.php?q=6" class="slidelink"><img src="img/homepage/slide3.jpg"/></a>
				<div class="container">
                                    <div class="col-md-5 col-md-offset-3" style="position: relative; left:50px;">
					<div class="carousel-caption" style="padding-top:0px;">
						<h4>Applebee's (Fisherman's Wharf), San Francisco CA</h4>
					</div>
                                    </div>
				</div>
			</div>

		</div>
		
		<a class="left carousel-control" href="#meCarousel" data-slide="prev"> <!-- data-slideprev goes to previous image-->
			<!--left generates the blackwhite transitioned background for left glyphicon, carousel-control positions the link/button to the left instead of on the bottom and turns button white instead of blue-->
			<span class="glyphicon glyphicon-chevron-left"> </span> <!--glyphicon gives you access to the glyphicons, glyphchevronleft makes the graphic visible and genreates the left button graphic-->
		</a>

		<a class="right carousel-control" href="#meCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"> </span>
		</a>
	</div>	
</center>
		
		