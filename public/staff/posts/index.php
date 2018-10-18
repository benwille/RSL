<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php
  $admin = Admin::find_by_username($session->username);

  $current_page = $_GET['page'] ?? 1;
  $per_page = 20;
  $total_count = Feed::count_all();

  $pagination = new Pagination($current_page, $per_page, $total_count);

// Find all posts;
//use pagination

$sql = "SELECT * FROM news_feed ";
$sql .= "ORDER BY pubDate DESC ";
// $sql .= "LIMIT 1 ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$posts = Feed::find_by_sql($sql);



if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['post'];
  // $id = $_POST['post']['id'];
  $id = $_GET['id'];
  $post = Feed::find_by_id($id);
  $post->merge_attributes($args);

  $result = $post->save();
  if($result === true) {
    // $new_id = $task->id;
    // echo 'The post was updated successfully.';
    $session->message('The post was updated successfully.');
    redirect_to(url_for('/staff/posts/index.php'));


  } else {
    // show errors
    // echo 'There was an error';
    // redirect_to(url_for('/staff/posts/index.php'));
  }
} else {
  $post = new Feed;
}

?>

<?php $page_title = 'Posts'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="tasks listing">
    <h1>Posts</h1>
    <?php //echo display_errors($post->errors); ?>
    <span class="message"></span>
  	<div class="table-responsive">
      <table class="list table">
      <tr>
        <th>Title</th>
        <th>Publish Date</th>
        <th>Team</th>
        <th>Promoted</th>
        <th>&nbsp;</th>
        <?php if ($admin->is_admin()) { ?>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      <?php } ?>
      </tr>
      <?php foreach($posts as $post) { ?>
        <tr>
          <form action="<?php echo 'index.php?id=' . h(u($post->id)) ; ?>" method="post" id="postform">
          <td><?php echo h($post->title); ?></td>
          <td><?php echo h($post->pubDate()); ?></td>
          <td class="align-middle">
            <select name="post[team]">
              <option value=""></option>
            <?php foreach(Feed::TEAMS as $team_id => $team_name) { ?>
              <option value="<?php echo $team_id; ?>" <?php if($post->team == $team_id) { echo 'selected'; } ?>><?php echo $team_name; ?></option>
            <?php } ?>
            </select>
          </td>
          <td class="text-center align-middle">
            <input type="hidden" name="post[promoted]" value="0" />
            <input type="checkbox" name="post[promoted]" value="1"<?php if($post->promoted()) { echo " checked"; } ?> />
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

$url = url_for('/staff/posts/index.php');
echo $pagination->page_links($url);

 ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
