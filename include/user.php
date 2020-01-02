<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class User extends Database {
  protected $user_id;
  protected $email;
  protected $firstname;
  protected $lastname;
  protected $password;
  protected $id_sub;
  protected $activate_code;

  public function getUserId($user_id){
    return $this->user_id;
  }
  public function setUserId($user_id){
    $this->user_id = $user_id;
    return $this;
  }
  public function getEmail($email){
    return $this->email;
  }
  public function setEmail($email){
    $this->email = $email;
    return $this;
  }
  public function getFirstname($firstname){
    return $this->firstname;
  }
  public function setFirstname($firstname){
    $this->firstname = $firstname;
    return $this;
  }
  public function getLastname($lastname){
    return $this->lastname;
  }
  public function setLastname($lastname){
    $this->lastname = $lastname;
    return $this;
  }
  public function getPassword($password){
    return $this->password;
  }
  public function setPassword($password){
    $this->password = $password;
    return $this;
  }
  public function getIdSub($id_sub){
    return $this->id_sub;
  }
  public function setIdSub($id_sub){
    $this->id_sub = $id_sub;
    return $this;
  }
  public function getCode($activate_code){
    return $this->activate_code;
  }
  public function setCode($activate_code){
    $this->activate_code = $activate_code;
    return $this;
  }

  public function create(){
    $password = password_hash($this->password, PASSWORD_DEFAULT);
    $is_active = 0;
    $stmt = $this->con->prepare("INSERT INTO users (email, firstname, lastname, password, id_sub, activate_code, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssi', $this->email, $this->firstname, $this->lastname, $password, $this->id_sub, $this->activate_code, $is_active);
    $stmt->execute();
    $stmt->close();

    $this->con->close();
  }

  public function idSubExist(){
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

  public function emailExist(){
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

  public function login(){
    $stmt = $this->con->prepare("SELECT * FROM users WHERE email= ? AND is_active =1");
    $stmt->bind_param('s', $this->email);
    $stmt->execute();

    $result = $stmt->get_result();
    $stmt->close();

    while($row = $result->fetch_assoc()){
      if(password_verify($this->password, $row['password'])){

        $_SESSION['user'] = [
            "user_id" => $row["user_id"],
            "email" => $row["email"],
            "firstname" => $row["firstname"],
            "lastname" => $row["lastname"]
        ];

        return json_encode(["status" => "success", "message" => "You are now logged in"]);
      }
    }

    return json_encode(["status" => "error", "message" => "Incorrect password or email"]);

    $this->con->close();

  }

  public function renderValueInEmail($activate_code, $user_id){
    ob_start();
    include '../../user/layout/email.phtml';
    return ob_get_contents();
  }

  public function sendEmail($user_id, $email, $activate_code){


    $output = $this->renderValueInEmail($activate_code, $user_id);
    
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL;
    $mail->Password = PASSWORD;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom(EMAIL, 'Rank me');
    $mail->addAddress($email);
    $mail->addReplyTo(EMAIL);


    $mail->isHTML(true);
    $mail->CharSet="utf-8";
    $mail->Subject = "Activation Code";
    $mail->Body = $output; 

    if(!$mail->send()){
      $_SESSION['error'] = 'Something went wrong. Please try again ';
    }else{
      $_SESSION['success'] = 'We have sent you a verification e-mail.';
    }

  }

  public function activateAccount(){
    $stmt = $this->con->prepare("UPDATE users SET is_active = 1  WHERE id_sub = ? AND activate_code = ?");
    $stmt->bind_param('ss', $this->id_sub, $this->activate_code);
    $stmt->execute();

    $result = $stmt->get_result();
    $stmt->close();
    
    $data = $this->getUsersByCode($this->activate_code);
    if($this->activate_code === $data['activate_code']){
        $_SESSION['user'] = [
          "user_id" => $data["user_id"],
          "email" => $data["email"],
          "firstname" => $data["firstname"],
          "lastname" => $data["lastname"] 
        ];
        
        return json_encode(["status" => "success", "message" => "You are now logged in"]);
    }else{
      return json_encode([
        "status"=> "error",   
        "message"=> "Incorrect activation code"
      ]);
    }

  }

  public function getUsersByCode($code){
    $stmt = $this->con->prepare("SELECT * FROM users WHERE activate_code =?");
    $stmt->bind_param('s', $code);
    $stmt->execute();

    $result = $stmt->get_result();
    $stmt->close();

    $row = $result->fetch_assoc();
    
    return $row;
  }

}