<?php

require_once('../../../private/initialize.php');
require_login();
require_admin();
$admin = Admin::find_by_username($session->username);

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/players/index.php'));
}
$id = $_GET['id'];
$player = Player::find_by_id($id);
if($player == false) {
  redirect_to(url_for('/staff/players/index.php'));
}

if(is_post_request()) {

  // Delete task
  $player->delete();
  $session->message('The post was deleted successfully.');
  redirect_to(url_for('/staff/players/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Player'; ?>
<?php include(SHARED_PATH . '/staff_header.php');
// include(SHARED_PATH . '/posts_menu.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/players/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle delete">
    <h1>Delete Player</h1>
    <p>Are you sure you want to delete this player?</p>
    <p class="item"><?php echo h($player->fullName()); ?></p>

    <form action="<?php echo url_for('/staff/players/delete.php?id=' . h(u($id))); ?>" method="post">
      <div class="form-group row" id="operations">
        <div class="col-auto">
          <button class="btn btn-primary" type="submit" name="commit" value="Delete Player">Delete Player</button>
        </div>
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
