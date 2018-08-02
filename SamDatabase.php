<?php
  class SamDatabase{
  public function __constructor(){
    public $connection = null;
      // Create connection
      $this->connection=mysql_connection("localhost", "admin", "Hacker@123!");

      if (mysqli_connect_error()!==0){
        echo "no problem";
      }
    }
  }
     ?>
