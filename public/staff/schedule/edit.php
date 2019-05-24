<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/schedule/index.php'));
}
$id = $_GET['id'];
$match = Match::find_by_id($id);
if($match == false) {
  redirect_to(url_for('/staff/schedule/index.php'));
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['match'];
  $match->merge_attributes($args);
  $result = $match->save();

  if($result === true) {
    $session->message('The match was updated successfully.');
    redirect_to(url_for('/staff/schedule/match.php?id=' . $id  . '&team=' . h(u($match->team))));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Match'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/schedule/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin edit">
    <h1>Edit Match</h1>

    <?php echo display_errors($match->errors); ?>

    <form action="<?php echo url_for('/staff/schedule/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Match" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
