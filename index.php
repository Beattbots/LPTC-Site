<!DOCTYPE html>
<html>
<head>
<title>LPTCDojo | Be cool</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://cdn.jsdelivr.net/jquery.sidr/2.2.1/stylesheets/jquery.sidr.dark.min.css" rel="Stylesheet" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css?v=1.267" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Scientist Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script> 
	window.onload = updateCal;
	hidden = 0;
	$("document").ready(function(){
		$("#Button").click(function(){		
		if (hidden == 1){
			hidden = 0;
			$(".newentry").addClass("hideentry");
			$(".newentry").removeClass("newentry");
			$(".TomButton2").addClass("TomButton");
			$(".TomButton2").removeClass("TomButton2");
		}else{
			$(".hideentry").addClass("newentry");
			$(".hideentry").removeClass("hideentry");
			console.log("test");
			hidden = 1;
			$(".TomButton").addClass("TomButton2");
			$(".TomButton").removeClass("TomButton");
		}})
	})
	var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sept", "Oct", "Nov", "Dec" ];
	function updateCal(){
		url = "https://www.googleapis.com/calendar/v3/calendars/lofjdpkf8618f8ussbovmjkehc@group.calendar.google.com/events?key=AIzaSyACXx9RDMoj8hYQWEM2OhVyhPKHuT21y3I&orderBy=startTime&singleEvents=True"
		$.getJSON(url, function(data) {
			var first = true;
            for(var i = 0; i < data["items"].length; i++){
            	try{
               		eventStarts = new Date(data["items"][i]["start"]["dateTime"].split("T")[0]);
                }catch(err){
                	eventStarts = new Date(data["items"][i]["start"]["date"]);
                }
             	var date = new Date()
             	if(eventStarts => date){
             		month = months[eventStarts.getMonth()];
             		date = eventStarts.getDate();
             		info = data["items"][i].description;
             		if(first == true){
             			document.getElementById("date").innerHTML = date + "<small>" + month + "</small>";
             			document.getElementById("info").innerHTML = info;
             			first = false;
						newentry = new $(".entry").clone();
						x = 1;
						$(".TomButton").toggle();
             		}else{
             			entry = newentry.clone();
             			dateElement = entry.find("span");
             			dateElement.html(date + "<small class='dateSmall'>" + month + "</small>");
             			dateElement.attr("class", "dateSmall");
             			infoElement = entry.find("p");
             			infoElement.html(info);
						x=x+1
						if(x>2){
							entry.addClass("hideentry");
							entry.removeClass("entry");
						}else {
							$(".TomButton").toggle(); 
						}
						hidden = 0;
             			$(".content-bottom-top").append(entry);
             		}
             	} 
            }
		});
	}
</script>
<?php
    include_once('includes/dbconnect.php');
    $sql = 'Select Header From Settings';
    $result = $connection->query($sql);
    if($result->num_rows > 0){
    	$row = $result->fetch_assoc();
    	echo($row['Header']);
    }
?>
</head>
<body>
<!--header-->
<div class="header">
	<div class="container-fluid">
			<div class="top-nav container-fluid">
				<span class="menu"><img src="images/menu.png" alt=""> </span>
				<div class="collapse navbar-collapse" id="myNavbar">
					<?php
						include('Content/siteNavigation.php');
					?>		
				</div>		
			</div>
		<div class="clearfix"> </div>
	</div>
	<script src="https://cdn.jsdelivr.net/jquery.sidr/2.2.1/jquery.sidr.min.js"></script>
	<script>
		$(document).ready(function (){
			$('.menu').sidr({
				name: 'respNav',
				source: '.navbar-collapse',
				side: 'right'
			});			
		});
		$(document).bind("click", function(){
			$.sidr('close', 'respNav');
		});
	</script>
<!---->
</div>
<div class="content">
	<div class="container">
		<!--content-top-->
		<div class="content-top">
			<div class="content-top1">
				<div class=" col-md-4 grid-top">
					<div class="slanted">
						<div class="slanted-content">
					 		<i class="glyphicon glyphicon-edit "></i>
					  		<div class="caption">
								<h3>What is Coderdojo</h3>
								<p>Coderdojo is a programming club for those aged 7 to 17 that was founded in July, 2011 by James Whelton and Bill Liao</p>
					  		</div>
					  	</div>
					</div>
				</div>
			  	<div class=" col-md-4 grid-top">
					<div class="slanted">
						<div class="slanted-content">
							<i class="glyphicon glyphicon-book"></i>
							<div class="caption">
								<h3>Educational</h3>
								<p>Learning to program has been proved to be beneficial in the workplace.</p>
							</div>
						</div>
					</div>
				</div>
				<div class=" col-md-4 grid-top">
					<div class="slanted">
						<div class="slanted-content">
							<i class="glyphicon glyphicon-time"></i>
							<div class="caption">
								<h3>It is fun</h3>
								<p>Coderdojo isn't like school, it is a friendly envoirment where kids teach kids and learn to do things that excite them</p>
					  		</div>
						</div>
					</div>
				</div>
			<div class="clearfix"> </div>
		</div>
		</div>
		<!--//content-top-->
		<!--cpntent-mid-->
		<div class="content-middle">
			<div class="clearfix"> </div>
			<div class="row" id="dojo-info">
				<div class="col-md-6">
					<p><b>LPTCDojo</b> is on every Saturday from 1pm to 3pm in Hewlett-Packard, Lexlip</p>
					<br>
					<p>There are tables dedicated to Scratch, HTML, Javascript, Lua, C#, Swift and every other language you can think of.</p>
					<br>
					<p>Please bring:</p>
					<ul style="padding-left:40px;">
						<li>A snack if needed</li>
						<li>A laptop</li>
						<li>A parent or guardian if you are under 12</li>
					</ul>
				</div>
				<div class="col-md-6">
					<div class="responsive-iframe-container">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2381.3859564742284!2d-6.514396948981207!3d53.35424728172277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48677190075bd537%3A0x19c1e4d2ab9cd016!2sHewlett-Packard!5e0!3m2!1sen!2sie!4v1477676294849" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
		<!--//content-mid-->
		<!--content-left-->
	</div>
	<div class="content-right">
		<script src="js/quotes.js">
			setupQuotes("js/quotes.json");
		</script>
		<div class="col-md content-right-top">
			<p id="Quote" class="quotes"></p>
			<p id="Source" class="quotes"></p>
		</div>
		<div class="clearfix"> </div>
	</div>
	<div class="content-bottom">
        <div class="container content-bottom-top" style="text-align:center">
			<h4>Upcoming Events</h4>
			<div class="entry">
            	<div style="float:left;position:absolute;">
                	<span id="date"><small></small></span>
            	</div>
            	<div>
            		<p id="info">There are no events comming up</p>
        		</div>
        		<div class="clearfix"> </div>
        	</div>
		</div>
	</div>	
	<img src="images/Arrow.png" alt="" id="Button" class="TomButton">
</div>
<div class="footer">
	<div class="container">
		<div class="col-md-4 footer-top">
			<h3><a href="http://www.coderdojo.com">coderdojo</a></h3>
		</div>
		<div class="col-md-4 footer-top1">
			<ul class="social">
				<li><a href="https://www.facebook.com/Coderdojo-Leixlip-216306561898011/?fref=ts"><i class="facebook"> </i></a></li>
				<li><a href="https://twitter.com/LPTCDojo"><i class="twitter"></i></a></li>
			</ul>
		</div>
		<div class="col-md-4 footer-top2">
			<p >Designed by <a href="http://rianscode.com/" target="_blank">Rían Errity</a> | Developed by <a href="http://beattbots.com/" target="_blank">Richard Beattie</a> | Calendar Maintained by Tom Armstrong</p>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
</body>
</html>
