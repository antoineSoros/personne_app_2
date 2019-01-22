<?php


include '../../setup.php';

use dao\PersonneDao;
use model\Personne;


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

if($_SERVER['REQUEST_METHOD']==='GET') {


    try {
        $personDao = new PersonneDao();

        $personnes = $personDao->getPersonnes();
      $tab=[];
      foreach ($personnes as $pers){
          $tab[]= $pers->toArray();
      }

      echo json_encode($tab);

    }catch (PDOException $ex) {

        http_response_code(500);
    }
    }elseif($_SERVER['REQUEST_METHOD']==='POST'){

    $json = file_get_contents('php://input');
    $tab = json_decode($json,true);
    $pers = new Personne($tab['lastName'],$tab['firstName'],$tab['gender']);
    var_dump($pers);

    try{
        $dao = new PersonneDao();
        $dao->addPerson($pers);
        http_response_code(201);
    }catch (PDOException $ex){
        http_response_code(500);
    }


}
