<?php
session_start();

if(isset($_POST['signup'])){

$uname=$_POST['username'];
$fname=$_POST['Fname'];
$sname =$_POST['Sname'];
$email=$_POST['Email'];
$phone=$_POST['Phone'];
$adrs=$_POST['Adrs'];
$cty=$_POST['Cty'];
$passwd=$_POST['Passwd'];
$DOB= $_POST['date'];

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

          $sql = "INSERT INTO user (userName, userFName,userSName, userMail, userPhone, userAddress, userCity, userPass, userDOB, userPhoto)
           VALUES( '".$uname ."',
           '".$fname."',
           '".$sname."' ,
           '".$email."',
           '".$phone."',
           '".$adrs."',
           '".$cty."',
           '".$passwd."',
           $DOB,
          '' )";

            if ($conn->query($sql) === TRUE) {
              //dont show dont know why
            echo '<script language="javascript">';
            echo 'alert("new user")';
            echo '</script>';
            $_SESSION['uname']=$uname;
              header("Location: homePage.php");
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }

          $conn->close();
        }
?>

 <!DOCTYPE html>
<html lang="en" dir="ltr">
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

        <title> signup </title>

				 <!--icon library-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">

        <!--fonts-->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

					<script src="js/checksignup.js"></script>
					<!-- Style referense-->
					<link rel="stylesheet" href="css/test2.css">

</head>
  <body>

            <!-- ***********fixedd top**************** -->
                <!-- ***********fixedd logo with search bar**************** -->

            <div class="navbar">
              <div class="navbartop">
                <span id="myheader">cooking
                    <img src="https://image.flaticon.com/icons/svg/45/45200.svg" height="35px" alt="logo"></a>
                </span>
                <!-- search bar -->
                <!-- <div id="searchbar">
                  <input type="text" placeholder="Enter keyword" name="search"><button id="searchButton" type="submit"><i class="fa fa-search"></i></button>
                </div> -->
              </div>
              <!-- space- do not deltete -->
              <p></p>
            </div>
            <!-- ***********menu**************** -->
            <nav>
              <ul class="navbarbuttom">
                <li><a class="active" href="#">Home</a></li>
                <li><a href="#">Index</a></li>
                <li><a href="#"> About Us</a> </li>
                <li><a href="#">Account</a>
                  <ul>
                  </ul>
                </li>
                <li><a href="#">Contact us</a></li>
                <li id="Logout"><a href="index.php" style="width:auto;">Logout</a></li>

              </ul>
            </nav>


<div class="footer">
  <p> site designed and coded by Inbar Shwartz & Amir Binenfeld</p>
</div>


<div class="container">
  <h2 style="margin:0px;">personal info</h2>
  <form name="fname"  method="post" onsubmit="return validate();">
    <label><b>user name :</b></label><br>
    <input type=text id="uname" name="username" placeholder="enter user name" required><br>

      <label><b>first name :</b></label><br>
      <input type=text id="Fname" name="Fname" placeholder="enter first name" required><br>
      <label id="FerrorMessage" style="color:red;"></label><br>
      <label><b>surname :</b></label><br>
      <input type=text id="Sname"  name="Sname" placeholder="enter surname" required><br>
      <label id="SerrorMessage" style="color:red;"></label><br>
      <label><b>email :</b></label><br>
      <input type=text id="Email" name="Email" placeholder="enter email" value="<?php


            if(isset($_SESSION['mail'])){
							  echo $_SESSION['mail'];
						}else {
							echo 'enter email';
						}

         ?>"><br>
      <label id="EerrorMessage" style="color:red;"></label><br>
      <label><b>phone :</b></label><br>
      <input type=text id="Phone" name="Phone" placeholder="enter phone number" required><br>
      <label id="PerrorMessage" style="color:red;"></label><br>
      <label><b>address :</b></label><br>
      <input type=text id="Adrs" name="Adrs" placeholder="enter address" required><br>
      <label id="AerrorMessage" style="color:red;"></label><br>
      <label><b>city :</b></label><br>
      <input type=text id="Cty" name="Cty" placeholder="enter city" required><br>
      <label id="CtyerrorMessage" style="color:red;"></label><br>
      <label><b>password :</b></label><br>
      <input type=password id="Passwd" name="Passwd" placeholder="enter password" required><br>
      <label id="PerrorMessage" style="color:red;"></label><br>
      <label><b>confirm password :</b></label><br>
      <input type=password id="Confpasswd" placeholder="enter password once again" required><br>
      <label id="ConferrorMessage" style="color:red;"></label><br>
      <label><b>date of birth :</b></label><br>
      <input type=date id="date"  name="date"  placeholder="enter date of birth"><br>
      <label id="DerrorMessage" style="color:red;"></label><br>

			<button id="signup" name="signup" type="submit"> sign up </button>
			<button type="button" id="MyButton" class="cancel" value="cancel" > cancel </button>
  </form>

	</div>

<script>
$("#MyButton").click(function () {
location.replace("index.php")
});
</script>

	<br><br>
  </body>
</html>
