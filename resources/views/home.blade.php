<!doctype html>
<html lang="en">
 	<head>
    	<!-- Required meta tags -->
	  	<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
    	<title>Hello, world!</title>
    	<style type="text/css">
    		#main{
	    		margin-top: 30px;
	    		margin-left: 360px;
       		}
    		.dropdown{
    			padding: 15px;
    		}
    		button{
    			width: 50%;
    			text-align:left;
    		}
    		#add{
    			width:10%;
    			margin-top:30px;
    			margin-left:20px;  
    		}
    		.card{
    			margin:20px;
    			width: 50%;
    		}
    		#rmv{
    			width:25%;
    			margin:8px;
    		}
    	</style>

   		<script type="text/javascript">
    		var exe,sec,rnd;
    		function getvalue() {
				$.ajax({  
					url: '/api/Fitness',  
					type: 'POST',  
					dataType: 'json',  
					data: {exe:'exe',sec:'sec',rnd:'rnd'},  
					success: function (r1) {  
					    console.dir(r1); 
					    $("#result").html(JSON.stringify(r1));
					},  
					error: function (xhr, textStatus, errorThrown) {  
				    	console.log('Error in Operation');  
					}  
				}); 
    		}
    
	    	$(document).ready(function () {
	    		
	        	$('#d1 a').on('click', function(){
	    			exe = $(this).text();
	    			document.getElementById('exe').innerHTML = exe;
				});

				$('#d2 a').on('click', function(){ 
					sec = $(this).text();
					document.getElementById('sec').innerHTML = sec;
				});

				$('#d3 a').on('click', function(){
					rnd = $(this).text();
					document.getElementById('rnd').innerHTML = rnd;
				});

				$('#add').click(function(){
					console.log("test add click ");
					getvalue();
				});
			});

    	    	
    </script>
  </head>
  <body>
	    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	      <div class="collapse navbar-collapse" id="navbarSupportedContent">
	        <ul class="navbar-nav mr-auto">
	         <li class="nav-item active">
	          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      	</li>

	    	<li class="nav-item">
	      	  <a class="nav-link" href="#">Contact</a>
	      	</li>
	      </ul>
	  	</div>
	</nav>
	<div id="main">
		 <!--1------------>
	  	    <div class="dropdown">
	    		<div>
	    			<label>Excercise</label> <span id="exe"> </span>
		    	</div>
		      	<button class="btn btn-secondary dropdown-toggle text-left" 
		      			type="button" id="dropdownMenuButton" data-toggle="dropdown" 
		      			aria-haspopup="true" aria-expanded="false" >
		      		Select excercise  
		      	</button>
		      	<div class="dropdown-menu" id="d1" aria-labelledby="dropdownMenuButton">
			        <a class="dropdown-item" href="#">Sqaurds</a>
			        <a class="dropdown-item" href="#">Warm up</a>
			        <a class="dropdown-item" href="#">Jog in place </a>
		      	</div>
			</div>
               <!--2------------>
			<div class="dropdown">
	    		<div>
	    			<label>Seconds : <span id="sec"> </span>  </label>
		    	</div>
		      	<button class="btn btn-secondary dropdown-toggle text-left" 
		      			type="button" id="dropdownMenuButton" data-toggle="dropdown" 
		      			aria-haspopup="true" aria-expanded="false">
		      		Select Seconds 
		      	</button>
		      	<div class="dropdown-menu" id="d2" aria-labelledby="dropdownMenuButton">
			        <a class="dropdown-item" href="#">10 sec</a>
			        <a class="dropdown-item" href="#">20 sec </a>
			        <a class="dropdown-item" href="#">30 sec</a>
		      	</div>
			</div>
			 <!--3----------->
			 <div class="dropdown">
	    		<div>
	    			<label>Destination Round</label>  <span id="rnd"> </span>
		    	</div>
		      	<button class="btn btn-secondary dropdown-toggle text-left" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		      			Select round
		      	</button>
		      	<div class="dropdown-menu" id="d3" aria-labelledby="dropdownMenuButton">
			        <a class="dropdown-item" href="#">Round 1</a>
			        <a class="dropdown-item" href="#">Round 2</a>
			        <a class="dropdown-item" href="#">Round 3</a>
		      	</div>
			</div>
				<button  id ="add" class="btn btn-secondary  text-left" type="button">
		      		ADD
		      	</button>
		      	<div> <p id="result"> </p>
		      	</div>

		      	<div>
					<div class="card">
    					<div class="card-body">
    						<span id="txt1"></span>
    						<span id="txt2"></span></div>
    					<button type="button" id="rmv" class="btn btn-outline-primary btn-sm">Remove</button>
 		 			</div>
 				</div>
	</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
