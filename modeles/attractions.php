
<?php

require_once "./include/config.php";

class modele_attraction {
    public $id; 
    public $name;
    public $price;
    public $description;
 

    public function __construct($id,$name, $price, $description) {
        $this->id = $id;
        $this->name = $name;
        $this->price= $price;
        $this->description = $description;
    }

 
    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;   
            exit();
        } 

        return $mysqli;
    }

 
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, name, price, description FROM attractions ORDER BY id");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_attraction($enregistrement['id'],  $enregistrement['name'], $enregistrement['price'], $enregistrement['description']);
        }

        return $liste ;
    }

    





      





}

 
    



?>
