<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php
  $admin = Admin::find_by_username($session->username);

  // $current_page = $_GET['page'] ?? 1;
  // $per_page = 20;
  // $total_count = Feed::count_promoted();
  //
  // $pagination = new Pagination($current_page, $per_page, $total_count);

// Find all posts;
//use pagination

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE promoted=1 ";
$sql .= "ORDER BY pubDate DESC ";
// $sql .= "LIMIT {$per_page} ";
// $sql .= "OFFSET {$pagination->offset()}";
$posts = Feed::find_by_sql($sql);

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['post'];
  // $id = $_GET['id'];
  $post = Feed::find_by_id($args['id']);
  $post->merge_attributes($args);

  $result = $post->save();

  if($result === true) {
    //$new_id = $task->id;
    $session->message('The post was updated successfully.');
    redirect_to(url_for('/staff/posts/promoted.php'));
  } else {
    // redirect_to(url_for('/staff/posts/promoted.php'));
  }
} else {
  $post = new Feed;
}
?>

<?php $page_title = 'Promoted Posts'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="tasks listing">
    <h1>Promoted Posts</h1>
    <?php echo display_errors($post->errors); ?>
  	<div class="table-responsive">
      <table class="list table">
      <tr>
        <th>Title</th>
        <th>Promoted</th>
        <th>Hero</th>
        <th>Banner</th>
        <th>Live</th>
        <th>&nbsp;</th>
        <?php if ($admin->is_admin()) { ?>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      <?php } ?>
      </tr>
      <?php foreach($posts as $post) { ?>
        <tr>
          <form action="<?php echo 'promoted.php'; ?>" method="post">
          <td><?php echo h($post->title); ?></td>
          <td class="text-center align-middle">
            <input type="hidden" name="post[promoted]" value="0" />
            <input type="checkbox" name="post[promoted]" value="1"<?php if($post->promoted()) { echo " checked"; } ?> />
          </td>
          <td class="text-center align-middle">
            <input type="hidden" name="post[hero]" value="0" />
            <input type="checkbox" name="post[hero]" value="1"<?php if($post->hero()) { echo " checked"; } ?> />
          </td>
          <td class="align-middle">
            <?php if ($post->hero == 1) { ?>
            <select name="post[promoted_banner]">
              <option value=""></option>
            <?php foreach(Feed::BANNER as $banner_id => $banner_name) { ?>
              <option value="<?php echo $banner_id; ?>" <?php if($post->promoted_banner == $banner_id) { echo 'selected'; } ?>><?php echo $banner_name; ?></option>
            <?php } ?>
            </select>
          <?php } ?>
          </td>
          <td class="text-center align-middle">
            <?php if ($post->hero == 1) { ?>
            <input type="hidden" name="post[live]" value="0" />
            <input type="checkbox" name="post[live]" value="1"<?php if($post->live()) { echo " checked"; } ?> />
            <?php } ?>
          </td>
          <td class="align-middle"><a class="action" href="<?php echo $post->link; ?>" target="_blank">View</a></td>
          <?php if ($admin->is_admin()) { ?>
          <td class="align-middle"><a class="action" href="<?php echo url_for('/staff/posts/edit.php?id=' . h(u($post->id))); ?>">Edit</a></td>
          <td class="align-middle"><a class="action" href="<?php echo url_for('/staff/posts/delete.php?id=' . h(u($post->id))); ?>">Delete</a></td>
          <td class="align-middle">
            <input type="hidden" name="post[title]" value="<?php echo h($post->title); ?>" />
            <input type="hidden" name="post[id]" value="<?php echo h($post->id); ?>" />
            <input type="submit" value="Update" />
          </td>
          <?php } ?>
          </form>
    	  </tr>
      <?php } ?>
  	</table></div>

<?php

// $url = url_for('/staff/posts/index.php');
// echo $pagination->page_links($url);

 ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
