<?php
	include_once('../controllers/dbFunction.php');
    
	$funObj = new dbFunction();
	if(isset($_POST['login'])){
		$emailid = $_POST['emailid'];
		$password = $_POST['password'];
        
           $user = $funObj->Login($emailid, $password);
		if ($user) {
			// Registration Success
		   header("location:home.php");
		} else {
			// Registration Failed
			echo "<script>alert('Emailid / Password Not Match')</script>";
		}
        if(isset($_POST['remember'])){
            setcookie('email', $_POST['emailid'],time()+3600,'/');
            setcookie('password', $_POST['password'],time()+3600,'/');
            setcookie('remember',$_POST['remember'],time()+3600,'/');
            session_start();
            $_SESSION['email']= $emailid;
            header('location:../views/home.php');
        }
    }
    
    $emailid = '';
    $password = '';
    
    if(isset($_COOKIE['email']) and isset($_COOKIE['password'])){
        $emailid = $_COOKIE['email'];
        $password = $_COOKIE['password'];
        
    }
    ?>
    <!DOCTYPE html>
 <html lang="en" >
 <head>
        <meta charset="UTF-8" />
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="../css/login.css" />
       
    </head>
    <body>
        <div class="container">
            				
                <div class="body" >
                        <div id="login" class="form_login">
                           <form name="login" method="post" action="">
                                <h1>Log in</h1> 
                                <p> 
                                    <input id="emailsignup" value="<?php echo $emailid;?>" name="emailid" required="required" type="email" placeholder="Your email"/> 
                                </p>
                                <p> 
                                    
                                    <input id="password" value="<?php echo $password;?>" name="password" required="required" type="password" placeholder="Password" /> 
                                </p>
                                <p class="keeplogin"> 
									<input <?php echo isset($_POST['remember'])?'checked':'' ?> type="checkbox" name="remember" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Remember me.</label>
								</p>
                                <p class="login_button"> 
                                    <input type="submit" name="login" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="register.php" >Join us</a>
								</p>
                            </form>
                        </div>
                        
                </div>  
        
        </div>
    </body>
</html>