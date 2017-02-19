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
      <h2>How works this page</h2>
      <ul>
    <li>If you are not logged in you can only read the comments. </li>
  <li>Every logged user can leave only one comment with a score for each object. </li>
  <li>Every logged user can leave a total of 3 votes (Like or Dislike) for each comment.</li>
  <li>Every logged user can delete his comment and insert a new one.</li>
</ul>
      
      
     <span class="left">Average scores: <?php require("mediacommenti.php") ?> <p><img src="style/oggetto.jpg" alt="oggetto" style="width:304px;height:228px;">
      
      </p></span>
   
  
 
      <?php
      $con = mysqli_connect("localhost", "id801734_unormal", "pass1", "id801734_valutazione_oggetti");
      if (mysqli_connect_errno())
  echo "<p>Errore connessione al DBMS: ".mysqli_connect_error()."</p>";
        else
       {

         $query = "SELECT * FROM `commenti` ";
         $result = mysqli_query($con, $query);
            if(!$result)
          echo "<tr><td colspan='4'>Errore – query fallita: ".mysqli_error($con)."</td></tr>";
                else
            {   echo "<form name='elenco_commenti' action='giudiziocommento.php' method='GET'>";
              echo "<table style='width:100%; border-spacing:0;'><tr> <th>Comment</th><th>User</th><th>Score</th><th>Vote</th><th>Leave a vote</th> </tr>";
$commentoinserito=false;
         while($row = mysqli_fetch_assoc($result))
          {  
           if(isset($_SESSION['username']))
                {
                echo "<tr><td>$row[testo]</td><td>$row[utente]</td><td>$row[punteggio]</td><td>$row[giudizio]</td>";
              echo" <td><button type='submit' name='like' value='$row[id_com]',$row[id_com])'><img src='style/like.jpg' alt='like'/>
              </button><button type='submit' name='dislike' value='$row[id_com]' ><img src='style/dislike.jpg' alt='dislike'/></button></td></tr>";
            
            if (($row['utente'])==($_SESSION['username']))
           { $commentoinserito=true;
            echo "<input class='submit' type='submit' name='cancella' value='Cancella il tuo commento' />";
                            }  
                               }
                 if(!isset($_SESSION['username']))
                {echo "<tr><td>$row[testo]</td><td>$row[utente]</td><td>$row[punteggio]</td><td>$row[giudizio]</td><td>Effettua il login per votare il commento</td></tr>";  }

                }
                if(isset($_SESSION['username'])&&(!$commentoinserito))
{
              echo "<form action='giudiziocommento.php' method='GET'>  
              <div class='form_settings'>
            <p><label for='commento'>Inserisci un commento:</label> 
        <input type='text' title='Inserisci un commento' id='commento' name='commento' value=''>
        <p><span>Dai un punteggio: </span><select id='punteggio' name='punteggio'>
        <option value='0'>0</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        </select></p>
            <p style='padding-top: 15px'><span>&nbsp;</span><input class='submit' type='submit' name='' value='Inserisci' /></p>
          </div>
        </form>";

           }      mysqli_free_result($result);
                 }

                mysqli_close($con);
  }        echo "</table></form>";
        ?>

   

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
