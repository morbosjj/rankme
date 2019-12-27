<?php

session_start();

function success(){
  if(isset($_SESSION['success'])){
    $output =  '<div class="noti-success">';
    $output .= '<p><i class="fas fa-check-circle"></i> '. htmlentities($_SESSION['success']) .'</p>';
    $output .= '</div>';

    $_SESSION['success'] = null;
    return $output;
  }
}

function error(){
  if(isset($_SESSION['error'])){
    $output =  '<div class="noti-error">';
    $output .= '<p><i class="far fa-times-circle"></i> '. htmlentities($_SESSION['error']) .'</p>';
    $output .= '</div>';

    $_SESSION['error'] = null;
    return $output;
  }
}

?>