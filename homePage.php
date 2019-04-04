<?php
	session_start();

	if($_SESSION['uname']==="null"|| $_SESSION['uname']===null ){
	    header("Location:index.php");
	}
//get all user's detailes
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

			//get user
			$sql="Select * from user where user.userName='$uname'";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {

								$_SESSION['uname'] = $row["userName"];
								$_SESSION['firstname'] = $row["userFName"];
								$_SESSION['lastname'] = $row["userSName"];
								$_SESSION['email'] = $row["userMail"];
								$_SESSION['phonenumber'] = $row["userPhone"];
								$_SESSION['address'] = $row["userAddress"];
								$_SESSION['city'] = $row["userCity"];
								$_SESSION['password'] = $row["userPass"];
								$_SESSION['dob'] = $row["userDOB"];
								$_SESSION['inputPic'] = $row["userPhoto"];
								$_SESSION['coin']=  "&#8362;";
								$_SESSION['price']=1;
				}
			}

			//get cart
			$sql="Select * from cart where cart.userName='$uname'";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

					$_SESSION['items']=$result->num_rows;

			}else {
				$_SESSION['items']=0;
			}

			$conn->close();

	function exitSite(){

	session_destroy();
  header("Location: index.php");
	}

	if(isset($_GET["hello"])){

		exitSite();
	}

	if (isset($_GET['dollar'])) {

		$_SESSION['coin']= "$";
		$_SESSION['price']=0.27;

	}
	if (isset($_GET['euro'])) {

		$_SESSION['coin']= "&#8364;";
		$_SESSION['price']=0.24;

	}
	if (isset($_GET['shekel'])) {

		$_SESSION['coin']= "&#8362;";
		$_SESSION['price']=1;

	}
	if (isset($_POST['di'])) {

//		echo "<script type='text/javascript'>alert('in!!');</script>";

	$txt=$_POST['di'];
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

						$sql="DELETE FROM notification WHERE userName='".$uname."' AND notificationText LIKE '".$txt."%'";

				if ($conn->query($sql) === TRUE) {

			 header("Refresh:0");

			} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			header("Refresh:0");
			echo '<meta http-equiv="refresh" content="1">';

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
  <title>cooKing Home Page</title>



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
<a href="homePage.php?dollar=true" style="width:auto;">
				<button type="button" name="dollar" style="width:30px;">	$</button></a>
				<a href="homePage.php?euro=true" style="width:auto;">
				<button type="button" name="euro" style="width:30px;">&#8364;</button></a>
				<a href="homePage.php?shekel=true" style="width:auto;">
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

<!-- welcoming paragraph -->
<div class="welcoming" id="welcoming">
	<p id="welcometext">Welcome to
		<span style="font-family: 'Playfair Display', serif;font-weight:700;color:#ff6666" >cooking</span>,
	 	here you are going<br> to learn how to cook all by yourself. <br><br>
		<strong style="letter-spacing:1px;">  You choose the recipe, <br>We send you the ingredients! </strong>
	</p>
    <p></p>
</div>

  <!--list of 4 latest recepies (4 in a row- can have more) can add a "show more" button-->
	<label class="recent"> Recent Recipes</label>

		<div class="content hideContent">

<?php

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

			//get user
			$sql="SELECT recipe.recID, recipe.recName, recipe.recPrice, recipe.recPhoto, recipe.recLink ,ROUND(AVG(comments.rank),1) AS average
						FROM comments INNER JOIN recipe on comments.recID=recipe.recID
						GROUP BY recipe.recID";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
					// output data of each row
					$count = 1;
					while($row = $result->fetch_assoc()) {
//split to 4 parts (grid)
						    if ($count%4 == 1)
						    {
						         echo "<div class=recommendations>";
						    }

								echo "<div class=recommend>";
								echo "<h2 class=name>".$row['recName']."</h2>";
						 		echo "<a href=".$row['recLink']."><img src=".$row['recPhoto']." width=100% alt=".$row['recName']."></a>";
								echo "<div class=middle>
											<div class=text>".$row['average']."<i class='fa fa-star-o' style=font-size:36px;color:white></i>
								        </div></div>
											<div class=price>	".$_SESSION['price']*$row['recPrice'], $_SESSION['coin']." </div>
								      </div>";


						    if ($count%4 == 0)
						    {
						        echo "</div>";

						    }
						    $count++;
				}
			}
			$conn->close();
 ?>

		  </div>

			</div>


<a class="up" href="#welcoming">
	<img src="up-arrow.svg" height="20px" alt="up">
</a>
<p></p>
	<br><br><br>

	<div class="footer">
    <p> site designed and coded by Inbar Shwartz & Vitali Girshtel</p>
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
