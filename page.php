<!DOCTYPE HTML>
<html>

<head>
  <title>Rate your goods</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="rate, goods, comments" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">Rate <span class="logo_colour">your goods</span></a></h1>
          <h2>Commenta e lascia il tuo giudizio.</h2>
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
       <h2>Form di registrazione</h2>
       <h3>Inserisci i dati per la registrazione o effettua il login </h3>

<form name="registrazione_form" action="newuser.php" method="POST" >
        <p><label for="newName">Nome:</label> 
        <input type="text" title="Inserisci il tuo nome" id="newName" name="newName" value="" >
        <label for="newSurname">Cognome:</label> 
        <input type="text" title="Inserisci il tuo cognome" id="newSurname" name="newSurname" value="" ></p>
        <p><label for="newUsername">Indirizzo email:</label> 
        <input type="text" title="Inserire un indirizzo email nel formato utente@dominio.tld" id="newUsername" name="newUsername" value="" ></p>
        <p><label for="newPassword">Password:</label> 
        <input type="password" title="Inserire una password tra i 5 e i 10 caratteri alfanumerici" id="newPassword" name="newPassword" value="" ></p>
        <p><input type="submit" value="REGISTRATI" onclick='return checkFormato(newName.value, newSurname.value, newUsername.value,newPassword.value)'> </p>
</form> </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a> | <a href="examples.html">Examples</a> | <a href="page.html">A Page</a> | <a href="another_page.html">Another Page</a> | <a href="contact.html">Contact Us</a></p>
      <p>Copyright &copy; simplestyle_6 | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a></p>
    </div>
    <p>&nbsp;</p>
  </div>
</body>
</html>
