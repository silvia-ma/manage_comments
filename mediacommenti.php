<?php
$con = mysqli_connect("localhost", "id801734_unormal", "pass1", "id801734_valutazione_oggetti");
      if (mysqli_connect_errno())
  echo "<p>Errore connessione al DBMS: ".mysqli_connect_error()."</p>";
        else
       {

         $query = "SELECT AVG(punteggio) FROM `commenti` ";
         $result = mysqli_query($con, $query);
            if(!$result)
          echo "<tr><td colspan='4'>Errore – query fallita: ".mysqli_error($con)."</td></tr>";
                else
            {
            while($row = mysqli_fetch_array($result)){
              $num = $row[0];
              $int = (float)$num;
              
              echo number_format((float)$int, 2, '.', '');
            }
            }
          }

          ?>