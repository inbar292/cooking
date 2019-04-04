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
// Place this at the top of your file
if (isset($_POST['id'])) {

    //echo "<script type='text/javascript'>alert('in!!');</script>";


    $commentID = $_POST['id'];  // You need to sanitize this before using in a query
    // echo "<script type='text/javascript'>alert('$commentID');</script>";
    $uname=$_SESSION['uname'];

    $subtext=$_POST['txt'];
    //	echo "<script type='text/javascript'>alert('$subtext');</script>";
    // 	echo "<script type='text/javascript'>alert('$str');</script>";
    $subcommentID;

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

        $sql2="SELECT count(commentID) FROM subcomments WHERE commentID='.$commentID.'";
        $result = $conn->query($sql2);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $subcommentID= $row['count(commentID)']+1;
              //	 echo "<script type='text/javascript'>alert('$subcommentID');</script>";
            }
        }
        //get sub comment id
        $sql = "INSERT INTO subcomments (commentID, SubCommentID, userName, subtext)
         VALUES( '".$commentID."',
         '".$subcommentID."',
         '".$uname."',
         '".$subtext."')";

          if ($conn->query($sql) === TRUE) {
            //dont show dont know why
          // echo '<script language="javascript">';
          // echo 'alert("new user")';
          // echo '</script>';

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        // Format a desired response (text, html, etc)
  $response = 'Format a response here';
  // This will return your formatted response to the $.post() call in jQuery
  return print_r($response);
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

      <title> cooKing - upload data</title>

      <!-- Style referense-->
        <link rel="stylesheet" href="css/template.css">

      <!--icon library-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">

      <!--fonts-->
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

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
    <a href="uploadData.php?dollar=true" style="width:auto;">
    				<button type="button" name="dollar" style="width:30px;">	$</button></a>
    				<a href="uploadData.php?euro=true" style="width:auto;">
    				<button type="button" name="euro" style="width:30px;">&#8364;</button></a>
    				<a href="uploadData.php?shekel=true" style="width:auto;">
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

        <div class="footer">
          <p> site designed and coded by Inbar Shwartz & Amir Binenfeld</p>
        </div>
        <!--  -->

        <div id="wrDiv">
         <form id="jsonForm" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data" method="post" onsubmit="console.log('submited');">
      	 <h3>json file:</h3>
         <p>this data upload function is only valid to recipe type</p>
      	  <input type="file" name="file" required accept="application/json"><button type="submit" name="subJson">submit json</button>
      	  <br>
      	  <?php
              if(isset($_POST['subJson']))
      		{

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

              $json_name = $_FILES['file']['name'];
              $json_tmp_name= $_FILES['file']['tmp_name'];

              move_uploaded_file($json_tmp_name,"json/$json_name");
              $result =  "json/$json_name";
      		    $json = file_get_contents($result);
      		    $data = json_decode($json,true);
      		    $types = $data['recipe'];

            $numofres= count($types);

      		  foreach($types as $type) {
      			  print "<br><br><b>recipe id: </b>".$type['recID']."<b> <br> name: </b>" . $type['recName'] ."<b>  <br>";

                $recID=$type['recID'];
                $recName=$type['recName'];
                $recGros=$type['recGros'];
                $howToMake=$type['howToMake'];
                $recPrice=$type['recPrice'];
                $recPhoto=$type['recPhoto'];

                $sql = "INSERT INTO `recipe`(`recID`, `recName`, `howToMake`, `recPrice`, `recPhoto`, `recGros`,`recLink`)
                VALUES ('".$recID."','".$recName."','".$howToMake ."','".$recPrice ."','".$recPhoto ."','".$recGros ."','')";

                  if ($conn->query($sql) === TRUE) {
                    //dont show dont know why


                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

      		  }

              //insert a notification
              //get user
              $sql2="Select * from user";

              $result = $conn->query($sql2);

              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {

                    $user=$row['userName'];

                    $sql = "INSERT INTO notification(userName, notificationText)
                    VALUES ('".$user."','There are new recipes on the website')";

                      if ($conn->query($sql) === TRUE) {
                        //dont show dont know why
                      //  echo  "<script type='text/javascript'>alert('inserrt notification');</script>";


                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }


                }
              }

              echo  "<script type='text/javascript'>alert('you have uploaded $numofres recipes');</script>";
              $conn->close();
      		}
      		  ?>
      		  </form>
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
