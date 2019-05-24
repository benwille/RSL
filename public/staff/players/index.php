<?php require_once('../../../private/initialize.php'); ?>

<?php
  $sql = "SELECT * FROM players ";
  $sql .= "ORDER BY last_name ASC";
  $players = Player::find_by_sql($sql);
 ?>

<?php $page_title = 'Players'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<script src="<?php echo url_for('/js/player.js');?>" async></script>
<div id="content">
  <div class="admins listing">
    <h1>Players</h1>

    <div class="actions">
      <!-- <a class="action" href="<?php echo url_for('/staff/players/new.php'); ?>">Add Player</a> -->
    </div>
    <div class="row">
      <?php foreach($players as $player) {
        $all = Stats::all_stats($player->id);
        // var_dump($all); ?>
        <div class="player-card col-lg-3 col-md-6 col-12">
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


      <?php } ?>
    </div><!--row-->



  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
