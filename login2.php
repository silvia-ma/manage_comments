<?php


 $session = true;
if( session_status() === PHP_SESSION_DISABLED  )
    $session = false;
elseif( session_status() !== PHP_SESSION_ACTIVE )
{ session_start();      

}


if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){

  $username= htmlEntities($_REQUEST['username']);
  $password= htmlEntities($_REQUEST['password']);


$con = mysqli_connect("localhost", "id801734_unormal", "pass1", "id801734_valutazione_oggetti");
      if (mysqli_connect_errno())
  echo "<p>Errore connessione al DBMS: ".mysqli_connect_error()."</p>";
        else
       {   $query = "SELECT * FROM `utenti` WHERE username='$username'AND password='$password'";
         $result = mysqli_query($con, $query);
            if(!$result)
          echo "<tr><td colspan='4'>Errore – query fallita: ".mysqli_error($con)."</td></tr>";
                else 
          { if (mysqli_num_rows($result)==0)
           
           { 
            ?>

      <script type="text/javascript"> 
      alert ("Errore - Username e/o password inseriti non presenti nel database. Riprova." );
      history.go(-1);
</script> 
<?php
}
            // echo "<tr><td colspan='4'>Username e/o password inseriti non presenti nel database: ".mysqli_error($con)."</td></tr>";

            else if (mysqli_num_rows($result)==1)
			{      $row1 = mysqli_fetch_assoc($result); 
         $_SESSION['username']=$username;
      
        $_SESSION['expire'] = time();
           mysqli_close($con); 
                header("Location: index.php"); 
          
            }}}

                mysqli_close($con); 
                 
                 }  



// if(isset($_SESSION['username']))

// {$username=$_SESSION['username'];

//   $con = mysqli_connect("localhost", "uAdmin", "posso_modificare", "azioni");
//       if (mysqli_connect_errno())
//   echo "<p>Errore connessione al DBMS: ".mysqli_connect_error()."</p>";
//         else


//  {if(isset($_COOKIE['prenotazione']))
//   foreach ((array)$_COOKIE['prenotazione'] as $posto)
//     { $query2 = "INSERT INTO `posti` (`id`, `tipo`, `utente`) VALUES ('$posto','b', '$username')";

//     $result2 = mysqli_query($con, $query2);
//          if (!$result2)
//          { echo "<tr><td colspan='4'>Errore – query2 fallita: ".mysqli_error($con)."</td></tr>";
//          setcookie("prenotazione[$posto]", "$posto", time()-3600); }
//              else
//             {echo "<p>Posto login2 prenotato con successo!</p>"; 
//           setcookie("prenotazione[$posto]", "$posto", time()-3600);} }}
            
//              mysqli_close($con);}
?>