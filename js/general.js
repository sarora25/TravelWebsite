
//some query functions needed for cool stuff

$(function(){ //gets called on brandname hover?
	$(".tip").tooltip();
});

$(function(){ //when you click a filter the text for filter will change
    $(".dropdown-menu li a").not('#nofilter').click(function(){
      $("#filter").text($(this).text());
      $("#go").val($(this).text());
   });
});

$(function(){ //when you click a filter the text for filter will change special one for "no filter"
    $('#nofilter').click(function(){
      $("#filter").text($(this).text());
      $("#go").val("");
   });
});

$(function(){ //on deselect generate tags
    $(".keyup").blur(function(){ 
        if($(".tag").val()==""){
           $(".tag").val($(this).val()); 
        }
        else{
            if($(this).val() != ""){
                $(".tag").val($(".tag").val() + " " + $(this).val());
            }
        } 
     });
     
     
     $(".keyupspecial").blur(function(){ //on deselect generate tags special one for type dropdown
        if($(".tag").val()==""){
           $(".tag").val($(this).val() + ' '+ $(this).val()+'s'); 
        }
        else{
            if($(this).val() != ""){
                $(".tag").val($(".tag").val() + " " + $(this).val() + ' '+ $(this).val()+'s');
            }
        } 
     });
});

$(function(){ //clear forms
    $('#revcancel').click(function(){
      $("#new-title").val("");
      $("#new-review").val("");
      $("#new-place").val("");
      $("#image").val("");
   });
   
   $('#listcancel').click(function(){
      $("#new-description").val("");
      $("#new-place").val("");
      $("#new-address").val("");
      $("#new-city").val("");
      $("#new-state").val("");
      $("#new-zipcode").val("");
      $("#new-phonenumber").val("");
      $("#new-website").val("");
      $("#new-tags").val("");
      $("#new-hours").val("");
      $("#image").val("");
   });
   
   $('#imagecancel').click(function(){
       $("#image").val("");
   });
});

$(function(){ //gives popup if either of these fields are blank
    $('#revsubmit').click(function(){     
      if( $("#new-title").val().trim() == "" || $("#new-review").val().trim() == "" || $("#new-place").val().trim() == ""){
          alert('Please enter all required fields.');
          return false;
      }
   });
   
   $('#listsubmit').click(function(){
      if( $("#new-place").val().trim() =="" ||
          $("#new-address").val().trim() =="" ||
          $("#new-city").val().trim() =="" ||
          $("#new-state").val().trim() =="" ||
          $("#new-zipcode").val().trim()==""){
              alert('Please enter all required fields.');
              return false;
      }
   });
});

/*$(document).ready(function() {
	$('#content').load('carousel.php'); //loads when user first visits homepage
});

$('a').not('#privacy').on("click", function(e) {
		var page = $(this).attr('href');
		$('#content').load(page);
		e.preventDefault(); //prevents default page refresh.
	});

$('#content').on("click", ".slidelink", function(e) { //for links inside the content pane after ajax call
		var page = $(this).attr('href');
		$('#content').load(page);
		updateHistory(this);
		if ($(this).attr('class') == "slidelink"){
			e.preventDefault();
		} //prevents default page
		  //carousel wont move if it returns false.
});*/

/*function updateHistory(data){
	var page = $(data).attr('href');
	
	var dataToSave = {
		title: 'page title',
		href: data.href,
		url: page
	};
	history.pushState(		
	dataToSave,
	'page title',
	page
	);
}*/



