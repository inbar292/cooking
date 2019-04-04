<?php

session_start();
if($_SESSION['uname']==="null"|| $_SESSION['uname']===null ){
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

      <!-- development version, includes helpful console warnings -->
      <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
      <!-- production version, optimized for size and speed -->
      <script src="https://cdn.jsdelivr.net/npm/vue"></script>

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

      <style>

      .table {
      font-family: 'Open Sans', sans-serif;
      border-collapse: collapse;
      width: 80%;
      text-align: right;
      }

      td, th {
      border: 1px solid #dddddd;
      text-align:left;
      padding: 8px;

      }

      tr:nth-child(even) {
      background-color: #c0d6f7;
      }
      </style>

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
      <a href="adminData.php?dollar=true" style="width:auto;">
      				<button type="button" name="dollar" style="width:30px;">	$</button></a>
      				<a href="adminData.php?euro=true" style="width:auto;">
      				<button type="button" name="euro" style="width:30px;">&#8364;</button></a>
      				<a href="adminData.php?shekel=true" style="width:auto;">
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
<p></p>
<br><br>
                <section id="main-content" style="margin-top: 130px; margin-left: auto;">
                      <section class="wrapper site-min-height">
                        <div class="col-md-offset-1">
                          <div class= "viewDataformcontainer">
                            <div id="tableDataListDiv">
                            <h4 id="tableDataListHeader"> Select Data Table: </h4>
                            <select class="input-small" id="tableDataListSelect" name="tableDataListSelect">

                              <option value="comments">Comments</option> <!--show-->
                            <option value="user">Users</option> <!--show-->

                            <option value="orders">Orders</option><!--show-->
                            <option value="recipe">Recepies</option>
                            <option value="tag">Tags</option>
                            </select>

                            </div>

                    <div id="viewDataformcontainer" class="col-md-16">
                      <div>
                      <h4 style="margin-left: 0.9em; "> {{ message }} </h4>
                      <div class="col-md-3" style="margin-bottom: 2em;">
                        <input class="form-control" id="searchInput" type="text" v-model="search" placeholder="Search...">
                      </div>
                      </div>

                      <table class="table">
                        <thead>
                        <tr>
                          <th v-for="key in keyList"> {{key}} </th>
                      </tr>
                      </thead>
                        <tr v-for="value in filteredValues">
                            <!-- <th>{{value}}</th> -->
                          <td v-for="otherValue in value">{{otherValue}}</td>
                        </tr>
                      </table>

                  </div>
                  </div>
                </div>
                </section>
                </section>

                </div>

                <script>
                function tableDataTranslated() {
                  app = new Vue ({
                  el: '#viewDataformcontainer',
                  data: {
                    search: '',
                    keyList: [],
                    valueList : [],
                    message : 'Search a value to filter the data in the table.'
                  },
                  mounted() {

                    self = this;
                    self.valueList = val;

                  },
                  computed: {
                    filteredValues() {
                  if (valueURL=="recipe") {
                      return this.valueList.filter(value => {
                        return value.recID.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||
                         value.recName.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||
                         value.howToMake.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||
                         value.recPrice.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||
                         value.recGros.toLowerCase().indexOf(this.search.toLowerCase()) > -1
                       })
                      }
                      else
                       if (valueURL=="orders") {
                      return this.valueList.filter(value => {
                        return value.userName.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||
                         value.recID.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||
                         value.orderNum.toLowerCase().indexOf(this.search.toLowerCase()) > -1
                       })
                      }
                      else
                      if (valueURL=="user") {
                      return this.valueList.filter(value => {
                        return value.userName.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||  value.userDOB.toLowerCase().indexOf(this.search.toLowerCase()) > -1  ||
                         value.userFName.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||
                         value.userSName.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||
                         value.userMail.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||
                         value.userPhone.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||
                         value.userAddress.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||
                         value.userCity.toLowerCase().indexOf(this.search.toLowerCase()) > -1
                       })
                      }
                  else
                  if (valueURL=="tags") {
                        return this.valueList.filter(value => {
                        return value.tagName.toLowerCase().indexOf(this.search.toLowerCase()) > -1
                       })
                      }
                      else
                      if (valueURL=="comments") {
                      return this.valueList.filter(value => {
                        return value.commentID.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||  value.rank.toLowerCase().indexOf(this.search.toLowerCase()) > -1  ||
                         value.userName.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||  value.commentText.toLowerCase().indexOf(this.search.toLowerCase()) > -1 ||
                           value.recID.toLowerCase().indexOf(this.search.toLowerCase()) > -1

                       })
                      }
                     }
                    }
                  })
                  }
                </script>

            <script>
                //keyList
                function checkTableHeaders() {
                  if (valueURL=="recipe") {
                    app.keyList = ['Recipe ID', 'Recipe Name','Recipe Price'];
                  }
                   else if (valueURL=="orders") {
                    app.keyList = ['User Name', 'Recipe ID', 'Order Number'];
                  }
                  else if (valueURL=="tag") {
                    app.keyList = ['Tag Name'];
                  }
                  else if (valueURL=="comments") {
                    app.keyList = ['Comment ID', 'User Name', 'Recipe ID', 'Rank', 'commentText'];
                  }
                  else if (valueURL=="user") {
                    app.keyList = ['Username','First Name','Surname', 'Email', 'Phone', 'Address','City','Password','Date of Birth','Photo URL'];
                  }
                }
            </script>

                            <script>
                            var val, valueURL, self;
                            $("#tableDataListSelect").ready(
                              function(){
                                var selected = $('#tableDataListSelect option:selected').val();
                                    if (window.XMLHttpRequest) {
                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                        xmlhttp = new XMLHttpRequest();
                                    } else {
                                        // code for IE6, IE5
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            val = JSON.parse(this.responseText);
                                            valueURL = selected;
                                            tableDataTranslated();
                                            checkTableHeaders();
                                        }
                                    };
                                    xmlhttp.open("POST","getTableData.php?q="+selected,true);
                                    xmlhttp.send();

                                // var q = $('#tableDataListSelect option:selected').val();
                                //
                                // $.ajax({
                                //   type: "POST",
                                //   url: "getTableData.php",
                                //   data: ({name:q}),
                                //   success: function(data,q){
                                //
                                //       val= JSON.parse(data);
                                //       var selected = $('#tableDataListSelect option:selected').val();
                                //       valueURL= selected;
                                //       //alert(data);
                                // //  alert(val);
                                //   //    alert(selected);
                                //     //  alert(valueURL);
                                //
                                //      tableDataTranslated();
                                //      checkTableHeaders();
                                //
                                //     },
                                //     dataType: 'text'
                                //   });

                            });
                          </script>
                          <script>

                            var val, valueURL, self;
                            $("#tableDataListSelect").change(

                              function(){

                                var selected = $('#tableDataListSelect option:selected').val();
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          //alert(this.responseText);
            val = JSON.parse(this.responseText);
          //  alert(val);
            valueURL = selected;
            self.valueList = val;
            app.search='';
            checkTableHeaders();
        }
    };
    xmlhttp.open("POST","getTableData.php?q="+selected,true);
    xmlhttp.send();

                              // var q = $('#tableDataListSelect option:selected').val();
                              //
                              // $.ajax({
                              //   type: "POST",
                              //   url: "getTableData.php",
                              //   data: ({name:q}),
                              //   success: function(data,q){
                              //
                              //       //alert(data);
                              //       val= JSON.parse(data);
                              //     //  val=data;
                              //       //alert(val);
                              //       var selected = $('#tableDataListSelect option:selected').val();
                              //       // alert(val);
                              //       valueURL= selected;
                              //       //alert(valueURL);
                              //     //  alert(data);
                              //       //alert(val);
                              //       //alert(selected);
                              //       //alert(valueURL);
                              //
                              //      tableDataTranslated();
                              //      checkTableHeaders();
                              //
                              //     },
                              //     dataType: 'text'
                              //   });

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
