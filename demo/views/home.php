<?php 
include_once('../controllers/dbFunction.php');
    
	
	
	//var_dump($_COOKIE['email']);
    if(!isset($_SESSION['login']) && isset($_COOKIE['email'])){
        $conn = mysqli_connect('localhost','root','','login_db') or die();
        $sql = "SELECT * FROM user WHERE emailid = '".$_COOKIE['email']."'";
        $rs = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($rs);
        $_SESSION['login'] = true;
	    $_SESSION['uid'] = $row['id'];
	    $_SESSION['username'] = $row['username'];
	    $_SESSION['email'] = $row['emailid'];
    }
    if(!isset($_SESSION['login'])){
        header('Location:index.php');
    }
    
    
?>
<!DOCTYPE html>
 <html lang="en" class="no-js">
 <head>
        <meta charset="UTF-8" />
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        
    </head>
    <body>
        <div class="container">
            <section>				
                <div id="container_demo" >
                        <div id="login" class="animate form">
                           <form name="login" method="post" action="">
                                <h1>Welcome </h1> 
                                <p> 
                                    <label for="emailid" class="uname"   > Your Name: </label>
                                   <?=$_SESSION['username']?>
				
                                </p>
                                <p> 
                                    <label for="email" class="youpasswd"  > Your Email: </label>
                                    <?=$_SESSION['email']?>
                                </p>
                                 <a href="list.php" name='list'>list User</a>
                                <p class="login button"> 
                                    <a href="logout.php">Log out</a>
								</p>
                            </form>
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>