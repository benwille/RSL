<?php

require ('../private/simple_html_dom.php');
// $html = file_get_html('http://www.espn.com/soccer/club/_/id/4771');
$html = file_get_html('https://www.rsl.com/schedule?month=all&year=2018&club_options=Filters&op=Update&form_build_id=form-zQKWOAX8P-mYKgfJKPKNFPBK-k9mdPugo7YLCC4tgyY&form_id=mp7_schedule_hub_search_filters_form');

// creating an array of elements
// $scores = [];

// Find top ten videos
foreach ($html->find('li.row') as $score) {
        // $score = $html->find('li.row');
        $opponent = $score->find('img.club_logo');
        $attr = $opponent[0]->attr;
        $name = $attr['title'];

        $location = $score->find('div.match_triangle');
        $class = $location[0]->attr;
        preg_match('/away|home/', $class['class'], $result);
        $homeAway = $result[0];

        $date = $score->find('div.match_date',0)->plaintext;



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
//         $scores = [$homeTeam];
//         // $scores[] = [
//         //         'home' => $homeTeam,
//         //         'away' => $awayTeam
//         // ];
//
        $info[] = [
                'name' => $name,
                'location' => $homeAway
        ];

        // $i++;
}

// print_r($homeAway);
print_r ($info[0]);
echo '<pre>';
// print_r($d);
var_dump($info);
echo '</pre>';

?>
