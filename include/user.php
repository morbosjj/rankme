<?php

class User extends Database {
  protected $user_id;
  protected $email;
  protected $firstname;
  protected $lastname;
  protected $password;
  protected $id_sub;

  function getUserId($user_id){
    return $this->user_id;
  }
  function setUserId($user_id){
    $this->user_id = $user_id;
    return $this;
  }
  function getEmail($email){
    return $this->email;
  }
  function setEmail($email){
    $this->email = $email;
    return $this;
  }
  function getFirstname($firstname){
    return $this->firstname;
  }
  function setFirstname($firstname){
    $this->firstname = $firstname;
    return $this;
  }
  function getLastname($lastname){
    return $this->lastname;
  }
  function setLastname($lastname){
    $this->lastname = $lastname;
    return $this;
  }
  function getPassword($password){
    return $this->password;
  }
  function setPassword($password){
    $this->password = $password;
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
    $password = password_hash($this->password, PASSWORD_DEFAULT);
    $stmt = $this->con->prepare("INSERT INTO users (email, firstname, lastname, password, id_sub) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $this->email, $this->firstname, $this->lastname, $password , $this->id_sub);
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
  function emailExist(){
    $stmt = $this->con->prepare("SELECT * FROM users WHERE email =?");
    $stmt->bind_param('s', $this->email);
    $stmt->execute();

    $result = $stmt->get_result();
    $stmt->close();

    while($row = $result->fetch_assoc()){
      if($this->email === $row['email']){
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