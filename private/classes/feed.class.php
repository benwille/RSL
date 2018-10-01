<?php

class Feed extends DatabaseObject {

  // ----- START OF ACTIVE RECORD CODE ------
  static protected $table_name = "news_feed";
  static protected $db_columns = ['id', 'title', 'link', 'pubDate', 'imageLink', 'team', 'promoted', 'hero', 'team_hero', 'team_featured', 'promoted_banner', 'live'];

  public $id;
  public $title;
  public $link;
  public $pubDate;
  public $imageLink;
  public $imageThumb;
  public $team;
  public $promoted;
  public $hero;
  public $team_hero;
  public $team_featured;
  public $promoted_banner;
  public $live;

  public const TEAMS = [
    1 => 'Real Salt Lake',
    2 => 'Utah Royals FC',
    3 => 'Real Monarchs',
    4 => 'RSL Academy'
  ];

  public const BANNER = [
    1 => 'None',
    2 => 'Breaking News',
    3 => 'Updated'
  ];

  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->title = $args['title'] ?? '';
    $this->link = $args['link'] ?? '';
    $this->pubDate = $args['pubDate'] ?? '';
    $this->imageLink = $args['imageLink'] ?? '';
    $this->team = $args['team'] ?? NULL;
    $this->promoted = $args['promoted'] ?? 0;
    $this->hero = $args['hero'] ?? 0;

  }

  public function banner() {
    if($this->promoted_banner > 0) {
      return self::BANNER[$this->promoted_banner];
    } else {
      return "Unknown";
    }
  }

  public function banner_color() {
    if ($this->promoted_banner == 2) {
      echo 'bg-danger';
    } elseif ($this->promoted_banner == 3) {
      echo 'bg-success';
    }
  }

  public function teams() {
    if($this->team > 0) {
      return self::TEAM[$this->team];
    } else {
      return "Unknown";
    }
  }

  static public function find_by_date($date) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE pubDate='" . self::$database->escape_string($date) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_by_title($title) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE title='" . self::$database->escape_string($title) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  public function shift_errors_array() {
    global $errors;
    $new_errors = $errors;
    $errors = call_user_func_array('array_merge', $new_errors);
    return $errors;
  }

  public function promoted() {
    if ($this->promoted == 1) {
      return true;
    }
  }

  public function hero() {
    if ($this->hero == 1) {
      return true;
    }
  }

  public function team_hero() {
    if ($this->team_hero == 1) {
      return true;
    }
  }

  public function team_featured() {
    if ($this->team_featured == 1) {
      return true;
    }
  }

  public function live() {
    if ($this->live == 1) {
      return true;
    }
  }

  public function pubDate() {
    $date = date_create( $this->pubDate);
    $dateformat = date_format($date, 'D d M Y h:i A');
    return $dateformat;
  }

  public static function count_promoted() {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name . " ";
    $sql .= "WHERE promoted=1";
    $result_set = self::$database->query($sql);
    if (!$result_set) {
      return 0;
    } else {
      $row = $result_set->fetch_array();
      return array_shift($row);
    }
  }

  public static function count_hero() {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name . " ";
    $sql .= "WHERE hero=1";
    $result_set = self::$database->query($sql);
    if (!$result_set) {
      return 0;
    } else {
      $row = $result_set->fetch_array();
      return array_shift($row);
    }
  }

  public static function count_team($team) {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name . " ";
    $sql .= "WHERE team=" . self::$database->escape_string($team) . " ";
    $result_set = self::$database->query($sql);
    if (!$result_set) {
      return 0;
    } else {
      $row = $result_set->fetch_array();
      return array_shift($row);
    }
  }

  public static function count_team_hero($team) {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name . " ";
    $sql .= "WHERE team=" . static::$database->escape_string($team) . " ";
    $sql .= "AND team_hero=1";
    $result_set = self::$database->query($sql);
    if (!$result_set) {
      return 0;
    } else {
      $row = $result_set->fetch_array();
      return array_shift($row);
    }
  }

  public static function count_team_featured($team) {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name . " ";
    $sql .= "WHERE team=" . static::$database->escape_string($team) . " ";
    $sql .= "AND team_featured=1";
    $result_set = self::$database->query($sql);
    if (!$result_set) {
      return 0;
    } else {
      $row = $result_set->fetch_array();
      return array_shift($row);
    }
  }

  public static function delete_old_posts($delete_id, $delete_num) {
    $sql = "DELETE FROM news_feed ";
    $sql .= "WHERE id < " . h($delete_id) . " ";
    $sql .= "LIMIT " . h($delete_num);
    $result = static::$database->query($sql);

    return $result;
  }

  protected function validate() {
    $this->errors = [];

    if (!is_unique_article($this->title, $this->id ?? 0)) {
      $this->errors[] = "1 or more articles have already been uploaded.";
    }

    if (is_blank($this->title)) {
      $this->errors[] = "Title cannot be blank";
    }

    if (is_blank($this->link)) {
      $this->errors[] = "Link cannot be blank";
    }

    if (is_blank($this->pubDate)) {
      $this->errors[] = "Date cannot be blank";
    }

    if (is_blank($this->imageLink)) {
      $this->errors[] = "Image cannot be blank";
    }

    if (!can_be_promoted($this->promoted, $this->id ?? 0)) {
      $this->errors[] = "You have too many promoted posts, please remove at least one before promoting a new post.";
    }

    if ($this->promoted == 0 && $this->hero == 1) {
      $this->errors[] = "You have to remove this post from being hero first.";
     }

    if (!can_be_hero($this->hero, $this->id ?? 0)) {
      $this->errors[] = "You can only have one promoted hero post.";
    }

    if (!can_be_team_hero($this->team, $this->team_hero, $this->id ?? 0)) {
      $this->errors[] = "You can only have one promoted team hero post.";
    }

    if (!can_be_team_featured($this->team, $this->team_featured, $this->id ?? 0)) {
      $this->errors[] = "You have too many featured posts, please remove at least one before featuring a new post.";
    }

    if ($this->team_featured == 1 && $this->team_hero == 1) {
      $this->errors[] = "The post can't be both a hero and featured post. Please choose one.";
     }

    return $this->errors;
  }

}

?>
