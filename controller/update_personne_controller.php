<?php

include '../setup.php';

use dao\PersonneDao;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($id) {
        try {
            $personDao = new PersonneDao();

            $personne = $personDao->getPersonneById($id);

            include VIEW . '/update_personne.php';
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    } else {
        echo 'pas glop';
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = filter_input(INPUT_POST, 'id');
    $firstName = filter_input(INPUT_POST, 'first_name');
    $lastName = filter_input(INPUT_POST, 'last_name');
    $gender = filter_input(INPUT_POST, 'gender');
var_dump($id);

    if ($id && $firstName && $lastName && $gender) {
        try {
            $personDao = new PersonneDao();
            $personne = $personDao->getPersonneById($id);
            $personne->setPrenom($firstName);
            $personne->setNom($lastName);
            $personne->setGender($gender);
            $personDao->updatePerson($personne);
            header('Location:/display_personnes_controller.php');
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }else{
        echo 'pas glop post';
    }
}








