<?php
require_once("../../../private/initialize.php");

// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0

echo h($id);

?>
<h2>Hello</h2>
<a href="show.php?name=<?php echo u('John Doe'); ?>">Link1</a><br />
<a href="show.php?company=<?php echo u('Widgets&More'); ?>">Link2</a><br />
<a href="show.php?query=<?php echo u('!#*?'); ?>">Link3</a><br />