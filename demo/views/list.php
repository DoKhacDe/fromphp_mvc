<?php
	include_once('../controllers/dbFunction.php');
    if(isset($_POST['welcome'])){
		// remove all session variables
		session_unset(); 

		// destroy the session 
		session_destroy();
        setcookie('email','',time()-3600,'/');
        setcookie('password','',time()-3600,'/');
	}
	if(!($_SESSION)){
		header("Location:../views/index.php");
	}

?>

        <table border='1'>
            <tr>
            
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            </tr>
            
                <?php
                $conn = mysqli_connect('localhost', 'root','', 'login_db');
                $sql = "SELECT * FROM user";
                $rs = mysqli_query($conn,$sql);
                while($data = mysqli_fetch_assoc($rs)){
                    ?>
                <tr>
                
                <td><?php echo $data['username'];?></td>
                <td><?php echo $data['emailid'];?></td>
                <td><?php echo $data['password'];?></td>
                <td><a href='delete.php?id=<?php echo $data['id'];?>'>Delete</a></td>
               
                </tr>

                <?php   
                }
                ?>
            
        </table>
        <a href="home.php">back</a>