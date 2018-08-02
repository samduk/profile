<?php

	//session_start();

	//print_r($_REQUEST);

	include_once 'autoload.php';

	if(count($_REQUEST) > 0) {
		if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
			$auth = new Authentication($_REQUEST['username'], $_REQUEST['password']);

			//from authentication when login function runs, if its true it redirects the page to autoloading.php
		if($auth->login()) {
			$SESSION['auth'] = true;
			$SESSION['username'] = $_REQUEST['username'];


			header('location:autoloading.php');
		} else echo "Please enter valid credientials";

	}
}

?>

<?php //action is sending request to the same page ?>
<form method="post" action="<?php echo $SERVER['PHP_SELF']; ?>">
	<input type="text" name="username" id="username" value="" placeholder="Please enter your username" />
	<input type="password" name="password" id="password" value="" placeholder="Please enter your password" />
	<input type="Submit" name="submit" id="submit" value="Submit" />
</form>
