<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<?php 
if(!isset($_GET['id'])){
  redirect_to(url_for('staff/subjects/index.php'));
}
$id = $_GET['id'];
$subject = get_subject_by_id($id);

if(is_post_request()){
// Handle form values sent by new.php file

  $sql = "DELETE FROM subjects ";
  $sql .= "WHERE id='".$id."' ";
  $sql .= "LIMIT 1";
  

  $result = mysqli_query($db, $sql);

  if($result){
    redirect_to(url_for('staff/subjects/index.php'));
  }else{
    echo mysqli_error($db);
    db_disconnect();
    exit;
  }



}else{
  $subject = get_subject_by_id($id);
}



?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject delete">
    <h1>Delete Subject</h1>
    <p>Are you sure to delete this subject?</p>

    <form action="<?php echo url_for('/staff/subjects/delete.php?id='.h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" value="Delete Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
