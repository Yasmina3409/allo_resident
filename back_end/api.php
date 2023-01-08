<?php

header("Access-Control-Allow-Origin:*"); //pour les cors
header("Access-Control-Allow-Headers:*");

session_start();
require 'autoload.php';
//echo ($params);
$request_body = file_get_contents('php://input'); //permet de recup le resultat des post


if ($request_body) { // si quelque chose a ete envoyé
    $params = json_decode($request_body, true); // dans params en va aussi envoyer l'action, on decode le json
}
if (isset($_POST["action"])) {
    $params = $_POST;
} else  if (isset($_GET["action"])) {
    $params = $_GET;
}
switch ($params["action"]) {

        //vue que l'action est dans $params on va chercher action dans $params
    case "logout":
        Logout::run();

        break;
    case "saveprofil":

        Saveprofil::run($params);
        echo ($params["action"]);
        //pseudo, image, description
        echo ($params);
        break;
    case "saveannonce":
        Saveannonce::run($params);
        //pseudo,image, description
        break;
    case "editannonce":
        Editannonce::run($params);
        //pseudo, language, image, description
        break;


    case "deleteannonce":

        Deleteannonce::run($params);
        // param vote id
        break;
    case "login":

        Login::run($params); //on donnes des arguments au login, mail et pwd qu'on à reçu en POST (donc dans $params)


        break;
    case "loginadmin":

        Loginadmin::run($params); //on donnes des arguments au login, mail et pwd qu'on à reçu en POST (donc dans $params)


        break;
    case "signup":

        Signup::run($params);


        break;
    case "getannonce":
        //$params = $_POST;
        Getannonce::run();
        break;
    case "getannoncedesc":
        // echo ($params);
        //$params = $_POST;
        Getannoncedesc::run($params);
        //echo ($params);
        break;
}
