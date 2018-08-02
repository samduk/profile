
<!-- <script type="text/javascript" src="test.js"></script> -->

<?php
/*('display_error'.'0');
error_reporting(0);
function __autoload($class_name){
	require_once $class_name. ".php";
	//require_once "classes/"
}
$db = new Database();
$mysqlQueryObj = mysql_query(query) ()*/

function pr($var){echo "<pre>"; print_r($var); echo "</pre>";}
function __autoload($class_name)
{
	require_once $class_name .".php";
}
$db = new Database();
if(!$db -> connection){
	echo "There is some problem with the site, kindly try later";

}
$mysqlQueryObj = mysql_query($db -> connection, "SELECT * from profile");
//pr(mysqli_fetch_assoc($mysqlQueryObj));
?>

<html>
	<head>
		<script type ="text/javascript" src="" ></script>
	</head>
	<body>
		<table border="1">
			<tr>
				<th>id</th>
				<th>fname</th>
				<th>lname</th>
				<th>username</th>
				<th>gender</th>
			</tr>
			<?php while($result = mysqli_fetch_assoc($mysqlQueryObj)):?>
			<tr>
				<td><?php echo $result['id']; ?></td>
				<td><?php echo $result['fname']; ?></td>
				<td><?php echo $result['lname']; ?></td>
				<td><?php echo $result['username']; ?></td>
				<td><?php echo $result['gender']; ?></td>
			</tr>
			<?php endwhile; ?>
		</table>

	</body>
</html>
