<?php
    include_once('list.php');
    if(isset($_GET['id'])){
    $conn = mysqli_connect('localhost', 'root','', 'login_db');
    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE id=$id";
    $rs = mysqli_query($conn,$sql);
	header('location:list.php');
    }
	
    ?>