<?php
// session_start();

class Loginadmin
{

    public static function run($params)
    {


        $db = Db::singleton();
        $admin_pseudo = $params["admin_pseudo"];
        $_SESSION['admin_pseudo'] = $admin_pseudo;
        $password = $params["password"];

        $admin = $db->selectOne('admin', 'admin_pseudo', $admin_pseudo);

        if (!empty($admin)) {

            if ($password == $admin['password']) {
                $length = 50;
                unset($admin["password"]);
                unset($admin["admin_pseudo"]);
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $token = '';
                for ($i = 0; $i < $length; $i++) {
                    $token .= $characters[rand(0, $charactersLength - 1)];
                }

                $admin['token'] = $token;

                echo json_encode($admin);
            } else {

                echo json_encode(["Error" => "INVALID_admin"]);
                //  header('location:./form_login.html'); 
            }
        } else {

            echo json_encode(["Error" => "INVALID_CREDENTIALS"]);
        }
    }
}
