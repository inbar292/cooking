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

  if(isset($_POST['Submit1'])){

		$pic=$_SESSION['inputPic'];
		$filepath = "images/". $_FILES["file"]["name"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath))
		{
		$pic="images/".$_FILES["file"]["name"];

	}
	$userN=$_SESSION['uname'];
	$uname= $_POST["username"];
	$fname = $_POST["Fname"];
	$sname = $_POST["Sname"];
	$email = $_POST["mail"];
	$phone = $_POST["phone"];
	$adrs = $_POST["address"];
	$cty = $_POST["cty"];

	$DOB =  $_POST["date"];

if($_POST["pass"]!=null){

	$passwd = $_POST["pass"];
}else {

		$passwd=$_SESSION['password'] ;
}

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

					$sql= "UPDATE user SET
					userName='".$uname."',
					userFName='".$fname."',
					userSName='".$sname."',
					userMail='".$email."',
					userPhone='".$phone."',
					userAddress='".$adrs."',
					userCity='".$cty."',
					userPass='".$passwd."',
					userDOB='".$DOB."',
					userPhoto='".$pic."'
				  WHERE userName='".$userN."'
					";

						if ($conn->query($sql) === TRUE) {
							//dont show dont know why
				//	 	echo "Record updated successfully";

						$_SESSION['uname']=$uname;
						$_SESSION['firstname'] = 	$fname ;
						$_SESSION['lastname'] = $sname;
						$_SESSION['email'] =$email;
						$_SESSION['phonenumber'] =$phone;
						$_SESSION['address'] =$adrs ;
						$_SESSION['city'] = $cty;
						$_SESSION['password'] =$passwd ;
						$_SESSION['dob'] = $DOB;

					} else {
							echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();
		}

?>

<!doctype html>
<html lang="en">

<head>

  <!-- We keep mooving forward, opening up new doors and
doing new thins, because we are curios...
and curiosity keeps leading us down new paths.
                Walt Disney                      -->
  <!--bootstrap librrary -->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Profile </title>

  <!--icon library-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">

  <!--fonts-->
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <link rel="stylesheet" href="css/Test2.css">
  <script src="js/Login.js"></script>
  <script src="js/MyInfo.js"></script>

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
<a href="test2.php?dollar=true" style="width:auto;">
				<button type="button" name="dollar" style="width:30px;">	$</button></a>
				<a href="test2.php?euro=true" style="width:auto;">
				<button type="button" name="euro" style="width:30px;">&#8364;</button></a>
				<a href="test2.php?shekel=true" style="width:auto;">
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
          <li><a href="Test2.php">My Info</a></li>
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


<!--personal info form-->
<div class="container">
    <h2>personal info</h2>

  <form name="fname" action="test2.php" method="post" onsubmit="return validate();" enctype="multipart/form-data">

        <?php

				$photo=$_SESSION["inputPic"];
        $filepath=	$_SESSION['inputPic'];

        if(isset($_POST['Submit1']))
        {
      $filepath = "images/". $_FILES["file"]["name"];

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath))
        {
	      			$photo=$_SESSION["inputPic"];
      }
      }else {



			  echo "<img src=$photo height=120 width=120 >";
        echo "<br>";

      } ?>


      Select different profile picture :
      <input type="file" name="file" accept="image/*"><br/>
      <!-- user name -->
      <label><b>user name :</b></label><br>
      <input type=text id="user" name="username" value="<?php echo $_SESSION['uname'] ?>"><br>

      <label><b>first name :</b></label><br>
      <input type=text id="Fname" name="Fname" value="<?php echo $_SESSION['firstname'] ?>"><br>
      <label id="FerrorMessage" style="color:red;"></label><br>

      <label><b>surname :</b></label><br>
      <input type=text id="Sname" name="Sname" value="<?php echo  $_SESSION['lastname']; ?>"><br>
      <label id="SerrorMessage" style="color:red;"></label><br>

      <label><b>email :</b></label><br>
      <input type=text id="Email" placeholder="enter email" name="mail" value="<?php echo $_SESSION['email'] ?>"><br>
      <label id="EerrorMessage" style="color:red;"></label><br>

      <label><b>phone :</b></label><br>
      <input type=text id="Phone" name="phone" value="<?php  echo  $_SESSION['phonenumber'];?>"><br>
      <label id="PherrorMessage" style="color:red;"></label><br>

      <label><b>address :</b></label><br>
      <input type=text id="Adrs" name="address" value="<?php echo $_SESSION['address'];?>"><br>
      <label id="AerrorMessage" style="color:red;"></label><br>

      <label><b>city :</b></label><br>
      <input type=text id="Cty" name="cty" value="<?php echo $_SESSION['city'];?>"><br>
      <label id="CtyerrorMessage" style="color:red;"></label><br>

      <label><b>current password :</b></label><br>
      <input type=password id="cPasswd"  name="cpass" value="<?php echo  $_SESSION['password'];?>"><br>

      <label><b>new password :</b></label><br>
      <input type=password id="Passwd" name="pass"><br>
      <label id="PerrorMessage" style="color:red;"></label><br>

      <label><b>confirm password :</b></label><br>
      <input type=password id="Confpasswd"><br>
      <label id="ConferrorMessage" style="color:red;"></label><br>

      <label><b>date of birth :</b></label><br>
      <input type=date id="date" name="date" value="<?php echo $_SESSION['dob'];?>"><br>
      <label id="DerrorMessage" style="color:red;"></label><br>

      <button id="Submit1" name="Submit1" > submit </button>
			<br><br><br>
			<p></p>
  </form>


  <script>
	$("#Submit1").click(function () {
		var x= validate();

		if(x){

		 location.replace("homePage.php")

}

});
</script>

</div>

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
    //  alert(val);

     $.post(location.href, { di: $(this).attr('id'),txt:val }, function(response) {
       // Inserts your chosen response into the page in 'response-content' DIV
       $('#response-content').html(response); // Can also use .text(), .append(), etc

     });
   });
 });
</script>
</html>
