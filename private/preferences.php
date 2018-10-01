<?php require_once('initialize.php'); ?>

<?php

if(is_post_request()) {
  // Form was submitted
  $args = $_POST['order'];
  $preference = new Preference($args);
  $result = $preference->validate();
  if ($result == true) {
    $cookie = array ($preference);
    // var_dump($preference);
    //$preference = $_POST['order'] ?? [1,2,3,4];
    $expire = time() + 60*60*24*365;
    setcookie('order[rsl]', $preference->rsl, $expire);
    setcookie('order[urfc]', $preference->urfc, $expire);
    setcookie('order[monarchs]', $preference->monarchs, $expire);
    setcookie('order[academy]', $preference->academy, $expire);
    // print_r($preference);}
  } else {
    //show errors
  } }
  elseif (isset($_COOKIE['order'])) {
    $args = $_COOKIE['order'];
    $preference = new Preference($args);

  }

  else {
    // Read the stored value (if any)
    $preference = new Preference;

}

?>


      <?php echo display_errors($preference->errors); ?>
      <p>The favorite team selected is: <?php echo $preference->sort(); ?></p>

      <form action="<?php echo url_for('/index.php'); ?>" method="post">

        <div class="row">
          <label class="col-4">RSL</label>
          <select name="order[rsl]" class="col-2">
           <?php
             for($i=1; $i <= 4; $i++) {
               echo "<option value=\"{$i}\"";
               if($preference->rsl == $i) {
                 echo " selected";
               }
               echo ">{$i}</option>";
             }
           ?>
         </select>
       </div>
       <div class="row">
          <label class="col-4">Utah Royals FC</label>
          <select name="order[urfc]" class="col-2">
           <?php
             for($i=1; $i <= 4; $i++) {
               echo "<option value=\"{$i}\"";
               if($preference->urfc == $i) {
                 echo " selected";
               }
               echo ">{$i}</option>";
             }
           ?>
         </select>
        </div>
        <div class="row">
          <label class="col-4">Real Monarchs</label>
          <select name="order[monarchs]" class="col-2">
           <?php
             for($i=1; $i <= 4; $i++) {
               echo "<option value=\"{$i}\"";
               if($preference->monarchs == $i) {
                 echo " selected";
               }
               echo ">{$i}</option>";
             }
           ?>
         </select>
       </div>
       <div class="row">
          <label class="col-4">RSL Academy</label>
          <select name="order[academy]" class="col-2">
           <?php
             for($i=1; $i <= 4; $i++) {
               echo "<option value=\"{$i}\"";
               if($preference->academy == $i) {
                 echo " selected";
               }
               echo ">{$i}</option>";
             }
           ?>
         </select>
        </div>

        <!-- <input type="submit" value="Set Preference" /> -->
