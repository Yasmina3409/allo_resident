<?php
// require 'db.class.php';

class Saveannonce
{

  public static function run($params)
  {


    $db = Db::singleton();



    $fields = array(
      'titre', 'description', 'user_annonce', 'destination', 'date', 'lieu',
      'nom_user_annonce', 'image_user_annonce',
      'description_user_annonce', 'type_annonce'
    );
    $values = array(
      $params["titre"], $params["description"], $params["user_annonce"], $params["destination"], $params["date"],
      $params["lieu"],  $params["nom_user_annonce"],
      $params["image_user_annonce"], $params["description_user_annonce"], $params["type_annonce"]
    );

    if ($_FILES && isset($_FILES['image'])) {

      //$parts = explode(".", $_FILES['image']['name']);
      // $ext = array_pop($parts);
      $filename = "annonce_" . $_FILES['image']['name'];

      /* Choose where to save the uploaded file */
      $location =  "class/uploads_annonce/" . $filename;

      // Save the uploaded file to the local filesystem */
      if (move_uploaded_file($_FILES['image']['tmp_name'], $location)) {
        //echo 'Success';
        array_push($fields, "image");
        array_push($values, $filename);
      } else {
        echo 'Failure';
      }
    }

    $result =   $db->create('annonce', $fields, $values);

    $titre = $params["titre"];
    $sql = "SELECT *  FROM annonce WHERE titre='$titre'";
    $annonce = $db->select_sqlOne($sql);
    if ($annonce['image']) {
      $annonce['image'] = "https://bhaj.fr/allo_resident/back-end/class/uploads_annonce/" . $annonce['image'];
      echo json_encode($annonce);
      exit;
    } else
      MsgError::run("Error create Annonce" . json_encode($result));
  }
}
