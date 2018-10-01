<?php require_once('../initialize.php'); ?>

<?php

$total_count = Feed::count_all();

$sql = "SELECT id FROM news_feed ";
$sql .= "ORDER BY id DESC LIMIT 1";
$id = Feed::find_by_sql($sql);

$id = $id[0]->id;
$date = date_create(date('r'), timezone_open("GMT") );
date_timezone_set($date, timezone_open('America/Denver'));
// echo $total_count . "<br />";
// echo ($id) . "<br />";

if ($total_count > 100) {
  $delete_num = $total_count - 100;
  $delete_id = $id - 100;

  $result = Feed::delete_old_posts($delete_id, $delete_num);

  if ($result) {
    echo $delete_num . " were deleted - " . date_format($date, 'D j M Y \a\t h:i:s A');
  } else {
    echo "Database error";
  }
  // echo $delete_num . "<Br />";
  // echo $delete_id;
} else {
  echo "No posts were deleted - " . date_format($date, 'D j M Y \a\t h:i:s A');
}

 ?>
