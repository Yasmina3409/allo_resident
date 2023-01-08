<?php


class Logged
{

    public static function run($user)
    {


        unset($user["password"]);

        $length = 50;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, $charactersLength - 1)];
        }
        if ($user['image'])
            $user['image'] = "https://bhaj.fr/allo_resident/back-end/class/uploads/" . $user['image'];
        $user['token'] = $token;
        echo json_encode($user);
    }
}
