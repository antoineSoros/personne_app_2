<?php


namespace dao;


use \PDO;
use model\Personne;

class PersonneDao
{


    private $pdo;

    function __construct()
    {
        $conf = parse_ini_file(CONFIG_FILE_PATH);

        $dsn = $conf["dsn"];
        $user = $conf["user"];
        $password = $conf["password"];


        $this->pdo = new PDO($dsn,$user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }


    public function getPersonnes(): array
    {
       $personnes = [];


        $sql = 'select id, first_name, last_name, gender from personne ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) {
           $pers = new Personne($row['last_name'],$row['first_name'],$row['gender'],$row['id']);

            array_push($personnes, $pers);

        }
        return $personnes;
    }

    public function getPersonneById($id) : Personne{



        $sql = "select id, first_name, last_name, gender from personne where id = {$id}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
       if ($row){
            $pers = new Personne($row['last_name'],$row['first_name'],$row['gender'],$row['id']);

        return $pers;}

           return Personne::creatNullObject();
       }




    function addPerson(Personne $p)
    {

        $sql = 'INSERT INTO personne (last_name,first_name,gender) values (:last_name, :first_name,:gender)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':last_name', $p->getNom());
        $stmt->bindValue(':first_name', $p->getPrenom());
        $stmt->bindValue(':gender', $p->getGender());
        $result = $stmt->execute();
        return $result;
    }



    public function updatePerson(Personne $personne){


        $sql = "UPDATE  personne set last_name =:last_name,first_name=:first_name,gender=:gender where id = :id ";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':id',$personne->getId());
        $stmt->bindValue(':last_name', $personne->getNom());
        $stmt->bindValue(':first_name', $personne->getPrenom());
        $stmt->bindValue(':gender', $personne->getGender());
        $result = $stmt->execute();
        return $result;
    }

}


