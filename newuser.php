<?php

    $session = true;
if( session_status() === PHP_SESSION_DISABLED  )
    $session = false;
elseif( session_status() !== PHP_SESSION_ACTIVE )
{ session_start();      

if(isset($_SESSION['username'])) 
	{$now = time();
if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "La tua sessione è scaduta! Torna alla home e rifai il login!";}}}





if(isset($_REQUEST['newUsername']) && isset($_REQUEST['newPassword']) && isset($_REQUEST['newName'])&& isset($_REQUEST['newSurname'])){

$newUsername= htmlEntities($_REQUEST['newUsername']);
$newPassword= htmlEntities($_REQUEST['newPassword']);
$newName= htmlEntities($_REQUEST['newName']);
$newSurname= htmlEntities($_REQUEST['newSurname']);


$con2 = mysqli_connect("localhost", "id801734_unormal", "pass1", "id801734_valutazione_oggetti");
      if (mysqli_connect_errno())
  echo "<p>Errore connessione al DBMS: ".mysqli_connect_error()."</p>";
        else


 {  $query = "INSERT INTO `utenti` (`name`,`surname`,`username`, `password`) VALUES ('$newName','$newSurname','$newUsername','$newPassword' )";

$result = mysqli_query($con2, $query);
         if (!$result)
         { 
?>

      <script type="text/javascript"> 
      alert ("Errore - Il tuo indirizzo email risulta già registrato. Inseriscine un altro o effettua il login" );
      history.go(-1)
</script> 
<?php
         // echo "<tr><td colspan='4'>Errore – query fallita: ".mysqli_error($con2)."</td></tr>"; 

}

             else
            {echo "<p>Utente aggiunto con successo!</p>";
            $_SESSION['username']=$newUsername;
            // $_SESSION['credito']=$credito;
            // $_SESSION['start'] = time();
            $_SESSION['expire'] = time();
            
          header("Location: index.php");} }
            
             mysqli_close($con2);
         


// $con = mysqli_connect("localhost", "uAdmin", "posso_modificare", "prenotazioni");
//       if (mysqli_connect_errno())
//   echo "<p>Errore connessione al DBMS: ".mysqli_connect_error()."</p>";
//         else


//  {if(isset($_COOKIE['prenotazione']))
//   foreach ((array)$_COOKIE['prenotazione'] as $id => $posto)
//     { $query2 = "INSERT INTO `posti` (`id`, `tipo`, `utente`) VALUES ('$posto','b', '$newUsername')";

//     $result2 = mysqli_query($con, $query2);
//          if (!$result2)
//          { echo "<tr><td colspan='4'>Errore – query2 fallita: ".mysqli_error($con)."</td></tr>"; }
//              else
//             {echo "<p>posto newuser prenotato con successo!</p>";  
//               setcookie("prenotazione[$posto]", "$posto", time()-3600);}}}
//              mysqli_close($con);
         
}

 
          ?>



