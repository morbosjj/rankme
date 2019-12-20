<?php

class Database {
  protected $con;

  function __construct(){
    $this->con = new Mysqli("localhost", "id11849216_therankme", "jjmorbos0130", "id11849216_therankme");

    if($this->con->connect_error){
      die("Error: ". $this->con->connect_errorno);
    }

  }
}