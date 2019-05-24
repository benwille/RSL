<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object

date_default_timezone_set("America/Denver");

?>
<dl>
  <dt>Team</dt>
  <dd><select name="match[team]">
    <option value=""></option>
  <?php foreach(Match::TEAMS as $team_id => $team_name) { ?>
    <option value="<?php echo $team_id; ?>" <?php if($match->team == $team_id) { echo 'selected'; } ?>><?php echo $team_name; ?></option>
  <?php } ?>
  </select></dd>
</dl>

<dl>
  <dt>Home/Away</dt>
  <dd><select name="match[homeAway]">
    <option value=""></option>
    <option value="1" <?php if($match->homeAway == 1) { echo 'selected'; } ?>>Home</option>
    <option value="2" <?php if($match->homeAway == 2) { echo 'selected'; } ?>>Away</option>
  </select></dd>
</dl>

<dl>
  <dt>Opponent</dt>
  <dd><select name="match[opponent]">
    <option value=""></option>
    <?php
    $teams = Opponent::find_all();
    foreach ($teams as $team) { ?>
    <option value="<?php echo $team->opponentID;?>" <?php if($match->opponentID == $team->opponentID) { echo 'selected'; } ?>><?php echo $team->club_name;?></option>
  <?php } ?>
  </select></dd>
</dl>

<dl>
  <dt>Date</dt>
  <dd><input type="date" name="match[date]" value="<?php echo h($match->date); ?>" /></dd>
</dl>

<dl>
  <dt>Time</dt>
  <dd><input type="time" name="match[time]" value="<?php echo h($match->time); ?>" /></dd>
</dl>

<dl>
  <dt>Competition</dt>
  <dd><input type="text" name="match[competition]" value="<?php echo h($match->competition); ?>" /></dd>
</dl>

<dl>
  <dt>Ticket Link</dt>
  <dd><input type="url" name="match[link]" value="<?php echo h($match->link); ?>" /></dd>
</dl>

<dl>
  <dt>Secondary Link?</dt>
  <dd><input type="url" name="match[link2]" value="<?php echo h($match->link2); ?>" /></dd>
  <dt>Button Text</dt>
  <dd><input type="text" name="match[link2text]" value="<?php echo h($match->link2text); ?>" /></dd>
</dl>
