<?php
// session_start();
class Getannonce
{

    public static function run()
    {
        $db = Db::singleton();
        // $id = $params["user_annonce"];
        //  $sql = "SELECT * , FROM annonce  WHERE user_annonce='$id'";
        //  = "SELECT * FROM annonce  ";
        $sql =  "SELECT * FROM  annonce order by date_annonce ASC";
        $resultat = $db->select_all_table($sql);
        // $sql2 =  "SELECT * FROM  annonce order by date_annonce ";
        // $resultat2 = $db->select_all_table($sql2);


        echo json_encode($resultat);
        // echo json_encode($resultat2);
    }
}
