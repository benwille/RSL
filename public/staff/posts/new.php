<?php

require_once('../../../private/initialize.php');
require_login();

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['post'];
  $post = new Feed($args);
  $result = $post->save();
  print_r ($post->sanitized_attributes());


  if($result === true) {
    $new_id = $post->id;
    $session->message('The post was created successfully.');
    redirect_to(url_for('/staff/posts/index.php'));
  } else {
    // show errors
  }

} else {
  // display the form
  $post = new Feed;
}

?>

<?php $page_title = 'Create post'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/posts/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin new">
    <h1>Create Post</h1>

    <?php echo display_errors($post->errors); ?>

    <form action="<?php echo url_for('/staff/posts/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Post" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
