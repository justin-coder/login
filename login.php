<?php  
include($_SERVER['DOCUMENT_ROOT'].'/login/mysql.php');
$em="";
if(isset($_POST['Login']))
{
$username=$_POST['log']; 
$email=$_POST['log'];   
$password=$_POST['password'];
       
		$result=mysql_query("select * from users where (username='$username' OR email='$email') and password='$password' ") 
            or die(mysql_error());;
		if(mysql_num_rows($result))
		{
		$data=mysql_fetch_array($result);
		session_start();
		$_SESSION['isLoggedIn']=1;
		$_SESSION['userid']=$data["ID"];    
		$_SESSION['username']=$data["username"];
		$_SESSION['avatar']=$data['avatar'];
		header("Location: profile.php");
		}
		else
		{
		$em="Username Or Password is wrong";
		}
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css">
    <title>Admin Login</title>
</head>

<body>
    <h1>Admin Login Page</h1>
    
    <!-----* Main *----->
    <div class="main">
    <!-----* Img *----->
       
        <div class="header">
            <img class="center" src="image/admin.png" alt=" "> 
        </div>
    <!-----* </img> *-----> 
     
    <!-----* Login Form *----->
        <div class="loginform">
            <h2>Admin Login</h2>
            <?php echo "<span style='color:red'>".$em."</span>"; ?>
            <form action="login.php" method="post">
                <p>Email</p>
                <input type="text" name="log" placeholder="" required="">
                <p>Password</p>
                <input type="password" name="password" placeholder="" required="">
                <input type="checkbox" class="box">
                <span>Remember Me</span>
                <a href="#">Forgot Password</a>
                <input type="submit" name="Login" value="Login">
            </form>
        
        </div>
    <!-----* </login Form> *----->         
    </div>
    <!-----* </main> *----->
</body>

</html>
