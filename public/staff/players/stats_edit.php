<?php require_once('../../../private/initialize.php'); ?>

<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
$id = $_POST['player_id'];
$c = $_POST['competition'] - 1;
$d = $c + 1;
$stats = Stats::find_by_player($id);
// var_dump($stats);
$stats = $stats[$c] ?? new Stats;
// var_dump($stats);
?>
<form action="<?php echo url_for('/staff/players/edit.php?id=' . h(u($id)) . '&edit=stats'); ?>" method="post">

<dl>
  <dt>Competition</dt>
  <dd>
    <select name="stats[competition]">
      <!-- <option value=""></option> -->
      <?php foreach(Stats::COMPETITION as $competition_id => $competition_name) {
        if ($competition_id == 4) continue;?>
      <option value="<?php echo $competition_id; ?>" <?php if($d == $competition_id) { echo 'selected'; } ?>><?php echo $competition_name; ?></option>
      <?php } ?>
    </select>
    <input type="hidden" name="stats[player_id]" value="<?php echo h($id);?>">
  </dd>
</dl>
<dl>
  <dt>Games Played</dt>
  <dd><input type="number" name="stats[played]" value="<?php echo h($stats->played); ?>" /></dd>
</dl>

<dl>
  <dt>Games Started</dt>
  <dd><input type="number" name="stats[started]" value="<?php echo h($stats->started); ?>" /></dd>
</dl>

<dl>
  <dt>Minutes Played</dt>
  <dd><input type="number" name="stats[minutes]" value="<?php echo h($stats->minutes); ?>" /></dd>
</dl>

<dl>
  <dt>Goals</dt>
  <dd><input type="number" name="stats[goals]" value="<?php echo h($stats->goals); ?>" /></dd>
</dl>

<dl>
  <dt>Assists</dt>
  <dd><input type="number" name="stats[assists]" value="<?php echo h($stats->assists); ?>" /></dd>
</dl>

<dl>
  <dt>Yellow Cards</dt>
  <dd><input type="number" name="stats[yellow]" value="<?php echo h($stats->yellow); ?>" /></dd>
</dl>

<dl>
  <dt>Red Cards</dt>
  <dd><input type="number" name="stats[red]" value="<?php echo h($stats->red); ?>" /></dd>
</dl>

<!-- <dl>
  <dt>Team</dt>
  <dd><select name="player[team]">
    <option value=""></option>
  <?php foreach(Feed::TEAMS as $team_id => $team_name) { ?>
    <option value="<?php echo $team_id; ?>" <?php if($post->team == $team_id) { echo 'selected'; } ?>><?php echo $team_name; ?></option>
  <?php } ?>
  </select></dd>
</dl> -->

<div id="operations">
  <input type="submit" value="Edit Stats Info" />
</div>
</form>
