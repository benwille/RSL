<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/schedule/index.php'));
  }
$id = $_GET['id'];
$team = $_GET['team'] ?? '1'; // PHP > 7.0
$match = Match::find_by_id($id);
?>

<script
			  src="http://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://rsl.com/s3fs-css/css/css_l1odcrvUuCEZXAOEbo65pky08w1NK43swCnsGYE6dUw.css" />
<script src="<?php echo 'js/script.js'?>"></script>
<script src="js/node_modules/clipboard/dist/clipboard.min.js"></script>
<style type="text/css">
 <?php include PUBLIC_PATH . '/staff/schedule/css/' . Match::liga($team) . '.css'; ?>
</style>
<style type="text/css">
.page-schedule {
 max-width: 500px;
}
.button {
 background: rgb(2, 43, 82);
}
#code {
    max-width: 800px;
    margin: 0 auto;
    background: #cdcdcd;
    padding: 2em 15em;
		white-space: pre-line;
}
</style>
<a href="<?php echo url_for('/staff/schedule/index.php');?>">&laquo; Back</a>
<div class="page-schedule">
<div class="item-list">
<ul class="schedule_list list-reset">
	<!--START COPYING HERE -->
	<?php
		$opponent = Opponent::find_by_id($match->opponentID); ?>
<li class="row row_no_padding">
	<article class="match_item">

		<div class="match_click_area">
			<div class="match_triangle match_<?php echo ($match->homeAway == 1) ? 'home' : 'away';?>">&nbsp;</div>
			<span class="match_home_away"><?php echo $match->homeaway();?></span>

			<div class="vs_club"><img alt="<?php echo $opponent->club_name;?>" class="club_logo"  src="<?php echo 'https://saltlake-mp7static.mlsdigital.net/elfinderimages/' . $match->league() . '/logos/' . $opponent->abbr . '.png';?>" title="<?php echo $opponent->club_name;?>" /></div>
			<span class="match_parallelogram match_<?php echo ($match->homeAway == 1) ? 'home' : 'away';?>">
				<span class="match_result"><?php echo h($match->score);?></span>
			</span>

			<div class="match_meta">
				<div class="match_date"><?php echo date_format(date_create($match->date), "l, F j, Y");?>
					<span class="match_time"><?php echo date_format(date_create($match->time), "g:i A");?></span>
				</div>

				<div class="match_matchup"><?php echo ($match->homeAway == 1) ? 'vs. ' .  $opponent->club_name : 'at ' . $opponent->club_name;?></div>

				<div class="match_info match_location_short"><?php echo ($match->homeAway == 1) ? $match->stadium() : $opponent->stadium;?></div>
			</div>
			<span class="match_competition "><?php echo $match->competition;?></span>
			<?php if ($match->homeAway == 1) { ?>
				<div class="match_links not-league">
					<div class="field field-name-field-match-links field-type-link-field field-label-hidden">
						<div class="field-items">
							<div class="field-item even">
								<?php $date = new DateTime($match->date . $match->time);
								$datetime = $date->format('Y-m-d h:i:s');
								 if(!$match->link) { ?>
									<a class="button match-link-1">On-Sale Soon</a>
								<?php } elseif ($match->link && (date('Y-m-d h:i:s') < $datetime)) { ?>
									<a class="button match-link-1" href="<?php echo $match->link;?>" target="_blank">Tickets</a>
									<?php if ($match->link2) { ?>
										<a class="button match-link-2" href="<?php echo $match->link2;?>" target="_blank"><?php echo $match->link2text;?></a>
								<?php } } ?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

	</article>
	</li>
<!--STOP COPYING HERE-->
</ul>
</div>
</div>
<div class="code-button">
	<button>Get Code</button>
</div>
<pre>
	<code>
		<div id="code">

		</div>
	</code>
</pre>
