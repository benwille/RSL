<?php require_once('../../../private/initialize.php'); ?>
<?php
	$admin = Admin::find_by_username($session->username);

	$feed = simplexml_load_file("https://www.rsl.com/rss.xml");
	$channel = $feed->channel;
	$items = $channel->item;
	// echo($items[6]->description);

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['item'];
	$message = [];
	$x = 0;
	foreach ($args as $arg) {
		$item = new Feed($arg);
		$result = $item->save();
		$errors[] = $item->errors;
		if($result === true) {
			$x++;
			//Show all the articles uploaded
			// echo '<pre>';
			// print_r ($item);
			// echo '</pre><br />';

	    //$new_id = $task->id;
	    // $session->message('The article was added successfully.');
	    //redirect_to(url_for('/staff/posts/index.php?id=' . $new_id));
	  } else {
	    // show errors
			continue;
	  }
	}
	// print_r ($item->shift_errors_array());
	$msg = $x . ' were added successfully. ' . (10 - $x) . ' were duplicates.';
	$session->message($msg);

} else {
  // display the form
  $item = new Feed;

}
?>

<script src="<?php echo url_for('/js/jquery.slim.min.js'); ?>"></script>
<script>
jQuery(document).ready(function() {
		setTimeout(function() {
				 document.forms["form"].submit()
		}, 300000);
});
</script>


<?php $page_title = 'News Feed'; ?>
<?php include(SHARED_PATH . '/staff_header.php');
include(SHARED_PATH . '/posts_menu.php'); ?>
<?php echo display_errors($item->errors); ?>
<div class="container">
<form action="<?php echo 'news_feed.php'; ?>" method="post" id="form">
	<div class="table-responsive">
		<table class="list table">
			<tr>
				<td>Title</td>
				<td>Link</td>
				<td>PubDate</td>
				<td>Image</td>
				<td>Team</td>
			</tr>
			<?php $article = []; ?>
			<?php
				$i = 0;
				while ($i < 10) { ?>
			<?php $description = (explode("/s3/",$items[$i]->description));
				if (! isset($description[1])) {
					$description[1] = NULL;
					$image[0] = 'images/full-stadium-for-web.jpg';
				} else {
					$image = (explode("\"", $description[1]));
				}

				$url = explode("/post/", $items[$i]->link);
				$path = $url[1];
				switch (true) {
					case preg_match('(rsl)', $path) :
						$team = 1;
						break;
					case preg_match('(urfc)', $path) :
						$team = 2;
						break;
					case preg_match('(royals)', $path) :
						$team = 2;
						break;
					case preg_match('(monarchs)', $path) :
						$team = 3;
						break;
					case preg_match('(academy)', $path) :
						$team = 4;
						break;
					case preg_match('(real-salt-lake)', $path) :
						$team = 1;
						break;
					default:
						$team = NULL;
				}

				$date = date_create(h($items[$i]->pubDate), timezone_open("GMT"));
				date_timezone_set($date, timezone_open('America/Denver')); ?>
			<tr>
					<td><input type="text" name="item[<?php echo h($i) ?>][title]"  value="<?php echo h($items[$i]->title); ?>" readonly></td>
					<td><input type="text" name="item[<?php echo h($i) ?>][link]"  value="<?php echo h($items[$i]->link); ?>" readonly></td>
					<td><input type="text" name="item[<?php echo h($i) ?>][pubDate]"  value="<?php echo date_format($date, "Y-m-d H:i:s" ); ?>" placeholder="hello" readonly></td>
					<td><input type="text" name="item[<?php echo h($i) ?>][imageLink]"  value="<?php echo("https://saltlake-mp7static.mlsdigital.net/" . h($image[0])); ?>" readonly></td>
					<td class="align-middle">
            <select name="item[<?php echo h($i) ?>][team]">
              <option value=""></option>
            <?php foreach(Feed::TEAMS as $team_id => $team_name) { ?>
              <option value="<?php echo $team_id; ?>" <?php if($team == $team_id) { echo 'selected'; } ?>><?php echo $team_name; ?></option>
            <?php } ?>
            </select>
          </td>
			</tr>

			<?php $i++;
			 } ?>
		</table>
	</div>
	<div id="operations">
    <input type="submit" value="Add Articles" />
  </div>
</form>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
