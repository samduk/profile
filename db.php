<?php

Class Database {
  public $connection = null;
  fuction __construct() {
    $this->connection = mysqli_connect("localhost", "admin", "Hacker@123!", "profile");
  }
}

 ?>
