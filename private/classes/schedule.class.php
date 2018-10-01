<?php

class Schedule extends DatabaseObject {

  // ----- START OF ACTIVE RECORD CODE ------
  static protected $table_name = "schedule";
  static protected $db_columns = ['id', 'home', 'away', 'date', 'time', 'link'];

  public $id;
  public $home;
  public $away;
  public $date;
  public $time;
  public $link;

  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->home = $args['home'] ?? 'Home';
    $this->opponent = $args['away'] ?? 'Opponent';
    $this->date = $args['date'] ?? '';
    $this->time = $args['time'] ?? '';
    $this->link = $args['link'] ?? 'https://rsl.com/tickets';

  }

  public function date_format() {
    $date = date_create( $this->date);
    return date_format($date, 'D d M');
  }

  public function time_format() {
    $time = date('h:i A', strtotime($this->time));
    return $time;
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
