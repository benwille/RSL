<?php require_once('../../../private/initialize.php'); ?>
<?php
// if(!isset($_POST['player_id'])) return;
$id = $_POST['player_id'];
$competition = $_POST['competition'];

if ($competition == 4) {
  $stats = Stats::all_stats($id);
} else {
  $sql = "SELECT * FROM stats ";
  $sql .= "WHERE player_id=" . $id;
  $sql .= " AND competition=" . $competition;
  // $sql .= "LIMIT 1 ";
  $obj_array = Stats::find_by_sql($sql);
  if (!empty($obj_array)) {
    $stats = array_shift($obj_array);
  } else {
    $args = array('competition' => $competition);
    $stats = new Stats($args);
  }
}

 ?>
<div class="col-6 border-right pr-0">
  <ul class="list-group list-group-flush">
    <li class="list-group-item border-0"><strong><?php echo $stats->competition();?></strong></li>
    <li class="list-group-item border-0"><strong>GP: </strong><?php echo($stats->played);?></li>
    <li class="list-group-item border-0"><strong>GS: </strong><?php echo($stats->started);?></li>
    <li class="list-group-item border-0"><strong>Min: </strong><?php echo number_format($stats->minutes);?></li>
  </ul>
</div>
<div class="col-6 pl-0">
  <ul class="list-group list-group-flush">
    <li class="list-group-item border-0"><div class="d-flex"><img src="<?php echo url_for('/images/goals.svg');?>" width="20px"> <span class="ml-3"><?php echo($stats->goals);?></span></div></li>
    <li class="list-group-item border-0"><div class="d-flex"><img src="<?php echo url_for('/images/assists.svg');?>" width="30px"><span class="ml-3"><?php echo($stats->assists);?></span></div></li>
    <li class="list-group-item border-0"><div class="d-flex"><img src="<?php echo url_for('/images/yellowcard.jpg');?>" width="15px"><span class="ml-3"> <?php echo($stats->yellow);?></span></div></li>
    <li class="list-group-item border-0"><div class="d-flex"><img src="<?php echo url_for('/images/redcard.jpg');?>" width="15px"> <span class="ml-3"><?php echo($stats->red);?></span></div></li>
  </ul>
</div>
