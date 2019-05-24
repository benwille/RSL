<?php require_once('../../private/initialize.php'); ?>
<?php require_login();
  $admin = Admin::find_by_username($session->username);
?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <h2>Dashboard</h2>
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Admins</h5>
            <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
            <p class="card-text">Manage users and their permissions</p>
            <a href="admins/index.php" class="card-link">All Admins</a>
            <?php if ($admin->is_admin()) { ?>
              <a href="admins/new.php" class="card-link">Add New Admin</a>
            <?php } ?>
          </div>
        </div>
      </div><!--Admin Card-->

      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Posts</h5>
            <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
            <p class="card-text">Manage posts information coming in from RSS feed.</p>
            <a href="posts/index.php" class="card-link">All Posts</a>
            <a href="posts/promoted.php" class="card-link">Promoted Posts</a>
            <?php if ($admin->is_admin()) { ?>
              <a href="posts/news_feed.php" class="card-link">Posts Feed</a>
            <?php } ?>
          </div>
        </div>
      </div><!--Posts Card-->
    </div><!--Row-->

    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Schedule</h5>
            <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
            <p class="card-text">Manage team schedules and get code to add to RSL.com</p>
            <a href="schedule/index.php" class="card-link">All Schedules</a>
            <a href="schedule/index.php#royals" class="card-link">Royals Schedule</a>
            <a href="schedule/index.php#monarchs" class="card-link">Monarchs Schedule</a>

          </div>
        </div>
      </div><!--Schedule Card-->

      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Players</h5>
            <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
            <p class="card-text">Example of player stats section.</p>
            <a href="players/index.php" class="card-link">Players</a>
            <a href="https://realsl.wpengine.com/players" target="_blank" class="card-link">Live Example</a>
            <?php if ($admin->is_admin()) { ?>
              <!--TODO-->
              <!-- <a href="players/news.php" class="card-link">Add Player</a> -->
            <?php } ?>
          </div>
        </div>
      </div><!--Player Card-->
    </div><!--Row-->

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
