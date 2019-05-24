<?php

include_once ('../private/simple_html_dom.php');
$html = file_get_html('https://www.espn.com/soccer/club/_/id/4771');
// $html = file_get_html('https://www.rsl.com/schedule?month=all&year=2018&club_options=Filters&op=Update&form_build_id=form-zQKWOAX8P-mYKgfJKPKNFPBK-k9mdPugo7YLCC4tgyY&form_id=mp7_schedule_hub_search_filters_form');

// creating an array of elements
// $scores = [];

$i = 0;
// Find top ten videos
if ($html) {
foreach ($html->find('.col-a header.game-strip') as $score) {
        if ($i > 5) {
                break;
        }
        // $score = $html->find('li.row');
        // $home = $score->find('div.team-a');
        // $homeName = $home[0]->find('span.abbrev',0)->plaintext;
        $homeName = $score->find('span.abbrev',0)->plaintext;
        $homeScore = $score->find('div.score-container',0)->plaintext;
        $homeLogo = $score->find('img.team-logo',0)->src;
        $awayName = $score->find('span.abbrev',1)->plaintext;
        $awayScore = $score->find('div.score-container',1)->plaintext;
        $awayLogo = $score->find('img.team-logo',2)->src;
        $status = $score->find('div.game-status',0)->plaintext;
        if ($status == 'Live  ') {
                $date = NULL;
                $time = NULL;
        }
        elseif ($status != 'FT  ') {
                $status = NULL;
                $reverseDate = $score->find('div.game-date',0)->plaintext ?? NULL;
                if (!$reverseDate) {
                        $date = 'TBD';
                } else {
                        $correctDate = explode("/",$reverseDate);
                        $dateformat = strtotime($correctDate[1] . "/" . $correctDate[0]);
                        $date = date('M d', $dateformat);
                }
                // var_dump(strtotime($score->find('div.time',0)->plaintext));
                if (strtotime($score->find('div.time',0)->plaintext) == false) {
                        $time = 'TBD';
                } else {
                        $time = date('g:i A',(strtotime($score->find('div.time',0)->plaintext) + 60 * 60));
                }
                // $time = $time + 60 * 60;
                // $time = date_format($t, 'H:i');

        } else {
                $date = NULL;
                $time = NULL;
        }
        // $away = $score->find('div.team-b');
        // $awayName = $away[0]->find('span.abbrev',0)->plaintext;
        // $attr = $opponent[0]->attr;
        // $name = $attr['title'];
        //
        // $location = $score->find('div.match_triangle');
        // $class = $location[0]->attr;
        // preg_match('/away|home/', $class['class'], $result);
        // $homeAway = $result[0];
        //
        // $date = $score->find('div.match_meta');
        // $d = $date[0];


//
//         // Find item link element
//         // $teams = $score['children'];
//         //
//         $homeTeam = $score->find('span.abbrev');
//         // $awayTeam = $gameDetails->find('team-b');
//
//         // get title attribute
//         // $videoTitle = $videoDetails->title;
//
//         // get href attribute
//         // $videoUrl = 'https://youtube.com' . $videoDetails->href;
//
//         // push to a list of videos
        $rslScores[] = [
                'home' => $homeName,
                'homeScore' => $homeScore,
                'homeLogo' => $homeLogo,
                'away' => $awayName,
                'awayScore' => $awayScore,
                'awayLogo' => $awayLogo,
                'status' => $status,
                'date' => $date,
                'time' => $time
        ];
//         // $scores[] = [
//         //         'home' => $homeTeam,
//         //         'away' => $awayTeam
//         // ];
//
        // $info[] = [
        //         'name' => $name,
        //         'location' => $homeAway
        // ];

        $i++;
}
// $score = $scores[0];
// return $scores;
// print_r($homeAway);
// print_r ($info[0]);
// echo '<pre>';
// print_r($score);
// echo $score['status'];
// var_dump($scores[0]['status']);
// echo '</pre>';

?>
<?php

// include ('../private/simple_html_dom.php');
$html = file_get_html('http://www.espn.com/soccer/club/_/id/19141');

$i = 0;

foreach ($html->find('.col-a header.game-strip') as $score) {
        if ($i > 5) {
                break;
        }

        $homeName = $score->find('span.abbrev',0)->plaintext;
        $homeScore = $score->find('div.score-container',0)->plaintext;
        $homeLogo = $score->find('img.team-logo',0)->src;
        $awayName = $score->find('span.abbrev',1)->plaintext;
        $awayScore = $score->find('div.score-container',1)->plaintext;
        $awayLogo = $score->find('img.team-logo',2)->src;
        $status = $score->find('div.game-status',0)->plaintext;
        if ($status == 'Live  ') {
                $date = NULL;
                $time = NULL;
        }
        elseif ($status != 'FT  ') {
                $status = NULL;
                $reverseDate = $score->find('div.game-date',0)->plaintext;
                $correctDate = explode("/",$reverseDate);
                $dateformat = strtotime($correctDate[1] . "/" . $correctDate[0]);
                $date = date('M d', $dateformat);
                $time = date('g:i A',(strtotime($score->find('div.time',0)->plaintext) + 60 * 60));


        } else {
                $date = NULL;
                $time = NULL;
        }

        $urfcScores[] = [
                'home' => $homeName,
                'homeScore' => $homeScore,
                'homeLogo' => $homeLogo,
                'away' => $awayName,
                'awayScore' => $awayScore,
                'awayLogo' => $awayLogo,
                'status' => $status,
                'date' => $date,
                'time' => $time
        ];

        $i++;
}

?>

<?php

// include ('../private/simple_html_dom.php');
$html = file_get_html('http://www.espn.com/soccer/club/_/id/18448');

$i = 0;

foreach ($html->find('.col-a header.game-strip') as $score) {
        if ($i > 5) {
                break;
        }

        $homeName = $score->find('span.abbrev',0)->plaintext;
        $homeScore = $score->find('div.score-container',0)->plaintext;
        $homeLogo = $score->find('img.team-logo',0)->src;
        $awayName = $score->find('span.abbrev',1)->plaintext;
        $awayScore = $score->find('div.score-container',1)->plaintext;
        $awayLogo = $score->find('img.team-logo',2)->src;
        $status = $score->find('div.game-status',0)->plaintext;
        if ($status == 'Live  ') {
                $date = NULL;
                $time = NULL;
        }
        elseif ($status != 'FT  ') {
                $status = NULL;
                $reverseDate = $score->find('div.game-date',0)->plaintext;
                $correctDate = explode("/",$reverseDate);
                $dateformat = strtotime($correctDate[1] . "/" . $correctDate[0]);
                $date = date('M d', $dateformat);
                $time = date('g:i A',(strtotime($score->find('div.time',0)->plaintext) + 60 * 60));


        } else {
                $date = NULL;
                $time = NULL;
        }

        $monarchsScores[] = [
                'home' => $homeName,
                'homeScore' => $homeScore,
                'homeLogo' => $homeLogo,
                'away' => $awayName,
                'awayScore' => $awayScore,
                'awayLogo' => $awayLogo,
                'status' => $status,
                'date' => $date,
                'time' => $time
        ];

        $i++;
}
}
?>
