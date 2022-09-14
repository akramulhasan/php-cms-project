<?php
require_once('../../../private/initialize.php');
// Handle form values sent by new.php

if(is_post_request()){
  $menu_name = $_POST['menu_name'] ?? '';
  $position = $_POST['position'] ?? '';
  $visible = $_POST['visible'] ?? '';
  
  $result = create_subject($menu_name, $position, $visible);
  $newId = mysqli_insert_id($db);
  redirect_to(url_for('staff/subjects/show.php?id='.$newId));


}else{
  redirect_to(url_for('staff/subjects/new.php'));
}


?>