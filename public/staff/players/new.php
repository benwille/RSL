<?php

require_once('../../../private/initialize.php');
require_login();

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['player'];
  $player = new Player($args);
  $result = $player->save();
  print_r ($player->sanitized_attributes());


  if($result === true) {
    $new_id = $player->id;
    $session->message('The player was added successfully.');
    redirect_to(url_for('/staff/players/index.php'));
  } else {
    // show errors
  }

} else {
  // display the form
  $player = new Player;
}

?>

<?php $page_title = 'Create Player'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/players/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin new">
    <h1>Add Player</h1>

    <?php echo display_errors($player->errors); ?>

    <form action="<?php echo url_for('/staff/players/new.php'); ?>" method="post">

      <?php include('player_form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Add Player" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
