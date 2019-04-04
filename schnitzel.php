
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

$thisRecId= 3;


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

if (isset($_GET['addToCart'])) {

		 //echo "<script type='text/javascript'>alert('in');</script>";

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


				//get sub comment id
				$sql3 = "INSERT INTO cart (userName, recNum)
				 VALUES( '".$uname."', '".$thisRecId."')";

					if ($conn->query($sql3) === TRUE) {
						//dont show dont know why
					// echo '<script language="javascript">';
					// echo 'alert("new user")';
					// echo '</script>';
					$_SESSION['items']=	$_SESSION['items']+1;

				} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
				}

				$conn->close();
	// code...
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
			<!-- refresh every 20 seconds -->
			<meta http-equiv="refresh" content="20" />

      <title> cooKing </title>
      <!-- Style referense-->
        <link rel="stylesheet" href="css/recepiePage.css">

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
		<script>
				$(document).ready(function() {
				$("form#ratingForm").submit(function(e)
				{
						e.preventDefault(); // prevent the default click action from being performed
						if ($("#ratingForm :radio:checked").length == 0) {
								$('#status').html("nothing checked");
								return false;
						} else {
								$('#status').html( 'You picked ' + $('input:radio[name=rating]:checked').val() );
						}
				});
		});
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
			<a href="schnitzel.php?dollar=true" style="width:auto;">
							<button type="button" name="dollar" style="width:30px;">	$</button></a>
							<a href="schnitzel.php?euro=true" style="width:auto;">
							<button type="button" name="euro" style="width:30px;">&#8364;</button></a>
							<a href="schnitzel.php?shekel=true" style="width:auto;">
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

<!-- all of the info of recipe -->
  <div class="recepiePage">

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

    //get recipe
    $sql="SELECT * from recipe where recipe.recID='$thisRecId' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo " <div class=title><h1> ";
          echo $row['recName'];
          echo "</h1></div>";

          echo "<div class=photo>
               <img id=recepieimg src='";
            echo $row['recPhoto'];
            echo "' width=100% alt=mushroom risotto> </div>";

            echo "<div class=photoplus>
                <div class=recepie>
                <div class=recipetitle>
                <h2>Ingredients</h2>";

                echo $row['recGros'];

                echo "</div>
            <div class=recipetitle>
            <h2>Preparation </h2>";
            echo $row['howToMake'];
            echo "  </div> </div>
                    </div>";

										echo "<div  class=addtocartcontent >only ".$_SESSION['price']*$row['recPrice'], $_SESSION['coin'];
										echo "&nbsp&nbsp&nbsp<a href=schnitzel.php?addToCart=true style=width:auto; ><button type=button name=button style=width:220px;height:40px; >add to cart</button></a>";
										echo "</div><p></p>";

      }
    }

$conn->close();

 ?>

<div id="commentSection" class="comments">
  <h2>Comments</h2>

    <form id="ratingform" action="snitzel.php" enctype="multipart/form-data" method="POST">

      <fieldset class="rating">
         <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
         <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
         <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
         <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
         <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
       </fieldset>
       <br>

        <textarea name="txt" rows="8" cols="80"></textarea>
        <input type="file" name="file" accept="image/*"><br>
        <p>**photo cannot be bigger than 8 mb</p>

        <input type="submit" id="comment" name="Submit1" value="comment">
				<p></p>
				<?php
				if(isset($_POST["Submit1"]) && $_POST['txt']!=null){


				$filepath = "images/" . $_FILES["file"]["name"];

				if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath) || $filepath==="images/")
				{
			//	echo "<script type='text/javascript'>alert('$filepath');</script>";
				$txt=$_POST['txt'];
			//	echo "<script type='text/javascript'>alert('$txt');</script>";
				$radioVal=$_POST["rating"];
			//	 echo "<script type='text/javascript'>alert('$radioVal');</script>";
				 $commentID;

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
						 $sql="SELECT count(commentID) FROM comments";

						 $result = $conn->query($sql);

						 if ($result->num_rows > 0) {
							 $commentID=$result->num_rows+1;
							   while($row = $result->fetch_assoc()) {
									 $commentID= $row['count(commentID)']+1;
									//  echo "<script type='text/javascript'>alert('$commentID');</script>";
								 }

						 }

				     $sql2= "INSERT INTO comments (commentID, userName, recID, rank, commentText, commPhoto)
				     VALUES (
				      '".$commentID."',
				      '".$uname."' ,
				      '".$thisRecId."',
				      '".$radioVal."',
				      '".$txt."',
				      '".$filepath."')";

				       if ($conn->query($sql2) === TRUE) {
				      //  echo "<script type='text/javascript'>alert('comment');</script>";

				     } else {
				         echo "Error: " . $sql . "<br>" . $conn->error;
				     }

				     $conn->close();
				   }
				}
				 ?>
    </form>

    <br>
<h2>All comments</h2>

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

      //get all comments
     $sql="SELECT * FROM comments WHERE comments.recId='$thisRecId' ";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {

            //print every comments
            echo "<div class=comment style='border-bottom:2px solid #ff6666; width:80%'>";
            echo $row['userName'];
            echo " says: <br>";

            if($row['rank'] == "5")
            {
            echo "<span style=font-size:20pt;>★★★★★</span>";
            }
            if($row['rank'] == "4")
            {
            echo "<span style=font-size:20pt;>★★★★</span>";
            }
            if($row['rank'] == "3")
            {
            echo "<span style=font-size:20pt;>★★★</span>";
            }
            if($row['rank'] == "2")
            {
            echo "<span style=font-size:20pt;>★★</span>";
            }
            if($row['rank'] == "1")
            {
            echo "<span style=font-size:20pt;>★</span>";
            }
            echo "<br>";

            echo $row['commentText'];
            echo "<br> <p></p>";

            if($row['commPhoto']!=null && $row['commPhoto']!="images/"){
                echo "<img src=".$row['commPhoto']." height=300 width=400 /> <br> <p></p>";
            }
												$commentID=$row['commentID'];
													//get all comments
												 $sql2="SELECT * FROM subcomments WHERE subcomments.commentID='$commentID'";
												 $result2 = $conn->query($sql2);

											 if ($result2->num_rows > 0) {
													 // output data of each row
													 while($row2 = $result2->fetch_assoc()) {
														echo "<div class=subComment style='border-left:2px solid #ff6666;margin-left:25; padding-left:10px; width:60%'>";
														 echo " ";
														 echo $row2['userName'];
														 echo " says: <br>";
														 echo " ";
														 echo $row2['subtext'];
														 echo "<br> <p></p>";
														 echo "</div>";
										}
						     }

						//reply
						echo "<form id=form$commentID action=schnitzel.php enctype=multipart/form-data  method=POST>";
						echo "<textarea id=subtext$commentID name=subtext$commentID rows=2 cols=40></textarea>";
						echo "<p></p><br>";
						echo "<p></p><br>";

						echo "<button type=submit class=reply id=".$commentID." name=reply> reply</button><br><p></p>";
						echo "</form>";

          	echo "<p></p><br>";

echo "</div>";
	 }
}

     $conn->close();
 ?>
    </div>


  </div>

<div id='response-content'></div>

	<script  type='text/javascript'>

	$(document).ready(function() {
     $('.reply').click(function() {

			 var sub="#subtext";
			 var subid=$(this).attr('id');

			 var textarea=sub.concat(subid);
			 //text
				var val = $(textarea).val();
				//alert(val);

       $.post(location.href, { id: $(this).attr('id'),txt:val }, function(response) {
         // Inserts your chosen response into the page in 'response-content' DIV
         $('#response-content').html(response); // Can also use .text(), .append(), etc
       });
     });
   });
	</script>

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
