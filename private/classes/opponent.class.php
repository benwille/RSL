<?php

class Opponent extends DatabaseObject {

  // ----- START OF ACTIVE RECORD CODE ------
  static protected $table_name = "opponents";
  static protected $db_columns = ['opponentID', 'club_name', 'stadium', 'team', 'abbr'];

  public $opponentID;
  public $team;
  public $club_name;
  public $stadium;
  public $abbr;

  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->team = $args['team'] ?? '';
    $this->opponentID = $args['opponentID'] ?? '';
    $this->club_name = $args['club_name'] ?? '';
    $this->stadium = $args['stadium'] ?? '';
    $this->abbr = $args['abbr'] ?? '';

  }

  static public function find_by_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE opponentID='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  public const TEAMS = [
    1 => 'Real Salt Lake',
    2 => 'Utah Royals FC',
    3 => 'Real Monarchs',
    4 => 'RSL Academy'
  ];

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
