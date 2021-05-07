<?php
// if(isset($_COOKIE['remember'])){
//     header('Location:home.php');
// }
if(isset($_COOKIE['email'])){
    header('Location:home.php');
}
                include_once('../views/login.php');
                //include_once('views/register.php');

            ?>				
              
            
    