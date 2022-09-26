<?php
require_once("../../../private/initialize.php");

$id = $_GET['id'] ?? '1'; // PHP > 7.0 vertion
$subject = get_subject_by_id($id);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subject Details</title>
</head>
<body>
  <h2>Subject Title: <?php echo h($subject['menu_name']) ?></h2>
</body>
</html>