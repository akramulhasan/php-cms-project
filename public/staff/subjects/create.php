<?php
require_once('../../../private/initialize.php');
// Handle form values sent by new.php

if(is_post_request()){
  $subject = [];
  $subject['menu_name'] = $_POST['menu_name'] ?? '';
  $subject['position'] = $_POST['position'] ?? '';
  $subject['visibility'] = $_POST['visible'] ?? '';
  
  $result = create_subject($subject);
  $newId = mysqli_insert_id($db);
  redirect_to(url_for('staff/subjects/show.php?id='.$newId));


}else{
  redirect_to(url_for('staff/subjects/new.php'));
}


?>