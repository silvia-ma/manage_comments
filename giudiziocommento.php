 <?php require 'session.php';

$con = mysqli_connect("localhost", "id801734_unormal", "pass1", "id801734_valutazione_oggetti");
 if (mysqli_connect_errno())
  echo "<p>Errore connessione al DBMS: ".mysqli_connect_error()."</p>";
        else
{


if (!isset($_SESSION['username']) )
{
  echo "Non sei loggato. Torna alla <a href=\"oggetti.php\">pagina precedente</a></p> ";
}

else {
  $utente = $_SESSION['username'];

if(isset($_REQUEST['commento']) &&  ($_REQUEST['commento']!=null)){

try {
mysqli_autocommit($con,false);

      $query1 = "SELECT id_com FROM `commenti` ORDER BY id_com";
           $result = mysqli_query($con, $query1);
           if(!$result)
          echo "<tr><td colspan='4'>Errore – query fallita: ".mysqli_error($con)."</td></tr>";
                else
            {    $j=1;
                 $flag=false;
                 $nrow = mysqli_num_rows($result);
                 while($row = mysqli_fetch_assoc($result))
                 { foreach ( $row as $key => $value )
                   { if ($value!=$j)
                     {$id_com=$j;
                     $flag=true;}
                     else
                     $j++;  }              }
                     if($flag==false)
                     $id_com=$row++;

            mysqli_free_result($result);

           $testo = htmlEntities($_REQUEST['commento']);
           $punteggio = $_REQUEST['punteggio'];

            $query = "INSERT INTO `commenti` (`id_com`, `utente`, `testo`, `punteggio`, `giudizio`) VALUES
           ('$id_com',   (SELECT username FROM utenti WHERE username='$utente') ,'$testo','$punteggio',0)";
         $result = mysqli_query($con, $query);
         if (!$result)
         { echo "<tr><td colspan='4'>Errore1 – query fallita: ".mysqli_error($con)."</td></tr>"; }
             else
            {echo "<p>Commento aggiunto con successo!</p>"; } }
            

     echo "<p>Torna alla <a href=\"oggetti.php\">pagina precedente</a></p>";
   if (!mysqli_commit($con)) {
// per avere il corretto messaggio di errore
throw Exception("Commit fallita");
}
} catch (Exception $e) {
mysqli_rollback($con);
echo "Rollback ";}     
        
 mysqli_close($con);


        
         }




if(isset($_REQUEST['like'])){
	$id_com = $_REQUEST['like'];


try {
mysqli_autocommit($con,false);
    $sql = "SELECT num_giudizi FROM `giudizi` WHERE  id_com = '$id_com' AND utente = '$utente'";
 
$result1 = mysqli_query($con, $sql);
         if (!$result1)
        { echo "<tr><td colspan='4'>Errore2 – query fallita: ".mysqli_error($con)."</td></tr>"; }
             else
            { 
              $row = mysqli_fetch_assoc($result1);
              if (intval($row["num_giudizi"]) == null)

{ $queryinsert = "INSERT INTO `giudizi` (`id_com`,`utente`,`num_giudizi`) VALUES ('$id_com','$utente', 1 )"; 
         $result = mysqli_query($con, $queryinsert);
         if (!$result)
        { echo "<tr><td colspan='4'>Errore3 – query fallita: ".mysqli_error($con)."</td></tr>"; }
             else
            { $query2 = "UPDATE `commenti` SET giudizio = giudizio +1 WHERE id_com = '$id_com'";
$result3 = mysqli_query($con, $query2);
              echo "<p>Aggiornamento avvenuto con successo!</p> Torna alla <a href=\"oggetti.php\">pagina precedente</a></p>";  }    

           }
                
             else if (intval($row["num_giudizi"]) < 3)
                
          {  $query = "UPDATE `commenti` SET giudizio = giudizio +1 WHERE id_com = '$id_com'";
       $result = mysqli_query($con, $query);
         if (!$result)
        { echo "<tr><td colspan='4'>Errore3 – query fallita: ".mysqli_error($con)."</td></tr>"; }
             else
            { $query2 = "UPDATE `giudizi` SET num_giudizi = num_giudizi +1 WHERE id_com = '$id_com' AND utente = '$utente' ";
$result3 = mysqli_query($con, $query2);
              echo "<p>Aggiornamento avvenuto con successo!</p>";  
            echo "<p>Torna alla <a href=\"oggetti.php\">pagina precedente</a></p>";}    

           }

          else if (intval($row["num_giudizi"]) >= 3)
            echo "hai inserito 3 giudizi per questo commento. <p>Torna alla <a href=\"oggetti.php\">pagina precedente</a></p>";
       
             }

if (!mysqli_commit($con)) {

throw Exception("Commit fallita");
}
} catch (Exception $e) {
mysqli_rollback($con);
echo "Rollback ";}
 mysqli_close($con);
}


if(isset($_REQUEST['dislike'])){
  $id_com = $_REQUEST['dislike'];

 try {
mysqli_autocommit($con,false);    

$sql = "SELECT num_giudizi FROM `giudizi` WHERE  id_com = '$id_com' AND utente = '$utente'";
 
$result1 = mysqli_query($con, $sql);
         if (!$result1)
        { echo "<tr><td colspan='4'>Errore2 – query fallita: ".mysqli_error($con)."</td></tr>"; }
             else
            { 
              $row = mysqli_fetch_assoc($result1);
            
              if (intval($row["num_giudizi"]) == null)

{ $queryinsert = "INSERT INTO `giudizi` (`id_com`,`utente`,`num_giudizi`) VALUES ('$id_com','$utente', 1 )"; 
         $result = mysqli_query($con, $queryinsert);
         if (!$result)
        { echo "<tr><td colspan='4'>Errore3 – query fallita: ".mysqli_error($con)."</td></tr>"; }
             else
            { $query2 = "UPDATE `commenti` SET giudizio = giudizio -1 WHERE id_com = '$id_com'";
$result3 = mysqli_query($con, $query2);
              }    

           }
          else  if (intval($row["num_giudizi"]) < 3)
                
          {  $query = "UPDATE `commenti` SET giudizio = giudizio -1 WHERE id_com = '$id_com'";
       $result = mysqli_query($con, $query);
         if (!$result)
        { echo "<tr><td colspan='4'>Errore3 – query fallita: ".mysqli_error($con)."</td></tr>"; }
             else
            { $query2 = "UPDATE `giudizi` SET num_giudizi = num_giudizi +1 WHERE id_com = '$id_com' AND utente = '$utente' ";
$result3 = mysqli_query($con, $query2);
              echo "<p>Aggiornamento avvenuto con successo!</p> <p>Torna alla <a href=\"oggetti.php\">pagina precedente</a></p>";  }    

           }

          else if (intval($row["num_giudizi"]) >= 3)
            echo "hai inserito 3 giudizi per questo commento. <p>Torna alla <a href=\"oggetti.php\">pagina precedente</a></p>";
 
       }


if (!mysqli_commit($con)) {

throw Exception("Commit fallita");
}
} catch (Exception $e) {
mysqli_rollback($con);
echo "Rollback ";}

mysqli_close($con);

}

 
 if (isset($_REQUEST['cancella'])){

try {
mysqli_autocommit($con,false);
$query1 = "SELECT id_com FROM `commenti` WHERE utente = '$utente'";

$result1 = mysqli_query($con, $query1);
         if (!$result1)
        { echo "<tr><td colspan='4'>Errore2 – query fallita: ".mysqli_error($con)."</td></tr>"; }
             else
            { 
              $row = mysqli_fetch_assoc($result1);
            
              $id_com = $row["id_com"];

$sql1 = "DELETE FROM `giudizi` WHERE  id_com = '$id_com'";

$result2 = mysqli_query($con, $sql1);
         if (!$result1)
        { echo "<tr><td colspan='4'>Errore2 – query fallita: ".mysqli_error($con)."</td></tr>"; }
             else
            { 

$sql2 = "DELETE FROM `commenti` WHERE  id_com = '$id_com'";
           
$result2 = mysqli_query($con, $sql2);
         if (!$result1)
        { echo "<tr><td colspan='4'>Errore2 – query fallita: ".mysqli_error($con)."</td></tr>"; }
             else
            { 

echo "<p>Commento cancellato con successo!</p>"; 
echo "<p>Torna alla <a href=\"oggetti.php\">pagina precedente</a></p>";
            }

            }

 }


if (!mysqli_commit($con)) {

throw Exception("Commit fallita");
}
} catch (Exception $e) {
mysqli_rollback($con);
echo "Rollback ";}


 mysqli_close($con);

}

}
}
         ?>





