<nav class="navbar navbar-light navbar-expand-sm">
  <div class="container">

    <!-- <button class="navbar-toggler-posts" type="button"
      data-toggle="collapse" data-target="#postsTogglerNav"
      aria-controls="postsTogglerNav" aria-expanded="false"
      aria-label="Posts Toggle navigation">
      <span class="navbar-toggler-posts-icon"></span>
    </button> -->

    <div class="collapse navbar-collapse" id="postsTogglerNav">
      <div class="navbar-nav ml-sm-auto">
          <a class="nav-item nav-link" href="<?php echo url_for('/staff/posts/promoted.php'); ?>">Promoted</a>
          <a class="nav-item nav-link" href="<?php echo url_for('/staff/posts/rsl.php'); ?>">RSL</a>
          <a class="nav-item nav-link" href="<?php echo url_for('/staff/posts/urfc.php'); ?>">Utah Royals FC</a>
          <a class="nav-item nav-link" href="<?php echo url_for('/staff/posts/monarchs.php'); ?>">Real Monarchs</a>
          <a class="nav-item nav-link" href="<?php echo url_for('/staff/posts/academy.php'); ?>">RSL Academy</a>
          <a class="nav-item nav-link" href="<?php echo url_for('/staff/posts/team.php'); ?>">Other</a>
          <?php if ($admin->is_admin()) { ?>
            <a class="nav-item nav-link" href="<?php echo url_for('/staff/posts/news_feed.php'); ?>">Posts Feed</a>
          <?php } ?>
      </div><!-- navbar -->
    </div><!--collapse-->

  </div><!-- container -->
</nav><!-- nav -->
