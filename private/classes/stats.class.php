<?php

class Stats extends DatabaseObject {

  // ----- START OF ACTIVE RECORD CODE ------
  static protected $table_name = "stats";
  static protected $db_columns = ['id', 'player_id', 'competition', 'played', 'started', 'minutes', 'goals', 'assists', 'yellow', 'red'];

  public $id;
  public $player_id;
  public $competition;
  public $played;
  public $started;
  public $minutes;
  public $goals;
  public $assists;
  public $yellow;
  public $red;

  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->player_id = $args['player_id'] ?? '';
    $this->competition = $args['competition'] ?? '';
    $this->played = $args['played'] ?? 0;
    $this->started = $args['started'] ?? 0;
    $this->minutes = $args['minutes'] ?? 0;
    $this->goals = $args['goals'] ?? 0;
    $this->assists = $args['assists'] ?? 0;
    $this->yellow = $args['yellow'] ?? 0;
    $this->red = $args['red'] ?? 0;

  }

  static public function find_by_player($player_id) {
    $sql = "SELECT * FROM " . self::$table_name . " ";
    $sql .= "WHERE player_id='" . self::$database->escape_string($player_id) . "' ";
    // $sql .= "AND competition='" . self::$database->escape_string($compeetition) . "' ";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return $obj_array;
    } else {
      return false;
    }
  }

  public const COMPETITION = [
    1 => 'MLS',
    2 => 'USOC',
    3 => 'CONCACAF',
    4 => 'All Games',
  ];

  public function competition() {
    if($this->competition > 0) {
      return self::COMPETITION[$this->competition];
    } else {
      return "Unknown";
    }
  }

  static public function all_stats($player_id) {
    $sql = "SELECT player_id, 4 as competition, ";
    $sql .= "SUM(played) as played, SUM(started) as started, SUM(minutes) as minutes, ";
    $sql .= "SUM(goals) as goals, SUM(assists) as assists, SUM(yellow) as yellow, SUM(red) as red ";
    $sql .= "FROM stats WHERE player_id=" . $player_id;
    $obj_array = self::find_by_sql($sql);
    if (!empty($obj_array)) {
      $result = array_shift($obj_array);
      return $result;
    } else {
      return false;
    }
  }

  public function opponent_name($opponentID) {
    $sql = "SELECT club_name FROM opponents ";
    $sql .= "WHERE opponentID=" . $opponentID;
    $opponent = self::find_by_sql($sql);
    return $opponent;
  }

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->player_id)) {
      $this->errors[] = "Stats must be associated with a player";
    }

    return $this->errors;
  }

}

?>
