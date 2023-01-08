<?php
// session_start();
class Getannoncedesc
{

    public static function run($params)
    {
        $db = Db::singleton();
        // $id = $params["user_annonce"];
        //  $sql = "SELECT * , FROM annonce  WHERE user_annonce='$id'";
        //  = "SELECT * FROM annonce  ";

        $sql2 =  "SELECT * FROM  annonce order by date_annonce DESC ";
        $resultat2 = $db->select_all_table($sql2);


        echo json_encode($resultat2);
        // echo json_encode($resultat2);
    }
}
