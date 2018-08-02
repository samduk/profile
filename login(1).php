<?php
include_once 'autoloading.php';

if(Session :: isAuth()){
	header('location:index.php');
}
if(count ($_REQUEST) > 0){
	if(isset ($_REQUEST['username']) && isset($_REQUEST['password'])){//$_REQUEST is an array and hold the data it get from this page
		$auth = new Authentication($_REQUEST['username'],$_REQUEST['password']);
		if($auth->login()){
			Session::addToSession('auth'. TRUE);
			Session::addToSession('username',$_REQUEST['username']);
			header('location:index.php');
		}else echo "Please enter valid credentials";
	}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type ="text" name ="username" id="username" value="" placeholder="Please Enter Your UserName">
	<input type ="password" name ="password" id="password" value="" placeholder="Please Enter Your Password">
	<input type ="submit" name ="submit" id="submit" value="Submit">
</form>
