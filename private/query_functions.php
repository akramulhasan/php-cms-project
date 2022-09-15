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

function create_subject($menu_name, $position, $visible){
  global $db;
  $sql  = "INSERT into subjects ";
  $sql .= "(menu_name, position, visibility) ";
  $sql .= "values( ";
  $sql .= "'".$menu_name."',";
  $sql .= "'".$position."',";
  $sql .= "'".$visible."'";
  $sql .= ")";

  $result = mysqli_query($db, $sql);
  //For INSERT statement $result is True/False

  if($result){
    return true;
  }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function update_subject($subject){
  global $db;
  $sql = "UPDATE subjects SET ";
  $sql .= "menu_name='".$subject['menu_name']."',";
  $sql .= "position='".$subject['position']."',";
  $sql .= "visibility='".$subject['visibility']."' ";
  $sql .= "WHERE id='".$subject['id']."' ";
  $sql .= "LIMIT 1";

 $result = mysqli_query($db, $sql);
 //For UPDATE statement, result will be true/false

 if($result){

  return true;

 }else{
  echo mysqli_error($db);
  db_disconnect();
  exit;
 }
}

?>