<?php

class Match extends DatabaseObject {

  // ----- START OF ACTIVE RECORD CODE ------
  static protected $table_name = "matches";
  static protected $db_columns = ['id', 'team', 'opponentID', 'homeAway', 'date', 'time', 'link', 'competition', 'score', 'link2', 'link2text'];

  public $id;
  public $team;
  public $opponentID;
  public $homeAway;
  public $date;
  public $time;
  public $link;
  public $competition;
  public $score;
  public $link2;
  public $link2text;

  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->id = $args['id'] ?? '';
    $this->team = $args['team'] ?? '';
    $this->opponentID = $args['opponentID'] ?? '';
    $this->homeAway = $args['homeAway'] ?? '';
    $this->date = $args['date'] ?? '';
    $this->time = $args['time'] ?? '';
    $this->competition = $args['competition'] ?? '';
    $this->link = $args['link'] ?? '';
    $this->score = $args['score'] ?? '';
    $this->link2 = $args['link2'] ?? NULL;
    $this->link2text = $args['link2text'] ?? 'Family Pack';

  }

  public const TEAMS = [
    1 => 'Real Salt Lake',
    2 => 'Utah Royals FC',
    3 => 'Real Monarchs',
    4 => 'RSL Academy'
  ];

  public function teamname() {
    if($this->team > 0) {
      return self::TEAMS[$this->team];
    } else {
      return "Unknown";
    }
  }

  public const HOMEAWAY = [
    1 => 'H',
    2 => 'A'
  ];

  public function homeaway() {
    if($this->homeAway > 0) {
      return self::HOMEAWAY[$this->homeAway];
    } else {
      return "Unknown";
    }
  }

  public const LEAGUES = [
    1 => 'MLS',
    2 => 'NWSL',
    3 => 'USL'
  ];

  public function league() {
    if($this->team > 0) {
      return self::LEAGUES[$this->team];
    } else {
      return "Unknown";
    }
  }

  static public function liga($team) {
    if ($team) {
      return self::LEAGUES[$team];
    } else {
      return "Unknown";
    }
  }

  public const STADIUMS = [
    1 => 'Rio Tinto Stadium',
    2 => 'Rio Tinto Stadium',
    3 => 'Zions Bank Stadium'
  ];

  public function stadium() {
    if($this->team > 0) {
      return self::STADIUMS[$this->team];
    } else {
      return "Unknown";
    }
  }

  public function date_format() {
    $date = date_create( $this->date);
    return date_format($date, 'D d M');
  }

  public function time_format() {
    $time = date('h:i A', strtotime($this->time));
    return $time;
  }

  public function opponent_name($opponentID) {
    $sql = "SELECT club_name FROM opponents ";
    $sql .= "WHERE opponentID=" . $opponentID;
    $opponent = self::find_by_sql($sql);
    return $opponent;
  }

  protected function validate() {

  }

  public function getRSLScheudle() {
    return ?>
    <?php for ($i=0; $i < 4; $i++) { ?>
      <div class="card-body row inline-table">
        <div class="col-3">
          <img class="sm-logo mr-1" src="<?php echo url_for('images/logos/MLS/' . h($schedule[$i]->home) . '.svg'); ?>" alt="Home" /><br />
          <img class="sm-logo mr-1" src="<?php echo url_for('images/logos/MLS/' . h($schedule[$i]->away) . '.svg'); ?>" alt="Away" style="margin-left:-3px" />
        </div>
        <div class="col-6 my-auto">
          <?php echo h($schedule[$i]->date_format()); ?><br />
          <?php echo h($schedule[$i]->time_format()); ?>
        </div>
        <div class="col-3 my-auto text-center">
          <a href="<?php echo h($schedule[$i]->link); ?>" target="_blank"><img class="sm-logo" src="<?php echo url_for('images/ticket.svg'); ?>" alt="Tickets"></a><br />
        </div>
      </div>
      <?php if ($i < 3) { ?>
        <div class="dropdown-divider"></div><!--End single game ticket block -->
    <?php } } ?>
  <?php }

}

?>
