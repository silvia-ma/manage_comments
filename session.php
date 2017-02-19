<?php
    $session = true;
if( session_status() === PHP_SESSION_DISABLED  )
    $session = false;
elseif( session_status() !== PHP_SESSION_ACTIVE )
{ session_start();      

if(isset($_SESSION['username'])) 
  {
if (isset($_SESSION['expire']) && (time() - $_SESSION['expire'] > 120)) {
   
    session_unset();     
    session_destroy();   }
$_SESSION['expire'] = time();

            }
}



 ?>