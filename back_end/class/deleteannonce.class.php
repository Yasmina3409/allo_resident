<?php

class Deleteannonce
{

    public static function run($params)
    {
        $db = Db::singleton();
        $field = 'annonce_id';
        $value = $params['annonce_id'];

        $result =  $db->delete('annonce', $field, $value);
        echo ($params['annonce_id']);
        // echo json_decode($result);
    }
}
