<?php

require_once('../../../private/initialize.php');
require_login();
// require_admin();

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['match'];
  $match = new Match($args);
  $result = $match->save();
  // print_r ($admin->sanitized_attributes());

  if($result === true) {
    $new_id = $match->id;
    $session->message('The match was created successfully.');
    redirect_to(url_for('/staff/schedule/new.php'));

} else {
  // show errors
  }
} else {
  // display the form
  $match = new Match;
  $opponent = new Opponent;
}


?>

<?php $page_title = 'Create Post'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

<a class="back-link" href="<?php echo url_for('/staff/emails/index.php?station=' . h($station)); ?>">&laquo; Back to List</a>

  <div class="email new">
    <h1>Create Match</h1>

    <?php echo display_errors($match->errors); ?>

    <form action="<?php echo url_for('/staff/schedule/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Match" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
