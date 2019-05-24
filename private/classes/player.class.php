<?php

class Player extends DatabaseObject {

  // ----- START OF ACTIVE RECORD CODE ------
  static protected $table_name = "players";
  static protected $db_columns = ['id', 'name', 'last_name', 'position', 'startYear', 'endYear', 'notes'];

  public $id;
  public $name;
  public $last_name;
  public $position;
  public $startYear;
  public $endYear;
  public $notes;

  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->name = $args['name'] ?? '';
    $this->name = $args['last_name'] ?? '';
    $this->position = $args['position'] ?? '';
    $this->startYear = $args['startYear'] ?? '';
    $this->endYeaer = $args['endYear'] ?? '';
    $this->notes = $args['notes'] ?? '';

  }

  public function fullName() {
    $fullname = $this->name . ' ' . $this->last_name;
    return $fullname;
  }

  public function years() {
    if($this->startYear) {
      $years = '(' . $this->startYear . ' - ' . $this->endYear . ' )';
      return $years;
    }
  }

  public function opponent_name($opponentID) {
    $sql = "SELECT club_name FROM opponents ";
    $sql .= "WHERE opponentID=" . $opponentID;
    $opponent = self::find_by_sql($sql);
    return $opponent;
  }

  protected function validate() {

  }

}

?>
