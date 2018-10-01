<?php
$errors = [];

if(is_post_request()) {
    //object oriented
    $args = $_FILES['imgToUpload'];
    //print_r($args);
    //echo '<br />' . count($args['name']);

    if ($args) {
      $message = [];
      $file_ary = reArrayFiles($_FILES['imgToUpload']);
      foreach ($file_ary as $file) {
        $upload = new Upload($file);
        $result = $upload->save();
        $errors[] = $upload->errors;
        if ($result === true) {
          $uploaded_file = $upload->move_tmp_file($upload->tmp_name);
          if ($uploaded_file === true) {
            $message[] = 'The image ' . $upload->name . ' was uploaded successfully.';
          } else {
            $message[] = 'The image ' . $upload->name . ' was NOT uploaded.';
            $upload->delete();
          }
        }
      }
      //fix the errors array show that it can be shown
      $upload->shift_errors_array();

      $msg = implode("<br />", $message);
      $session->message($msg);
    }

}
?>
