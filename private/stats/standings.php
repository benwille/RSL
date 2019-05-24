<link href="http://www.nwslsoccer.com/vendor/bootstrap/css/bootstrap.min.css?ut=1555415194" rel="stylesheet" type="text/css">
<link href="http://www.nwslsoccer.com/assets/nwslsoccer/css/application.css?ut=1555415194" rel="stylesheet" type="text/css">
<style>
.panel .panel-cell {
    display: inline-block;
}
.list header ul {

    height: 32px;
    list-style: none;
    padding: 0;
    margin: 0;

}
.standings .list .list-row .overall,
.standings .list .list-row .away {
    margin-left: -11px;
}
</style>
<div class="standings">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix">
    <div class="content-no-margin">
        <section id="fixtures" class="fixtures list" style="padding-top: 0px;">
            <header>
                <ul class="list clearfix">
                    <li class="rank"><span class="bottom">RANK</span></li>
                    <li class="team"><span class="bottom">TEAM</span></li>
                    <li class="points"><span class="bottom text-center">PTS</span></li>
                    <li class="overall">
                        <div class="bottom">
                            <div class="top text-center desktop_only">
                                <span>OVERALL</span>
                            </div>
                            <div class="bottom desktop_only clearfix">
                                <span class="pull-left">GP</span>
                                <span class="pull-right">W-L-T</span>
                            </div>
                            <div class="mobile_scores mobile_only">
                                <span>GP</span>
                                <span>W</span>
                                <span>L</span>
                                <span>T</span>
                            </div>
                        </div>
                    </li>
                    <li class="home">
                        <div class="bottom text-center">
                            <span>HOME</span>
                            <span>W-L-T</span>
                        </div>
                    </li>
                    <li class="away">
                        <div class="bottom text-center clearfix">
                            <span>AWAY</span>
                            <span>W-L-T</span>
                        </div>
                    </li>
                    <li class="goals-for"><span class="bottom text-center">GF</span></li>
                    <li class="goals-against"><span class="bottom text-center">GA</span></li>
                    <li class="goal-difference"><span class="bottom text-center">GD</span></li>
                    <!-- <li class="form"><span class="bottom text-center">FORM</span></li> -->
                </ul>
            </header>
        </section>
    </div>
</div>
</div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix">

    <section id="fixtures" class="fixtures list">

        <?php

        include_once ('../simple_html_dom.php');
        $html = file_get_html('http://www.nwslsoccer.com/standings');
        // $html = file_get_html('https://www.rsl.com/schedule?month=all&year=2018&club_options=Filters&op=Update&form_build_id=form-zQKWOAX8P-mYKgfJKPKNFPBK-k9mdPugo7YLCC4tgyY&form_id=mp7_schedule_hub_search_filters_form');

        // creating an array of elements
        // $scores = [];

        // Find top ten videos
        if ($html) {
            foreach ($html->find('#fixtures .list-row') as $team) {
                // if ($i > 5) {
                //         break;
                // }
                // $score = $html->find('li.row');
                // $home = $score->find('div.team-a');
                // $homeName = $home[0]->find('span.abbrev',0)->plaintext;
                $rank = $team->find('.rank', 0)->plaintext;
                $teamLogo = $team->find('.team img',0)->src;
                $teamName = $team->find('.team span.desktop_only',0)->plaintext;
                $points = $team->find('.points span',0)->plaintext;
                $gamesplayed = $team->find('.overall span',0)->plaintext;
                $record = $team->find('.overall span',1)->plaintext;
                $win = $team->find('.overall_mobile span', 1)->plaintext;
                $loss = $team->find('.overall_mobile span', 2)->plaintext;
                $tie = $team->find('.overall_mobile span', 3)->plaintext;
                $homerecord = $team->find('.home span',0)->plaintext;
                $awayrecord = $team->find('.away span',0)->plaintext;
                $gf = $team->find('.goals-for span',0)->plaintext;
                $ga = $team->find('.goals-against span',0)->plaintext;
                $difference = $team->find('.goal-difference span',0)->plaintext;
                // echo $rank . '- ' . '<img src="' . $teamLogo . '" />' . $teamName . ' ' . $points . ' GP: ' . $gamesplayed . ' (' . $record . ')<br />';
                ?>
                <div class="list-row clearfix">
                    <div class="data">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="panel-cell rank">
                                                                                            <?php echo $rank;?>                                                                                                    </div>
                                <div class="panel-cell team">
                                        <img src="<?php echo $teamLogo; ?>">
                                        <span class="desktop_only"><?php echo $teamName; ?></span>
                                        <span class="mobile_only">NC</span>
                                </div>
                                <div class="panel-cell points">
                                                                                            <span><?php echo $points; ?></span>
                                                                                    </div>
                                <div class="panel-cell overall desktop_only">
                                                                                            <span><?php echo $gamesplayed; ?></span>
                                                                                            <span><?php echo $record; ?></span>
                                                                                    </div>
                                <div class="panel-cell overall_mobile mobile_only">
                                                                                            <span><?php echo $gamesplayed; ?></span>
                                        <span><?php echo $win; ?></span>
                                        <span><?php echo $loss; ?></span>
                                        <span><?php echo $tie; ?></span>
                                                                                    </div>
                                <div class="panel-cell home">
                                                                                            <span><?php echo $homerecord; ?></span>
                                                                                    </div>
                                <div class="panel-cell away">
                                                                                            <span><?php echo $awayrecord; ?></span>
                                                                                    </div>
                                <div class="panel-cell goals-for">
                                                                                            <span><?php echo $gf; ?></span>
                                                                                    </div>
                                <div class="panel-cell goals-against">
                                                                                            <span><?php echo $ga; ?></span>
                                                                                    </div>
                                <div class="panel-cell goal-difference">
                                                                                            <span><?php echo $difference; ?></span>
                                                                                    </div>
                                <div class="panel-cell form">
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
            }

            ?>
        </section>
        </div>
</div>
</div>
