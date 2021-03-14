<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" > 

<!-- @p.poudel 02/20/2020 -->

<head>
  <title>signup</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="std.css">
</head> 
<body>
<?php

include 'header.php';
include 'menu.php';
?>
<?php
$error = FALSE;
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phn'];
$email= $_POST['email'];
//$date = $_POST['DOB'];


if ( empty($fname) ||
      ! preg_match('/^[a-zA-Z0-9 ]{2,}$/', $fname) )
  {
    $error = TRUE;
    echo "The name field is required, and can contain only letters, numbers, and spaces.";
  }


  if ( empty($phone) ||
       strlen($phone) != 10 ||
       ! is_numeric($phone) )
  {
    $error = TRUE;
    echo "A ten digit phone number is required.";
  }


  if ( empty($email) ||
      ! preg_match('/^.+@.+$/', $email) )
  {
    $error = TRUE;
    echo "A valid email address is required.";
  }



if (!$error) {
    $regfile = fopen("/home/ppoudel/secure_html/cs312/project/subscribe_data.txt", "c");
  

    fwrite($regfile,$fname);
fwrite($regfile, "  ");
    fwrite($regfile,$lname);
fwrite($regfile, " | ");
    fwrite($regfile,$phone);
//fwrite($regfile, " | ");
 // fwrite($regfile,$date);
fwrite($regfile, " | ");
  fwrite($regfile,$email);

    fclose($regfile);

  }

if(! $error) {
    echo "Welcome, " . $fname . "!  ";
    echo '<a href="subscribe_data.txt"> Registration File </a>';
  }

?>


<p class="thin">
<form method="POST" action="volunteer.php">
<label for="fname">First name:</label>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">Last name:</label>
  <input type="text" id="lname" name="lname"><br>
 <label for="phn">Phone number:</label>
  <input type="Tel" id="phn" name="phn"><br>

  <p>Gender</p>
  <input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label><br>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label><br>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label><br>
<p>Choose one or both.<br>
<input type="checkbox"  name="account" value="account">
<label> I want to open an account.</label><br>
<input type="checkbox" id="options" name="email" value="email">
<label> I want to receive emails.</label><br>

</p>

<label>Birth date:</label>

<select id="date">
  <option value="1985">1985</option>
  <option value="1986">1986</option>
  <option value="1987">1987</option>
  <option value="1988">1988</option>
  <option value="1989">1989</option>
  <option value="1990">1990</option>
  <option value="1991">1991</option>
  <option value="1992">1992</option>
  <option value="1993">1993</option>
  <option value="1994">1994</option>
  <option value="1995">1995</option>
  <option value="1996">1996</option>
</select>

  <p>Email:<input type="email" name="email" placeholder="my.name@example.com"
    size="50"/></p>
  <p><input type="submit" value="Submit" name="submit"/></p>
</form>

</p>
</body>
</html>
