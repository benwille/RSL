<?php
  include_once ('../private/simple_html_dom.php');

  $html = file_get_html('http://www.espn.com/soccer/team/fixtures/_/id/4771/real-salt-lake');

  $i = 0;
  // Find top ten videos
  if ($html) {
  foreach ($html->find('.Table__fixtures .Table2__tbody tr') as $fixture) {
          if ($fixture->find('.Table2__Team',0)->plaintext !== 'Real Salt Lake') {
            continue;
          } elseif ($i > 5) {
                  break;
          }

          $date = date('M d', strtotime($fixture->find('.matchTeams',0)->plaintext));
          $homeTeam = $fixture->find('.Table2__Team',0)->plaintext;
          $homeLogo = $fixture->find('span.Table2__Team a img',0)->src;
          $awayLogo = $fixture->find('span.Table2__Team a img', 1)->src;
          $awayName = $fixture->find('.away .Table2__Team',0)->plaintext;
          $time = date("g:i A",strtotime("-2 hours", strtotime($fixture->find('.Table2__td',4)->plaintext)));
          // $awayLogo = $fixture->find('img.team-logo',2)->src;
          // $status = $fixture->find('div.game-status',0)->plaintext;
          // if ($status == 'Live  ') {
          //         $date = NULL;
          //         $time = NULL;
          // }


          $rslFixtures[] = [
                  'date' => $date,
                  'home' => $homeTeam,
                  'homeLogo' => $homeLogo,
                  'away' => $awayName,
                  // 'awayScore' => $awayfixture,
                  'awayLogo' => $awayLogo,
                  // 'status' => $status,
                  // 'date' => $date,
                  'time' => $time
          ];

          $i++;
  }
}

//var_dump($rslFixtures);
 ?>

 <?php

   $html = file_get_html('http://www.espn.com/soccer/team/fixtures/_/id/19141/utah-royals-fc');

   $i = 0;
   // Find top ten videos
   if ($html) {
   foreach ($html->find('.Table__fixtures .Table2__tbody tr') as $fixture) {
           if ($fixture->find('.Table2__Team',0)->plaintext !== 'Utah Royals FC') {
             continue;
           } elseif ($i > 5) {
                   break;
           }

           $date = date('M d', strtotime($fixture->find('.matchTeams',0)->plaintext));
           $homeTeam = $fixture->find('.Table2__Team',0)->plaintext;
           $homeLogo = $fixture->find('span.Table2__Team a img',0)->src;
           $awayLogo = $fixture->find('span.Table2__Team a img', 1)->src;
           $awayName = $fixture->find('.away .Table2__Team',0)->plaintext;
           $time = date("g:i A",strtotime("-2 hours", strtotime($fixture->find('.Table2__td',4)->plaintext)));
           // $awayLogo = $fixture->find('img.team-logo',2)->src;
           // $status = $fixture->find('div.game-status',0)->plaintext;


           $urfcFixtures[] = [
                   'date' => $date,
                   'home' => $homeTeam,
                   'homeLogo' => $homeLogo,
                   'away' => $awayName,
                   // 'awayScore' => $awayfixture,
                   'awayLogo' => $awayLogo,
                   // 'status' => $status,
                   // 'date' => $date,
                   'time' => $time
           ];

           $i++;
   }
 }

 //var_dump($rslFixtures);
?>

<?php

  $html = file_get_html('http://www.espn.com/soccer/team/fixtures/_/id/18448/real-monarchs-slc');

  $i = 0;
  // Find top ten videos
  if ($html) {
  foreach ($html->find('.Table__fixtures .Table2__tbody tr') as $fixture) {
          if ($fixture->find('.Table2__Team',0)->plaintext !== 'Real Monarchs SLC') {
            continue;
          } elseif ($i > 5) {
                  break;
          }

          $date = date('M d', strtotime($fixture->find('.matchTeams',0)->plaintext));
          $homeTeam = $fixture->find('.Table2__Team',0)->plaintext;
          $homeLogo = $fixture->find('span.Table2__Team a img',0)->src;
          $awayLogo = $fixture->find('span.Table2__Team a img', 1)->src;
          $awayName = $fixture->find('.away .Table2__Team',0)->plaintext;
          $time = date("g:i A",strtotime("-2 hours", strtotime($fixture->find('.Table2__td',4)->plaintext)));
          // $awayLogo = $fixture->find('img.team-logo',2)->src;
          // $status = $fixture->find('div.game-status',0)->plaintext;


          $monarchsFixtures[] = [
                  'date' => $date,
                  'home' => $homeTeam,
                  'homeLogo' => $homeLogo,
                  'away' => $awayName,
                  // 'awayScore' => $awayfixture,
                  'awayLogo' => $awayLogo,
                  // 'status' => $status,
                  // 'date' => $date,
                  'time' => $time
          ];

          $i++;
  }
}

//var_dump($rslFixtures);
?>
