<?php

//autoload is a function that will excute automatically. $class_name is pulling Box.php since that is the name of the class Box

// function __autoload($class_name) {
// 	require_once $class_name . ".php";
// 	//require_once 'Box.php';
// }



// class Cylinder extends Box {



// 	public $radius = 0;

// 	function __construct($r, $h, $weight) {
// 		parent::__construct(0,0,0,$weight);
// 		$this -> radius = $r;
// 		$this -> height = $h; //used from parent container class
// 	}

// 	//defined area and volume here as in the abstract class we didn;t define in the container class.

// 	function area() {
// 		return 3.14 * $this -> radius * $this -> radius;
// 	}

// 	function volume() {
// 		return 3.14 * $this -> radius * $this -> radius * $this -> height;
// 	}
// }

// $cy = new Cylinder(10,12,15);

// echo $cy -> area();

?>

<?php

// ini_set('display_errors', '0');
// error_reporting(0);

function pr($var) { echo "<pre>"; print_r($var); echo "</pre>";}

function __autoload($class_name) {
	require_once $class_name . ".php";
	//require_once 'Box.php';
}


$db = new Database();

if(!$db->connection) {
	echo "There is error in your code";
}
//$myqlQueryObj = mysqli_query($db->connection, "SELECT * from users where username='choenyi'") ;

$myqlQueryObj = mysqli_query($db->connection, "SELECT * from profile") ;


//to display the exact error on the db.
echo mysqli_error($db->connection);

//pr(mysqli_fetch_assoc($myqlQueryObj));

//$result = mysqli_fetch_assoc($myqlQueryObj);

?>

<html>
	<head></head>
	<body>
		<table border=1>
			<tr>
				<th> U_ID </th>
				<th> Name </th>
				<th> Gender </th>
				<th> Status </th>
				<th> age </th>
			</tr>
			<?php while($result = mysqli_fetch_assoc($myqlQueryObj)) : ?>
			<tr>
				<td><?php echo $result['id']; ?> </td>
				<td> <?php echo $result['name']; ?></td>
				<td><?php echo $result['gender']; ?> </td>
				<td><?php echo $result['status']; ?> </td>
				<td><?php echo $result['age']; ?> </td>
			</tr>
			<?php endwhile; ?>
		</table>

	</body>
</html>
