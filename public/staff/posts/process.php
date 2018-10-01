<?php require_once('../../../private/initialize.php'); ?>

<?php


// if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['post'];
  // $id = $_POST['post']['id'];
  $id = $_GET['id'];
  $post = Feed::find_by_id($id);
  $post->merge_attributes($args);

  $result = $post->save();

  if($result === true) {
    // $new_id = $task->id;
    echo 'The post was updated successfully.';
    // $session->message('The post was updated successfully.');
    // redirect_to(url_for('/staff/posts/index.php'));


  } else {
    // show errors
    echo 'There was an error';
    // redirect_to(url_for('/staff/posts/index.php'));
  }
// } else {
//   $post = new Feed;
// }

 ?>
