<!DOCTYPE html>
<?php
	session_start();
	if(isset($_SESSION['myusername']) && !empty($_SESSION['myusername']))
	{
		$_SESSION['login'] = true;
		
	}
	else
	{
		die(header("location: login.php"));
	}
?>
<html>
	<head>
		<title>MMU Connect</title>
		<meta name="keywords" content="MMU Connect" />
		<meta name="description" content="Connect MMU Student together and provide multiple services" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<style>
			/* Begin Common CSS */
			* {box-sizing:border-box;}
			ul {list-style-type: none;}
			body {
				font-family: Verdana,sans-serif;
				min-width: 45em;
				position: relative;
			}
			/* End Common CSS */

			/* Begin Event CSS */
			.prevNext{
				color: white;
				outline: none;
				background-color: #3ccdad;
			    border: none;
			    text-decoration: none;
			    display: inline-block;
			    font-size: 1.4em;
			    padding: 0.5em 1.6em;
			    margin-top: -0.2em;
			    cursor: pointer;
			}

			.titleCalendar {
			    padding: 1em;
			    width: 100%;
			    background: #1abc9c;
			}

			.titleCalendar ul {
			    margin: 0;
			    padding: 0;
			}

			.titleCalendar ul li {
			    color: white;
			    font-size: 1.4em;
			    text-transform: uppercase;
			    letter-spacing: 0.3em;
			    font-weight: bold;
			}

			.titleCalendar .prev {
			    float: left;
			}

			.titleCalendar .next {
			    float: right;
			}

			.weekdays {
			    margin: 0;
			    padding: 0.5em;
			    width: 100%;
			    background-color: #ddd;
			}

			.weekdays li {
			    display: inline-block;
			    width: 13.6%;
			    background-color: #ddd;
			    text-align: center;
			    color: #666;
			    font-size:1em;
			    font-weight: bold;
			}

			.days{
			    width: 100%;
			    padding: 0.5em 0;
			    background: #eee;
			    margin: 0;
			}

			.days li{
			    display: inline-block;
			    width: 13.6%;
			    text-align: center;
			    margin-bottom: 0.1em;
			    font-size:0.8em;
			    color: #777;
			}

			.days li .daybutton{
				outline: none;
				border: none;
			    padding: 0.4em;
			    background: #eee;
				color: grey;
			    font-size:1.2em;
			    cursor: pointer;
			}

			.event{
			    margin: 0;
				padding-bottom: 1.5em;
			}

			.event ul{
				margin: 0;
			    padding: 0;
			}

			.event ul li{
				margin-top: 1em;
			}

			.event ul li a{
				font-size: 1em;
				margin-top: -1.5em;
			}

			.event ul .editButton{
				display:inline-block;
				float:right;
			}

			.event ul .deleteButton{
				display:inline-block;
				float:right;
			}

			.event ul .venue{
				display: inline-block;
			    width: 15%;
			    color: #666;
			    text-align: center;
			    font-size:1em;
			    font-weight: bold;
			}

			.event ul .time{
				display: inline-block;
			    width: 15%;
			    text-align: center;
			    font-size:1em;
			    font-weight: bold;
			}

			.event ul .description{
				display: inline-block;
			    width: 73%;
			    color: #666;
			    text-align: left;
			    font-size:1em;
			    font-weight: bold;
			}

			.event ul .content{
				display: inline-block;
			    width: 73%;
			    text-align: left;
			    font-size:1em;
			    font-weight: bold;
			}
			/* End Event CSS */

			/* Begin Calculator CSS */
			h2{
				text-align: center;
				background-color: #3ccdad;
				padding: 0.5em;
				margin:0;
				font-size: 1.4em;
			}

			.result{
				margin: 0;
			    padding: 0;
				width:100%;
			}

			.result ul {
			    margin: 0;
			    padding: 0;
			}

			.result ul .gpa{
				float: left;
				width:50%;
				padding-top: 0.25em;
				padding-bottom: 0.25em;
				text-align: center;
				background-color: #90caf9;
				font-size: 1.4em;
				font-weight: bold;
			}

			.result ul .cgpa{
				float: right;
				width:50%;
				padding-top: 1.25em;
				padding-bottom: 1.25em;
				text-align: center;
				background-color: #64b5f6;
				font-size: 1.4em;
				font-weight: bold;
			}

			.titleCalc{
				margin: 0;
			    padding: 1.5em;
			    width: 100%;
			    background-color: #4ddebe;
			}

			.titleCalc ul{
				margin: 0;
			    padding: 0;
			}

			.titleCalc li{
				float: left;
			    margin-top : -0.6em;
				display: inline-block;
			    text-align: center;
			    color: #666;
			    font-size:1em;
			    font-weight: bold;
			}

			.titleCalc .subno{
			    width: 13%;
			    text-align: left;
			}

			.titleCalc .subname{
				width: 20%;
			}

			.titleCalc .yr{
				width: 13%;
			}

			.titleCalc  .trmstr{
				width: 13%;
			}

			.titleCalc .crdhr{
			    width: 13%;
			}

			.titleCalc .grd{
			    width: 13%;
			}

			.subjectcounter{
				margin: 0;
			    padding: 1.5em;
			    padding-bottom: 2.4em;
				width: 100%;
				background: #ddd;
			}

			.subjectcounter ul{
				margin: 0;
			    padding: 0;
			}

			.subjectcounter ul li{
				display: inline-block;
				float:left;
			    text-align: center;
			}

			.subjectcounter ul li a{
				font-size: 0.88em;
				margin-top: -0.88em;
			}

			.subjectcounter .subjectno{
			    width: 13%;
			    text-align: left;
			}

			.subjectcounter .name{
			    width: 20%;
			}

			.subjectcounter .year{
			    width: 13%;
			}

			.subjectcounter .trimester{
			    width: 13%;
			}

			.subjectcounter .credithour{
			    width: 13%;
			}

			.subjectcounter .grade{
			    width: 13%;
				margin-right: 0.5em;
			}

			.subjectcounter .edit{
				float:left;
			}

			.subjectcounter .delete{
				float:left;
			}

			.addSubjectbutton{
				width: 100%;
				text-align: center;
				margin-bottom: 0.5em;
			}
			/* End Event CSS*/

			/* Add media queries for smaller screens */
			@media screen and (min-width: 95em){
				/* Calculator */
				.titleCalc .subname{width: 20%;}
			}

			@media screen and (max-width: 75em) {
				/* Event */
			    .weekdays li, .days li {width: 13.45%;}
			    .days li .daybutton {padding: 0.5em;}
			    .event ul .description, .event ul .content {width: 71%;}

			    /* Calculater */
			    .titleCalc .subno{ width: 18%; }
				.titleCalc .subname{ width: 24%; }
				.subjectcounter{ padding-bottom: 4em; }
				.subjectcounter .subjectno{ width: 18%; }
			    .subjectcounter .name{ width: 24%;}
			    .subjectcounter ul li{ margin-top: -1em; }
			    .subjectcounter ul li a{ margin-top: 2em; padding: 0.5em 5em; }
			    .subjectcounter .delete{ float: right; }
			}

			@media screen and (max-width: 65em) {
				/* Event */
			    .weekdays li, .days li {width: 13.3%;}
			    .days li .daybutton {padding: 0.6em;}
			    .event ul .venue, .event ul .time {width: 20%;}
			    .event ul .description, .event ul .content {width: 63%;}
			}

			@media screen and (max-width: 55em) {
				/* Event */
			    .weekdays li, .days li {width: 13.15%;}
			    .days li .daybutton {padding: 0.7em;}
			    .event {padding-bottom: 5em;} 
			    .event ul .venue, .event ul .time {width: 25%;}
			    .event ul .description, .event ul .content {width: 70%;}
			    .event ul .editButton { float:left; }
			    .event ul li a { margin-top: 1em; padding: 0.5em 5em; }

			    /* Calculater */
			    .titleCalc { padding-bottom: 2em; }
				.titleCalc li { margin-top: -1.2em; }
			}
		</style>	
	</head>
	<body style="overflow-x: scroll;">
		<!-- Home Page -->
		<div data-role="page" id="home">
			<!-- Header -->
			<div data-role="header">
				<h1>MMU CONNECT</h1>
			</div>
			<!-- Logout button -->
			<div data-role="main" style="text-align: right;">
			<?php
				if(isset($_SESSION['login']) && !empty($_SESSION['login']))
				{ ?>
					<a href="logout.php" id="logout" class="ui-btn ui-btn-inline ui-corner-all"> Logout</a>
					<?php
					echo '<br><strong>Welcome back,'.$_SESSION['myusername'].'!</strong>';
				}
			?>
			</div>
			<!-- Navigation Bar  -->
			<div data-role="navbar">
				<ul>
					<li><a href="#home" class="ui-btn-active ui-state-persist">Home</a></li>
					<li><a href="#calculator">CGPA Calculator</a></li>
					<li><a href="#event">Event Planner</a></li>
				</ul>
			</div>
			<h1 style="text-align: center;">你好不好?</h1>
			<div id="google_translate_element"></div>	
		</div>


		<!-- Calculator Page -->
		<div data-role="page" id="calculator">
			<!-- Header -->
			<div data-role="header">
				<h1>MMU CONNECT</h1>
			</div>
			<!-- Logout button -->
			<div data-role="main" style="text-align: right;">
			<?php
				if(isset($_SESSION['login']) && !empty($_SESSION['login']))
				{ ?>
					<a href="logout.php" id="logout" class="ui-btn ui-btn-inline ui-corner-all"> Logout</a>
					<?php
					echo '<br><strong>Welcome back,'.$_SESSION['myusername'].'!</strong>';
				}
			?>
			</div>
			<!-- Navigation Bar -->
			<div data-role="navbar">
				<ul>
					<li><a href="#home">Home</a></li>
					<li><a href="#calculator" class="ui-btn-active ui-state-persist">CGPA Calculator</a></li>
					<li><a href="#event">Event Planner</a></li>
				</ul>
			</div>
			<!-- Begin Calculator Code -->
			<!-- Hidden template -->
			<div class="subjectcounter" id="stemplate" style="display: none;">
				<ul>
					<li class="subjectno"></li>
					<li class="name"></li>
					<li class="year"></li>
					<li class="trimester"></li>
					<li class="credithour"></li>
					<li class="grade"></li>
					<li class="edit">
						<a href="#editSubject" data-rel="popup" data-position-to="origin" data-transition="flip" class="ui-btn ui-btn-inline ui-corner-all" onclick="editSubject(this);">&#9998;</a>
					</li>
					<li class="delete">
						<a class="ui-btn ui-btn-inline ui-corner-all" onclick="delSubject(this);">&#10060;</a>
					</li>
				</ul>
			</div>
			<!-- Main Interface -->
			<div class="result">
				<ul>
					<li class="gpa">GPA : 0.00-0.00</li>
					<li class="cgpa">CGPA : 0.00-0.00</li>
				</ul>
				<select class="time" onchange="updateGPA();">
					<option value="-1" style="display:none">Select year and trimester</option>
					<option value="0">Year 1 Trimester 1</option>
					<option value="1">Year 1 Trimester 2</option>
					<option value="2">Year 1 Trimester 3</option>
					<option value="3">Year 2 Trimester 1</option>
					<option value="4">Year 2 Trimester 2</option>
					<option value="5">Year 2 Trimester 3</option>
					<option value="6">Year 3 Trimester 1</option>
					<option value="7">Year 3 Trimester 2</option>
					<option value="8">Year 3 Trimester 3</option>
					<option value="9">Year 4 Trimester 1</option>
					<option value="10">Year 4 Trimester 2</option>
					<option value="11">Year 4 Trimester 3</option>
				</select>
			</div>
			<!-- Event Interface -->
			<div class="addSubjectbutton">
				<a href="#addSubject" data-rel="popup" data-position-to="origin" data-transition="flip" class="ui-btn ui-btn-inline ui-corner-all" style="background: #b2ebf2; width: 25%;">&#10010; Add Subject</a>
			</div>
			<h2>Subject List</h2>
			<div>
				<ul class="titleCalc">
					<li class="subno">Subject Number</li>
					<li class="subname">Subject Name</li>
					<li class="yr">Year</li>
					<li class="trmstr">Trimester</li>
					<li class="crdhr">Credit Hour</li>
					<li class="grd">Grade</li>
				</ul>
			</div>
			<div class="subject">
			</div>

			<!-- Add subject form popup when add subject button is pressed -->
			<div data-role="popup" data-overlay-theme="b" id="addSubject" class="ui-content" style="min-width:20em;">
		    	<form method="post" action="demo_form.asp">
		    		<div>
						<h3>Subject Information</h3>
						<input type="text" id="addname" maxlength="20" value="noname" placeholder="Subject Name">
						<select id="addyear">
							<option value="1" style="display:none">Year</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
						<select id="addtrimester">
							<option value="1" style="display:none">Trimester</option>
						  	<option value="1">1</option>
						  	<option value="2">2</option>
						  	<option value="3">3</option>
						</select>
						<select id="addcredithour">
							<option value="0" style="display:none">Credit Hour</option>
						  	<option value="1">1</option>
						  	<option value="2">2</option>
						  	<option value="3">3</option>
						  	<option value="4">4</option>
						  	<option value="5">5</option>
						  	<option value="6">6</option>
						  	<option value="7">7</option>
						  	<option value="8">8</option>
						</select>
						<select id="addgrade">
							<option value="-" style="display:none">Grade</option>
							<option value="A+">A+</option>
							<option value="A">A</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B">B</option>
							<option value="B-">B-</option>
							<option value="C+">C+</option>
							<option value="C">C</option>
							<option value="C-">C-</option>
							<option value="D+">D+</option>
							<option value="D">D</option>
							<option value="F">F</option>
						</select>
						<input type="button" data-inline="true" class="ui-btn ui-btn-inline ui-corner-all"  value="Add" onclick="addSubject(); clearCalcForm(this.form);">
		        	</div>
		      	</form>
		  	</div>

		  	<!-- Edit subject form popup when pencil button is pressed -->
			<div data-role="popup" data-overlay-theme="b" id="editSubject" class="ui-content" style="min-width:20em;">
		    	<form method="post" action="demo_form.asp">
		    		<div>
		    			<h3>Subject Information</h3>
						<input type="text" id="editname" maxlength="20" placeholder="Subject Name">
						<select id="edityear">
							<option value="1" style="display:none">Year</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
						<select id="edittrimester">
							<option value="1" style="display:none">Trimester</option>
						  	<option value="1">1</option>
						  	<option value="2">2</option>
						  	<option value="3">3</option>
						</select>
						<select id="editcredithour">
							<option value="0" style="display:none">Credit Hour</option>
						  	<option value="1">1</option>
						  	<option value="2">2</option>
						  	<option value="3">3</option>
						  	<option value="4">4</option>
						  	<option value="5">5</option>
						  	<option value="6">6</option>
						  	<option value="7">7</option>
						  	<option value="8">8</option>
						</select>
						<select id="editgrade">
							<option value="-" style="display:none">Grade</option>
							<option value="A+">A+</option>
							<option value="A">A</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B">B</option>
							<option value="B-">B-</option>
							<option value="C+">C+</option>
							<option value="C">C</option>
							<option value="C-">C-</option>
							<option value="D+">D+</option>
							<option value="D">D</option>
							<option value="F">F</option>
						</select>
						<a data-rel="back"><input type="button" data-inline="true" class="ui-btn ui-btn-inline ui-corner-all" value="Edit" onclick="updateSubject(); clearCalcForm(this.form);"></a>
		        	</div>
		      	</form>
		  	</div>
		  	<!-- Javascript -->
		  	<script>
				var currentYear = 1;
				var currentTrimester = 1;
				var creditHour = 0;
				var currentGrade;
				var minGrade = 0;
				var maxGrade = 0;
				var gradeIndex = 0;
				var timeIndex = -1;

				var scounter = 0;
				var minCGPA = 0;
				var maxCGPA = 0;
				var totalMinGradePoint=0;
				var totalMaxGradePoint=0;
				var totalCreditHour=0;
				var minGPA = [0,0,0,0,0,0,0,0,0,0,0,0];
				var maxGPA = [0,0,0,0,0,0,0,0,0,0,0,0];
				var totalMinGradePoints = [0,0,0,0,0,0,0,0,0,0,0,0];
				var totalMaxGradePoints = [0,0,0,0,0,0,0,0,0,0,0,0];
				var totalCreditHours = [0,0,0,0,0,0,0,0,0,0,0,0];
				var grade = ["A+","A","A-","B+","B","B-","C+","C","C-","D+","D","F","-"];
				var minGradePoint = [4.00, 4.00, 3.67, 3.33, 3.00, 2.67, 2.33, 2.00, 1.67, 1.33, 1.00, 0, 0];
				var maxGradePoint = [4.00, 4.00, 3.99, 3.66, 3.32, 2.99, 2.66, 2.32, 1.99, 1.66, 1.32, 0.99, 0];
				var selectedContent;

				function resetValue(){
					// gpa array values
					for(i=0; i<12; i++){ minGPA[i] = 0.00; }
					for(i=0; i<12; i++){ maxGPA[i] = 0.00; }
					for(i=0; i<12; i++){ totalMinGradePoints[i] = 0.00; }
					for(i=0; i<12; i++){ totalMaxGradePoints[i] = 0.00; }
					for(i=0; i<12; i++){ totalCreditHours[i] = 0.00; }

					// cgpa values
					minCGPA = 0.00;
					maxCGPA = 0.00;
					totalMinGradePoint=0.00;
					totalMaxGradePoint=0.00;
					totalCreditHour=0;
				}

				function getGradeIndex(){
					for(j=0; j<12; j++)
						if(grade[j] === currentGrade)
							return j;
					return 11;
				}

				function calculateGPA(){
					// get value and add together
					for(i=1; i<=scounter; i++){
						//var currentDiv = document.getElementById(i);
						currentYear = parseInt(document.getElementsByClassName("year")[i].innerHTML);
						currentTrimester = parseInt(document.getElementsByClassName("trimester")[i].innerHTML);
						creditHour = parseInt(document.getElementsByClassName("credithour")[i].innerHTML);
						currentGrade = document.getElementsByClassName("grade")[i].innerHTML;
						gradeIndex = getGradeIndex();
						minGrade = minGradePoint[gradeIndex];
						maxGrade = maxGradePoint[gradeIndex];
						timeIndex = ((currentYear-1)*3) + currentTrimester-1;

						totalMinGradePoints[timeIndex] += parseFloat(minGrade)*parseInt(creditHour);
						totalMaxGradePoints[timeIndex] += parseFloat(maxGrade)*parseInt(creditHour);
						totalCreditHours[timeIndex] += parseInt(creditHour);
					}
					// calculate min gpa and max gpa
					for(i=0; i<12; i++){
						minGPA[i] = parseFloat(totalMinGradePoints[i])/parseInt(totalCreditHours[i]);
						maxGPA[i] = parseFloat(totalMaxGradePoints[i])/parseInt(totalCreditHours[i]);
					}
				}

				function calculateCGPA(){
					for(i=1; i<=scounter; i++){
						creditHour = parseInt(document.getElementsByClassName("credithour")[i].innerHTML);
						currentGrade = document.getElementsByClassName("grade")[i].innerHTML;
						gradeIndex = getGradeIndex();
						minGrade = minGradePoint[gradeIndex];
						maxGrade = maxGradePoint[gradeIndex];

						totalMinGradePoint += parseFloat(minGrade*creditHour);
						totalMaxGradePoint += parseFloat(maxGrade*creditHour);
						totalCreditHour += creditHour;
					}
					minCGPA = parseFloat(totalMinGradePoint)/parseInt(totalCreditHour);
					maxCGPA = parseFloat(totalMaxGradePoint)/parseInt(totalCreditHour);
				}

				function updateGPA(){
					// Update and show gpa if current time selection is available
					var time = document.getElementsByClassName("time")[1].value;
					if(time >= 0)
						document.getElementsByClassName("gpa")[0].innerHTML = "GPA : " + minGPA[parseInt(time)].toFixed(2) + "-" + maxGPA[parseInt(time)].toFixed(2);
				}

				function updateCGPA(){
					// Update and show cgpa
					document.getElementsByClassName("cgpa")[0].innerHTML = "CGPA : " + minCGPA.toFixed(2) + "-" + maxCGPA.toFixed(2);
				}

				function calculate(){
					resetValue();
					calculateGPA();
					updateGPA();
					calculateCGPA();
					updateCGPA();
				}

				function addSubject(){
					scounter++;
				    var getTemplate = document.getElementById("stemplate");
					var newElement = getTemplate.cloneNode(true);
				    newElement.style.display = "block";
				    newElement.id = scounter;
					document.getElementsByClassName("subject")[0].appendChild(newElement);

					document.getElementsByClassName("subjectno")[scounter].innerHTML = "Subject "+ scounter;
					document.getElementsByClassName("name")[scounter].innerHTML = document.getElementById("addname").value;
					document.getElementsByClassName("year")[scounter].innerHTML = document.getElementById("addyear").value;
					document.getElementsByClassName("trimester")[scounter].innerHTML = document.getElementById("addtrimester").value;
					document.getElementsByClassName("credithour")[scounter].innerHTML = document.getElementById("addcredithour").value;
					document.getElementsByClassName("grade")[scounter].innerHTML = document.getElementById("addgrade").value;

					for(i=1; i<=scounter; i++){
						// update subject counter background color
						if( i%2 == 0 )
							document.getElementsByClassName("subjectcounter")[i].style.background = "#eee";
						else
							document.getElementsByClassName("subjectcounter")[i].style.background = "#ddd";
					}
					calculate();
				}

				function delSubject(button){
					scounter--;
					var subjectDiv = button.parentNode.parentNode.parentNode.parentNode;
					subjectDiv.removeChild(button.parentNode.parentNode.parentNode);
					
					for(i=1; i<=scounter; i++){
						// update subject number scale from 1 to scounter
						document.getElementsByClassName("subjectcounter")[i].id = i;
						document.getElementsByClassName("subjectno")[i].innerHTML = "Subject "+i;

						// update subject counter background color
						if( i%2 == 0 )
							document.getElementsByClassName("subjectcounter")[i].style.background = "#eee";
						else
							document.getElementsByClassName("subjectcounter")[i].style.background = "#ddd";
					}
					calculate();
				}

				function editSubject(button){
					var subjectDiv = button.parentNode.parentNode.parentNode;
					selectedContent = subjectDiv.id;

					document.getElementById("editname").value = document.getElementsByClassName("name")[selectedContent].innerHTML;
					document.getElementById("edityear").value = parseInt(document.getElementsByClassName("year")[selectedContent].innerHTML);
					document.getElementById("edittrimester").value = parseInt(document.getElementsByClassName("trimester")[selectedContent].innerHTML);
					document.getElementById("editcredithour").value = parseInt(document.getElementsByClassName("credithour")[selectedContent].innerHTML);
					document.getElementById("editgrade").value = document.getElementsByClassName("grade")[selectedContent].innerHTML;
				}

				function updateSubject(){
					document.getElementsByClassName("name")[selectedContent].innerHTML = document.getElementById("editname").value;
					document.getElementsByClassName("year")[selectedContent].innerHTML = document.getElementById("edityear").value;
					document.getElementsByClassName("trimester")[selectedContent].innerHTML = document.getElementById("edittrimester").value;
					document.getElementsByClassName("credithour")[selectedContent].innerHTML = document.getElementById("editcredithour").value;
					document.getElementsByClassName("grade")[selectedContent].innerHTML = document.getElementById("editgrade").value;

					calculate();
				}
				
				function clearCalcForm(oForm) {
					var elements = oForm.elements; 
					oForm.reset();
					for(i=0; i<elements.length; i++) {
						field_type = elements[i].type.toLowerCase();
						switch(field_type) {
							case "text":
							case "password": 
							case "textarea":
							case "hidden":   
								elements[i].value = "noname"; 
								break;
							case "radio":
							case "checkbox":
							    if (elements[i].checked) {
							    	elements[i].checked = false; 
							  	}
								break;
							case "select-one":
							case "select-multi":
							    elements[i].selectedIndex = 0;
								break;
							default: 
								break;
						}
				   	}
				}
			</script>
			<!-- End Calculator Code -->
		</div>

		
		
		<!-- Event Page -->
		<div data-role="page" id="event">

			<!-- Header -->
			<div data-role="header">
				<h1>MMU CONNECT</h1>
			</div>
			<!-- Logout button -->
			<div data-role="main" style="text-align: right;">
			<?php
				if(isset($_SESSION['login']) && !empty($_SESSION['login']))
				{ ?>
					<a href="logout.php" id="logout" class="ui-btn ui-btn-inline ui-corner-all"> Logout</a>
					<?php
					echo '<br><strong>Welcome back,'.$_SESSION['myusername'].'!</strong>';
				}
			?>
			</div>
			<!-- Navigation Bar -->
			<div data-role="navbar">
				<ul>
					<li><a href="#home">Home</a></li>
					<li><a href="#calculator">CGPA Calculator</a></li>
					<li><a href="#event" class="ui-btn-active ui-state-persist">Event Planner</a></li>
				</ul>
			</div>
			<!-- Begin Event Planner Code -->
			<!-- Invisible template -->
			<div class="event" id="template" style="display:none">
				<ul>
			  		<li class="time"></li>
			  		<li class="content"></li>
			  		<li class="venue"></li>
			  		<li class="description"></li>
			  		<li class="deleteButton">
			  			<a href="#deleteEvent" data-rel="popup" data-position-to="origin" data-transition="flip" class="ui-btn ui-btn-inline ui-corner-all" type="button" onclick="deleteEvents(this);">&#10060;</a>
			  		</li>
			  		<li class="editButton">
			  			<a href="#editEvent" data-rel="popup" data-position-to="origin" data-transition="flip" class="ui-btn ui-btn-inline ui-corner-all" type="button" onclick="editEvents(this);">&#9998;</a>
			  		</li>
			  	</ul>
			</div>
			<li class="dayBlock" style="display:none"><button id="0" class="daybutton" type="button" onclick="selectDay(this.id);">0</button></li>
			<li class="emptyBlock" style="display:none"><label id="0" class="emptylabel" style="display:inline-block;"></label></li>
			<!-- Main Interface -->
			<div class="Calendar">
				<div class="titleCalendar">      
				  	<ul>
				    	<li class="prev"><button class="prevNext" type="button" onclick="prevMonth();">&#10094;</button></li>
				    	<li class="next"><button class="prevNext" type="button" onclick="nextMonth();">&#10095;</button></li>
				    	<li class="date" style="text-align:center">
					    	<span class="month">JANUARY</span><br>
							<span class="calendarYear">2017</span>
						</li>
					</ul>
				</div>

				<ul class="weekdays">
					<li>Su</li>
				  	<li>Mo</li>
				  	<li>Tu</li>
				  	<li>We</li>
				  	<li>Th</li>
					<li>Fr</li>
					<li>Sa</li>
				</ul>

				<ul class="days">
				</ul>

				<div data-role="main" class="ui-content">
				    <a href="#addEvent" data-rel="popup" data-position-to="origin" data-transition="flip" class="ui-btn ui-btn-inline ui-corner-all" onclick="addEvents(this);">&#10010; Add Event</a>
				</div>

				<div id="eventBlock">
				</div>

				<!-- Add event form popup when add event button is pressed -->
				<div data-role="popup" data-overlay-theme="b" id="addEvent" class="ui-content" style="min-width:30em;">
			    	<form method="post" action="addEvent.php">
			    		<div>
							<h3>Event Information</h3>
							<input type="hidden" name="calendarDate" id="calendarDate">
							<input type="time" name="time" id="time">
							<input type="text" name="venue" id="venue" maxlength="10" placeholder="Venue">
							<input type="text" name="content" id="content" maxlength="50" placeholder="Content">
							<input type="text" name="description" id="description" maxlength="50" placeholder="Description">
							<input type="submit" data-inline="true" value="Add">
			        	</div>
			      	</form>
			  	</div>

			  	<!-- Edit event form popup when pencil button is pressed -->
				<div data-role="popup" data-overlay-theme="b" id="editEvent" class="ui-content" style="min-width:30em;">
			    	<form method="post" action="editEvent.php">
			    		<div>
			    			<h3>Event Information</h3>
							<input type="hidden" name="eventContentID" id="eventContentID">
							<input type="time" name="edittime" id="edittime">
							<input type="text" name="editvenue" maxlength="10" id="editvenue">
							<input type="text" name="editcontent" maxlength="50" id="editcontent">
							<input type="text" name="editdescription" maxlength="50" id="editdescription">
							<input type="submit" data-inline="true" value="Edit">
			        	</div>
			      	</form>
			  	</div>

			  	<!-- Delete event confirmation form -->
			  	<div data-role="popup" data-overlay-theme="b" id="deleteEvent" class="ui-content" style="min-width:30em;">
			    	<form method="post" action="deleteEvent.php">
			    		<div>
			    			<h3>Confirm Deletion</h3>
							<input type="hidden" name="ccontentID" id="ccontentID">
							<input type="submit" data-inline="true" value="Yes">
							<a data-rel="back"><input type="button" data-inline="true" class="ui-btn ui-btn-inline ui-corner-all" value="No"></a>
			        	</div>
			      	</form>
			  	</div>
			</div>
			<!-- Javascript -->
			<script>
				var month = ["JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER"];
				var dayofMonth = [31,28,31,30,31,30,31,31,30,31,30,31];
				var contentCount = 0;
				var selectedContent;

				// initialize select first day of the month
				var currentDay = 1;
				var currentMonth = 1;
				var currentYear = 2017;
				var extraWeekDay = 0;
				var selectedDate = "20170101";
				// update calendar
				updateCalendar();
				document.getElementById(1).style.background = "#1abc9c";
				document.getElementById(1).style.color = "white";
				document.getElementById("eventDate").innerHTML = "Date = " + selectedDate.slice(6, 8) + "/" + selectedDate.slice(4, 6) + "/" + selectedDate.slice(0, 4);

				function emptyDay(){
					for(i=1; i<=extraWeekDay; i++){
						var emptyLabel = document.getElementById(100+i);
						emptyLabel.parentNode.parentNode.removeChild(emptyLabel.parentNode);
					}
					for(i=1; i<=dayofMonth[currentMonth-1]; i++){
						var dayButton = document.getElementById(i);
						dayButton.parentNode.parentNode.removeChild(dayButton.parentNode);
					}
				}

				function gregorianCalendar(){
					dayofMonth[1]=28;
					if(currentYear % 4 == 0)
						dayofMonth[1] = 29;
					if(currentYear % 100 == 0)
						dayofMonth[1] = 28;
					if(currentYear % 400 == 0)
						dayofMonth[1] = 29;
				}

				function updateCalendar(){
					// update title
					document.getElementsByClassName("month")[0].innerHTML = month[currentMonth-1];
					document.getElementsByClassName("calendarYear")[0].innerHTML = currentYear;

					// clone empty label from template
					for(i=1; i<=extraWeekDay; i++){
						var getTemplate = document.getElementsByClassName("emptyBlock")[0];
						var newElement = getTemplate.cloneNode(true);
						newElement.style.display = "inline-block";
						document.getElementsByClassName("days")[0].appendChild(newElement);
					}
					// update empty label
					for(i=1; i<=extraWeekDay; i++){
						var getLabel = document.getElementsByClassName("emptylabel")[i];
						getLabel.id = 100+i;
					}

					// clone day from template
					for(i=1; i<=dayofMonth[currentMonth-1]; i++){
						var getTemplate = document.getElementsByClassName("dayBlock")[0];
						var newElement = getTemplate.cloneNode(true);
						newElement.style.display = "inline-block";
						document.getElementsByClassName("days")[0].appendChild(newElement);
					}
					// update day count
					for(i=1; i<=dayofMonth[currentMonth-1]; i++){
						var getButton = document.getElementsByClassName("daybutton")[i];
						getButton.id = i;
						getButton.innerHTML = i;
					}
				}

				function resetActive(){
					for(i=1; i<=dayofMonth[currentMonth-1]; i++){
						document.getElementsByClassName("daybutton")[i].style.background = "#eee";
						document.getElementsByClassName("daybutton")[i].style.color = "grey";
					}
					document.getElementById(1).style.background = "#1abc9c";
					document.getElementById(1).style.color = "white";
					currentDay = 1;
				}

				function updateDate(){
					var tempMonth, tempDay;
					if(currentMonth < 10)
						tempMonth = "0" + currentMonth.toString();
					else
						tempMonth = currentMonth.toString();
					if(currentDay < 10)
						tempDay = "0" + currentDay.toString();
					else
						tempDay = currentDay.toString();
					selectedDate = currentYear.toString() + tempMonth + tempDay;
				}

				function showHideEvent(){
					var j = 0;
					for(i=1; i<=contentCount; i++){
						var eventID = document.getElementsByClassName("event")[i].id;
						if(selectedDate == eventID.slice(0, 8)){
							document.getElementsByClassName("event")[i].style.display = "block";

							// change even number of event content background color to separate easily
							if(j % 2 == 1){
								document.getElementsByClassName("event")[i].style.background = "#eee";
								document.getElementsByClassName("editButton")[i].style.background = "#eee";
								document.getElementsByClassName("deleteButton")[i].style.background = "#eee";
								
							}
							else{
								document.getElementsByClassName("event")[i].style.background = "#ddd";
								document.getElementsByClassName("editButton")[i].style.background = "#ddd";
								document.getElementsByClassName("deleteButton")[i].style.background = "#ddd";
							}
							j++;
						}
						else
							document.getElementsByClassName("event")[i].style.display = "none";
					}
				}

				function nextMonth(){
					emptyDay();
					extraWeekDay = (dayofMonth[currentMonth-1]+extraWeekDay) % 7;
					currentMonth++;
					if(currentMonth > 12){
						currentMonth = 1;
						currentYear++;
					}
					gregorianCalendar();
					updateCalendar();
					resetActive();
					updateDate();
					showHideEvent();
				}

				function prevMonth(){
					emptyDay();
					currentMonth--;
					if(currentMonth < 1){
						currentMonth = 12;
						currentYear--;
					}
					extraWeekDay = 7 -(((dayofMonth[currentMonth-1]) % 7) -extraWeekDay);
					if(extraWeekDay>=7)
						extraWeekDay -= 7;
					else if(extraWeekDay>=14)
						extraWeekDay-=14;
					gregorianCalendar();
					updateCalendar();
					resetActive();
					updateDate();
					showHideEvent();
				}

				function selectDay(number){
					currentDay = number;
					for(i=1; i<=dayofMonth[currentMonth-1]; i++){
						document.getElementsByClassName("daybutton")[i].style.background = "#eee";
						document.getElementsByClassName("daybutton")[i].style.color = "grey";
					}
					document.getElementById(number).style.background = "#1abc9c";
					document.getElementById(number).style.color = "white";
					updateDate();
					showHideEvent();
				}

				function loadEvents(id, calDate, calTime, venue, content, description){
					var getTemplate = document.getElementById("template");
					var newElement = getTemplate.cloneNode(true);
				    newElement.style.display = "block";
				    newElement.id = calDate+id.toString();
					document.getElementById("eventBlock").appendChild(newElement);
					contentCount++;

					// copy the text to the event block
					document.getElementsByClassName("time")[contentCount].innerHTML = calTime;
					document.getElementsByClassName("venue")[contentCount].innerHTML = venue;
					document.getElementsByClassName("description")[contentCount].innerHTML = description;
					document.getElementsByClassName("content")[contentCount].innerHTML = content;
					showHideEvent();
				}

				function addEvents(button){
					document.getElementById("calendarDate").value = selectedDate;
				}

				function editEvents(button){
					var eventDiv = button.parentNode.parentNode.parentNode;
					selectedContent = eventDiv.id.slice(8);
					document.getElementById("eventContentID").value = selectedContent;
					document.getElementById("edittime").value = eventDiv.getElementsByClassName("time")[0].innerHTML;
					document.getElementById("editvenue").value = eventDiv.getElementsByClassName("venue")[0].innerHTML;
					document.getElementById("editdescription").value = eventDiv.getElementsByClassName("description")[0].innerHTML;
					document.getElementById("editcontent").value = eventDiv.getElementsByClassName("content")[0].innerHTML;
				}

				function deleteEvents(button){
					var eventDiv = button.parentNode.parentNode.parentNode;
					selectedContent = eventDiv.id.slice(8);
					document.getElementById("ccontentID").value = selectedContent;
					contentCount--;
				}
			</script>

			<!-- PHP for Load Event -->
			<?php
			$name=$_SESSION["myusername"]; 
			$tbl_name="event";
			$con = mysqli_connect("localhost", "root", "", "TestLogin")or die("cannot connect"); 
			$sql="SELECT * FROM $tbl_name WHERE name='$name'";
			$result=mysqli_query($con,$sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$id = $row["id"];
					$calDate = $row["calDate"];
					$calTime = $row["calTime"];
					$venue = $row["venue"];
					$content = $row["content"];
					$description = $row["description"];
					echo "<script>loadEvents('$id','$calDate', '$calTime', '$venue', '$content', '$description');</script>";
				}
			}
			else {
			    echo "0 results";
			}
			?>
			<!-- End Event Planner Code -->
		</div>
	</body>
</html>