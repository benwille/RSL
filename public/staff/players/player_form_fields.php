
<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($player)) {
  redirect_to(url_for('/staff/players/index.php'));
}
?>

<dl>
  <dt>First Name</dt>
  <dd><input type="text" name="player[name]" value="<?php echo h($player->name); ?>" /></dd>
</dl>

<dl>
  <dt>Last Name</dt>
  <dd><input type="text" name="player[last_name]" value="<?php echo h($player->last_name); ?>" /></dd>
</dl>

<dl>
  <dt>Position</dt>
  <dd><input type="text" name="player[position]" value="<?php echo h($player->position); ?>" /></dd>
</dl>

<dl>
  <dt>Start Year</dt>
  <dd><input type="number" name="player[startYear]" value="<?php echo h($player->startYear); ?>" /></dd>
</dl>

<dl>
  <dt>End Year</dt>
  <dd><input type="number" name="player[endYear]" value="<?php echo h($player->endYear); ?>" /></dd>
</dl>

<dl>
  <dt>Notes/Bio</dt>
  <dd><textarea name="player[notes]" rows="4"/><?php echo h($player->notes); ?></textarea></dd>
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
