<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php
  $admin = Admin::find_by_username($session->username);

  $current_page = $_GET['page'] ?? 1;
  $per_page = 20;
  $total_count = Feed::count_team(1);

  $pagination = new Pagination($current_page, $per_page, $total_count);

// Find all posts;
//use pagination

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE team=1 ";
$sql .= "ORDER BY pubDate DESC ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$posts = Feed::find_by_sql($sql);

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE team=1 ";
$sql .= "AND team_featured=1 ";
$sql .= "OR team=1 AND team_hero=1 ";
$sql .= "ORDER BY pubDate DESC ";
$highlighed = Feed::find_by_sql($sql);

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['post'];
  $id = $_GET['id'];
  $post = Feed::find_by_id($id);
  $post->merge_attributes($args);

  $result = $post->save();
  if($result === true) {
    //$new_id = $task->id;
    $session->message('The post was updated successfully.');
    redirect_to(url_for('/staff/posts/rsl.php'));
  } else {
    // show errors
    // redirect_to(url_for('/staff/posts/rsl.php'));
  }
} else {
  $post = new Feed;
  $highlight = new Feed;
}
// if (can_be_team_hero(1,150)) {
//   echo 'true';
// } else {
//   echo 'false';
// }
?>

<?php $page_title = 'RSL Posts'; ?>
<?php include(SHARED_PATH . '/staff_header.php');
include(SHARED_PATH . '/posts_menu.php'); ?>

<div id="content">
  <div class="tasks listing mb-5">
    <h1>Real Salt Lake Highlighed Posts</h1>
    <?php echo display_errors($post->errors); ?>
  	<div class="table-responsive">
      <table class="list table">
      <tr>
        <th>Title</th>
        <th>Publish Date</th>
        <th>Promoted</th>
        <th>RSL - Hero</th>
        <th>RSL - Featured</th>
        <th>&nbsp;</th>
        <?php if ($admin->is_admin()) { ?>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      <?php } ?>
      </tr>
      <?php foreach($highlighed as $highlight) { ?>
        <tr>
          <form action="<?php echo 'rsl.php?id=' . h(u($highlight->id)) ; ?>" method="post">
          <td><?php echo h($highlight->title); ?></td>
          <td><?php echo h($highlight->pubDate()); ?></td>
          <td class="text-center align-middle">
            <input type="hidden" name="post[promoted]" value="0" />
            <input type="checkbox" name="post[promoted]" value="1"<?php if($highlight->promoted()) { echo " checked"; } ?> />
          </td>
          <td class="text-center align-middle">
            <input type="hidden" name="post[team_hero]" value="0" />
            <input type="checkbox" name="post[team_hero]" value="1"<?php if($highlight->team_hero()) { echo " checked"; } ?> />
          </td>
          <td class="text-center align-middle">
            <input type="hidden" name="post[team_featured]" value="0" />
            <input type="checkbox" name="post[team_featured]" value="1"<?php if($highlight->team_featured()) { echo " checked"; } ?> />
          </td>
          <td class="align-middle"><a class="action" href="<?php echo $highlight->link; ?>" target="_blank">View</a></td>
          <?php if ($admin->is_admin()) { ?>
          <td class="align-middle"><a class="action" href="<?php echo url_for('/staff/posts/edit.php?id=' . h(u($highlight->id))); ?>">Edit</a></td>
          <td class="align-middle"><a class="action" href="<?php echo url_for('/staff/posts/delete.php?id=' . h(u($highlight->id))); ?>">Delete</a></td>
          <td class="align-middle"><input type="submit" value="Update" /></td>
          <?php } ?>
          </form>
    	  </tr>
      <?php } ?>
  	</table></div>

  </div>

  <div class="tasks listing">
    <h1>All Real Salt Lake Posts</h1>
    <?php echo display_errors($post->errors); ?>
  	<div class="table-responsive">
      <table class="list table">
      <tr>
        <th>Title</th>
        <th>Publish Date</th>
        <th>Promoted</th>
        <th>RSL - Hero</th>
        <th>RSL - Featured</th>
        <th>&nbsp;</th>
        <?php if ($admin->is_admin()) { ?>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      <?php } ?>
      </tr>
      <?php foreach($posts as $post) { ?>
        <tr>
          <form action="<?php echo 'rsl.php?id=' . h(u($post->id)) ; ?>" method="post">
          <td><?php echo h($post->title); ?></td>
          <td><?php echo h($post->pubDate()); ?></td>
          <td class="text-center align-middle">
            <input type="hidden" name="post[promoted]" value="0" />
            <input type="checkbox" name="post[promoted]" value="1"<?php if($post->promoted()) { echo " checked"; } ?> />
          </td>
          <td class="text-center align-middle">
            <input type="hidden" name="post[team_hero]" value="0" />
            <input type="checkbox" name="post[team_hero]" value="1"<?php if($post->team_hero()) { echo " checked"; } ?> />
          </td>
          <td class="text-center align-middle">
            <input type="hidden" name="post[team_featured]" value="0" />
            <input type="checkbox" name="post[team_featured]" value="1"<?php if($post->team_featured()) { echo " checked"; } ?> />
          </td>
          <td class="align-middle"><a class="action" href="<?php echo $post->link; ?>" target="_blank">View</a></td>
          <?php if ($admin->is_admin()) { ?>
          <td class="align-middle"><a class="action" href="<?php echo url_for('/staff/posts/edit.php?id=' . h(u($post->id))); ?>">Edit</a></td>
          <td class="align-middle"><a class="action" href="<?php echo url_for('/staff/posts/delete.php?id=' . h(u($post->id))); ?>">Delete</a></td>
          <td class="align-middle"><input type="submit" value="Update" /></td>
          <?php } ?>
          </form>
    	  </tr>
      <?php } ?>
  	</table></div>

<?php

$url = url_for('/staff/posts/rsl.php');
echo $pagination->page_links($url);

 ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
