<?php

session_start();
if($_SESSION['uname']=="null"|| $_SESSION['uname']==null ){
    header("Location:index.php");
}

function exitSite(){

session_destroy();
header("Location: index.php");
}

if(isset($_GET["hello"])){

  exitSite();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>


      <!-- We keep mooving forward, opening up new doors and
    doing new thins, because we are curios...
    and curiosity keeps leading us down new paths.
                    Walt Disney                      -->
    	<!-- Latest compiled and minified CSS -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    	<!-- jQuery library -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    	<!-- Latest compiled JavaScript -->
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title> cooKing </title>
      <link rel="stylesheet" href="css/Test1.css">


      <!--icon library-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">

      <!--fonts-->
    	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    	</head>

    	<script>
    	function showResult(str) {
      if (str.length==0) {
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
    		// document.getElementById("livesearch").style.zIndex="1000";
        return;
      }
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("livesearch").innerHTML=this.responseText;
          document.getElementById("livesearch").style.border="1px solid black";
    			document.getElementById("livesearch").style.background="white";
    				document.getElementById("livesearch").style.color="black";
    			// document.getElementById("livesearch").style.zIndex="12000";
    			// document.getElementById("livesearch").style.position="relative";
        	}
      	}
      xmlhttp.open("GET","livesearch.php?q="+str,true);
      xmlhttp.send();
    	}

      </script>

    	<body>

      <!-- ***********fixedd top**************** -->
          <!-- ***********fixedd logo with search bar**************** -->
      <div class="navbar">
        <div class="navbartop">
          <span id="myheader"><a href="homePage.php">cooking
              <img src="https://image.flaticon.com/icons/svg/45/45200.svg" height="35px" alt="logo"></a>
    			</span>
    			&nbsp 	&nbsp
    			<!-- shopin gcart -->

     <!-- search bar -->

        </div>
        	<!-- space- do not deltete -->
        	<p></p>
      </div>

    	<div id="searchbar">
    		<input type="text" placeholder="Enter keyword" onkeyup="showResult(this.value)" name="search"><button id="searchButton" type="submit"><i class="fa fa-search"></i></button>
    	 <div id="livesearch"></div>
     </div>

      <!-- ***********menu**************** -->
      <nav>
        <ul class="navbarbuttom">
          <li><a class="active" href="homePage.php">Home</a></li>
          <li><a href="template.php">Index</a></li>
          <li><a href="aboutus.php"> About Us</a> </li>
          <li><a href="#">Account</a>
            <ul>
              <li><a href="prevpur.php">My orders</a></li>
              <li><a href="personal.php">My Info</a></li>
            </ul>
          </li>
          <li><a href="#">Contact us</a></li>
          <li id="Logout"><a href="homePage.php?hello=true" style="width:auto;">Logout</a></li>
        </ul>

    		<a href="#" id="cart">
    			<img src="things/shopping-cart (2).png" height="40px" alt="logo">
    			<label class="items">10</label>
    			</a>

        <div class="userLoginBar">
            <label class="wname"> Welcome <?php echo $_SESSION['uname']; ?>! &nbsp </label>
    				<?php if($_SESSION['uname']=="Admin"){ print "<a id='uploaddatatext' href='uploadData.php' style=width:auto; >upload recepies</a><br>"; } ?>
        </div>
      </nav>


        <div class="footer">
          <p> site designed and coded by Inbar Shwartz & Amir Binenfeld</p>
        </div>
      </body>

</html>
