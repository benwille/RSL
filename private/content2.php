<?php

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE promoted=1 ";
$sql .= "ORDER BY hero DESC, pubDate DESC ";
$sql .= "LIMIT 5 ";
$promoted = Feed::find_by_sql($sql);

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE team=1 ";
$sql .= "ORDER BY pubDate DESC ";
$sql .= "LIMIT 5 ";
$rsl_posts = Feed::find_by_sql($sql);

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE team=2 ";
$sql .= "ORDER BY pubDate DESC ";
$sql .= "LIMIT 5 ";
$urfc_posts = Feed::find_by_sql($sql);

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE team=3 ";
$sql .= "ORDER BY pubDate DESC ";
$sql .= "LIMIT 5 ";
$monarchs_posts = Feed::find_by_sql($sql);

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE team=4 ";
$sql .= "ORDER BY pubDate DESC ";
$sql .= "LIMIT 5 ";
$academy_posts = Feed::find_by_sql($sql);

$sql = "SELECT * FROM news_feed ";
$sql .= "ORDER BY pubDate DESC ";
$sql .= "LIMIT 5 ";
$latest = Feed::find_by_sql($sql);

// $sql = "SELECT * FROM schedule ";
// $sql .= "WHERE home='RSL' ";
// $sql .= "ORDER BY date ASC ";
// $schedule = schedule::find_by_sql($sql);
//
// $sql = "SELECT * FROM schedule ";
// $sql .= "WHERE home='UTA' ";
// $sql .= "ORDER BY date ASC ";
// $urfc_schedule = schedule::find_by_sql($sql);
//
// $sql = "SELECT * FROM schedule ";
// $sql .= "WHERE home='SLC' ";
// $sql .= "ORDER BY date ASC ";
// $monarchs_schedule = schedule::find_by_sql($sql);
 ?>
