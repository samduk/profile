<?php
    $id =$_POST['id'];
    $name =$_POST['name'];
    $gender =$_POST['gender'];
    $status =$_POST['status'];
    $age =$_POST['age'];
    $dod =$_POST['dod'];
    $charges =$_POST['charges'];
    $category =$_POST['category'];

    if((!empty($id) || (!empty($name) ||(!empty($gender) ||(!empty($status) ||(!empty($age) ||(!empty($dod) ||(!empty($charges) ||(!empty($category)){

        $servername = "localhost";
        $username = "admin";
        $password = "Hacker@123!";
        $dbname = "profile";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
        }else{
              $sql = "INSERT INTO people (id, name, gender, status, age, dod, charges, category)
                VALUES ('t05', 'Namdol', 'M', 'Sentenced', '20', '2017-12-10', 'protest', 'Sentence Unknown')";

                if ($conn->query($sql) === TRUE) {   //return true if the values are equal and they are of same type
                   echo "New record created successfully";
                } else {
                   echo "Error: " . $sql . "<br>" . $conn->error;
                }

        $conn->close();

      }else{
        echo "All field are required";
        die();
      }
       ?>
