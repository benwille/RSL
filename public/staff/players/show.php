<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$player = Player::find_by_id($id);

?>

<?php $page_title = 'Show Player: ' . h($player->fullName()); ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<script src="<?php echo url_for('/js/player.js');?>" async></script>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/players/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin show">

    <h1>Player: <?php echo h($player->fullname()); ?></h1>

    <div class="row">
      <?php
        $all = Stats::all_stats($player->id);
        // var_dump($all); ?>
        <div class="col-md-5 offset-lg-1">
          <div class="attributes">
            <dl>
              <dt>First name</dt>
              <dd><?php echo h($player->name); ?></dd>
            </dl>
            <dl>
              <dt>Last name</dt>
              <dd><?php echo h($player->last_name); ?></dd>
            </dl>
            <dl>
              <dt>Position</dt>
              <dd><?php echo h($player->position); ?></dd>
            </dl>
            <dl>
              <dt>Years</dt>
              <dd><?php echo h($player->years()); ?></dd>
            </dl>
            <dl>
              <dt>Bio</dt>
              <dd><?php echo h($player->notes); ?></dd>
            </dl>
          </div>
        </div>
        <div class="player-card col-lg-4 col-md-6 col-12">
          <section class="card mb-5" id="">
            <div class="card bg-dark text-white">
              <img class="card-img rounded-0" src="<?php echo url_for('/images/players/' . $player->last_name . $player->name . '.jpg');?>" />
              <div class="card-img-overlay">
                <h2 class="card-title"><?php echo $player->fullName();?></h2>
                <p class="card-subtitle"><?php echo $player->position;?></p>
                <p class="card-text"><?php echo $player->years();?></p>
              </div>
            </div>
            <div class="row player-stats">
              <div class="col-6 border-right pr-0">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item border-0"><strong>All Games</strong></li>
                  <li class="list-group-item border-0"><strong>GP: </strong><?php echo($all->played);?></li>
                  <li class="list-group-item border-0"><strong>GS: </strong><?php echo($all->started);?></li>
                  <li class="list-group-item border-0"><strong>Min: </strong><?php echo number_format($all->minutes);?></li>
                </ul>
              </div>
              <div class="col-6 pl-0">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item border-0"><div class="d-flex"><img src="<?php echo url_for('/images/goals.svg');?>" width="20px"> <span class="ml-3"><?php echo($all->goals);?></span></div></li>
                  <li class="list-group-item border-0"><div class="d-flex"><img src="<?php echo url_for('/images/assists.svg');?>" width="30px"><span class="ml-3"><?php echo($all->assists);?></span></div></li>
                  <li class="list-group-item border-0"><div class="d-flex"><img src="<?php echo url_for('/images/yellowcard.jpg');?>" width="15px"><span class="ml-3"><?php echo($all->yellow);?></span></div></li>
                  <li class="list-group-item border-0"><div class="d-flex"><img src="<?php echo url_for('/images/redcard.jpg');?>" width="15px"> <span class="ml-3"><?php echo($all->red);?></span></div></li>
                </ul>
              </div>
            </div>
            <div class="competition card-footer px-0 text-center">
              <a class="btn btn-primary my-1 mls" href="" data-comp="1" data-player="<?php echo $player->id;?>">MLS</a>
              <a class="btn btn-primary my-1 usoc" href="" data-comp="2" data-player="<?php echo $player->id;?>">USOC</a>
              <a class="btn btn-primary my-1 concacaf" href="" data-comp="3" data-player="<?php echo $player->id;?>">CONCACAF</a>
              <a class=" btn btn-primary my-1 all-comp" href="" data-comp="4" data-player="<?php echo $player->id;?>">All</a>
            </div>
            <div class="show-more card-footer px-0 text-center">
              <a class="btn btn-primary my-1" href="">Show More</a>
            </div>
          </section><!--end card-->
        </div>


    </div><!--row-->

  </div>

</div>
