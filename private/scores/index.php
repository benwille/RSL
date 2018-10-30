<?php require_once('scores.php'); ?>
<div class="container d-none d-md-block">

<div class="row mb-2 align-items-center">
  <div class="col-2">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-rsl" role="tab" aria-controls="v-pills-home" aria-selected="true">RSL</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-urfc" role="tab" aria-controls="v-pills-profile" aria-selected="false">URFC</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-monarchs" role="tab" aria-controls="v-pills-messages" aria-selected="false">Monarchs</a>
    </div>
  </div>
<div class="col-10">
  <div class="tab-content" id="v-pills-tabContent">
    <?php include 'rsl.scores.php'; ?>
    <?php include 'urfc.scores.php'; ?>
    <?php include 'monarchs.scores.php'; ?>

  </div>
</div>
</div>

</div>
