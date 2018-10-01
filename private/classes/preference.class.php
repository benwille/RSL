<?php

class Preference {

  public $rsl;
  public $urfc;
  public $monarchs;
  public $academy;
  public $errors = [];

  public function __construct($args=[]) {
    $this->rsl = $args['rsl'] ?? 1;
    $this->urfc = $args['urfc'] ?? 2;
    $this->monarchs = $args['monarchs'] ?? 3;
    $this->academy = $args['academy'] ?? 4;
  }


  public function validate() {
    $this->errors = [];
      if ($this->rsl == $this->urfc || $this->rsl == $this->monarchs || $this->rsl == $this->academy) {
        $this->errors[] = 'Must choose unique preferences';
      }
      if ($this->urfc == $this->monarchs || $this->urfc == $this->academy) {
        $this->errors[] = 'Must choose unique preferences';
      }
      if ($this->monarchs == $this->academy) {
        $this->errors[] = 'Must choose unique preferences';
      }
      // if(is_blank($this->confirm_password)) {
      //   $this->errors[] = "Confirm password cannot be blank.";
      // } elseif ($this->password !== $this->confirm_password) {
      //   $this->errors[] = "Password and confirm password must match.";
      // }

    if (empty($this->errors)) {
      return true;
      } else {
        return $this->errors;
        }
    }

  public function sort() {
    $array = [
      'RSL' => $this->rsl,
      'Utah Royals FC' => $this->urfc,
      'Real Monarchs' => $this->monarchs,
      'RSL Academy' => $this->academy
    ];

    asort($array);
    return key($array);
  }
}

?>
