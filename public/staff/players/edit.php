<?php

require_once('../../../private/initialize.php');
require_login();
//require_admin();
$admin = Admin::find_by_username($session->username);

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/players/index.php'));
}
$id = $_GET['id'];
$edit = $_GET['edit'] ?? 'player';
$form_fields = $edit . '_form_fields.php';
$player = Player::find_by_id($id);
$stats = Stats::find_by_player($id);

if($player == false) {
  redirect_to(url_for('/staff/players/index.php'));
}

if(is_post_request()) {

  // Save record using player parameters
  if (isset($_POST['player'])) {
    $args = $_POST['player'];
    $player->merge_attributes($args);
    $result = $player->save();

    if($result === true) {
      $session->message('The player info was updated successfully.');
      redirect_to(url_for('/staff/players/index.php'));
    } else {
      // show errors
    }
  }
  elseif ($_POST['stats']) {
    $args = $_POST['stats'];
    // var_dump($args);
    // die();
    $i = $args['competition'] - 1;
    $stats = $stats[$i] ?? new Stats;
    $stats->merge_attributes($args);
    $result = $stats->save();

    if($result === true) {
      $session->message('The player stats was updated successfully.');
      redirect_to(url_for('/staff/players/index.php'));
    } else {
      // show errors
      $session->message('The player stats was not updated successfully.');

    }
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit ' . ucfirst($edit) . ' Info'; ?>
<?php include(SHARED_PATH . '/staff_header.php');
// include(SHARED_PATH . '/posts_menu.php'); ?>
<script src="<?php echo url_for('/js/player.js');?>" async>
  $(function() {
    competitionChange();
  })
</script>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/players/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin edit">
    <h1>Edit <?php echo ucfirst($edit);?> Info</h1>

    <?php echo display_errors($player->errors); ?>

      <div class="form-fields">
        <?php include($form_fields); ?>
      </div>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
