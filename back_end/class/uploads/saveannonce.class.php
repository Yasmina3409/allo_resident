<?php
// require 'db.class.php';

class Saveprofil
{

  public static function run($params)
  {


    $db = Db::singleton();

    //    $db->update('user', array('pseudo', 'image'), array($_POST["pseudo"],$_POST["image"]), $_SESSION["mail"], 'mail');


    // $request_body = file_get_contents('php://input');
    // if( $request_body ){
    // $params_image = json_decode($request_body, true);

    // if(isset($params_image['image'])){ echo json_encode($params_image);}
    // }
    $fields = array('pseudo', 'description');
    $values = array($params["pseudo"], $params["description"]);

    if ($_FILES && isset($_FILES['image'])) {

      $parts = explode(".", $_FILES['image']['name']);
      $ext = array_pop($parts);
      $filename = "user_" . $params["user"]["user_id"] . "." . $ext;

      /* Choose where to save the uploaded file */
      $location = __DIR__ . "../uploads/" . $filename;

      // Save the uploaded file to the local filesystem */
      if (move_uploaded_file($_FILES['image']['tmp_name'], $location)) {
        //echo 'Success';
        array_push($fields, "image");
        array_push($values, $filename);
      } else {
        echo 'Failure';
      }
    }

    $result =   $db->update('user', $fields, $values,  $params["user"]["user_id"], 'user_id');

    if (isset($result["update"]) && $result["update"] == "success") {

      $id = $params["user"]["user_id"];
      $sql = "SELECT *  FROM user  WHERE user_id='$id'";

      $user = $db->select_sqlOne($sql);
      unset($user["password"]);
      if ($user['image'])
        $user['image'] = "http://localhost/Allo_resident/back-end/class/uploads/" . $user['image'];
      echo json_encode($user);
      exit;
    } else
      MsgError::run("Error Update profil" . json_encode($result));
  }
}
