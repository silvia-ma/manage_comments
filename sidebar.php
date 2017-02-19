<div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          


          <div class="sidebar_item">
           <h3> Login</h3>
   <?php
   
   if(session_status()!==PHP_SESSION_ACTIVE){
     session_start();
   }
   if(!isset($_SESSION['username']))
      {
        
      ?>
        <form name="login_form" action="login2.php" method="GET" >
        <p><label for="password">Username:</label> 
         <input type="text" name="username" title="Please insert your Username" id="username"  size=15></p>

        <p><label for="password">Password:</label> 
         <input type="password" name="password" title="Please insert your Password" id="password" size=15></p>

        <p><input type="submit" value="LOGIN"> </p>
    </form>
       <?php
            }

           
     else
       {
        $username = $_SESSION['username'];
         echo "Ciao ".($username);
         echo "<p><p>Now you can leave your comment or your votes.";
         echo " Click <a href='oggetti.php'>here</a>.</p>";
  

         ?>

         <form name="logout_form" action="logout.php" method="POST" >
       <p> <input type="submit" name="logout" value="LOGOUT" ></p></form>
       <?php
        }

 
         ?>
          </div>


          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
          <h3>Useful Links</h3>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="oggetti.php">Objects</a></li>
              
            </ul>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          
          <div class="sidebar_base"></div>
        </div>
      </div>