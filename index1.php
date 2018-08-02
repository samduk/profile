<?php

$servername = "localhost";
$username = "admin";
$password = "Hacker@123!";
$dbname = "profile";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

      //Code from class
      require_once './autoload.php';

      function pr($var) {
          echo "<pre>";
          print_r($var);
          echo "<pre>";
      }

      // if(!Session::isAuth()){
      //     header("location:login.php");
      // }

      $db = Database::getInstance();
      //pr($db);
      if (!$db->getConnection()) {
          echo "There is some problem with the site, Kindly try later";
      }
      $mysqlQueryObj = mysqli_query($db->getConnection(), "SELECT * from profile");



// $conn = new mysqli(localhost, admin, Hacker@123!, profile);
// $result = mysqli_query($conn, "SELECT id, name, gender, status, age, dod,charges, category from people";)
// while($result = mysqli_fetch_assoc($result)):



//Check connection
// if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
// }
// ?>

<html>
<head>
	<title>Profile Database Application</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}

		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th,
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body>
	<h1>Profile Database Application</h1>
	<table class="data-table">
		<caption class="title">Profile Directory Listing</caption>
		<thead>
      <tr>
          <td colspan="7"><input type="button" value="Add Profile" onclick="window.location='addUser.php'" name="adduser"></td>
      </tr>
			<tr>
				<th>ID</th>
				<th>NAME</th>
				<th>GENDER</th>
				<th>STATUS</th>
				<th>AGE</th>
        <th>DATE OF DETENTION</th>
				<th>CHARGES</th>
				<th>CATEGORY</th>
			</tr>
		</thead>
		<tbody>

      //<?php
       //$sql = "SELECT id, name, gender, status, age, dod,charges, category from people";
       //$result->$conn->query($sql);

       //if($result->num_rows > 0){
      //   while ($row = $result->fetch_assoc()){
      //     echo "<tr>
  		// 			<td>".$row["id"]."</td>
  		// 			<td>".$row["name"]."</td>
  		// 			<td>".$row["gender"]."</td>
      //       <td>".$row["status"]."</td>
      //       <td>".$row["age"]."</td>
      //       <td>".$row["dod"]."</td>
      //       <td>".$row["charges"]."</td>
      //       <td>".$row["category"]."</td>
  		// 		</tr>";
      // }
      <?php while($result = mysqli_fetch_assoc($mysqlQueryObj)): ?>
      <!-- <?php while($result = mysqli_fetch_assoc[]): ?> -->
        <tr>
          <td> <?php echo $result['id']; ?></td>
          <td> <?php echo $result['name']; ?></td>
          <td> <?php echo $result['gender']; ?></td>
          <td> <?php echo $result['status']; ?></td>
          <td> <?php echo $result['age']; ?></td>
        </tr>
      //<?php endwhile; ?>

        //  echo "</tbody>";
        //  echo "</table>";
        //else{
        //  echo "0 result";
        //}
        //$conn->close();

    //  ?>
  	</tbody>
  		<tfoot>
  			<tr>
  				<th colspan="4">TOTAL</th>
  				<th><?=number_format($total)?></th>
  			</tr>
  		</tfoot>
  	</table>
  </body>
  </html>