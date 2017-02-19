 <div id="menubar">
        <ul id="menu">
         
          <li><a href="index.php">Home</a></li>
          <li><a href="oggetti.php">Objects</a></li>

          <?php
        if(!isset($_SESSION['username']))
                {
                echo "<li><a href='registrazione.php'>Sign In</a></li>";  }
         
          ?>
          

        </ul>
      </div>
    </div>