<?php
// require 'db.class.php';

class Saveprofil
{

  public static function run($params)
  {
    $db = Db::singleton();
    $id = $params["user_id"];
    $fields = array('pseudo', 'presentation');
    $values = array($params["pseudo"], $params["description"]);
    $fields2 = array('nom_user_annonce', 'description_user_annonce');
    $values2 = array($params["pseudo"], $params["description"]);
    if ($_FILES && isset($_FILES['image'])) {
      $parts = explode(".", $_FILES['image']['name']);
      $ext = array_pop($parts);
      $filename = "user_" . $id . "." . $ext;
      $location = __DIR__ . "../uploads/" . $filename;
      if (move_uploaded_file($_FILES['image']['tmp_name'], $location)) {
        array_push($fields, "image");
        array_push($values, $filename);
        array_push($fields2, "image_user_annonce");
        array_push($values2, $filename);
      } else {
        echo 'Failure';
      }
    }
    $result =   $db->update('user', $fields, $values,  $id, 'user_id');
    $result2 =   $db->update('annonce', $fields2, $values2,  $id, 'user_annonce');
    if (isset($result["update"]) && $result["update"] == "success") {
      // $id = ["user_id"];
      // $id2 = ["user_id"];

      $sql = "SELECT *  FROM user  WHERE user_id= $id";
      //  $sql2 = "SELECT *  FROM annonce  WHERE user_annonce ='$id2'";
      $user = $db->select_sqlOne($sql);
      unset($user["password"]);
      //  $annonce = $db->select_sqlOne($sql2);
      if ($user['image'])
        $user['image'] = "http://localhost/allo_resident/allo_resident_local/back-end_local/class/uploads/" . $user['image'];
      if ($user['pseudo'] == '')
        $user['pseudo'] = 'utilisateur';
      if ($user['presentation'] == '')
        $user['presentation'] = 'aucune decription pour le profil ';


      echo json_encode($user);;
      exit;
    }
  }
}
