<?php

class Database {
  protected $con;
  
  function __construct(){
    $this->con = new Mysqli("localhost", "id11849216_rankme", "jjmorbos0130", "id11849216_rankme");

    if($this->con->connect_error){
      die("Error: ". $this->con->connect_errorno);
    }

  }
}