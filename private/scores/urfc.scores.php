<div class="tab-pane fade" id="urfc-scores" role="tabpanel">
  <div class="card-group d-flex flex-row-reverse">
  <?php
    foreach ($urfcScores as $score) { ?>
    <?php if ($score['homeScore'] > $score['awayScore']) {
    $winner = 'homeScore';
    } elseif ($score['homeScore'] < $score['awayScore']) {
    $winner = 'awayScore';
    } else {
    $winner = NULL;
    }
  ?>
  <div class="card  m-1 small ">
    <div class="p-2">
      <p class="card-title font-weight-bold">
        <?php $status = ($score['status']) ? $score['status'] : $score['date'] . " at " . $score['time'];
        $title = ($status == 'Live  ') ? '<span class="text-danger">LIVE</span>' : $status;
        echo $title; ?>
      </p>
      <ul class="flex-grow-1 list-unstyled mb-0">
        <li class="d-flex">
          <div><img src="<?php echo $score['homeLogo']; ?>" height="20px"></div>
          <div class="flex-grow-1 d-flex my-auto">
            <div class="<?php if($winner == 'homeScore') { echo 'font-weight-bold';} ?>"><?php echo $score['home'] ?></div>
            <div class="ml-auto <?php if($winner == 'homeScore') { echo 'font-weight-bold';} ?>"><?php echo $score['homeScore'];?></div>
          </div>
        </li>
        <li class="d-flex">
          <div><img src="<?php echo $score['awayLogo']; ?>"  height="20px"></div>
          <div class="flex-grow-1 d-flex my-auto">
            <div class="<?php if($winner == 'awayScore') { echo 'font-weight-bold';} ?>"><?php echo $score['away'] ?></div>
            <div class="ml-auto <?php if($winner == 'awayScore') { echo 'font-weight-bold';} ?>"><?php echo $score['awayScore'];?></div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <?php } ?>
</div>
</div>
