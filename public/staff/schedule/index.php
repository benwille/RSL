<?php
require_once('../../../private/initialize.php');

$sql = "SELECT * FROM matches ";
$sql .= "WHERE team=1 ";
$sql .= "ORDER BY date ASC";
// $sql .= "LIMIT 1 ";
$rsl_matches = Match::find_by_sql($sql);

$sql = "SELECT * FROM matches ";
$sql .= "WHERE team=2 ";
$sql .= "ORDER BY date ASC";
// $sql .= "LIMIT 1 ";
$urfc_matches = Match::find_by_sql($sql);

$sql = "SELECT * FROM matches ";
$sql .= "WHERE team=3 ";
$sql .= "ORDER BY date ASC";
// $sql .= "LIMIT 1 ";
$monarchs_matches = Match::find_by_sql($sql);
date_default_timezone_set("America/Denver");

$sql = "SELECT * FROM matches ";
$sql .= "ORDER BY team ASC, date ASC";
$matches = Match::find_by_sql($sql);
// $opponent = Opponent::find_by_id($match->opponentID);

// $parser = new ParseCSV(PRIVATE_PATH . '/schedules/rsl2019.csv');
// $matches = $parser->parse();

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['match'];
    $id = $_GET['id'];
    $match = Match::find_by_id($id);
    $match->merge_attributes($args);

    $result = $match->save();
    if($result === true) {
      // $new_id = $task->id;
      // echo 'The post was updated successfully.';
      $session->message('The Match was updated successfully.');
      redirect_to(url_for('/staff/schedule/index.php'));


    } else {
      // show errors
      // echo 'There was an error';
      // redirect_to(url_for('/staff/posts/index.php'));
    }
  } else {
    $match = new Match;
  }
 ?>

 <?php $page_title = 'Matches'; ?>
 <?php include(SHARED_PATH . '/staff_header.php'); ?>

 <div id="content">
   <div class="tasks listing" id="royals">
     <div class="d-flex">
       <h1>Royals Matches</h1>
       <div class="ml-auto">
        <a class="btn btn-primary" href="<?php echo url_for("staff/schedule/schedule.php?team=2"); ?>">See Schedule</a>
      </div>
     </div>
     <?php //echo display_errors($post->errors); ?>
     <span class="message"></span>
   	<div class="table-responsive">
       <table class="list table">
       <tr>
         <th>Team</th>
         <th>Opponent</th>
         <th>Date/Time</th>
         <th>Location</th>
         <th>Score</th>
         <th>&nbsp;</th>
         <th>&nbsp;</th>
         <th>&nbsp;</th>
         <th>&nbsp;</th>
       </tr>
       <?php foreach($urfc_matches as $match) {
         $opponent = Opponent::find_by_id($match->opponentID);?>
         <tr>
           <form action="<?php echo 'index.php?id=' . h(u($match->id)) ; ?>" method="post" id="postform">
           <td><?php echo h($match->teamname()); ?></td>
           <td><?php echo h($opponent->club_name); ?></td>
           <td class="align-middle">
             <?php echo date_format(date_create($match->date), "l, F j, Y");?><br />
             <?php echo date_format(date_create($match->time), "g:i A");?>
           </td>
           <td class="text-center align-middle">
             <?php echo ($match->homeAway == 1) ? $match->stadium() : $opponent->stadium;?>
           </td>
           <td class="align-middle">
             <input type="text" name="match[score]" value="<?php echo h($match->score); ?>" size="5"/>
           </td>
           <td class="align-middle"><a class="action" href="<?php echo url_for('/staff/schedule/match.php?id=' . h(u($match->id)) . '&team=' . h(u($match->team))); ?>" >View</a></td>
           <td class="align-middle"><a class="action" href="<?php echo url_for('/staff/schedule/edit.php?id=' . h(u($match->id))); ?>">Edit</a></td>
           <td class="align-middle"><a class="action" href="<?php echo url_for('/staff/posts/delete.php?id=' . h(u($match->id))); ?>">Delete</a></td>
           <td class="align-middle"><input type="submit" value="Update" /></td>
           </form>
     	  </tr>
       <?php } ?>
   	</table></div>

   </div>
   <div class="tasks listing" id="monarchs">
     <div class="d-flex">
       <h1>Monarchs Matches</h1>
       <div class="ml-auto">
        <a class="btn btn-primary" href="<?php echo url_for("staff/schedule/schedule.php?team=3"); ?>">See Schedule</a>
      </div>
     </div>
     <?php //echo display_errors($post->errors); ?>
     <span class="message"></span>
   	<div class="table-responsive">
       <table class="list table">
       <tr>
         <th>Team</th>
         <th>Opponent</th>
         <th>Date/Time</th>
         <th>Location</th>
         <th>Score</th>
         <th>&nbsp;</th>
         <th>&nbsp;</th>
         <th>&nbsp;</th>
         <th>&nbsp;</th>
       </tr>
       <?php foreach($monarchs_matches as $match) {
         $opponent = Opponent::find_by_id($match->opponentID);?>
         <tr>
           <form action="<?php echo 'index.php?id=' . h(u($match->id)) ; ?>" method="post" id="postform">
           <td><?php echo h($match->teamname()); ?></td>
           <td><?php echo h($opponent->club_name); ?></td>
           <td class="align-middle">
             <?php echo date_format(date_create($match->date), "l, F j, Y");?><br />
             <?php echo date_format(date_create($match->time), "g:i A");?>
           </td>
           <td class="text-center align-middle">
             <?php echo ($match->homeAway == 1) ? $match->stadium() : $opponent->stadium;?>
           </td>
           <td class="align-middle">
             <input type="text" name="match[score]" value="<?php echo h($match->score); ?>" size="5"/>
           </td>
           <td class="align-middle"><a class="action" href="<?php echo url_for('/staff/schedule/match.php?id=' . h(u($match->id)) . '&team=' . h(u($match->team))); ?>" >View</a></td>
           <td class="align-middle"><a class="action" href="<?php echo url_for('/staff/schedule/edit.php?id=' . h(u($match->id))); ?>">Edit</a></td>
           <td class="align-middle"><a class="action" href="<?php echo url_for('/staff/posts/delete.php?id=' . h(u($match->id))); ?>">Delete</a></td>
           <td class="align-middle"><input type="submit" value="Update" /></td>
           </form>
     	  </tr>
       <?php } ?>
   	</table></div>

   </div>

 </div>

 <?php include(SHARED_PATH . '/staff_footer.php'); ?>
