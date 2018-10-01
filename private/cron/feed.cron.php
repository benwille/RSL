<?php require_once('../initialize.php'); ?>
<?php
	$feed = simplexml_load_file("https://www.rsl.com/rss.xml");
	$channel = $feed->channel;
	$items = $channel->item;
	date_default_timezone_set('America/Denver');
	// echo($items[6]->description);
?>

<?php
//Create array of each item in feed
$i = 0;
while ($i < 10) {

	$description = (explode("/s3/",$items[$i]->description));
	if (! isset($description[1])) {
		$description[1] = NULL;
		$image[0] = 'images/full-stadium-for-web.jpg';
	} else {
		$image = (explode("\"", $description[1]));
	}
	$date = date_create(h($items[$i]->pubDate), timezone_open("GMT"));
	date_timezone_set($date, timezone_open('America/Denver'));

	$posts['item'][$i]['title'] = h($items[$i]->title);
	$posts['item'][$i]['link'] = h($items[$i]->link);
	$posts['item'][$i]['pubDate'] = date_format($date, "Y-m-d H:i:s" );
	$posts['item'][$i]['imageLink'] = "https://saltlake-mp7static.mlsdigital.net/" . h($image[0]);

	$i++;
}

$args = $posts['item'];
// echo '<pre>';
// print_r($args);
// echo '</pre>';
$x = 0;

// Save off each item
foreach ($args as $arg) {
	$item = new Feed($arg);
	$result = $item->save();
	$errors[] = $item->errors;
	if($result === true) {
		$x++;
} else {
	continue;
	}
}
$msg = $x . ' added successfully. ' . (10 - $x) . ' duplicates.';
echo date("l jS \of F Y h:i:s A") . " - " . $msg;
?>

<?php
$session->message(date("l jS \of F Y h:i:s A") . " - " . $msg);
redirect_to('../../public/staff/posts/news_feed.php'); ?>
