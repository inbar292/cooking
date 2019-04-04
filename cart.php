<?php
	session_start();

	if($_SESSION['uname']==="null"|| $_SESSION['uname']===null ){
	    header("Location:index.php");
	}
//get all user's detailes
$uname=$_SESSION['uname'];

	function exitSite(){

	session_destroy();
  header("Location: index.php");
	}

	if(isset($_GET["hello"])){

		exitSite();
	}

	if (isset($_GET['dollar'])) {

		$_SESSION['coin']= "$";
		$_SESSION['price']=0.273;

	}
	if (isset($_GET['euro'])) {

		$_SESSION['coin']= "&#8364;";
		$_SESSION['price']=0.242;

	}
	if (isset($_GET['shekel'])) {

		$_SESSION['coin']= "&#8362;";
		$_SESSION['price']=1;

	}

  if (isset($_POST['id'])) {

    $recID=$_POST['id'];

    //connction username and password
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname="cooking";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

              $sql="DELETE FROM cart where cart.recNum='".$recID."'and cart.userName='".$uname."' LIMIT 1";

          if ($conn->query($sql) === TRUE) {
            //dont show dont know why
          // echo '<script language="javascript">';
          // echo 'alert("new user")';
          // echo '</script>';
          $_SESSION['items']= $_SESSION['items']-1;
          $secondsWait = 1;
          echo '<meta http-equiv="refresh" content="'.$secondsWait.'">';

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        // Format a desired response (text, html, etc)
  $response = 'Format a response here';
  // This will return your formatted response to the $.post() call in jQuery
  //return print_r($response);


  }

?>
<!doctype html>
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
  <title>cart</title>



  <!--icon library-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">

  <!--fonts-->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <!-- LESS -->
  <link rel="stylesheet/less" type="text/css" href="styles.less" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>

	</head>

		<script>
		//search function
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
				<span class="coin" style="float:right; margin-right:250px; font-size:20px;  margin-top:10px;">
				<b>
	<a href="cart.php?dollar=true" style="width:auto;">
					<button type="button" name="dollar" style="width:30px;">	$</button></a>
					<a href="cart.php?euro=true" style="width:auto;">
					<button type="button" name="euro" style="width:30px;">&#8364;</button></a>
					<a href="cart.php?shekel=true" style="width:auto;">
					<button type="button" name="shekel" style="width:30px;">&#8362;</button> </a> </b>
				</span>
	    </div>

	    	<!-- space- do not deltete -->
	  	<p></p>

	  </div>

	 <!-- search bar -->
		 <div id="searchbar">
			 <input type="text" placeholder="Enter keyword" onkeyup="showResult(this.value)" name="search"><button id="searchButton" type="submit"><i class="fa fa-search"></i></button>
			<div id="livesearch"></div>
	 </div>


	  <!-- ***********menu**************** -->
	  <nav>
	    <ul class="navbarbuttom">
	      <li><a class="active" href="homePage.php">Home</a></li>
	      <li><a href="recIndex.php">Index</a></li>
	      <li><a href="aboutus.php"> About Us</a> </li>
	      <li><a href="#">Account</a>
	        <ul>
	          <li><a href="prevpur.php">My orders</a></li>
	          <li><a href="personal.php">My Info</a></li>
	        </ul>
	      </li>
	      <li><a href="mailto:inbar292@gmail.com?Subject=cooking" target="_top">Contact us</a></li>
	      <li id="Logout"><a href="homePage.php?hello=true" style="width:auto;">Logout</a></li>
						<?php if($_SESSION['uname']=="Admin"){ print "  <li><a href=adminData.php>Data</a></li>"; } ?>
	    </ul>

			<!-- Trigger/Open The Modal -->
			<div class="notificationsIcon">
				<button id="myBtn">Notifications</button>
				<span class="badge" id="badge">
					<?php

					//get nuber of user's notifications
					$uname=$_SESSION['uname'];

					//connction username and password
								$servername = "localhost";
								$username = "root";
								$password = "";
								$dbname="cooking";

								// Create connection
								$conn = new mysqli($servername, $username, $password, $dbname);

								// Check connection
								if ($conn->connect_error) {
										die("Connection failed: " . $conn->connect_error);
								}

								//get user's notifications
								$sql="SELECT * FROM notification WHERE userName='$uname'";

								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
										// output data of each row

											echo $result->num_rows;
								}
							$conn->close();
					 ?>
				</span>

			</div>

			<!-- The Modal -->
			<div id="myModal" class="modal">

			  <!-- Modal content -->
			  <div class="modal-content">
			    <div class="modal-header">
			      <span class="close">&times;</span>
			      <h4>Notifications</h4>
			    </div>
			    <div class="modal-body">
			      <!-- <p>Some text in the Modal Body</p>
			      <p>Some other text...</p> -->

						<div class="Notifications">

							<?php
							//get all user's notifications
							$uname=$_SESSION['uname'];

							//connction username and password
										$servername = "localhost";
										$username = "root";
										$password = "";
										$dbname="cooking";

										// Create connection
										$conn = new mysqli($servername, $username, $password, $dbname);

										// Check connection
										if ($conn->connect_error) {
												die("Connection failed: " . $conn->connect_error);
										}

										//get user's notifications
										$sql="SELECT * FROM notification WHERE userName='$uname'";

										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
												// output data of each row
												while($row = $result->fetch_assoc()) {
													echo $row['notificationText'];
													echo "<button type=submit class=del style=float:right; id=".$row['notificationText']." name=button> <span class=close style=color:white;>&times;</span> </button>";
													echo "<br>";

											}
										}else {
											echo "There are no notifications";
										}

									$conn->close();
							 ?>

						</div>
			    </div>
			    <div class="modal-footer">
			      <!-- <h3>Modal Footer</h3> -->
			    </div>
			  </div>

			</div>

		<!-- shopin gcart -->
			<a href="cart.php" id="cart">
				<?php echo $_SESSION['items']; ?>
				<img src="things/shopping-cart (2).png" height="30px" alt="logo">
				<!-- <label class="items">10</label> -->
				</a>

	    <div class="userLoginBar">
				<div class="UserLoginText">
					<label class="wname"> Welcome <?php echo $_SESSION['uname']; ?>! &nbsp </label>
					<?php if($_SESSION['uname']=="Admin"){ print "<a id='uploaddatatext' href='uploadData.php' >Upload Recepies</a><br>"; } ?>
				</div>

	    </div>
	  </nav>

<div class="cart">

  <?php

//get cart and price
//connction username and password
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname="cooking";

      $uname=$_SESSION['uname'];
      $sum=0;
      $rowNum=1;

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql2="SELECT recipe.recName, recipe.recPrice, recipe.recID FROM cart INNER JOIN recipe on cart.recNum=recipe.recID where cart.userName='".$uname."' ";

      $result = $conn->query($sql2);
      if ($result->num_rows > 0) {

        echo "<div class=items style='margin-top:200px;'>";
          echo "<ol>";
          while($row = $result->fetch_assoc()) {


            echo "<li>";
            echo $row['recName'];
            echo "<br>";
            echo $_SESSION['price']*$row['recPrice'], $_SESSION['coin'];
            echo "<br>
                  <button type=submit class=reply id=".$rowNum."X".$row['recID'].">remove</button>";
            echo "</li>";
            $rowNum=$rowNum+1;
            $sum=$sum+$row['recPrice'];
            echo "<p></p>";
          }


          echo "</ol>
          <div > <br><p></p> TOTAL:";

          echo $_SESSION['price']*$sum, $_SESSION['coin'];
          echo "<br><br><button type=button class=pay id=pay onclick=window.location.href='payment.php';>pay</button>";
          echo "</div></div>";
      }else {
        echo "<div  style='margin-top:200px;'>You have no items in your cart.</div>";
      }

      $conn->close();

   ?>


</div>

<div id='response-content'></div>


<script  type='text/javascript'>

//remove an item
$(document).ready(function() {
   $('.reply').click(function() {

     var str= $(this).attr('id')
     var res = str.split("X");

     var subid=res[1];
     //text
      var val = subid;
    //  alert(val);

     $.post(location.href, { id: $(this).attr('id'),txt:val }, function(response) {
       // Inserts your chosen response into the page in 'response-content' DIV
       $('#response-content').html(response); // Can also use .text(), .append(), etc

     });
   });
 });
</script>
<div class="footer">
	<p> site designed and coded by Inbar Shwartz & Amir Binenfeld</p>
</div>

</body>


<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
	modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
	modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}
</script>

<script  type='text/javascript'>

//remove an item
$(document).ready(function() {
   $('.del').click(function() {

     var str= $(this).attr('id')

      var val = str;
      alert(val);

     $.post(location.href, { di: $(this).attr('id'),txt:val }, function(response) {
       // Inserts your chosen response into the page in 'response-content' DIV
       $('#response-content').html(response); // Can also use .text(), .append(), etc

     });
   });
 });
</script>
</html>
