<?php 
require_once("db_connection.php");


function db_connect(){
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // if(mysqli_connect_errno()){
  //   echo 'Database conection hoy nai';
  //   exit();
  // }
  //confirm_db_connection();


  return $connection;
}

function db_disconnect($connection){
  if(isset($connection)){
    mysqli_close($connection);
  }
}

// function confirm_db_connection(){
//   if(mysqli_connect_errno()){
//     $msg = 'Database connection failed. ';
//     $msg.= mysqli_connect_error();
//     //$msg.= "(" . mysqli_connect_errno() . ")";

//     exit($msg);
//   }
// }


?>