
<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($stats)) {
  redirect_to(url_for('/staff/players/index.php'));
}
?>
<div class="row">
  <?php //foreach ($stats as $stat) { ?>
  <?php foreach (Stats::COMPETITION as $competition_id => $competition_name) {
    if ($competition_id > 3) { continue; }
    $competition = $competition_id -1;
    $stat = $stats[$competition] ?? new Stats ?>
    <div class="col-md-6 col-lg-4">
      <form action="<?php echo url_for('/staff/players/edit.php?id=' . h(u($id)) . '&stats_id=' . h(u($stat->id))); ?>" method="post">
        <dl>
          <dt>Competition</dt>
          <dd>
            <?php echo h($competition_name);?>
            <input type="hidden" name="stat[competition]" value="<?php echo h($competition_id);?>">
            <input type="hidden" name="stat[player_id]" value="<?php echo h($id);?>">
          </dd>
        </dl>
        <dl>
          <dt>Games Played</dt>
          <dd><input type="number" name="stat[played]" value="<?php echo h($stat->played); ?>" /></dd>
        </dl>

        <dl>
          <dt>Games Started</dt>
          <dd><input type="number" name="stat[started]" value="<?php echo h($stat->started); ?>" /></dd>
        </dl>

        <dl>
          <dt>Minutes Played</dt>
          <dd><input type="number" name="stat[minutes]" value="<?php echo h($stat->minutes); ?>" /></dd>
        </dl>

        <dl>
          <dt>Goals</dt>
          <dd><input type="number" name="stat[goals]" value="<?php echo h($stat->goals); ?>" /></dd>
        </dl>

        <dl>
          <dt>Assists</dt>
          <dd><input type="number" name="stat[assists]" value="<?php echo h($stat->assists); ?>" /></dd>
        </dl>

        <dl>
          <dt>Yellow Cards</dt>
          <dd><input type="number" name="stat[yellow]" value="<?php echo h($stat->yellow); ?>" /></dd>
        </dl>

        <dl>
          <dt>Red Cards</dt>
          <dd><input type="number" name="stat[red]" value="<?php echo h($stat->red); ?>" /></dd>
        </dl>
        <div id="operations">
          <input type="submit" value="Edit <?php echo h($competition_name);?> Info" />
        </div>
      </div>
    </form>
  <?php } ?>

</div>
