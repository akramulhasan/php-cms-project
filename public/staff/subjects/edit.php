<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<?php 
if(!isset($_GET['id'])){
  redirect_to(url_for('staff/subjects/index.php'));
}
$id = $_GET['id'];
$subject_set = find_all_subjects();
$subject_count=mysqli_num_rows($subject_set);
mysqli_free_result($subject_set);

$menu_name = $position = $visible = '';

if(is_post_request()){
// Handle form values sent by new.php

  $subject = [];
  $subject['id'] = $id;
  $subject['menu_name'] = $_POST['menu_name'] ?? '';
  $subject['position'] = $_POST['position'] ?? '';
  $subject['visibility'] = $_POST['visible'] ?? '';

  $result = update_subject($subject);

  if($result){
    redirect_to(url_for('staff/subjects/show.php?id='.$id));
  }



}else{
  $subject = get_subject_by_id($id);
}



?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Edit Subject</h1>

    <form action="<?php echo url_for('/staff/subjects/edit.php?id='.h(u($id))); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($subject['menu_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <!-- <option value="1" <?php if($subject['position'] == 1){echo 'selected';} ?>>1</option> -->
            <?php 
            
            for($i=1; $i <= $subject_count; $i++){
              echo "<option value=\"{$i}\"";
              if($subject["position"]==$i){
                echo " selected";
              }
              echo ">{$i}</option>";
            }
            ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" <?php if($subject['visibility']==1){echo 'checked';} ?> name="visible" value="1" />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
