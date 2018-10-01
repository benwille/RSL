
<?php

$sql = "SELECT * FROM schedule ";
$sql .= "WHERE home='RSL' ";
$sql .= "ORDER BY date ASC ";
$rsl_schedule = schedule::find_by_sql($sql);

$sql = "SELECT * FROM schedule ";
$sql .= "WHERE home='UTA' ";
$sql .= "ORDER BY date ASC ";
$urfc_schedule = schedule::find_by_sql($sql);

$sql = "SELECT * FROM schedule ";
$sql .= "WHERE home='SLC' ";
$sql .= "ORDER BY date ASC ";
$monarchs_schedule = schedule::find_by_sql($sql);

 ?>
<div class="tab-content" id=schedules>
<!-- RSL Schedule -->
<div class="tab-pane fade show active" id="rsl-schedule" role="tabpanel" aria-labelledby="rsl-schedule">
  <section class="card mb-1" id="tickets">
    <?php $r = 1;
    foreach ($rsl_schedule as $rsl) {
      if ($r > 4) {
        break;
      } elseif ($rsl->date < date('Y-m-d')) {
        continue;
      }?>
      <div class="card-body row inline-table">
        <div class="col-3">
          <img class="sm-logo mr-1" src="<?php echo url_for('images/logos/MLS/' . h($rsl->home) . '.svg'); ?>" alt="RSL" /><br />
          <img class="sm-logo mr-1" src="<?php echo url_for('images/logos/MLS/' . h($rsl->away) . '.svg'); ?>" alt="<?php echo h($rsl->away) ?>" style="margin-left:-3px" />
        </div>
        <div class="col-6 my-auto">
          <?php echo h($rsl->date_format()); ?><br />
          <?php echo h($rsl->time_format()); ?>
        </div>
        <div class="col-3 my-auto text-center">
          <a href="<?php echo h($rsl->link); ?>" target="_blank"><img class="sm-logo" src="<?php echo url_for('images/ticket.svg'); ?>" alt="Tickets"></a><br />
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
  foreach ($urfc_schedule as $urfc) {
    if ($u > 4) {
      break;
    } elseif ($urfc->date < date('Y-m-d')) {
      continue;
    }?>
    <div class="card-body row inline-table">
      <div class="col-3">
        <img class="sm-logo mr-1" src="<?php echo url_for('images/logos/NWSL/' . h($urfc->home) . '.svg'); ?>" alt="UTA" /><br />
        <img class="sm-logo mr-1 mt-1" src="<?php echo url_for('images/logos/NWSL/' . h($urfc->away) . '.svg'); ?>" alt="<?php echo h($urfc->away) ?>"  />
      </div>
      <div class="col-6 my-auto">
        <?php echo h($urfc->date_format()); ?><br />
        <?php echo h($urfc->time_format()); ?>
      </div>
      <div class="col-3 my-auto text-center">
        <a href="<?php echo h($urfc->link); ?>" target="_blank"><img class="sm-logo" src="<?php echo url_for('images/ticket.svg'); ?>" alt="Tickets"></a><br />
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
  foreach ($monarchs_schedule as $monarchs) {
    if ($m > 4) {
      break;
    } elseif ($monarchs->date < date('Y-m-d')) {
      continue;
    }?>
    <div class="card-body row inline-table">
      <div class="col-3">
        <img class="sm-logo mr-1" src="<?php echo url_for('images/logos/USL/' . h($monarchs->home) . '.svg'); ?>" alt="SLC" /><br />
        <img class="sm-logo mr-1" src="<?php echo url_for('images/logos/USL/' . h($monarchs->away) . '.svg'); ?>" alt="<?php echo h($monarchs->away) ?>" style="height: 50px; margin-left:-8px" />
      </div>
      <div class="col-6 my-auto">
        <?php echo h($monarchs->date_format()); ?><br />
        <?php echo h($monarchs->time_format()); ?>
      </div>
      <div class="col-3 my-auto text-center">
        <a href="<?php echo h($monarchs->link); ?>" target="_blank"><img class="sm-logo" src="<?php echo url_for('images/ticket.svg'); ?>" alt="Tickets"></a><br />
      </div>
    </div>
    <?php if ($i < 5) { ?>
      <div class="dropdown-divider"></div><!--End single game ticket block -->
  <?php } $m++; } ?>
</section>
</div>
</div>
