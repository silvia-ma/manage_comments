
<!DOCTYPE HTML>
<html>

<head>
  <title>Rate your goods</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="rate, goods, comments" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <script type="text/javascript" src="functions2.js">
</script>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">Rate <span class="logo_colour">your goods</span></a></h1>
          <h2>Comments e leave your vote.</h2>
        </div>
        </div>

      <?php     
    require("menubar.php");

         ?>

    <div id="content_header"></div>
    <div id="site_content">

<?php     
    require("sidebar.php");

         ?>


      <div id="content">
       <h2>Sign-up Form</h2>
       <h3>Insert your details to sign-up or login </h3>

<form name="registrazione_form" action="newuser.php" method="POST" ><div class="form_settings">
        <p><label for="newName">Name:</label> 
        <input type="text" title="Please insert your name" id="newName" name="newName" value="">
        <p><label for="newSurname">Surname:</label> 
        <input type="text" title="Please insert your surname" id="newSurname" name="newSurname" value="" ></p>
        <p><label for="newUsername">Email address:</label> 
        <input type="text" title="Please insert you address email with the format local-part@domain.tld" id="newUsername" name="newUsername" value="" ></p>
        <p><label for="newPassword">Password:</label> 
        <input type="password" title="Please insert your password with a length from 5 to 10 alphanumeric characters" id="newPassword" name="newPassword" value="" ></p>
        <p><input type="submit" value="SIGN IN" onclick='return checkFormato(newName.value, newSurname.value, newUsername.value,newPassword.value)'> </p>
</div></form> 

</div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="simple/index.php">Home</a> | <a href="simple/oggetti.php">Oggetti</a> </p>
      <p>Copyright &copy; Silvia Manca | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> </p>
    </div>
    <p>&nbsp;</p>
  </div>
</body>
</html>
