<?php

include '../setup.php';

use dao\PersonneDao;



try {
    $personDao = new PersonneDao();

    $personnes =$personDao->getPersonnes();
    include VIEW . '/display_personnes.php';
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

