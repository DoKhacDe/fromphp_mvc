<?php
	include_once('../controllers/dbFunction.php');
	 
	$funObj = new dbFunction();
	if(isset($_POST['register'])){
		$username = $_POST['username'];
		$emailid = $_POST['emailid'];
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirm_password'];
        if(strpos($username,'<')!==false){
            //header('Location:../views/error.php');
            echo "<script>alert('UserName is valid')</script>";
            header("Refresh:0; url=register.php");
            return;
        }
		if($password == $confirmPassword){
            
			$email = $funObj->isUserExist($emailid);
			if(!$email){
				$register = $funObj->UserRegister($username, $emailid, $password);
				if($register){
					 echo "<script>alert('Registration Successful')</script>";
				}else{
					echo "<script>alert('Registration Not Successful')</script>";
				}
			} else {
				echo "<script>alert('Email Already Exist')</script>";
			}
		} else {
			echo "<script>alert('Password Not Match')</script>";
		
		}
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
        <link rel="stylesheet" type="text/css" href="../css/register.css" />
        
    </head>
    <body>
        <div class="container">				
                <div class="body" >
                    <div id="register" class="register_form">
                            <form name="login" method="post" action="">
                                <h1> Sign up </h1> 
                                <p> 
                                    <input id="usernamesignup" name="username" required="required" type="text" placeholder="Name user" />
                                </p>
                                <p> 
                                    <input id="emailsignup" name="emailid" required="required" type="email" placeholder="Email"/> 
                                </p>
                                <p>
                                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="Password"/>
                                </p>
                                <p>
                                    <input id="passwordsignup_confirm" name="confirm_password" required="required" type="password" placeholder="Re-Password"/>
                                </p>
                                <p class="signin_button"> 
									<input type="submit" name="register" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="login.php" > Go and log in </a>
								</p>
                            </form>
                    </div>
                </div>  
            
        </div>
    </body>
</html>