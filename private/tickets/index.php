
<?php

require_once('tickets.php');

 ?>
<div class="tab-content" id=schedules>
<!-- RSL Schedule -->
<div class="tab-pane fade show active" id="rsl-schedule" role="tabpanel" aria-labelledby="rsl-schedule">
  <section class="card mb-1" id="tickets">
    <?php $r = 1;
    foreach ($rslFixtures as $rsl) {
      if ($r > 4) {
        break;
      }
      ?>
      <div class="card-body row inline-table">
        <div class="col-3">
          <img class="sm-logo mr-1" src="<?php echo h($rsl['homeLogo']); ?>" alt="RSL" /><br />
          <img class="sm-logo mr-1" src="<?php echo h($rsl['awayLogo']); ?>" alt="<?php echo h($rsl['away']) ?>" />
        </div>
        <div class="col-6 my-auto text-center">
          <?php echo h($rsl['date']); ?><br />
          <?php echo h($rsl['time']); ?>
        </div>
        <div class="col-3 my-auto text-center">
          <a href="https://rsl.com/tickets/single" target="_blank"><img class="sm-logo" src="<?php echo url_for('images/ticket.svg'); ?>" alt="Tickets"></a><br />
        </div>
      </div>
      <?php if ($r < 4) { ?>
        <div class="dropdown-divider"></div><!--End single game ticket block -->
    <?php } $r++; } ?>
  </section>
</div>

<!-- URFC Schedule -->
<div class="tab-pane fade" id="urfc-schedule" role="tabpanel" aria-labelledby="urfc-schedule">
<section class="card mb-1" id="tickets">
  <?php $u = 1;
  foreach ($urfcFixtures as $urfc) {
    if ($u > 4) {
      break;
    } ?>
    <div class="card-body row inline-table">
      <div class="col-3">
        <img class="sm-logo mr-1" src="<?php echo h($urfc['homeLogo']); ?>" alt="UTA" /><br />
        <img class="sm-logo mr-1 mt-1" src="<?php echo h($urfc['awayLogo']); ?>" alt="<?php echo h($urfc['away']) ?>"  />
      </div>
      <div class="col-6 my-auto text-center">
        <?php echo h($urfc['date']); ?><br />
        <?php echo h($urfc['time']); ?>
      </div>
      <div class="col-3 my-auto text-center">
        <a href="https://rsl.com/utahroyalsfc/tickets/single" target="_blank"><img class="sm-logo" src="<?php echo url_for('images/ticket.svg'); ?>" alt="Tickets"></a><br />
      </div>
    </div>
    <?php if ($u < 4) { ?>
      <div class="dropdown-divider"></div><!--End single game ticket block -->
  <?php } $u++; } ?>
</section>
</div>

<!-- Monarchs Schedule -->
<div class="tab-pane fade" id="monarchs-schedule" role="tabpanel" aria-labelledby="monarchs-schedule">
<section class="card mb-1" id="tickets">
  <?php
  $m = 1;
  foreach ($monarchsFixtures as $monarchs) {
    if ($m > 4) {
      break;
    } ?>
    <div class="card-body row inline-table">
      <div class="col-3">
        <img class="sm-logo mr-1" src="<?php echo h($monarchs['homeLogo']); ?>" alt="SLC" /><br />
        <img class="sm-logo mr-1" src="<?php echo h($monarchs['awayLogo']); ?>" alt="<?php echo h($monarchs['away']) ?>" />
      </div>
      <div class="col-6 my-auto text-center">
        <?php echo h($monarchs['date']); ?><br />
        <?php echo h($monarchs['time']); ?>
      </div>
      <div class="col-3 my-auto text-center">
        <a href="https://rsl.com/monarchs/tickets/single" target="_blank"><img class="sm-logo" src="<?php echo url_for('images/ticket.svg'); ?>" alt="Tickets"></a><br />
      </div>
    </div>
    <?php if ($i < 5) { ?>
      <div class="dropdown-divider"></div><!--End single game ticket block -->
  <?php } $m++; } ?>
</section>
</div>
</div>
