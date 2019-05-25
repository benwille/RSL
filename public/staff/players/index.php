<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php
  $admin = Admin::find_by_username($session->username);

  $current_page = $_GET['page'] ?? 1;
  $per_page = 20;
  $total_count = Player::count_all();

  $pagination = new Pagination($current_page, $per_page, $total_count);

// Find all players;
//use pagination

$sql = "SELECT * FROM players ";
$sql .= "ORDER BY last_name ASC";
$players = Player::find_by_sql($sql);


if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['player'];
  // $id = $_POST['post']['id'];
  $id = $_GET['id'];
  $player = Player::find_by_id($id);
  $player->merge_attributes($args);

  $result = $player->save();
  if($result === true) {
    // $new_id = $task->id;
    // echo 'The player was updated successfully.';
    $session->message('The player was updated successfully.');
    redirect_to(url_for('/staff/players/index.php'));


  } else {
    // show errors
    // echo 'There was an error';
    // redirect_to(url_for('/staff/players/index.php'));
  }
} else {
  $player = new Player;
}

?>

<?php $page_title = 'Players'; ?>
<?php include(SHARED_PATH . '/staff_header.php');
// include(SHARED_PATH . '/posts_menu.php'); ?>

<div id="content">
  <div class="tasks listing">
    <h1>All Players</h1>
    <?php //echo display_errors($player->errors); ?>
    <span class="message"></span>
  	<div class="table-responsive">
      <table class="list table">
      <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Start Year</th>
        <th>End Year</th>
        <th>&nbsp;</th>
        <?php if ($admin->is_admin()) { ?>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      <?php } ?>
      </tr>
      <?php foreach($players as $player) { ?>
        <tr>
          <!-- <form action="<?php echo 'index.php?id=' . h(u($player->id)) ; ?>" method="post" id="postform"> -->
          <td><?php echo h($player->fullname()); ?></td>
          <td><?php echo h($player->position); ?></td>
          <td><?php echo h($player->startYear); ?></td>
          <td><?php echo h($player->endYear); ?></td>
          <td class="text-center"><a class="action" href="<?php echo url_for('/staff/players/show.php?id=' . h(u($player->id))); ?>">View</a></td>
          <?php if ($admin->is_admin()) { ?>
          <td class="text-center"><a class="action" href="<?php echo url_for('/staff/players/edit.php?id=' . h(u($player->id)) . '&edit=player'); ?>">Edit Player</a></td>
          <td class="text-center"><a class="action" href="<?php echo url_for('/staff/players/edit.php?id=' . h(u($player->id)) . '&edit=stats'); ?>">Edit Stats</a></td>
          <td class="text-center"><a class="action" href="<?php echo url_for('/staff/players/delete.php?id=' . h(u($player->id))); ?>">Delete</a></td>
          <!-- <td class="align-middle"><input type="submit" value="Update" /></td> -->
          <?php } ?>
          </form>
    	  </tr>
      <?php } ?>
  	</table></div>

<?php

$url = url_for('/staff/players/index.php');
echo $pagination->page_links($url);

 ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
