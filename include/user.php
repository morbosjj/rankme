<?php

class User extends Database {
  protected $user_id;
  protected $firstname;
  protected $email;
  protected $id_token;

  function getUserId($user_id){
    return $this->user_id;
  }
  function setUserId($user_id){
    $this->user_id = $user_id;
    return $this;
  }
  function getFirstname($firstname){
    return $this->firstname;
  }
  function setFirstname($firstname){
    $this->firstname = $firstname;
    return $this;
  }
  function getEmail($email){
    return $this->email;
  }
  function setEmail($email){
    $this->email = $email;
    return $this;
  }
  function getIdToken($id_token){
    return $this->id_token;
  }
  function setIdToken($id_token){
    $this->id_token = $id_token;
    return $this;
  }

  function create(){
    $stmt = $this->con->prepare("INSERT INTO users (email, firstname, id_token) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $this->email, $this->firstname, $this->id_token);
    $stmt->execute();
    $stmt->close();

    $this->con->close();
  }

  function idTokenExist(){
    $stmt = $this->con->prepare("SELECT * FROM users WHERE id_token =?");
    $stmt->bind_param('s', $this->id_token);
    $stmt->execute();

    $result = $stmt->get_result();
    $stmt->close();

    while($row = $result->fetch_assoc()){
      if($this->id_token === $row['id_token']){
        return json_encode([
          "status"=> "error", 
          "message"=> " Id token is already exist. Please Try again"
        ]);
      }
    }
    return json_encode([
      "status" => "success", 
      "message" => "success"
    ]);
  

    $this->con->close();
  }
}