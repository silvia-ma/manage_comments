



function checkFormato(name,surname,username,password)        {
  var regex_username = /^\w+@\w+\.\w{2,10}$/;
  var regex_password =  /^\w{5,10}$/; 
  var regex_name = /^[a-z ,.'-]+$/i;
 
 if (!regex_name.test(name))
   {  alert ("Errore - Inserisci il tuo vero nome!" );
   return false;                        }  
   if (!regex_name.test(surname))
   {  alert ("Errore - Inserisci il tuo vero cognome!" );
   return false;                        }  
  if (!regex_username.test(username))
   {  alert ("Errore - Inserire un indirizzo email nel formato utente@dominio.tld!" );
   return false;                        }
   if (!regex_password.test(password))                        
   {alert ("Errore - Inserire una password tra i 5 e i 10 caratteri alfanumerici!" );
    return false;                         }

  
     return true;                  }




function are_cookies_enabled()
{
  var cookieEnabled = (navigator.cookieEnabled) ? true : false;

  if (typeof navigator.cookieEnabled == "undefined" && !cookieEnabled)
  { 
    document.cookie="testcookie";
    cookieEnabled = (document.cookie.indexOf("testcookie") != -1) ? true : false;
  }
  while (!cookieEnabled)
  {alert ("Questo sito fa uso di cookie. Per continuare la navigazione, attivali e poi aggiorna la pagina.");}

   

  return (cookieEnabled);
}
