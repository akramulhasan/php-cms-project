<?php 
function find_all_subjects(){

  global $db;
  $sql = "SELECT * FROM subjects ";
  $sql .= "ORDER BY position ASC";

  $result = mysqli_query($db, $sql);

  return $result;
}

function find_all_pages(){

  global $db;
  $sql = "SELECT * FROM pages ";
  $sql .= "ORDER BY subject_id ASC";

  $result = mysqli_query($db, $sql);

  return $result;
}

function get_subject_by_id($id){
  global $db;
  $sql = "SELECT * FROM subjects ";
  $sql .= "WHERE id='".$id."'";
  $result = mysqli_query($db, $sql);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject; //Returns as assoc array
}

?>