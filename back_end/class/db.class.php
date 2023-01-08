<?php
require('./credentiale.php');
// require_once '/credentials.php';

class Db
{

    public $hostname;
    public $dbname;
    public $username;
    public $password;
    public $dbco;
    public static $db;

    public static function singleton()
    {
        if (!self::$db) {
            // Creation de Db + connect
            self::$db = new Db();
            self::$db->connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
        }

        return self::$db;
    }

    public function connect($set_hostname, $set_username, $set_password, $set_database)
    {
        $this->hostname = $set_hostname;
        $this->username = $set_username;
        $this->password = $set_password;
        $this->dbname = $set_database;
        try {
            $this->dbco = new PDO("mysql:host=$this->hostname;dbname=$this->dbname;charset=utf8", "$this->username", "$this->password");
            $this->dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return ["Erreur" => $e->getMessage()];
        }
    }

    public function create($table, $fields = array(), $values = array())
    {

        $str_fields = implode(",", $fields);
        $value = [];

        foreach ($fields as $field) {
            array_push($value, ":" .  $field);
        }
        $str_fields2 = implode(",", $value);
        $keys_values = array_combine($value, $values);

        try {
            $sql = "
   INSERT INTO
   $table($str_fields)
   VALUES ($str_fields2)";
            $prep = $this->dbco->prepare($sql);

            $result =    $prep->execute($keys_values);
            return  ["new_id" => $this->dbco->lastInsertId()];
        } catch (PDOException $e) {
            return ["Erreur" => $e->getMessage()];
        }
    }

    public function query($sql)
    {


        try {

            $prep = $this->dbco->prepare($sql);

            $result =    $prep->execute();
            return $result;
        } catch (PDOException $e) {
            return ["Erreur" => $e->getMessage()];
        }
    }
    public function select_one($table, $field, $id)
    {
        try {

            $sth = $this->dbco->prepare("SELECT * FROM  $table WHERE $field = '$id'"); //selectionne tout les elements qui viennent de $table qui contiennent $field

            $sth->execute();
            $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

            if (isset($resultat[0])) {
                // print_r($resultat[0]);
                return $resultat[0];
            } else
                return;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }


    public function select_sql($sql)
    {
        // Selection un seul enregistrement par ID prendre la table Paramètre,($table,$field,$id)
        try {

            $sth = $this->dbco->prepare("$sql");

            $sth->execute();

            $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;
        } catch (PDOException $e) {
            return ["Erreur" => $e->getMessage()];
        }
    }

    public function select_sqlOne($sql)
    {
        // Selection un seul enregistrement par ID prendre la table Paramètre,($table,$field,$id)
        try {

            $sth = $this->dbco->prepare("$sql");

            $sth->execute();

            $resultat = $sth->fetch(PDO::FETCH_ASSOC);


            return $resultat;
        } catch (PDOException $e) {
            return ["Erreur" => $e->getMessage()];
        }
    }


    public function selectOne($table, $field, $value)
    {
        // Selection un seul enregistrement par ID prendre la table Paramètre,($table,$field,$id)
        try {

            $sth = $this->dbco->prepare("SELECT * FROM $table WHERE $field ='$value' ");

            $sth->execute();


            $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

            if (count($resultat) == 0)
                return;
            else

                return $resultat[0];
        } catch (PDOException $e) {
            return ["Erreur" => $e->getMessage()];
        }
    }
    public function select_all_table($sql)
    {
        try {
            $sth = $this->dbco->prepare($sql);
            $sth->execute();
            $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);


            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function selectAll($table)
    {
        // Selection un seul enregistrement par ID prendre la table Paramètre,($table,$field,$id)
        try {

            $sth = $this->dbco->prepare("SELECT * FROM $table");


            $sth->execute();


            $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
            echo ($resultat);
            // if (count($resultat) == 0)
            // return;
            // else

            return $resultat;
        } catch (PDOException $e) {
            return ["Erreur" => $e->getMessage()];
        }
    }


    public function delete($table, $field, $value)
    {
        // Selection un seul enregistrement par ID prendre la table Paramètre,($table,$field,$id)
        try {
            $sth = $this->dbco->prepare("DELETE FROM $table WHERE $field = '$value' ");
            $sth->execute();
            return ["delete" => "success"];
        } catch (PDOException $e) {
            return ["Erreur" => $e->getMessage()];
        }
    }

    public function update($table, $fields = array(), $values = array(), $id, $field_id)
    {

        $update = [];

        foreach ($fields as $i => $field) {
            array_push($update, $field . "=" . "'" . str_replace("'", "''",  $values[$i]) . "'");
        }

        try {

            $sql = "UPDATE $table SET " . implode(",", $update) . " WHERE $field_id = '$id'";

            $sth = $this->dbco->prepare($sql);


            $sth->execute();
            return ["update" => "success"];
        } catch (PDOException $e) {
            return ["Erreur" => $e->getMessage()];
        }
    }
}
