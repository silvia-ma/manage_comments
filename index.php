 <?php require 'session.php';?>

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
          
          <h1><a href="index.php">Rate <span class="logo_colour">your goods</span></a></h1>
          <h2>Comments e leave your vote.</h2>
        </div>
      </div>
     
<?php     
    require("menubar.php");
    ?>

<script type="text/javascript">
     are_cookies_enabled();
    
     </script>


    <div id="content_header"></div>
    <div id="site_content">

<?php     
    require("sidebar.php");

         ?>
      


      <div id="content">
        <h1>Welcome on this website</h1>
        <p>To leave your comments or your vote <b>Sign In</b> or <b>Log In</b>. Then click on <b>Objects</b> on the Top Menu.</p>
        

        
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.php">Home</a> | <a href="oggetti.php">Oggetti</a> </p>
      <p>Copyright &copy; Silvia Manca | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> </p>
    </div>
    <p>&nbsp;</p>
  </div>
</body>
</html>
