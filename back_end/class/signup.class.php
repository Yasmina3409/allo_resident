<?php
// session_start();

class Signup
{

  public static function run($params)
  {

    $db = Db::singleton();
    $email = $params["email"];
    $_SESSION['email'] = $email;

    $sql = "SELECT *  FROM user  WHERE email='$email'";
    $user = $db->select_sqlOne($sql);
    if (isset($user["user_id"])) {

      MsgError::run("INVALID_CREDENTIALS");
    }

    $password = password_hash($params["password"], PASSWORD_DEFAULT);

    $result =   $db->create('user',  array('email', 'password'), array($email, $password));

    $sql = "SELECT *  FROM user  WHERE email='$email'";

    $user = $db->select_sqlOne($sql);
    if (isset($user["user_id"])) {

      Logged::run($user);


      // Connexion directe après inscription


    } else {
      echo json_encode(["Error" => "INVALID_INFORMATIONS"]);
    }
  }
}
