function validate() {

  var fname = document.fname.Fname.value;
  var surename = document.fname.Sname.value;
  var eemail = document.fname.Email.value;
  var paswd = document.fname.Passwd.value;
  var confpaswd = document.fname.Confpasswd.value;
  var phony = document.fname.Phone.value;
  var adres = document.fname.Adrs.value;
  var city = document.fname.Cty.value;
  var date = document.fname.date.value;

  var cpass=document.fname.cPasswd.value;

/*
  if (Firstname == "" || Surename == "" || Eemail == "" || Paswd == "" || Confpaswd == "" || Phony == "" || Adres == "" || City == "" || Date == "") {
    document.getElementById("Fname").style.borderColor = "red";
    document.getElementById("FerrorMessage").innerHTML = "Please Fill All Fields";
    return false;
  } else {  */


    if (fName_validation(fname) && allLetter(fname)) {

      if (sName_validation(surename) && allLetter1(surename)) {

        if (validateEmail(eemail)) {

          if (allnumeric(phony)) {

            if (alphanumeric(adres)) {

              if (cityname(city)) {

                if (passwd_validation(paswd)){

                  if (confpasswd_validation(confpaswd, paswd)) {
                      if (age_validation(date)) {

                     //alert("update!");
                     return true;

                    }
                  }
              }
            }
          }
        }
      }
    }
  //  alert("wrong update!");
    return false;
  }


  function fName_validation(fname) {
    var fname_len = fname.length;
    if (fname_len == "" || fname_len == null) {
      document.getElementById("Fname").style.borderColor = "red";
      document.getElementById("FerrorMessage").innerHTML = "First name should be filled";
      return false;
    } else {
      document.getElementById("FerrorMessage").innerHTML = "";
      if (fname_len < 2) {
        document.getElementById("Fname").style.borderColor = "red";
        document.getElementById("FerrorMessage").innerHTML = "First name should be more than 2 characters";
        return false;
      }
    }
    document.getElementById("Fname").style.borderColor = "green";
    document.getElementById("FerrorMessage").innerHTML = "";
    return true;
  }

  function sName_validation(sname) {
  var sname_len = sname.length;
    if (sname_len < 2) {
      document.getElementById("Sname").style.borderColor = "red";
      document.getElementById("SerrorMessage").innerHTML = "Sure name should be more than 2 characters";
      return false;
    }
    document.getElementById("Sname").style.borderColor = "green";
    document.getElementById("SerrorMessage").innerHTML = "";
    return true;
  }

  function validateEmail(email) {
     var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    //var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (re.test(email)) {
      document.getElementById("Email").style.borderColor = "green";
      document.getElementById("EerrorMessage").innerHTML = "";
      return true;
    } else {
      document.getElementById("Email").style.borderColor = "red";
      document.getElementById("EerrorMessage").innerHTML = "You have entered an invalid email address!";
      return false;
    }
  }

  function allnumeric(phone) {
  //  var numbers = /^[0-9]+$/;
    if ( /^\d+$/.test(phone)) {
      document.getElementById("Phone").style.borderColor = "green";
      document.getElementById("PherrorMessage").innerHTML = "";
      return true;
    } else {
      document.getElementById("Phone").style.borderColor = "red";
      document.getElementById("PherrorMessage").innerHTML = "Phone Number should be only numeric characters";
      return false;
    }
  }

  //Addrees validate
  function alphanumeric(addrs) {
  //  var letters = /^[0-9a-zA-Z]+$/;
  //do not delete " " so it can read space
    if (/^[0-9a-zA-Z ]+$/.test(addrs)) {
      document.getElementById("Adrs").style.borderColor = "green";
      document.getElementById("AerrorMessage").innerHTML = "";
      return true;
    } else {
      document.getElementById("Adrs").style.borderColor = "red";
      document.getElementById("AerrorMessage").innerHTML = "Address should be only alphanumeric characters";
      return false;
    }
  }

  function cityname(city) {
    var letters = /^[A-Za-z ]+$/;
    if (/^[a-zA-Z ]+$/.test(city)) {
      document.getElementById("Cty").style.borderColor = "green";
      document.getElementById("CtyerrorMessage").innerHTML = "";
      return true;
    } else {
      document.getElementById("Cty").style.borderColor = "red";
      document.getElementById("CtyerrorMessage").innerHTML = "City should be only alphabet characters";
      return false;
    }
  }

  function passwd_validation(passwd) {
    var letters = /^[0-9a-zA-Z]+$/;

    if (paswd!="") {
    if (/^[0-9a-zA-Z]+$/.test(passwd)) {
      document.getElementById("Passwd").style.borderColor = "green";
      document.getElementById("PerrorMessage").innerHTML = "";
      return true;
    } else {
      document.getElementById("Passwd").style.borderColor = "red";
      document.getElementById("PerrorMessage").innerHTML = "Password should be only alphanumeric characters";
      return false;
    }
    }
    return true;
  }

  function confpasswd_validation(confpasswd, passwd) {
    var letters = /^[0-9a-zA-Z]+$/;

    if (confpasswd == passwd) {
      document.getElementById("Confpasswd").style.borderColor = "green";
      document.getElementById("ConferrorMessage").innerHTML = "";
      return true;
    } else {
      document.getElementById("Confpasswd").style.borderColor = "red";
      document.getElementById("ConferrorMessage").innerHTML = "Confirm password must be same as password";
      return false;
    }

  }


  function age_validation(dte) {
    var allowBlank = true;
    var maxYear = (new Date()).getFullYear();
    // Return today's date and time
    var currentTime = new Date()
    // returns the month (from 0 to 11)
    var month = currentTime.getMonth() + 1
    // returns the day of the month (from 1 to 31)
    var day = currentTime.getDate()
    // returns the year
    var year = currentTime.getFullYear()

    var errorMsg = "";

  var d= dte.toString();
    var regs = d.split("-");


    if (/^\d+$/.test(regs[1])) {
      if (/^\d+$/.test(regs[2])) {
        if (((year - regs[0]) < 18) || ((year == regs[0]) && (month > regs[1])) || ((year == regs[0]) && (month == regs[1]) && regs[2] > day)) {
          document.getElementById("date").style.borderColor = "red";
          document.getElementById("DerrorMessage").innerHTML = "You must be over 18 to register"
          return false;
        }
      }
    }

    return true;
  }


  function allLetter(uname) {
    var letters = /^[A-Za-z]+$/;
    // if (uname.value.match(letters)) {
    //   document.getElementById("Fname").style.borderColor = "green";
    //   document.getElementById("FerrorMessage").innerHTML = "";
    //   return true;
    // } else {
    if (/^[a-zA-Z]+$/.test(uname)) {
      document.getElementById("Fname").style.borderColor = "green";
      document.getElementById("FerrorMessage").innerHTML = "";
      return true;

    }else{
      document.getElementById("Fname").style.borderColor = "red";
      document.getElementById("DerrorMessage").innerHTML = "Firstname And Surename must have alphabet characters only"
      uname.focus();
      return false;
    }
  }

  function allLetter1(uname) {
  //  var letters = /^[A-Za-z]+$/;
    if (/^[a-zA-Z]+$/.test(uname)) {
      document.getElementById("Sname").style.borderColor = "green";
      document.getElementById("SerrorMessage").innerHTML = "";
      return true;
    } else {
      document.getElementById("Sname").style.borderColor = "red";
      document.getElementById("DerrorMessage").innerHTML = "Firstname And Surename must have alphabet characters only"
      uname.focus();
      return false;
    }
  }

  /*

    if (Firstname == "") {
      document.getElementById("Fname").style.borderColor = "red";
      document.getElementById("FerrorMessage").innerHTML = "Enter First name";
      return false;
    } else if (Firstname.length < 2 && Firstname) {
      document.getElementById("Fname").style.borderColor = "red";
      document.getElementById("FerrorMessage").innerHTML = "First name should be more than 2 characters";
      return false;
    } else if (Paswd == "") {
      alert("Password must be entered");
      document.getElementById("Passwd").style.borderColor = "green";
      return false;
    } else if (Paswd.length < 6) {
      alert("Password should be atleast 6 characters");
      return false;
    } else if (Paswd != Confpaswd) {
      alert("Confirm password must be same as password");
      return false;
    } else {
      document.write("done");
      return true;
    } */
}
