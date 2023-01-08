<?php
// require 'db.class.php';

class Editannonce
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
    $fields = array('titre', 'description', 'destination', 'date', 'lieu');
    $values = array($params["titre"], $params["description"], $params["destination"], $params["date"], $params["lieu"]);

    if ($_FILES && isset($_FILES['image'])) {

      //$parts = explode(".", $_FILES['image']['name']);
      // $ext = array_pop($parts);
      $filename = "annonce_" . $_FILES['image']['name'];

      /* Choose where to save the uploaded file */
      $location = __DIR__ . "../uploads_annonce/" . $filename;

      // Save the uploaded file to the local filesystem */
      if (move_uploaded_file($_FILES['image']['tmp_name'], $location)) {
        //echo 'Success';
        array_push($fields, "image");
        array_push($values, $filename);
      } else {
        echo 'Failure';
      }
    }
    $id = $params["id"];
    $result =   $db->update('annonce', $fields, $values,  $id, 'annonce_id');

    if (isset($result["update"]) && $result["update"] == "success") {

      // $id = $params["annonce"]["annonce_id"];
      $sql = "SELECT *  FROM annonce  WHERE annonce_id= $id ";

      $annonce = $db->select_sqlOne($sql);

      if ($annonce['image']) {
        $annonce['image'] = "http://localhost/allo_resident/allo_resident_local/back-end_local/class/uploads_annonce/" . $annonce['image'];
        echo json_encode($annonce);

        exit;
      } else
        MsgError::run("Error create Annonce" . json_encode($result));
    }
  }
}
