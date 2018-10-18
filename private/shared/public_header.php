<!doctype html>
<?php

if(is_post_request()) {
  // Form was submitted
  $preference = $_POST['preference'] ?? 'Any';
  $expire = time() + 60*60*24*365;
  setcookie('preference', $preference, $expire);

} else {
  // Read the stored value (if any)
  $preference = $_COOKIE['preference'] ?? 'Any';
}

?>
<html lang="en">
  <head>
    <title>RSL <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/bootstrap.min.css'); ?>" media="all">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
    <link rel="shortcut icon" href="<?php // TODO: //echo url_for('/images/favicon.ico'); ?>" type="image/x-icon">
    <link rel="icon" href="<?php // TODO:  //echo url_for('/images/favicon.ico'); ?>" type="image/x-icon">

    <?php // TODO:  ?>
    <meta property="og:url"                content="<?php echo getURL(); ?>" />
    <meta property="og:title"              content="RSL - <?php echo h($page_title); ?>" />
    <meta property="og:description"        content="Real Salt Lake's website as an organization. Built by Ben Wille" />
    <meta property="og:image"              content="<?php //echo url_for('/images/Depositphotos_111852752_l-2015.jpg'); ?>" />

  </head>

  <body>
    <?php //include '../private/scores/index.php'; ?>

    <header>
      <div class="container">
        <nav class="navbar navbar-dark navbar-expand-sm">
          <div class="container">

            <button class="navbar-toggler mb-2" type="button"
              data-toggle="collapse" data-target="#myTogglerNav"
              aria-controls="myTogglerNav" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-inline d-sm-none"><a href="https://www.ticketingcentral.com/portal/login.aspx?cust=scp" class="" target="_blank"><img src="<?php echo url_for('/images/user.svg'); ?>" style="height:25px" alt="user" /></a></div>
          <a href="<?php echo url_for('/index.php'); ?>">
            <img class="wordmark" src="<?php echo url_for('/images/RSL-Wordmark(White).svg') ?>" alt="Real Salt Lake" />
          </a>
          <!-- <a href="<?php //echo url_for('/public/index.php'); ?>" class="navbar-brand">Real Salt Lake</a> -->

            <div class="collapse navbar-collapse" id="myTogglerNav">
              <div class="navbar-nav ml-3">
                  <a class="nav-item nav-link" href="#rsl">RSL</a>
                  <a class="nav-item nav-link" href="#urfc">Utah Royals FC</a>
                  <a class="nav-item nav-link" href="#monarchs">Real Monarchs</a>
                  <a class="nav-item nav-link" href="#academy">RSL Academy</a>
              </div><!-- navbar -->
            </div><!--collapse-->

            <div class="d-none d-sm-inline"><a href="#preferences" data-toggle="modal" class="" target="_blank"><img src="<?php echo url_for('/images/user.svg'); ?>" style="height:25px" alt="user" /></a></div>
<!-- href="https://www.ticketingcentral.com/portal/login.aspx?cust=scp" -->
            <div class="modal fade" id="preferences" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content text-dark">
                  <div class="modal-header">
                    <h5 class="modal-title" id="preferencesLabel">Preferences</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php include_once '../private/preferences.php'; ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                  </div>
                </div>
              </div>
            </div><!--modal-->
          </div><!-- container -->
        </nav><!-- nav -->

      </div>
        <button type="button" class="btn btn-success d-lg-none btn-block btn-ticket" data-toggle="modal" data-target=".ticket-modal-lg" style="border-radius:0px;">Tickets</button>

        <div class="modal fade ticket-modal-lg text-dark" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalCenterTitle">Tickets</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <nav style="font-size:13px">
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-rsl-tab" data-toggle="tab" href="#rsl-mobile-schedule" role="tab" aria-controls="rsl-schedule" aria-selected="true">RSL</a>
                    <a class="nav-item nav-link" id="nav-urfc-tab" data-toggle="tab" href="#urfc-mobile-schedule" role="tab" aria-controls="urfc-schedule" aria-selected="false">Utah Royals FC</a>
                    <a class="nav-item nav-link" id="nav-monarchs-tab" data-toggle="tab" href="#monarchs-mobile-schedule" role="tab" aria-controls="monarchs-schedule" aria-selected="false">Real Monarchs</a>
                  </div>
                </nav>

                <?php include ('../private/mobile_tickets.php'); ?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </header><!-- Header Container -->

    <div class="container">
