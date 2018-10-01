<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php

// include 'process.php';

?>

<?php $page_title = 'Posts'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<script src="myscript.js"></script>

<div id="content">
  <div class="tasks listing">
    <h1>Posts</h1>
    <?php //echo display_errors($post->errors); ?>
    <span class="message"></span>
  	<div class="table-responsive"></div>



  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
