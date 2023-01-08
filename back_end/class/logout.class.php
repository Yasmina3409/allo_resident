<!-- class Logout{

    public static function run( $params){
     $token=  $params["user"]["id"]    ;

echo json_encode(["Logout"=>"Success"]);

    }
    }
?> -->
<?php

class Logout
{
    public  static  function run()
    {

        session_destroy();
        echo "deconnecté";

        // $db = Db::singleton();
        // $mail = $_SESSION['email'];
        // $sql = "SELECT firstname,lastname,birthname,number,adress,image_url FROM user  WHERE email='$mail'";
        // $resultat = $db->select_sql($sql);

        // echo json_encode($resultat);
    }
}
?>