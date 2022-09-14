<?php require_once('../../../private/initialize.php'); ?>
<?php
  $pages_set = find_all_pages();
  $pages = [
    ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'Page One'],
    ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Page Two'],
    ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
    ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
  ];
?>
<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="subjects listing">
    <h1>Pages</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('staff/pages/new.php') ?>">Create New Page</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Subject ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($page = mysqli_fetch_assoc($pages_set)) { ?>
        <tr>
          <td><?php echo $page['id']; ?></td>
          <td><?php echo $page['subject_id']; ?></td>
          <td><?php echo $page['position']; ?></td>
          <td><?php echo $page['visibility'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo $page['menu_name']; ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id='.$page['id']) ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id='.$page['id']) ?>">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php mysqli_free_result(pages_set); ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
