<?php

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE promoted=1 ";
$sql .= "ORDER BY hero DESC, pubDate DESC ";
$promoted = Feed::find_by_sql($sql);

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE team=1 ";
$sql .= "AND team_featured=1 ";
$sql .= "OR team=1 AND team_hero=1 ";
$sql .= "ORDER BY team_hero DESC, pubDate DESC ";
$rsl_posts = Feed::find_by_sql($sql);

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE team=2 ";
$sql .= "AND team_featured=1 ";
$sql .= "OR team=2 AND team_hero=1 ";
$sql .= "ORDER BY team_hero DESC, pubDate DESC ";
$urfc_posts = Feed::find_by_sql($sql);

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE team=3 ";
$sql .= "AND team_featured=1 ";
$sql .= "OR team=3 AND team_hero=1 ";
$sql .= "ORDER BY team_hero DESC, pubDate DESC ";
$monarchs_posts = Feed::find_by_sql($sql);

$sql = "SELECT * FROM news_feed ";
$sql .= "WHERE team=4 ";
$sql .= "AND team_featured=1 ";
$sql .= "OR team=4 AND team_hero=1 ";
$sql .= "ORDER BY team_hero DESC, pubDate DESC ";
$academy_posts = Feed::find_by_sql($sql);

$sql = "SELECT * FROM news_feed ";
$sql .= "ORDER BY pubDate DESC ";
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
//  ?>
