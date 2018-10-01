<?php require_once('../private/initialize.php'); ?>
<?php require_once('../private/content2.php'); ?>

<?php $page_title = 'Home'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="row">
  <div class="col-lg-8">
    <?php //echo "<pre>";
    //print_r($promoted);
    //echo "</pre>";
    if ($promoted) {?>
    <section class="card mb-5" id="promoted">
      <div class="card-header">
          <span>Highlighted</span>
      </div>

        <div class="card-body">
          <div class="card mb-2">
            <div id="promoted-hero">
              <a href="<?php echo $promoted[0]->link ?>" target="_blank"><img class="card-img-top img-fluid" src="<?php echo $promoted[0]->imageLink ?>" alt="<?php echo $promoted[0]->title ?>"></a>
              <?php if ($promoted[0]->live == 1) { ?>
                <span class="badge badge-danger">Live</span>
              <?php } ?>
            </div>
            <?php if($promoted[0]->promoted_banner > 1) { ?>
            <div class="card-body promoted-banner <?php $promoted[0]->banner_color(); ?>">
              <?php echo h($promoted[0]->banner()); ?>
            </div>
          <?php } ?>
          </div>
          <h2 class="card-title"><a href="<?php echo $promoted[0]->link ?>" target="_blank"><?php echo $promoted[0]->title ?></a></h2>
        </div>
        <div class="list-group list-group-flush">
          <?php if ($promoted) {
            foreach ($promoted as $i => $post) {
              if ($post->hero == 1 || $i == 0) {
                continue;
              }
              if ($i == 1) { ?>
                <div class="card mx-2 mx-lg-4">
                  <section class="d-flex media list-group-item" id="rsl_featured">
                    <div class="my-auto"><img class="d-flex img-fluid rounded mr-3"  src="<?php echo $post->imageLink ?>" alt="<?php echo $post->title ?>"></div>
                    <div class="media-body">
                      <h4><a href="<?php echo $post->link; ?>"><?php echo $post->title; ?></a></h4>
                    </div>
                  </section>
                </div>
              <?php } else { ?>
              <a class="list-group-item" href="<?php echo $post->link; ?>"><?php echo $post->title; ?></a>
            <?php }}
          } ?>
        </div>
        <div class="card-footer text-center">
          <a class="card-link text-center" href="https://rsl.com" target="_blank">See All</a>
        </div>
    </section>
    <?php } ?><!--Promoted Section-->

    <section class="card mb-5" id="rsl">
      <div class="card-header">
          <div class="d-flex">
            <div class="flex-grow-1">
              <img class="sm-logo mr-1" src="<?php echo url_for('images/logos/MLS/RSL.svg'); ?>" alt="RSL" />
              <span>RSL</span>
            </div>
            <div class="my-auto"><a href="https://rsl.com/news" target="_blank">See All &raquo;</a></div>
          </div>
      </div>
      <?php if ($rsl_posts) { ?>

        <div class="card-body">
          <a href="<?php echo $rsl_posts[0]->link ?>" target="_blank"><img class="card-img img-fluid mb-2 mb-lg-1" src="<?php echo $rsl_posts[0]->imageLink ?>" alt="<?php echo $rsl_posts[0]->title ?>"></a>
          <h2 class="card-title"><a href="<?php echo $rsl_posts[0]->link ?>" target="_blank"><?php echo $rsl_posts[0]->title ?></a></h2>
        </div>
        <div class="list-group list-group-flush">
          <?php if ($rsl_posts) {
            foreach ($rsl_posts as $i => $rsl_post) {
              if ($i >= 6) {
                break;
              }
              if ($rsl_post->team_hero == 1 || $i == 0) {
                continue;
              }
              if ($i == 1) { ?>
                <div class="card mx-2 mx-lg-4">
                  <section class="d-flex media list-group-item" id="rsl_featured">
                    <div class="my-auto"><img class="d-flex img-fluid rounded mr-3" src="<?php echo $rsl_post->imageLink ?>" alt="<?php echo $rsl_post->title ?>"></div>
                    <div class="media-body">
                      <h4><a href="<?php echo $rsl_post->link; ?>"><?php echo $rsl_post->title; ?></a></h4>
                    </div>
                  </section>
                </div>
              <?php } else { ?>
              <a class="list-group-item" href="<?php echo $rsl_post->link; ?>"><?php echo $rsl_post->title; ?></a>
            <?php
          }}} ?>
        </div>
        <div class="card-footer text-center">
          <a class="card-link text-center" href="https://rsl.com/news" target="_blank">See All</a>
        </div>
      <?php } ?>
    </section><!--RSL Section-->

    <section class="card mb-5" id="urfc">
      <div class="card-header">
        <div class="d-flex">
          <div class="flex-grow-1">
            <img class="mr-1 sm-logo" src="<?php echo url_for('images/logos/NWSL/UTA.svg'); ?>" alt="urfc" />
            <span>URFC</span>
          </div>
          <div class="my-auto"><a href="https://rsl.com/utahroyalsfc" target="_blank">See All &raquo;</a></div>
        </div>
      </div>

        <div class="card-body">
          <a href="<?php echo $urfc_posts[0]->link ?>" target="_blank"><img class="card-img img-fluid mb-2 mb-lg-1" src="<?php echo $urfc_posts[0]->imageLink ?>" alt="<?php echo $urfc_posts[0]->title ?>"></a>
          <h2 class="card-title"><a href="<?php echo $urfc_posts[0]->link ?>" target="_blank"><?php echo $urfc_posts[0]->title ?></a></h2>
        </div>
        <div class="list-group list-group-flush">
          <?php if ($urfc_posts) {
            foreach ($urfc_posts as $i => $urfc_post) {
              if ($i >= 6) {
                break;
              }
              if ($urfc_post->team_hero == 1 || $i == 0) {
                continue;
              }
              if ($i == 1) { ?>
                <div class="card mx-2 mx-lg-4">
                  <section class="d-flex media list-group-item" id="rsl_featured">
                    <div class="my-auto"><img class="d-flex img-fluid rounded mr-3" src="<?php echo $urfc_post->imageLink ?>" alt="<?php echo $urfc_post->title ?>"></div>
                    <div class="media-body">
                      <h4><a href="<?php echo $urfc_post->link; ?>"><?php echo $urfc_post->title; ?></a></h4>
                    </div>
                  </section>
                </div>
              <?php } else { ?>
              <a class="list-group-item" href="<?php echo $urfc_post->link; ?>"><?php echo $urfc_post->title; ?></a>
            <?php }}
          } ?>
        </div>
        <div class="card-footer text-center">
          <a class="card-link text-center" href="https://rsl.com/urfc" target="_blank">See All</a>
        </div>

    </section> <!--URFC Section-->

    <section class="card mb-5" id="monarchs">
      <div class="card-header">
        <div class="d-flex">
          <div class="flex-grow-1">
            <img class="sm-logo mr-1" src="<?php echo url_for('images/logos/USL/SLC.svg'); ?>" alt="Real Monarchs" />
            <span>Real Monarchs</span>
          </div>
          <div class="my-auto"><a href="https://rsl.com/realmonarchs" target="_blank">See All &raquo;</a></div>
        </div>
      </div>

        <div class="card-body">
          <a href="<?php echo $monarchs_posts[0]->link ?>" target="_blank"><img class="card-img img-fluid mb-2 mb-lg-1" src="<?php echo $monarchs_posts[0]->imageLink ?>" alt="<?php echo $monarchs_posts[0]->title ?>"></a>
          <h2 class="card-title"><a href="<?php echo $monarchs_posts[0]->link ?>" target="_blank"><?php echo $monarchs_posts[0]->title ?></a></h2>
        </div>
        <div class="list-group list-group-flush">
          <?php if ($monarchs_posts) {
            foreach ($monarchs_posts as $i => $monarchs_post) {
              if ($i >= 6) {
                break;
              }
              if ($monarchs_post->team_hero == 1 || $i == 0) {
                continue;
              }
              if ($i == 1) { ?>
                <div class="card mx-2 mx-lg-4">
                  <section class="d-flex media list-group-item" id="rsl_featured">
                    <div class="my-auto"><img class="d-flex img-fluid rounded mr-3" src="<?php echo $monarchs_post->imageLink ?>" alt="<?php echo $monarchs_post->title ?>"></div>
                    <div class="media-body">
                      <h4><a href="<?php echo $monarchs_post->link; ?>"><?php echo $monarchs_post->title; ?></a></h4>
                    </div>
                  </section>
                </div>
              <?php } else { ?>
              <a class="list-group-item" href="<?php echo $monarchs_post->link; ?>"><?php echo $monarchs_post->title; ?></a>
            <?php }}
          } ?>
        </div>
        <div class="card-footer text-center">
          <a class="card-link text-center" href="https://rsl.com/monarchs" target="_blank">See All</a>
        </div>
    </section> <!--Monarchs Section-->

    <section class="card mb-5" id="academy">
      <div class="card-header">
        <div class="d-flex">
          <div class="flex-grow-1">
            <img class="sm-logo mr-1" src="<?php echo url_for('images/logos/MLS/RSL.svg'); ?>" alt="RSL" />
            <span>RSL Academy</span>
          </div>
          <div class="my-auto"><a href="https://rsl.com/academy" target="_blank">See All &raquo;</a></div>
        </div>
      </div>

        <div class="card-body">
          <a href="<?php echo $academy_posts[0]->link ?>" target="_blank"><img class="card-img img-fluid mb-2 mb-lg-1" src="<?php echo $academy_posts[0]->imageLink ?>" alt="<?php echo $academy_posts[0]->title ?>"></a>
          <h2 class="card-title"><a href="<?php echo $academy_posts[0]->link ?>" target="_blank"><?php echo $academy_posts[0]->title ?></a></h2>
        </div>
        <div class="list-group list-group-flush">
          <?php if ($academy_posts) {
            foreach ($academy_posts as $i => $academy_post) {
              if ($i >= 6) {
                break;
              }
              if ($academy_post->team_hero == 1 || $i == 0) {
                continue;
              }
              if ($i == 1) { ?>
                <div class="card mx-2 mx-lg-4">
                  <section class="d-flex media list-group-item" id="rsl_featured">
                    <div class="my-auto"><img class="d-flex img-fluid rounded mr-3" src="<?php echo $academy_post->imageLink ?>" alt="<?php echo $academy_post->title ?>"></div>
                    <div class="media-body">
                      <h4><a href="<?php echo $academy_post->link; ?>"><?php echo $academy_post->title; ?></a></h4>
                    </div>
                  </section>
                </div>
              <?php } else { ?>
              <a class="list-group-item" href="<?php echo $academy_post->link; ?>"><?php echo $academy_post->title; ?></a>
            <?php }}
          } ?>
        </div>
        <div class="card-footer text-center">
          <a class="card-link text-center" href="https://rsl.com" target="_blank">See All</a>
        </div>
    </section> <!--Academy Section-->

    <section class="card mb-5" id="latest">
      <div class="card-header">
        <div class="d-flex">
          <div class="flex-grow-1">
            <img class="sm-logo mr-1" src="<?php echo url_for('images/logos/MLS/RSL.svg'); ?>" alt="RSL" />
            <span>Latest News</span>
          </div>
          <div class="my-auto"><a href="https://rsl.com/" target="_blank">See All &raquo;</a></div>
        </div>
      </div>
        <div class="list-group list-group-flush">
          <?php if ($latest) {
            for ($i=0; $i < 5; $i++) { ?>
              <a class="list-group-item" href="<?php echo $latest[$i]->link; ?>"><?php echo $latest[$i]->title; ?></a>
          <?php  }} ?>
        </div>
        <div class="card-footer text-center">
          <a class="card-link text-center" href="https://rsl.com" target="_blank">See All</a>
        </div>
    </section> <!--Latest News Section-->

  </div> <!-- Main Section - Left Side -->

  <div class="col-lg-4 d-none d-lg-block">
    <div class="card"><div class="card-header">
      <span>Tickets</span>
    </div></div>
    <div class="card p-3 sticky-top">

      <!-- <select id="schedule" onchange="changeSchedule()" class="mb-3 custom-select-lg p-2">
        <option value="RSL">RSL
        <option value="URFC">Utah Royals FC
        <option value="Monarchs">Real Monarchs
        <option value="Academy">RSL Academy
      </select> -->

      <nav style="font-size:13px">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-rsl-tab" data-toggle="tab" href="#rsl-schedule" role="tab" aria-controls="rsl-schedule" aria-selected="true">RSL</a>
          <a class="nav-item nav-link" id="nav-urfc-tab" data-toggle="tab" href="#urfc-schedule" role="tab" aria-controls="urfc-schedule" aria-selected="false">Utah Royals FC</a>
          <a class="nav-item nav-link" id="nav-monarchs-tab" data-toggle="tab" href="#monarchs-schedule" role="tab" aria-controls="monarchs-schedule" aria-selected="false">Real Monarchs</a>
        </div>
      </nav>

      <?php require_once('../private/tickets.php'); ?>



    </div>
  </div>
</div>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
