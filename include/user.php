<?php

class User extends Database {
  protected $user_id;
  protected $firstname;
  protected $email;
  protected $id_sub;

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
  function getIdSub($id_sub){
    return $this->id_sub;
  }
  function setIdSub($id_sub){
    $this->id_sub = $id_sub;
    return $this;
  }

  function create(){
    $stmt = $this->con->prepare("INSERT INTO users (email, firstname, id_sub) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $this->email, $this->firstname, $this->id_sub);
    $stmt->execute();
    $stmt->close();

    $this->con->close();
  }

  function idSubExist(){
    $stmt = $this->con->prepare("SELECT * FROM users WHERE id_sub =?");
    $stmt->bind_param('s', $this->id_sub);
    $stmt->execute();

    $result = $stmt->get_result();
    $stmt->close();

    while($row = $result->fetch_assoc()){
      if($this->id_sub === $row['id_sub']){
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