<?php
  session_start();

  if(isset($_POST['btnLogin']))
  {
    //session username and pass
      $logMsg = "";
      $uname;
      $password;
    //check if there is a value
    if(isset($_POST['uname']))
      $uname =  $_POST['uname'];
    if(isset($_POST['pass']))
      $pass = $_POST['pass'];

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
      echo "Connected successfully";

      //get user
      $sql="Select * from user where user.userName='$uname'";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            //if user name exists
            echo $row["userName"];
            echo "<br>";

              //if pass correct
              if( $row["userPass"]==$pass){


                $_SESSION['uname'] = $uname;
                header("Location:homePage.php");
                exit();
                $conn->close();

            }else{
              $logMsg = "Invalid password";
              $_SESSION['uname'] ="null";
            }



        }
      } else {
          echo "there is no such user name";
      }
      $conn->close();
    }


  if(isset($_POST['signup']))
  {
      $mail=$_POST['remail'];
      $_SESSION['mail']=$mail;
      header("Location: signup.php");
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>login / signup form </title>
  <link rel="stylesheet" href="css/Logpage.css">


  <!--fonts-->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body>

  <div class="navbar">
      <span id="myheader" style="font-family: 'Playfair Display', serif; color:white;">cooking
        <img src="things\cutlery-cross-couple-of-fork-and-spoon.png" height="35px">
          <!-- <img src="https://image.flaticon.com/icons/svg/45/45200.svg" height="35px" alt="logo"></a> -->
      </span>
  </div>

  <div class="wrapper w100">

    <div class="container w100">
      <input id='tab1' name="tabs" type='radio' checked />
      <input id='tab2' name="tabs" type='radio' />
      <div class="tabs w100">
        <label class="t1" for='tab1'>Login</label>
        <label class="t2" for='tab2'>Sign up</label>
      </div>

      <div class="content w100" id="contentOne">
        <?php if(isset($logMsg)) echo "<span class='text-danger'>$logMsg</span><br>"?>
        <form action="index.php" method="post" >
          <!-- use a php function to check fields -->
          <div class="field">
            <input id="uname" placeholder="Username" type="text" name="uname" required>
            <svg class="icon">
              <use xlink:href="#icon-person"></use>
            </svg>
          </div>
          <div class="field">
            <input id="upass" placeholder="Password" type="password" name="pass" required>
            <svg class="icon">
              <use xlink:href="#icon-lock"></use>
            </svg>
            <svg class="icon-eye" onclick="togglePassVisibility('upass');">
              <use xlink:href="#icon-eye"></use>
            </svg>
          </div>
            <button type="submit"  onclick="" name="btnLogin"> Login
            <svg class="icon">
              <use xlink:href="#icon-arrow-right-outline"></use>
            </svg>
          </button>

          <a href="https://facebook.com" class="btn btn-social-icon btn-facebook">
            <span class="fa fa-facebook"></span>
          </a>
          <div class="field small">
            <a href="#forgot" tabindex="5" class="forgot-password">Forgot
              Password?</a>
          </div>
        </form>
      </div>
      <div class="content w100" id="contentTwo">
        <form action="index.php" method="post">
          <div class="field">
            <input id="rmail" placeholder="your email" type="email" name="remail" required>
            <svg class="icon">
              <use xlink:href="#icon-mail"></use>
            </svg>
          </div>
          <button type="submit" name="signup"> Sign up
            <svg class="icon">
              <use xlink:href="#icon-arrow-right-outline"></use>
            </svg>
          </button>
          <div class="field small" id="regField">
            By clicking Register, you agree to the <a href="#terms">Terms
              and Conditions</a> set out by this site, including our <a href="#cookies">Cookie Use</a>.
          </div>

        </form>
      </div>
    </div>
  </div>

  <div id="forgot" class="pop w100">
    <div class="dialog">
      <h2>Password Recovery</h2>
      <a href="#">&#x2715;</a>
      <form action="javascript:return false;">
        <div class="field">
          <input id="email" placeholder="E-mail" type="email" name="recover" required>
          <svg class="icon">
            <use xlink:href="#icon-mail"></use>
          </svg>
        </div>
        <button type="submit"> Send new password
          <svg class="icon">
            <use xlink:href="#icon-arrow-right-outline"></use>
          </svg>
        </button>
      </form>
    </div>
  </div>
  <div id="terms" class="pop w100">
    <div class="dialog">
      <h2>Terms and Conditions</h2>
      <a href="#">&#x2715;</a>
      <div> By accessing this website, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws.
      </div>
    </div>
  </div>
  <div id="cookies" class="pop w100">
    <div class="dialog">
      <h2>Cookie Policy</h2>
      <a href="#">&#x2715;</a>
      <div>As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience. </div>
    </div>
  </div>


  <svg class="svg-icons">
    <symbol id="icon-person" viewBox="0 0 24 24">
      <path d="M12 14.016c2.672 0 8.016 1.313 8.016 3.984v2.016h-16.031v-2.016c0-2.672 5.344-3.984 8.016-3.984zM12 12c-2.203 0-3.984-1.781-3.984-3.984s1.781-4.031 3.984-4.031 3.984 1.828 3.984 4.031-1.781 3.984-3.984 3.984z"></path>
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 24 24">
      <path d="M8.5 11c0 0.732 0.166 1.424 0.449 2.051l-3.949 3.949c0 0 0 0.672 0 1.5s0.896 1.5 2 1.5h2v-2h2v-2c0 0 2.329 0 2.5 0 2.762 0 5-2.238 5-5s-2.238-5-5-5-5 2.238-5 5zM13.5 13c-1.104 0-2-0.896-2-2 0-1.105 0.896-2.002 2-2.002 1.105 0 2 0.896 2 2.002 0 1.104-0.895 2-2 2z"></path>
    </symbol>
    <symbol id="icon-mail" viewBox="0 0 24 24">
      <path d="M12 11.016l8.016-5.016h-16.031zM20.016 18v-9.984l-8.016 4.969-8.016-4.969v9.984h16.031zM20.016 3.984c1.078 0 1.969 0.938 1.969 2.016v12c0 1.078-0.891 2.016-1.969 2.016h-16.031c-1.078 0-1.969-0.938-1.969-2.016v-12c0-1.078 0.891-2.016 1.969-2.016h16.031z"></path>
    </symbol>
    <symbol id="icon-arrow-right-outline" viewBox="0 0 24 24">
      <path d="M13.293 7.293c-0.391 0.391-0.391 1.023 0 1.414l2.293 2.293h-7.586c-0.552 0-1 0.448-1 1s0.448 1 1 1h7.586l-2.293 2.293c-0.391 0.391-0.391 1.023 0 1.414 0.195 0.195 0.451 0.293 0.707 0.293s0.512-0.098 0.707-0.293l4.707-4.707-4.707-4.707c-0.391-0.391-1.023-0.391-1.414 0z"></path>
    </symbol>
    <symbol id="icon-eye" viewBox="0 0 24 24">
      <path d="M12 9c1.641 0 3 1.359 3 3s-1.359 3-3 3-3-1.359-3-3 1.359-3 3-3zM12 17.016c2.766 0 5.016-2.25 5.016-5.016s-2.25-5.016-5.016-5.016-5.016 2.25-5.016 5.016 2.25 5.016 5.016 5.016zM12 4.5c5.016 0 9.281 3.094 11.016 7.5-1.734 4.406-6 7.5-11.016 7.5s-9.281-3.094-11.016-7.5c1.734-4.406 6-7.5 11.016-7.5z"></path>
      <rect id="visible" style="stroke-width:3;" width="19.118645" height="0.40677965" x="6.4119263" y="-3.57639" transform="matrix(0.54941993,0.83554637,-0.83554637,0.54941993,0,0)" />
    </symbol>
  </svg>



  <script src="js/Login.js"></script>




</body>

</html>
