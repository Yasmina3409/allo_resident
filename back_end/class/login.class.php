<?php
// session_start();

class Login
{
    public static function run($params)
    {
        $db = Db::singleton();
        $email = $params["email"];
        $_SESSION['email'] = $email;
        $password = $params["password"];
        $user = $db->selectOne('user', 'email', $email);
        if (!empty($user)) {
            if (password_verify($password, $user['password'])) {
                Logged::run($user);
            } else {
                echo json_encode(["Error" => "INVALID_CREDENTIALS"]);
                //  header('location:./form_login.html'); 
            }
        } else {
            echo json_encode(["Error" => "INVALID_CREDENTIALS"]);
        }
    }
}
