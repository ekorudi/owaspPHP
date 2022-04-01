<?php
include "db.php";
$host = 'https://w2.swift.id/test/';


$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection.
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


//error_reporting(E_ALL); // hanya boleh ada di developement 

function sanitizeEmpty($var,$url) {
  if(empty($var)){
    header('location:'.$url);
    die();
  };
  
};

function sanitizeEmail($email,$url) {
  if (!preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $email)){
    header('location:'.$url);
    die();
  };
  
};

function sanitizePassword($password,$url) {
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);

if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
  header('location:'.$url);
  die();
}
  
};

?>
